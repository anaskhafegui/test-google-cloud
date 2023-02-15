<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Service Class') }}
        </h2>
    </x-slot>

    <div id="products-create">
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-1 m-16">
                <div class="mt-5 md:mt-0">
                    <form action="{{ route('serviceClasses.update', [$serviceClass]) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="overflow-hidden shadow sm:rounded-md">
                            <div class="bg-white px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                        <input value="{{ $serviceClass->title }}" type="text" name="title" id="title" autocomplete="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                        <textarea type="text" name="description" id="description" autocomplete="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $serviceClass->description }}</textarea>
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="service_type_id" class="block text-sm font-medium text-gray-700">Select service type</label>
                                        <select name="service_type_id" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                            <option selected value="0">Choose service type</option>
                                            @foreach ($serviceTypes as $serviceType)
                                            <option {{ ($serviceType->id == $serviceClass->service_type_id) ? 'selected' : '' }} value="{{ $serviceType->id }}">{{ $serviceType->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
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
</x-app-layout>