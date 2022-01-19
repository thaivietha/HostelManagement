@extends('layouts.app')
@section('stylesheets')
@parent
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
<style type="text/css">
        body{
            min-height: 100vh;
        }
        #total_price{
            color: red;
        }
        .container{
            max-width: 900px !important;;
        }
        /*.ttcn{
            border-bottom: 1px solid #ccc;
        }*/
        .hd{
            border-bottom: 3px dashed #eee;
        }
        .timkiem{

            border-top-right-radius: 20px;
            border-top-left-radius: 20px;
        }
        .banner{
            background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7) ),url("{{ asset('img/background.jpg') }}");
        }
        .navbar{
            box-shadow: 0 0.5em 1em -0.125em rgb(10 10 10 / 10%), 0 0 0 1px rgb(10 10 10 / 2%);
        }
        .tabs li.is-active a {
            
            color: #00d1b2;
        }
       /* .hoadon{
            border-style: hidden;
            border-left: 3px dashed #eee;
            position: relative;
        }*/
</style>
@endsection

@section('content')

<section class="banner hero is-medium">
  <div class="hero-body"><b></b>
    <h1 class="title is-1 has-text-primary">
      Tra cứu <br> hóa đơn
    </h1>
    <p class="subtitle is-4 has-text-light">
      Xem chi tiết hóa đơn, lịch sử thanh toán và số liệu thống kê.
    </p>
  </div>
</section>


<div class="container">
    <div class="columns is-centered">
        <div class="timkiem box column is-7">
            <div class="columns ">
                <div class="column is-10">
                    <div id="input" class="control is-medium has-icons-left">
                        <input id="cmnd" class="cmnd input is-medium is-rounded is-primary" type="text" placeholder="Nhập số CMND hoặc số điện thoại">
                        <span class="icon is-medium is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>
                <div class="column is-2">
                     <button class="search button is-rounded is-medium is-primary"><i class="fas fa-search"></i></button>
                </div>
            </div>
            <div class="columns">
                <progress style="display: none;" class="progress is-small is-primary" max="100"></progress>
            </div>
            
        </div>
    </div>
<!--     <div class="modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Chào thầy cô</p>
          <button class="button close-modal" aria-label="close">
             Đóng
          </button>
        </header>
        <section class="modal-card-body">
          Để tiện sử dụng, sau khi import database, thầy cô hãy đăng nhập bằng tài khoản đã nhập sẵn dữ liệu <br>
          Tài khoản:<b>tvha.20it10@vku.udn.vn</b><br>
          Mật khẩu:<b>h00000000</b>
   
        </section>
      </div>
    </div> -->
    <div class="modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Dịch vụ phòng
            <a class="view_service_room"></a> 
            <a class="view_service_from"></a>-<a class="view_service_to"></a>
          </p>
          <button class="button close-modal" aria-label="close">
             Đóng
          </button>
        </header>
        <section class="modal-card-body">
            <table id="billdetail" class="table is-hoverable is-striped is-fullwidth">
                <thead>
                    <th>Dịch vụ</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Đơn vị</th>
                    <th>Thành tiền</th> 
                </thead>
                <tbody>                   

                </tbody>
            </table>
    
        </section>
      </div>
    </div>
    <div class="card" id="content" hidden="true">
        <header class="card-header">
            <div class="tabs is-centered is-boxed is-medium">
              <ul>
                <li class="view_bill is-active">
                  <a>
                    <span class="icon is-small"><i class="fas fa-money-bill-alt" aria-hidden="true"></i></span>
                    <span>Hóa đơn</span>
                  </a>
                </li>
                <li class="view_history">
                  <a >
                    <span class="icon is-small"><i class="fas fa-history"></i></span>
                    <span>Tất cả hóa đơn</span>
                  </a>
                </li>
                <li class="view_ana">
                  <a>
                    <span class="icon is-small"><i class="nav-icon fas fa-tachometer-alt"></i></span>
                    <span>Thống kê</span>
                  </a>
                </li>
              </ul>
            </div>
        </header>
        <div class="card-content bill">
            <div class="columns">
                <div class="column is-6">
                    <h4 class="title is-4">
                        Thông tin cá nhân
                    </h4>                  
                    <hr>    
                    <div class="ttcn columns is-mobile">
                        <div class="column is-6">
                            <p class="">Họ và tên</p>
                        </div>
                        <div class="column is-6">
                            <p class="label" id="name"></p>

                        </div>
                    </div>
                    <div class="ttcn columns is-mobile">
                        <div class="column is-6">
                            <p class="">Phòng:</p>
                        </div>
                        <div class="column is-6">
                            <p class="label" id="room"></p>

                        </div>
                    </div>
                     <div class="ttcn columns is-mobile">
                        <div class="column is-6">
                            <p class="">Số điện thoại:</p>
                        </div>
                        <div class="column is-6">
                            <p class="label" id="sdt"></p>

                        </div>
                    </div>
                    <div class="ttcn columns is-mobile">
                        <div class="column is-6">
                            <p class="">Ngày sinh:</p>
                        </div>
                        <div class="column is-6">
                            <p class="label" id="birthday"></p>

                        </div>
                    </div>

                </div>
                <div class="hoadon column is-6">
                    <h4 class="title is-4">
                        Hóa đơn mới nhất
                    </h4>
                    <hr>
                    <div class="hd columns is-mobile">
                        <div class="column is-6">
                            <p class="">Từ ngày:</p>
                        </div>
                        <div class="column is-6">
                            <p class="label" id="from"></p>

                        </div>
                    </div>
                    <div class="hd columns is-mobile">
                        <div class="column is-6">
                            <p class="">Đến ngày:</p>
                        </div>
                        <div class="column is-6">
                            <p class="label" id="to"></p>

                        </div>
                    </div>
                     <div class="hd columns is-mobile">
                        <div class="column is-6">
                            <p class="">Tiền phòng:</p>
                        </div>
                        <div class="column is-6">
                            <p class="label" id="room_price"></p>
                        </div>
                    </div>
                    <div class="hd columns is-mobile">
                        <div class="column is-6">
                            <p class="">Dịch vụ:</p>
                        </div>
                        <div class="column is-6">
                            <button value="" data-name="" data-from="" data-to="" class="button is-primary is-small view_service">   
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="columns is-mobile">
                        <div class="column is-6">
                            <p>Thành tiền:</p>
                        </div>
                        <div class="column is-6">
                            <p class="label" id="total_price"></p>
                        </div>
                    </div>
                    <div class="columns is-mobile is-centered">
                        <button class="button is-success thanhtoan">Thanh toán ngay</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-content history" hidden="true">     
            <h4 class="title is-4">
                Tất cả hóa đơn
            </h4>   
            <table id="allbill" class="table is-hoverable is-striped is-fullwidth">
                <thead>
                    <th>Từ</th>
                    <th>Đến</th>
                    <th>Tiền phòng</th>
                    <th>Dịch vụ</th>
                    <th>Thành tiền</th>
                    <th>Thanh toán</th> 
                </thead>
                <tbody>                   

                </tbody>
            </table>                 
        </div>
        <div class="card-content ana" hidden="true">
            <div class="columns">
                <div class="column is-6">
                    <h4 class="title is-4">
                        Thống kê
                    </h4>

                </div>
            </div>
        </div>
    </div> 

