<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>产品-产品详情</title>
<link href="/static/Home/static/css/base.css" rel="stylesheet" type="text/css" />
<link href="/static/Home/static/css/css.css" rel="stylesheet" type="text/css" />
<link href="/static/Home/static/css/style1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/static/Home/static/js/jquery-1.8.3.min.js"></script>
<script src="/static/Home/static/js/jquery.simpleGal.js"></script>
<script type="text/javascript" src="/static/Home/static/js/jquery.imagezoom.min.js"></script>
<style>
img {
    max-width: none;
}
.tb-pic a {
    display: table-cell;
    text-align: center;
    vertical-align: middle;
}
.tb-pic a img {
    vertical-align: middle;
}
.tb-pic a {
*display:block;
*font-family:Arial;
*line-height:1;
}
.tb-thumb {
    margin: 10px 0 0;
    overflow: hidden;
}
.tb-thumb li {
    float: left;
    width: 86px;
    height: 86px;
    overflow: hidden;
    border: 1px solid #cdcdcd;
    margin-right: 5px;
}
.tb-thumb li:hover, .tb-thumb .tb-selected {
    width: 84px;
    height: 84px;
    border: 2px solid #799e0f;
}
.tb-s310, .tb-s310 a {
    height: 365px;
    width: 365px;
}
.tb-s310, .tb-s310 img {
    max-height: 365px;
    max-width: 365px;
}
.tb-booth {
    border: 1px solid #CDCDCD;
    position: relative;
    z-index: 1;
}
div.zoomDiv {
    z-index: 999;
    position: absolute;
    top: 0px;
    left: 0px;
    background: #ffffff;
    border: 1px solid #ccc;
    display: none;
    overflow: hidden;
}
div.zoomMask {
    position: absolute;
    background: url("/static/Home/static/images/mask.png") repeat;
    cursor: move;
    z-index: 1;
}
<!--弹出隐藏层-->
 .black_overlay {
    display: none;
    position: absolute;
    top: 0%;
    left: 0%;
    width: 100%;
    height: 1200px;
    background-color: black;
    z-index: 9999;
    -moz-opacity: 0.4;
    opacity: 0.40;
    filter: alpha(opacity=40);
}
.white_content {
    display: none;
    position: absolute;
    top: 20%;
    left: 40%;
    width: 400px;
    height: 175px;
    border: none;
    background-color: white;
    z-index: 100200;
    overflow: auto;
}
.white_content_small {
    display: none;
    position: absolute;
    top: 20%;
    left: 30%;
    width: 40%;
    height: 50%;
    background-color: white;
    z-index: 1002;
    overflow: auto;
}
.dialogbox {
    padding: 20px;
    line-height: 40px;
}
.addbtn {
    width: 22px;
    height: 22px;
    background: url(/static/Home/static/images/close2.png) no-repeat;
    margin-right: 5px;
    margin-top: 3px;
    border: none;
    float: right;
}
</style>
<script type="text/javascript">
//弹出隐藏层
function ShowDiv(show_div,bg_div){
document.getElementById(show_div).style.display='block';
document.getElementById(bg_div).style.display='block' ;
var bgdiv = document.getElementById(bg_div);
bgdiv.style.width = document.body.scrollWidth;
// bgdiv.style.height = $(document).height();
$("#"+bg_div).height($(document).height());
};
//关闭弹出层
function CloseDiv(show_div,bg_div)
{
document.getElementById(show_div).style.display='none';
document.getElementById(bg_div).style.display='none';
};

</script>
</head>

<body>

<!--头部导航-->
<div class="nofix_head">
    <div class="top wrapper">
        <div class="float-lt margin-b10">
            <ul>
                <li><a href="" target="_blank" class=" colororange">请登录</a></li>
                <li><a href="" target="_blank">注册会员</a></li>
            </ul>
        </div>
        <div class="float-rt">
            <ul>
                <li><a href="/homeindex">首页</a></li>
                <li><a href="">我的小充</a></li>
                <li><a id="linkOrder" href="">消息中心</a></li>
                <li><a href="">商品分类</a></li>
                <li>我的购物车<small class="num">20</small></li>
            </ul>
        </div>
    </div>
</div>
<!--头部导航END--> 

