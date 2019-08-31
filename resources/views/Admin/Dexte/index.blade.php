@extends("Admin.AdminPublic.Adminpublic");
@section("admin")
<html>
 <head></head>
 <script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
 <body>
   <div class="mws-panel grid_8">
   
  <body>
    <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>公告列表</span> 
   </div>
  <div class="mws-panel-body no-padding"> 
   <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
   	<form action="/dexte" method="get">
    <div class="dataTables_filter" id="DataTables_Table_1_filter">
     <label>搜索: <input type="text" name="key" aria-controls="DataTables_Table_1"  value="" /><input type="submit" value="搜索"></label>
     </form>
    </div>
    <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
     <thead> 
      <tr role="row">
       <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 155px;">选择区</th>
       <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 155px;">ID</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 211px;">标题</th>     
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 198px;">图片</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 198px;">内容</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 198px;">作者</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 98px;">操作</th>
      </tr> 
     </thead> 
     <tbody role="alert" aria-live="polite" aria-relevant="all">
       @foreach($data as $row)
      <tr class="odd">
       <td><input type="checkbox"  value="{{$row['id']}}"></td> 

       <td class="  sorting_1">{{$row['id']}}</td> 
       <td class=" ">{{$row['title']}}</td> 
       <td class=" "><img src="{{$row['thumb']}}"></td> 
       <td class=" ">{!!$row['detext']!!}</td>   
       <td class=" ">{{$row['editor']}}</td>  
       <td class=" "> 
        <a href="/dexte/{{$row['id']}}/edit">
       		<button class="btn btn-info">
               <i class="icon-tools"></i>
       		</button>
        </a>
      </td> 
      </tr>
      @endforeach
      <tr >
       <td colspan='7' ><a href="javascript:void" class="btn btn-success quanxuan">全选</a><a href="javascript:void"class="btn btn-info noxuan">全不选</a><a href="javascript:void" class="btn btn-success fanxuan">反选</a></td>
      </tr>
       <tr>
          <td colspan='7' ><a href="javascript:void" class="btn btn-danger del">删除</a></td>
       </tr>
     </tbody>
    </table>
   
    <div class="dataTables_paginate paging_full_numbers" id="pages">
       
    </div>
   </div> 
  </div>
  </div>
 </body>
 <script type="text/javascript">
     //全选
     $(".quanxuan").click(function(){
        $("#DataTables_Table_1").find("tr").each(function(){
          $(this).find(':checkbox').attr('checked',true);
        })
     })
      //全不选
     $(".noxuan").click(function(){
        $("#DataTables_Table_1").find("tr").each(function(){
          $(this).find(':checkbox').attr('checked',false);
        })
     }) 
      //反选
     $('.fanxuan').click(function(){
        $("#DataTables_Table_1").find('tr').each(function(){
           if($(this).find(":checked").attr('checked')){

           $(this).find(":checkbox").attr('checked',false);

         }else{
           $(this).find(":checkbox").attr('checked',true);
         }
        })
     })
     //删除
     $('.del').click(function(){
        //获取选中的id
        arr=[];
        $('#DataTables_Table_1').find('tr').each(function(){
             //获取复选框的value值
          if($(this).find(':checkbox').attr('checked')){

             id=$(this).find(':checkbox').val();
             //把选中的id选择到数组里
             arr.push(id);
          }

        });
          //alert(arr);
        //触发ajax请求
        $.get('/dextedel',{arr:arr},function(data){
           //alert(data);
           //循环删除页面数据
           if(data==1){
            //就删出选中数据的tr
            for(var i=0;i<arr.length;i++){
              $("input[value="+arr[i]+"]").parents('tr').remove();
            }
           }else{
              alert(data);
           }
        })
     })
 </script>
</html>
@endsection
@section("title","公告列表")
