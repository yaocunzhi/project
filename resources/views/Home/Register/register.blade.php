<!doctype html>
<html lang="zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>灯世界 - 用户注册</title>
<meta name="keywords" content="灯世界" />
<meta name="description" content="灯世界" />
<meta name="author" content="33Hao">
<meta name="copyright" content="33Hao Inc. All Rights Reserved">
 <script type="text/javascript" src="jquery-1.8.3.min.js"></script>
<style type="text/css">

  .g{
       border: 1px solid green;
  }
  .r{

        border: 1px solid red;
  }
 </style>
<link href="/static/Home/staticss/css/base.css" rel="stylesheet" type="text/css">
<link href="/static/Home/staticss/css/home_header.css" rel="stylesheet" type="text/css">
<link href="/static/Home/staticss/css/home_login.css" rel="stylesheet" type="text/css">
<link href="/static/Home/staticss/css/font-awesome.min.css" rel="stylesheet" />
<!--[if IE 7]>
  <link rel="stylesheet" href="/static/Home/staticss/css/font-awesome-ie7.min.css">
<![endif]-->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="/static/Home/staticss/js/html5shiv.js"></script>
      <script src="/static/Home/staticss/js/respond.min.js"></script>
<![endif]-->
<script>
var COOKIE_PRE = '79CA_';var _CHARSET = 'utf-8';var SITEURL = 'https://www.wpccw.com/shop';var SHOP_SITE_URL = 'https://www.wpccw.com/shop';var RESOURCE_SITE_URL = 'https://www.wpccw.com/data/resource';var RESOURCE_SITE_URL = 'https://www.wpccw.com/data/resource';var SHOP_TEMPLATES_URL = 'SHOP_TEMPLATES_URL';
</script>
<script src="/static/Home/staticss/js/jquery.js"></script>
<script src="/static/Home/staticss/js/jquery.ui.js"></script>
<script src="/static/Home/staticss/js/common.js"></script>
<script src="/static/Home/staticss/js/jquery.validation.min.js"></script>
<script src="/static/Home/staticss/js/dialog.js" id="dialog_js"></script>
<script src="/static/Home/staticss/js/taglibs.js"></script>
<script src="/static/Home/staticss/js/tabulous.js"></script>
</head>
<body>
  
