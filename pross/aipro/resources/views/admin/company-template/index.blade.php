@extends('layouts.admin.master')
@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ol>
    </section>

  <section class="content">
      <!-- <div class="row"> -->
        <!-- general form elements disabled -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <div class="col-md-8">
                  <h3 class="box-title">{{$page_title}}</h3>
                </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              @if(Session::has('success'))
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ Session::get('success') }}
              </div>
              @endif
              <table id="table-datatable" class="table table-bordered table-hover ">
                <thead>
                <tr>
                  <th width="5%">#</th>
                  <th width="20%">CompanyName</th>
                  <th width="20%">General Email</th>
                  <th width="20%">MemberName</th>
                  <th width="20%">Member Email</th>
                  <th width="15%">Action</th>
                </tr>
                </thead>
                
              </table>

            </div>
            <!-- /.box-body -->
          </div>
   <!--  </div> -->
  </section>
  </div>
@endsection


@section('customjs')
@push('customjs')
<script type="text/javascript">
  

var dataTableInstance = '';
   $(document).on('change','#filter', function(e) {
      dataTableInstance.draw();      
   });

   $(function(){
       dataTableInstance = $('#table-datatable').DataTable({
           paging: true,
           searching: true,
           processing: true,
           serverSide: true,
           lengthChange:false,
           
           ajax: {
               url: "{!! url('admin/get-com-template') !!}",
               data: function (d) {
                  d.filter_value = $('select[name=filter]').val();
               },
           },
           columns : [
                      {
                         "className": 'sno',
                         "orderable": false,
                         "data": null,
                         "defaultContent": '',
                         "searchable": false
                      },
                      { data: 'com_name', name: 'com_name' },
                      { data: 'general_email', name: 'general_email' },
                      { data: 'name', name: 'name' },
                      { data: 'email', name: 'email' },
                      { 
                           "className": 'action', 
                           "orderable": false, 
                           "data": null, 
                           "defaultContent": '', 
                           "searchable": false, 
                           "orderable": false
                      }
           ],
           order:[
               [0, "ASC"]
           ],
           columnDefs: [
               {
                   "targets": 0,
                   "data": null,
                   "render": function (data, type, full, meta) {
                       return parseFloat(meta.row) + parseFloat(1) + parseFloat(meta.settings._iDisplayStart);
                   }
               },
               {
                   "targets": 5,
                   "data": null,
                   "render": function (data) {
                      var link = '<div class="btn-group"><button type="button" class="btn btn-default">Action</button><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button><ul class="dropdown-menu" role="menu"><li><a href="{{ url('/admin/company-edit/') }}/'+data['id']+'">EditCompany</a></li><li><a href="{{ url('/admin/member-edit/') }}/'+data['id']+'">EditMember</a></li></ul></div>'; 
                      return link;
                    }
               }
           ],
       });
   });

</script>
@endpush
@stop