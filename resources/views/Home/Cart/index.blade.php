<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>   
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 

<title>购物车</title>
<link rel="stylesheet" type="text/css" href="/static/Home/static/css/ziy.css">
<link href="/static/Home/static/css/common.css" rel="stylesheet" type="text/css" />
<link href="/static/Home/static/css/style.css" rel="stylesheet" type="text/css" />
<link href="/static/Home/static/css/base.css" rel="stylesheet" type="text/css" />
 <!-- <script src="/static/Home/static/js/jquery-1.11.3.min.js" ></script> -->
<!-- <script src="/static/Home/static/js/index.js" ></script>  -->
<!-- <script type="text/javascript" src="/static/Home/static/js/jquery1.42.min.js"></script> -->
<!-- <script src="/static/Home/static/js/common_js.js" type="text/javascript"></script> -->
<script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
<!-- <script type="text/javascript" src="/static/Home/static/js/jquery.SuperSlide.2.1.1.source.js"></script>  -->
<!-- <script src="/static/Home/static/js/footer.js" type="text/javascript"></script> -->
 <!-- <script type="text/javascript" src="/static/Home/static/js/select.js"></script> -->

</head>
<body>
<!--头部--> 
 
<!--头部-->
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
     <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="/homeindex">首页</a></li> 
     <li class="hd_menu_tit" data-addclass="hd_menu_hover"> <a href="#">我的小充</a> </li>
     <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="#">消息中心</a></li>
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
           <input name="searchName" style="float: left;" id="searchName" class="search_box" onkeydown="keyDownSearch()" type="text">
           <input name="" type="submit" style="float:right;" value="搜 索"  class="Search_btn"/>
        </div>
        <div class="clear hotword">热门搜索词：香醋&nbsp;&nbsp;&nbsp;茶叶&nbsp;&nbsp;&nbsp;草莓&nbsp;&nbsp;&nbsp;葡萄&nbsp;&nbsp;&nbsp;菜油</div>
</div>
 <!--购物车样式-->
 <div class="hd_Shopping_list" id="Shopping_list">
   <div class="s_cart"><a href="#">我的购物车</a> <i class="ci-right">&gt;</i><i class="ci-count" id="shopping-amount">0</i></div>
   <div class="dorpdown-layer">
    <div class="spacer"></div>
   <!--<div class="prompt"></div><div class="nogoods"><b></b>购物车中还没有商品，赶紧选购吧！</div>-->
   <ul class="p_s_list">     
    <li>
        <div class="img"><img src=""></div>
        <div class="content"><p class="name"><a href="#">产品名称</a></p><p>颜色分类:紫花8255尺码:XL</p></div>
      <div class="Operations">
      <p class="Price">￥55.00</p>
      <p><a href="#">删除</a></p></div>
      </li>
    </ul>   
   <div class="Shopping_style">
   <div class="p-total">共<b>1</b>件商品　共计<strong>￥ 515.00</strong></div>
    <a href="Shop_cart.html" title="去购物车结算" id="btn-payforgoods" class="Shopping">去购物车结算</a>
   </div>  
   </div>
 </div>
</div>
<!---->
<div class="beij_center">
    <div class="cart-main-header clearfix">
        <div class="cart-col-1">
            <input type="checkbox" class="jdcheckbox">
        </div>
        <div class="cart-col-2">全选</div><!-- $page.site 主站 团购 抢购   style -->
        <div class="cart-col-3">商品信息</div>
        <div class="cart-col-4">
            <div class="cart-good-real-price">单价</div>
        </div>
        <div class="cart-col-5">数量</div>
        <div class="cart-col-6">
            <div class="cart-good-amount">小计</div>
        </div>
        <div class="cart-col-7">操作</div>
    </div>
