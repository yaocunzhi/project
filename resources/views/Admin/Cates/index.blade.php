@extends("Admin.AdminPublic.Adminpublic");
@section("admin")
<html>
 <head></head>
 <body>
   <div class="mws-panel grid_8">
   <script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
  <body>
    <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>无线分类列表</span> 
   </div>
  <div class="mws-panel-body no-padding"> 
   <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
   	<form action="/admincate" method="get">
    <div class="dataTables_filter" id="DataTables_Table_1_filter">
     <label>搜索: <input type="text" name="key" aria-controls="DataTables_Table_1"  value="@if(count($request)) {{$k}} @else  @endif" /><input type="submit" value="搜索"></label>
     </form>
    </div>
    <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
     <thead> 
      <tr role="row">
       <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 155px;">ID</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 211px;">姓名</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 198px;">pid</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 133px;">path</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 98px;">操作</th>
      </tr> 
     </thead> 
     <tbody role="alert" aria-live="polite" aria-relevant="all">
       @foreach($cate as $row)
      <tr class="odd"> 
       <td class="  sorting_1">{{$row->id}}</td> 
       <td class=" ">{{$row->name}}</td> 
       <td class=" ">{{$row->pid}}</td> 
       <td class=" ">{{$row->path}}</td> 
       <td class=" "> 
         <form action="/admincate/{{$row->id}}" method="post">
          {{csrf_field()}}
          {{method_field('DELETE')}}
       	 <button class="btn btn-danger" type="submit">
       		<i class="icon-shopping-cart"></i>
       	 </button>
        </form>
        <a href="/admincate/{{$row->id}}/edit">
       		<button class="btn btn-info">
               <i class="icon-tools"></i>
       		</button>
        </a>
      </td> 
      </tr>
      @endforeach
     </tbody>
    </table>
   
    <div class="dataTables_paginate paging_full_numbers" id="pages">
        @if(count($request))
        {{$cate->appends($request)->render()}}
        @else
          {{$cate->render()}}
        @endif
    </div>
   </div> 
  </div>
  </div>
 </body>
</html>
@endsection
@section("title","无线分类列表")
