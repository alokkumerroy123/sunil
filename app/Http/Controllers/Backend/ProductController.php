<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{   //view backend products/index page
    public function index(){
        $products=Product::orderBy('id','desc')->paginate('5');
        return view('backend.products.index',compact('products'));
    }

    //view create product list page
    public function create(){
          return view('backend.products.create');
    }

    //product submit is database
    public function store(Request $request){
        //validation
        $validator = Validator::make($request->all(), [
            'name'=>'required|max:120',
            'price'=>'required|numeric',
            'discount'=>'required|numeric',
            'description'=>'required',
            'photo'=>'required|image',
        ]);
         if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput(); 

            } 


        //rename picture name
        $newName='product_'.time().'.'.$request->file('photo')->getClientOriginalExtension();
        //submit picture
         $request->file('photo')->move('uploads/products',$newName);

          $inputs=[
         'name'=>$request->input('name'),
         'price'=>$request->input('price'),
         'discount'=>$request->input('discount'),
         'description'=>$request->input('description'),
         'photo'=>$newName,
                ];

                Product::create($inputs);
                return redirect()->route('admin.product');
    } 

    //edit.blade.php pagea jaoyar jonno
        public function edit($id){
        $product=Product::find($id);
        return view('backend.products.edit',compact('product'));
    }

    //data edit korar por data submit hobe
    public function update(Request $request,$id){

          //validation
        $validator = Validator::make($request->all(), [
            'name'=>'required|max:120',
            'price'=>'required|numeric',
            'discount'=>'required|numeric',
            'description'=>'required',
            'photo'=>'image',
        ]);
         if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput(); 

            } 

     $inputs=[
         'name'=>$request->input('name'),
         'price'=>$request->input('price'),
         'discount'=>$request->input('discount'),
         'description'=>$request->input('description'),

              ];

              $product=Product::find($id);
              $product->update($inputs);
              if(!empty($request->file('photo'))){
               if(file_exists('uploads/products/'.$product->photo)){
                       unlink('uploads/products/'.$product->photo);

               }
               
                    //rename picture name
        $newName='product_'.time().'.'.$request->file('photo')->getClientOriginalExtension();
        //submit picture
         $request->file('photo')->move('uploads/products',$newName);
         $product->update(['photo'=>$newName]);
              }
             return redirect()->route('admin.product');

    }

    //delete
    public function delete($id){
        $product=Product::find($id);
        $product->delete();
        return redirect()->route('admin.product');
    }

}
