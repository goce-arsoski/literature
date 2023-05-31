{{-- @props(['style' => session('flash.bannerStyle', 'success'), 'message' => session('flash.banner')])

<div x-data="{{ json_encode(['show' => true, 'style' => $style, 'message' => $message]) }}"
            :class="{ 'bg-indigo-500': style == 'success', 'bg-red-700': style == 'danger', 'bg-gray-500': style != 'success' && style != 'danger' }"
            style="display: none;"
            x-show="show && message"
            x-init="
                document.addEventListener('banner-message', event => {
                    style = event.detail.style;
                    message = event.detail.message;
                    show = true;
                });
            ">
    <div class="max-w-screen-xl mx-auto py-2 px-3 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between flex-wrap">
            <div class="w-0 flex-1 flex items-center min-w-0">
                <span class="flex p-2 rounded-lg" :class="{ 'bg-indigo-600': style == 'success', 'bg-red-600': style == 'danger' }">
                    <svg x-show="style == 'success'" class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <svg x-show="style == 'danger'" class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                    </svg>
                    <svg x-show="style != 'success' && style != 'danger'" class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                    </svg>
                </span>

                <p class="ml-3 font-medium text-sm text-white truncate" x-text="message"></p>
            </div>

            <div class="shrink-0 sm:ml-3">
                <button
                    type="button"
                    class="-mr-1 flex p-2 rounded-md focus:outline-none sm:-mr-2 transition"
                    :class="{ 'hover:bg-indigo-600 focus:bg-indigo-600': style == 'success', 'hover:bg-red-600 focus:bg-red-600': style == 'danger' }"
                    aria-label="Dismiss"
                    x-on:click="show = false">
                    <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div> --}}


