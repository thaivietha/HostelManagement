<x-app-layout>

   @section('content')
   <div class="container main">
        <div class="box">
            <div class="columns">
                <div class="column is-3">
                    <p class="title is-3">Quản lý khách thuê</p>
                    
                </div>
                <div class="column is-1">
                    <button class="button is-primary is-light" id="showModal">
                        <span style="font-size: 2rem;"><i class="fas fa-plus"></i></span></button>
                </div>
                <div class="column is-offset-6">
                    <div class="field">
                      <p class="control has-icons-left">
                        <span class="select">
                          <select>
                            <option selected>Chọn phòng</option>
                            @foreach($Customer as $c)
                            <option>{{$c->room}}</option>
                            @endforeach
                        </select>
                        </span>
                        <span class="icon is-small is-left">
                              <i class="fas fa-door-open"></i>
                        </span>
                      </p>
                  </div>
                </div>
                
            </div>

            <div id="image-modal" class="modal">
                <div class="modal-background"></div>
                <div class="modal-content">
                    <div class="modal-card">
                        <header class="modal-card-head">
                            <p class="modal-card-title">Thêm khách thuê</p>
                        </header>
                        <section class="modal-card-body">
                            <form action="" method="POST">
                            
                            @csrf
                            <div class="field">
                                <label class="label">Họ và tên <span class="bb">*</span></label>
                                <div class="control has-icons-right">
                                    <input class="input is-rounded" name="name" type="text" placeholder="Nhập họ và tên" required>
                                    <span class="icon is-small is-right">
                                      <i class="fas fa-user"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Số điện thoại <span class="bb">*</span></label>
                                <div class="control has-icons-right">
                                    <input class="input is-rounded" name="phone" type="tel" placeholder="Nhập số điện thoại" required>
                                    <span class="icon is-small is-right">
                                      <i class="fas fa-phone"></i>
                                    </span>
                                     @error('phone')
                                        <div class="notification is-danger is-light">
                                          <strong>{{ $message }}</strong>
                                      </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Số CMND/CCCD <span class="bb">*</span></label>
                                <div class="control has-icons-right">
                                    <input class="input is-rounded" name="cmnd" type="text" placeholder="Nhập số CMND/CCCD" required>
                                    <span class="icon is-small is-right">
                                      <i class="far fa-id-card"></i>
                                    </span>
                                     @error('cmnd')
                                    <div class="notification is-danger is-light">
                                      <strong>{{ $message }}</strong>
                                  </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Ngày sinh <span class="bb">*</span></label>
                                <div class="control">
                                    <input class="input is-rounded" name="birthday" type="date"  required>

                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Quê quán <span class="bb">*</span></label>
                                <div class="control has-icons-right">
                                    <input class="input is-rounded" name="address" type="text" placeholder="Nhập quê quán" required>
                                    <span class="icon is-small is-right">
                                      <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Mã/Số phòng <span class="bb">*</span></label>
                                <div class="control has-icons-right">
                                    <input class="input is-rounded" name="room" type="" placeholder="Nhập số phòng" required>
                                    <span class="icon is-small is-right">
                                      <i class="fas fa-door-open"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Ngày bắt đầu thuê <span class="bb">*</span></label>
                                <div class="control">
                                    <input class="input is-rounded" name="rent_at" type="date" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Email</label>
                                <div class="control has-icons-right">
                                    <input class="input is-rounded" name="email" type="email" placeholder="Địa chỉ email" required >
                                    <span class="icon is-small is-right">
                                      <i class="fas fa-envelope"></i>
                                    </span>
                                     @error('email')
                                        <div class="notification is-danger is-light">
                                          <strong>{{ $message }}</strong>
                                      </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="field is-grouped">
                                <div class="control">
                                    <button type="submit" class="button is-success">Xác nhận</button>
                                </div>
                                <div class="control">
                                    <button class="button" id="cancel-modal" >Hủy</button>
                                </div>
                            </div>
                        </form>

                    </section>
                </div>
            </div>
            <button id="image-modal-close" class="modal-close"></button>
            </div>

            <div id="edit-modal" class="modal">
                <div class="modal-background"></div>
                <div class="modal-content">
                    <div class="modal-card">
                        <header class="modal-card-head">
                            <p class="modal-card-title">Chỉnh sửa thông tin</p>
                        </header>
                        <section class="modal-card-body">
                            <form action="" method="POST">
                            
                            @csrf
                            <div class="field">
                                <label class="label">Họ và tên <span class="bb">*</span></label>
                                <div class="control has-icons-right">
                                    <input class="input is-rounded" name="name" type="text" placeholder="Nhập họ và tên" required>
                                    <span class="icon is-small is-right">
                                      <i class="fas fa-user"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Số điện thoại <span class="bb">*</span></label>
                                <div class="control has-icons-right">
                                    <input class="input is-rounded" name="phone" type="tel" placeholder="Nhập số điện thoại" required>
                                    <span class="icon is-small is-right">
                                      <i class="fas fa-phone"></i>
                                    </span>
                                     @error('phone')
                                        <div class="notification is-danger is-light">
                                          <strong>{{ $message }}</strong>
                                      </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Số CMND/CCCD <span class="bb">*</span></label>
                                <div class="control has-icons-right">
                                    <input class="input is-rounded" name="cmnd" type="text" placeholder="Nhập số CMND/CCCD" required>
                                    <span class="icon is-small is-right">
                                      <i class="far fa-id-card"></i>
                                    </span>
                                     @error('cmnd')
                                    <div class="notification is-danger is-light">
                                      <strong>{{ $message }}</strong>
                                  </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Ngày sinh <span class="bb">*</span></label>
                                <div class="control">
                                    <input class="input is-rounded" name="birthday" type="date"  required>

                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Quê quán <span class="bb">*</span></label>
                                <div class="control has-icons-right">
                                    <input class="input is-rounded" name="address" type="text" placeholder="Nhập quê quán" required>
                                    <span class="icon is-small is-right">
                                      <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Mã/Số phòng <span class="bb">*</span></label>
                                <div class="control has-icons-right">
                                    <input class="input is-rounded" name="room" type="" placeholder="Nhập số phòng" required>
                                    <span class="icon is-small is-right">
                                      <i class="fas fa-door-open"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Ngày bắt đầu thuê <span class="bb">*</span></label>
                                <div class="control">
                                    <input class="input is-rounded" name="rent_at" type="date" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Email</label>
                                <div class="control has-icons-right">
                                    <input class="input is-rounded" name="email" type="email" placeholder="Địa chỉ email" required >
                                    <span class="icon is-small is-right">
                                      <i class="fas fa-envelope"></i>
                                    </span>
                                     @error('email')
                                        <div class="notification is-danger is-light">
                                          <strong>{{ $message }}</strong>
                                      </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="field is-grouped">
                                <div class="control">
                                    <button type="submit" class="button is-success">Xác nhận</button>
                                </div>
                                <div class="control">
                                    <button class="button" id="cancel-edit-modal" >Hủy</button>
                                </div>
                            </div>
                        </form>

                    </section>
                </div>
            </div>
            <button id="edit-modal-close" class="modal-close"></button>
            </div>

            <div id="bang">
                <table id="mytable" class="table is-bordered is-striped  is-hoverable is-fullwidth">
                    <thead>
                        <tr class="is-selected">
                            <th>Phòng</th>
                            <th>Họ và tên</th>
                            <th>Số điện thoại</th>
                            <th>Số CMND/CCCD</th>
                            <th>Ngày sinh</th>
                            <th>Quê quán</th>
                            <th>Ngày bắt đầu thuê</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach($Customer as $c)
                        <tr>
                            <th>{{ $c->room }}</th>
                            <td>{{ $c->name }}</td>
                            <td>{{ $c->phone }}</td>
                            <td>{{ $c->cmnd }}</td>
                            <td>{{ $c->birthday }}</td>
                            <td>{{ $c->address }}</td>
                            <td>{{ $c->rent_at }}</td>                         
                            <td>

                                <button class="button is-danger is-light" >
                                    <span>
                                        <i class="fas fa-user-edit" ></i>
                                    </span> 
                                </button>                                                           
                            </td>                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            
            <hr>
            {{$Customer->links()}}
            
    </div>
<script type="text/javascript">
    $(document).ready( function () {
    $('#mytable').DataTable();
} );
</script>

</div>


@endsection


</x-app-layout>


