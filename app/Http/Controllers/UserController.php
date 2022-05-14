<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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

    public function check(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required|min:8|max:16'
        ]);
        $userInfo=User::where('username','=',$request->input('username'))->first();
        if (!$userInfo) {
            return back()->with('fail','Tài khoản không chính xác!');
        } else {
            if (Hash::check($request->input('password'), $userInfo->password)) {
                $request->session()->put('LoggedUser',$userInfo);
                return redirect("/");
            } else {
                return back()->with('fail','Mật khẩu không đúng!');
            }
            
        }
    }
    public function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->flush();
            return redirect('/');
        }
    }

    function login(){
        if (session()->has('LoggedUser')) {
            return back();
        }
        return view('login');
    }

    function register(){
        if (session()->has('LoggedUser')) {
            return back();
        }
        return view('register');
    }
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
        $request->validate([
            'username'=>'required',
            'phone'=>'required|unique:users',
            'name'=>'required',
            'password'=>'required|min:8|max:16',
            're-password'=>'required|min:8|max:16|required_with:password|same:password'
        ]);
        $create=User::create([
            'username'=>$request->input('username'),
            'name'=>$request->input('name'),
            'phone'=>$request->input('phone'),
            'password'=>Hash::make($request->input('password')),
            'role_id' => 1
        ]);
        if(!$create){
            return redirect("/")->with('Fail','Đăng ký thất bại!');
        }
        $request->session()->put('LoggedUser',User::find($create->id));
        return redirect("/")->with('Success','Đăng ký thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $update=User::find($request->session()->get('LoggedUser')->id)->update([
            'username'=>$request->input('username'),
            'name'=>$request->input('name'),
            'phone'=>$request->input('phone'),
            // 'password'=>Hash::make($request->input('password'))
        ]);
        // dd($request->session());
        if (!$update) {
            return back()->with('Fail','Cập nhật thất bại!');
        }
        return back()->with('Success','Bạn đã cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
