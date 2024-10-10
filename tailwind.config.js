/** @type {import('tailwindcss').Config} */

export default {

    darkMode: 'class',
    content: [
       "./resources/**/*.{blade.php,js,vue}",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            height: {
                'custom-height': '74px',
            },
            backgroundOpacity: ['active'],
            colors: {
                'dark-gray-opacity': 'rgba(31, 41, 55, 0.5)', // Добавьте этот цвет
            },
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}
