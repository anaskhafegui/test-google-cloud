<?php

namespace App\Http\Controllers;

use App\Models\CustomerRequest;
use App\Models\Product;
use App\Models\Service;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function contact()
    {
        return view('contact');
    }

    public function termsOfService()
    {
        return view('termsOfService');
    }

    public function carpetCleaning()
    {
        return view('carpetCleaning');
    }

    public function teppahreinsun()
    {
        return view('teppahreinsun');
    }

    public function deepCleaning()
    {
        return view('deepCleaning');
    }

    public function machineRental()
    {
        $products = Product::where('is_rental', true)
            ->with('productPictures')
            ->get();

        return view('machineRental', ['products' => $products]);
    }

    public function singleMachine($id)
    {
        $product = Product::with('productPictures')
            ->find($id);

        return view('singleMachine', ['product' => $product]);
    }

    public function bookService()
    {
        $serviceTypes = ServiceType::with([
            'serviceClasses' => function ($query) {
                return $query->with([
                    'services' => function ($queryNested) {
                        return $queryNested->with([
                            'serviceProducts' => function ($queryNested2) {
                                return $queryNested2->with('product');
                            }
                        ]);
                    }
                ]);
            }
        ])
            ->get();

        return view('bookService', ['serviceTypes' => $serviceTypes]);
    }

    public function selectCalender(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'service_type' => 'required',
            'service_class' => 'required',
            'service' => 'required',
        ]);

        $service = Service::where('id', $request->service)
            ->with([
                'serviceProducts' => function ($query) {
                    return $query->with([
                        'product' => function ($query2) {
                                    return $query2->with('productDates');
                    }]);
                }
            ])
            ->first();

        foreach ($service->serviceProducts as $serviceProduct) {
            if ($serviceProduct->product->quantity < 1) {
                return redirect()->route('bookService')->with('error', 'Products in service unavailable.');
            }
        }

        return view('calender', ['service' => $service]);
    }

    public function userInformation(Request $request)
    {
        $request->validate([
            'date_selected' => 'required',
            'name' => 'required',
            'service_id' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'reason_for_cleaning' => 'required',
        ]);

        $customerRequest = new CustomerRequest();
        $customerRequest->name = $request->name;
        $customerRequest->service_id = $request->service_id;
        $customerRequest->email = $request->email;
        $customerRequest->phone_number = $request->phone_number;
        $customerRequest->social_security_number = $request->social_security_number;
        $customerRequest->address = $request->address;
        $customerRequest->reason_for_cleaning = implode(", ", $request->reason_for_cleaning);
        $customerRequest->description = $request->description;
        $customerRequest->date = $request->date_selected;

        if ($customerRequest->save()) {

            $service = Service::with([
                'serviceProducts' => function ($query) {
                    return $query->with('product');
            }])
                ->find($request->service_id);

            foreach ($service->serviceProducts as $serviceProduct) {
                $product = Product::find($serviceProduct->product->id);

                if ($product) {
                    $product->quantity = $product->quantity - 1;

                    $product->save();
                }
            }

            return redirect()->route('bookService.complete');
        }

        return redirect()->route('index');
    }

    public function complete() {

        return view('complete');

    }
}
