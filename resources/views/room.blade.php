@extends('layouts.master',['title' => 'Phòng'])
@section('stylesheets')
@parent
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
<style type="text/css">
    .bb {
        color:
            red;
    }

    .modal-title {
        color: #17a2b8;
    }

    .export {
        background-color: #17a2b8;
        border: 0;
    }

</style>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                    <h1>Quản lý phòng hiện có</h1>
                   
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                             <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-lg">
                        <i class="fas fa-plus"></i>&nbsp; Thêm mới
                    </button>
                        </div>

                        <!-- //modal add -->
                        <div class="modal fade" id="modal-lg">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><i class="fas fa-plus"></i>Thêm phòng</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-md-4">
                                            <ul id="saveform_errList"></ul>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label">Tên/Mã phòng<span class="bb">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-door-open"></i></span>
                                                    <input type="text" name="name" class="name form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="validationCustom02" class="form-label">Giá cho thuê<span class="bb">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id=""><i class="fas fa-money-bill-alt"></i></span>
                                                    <input type="text" name="price" class="price form-control" id="validationCustom02" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Loại phòng<span class="bb">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id=""><i class="fas fa-question"></i></i></span>
                                                    <select class="type form-control" required>
                                                        <option value="Đơn">Đơn</option>
                                                        <option value="Ghép">Ghép</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Diện tích (m2)<span class="bb">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id=""><i class="fas fa-location-arrow"></i>
                                                    </span>
                                                    <input type="number" class="area form-control" name="area" placeholder="nhập diện tích">
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <label class="form-label">Ghi chú</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="inputGroupPrepend"><i class="far fa-clipboard"></i>
                                                    </span>
                                                    <textarea type="text" class="note form-control" name="note"> </textarea> 
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="modal-footer ">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                                        <button type="" class="btn btn-primary add_room"><i class="fas fa-save"></i>&nbsp;Lưu</button>
                                    </div>

                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- modal edit -->
                        <div class="modal fade" id="edit_modal">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><i class="fas fa-plus"></i>Chỉnh sửa thông tin</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-md-4">
                                            <ul id="editform_errList"></ul>
                                            <input type="hidden" id="edit_id" value="id">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label">Tên/Mã phòng<span class="bb">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-door-open"></i></span>
                                                    <input type="text" name="name" id="edit_name" class="name form-control"  required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="validationCustom02" class="form-label">Giá cho thuê<span class="bb">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id=""><i class="fas fa-money-bill-alt"></i></span>
                                                    <input type="text" name="price" class="phone form-control" id="edit_price" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Loại phòng<span class="bb">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id=""><i class="fas fa-question"></i></i></span>
                                                    <select class="form-control" id="edit_type" required>
                                                        <option value="Đơn">Đơn</option>
                                                        <option value="Ghép">Ghép</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom03" class="form-label">Diện tích (m2)<span class="bb">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id=""><i class="fas fa-location-arrow"></i>
                                                    </span>
                                                    <input type="number" class="address form-control" id="edit_area" name="area" placeholder="nhập diện tích">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Ghi chú</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="inputGroupPrepend"><i class="far fa-clipboard"></i>
                                                    </span>
                                                    <input type="text" class="address form-control" id="edit_note" name="note">
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="modal-footer ">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                                        <button type="" class="btn btn-primary edit_save"><i class="fas fa-save"></i>&nbsp;Lưu</button>
                                    </div>

                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                        <!-- //modal view member -->
                        <div class="modal fade" id="view_member">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><i class="fas fa-plus"></i>
                                          Thành viên phòng <a class="view_room_name"></a> 
                                        </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                      <table id="billdetail" class="table table-hover table-striped">
                                        <thead>
                                          <tr>
                                            <th>STT</th>
                                            <th>Họ tên</th>  
                                            <th>Ngày sinh</th>
                                            <th>Số điện thoại</th>
                                            <th>Ngày thuê</th>                    
                                          </tr>
                                        </thead>
                                        <tbody>                   

                                        </tbody>
                                      </table>
                                    </div>

                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Phòng</th>
                                        <th>Thành viên</th>
                                        <th>Giá cho thuê </th>
                                        <th>Loại phòng</th>
                                        <th>Diện tích</th>
                                        <th>Ghi chú</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Room as $r)
                                    <tr>
                                        <th>{{ $r->name }}</th>                                     
                                        @if($r->num_customer==0)
                                            <td><span class="badge bg-warning">Trống</span></td>
                                            @else
                                            <td><a class="view_member" href="#" data-id="{{ $r->id }}" data-room_name="{{ $r->name }}"><span class="badge bg-success">Xem thành viên({{ $r->num_customer }})</span></a></td>
                                        @endif                                       
                                        <td>{{ number_format($r->price, 0) }}</td>
                                        <td>{{ $r->type }}</td>
                                        <td>{{ $r->area }}</td>
                                        <td>{{ $r->note }}</td>
                                        <td>
                                            <button type="button" value="{{ $r->id }}" class="edit_room btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i>
                                                </i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

