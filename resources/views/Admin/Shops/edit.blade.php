@extends("Admin.AdminPublic.Adminpublic");
@section("admin")
<html>
 <head></head>
 <script type="text/javascript" charset="utf-8" src="/static/Admin/ueditor/ueditor.config.js"></script> <script type="text/javascript" charset="utf-8" src="/static/Admin/ueditor/ueditor.all.min.js"> </script> <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败--> <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加 载的中文，那最后就是中文--> <script type="text/javascript" charset="utf-8" src="/static/Admin/ueditor/lang/zh-cn/zh-cn.js"> </script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>修改商品</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/adminshop/{{$info->id}}" method="post" enctype="multipart/form-data"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">姓名</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="name" value="{{$info->name}}" /> 
       </div> 
       </div>
        <div class="mws-form-row"> 
       <label class="mws-form-label">类别</label> 
       <div class="mws-form-item"> 
        <select name="cate_id">
          @foreach($cate as $row)
          <option value="{{$row->id}}" @if($row->id==$info->cate_id) selected @endif > {{$row->name}}</option>
          @endforeach
        </select>
       </div>
      </div> 
        <div class="mws-form-row"> 
       <label class="mws-form-label">图片</label> 
       <div class="mws-form-item"> 
        <input type="file" class="small" name="pic" value="" /> 
         <img src="{{$info->pic}}" style="width:80px;height: 80px;">
       </div>
      
       </div>
         <div class="mws-form-row"> 
       <label class="mws-form-label">描述</label> 
       <div class="mws-form-item"> 
         <textarea name="descr">{!!$info->descr!!}</textarea>
       </div>
      </div> 
       <div class="mws-form-row"> 
       <label class="mws-form-label">数量</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="num" value="{{$info->num}}" /> 
       </div>
      </div> 
         <div class="mws-form-row"> 
       <label class="mws-form-label">价格</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="price" value="{{$info->price}}" /> 
       </div>
      </div> 
       </div> 
       </div>
      {{csrf_field()}}
      {{method_field('PUT')}}
     <div class="mws-button-row"> 
      <input type="submit" value="修改商品" class="btn btn-danger" />  
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection
@section("title","修改商品")