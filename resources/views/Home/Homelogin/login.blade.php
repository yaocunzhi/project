<!doctype html>
<html lang="zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>- 登&nbsp;&nbsp;&nbsp;录</title>
<meta name="keywords" content="灯世界" />
<meta name="description" content="灯世界" />
<meta name="author" content="33Hao">
<meta name="copyright" content="33Hao Inc. All Rights Reserved">
<style type="text/css">
body { _behavior: url(https://www.wpccw.com/member/templates/default/css/csshover.htc);
}
</style>
<link href="/static/Home/staticsa/css/base.css" rel="stylesheet" type="text/css">
<link href="/static/Home/staticsa/css/home_header.css" rel="stylesheet" type="text/css">
<link href="/static/Home/staticsa/css/home_login.css" rel="stylesheet" type="text/css">
<link href="/static/Home/staticsa/css/font-awesome.min.css" rel="stylesheet" />
<!--[if IE 7]>
  <link rel="stylesheet" href="/static/Home/staticsa/css/font-awesome-ie7.min.css">
<![endif]-->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="/static/Home/staticsa/js/html5shiv.js"></script>
      <script src="/static/Home/staticsa/js/respond.min.js"></script>
<![endif]-->
<script>
var COOKIE_PRE = '79CA_';var _CHARSET = 'utf-8';var SITEURL = 'https://www.wpccw.com/shop';var SHOP_SITE_URL = 'https://www.wpccw.com/shop';var RESOURCE_SITE_URL = 'https://www.wpccw.com/data/resource';var RESOURCE_SITE_URL = 'https://www.wpccw.com/data/resource';var SHOP_TEMPLATES_URL = 'SHOP_TEMPLATES_URL';
</script>
<script src="/static/Home/staticsa/js/jquery.js"></script>
<script src="/static/Home/staticsa/js/jquery.ui.js"></script>
<script src="/static/Home/staticsa/js/common.js"></script>
<script src="/static/Home/staticsa/js/jquery.validation.min.js"></script>
<script src="/static/Home/staticsa/js/dialog.js" id="dialog_js"></script>
<script src="/static/Home/staticsa/js/taglibs.js"></script>
<script src="/static/Home/staticsa/js/tabulous.js"></script>
</head>
<body>
<div class="qt-header-other">
      <div class="w1200">
        <div class="qt-logo"><a class='statis' site='1' href="https://www.wpccw.com/shop" title="灯世界"><img src="/static/Home/staticsa/picture/06063909077669875.png"></a></div>
        <div class="header-title"> 登录</div>
                
                
      </div>
    </div>
<div id="append_parent"></div>
<
    <div class="login-main" style="background-color:#548dd4; height: 476px;">
      <div class="w1200"><a href="#" target="_blank"><img data-which="login" site='2' src="/static/Home/staticsa/picture/3.jpg" /></a>
		  <!--手机验证码登录-->
        <div class="login-wrap">
          <div class="login-hearder">
            <div class="header-btn on" style=" margin-left:50px;" >登录</div>
            <a id="statis-enroll" class='statis' site='3' href="/homeregister/create"  >
            <div class="header-btn"> 注册 </div>
            </a></div>
          <div class="login-content">
            <div class="login-others">            
                                    <a id="statis-qq" class='statis other-logo logo-qq' site='4'  href="https://www.wpccw.com/member/index.php?act=connect_qq" ><i></i>&nbsp; <span>QQ登录</span></a>
                                     <a id='statis-wx' site='5' class='statis other-logo logo-wechat' href="javascript:void(0);" onclick="ajax_form('weixin_form', '微信账号登录', 'https://www.wpccw.com/member/index.php?act=connect_wx&op=index', 360);"><i></i>&nbsp; <span>微信登录</span></a>			 	
                         <a id='statis-sina' site='6' class='statis other-logo logo-weibo'  href="https://www.wpccw.com/member/index.php?act=connect_sina" ><i></i>&nbsp; <span>微博登录</span></a>
              			      
            </div>
            <div class="login-box">
              <p class="cutting-line"><span>或</span></p>
              
                        <form id="post_form" method="post" class="nc-login-form" action="">
            <input type='hidden' name='formhash' value='M_U4z4AL2ONT1GhpsNOiZ1OvQu4vg74' />            <input type="hidden" name="form_submit" value="ok" />
            <input name="nchash" type="hidden" value="cc7d4572" />
              <div class="phone-box">
                <div class="login-form">
                  <div class="input-inline">
                    <div class="input-icon i-phone"></div>
					 <input name="phone" type="text" class="text" id="phone" tipMsg="可填写已注册的手机号接收短信" autocomplete="off" value="" maxlength="11">
                  </div>
                  <div id='sendcode-captcha' class="captcha input-inline" style="display:block">
                    <input name="captcha" id="image_captcha" type="text" autocomplete="off" tipMsg="输入验证码" maxlength="4" style="width: 188px;"  />
                    <img alt="加载中..."  name="codeimage" id="sms_codeimage" onclick="javascript:document.getElementById('sms_codeimage').src='/static/Home/staticsa/picture/index.php' + Math.random();" src="index.php?act=seccode&op=makecode&type=40,100&nchash=cc7d4572"  style="margin-left: 10px;vertical-align:middle; cursor:pointer;" /><a class="img-code-a" onclick="javascript:document.getElementById('sms_codeimage').src='index.php?act=seccode&op=makecode&type=40,100&nchash=cc7d4572&t=' + Math.random();"></a>
                    <p class="warning-text"></p>
                  </div>
                  <div class="input-inline captcha">
					  <input type="text" name="sms_captcha" style="width:  188px;" autocomplete="off" class="text" tipMsg="输入6位短信验证码" id="sms_captcha" maxlength="6" />
                    <div class="btn-captcha qt-btn btn-green"><a class='statis' site='13' href="javascript:void(0);" id="sms_text" onclick="get_sms_captcha('2')">发送验证码</a></div>
                    <p class="warning-text"></p>
                  </div>
                  <div class="disabled" id="submit-phone" >
                   <input type="submit" id="submit" class="login-submit qt-btn btn-green-linear " value="登&nbsp;&nbsp;&nbsp;录">
                <input type="hidden" value="" name="ref_url">
                </div>
				  <div class="login-switch clearfix"><a href="#"  site='15' class="statis fl j-accountLogin">登录</a><a href=""  site='22' class="statis fr">忘记密码？</a></div>
                </div>
              </div>
			   </form>
                 
              
              <!-- 邮箱验证 -->
              <div class="account-box">
              
              <form  action="/homelogin" method="post">
                    @if(session('error'))
                    <span style="color:red; font-size:10px;">{{session('error')}}</span>
                    @endif
                  <div class="login-form">
                  <div class="input-inline">
                  <div class="input-icon i-user"></div>
                    <label for="email"><i class="am-icon-envelope-o"></i></label>
                    <input type="email" name="email" id="email" style="width: 330px;height: 45px;margin-left:px;font-size: 15px;color: black;"utocomplete="off" placeholder="请输入邮箱账号"><span></span>
                 </div>  
                 <div class="input-inline">
                   <div class="input-icon i-password"></div>
                    <label for="password"><i class="am-icon-lock"></i></label>
                    <input type="password" style="width: 330px;;height: 45px;font-size: 15px;color: black;" name="password" id="password" utocomplete="off"placeholder="输入密码"><span></span>
                 </div>                                   
                 
                 <div class="login-links">
                  </div>
                   <div class="disabled" id="submit-passwd">
                      {{csrf_field()}}
                      <input type="submit" site='20'style="width: 330px;height: 50px;margin-left:px;font-size: 15px;" class="login-submit qt-btn btn-green-linear" value="立即注册">
                    </div>
                        <div class="login-switch clearfix"><a href="#"  site='21' class="statis fl j-phoneLogin">手机验证码登录</a><a href="/forget"  site='22' class="statis fr">忘记密码？</a></div>
                </div>

                </form>
                 
                </div>
              </div>
            </div>
            <div class="login-footer">
              <p class="login-type"><a  site='7' href="javascript:;" class="statis j-phoneLogin" rel="external nofollow">手机登录</a><a  site='8' href="javascript:;" class="statis j-accountLogin" rel="external nofollow">邮箱登录</a></p>
            <div class="agreement-alert"><a href="javascript:;" class="agreement-handle"></a>勾选代表你同意<a href="https://www.wpccw.com/shop/index.php?act=document&op=index&code=agreement" target="_blank" class="text" title="阅读并同意">《服务协议》</a></div>
            </div>
           
          </div>
        </div>
      </div>
    </div>
<script type="text/javascript" src="/static/Home/staticsa/js/login.js"></script>
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
            oLoginWrap.find('.account-box').show()
        }
        if (!oLoginWrap.find('.login-footer').is(':hidden')) {
            oLoginWrap.find('.login-footer').hide();
            oLoginWrap.find('.login-others').stop().animate({
                marginTop: '-100px'
            }, 200, 'linear', function() {
                $(this).attr('class', 'login-others-cards').removeAttr('style');
                oLoginWrap.find('.login-box').fadeIn(300)
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
                'left: 50%;"><img src="/static/Home/staticsa/picture/warning-icon.png" style="display: inline-block;vertical-align: middle;margin-right: 15px">登录必须同意该协议</div>');
            $('.agreement-handle-message').fadeIn();
            setTimeout(function () {
                $('.agreement-handle-message').fadeOut();
                $('.agreement-handle-message').remove()
            }, 3000)
        })


    });
