<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Bookings') }}
            </h2>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">

                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="#" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">tour name</h3>
                        <p class="text-slate-500 text-sm">tour category</p>
                        </div>
                    </div> 

                        <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-green-500 text-white">
                            SUCCESS
                        </span>

                        <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-orange-500 text-white">
                            PENDING
                        </span> 

                    <div  class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Price</p>
                        <h3 class="text-indigo-950 text-xl font-bold">Rp 0</h3>
                    </div>
                    <div  class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Total Days</p>
                        <h3 class="text-indigo-950 text-xl font-bold">11 Days</h3>
                    </div>
                    <div  class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Quantity</p>
                        <h3 class="text-indigo-950 text-xl font-bold">3 People</h3>
                    </div>
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="#" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Details
                        </a>
                    </div>
                </div>
                

            </div>
        </div>
    </div>
</x-app-layout>
