@extends('layouts.master',['title' => 'Dịch vụ'])
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

<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<style type="text/css">
    .bb {
        color:
            red;
    }

    .modal-title {
        color: #17a2b8;
    }

</style>
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lý các loại dịch vụ</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tổng quan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <!-- //modal add -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-plus"></i>Thêm dịch vụ mới</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-4">
                        <ul id="saveform_errList"></ul>
                    </div>
                    <div class="row">                     
                      <div class="col-md-12">
                        <label class="form-label">Phí dịch vụ<span class="bb">*</span></label>
                        <div>
                          <table class="table table-hover ">
                            <thead>
                              <tr>
                                <th>Chọn</th>
                                <th>Dịch vụ</th> 
                                <th>Đơn vị</th>                        
                              </tr>
                            </thead>
                            <tbody>                   
                              <tr>
                                <td> 
                                  <div class="icheck-success">
                                      <input type="checkbox" data-name="Internet" data-unit="tháng" id="internet" name="check" value="internet" />
                                      <label for="internet"></label>
                                  </div>
                                </td>
                                <td>Internet</td>                             
                                <td><span class="badge bg-danger">Tháng</span></td>
                              </tr>
                              <tr>
                                <td> 
                                  <div class="icheck-success">
                                      <input class="check" data-name="Tiền điện" data-unit="kwh" type="checkbox" id="dien" name="check" value="Tiền điện" />
                                      <label for="dien"></label>
                                  </div>
                                </td>
                                <td>Tiền điện</td>                             
                                <td><span class="badge bg-danger">Tháng</span></td>
                              </tr>
                              <tr>
                                <td> 
                                  <div class="icheck-success">
                                      <input type="checkbox" data-name="Nước" data-unit="m3" id="nuoc" name="check" value="Nước" />
                                      <label for="nuoc"></label>
                                  </div>
                                </td>
                                <td>Nước</td>                             
                                <td><span class="badge bg-danger">m3</span></td>
                              </tr>
                              <tr>
                                <td> 
                                  <div class="icheck-success">
                                      <input type="checkbox" data-name="Gửi xe" data-unit="tháng" id="xe" name="check" value="Gửi xe" />
                                      <label for="xe"></label>
                                  </div>
                                </td>
                                <td>Gửi xe</td>                                 
                                <td><span class="badge bg-danger">tháng</span></td>
                              </tr>
                              <tr>
                                <td> 
                                  <div class="icheck-success">
                                      <input type="checkbox" data-name="Vệ sinh" data-unit="tháng" id="vesinh" name="check" value="Vệ sinh" />
                                      <label for="vesinh"></label>
                                  </div>
                                </td>
                                <td>Vệ sinh</td>                             
                                 
                                <td><span class="badge bg-danger">tháng</span></td>
                              </tr>
                    
                            </tbody>
                           
                            <tfoot>
                              <thead>
                              <tr>
                                <th colspan="3"><small>
                                  Nếu không phát sinh dịch vụ, hãy nhập số lượng là 0 <br>
                                  Để thêm các loại dịch vụ khác, hãy vào phần <a href="#">Quản lý dịch vụ</a>
                                </small></th>
                              </tr>
                            </thead>
                            </tfoot>
                          </table>
                      </div>
                      </div>
                    </div>

                </div>

                <div class="modal-footer ">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type="" class="btn btn-primary save_bill"><i class="fas fa-save"></i>&nbsp;Lưu</button>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- //modal add -->
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-pencil-alt"></i>Chỉnh sửa dịch vụ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-8">
                        <ul id="editform_errList"></ul>
                    </div>
                    <div class="row">                     
                      <div class="col-md-6">
                          <label class="form-label">Tên dịch vụ<span class="bb">*</span></label>
                          <div class="input-group">
                              <input type="text" name="name" class="name form-control" required>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="form-label">Đơn giá(đ)<span class="bb">*</span></label>
                          <div class="input-group">
                              <input type="text" name="price" class="price form-control" required>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="form-label">Đơn vị<span class="bb">*</span></label>
                          <div class="input-group">
                              <input type="text" name="unit" class="unit form-control" required>
                          </div>
                      </div>
                      <input value="" type="hidden" name="id" class="service_id form-control" required>
                    </div>

                </div>

                <div class="modal-footer ">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type="" class="btn btn-primary save_service"><i class="fas fa-save"></i>&nbsp;Lưu</button>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-default">
                <i class="fas fa-plus"></i>&nbsp; Thêm dịch vụ mới
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Loại dịch vụ</th>
                      <th>Đơn giá(đ)</th>
                      <th style="width: 70px">Đơn vị</th>
                      <th style="width: 10px">Sửa</th>
                      <!-- <th>#</th -->
                    </tr>
                  </thead>
                  <tbody>                   
                    @if(!$Services->count())
                    <tr>
                        <td colspan="4">Bạn chưa có dịch vụ nào, hãy thêm dịch vụ</td>
                    </tr>
                    @else
                    @foreach($Services as $s)
                    <tr>
                      <td>{{ $s->name }}</td>
                      <td>
                        @if($s->price =='')
                        <span class="badge bg-danger">Chưa cập nhật
                        </span> 
                        @else
                          {{number_format($s->price) }}
                        @endif
                      </td>
                      <td>{{ $s->unit }}</td>
                      <td>
                        <button type="button" 
                          data-name="{{ $s->name }}" data-id="{{ $s->id }}"
                          data-price="{{ $s->price }}" data-unit="{{ $s->unit }}" 
                          value="{{ $s->id }}" class="edit_service btn btn-info btn-sm">
                          <i class="fas fa-edit"></i>
                          </i>
                        </button>
                      </td>
               <!--        <td>
                        
                      </td> -->
                    </tr>
                    @endforeach
                    @endif                     
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->

          </div>
        </div>
        <!-- /.row -->


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


  </div>
  <!-- /.content-wrapper -->


