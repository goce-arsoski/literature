<x-app-layout>
    <section class="pl-0 lg:pl-[250px] pt-[50px] sm:pt-[60px] md:pt-[78px] relative h-screen overflow-y-auto z-30 lg:group-[&.mainmenu-collapsed]/maincollapse:pl-[80px] transition-all duration-300">
        <div class="p-5 lg:p-6">


            <div class="mx-auto w-[800px] max-w-full relative">
                <div class="block xxl:inline-block relative xxxl:absolute xxl:-left-[65px] xxl:top-5 mb-2 xxl:mb-0">
                    <a href="{{ route('faq.index') }}" class="pl-[18px] relative inline-block font-bold text-[15px] text-mainbrown">
                        <svg class="absolute left-0 top-1/2 -translate-y-1/2" width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.54919 4.87159L1.83529 5.58333H2.84337H9.16838C9.27889 5.58333 9.38487 5.62723 9.46301 5.70537C9.54115 5.78351 9.58505 5.88949 9.58505 6C9.58505 6.1105 9.54115 6.21649 9.46301 6.29462C9.38487 6.37277 9.27889 6.41666 9.16838 6.41666H2.84337H1.83529L2.54919 7.12841L5.29919 9.87008L5.29996 9.87083C5.33901 9.90957 5.37001 9.95565 5.39116 10.0064C5.41232 10.0572 5.42321 10.1117 5.42321 10.1667C5.42321 10.2217 5.41232 10.2761 5.39116 10.3269C5.37001 10.3777 5.33901 10.4238 5.29996 10.4625L5.29995 10.4625L5.29754 10.4649C5.25881 10.504 5.21272 10.535 5.16195 10.5561C5.11118 10.5773 5.05671 10.5882 5.00171 10.5882C4.9467 10.5882 4.89224 10.5773 4.84147 10.5561C4.7907 10.535 4.74461 10.504 4.70588 10.4649L4.70467 10.4637L0.541766 6.3008C0.505068 6.26177 0.476235 6.21601 0.456858 6.16604L0.456935 6.16601L0.453782 6.15833C0.412108 6.05689 0.412108 5.94311 0.453782 5.84166L0.453859 5.84169L0.456858 5.83396C0.476235 5.78398 0.505068 5.73823 0.541765 5.69919L4.70467 1.53629C4.78345 1.45751 4.8903 1.41325 5.00171 1.41325C5.11312 1.41325 5.21997 1.45751 5.29875 1.53629C5.37753 1.61507 5.42179 1.72191 5.42179 1.83333C5.42179 1.94463 5.37761 2.05138 5.29898 2.13013C5.2989 2.13021 5.29882 2.13029 5.29875 2.13037L2.54919 4.87159Z" fill="#262626" stroke="#000000" stroke-width="0.833334"/>
                        </svg>
                        Back
                    </a>
                </div>

                <div class="w-full rounded-[10px] bg-white shadow-[0px_8px_24px_rgba(0,0,0,0.1);] p-5">

                    <div class="flex flex-row flex-wrap -mx-4">
                        <div class="w-full px-4 py-2">

                            <div class="flex flex-row shrink items-center justify-between mb-1">
                                <div>
                                    <h2 class="text-2xl md:text-3xl font-bold mb-0">
                                        {{ __('Edit Faqs') }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <livewire:faqs.edit :faq="$faq" />
                </div>
            </div>
        </div>
    </section>
</x-app-layout>