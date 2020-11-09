<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $blog = Blog::with('User')->paginate(3);
        return view('/admin/blog/blog')->with(compact('blog'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/blog/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $data = $request->all();
        $userID = Auth::id();

        $data['id_user'] = $userID;
        $file = $request->image;
        if(!empty($file)){
            $data['image'] = $file->getClientOriginalName();
        }
        if(Blog::create($data)){
            if(!empty($file)){
                $file->move('upload',$file->getClientOriginalName());
            }
            return redirect('/admin/blog')->with('success', ' them thanh cong');
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
        $blog = Blog::findOrFail($id);
        return view('admin/blog/edit')->with(compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $data = $request->all();
        $userID = Auth::id();
        $data['id_user'] = $userID;
        $file = $request->image;
        if(!empty($file)){
            $data['image'] = $file->getClientOriginalName();
        }

        if($blog->update($data)){
            if(!empty($file)){
               $file->move('upload',$file->getClientOriginalName());
            }
            return redirect('/admin/blog')->with('success',__('update thanh cong'));
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
        
        $blogId = Blog::findOrFail($id);
        if($blogId->delete()){
            return redirect()->back()->with('success','xoa thanh cong');
        }
    }
}
