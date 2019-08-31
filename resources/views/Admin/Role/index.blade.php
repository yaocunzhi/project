@extends("Admin.AdminPublic.Adminpublic");
@section("admin")
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8">
   <script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
 <body>
    <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>角色列表</span> 
   </div>
  <div class="mws-panel-body no-padding"> 
   <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
    </div>
    <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
     <thead> 
      <tr role="row">
       <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 155px;">ID</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 211px;">角色管理</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 98px;">操作</th>
      </tr> 
     </thead> 
     <tbody role="alert" aria-live="polite" aria-relevant="all">
       @foreach($role as $row)
      <tr class="odd" > 
       <td class="  sorting_1">{{$row->id}}</td> 
       <td class=" ">{{$row->name}}</td> 
       <td class=" "> 
        <a href="/adminauth/{{$row->id}}" class="btn btn-success">权限</a>
        
         <form action="/adminrole/{{$row->id}}" method="post">
          {{csrf_field()}}
          {{method_field('DELETE')}}
       	 <button class="btn btn-danger" type="submit">删除</button>      	
        </form>
        <a href="/adminrole/{{$row->id}}/edit" class="btn btn-info">修改</a>
        
      </td> 
      </tr>
      @endforeach
     </tbody>
    </table>
    <div class="dataTables_info" id="DataTables_Table_1_info">
    
    </div>
    <div class="dataTables_paginate paging_full_numbers" id="pages">
    </div>
   </div> 
  </div>
  <div>
 </body>
</html>
@endsection
@section("title","角色列表")
