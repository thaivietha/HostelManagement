@extends('layouts.master',['title' => 'Hóa đơn'])
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
    .room_bill{
      cursor: pointer;
    }
    .room_bill:hover {
      transform: scale(1.02);
    }
    .export {
        background-color: #17a2b8;
        border: 0;
    }

</style>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý hóa đơn</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">  
              <li class="breadcrumb-item">
                <Button class="btn btn-danger">
                <i class="fas fa-trash"></i> Đã xóa</Button>
              </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- //modal add -->
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-plus"></i>Nhập thông tin hóa đơn</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                     
                      <div class="col-md-4">
                          <label class="form-label">Chọn phòng<span class="bb">*</span></label>
                          <select class="room form-control" name="room" required>
                             <option value="0">Hãy chọn phòng</option>
                            @foreach($Rooms as $r)
                            <option class="room_price1" id="{{ $r->id }}" value="{{ $r->price }}">{{ $r->name }}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">Từ ngày<span class="bb">*</span></label>
                          <div class="input-group">
                              <input type="date" value="{{ date('Y-m-d') }}" name="from" class="from form-control" required>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">Đến ngày<span class="bb">*</span></label>
                          <div class="input-group">
                              <input type="date" name="to" class="to form-control" required>
                          </div>
                      </div>
                      <div class="col-md-12">
                        <label class="form-label">Phí dịch vụ<span class="bb">*</span></label>
                        <div class="table-responsive">
                          <table class="table table-hover ">
                            <thead>
                              <tr>
                                <th style="width: 150px">Dịch vụ</th>  
                                <th>Đơn giá(đ)</th>
                                <th>Số lượng</th>
                                <th style="width: 70px">Đơn vị</th>
                                <th>Thành tiền(đ)</th>                          
                              </tr>
                            </thead>
                            <tbody>                   
                              @if(!$Services->count())
                                <tr>
                                  <td colspan="4">Bạn chưa có dịch vụ nào, hãy thêm dịch vụ</td>
                                </tr>
                              @else
                              <tr id="tienphong">
                                <td>Tiền phòng</td>                             
                                <td>
                                  <input type="text" class="price form-control" id="room_price" name="room_price" value="">
                                </td>
                                <td><input class="qty form-control" type="number" name="qty" value="" placeholder=""></td>
                                <td><span class="badge bg-danger">Tháng</span></td>
                                <td><input data-id="" data-price="" data-quantity="" data-total="" class="form-control" type="text" id="total_room_price" value="" readonly ></td>
                              </tr>
                              @foreach($Services as $s)
                                
                              <tr class="service" id="{{$s->id}}" >
                                <td>{{ $s->name }}</td>                             
                                <td>
                                  <input type="text" class="price form-control" name="dien" value="{{$s->price}}">
                                </td>
                                <td><input class="qty form-control" type="number" name="qty" value="" placeholder=""></td>
                                <td><span class="badge bg-danger">{{ $s->unit }}</span></td>
                                <td><input data-id="" data-name="{{ $s->name }}" data-price="" data-quantity=""class="total form-control" type="text" value="" readonly ></td>
                              </tr>
              
                              @endforeach
                              @endif
                              <tr>
                                <th colspan="4" class="text-right">Tổng phí dịch vụ:</th>
                                <td><input type="text" class="service_total form-control" value="" name="" readonly></td>
                              </tr>      
                            </tbody>
                           
                            <tfoot>
                              <thead>
                              <tr>
                                <th colspan="3"><small>
                                  Nếu không phát sinh dịch vụ, hãy nhập số lượng là 0 <br>
                                  Để thêm các loại dịch vụ khác, hãy vào phần <a href="{{ route('dichvu.index') }}">Quản lý dịch vụ</a>
                                </small></th>
                                <th class="text-right text-danger">Thành tiền:</th>
                                <td><input readonly type="text" class="all_total form-control" value="0" name="all_total" ></td>
                              </tr>
                            </thead>
                            </tfoot>
                          </table>
                      </div>
                      </div>
                      
                      <div class="col-md-8">
                          <label class="form-label">Ghi chú</label>
                          <div class="input-group">
                              <textarea type="text" class="note form-control" name="note"> </textarea> 
                          </div>
                      </div>
                      <div class="col-md-4">
                          <ul id="saveform_errList"></ul>
                      </div>
                      <div class="col-md-3">  
                        <div class="icheck-success">
                          <input type="checkbox" id="paid" name="paid">
                            <label for="paid">
                              Đã thanh toán
                            </label>
                        </div>                                           
                      </div>
                    </div>

                </div>

                <div class="modal-footer ">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary save_bill"><i class="fas fa-save"></i>&nbsp;Lưu</button>
                </div>

            </div>

            <!-- /.modal-content -->
        </div>

        <!-- /.modal-dialog -->
    </div>
    <!-- //modal view detail -->
    <div class="modal fade" id="view_service">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-plus"></i>
                      Chi tiết dịch vụ phòng <a class="view_service_room"></a> 
                      <a class="view_service_date"></a>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <table id="billdetail" class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th style="width: 150px">Dịch vụ</th>  
                        <th>Đơn giá(đ)</th>
                        <th>Số lượng</th>
                        <th style="width: 70px">Đơn vị</th>
                        <th>Thành tiền(đ)</th>                          
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

    <!-- //modal edit bill -->
    <div class="modal fade" id="modal_edit_bill">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-pencil-alt"></i>Chỉnh sửa hóa đơn</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">   
                      <div class="col-md-2">
                          <label class="form-label">Phòng<span class="bb">*</span></label>
                          <input type="text" data-id="" class="name form-control" readonly>
                      </div>                  
                      <div class="col-md-5">
                          <label class="form-label">Từ ngày<span class="bb">*</span></label>
                          <div class="input-group">
                              <input type="date" name="from" class="edit_from form-control" required>
                          </div>
                      </div>
                      <div class="col-md-5">
                          <label class="form-label">Đến ngày<span class="bb">*</span></label>
                          <div class="input-group">
                              <input type="date" name="to" class="edit_to form-control" required>
                          </div>
                      </div>
                      
                      <div class="col-md-12">
                        <label class="form-label">Phí dịch vụ<span class="bb">*</span></label>
                        <div class="table-responsive">
                          <table class="table table-hover ">
                            <thead>
                              <tr>
                                <th style="width: 150px">Dịch vụ</th>  
                                <th>Đơn giá(đ)</th>
                                <th>Số lượng</th>
                                <th style="width: 70px">Đơn vị</th>                   
                              </tr>
                            </thead>
                            <tbody>                   
                              <tr id="tienphong">
                                <td>Tiền phòng</td>                             
                                <td>
                                  <input type="text" class="price edit_room_price form-control" id="room_price" name="room_price" value="">
                                </td>
                                <td><input class="qty_room form-control" type="number" name="qty" value="" placeholder=""></td>
                                <td><span class="badge bg-danger">Tháng</span></td>
                              </tr>
                            </tbody>
                           
                            <tfoot>
                              <thead>
                              <tr>
                                <th colspan="4"><small>
                                  Nếu không phát sinh dịch vụ, hãy nhập số lượng là 0 <br>
                                  Để thêm các loại dịch vụ khác, hãy vào phần <a href="{{ route('dichvu.index') }}">Quản lý dịch vụ</a>
                                </small></th>
                              </tr>
                            </thead>
                            </tfoot>
                          </table>
                      </div>
                      </div>
                      
                      <div class="col-md-8">
                          <label class="form-label">Ghi chú</label>
                          <div class="input-group">
                              <textarea type="text" class="note form-control" name="note"> </textarea> 
                          </div>
                      </div>
                      <div class="col-md-4">
                          <ul id="saveform_errList"></ul>
                      </div>
                    </div>

                </div>

                <div class="modal-footer ">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type="submit" value="" class="btn btn-primary updatebill"><i class="fas fa-save"></i>&nbsp;Cập nhật</button>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <!-- SELECT2 EXAMPLE -->
         <div class="card card-default">
          <div class="card-header">
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-lg">
            <i class="fas fa-plus"></i>&nbsp; Thêm hóa đơn mới
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Phòng</th>
                        <th>Thời gian</th>
                        <th>Tiền phòng</th>
                        <th>Dịch vụ</th>
                        <th>Thành tiền</th>
                        <th>Thanh toán</th>
                        <th>Ngày tạo</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!$Bills->count())
                    
                      <!-- <tr>
                        <td colspan="7" class="text-center">Bạn chưa có hóa đơn nào</td>
                      </tr> -->
                    @else
                    @foreach($Bills as $b)
                    <tr>
                        <th>{{ $b->room->name }}</th>
                        <td>{{ \Carbon\Carbon::parse($b->from)->format('d/m/Y')}} đến {{ \Carbon\Carbon::parse($b->to)->format('d/m/Y')}}</td>
                        <td>{{ number_format($b->room_price, 0) }}</td>
                        <td>
                          <button type="button" data-name="{{ $b->room->name }}" data-date="từ {{ \Carbon\Carbon::parse($b->from)->format('d/m/Y')}} đến {{ \Carbon\Carbon::parse($b->to)->format('d/m/Y')}}" value="{{ $b->id }}" class="view_service btn btn-info btn-sm"><i class="fas fa-eye"></i>
                          </button>
                        </td>
                        <td>{{ number_format($b->total_price, 0) }}</td>
                        <td>
                          @if($b->paid==0) 
                            <button type="button" value="{{ $b->id }}" id="not" class="paid btn btn-warning btn-sm">Chưa TT
                            </button>
                          @else
                          <button type="button" value="{{ $b->id }}" id="yes" class="paid btn btn-success btn-sm">Đã TT</button>
                          @endif
                        </td>  
                        <td>{{\Carbon\Carbon::parse($b->created_at)->format('d/m/Y')}}</td>         
                        <td>
                            <button type="button" value="{{ $b->id }}" data-room_id="{{ $b->room_id }}" data-name="{{ $b->room->name }}" data-from="{{ $b->from }}" data-to="{{ $b->to }}" data-room_price="{{$b->room_price}}" class="edit_bill btn btn-info btn-sm">
                                <i class="fas fa-edit"></i>
                                </i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            
          </div>
        </div>
        <!-- /.card -->

      </div>




    </section>
    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>
  <!-- /.content-wrapper -->

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
<script type="text/javascript">
	

    function formatNumber (num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
    }
    var datatable = $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    var Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 3000
    });
    $(document).on('click', '.paid', function(e) {
        e.preventDefault();
        // $('#example1').DataTable().clear().draw();
        var id = $(this).val();
        var url = "{{ route('paid') }}";
        if($(this).attr('id')=='not'){
          $(this).removeClass('btn-warning')
          $(this).addClass('btn-success')
          $(this).text('Đã TT')
          $(this).attr("id","yes");
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax({
              type: "POST",
              url: url,
              data: {
                id: id,
                paid:1,
              },
              dataType: "json",
              success: function(response) {
                  if (response.status == 404) {
                    $(document).Toasts('create', {
                      class: 'bg-danger',
                      autohide: true,
                      delay: 2000,
                      title: 'Thông báo',
                      body: 'Có lỗi xảy ra, vui lòng kiểm tra lại'
                    })
                  } else {
                      $(document).Toasts('create', {
                          class: 'bg-info',
                          autohide: true,
                          delay: 2000,
                          title: 'Thông báo',
                          body: 'Cập nhật hóa đơn thành công.'
                        })
                  }
              }
          });
        }
        else{
          $(this).removeClass('btn-success')
          $(this).addClass('btn-warning')
          $(this).text('Chưa TT')
          $(this).attr("id","not");
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax({
              type: "POST",
              url: url,
              data: {
                id: id,
                paid:0,
              },
              dataType: "json",
              success: function(response) {
                  if (response.status == 404) {
                    $(document).Toasts('create', {
                      class: 'bg-danger',
                      autohide: true,
                      delay: 2000,
                      title: 'Thông báo',
                      body: 'Có lỗi xảy ra, vui lòng kiểm tra lại.'
                    })
                  } else {
                    $(document).Toasts('create', {
                        class: 'bg-info',
                        autohide: true,
                        delay: 2000,
                        title: 'Thông báo',
                        body: 'Cập nhật hóa đơn thành công.'
                      })
                  }
              }
          });
          
        }
       
        
    });
  
    $(document).on('click', '.view_service', function(e) {
        e.preventDefault();
        var id = $(this).val();
        var url = "{{ route('billdetail', ":id") }}";
        var view_service_room = $(this).data('name');
        var view_service_date = $(this).data('date');
        url = url.replace(':id', id);
        $('#view_service').modal('show');
        $('.view_service_room').text(view_service_room);
        $('.view_service_date').text(view_service_date);
        $.ajax({
            type: "GET",
            url: url,
            success: function(response) {
                if (response.status == 404) {
                  console.log("lỗi");
                    // Toast.fire({
                    //     icon: 'error',
                    //     title: 'Không tìm thấy dữ liệu, truy vấn không hợp lệ.'
                    // })
                } else {
                  var count = $(response.detail).length;
                  $(".view_service_detail").remove();
                  $(".total-detail").remove();
                  for(i=0;i<count;i++){
                    $("#billdetail").find('tbody')
                        .append($('<tr>').attr('class', 'view_service_detail')
                            .append($('<td>')
                                .append(response.detail[i].service_name)
                            )
                            .append($('<td>')
                                .append(formatNumber(response.detail[i].price))
                            )
                            .append($('<td>')
                                .append(response.detail[i].quantity)
                            )
                            .append($('<td>')
                                .append(response.detail[i].unit)
                            )
                            .append($('<td>').attr('class', 'total_service_detail')
                                .append(formatNumber(response.detail[i].price*response.detail[i].quantity))
                            )
                        );
                  }
                  var sum = 0;
                  $('.total_service_detail').each(function(){
                      sum += parseFloat($(this).text()); 
                  });
                  $("#billdetail").find('tbody').append(
                      $('<tr>').attr('class', 'total-detail')
                        .append($('<th>').attr('colspan', '4').attr('class', 'text-right')
                          .append("Tổng phí dịch vụ")
                        )
                        .append($('<th>').attr('class', 'text-danger')
                          .append(formatNumber(sum*1000))
                        )
                    );
                }
            }
        });
    });
    
    $(document).on('click', '.edit_bill', function(e) {
        e.preventDefault();
        var id = $(this).val();
        $('.updatebill').val(id);
        var room_name = $(this).data('name');
        var room_id = $(this).data('room_id');
        var from = $(this).data('from');
        var to = $(this).data('to');
        var room_price = $(this).data('room_price');
        $('.name').val(room_name);
        $('.name').data('id',room_id);
        $('.edit_from').val(from);
        $('.edit_to').val(to);
        $('.edit_room_price').val(room_price);
        $('#modal_edit_bill').modal('show');
        var url = "{{ route('billdetail', ":id") }}";
        url = url.replace(':id', id);
        $.ajax({
            type: "GET",
            url: url,
            success: function(response) {
                if (response.status == 404) {
                  console.log("lỗi");
                    // Toast.fire({
                    //     icon: 'error',
                    //     title: 'Không tìm thấy dữ liệu, truy vấn không hợp lệ.'
                    // })
                } else {
                  var count = $(response.detail).length;
                  $(".service_edit").remove();
                  for(i=0;i<count;i++){
                    $("#modal_edit_bill").find('tbody')
                        .append($('<tr>')
                          .attr('class', 'service_edit')
                          .attr('data-edit_id', response.detail[i].id)
                          .attr('data-edit_price', response.detail[i].price)
                          .attr('data-edit_qty', response.detail[i].quantity)
                            .append($('<td>')
                                .append(response.detail[i].service_name)
                            )
                            .append($('<td>')
                                .append($('<input>')
                                  .attr('class', 'form-control')
                                  .attr('value', response.detail[i].price)
                                  )
                            )
                            .append($('<td>')
                                .append($('<input>')
                                  .attr('class', 'form-control')
                                  .attr('type', 'number')
                                  .attr('value', response.detail[i].quantity)
                                  )
                            )
                            .append($('<td>')
                                .append($('<span>')
                                  .attr('class', 'badge bg-danger')
                                  .append(response.detail[i].unit)
                                  )
                                
                            )
                        );
                  }

                }
            }
        });


    });

    $(document).on('click', '.updatebill', function(e) {
      e.preventDefault();
      var id = $(this).val();
      // var serviceData = $('.service_edit_info').map(function() {
      //   return {
      //     billdetail_id: $(this).data('edit_id'),
      //     price: $(this).data('edit_price'),
      //     quantity: $(this).data('edit_qty'),
      //     total: $(this).data('edit_qty')*$(this).data('edit_price'),
      //   }
      // }).get();
      var data = {
          'room_id': $('.name').data('id'),
          'from': $('.edit_from').val(),
          'to': $('.edit_to').val(),
          'room_price': $('.edit_room_price').val() * $('.qty_room').val(),
          serviceData
      }
      console.log(serviceData);
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      // $.ajax({
      //     type: "PUT",
      //     url: "hoadon/" + id,
      //     data: data,
      //     dataType: "json",
      //     success: function(response) {
      //         if (response.status == 400) {
      //           Toast.fire({
      //               icon: 'warning',
      //               title: ' Vui lòng kiểm tra lại thông tin.'
      //           })
      //           // $('#saveform_errList').html("");
      //           // $('#saveform_errList').addClass('alert alert-danger');
      //           // $.each(response.errors, function(key, err_value) {
      //           //     $('#saveform_errList').append('<li>' + err_value + '</li>');
      //           // });
      //         } else {
      //           console.log(response.data);
      //             // Toast.fire({
      //             //     icon: 'success',
      //             //     title: 'Đã thêm hóa đơn thành công.'
      //             // })
      //             // $('.updatebill').addClass('disabled');
      //             //  setTimeout(
      //             //    function() 
      //             //    {   
      //             //      $('#edit_modal').modal('hide');
      //             //      location.reload();
      //             //    }, 1500);
      //         }
      //     }
      // });

    });


    // $('#modal_edit_bill').on('hidden.bs.modal', function (e) {
    //   $(this)
    //     .find("input,textarea,select")
    //        .val('')
    //        .end()
    //     .find("input[type=checkbox], input[type=radio]")
    //        .prop("checked", "")
    //        .end();
    // })
    $("select").on("change", function() {
      var room_price = this.value;
      $("#room_price").val(room_price);
    });
    //Tính hóa đơn
    $("table").on("change", "input", function() {
      var row = $(this).closest("tr");
      var id = row.attr("id");
      var qty = parseFloat(row.find(".qty").val());
      var price = parseFloat(row.find(".price").val());
      var discount = parseFloat(row.find(".discount").val());
      var other_price = parseFloat(row.find(".other_price").val());
      if(qty<0 || price<0 || isNaN(price)){
        row.find(".total").val("Vui lòng nhập lại");
      }
      else{
        var total = qty * price;
        row.find("#total_room_price").val(isNaN(total) ? "" : total);
        row.find(".total").val(isNaN(total) ? "" : total);
        row.find('.total').data('id',id).data('price',price).data('quantity',qty)
        // var a = row.find('.total').data('id')
        // console.log(a);
      }
      var room_price = parseFloat($("#total_room_price").val());
      var service_total = room_price;
      
      $('.total').each(function(i, obj) {
          service_total += parseFloat(obj.value);
          $(".service_total").val(isNaN(service_total) ? "" : service_total);      
      });
      console.log(service_total);
      
      // console.log(service_total+room_price)
      $(".all_total").val(isNaN(service_total) ? "" : service_total);
    });

    $(document).on('click', '.save_bill', function(e) {
        e.preventDefault();  
        var serviceData = $('.total').map(function() {
          return {
            service_id: $(this).data('id'),
            service_name: $(this).data('name'),
            price: $(this).data('price'),
            quantity: $(this).data('quantity'),
          }
        }).get();
        var data = {
            'room_id': $('.room').children("option:selected").attr('id'),
            'from': $('.from').val(),
            'to': $('.to').val(),
            'room_price': $('#total_room_price').val(),
            'total_price': $('.all_total').val(),
            serviceData
        }
        // console.log(data);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "{{ route('hoadon.store') }}",
            data: data,
            dataType: "json",
            success: function(response) {
                if (response.status == 400) {
                  $(document).Toasts('create', {
                      class: 'bg-warning',
                      autohide: true,
                      delay: 3000,
                      title: 'Thông báo',
                      position: 'topLeft',
                      body: 'Vui lòng kiểm tra lại thông tin.'
                    })
                  // Toast.fire({
                  //     icon: 'warning',
                  //     title: ' Vui lòng kiểm tra lại thông tin.'
                  // })
                  $('#saveform_errList').html("");
                  $('#saveform_errList').addClass('alert alert-danger');
                  $.each(response.errors, function(key, err_value) {
                      $('#saveform_errList').append('<li>' + err_value + '</li>');
                  });
                } else {
                    Toast.fire({
                        icon: 'success',
                        title: 'Đã thêm hóa đơn thành công.'
                    })
                    $('.save_bill').addClass('disabled');
                     setTimeout(
                       function() 
                       {   
                         $('#edit_modal').modal('hide');
                         location.reload();
                       }, 1500);
                }
            }
        });
    });



</script>
@endsection