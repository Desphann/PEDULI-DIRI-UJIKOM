@extends('layouts.dashboard')

@section('pagetitle', 'Catatan Perjalanan')  

@section('pageheader', 'Catatan Perjalanan')
  
@section('body')
  <form class="form-inline mr-auto" method="GET" action="/cari">
    @csrf
  <div class="mt-3">
    <div class="row g-2">
      <div class="col-2">
        <select class="form-select form-control" onchange="yesnoCheck(this);">
          <option value="lokasi">Lokasi</option>
          <option value="tanggal">Tanggal</option>
          <option value="jam">Jam</option>
          <option value="suhu">Suhu</option>
        </select>
      </div>
      <div class="col-2">
        <div class="form-group" id="iflokasiBtn">
            <input name="lokasi" id="iflokasi" class="form-control" type="search" placeholder="Cari Lokasi" aria-label="Search" autocomplete="off">
        </div>
        <div class="form-group" id="iftglBtn" style="display: none;">
          <input name="tanggal" id="iftgl" class="form-control" type="date" placeholder="Cari Tanggal" style="display: none;" >
        </div>
        <div class="form-group"  id="ifjamBtn" style="display: none;">
          <input name="jam" id="ifjam" class="form-control" type="time" placeholder="Cari Jam" style="display: none;">
        </div>
        <div class="form-group" id="ifsuhuBtn" style="display: none;" >
          <input name="suhu" id="ifsuhu" class="form-control" type="float" placeholder="Cari Suhu" style="display: none;" autocomplete="off">
      </div>
    </div>
    <div class="col-auto">
      <button href="/cari" class="btn btn-white btn-icon" aria-label="Button">
        <!-- Download SVG icon from http://tabler-icons.io/i/search -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
      </button>
    </div>
  </div>
  </div>
</div>
</form>
    <div class="col-12">
      <div class="card">
        <div class="table-responsive">
          <div id="table-default">
          <table class="table table-dark table-vcenter card-table table-striped" id="tableperjalanan">
            <thead style="background-color: hsl(0, 18%, 97%)">
              @php
               $no=1
              @endphp
              <tr>
                <th><button class="table-sort" data-sort="sort-number">No</button></th>
                <th><button class="table-sort" data-sort="sort-date">Tanggal</button></th>
                <th><button class="table-sort" data-sort="sort-hour">Jam</button></th>
                <th><button class="table-sort" data-sort="sort-place">Lokasi</button></th>
                <th><button class="table-sort" data-sort="sort-suhu">Suhu</button></th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="table-tbody">
              @foreach ($data as $peduliDiri)
              <tr>
              <th scope="row" class="sort-number">{{$no++}}</th>
              <td class="sort-date">{{$peduliDiri->tanggal}}</td>
              <td class="sort-hour">{{$peduliDiri->jam}}</td>
              <td class="sort-place">{{$peduliDiri->lokasi}}</td>
              <td class="sort-suhu">{{$peduliDiri->suhu}}</td>
              <td>
                <form action="/delete" method="post" class="need_validation">
                  @method('delete')
                  @csrf
                  <input type="hidden" id="id" name="id" value="{{ $peduliDiri->id }}">
                  <button type="submit" class="btn btn-icon btn-danger" onclick="return confirm('Yakin Delete Data?')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <desc>Download more icon variants from https://tabler-icons.io/i/trash</desc>
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <line x1="4" y1="7" x2="20" y2="7"></line>
                      <line x1="10" y1="11" x2="10" y2="17"></line>
                      <line x1="14" y1="11" x2="14" y2="17"></line>
                      <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                      <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                   </svg>
                  </button>
                </form>
              </td>
            </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function () {
    $('#tableperjalanan').DataTable({"searching": false});
    });
    </script>

     <script>
       document.addEventListener("DOMContentLoaded", function() {
       const list = new List('table-default', {
         sortClass: 'table-sort',
         listClass: 'table-tbody',
         valueNames: [ 'sort-number', 'sort-date', 'sort-hour', 'sort-place', 'sort-suhu'
         ]
       });
       })
     </script>

    <script>
      function yesnoCheck(that)
      {
        if (that.value == "tanggal")
        {
          document.getElementById("iftgl").style.display = "block";
          document.getElementById("iftglBtn").style.display = "block";
    
          document.getElementById("iflokasi").style.display = "none";
          document.getElementById("iflokasiBtn").style.display = "none";
    
          document.getElementById("ifjam").style.display = "none";
          document.getElementById("ifjamBtn").style.display = "none";
    
          document.getElementById("ifsuhu").style.display = "none";
          document.getElementById("ifsuhuBtn").style.display = "none";
    
        } else if (that.value == "jam")
        {
          document.getElementById("iftgl").style.display = "none";
          document.getElementById("iftglBtn").style.display = "none";
    
          document.getElementById("iflokasi").style.display = "none";
          document.getElementById("iflokasiBtn").style.display = "none";
    
          document.getElementById("ifjam").style.display = "block";
          document.getElementById("ifjamBtn").style.display = "block";
    
          document.getElementById("ifsuhu").style.display = "none";
          document.getElementById("ifsuhuBtn").style.display = "none";
    
        } else if (that.value == "suhu")
        {
          document.getElementById("iftgl").style.display = "none";
          document.getElementById("iftglBtn").style.display = "none";
    
          document.getElementById("iflokasi").style.display = "none";
          document.getElementById("iflokasiBtn").style.display = "none";
    
          document.getElementById("ifjam").style.display = "none";
          document.getElementById("ifjamBtn").style.display = "none";
    
          document.getElementById("ifsuhu").style.display = "block";
          document.getElementById("ifsuhuBtn").style.display = "block";
        } else
        {
          document.getElementById("iftgl").style.display = "none";
          document.getElementById("iftglBtn").style.display = "none";
    
          document.getElementById("iflokasi").style.display = "block";
          document.getElementById("iflokasiBtn").style.display = "block";
    
          document.getElementById("ifjam").style.display = "none";
          document.getElementById("ifjamBtn").style.display = "none";
    
          document.getElementById("ifsuhu").style.display = "none";
          document.getElementById("ifsuhuBtn").style.display = "none";
        }
      }
    </script>

   

    <style>
      table.dataTable th.dt-left,