<!--头部快捷栏-->
<div class="clear wrapper header">
    <div class="logo float-lt" style="margin-right:130px;"><img src="/static/Home/static/images/logo.png" width="193" height="97" /></div>
    <div class="search float-lt">
        <div class="search_list">
            <ul>
                <li class="current"><a href="#">产品</a></li>
                <li><a href="#">信息</a></li>
            </ul>
        </div>
        <div class="clear search_cur">
            <ul>
                <li>
                    <input name="searchName" id="searchName" class="search_box" onkeydown="keyDownSearch()" type="text">
                </li>
            </ul>
            <ul>
                <li class="search_btn"><a href="product-list.html">搜索</a></li>
            </ul>
        </div>
        <div class="clear hotword">热门搜索词：香醋&nbsp;&nbsp;&nbsp;茶叶&nbsp;&nbsp;&nbsp;草莓&nbsp;&nbsp;&nbsp;葡萄&nbsp;&nbsp;&nbsp;菜油</div>
    </div>
    <div class="homecart float-rt">购物车<strong>(99)</strong></div>
</div>
<!--头部快捷栏END-->

<div class="clear">&nbsp;</div>

<!--网站头部-->
<div class="sup-wid">
    <div><img src="/static/Home/static/images/TB27.gif" width="100%"/></div>
    <div class="supplie-top">
        <div class="clear">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="nav">
                <tr>
                    <td align="center"><a href="#">供应商首页</a></td>
                    <td align="center"><a href="#">全部产品</a></td>
                    <td align="center"><a href="#">企业介绍</a></td>
                    <td align="center"><a href="#">最新产品</a></td>
                    <td align="center"><a href="#">热销产品</a></td>
                    <td align="center"><a href="#">促销产品</a></td>
                </tr>
            </table>
        </div>
        <div class=" clear bread"><a href="#">首页</a> <span class="pipe">&gt;</span> <a href="#">某供应商</a> <span class="pipe">&gt;</span> <a href="#">某产品</a></div>
</div>
    <div class="pro_detail" >
        <div class="pro_detail_img float-lt">
            <div class="gallery">
                <div class="tb-booth tb-pic tb-s310"> <a href="{{$info->pic}}"><img style="width: 100%;" src="{{$info->pic}}"  alt="展品细节展示放大镜特效" rel="{{$info->pic}}" class="jqzoom" /></a> </div>
                <ul class="tb-thumb" id="thumblist">
                    
                    <li>
                        <div class="tb-pic tb-s40"><a href="#"><img style="width:86px;height: 86px" src="{{$info->pic}}"  mid="{{$info->pic}}" big="{{$info->pic}}"></a></div>
                    </li>
                </ul>
            </div>
            <script type="text/javascript">
        $(function(){
                $("#h1").toggle(function(){
                    $("#h1").css("background-image","url({{$info->pic}})");
                },function(){
                    $("#h1").css("background-image","url({{$info->pic}}) ");
                })
            }) 

