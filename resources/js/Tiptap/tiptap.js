import { Editor } from '@tiptap/core';
import Paragraph from '@tiptap/extension-paragraph'
import Document from '@tiptap/extension-document'
import Highlight from '@tiptap/extension-highlight';
import Underline from '@tiptap/extension-underline';
import Link from '@tiptap/extension-link';
import TextAlign from '@tiptap/extension-text-align';
import Image from '@tiptap/extension-image';
import YouTube from '@tiptap/extension-youtube';
import TextStyle from '@tiptap/extension-text-style';
import FontFamily from '@tiptap/extension-font-family';
import { Color } from '@tiptap/extension-color';
import Bold from '@tiptap/extension-bold';
import HorizontalRule from '@tiptap/extension-horizontal-rule';
import Blockquote from '@tiptap/extension-blockquote';
import CodeBlock from '@tiptap/extension-code-block';
import ListItem from '@tiptap/extension-list-item';
import OrderedList from '@tiptap/extension-ordered-list';
import BulletList from '@tiptap/extension-bullet-list';
import Text from '@tiptap/extension-text';
import Italic from '@tiptap/extension-italic';
import Strike from '@tiptap/extension-strike';

import { initFlowbite } from 'flowbite'

export const editor = null;

window.addEventListener('DOMContentLoaded', function () {

    if (document.getElementById("wysiwyg-example")) {

        initFlowbite();

        const FontSizeTextStyle = TextStyle.extend({
            addAttributes() {
                return {
                    fontSize: {
                        default: null,
                        parseHTML: element => element.style.fontSize,
                        renderHTML: attributes => {
                            if (!attributes.fontSize) {
                                return {};
                            }
                            return { style: 'font-size: ' + attributes.fontSize };
                        },
                    },
                };
            },
        });

        const CustomBold = Bold.extend({
            // Override the renderHTML method
            renderHTML({ mark, HTMLAttributes }) {
                const { style, ...rest } = HTMLAttributes;

                // Merge existing styles with font-weight
                const newStyle = 'font-weight: bold;' + (style ? ' ' + style : '');

                return ['span', { ...rest, style: newStyle.trim() }, 0];
            },
            // Ensure it doesn't exclude other marks
            addOptions() {
                return {
                    ...this.parent?.(),
                    HTMLAttributes: {},
                };
            },
        });

        const dataElement = document.getElementById('hiddenContent_input_tiptap');
        let content = dataElement.value;

        // tip tap editor setup
        editor = new Editor({
            element: document.querySelector('#wysiwyg-example'),
            editable: true, //можно ли писать в редакторе
            extensions: [
                Text,
                Strike,
                CustomBold,
                FontSizeTextStyle,
                FontFamily,
                Highlight.configure({ multicolor: true }),
                Document,
                Paragraph,
                Italic,
                Color.configure({ types: ['textStyle'] }), // Добавляем расширение для цветов
                Underline,
                BulletList.configure({
                    HTMLAttributes: {
                      class: 'ul-tip-tap',
                    },
                    keepAttributes: true,
                    keepMarks: true,
                }),
                ListItem,
                OrderedList.configure({
                    HTMLAttributes: {
                      class: 'ol-tip-tap',
                    },
                }),
                HorizontalRule.configure({
                    HTMLAttributes: {
                      class: 'border-t border-gray-700 my-4'
                    },
                }),
                Blockquote.configure({
                    HTMLAttributes: {
                      class: "border-l-4 border-gray-300 pl-4 italic text-gray-600 my-4"
                    }
                }),
                Link.configure({
                    openOnClick: true,
                    autolink: true,
                    HTMLAttributes: {
                        class: 'font-medium underline text-[#3b82f6] hover:no-underline',
                    },
                }),
                CodeBlock.configure({
                    languageClassPrefix: 'language-',
                    exitOnTripleEnter: true,
                    HTMLAttributes: {
                        style: 'white-space: pre-wrap; overflow-x: hidden;',
                        class: 'pre-tiptap text-gray-300 bg-gray-700 font-normal text-sm leading-relaxed my-7 rounded-md py-3.5 px-5',
                    },
                }),
                TextAlign.configure({
                    types: ['heading', 'paragraph'],
                }),
                Image.configure({
                    inline: true,
                    allowBase64: true,
                    HTMLAttributes: {
                        class: '!mt-1 !mb-1 !inline',
                    },
                }),
                YouTube.configure({
                    inline: true,
                    nocookie: false,
                    enableIFrameApi: true,
                    interfaceLanguage: 'ru',
                    // HTMLAttributes: {
                    //     class: '!mt-1 !mb-1 !inline',
                    // },
                }),
            ],
            content: '<p><strong>Начни писать статью, ведь великое начинается с малого...</strong></p>',
            editorProps: {
                attributes: {
                    class: 'format lg:format-lg dark:format-invert focus:outline-none format-blue max-w-none',
                },
            },

        });

        //что бы получат editor все этого файла
        window.dispatchEvent(new CustomEvent("tiptap-editor-ready", { detail: editor }));

        if(content !== "null") {

            editor.commands.setContent(content);

        }

        const button = document.getElementById("text-editor__tiptap-button").addEventListener('click', (event) => {

            dataElement.value = editor.getHTML();

        })

        // set up custom event listeners for the buttons
        document.getElementById('toggleBoldButton').addEventListener('click', () => editor.chain().focus().toggleBold().run());
        document.getElementById('toggleItalicButton').addEventListener('click', () => editor.chain().focus().toggleItalic().run());
        document.getElementById('toggleUnderlineButton').addEventListener('click', () => editor.chain().focus().toggleUnderline().run());
        document.getElementById('toggleStrikeButton').addEventListener('click', () => editor.chain().focus().toggleStrike().run());
        document.getElementById('toggleHighlightButton').addEventListener('click', () => {
            const isHighlighted = editor.isActive('highlight');
            // when using toggleHighlight(), judge if is is already highlighted.
            editor.chain().focus().toggleHighlight({
                color: isHighlighted ? undefined : '#ffc078' // if is already highlighted，unset the highlight color
            }).run();
        });

        document.getElementById('toggleLinkButton').addEventListener('click', () => {
            const url = window.prompt('Enter image URL:', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ');
            editor.chain().focus().toggleLink({ href: url }).run();
        });
        document.getElementById('removeLinkButton').addEventListener('click', () => {
            editor.chain().focus().unsetLink().run()
        });
        document.getElementById('toggleCodeButton').addEventListener('click', () => {
            editor.commands.setCodeBlock();
        })
        document.getElementById('toggleLeftAlignButton').addEventListener('click', () => {
            editor.chain().focus().setTextAlign('left').run();
        });
        document.getElementById('toggleCenterAlignButton').addEventListener('click', () => {
            editor.chain().focus().setTextAlign('center').run();
        });
        document.getElementById('toggleRightAlignButton').addEventListener('click', () => {
            editor.chain().focus().setTextAlign('right').run();
        });
        document.getElementById('toggleListButton').addEventListener('click', () => {
            editor.chain().focus().toggleBulletList().run();
        });
        document.getElementById('toggleOrderedListButton').addEventListener('click', () => {
            editor.chain().focus().toggleOrderedList().run();
        });
        document.getElementById('toggleBlockquoteButton').addEventListener('click', () => {
            editor.commands.toggleBlockquote();
        });
        document.getElementById('toggleHRButton').addEventListener('click', () => {
            editor.commands.setHorizontalRule();
            // editor.chain().focus().setHorizontalRule().run();
        });


        document.getElementById('addImageButton').addEventListener('click', () => {
            const url = window.prompt('Enter image URL:', 'https://img-webcalypt.ru/uploads/admin/images/meme-templates/pdGiOwX5FxcORGiMFf6ZTwExLVG9MNUS.jpg');
            if (url) {
                editor.chain().focus().setImage({ src: url }).run();
            }
        });
        document.getElementById('addVideoButton').addEventListener('click', () => {
            const url = window.prompt('Enter YouTube URL:', 'https://www.youtube.com/watch?v=KaLxCiilHns');
            if (url) {
                editor.commands.setYoutubeVideo({
                    src: url,
                    width: 640,
                    height: 480,
                })
            }
        });


        // typography dropdown
        const typographyDropdown = FlowbiteInstances.getInstance('Dropdown', 'typographyDropdown');


        document.getElementById('toggleParagraphButton').addEventListener('click', () => {
            editor.chain().focus().setParagraph().run();
            typographyDropdown.hide();
        });

        document.querySelectorAll('[data-heading-level]').forEach((button) => {
            button.addEventListener('click', () => {
                const level = button.getAttribute('data-heading-level');
                editor.chain().focus().toggleHeading({ level: parseInt(level) }).run()
                typographyDropdown.hide();
            });
        });

        const textSizeDropdown = FlowbiteInstances.getInstance('Dropdown', 'textSizeDropdown');

        // Loop through all elements with the data-text-size attribute
        document.querySelectorAll('[data-text-size]').forEach((button) => {
            button.addEventListener('click', () => {
                const fontSize = button.getAttribute('data-text-size');

                // Apply the selected font size via pixels using the TipTap editor chain
                editor.chain().focus().setMark('textStyle', { fontSize }).run();

                // Hide the dropdown after selection
                textSizeDropdown.hide();
            });
        });


        // Слушаем изменения в color picker
        const colorPicker = document.getElementById('color');
        colorPicker.addEventListener('input', (event) => {
            const selectedColor = event.target.value;

            // Применяем выбранный цвет к выделенному тексту
            editor.chain().focus().setColor(selectedColor).run();
        });

        // Обрабатываем нажатие на кнопки с цветами
        document.querySelectorAll('[data-hex-color]').forEach((button) => {
            button.addEventListener('click', () => {
                const selectedColor = button.getAttribute('data-hex-color');

                // Применяем выбранный цвет к выделенному тексту
                editor.chain().focus().setColor(selectedColor).run();
            });
        });

        // Сброс цвета
        document.getElementById('reset-color').addEventListener('click', () => {
            editor.chain().focus().unsetColor().run();
        });



        const fontFamilyDropdown = FlowbiteInstances.getInstance('Dropdown', 'fontFamilyDropdown');

        // Loop through all elements with the data-font-family attribute
        document.querySelectorAll('[data-font-family]').forEach((button) => {
            button.addEventListener('click', () => {
                const fontFamily = button.getAttribute('data-font-family');

                // Apply the selected font size via pixels using the TipTap editor chain
                editor.chain().focus().setFontFamily(fontFamily).run();

                // Hide the dropdown after selection
                fontFamilyDropdown.hide();
            });
        });
    }

})