@endsection

@section('scripts')
@parent
<!-- AdminLTE for demo purposes -->

<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard3.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000
    });

    $(document).on('click', '.save_bill', function(e) {
      e.preventDefault();
      var data = $.map($('input[name="check"]:checked'), function(c)
      {
        return c.value; 
      })
      var serviceData = $('input[name="check"]:checked').map(function() {
          return {
            name: $(this).data('name'),
            unit: $(this).data('unit'),
          }
        }).get();
      // console.log(serviceData);
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
          type: "POST",
          url: "{{ route('dichvu.store') }}",
          data: {serviceData},
          dataType: "json",
          success: function(response) {
              if (response.status == 400) {
                  // $('#saveform_errList').html("");
                  // $('#saveform_errList').addClass('alert alert-danger');
                  // $.each(response.errors, function(key, err_value) {
                  //     $('#saveform_errList').append('<li>' + err_value + '</li>');
                  // });
                  console.log(response.errors);
              } else {
                // console.log("Thành công");
                //   $('#modal-lg').modal('hide');
                //   $('#modal-lg').find('input').val("");
                //   Toast.fire({
                //       icon: 'success',
                //       title: 'Thêm thành công.'
                //   })
                  console.log(response.errors);
              }
          }
      });
    });
    
    $(document).on('click', '.edit_service', function(e) {
      $('#modal-edit').modal('show');
      var name = $(this).data('name');
      var price = $(this).data('price');
      var unit = $(this).data('unit');
      var id = $(this).data('id');
      $('.name').val(name);
      $('.price').val(price);
      $('.unit').val(unit);
      $('.service_id').val(id);
    });

    $(document).on('click', '.save_service', function(e) {
      e.preventDefault();
      var id = $('.service_id').val();
      var data = {
          'name': $('.name').val(),
          'price': $('.price').val(),
          'unit': $('.unit').val(),
      }
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
          type: "PUT",
          url: "dichvu/" + id,
          data: data,
          dataType: "json",
          success: function(response) {
              if (response.status == 200) {
                console.log(response.message);
                  Toast.fire({
                      icon: 'success',
                      title: 'Cập nhật dịch vụ thành công'
                  })
                 $('.save_service').addClass('disabled');
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
                  console.log(response.message);
                  // Toast.fire({
                  //     icon: 'error',
                  //     title: 'Có lỗi xảy ra'
                  // })
              }
          }
      });

    });


  });
</script>
@endsection