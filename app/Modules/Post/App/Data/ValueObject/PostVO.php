<?php

namespace App\Modules\Post\App\Data\ValueObject;

use App\Modules\Base\Traits\FilterArrayTrait;
use HTMLPurifier;
use HTMLPurifier_Config;
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


       // Получаем дефолтный конфиг, например, для набора настроек "custom"
        $settings = config('purifier.settings.default'); // Здесь ключ "custom" – именем вашего набора настроек

        $config = HTMLPurifier_Config::createDefault();
        // Применяем базовые настройки из конфигурационного файла
        foreach ($settings as $key => $value) {
            // Если в настройках задан массив (например, HTML.Allowed is an array),
            // можно делать дополнительную обработку, но обычно это строка
            $config->set($key, $value);
        }

        // Если нужно дополнительно модифицировать HTMLDefinition, получаем объект определения
        if ($def = $config->getHTMLDefinition(true)) {
            // Добавляем элемент video согласно спецификации WHATWG
            $def->addElement(
                'video',
                'Block', // тип элемента
                'Optional: (source, Flow) | (Flow, source) | Flow', // контент-модель
                'Common', // набор общих атрибутов
                [
                    'src'      => 'URI',
                    'type'     => 'Text',
                    'width'    => 'Length',
                    'height'   => 'Length',
                    'poster'   => 'URI',
                    'preload'  => 'Enum#auto,metadata,none',
                    'controls' => 'Bool'
                ]
            );

            // Добавляем элемент source для вложения в video
            $def->addElement(
                'source',
                'Block',
                'Flow',
                'Common',
                [
                    'src'  => 'URI',
                    'type' => 'Text'
                ]
            );

            // Добавляем текстовые/стилистические элементы согласно спецификации
            $def->addElement('s',    'Inline', 'Inline', 'Common');
            $def->addElement('var',  'Inline', 'Inline', 'Common');
            $def->addElement('sub',  'Inline', 'Inline', 'Common');
            $def->addElement('sup',  'Inline', 'Inline', 'Common');
            $def->addElement('mark', 'Inline', 'Inline', 'Common');
            $def->addElement('wbr',  'Inline', 'Empty',  'Core');

            // Добавляем элементы для разметки изменений (ins, del)
            $def->addElement(
                'ins',
                'Block',
                'Flow',
                'Common',
                [
                    'cite'     => 'URI',
                    'datetime' => 'CDATA'
                ]
            );
            $def->addElement(
                'del',
                'Block',
                'Flow',
                'Common',
                [
                    'cite'     => 'URI',
                    'datetime' => 'CDATA'
                ]
            );

            // Если необходимо добавить или изменить атрибут, можно воспользоваться методом addAttribute.
            // Например, для тега table добавляем атрибут height типа "Text"
            $def->addAttribute('table', 'height', 'Text');
            $def->addAttribute('td', 'border', 'Text');
        }

        // $purifier = new HTMLPurifier($config);

        // $content = Purifier::clean($content, $config); //полностью очищаем контент от html
        $content = Purifier::clean($content, 'youtube'); //полностью очищаем контент от html

        // $content_cover = Purifier::clean($content, 'custom_not_html'); //полностью очищаем контент от html

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


}
