@extends("Admin.AdminPublic.Adminpublic");
@section("admin")
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>修改广告</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/guang/{{$info->id}}" method="post" enctype="multipart/form-data"> 
     <div class="mws-form-inline"> 
        <div class="mws-form-row"> 
       <label class="mws-form-label">图片</label> 
       <div class="mws-form-item"> 
        <input type="file" class="small" name="pic" value="{{$info->pic}}" /> 
         <img src="{{$info->pic}}" style="width:80px;height: 80px;">
       </div>
       </div>
         <div class="mws-form-row"> 
       <label class="mws-form-label">描述</label> 
       <div class="mws-form-item"> 
         <input type="text" class="small" name="text" value="{{$info->text}}" /> 
       </div>
      </div> 
       </div> 
       </div>
      {{csrf_field()}}
      {{method_field('PUT')}}
     <div class="mws-button-row"> 
      <input type="submit" value="修改广告" class="btn btn-danger" />  
     </div> 
    </form> 
   </div> 
  </div>
 </body>
@endsection
@section("title","修改广告")