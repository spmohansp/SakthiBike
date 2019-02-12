@include('admin.layouts.header')


  <section class="material-half-bg">
    <div class="cover"></div>
  </section>

    <section class="login-content">
         <div class="login-box">
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>LOGIN IN</h3>
                <div class="form-group">
                  <label class="control-label">E-Mail</label>
                  <input id="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" name="email" value="{{ old('email') }}" required>
                  @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="form-group">
                  <label class="control-label">PASSWORD</label>
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                  @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
                </div>
                
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                       {{ __('Forgot Your Password?') }}
                     </a>
               @endif
                <div class="form-group btn-container"><br>
                  <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>LOGIN IN</button>
                </div>
            </form>
         </div>
    </section>
@include('admin.layouts.script')
@include('admin.layouts.footer')
