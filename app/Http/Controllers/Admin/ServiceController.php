<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Service;
use App\Models\ServiceClass;
use App\Models\ServiceProduct;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('id', 'ASC')
            ->get();

        return view('admin.service.index', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::get();
        $serviceClasses = ServiceClass::get();

        return view('admin.service.create', ['products' => $products, 'serviceClasses' => $serviceClasses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'product' => 'required',
            'service_class_id' => 'required',
        ]);

        $service = new Service();

        $service->title = $request->title;
        $service->price = $request->price;
        $service->description = $request->description;

        $serviceClass = ServiceClass::where('id', $request->service_class_id)->first();
        if ($serviceClass) {
            $service->service_class_id = $serviceClass->id;
        }
        $service->save();

        ServiceProduct::where('service_id', $service->id)->delete();
        $serviceProduct = new ServiceProduct();
        $serviceProduct->service_id = $service->id;
        $serviceProduct->product_id = $request->product;

        $serviceProduct->save();

        return redirect()->route('services.index')->with('success', 'Service added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::with([
            'serviceProducts' => function ($query) {
                return $query->with('product');
            }
        ])
            ->find($id);
        $products = Product::get();
        $serviceClasses = ServiceClass::get();

        return view('admin.service.edit', ['service' => $service, 'products' => $products, 'serviceClasses' => $serviceClasses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'product' => 'required',
            'service_class_id' => 'required',
        ]);

        $service = Service::find($id);

        if ($service) {
            $service->title = $request->title;
            $service->price = $request->price;
            $service->description = $request->description;

            $serviceClass = ServiceClass::where('id', $request->service_class_id)->first();
            if ($serviceClass) {
                $service->service_class_id = $serviceClass->id;
            }

            $service->save();

            if ($request->product) {
                ServiceProduct::where('service_id', $service->id)->delete();

                $serviceProduct = new ServiceProduct();
                $serviceProduct->service_id = $service->id;
                $serviceProduct->product_id = $request->product;

                $serviceProduct->save();
            }
        }

        return redirect()->route('services.index')->with('success', 'Service updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::where('id', $id)->delete();
        return redirect()->route('services.index')->with('error', 'Service deleted.');
    }
}