</div>
  <!-- 购物车开始遍历 -->
   
  <div class="container">
        @if(count($data)) 
        @foreach($data as $row)
        <!-- 购物车遍历开始 -->
        <div class="cart-shop-header">
            <div class="cart-col-1">
                <!-- <input type="checkbox" class="jdcheckbox"> -->
            </div>
            <div class="cart-col-2"><span class="gouw_c_dianp">{{$row['name']}} </span>
            </div>
        </div>


        <div class="cart-shop-goods dangq_honh">
            <div class="cart-shop-good">
                <div class="cart-col-1">
                    <input type="checkbox" name="items" class="jdcheckbox" value="{{$row['id']}}">
                </div>
                <div class="cart-col-2" style="height: 82px;">
                    <a href="" target="_blank" class="g-img">
                        <img src="{{$row['pic']}}" alt="">
                    </a>
                </div>
                <div class="fl houj_c">
                    <div class="cart-dfsg">
                        <div class="cart-good-name"><a href="" target="_blank"><b>描述</b>&nbsp;{!!$row['descr']!!}</a>
                        </div>
                    </div>
                    <div class="cart-good-pro"></div>
                    <div class="cart-col-4">
                        <div class="cart-good-real-price ">
                            <!--主品-->¥&nbsp;{{$row['price']}}</div>
                        <div class="red"></div>
                    </div>
                    <div class="cart-col-5">
                        <div class="gui-count cart-count">
                            <input id="min" class="gui-count-btn gui-count-sub" type="button" name="{{$row['id']}}" value="-" />
                            <div class="gui-count-input">
                                <input dytest="" class="" type="text" value="{{$row['num']}}">
                            </div>
                            <input id="add" class="gui-count-btn gui-count-add" type="button" name="{{$row['id']}}" value="+" />
                        </div>
                    </div>
                    <div class="cart-col-6 ">
                        <div class="cart-good-amount">¥&nbsp;<i>{{$row['num']*$row['price']}}</i>
                        </div>
                        <!-- 重量展示(只展示全球百货的重量) -->
                    </div>
                </div>
                <div class="cart-col-7">
                    <form action="/homecart/{{$row['id']}}" method="post">
                        {{method_field("DELETE")}} {{csrf_field()}}
                        <button type="submit" class="delete">删除</button>
                    </form>
                    <div class="cart-good-fun">
                        <a href="">移入收藏夹</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach @else
        <center><b>购物车啥东西都没有啊!</b>
        </center>
        @endif
    </div>

<div class="jies_beij">
    <div class="beij_center over_dis">
        <div class="cart-col-1 cart_jies">
            <input type="checkbox" class="jdcheckbox">
        </div>
        <div class="qianm_shanc_yvf">
            <span>全选</span>
            <a href="/alldelete">全部删除</a>
            <a href="/homeindex">继续购物</a>
        </div>
        <div class="jies_ann_bei">
            <p>已选 <em id="nums">0</em> 件商品 （不含运费）：<span id="sum">￥0</span></p>
            <input type="submit" class="order_btn" name="jiesuan" value="结算">
        </div>
    </div>
</div>

