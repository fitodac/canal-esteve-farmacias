<template>
    <div class="container max-w-2xl px-5 mx-auto xl:px-0 text-base sm:text-xl tracking-wide my-2 sm:mt-24 sm:mb-32">
        <div class="w-full flex items-center my-2 sm:py-5 ml-2 sm:ml-12">
            <svg
                style="max-width:100px"
                class="hidden sm:block"
                xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 220 233">
                <g stroke-width="0" fill="#5A5E5F">
                    <path
                        d="M98.5.7C90.3 1.9 77 5.4 69.4 8.4c-14 5.6-23.7 12-35.5 23.6C17.7 48 9.3 62.4 3.8 83.9c-4.9 19.6-4.9 33.8.3 54.3 9.4 37.4 39.6 67.8 78.4 78.5 9.2 2.6 11.4 2.8 28 2.8 13.7 0 19.4-.4 23.7-1.7l5.8-1.6 17.2 8.5c16 7.9 17.6 8.5 22.1 8 3.8-.3 5.6-1.1 8-3.6l3.2-3.2-.2-19.7-.3-19.7 6.4-8c11.6-14.4 20-33.6 22.7-51.5 1.8-12.6.6-34.3-2.4-45-3.1-10.8-5.6-16.9-10.2-25-14.5-25.7-39.8-45.6-66.8-52.6C124.7.5 109.5-.8 98.5.7zm28.6 14.9C152.6 20 175.6 34.7 190 56c24.9 36.7 22 83.9-7.4 118.2l-6.5 7.7.8 18.3c.5 10.1.7 18.5.4 18.8-.2.2-8.4-3.5-18.1-8.4l-17.7-8.8-5.9 1.6c-49.2 13-99.2-13.6-116.4-61.9-1.2-3.3-2.9-10-3.7-14.9-6.1-35.9 8.4-72 37.6-93.7 11.6-8.6 30.3-16.2 44.4-18.2 7.2-1 20.9-.6 29.6.9z"/>
                    <path
                        d="M67 76.6c-8.1 6.9-8.1 21.9 0 28.8 8.6 7.2 19.4-.9 19.4-14.4 0-13.4-10.9-21.5-19.4-14.4zm72.5.7c-3.3 3.3-5.5 8.8-5.5 13.7 0 4.9 2.2 10.4 5.5 13.7 6.1 6.1 14.6 3.8 18.6-5.1 7.1-15.7-7.6-33.3-18.6-22.3zm-38 61.8c-13.8 2-26 9.2-34 20-5.1 7-5.7 10.5-2.2 13.7 4.2 4 6.9 3 12.7-4.9 8.5-11.4 22.8-17 37.5-14.7 11.4 1.7 19.4 6.7 26.6 16.5 4.7 6.3 8.3 7.1 11.8 2.7 2.8-3.5 2.6-5.2-.7-10.5-10.7-16.5-31.4-25.7-51.7-22.8z"/>
                </g>
            </svg>
            <div class="pl-0 sm:pl-4 sm:pl-14 text-lg sm:text-3xl">
                <h3 class="font-bold">Oh-oh,</h3>
                <div>Parece que no has contestado correctamente más del 50%
                    <br class="hidden sm:block"/>
                    de las preguntas.</div>
            </div>
        </div>
        <div class="flex flex-col center-align">
            <div class="flex-1 text-base sm:text-xl text-center">
                El siguiente módulo no se desbloqueará <span class="font-bold">hasta que pases este test.</span>
            </div>
            <button @click.prevent="tryAgain()"
                    class="flex-1 bg-primary-500 text-white text-sm leading-none font-bold
												pt-3 pb-3 px-12 transition-all select-none rounded-full
												hover:opacity-80 mx-auto mt-2 sm:mt-4">
                Volver a intentarlo
            </button>
        </div>
    </div>
</template>

<script>
export default {
    setup(props, { emit }) {
        function tryAgain() {
            emit('try-again-event');
        }
        return {
            tryAgain
        };
    }
};
</script>