<section class="fixed left-0 top-0 z-[1000] lg:z-40 w-full h-[50px] sm:h-[60px] md:h-[78px] bg-white border-b-[1px] border-b-gray-200 border-solid pl-[0px] lg:pl-[250px] lg:group-[&.mainmenu-collapsed]/maincollapse:pl-[80px]">
    <div class="flex flex-row flex-wrap h-full w-full justify-between items-center pl-3 sm:pl-4 lg:pl-5 pr-4 lg:pr-6 bg-white">
        <div>
            <ul class="flex items-center mb-0 lg:hidden">
                <li class="inline-block mr-2 sm:mr-3">
                    <button x-on:click="isactive = !isactive; togglemenu = !togglemenu" x-bind:class="{'is-active' : isactive}" class="hamburger -scale-[65%] md:-scale-[75%] hamburger--collapse  !p-0" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </li>
                <li class="inline-block">
                    <a href="#" class="flex items-center w-full justify-start flex-row">
                        <img src="{{ Vite::asset('resources/images/si_group_rounded.svg')}}" class="max-w-[35px] sm:max-w-[40px] md:max-w-[48px] h-auto">
                    </a>
                </li>
            </ul>
            
        </div>
        <div class="flex flex-row h-full flex-wrap items-center" x-data="{open:false, active:false}">
            {{-- <div class="h-full block lg:hidden">
                <a href="#" class="tooltip-header group mr-0 sm:mr-2 md:mr-4 flex h-full p-2 sm:p-3 border-solid border-[3px] border-transparent hover:border-b-blue-500 transition-all leading-none [&.active]:border-b-blue-500 relative" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Invite Candidate">
                    <span class="h-full">
                        <span class="flex h-full content-center items-center">
                            <svg  class="fill-[#6B7280] group-hover:fill-blue-500 group-[&.active]:fill-blue-500  transition-all w-4 sm:w-5 h-auto"  width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.6247 6.31242H14.833V5.52075C14.833 5.31079 14.7496 5.10943 14.6011 4.96096C14.4527 4.81249 14.2513 4.72909 14.0413 4.72909C13.8314 4.72909 13.63 4.81249 13.4815 4.96096C13.3331 5.10943 13.2497 5.31079 13.2497 5.52075V6.31242H12.458C12.248 6.31242 12.0467 6.39583 11.8982 6.54429C11.7497 6.69276 11.6663 6.89412 11.6663 7.10408C11.6663 7.31405 11.7497 7.51541 11.8982 7.66388C12.0467 7.81234 12.248 7.89575 12.458 7.89575H13.2497V8.68742C13.2497 8.89738 13.3331 9.09874 13.4815 9.24721C13.63 9.39568 13.8314 9.47908 14.0413 9.47908C14.2513 9.47908 14.4527 9.39568 14.6011 9.24721C14.7496 9.09874 14.833 8.89738 14.833 8.68742V7.89575H15.6247C15.8346 7.89575 16.036 7.81234 16.1845 7.66388C16.3329 7.51541 16.4163 7.31405 16.4163 7.10408C16.4163 6.89412 16.3329 6.69276 16.1845 6.54429C16.036 6.39583 15.8346 6.31242 15.6247 6.31242ZM9.52884 7.67409C9.95126 7.30844 10.2901 6.8562 10.5223 6.34806C10.7545 5.83992 10.8747 5.28777 10.8747 4.72909C10.8747 3.67927 10.4576 2.67245 9.71531 1.93012C8.97297 1.18779 7.96616 0.770752 6.91634 0.770752C5.86653 0.770752 4.85971 1.18779 4.11738 1.93012C3.37505 2.67245 2.95801 3.67927 2.95801 4.72909C2.958 5.28777 3.07818 5.83992 3.3104 6.34806C3.54261 6.8562 3.88143 7.30844 4.30384 7.67409C3.19562 8.17591 2.25538 8.9863 1.59553 10.0083C0.935691 11.0304 0.584173 12.2209 0.583008 13.4374C0.583008 13.6474 0.666415 13.8487 0.814882 13.9972C0.963348 14.1457 1.16471 14.2291 1.37467 14.2291C1.58464 14.2291 1.786 14.1457 1.93447 13.9972C2.08293 13.8487 2.16634 13.6474 2.16634 13.4374C2.16634 12.1776 2.66679 10.9695 3.55758 10.0787C4.44838 9.18786 5.65656 8.68742 6.91634 8.68742C8.17612 8.68742 9.3843 9.18786 10.2751 10.0787C11.1659 10.9695 11.6663 12.1776 11.6663 13.4374C11.6663 13.6474 11.7497 13.8487 11.8982 13.9972C12.0467 14.1457 12.248 14.2291 12.458 14.2291C12.668 14.2291 12.8693 14.1457 13.0178 13.9972C13.1663 13.8487 13.2497 13.6474 13.2497 13.4374C13.2485 12.2209 12.897 11.0304 12.2371 10.0083C11.5773 8.9863 10.6371 8.17591 9.52884 7.67409V7.67409ZM6.91634 7.10408C6.44661 7.10408 5.98743 6.96479 5.59686 6.70383C5.20629 6.44286 4.90189 6.07193 4.72213 5.63796C4.54237 5.20398 4.49534 4.72645 4.58698 4.26575C4.67862 3.80504 4.90481 3.38186 5.23696 3.04971C5.56911 2.71756 5.9923 2.49136 6.453 2.39972C6.91371 2.30808 7.39124 2.35511 7.82521 2.53487C8.25919 2.71463 8.63011 3.01904 8.89108 3.40961C9.15205 3.80017 9.29134 4.25935 9.29134 4.72909C9.29134 5.35897 9.04112 5.96307 8.59572 6.40846C8.15032 6.85386 7.54623 7.10408 6.91634 7.10408Z"/>
                            </svg>
                        </span>
                    </span>
                </a>
            </div>
            <div class="h-full">
                <a href="#" data-bs-toggle="modal" data-bs-target="#reviews-modal" class="tooltip-header group mr-0 sm:mr-2 md:mr-4 flex h-full p-2 sm:p-3 border-solid border-[3px] border-transparent hover:border-b-blue-500 transition-all leading-none [&.active]:border-b-blue-500 relative" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Review">
                    <span class=" min-w-[14px] md:min-w-[18px] h-[14px] md:h-[18px] text-center leading-[14px] md:leading-[18px] text-[10px] md:text-xs px-1 md:px-1.5 text-white font-bold inline-block rounded-full bg-blue-500 absolute left-[60%] top-2.5 z-10">1</span>
                    <span class="h-full">
                        <span class="flex h-full content-center items-center">
                            <svg  class="fill-[#6B7280] group-hover:fill-blue-500 group-[&.active]:fill-blue-500  transition-all w-4 sm:w-5 h-auto" width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.71 14.71L15.29 12.29C15.197 12.1963 15.0864 12.1219 14.9646 12.0711C14.8427 12.0203 14.712 11.9942 14.58 11.9942C14.448 11.9942 14.3173 12.0203 14.1954 12.0711C14.0736 12.1219 13.963 12.1963 13.87 12.29L10.29 15.87C10.1973 15.9634 10.124 16.0743 10.0742 16.1961C10.0245 16.3179 9.99924 16.4484 10 16.58V19C10 19.2652 10.1054 19.5196 10.2929 19.7071C10.4804 19.8946 10.7348 20 11 20H13.42C13.5516 20.0008 13.6821 19.9755 13.8039 19.9258C13.9257 19.876 14.0366 19.8027 14.13 19.71L17.71 16.13C17.8037 16.037 17.8781 15.9264 17.9289 15.8046C17.9797 15.6827 18.0058 15.552 18.0058 15.42C18.0058 15.288 17.9797 15.1573 17.9289 15.0354C17.8781 14.9136 17.8037 14.803 17.71 14.71ZM13 18H12V17L14.58 14.42L15.58 15.42L13 18ZM7 18H3C2.73478 18 2.48043 17.8946 2.29289 17.7071C2.10536 17.5196 2 17.2652 2 17V3C2 2.73478 2.10536 2.48043 2.29289 2.29289C2.48043 2.10536 2.73478 2 3 2H8V5C8 5.79565 8.31607 6.55871 8.87868 7.12132C9.44129 7.68393 10.2044 8 11 8H14V9C14 9.26522 14.1054 9.51957 14.2929 9.70711C14.4804 9.89464 14.7348 10 15 10C15.2652 10 15.5196 9.89464 15.7071 9.70711C15.8946 9.51957 16 9.26522 16 9V7C16 7 16 7 16 6.94C15.9896 6.84813 15.9695 6.75763 15.94 6.67V6.58C15.8919 6.47718 15.8278 6.38267 15.75 6.3L9.75 0.3C9.66734 0.222216 9.57282 0.158081 9.47 0.11C9.44015 0.10576 9.40985 0.10576 9.38 0.11L9.06 0H3C2.20435 0 1.44129 0.316071 0.87868 0.87868C0.316071 1.44129 0 2.20435 0 3V17C0 17.7956 0.316071 18.5587 0.87868 19.1213C1.44129 19.6839 2.20435 20 3 20H7C7.26522 20 7.51957 19.8946 7.70711 19.7071C7.89464 19.5196 8 19.2652 8 19C8 18.7348 7.89464 18.4804 7.70711 18.2929C7.51957 18.1054 7.26522 18 7 18ZM10 3.41L12.59 6H11C10.7348 6 10.4804 5.89464 10.2929 5.70711C10.1054 5.51957 10 5.26522 10 5V3.41ZM5 12H11C11.2652 12 11.5196 11.8946 11.7071 11.7071C11.8946 11.5196 12 11.2652 12 11C12 10.7348 11.8946 10.4804 11.7071 10.2929C11.5196 10.1054 11.2652 10 11 10H5C4.73478 10 4.48043 10.1054 4.29289 10.2929C4.10536 10.4804 4 10.7348 4 11C4 11.2652 4.10536 11.5196 4.29289 11.7071C4.48043 11.8946 4.73478 12 5 12ZM5 8H6C6.26522 8 6.51957 7.89464 6.70711 7.70711C6.89464 7.51957 7 7.26522 7 7C7 6.73478 6.89464 6.48043 6.70711 6.29289C6.51957 6.10536 6.26522 6 6 6H5C4.73478 6 4.48043 6.10536 4.29289 6.29289C4.10536 6.48043 4 6.73478 4 7C4 7.26522 4.10536 7.51957 4.29289 7.70711C4.48043 7.89464 4.73478 8 5 8ZM7 14H5C4.73478 14 4.48043 14.1054 4.29289 14.2929C4.10536 14.4804 4 14.7348 4 15C4 15.2652 4.10536 15.5196 4.29289 15.7071C4.48043 15.8946 4.73478 16 5 16H7C7.26522 16 7.51957 15.8946 7.70711 15.7071C7.89464 15.5196 8 15.2652 8 15C8 14.7348 7.89464 14.4804 7.70711 14.2929C7.51957 14.1054 7.26522 14 7 14Z"/>
                            </svg>

                        </span>
                    </span>
                </a>
            </div>

            <div class="h-full" @mouseover="notificationtoggle = false, open = false, active = false">
                <a href="#" class="@if(Route::is('chat')) active @endif tooltip-header group mr-0 sm:mr-2 md:mr-4 flex h-full p-2 sm:p-3 border-solid border-[3px] border-transparent hover:border-b-blue-500 transition-all leading-none [&.active]:border-b-blue-500 relative" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chats">
                <span class=" min-w-[14px] md:min-w-[18px] h-[14px] md:h-[18px] text-center leading-[14px] md:leading-[18px] text-[10px] md:text-xs px-1 md:px-1.5 text-white font-bold inline-block rounded-full bg-blue-500 absolute left-[60%] top-2.5 z-10">1</span>
                    <span class="h-full">
                        <span class="flex h-full content-center items-center">
                            <svg class="fill-[#6B7280] group-hover:fill-blue-500 group-[&.active]:fill-blue-500  transition-all w-4 sm:w-5 h-auto" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 6H16V3C16 2.20435 15.6839 1.44129 15.1213 0.87868C14.5587 0.316071 13.7956 0 13 0H3C2.20435 0 1.44129 0.316071 0.87868 0.87868C0.316071 1.44129 0 2.20435 0 3V15C0.000985482 15.1974 0.0603878 15.3901 0.170721 15.5539C0.281054 15.7176 0.437381 15.845 0.62 15.92C0.738679 15.976 0.868823 16.0034 1 16C1.13161 16.0008 1.26207 15.9755 1.38391 15.9258C1.50574 15.876 1.61656 15.8027 1.71 15.71L4.52 12.89H6V14.33C6 15.1256 6.31607 15.8887 6.87868 16.4513C7.44129 17.0139 8.20435 17.33 9 17.33H15.92L18.29 19.71C18.3834 19.8027 18.4943 19.876 18.6161 19.9258C18.7379 19.9755 18.8684 20.0008 19 20C19.1312 20.0034 19.2613 19.976 19.38 19.92C19.5626 19.845 19.7189 19.7176 19.8293 19.5539C19.9396 19.3901 19.999 19.1974 20 19V9C20 8.20435 19.6839 7.44129 19.1213 6.87868C18.5587 6.31607 17.7956 6 17 6ZM6 9V10.89H4.11C3.97839 10.8892 3.84793 10.9145 3.72609 10.9642C3.60426 11.014 3.49344 11.0873 3.4 11.18L2 12.59V3C2 2.73478 2.10536 2.48043 2.29289 2.29289C2.48043 2.10536 2.73478 2 3 2H13C13.2652 2 13.5196 2.10536 13.7071 2.29289C13.8946 2.48043 14 2.73478 14 3V6H9C8.20435 6 7.44129 6.31607 6.87868 6.87868C6.31607 7.44129 6 8.20435 6 9ZM18 16.59L17 15.59C16.9074 15.4955 16.7969 15.4203 16.6751 15.3688C16.5532 15.3173 16.4223 15.2906 16.29 15.29H9C8.73478 15.29 8.48043 15.1846 8.29289 14.9971C8.10536 14.8096 8 14.5552 8 14.29V9C8 8.73478 8.10536 8.48043 8.29289 8.29289C8.48043 8.10536 8.73478 8 9 8H17C17.2652 8 17.5196 8.10536 17.7071 8.29289C17.8946 8.48043 18 8.73478 18 9V16.59Z"/>
                            </svg>
                        </span>
                    </span>
                </a>
            </div>

            <div class="h-full relative z-10"   x-bind:class="{'z-[60]' : active}"  @click.away="active = false, notificationtoggle = false"   >
                <a href="#" class="tooltip-header group mr-2 md:mr-4 flex h-full p-2 sm:p-3 border-solid border-[3px] border-transparent hover:border-b-blue-500 [&.active]:border-b-blue-500 transition-all leading-none relative" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Notifications"  x-on:click="open = !open, active = !active, notificationtoggle= !notificationtoggle" x-bind:class="{'active' : active}" >
                    <span class=" min-w-[14px] md:min-w-[18px] h-[14px] md:h-[18px] text-center leading-[14px] md:leading-[18px] text-[10px] md:text-xs px-1 md:px-1.5 text-white font-bold inline-block rounded-full bg-blue-500 absolute left-[60%] top-2.5 z-10">1</span>
                    <span class="h-full">
                        <span class="flex h-full content-center items-center">
                            <svg class="fill-[#6B7280] group-hover:fill-blue-500 group-[&.active]:fill-blue-500 transition-all w-3.5 sm:w-4"  width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 11.18V8C13.9986 6.58312 13.4958 5.21247 12.5806 4.13077C11.6655 3.04908 10.3971 2.32615 9 2.09V1C9 0.734784 8.89464 0.48043 8.70711 0.292893C8.51957 0.105357 8.26522 0 8 0C7.73478 0 7.48043 0.105357 7.29289 0.292893C7.10536 0.48043 7 0.734784 7 1V2.09C5.60294 2.32615 4.33452 3.04908 3.41939 4.13077C2.50425 5.21247 2.00144 6.58312 2 8V11.18C1.41645 11.3863 0.910998 11.7681 0.552938 12.2729C0.194879 12.7778 0.00173951 13.3811 0 14V16C0 16.2652 0.105357 16.5196 0.292893 16.7071C0.48043 16.8946 0.734784 17 1 17H4.14C4.37028 17.8474 4.873 18.5954 5.5706 19.1287C6.26819 19.6621 7.1219 19.951 8 19.951C8.8781 19.951 9.73181 19.6621 10.4294 19.1287C11.127 18.5954 11.6297 17.8474 11.86 17H15C15.2652 17 15.5196 16.8946 15.7071 16.7071C15.8946 16.5196 16 16.2652 16 16V14C15.9983 13.3811 15.8051 12.7778 15.4471 12.2729C15.089 11.7681 14.5835 11.3863 14 11.18ZM4 8C4 6.93913 4.42143 5.92172 5.17157 5.17157C5.92172 4.42143 6.93913 4 8 4C9.06087 4 10.0783 4.42143 10.8284 5.17157C11.5786 5.92172 12 6.93913 12 8V11H4V8ZM8 18C7.65097 17.9979 7.30857 17.9045 7.00683 17.7291C6.70509 17.5536 6.45451 17.3023 6.28 17H9.72C9.54549 17.3023 9.29491 17.5536 8.99317 17.7291C8.69143 17.9045 8.34903 17.9979 8 18ZM14 15H2V14C2 13.7348 2.10536 13.4804 2.29289 13.2929C2.48043 13.1054 2.73478 13 3 13H13C13.2652 13 13.5196 13.1054 13.7071 13.2929C13.8946 13.4804 14 13.7348 14 14V15Z"/>
                            </svg>
                        </span>
                    </span>
                </a>
                
                <div 
                    x-show="open"
                    x-transition:enter="transition ease-out duration-100 bg-white"
                    x-transition:enter-start="transform -translate-y-6 opacity-0"
                    x-transition:enter-end="transform translate-y-0 opacity-100"
                    x-transition:leave="transition ease-in duration-100 bg-transparent"
                    x-transition:leave-start="transform translate-y-0 opacity-100"
                    x-transition:leave-end="transform -translate-y-6 opacity-0"
                    @click.away="open = false"
                    
                    class="absolute top-full right-0 bg-white shadow-lg min-w-full w-[80vw] sm:w-[440px] rounded-lg">

                    <div class="w-full p-4 pb-0">
                        <div class="flex flex-row flex-wrap justify-between items-center">
                            <div>
                                <div class="flex flex-row align-middle -mx-2">
                                    <div class="text-base md:text-lg leading-1 font-bold px-2">Notifications</div>
                                    <div class="text-lg font-bold px-2">
                                        <div class="min-w-[18px] h-[18px] text-center leading-[18px] text-xs px-1.5 align-middle -mt-1 text-white font-bold inline-block rounded-full bg-blue-500 z-10">1</div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a href="#" class="underline text-xs md:text-sm text-neutral-800">Mark all as read</a>
                            </div>
                        </div>
                    </div>

                    <div class="px-4 w-full border-b bordr-gray-400 border-solid mb-4">
                        <div class="flex flex-row justify-between items-center">
                            <div>
                                <div class="flex flex-row flex-wrap align-middle -mx-0.5 -mb-2">
                                    <div class="px-0.5 py-1">
                                        <a href="#" class=" nav-link block font-medium text-xs ssm:text-sm leading-tight border-x-0 border-t-0 border-b-2 text-gray-400 border-transparent px-1 ssm:px-3 py-1 my-1 hover:border-transparent hover:bg-gray-100 focus:border-transparent hover:bg-transparent focus:bg-transparent hover:text-blue-500 focus:text-blue-500 transition-all active [&.active]:!text-blue-500 [&.active]:!border-b-blue-500">All</a>
                                    </div>
                                    <div class="px-0.5 py-1">
                                        <a href="#" class=" nav-link block font-medium text-xs ssm:text-sm leading-tight border-x-0 border-t-0 border-b-2 text-gray-400 border-transparent px-1 ssm:px-3 py-1 my-1 hover:border-transparent hover:bg-gray-100 focus:border-transparent hover:bg-transparent focus:bg-transparent hover:text-blue-500 focus:text-blue-500 transition-all [&.active]:!text-blue-500 [&.active]:!border-b-blue-500">Unread</a>
                                    </div>
                                    <div class="px-0.5 py-1">
                                        <a href="#" class=" nav-link block font-medium text-xs ssm:text-sm leading-tight border-x-0 border-t-0 border-b-2 text-gray-400 border-transparent px-1 ssm:px-3 py-1 my-1 hover:border-transparent hover:bg-gray-100 focus:border-transparent hover:bg-transparent focus:bg-transparent hover:text-blue-500 focus:text-blue-500 transition-all [&.active]:!text-blue-500 [&.active]:!border-b-blue-500">Candidates</a>
                                    </div>
                                    <div class="px-0.5 py-1">
                                        <a href="#" class=" nav-link block font-medium text-xs ssm:text-sm leading-tight border-x-0 border-t-0 border-b-2 text-gray-400 border-transparent px-1 ssm:px-3 py-1 my-1 hover:border-transparent hover:bg-gray-100 focus:border-transparent hover:bg-transparent focus:bg-transparent hover:text-blue-500 focus:text-blue-500 transition-all [&.active]:!text-blue-500 [&.active]:!border-b-blue-500">Clients</a>
                                    </div>
                                </div>
                            </div>
                            <div class="shrink">
                                <a href="#" class="underline text-sm text-neutral-800">
                                    <img src="{{ Vite::asset('resources/images/icon-cog.svg')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class=" overflow-y-auto max-h-[250px] overflow-x-hidden">
                        <p class="text-base md:text-lg pt-2 font-bold mb-1 px-4">Today</p>
                        <div class="flex items-center px-5 py-2 w-full hover:bg-gray-200 hover:cursor-pointer transition-all relative pr-6">
                            <div class="w-[54px] mr-[12px] relative">
                                <img class="w-[44px] h-[44px] rounded-full" src="{{ Vite::asset('resources/images/avatar.png')}}">
                                
                            </div>
                            <div class="w-[calc(100%_-_54px)]">
                                <p class="text-neutral-800 text-sm"><strong>Jerome Bell</strong> updated their passport</p>
                                <p class="mb-0 text-gray-400 text-sm">2h ago</p>
                            </div>
                            <span class="absolute top-1/2 -translate-y-1/2 right-3 w-2 h-2 rounded-full bg-blue-500"></span>
                        </div>

                        <div class="flex items-center px-5 py-2 w-full hover:bg-gray-200 hover:cursor-pointer transition-all relative pr-6">
                            <div class="w-[54px] mr-[12px] relative">
                                <img class="w-[44px] h-[44px] rounded-full" src="{{ Vite::asset('resources/images/avatar.png')}}">
                                
                            </div>
                            <div class="w-[calc(100%_-_54px)]">
                                <p class="text-neutral-800 text-sm"><strong>Jerome Bell</strong> updated their passport</p>
                                <p class="mb-0 text-gray-400 text-sm">2h ago</p>
                            </div>
                            <span class="absolute top-1/2 -translate-y-1/2 right-3 w-2 h-2 rounded-full bg-blue-500"></span>
                        </div>

                        <div class="flex items-center px-5 py-2 w-full hover:bg-gray-200 hover:cursor-pointer transition-all relative pr-6">
                            <div class="w-[54px] mr-[12px] relative">
                                <img class="w-[44px] h-[44px] rounded-full" src="{{ Vite::asset('resources/images/avatar.png')}}">
                                
                            </div>
                            <div class="w-[calc(100%_-_54px)]">
                                <p class="text-neutral-800 text-sm"><strong>Jerome Bell</strong> updated their passport</p>
                                <p class="mb-0 text-gray-400 text-sm">2h ago</p>
                            </div>
                            <span class="absolute top-1/2 -translate-y-1/2 right-3 w-2 h-2 rounded-full bg-blue-500"></span>
                        </div>

                        <hr class="my-2">

                        <p class="text-base md:text-lg font-bold pt-2 mb-1 px-4">This Week</p>

                        <div class="flex items-center px-5 py-2 w-full hover:bg-gray-200 hover:cursor-pointer transition-all relative pr-6">
                            <div class="w-[54px] mr-[12px] relative">
                                <img class="w-[44px] h-[44px] rounded-full" src="{{ Vite::asset('resources/images/avatar.png')}}">
                                
                            </div>
                            <div class="w-[calc(100%_-_54px)]">
                                <p class="text-neutral-800 text-sm"><strong>Jerome Bell</strong> updated their passport</p>
                                <p class="mb-0 text-gray-400 text-sm">2h ago</p>
                            </div>
                            <span class="absolute top-1/2 -translate-y-1/2 right-3 w-2 h-2 rounded-full bg-blue-500"></span>
                        </div>

                        <div class="flex items-center px-5 py-2 w-full hover:bg-gray-200 hover:cursor-pointer transition-all relative pr-6">
                            <div class="w-[54px] mr-[12px] relative">
                                <img class="w-[44px] h-[44px] rounded-full" src="{{ Vite::asset('resources/images/avatar.png')}}">
                                
                            </div>
                            <div class="w-[calc(100%_-_54px)]">
                                <p class="text-neutral-800 text-sm"><strong>Jerome Bell</strong> updated their passport</p>
                                <p class="mb-0 text-gray-400 text-sm">2h ago</p>
                            </div>
                            <span class="absolute top-1/2 -translate-y-1/2 right-3 w-2 h-2 rounded-full bg-blue-500"></span>
                        </div>

                        <div class="flex items-center px-5 py-2 w-full hover:bg-gray-200 hover:cursor-pointer transition-all relative pr-6 rounded-bl-lg rounded-br-lg">
                            <div class="w-[54px] mr-[12px] relative">
                                <img class="w-[44px] h-[44px] rounded-full" src="{{ Vite::asset('resources/images/avatar.png')}}">
                                
                            </div>
                            <div class="w-[calc(100%_-_54px)]">
                                <p class="text-neutral-800 text-sm"><strong>Jerome Bell</strong> updated their passport</p>
                                <p class="mb-0 text-gray-400 text-sm">2h ago</p>
                            </div>
                            <span class="absolute top-1/2 -translate-y-1/2 right-3 w-2 h-2 rounded-full bg-blue-500"></span>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="">
                <div class="flex items-center justify-center">
                    <div class="dropdown h-auto relative z-50">
                        <button class="flex group items-center pr-2 sm:pr-6" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ Vite::asset('resources/images/avatar.png')}}" alt="" class="mr-2 md:mr-3 transition-all rounded-full group-hover:ring-1 ring-slate-500 ring-offset-2 max-h-[30px] sm:max-h-[38px] md:max-h-[54px] h-auto">
                            <span class="font-medium text-gray-500 text-xs md:text-base text-left leading-none hidden sm:inline-block"><strong class="text-[15px] md:text-[18px] block text-neutral-800 font-medium">Jimmy Jones</strong>Admin</span>
                            
                            <svg width="8" height="6" viewBox="0 0 8 6" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute right-0 top-1/2 -translate-y-1/2 transition-all duration-150 rotate-0 group-[&.show]:rotate-180">
                                <path d="M7.74978 0.877274C7.60926 0.737586 7.41917 0.65918 7.22103 0.65918C7.02289 0.65918 6.8328 0.737586 6.69228 0.877274L3.99978 3.53227L1.34478 0.877274C1.20426 0.737586 1.01417 0.65918 0.816028 0.65918C0.617889 0.65918 0.4278 0.737586 0.287278 0.877274C0.216982 0.946996 0.161186 1.02995 0.12311 1.12134C0.0850332 1.21274 0.0654297 1.31077 0.0654297 1.40977C0.0654297 1.50878 0.0850332 1.60681 0.12311 1.69821C0.161186 1.7896 0.216982 1.87255 0.287278 1.94227L3.46728 5.12227C3.537 5.19257 3.61995 5.24837 3.71135 5.28644C3.80274 5.32452 3.90077 5.34412 3.99978 5.34412C4.09879 5.34412 4.19682 5.32452 4.28821 5.28644C4.37961 5.24837 4.46256 5.19257 4.53228 5.12227L7.74978 1.94227C7.82007 1.87255 7.87587 1.7896 7.91395 1.69821C7.95202 1.60681 7.97163 1.50878 7.97163 1.40977C7.97163 1.31077 7.95202 1.21274 7.91395 1.12134C7.87587 1.02995 7.82007 0.946996 7.74978 0.877274Z" fill="#262626"/>
                            </svg>
    
                        </button>
                        <div class=" dropdown-menu w-auto min-w-full absolute z-50 left-auto p-2.5 list-none text-left bg-white rounded-lg shadow-lg hidden m-0 !mt-2.5 border-none" aria-labelledby="dropdownMenuButton1">
                            
                        </div>
                    </div>
                </div>
            </div> --}}




            <div class="relative z-10" x-data={openn:false}  x-bind:class="{'z-[60]' : active}"  @click.away="active = false"   >
                <a href="#" class="group flex group items-center pr-2 sm:pr-6" title="User Profile"  x-on:click="openn = !openn, active = !active" x-bind:class="{'active' : active}" >

                    @if(Auth::user()->profile_photo_path)
                                   
                    <img src="{{asset("storage/".Auth::user()->profile_photo_path)}}" alt="" class="mr-2 md:mr-3 transition-all rounded-full group-hover:ring-1 ring-slate-500 ring-offset-2 h-[30px] sm:h-[38px] md:h-[54px] w-[30px] sm:w-[38px] md:w-[54px] ">
                    @else 
                    <img src="{{asset(Auth::user()->profile_photo_url)}}" alt="" class="mr-2 md:mr-3 transition-all rounded-full group-hover:ring-1 ring-slate-500 ring-offset-2 h-[30px] sm:h-[38px] md:h-[54px] w-[30px] sm:w-[38px] md:w-[54px]">
                    @endif
                        

                    <span class="font-medium text-gray-500 text-xs md:text-base text-left leading-none hidden sm:inline-block"><strong class="text-[15px] md:text-[18px] block text-neutral-800 font-medium">{{Auth::user()->name}}</strong>{{Auth::user()->getRoleNames()->first()}}</span>
                    
                    <svg width="8" height="6" viewBox="0 0 8 6" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute right-0 top-1/2 -translate-y-1/2 transition-all duration-150 rotate-0 group-[&.show]:rotate-180">
                        <path d="M7.74978 0.877274C7.60926 0.737586 7.41917 0.65918 7.22103 0.65918C7.02289 0.65918 6.8328 0.737586 6.69228 0.877274L3.99978 3.53227L1.34478 0.877274C1.20426 0.737586 1.01417 0.65918 0.816028 0.65918C0.617889 0.65918 0.4278 0.737586 0.287278 0.877274C0.216982 0.946996 0.161186 1.02995 0.12311 1.12134C0.0850332 1.21274 0.0654297 1.31077 0.0654297 1.40977C0.0654297 1.50878 0.0850332 1.60681 0.12311 1.69821C0.161186 1.7896 0.216982 1.87255 0.287278 1.94227L3.46728 5.12227C3.537 5.19257 3.61995 5.24837 3.71135 5.28644C3.80274 5.32452 3.90077 5.34412 3.99978 5.34412C4.09879 5.34412 4.19682 5.32452 4.28821 5.28644C4.37961 5.24837 4.46256 5.19257 4.53228 5.12227L7.74978 1.94227C7.82007 1.87255 7.87587 1.7896 7.91395 1.69821C7.95202 1.60681 7.97163 1.50878 7.97163 1.40977C7.97163 1.31077 7.95202 1.21274 7.91395 1.12134C7.87587 1.02995 7.82007 0.946996 7.74978 0.877274Z" fill="#262626"/>
                    </svg>
                </a>
                
                <div 
                    x-show="openn"
                    x-transition:enter="transition ease-out duration-100 bg-white"
                    x-transition:enter-start="transform -translate-y-6 opacity-0"
                    x-transition:enter-end="transform translate-y-0 opacity-100"
                    x-transition:leave="transition ease-in duration-100 bg-transparent"
                    x-transition:leave-start="transform translate-y-0 opacity-100"
                    x-transition:leave-end="transform -translate-y-6 opacity-0"
                    @click.away="openn = false"
                    
                    class="absolute top-full right-0 bg-white shadow-lg min-w-full w-[150px] sm:w-[200px] rounded-lg p-3">

                    <ul class="m-0">
                        <li class="pb-2.5">
                            <a href="{{ route('profile.show') }}" class="@if(Route::is('profile.show')) active @endif block group py-2 pr-2 pl-10 sm:pl-12 text-base md:text-lg relative text-gray-500 leading-tight rounded-lg bg-transparent font-normal transition-all duration-300  hover:bg-blue-50 hover:text-blue-500  focus:bg-blue-50 focus:text-blue-500 hover:font-bold [&.active]:text-blue-500 [&.active]:font-bold [&.active]:bg-blue-50">
                                <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-[#6B7280] group-hover:fill-blue-500 transition-all duration-300 absolute left-3 top-1/2 -translate-y-1/2 z-10 inline-block group-[&.active]:fill-blue-500 w-4 sm:w-5">
                                    <path d="M13.7105 11.7101C14.6909 10.9388 15.4065 9.88105 15.7577 8.68407C16.109 7.48709 16.0784 6.21039 15.6703 5.03159C15.2621 3.85279 14.4967 2.83052 13.4806 2.10698C12.4644 1.38344 11.2479 0.994629 10.0005 0.994629C8.75303 0.994629 7.5366 1.38344 6.52041 2.10698C5.50423 2.83052 4.73883 3.85279 4.3307 5.03159C3.92257 6.21039 3.892 7.48709 4.24325 8.68407C4.59449 9.88105 5.31009 10.9388 6.29048 11.7101C4.61056 12.3832 3.14477 13.4995 2.04938 14.94C0.953983 16.3806 0.270048 18.0914 0.070485 19.8901C0.0560396 20.0214 0.0676015 20.1543 0.10451 20.2812C0.141419 20.408 0.202952 20.5264 0.285596 20.6294C0.452504 20.8376 0.695269 20.971 0.960485 21.0001C1.2257 21.0293 1.49164 20.9519 1.69981 20.785C1.90798 20.6181 2.04131 20.3753 2.07049 20.1101C2.29007 18.1553 3.22217 16.3499 4.6887 15.0389C6.15524 13.7279 8.05338 13.0032 10.0205 13.0032C11.9876 13.0032 13.8857 13.7279 15.3523 15.0389C16.8188 16.3499 17.7509 18.1553 17.9705 20.1101C17.9977 20.3558 18.1149 20.5828 18.2996 20.7471C18.4843 20.9115 18.7233 21.0016 18.9705 21.0001H19.0805C19.3426 20.97 19.5822 20.8374 19.747 20.6314C19.9119 20.4253 19.9886 20.1625 19.9605 19.9001C19.76 18.0963 19.0724 16.3811 17.9713 14.9383C16.8703 13.4955 15.3974 12.3796 13.7105 11.7101V11.7101ZM10.0005 11.0001C9.20936 11.0001 8.436 10.7655 7.7782 10.326C7.12041 9.88648 6.60772 9.26176 6.30497 8.53086C6.00222 7.79995 5.923 6.99569 6.07734 6.21976C6.23168 5.44384 6.61265 4.73111 7.17206 4.1717C7.73147 3.61229 8.4442 3.23132 9.22012 3.07698C9.99605 2.92264 10.8003 3.00186 11.5312 3.30461C12.2621 3.60736 12.8868 4.12005 13.3264 4.77784C13.7659 5.43564 14.0005 6.209 14.0005 7.00012C14.0005 8.06099 13.5791 9.07841 12.8289 9.82855C12.0788 10.5787 11.0614 11.0001 10.0005 11.0001Z"/>
                                </svg>
                                Profile
                            </a>
                        </li>
                        <li class="pb-0">
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <a href="{{ route('logout') }}" @click.prevent="$root.submit();" class="block group py-2 pr-2 pl-10 sm:pl-12 text-base md:text-lg relative text-gray-500 leading-tight rounded-lg bg-transparent font-normal transition-all duration-300  hover:bg-blue-50 hover:text-blue-500  focus:bg-blue-50 focus:text-blue-500 hover:font-bold">
                                    <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-[#6B7280] group-hover:fill-blue-500 transition-all duration-300 absolute left-3.5 top-1/2 -translate-y-1/2 z-10 inline-block w-3.5 sm:w-4">
                                        <path d="M0 10C0 10.2652 0.105357 10.5196 0.292893 10.7071C0.48043 10.8946 0.734784 11 1 11H8.59L6.29 13.29C6.19627 13.383 6.12188 13.4936 6.07111 13.6154C6.02034 13.7373 5.9942 13.868 5.9942 14C5.9942 14.132 6.02034 14.2627 6.07111 14.3846C6.12188 14.5064 6.19627 14.617 6.29 14.71C6.38296 14.8037 6.49356 14.8781 6.61542 14.9289C6.73728 14.9797 6.86799 15.0058 7 15.0058C7.13201 15.0058 7.26272 14.9797 7.38458 14.9289C7.50644 14.8781 7.61704 14.8037 7.71 14.71L11.71 10.71C11.801 10.6149 11.8724 10.5028 11.92 10.38C12.02 10.1365 12.02 9.86346 11.92 9.62C11.8724 9.49725 11.801 9.3851 11.71 9.29L7.71 5.29C7.61676 5.19676 7.50607 5.1228 7.38425 5.07234C7.26243 5.02188 7.13186 4.99591 7 4.99591C6.86814 4.99591 6.73757 5.02188 6.61575 5.07234C6.49393 5.1228 6.38324 5.19676 6.29 5.29C6.19676 5.38324 6.1228 5.49393 6.07234 5.61575C6.02188 5.73757 5.99591 5.86814 5.99591 6C5.99591 6.13186 6.02188 6.26243 6.07234 6.38425C6.1228 6.50607 6.19676 6.61676 6.29 6.71L8.59 9H1C0.734784 9 0.48043 9.10536 0.292893 9.29289C0.105357 9.48043 0 9.73478 0 10V10ZM13 0H3C2.20435 0 1.44129 0.316071 0.87868 0.87868C0.316071 1.44129 0 2.20435 0 3V6C0 6.26522 0.105357 6.51957 0.292893 6.70711C0.48043 6.89464 0.734784 7 1 7C1.26522 7 1.51957 6.89464 1.70711 6.70711C1.89464 6.51957 2 6.26522 2 6V3C2 2.73478 2.10536 2.48043 2.29289 2.29289C2.48043 2.10536 2.73478 2 3 2H13C13.2652 2 13.5196 2.10536 13.7071 2.29289C13.8946 2.48043 14 2.73478 14 3V17C14 17.2652 13.8946 17.5196 13.7071 17.7071C13.5196 17.8946 13.2652 18 13 18H3C2.73478 18 2.48043 17.8946 2.29289 17.7071C2.10536 17.5196 2 17.2652 2 17V14C2 13.7348 1.89464 13.4804 1.70711 13.2929C1.51957 13.1054 1.26522 13 1 13C0.734784 13 0.48043 13.1054 0.292893 13.2929C0.105357 13.4804 0 13.7348 0 14V17C0 17.7956 0.316071 18.5587 0.87868 19.1213C1.44129 19.6839 2.20435 20 3 20H13C13.7956 20 14.5587 19.6839 15.1213 19.1213C15.6839 18.5587 16 17.7956 16 17V3C16 2.20435 15.6839 1.44129 15.1213 0.87868C14.5587 0.316071 13.7956 0 13 0Z"/>
                                    </svg>
                                    Log Out
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
    </div>
</section>