<?php

namespace App\Http\Controllers\Frontend;

use App\Blog;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentsRequest;
use App\rate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::paginate(3);
        return view('frontend/blog/list')->with(compact('blog'));
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
    public function rate(Request $request){

        $value = $request->all();
        $rate['id_user'] = Auth::user()->id;
        $rate['id_blog'] = $value['blog'];
        $rate['rate'] = $value['rate'];
        if(rate::create($rate)){
            echo 'danh gia thanh cong';
        }else{
            echo 'danh gia that bai';
        }

    }
    public function cmt(CommentsRequest $request,$id)
    {   
        $cmt['id_blog'] = $id;
        $cmt['id_user'] = Auth::user()->id;
        $cmt['name'] = Auth::user()->name;
        $cmt['avata'] = Auth::user()->avatar;
        $cmt['cmt'] = $request->message;
        $cmt['id_cmt'] = 0;
        if(!empty($request->id_cmt))
        {
            $cmt['id_cmt'] = $request->id_cmt;
        }

        if(Comment::create($cmt)){
            return redirect()->back();
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
        $rate = rate::where('id_blog',$id)->get();
        //kiem tra rate 
        $tbc =0;
        if(!empty($rate)){
            $tong = 0;
            $dem = 0;
            foreach($rate as $value){
                $dem++;
                $tong += $value['rate'];
            }
            $tbc=round($tong/$dem);
        }

        $blog = Blog::findOrFail($id);
        $comment = Comment::all();
        $previous = Blog::where('id', '<', $blog->id)->max('id');
        $next = Blog::where('id', '>', $blog->id)->min('id');
        
        
       

        return view('frontend/blog/detail')->with(compact('blog','previous','next','comment','tbc'));
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