table.dataTable td.dt-left {
text-align: left;
}
table.dataTable th.dt-center,
table.dataTable td.dt-center,
table.dataTable td.dataTables_empty {
text-align: center;
}
table.dataTable th.dt-right,
table.dataTable td.dt-right {
text-align: right;
}
table.dataTable th.dt-justify,
table.dataTable td.dt-justify {
text-align: justify;
}
table.dataTable th.dt-nowrap,
table.dataTable td.dt-nowrap {
white-space: nowrap;
}
table.dataTable thead th.dt-head-left,
table.dataTable thead td.dt-head-left,
table.dataTable tfoot th.dt-head-left,
table.dataTable tfoot td.dt-head-left {
text-align: left;
}
table.dataTable thead th.dt-head-center,
table.dataTable thead td.dt-head-center,
table.dataTable tfoot th.dt-head-center,
table.dataTable tfoot td.dt-head-center {
text-align: center;
}
table.dataTable thead th.dt-head-right,
table.dataTable thead td.dt-head-right,
table.dataTable tfoot th.dt-head-right,
table.dataTable tfoot td.dt-head-right {
text-align: right;
}
table.dataTable thead th.dt-head-justify,
table.dataTable thead td.dt-head-justify,
table.dataTable tfoot th.dt-head-justify,
table.dataTable tfoot td.dt-head-justify {
text-align: justify;
}
table.dataTable thead th.dt-head-nowrap,
table.dataTable thead td.dt-head-nowrap,
table.dataTable tfoot th.dt-head-nowrap,
table.dataTable tfoot td.dt-head-nowrap {
white-space: nowrap;
}
table.dataTable tbody th.dt-body-left,
table.dataTable tbody td.dt-body-left {
text-align: left;
}
table.dataTable tbody th.dt-body-center,
table.dataTable tbody td.dt-body-center {
text-align: center;
}
table.dataTable tbody th.dt-body-right,
table.dataTable tbody td.dt-body-right {
text-align: right;
}
table.dataTable tbody th.dt-body-justify,
table.dataTable tbody td.dt-body-justify {
text-align: justify;
}
table.dataTable tbody th.dt-body-nowrap,
table.dataTable tbody td.dt-body-nowrap {
white-space: nowrap;
}
table.dataTable td.dt-control {
text-align: center;
cursor: pointer;
}
table.dataTable td.dt-control:before {
height: 1em;
width: 1em;
margin-top: -9px;
display: inline-block;
color: white;
border: 0.15em solid white;
border-radius: 1em;
box-shadow: 0 0 0.2em #444;
box-sizing: content-box;
text-align: center;
text-indent: 0 !important;
font-family: "Courier New", Courier, monospace;
line-height: 1em;
content: "+";
background-color: #31b131;
}
table.dataTable tr.dt-hasChild td.dt-control:before {
content: "-";
background-color: #d33333;
}

