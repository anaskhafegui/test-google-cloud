<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductDate;
use App\Models\ProductPicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'ASC')
            ->get();

        return view('admin.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
        ]);

        $product = new Product();
        $product->title = $request->title;
        $product->price = $request->price;
        $product->price_24hour = $request->price_24hour;
        $product->price_weekly = $request->price_weekly;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->quantity = $request->quantity;
        $product->is_rental = isset($request->is_rental) ? true : false;

        if ($product->save()) {

            if ($request->file('image')) {
                $file = $request->file('image');
                $path = $file->getRealPath();
                $pic = file_get_contents($path);

                $fileName = time() . '_' . $file->getClientOriginalName();

                $disk = Storage::disk('gcs');
                $disk->put($fileName, $pic);

                $url = $disk->url($fileName);

                $productPicture = new ProductPicture();
                $productPicture->product_id = $product->id;
                $productPicture->path = $url;

                $productPicture->save();
            }

            if (isset($request->product_dates) && count($request->product_dates)) {

                foreach ($request->product_dates as $product_date_temp) {
                    $productDate = new ProductDate();
                    $productDate->product_id = $product->id;
                    $productDate->day = $product_date_temp;

                    $productDate->save();
                }
            }

            return redirect()->route('products.index')->with('success', 'Product Added Succesfully');
        }

        return redirect()->route('products.index')->with('error', 'There was a problem saving the product.');
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
        $product = Product::where('id', $id)
            ->with('productPictures')
            ->with('productDates')
            ->first();

        return view('admin.product.edit', ['product' => $product]);
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
        ]);

        $product = Product::where('id', $id)
            ->with('productPictures')
            ->first();

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Could not find the product');
        }

        $product->title = $request->title;
        $product->price = $request->price;
        $product->price_24hour = $request->price_24hour;
        $product->price_weekly = $request->price_weekly;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->quantity = $request->quantity;
        $product->is_rental = isset($request->is_rental) ? true : false;

        if ($product->save()) {

            if ($request->file('image')) {

                $pictuereIdsToDelete = [];
                foreach ($product->productPictures as $productPicture) {
                    Storage::disk('gcs')->delete(str_replace('https://storage.googleapis.com/castusphotos/', '', $productPicture->path));

                    $pictuereIdsToDelete[] = $productPicture->id;
                }

                if (count($pictuereIdsToDelete)) {
                    ProductPicture::whereIn('id', $pictuereIdsToDelete)
                        ->delete();
                }

                $file = $request->file('image');
                $path = $file->getRealPath();
                $pic = file_get_contents($path);

                $fileName = time() . '_' . $file->getClientOriginalName();

                $disk = Storage::disk('gcs');
                $disk->put($fileName, $pic);

                $url = $disk->url($fileName);

                $productPicture = new ProductPicture();
                $productPicture->product_id = $product->id;
                $productPicture->path = $url;

                $productPicture->save();
            }

            $this->deleteProductDates($product->id);

            if (isset($request->product_dates) && count($request->product_dates)) {

                foreach ($request->product_dates as $product_date_temp) {
                    $productDate = new ProductDate();
                    $productDate->product_id = $product->id;
                    $productDate->day = $product_date_temp;

                    $productDate->save();
                }
            }

            return redirect()->route('products.index')->with('success', 'Product Updated Succesfully');
        }

        return redirect()->route('products.index')->with('error', 'There was a problem updating the product.');
    }

    private function deleteProductDates($productId)
    {
        ProductDate::where('product_id', $productId)->delete();
        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id', $id)->delete();

        return redirect()->route('products.index')->with('error', 'Product deleted.');
    }
}
