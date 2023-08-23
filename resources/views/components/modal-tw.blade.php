@props(['name'])

<style>
    .undefined {
        display: none !important;
    }
</style>

<!-- Modal -->
<div data-te-modal-init
    class="fixed hidden left-0 top-0 z-[1055]  h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="modaltw" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[0px]:m-0 min-[0px]:h-full min-[0px]:max-w-none">
        <div
            class="pointer-events-auto relative flex w-full flex-col rounded-md bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600 min-[0px]:h-full min-[0px]:rounded-none min-[0px]:border-0">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50 min-[0px]:rounded-none">
                <!-- Modal title -->
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalFullscreenLabel">

                </h5>
                <!-- Close button -->
                <button type="button"
                    class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                    data-te-modal-dismiss aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal body -->
            <div class="relative p-4 min-[0px]:overflow-y-auto">



                <section class="content-inner-1">
                    {{ $slot }}
                </section>

            </div>

            <!-- Modal footer -->
            <div
                class="mt-auto flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50 min-[0px]:rounded-none">
                <button type="button"
                    class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                    data-te-modal-dismiss>
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
