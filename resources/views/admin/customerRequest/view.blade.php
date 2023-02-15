<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Request') }}
        </h2>
    </x-slot>

    <div id="products-create">
        <div class="pb-1 p-16">
            <h3 class="text-2xl my-6">Customer Information</h3>
            <div class="grid grid-cols-3 p-16 bg-white rounded-lg">
                <div class="mb-6">
                    <h4 class="text-xl"><strong>Customer Name:</strong> {{ $customerRequest->name }}</h4>
                </div>
                <div class="mb-6">
                    <h4 class="text-xl"><strong>Email:</strong> {{ $customerRequest->email }}</h4>
                </div>
                <div class="mb-6">
                    <h4 class="text-xl"><strong>Customer Phone Number:</strong> {{ $customerRequest->phone_number }}</h4>
                </div>
                <div class="mb-6">
                    <h4 class="text-xl"><strong>SSN:</strong> {{ $customerRequest->social_security_number }}</h4>
                </div>
                <div class="mb-6">
                    <h4 class="text-xl"><strong>Address:</strong> {{ $customerRequest->address }}</h4>
                </div>
                <div class="mb-6">
                    <h4 class="text-xl"><strong>Reason for cleaning:</strong> {{ $customerRequest->reason_for_cleaning }}</h4>
                </div>
                <div class="mb-6">
                    <h4 class="text-xl"><strong>Requested Date:</strong> {{ $customerRequest->date }}</h4>
                </div>
                <div class="mb-6">
                    <h4 class="text-xl"><strong>Completed?</strong> {{ ($customerRequest->complete) ? 'Yes' : 'No' }}</h4>
                </div>
                <div class="mb-6">
                    <h4 class="text-xl"><strong>Customer Charged: </strong> {{ ($customerRequest->service) ? number_format($customerRequest->service->price, 0, '.', '.') . ' ' . config('constants.currency') : 'Service was deleted.' }}</h4>
                </div>
                <div class="mb-6 col-span-2">
                    <h4 class="text-xl"><strong>Description:</strong> {{ $customerRequest->description }}</h4>
                </div>
            </div>

        </div>
        <div class="pt-1 p-16">
            <h3 class="text-2xl my-6">Product Information</h3>
            <div class="grid grid-cols-3 p-16 bg-white rounded-lg">

                @if ($customerRequest->service)
                    @foreach ($customerRequest->service->serviceProducts as $serviceProduct)
                        <div class="mb-6">
                            <h4 class="text-xl"><strong>Title:</strong> {{ $serviceProduct->product->title }}</h4>
                        </div>
                        <div class="mb-6">
                            <h4 class="text-xl"><strong>Price 24 hours:</strong> {{ number_format($serviceProduct->product->price_24hour, 0, '.', '.') . ' ' . config('constants.currency') }}</h4>
                        </div>
                        <div class="mb-6">
                            <h4 class="text-xl"><strong>Price Weekly:</strong> {{ number_format($serviceProduct->product->price_weekly, 0, '.', '.') . ' ' . config('constants.currency') }}</h4>
                        </div>
                        <div class="mb-6 col-span-2">
                            <h4 class="text-xl"><strong>Short description:</strong> {{ $serviceProduct->product->short_description }}</h4>
                        </div>
                        <div class="mb-6 col-span-2">
                            <h4 class="text-xl"><strong>Long description:</strong> {{ $serviceProduct->product->long_description }}</h4>
                        </div>

                    @endforeach
                @else
                <div>Service was deleted</div>
                @endif
                
            </div>

        </div>

    </div>

</x-app-layout>