<div class="qt-header-other">
      <div class="w1200">
        <div class="qt-logo"><a class='statis' site='1' href="https://www.wpccw.com/shop" title="灯世界"><img src="/static/Home/staticss/picture/06063909077669875.png"></a></div>
        <div class="header-title">
                 注册
                </div>
      </div>
    </div>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
    <div class="login-main" style="background-color:#ff0000; height: 476px;">
      <div class="w1200" ><a href="http://www.wpccw.com/member/index.php?act=article&amp;article_id=24" target="_blank"><img data-which="register" site='2' src="/static/Home/staticss/picture/4.jpg" /></a>
      <!--注册-->
        <div class="login-wrap">
          <div class="login-hearder"><a  class='statis site-change' site='3' href="/homelogin/create" >
            <div class="header-btn"> 登录 </div>
            </a>
            <div class="header-btn on"> 注册 </div>
          </div>
          <div class="login-content">
            <div class="login-others">
                                    <a id="statis-qq" class='statis other-logo logo-qq' site='4'  href="https://www.wpccw.com/member/index.php?act=connect_qq" ><i></i>&nbsp; <span>QQ注册</span></a>
                                     <a id='statis-wx' site='5' class='statis other-logo logo-wechat' href="javascript:void(0);" onclick="ajax_form('weixin_form', '微信账号注册', 'https://www.wpccw.com/member/index.php?act=connect_wx&op=index', 360);"><i></i>&nbsp; <span>微信注册</span></a>       
                         <a id='statis-sina' site='6' class='statis other-logo logo-weibo'  href="https://www.wpccw.com/member/index.php?act=connect_sina" ><i></i>&nbsp; <span>微博注册</span></a>
                      
            </div>
            <div class="login-box">
              <p class="cutting-line"><span>或</span></p>



          <!-- 手机注册 -->
           
             <form  action="/registerphone" method="post" id="ff">
               <div class="phone-box"> 
                  <div class="login-form">
                 <div class="input-inline" style="margin-top:10px"">
                  <div class="input-icon i-user"></div>
                    <label for="phone"><i class="am-icon-envelope-o"></i></label>
                    <input type="tel" name="phone" id="phone"  style="width: 330px;height: 45px;margin-left:px;font-size: 15px;color: black;" placeholder="请输入电话号码" class="ll" reminder="请输入正确的手机号"><span></span>
                 </div> 
                   <div class="input-inline captcha" margin-top="10px">
                  <input  name="codes" id="codes" type="tel" style="width:  120px;" maxlength="6" autocomplete="off" class="ll" tipMsg="输入短信验证码" reminder="请输入验证码"><span></span> 
                  <div class="btn-captcha qt-btn btn-green" style="width:60px;">
                  <a href="javascript:void(0)" style="font-size:20px;color: red" id="ss">获取</a>
                  <p class="warning-text"></p>
                    </div>
                   </div>                   
                 <div class="input-inline" style="margin-top:10px">
                   <div class="input-icon i-password"></div>
                    <label for="password"><i class="am-icon-lock"></i></label>
                    <input type="password" style="width: 330px;;height: 45px;font-size: 15px;color: black;" name="password"  id="password" placeholder="设置密码" class="ll" reminder="请输入正确的密码"><span></span>
                 </div>                   
                 <div class="input-inline" >
                     <div class="input-icon i-password" style="margin-top:20px" ></div>
                    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
                    <input type="password"style="width: 330px;px;height: 45px;font-size: 15px; color: black;" name="repassword" id="passwordRepeat" placeholder="确认密码" class="ll" reminder="请再次重复密码"><span></span>
                 </div> 
                    
                   <div class="disabled" id="submit-passwd" >
                      {{csrf_field()}}
                      <input type="submit" site='20'style="width: 330px;height: 50px;margin-left:px;font-size: 15px;" class="login-submit qt-btn btn-green-linear" value="立即注册">
                    </div>
                        <div class="login-switch clearfix"><a href="#"  site='15' class="statis fl j-accountLogin">使用邮箱注册</a><a href=""  site='22' class="statis fr">忘记密码？</a></div> 
                </div>
                 </div>
                </form>
              



          <!-- 邮箱注册 -->

      <div class="account-box">

             <form  action="/homeregister" method="post">
                    @if(session('error'))
                    {{session('error')}}
                    @endif
                  <div class="login-form">
                  <div class="input-inline">
                  <div class="input-icon i-user"></div>
                    <label for="email"><i class="am-icon-envelope-o"></i></label>
                    <input type="email" name="email" id="email" style="width: 330px;height: 45px;margin-left:px;font-size: 15px;color: black;"utocomplete="off" placeholder="请输入邮箱账号"><span></span>
                 </div>  
                 <div class="input-inline">
                  <div class="input-icon i-user"></div>
                    <label for="uname"><i class="am-icon-envelope-o"></i></label>
                    <input type="text" name="uname" utocomplete="off" style="width: 330px;height: 45px;margin-left:px;font-size: 15px;color: black;" placeholder="请输入昵称"><span></span>
                 </div>                   
                 <div class="input-inline">
                   <div class="input-icon i-password"></div>
                    <label for="password"><i class="am-icon-lock"></i></label>
                    <input type="password" style="width: 330px;;height: 45px;font-size: 15px;color: black;" name="password" id="password" utocomplete="off"placeholder="设置密码"><span></span>
                 </div>                   
                 <div class="input-inline">
                     <div class="input-icon i-password"></div>
                    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
                    <input type="password"style="width: 330px;px;height: 45px;font-size: 15px; color: black;" name="repassword" utocomplete="off"id="passwordRepeat" placeholder="确认密码"><span></span>
                 </div> 

                  <div class="input-inline">
                    <label for="passwordRepeat"><i class="am-icon-code-fork"></i></label>
                    <img src="/code" onclick="this.src=this.src+'?a=1'" style="float:right"> <span></span>
                 </div>

                  <div class="verification">
                      <label for="code"><i class="am-icon-code-fork"></i></label>
                      <input type="tel" style="width: 220px;height: 45px;font-size: 15px;color: black;" checked="" name="code" id="code" placeholder="请输入验证码">
                    </div> 
                 
                 
                 <div class="login-links">
                  </div>
                   <div class="disabled" id="submit-passwd">
                      {{csrf_field()}}
                      <input type="submit" site='20'style="width: 330px;height: 50px;margin-left:px;font-size: 15px;" class="login-submit qt-btn btn-green-linear" value="立即注册">
                    </div>
                        <div class="login-switch clearfix"><a href="#"  site='21' class="statis fl j-phoneLogin">手机验证码登录</a><a href="https://www.wpccw.com/member/index.php?act=login&op=forget_password"  site='22' class="statis fr">忘记密码？</a></div>
                </div>

                </form>
              </div>
        
        
            </div>
      <div class="login-footer">
              <p class="login-type"><a  site='7' href="javascript:;" class="statis j-phoneLogin" rel="external nofollow">使用手机注册</a><a  site='8' href="javascript:;" class="statis j-accountLogin" rel="external nofollow">使用邮箱注册</a></p>
            </div>  
          </div>
        </div>
      </div>
    </div>
