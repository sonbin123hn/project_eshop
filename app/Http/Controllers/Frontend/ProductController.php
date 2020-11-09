<?php

namespace App\Http\Controllers\Frontend;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getArrImage = [];
        $product = Product::all();
        
        //$getArrImage = json_decode($getProducts['image'], true);
        return view('frontend/member/product/product')->with(compact('getArrImage','product'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $brand = Brand::all();
        $account = Auth::user();
        return view('frontend/member/product/add')->with(compact('category','brand','account'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $product = Product::all();
        $trangthai = $request->trangthaisp;
        $id_user = Auth::user()->id;
        if($trangthai == 1){
            $product['sale'] = $request->sale; 
        }
        
        // - 3 hinh
        // chi cho file hinh [jpg, png,jpep, PNG, JPG]
        //  hinh duoi dung luong 1mb
        
        if($request->hasfile('image'))
        {
            $mang= $this->handleFileUpload($request->file('image'));
        }
        if(count($mang) > 3){
            return redirect()->back()->withErrors("ban da nhap qua 3 hinh");
        }
        $product = new Product();
        $data['image']=json_encode($mang);
        $data['id_user'] = $id_user;
        if($product->create($data)){
            return redirect('account/product')->with('success','Tao moi thanh cong');
        }
      
    }
    public function handleFileUpload($file) {
        $mang = [];
        $id_user = Auth::user()->id;
        $date = strtotime(date('Y-m-d H:i:s'));
        foreach($file as $image)
        {

            if(!file_exists('upload/user/product/'.$id_user)){
                mkdir('upload/user/product/'.$id_user, 0777, true);
            }

            $name = $date.'-'.$image->getClientOriginalName();
            $name_2 = $date.'smail'.'-'.$image->getClientOriginalName();
            $name_3 = $date.'larger'.'-'.$image->getClientOriginalName();

            $path = public_path('upload/user/product/'.$id_user.'/'.$name);
            $path2 = public_path('upload/user/product/'.$id_user.'/smail'.$name_2);
            $path3 = public_path('upload/user/product/'.$id_user.'/larger'.$name_3);

            Image::make($image->getRealPath())->save($path);
            Image::make($image->getRealPath())->resize(50, 70)->save($path2);
            Image::make($image->getRealPath())->resize(200, 300)->save($path3);
           
            
            $mang[] = $name;

        }
        return $mang;
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
        $product = Product::find($id)->toArray();
        $images = json_decode($product['image'],true);
        $category = Category::all();
        $brand = Brand::all();
        return view('frontend/member/product/edit')->with(compact('product','images','category','brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $product = Product::find($id);
        $mang = [];
        $data['image'] = $product['image'];   
        $trangthai = $data['trangthaisp'];
        if($trangthai == 1){
            $data['sale'] = $request->sale; 
        }else{
            $data['sale'] = null;
        }  

        if(!empty($data['file'])){
            $getArrImage = json_decode($product['image'], true);
            foreach($getArrImage as $key => $value){
                //xem 
                if(in_array($value, $data['file'] )){
                    unset($getArrImage[$key]);
                }else{
                    $mang[] = $value; 
                }
            }

            if($request->hasfile('image'))
            {
                $arrUpload= $this->handleFileUpload($request->file('image'));
            }
            $newArr = array_merge($mang,$arrUpload);
            
            if(count($newArr) > 3){
                return redirect()->back()->withErrors("ban da nhap qua 3 hinh");
            }else{
                $data['image'] = json_encode($newArr);
            }
        }
        
        if($product->update($data)){
            return redirect('/account/product')->with('success','updata thanh cong');
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
        $product = Product::findOrFail($id);
        if($product->delete()){
            return redirect()->back()->with('success','xoa thanh cong');
        }
    }
}

