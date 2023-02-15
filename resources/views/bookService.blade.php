@extends('layouts.guest')

@section('content')
<div id="machine-rental">
    <div class="container mx-auto px-4 my-52 container-custom">
        <div role="alert">
        @if (session('success'))
            <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
                Success
            </div>
            <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-white-700">
                <p>{{ session('success') }}</p>
            </div>
        </div>
        @endif
        @if (session('error'))
        <div role="alert">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                Error
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                <p>{{ session('error') }}</p>
            </div>
        </div>
        @endif
        <form method="POST" action="{{ route('bookService.selectCalender') }}">
            @csrf

            <div class="grid md:grid-cols-2 grid-cols-1 gap-52">
                <div>
                    <div class="mb-12">
                        <label for="service_type" class="text-xl">Service Type</label>
                        <select required name="service_type" id="service_type" class="bg-gray-50 border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option value="0">Choose a service type</option>
                            @foreach ($serviceTypes as $serviceType)
                            <option value="{{ $serviceType->id }}">{{ $serviceType->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="service_class-container" class="mb-12 hidden">
                        <label for="service_class" class="text-xl">Service Class</label>
                        <select required name="service_class" id="service_class" class="bg-gray-50 border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        </select>
                    </div>
                    <div id="service-container" class="mb-12 hidden">
                        <label for="service" class="text-xl">Service</label>
                        <select required name="service" id="service" class="bg-gray-50 border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        </select>
                    </div>
                </div>
                <div>
                    <div class="text-3xl">
                        Selected Items
                    </div>
                    <div id="selected-service" class="mt-12">
                        None
                    </div>
                </div>
            </div>
            <div class="grid md:grid-cols-1 grid-cols-1">
                <div class="text-end">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="submit">Next</button>
                </div>

            </div>
        </form>

    </div>

</div>

<script>
    $(document).ready(function() {
        let serviceTypes = <?php echo $serviceTypes; ?>;
        $('#service_type').on('change', function(e) {
            let serviceTypeSelected = serviceTypes.find(x => x.id == this.value);

            if (!serviceTypeSelected) {
                $('#service_class-container').addClass('hidden');
                $('#service-container').addClass('hidden');

                return;
            }

            $('#service_class').html('<option value="0">Choose a service class</option>');
            serviceTypeSelected.service_classes.map((tempServiceClass) => {
                $('#service_class').append(`<option value="${tempServiceClass.id}">${tempServiceClass.title}</option>`);
            })

            $('#service_class-container').removeClass('hidden');
        })

        $('#service_class').on('change', function(e) {
            var serviceTypeId = $('#service_type').find(":selected").val();
            let serviceTypeSelected = serviceTypes.find(x => x.id == serviceTypeId);

            if (!serviceTypeSelected) {
                $('#service_class-container').addClass('hidden');
                $('#service-container').addClass('hidden');
                return;
            }

            let serviceClassSelected = serviceTypeSelected.service_classes.find(x => x.id == this.value);

            if (!serviceClassSelected) {
                $('#service-container').addClass('hidden');
                return;
            }

            $('#service').html('<option value="0">Choose a service</option>');
            serviceClassSelected.services.map((tempService) => {
                $('#service').append(`<option value="${tempService.id}">${tempService.title}</option>`);
            })

            $('#service-container').removeClass('hidden');
        })

        $('#service').on('change', function(e) {
            var serviceTypeId = $('#service_type').find(":selected").val();
            let serviceTypeSelected = serviceTypes.find(x => x.id == serviceTypeId);

            if (!serviceTypeSelected) {
                $('#service_class-container').addClass('hidden');
                $('#service-container').addClass('hidden');
                return;
            }

            var serviceClassId = $('#service_class').find(":selected").val();
            let serviceClassSelected = serviceTypeSelected.service_classes.find(x => x.id == serviceClassId);

            if (!serviceClassSelected) {
                $('#service-container').addClass('hidden');
                return;
            }

            let service = serviceClassSelected.services.find(x => x.id == this.value);

            setSelectedItem(service);
        })
    })

    function setSelectedItem(service) {
        console.log(service);

        let html = `
            <div>
                ${service.service_products.map((service_product) => {
                    return `
                        <div class="mt-6">
                            <h3 class="text-xl">${service_product.product.title}</h3>
                            <p class="mt-2">${service_product.product.short_description}</p>
                            <p class="mt-2">${service_product.product.long_description}</p>
                        </div>
                    `;
                }).join('')}

                <div class="mt-12">
                    <h3 class="text-xl">Service Cost</h3>
                    <p class="mt-2 text-4xl">${(service.price)} kr.</p>
                </div>
            </div>`;

        $('#selected-service').html(html);
    }
</script>
@endsection