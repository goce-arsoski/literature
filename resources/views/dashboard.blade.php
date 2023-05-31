<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div> --}}


    <section class="pl-0 lg:pl-[250px] pt-[50px] sm:pt-[60px] md:pt-[78px] relative h-screen overflow-y-auto z-30 lg:group-[&.mainmenu-collapsed]/maincollapse:pl-[80px] transition-all duration-300">

        <div class="p-5 lg:p-6">
            <h2 class="text-2xl md:text-3xl font-bold mb-4">
                {{ __('Dashboard') }}
            </h2>

            <p class="text-xl">Welcome to project dashboard. Use left sidebar menu to navigate through page! Thanks.</p>
        </div>
    </section>

</x-app-layout>