</script>
            <input type="button" value="加入收藏" id="h1" class="addcart" onclick="ShowDiv('MyDiv2','fade2')" />
        </div>
         <div class="float-lt pro_detail_con">
              <form action="/homecart" method="post">
            <div class="pro_detail_tit">
               <p style="font-size:40px"> {{$info->name}}</p>
            </div>
            <div class="pro_detail_ad"></div>
            <div class="pro_detail_score margin-t20">
                <ul>
                    <li class="margin-r20">评分</li>
                </ul>
                <ul>
                    <li style="width:16px; height:16px;"><img src="/static/Home/static/images/iconfont-xingxingman.png" width="16" height="16" /></li>
                    <li style="width:16px; height:16px;"><img src="/static/Home/static/images/iconfont-xingxingman.png" width="16" height="16" /></li>
                    <li style="width:16px; height:16px;"><img src="/static/Home/static/images/iconfont-xingxingman.png" width="16" height="16" /></li>
                    <li style="width:16px; height:16px;"><img src="/static/Home/static/images/iconfont-xingxingman.png" width="16" height="16" /></li>
                    <li style="width:16px; height:16px;"><img src="/static/Home/static/images/iconfont-xingxingkong.png" width="16" height="16" /></li>
                </ul>
            </div>
            <div class="clear"></div>
            <div class="pro_detail_price  margin-t20"><span class="margin-r20">市场价</span><span style=" font-size:16px"><s>￥450.00</s></span></div>
            <div class="clear"></div>
            <div class="pro_detail_act margin-t20 fl"><span class="margin-r20">售价</span><span style="font-size:26px; font-weight:bold; color:#dd514c;">{{$info->price}}</span></div>
            <div class="clear"></div>
            <div class="act_block margin-t5"><span>本商品可使用9999积分抵用￥9.99元</span></div>
            <div class="pro_detail_number margin-t30">
                <div class="margin-r20 float-lt">数量</div>
                <div class=""> <i name="{{$info->id}}" class="jian"></i>
                    <input type="text" name="num" value="1" class="float-lt choose_input"/>
                    <i name="{{$info->id}}" class="jia"></i> <span>&nbsp;盒</span> <span>（库存{{$info->num}}盒）</span> </div>
                <div class="clear"></div>
            </div>
            <div class="guige">
                <div class="margin-r20 float-lt" style="line-height:25px;">规格</div>
                <ul>
                    <li class="guige-cur">规格一</li>
                    <li>规格二</li>
                    <li>规格三</li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="pro_detail_number margin-t20">
                <div class="margin-r20 float-lt">月成交量：<span class="colorred"><strong>999件</strong></span></div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="pro_detail_btn margin-t30">
                <ul>
                    <li class="pro_detail_shop"><a href="pay1.html">立即购买</a></li>
                      <li>
                      <input type="hidden" name="id" value="{{$info->id}}">
                      {{csrf_field()}}
                    <button type="submit" class="pro_detail_add">我的购物车</button>
                     </li>
                </ul>
            </div>
        </form>
        </div>
        <div class="float-rt pro_right">
            <div align="center">
                <p><img src="/static/Home/static/images/lmrz.png" /></p>
                <p class="margin-t10">普通会员</p>
            </div>
            <div align="center"><img src="/static/Home/static/images/pro_V2_r6_c9.png" />
                <p class="line-ht20">信用度</p>
                <p class="line-ht20" style="color:#ec3c36;">2.5</p>
            </div>
            <div align="center"><img src="/static/Home/static/images/pro_V2_r8_c10.png" />
                <p class="line-ht30">在线联系</p>
            </div>
            <div align="center"><img src="/static/Home/static/images/pro_V2_r8_c9.png" />
                <p class="line-ht30">了解更多</p>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <script>
        $(function(){
            $(".pro_tab li").each(function(i){
                $(this).click(function(){
                    $(this).addClass("cur").siblings().removeClass("cur");
                    $(".conlist .conbox").eq(i).show().siblings().hide();
                })
            })
        })
    </script>
    <div class="pro_con margin-t55" style="overflow:hidden;">
        <div class="pro_tab">
            <ul>
                <li class="cur">产品介绍</li>
                <li>规格及包装</li>
                <li>评价</a></li>
            </ul>
        </div>
        <div class="conlist">
            <div class="conbox" style="display:block;">1</div>
            <div class="conbox">2</div>
            <div class="conbox">
                 
                
                <div class="pro_judge">
                    <ul>
                        <li class="cur">
                            <input name="RadioGroup1" type="radio" value="" checked="checked" id="RadioGroup1_0" />
                            全部（100）</li>
                        <li>
                            <input name="RadioGroup1" type="radio" value="" id="RadioGroup1_1" />
                            好评（80）</li>
                        <li>
                            <input name="RadioGroup1" type="radio" value="" id="RadioGroup1_2" />
                            中评（10）</li>
                        <li>
                            <input name="RadioGroup1" type="radio" value="" id="RadioGroup1_3" />
                            差评（10）</li>
                    </ul>
            @foreach ($data as $row)
            @foreach($pinglun as $v) 
     @foreach($v as $vv)
     @if($vv->good_id == $row->id)                 
    <table width="100%" border="0">
        <tr>
        <td width="80" align="left">
         {{$row->name}}
       <img src="{{$row->pic}}" width="60" height="60" class="border_gry" /></td>
     
    <td>
        {!!$vv->detext!!}
    <span class="pro_judge_time">{{date("Y-m-d H:i:s")}}</span>
          
          <td>花海大神</td>
     </td>
     @endif
      @endforeach  
     @endforeach
      </tr>  
    </table>                  
                    
    @endforeach
                </div>
                
               
            </div>
        </div>
    </div>
    <div class="hotpro">
        <div class="hotpro_title">热销产品</div>
        <div class="hotpro_box">
            <div class="pro-view-hot">
                <ul>
                    <li class="pro-img"><a href="#"><img src="/static/Home/static/images/pro-1.jpg" /></a></li>
                    <li class="price"><strong>￥ 36.00</strong><span>已销售227</span></li>
                    <li><a href="#" class="title">恒顺蜂蜜醋  10ml*24支 纯粮酿造 镇江香醋 江苏特产 礼盒礼品 </a></li>
                </ul>
                <ul>
                    <li class="pro-img"><a href="#"><img src="/static/Home/static/images/pro-1.jpg" /></a></li>
                    <li class="price"><strong>￥ 36.00</strong><span>已销售227</span></li>
                    <li><a href="#" class="title">恒顺蜂蜜醋  10ml*24支 纯粮酿造 镇江香醋 江苏特产 礼盒礼品 </a></li>
                </ul>
                <ul>
                    <li class="pro-img"><a href="#"><img src="/static/Home/static/images/pro-1.jpg" /></a></li>
                    <li class="price"><strong>￥ 36.00</strong><span>已销售227</span></li>
                    <li><a href="#" class="title">恒顺蜂蜜醋  10ml*24支 纯粮酿造 镇江香醋 江苏特产 礼盒礼品 </a></li>
                </ul>
                <ul>
                    <li class="pro-img"><a href="#"><img src="/static/Home/static/images/pro-1.jpg" /></a></li>
                    <li class="price"><strong>￥ 36.00</strong><span>已销售227</span></li>
                    <li><a href="#" class="title">恒顺蜂蜜醋  10ml*24支 纯粮酿造 镇江香醋 江苏特产 礼盒礼品 </a></li>
                </ul>
                <ul>
                    <li class="pro-img"><a href="#"><img src="/static/Home/static/images/pro-1.jpg" /></a></li>
                    <li class="price"><strong>￥ 36.00</strong><span>已销售227</span></li>
                    <li><a href="#" class="title">恒顺蜂蜜醋  10ml*24支 纯粮酿造 镇江香醋 江苏特产 礼盒礼品 </a></li>
                </ul>
                <ul style="margin-right:0;">
                    <li class="pro-img"><a href="#"><img src="/static/Home/static/images/pro-1.jpg" /></a></li>
                    <li class="price"><strong>￥ 36.00</strong><span>已销售227</span></li>
                    <li><a href="#" class="title">恒顺蜂蜜醋  10ml*24支 纯粮酿造 镇江香醋 江苏特产 礼盒礼品 </a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="helper">
        <div class="mod">
            <div class="mod-wrap">
                <h4><img src="/static/Home/static/images/h1.png" width="60" height="60" /><span>新手上路</span> </h4>
            </div>
        </div>
        <div class="mod">
            <div class="mod-wrap">
                <h4><img src="/static/Home/static/images/h2.png" width="60" height="60" /><span>如何支付</span> </h4>
            </div>
        </div>
        <div class="mod">
            <div class="mod-wrap">
                <h4><img src="/static/Home/static/images/h3.png" width="60" height="60" /><span>配送运输</span> </h4>
            </div>
        </div>
        <div class="mod mod-last">
            <div class="mod-wrap">
                <h4><img src="/static/Home/static/images/h4.png" width="60" height="60" /><span>售后服务</span> </h4>
            </div>
        </div>
        <div class="mod mod-last">
            <div class="mod-wrap">
                <h4><img src="/static/Home/static/images/h5.png" width="60" height="60" /><span>联系我们</span> </h4>
            </div>
        </div>
    </div>
    
