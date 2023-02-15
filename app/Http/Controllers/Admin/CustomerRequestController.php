<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomerRequest;
use App\Models\Product;

class CustomerRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerRequests = CustomerRequest::orderBy('id', 'ASC')
            ->get();

        return view('admin.customerRequest.index', ['customerRequests' => $customerRequests]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customerRequest = CustomerRequest::with([
            'service' => function ($query) {
                return $query->with([
                    'serviceProducts' => function ($query2) {
                        return $query2->with('product');
                    }
                ]);
            }
        ])
            ->find($id);

        return view('admin.customerRequest.view', ['customerRequest' => $customerRequest]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 
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
        // 
    }

    private function deleteProductDates($productId)
    {
        // ProductDate::where('product_id', $productId)->delete();
        // return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 
    }

    public function markReturned($id)
    {
        $customerRequest = CustomerRequest::with([
            'service' => function ($query) {
                return $query->with([
                    'serviceProducts' => function ($query2) {
                        return $query2->with('product');
                    }
                ]);
            }
        ])
            ->find($id);

        $customerRequest->complete = true;
        $customerRequest->save();

        foreach ($customerRequest->service->serviceProducts as $serviceProduct) {
            $product = Product::find($serviceProduct->product->id);

            if ($product) {
                $product->quantity = $product->quantity + 1;
                $product->save();
            }
        }

        return redirect()->route('customerRequests.index')->with('success', 'Marked as returned. Order Complete.');
    }
}
