<?php
/**
 * Ok, glad you are here
 * first we get a config instance, and set the settings
 * $config = HTMLPurifier_Config::createDefault();
 * $config->set('Core.Encoding', $this->config->get('purifier.encoding'));
 * $config->set('Cache.SerializerPath', $this->config->get('purifier.cachePath'));
 * if ( ! $this->config->get('purifier.finalize')) {
 *     $config->autoFinalize = false;
 * }
 * $config->loadArray($this->getConfig());
 *
 * You must NOT delete the default settings
 * anything in settings should be compacted with params that needed to instance HTMLPurifier_Config.
 *
 * @link http://htmlpurifier.org/live/configdoc/plain.html
 */

return [
    'encoding'           => 'UTF-8',
    'finalize'           => true,
    'ignoreNonStrings'   => false,
    'cachePath'          => storage_path('app/purifier'),
    'cacheFileMode'      => 0755,
    'settings'      => [
        'default' => [
            // Разрешённые HTML-теги и атрибуты для стандартных элементов и tiptap-расширений (StarterKit, TextStyle, FontSizeTextStyle, FontFamily, Highlight, CustomBold, Underline, Link, TextAlign, Image, YouTube и пр.)
            'HTML.Allowed' =>

                // 'div[class|style],iframe[src],' .
                // Базовые текстовые элементы и абзацы
                'p,p[style],span,span[style],div,blockquote,pre,code, s,mark, mark[style],hr,blockquote,br,' .
                // Форматирование текста: жирный (b, strong), курсив (em), подчёркнутый (u), зачёркнутый (del, ins)
                'strong,b,em,u,del,ins,' .
                // Заголовки (если используются)
                'h1,h2,h3,h4,h5,h6,' .
                // Списки
                'ul,ol,li,' .
                // Ссылки с разрешёнными атрибутами (Link)
                'a[href|title|target|rel],' .
                // Изображения с возможными классами и размерами (Image, FontSizeTextStyle, FontFamily)
                'img[src|alt|class|width|height],' .
                // Фреймы для YouTube, Vimeo и других плагинов
                'iframe[src|width|height|frameborder|allowfullscreen|autoplay|disablekbcontrols|enableiframeapi|endtime|ivloadpolicy|loop|modestbranding|origin|playlist],' .
                // Таблицы (в случае использования в редакторе)
                'table,thead,tbody,tr,th,td',

            // Разрешённые CSS-свойства для встроенных стилей через атрибут style (TextStyle, FontSizeTextStyle, FontFamily, Highlight, Color и др.)
            'CSS.AllowedProperties' =>
                'font,font-size,font-weight,font-style,font-family,' .
                'text-decoration,padding-left,color,background-color,text-align,background-image,' .
                'line-height,margin',

            // Автоматические форматирования и удаление пустых элементов
            'AutoFormat.AutoParagraph' => true,
            'AutoFormat.RemoveEmpty'   => true,
            'CSS.Trusted' => true,

            // Разрешённые значения для атрибута target у ссылок
            'Attr.AllowedFrameTargets' => '_blank, _self, _parent, _top',


            // Разрешение на использование iframe (например, для YouTube-видео)
            "HTML.SafeIframe"      => 'true',

            // Регулярное выражение для проверки корректных источников iframe (YouTube и Vimeo как пример)
            "URI.SafeIframeRegexp" => "#^https://www\.youtube\.com/embed/#",
        ],
        'test'    => [
            'Attr.EnableID' => 'true',
        ],
        "youtube" => [
            "HTML.SafeIframe"      => 'true',
            "URI.SafeIframeRegexp" => "#^https://www\.youtube\.com/embed/#",
        ],
        'custom_definition' => [
            'id'  => 'html5-definitions',
            'rev' => 1,
            'debug' => false,
            'elements' => [
                // http://developers.whatwg.org/sections.html
                ['section', 'Block', 'Flow', 'Common'],
                ['nav',     'Block', 'Flow', 'Common'],
                ['article', 'Block', 'Flow', 'Common'],
                ['aside',   'Block', 'Flow', 'Common'],
                ['header',  'Block', 'Flow', 'Common'],
                ['footer',  'Block', 'Flow', 'Common'],

				// Content model actually excludes several tags, not modelled here
                ['address', 'Block', 'Flow', 'Common'],
                ['hgroup', 'Block', 'Required: h1 | h2 | h3 | h4 | h5 | h6', 'Common'],

				// http://developers.whatwg.org/grouping-content.html
                ['figure', 'Block', 'Optional: (figcaption, Flow) | (Flow, figcaption) | Flow', 'Common'],
                ['figcaption', 'Inline', 'Flow', 'Common'],

				// http://developers.whatwg.org/the-video-element.html#the-video-element
                ['video', 'Block', 'Optional: (source, Flow) | (Flow, source) | Flow', 'Common', [
                    'src' => 'URI',
					'type' => 'Text',
					'width' => 'Length',
					'height' => 'Length',
					'poster' => 'URI',
					'preload' => 'Enum#auto,metadata,none',
					'controls' => 'Bool',
                ]],
                ['source', 'Block', 'Flow', 'Common', [
					'src' => 'URI',
					'type' => 'Text',
                ]],

				// http://developers.whatwg.org/text-level-semantics.html
                ['s',    'Inline', 'Inline', 'Common'],
                ['var',  'Inline', 'Inline', 'Common'],
                ['sub',  'Inline', 'Inline', 'Common'],
                ['sup',  'Inline', 'Inline', 'Common'],
                ['mark', 'Inline', 'Inline', 'Common'],
                ['wbr',  'Inline', 'Empty', 'Core'],

				// http://developers.whatwg.org/edits.html
                ['ins', 'Block', 'Flow', 'Common', ['cite' => 'URI', 'datetime' => 'CDATA']],
                ['del', 'Block', 'Flow', 'Common', ['cite' => 'URI', 'datetime' => 'CDATA']],
            ],
            'attributes' => [
                ['iframe', 'allowfullscreen', 'Bool'],
                ['table', 'height', 'Text'],
                ['td', 'border', 'Text'],
                ['th', 'border', 'Text'],
                ['tr', 'width', 'Text'],
                ['tr', 'height', 'Text'],
                ['tr', 'border', 'Text'],
            ],
        ],
        'custom_attributes' => [
            ['a', 'target', 'Enum#_blank,_self,_target,_top'],
        ],
        'custom_elements' => [
            ['u', 'Inline', 'Inline', 'Common'],
        ],
        'custom_not_html' => [
            'HTML.Allowed' => '', // Не допускать никаких HTML тегов
        ],
    ],

];
