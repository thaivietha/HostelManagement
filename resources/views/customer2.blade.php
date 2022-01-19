@extends('layouts.master',['title' => 'Khách thuê'])

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
.modal-title{
  color: #17a2b8;
}
.export{
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
          <h1>Quản lý khách thuê</h1>
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

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-xl">
              <i class="fas fa-plus"></i>&nbsp; Thêm mới
              </button>
           
            </div>

            <!-- //modal add -->
            <div class="modal fade" id="modal-xl">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-plus"></i>Thêm mới khách thuê</h4>
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
                        <label for="validationCustom01" class="form-label">Họ và tên<span class="bb">*</span></label>
                        <div class="input-group">
                          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-user"></i></span>
                          <input type="text" name="name" class="name form-control" id="" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label for="validationCustom02" class="form-label">Số điện thoại<span class="bb">*</span></label>
                        <div class="input-group">
                          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-phone"></i></span>
                          <input type="text" name="phone" class="phone form-control" id="validationCustom02" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label for="validationCustomUsername" class="form-label">Số cmnd/cccd<span class="bb">*</span></label>
                        <div class="input-group">
                          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-address-card"></i></span>
                          <input type="text" name="cmnd" class="cmnd form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label for="validationCustom03" class="form-label">Ngày sinh<span class="bb">*</span></label>
                        <div class="input-group">
                          <span class="input-group-text" id="inputGroupPrepend"><i class="far fa-calendar-alt"></i>
                          </span>
                          <input type="date" class="birthday form-control" name="birthday" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label">Quê quán<span class="bb">*</span></label>
                        <div class="input-group">
                          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-location-arrow"></i>
                          </span>
                          <input type="text" class="address form-control" name="address" required>
                        </div>

                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Mã/Số phòng<span class="bb">*</span></label>
                        <div class="input-group">
                          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-door-open"></i>
                          </span>
                          <select class="room form-control" name="room" required>
                            @foreach($Room as $r)
                            <option value="{{ $r->id }}">{{ $r->name }}</option>
                            @endforeach
                          </select>

                        </div>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label">Ngày bắt đầu thuê<span class="bb">*</span></label>
                        <div class="input-group">
                          <span class="input-group-text" id="inputGroupPrepend"><i class="far fa-calendar-alt"></i>
                          </span>
                          <input type="date" class="rent_at form-control" name="rent_at" required>

                        </div>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label">Địa chỉ email</label>
                        <div class="input-group">
                          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-envelope"></i>
                          </span>
                          <input type="text" class="email form-control" name="email">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Ảnh giấy tờ tùy thân</label>
                        <div class="input-group has-validation">
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="modal-footer ">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary add_customer"><i class="fas fa-save"></i>&nbsp;Lưu
                    </button>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- modal edit -->
            <div class="modal fade" id="edit_modal">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-pencil-alt"></i>Chỉnh sửa thông tin</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="col-md-4">
                      <ul id="editform_errList"></ul>
                      <input type="hidden" id="edit_id" value="id">
                      <input type="hidden" id="old_room" value="old_room">
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <label class="form-label">Họ và tên<span class="bb">*</span></label>
                        <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                          <input type="text" name="name" id="edit_name" class="name form-control" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label class="form-label">Số điện thoại<span class="bb">*</span></label>
                        <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                          <input type="text" name="phone" id="edit_phone" class="phone form-control" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label class="form-label">Số cmnd/cccd<span class="bb">*</span></label>
                        <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                          <input type="text" name="cmnd" id="edit_cmnd" class="cmnd form-control" aria-describedby="inputGroupPrepend" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label">Ngày sinh<span class="bb">*</span></label>
                        <div class="input-group">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i>
                          </span>
                          <input type="date" class="birthday form-control" id="edit_birthday" name="birthday" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label">Quê quán<span class="bb">*</span></label>
                        <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-location-arrow"></i>
                          </span>
                          <input type="text" class="address form-control" id="edit_address" name="address" required>
                        </div>

                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Mã/Số phòng<span class="bb">*</span></label>
                        <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-door-open"></i>
                          </span>
                          <select class="room form-control" name="room" id="edit_room" required>
                            <option id="now_room" value="" selected>Không thay đổi</option>
                            @foreach($Room as $r)
                            <option value="{{ $r->id }}">{{ $r->name }}</option>
                            @endforeach
                          </select>
                          <!-- <input type="text" class="room form-control" id="edit_room" name="room" required> -->
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label">Ngày bắt đầu thuê<span class="bb">*</span></label>
                        <div class="input-group has-validation">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i>
                          </span>
                          <input type="date" class="rent_at form-control" id="edit_rent_at" name="rent_at" required>

                        </div>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label">Địa chỉ email</label>
                        <div class="input-group ">
                          <span class="input-group-text"><i class="fas fa-envelope"></i>
                          </span>
                          <input type="text" class="email form-control" id="edit_email" name="email">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Ảnh giấy tờ tùy thân</label>
                        <div class="input-group ">

                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="modal-footer ">
                    <button type="button" class="btn btn-danger delete" >Xóa người này</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type="" class="btn btn-primary edit_save"><i class="fas fa-save"></i>&nbsp;Lưu</button>
                  </div>

                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- modal confirm -->
            <div class="modal fade" id="confirm_modal">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-info"></i>&nbsp;Bạn có chắc chắn muốn xóa?</h4>
                    <input type="hidden" id="delete_id" value="">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-footer ">
                    <button type="button" value="" class="btn btn-danger delete_confirm" >Xác nhận</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                  </div>

                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- modal edit -->
            <div class="modal fade" id="contract_modal">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-file-contract"></i>&nbsp;Xem hợp đồng</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                   <div class="contract_content">
                     <p style="text-align: center;"><strong>CỘNG HÒA HỘI CHỦ NGHĨA VIỆT NAM </strong></p>
                     <p style="text-align: center;"><strong>Độc Lập-Tự Do-Hạnh Phúc</strong></p>
                     <p style="text-align: center;"><strong>&mdash;oOo&mdash;</strong></p>
                     <h2 style="text-align: center;"><strong>HỢP ĐỒNG THUÊ PHÒNG TRỌ</strong></h2>
                     <p><strong>BÊN CHO THUÊ</strong></p>
                     <p><span style="font-weight: 400;">Họ và tên: </span></p>
                     <p><span style="font-weight: 400;">Năm sinh: </span></p>
                     <p><span style="font-weight: 400;">CMND:  Ngày cấp Nơi cấp: </span></p>
                     <p><span style="font-weight: 400;">Thường Tr&uacute;: </span></p>
                     <p><strong>BÊN THUÊ NHÀ</strong></p>
                     <p><span style="font-weight: 400;">Họ và tên:</span><strong class="name"></strong></p>
                     <p><span style="font-weight: 400;">Năm sinh: </span><strong class="birthday"></strong></p>
                     <p><span style="font-weight: 400;">CMND:</span><strong class="cmnd"></strong></p>
                     <p><span style="font-weight: 400;">Thường Trú: </span> <strong class="address"></strong></p>
                     <p><span style="font-weight: 400;">Hai b&ecirc;n c&ugrave;ng thỏa thuận v&agrave; đồng &yacute; với nội dung sau:</span></p>
                     <p><strong>Điều 1:</strong></p>
                     <p><span style="font-weight: 400;">B&ecirc;n A đồng &yacute; cho b&ecirc;n B thu&ecirc; một ph&ograve;ng thuộc nh&agrave; số </span></p>
                     <p><span style="font-weight: 400;">Thời hạn thu&ecirc; nh&agrave; l&agrave; &hellip;. th&aacute;ng kể từ ng&agrave;y &hellip;&hellip;.</span></p>
                     <p><strong>Điều 2:</strong></p>
                     <p><span style="font-weight: 400;">G&iacute;a tiền thu&ecirc; nh&agrave; l&agrave; &hellip;&hellip;&hellip;&hellip;&hellip;.. đồng/th&aacute;ng (Bằng chữ:&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;)</span></p>
                     <p><span style="font-weight: 400;">Tiền thu&ecirc; nh&agrave; b&ecirc;n B thanh to&aacute;n cho b&ecirc;n A từ ng&agrave;y &hellip;.. T&acirc;y h&agrave;ng th&aacute;ng.</span></p>
                     <p><span style="font-weight: 400;">B&ecirc;n B đặt tiền thế ch&acirc;n trước &hellip;&hellip;&hellip;&hellip;&hellip;&hellip; đồng (Bằng chữ: &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;) cho b&ecirc;n A. Tiền thế ch&acirc;n sẽ được trả lại đầy đủ cho b&ecirc;n thu&ecirc; khi hết hợp đồng thu&ecirc; căn hộ v&agrave; thanh to&aacute;n đầy đủ tiền điện, nước , ph&iacute; dịch vụ v&agrave; c&aacute;c khoản kh&aacute;c li&ecirc;n quan.</span></p>
                     <p><span style="font-weight: 400;">B&ecirc;n B ngưng hợp đồng trước thời hạn th&igrave; phải chịu mất tiền thế ch&acirc;n.</span></p>
                     <p><span style="font-weight: 400;">B&ecirc;n A ngưng hợp đồng (lấy lại nh&agrave;) trước thời hạn th&igrave; bồi thường gấp đ&ocirc;i số tiền b&ecirc;n B đ&atilde; thế ch&acirc;n.</span></p>
                     <p><strong>Điều 3: Tr&aacute;ch nhiệm b&ecirc;n A.</strong></p>
                     <p><span style="font-weight: 400;">Giao nh&agrave;, trang thiết bị trong nh&agrave; cho b&ecirc;n B đ&uacute;ng ng&agrave;y k&yacute; hợp đồng.</span></p>
                     <p><span style="font-weight: 400;">Hướng dẫn b&ecirc;n B chấp h&agrave;nh đ&uacute;ng c&aacute;c quy định của địa phương, ho&agrave;n tất mọi thủ tục giấy tờ đăng k&yacute; tạm tr&uacute; cho b&ecirc;n B.</span></p>
                     <p><strong>Điều 4: Tr&aacute;ch nhiệm b&ecirc;n B.</strong></p>
                     <p><span style="font-weight: 400;">Trả tiền thu&ecirc; nh&agrave; h&agrave;ng th&aacute;ng theo hợp đồng.</span></p>
                     <p><span style="font-weight: 400;">Sử dụng đ&uacute;ng mục đ&iacute;ch thu&ecirc; nh&agrave;, khi cần sữa chữa, cải tạo theo y&ecirc;u cầu sử dụng ri&ecirc;ng phải được sự đồng &yacute; của b&ecirc;n A.</span></p>
                     <p><span style="font-weight: 400;">Đồ đạt trang thiết bị trong nh&agrave; phải c&oacute; tr&aacute;ch nhiệm bảo quản cẩn thận kh&ocirc;ng l&agrave;m hư hỏng mất m&aacute;t.</span></p>
                     <p><strong>Điều 5: Điều khoản chung.</strong></p>
                     <p><span style="font-weight: 400;">B&ecirc;n A v&agrave; b&ecirc;n B thực hiện đ&uacute;ng c&aacute;c điều khoản ghi trong hợp đồng.</span></p>
                     <p><span style="font-weight: 400;">Trường hợp c&oacute; tranh chấp hoặc một b&ecirc;n vi phạm hợp đồng th&igrave; hai b&ecirc;n c&ugrave;ng nhau b&agrave;n bạc giải quyết, nếu kh&ocirc;ng giải quyết được th&igrave; y&ecirc;u cầu cơ quan c&oacute; thẩm quyền giải quyết.</span></p>
                     <p><span style="font-weight: 400;">Hợp đồng được lập th&agrave;nh 02 bản c&oacute; gi&aacute; trị ngang nhau, mỗi b&ecirc;n giữ 01 bản</span></p>
                     <table style="width: 952px; height: 83px; padding-left: 60px;">
                      <tbody>
                        <tr style="height: 35.75px; padding-left: 60px;">
                          <td style="width: 503.938px; height: 35.75px; padding-left: 60px;">&nbsp;</td>
                          <td style="width: 428.062px; height: 35.75px; padding-left: 60px;">
                            <p style="text-align: justify; padding-left: 60px;"><em><span style="font-weight: 400;">
                            Ngày {{ now()->day }} ,tháng {{ now()->month }} ,năm {{ now()->year }}</span></em></p>
                          </td>
                        </tr>
                        <tr style="height: 35px; padding-left: 60px;">
                          <td style="width: 503.938px; height: 35px; padding-left: 60px;">
                            <p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; B&Ecirc;N A</strong></p>
                          </td>
                          <td style="width: 428.062px; height: 35px; padding-left: 60px;">
                            <p><strong>B&Ecirc;N B</strong></p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <p style="text-align: center; padding-left: 60px;"><br /><br /></p>
                  </div>

                </div>

                <div class="modal-footer ">
                  <button type="button" class="btn btn-success" >Tải hợp đồng</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>

                </div>

              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Phòng</th>
                  <th>Tên</th>
                  <th>SDT</th>
                  <th>Số cmnd/cccd</th>
                  <th>Ngày sinh</th>
                  <th>Quê quán</th>
                  <th>Ngày thuê</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($Customer as $c)
                <tr>
                  <th>{{!empty($c->room) ? $c->room->name:''}}</th>
                  <td>{{ $c->name }}</td>
                  <td>{{ $c->phone }}</td>
                  <td>{{ $c->cmnd }}</td>
                  <td>{{ \Carbon\Carbon::parse($c->birthday)->format('d/m/Y')}}</td>
                  <td>{{ $c->address }}</td>
                  <td>{{ \Carbon\Carbon::parse($c->rent_at)->format('d/m/Y')}}</td>
                  <td>
                    <button type="button" value="{{ $c->id }}" class="edit_customer btn btn-info btn-sm">
                      <i class="fas fa-edit"></i>
                      </i>
                    </button>
                    <!-- <button value="{{ $c->id }}" class="view_contract btn btn-success btn-sm">
                      <i class="fas fa-print"></i>
                    </i>Hợp đồng</button> -->
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>Phòng</th>
                  <th>Tên</th>
                  <th>SDT</th>
                  <th>Số cmnd/cccd</th>
                  <th>Ngày sinh</th>
                  <th>Quê quán</th>
                  <th>Ngày thuê</th>
                  <th></th>
                </tr>
              </tfoot>
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

  $(function() {
    $("#example1").DataTable({

      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "pageLength": 10,
      "buttons": [{
        extend: 'excel',
        text: '<i class="fas fa-file-excel"></i>&nbsp;Xuất excel',
        className: 'export',
        title:'Thông tin khách thuê',
        filename: 'Export excel',
        exportOptions: {
          columns: 'th:not(:last-child)'
        }
      }, {
        extend: 'print',
        text: '<i class="fas fa-print"></i>&nbsp;In',
        className: 'export',
        title:'Thông tin khách thuê',
        filename: 'Thông tin khách thuê',
        exportOptions: {
          columns: 'th:not(:last-child)'
        }
      }, {
        extend: 'pdf',
        text: '<i class="fas fa-file-pdf"></i>&nbsp;Xuất pdf',
        className: 'export',
        title:'Thông tin khách thuê',
        filename: 'Export excel',
        exportOptions: {
          columns: 'th:not(:last-child)'
        }
      }]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


  });



  $(document).ready(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 3000
    });

    

    $(document).on('click', '.add_customer', function(e) {
      e.preventDefault();

      var data = {
        'name': $('.name').val(),
        'phone': $('.phone').val(),
        'cmnd': $('.cmnd').val(),
        'birthday': $('.birthday').val(),
        'address': $('.address').val(),
        'room': $('.room').children("option:selected").val(),
        'rent_at': $('.rent_at').val(),
        'email': $('.email').val(),
      }
      if(data.name==''||data.phone==''||data.cmnd==''||data.birthday==''
        ||data.address==''||data.room==''||data.rent_at==''){
        Toast.fire({
          icon: 'warning',
          title: 'Vui lòng nhập dữ liệu hợp lệ'
        })

    }
    else{
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
        type: "POST",
        url: "{{ route('quanlykhach.store') }}",
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
            $('#modal-xl').modal('hide');
            $('#modal-xl').find('input').val("");
            Toast.fire({
              icon: 'success',
              title: 'Thêm thành công.'
            })
          }
        }


      });
    }




  });

    $(document).on('click', '.edit_customer', function(e) {
      e.preventDefault();
      var id = $(this).val();
      $('#edit_modal').modal('show');
      $.ajax({
        type: "GET",
        url: "quanlykhach/"+id,
        success: function(response) {
          if (response.status == 404) {

            Toast.fire({
              icon: 'error',
              title: 'Không tìm thấy dữ liệu, truy vấn không hợp lệ.'
            })
          } else {
            $('#edit_id').val(response.customer.id);
            $('#old_room').val(response.customer.room_id);
            $('#edit_name').val(response.customer.name);
            $('#edit_phone').val(response.customer.phone);
            $('#edit_cmnd').val(response.customer.cmnd);
            $('#edit_birthday').val(response.customer.birthday);
            $('#edit_address').val(response.customer.address);
            $('#now_room').val(response.customer.room_id);
            $('#edit_rent_at').val(response.customer.rent_at);
            $('#edit_email').val(response.customer.email);
          }
        }
      });
    });

    $(document).on('click','.edit_save', function (e) {
      e.preventDefault();
      var id = $('#edit_id').val();
      

      var data = {
        'name': $('#edit_name').val(),
        'phone': $('#edit_phone').val(),
        'cmnd': $('#edit_cmnd').val(),
        'birthday': $('#edit_birthday').val(),
        'address': $('#edit_address').val(),
        'old_room': $('#old_room').val(),
        'room': $('#edit_room').val(),
        'rent_at': $('#edit_rent_at').val(),
        'email': $('#edit_email').val(),
      }
      if(data.name==''||data.phone==''||data.cmnd==''||data.birthday==''
        ||data.address==''||data.room==''||data.rent_at==''){
        Toast.fire({
          icon: 'warning',
          title: 'Vui lòng nhập dữ liệu hợp lệ.'
        })

    }
    else{
     $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
     $.ajax({
      type: "PUT",
      url: "quanlykhach/"+id,
      data: data,
      dataType: "json",
      success: function (response) {
        if(response.status==200){
          Toast.fire({
            icon: 'success',
            title: 'Cập nhật thành công'
          })

          $('#edit_modal').modal('hide');
        }
        else if(response.status==400){
          console.log(response);
          Toast.fire({
            icon: 'error',
            title: 'Cập nhật không thành công,kiểm tra lại dữ liệu'
          })
          $('#editform_errList').html("");
          $('#editform_errList').addClass('alert alert-danger');
          $.each(response.errors, function(key, err_value) {
            $('#editform_errList').append('<li>' + err_value + '</li>');
          });
        }
        else {
          console.log(response);
          Toast.fire({
            icon: 'error',
            title: 'Có lỗi xảy ra'
          })
        }
      }
    });
   }      
 });

    $(document).on('click', '.view_contract', function(e) {
      e.preventDefault();
      var id = $(this).val();
      $('#contract_modal').modal('show');
       $.ajax({
        type: "GET",
        url: "quanlykhach/"+id,
        success: function(response) {
          if (response.status == 404) {

            Toast.fire({
              icon: 'error',
              title: 'Không tìm thấy dữ liệu, truy vấn không hợp lệ.'
            })
          } else { 
            $('.name').text(response.customer.name);
            // $('#edit_phone').val(response.customer.phone);
            $('.cmnd').text(response.customer.cmnd);
            $('.birthday').text(response.customer.birthday);
            $('.address').text(response.customer.address);
          }
        }
      });
    });

    $(document).on('click', '.delete', function(e) {
      e.preventDefault();
      var delete_id = $('#edit_id').val();
      $('#confirm_modal').modal('show');
      $('.delete_confirm').val(delete_id);
    });
    $(document).on('click', '.delete_confirm', function(e) {
      e.preventDefault();
      var id = $(this).val();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type: "DELETE",
        url: "quanlykhach/"+id,
        data: id,
        dataType: "json",

        success: function (response) {
          if(response.status==200){
            Toast.fire({
              icon: 'success',
              title: 'Đã xóa thành công'
            })
            $('#delete_id').remove();
          }
          else {
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