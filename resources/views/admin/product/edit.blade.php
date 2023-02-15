<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div id="products-create">
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-1 m-16">
                <div class="mt-5 md:mt-0">
                    <form action="{{ route('products.update', [$product]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="overflow-hidden shadow sm:rounded-md">
                            <div class="bg-white px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                        <input value="{{ $product->title }}" type="text" name="title" id="title" autocomplete="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                        <input value="{{ $product->price }}" type="number" name="price" id="price" autocomplete="price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');">
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="price_24hour" class="block text-sm font-medium text-gray-700">Price for 24 hours</label>
                                        <input value="{{ $product->price_24hour }}" type="number" name="price_24hour" id="price_24hour" autocomplete="price_24hour" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');">
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="price_weekly" class="block text-sm font-medium text-gray-700">Price Weekly</label>
                                        <input value="{{ $product->price_weekly }}" type="number" name="price_weekly" id="price_weekly" autocomplete="price_weekly" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');">
                                    </div>

                                    <!-- <div class="col-span-6 sm:col-span-3">
                                        <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                        <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                            <option>United States</option>
                                            <option>Canada</option>
                                            <option>Mexico</option>
                                        </select>
                                    </div> -->

                                    <div class="col-span-6">
                                        <label for="short_description" class="block text-sm font-medium text-gray-700">Short Description</label>
                                        <textarea type="text" name="short_description" id="short_description" autocomplete="short_description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $product->short_description }}</textarea>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="long_description" class="block text-sm font-medium text-gray-700">Long Description</label>
                                        <textarea type="text" name="long_description" id="long_description" autocomplete="long_description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $product->long_description }}</textarea>
                                    </div>

                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                                        <input value="{{ $product->quantity }}" type="number" name="quantity" id="quantity" autocomplete="quantity" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');">
                                    </div>

                                    <div class="flex items-start">
                                        <div class="ml-3 text-sm">
                                            <label for="is_rental" class="font-medium text-gray-700">Is Rentable</label>
                                            <p class="text-gray-500">Customer will have the ability to rent out this product.</p>
                                        </div>
                                    </div>
                                    <div class="flex h-5 items-center">
                                        <input {{ ($product->is_rental) ? 'checked' : '' }} id="is_rental" name="is_rental" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    </div>
                                </div>

                                <div class="mt-10">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
                                    <input id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none p-5" type="file" multiple>
                                </div>

                                <div class="mt-4">
                                    @foreach ($product->productPictures as $productPicture)
                                    <img class="custom-img-container-1" src="{{ $productPicture->path }}" />
                                    @endforeach
                                </div>

                                <div class="mt-10">
                                    <div id="product-dates-container" class="my-6 md:grid md:grid-cols-2">
                                    </div>
                                </div>

                                <a onclick="addDate()" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add Date</a>
                            </div>

                            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            generateProductDates();
        })

        function generateProductDates() {
            let productDates = <?php echo $product->productDates; ?>;
            console.log(productDates);

            productDates.map((productDate) => {
                editDate(productDate);
            })
        }

        function editDate(productDate) {
            let id = (Math.random() + 1).toString(36).substring(7);
            let html = `
            <div id="${id}" class="md:grid md:grid-cols-2">
                <div>
                    <select name="product_dates[]" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-6">
                        <option>Choose days available</option>
                        <option ${(productDate.day == 'monday' ? 'selected' : '')} value="monday">Monday</option>
                        <option ${(productDate.day == 'tuesday' ? 'selected' : '')} value="tuesday">Tuesday</option>
                        <option ${(productDate.day == 'wednesday' ? 'selected' : '')} value="wednesday">Wednesday</option>
                        <option ${(productDate.day == 'thursday' ? 'selected' : '')} value="thursday">Thursday</option>
                        <option ${(productDate.day == 'friday' ? 'selected' : '')} value="friday">Friday</option>
                        <option ${(productDate.day == 'saturday' ? 'selected' : '')} value="saturday">Saturday</option>
                        <option ${(productDate.day == 'sunday' ? 'selected' : '')} value="sunday">Sunday</option>
                    </select>
                </div>
                <div>
                    <a onclick="removeDate('${id}')" class="inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 ml-6">Remove</a>
                </div>
            </div>`;
            $('#product-dates-container').append(html);
        }

        function addDate() {
            let id = (Math.random() + 1).toString(36).substring(7);
            let html = `
            <div id="${id}" class="md:grid md:grid-cols-2">
                <div>
                    <select name="product_dates[]" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-6">
                        <option selected>Choose days available</option>
                        <option value="monday">Monday</option>
                        <option value="tuesday">Tuesday</option>
                        <option value="wednesday">Wednesday</option>
                        <option value="thursday">Thursday</option>
                        <option value="friday">Friday</option>
                        <option value="saturday">Saturday</option>
                        <option value="sunday">Sunday</option>
                    </select>
                </div>
                <div>
                    <a onclick="removeDate('${id}')" class="inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 ml-6">Remove</a>
                </div>
            </div>`;
            $('#product-dates-container').append(html);
        }

        function removeDate(id) {
            $('#' + id).remove();
        }
    </script>

</x-app-layout>