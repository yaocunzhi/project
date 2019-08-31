@extends("Admin.AdminPublic.Adminpublic");
@section("admin")
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>修改无限分类</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/admincate/{{$info->id}}" method="post"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">分类名称:</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="name" value="{{$info->name}}" /> 
       </div> 
      </div> 
       <div class="mws-form-row"> 
       <label class="mws-form-label">父类编号:</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="pid" value="{{$info->pid}}"/> 
       </div> 
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
@section("title","修改无限分类")
