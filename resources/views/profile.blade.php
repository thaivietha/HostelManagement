<x-app-layout>

   @section('content')
   <div class="container main">
        <div class="box">
            <div class="columns">
                <div class="column is-3">
                    <p class="title is-3">Thông tin tài khoản</p>
                </div>
            </div>
            <hr>
            <div class="columns">
                <div class="column">
                    <label class="">Họ và tên: {{ Auth::user()->name }}</label><br>
                    <label class="">Địa chỉ email: {{ Auth::user()->email }}</label><br>
                    <label class="">Ngày đăng ký: {{ Auth::user()->created_at }}</label><br>
                    <label class="">Mật khẩu:  </label>
                </div>
            </div>
        </div>


</div>


@endsection


</x-app-layout>


