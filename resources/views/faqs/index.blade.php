<x-app-layout>
    <section class="pl-0 lg:pl-[250px] pt-[50px] sm:pt-[60px] md:pt-[78px] relative h-screen overflow-y-auto z-30 lg:group-[&.mainmenu-collapsed]/maincollapse:pl-[80px] transition-all duration-300">
        <div class="p-5 lg:p-6">
            <div class="flex flex-col sm:flex-row sm:shrink items-start sm:items-center justify-between mb-3">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold mb-2">
                        {{ __('FAQs') }}
                    </h2>
                </div>
                <div>
                    <div class="flex flex-row -mx-2 flex-wrap items-center">
                        <div class="px-2 py-0.5 order-3 sm:order-3">
                            <a href="{{ route('list_faqs') }}" target="_blank" class="inline-block text-center border border-blue-500 rounded-md min-h-[42px] h-auto py-2.5 p-5 text-white bg-blue-500 text-base font-medium leading-tight hover:bg-blue-400 hover:border-blue-400 transition ease-in-out duration-200">FAQ public link</a>
                        </div>
                        <div class="px-2 py-0.5 order-1 sm:order-2">
                            <a href="{{ route('faq.create') }}" class="inline-block text-center border border-blue-500 rounded-md min-h-[42px] h-auto py-2.5 p-5 text-white bg-blue-500 text-base font-medium leading-tight hover:bg-blue-400 hover:border-blue-400 transition ease-in-out duration-200">Create new FAQ</a>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <livewire:faqs.index />
        </div>
    </section>
</x-app-layout>