/*
* Table styles
*/
table.dataTable {
width: 100%;
margin: 0 auto;
clear: both;
border-collapse: separate;
border-spacing: 0;
/*
 * Header and footer styles
 */
/*
 * Body styles
 */
}
table.dataTable thead th,
table.dataTable tfoot th {
font-weight: bold;
}
table.dataTable thead th,
table.dataTable thead td {
padding: 10px 18px;
border-bottom: 1px solid #111111;
}
table.dataTable thead th:active,
table.dataTable thead td:active {
outline: none;
}
table.dataTable tfoot th,
table.dataTable tfoot td {
padding: 10px 18px 6px 18px;
border-top: 1px solid #111111;
}
table.dataTable thead .sorting,
table.dataTable thead .sorting_asc,
table.dataTable thead .sorting_desc,
table.dataTable thead .sorting_asc_disabled,
table.dataTable thead .sorting_desc_disabled {
cursor: pointer;
*cursor: hand;
background-repeat: no-repeat;
background-position: center right;
}
table.dataTable thead .sorting {
background-image: url("../images/sort_both.png");
}
table.dataTable thead .sorting_asc {
background-image: url("../images/sort_asc.png") !important;
}
table.dataTable thead .sorting_desc {
background-image: url("../images/sort_desc.png") !important;
}
table.dataTable thead .sorting_asc_disabled {
background-image: url("../images/sort_asc_disabled.png");
}
table.dataTable thead .sorting_desc_disabled {
background-image: url("../images/sort_desc_disabled.png");
}
table.dataTable tbody tr {
background-color: #ffffff;
}
table.dataTable tbody tr.selected {
background-color: #b0bed9;
}
table.dataTable tbody th,
table.dataTable tbody td {
padding: 8px 10px;
}
table.dataTable.row-border tbody th, table.dataTable.row-border tbody td, table.dataTable.display tbody th, table.dataTable.display tbody td {
border-top: 1px solid #dddddd;
}
table.dataTable.row-border tbody tr:first-child th,
table.dataTable.row-border tbody tr:first-child td, table.dataTable.display tbody tr:first-child th,
table.dataTable.display tbody tr:first-child td {
border-top: none;
}
table.dataTable.cell-border tbody th, table.dataTable.cell-border tbody td {
border-top: 1px solid #dddddd;
border-right: 1px solid #dddddd;
}
table.dataTable.cell-border tbody tr th:first-child,
table.dataTable.cell-border tbody tr td:first-child {
border-left: 1px solid #dddddd;
}
table.dataTable.cell-border tbody tr:first-child th,
table.dataTable.cell-border tbody tr:first-child td {
border-top: none;
}
table.dataTable.stripe tbody tr.odd, table.dataTable.display tbody tr.odd {
background-color: #f9f9f9;
}
table.dataTable.stripe tbody tr.odd.selected, table.dataTable.display tbody tr.odd.selected {
background-color: #acbad4;
}
table.dataTable.hover tbody tr:hover, table.dataTable.display tbody tr:hover {
background-color: #f6f6f6;
}
table.dataTable.hover tbody tr:hover.selected, table.dataTable.display tbody tr:hover.selected {
background-color: #aab7d1;
}
table.dataTable.order-column tbody tr > .sorting_1,
table.dataTable.order-column tbody tr > .sorting_2,
table.dataTable.order-column tbody tr > .sorting_3, table.dataTable.display tbody tr > .sorting_1,
table.dataTable.display tbody tr > .sorting_2,
table.dataTable.display tbody tr > .sorting_3 {
background-color: #fafafa;
}
table.dataTable.order-column tbody tr.selected > .sorting_1,
table.dataTable.order-column tbody tr.selected > .sorting_2,
table.dataTable.order-column tbody tr.selected > .sorting_3, table.dataTable.display tbody tr.selected > .sorting_1,
table.dataTable.display tbody tr.selected > .sorting_2,
table.dataTable.display tbody tr.selected > .sorting_3 {
background-color: #acbad5;
}
table.dataTable.display tbody tr.odd > .sorting_1, table.dataTable.order-column.stripe tbody tr.odd > .sorting_1 {
background-color: #f1f1f1;
}
table.dataTable.display tbody tr.odd > .sorting_2, table.dataTable.order-column.stripe tbody tr.odd > .sorting_2 {
background-color: #f3f3f3;
}
table.dataTable.display tbody tr.odd > .sorting_3, table.dataTable.order-column.stripe tbody tr.odd > .sorting_3 {
background-color: whitesmoke;
}
table.dataTable.display tbody tr.odd.selected > .sorting_1, table.dataTable.order-column.stripe tbody tr.odd.selected > .sorting_1 {
background-color: #a6b4cd;
}
table.dataTable.display tbody tr.odd.selected > .sorting_2, table.dataTable.order-column.stripe tbody tr.odd.selected > .sorting_2 {
background-color: #a8b5cf;
}
table.dataTable.display tbody tr.odd.selected > .sorting_3, table.dataTable.order-column.stripe tbody tr.odd.selected > .sorting_3 {
background-color: #a9b7d1;
}
table.dataTable.display tbody tr.even > .sorting_1, table.dataTable.order-column.stripe tbody tr.even > .sorting_1 {
background-color: #fafafa;
}
table.dataTable.display tbody tr.even > .sorting_2, table.dataTable.order-column.stripe tbody tr.even > .sorting_2 {
background-color: #fcfcfc;
}
table.dataTable.display tbody tr.even > .sorting_3, table.dataTable.order-column.stripe tbody tr.even > .sorting_3 {
background-color: #fefefe;
}
table.dataTable.display tbody tr.even.selected > .sorting_1, table.dataTable.order-column.stripe tbody tr.even.selected > .sorting_1 {
background-color: #acbad5;
}
table.dataTable.display tbody tr.even.selected > .sorting_2, table.dataTable.order-column.stripe tbody tr.even.selected > .sorting_2 {
background-color: #aebcd6;
}
table.dataTable.display tbody tr.even.selected > .sorting_3, table.dataTable.order-column.stripe tbody tr.even.selected > .sorting_3 {
background-color: #afbdd8;
}
table.dataTable.display tbody tr:hover > .sorting_1, table.dataTable.order-column.hover tbody tr:hover > .sorting_1 {
background-color: #eaeaea;
}
table.dataTable.display tbody tr:hover > .sorting_2, table.dataTable.order-column.hover tbody tr:hover > .sorting_2 {
background-color: #ececec;
}
table.dataTable.display tbody tr:hover > .sorting_3, table.dataTable.order-column.hover tbody tr:hover > .sorting_3 {
background-color: #efefef;
}
table.dataTable.display tbody tr:hover.selected > .sorting_1, table.dataTable.order-column.hover tbody tr:hover.selected > .sorting_1 {
background-color: #a2aec7;
}
table.dataTable.display tbody tr:hover.selected > .sorting_2, table.dataTable.order-column.hover tbody tr:hover.selected > .sorting_2 {
background-color: #a3b0c9;
}
table.dataTable.display tbody tr:hover.selected > .sorting_3, table.dataTable.order-column.hover tbody tr:hover.selected > .sorting_3 {
background-color: #a5b2cb;
}
table.dataTable.no-footer {
border-bottom: 1px solid #111111;
}
table.dataTable.nowrap th, table.dataTable.nowrap td {
white-space: nowrap;
}
table.dataTable.compact thead th,
table.dataTable.compact thead td {
padding: 4px 17px;
}
table.dataTable.compact tfoot th,
table.dataTable.compact tfoot td {
padding: 4px;
}
table.dataTable.compact tbody th,
table.dataTable.compact tbody td {
padding: 4px;
}

