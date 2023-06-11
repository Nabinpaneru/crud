<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Image;

class ProductController extends Controller
{
    public function index(){



         $product=Product::all();


        return view('products.index',['product'=>$product]);
    }

    public function create(){

            return view('products.create');
        }
       
        
        public function store(Request $request ){

       // dd($request->all());
       $request->validate([

        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
  
     $imageName = time().'.'.$request->image->extension();  
   
     $request->image->move(public_path('images'), $imageName);


        
    // $file =time() . '.' . $request->image->extension();
    //  $request->image->move(public_path('aasimg',$file));

         $product= new Product;

         $product['name'] = $request['name'];
        $product['qty'] = $request['qty'];
         $product['price'] = $request['price'];
         $product['description'] = $request['description'];
         $product['image']=$imageName;

         $product->save();



        return back()->with('message','Product added sucessfully !!');


    
}

public function edit($id){

     $product = Product::where('id',$id)->first();

     //dd($product->all());

     return view('products.edit',['product' => $product]);
   



}

public function update(Request $request,$id){




   // dd($request->all());

      $product= Product::where('id',$id)->first();
     
     $request->validate([

        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
     ]);
  

      $imageName= time().'.'.$request->image->extension();  
   
      $request->image->move(public_path('images'), $imageName);
      $product['name'] = $request['name'];
     $product['qty'] = $request['qty'];
      $product['price'] = $request['price'];
     $product['description'] = $request['description'];
     $product['image'] = $imageName;
     

     $product->save();
      return redirect()->route('product.index')->with('message','Product edit sucessfully !!');






}

public function delete($id){


    $product=Product::where('id',$id)->first();
    $product->delete();

    return redirect()->route('product.index');



}
}