<div class="beij_center">
    <div class="investment_f"style="margin-left: 60px;width: 1200px;">
        <div class="investment_title" >
            <div class="ds_dg on_d">为您推荐</div>
            <div class="ds_dg">最近预览</div> 
        </div>
        <div class="investment_con"> 
            <!----> 
            <div class="picScroll_left_s" style="display: block;margin-left: 50px;">
                <div class="hd">
                    <a class="next next_you"></a>
                    <ul></ul>
                    <a class="prev prev_zuo"></a> 
                </div>
                <div class="bd">
                    <ul class="picList">
                        <li>
                            <div class="pic"><a href="" target="_blank"><img src="/static/Home/static/images/lieb_tupi3.jpg"></a></div>
                            <div class="title">
                                <a href="" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                <div class="jiage_gouw"><span>¥2499.00</span></div>
                                <a href="" class="cart_scroll_btn">加入购物车</a>
                            </div>
                        </li>
                        <li>
                            <div class="pic"><a href="" target="_blank"><img src="/static/Home/static/images/shangq_3.jpg"></a></div>
                            <div class="title">
                                <a href="" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                <div class="jiage_gouw"><span>¥2499.00</span></div>
                                <a href="" class="cart_scroll_btn">加入购物车</a>
                            </div>
                        </li>
                        <li>
                            <div class="pic"><a href="" target="_blank"><img src="/static/Home/static/images/big_3.jpg"></a></div>
                            <div class="title">
                                <a href="" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                <div class="jiage_gouw"><span>¥2499.00</span></div>
                                <a href="" class="cart_scroll_btn">加入购物车</a>
                            </div>
                        </li>
                        <li>
                            <div class="pic"><a href="" target="_blank"><img src="/static/Home/static/images/xiangqtu_1.jpg"></a></div>
                            <div class="title">
                                <a href="" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                <div class="jiage_gouw"><span>¥2499.00</span></div>
                                <a href="" class="cart_scroll_btn">加入购物车</a>
                            </div>
                        </li>
                        <li>
                            <div class="pic"><a href="" target="_blank"><img src="/static/Home/static/images/lieb_tupi3.jpg"></a></div>
                            <div class="title">
                                <a href="" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                <div class="jiage_gouw"><span>¥2499.00</span></div>
                                <a href="" class="cart_scroll_btn">加入购物车</a>
                            </div>
                        </li>
                        <li>
                            <div class="pic"><a href="" target="_blank"><img src="/static/Home/static/images/big_3.jpg"></a></div>
                            <div class="title">
                                <a href="" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                <div class="jiage_gouw"><span>¥2499.00</span></div>
                                <a href="" class="cart_scroll_btn">加入购物车</a>
                            </div>
                        </li>
                        <li>
                            <div class="pic"><a href="" target="_blank"><img src="/static/Home/static/images/lieb_tupi1.jpg"></a></div>
                            <div class="title">
                                <a href="" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                <div class="jiage_gouw"><span>¥2499.00</span></div>
                                <a href="" class="cart_scroll_btn">加入购物车</a>
                            </div>
                        </li>
                        <li>
                            <div class="pic"><a href="" target="_blank"><img src="/static/Home/static/images/lieb_tupi2.jpg"></a></div>
                            <div class="title">
                                <a href="" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                <div class="jiage_gouw"><span>¥2499.00</span></div>
                                <a href="" class="cart_scroll_btn">加入购物车</a>
                            </div>
                        </li>
                        <li>
                            <div class="pic"><a href="" target="_blank"><img src="/static/Home/static/images/lieb_tupi3.jpg"></a></div>
                            <div class="title">
                                <a href="" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                <div class="jiage_gouw"><span>¥2499.00</span></div>
                                <a href="" class="cart_scroll_btn">加入购物车</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div> 
            <!----> 
            <div class="picScroll_left_s" style="display: none;">
                <div class="picScroll_left_s_dsl"> 
                    <div class="dfgc">
                        <ul class="picList">
                            <li>
                                <div class="pic"><a href="" target="_blank"><img src="/static/Home/static/images/lieb_tupi3.jpg"></a></div>
                                <div class="title">
                                    <a href="" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                    <div class="jiage_gouw"><span>¥2499.00</span></div>
                                    <a href="" class="cart_scroll_btn">加入购物车</a>
                                </div>
                            </li>
                            <li>
                                <div class="pic"><a href="" target="_blank"><img src="/static/Home/static/images/big_3.jpg"></a></div>
                                <div class="title">
                                    <a href="" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                    <div class="jiage_gouw"><span>¥2499.00</span></div>
                                    <a href="" class="cart_scroll_btn">加入购物车</a>
                                </div>
                            </li>
                            <li>
                                <div class="pic"><a href="" target="_blank"><img src="/static/Home/static/images/lieb_tupi1.jpg"></a></div>
                                <div class="title">
                                    <a href="" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                    <div class="jiage_gouw"><span>¥2499.00</span></div>
                                    <a href="" class="cart_scroll_btn">加入购物车</a>
                                </div>
                            </li>
                            <li>
                                <div class="pic"><a href="" target="_blank"><img src="/static/Home/static/images/big_3.jpg"></a></div>
                                <div class="title">
                                    <a href="" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                    <div class="jiage_gouw"><span>¥2499.00</span></div>
                                    <a href="" class="cart_scroll_btn">加入购物车</a>
                                </div>
                            </li> 
                            <li>
                                <div class="pic"><a href="" target="_blank"><img src="/static/Home/static/images/shangq_3.jpg"></a></div>
                                <div class="title">
                                    <a href="" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                    <div class="jiage_gouw"><span>¥2499.00</span></div>
                                    <a href="" class="cart_scroll_btn">加入购物车</a>
                                </div>
                            </li>
                            <li>
                                <div class="pic"><a href="" target="_blank"><img src="/static/Home/static/images/shangq_3.jpg"></a></div>
                                <div class="title">
                                    <a href="" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                    <div class="jiage_gouw"><span>¥2499.00</span></div>
                                    <a href="" class="cart_scroll_btn">加入购物车</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
