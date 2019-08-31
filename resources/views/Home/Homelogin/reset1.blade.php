<!doctype html>
<html lang="zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title> 忘记密码</title>
<meta name="keywords" content="灯世界" />
<meta name="description" content="灯世界" />
<meta name="author" content="33Hao">
<meta name="copyright" content="33Hao Inc. All Rights Reserved">
<style type="text/css">
body { _behavior: url(https://www.wpccw.com/member/templates/default/css/csshover.htc);
}
</style>
<link href="/static/Home/staticsb/css/base_1.css" rel="stylesheet" type="text/css">
<link href="/static/Home/staticsb/css/home_header_1.css" rel="stylesheet" type="text/css">
<link href="/static/Home/staticsb/css/home_login_1.css" rel="stylesheet" type="text/css">
<link href="/static/Home/staticsb/css/font-awesome.min_1.css" rel="stylesheet" />
<!--[if IE 7]>
  <link rel="stylesheet" href="/static/Home/staticsb/css/font-awesome-ie7.min_1.css">
<![endif]-->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="/static/Home/staticsb/js/html5shiv_1.js"></script>
      <script src="/static/Home/staticsb/js/respond.min_1.js"></script>
<![endif]-->
<script>
var COOKIE_PRE = '79CA_';var _CHARSET = 'utf-8';var SITEURL = 'https://www.wpccw.com/shop';var SHOP_SITE_URL = 'https://www.wpccw.com/shop';var RESOURCE_SITE_URL = 'https://www.wpccw.com/data/resource';var RESOURCE_SITE_URL = 'https://www.wpccw.com/data/resource';var SHOP_TEMPLATES_URL = 'SHOP_TEMPLATES_URL';
</script>
<script src="/static/Home/staticsb/js/jquery_1.js"></script>
<script src="/static/Home/staticsb/js/jquery.ui_1.js"></script>
<script src="/static/Home/staticsb/js/common_1.js"></script>
<script src="/static/Home/staticsb/js/jquery.validation.min_1.js"></script>
<script src="/static/Home/staticsb/js/dialog_1.js" id="dialog_js"></script>
<script src="/static/Home/staticsb/js/taglibs_1.js"></script>
<script src="/static/Home/staticsb/js/tabulous_1.js"></script>
</head>
<body>
<div class="qt-header-other">
      <div class="w1200">
        <div class="qt-logo"><a class='statis' site='1' href="https://www.wpccw.com/shop" title="灯世界"><img src="/static/Home/staticsb/picture/06063909077669875_1.png"></a></div>
        <div class="header-title">
                 注册
                </div>
      </div>
    </div>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="login-main" style="background-color:#7f7f7f; height: 476px;">
      <div class="w1200" ><img class='statis publicPicClick' data-which="register" site='2' src="/static/Home/staticsb/picture/4_1.jpg"  >
      <!--手机验证码登录-->
        <div class="login-wrap">
          <div class="login-hearder">
      <ul class="tabs-nav">
        <li class="j-accountLogin on"><a href="javascript:;">重置密码<i></i></a></li>
              </ul>   
      </div>
          <div class="login-content">
        
                      
              <div class="account-box" style="display: block">
               <form class="nc-login-form" action="doreset" method="POST" id="find_password_form">
                <div class="login-form">
                  
                  <div class="input-inline">
                    <div class="input-icon i-password"></div>
                    <input type="password" class="text" name="password" tipMsg="请输入新密码" />
                  </div>
                   <div class="input-inline">
                    <div class="input-icon i-password"></div>
                    <input type="password" class="text" name="repassword" tipMsg="请确认新密码" />
                  </div>
                  <div class="disabled" id="submit-passwd">
                     <input type="hidden" value="{{$id}}" name="id">
                    {{csrf_field()}}                     
        <input type="submit" site='20' class="login-submit qt-btn btn-green-linear" value="立即提交">
                
                  </div>
                </div>
                 </form>
              </div>
        
                      <div class="login-footer">
              <p class="login-type"><a  site='7' href="https://www.wpccw.com/member/index.php?act=login&op=index" class="statis" rel="external nofollow">登录</a><a  site='8' href="https://www.wpccw.com/member/index.php?act=login&op=register" class="statis" rel="external nofollow">注册</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
<script type="text/javascript">
$(function(){
  var cotrs = $(".tabs-nav li");
  cotrs.click(function(){
   $(this).addClass("on").siblings().removeClass("on");
  });
  //初始化Input的灰色提示信息  
  $('input[tipMsg]').inputTipText({pwd:'password'});
    $('.j-phoneLogin,.j-accountLogin').on('click', function() {
        var oLoginWrap = $(this).closest('.login-wrap');
        oLoginWrap.find('.phone-box,.account-box').hide();
        if ($(this).hasClass('j-phoneLogin')) {
            oLoginWrap.find('.phone-box').show();
        } else {
            oLoginWrap.find('.account-box').show()
        }
    });
  
    $('#Submit').click(function(){
        if($("#find_password_form").valid()){
          ajaxpost('find_password_form', '', '', 'onerror');
        } else{
          document.getElementById('codeimage').src='index.php?act=seccode&op=makecode&type=40,100&nchash=44e012a0&t=' + Math.random();
        }
    });
    $('#find_password_form').validate({
        errorPlacement: function(error, element){
            var error_td = element.parent('.input-inline');
            error_td.append(error);
            element.addClass('error');
        },
        success: function(label) {
            label.removeClass('error').find('label').remove();
        },
        rules : {
            username : {
                required : true
            },
            email : {
                required : true,
                email : true
            },
            captcha : {
                required : true,
                minlength: 4,
                remote   : {
                    url : 'index.php?act=seccode&op=check&nchash=44e012a0',
                    type: 'get',
                    data:{
                        captcha : function(){
                            return $('#captcha').val();
                        }
                    }
                }
            } 
        },
        messages : {
            username : {
                required : '<i class="icon-exclamation-sign"></i>用户名不能为空'
            },
            email  : {
                required : '<i class="icon-exclamation-sign"></i>请输入邮箱地址',
                email : '<i class="icon-exclamation-sign"></i>电子邮箱填写错误'
            },
            captcha : {
                required : '<i class="icon-remove-circle" title="验证码不能为空"></i>',
                minlength : '<i class="icon-remove-circle" title="验证码错误"></i>',
                remote   : '<i class="icon-remove-circle" title="验证码错误"></i>'
            }
        }
    });
});
</script>
<script type="text/javascript" src="/static/Home/staticsb/js/connect_sms_1.js" charset="utf-8"></script> 
<script>
$(function(){
  $("#post_form").validate({
        errorPlacement: function(error, element){
            var error_td = element.parent('.input-inline');
            error_td.append(error);
            element.addClass('error');
        },
        success: function(label) {
            label.removeClass('error').find('label').remove();
        },
      submitHandler:function(form){
          ajaxpost('post_form', '', '', 'onerror');
      },
        onkeyup: false,
    rules: {
      phone: {
                required : true,
                mobile : true
            },
      captcha : {
                required : true,
                minlength: 4,
                remote   : {
                    url : 'index.php?act=seccode&op=check&nchash=44e012a0',
                    type: 'get',
                    data:{
                        captcha : function(){
                            return $('#image_captcha').val();
                        }
                    },
                    complete: function(data) {
                        if(data.responseText == 'false') {
                          document.getElementById('sms_codeimage').src='index.php?act=seccode&op=makecode&type=40,100&nchash=44e012a0&t=' + Math.random();
                        }
                    }
                }
            },
      sms_captcha: {
                required : function(element) {
                    return $("#captcha").val().length == 4;
                },
                minlength: 6
            },
            password : {
                required : function(element) {
                    return $("#sms_captcha").val().length == 6;
                },
                minlength: 6,
        maxlength: 20
            }
    },
    messages: {
      phone: {
                required : '<i class="icon-exclamation-sign"></i>请输入正确的手机号',
                mobile : '<i class="icon-exclamation-sign"></i>请输入正确的手机号'
            },
      captcha : {
                required : '<i class="icon-remove-circle" title="请输入正确的验证码"></i>',
                minlength: '<i class="icon-remove-circle" title="请输入正确的验证码"></i>',
        remote   : '<i class="icon-remove-circle" title="请输入正确的验证码"></i>'
            },
      sms_captcha: {
                required : '<i class="icon-exclamation-sign"></i>请输入六位短信验证码',
                minlength: '<i class="icon-exclamation-sign"></i>请输入六位短信验证码'
            },
            password  : {
                required : '<i class="icon-exclamation-sign"></i>密码不能为空',
                minlength: '<i class="icon-exclamation-sign"></i>密码长度应在6-20个字符之间',
        maxlength: '<i class="icon-exclamation-sign"></i>密码长度应在6-20个字符之间'
            }
    }
  });
});
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
<a href="http://www.miibeian.gov.cn" rel="nofollow" target="_blank">Copyright ©2014~2019 中山灯世界网络有限公司 版权所有丨粤ICP备15095345-1号           客服电话：400-606-1866  互联网违法和不良信息举报电话：400-606-1866     kefu@wpccw.com</a> <div style="width:100%; padding:5px 0"><a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44200002442672" style="display:inline-block;text-decoration:none;height:20px;line-height:20px;"><img src="/static/Home/staticsb/picture/beian_1.png" style="float:left;"/><p style="float:left;height:20px;line-height:20px;margin: 0px 0px 0px 5px; padding:0px; color:#939393;">粤公网安备 44200002442672号</p></a>
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
</html>