table.dataTable th,
table.dataTable td {
box-sizing: content-box;
}

/*
* Control feature layout
*/
.dataTables_wrapper {
position: relative;
clear: both;
}
.dataTables_wrapper .dataTables_length {
float: left;
}
.dataTables_wrapper .dataTables_length select {
border: 1px solid #aaa;
border-radius: 3px;
padding: 5px;
background-color: transparent;
padding: 4px;
}
.dataTables_wrapper .dataTables_filter {
float: right;
text-align: right;
}
.dataTables_wrapper .dataTables_filter input {
border: 1px solid #aaa;
border-radius: 3px;
padding: 5px;
background-color: transparent;
margin-left: 3px;
}
.dataTables_wrapper .dataTables_info {
clear: both;
float: left;
padding-top: 0.755em;
}
.dataTables_wrapper .dataTables_paginate {
float: right;
text-align: right;
padding-top: 0.25em;
}
.dataTables_wrapper .dataTables_paginate .paginate_button {
box-sizing: border-box;
display: inline-block;
min-width: 1.5em;
padding: 0.5em 1em;
margin-left: 2px;
text-align: center;
text-decoration: none !important;
cursor: pointer;
*cursor: hand;
color: #ffffff !important;
border: 1px solid transparent;
border-radius: 2px;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
color: #ffffff !important;
border: 1px solid black;
background-color: #474747;
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #474747), color-stop(100%, #000000));
/* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, #474747 0%, #000000 100%);
/* Chrome10+,Safari5.1+ */
background: -moz-linear-gradient(top, #474747 0%, #000000 100%);
/* FF3.6+ */
background: -ms-linear-gradient(top, #474747 0%, #000000 100%);
/* IE10+ */
background: -o-linear-gradient(top, #474747 0%, #000000 100%);
/* Opera 11.10+ */
background: linear-gradient(to bottom, #474747 0%, #000000 100%);
/* W3C */
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
cursor: default;
color: #666 !important;
border: 1px solid transparent;
background: transparent;
box-shadow: none;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
color: white !important;
border: 1px solid #111111;
background-color: #585858;
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #585858), color-stop(100%, #111111));
/* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, #585858 0%, #111111 100%);
/* Chrome10+,Safari5.1+ */
background: -moz-linear-gradient(top, #585858 0%, #111111 100%);
/* FF3.6+ */
background: -ms-linear-gradient(top, #585858 0%, #111111 100%);
/* IE10+ */
background: -o-linear-gradient(top, #585858 0%, #111111 100%);
/* Opera 11.10+ */
background: linear-gradient(to bottom, #585858 0%, #111111 100%);
/* W3C */
}
.dataTables_wrapper .dataTables_paginate .paginate_button:active {
outline: none;
background-color: #2b2b2b;
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #2b2b2b), color-stop(100%, #0c0c0c));
/* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);
/* Chrome10+,Safari5.1+ */
background: -moz-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);
/* FF3.6+ */
background: -ms-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);
/* IE10+ */
background: -o-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);
/* Opera 11.10+ */
background: linear-gradient(to bottom, #2b2b2b 0%, #0c0c0c 100%);
/* W3C */
box-shadow: inset 0 0 3px #111;
}
.dataTables_wrapper .dataTables_paginate .ellipsis {
padding: 0 1em;
}
.dataTables_wrapper .dataTables_processing {
position: absolute;
top: 50%;
left: 50%;
width: 100%;
height: 40px;
margin-left: -50%;
margin-top: -25px;
padding-top: 20px;
text-align: center;
font-size: 1.2em;
background-color: white;
background: -webkit-gradient(linear, left top, right top, color-stop(0%, rgba(255, 255, 255, 0)), color-stop(25%, rgba(255, 255, 255, 0.9)), color-stop(75%, rgba(255, 255, 255, 0.9)), color-stop(100%, rgba(255, 255, 255, 0)));
background: -webkit-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
background: -moz-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
background: -ms-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
background: -o-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
}
.dataTables_wrapper .dataTables_length,
.dataTables_wrapper .dataTables_filter,
.dataTables_wrapper .dataTables_info,
.dataTables_wrapper .dataTables_processing,
.dataTables_wrapper .dataTables_paginate {
color: #ffffff;
}
.dataTables_wrapper .dataTables_scroll {
clear: both;
}
.dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody {
*margin-top: -1px;
-webkit-overflow-scrolling: touch;
}
.dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody > table > thead > tr > th, .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody > table > thead > tr > td, .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody > table > tbody > tr > th, .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody > table > tbody > tr > td {
vertical-align: middle;
}
.dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody > table > thead > tr > th > div.dataTables_sizing,
.dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody > table > thead > tr > td > div.dataTables_sizing, .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody > table > tbody > tr > th > div.dataTables_sizing,
.dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody > table > tbody > tr > td > div.dataTables_sizing {
height: 0;
overflow: hidden;
margin: 0 !important;
padding: 0 !important;
}
.dataTables_wrapper.no-footer .dataTables_scrollBody {
border-bottom: 1px solid #111111;
}
.dataTables_wrapper.no-footer div.dataTables_scrollHead table.dataTable,
.dataTables_wrapper.no-footer div.dataTables_scrollBody > table {
border-bottom: none;
}
.dataTables_wrapper:after {
visibility: hidden;
display: block;
content: "";
clear: both;
height: 0;
}

@media screen and (max-width: 767px) {
.dataTables_wrapper .dataTables_info,
.dataTables_wrapper .dataTables_paginate {
  float: none;
  text-align: center;
}
.dataTables_wrapper .dataTables_paginate {
  margin-top: 0.5em;
}
}
@media screen and (max-width: 640px) {
.dataTables_wrapper .dataTables_length,
.dataTables_wrapper .dataTables_filter {
  float: none;
  text-align: center;
}
.dataTables_wrapper .dataTables_filter {
  margin-top: 0.5em;
}
}


    </style>
@endsection