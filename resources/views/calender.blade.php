@extends('layouts.guest')

@section('content')
<div id="machine-rental">
    <div class="container mx-auto px-4 my-52 container-custom">
        <form method="POST" action="{{ route('bookService.userInformation') }}">
            @csrf

            <div class="grid md:grid-cols-2 grid-cols-1 gap-52">
                <div>


                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input name="date_selected" id="date_selected" datepicker datepicker-autohide type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:placeholder-white-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                    </div>

                    <div class="mt-6">

                        <h3 class="text-2xl">User Information</h3>
                        <div class="relative w-full mb-3 mt-8">
                            <input name="name" id="name" type="text" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Nafn" style="transition: all 0.15s ease 0s;" />
                        </div>

                        <input id="service_id" name="service_id" value="{{ $service->id }}" hidden />

                        <div class="relative w-full mb-3">
                            <input name="email" id="email" type="email" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Email" style="transition: all 0.15s ease 0s;" />
                        </div>

                        <div class="relative w-full mb-3">
                            <input name="phone_number" id="phone_number" type="number" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Phone Number" style="transition: all 0.15s ease 0s;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                        </div>

                        <div class="relative w-full mb-3">
                            <input name="social_security_number" id="social_security_number" type="number" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="SSN" style="transition: all 0.15s ease 0s;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                        </div>

                        <div class="relative w-full mb-3">
                            <textarea name="address" id="address" rows="4" cols="80" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Address"></textarea>
                        </div>

                        <select name="reason_for_cleaning[]" multiple class="border-0 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-6">
                            <option selected value="">Choose days available</option>
                            <option value="General Cleaning">General Cleaning</option>
                            <option value="Bad Spots">Bad Spots</option>
                            <option value="Smell">Smell</option>
                        </select>

                        <div class="relative w-full mb-3">
                            <textarea name="description" rows="4" cols="80" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Further information"></textarea>
                        </div>
                    </div>


                </div>
                <div>
                    <div class="text-3xl">
                        Selected Items
                    </div>
                    <div id="selected-service" class="mt-12">
                        @foreach ($service->serviceProducts as $serviceProduct)
                        <div class="mt-6">
                            <h3 class="text-xl">{{ $serviceProduct->product->title }}</h3>
                            <p class="mt-2">{{ $serviceProduct->product->short_description }}</p>
                            <p class="mt-2">{{ $serviceProduct->product->long_description }}</p>
                        </div>
                        @endforeach

                        <div class="mt-12">
                            <h3 class="text-xl">Service Cost</h3>
                            <p class="mt-2 text-4xl">{{ $service->price }} kr.</p>
                        </div>
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

    <script>
        $(function() {
            let availableDates = <?php echo $service->serviceProducts[0]->product->productDates; ?>;

            let availableDatesInNumeric = [];
            availableDates.map((availableDate) => {
                let tempVal = null;

                switch (availableDate.day) {
                    case "monday":
                        tempVal = 1;
                        break;
                    case "tuesday":
                        tempVal = 2;
                        break;
                    case "wednesday":
                        tempVal = 3;
                        break;
                    case "thursday":
                        tempVal = 4;
                        break;
                    case "friday":
                        tempVal = 5;
                        break;
                    case "saturday":
                        tempVal = 6;
                        break;
                    case "sunday":
                        tempVal = 0;
                        break;
                    default:
                        tempVal = null;
                        break;
                }

                availableDatesInNumeric.push(tempVal)
            })

            $("#date_selected").datepicker({
                dateFormat: 'dd-mm-yy',
                beforeShowDay: function(day) {
                    var day = day.getDay();
                    console.log('day')
                    console.log(day)
                    if (!availableDatesInNumeric.includes(day)) {
                        return [false, "somecssclass"]
                    } else {
                        return [true, "someothercssclass"]
                    }
                }
            });
        });
    </script>

</div>
@endsection