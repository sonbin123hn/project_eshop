<?php

namespace App\Http\Controllers;

use App\Demo;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\DemoRequest;

class DemoController extends Controller
{
    public function index(){
        return view('demo');
    }

    public function doUpload(DemoRequest $request)
    {
        //Kiểm tra file
        //echo "aaa";
        
        if ($request->hasFile('filesTest')) {
            echo "aaa";
            $file = $request->filesTest;

            //Lấy Tên files
            echo 'Tên Files: ' . $file->getClientOriginalName();
            echo '<br/>';

            //Lấy Đuôi File
            echo 'Đuôi file: ' . $file->getClientOriginalExtension();
            echo '<br/>';

            //Lấy đường dẫn tạm thời của file
            echo 'Đường dẫn tạm: ' . $file->getRealPath();
            echo '<br/>';

            //Lấy kích cỡ của file đơn vị tính theo bytes
            echo 'Kích cỡ file: ' . $file->getSize();
            echo '<br/>';

            //Lấy kiểu file
            echo 'Kiểu files: ' . $file->getMimeType();

            $file->move('upload', $file->getClientOriginalName());
        }

        // $this->validate($request,
        //     [
        //         'name' => 'required|min:5|max:255',
        //         'age' => 'required|abc|max:3',
        //     ],

        //     [
        //         'required' => ':attribute Không được để trống',
        //         'min' => ':attribute Không được nhỏ hơn :min',
        //         'max' => ':attribute Không được lớn hơn :max',
        //         'abc' => ':attribute Chỉ được nhập số',
        //     ],

        //     [
        //         'name' => 'Tiêu đề',
        //         'age' => 'Tuổi',
        //     ]

        // );
        $abc = 1;
        if($abc!=1) {
            return redirect()->back()->withErrors('testttttt');
        }else {
            return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$file->getClientOriginalName());
        }
        

    }




    public function GetLogin()
    {
        return view('login');
    }

    public function PostLogin(Request $request)
    {
        echo $request->username."----";
        echo $request->password;
        //dd($request);
        
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Demo  $demo
     * @return \Illuminate\Http\Response
     */
    public function show(Demo $demo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Demo  $demo
     * @return \Illuminate\Http\Response
     */
    public function edit(Demo $demo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Demo  $demo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demo $demo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Demo  $demo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demo $demo)
    {
        //
    }
}
