<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home;
use Hash;
use Mail;
class HomeloginController extends Controller
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

    /**
     * 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Home.Homelogin.login");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email=$request->input('email');
        $password=$request->input('password');
        $info=home::where('email','=',$email)->first();
        if($info) {
           if (Hash::check($password,$info->password)) {
        	 if($info->status=='激活'){
                  session(['email'=>$email]);
                  session(['user_id'=>$info->id]);
        	 	return redirect('/homeindex');
        	 }else{
        		echo back()->with('error','邮箱没有激活');	
        	 }
        	}else{
        		echo back()->with('error','密码有错误');
        	}
        }else{
        	echo back()->with('error','邮箱有误');
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
    public function forget()
    {
      return view('Home.Homelogin.forget');
    }

    public function loginmail1($id,$email,$token)
     {
        Mail::send("Home.Homelogin.reset",["id"=>$id,'token'=>$token],function($message)use($email) {
       
            $message->to($email);
            $message->subject('重置密码');

        });
        return true;
     }
    public function doforget(Request $request)
    {
    	$email=$request->input('email');
    	$info=Home::where('email','=',$email)->first();
    	if ($this->loginmail1($info->id,$email,$info->token)) {
    		return redirect('https://mail.qq.com/');
    	}                    
    }
    public function reset(Request $request)
    {
    	$id=$request->input('id');
    	$token=$request->input('token');
    	//echo $id.":".$token;
    	$info=Home::where('id','=',$id)->first();
    	if ($token==$info->token) {
    		return  view("home.Homelogin.reset1",['id'=>$id]);
    	}
    }
    public function doreset(Request $request)
    {
        $id=$request->input('id');
        $password=$request->input('password');
        $data['password']=Hash::make($password);
        $data['token']=str_random(50);
        if (Home::where('id','=',$id)->update($data)) {
        	return redirect('/homelogin/create');
        }
    }
}
