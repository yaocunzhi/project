@extends("Admin.AdminPublic.Adminpublic")
@section("admin")
<html>
 <head></head>
 <script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
  
 <body>
  <div class="mws-panel grid_8">
    <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>后台会员列表</span> 
   </div>
  <div class="mws-panel-body no-padding"> 
   <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
   	<form action="/user" method="get">
    <div class="dataTables_filter" id="DataTables_Table_1_filter">
     <label>搜索: <input type="text" name="key" aria-controls="DataTables_Table_1" /><input type="submit" value="搜索"></label>
     </form>
    </div>
     <div id="div">
    <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
     <thead> 
      <tr role="row">
       <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 155px;">ID</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 211px;">姓名</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 198px;">邮箱</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 133px;">状态</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 98px;">创建时间</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 98px;">修改时间</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 98px;">操作</th>


      </tr> 
     </thead> 
     <tbody role="alert" aria-live="polite" aria-relevant="all">
      @foreach($data as $row)
      <tr class="odd"> 
       <td class="  sorting_1">{{$row->id}}</td> 
       <td class=" ">{{$row->uname}}</td> 
       <td class=" ">{{$row->email}}</td> 
       <td class=" ">{{$row->status}}</td>
       <td class=" ">{{$row->created_at}}</td> 
       <td class=" ">{{$row->updated_at}}</td> 
       <td class=" "> 
   
        <a href="/userinfo/{{$row->id}}" class="btn btn-info">会员详情</a>
        <a href="/useradd/{{$row->id}}" class="btn btn-success">收货地址</a>    
        <form action="/user/id" method="post">
          {{csrf_field()}}
          {{method_field('DELETE')}}
       	  <button class="btn btn-danger" type="submit">删除</button>
       		
       	  
        </form>
        <a href="/user/{{$row->id}}/edit">
       		<button class="btn btn-success">修改</button>
               
       		
        </a>
              
              
      </td> 
      </tr>
      @endforeach
     </tbody>
    </table>
     </div>
    <div class="dataTables_info" id="DataTables_Table_1_info">
    
    </div>
    <div class="dataTables_paginate paging_full_numbers" id="pages">
     @foreach($pp as $page)
     <button class="btn btn-warning" onclick="page({{$page}})">{{$page}}</button>
     @endforeach
    </div>
   </div> 
  </div>
</div>
 </body>
 
  <script type="text/javascript">
    //  alert($)
    function page(page){
     // alert(page)
     //ajax请求
    $.get("/user",{page:page},function(data){
       //alert(data);
       $('#div').html(data)
      });
    }
  </script>
</html>
@endsection
@section("title","会员用户列表")