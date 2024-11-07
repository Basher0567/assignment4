<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
//use  Illuminate\Http\UploadedFile;

class ProductController extends Controller
{
    function productList()
    {
        $data = Product::paginate(5);
        return view('index', compact('data'));
    }
    function create(Request $request)
    {


        /*if ($request->isMethod('post')) {

            Product::create([
                'id' => $request->id,
                'product_id' => $request->product_id,
                'name' => $request->name,


            ]);
        }*/
        return view('create');
    }
    public function store(Request $request)
    {
        //dd($request->toArray());

        $request->validate([
                'product_id'=>'required|unique:products',
                'name'=>'required|string|max:255',
                'price'=>'required'
            ],[
                'product_id.required'=>'Enter Product ID',
                'product_id.unique'=>'Product_Id Already exist',
                'name.required'=>'Enter Your Name',
                'price.required'=>'Enter Price',

            ]);
        //$image=$request->image->store('product','images');

        Product::create([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $request->image,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return redirect()->back();
        //return view('create');
    }
    function show($id){
        $data=Product::find($id);
        return view('show',compact('data'));
    }
    function edit($id)
    {
        $data=Product::find($id);
        return view('edit',compact('data'));
    }
    function update(Request $request,$id)
    {
        //$data=Product::find($id);
        Product::where('id',$id)->update([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $request->image,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return redirect('/products');

    }
    function delete($id)
    {

            $data = Product::find($id);
            $data->delete();

        return redirect('/products');
    }
    function search(Request $request){
        $search=$request->search;
        $data=Product::where('product_id','LIKE','%'.$search.'%')->orWhere('description','LIKE','%'.$search.'%')->orderBy('id','desc')->paginate(5);
        //$search=$request->search_string;
        //$data=Product::where('product_id','LIKE','%'.$search.'%')->orWhere('description','LIKE','%'.$search.'%')->orderBy('id','desc')->paginate(5);
        return view('index',compact('data'));
    }
}