</div>

<div class="clear">&nbsp;</div>


<!--网站地图-->
<div class="fri-link-bg">
    <div class="fri-link">
        <div class="logo float-lt margin-r20"><img src="/static/Home/static/images/fo-logo.jpg" width="152" height="81" /></div>
        <div class="float-lt"><img src="/static/Home/static/images/qd.jpg" width="90"  height="90" />
            <p>扫描下载APP</p>
        </div>
        <ul class="link-add float-lt ma">
            <li><a href="#" class="font14">网站栏目</a></li>
            <li><a href="#">网站栏目</a></li>
            <li><a href="#">网站栏目</a></li>
            <li><a href="#">网站栏目</a></li>
        </ul>
        <ul class="link-add float-lt">
            <li><a href="#" class="font14">网站栏目</a></li>
            <li><a href="#">网站栏目</a></li>
            <li><a href="#">网站栏目</a></li>
            <li><a href="#">网站栏目</a></li>
        </ul>
        <ul class="link-add float-lt">
            <li><a href="#" class="font14">网站栏目</a></li>
            <li><a href="#">网站栏目</a></li>
            <li><a href="#">网站栏目</a></li>
            <li><a href="#">网站栏目</a></li>
        </ul>
        <ul class="link-add float-lt">
            <li><a href="#" class="font14">网站栏目</a></li>
            <li><a href="#">网站栏目</a></li>
            <li><a href="#">网站栏目</a></li>
            <li><a href="#">网站栏目</a></li>
        </ul>
        <ul class="link-add float-lt">
            <li><a href="#" class="font14">网站栏目</a></li>
            <li><a href="#">网站栏目</a></li>
            <li><a href="#">网站栏目</a></li>
            <li><a href="#">网站栏目</a></li>
        </ul>
        <ul class="link-add float-lt">
            <li><a href="#" class="font14">网站栏目</a></li>
            <li><a href="#">网站栏目</a></li>
            <li><a href="#">网站栏目</a></li>
            <li><a href="#">网站栏目</a></li>
        </ul>
        <ul class="link-add float-lt">
            <li><a href="#" class="font14">网站栏目</a></li>
            <li><a href="#">网站栏目</a></li>
            <li><a href="#">网站栏目</a></li>
            <li><a href="#">网站栏目</a></li>
        </ul>
    </div>
