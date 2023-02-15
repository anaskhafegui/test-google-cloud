<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Service;
use App\Models\ServiceClass;
use App\Models\ServiceProduct;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceTypes = ServiceType::orderBy('id', 'ASC')
            ->get();

        return view('admin.serviceType.index', ['serviceTypes' => $serviceTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.serviceType.create');
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
            'short_description' => 'required',
            'long_description' => 'required'
        ]);

        $serviceType = new ServiceType();
        $serviceType->title = $request->title;
        $serviceType->short_description = $request->short_description;
        $serviceType->long_description = $request->long_description;

        $serviceType->save();

        return redirect()->route('serviceTypes.index')->with('success', 'Service Type added');
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
        $serviceType = ServiceType::find($id);
        return view('admin.serviceType.edit', ['serviceType' => $serviceType]);
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
            'short_description' => 'required',
            'long_description' => 'required'
        ]);

        $serviceType = ServiceType::find($id);
        $serviceType->title = $request->title;
        $serviceType->short_description = $request->short_description;
        $serviceType->long_description = $request->long_description;

        $serviceType->save();

        return redirect()->route('serviceTypes.index')->with('success', 'Service Type added');
    }

    private function deleteServiceClass($service_type_id)
    {
        $serviceClasses = ServiceClass::where('service_type_id', $service_type_id)
            ->get();

        $serivceClassIds = [];
        foreach ($serviceClasses as $serviceClass) {
            $serivceClassIds[] = $serviceClass->id;

            $serviceClass->delete();
        }

        return $serivceClassIds;
    }

    private function deleteService($serivceClassIds)
    {
        Service::whereIn('service_class_id', $serivceClassIds)
            ->delete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ServiceType::where('id', $id)->delete();
        return redirect()->route('serviceTypes.index')->with('error', 'Service Type deleted.');
    }
}
