@extends('layouts.indexLayout')

{{-- @section('meta')
    @include('partials.indexMeta')
@endsection --}}

@section('content')
    @include('partials.topbarPC')
    @include('partials.topbarMobile')

    {{-- hero --}}
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 grid-cols-1 sm:py-8 gap-10 ">
        {{-- left side --}}
        <div class="w-full">
            <img src="{{ asset('img/sawit.jpeg') }}" alt="sawit.info" class="h-72 object-cover sm:px-4 px-0">

            <div class="text-gray-500 space-x-6 flex sm:mt-6 mt-2 px-4">
                <h1 class="font-semibold md:text-3xl text-md">article</h1>
                <span class="font-semibold md:text-3xl text-md">•</span>
                <h1 class="font-semibold md:text-3xl text-md">1 desember 2022</h1>
            </div>

            <h1 class="px-4 sm:mt-6 mt-2 sm:mb-8 mb-3 md:text-5xl text-2xl font-semibold text-auriga-biru">Duet ekowisata menjaga hutan Pegunungan Arfak Arfak Arfak aa</h1>
            <a class="px-4 text-auriga-biru sm:text-xl text-base font-semibold hover:cursor-pointer hover:underline">READ THE ARTICLE</a>
        </div>

        {{-- right side --}}
        <div class="w-full px-4 sm:border-l-hero border-black">
            <div class="md:px-10">
                <h1 class="font-black text-auriga-biru text-4xl mb-2">Featured</h1>
                {{-- card --}}
                <div class="py-2">
                    <div class="text-gray-500 space-x-4 flex  ">
                        <h1 class="font-semibold text-sm">article</h1>
                        <span class="font-semibold text-sm">•</span>
                        <h1 class="font-semibold text-sm">1 desember 2022</h1>
                    </div>
                    <div class="flex  w-full justify-between mt-1 space-x-6  ">
                        <img src="{{ asset('img/sawit.jpeg') }}" alt="sawit.info" class="md:w-5/12 w-6/12 sm:h-full h-24 object-cover">
                        <a class="text-auriga-biru sm:text-xl text-base font-bold">Duet ekowisata menjaga hutan Pegunungan Arfak Arfak Arfak aa</a>
                    </div>
                    <div class="flex justify-end mt-4">
                        <a href="#" class="text-auriga-biru font-bold sm:text-base text-sm">READ THE ARTICLE</a>
                    </div>
                </div>

                {{-- card --}}
                <div class="py-2 border-t-hero">
                    <div class="text-gray-500 space-x-4 flex  ">
                        <h1 class="font-semibold text-sm">article</h1>
                        <span class="font-semibold text-sm">•</span>
                        <h1 class="font-semibold text-sm">1 desember 2022</h1>
                    </div>
                    <div class="flex  w-full justify-between mt-1 space-x-6  ">
                        <img src="{{ asset('img/sawit.jpeg') }}" alt="sawit.info" class="md:w-5/12 w-6/12 sm:h-full h-24 object-cover">
                        <a class="text-auriga-biru sm:text-xl text-base font-bold">Duet ekowisata menjaga hutan Pegunungan Arfak Arfak Arfak aa</a>
                    </div>
                    <div class="flex justify-end mt-4">
                        <a href="#" class="text-auriga-biru font-bold sm:text-base text-sm">READ THE ARTICLE</a>
                    </div>
                </div>

                {{-- card --}}
                <div class="py-2 border-t-hero">
                    <div class="text-gray-500 space-x-4 flex  ">
                        <h1 class="font-semibold text-sm">article</h1>
                        <span class="font-semibold text-sm">•</span>
                        <h1 class="font-semibold text-sm">1 desember 2022</h1>
                    </div>
                    <div class="flex  w-full justify-between mt-1 space-x-6  ">
                        <img src="{{ asset('img/sawit.jpeg') }}" alt="sawit.info" class="md:w-5/12 w-6/12 sm:h-full h-24 object-cover">
                        <a class="text-auriga-biru sm:text-xl text-base font-bold">Duet ekowisata menjaga hutan Pegunungan Arfak Arfak Arfak aa</a>
                    </div>
                    <div class="flex justify-end mt-4">
                        <a href="#" class="text-auriga-biru font-bold sm:text-base text-sm">READ THE ARTICLE</a>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto bg-auriga-biru flex w-full justify-between px-6 py-4">
        <a href="#" class="text-white font-semibold">VIEW ALL NEWS</a>
        <div class="rounded-full  border-white border md:flex justify-center items-center px-1 py-1 ">
            <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 font-bold text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
              </svg>
        </div>
    </div>

    {{-- ngopini --}}
    <div class="bg-auriga-hijau sm:py-20 py-6 relative mt-12 sm:mb-12  px-4">
        <div class=" max-w-6xl mx-auto grid sm:grid-cols-2 grid-cols-1 sm:gap-10 gap-0 z-20">
            <div>
                <img src="{{ asset('img/higlight.jpg') }}" alt="" class="w-higlight sm:h-96 h-60 w-full object-cover">
            </div>
            <div class="sm:px-10">
                <div class="flex space-x-4 sm:mt-10 mt-5 items-center text-gray-200">
                    <h1 class="font-semibold sm:text-xl text-sm">ngopini</h1>
                    <span class="font-semibold sm:text-xl text-sm">•</span>
                    <h1 class="font-semibold sm:text-xl text-sm">sawit</h1>
                </div>
                <h1 class="sm:mt-10 mt-5 sm:text-3xl text-xl font-bold text-white">Judul artikel maksimal 70
                    karakter termasuk spasi
                    di sini jadi 3 baris
                </h1>
                <div class="sm:mt-10 mt-5 text-white">
                    <a class="font-bold">NOVEMBER 2022</a><span> | </span><a>Xerundistius ipsum nulpa
                        destibus de omnihit volupist, si dipitempore,
                        quiaerum quibus. Harciatur aborit fugiatusdae
                        num reptatur</a>
                </div>
            </div>
        </div>
        <div class="absolute z-10  bottom-0 left-0   text-white w-3/12">
            <img src="{{ asset('img/elemen-light.png') }}" alt="auriga nusantara" class="">
        </div>
    </div>
    <div class="max-w-6xl mb-12 mx-auto bg-auriga-biru flex w-full justify-between px-6 py-4">
        <a href="#" class="text-white font-semibold">VIEW ALL NGOPINI</a>
        <div class="rounded-full  border-white border md:flex justify-center items-center px-1 py-1 ">
            <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 font-bold text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
              </svg>
        </div>
    </div>

    {{-- report --}}
    <div class="bg-gray-200 sm:py-12 py-6">
        <div class="max-w-6xl mx-auto px-4">
            <div class=" grid md:grid-cols-2 grid-cols-1 md:gap-10 gap-36 sm:mt-32 mt-24">

                <!-- card -->
                <div class=" md:px-12 bg-white py-6 ">
                        <div class="card">
                            <div class="card-header flex justify-center mx-4 -mt-24">
                                <img
                                    class="w-96 md:h-80 h-60 object-cover"
                                    src="https://images.unsplash.com/photo-1540553016722-983e48a2cd10?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80"
                                    alt="tailwind-card-image"
                                />
                            </div>
                            <div class="card-body  md:w-96 w-full px-7">
                                <div class="flex space-x-4 mt-6  items-center text-gray-500">
                                    <h1 class="font-semibold md:text-xl text-md">report</h1>
                                </div>
                                <h1 class="mt-6 md:text-2xl text-xl font-bold  text-auriga-biru">Judul artikel maksimal 70
                                    karakter termasuk spasi
                                    di sini jadi 3 baris
                                </h1>
                                <div class="mt-6  text-auriga-biru">
                                    <a class="font-bold">NOVEMBER 2022</a><span> | </span><a>Xerundistius ipsum nulpa
                                        destibus de omnihit volupist, si dipitempore,
                                        quiaerum quibus. Harciatur aborit fugiatusdae
                                        num reptatur</a>
                                </div>
                            </div>
                        </div>
                </div>

                <!-- card -->
                <div class="relative md:px-12 bg-white py-6 col-span-1 gap-10">
                    <div class="card ">
                        <div class="card-header flex justify-center mx-4 -mt-24">
                            <img
                                class="w-96 md:h-80 h-60 object-cover"
                                src="https://images.unsplash.com/photo-1540553016722-983e48a2cd10?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80"
                                alt="tailwind-card-image"
                            />
                        </div>
                        <div class="card-body md:w-96 w-full px-7">
                            <div class="flex space-x-4 mt-6 items-center text-gray-500">
                                <h1 class="font-semibold md:text-xl text-md">report</h1>
                            </div>
                            <h1 class="mt-6 sm:text-2xl text-xl font-bold  text-auriga-biru">Judul artikel maksimal 70
                                karakter termasuk spasi
                                di sini jadi 3 baris
                            </h1>
                            <div class="mt-6  text-auriga-biru">
                                <a class="font-bold">NOVEMBER 2022</a><span> | </span><a>Xerundistius ipsum nulpa
                                    destibus de omnihit volupist, si dipitempore,
                                    quiaerum quibus. Harciatur aborit fugiatusdae
                                    num reptatur</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="flex space-x-4 items-center sm:-mt-0 -mt-52">
                    <h1 class="font-semibold text-xl">VIEW ALL REPORT</h1>
                    <div class="rounded-full  border-black border md:flex justify-center items-center px-1 py-1 ">
                        <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 font-bold">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- sawit in the news --}}
    <div class="py-12 px-4 relative">
        <div class="max-w-6xl  mx-auto z-20">
            <h1 class="text-gray-400 font-bold text-4xl text-auriga-biru">
                Sawit in the news
            </h1>
            <div class=" grid md:grid-cols-3 grid-cols-1 sm:gap-20 gap-10 mt-8">
                {{-- card --}}
                <div>
                    <h1 class="text-gray-400 font-semibold sm:mb-6 mb-1">
                        NOVEMBER 2022
                    </h1>
                    <a class="font-semibold text-3xl">Judul artikel maksimal 70 karakter termasuk spasi di sini jadi 4 baris</a>
                    <p class="text-gray-600 sm:mt-6 mt-2">Xerundistius ipsum nulpa destibus de omnihit volupist, si dipitempore, quiaerum quibus. Harciatur aborit fugiatusdae num reptatur</p>
                    <div class="flex space-x-2 sm:mt-8 mt-4 items-center">
                        <a class="text-red-600 text-sm font-bold">TEMPO MAGAZINE</a>
                        <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="w-3 h-3 font-bold text-red-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                          </svg>
                    </div>
                </div>

                {{-- card --}}
                <div>
                    <h1 class="text-gray-400 font-semibold sm:mb-6 mb-1">
                        NOVEMBER 2022
                    </h1>
                    <a class="font-semibold text-3xl">Judul artikel maksimal 70 karakter termasuk spasi di sini jadi 4 baris</a>
                    <p class="text-gray-600 sm:mt-6 mt-2">Xerundistius ipsum nulpa destibus de omnihit volupist, si dipitempore, quiaerum quibus. Harciatur aborit fugiatusdae num reptatur</p>
                    <div class="flex space-x-2 sm:mt-8 mt-4 items-center">
                        <a class="text-red-600 text-sm font-bold">CNN</a>
                        <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="w-3 h-3 font-bold text-red-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                          </svg>
                    </div>
                </div>

                {{-- card --}}
                <div>
                    <h1 class="text-gray-400 font-semibold sm:mb-6 mb-1">
                        NOVEMBER 2022
                    </h1>
                    <a class="font-semibold text-3xl">Judul artikel maksimal 70 karakter termasuk spasi di sini jadi 4 baris</a>
                    <p class="text-gray-600 sm:mt-6 mt-2">Xerundistius ipsum nulpa destibus de omnihit volupist, si dipitempore, quiaerum quibus. Harciatur aborit fugiatusdae num reptatur</p>
                    <div class="flex space-x-2 sm:mt-8 mt-4 items-center">
                        <a class="text-red-600 text-sm font-bold">TIMES MAGAZINE</a>
                        <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="w-3 h-3 font-bold text-red-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                          </svg>
                    </div>
                </div>

            </div>
            <div class="flex space-x-4 items-center mt-24">
                <h1 class="font-semibold text-xl">VIEW ALL SAWIT IN THE NEWS</h1>
                <div class="rounded-full  border-black border md:flex justify-center items-center px-1 py-1 ">
                    <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 font-bold">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="absolute   bottom-12 right-0 ">
            <img src="{{ asset('img/elemen.png') }}" alt="auriga nusantara" class="sm:w-96 w-40 z-10">
        </div>
    </div>

     <!-- socmed -->
     <div class="max-w-7xl mx-auto flex md:flex-row flex-col justify-between mt-24 space-y-12 px-4 items-center">
        <div class="w-full flex md:justify-start justify-center">
            <h1 class="text-auriga-biru font-semibold text-5xl">Sawit.info</h1>
        </div>
        <nav class="flex  md:justify-end  justify-center w-full space-x-4 md:items-end items-start  text-auriga-biru">
            <div class="flex md:space-x-2 space-x-1">
                <a href="#" class="text-sm">Contact</a>
                <a href="#" class="text-sm">|</a>
                <a href="#" class="text-sm">Visit Us</a>
                <a href="#" class="text-sm">|</a>
                <a href="#" class="text-sm">Subscribe</a>
            </div>

            <div class="flex space-x-2 ">
                <div class=" bg-black rounded-full border border-black px-1 py-1 flex items-center">
                    <img src="{{ asset('img/facebook.svg') }}" alt="" class="w-4">
                </div>
                <div class=" bg-black rounded-full border border-black px-1 py-1 flex items-center">
                    <img src="{{ asset('img/twitter.svg') }}" alt="" class="w-4">
                </div>
                <div class=" bg-black rounded-full border border-black px-1 py-1 flex items-center">
                    <img src="{{ asset('img/ig.png') }}" alt="" class="w-4">
                </div>
                <div class=" bg-black rounded-full border border-black px-1 py-1 flex items-center">
                    <img src="{{ asset('img/twitter.svg') }}" alt="" class="w-4">
                </div>
                <div class=" bg-black rounded-full border border-black px-1 py-1 flex items-center">
                    <img src="{{ asset('img/twitter.svg') }}" alt="" class="w-4">
                </div>
            </div>
        </nav>
    </div>

    <!-- footer -->
    <footer class="bg-gray-200 py-4 mt-4 px-4">
        <div class="max-w-7xl mx-auto flex md:flex-row flex-col justify-between w-full md:space-y-0 space-y-4">
            <p class="text-md md:w-7/12 w-full  text-auriga-biru">a data-driven advocacy and provocative think tank organization that works in forestry, species conservation, agriculture, and mining & energy that also combines law enforcement and public awareness in its approach
            </p>
            <nav class="flex md:justify-end justify-start w-full md:space-x-10 space-x-4 items-end  text-auriga-biru">
                <a href="#" class="md:text-xl text-md font-bold">about</a>
                <a href="#" class="md:text-xl text-md font-bold">action</a>
                <a href="#" class="md:text-xl text-md font-bold">story</a>
                <a href="#" class="md:text-xl text-md font-bold">resource</a>
                <a href="#" class="md:text-xl text-md font-bold">forum</a>
            </nav>
        </div>
    </footer>



@endsection