</div>
@endsection

@section('scripts')
@parent
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<script type="text/javascript">
function formatNumber (num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
}
// $('.modal').addClass('is-active');
$(document).on('click', '.close-modal', function(e) {
    $('.modal').removeClass('is-active');
});
var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
});
function formatDate (input) {
      var datePart = input.match(/\d+/g),
      year = datePart[0],
      month = datePart[1], day = datePart[2];

      return day+'/'+month+'/'+year;
}


$(document).on('click', '.view_service', function(e) {
    e.preventDefault();
    var id = $(this).val();
    var url = "{{ route('billdetail', ":id") }}";
    var view_service_room = $(this).data('name');
    var view_service_date_from = $(this).data('from');
    var view_service_date_to = $(this).data('to');
    // console.log(view_service_date_from);
    url = url.replace(':id', id);
    $('.view_service_room').text(view_service_room);
    $('.view_service_from').text(view_service_date_from);
    $('.view_service_to').text(view_service_date_to);
    $('.modal').addClass('is-active');
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
                    .append($('<th>').attr('id', 'total_price')
                      .append(formatNumber(sum*1000))
                    )
                );
            }
        }
    });
});
$(document).on('click', '.view_service_all', function(e) {
    e.preventDefault();
    var id = $(this).val();
    var url = "{{ route('billdetail', ":id") }}";
    url = url.replace(':id', id);
    $('.modal').addClass('is-active');
    $.ajax({
        type: "GET",
        url: url,
        success: function(response) {
            if (response.status == 404) {
              console.log("lỗi");
                Toast.fire({
                    icon: 'error',
                    title: 'Không tìm thấy dữ liệu.'
                })
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
                    .append($('<th>').attr('id', 'total_price')
                      .append(formatNumber(sum*1000))
                    )
                );
            }
        }
    });
});
$(document).on('click', '.search', function(e) {
    e.preventDefault();
    // console.log(formatDate ('2010/01/18'));
    //  // "18/01/10"


    var cmnd = $('#cmnd').val();
    var length = cmnd.length;
    // console.log(length);
    if(!$.isNumeric(cmnd) || length >12) {
        Toast.fire({
            icon: 'error',
            title: '&nbsp; Dữ liệu nhập vào không hợp lệ, hãy nhập số cmnd hoặc sđt chính xác.'
        })
    }else{
        $('#input').addClass("is-loading");
        $('.progress').css("display", "block");  
       setTimeout(
      function() 
      {                      
            $('#input').removeClass("is-loading");
            $('.progress').css("display", "none");
            $('#content').show();
            $.ajax({
            type: "GET",
            url: "search/" +cmnd,
            success: function(response) {
            if (response.status == 404) {
                Toast.fire({
                    icon: 'error',
                    title: '&nbsp;Không tìm thấy dữ liệu.'
                })
                $('#name').text('');
                $('#room').text('');
                $('#sdt').text('');
                $('#birthday').text(''); 
            } else {
                $('#name').text(response.customer.name);
                $('#room').text(response.customer.room_name);
                $('#sdt').text(response.customer.phone);
                $('#birthday').text(formatDate(response.customer.birthday));

                var countbill = $(response.allbill).length;
                $(".all_bill").remove();
                for(i=0;i<countbill;i++){
                    if(response.allbill[i].paid==0){
                        $("#allbill").find('tbody')
                            .append($('<tr>').attr('class', 'all_bill')
                                .append($('<td>')
                                    .append(formatDate(response.allbill[i].from))
                                )
                                .append($('<td>')
                                    .append(formatDate(response.allbill[i].to))
                                )
                                .append($('<td>')
                                    .append(formatNumber(response.allbill[i].room_price))
                                )
                                .append($('<td>')
                                    .append($('<button>')
                                        .attr('class', 'button is-success is-small view_service_all')
                                        .attr('value', '')
                                        .text(formatNumber(response.allbill[i].total_price-response.allbill[i].room_price))
                                        .val(response.allbill[i].id)
                                      )
                                )
                                .append($('<td>')
                                    .append(formatNumber(response.allbill[i].total_price))
                                )
                                .append($('<td>')
                                    .append($('<button>').attr('class', 'button is-warning is-small').text('Thanh toán ngay')
                                      )
                                )
                                
                            );
                        }else{
                            $("#allbill").find('tbody')
                                .append($('<tr>').attr('class', 'all_bill')
                                    .append($('<td>')
                                        .append(formatDate(response.allbill[i].from))
                                    )
                                    .append($('<td>')
                                        .append(formatDate(response.allbill[i].to))
                                    )
                                    .append($('<td>')
                                        .append(formatNumber(response.allbill[i].room_price))
                                    )
                                    .append($('<td>')
                                        .append($('<button>')
                                            .attr('class', 'button is-success is-small view_service_all')
                                            .attr('value', '')
                                            .text(formatNumber(response.allbill[i].total_price-response.allbill[i].room_price))
                                            .val(response.allbill[i].id)
                                          )
                                    )
                                    .append($('<td>')
                                        .append(formatNumber(response.allbill[i].total_price))
                                    )
                                    .append($('<td>')
                                        .append($('<button>').attr('class', 'button is-success is-small').text('Đã thanh toán').prop('disabled', true)
                                          )
                                    )
                                    
                                );
                        }
                 
                }
                if(response.bills == null){
                    console.log("nul1l");
                    $('#from').text('');
                    $('#to').text('');
                    $('#room_price').text('');
                    $('.view_service').val('');
                    $('#total_price').text('');
                    $('.thanhtoan').text('Chưa có hóa đơn nào').prop('disabled', true);
                }
                else{
                    $('#from').text(formatDate(response.bills.from));
                    $('#to').text(formatDate(response.bills.to));
                    $('#room_price').text(formatNumber(response.bills.room_price)+'đ');
                    $('.view_service').val(response.bills.id);
                    $('.view_service').data('name',response.customer.room_name);
                    $('.view_service').data('from',formatDate(response.bills.from));
                    $('.view_service').data('to',formatDate(response.bills.to));
                    $('.view_service').text(formatNumber(response.bills.total_price-response.bills.room_price)+'đ');
                    // $('.view_service').data('date',);
                    $('#total_price').text(formatNumber(response.bills.total_price)+'đ');
                    if(response.bills.paid == 1){
                        $('.thanhtoan').text('Đã thanh toán').prop('disabled', true);
                    }
                    else{
                        $('.thanhtoan').text('Thanh toán ngay').prop('disabled', false);
                    }
                }
            }
        }
    });           
    }, 1500);
    }

    

});

$('ul li').click(function(){
    $('li ').removeClass("is-active");
    $(this).addClass("is-active");
    var name = this.className;
    if(name=="view_history is-active"){         
        $('.card-content').hide();
        $('.history').show();
    }
    else if(name=="view_bill is-active"){               
        $('.card-content').hide();
        $('.bill').show();
    }
    else{    
        $('.card-content').hide();
        $('.ana').show();
    }
});




 
</script>


@endsection
