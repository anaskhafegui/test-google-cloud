@extends('layouts.guest')

@section('content')
<div id="machine-rental">
    <div class="items-center flex flex-wrap my-52">
        <div class="w-full md:w-4/12 ml-auto mr-auto px-4 lg:mb-0 mb-6">
            @foreach ($product->productPictures as $productPicture)
            <img alt="..." class="max-w-full rounded-lg shadow-lg height-custom-2 object-cover w-full" src="{{ $productPicture->path }}" />
            @endforeach

        </div>

        <div class="w-full md:w-5/12 ml-auto mr-auto">
            <div class="">
                <h4 class="text-3xl">{{ $product->title }}</h4>
                <p class="my-4">{{ $product->short_description }}</p>
                <p class="my-4">{{ $product->long_description }}</p>
                <p><strong>Price for 24 hours:</strong> {{ number_format($product->price_24hour, 0, '.', '.') . ' ' . config('constants.currency') }}</p>
                <p><strong>Price for weekend:</strong> {{ number_format($product->price_weekly) . ' ' . config('constants.currency') }}</p>
                <div class="my-12">
                    <a href="{{ route('bookService') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Book a service now.</a>
                </div>

            </div>
        </div>
    </div>
</div>

</div>
@endsection