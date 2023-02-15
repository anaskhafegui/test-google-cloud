@extends('layouts.guest')

@section('content')
<div id="home">
    <div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 75vh;">
        <div class="absolute top-0 w-full h-full bg-center bg-cover bg-custom-cover">
            <span id="blackOverlay" class="w-full h-full absolute opacity-25 bg-black"></span>
        </div>
        <div class="container relative mx-auto">
            <div class="items-center flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                    <h1 class="text-white font-semibold lg:text-5xl text-3xl">
                        Castus Teppa og Djúhreinsiþjónusta
                    </h1>
                </div>
            </div>
        </div>
        <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden mb-1" style="height: 70px;">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-gray-300 fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <section class="pb-20 bg-gray-300 -mt-24">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap">

                <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
                    <a href="#">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                            <div class="px-4 py-5 flex-auto">
                                <img class="mb-6 rounded-2xl h-52 object-cover w-full" src="{{ url('images/carpet-roll.png') }}"></img>
                                <h6 class="text-xl font-semibold">MOTTUHREINSUN</h6>
                                <p class="mt-2 mb-4 text-gray-600">
                                    Hreinsum og frískum upp á all flestar tegundir af heimilismottum
                                </p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="w-full md:w-4/12 px-4 text-center">
                    <a href="#">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                            <div class="px-4 py-5 flex-auto">
                                <img class="mb-6 rounded-2xl h-52 object-cover w-full" src="{{ url('images/carpet-vacuum.webp') }}"></img>
                                <h6 class="text-xl font-semibold">TEPPAHREINSUN</h6>
                                <p class="mt-2 mb-4 text-gray-600">
                                    Fagleg ráðgjöf og þjónusta fyrir húsfélög, fyrirtæki og einstaklinga
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="pt-6 w-full md:w-4/12 px-4 text-center">
                    <a href="#">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                            <div class="px-4 py-5 flex-auto">
                                <img class="mb-6 rounded-2xl h-52 object-cover w-full" src="{{ url('images/Soft-Couch.webp') }}"></img>
                                <h6 class="text-xl font-semibold">DJÚPHREINSUN</h6>
                                <p class="mt-2 mb-4 text-gray-600">
                                    Sófar, stólar og fleira. Við mætum á staðinn. Fagleg þjónusta
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="flex flex-wrap items-center mt-32">
                <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
                    <div class="text-gray-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-gray-100">
                        <i class="fas fa-user-friends text-xl"></i>
                    </div>
                    <p class="text-lg font-light leading-relaxed mt-4 mb-4 text-gray-700">
                        Stigagangar eru svæði sem mikið er gangið um og þrátt fyrir reglubundin þrif safnast óhreinindi í teppin til lengri og skemmri tíma. Nauðsynlegt er því að fá dýpri þrif reglulega.
                    </p>
                    <p class="text-lg font-light leading-relaxed mt-4 mb-4 text-gray-700">
                        Castus býður húsfélögum teppahreinsun á góðum kjörum allt árið og biðtími eftir þjónustunni er almennt stuttur.
                    </p>
                    <p class="text-lg font-light leading-relaxed mt-4 mb-4 text-gray-700">
                        Þörfin er misjöfn á hverjum stað og taka þarf tillit til ýmissa þátta eins og stærð, íbúafjölda, tíma frá síðustu hreinsun o.s.frv.
                    </p>
                    <p class="text-lg font-light leading-relaxed mt-4 mb-4 text-gray-700">
                        Eftir samtal við ráðgjafa okkar færðu hagstætt tilboð sem sniðið er að þörfum þíns húsfélags.
                    </p>
                </div>
                <div class="w-full md:w-4/12 px-4 mr-auto ml-auto">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg bg-pink-600">
                        <img class="h-96 object-cover" src="{{ url('images/husfelag.webp') }}" />
                        <blockquote class="relative p-8 mb-4">
                            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95" class="absolute left-0 w-full block" style="height: 95px; top: -94px;">
                                <polygon points="-30,95 583,95 583,65" class="text-pink-600 fill-current"></polygon>
                            </svg>
                            <h4 class="text-xl font-bold text-white">
                                Húsfélög
                            </h4>
                            <p class="text-md font-light mt-2 text-white">
                                Stigagangurinn er forstofan að heimili þínu
                            </p>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="relative py-20">
        <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20" style="height: 80px;">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-white fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
        <div class="container mx-auto px-4">
            <div class="items-center flex flex-wrap">
                <div class="w-full md:w-4/12 ml-auto mr-auto px-4">
                    <img alt="..." class="max-w-full rounded-lg shadow-lg" src="{{ url('images/At-the-Office.webp') }}" />
                </div>
                <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
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
            </div>
        </div>
    </section>
    <section class="relative py-20">
        <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20" style="height: 80px;">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-white fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
        <div class="container mx-auto px-4">
            <div class="items-center flex flex-wrap">

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
                <div class="w-full md:w-4/12 ml-auto mr-auto px-4">
                    <img alt="..." class="max-w-full rounded-lg shadow-lg" src="{{ url('images/carpet-vacuum.webp') }}" />
                </div>
            </div>
        </div>
    </section>

    <section class="pb-20 relative block bg-gray-900">
        <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20" style="height: 80px;">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-gray-900 fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
        <div class="container mx-auto px-4 lg:pt-24">
            <div class="flex flex-wrap text-center justify-center">
                <div class="w-full lg:w-6/12 px-4">
                    <h2 class="text-4xl font-semibold text-white">Um okkur</h2>
                    <p class="text-lg leading-relaxed m-4 text-gray-600">
                        Við hjá Castus sérhæfum okkur í alhliða Teppahreinsun, Djúphreinsun , Mottuhreinsun og Húsgagnahreinsun fyrir
                        einstaklinga, fyrirtæki og húsfélög. Við leitumst ávalt eftir því að veita örugga og faglega þjónustu á góðu verði.
                    </p>
                    <p class="text-lg leading-relaxed m-4 text-gray-600">
                        Castus er hluti af
                    </p>
                    <div class="text-lg leading-relaxed m-4 text-gray-600 flex justify-center">
                        <img class="w-64" src="{{ url('images/manar-logo2.webp') }}" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection