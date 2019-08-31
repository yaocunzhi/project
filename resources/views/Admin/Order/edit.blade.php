@extends("Admin.AdminPublic.Adminpublic");
@section("admin")
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>修改订单</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/adminorder/{{$info->id}}" method="post" enctype="multipart/form-data"> 
     <div class="mws-form-inline">  
     <input type="hidden" name="id" value="{{$info->id}}">
        <input type="radio" class="medium" name="status" value="2"  style="width: 50px; font:30px;background-color: blue" @if($info->status == 2)  checked  @endif />已付货<br><br><br>
        <input type="radio" class="medium" name="status" value="0" style="width: 50px;background-color: red;" @if( $info->status == 0)  checked @else  @endif /> 未付货<br><br><br>
        <input type="radio" class="medium" name="status" value="1" style="width: 50px;background-color: red;" @if( $info->status == 1)  checked @else  @endif /> 未发货<br><br><br>
         <input type="radio" class="medium" name="status" value="3" style="width: 50px;background-color: red;" @if( $info->status == 3)  checked @else  @endif /> 已发货<br><br><br>
         <input type="radio" class="medium" name="status" value="4" style="width: 50px;background-color: red;" @if( $info->status == 4)  checked @else  @endif /> 已收货<br><br>
      </div> 
       </div> 
      <div class="mws-button-row">
        {{csrf_field()}}
        {{method_field('PUT')}}
      <input type="submit" value="提交" class="btn btn-danger" /> 
      <input type="reset" value="重置" class="btn " /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection
@section("title","修改修改订单")