@extends('layouts.guest')

@section('content')
<div id="contact">
    <div class="relative pt-16 pb-32 flex content-center items-center justify-center height-custom-1">
        <div class="absolute top-0 w-full h-full bg-center bg-cover bg-custom-cover">
            <span id="blackOverlay" class="w-full h-full absolute opacity-25 bg-black"></span>
        </div>
        <div class="container relative mx-auto">
            <div class="items-center flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300">
                        <form>
                            <div class="flex-auto p-5 lg:p-10">
                                <h4 class="text-2xl font-semibold">Ertu með fyrirspurn? Ekki hika við að hafa samband.</h4>
                                <p class="leading-relaxed mt-1 mb-4 text-gray-600">
                                    Við erum hluti af Mánar ehf og sérhæfum okkur í djúphreinsun af öllu tagi. Mánar hafa rekið mottuhreinsun og sinnt teppahreinsunum um langa hríð með frábærum árangri. Í byrjun árs 2021 var því ákveðið að fella alla djúphreinsun fyrirtækisin undir sérstaka deild og auka enn frekar við þjónustuna. Deildin starfar nú undir þessu nýja merki, Castus.
                                </p>
                                <div class="relative w-full mb-3 mt-8">
                                    <input type="text" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Nafn" style="transition: all 0.15s ease 0s;" />
                                </div>
                                <div class="relative w-full mb-3">
                                    <input type="email" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Email" style="transition: all 0.15s ease 0s;" />
                                </div>
                                <div class="relative w-full mb-3">
                                    <input type="email" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Símanúmer" style="transition: all 0.15s ease 0s;" />
                                </div>
                                <div class="relative w-full mb-3">
                                    <input type="email" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Heimilsfang" style="transition: all 0.15s ease 0s;" />
                                </div>
                                <div class="relative w-full mb-3">
                                    <textarea rows="4" cols="80" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Skilaboðin þín..."></textarea>
                                </div>
                                <div class="text-center mt-6">
                                    <button class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1" type="button" style="transition: all 0.15s ease 0s;">
                                        Senda
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="block py-24 lg:pt-0 bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center lg:-mt-64 -mt-48">
                <div class="w-full lg:w-6/12 px-4">

                </div>
            </div>
        </div>
    </section>

</div>


@endsection