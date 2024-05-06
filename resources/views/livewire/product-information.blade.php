<div class="flex flex-col h-full py-5 overflow-y-scroll bg-white border-l shadow-lg border-neutral-100/70">
    @if ($product)

        <div class="px-4 sm:px-5 ">
            <div class="flex items-start justify-between pb-1 ">
                <h2 class="text-base  leading-6 text-gray-900" id="slide-over-title"><span class="font-semibold">Product: {{$product->title}}</span></h2>
                <div class="flex items-center h-auto ml-3">
                    <button @click="slideOverOpen = false; $dispatch('reset-tabs')"
                            class="absolute top-0 right-0 z-30 flex items-center justify-center px-3 py-2 mt-4 mr-5 space-x-1 text-xs font-medium uppercase border rounded-md border-neutral-200 text-neutral-600 hover:bg-neutral-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        <span>Close</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="relative flex-1 px-4 mt-5 sm:px-5">
            <div class="absolute inset-0 px-4 sm:px-5">
                <div class="relative h-full overflow-hidden">

                    <div class="container mx-auto grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 pt-6 gap-8">


                        <div class="px-4 py-4 col-span-2">
                            <div
                                    class="lg:max-w-[1440px] md:max-w-[744px] max-w-[373px] lg:px-10 md:px-6 px-4 py-4 bg-white mx-auto"
                            >
                                <div class="lg:flex">
                                    <div>
                                        <img
                                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/10%2C2.png"
                                                alt=""
                                        />
                                    </div>
                                    <div class="bg-gray-50 lg:px-12 md:px-6 px-4 lg:py-4  md:py-4  py-4 ">
                                        <p
                                                class="lg:text-4xl text-3xl font-semibold text-gray-800 lg:max-w-[528px] w-full"
                                        >
                                            {{$product->title}}
                                        </p>
                                        <p class="text-2xl font-semibold leading-normal text-gray-800 mt-6">
                                            {{number_format($product->price,2)}}
                                        </p>

                                        <div class="mt-8">
                                            <ul class="marker:text-gray-600 list-disc px-4">
                                                <li class=" ">
                                                    <p
                                                            class="text-base text-gray-600 leading-normal lg:max-w-[528px] w-full"
                                                    >
                                                        {{$product->description}}
                                                    </p>
                                                </li>
                                                <li class="mt-6">
                                                </li>
                                            </ul>
                                        </div>


                                    </div>
                                </div>
                                <div class="lg:block md:hidden block">
                                    <div class="lg:flex gap-1 justify-evenly mt-8">

                                        @foreach(explode(' ',$product->tags) as $tag)

                                            <div class="flex items-center lg:items-start xl:items-center gap-2">
                                                <p class="text-base leading-none text-gray-600">
                                                    {{ $tag}}
                                                </p>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                                <div class="lg:hidden md:block hidden mt-6">
                                    <div class="flex justify-between">
                                        <div class="flex items-center lg:items-start xl:items-center gap-2">
                                            <svg
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                        d="M3.75 10.7431L5.52094 6.62265C5.80922 5.95188 6.54375 5.50781 7.36453 5.50781H16.6355C17.4563 5.50781 18.1908 5.95188 18.4791 6.62265L20.25 10.7431"
                                                        stroke="#4B5563"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                />
                                                <path
                                                        d="M20.25 17.4733V10.7422H12H3.75V17.4733H20.25Z"
                                                        stroke="#4B5563"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                />
                                                <path
                                                        d="M5.25047 17.4766V18.9724H3.75V17.4766"
                                                        stroke="#4B5563"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                />
                                                <path
                                                        d="M20.2505 17.4766V18.9724H18.75V17.4766"
                                                        stroke="#4B5563"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                />
                                                <path
                                                        d="M6.75023 14.4802C7.16458 14.4802 7.50047 14.1453 7.50047 13.7323C7.50047 13.3192 7.16458 12.9844 6.75023 12.9844C6.33589 12.9844 6 13.3192 6 13.7323C6 14.1453 6.33589 14.4802 6.75023 14.4802Z"
                                                        stroke="#4B5563"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                />
                                                <path
                                                        d="M17.2502 14.4802C17.6646 14.4802 18.0005 13.7323 18.0005 13.7323L17.2502 12.9844C17.2502 12.9844 16.5 13.3192 16.5 13.7323C16.5 14.1453 16.8359 14.4802 17.2502 14.4802Z"
                                                        stroke="#4B5563"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                />
                                            </svg>

                                            <p class="text-base leading-none text-gray-600">
                                                We deliver it to you
                                            </p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                        d="M12 8.00043V21.0004M12 8.00043C11.6383 6.50983 11.0154 5.2355 10.2127 4.3436C9.41003 3.4517 8.46469 2.98363 7.5 3.00044C6.83696 3.00044 6.20107 3.26383 5.73223 3.73267C5.26339 4.20151 5 4.8374 5 5.50044C5 6.16348 5.26339 6.79936 5.73223 7.2682C6.20107 7.73705 6.83696 8.00044 7.5 8.00044M12 8.00043C12.3617 6.50983 12.9846 5.2355 13.7873 4.3436C14.59 3.4517 15.5353 2.98363 16.5 3.00044C17.163 3.00044 17.7989 3.26383 18.2678 3.73267C18.7366 4.20151 19 4.8374 19 5.50044C19 6.16348 18.7366 6.79936 18.2678 7.2682C17.7989 7.73705 17.163 8.00044 16.5 8.00044M19 12.0004V19.0004C19 19.5309 18.7893 20.0396 18.4142 20.4146C18.0391 20.7897 17.5304 21.0004 17 21.0004H7C6.46957 21.0004 5.96086 20.7897 5.58579 20.4146C5.21071 20.0396 5 19.5309 5 19.0004V12.0004M4 8.00043H20C20.5523 8.00043 21 8.44814 21 9.00043V11.0004C21 11.5527 20.5523 12.0004 20 12.0004H4C3.44772 12.0004 3 11.5527 3 11.0004V9.00043C3 8.44814 3.44772 8.00043 4 8.00043Z"
                                                        stroke="#4B5563"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                />
                                            </svg>

                                            <p class="text-base leading-none text-gray-600">
                                                Get 4 pairs of multicolored laces
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex justify-between mt-6">
                                        <div class="flex items-center gap-2">
                                            <svg
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                        d="M14 13L15 11M8 18V17C8 15.9391 7.57857 14.9217 6.82843 14.1716C6.07828 13.4214 5.06087 13 4 13H3M10 12L11.5 9M4 6H9.426C9.60063 6.00012 9.77219 6.04598 9.9236 6.133C10.075 6.22002 10.201 6.34517 10.289 6.496L11.353 8.319C11.5574 8.66957 11.8309 8.97502 12.1568 9.21686C12.4827 9.4587 12.8542 9.63191 13.249 9.726L17.926 10.84C18.8012 11.0483 19.5806 11.5455 20.1384 12.2513C20.6961 12.9571 20.9997 13.8304 21 14.73V17C21 17.2652 20.8946 17.5196 20.7071 17.7071C20.5196 17.8946 20.2652 18 20 18H4C3.73478 18 3.48043 17.8946 3.29289 17.7071C3.10536 17.5196 3 17.2652 3 17V7C3 6.73478 3.10536 6.48043 3.29289 6.29289C3.48043 6.10536 3.73478 6 4 6Z"
                                                        stroke="#4B5563"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                />
                                            </svg>
                                            <p class="text-base leading-none text-gray-600">
                                                Custom designs are available
                                            </p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                        d="M16.7 8C16.501 7.43524 16.1374 6.94297 15.6563 6.58654C15.1751 6.23011 14.5983 6.02583 14 6H10C9.20435 6 8.44129 6.31607 7.87868 6.87868C7.31607 7.44129 7 8.20435 7 9C7 9.79565 7.31607 10.5587 7.87868 11.1213C8.44129 11.6839 9.20435 12 10 12H14C14.7956 12 15.5587 12.3161 16.1213 12.8787C16.6839 13.4413 17 14.2044 17 15C17 15.7956 16.6839 16.5587 16.1213 17.1213C15.5587 17.6839 14.7956 18 14 18H10C9.40175 17.9742 8.82491 17.7699 8.34373 17.4135C7.86255 17.057 7.49905 16.5648 7.3 16M12 3V6M12 18V21"
                                                        stroke="#4B5563"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                />
                                            </svg>

                                            <p class="text-base leading-none text-gray-600">
                                                Get 20% off on your next order
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <style>
                            ::-webkit-scrollbar {
                                width: 7px;
                            }

                            ::-webkit-scrollbar-track {
                                background: #f1f1f1;
                                border-radius: 20px;
                            }
                            ::-webkit-scrollbar-thumb {
                                background: #d1d5db;
                                border-radius: 20px;
                            }
                        </style>




                    </div>
                </div>
            </div>
        </div>

    @else
        <p>No customer details available.</p>
    @endif

</div>
