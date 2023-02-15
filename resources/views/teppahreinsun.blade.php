@extends('layouts.guest')

@section('content')
<div id="teppahreinsun">

    <div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 50vh;">
        <div class="absolute top-0 w-full h-full bg-center bg-cover bg-custom-cover">
            <span id="blackOverlay" class="w-full h-full absolute opacity-25 bg-black"></span>
        </div>
        <div class="container relative mx-auto">
            <div class="items-center flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                    <h1 class="text-white font-semibold lg:text-5xl text-3xl">
                        Teppahreinsun
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 lg:my-52 my-16">
        <div class="container mx-auto px-4">
            <div class="items-center flex flex-wrap">
                <div class="w-full md:w-4/12 ml-auto mr-auto px-4 lg:mb-0 mb-6">
                    <img alt="..." class="max-w-full rounded-lg shadow-lg height-custom-2 object-cover w-full" src="{{ url('images/husfelag.webp') }}" />
                </div>
                <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
                    <div class="md:pr-12">
                        <div class="text-pink-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-pink-300">
                            <i class="fas fa-rocket text-xl"></i>
                        </div>
                        <h3 class="text-3xl font-semibold">Húsfélög - Hreinna loft, betri ending</h3>
                        <p class="mt-4 text-lg leading-relaxed text-gray-600">
                            Stigagangar eru svæði sem mikið er gangið um og þrátt fyrir reglubundin þrif safnast óhreinindi í teppin til lengri og skemmri tíma. Nauðsynlegt er því að fá dýpri þrif reglulega.
                        </p>
                        <p class="mt-4 text-lg leading-relaxed text-gray-600">
                            Castus býður húsfélögum teppahreinsun á góðum kjörum allt árið og biðtími eftir þjónustunni er almennt stuttur.
                        </p>
                        <p class="mt-4 text-lg leading-relaxed text-gray-600">
                            Þörfin er misjöfn á hverjum stað og taka þarf tillit til ýmissa þátta eins og stærð, íbúafjölda, tíma frá síðustu hreinsun o.s.frv.
                        </p>
                        <p class="mt-4 text-lg leading-relaxed text-gray-600">
                            Eftir samtal við ráðgjafa okkar færðu hagstætt tilboð sem sniðið er að þörfum þíns húsfélags.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto px-4 lg:my-52 my-16">
            <div class="items-center flex flex-wrap">
                <div class="w-full md:w-5/12 ml-auto mr-auto px-4 lg:order-1 order-2">
                    <div class="md:pr-12">
                        <div class="text-pink-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-pink-300">
                            <i class="fas fa-rocket text-xl"></i>
                        </div>
                        <h3 class="text-3xl font-semibold">Fyrirtæki - Heilbrigði umfram allt</h3>
                        <p class="mt-4 text-lg leading-relaxed text-gray-600">
                            Teppalögð gólf verða sí vinsælli þegar kemur að skrifstofu- og atvinnuhúsnæði. Hrein teppi auka loftgæði sem skilar sér í betra starfsumhverfi. Svo ekki sé talað um heilbrigt útlit vinnustaðarins.
                        </p>
                        <p class="mt-4 text-lg leading-relaxed text-gray-600">
                            Castus býður fyrirtækum úrvals þjónustu á hagstæðu verði og vinnum verkið á þeim tíma sem hentar hverju fyrirtæki fyrir sig.
                        </p>
                        <p class="mt-4 text-lg leading-relaxed text-gray-600">
                            Það kostar ekkert að fá ráðgjöf og verðhugmynd. Tökum vel á móti erindi þínu.
                        </p>
                        <p class="mt-4 text-lg leading-relaxed text-gray-600">
                            Opið er fyrir ráðgjöf í síma alla virka daga á milli klukkan 8:00 og 15:30.
                        </p>
                    </div>
                </div>
                <div class="w-full md:w-4/12 ml-auto mr-auto px-4 lg:order-2 order-1 lg:mb-0 mb-6">
                    <img alt="..." class="max-w-full rounded-lg shadow-lg height-custom-2 object-cover w-full" src="{{ url('images/At-the-Office.webp') }}" />
                </div>
            </div>
        </div>
        <div class="container mx-auto px-4 lg:my-52 my-16">
            <div class="items-center flex flex-wrap">
                <div class="w-full md:w-4/12 ml-auto mr-auto px-4 lg:mb-0 mb-6">
                    <img alt="..." class="max-w-full rounded-lg shadow-lg height-custom-2 object-cover w-full" src="{{ url('images/carpet-vacuum.webp') }}" />
                </div>

                <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
                    <div class="md:pr-12">
                        <div class="text-pink-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-pink-300">
                            <i class="fas fa-rocket text-xl"></i>
                        </div>
                        <h3 class="text-3xl font-semibold">Aðferð - Einföld og hefðbundin</h3>
                        <p class="mt-4 text-lg leading-relaxed text-gray-600">
                            Við nýtum okkur einna helst hefðbundna djúphreinsiaðferð sem virkað hefur vel árum saman.
                        </p>
                        <p class="mt-4 text-lg leading-relaxed text-gray-600">
                            Bleytt er í áklæðinu, eða teppinu eftir þörfum með hreinu vatni og mildri sápu. Það fer svo eftir undirlagi hversu lengi sápublandan þarf liggja á áður en hún er sogin aftur upp. Þetta er svo gert eins oft og þurfa þyki.
                        </p>
                        <p class="mt-4 text-lg leading-relaxed text-gray-600">
                            Á erfiða bletti er notast við blettahreinsiefni sem áklæðið þolir og unnið á þeim með bursta.
                        </p>
                        <p class="mt-4 text-lg leading-relaxed text-gray-600">
                            Notkun leysiefna eins og á olíubletti, tyggjó og annað slíkt er ávalt sammælst um áður en verkið er framkvæmt.
                        </p>
                    </div>
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