<script type="text/javascript">
     Phone=false;
     Code=false;
  $(".ll").focus(function(){
        //获取reminder属性
    var reminder=$(this).attr('reminder');
          //找到下一个span元素
      $(this).next('span').css('color','red').html(reminder);
      $(this).addClass('r')
       //清除样式
       $(this).removeClass('g')
      });
      // 手机号失去焦点
    $("input[name='phone']").blur(function(){
            //获取手机号码
            o=$(this)
            p=$(this).val();
             //用正则校验手机号码
           if (p.match(/^\d{11}$/)==null){

              $(this).next('span').css('color','red','fontSize','10px').html('手机号码格式不正确');
              $(this).addClass('r');
              Phone=false;
            }else{
               //手机号码是否是唯一
                $.get("/checkphone",{p:p},function(data){

                if(data==1){
                   //ajax 里面能用this;
                   //手机已经被注册
                   //号码已经被注册禁止按钮
                  $("#ss").attr('disabled',true);
                  o.next('span').css('color','red').html('手机号码已经被注册');
                  o.addClass("r");
                  Phone=false;

                }else{

                  o.next('span').css('color','green').html('手机号码可以注册');

                  o.addClass("g");
                  Phone=true;

                }
                 
               })
            }

      });
    //获取按钮
     $('#ss').click(function(){
        //获取手机号
        oo=$(this);
      pp=$("input[name='phone']").val();
        //alert(pp);
        //ajax请求数据
      $.get("/registersendphone",{pp:pp},function(data){
        // alert(data.code);
         if (data.code==000000) { 
            m=60;
           mytime=setInterval(function(){ 
             m--
             oo.html(m);
             //禁用按钮
             oo.attr('disabled',true);
             if(m<1){
              clearInterval(mytime);
              oo.html('重新发送')
              oo.attr("disabled",false);
             }
           },1000)
         }
      },'json');
      //获取写入的校验码
    $("input[name='codes']").blur(function(){
          //获取写入的验证码
        q=$(this);
        Codes=$(this).val();
        $.get('/checkcode',{codes:codes},function(data){
            
            if(data==1){
              q.next('span').css('color','green').html('校验码正确');
              q.addClass("g");
              Code=true;
             }else if (data==2){
              q.next('span').css('color','red').html('校验码错误');
              q.addClass("r");
              Code=false;
            }else if(data==3){
              q.next('span').css('color','red').html('校验码为空');
              q.addClass("r");
              Code=false;
            }else if (data==4){
              q.next("span").css('color','red').html('校验码为过期');
              q.addClass('r');
              Code=false;
            }
        })
      });
       //表单提交
       $("#ff").submit(function(){
         $("input").trigger("blur");
         if (Phone && Code) {
            return false; //阻止表单提交
         }else{
            return true; // 提交;
         }
       })
     });

  </script>