</div>
<!--网站地图END-->


<!--网站页脚-->
<div class="copyright">
    <div class="copyright-bg">
        <div class="hotline">为生活充电在线 <span>招商热线：****-********</span> 客服热线：400-******</div>
        <div class="hotline co-ph">
            <p>版权所有Copyright ©***************</p>
            <p>*ICP备***************号 不良信息举报</p>
            <p>总机电话：****-*********/194/195/196 客服电话：4000****** 传 真：********
                
                <a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
        </div>
    </div>
</div>
<!--网站页脚END-->





<!--弹出层时背景层DIV--> 

<!--商品添加成功DIV-->
<div id="fade" class="black_overlay"> </div>
<div id="MyDiv" class="white_content">
    <div  style="width:385px; height:30px; background:#1ba67f; padding-left:15px; color:#fff; line-height:30px; font-size:14px;"> <span onclick="CloseDiv('MyDiv','fade')">
        <input type="button" class="addbtn">
        </span>商品加入货仓 </div>
    <div class="dialogbox">
        <p>商品添加成功！</p>
    </div>
</div>
</div>

<!--商品收藏成功DIV-->
<div id="fade2" class="black_overlay"> </div>
<div id="MyDiv2" class="white_content">
    <div  style="width:385px; height:30px; background:#1ba67f; padding-left:15px; color:#fff; line-height:30px; font-size:14px;"> <span onclick="CloseDiv('MyDiv2','fade2')">
        <input type="button" class="addbtn">
        </span>商品收藏 </div>
    <div class="dialogbox">
        <p>商品收藏成功！</p>
    </div>
</div>
</div>
<script type="text/javascript">
  $(".jian").click(function(){
      p=$(this);
     id=$(this).attr('name');
      //alert(id);
      $.get("/infojian",{id:id},function(data){
        alert(data);
     })

  })

$(document).ready(function(){

    $(".jqzoom").imagezoom();
    
    $("#thumblist li a").mousemove(function(){
        $(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
        $(".jqzoom").attr('src',$(this).find("img").attr("mid"));
        $(".jqzoom").attr('rel',$(this).find("img").attr("big"));
    });

});
</script>
</body>
</html>
