import tinymce from 'tinymce/tinymce';

// Загрузите темы и плагины по необходимости
import 'tinymce/themes/silver/theme';
import 'tinymce/icons/default';
import 'tinymce/plugins/link';
import 'tinymce/plugins/table';
import 'tinymce/plugins/image';

tinymce.init({
    selector: 'textarea#editor', // Укажите какой селектор вы хотите использовать
    plugins: 'link table image', // Добавьте необходимые плагины
    toolbar: 'undo redo | styleselect | bold italic | link image', // Настройте тулбар
});
