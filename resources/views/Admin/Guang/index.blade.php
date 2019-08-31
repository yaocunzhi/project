@extends("Admin.AdminPublic.adminpublic")
@section("admin")
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>广告列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
      <form action="" method="get">
       <div class="dataTables_filter" id="DataTables_Table_1_filter">
       </div>
     </form>
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 140px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 192px;">图片</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 192px;">描述</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 192px;">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach($map as $row)
       <tr class="odd" align="center"> 
        <td class="  sorting_1">{{$row->id}}</td>   
        <td class=" "><img src="{{$row->pic}}" width="200px"></td>
        <td class=" ">{{$row->text}}</td>    
        <td class=" ">
          <form action="/guang/{{$row->id}}" method="post">
            {{csrf_field()}}
            {{method_field("DELETE")}}
            <button class="btn btn-success" type="submit">删除</button>
          </form>
          <a class="btn btn-info" href="/guang/{{$row->id}}/edit">修改</a> 
        </td>  
       </tr>
       @endforeach
      </tbody>
      </table>
     <div class="dataTables_paginate paging_full_numbers" id="pages">
     </div>
    </div> 
   </div> 
  </div>
 </body>
</html>
@endsection
@section("title","后台广告列表")