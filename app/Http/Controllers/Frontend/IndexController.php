<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        $product = Product::all();
        return view('frontend/index')->with(compact('product'));
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
        //
    }
    public function search(Request $request)
    {
        
        $name = $request->input('search');
        $product = Product::where('name', 'LIKE', '%'.$name.'%')->get();
        return view('frontend/index')->with(compact('product'));
    }
    public function searchPrice(Request $request)
    {
        $price = $request->getPrice;
        $arr = explode(":", $price);
        $product = Product::whereBetween('price', $arr)->get()->toArray();
        return response()->json([
            'product' => $product
        ]);

    }
    public function addtocart(Request $request)
    {
        
        $id_product = $request->id_product;
        $data['id_product'] = $id_product; 
        $data['qty'] = 1;
        $fal =false;
        if(session()->has('cart')) {
            $getSS = session()->get('cart');
            foreach($getSS as $key => $value){
                if($value['id_product'] == $id_product){
                    $getSS[$key]['qty'] += 1;
                    session()->put('cart',$getSS);
                    $fal = true;
                }
                
            }
               
        }
        if(!$fal){
            session()->push('cart',$data);
        }

        
        echo count(session()->get('cart'));
        
        
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

    
