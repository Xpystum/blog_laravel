<div class="flex flex-col fixed bottom-[5%] right-[2%]">
    <button id="backToTopButton" type="button" class="transform -rotate-[90deg] text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-4 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
        </svg>
        <span class="sr-only">Поднять страницу не вверх</span>
    </button>

    <button id="backToDownButton" type="button" class="transform rotate-90 mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-4 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
        </svg>
        <span class="sr-only">Опустить страницу вниз</span>
    </button>
</div>


@pushOnce('scripts')
    <script>

    let topButton = document.getElementById("backToTopButton");
    let downButton = document.getElementById("backToDownButton");

    topButton.addEventListener("click", function() {
        // Действия при нажатии на кнопку "BackToTopButton"
        topFunction();
    });

    downButton.addEventListener("click", function() {
        downFunction();
    });


    function topFunction() {

        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });

    }

    function downFunction() {

        window.scrollTo({
            top: document.body.scrollHeight,
            behavior: "smooth"
        });

    }

    </script>
@endPushOnce