<script type="text/javascript" src="/static/Home/staticss/js/register.js"></script>
  
<script>
$(document).ready(function() {
  //初始化Input的灰色提示信息  
  $('input[tipMsg]').inputTipText({pwd:'password'});
    $('.j-phoneLogin,.j-accountLogin').on('click', function() {
        var oLoginWrap = $(this).closest('.login-wrap');
        $(".geetest_logo").attr('href', 'javascript:void(0);');
        oLoginWrap.find('.phone-box,.account-box').hide();
        if ($(this).hasClass('j-phoneLogin')) {
            oLoginWrap.find('.phone-box').show();
            $("#statis-enroll").attr('site', '9');
            $("#statis-qq").attr('site', '10');
            $("#statis-wx").attr('site', '11');
            $("#statis-sina").attr('site', '12')
        } else {
            $("#statis-enroll").attr('site', '16');
            $("#statis-qq").attr('site', '17');
            $("#statis-wx").attr('site', '18');
            $("#statis-sina").attr('site', '19');
      oLoginWrap.find('.login-others-cards').hide();
            oLoginWrap.find('.account-box').show();
        }
        if (!oLoginWrap.find('.login-footer').is(':hidden')) {
            oLoginWrap.find('.login-footer').hide();
            oLoginWrap.find('.login-others').stop().animate({
                marginTop: '-100px'
            }, 200, 'linear', function() {
        $(this).attr('class', 'login-others-cards').hide();
        
         //$(this).attr('class', 'login-others-cards').removeAttr('style');
                oLoginWrap.find('.login-box').fadeIn(300);
         oLoginWrap.find('.cutting-line').hide();
        oLoginWrap.find('.nc-login-form').css("margin-top","20px");
        
        
            })
        }
    });
  
        $('.agreement-handle').click(function () {
            $('body').append('<div class="agreement-handle-message" style=" font-size: 14px;\n' +
                'display: none;' +
                'line-height: 1.5;\n' +
                'padding: 20px 30px;' +
                'border-radius: 4px;' +
                '-webkit-box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);' +
                'box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);' +
                'background: #fff;' +
                'color: rgba(0, 0, 0, 0.65);\n' +
                'list-style: none;\n' +
                'position: fixed;\n' +
                'z-index: 1010;\n' +
                'margin-left: -138px;' +
                'top: 16px;\n' +
                'left: 50%;"><img src="/static/Home/staticss/picture/warning-icon.png" style="display: inline-block;vertical-align: middle;margin-right: 15px">注册必须同意该协议</div>');
            $('.agreement-handle-message').fadeIn();
            setTimeout(function () {
                $('.agreement-handle-message').fadeOut();
                $('.agreement-handle-message').remove()
            }, 3000)
        });
  
  
    var _register_member = 0;
//注册表单验证
    $("").validate({
        errorPlacement: function(error, element){
            var error_td = element.parent('.input-inline');
            error_td.append(error);
            element.addClass('error');
        },
        success: function(label) {
            label.removeClass('error').find('label').remove();
        },
      submitHandler:function(form){
          if (_register_member) return false;
          _register_member = 1;
          ajaxpost('register_form', '', '', 'onerror');
      },
        onkeyup: false,
        rules : {
            user_name : {
                required : true,
                rangelength : [6,20],
                letters_name : true,
                remote   : {
                    url :'index.php?act=login&op=check_member&column=ok',
                    type:'get',
                    data:{
                        user_name : function(){
                            return $('#user_name').val();
                        }
                    }
                }
            },
      password : {
                required : true,
                minlength: 6,
        maxlength: 20
            },
            password_confirm : {
                required : true,
                equalTo  : '#password'
            },
            email : {
                required : true,
                email    : true,
                remote   : {
                    url : 'index.php?act=login&op=check_email',
                    type: 'get',
                    data:{
                        email : function(){
                            return $('#email').val();
                        }
                    }
                }
            },
                  captcha : {
                required : true,
                remote   : {
                    url : 'index.php?act=seccode&op=check&nchash=f1e6a82f',
                    type: 'get',
                    data:{
                        captcha : function(){
                            return $('#getcaptcha').val();
                        }
                    },
                    complete: function(data) {
                        if(data.responseText == 'false') {
                          document.getElementById('codeimage').src='index.php?act=seccode&op=makecode&type=40,100&nchash=f1e6a82f&t=' + Math.random();
                        }
                    }
                }
            },
      
        },
       
    });
  
  
    });
