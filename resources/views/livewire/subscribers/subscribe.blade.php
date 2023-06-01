<div class="px-5 xl:px-6 w-[1440px] max-w-full block mx-auto text-center relative z-20">
    <div class="w-full px-4">
        @if (session()->has('message'))
            <div class="text-green-500 font-bold text-lg md:text-2xl">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="w-[945px] max-w-full rounded-md shadow-[0px_4px_24px_rgba(0,0,0,0.15)] px-[20px] sm:px-[35px] md:px-[80px] py-[28px] bg-white relative inline-block text-left">
        <h3 class="text-4xl md:text-5xl xl:text-6xl !leading-[140%] font-bold mb-4">Subscribe!</h3>
        <p class="w-[444px] max-w-full mb-6 text-lg">Subscribe and be notified when we launch the application!</p>
        <form wire:submit.prevent="submit" class="mb-0">
            <div class="flex flex-row flex-wrap -mx-2">
                <div class="w-full sm:w-[calc(100%_-_240px)] px-2 py-1">
                    <label for="email" class="hidden">Your email</label>
                    <input wire:model="email" type="email" name="email" id="email" placeholder="Your email" class="w-full font-normal text-lg md:text-xl text-colormain placeholder:text-gray-500 min-h-[52px] py-2 px-4 bg-white transition-all rounded-md border-gray-300 border-solid border focus:border-colormain">
                </div>
                <div class="w-full sm:w-[240px] px-2 py-1">
                    <button type="submit" class="w-full font-bold text-lg md:text-xl text-white min-h-[52px] py-2 px-2 bg-blue-500 transition-all hover:bg-blue-600 rounded-md">Subscribe me</button>
                </div>
            </div>
        </form>
    </div>
</div>