</div>
</body>
<script>

    // function down(id){
    //     $.get('/cartupdatee',{id:id},function(data){
    //       //alert(data); 
    //       //alert(data.num);
    //       //alert(data.tot);
    //       $("#num_"+id).val(data.num);
    //       $("#tot_"+id).html(data.tot);
    //      },'json');
    // }
    // function up(id){
    //     $.get('/cartupdate',{id:id},function(data){
    //       //alert(data); 
    //       //alert(data.num);
    //       //alert(data.tot);
    //       $("#num_"+id).val(data.num);
    //       $("#tot_"+id).html(data.tot);
    //      },'json');
    // }
    // alert($);
     // 减
    $(".gui-count-sub").click(function () {
        o = $(this);
        var id = $(this).attr("name");
        // alert(id);
        // 触发Ajax
        $.get("/cartupdatee", {
            id: id
        }, function (data) {
            // alert(data);
            // 数量赋值
            o.next("div").html(data.num);
            // 总计赋值
            o.parents('div').next('div').find('i').html(data.tot);
        }, 'json');
    });


    //加
    $(".gui-count-add").click(function () {
        oo = $(this);
        var id = $(this).attr("name");
        // alert(id);
        $.get("/cartupdate", {
            id: id
        }, function (data) {
            // alert(data);


            // 数量赋值
            oo.prev("div").html(data.num);
            // 总计
            oo.parents('div').next('div').find('i').html(data.tot);
        }, 'json');
    });

  arr=[];
  //选择要购买的商品
  $("input[name='items']").change(function(){
    // alert('sss');
    //判断
    if($(this).attr("checked")){
      id=$(this).val();
      // alert(id);
      //把勾选的商品id 添加到arr数组里
      arr.push(id);
    }else{
      //获取没有选中的id
      id1=$(this).val();
      // alert(id1);
      //删除没有选中的商品id
      //找到元素的索引
      Array.prototype.indexOf = function(val) {
        for (var i = 0; i < this.length; i++) {
        if (this[i] == val) return i;
        }
        return -1;
      };
      //通过元素的索引 利用js固有的函数删除元素
      Array.prototype.remove = function(val) {
        var index = this.indexOf(val);
        if (index > -1) {
        this.splice(index, 1);
        }
      };
      //移除
      arr.remove(id1);
    }
      //ajax
    $.get('/carttot',{arr:arr},function(data){
         //alert(data);
        $("#nums").html(data.nums);
        $("#sum").html("￥"+data.sum+"元");
      },'json')
  });
  //结算页面
  $("input[name='jiesuan']").click(function(){
    if($("input[name='items']").is(":checked")){
      $.get('/jiesuan',{arr:arr},function(data){
        if (data) {
         window.location="/homeoder/inster";
        }
      })
    }else{
     alert('请至少选择一件商品');
    }
  })
</script>
</html>