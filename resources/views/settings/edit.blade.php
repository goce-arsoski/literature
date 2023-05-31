<x-app-layout>

    <section class="pl-0 lg:pl-[250px] pt-[50px] sm:pt-[60px] md:pt-[78px] relative h-screen overflow-y-auto z-30 lg:group-[&.mainmenu-collapsed]/maincollapse:pl-[80px] transition-all duration-300">
        <div class="p-5 lg:p-6">


            <div class="mx-auto w-[800px] max-w-full relative">
                <div class="w-full rounded-[10px] bg-white shadow-[0px_8px_24px_rgba(0,0,0,0.1);] p-5">

                    <div class="flex flex-row flex-wrap -mx-4">
                        <div class="w-full px-4 py-2">

                            <div class="flex flex-row shrink items-center justify-between mb-1">
                                <div>
                                    <h2 class="text-2xl md:text-3xl font-bold mb-0">
                                        {{ __('Edit Settings') }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <livewire:settings.edit :settings="$settings" />
                </div>
            </div>
        </div>
    </section>

</x-app-layout>