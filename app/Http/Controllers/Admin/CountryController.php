<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country = Country::all();
        return view('admin/country/country')->with(compact('country'));
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/country/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        $data = $request->all();
        if(Country::create($data)){
            return redirect('/admin/country')->with('success',' thanh cong');
        }else {
            return back()->with('error','error'); 
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
        $countryEdit = Country::findOrFail($id);
        
        return view('admin/country/edit')->with(compact('countryEdit'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request,$id)
    {
        $idCountry = Country::findOrFail($id);
        $data = $request->all();

        if($idCountry->update($data)){
            return redirect('admin/country')->with('success',__('update thanh cong'));
        }
        
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countryId = Country::findOrFail($id);

        if($countryId->delete()){
            // redirect chuyen huong!
            return redirect()->back()->with('success',__('delete country success.'));
        }
    }
}
