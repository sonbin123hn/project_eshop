<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('cart')) {
            $getSS = session()->get('cart');
            $product = [];
            foreach($getSS as $val_ss){
                $product[] = Product::find($val_ss['id_product'])->toArray();
            }
            return view('frontend/cart')->with(compact('getSS','product'));
        }else{
            return view('frontend/cart');
        }
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
    public function cong(Request $request)
    {
        $id_product = $request->id_product;
        if(session()->has('cart')){
            $getSS = session()->get('cart');
            foreach($getSS as $key => $value){
                if($value['id_product'] == $id_product){
                    $getSS[$key]['qty'] += 1;
                    echo $getSS[$key]['qty'];
                }
            }
            session()->put('cart', $getSS);
        }
    }
    public function tru(Request $request)
    {
        $id_product = $request->id_product;
        if(session()->has('cart')){
            $getSS = session()->get('cart');
            foreach($getSS as $key => $value){
                if($value['id_product'] == $id_product){
                    $getSS[$key]['qty'] = $getSS[$key]['qty'] - 1;
                    echo $getSS[$key]['qty'];
                    if($getSS[$key]['qty'] == 0){
                        unset($getSS[$key]);
                    }

                }
                
            }
            session()->put('cart', $getSS);
        }
    }
    public function delete(Request $request)
    {
        $id_product = $request->id_product;
        if(session()->has('cart')){
            $getSS = session()->get('cart');
            foreach($getSS as $key => $value){
                if($value['id_product'] == $id_product){
                    unset($getSS[$key]);
                    echo "Xoa thanh cong";
                }
                
            }
            session()->put('cart', $getSS);
        }
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
