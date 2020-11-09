<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::paginate(3);
        return view('admin/brand/brand')->with(compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/brand/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        if(Brand::create($request->all())){
            return redirect('/admin/brand')->with('success', ' them thanh cong');
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
        $brand = Brand::findOrFail($id);
        return view('admin/brand/edit')->with(compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {
        $data = $request->all();
        $brand = Brand::findOrFail($id);
        if($brand->update($data)){
            return redirect('/admin/brand')->with('success', ' update thanh cong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        $brand = Brand::findOrFail($id);
        if($brand->delete()){
            return redirect('/admin/brand')->with('success', ' Xoa thanh cong');
        }
    }
    public function destroy($id)
    {
        //
    }
}
