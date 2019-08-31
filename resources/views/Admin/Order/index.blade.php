@extends("Admin.AdminPublic.Adminpublic");
@section("admin")
<html>
 <head></head>
 <body>
  <div class="mws-panel-body no-padding"> 
   <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
    <form action="/yonghu" method="get">
    <div class="dataTables_filter" id="DataTables_Table_1_filter">
     <label>搜索: <input type="text" name="keywords" aria-controls="DataTables_Table_1"  value="" /><input type="submit" value="搜索"></label>
     </form>
    </div>
    <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
     <thead> 
      <tr role="row">
       <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 155px;">ID</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 100px;">收货人</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 198px;">订单号</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 250px;">地址</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 133px;">手机</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 133px;">状态</th>
       
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 98px;">操作</th>
      </tr> 
     </thead> 
     <tbody role="alert" aria-live="polite" aria-relevant="all">
       @foreach($info as $row)
      
      <tr class="odd">
      
       <td class="  sorting_1">{{$row->oid}}</td> 
       <td class=" ">{{$row->name}}</td> 
       <td class=" ">{{$row->order_num}}</td>   
       <td class=" ">{{$row->xhuo}}</td>
       <td class=" ">{{$row->phone}}</td>  
       <td class=" ">@if($row->status==0) 未付款 
            @elseif($row->status==1) 待发货 1
            @elseif($row->status==2) 已付款 2
            @elseif($row->status==3) 已发货 3
            @elseif($row->status==4) 已收货 4
            @elseif($row->status==4) 待评价 5
            @endif</td>
       
       <td class=" "> 
         <form action="/adminorder/{{$row->oid}}" method="post">
          {{csrf_field()}}
          {{method_field('DELETE')}}
         <button class="btn btn-success" type="submit">
          <i class="icon-shopping-cart"></i>
         </button>
        </form>
        <a href="/adminorder/{{$row->oid}}/edit">
          <button class="btn btn-info">
               <i class="icon-tools"></i>
          </button>
        </a>
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
 </body>
</html>
@endsection
@section("title","订单列表")
