<?php

namespace App\Http\Controllers\Frontend;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $brand = Brand::all();
        return view('frontend/advance_search')->with(compact('category','brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $brand =$request->id_brand;
        $category = $request->id_category;
        $status = $request->trangthaisp;
        $price = $request->price;
        $name = $request->name;
        
        $product = Product::select("*");

        if(!empty($brand)){
            $product->where('id_brand', $brand);
        }
        
      
        if(!empty($category)){
            $product->where('id_category', $category);
        }
        
        if(!empty($status)){
            $product->where('trangthaisp', $status);
        }
        if(!empty($price)){
            if($price == "1"){
                $product->where('price','>=', 5)->where('price','<=',50);
            }
            if($price == "2"){
                $product->where('price','>=', 50)->where('price','<=',100);
            }
        }

        if(!empty($name)){
            $product->where('name', $name);
        }
        

        $product = $product->get();
        
        return view('frontend/index')->with(compact('product'));
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
}
