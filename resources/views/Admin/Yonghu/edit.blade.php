@extends("Admin.AdminPublic.Adminpublic");
@section("admin")
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>修改用户</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/yonghu/{{$info->id}}" method="post"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">姓名:</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="uname" value="{{$info->uname}}" /> 
       </div> 
      </div> 
       <div class="mws-form-row"> 
       <label class="mws-form-label">邮箱:</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="email" value="{{$info->email}}"/> 
       </div> 
       </div>
        <div class="mws-form-row"> 
       <label class="mws-form-label">手机:</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small"  name="phone" value="{{$info->phone}}" /> 
      </div> 
      {{csrf_field()}}
      {{method_field('PUT')}}
     <div class="mws-button-row"> 
      <input type="submit" value="提交" class="btn btn-danger" /> 
      <input type="reset" value="重置" class="btn " /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection
@section("title","修改用户")
