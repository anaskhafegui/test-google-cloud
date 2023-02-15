<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceClass;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceClasses = ServiceClass::orderBy('id', 'ASC')
            ->get();

        return view('admin.serviceClass.index', ['serviceClasses' => $serviceClasses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviceTypes = ServiceType::get();

        return view('admin.serviceClass.create', ['serviceTypes' => $serviceTypes]);
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
            'description' => 'required',
            'service_type_id' => 'required',
        ]);

        $serviceClass = new ServiceClass();
        $serviceClass->title = $request->title;
        $serviceClass->description = $request->description;

        $serviceType = ServiceType::where('id', $request->service_type_id)->first();
        if ($serviceType) {
            $serviceClass->service_type_id = $serviceType->id;
        }

        $serviceClass->save();

        return redirect()->route('serviceClasses.index')->with('success', 'Service class created');
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
        $serviceClass = ServiceClass::with('serviceType')
            ->find($id);
        $serviceTypes = ServiceType::get();

        return view('admin.serviceClass.edit', ['serviceClass' => $serviceClass, 'serviceTypes' => $serviceTypes]);
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
            'description' => 'required',
            'service_type_id' => 'required',
        ]);

        $serviceClass = ServiceClass::find($id);

        if ($serviceClass) {
            $serviceClass->title = $request->title;
            $serviceClass->description = $request->description;

            $serviceType = ServiceType::where('id', $request->service_type_id)->first();
            if ($serviceType) {
                $serviceClass->service_type_id = $serviceType->id;
            }

            $serviceClass->save();
        }

        return redirect()->route('serviceClasses.index')->with('success', 'Service class updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ServiceClass::where('id', $id)->delete();
        return redirect()->route('serviceClasses.index')->with('error', 'Service Class deleted.');
    }
}
