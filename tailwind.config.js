/** @type {import('tailwindcss').Config} */

export default {

    darkMode: 'class',
    content: [
       "./resources/**/*.{blade.php,js,vue}",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            width:{
                'custom-width-button-link' : '114px',
            },
            screens: {
                'mob-l': '425px',
                'mob-m': '375px',
                'mob-s': '320px',
                'max-mob-l': {'max': '425px'}, // добавьте этот ключ
                'max-mob-m': {'max': '375px'}, // добавьте этот ключ
                'max-mob-s': {'max': '320px'}, // добавьте этот ключ
                'max-mob-s-not-equally': {'max': '319px'}, // добавьте этот ключ


                'max-md': {'max': '768px'},
                'max-sm': {'max': '640px'},
            },
            variants: {
                extend: {
                  overflow: ['max-mob-s-not-equally'],
                },
            },
            height: {

                'custom-height': '74px',
                '85vh': '85vh', // 90% высоты видимой области экрана
            },
            backgroundOpacity: ['active'],
            colors: {
                'dark-gray-opacity': 'rgba(31, 41, 55, 0.5)', // Добавьте этот цвет
                'dark-black-opacity': 'rgba(0, 0, 0, 0.9)', // Добавьте этот цвет
                primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a","950":"#172554"},
            },
        },
        fontFamily: {
            'body': [
                'Inter',
                'ui-sans-serif',
                'system-ui',
                '-apple-system',
                'system-ui',
                'Segoe UI',
                'Roboto',
                'Helvetica Neue',
                'Arial',
                'Noto Sans',
                'sans-serif',
                'Apple Color Emoji',
                'Segoe UI Emoji',
                'Segoe UI Symbol',
                'Noto Color Emoji'
            ],
            'sans': [
                'Inter',
                'ui-sans-serif',
                'system-ui',
                '-apple-system',
                'system-ui',
                'Segoe UI',
                'Roboto',
                'Helvetica Neue',
                'Arial',
                'Noto Sans',
                'sans-serif',
                'Apple Color Emoji',
                'Segoe UI Emoji',
                'Segoe UI Symbol',
                'Noto Color Emoji'
            ]
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}
