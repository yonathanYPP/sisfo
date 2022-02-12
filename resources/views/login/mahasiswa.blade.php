@extends ('template/login_master')


@section ('content')


<div class="col-xl-12">
    <div class="auth-form">
        <h4 class="text-center mb-4">SISFO MAHASISWA</h4>
          <form id="loginForm" method="post"  action="{{url('/logindata')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label><strong>Username</strong></label>
                <input type="text" class="form-control" placeholder="NPM" name="username">
            </div>
            <div class="form-group">
                <label><strong>Password</strong></label>
                <input type="text" class="form-control" placeholder="tgl lahir" name="password">
            </div>
            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                <div class="form-group">
                    <div class="form-check ml-2">
               
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block">Masuk</button>
            </div>
            
        </form>

    </div>
</div>

@endsection
