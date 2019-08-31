<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  <title>付款成功页面</title> 
  <link href="/static/Home/xiangmv/basic/css/demo.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/Home/xiangmv/css/sustyle.css" rel="stylesheet" type="text/css" /> 
<link href="/static/Home/static/css/common.css" rel="stylesheet" type="text/css" />
  
 </head> 
 <body> 
  <!--顶部导航条 --> 
 <head>
 <div id="header_top">
  <div id="top">
    <div class="Inside_pages">
      <div class="Collection">
         @if(session('email'))
         <a href="/homelogin/create" class="green">{{session('email')}}</a> 
        <a href="homelogout" class="green">退出</a>
         @else 
        <a href="/homelogin/create" class="green">登录</a>
        <a href="homeregister/create" class="green">退出</a>
        @endif
      </div>
  <div class="hd_top_manu clearfix">
    <ul class="clearfix">
     <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="homeindex">首页</a></li> 
     <li class="hd_menu_tit" data-addclass="hd_menu_hover"> <a href="#">我的小充</a> </li>
     <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="/personal">订单管理</a></li>
       <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="#">商品分类</a></li>
        <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="/homecart">我的购物车<b>(23)</b></a></li> 
    </ul>
  </div>
    </div>
  </div>
  <div id="header"  class="header page_style">
  <div class="logo"><a href="index.html"><img src="/static/Home/static/images/logo.png" /></a></div>
  <!--结束图层-->
   <div class="Search">
        <div class="search_list">
            <ul>
                <li class="current"><a href="#">产品</a></li>
                <li><a href="#">信息</a></li>
            </ul>
        </div>
        <div class="clear search_cur">
           <input name="searchName" id="searchName" class="search_box" onkeydown="keyDownSearch()" type="text">
           <input name="" type="submit" value="搜 索"  class="Search_btn"/>
        </div>
        <div class="clear hotword">热门搜索词：香醋&nbsp;&nbsp;&nbsp;茶叶&nbsp;&nbsp;&nbsp;草莓&nbsp;&nbsp;&nbsp;葡萄&nbsp;&nbsp;&nbsp;菜油</div>
</div>
 <!--购物车样式-->
 

<!--菜单栏-->
  
</head>
  <!--悬浮搜索框--> 
  <div class="clear"></div> 
  <div class="take-delivery"> 
   <div class="status"> 
    <h2>您已成功付款</h2> 
    <div class="successInfo"> 
     <ul> 
      <li>付款金额<em>&yen;{{$tot}}</em></li> 
      <div class="user-info"> 
       <p>收货人：{{$address->name}}</p> 
       <p>联系电话：{{$address->phone}}</p> 
       <p>收货地址：{{$address->xhuo}}</p> 
      </div> 请认真核对您的收货信息，如有错误请联系客服 
     </ul> 
     <div class="option"> 
      <span class="info">您可以</span> 
      <a href="person/order.html" class="J_MakePoint">查看<span>已买到的宝贝</span></a> 
      <a href="person/orderinfo.html" class="J_MakePoint">查看<span>交易详情</span></a> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div class="footer"> 
   <div class="footer-hd"> 
    <p> <a href="#">恒望科技</a> <b>|</b> <a href="#">商城首页</a> <b>|</b> <a href="#">支付宝</a> <b>|</b> <a href="#">物流</a> </p> 
   </div> 
   <div class="footer-bd"> 
    <p> <a href="#">关于恒望</a> <a href="#">合作伙伴</a> <a href="#">联系我们</a> <a href="#">网站地图</a> <em>&copy; 2015-2025 Hengwang.com 版权所有</em> </p> 
   </div> 
  </div>   
 </body>
</html>