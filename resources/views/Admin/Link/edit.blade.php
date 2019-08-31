@extends("Admin.AdminPublic.Adminpublic");
@section("admin")
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>修改友情链接</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/adminlink/{{$info->id}}" method="post" enctype="multipart/form-data"> 
     <div class="mws-form-inline"> 
        <div class="mws-form-row"> 
       <label class="mws-form-label">网址</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="link" value="{{$info->link}}" / 
       </div>
       </div>
     </div>
         <div class="mws-form-row"> 
       <label class="mws-form-label">描述</label> 
       <div class="mws-form-item"> 
         <input type="text" class="small" name="title" value="{{$info->title}}" /> 
       </div>
      </div> 
       </div> 
       </div>
      {{csrf_field()}}
      {{method_field('PUT')}}
     <div class="mws-button-row"> 
      <input type="submit" value="修改友情链接" class="btn btn-danger" />  
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection
@section("title","修改友情链接")