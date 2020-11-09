<?php

namespace App\Http\Controllers\Frontend;

use App\Blog;
use App\Comment;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentsRequest;
use App\Http\Requests\MemberRequet;
use App\Http\Requests\UserUpdateRequest;
use App\Product;
use App\rate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function showLogin()
    {
        return view('frontend/member/login');
        //
    }
    public function showRegister()
    {
        return view('frontend/member/register');
        //
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
    public function login(MemberRequet $request)
    {
        $login= [
            'email' => $request->email,
            'password' => $request->pass,
            'level' => 0
        ];
        if(Auth::attempt($login)){
            return redirect('/index');
        }
        return redirect()->back()->withErrors('email or password is not login');
        
    }
    public function register(MemberRequet $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['level'] = '0';
        if(User::create($data))
        {
            return redirect('/member-login')->with('abc',__('register is success'));
        } else{
            return redirect()->back()->withErrors('create is not success');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = Auth::user()->id;
        $account = User::findOrFail($id);
        $country = Country::all();
        return view('frontend/member/account')->with(compact('account','country'));
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
    public function update(UserUpdateRequest $request)
    {
        $id = Auth::user()->id;
        $account = User::findOrFail($id);
        $data = $request->all();
        $file = $request->avatar;

        if(!empty($file)){
            $data['avatar'] = $file->getClientOriginalName();
        }
        
        if(!empty($request->password)){

            $data['password'] = bcrypt($request->password);
        }else{
            $data['password'] = $account->password;
        }

        if($account->update($data)){
            if(!empty($file)){
                $file->move('upload', $file->getClientOriginalName());
            }
            // redirect chuyen huong!
            return redirect()->back()->with('abc',__('Update profile success.'));
        } else {
            return redirect()->back()->withErrors('Update profile error.');
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
        //
    }
}
