@extends("Admin.AdminPublic.adminpublic")
@section("admin")
<div class="container">
                                                            
<div class="container">
    <div class="mws-panel-body no-padding"> 
     <form class="mws-form" action="/saveauth" method="post"> 
      <div class="mws-form-inline"> 
       <div class="mws-form-row"> 
        <label class="mws-form-label">权限信息</label> 
        <div class="mws-form-item clearfix"> 
         <h4>当前权限:{{$role->name}}的角色信息</h4> 
         <ul class="mws-form-list inline">
              @foreach($node as $row)
            <li><input type="checkbox" name="nids[]" value="{{$row->id}}"style="width:20px;height: 18px;" @if(in_array($row->id,$nids)) checked @endif>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<label style="font-size: 20px;line-height: 35px;">{{$row->name}}</label></li><br>  
             @endforeach   
          </ul> 
        </div> 
       </div> 
      </div> 
      <div class="mws-button-row">
        {{csrf_field()}}
        <input type="hidden" name="rid" value="{{$role->id}}">
       <input value="分配权限" class="btn btn-danger" type="submit"> 
       <input value="重置" class="btn " type="reset"> 
      </div> 
     </form> 
    </div> 
    <!-- Panels End --> 
   </div>
                    

                               
                    <!-- Panels End -->
</div>
@endsection
@section("title","后台分配权限")