</script>

<script>
$(function(){
	$("#login_form").validate({
         errorPlacement: function(error, element){
            var error_td = element.parent('.input-inline');
            error_td.append(error);
            element.addClass('error');
        },
        success: function(label) {
            label.removeClass('error').find('label').remove();
        },
    	submitHandler:function(form){
    	    ajaxpost('login_form', '', '', 'onerror');
    	},
        onkeyup: false,
		rules: {
			            captcha : {
                required : true,
                remote   : {
                    url : 'index.php?act=seccode&op=check&nchash=cc7d4572',
                    type: 'get',
                    data:{
                        captcha : function(){
                            return $('#getcaptcha').val();
                        }
                    },
                    complete: function(data) {
                        if(data.responseText == 'false') {
                        	document.getElementById('codeimage').src='index.php?act=seccode&op=makecode&type=40,100&nchash=cc7d4572&t=' + Math.random();
                        }
                    }
                }
            }
					},
		messages: {
			            captcha : {
                required : '<i class="icon-remove-circle" title="验证码不能为空"></i>',
				remote	 : '<i class="icon-remove-circle" title="验证码不能为空"></i>'
            }
					}
	});

    $('input[name="auto_login"]').click(function(){
        if ($(this).attr('checked')){
            $(this).attr('checked', true).next().show();
        } else {
            $(this).attr('checked', false).next().hide();
        }
    });
});
</script>

<script type="text/javascript" src="/static/Home/staticsa/js/connect_sms.js" charset="utf-8"></script>
<script>

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
<a href="http://www.miibeian.gov.cn" rel="nofollow" target="_blank">Copyright ©2014~2019 中山灯世界网络有限公司 版权所有丨粤ICP备15095345-1号           客服电话：400-606-1866  互联网违法和不良信息举报电话：400-606-1866     kefu@wpccw.com</a> <div style="width:100%; padding:5px 0"><a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44200002442672" style="display:inline-block;text-decoration:none;height:20px;line-height:20px;"><img src="/static/Home/staticsa/picture/beian.png" style="float:left;"/><p style="float:left;height:20px;line-height:20px;margin: 0px 0px 0px 5px; padding:0px; color:#939393;">粤公网安备 44200002442672号</p></a>
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
