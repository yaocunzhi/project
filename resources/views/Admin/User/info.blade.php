@extends("Admin.AdminPublic.Adminpublic");
@section("admin")
<html>
 <head></head>
 <body>
  <div class="mws-panel-body no-padding"> 
   <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
    <form action="/userinfo" method="get">
    <div class="dataTables_filter" id="DataTables_Table_1_filter">
    
     </form>
    </div>
    <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
     <thead> 
      <tr role="row">
       <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 155px;">ID</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 211px;">爱好</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 198px;">性别</th>
      </tr> 
     </thead> 
     <tbody role="alert" aria-live="polite" aria-relevant="all">
       @if(isset($info))
       <tr class="odd"> 
       <td class="  sorting_1">{{$info->id}}</td> 
       <td class=" ">{{$info->hobby}}</td> 
       <td class=" ">{{$info->sex}}</td>
       </tr>
       @else
       <tr class="odd"> 
       <td class="  sorting_1" colspan="3">暂时还没有数据哦</td> 
       </tr>
       @endif
     </tbody>
    </table>
    <div class="dataTables_info" id="DataTables_Table_1_info">
    
    </div>
    <div class="dataTables_paginate paging_full_numbers" id="pages">
    </div>
   </div> 
  </div>
 </body>
</html>
@endsection
@section("title","会员模型列表")