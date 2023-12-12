<div class="w-full block">
    <form wire:submit.prevent="submit">
        <div class="flex flex-row flex-wrap -mx-4">
            <div class="w-full px-4 py-2">
                <div wire:loading wire:target="brand_logo">Uploading...</div>
                <div wire:loading wire:target="image">Uploading...</div>
                <div lass="mb-4">
                    @if (session()->has('message'))
                        <div class="text-green-500 font-bold text-lg md:text-2xl">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="w-full md:w-1/2 px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="brand_logo">Brand Logo</label>
                <input type="file" id="brand_logo" wire:model="brand_logo" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-admin-main !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                @error('brand_logo') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full md:w-1/2 px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="brand_text">Brand Text</label>
                <input type="text" id="brand_text" wire:model="brand_text" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-admin-main !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                @error('global_author') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full md:w-1/2 px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="blogs_slug">Blogs Slug</label>
                <input type="text" id="blogs_slug" wire:model="blogs_slug" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-admin-main !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                @error('blogs_slug') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full md:w-1/2 px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="global_author">Global Author</label>
                <input type="text" id="global_author" wire:model="global_author" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-admin-main !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                @error('global_author') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full  px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="global_keywords"> Global Keywords</label>
                <textarea type="text" id="global_keywords" wire:model="global_keywords" class="w-full h-32 border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-admin-main !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300"></textarea>
                @error('global_keywords') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="global_description">Global Description</label>
                <textarea type="text" id="global_description" wire:model="global_description" class="w-full h-32 border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-admin-main !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300"></textarea>
                @error('global_description') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="image">Image</label>
                <input type="file" id="image" wire:model="image" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-admin-main !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                @error('image') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>
            @if ($image)
            <div class="w-full px-4 py-2">
                <p class="block text-neutral-800 font-medium text-base mb-1">Image preview</p>
                <img src="{{ $image->temporaryUrl() }}" class="w-auto max-w-full h-auto inline-block">
            </div>
            @endif

            @if ($old_image != null)
            <div class="w-full px-4 py-2">
                <p class="block text-neutral-800 font-medium text-base mb-1">Previous image</p>
                <img id="old_image" src="{{ $old_image }}" class="w-auto max-w-full h-auto inline-block">
            </div>
            @endif


            <div class="w-full px-4 py-2">
                <h2 class="text-lg md:text-xl font-medium mb-2 pt-3">
                    Theme colors edit
                </h2>
            </div>

            

            <div class="w-full md:w-1/2 px-4 py-2">
  
                <div x-data="{
                    isOpen: false,
                    colors: ['#3b82f6', '#60a5fa', '#dbeafe', '#afbbc9', '#2d3748', '#f56565', '#ed64a6'],
                    colorSelected: @entangle('admin_main')
                  }" x-cloak>
                    <div class="max-w-sm mx-auto">
    
                        <div class="mb-5">
                            <label for="admin-main" class="block font-bold mb-1">Main hover color</label>
                            <div class="flex items-center">
                                <div>
                                    
                                    <input id="admin-main" wire:model="admin_main" type="text"
                                        placeholder="Pick a color"
                                        class="border border-transparent shadow px-4 py-2 leading-normal text-gray-700 bg-white rounded-md focus:outline-none focus:shadow-outline"
                                        x-model="colorSelected">
                                </div>
                                <div class="relative ml-3">
                                    <button type="button" @click="isOpen = !isOpen"
                                        class="w-10 h-10 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow"
                                        :style="`background: ${colorSelected}; color: white`">
                                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24">
                                            <path fill="none"
                                                d="M15.584 10.001L13.998 8.417 5.903 16.512 5.374 18.626 7.488 18.097z" />
                                            <path
                                                d="M4.03,15.758l-1,4c-0.086,0.341,0.015,0.701,0.263,0.949C3.482,20.896,3.738,21,4,21c0.081,0,0.162-0.01,0.242-0.03l4-1 c0.176-0.044,0.337-0.135,0.465-0.263l8.292-8.292l1.294,1.292l1.414-1.414l-1.294-1.292L21,7.414 c0.378-0.378,0.586-0.88,0.586-1.414S21.378,4.964,21,4.586L19.414,3c-0.756-0.756-2.072-0.756-2.828,0l-2.589,2.589l-1.298-1.296 l-1.414,1.414l1.298,1.296l-8.29,8.29C4.165,15.421,4.074,15.582,4.03,15.758z M5.903,16.512l8.095-8.095l1.586,1.584 l-8.096,8.096l-2.114,0.529L5.903,16.512z" />
                                        </svg>
                                    </button>
    
                                    <div x-show="isOpen" @click.away="isOpen = false"
                                        x-transition:enter="transition ease-out duration-100 transform"
                                        x-transition:enter-start="opacity-0 scale-95"
                                        x-transition:enter-end="opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75 transform"
                                        x-transition:leave-start="opacity-100 scale-100"
                                        x-transition:leave-end="opacity-0 scale-95"
                                        class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg z-50">
                                        <div class="rounded-md bg-white shadow-xs px-4 py-3">
                                            <div class="flex flex-wrap -mx-2">
                                                <template x-for="(color, index) in colors" :key="index">
                                                    <div class="px-2">
                                                        <template x-if="colorSelected === color">
                                                            <div class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white"
                                                                :style="`background: ${color}; box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.2);`">
                                                            </div>
                                                        </template>
    
                                                        <template x-if="colorSelected != color">
                                                            <div @click="colorSelected = color"
                                                                @keydown.enter="colorSelected = color" role="checkbox"
                                                                tabindex="0" :aria-checked="colorSelected"
                                                                class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white focus:outline-none focus:shadow-outline"
                                                                :style="`background: ${color};`"></div>
                                                        </template>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="w-full md:w-1/2 px-4 py-2">

                <div x-data="{
                    isOpen: false,
                    colors: ['#3b82f6', '#60a5fa', '#dbeafe', '#afbbc9', '#2d3748', '#f56565', '#ed64a6'],
                    colorSelected: @entangle('admin_hover')
                  }" x-cloak>
                    <div class="max-w-sm mx-auto">
    
                        <div class="mb-5">
                            <label for="admin-main" class="block font-bold mb-1">Main hover color</label>
                            <div class="flex items-center">
                                <div>
                                    
                                    <input id="admin-main" wire:model="admin_hover" type="text"
                                        placeholder="Pick a color"
                                        class="border border-transparent shadow px-4 py-2 leading-normal text-gray-700 bg-white rounded-md focus:outline-none focus:shadow-outline"
                                        x-model="colorSelected">
                                </div>
                                <div class="relative ml-3">
                                    <button type="button" @click="isOpen = !isOpen"
                                        class="w-10 h-10 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow"
                                        :style="`background: ${colorSelected}; color: white`">
                                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24">
                                            <path fill="none"
                                                d="M15.584 10.001L13.998 8.417 5.903 16.512 5.374 18.626 7.488 18.097z" />
                                            <path
                                                d="M4.03,15.758l-1,4c-0.086,0.341,0.015,0.701,0.263,0.949C3.482,20.896,3.738,21,4,21c0.081,0,0.162-0.01,0.242-0.03l4-1 c0.176-0.044,0.337-0.135,0.465-0.263l8.292-8.292l1.294,1.292l1.414-1.414l-1.294-1.292L21,7.414 c0.378-0.378,0.586-0.88,0.586-1.414S21.378,4.964,21,4.586L19.414,3c-0.756-0.756-2.072-0.756-2.828,0l-2.589,2.589l-1.298-1.296 l-1.414,1.414l1.298,1.296l-8.29,8.29C4.165,15.421,4.074,15.582,4.03,15.758z M5.903,16.512l8.095-8.095l1.586,1.584 l-8.096,8.096l-2.114,0.529L5.903,16.512z" />
                                        </svg>
                                    </button>
    
                                    <div x-show="isOpen" @click.away="isOpen = false"
                                        x-transition:enter="transition ease-out duration-100 transform"
                                        x-transition:enter-start="opacity-0 scale-95"
                                        x-transition:enter-end="opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75 transform"
                                        x-transition:leave-start="opacity-100 scale-100"
                                        x-transition:leave-end="opacity-0 scale-95"
                                        class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg z-50">
                                        <div class="rounded-md bg-white shadow-xs px-4 py-3">
                                            <div class="flex flex-wrap -mx-2">
                                                <template x-for="(color, index) in colors" :key="index">
                                                    <div class="px-2">
                                                        <template x-if="colorSelected === color">
                                                            <div class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white"
                                                                :style="`background: ${color}; box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.2);`">
                                                            </div>
                                                        </template>
    
                                                        <template x-if="colorSelected != color">
                                                            <div @click="colorSelected = color"
                                                                @keydown.enter="colorSelected = color" role="checkbox"
                                                                tabindex="0" :aria-checked="colorSelected"
                                                                class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white focus:outline-none focus:shadow-outline"
                                                                :style="`background: ${color};`"></div>
                                                        </template>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="w-full md:w-1/2 px-4 py-2">
                <div x-data="{
                    isOpen: false,
                    colors: ['#3b82f6', '#60a5fa', '#dbeafe', '#afbbc9', '#2d3748', '#f56565', '#ed64a6'],
                    colorSelected: @entangle('admin_sidebar_toggler_bg')
                  }" x-cloak>
                    <div class="max-w-sm mx-auto">
    
                        <div class="mb-5">
                            <label for="admin-main" class="block font-bold mb-1">Sidebar toggler background</label>
                            <div class="flex items-center">
                                <div>
                                    
                                    <input id="admin-main" wire:model="admin_sidebar_toggler_bg" type="text"
                                        placeholder="Pick a color"
                                        class="border border-transparent shadow px-4 py-2 leading-normal text-gray-700 bg-white rounded-md focus:outline-none focus:shadow-outline"
                                        x-model="colorSelected">
                                </div>
                                <div class="relative ml-3">
                                    <button type="button" @click="isOpen = !isOpen"
                                        class="w-10 h-10 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow"
                                        :style="`background: ${colorSelected}; color: white`">
                                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24">
                                            <path fill="none"
                                                d="M15.584 10.001L13.998 8.417 5.903 16.512 5.374 18.626 7.488 18.097z" />
                                            <path
                                                d="M4.03,15.758l-1,4c-0.086,0.341,0.015,0.701,0.263,0.949C3.482,20.896,3.738,21,4,21c0.081,0,0.162-0.01,0.242-0.03l4-1 c0.176-0.044,0.337-0.135,0.465-0.263l8.292-8.292l1.294,1.292l1.414-1.414l-1.294-1.292L21,7.414 c0.378-0.378,0.586-0.88,0.586-1.414S21.378,4.964,21,4.586L19.414,3c-0.756-0.756-2.072-0.756-2.828,0l-2.589,2.589l-1.298-1.296 l-1.414,1.414l1.298,1.296l-8.29,8.29C4.165,15.421,4.074,15.582,4.03,15.758z M5.903,16.512l8.095-8.095l1.586,1.584 l-8.096,8.096l-2.114,0.529L5.903,16.512z" />
                                        </svg>
                                    </button>
    
                                    <div x-show="isOpen" @click.away="isOpen = false"
                                        x-transition:enter="transition ease-out duration-100 transform"
                                        x-transition:enter-start="opacity-0 scale-95"
                                        x-transition:enter-end="opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75 transform"
                                        x-transition:leave-start="opacity-100 scale-100"
                                        x-transition:leave-end="opacity-0 scale-95"
                                        class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg z-50">
                                        <div class="rounded-md bg-white shadow-xs px-4 py-3">
                                            <div class="flex flex-wrap -mx-2">
                                                <template x-for="(color, index) in colors" :key="index">
                                                    <div class="px-2">
                                                        <template x-if="colorSelected === color">
                                                            <div class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white"
                                                                :style="`background: ${color}; box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.2);`">
                                                            </div>
                                                        </template>
    
                                                        <template x-if="colorSelected != color">
                                                            <div @click="colorSelected = color"
                                                                @keydown.enter="colorSelected = color" role="checkbox"
                                                                tabindex="0" :aria-checked="colorSelected"
                                                                class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white focus:outline-none focus:shadow-outline"
                                                                :style="`background: ${color};`"></div>
                                                        </template>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="w-full md:w-1/2 px-4 py-2">
                <div x-data="{
                    isOpen: false,
                    colors: ['#3b82f6', '#60a5fa', '#dbeafe', '#afbbc9', '#2d3748', '#f56565', '#ed64a6'],
                    colorSelected: @entangle('admin_sidebar_toggler_arrow')
                  }" x-cloak>
                    <div class="max-w-sm mx-auto">
    
                        <div class="mb-5">
                            <label for="admin-main" class="block font-bold mb-1">Sidebar toggler arrow fill</label>
                            <div class="flex items-center">
                                <div>
                                    
                                    <input id="admin-main" wire:model="admin_sidebar_toggler_arrow" type="text"
                                        placeholder="Pick a color"
                                        class="border border-transparent shadow px-4 py-2 leading-normal text-gray-700 bg-white rounded-md focus:outline-none focus:shadow-outline"
                                         x-model="colorSelected">
                                </div>
                                <div class="relative ml-3">
                                    <button type="button" @click="isOpen = !isOpen"
                                        class="w-10 h-10 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow"
                                        :style="`background: ${colorSelected}; color: white`">
                                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24">
                                            <path fill="none"
                                                d="M15.584 10.001L13.998 8.417 5.903 16.512 5.374 18.626 7.488 18.097z" />
                                            <path
                                                d="M4.03,15.758l-1,4c-0.086,0.341,0.015,0.701,0.263,0.949C3.482,20.896,3.738,21,4,21c0.081,0,0.162-0.01,0.242-0.03l4-1 c0.176-0.044,0.337-0.135,0.465-0.263l8.292-8.292l1.294,1.292l1.414-1.414l-1.294-1.292L21,7.414 c0.378-0.378,0.586-0.88,0.586-1.414S21.378,4.964,21,4.586L19.414,3c-0.756-0.756-2.072-0.756-2.828,0l-2.589,2.589l-1.298-1.296 l-1.414,1.414l1.298,1.296l-8.29,8.29C4.165,15.421,4.074,15.582,4.03,15.758z M5.903,16.512l8.095-8.095l1.586,1.584 l-8.096,8.096l-2.114,0.529L5.903,16.512z" />
                                        </svg>
                                    </button>
    
                                    <div x-show="isOpen" @click.away="isOpen = false"
                                        x-transition:enter="transition ease-out duration-100 transform"
                                        x-transition:enter-start="opacity-0 scale-95"
                                        x-transition:enter-end="opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75 transform"
                                        x-transition:leave-start="opacity-100 scale-100"
                                        x-transition:leave-end="opacity-0 scale-95"
                                        class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg z-50">
                                        <div class="rounded-md bg-white shadow-xs px-4 py-3">
                                            <div class="flex flex-wrap -mx-2">
                                                <template x-for="(color, index) in colors" :key="index">
                                                    <div class="px-2">
                                                        <template x-if="colorSelected === color">
                                                            <div class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white"
                                                                :style="`background: ${color}; box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.2);`">
                                                            </div>
                                                        </template>
    
                                                        <template x-if="colorSelected != color">
                                                            <div @click="colorSelected = color"
                                                                @keydown.enter="colorSelected = color" role="checkbox"
                                                                tabindex="0" :aria-checked="colorSelected"
                                                                class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white focus:outline-none focus:shadow-outline"
                                                                :style="`background: ${color};`"></div>
                                                        </template>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full px-4 py-2">
                <button type="submit" class="inline-block text-center border border-admin-main rounded-md min-h-[42px] h-auto py-2.5 p-5 text-white bg-admin-main text-base font-medium leading-tight hover:bg-admin-hover hover:border-admin-hover transition ease-in-out duration-200">Save Blog Settings</button>
            </div>
        </div>

    </form>
</div>
