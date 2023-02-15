@extends('layouts.guest')

@section('content')
<div id="machine-rental">
    <div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 50vh;">
        <div class="absolute top-0 w-full h-full bg-center bg-cover bg-custom-cover">
            <span id="blackOverlay" class="w-full h-full absolute opacity-25 bg-black"></span>
        </div>
        <div class="container relative mx-auto">
            <div class="items-center flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                    <h1 class="text-white font-semibold lg:text-5xl text-3xl">
                        Vélaleiga
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

    <div class="container mx-auto px-4 my-16">
        @if (count($products))
            @foreach ($products as $product)
            <div class="items-center flex flex-wrap my-5">
                <div class="w-full md:w-4/12 ml-auto mr-auto px-4 lg:mb-0 mb-6">
                    @foreach ($product->productPictures as $productPicture)
                    <img alt="..." class="max-w-full rounded-lg shadow-lg height-custom-2 object-cover w-full" src="{{ $productPicture->path }}" />
                    @endforeach

                </div>

                <div class="w-full md:w-5/12 ml-auto mr-auto">
                    <div class="">
                        <h4 class="text-3xl">{{ $product->title }}</h4>
                        <p class="my-4">{{ $product->short_description }}</p>
                        <p><strong>Price for 24 hours:</strong> {{ number_format($product->price_24hour, 0, '.', '.') . ' ' . config('constants.currency') }}</p>
                        <p><strong>Price for weekend:</strong> {{ number_format($product->price_weekly, 0, '.', '.') . ' ' . config('constants.currency') }}</p>
                        <div class="my-12">
                            <a href="{{ route('singleMachine', ['id' => $product->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Read More</a>
                            <a href="{{ route('bookService') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Book a service now.</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            @endforeach

        @else
            <div class="text-3xl text-center my-48">
                No Rental Products Available.

            </div>
        @endif
        
    </div>

</div>
@endsection