</script>

<script type="text/javascript" src="/static/Home/staticss/js/connect_sms.js" charset="utf-8"></script> 
<script>
$(function(){
    var _sms_register_member = 0;
  $("").click(function(){
        if($("#post_form").valid()){
            check_captcha();
      }
  });
  $("#post_form").validate({
         errorPlacement: function(error, element){
            var error_td = element.parent('.input-inline');
            error_td.append(error);
            element.addClass('error');
        },
        success: function(label) {
            label.removeClass('error').find('label').remove();
        },
       
  });
    $('#register_sms_form').validate({
         errorPlacement: function(error, element){
            var error_td = element.parent('.input-inline');
            error_td.append(error);
            element.addClass('error');
        },
        success: function(label) {
            label.removeClass('error').find('label').remove();
        },
      submitHandler:function(form){
          if (_sms_register_member) return false;
          _sms_register_member = 1;
          ajaxpost('register_sms_form', '', '', 'onerror');
      },
   
</script>
<div class="qt-footer-other login-footer">
  <p><a href="https://www.wpccw.com/shop">首页</a>
                                                                | <a  target="_blank" href="https://www.wpccw.com/member/index.php?act=article&amp;op=show&amp;article_id=25">合作洽谈</a>
                                | <a  target="_blank" href="http://www.wpccw.com/member/index.php?act=article&amp;article_id=24">招聘英才</a>
                                        | <a  target="_blank" href="https://www.wpccw.com/member/index.php?act=article&amp;op=show&amp;article_id=23">联系我们</a>
                | <a  target="_blank" href="https://www.wpccw.com/member/index.php?act=article&amp;op=show&amp;article_id=22">关于灯饰界</a>
                | <a  target="_blank" href="http://www.gsxt.gov.cn/index.html">企业征信查询</a>
                | <a  target="_blank" href="http://www.cqc.com.cn/www/chinese/zscx/">质量认证中心</a>
                | <a  target="_blank" href="http://sbj.saic.gov.cn/sbcx/">商标查询</a>
              </p>
<a href="http://www.miibeian.gov.cn" rel="nofollow" target="_blank">Copyright ©2014~2019 中山灯世界网络有限公司 版权所有丨粤ICP备15095345-1号           客服电话：400-606-1866  互联网违法和不良信息举报电话：400-606-1866     kefu@wpccw.com</a> <div style="width:100%; padding:5px 0"><a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44200002442672" style="display:inline-block;text-decoration:none;height:20px;line-height:20px;"><img src="/static/Home/staticss/picture/beian.png" style="float:left;"/><p style="float:left;height:20px;line-height:20px;margin: 0px 0px 0px 5px; padding:0px; color:#939393;">粤公网安备 44200002442672号</p></a>
      </div>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?b5862359cf3f33ed3ff363c2ad50142d";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script></div>
</body>
  <script type="text/javascript">

  </script>
</html>
