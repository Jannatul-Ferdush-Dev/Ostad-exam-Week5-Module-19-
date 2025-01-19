<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request){

        $query = Product::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('product_id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->orWhere('price', 'LIKE', "%{$search}%");
        }

        $sortField = $request->get('sort', 'name');
        $sortOrder = $request->get('order', 'asc');
        $products = $query->orderBy($sortField, $sortOrder)->paginate(2);

        return view('products.index', [
            'products' => $products,
            'sortField' => $sortField,
            'sortOrder' => $sortOrder,
      ]);

    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){

        $request->validate([
            'product_id'=>'required',
            'name'=>'required',
            'price'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg,gif|max:10000'
        ]);

        $imageName=time().'.'.$request->image->extension();
        $request->image->move(public_path('productsimage'), $imageName);

        $product = new Product;

        $product->product_id = $request->product_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->image = $imageName;

        $product->save();

        return back()->withSuccess('Product has been created, Please create another one');
    }

    public function edit($id){
        $product = Product::where('id',$id)->first();
        return view('products.edit',['product'=>$product]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'product_id'=>'required',
            'name'=>'required',
            'price'=>'required',
            'image'=>'nullable|mimes:png,jpg,jpeg,gif|max:10000'
        ]);
        $product = Product::where('id',$id)->first();

        if(isset($request->image)){
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('productsimage'), $imageName);
            $product->image = $imageName;
        }

        $product->product_id = $request->product_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;


        $product->save();

        return back()->withSuccess('Product has been Updated');
    }

    public function destroy($id){
        $product = Product::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess('Product has been Deleted');
    }

    public function show($id){
        $product = Product::where('id',$id)->first();

        $image_path = public_path('productsimage/'.$product->image);

        if(file_exists($image_path))
        {
           unlink($image_path);
        }
        return view('products.show',['product'=>$product]);
    }

}
