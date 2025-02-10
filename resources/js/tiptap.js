import { Editor } from '@tiptap/core';
import StarterKit from '@tiptap/starter-kit';
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

import { initFlowbite } from 'flowbite'


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

        console.log(content);

        if (content === "null") {

            content = null;

        }


        // tip tap editor setup
        const editor = new Editor({
            element: document.querySelector('#wysiwyg-example'),
            editable: true, //можно ли писать в редакторе
            extensions: [
                StarterKit.configure({
                    textStyle: false,
                    bold: false,
                    marks: {
                        bold: false,
                    },
                }),
                // Include the custom Bold extension
                CustomBold,
                TextStyle,
                FontSizeTextStyle,
                FontFamily,
                Highlight.configure({ multicolor: true }),
                Document,
                Paragraph,
                TextStyle,
                Color.configure({ types: ['textStyle'] }), // Добавляем расширение для цветов
                Underline,
                Link.configure({
                    openOnClick: false,
                    autolink: true,
                    defaultProtocol: 'https',
                }),
                TextAlign.configure({
                    types: ['heading', 'paragraph'],
                }),
                Image.configure({
                    inline: true,
                    allowBase64: true,
                    HTMLAttributes: {
                        class: '!mt-1 !mb-1',
                    },
                }),
                YouTube,
            ],
            content: content ?? '<p><strong>Начни писать статью, ведь великое начинается с малого...</strong></p>',
            editorProps: {
                attributes: {
                    class: 'format lg:format-lg dark:format-invert focus:outline-none format-blue max-w-none',
                },
            },

        });




        // if(content !== "null") {
        //     console.log('вставка контента')
        //     editor.commands.setContent(content);
        //     // editor.commands.setContent("<p>suka</p>");

        //     console.log('После вставки контента');
        // }

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
            const url = window.prompt('Enter image URL:', 'https://flowbite.com');
            editor.chain().focus().toggleLink({ href: url }).run();
        });
        document.getElementById('removeLinkButton').addEventListener('click', () => {
            editor.chain().focus().unsetLink().run()
        });
        document.getElementById('toggleCodeButton').addEventListener('click', () => {
            editor.chain().focus().toggleCode().run();
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
            editor.chain().focus().toggleBlockquote().run();
        });
        document.getElementById('toggleHRButton').addEventListener('click', () => {
            editor.chain().focus().setHorizontalRule().run();
        });
        document.getElementById('addImageButton').addEventListener('click', () => {
            const url = window.prompt('Enter image URL:', 'https://placehold.co/600x400');
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




console.log('Вызов tiptap');
