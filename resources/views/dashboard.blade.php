@extends('layouts.master',['title' => 'Tổng quan'])
@section('stylesheets')
@parent
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tổng quan</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Tổng thu tiền phòng</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">{{number_format($room_venu)}}đ</span>
                    <!-- <span>Visitors Over Time</span> -->
                  </p>
                <!--   <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last week</span>
                  </p> -->
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  
                </div>


              </div>
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Hóa đơn chưa thanh toán</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    Chi tiết
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-hover table-valign-middle">
                  <thead>
                  <tr>
                    <th>Phòng</th>
                    <th>Thành tiền</th>
                    <th>Trạng thái</th>
                    <th>Liên hệ</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($Bills as $b)
                  <tr>
                    <th>
                      {{$b->room->name}}
                    </th>
                    <td>{{number_format($b->total_price)}}</td>
                    <td>
                      Chậm {{ \Carbon\Carbon::parse($b->created_at)->diffInDays()}} ngày
                    </td>
                    
                    <td>
                      <a href="#" class="btn btn-primary btn-sm">
                        <i class="fas fa-envelope"></i>
                      </a>
                      <a href="tel:555-555-5555" class="btn btn-primary btn-sm" alt="23123">
                        <i class="fas fa-phone"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Tổng thu dịch vụ</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">{{number_format($service_venu)}}đ</span>
                    <!-- <span>Sales Over Time</span> -->
                  </p>
                  <!-- <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 33.1%
                    </span>
                    <span class="text-muted">Since last month</span>
                  </p> -->
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  
                </div>


              </div>
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection

@section('scripts')
@parent
<!-- OPTIONAL SCRIPTS -->

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script>
@endsection