@section('scripts')
@parent

<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<!-- dropzonejs -->
<script src="{{ asset('plugins/dropzone/min/dropzone.min.js') }}"></script>
<script>
    $(function load() {
        $("#example1").DataTable({
           
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "pageLength": 15,
            "buttons": [{
                extend: 'excel',
                text: '<i class="fas fa-file-excel"></i>&nbsp;Xuất excel',
                className: 'export',
                title: 'Thông tin khách thuê',
                filename: 'Export excel',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            }, {
                extend: 'print',
                text: '<i class="fas fa-print"></i>&nbsp;In',
                className: 'export',
                title: 'Thông tin phòng',
                filename: 'Thông tin phòng',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            }, {
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf"></i>&nbsp;Xuất pdf',
                className: 'export',
                title: 'Thông tin khách thuê',
                filename: 'Export excel',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            }]

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


    });

    function formatDate (input) {
          var datePart = input.match(/\d+/g),
          year = datePart[0],
          month = datePart[1], day = datePart[2];

          return day+'/'+month+'/'+year;
    }

    $(document).ready(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 3000
        });


       
        $(document).on('click', '.add_room', function(e) {
            e.preventDefault();
            var data = {
                'name': $('.name').val(),
                'price': $('.price').val(),
                'type': $('.type').children("option:selected").val(),
                'area': $('.area').val(),
                'note': $('.note').val(),         
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('quanlyphong.store') }}",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $('#saveform_errList').html("");
                        $('#saveform_errList').addClass('alert alert-danger');
                        $.each(response.errors, function(key, err_value) {
                            $('#saveform_errList').append('<li>' + err_value + '</li>');
                        });
                    } else {
                        $('#modal-lg').modal('hide');
                        $('#modal-lg').find('input').val("");
                        Toast.fire({
                            icon: 'success',
                            title: 'Thêm thành công.'
                        })
                    }
                }
            });
        });

        $(document).on('click', '.view_member', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('.view_room_name').text($(this).data('room_name'));
            $('#view_member').modal('show');
            var url = "{{ route('viewmember', ":id") }}";
            url = url.replace(':id', id);
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    if (response.status == 404) {
                      console.log("lỗi");
                    } else {                
                      var count = $(response.members).length; 
                      $(".view_room_member").remove();
                      for(i=0;i<count;i++){
                        $("#billdetail").find('tbody')
                            .append($('<tr>').attr('class', 'view_room_member')
                                .append($('<td>')
                                    .append([i+1])
                                )
                                .append($('<td>')
                                    .append(response.members[i].name)
                                )
                                .append($('<td>').attr('class', 'format_date')
                                    .append(formatDate(response.members[i].birthday))
                                )
                                .append($('<td>')
                                    .append(response.members[i].phone)
                                )
                                .append($('<td>')
                                    .append(formatDate(response.members[i].rent_at))
                                )
                            );
                      }
                    }
                }
            });
        });

        $(document).on('click', '.edit_room', function(e) {
            e.preventDefault();
            var id = $(this).val();
            $('#edit_modal').modal('show');
            $.ajax({
                type: "GET",
                url: "quanlyphong/" + id,
                success: function(response) {
                    if (response.status == 404) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Không tìm thấy dữ liệu, truy vấn không hợp lệ.'
                        })
                    } else {
                        $('#edit_id').val(response.room.id);
                        $('#edit_name').val(response.room.name);
                        $('#edit_price').val(response.room.price);
                        $('#edit_type').val(response.room.type);
                        $('#edit_area').val(response.room.area);
                        $('#edit_note').val(response.room.note);   
                    }
                }
            });
        });

        $(document).on('click', '.edit_save', function(e) {
            e.preventDefault();
            var id = $('#edit_id').val();
            var data = {
                'name': $('#edit_name').val(),
                'price': $('#edit_price').val(),
                'type': $('#edit_type').children("option:selected").val(),
                'area': $('#edit_area').val(),
                'note': $('#edit_note').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "PUT",
                url: "quanlyphong/" + id,
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 200) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Cập nhật thành công'
                        })
                       $('.edit_save').addClass('disabled');
                        setTimeout(
                          function() 
                          {   
                            $('#edit_modal').modal('hide');
                            location.reload();
                          }, 1500);
                    } else if (response.status == 400) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Cập nhật không thành công,kiểm tra lại dữ liệu'
                        })
                        $('#editform_errList').html("");
                        $('#editform_errList').addClass('alert alert-danger');
                        $.each(response.errors, function(key, err_value) {
                            $('#editform_errList').append('<li>' + err_value + '</li>');
                        });
                    } else {
                        console.log(response);
                        Toast.fire({
                            icon: 'error',
                            title: 'Có lỗi xảy ra'
                        })
                    }
                }
            });
        });

    });
</script>
@endsection