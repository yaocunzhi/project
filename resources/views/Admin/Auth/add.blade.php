@extends("Admin.AdminPublic.Adminpublic");
@section("admin")
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>添加权限</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/auth" method="post"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">权限名称:</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="name" value="" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">控制器</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="mname"/> 
       </div> 
      </div> 
       <div class="mws-form-row"> 
       <label class="mws-form-label">权限方法</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="aname" /> 
       </div> 
      </div> 
      {{csrf_field()}}
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
@section("title","添加权限")