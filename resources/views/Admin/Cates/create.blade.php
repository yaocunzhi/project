@extends("Admin.AdminPublic.Adminpublic");
@section("admin")
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>添加无线分类列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/admincate" method="post"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">分类名称:</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="name" /> 
       </div> 
      </div> 
      
        <div class="mws-form-row"> 
       <label class="mws-form-label">父类:</label> 
       <div class="mws-form-item"> 
        <select class="small" name="pid">
              <option value="0">--请选择--</option>
              @foreach($cates as $opt)
               <option value="{{$opt->id}}">{{$opt->name}}</option>
              @endforeach
        </select> 
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
@section("title","添加无线分类列表")