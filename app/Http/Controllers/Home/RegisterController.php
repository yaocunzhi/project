<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;//把邮箱发送封装在类里面
use Gregwar\Captcha\CaptchaBuilder;//导入验证码校验类
use App\Models\HomeRegister;
use Hash;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //测邮件
    public function sendmail()
     {   //raw发送的原始字符串 php11111发送的内容 $message 消息生成器;
         //to 抄送 cc 抄送 bcc不抄送
         //subject 邮件的主题
        Mail::raw('php1111111',function($message){
            $message->to('601813357@qq.com');
            $message->subject('测试邮件');
        });
            
       
     }
    
    
     public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function code()
    {
      ob_clean();//清除操作 
      $builder = new CaptchaBuilder; 
      //可以设置图片宽高及字体
       $builder->build($width = 100, $height = 40, $font = null); 
       //获取验证码的内容 
       $phrase = $builder->getPhrase(); 
       //把内容存入session
       session(['vcode'=>$phrase]);
        //生成图片 header("Cache-Control: no-cache, must-revalidate");
         header('Content-Type: image/jpeg'); 
         $builder->output(); 
    }
    public function create()
    {
       //加载邮箱注册yemain
       return view('Home.Register.register');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //发送邮件激活用户 $id用户的id $email用户邮箱 $token 校验参数
     public function sendmail1($id,$email,$token)
     {
        Mail::send("Home.Register.jihuo",["id"=>$id,'token'=>$token],function($message)use($email)
        {
            $message->to($email);
            $message->subject('激活用户');

        });
        return true;
     }
    public function store(Request $request)
    {    //获取验证码
        $code=$request->input('code');
        //获取系统验证码
         $vcode=session('vcode');
        //echo $code.":".$vcode;
        //做出判断
        if($code==$vcode){
            echo 'ok';
            $data['uname']=$request->input('uname');
            $data['email']=$request->input('email');
            $data['password']=Hash::make($request->input('password'));
            $data['status']=1;//代表没有激活;0代表激活
            $data['token']=str_random(50);
            $user=HomeRegister::create($data);
             //dd($suer);
             //在插入数据的同时获取id
            $id=$user->id;
            if ($id) {
               //echo 'ok';
               //调用方法发送邮件用老激活用户
                $res=$this->sendmail1($id,$data['email'],$data['token']);

                if ($res) {
                  echo '发送邮件激活用户,请登录邮箱';
                }else{
                return back()->with('error','重用发送邮件');
                }
            }else{
                echo 'errpr';
            }
        }else{
            return back()->with('error','验证码错误');
        }
    }  
          public function jihuo(Request $request)
     {
          $id=$request->input("id");
          //用户里的token做验证
          $token=$request->input('token');
          //获取数据库的数据
          $user=HomeRegister::where('id','=',$id)->first();
          if ($token==$user->token) {
              $data['status']=0;//代表用户已激活    
              $data['token']=str_random(50);
              HomeRegister::where('id','=',$id)->update($data);
             return redirect('/homelogin/create'); 

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
    //手机号的注册
    public function registerphone(Request $request)
    {
        $data=$request->all();
        dd($data);
    } 
     //检测手机是佛唯一
    public function checkphone(Request $request)
    {    
      $p=$request->input('p');
        //echo $p;
        //用用户表里的数据和user数据库里的手机号码做对比
        $phone=HomeRegister::pluck('phone')->toArray();
         //dd($phone);
         if (in_array($p,$phone)) {
             echo 1;//存在
         }else{
             echo 2; //不存在
         }
    }
    //短息发送验证
    public function registersendphone(Request $request)
    {     //echo 'nmmm';
           $pp=$request->input("pp");
          //echo $pp;
         //调用短息接口
         $data=sendsphone($pp);
         echo $data;
    }
    public function checkcode(Request $request)
    {
      $code=$request->input('codes');
        if (isset($_COOKIE['pcode']) && !empty($code)) {
            // 获取系统的校验码
            $pcode=$request->cookie('pcode');
           if ($code==$pcode) {
              echo 1; //校验码正确
           }else{
              echo 2;  //校验码有误
            }
        }else if(empty($code)){
             echo  3; //校验码为空;
        }else {
             echo 4; //校验码过期;
        }
    }
}
