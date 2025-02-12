<?php

namespace App\Modules\Post\App\Data\ValueObject;

use App\Modules\Base\Traits\FilterArrayTrait;
use DOMDocument;
use DOMXPath;
use Exception;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;
use Mews\Purifier\Facades\Purifier;

class PostVO implements Arrayable
{

    use FilterArrayTrait;

    public function __construct(
        public string $title,
        public string $content,
        public string $content_cover,
        public ?string $post_img_cover_id,
        public int $user_id,
    ) {}

    public static function make(

        string $title,
        string $content,
        int $user_id,
        string $content_cover,
        ?string $post_img_cover_id = null,

    ) : self {

        // Выводим итоговый HTML
        $content = self::mappingIframe($content);

        if($content === false) {
            logError('Ошибка в PostVO, при мапинге iframe и DOC мы получаем false');
            throw new Exception('Ошибка на стороне сервера.', 500);
        }

        return new self(
            title: $title,
            content: $content,
            content_cover: $content_cover,
            post_img_cover_id: $post_img_cover_id,
            user_id: $user_id,
        );

    }

    public function setPostImgCover(string $post_img_cover_id) : self
    {
        return self::make(
            title: $this->title,
            content_cover: $this->content_cover,
            content: $this->content,
            post_img_cover_id: $post_img_cover_id,
            user_id: $this->user_id,
        );
    }

    public function toArray() : array
    {
        return [
            "title" => $this->title,
            "content" => $this->content,
            "content_cover" => $this->content_cover,
            "post_img_cover_id" => $this->post_img_cover_id,
            "user_id" => $this->user_id,
        ];
    }

    public static function arrayToObject(array $data) : self
    {
        return self::make(
            title: Arr::get($data, 'title'),
            content: Arr::get($data, 'content'),
            content_cover: '',
            user_id: Arr::get($data, 'user_id'),
            post_img_cover_id: Arr::get($data, 'post_img_cover_id' , null),
        );
    }

    /**
     * Вырезаем ifarme () div[@data-youtube-video] - что бы потом вставить
     * делается это для того что бы Purifier - не удалял важные части, по которому потом фильтрует tiptap - и у нас выводился youtube
     *
     * @param string $content - html контент для проверки
     *
     * @return string|false
     */
    private static function mappingIframe(string $content) : string|false
    {
        libxml_use_internal_errors(true);

        // Загружаем исходный HTML
        $dom = new DOMDocument();
        $dom->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        // Шаг 2. Находим все блоки div с data-youtube-video и заменяем их на плейсхолдеры
        $youtubePlaceholders = [];

        // Используем XPath для поиска нужных div
        $xpath = new DOMXPath($dom);
        $youtubeNodes = $xpath->query("//div[@data-youtube-video]");

        // Проходим по найденным блокам в обратном порядке, чтобы не нарушить структуру DOM
        for ($i = $youtubeNodes->length - 1; $i >= 0; $i--) {
            $node = $youtubeNodes->item($i);
            // Генерация уникального плейсхолдера
            $placeholder = "YOUTUBE_PLACEHOLDER_" . $i;
            // Сохраняем исходный HTML блока
            $youtubePlaceholders[$placeholder] = $dom->saveHTML($node);

            // Создаем текстовый узел с плейсхолдером
            $placeholderNode = $dom->createTextNode($placeholder);
            // Заменяем текущий узел плейсхолдером
            $node->parentNode->replaceChild($placeholderNode, $node);
        }

        // Получаем HTML с плейсхолдерами
        $htmlWithPlaceholders = $dom->saveHTML();

        // Шаг 3. Пропускаем HTML с плейсхолдерами через Purifier
        $cleanHtml = Purifier::clean($htmlWithPlaceholders, 'youtube');

        // Шаг 4. Загружаем очищенный HTML в новый DOMDocument
        $domClean = new DOMDocument();
        libxml_use_internal_errors(true);
        $domClean->loadHTML($cleanHtml, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        // Шаг 5. С помощью XPath заменяем плейсхолдеры на исходные HTML блоков
        $xpathClean = new DOMXPath($domClean);
        foreach ($youtubePlaceholders as $placeholder => $youtubeHtml) {
            // Ищем все текстовые узлы, содержащие текущий плейсхолдер
            $nodes = $xpathClean->query("//text()[contains(., '$placeholder')]");
            foreach ($nodes as $node) {
                // Создаем документ-фрагмент и вставляем в него HTML блока
                $fragment = $domClean->createDocumentFragment();
                // appendXML вставляет HTML-разметку; если возникают проблемы, можно использовать loadHTML
                $fragment->appendXML($youtubeHtml);
                // Заменяем текстовый узел фрагментом
                $node->parentNode->replaceChild($fragment, $node);
            }
        }

        return $domClean->saveHTML();
    }


}
