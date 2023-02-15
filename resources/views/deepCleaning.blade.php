@extends('layouts.guest')

@section('content')
<div id="deep-cleaing">
    <div class="flex content-center items-center justify-center">
        <div class="bg-gray-700 w-full">
            <div class="swiper mySwiper height-custom-2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <!-- <div class="grid grid-cols-1 absolute w-full h-full flex align-center text-center">
                            <div class="text-5xl">Hello</div>

                        </div> -->
                        
                        <img class="object-cover w-full" src="{{ url('images/deep-cleaning-1.webp') }}" alt="image" />
                    </div>
                    <div class="swiper-slide">
                        <img class="object-cover w-full" src="{{ url('images/deep-cleaning-2.webp') }}" alt="image" />
                    </div>
                    <div class="swiper-slide">
                        <img class="object-cover w-full" src="{{ url('images/deep-cleaning-3.webp') }}" alt="image" />
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </div>
    <div class="grid grid-cols-3 gap-10 my-32 mx-32">
        <div class="border rounded-lg p-3">
            <img class="h-52 w-full object-cover" src="{{ url('images/deep-cleaning-4.webp') }}" />
            <div class="text-2xl mt-5">Stólar & Sófar</div>
            <p class="h-16">Þú getur með auðveldum hætti bókað hreinsun á sófanum, hægindastólnum eða borðstofustólunum</p>
            <div class="my-5 text-center">
                <a href="#" class="block w-100 px-5 py-2.5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Read more</a>
            </div>
        </div>
        <div class="border rounded-lg p-3">
            <img class="h-52 w-full object-cover" src="{{ url('images/deep-cleaning-5.webp') }}" />
            <div class="text-2xl mt-5">Teppi & Sérverk</div>
            <p class="h-16">Hafðu samband við okkur ef þig vantar ráðgjöf eða tilboð í stærri verk heima fyrir, s.s. teppahreinsun eða fjölda húsgagna.</p>
            <div class="my-5 text-center">
                <a href="#" class="block w-100 px-5 py-2.5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Read more</a>
            </div>
        </div>
        <div class="border rounded-lg p-3">
            <img class="h-52 w-full object-cover" src="{{ url('images/deep-cleaning-6.webp') }}" />
            <div class="text-2xl mt-5">Rúmdýnur</div>
            <p class="h-16">Það leynist ýmislegt í rúmdýnunni þó ekki séu þar sjáanlegir blettir.  Fáðu ráðgjöf um dýnuhreinsun.</p>
            <div class="my-5 text-center">
                <a href="#" class="block w-100 px-5 py-2.5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Read more</a>
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4 my-16">
        <div class="items-center flex flex-wrap">
            <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
                <div class="md:pr-12">
                    <h3 class="text-3xl font-semibold">Á staðnum</h3>
                    <h3 class="text-sm text-gray">Gylfaflöt 17. 112 Grafarvogi</h3>
                    <p class="mt-4 text-lg leading-relaxed text-gray-600">
                        Móttaka fyrir mottur er á Gylfaflöt 17 sjá opnunartíma .
                    </p>
                    <p class="mt-4 text-lg leading-relaxed text-gray-600">
                        Við höfum komið okkur upp flottri aðstöðu og búnaði sem gerir okkur kleift að vinna verkið á góðum tíma.
                    </p>
                    <p class="mt-4 text-lg leading-relaxed text-gray-600">
                        Við notum hefðbundnar hreinsi aðferðir, hreint Íslenskt vatn og mild umhverfisvæn efni.
                    </p>
                    <p class="mt-4 text-lg leading-relaxed text-gray-600">
                        Við bjóðum ekki upp á þurrhreinsun að svo stöddu. Ef þú ert í vafa hvort hreinsa má mottuna þína, ekki hika við að hafa samband við okkur fyrst
                    </p>
                    <p class="mt-4 text-lg leading-relaxed text-gray-600">
                        Dæmi um mottur sem ekki má djúphreinsa eru mottur úr Viscose
                    </p>
                </div>
            </div>
            <div class="w-full md:w-4/12 ml-auto mr-auto px-4">
                <img alt="..." class="max-w-full rounded-lg shadow-lg height-custom-2 object-cover w-full" src="{{ url('images/carpet-cleaning-4.webp') }}" />
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4 my-16">
        <div class="items-center flex flex-wrap">
            <div class="w-full md:w-4/12 ml-auto mr-auto px-4">
                <img alt="..." class="max-w-full rounded-lg shadow-lg height-custom-2 object-cover w-full" src="{{ url('images/carpet-cleaning-2.webp') }}" />
            </div>
            <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
                <div class="md:pr-12">
                    <h3 class="text-3xl font-semibold">Sótt og skilað til þín</h3>
                    <h3 class="text-sm text-gray">Sendingaþjónusta</h3>
                    <p class="mt-4 text-lg leading-relaxed text-gray-600">
                        Við bjóðum upp á þá þjónustu að sækja til þín motturnar, hreinsa þær og skila þeim svo aftur til þín.
                    </p>
                    <p class="mt-4 text-lg leading-relaxed text-gray-600">
                        Þjónustan er í boði á Höfuðborgarsvæðinu
                    </p>
                    <p class="mt-4 text-lg leading-relaxed text-gray-600">
                        Sendingagjald er 3.500 kr, en fellur það niður ef hreinsun fer yfir 15.000 kr.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    var swiper = new Swiper(".mySwiper", {
        cssMode: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
        },
        mousewheel: true,
        keyboard: true,
    });
</script>


@endsection