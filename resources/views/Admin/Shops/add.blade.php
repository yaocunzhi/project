@extends("Admin.AdminPublic.Adminpublic");
@section("admin")
<html>
 <head></head>
 <script type="text/javascript" charset="utf-8" src="/static/Admin/ueditor/ueditor.config.js"></script> <script type="text/javascript" charset="utf-8" src="/static/Admin/ueditor/ueditor.all.min.js"> </script> <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败--> <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加 载的中文，那最后就是中文--> <script type="text/javascript" charset="utf-8" src="/static/Admin/ueditor/lang/zh-cn/zh-cn.js"> </script> 
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>添加商品</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/adminshop" method="post" enctype="multipart/form-data"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">名字</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="name"  /> 
       </div> 
      </div> 
       <div class="mws-form-row"> 
       <label class="mws-form-label">类别</label> 
       <div class="mws-form-item"> 
         <select name="cate_id">
          <option>--请选择--</option>
          @foreach($cate as $row)
          <option value="{{$row->id}}">{{$row->name}}</option>
          @endforeach
        </select>
       </div> 
      </div> 
       <div class="mws-form-row"> 
       <label class="mws-form-label">图片</label> 
       <div class="mws-form-item">
       <input type="file" class="small"  name="pic" required="请上传图片"/ >
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">描述</label> 
       <div class="mws-form-item"> 
        <textarea name="descr"></textarea>
       </div> 
      </div> 
       <div class="mws-form-row"> 
       <label class="mws-form-label">数量</label> 
       <div class="mws-form-item">
       <input type="text" class="small"  name="num" >
       </div> 
      </div> 
       <div class="mws-form-row"> 
       <label class="mws-form-label">单价</label> 
       <div class="mws-form-item">
       <input type="text" class="small"  name="price" >
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
   <script type="text/javascript"> //实例化编辑器 //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接 调用UE.getEditor('editor')就能拿到相关的实例 
    var ue = UE.getEditor('editor'); 
  </script>
</html>
@endsection
@section("title","添加商品")