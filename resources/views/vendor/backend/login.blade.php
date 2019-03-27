<!DOCTYPE html>
<html class="no-js">
<head>
  <meta charset="UTF-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>login</title>

  {{--<link href="{{asset('vendor/laracms/plugins/zui/css/zui.min.css')}}" rel="stylesheet" type="text/css">--}}
  <link href="{{asset('vendor/laracms/css/app.css')}}" rel="stylesheet" type="text/css">

  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/laracms/css/backend/component.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/laracms/css/backend/demo.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/laracms/css/backend/normalize.css') }}"/>
  <!--[if IE]>
  <script src="{{ asset('vendor/laracms/js/backend/html5.js') }}"></script>
  <script>
    window.Laravel = {
    !!json_encode([
      'csrfToken'
    =>
    csrf_token()
    ])
    !!
    }
    ;
  </script>
  <![endif]-->

  <style>
    input:-webkit-autofill, textarea:-webkit-autofill, select:-webkit-autofill {
      -webkit-text-fill-color: #fff !important;
      -webkit-box-shadow: 0 0 0px 1000px transparent inset !important;
      background-color: transparent;
      background-image: none;
      transition: background-color 99999999999999999999999s ease-in-out 0s;
    }

    input {
      background-color: transparent;
    }

    .t-inp {
      height: 50px;
    }

    .logo_box {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 10px;
    }

    .t-captcha {
      float: left;
    }

    #captcha {
      width: 120px;
      height: 30px;
      margin: 0 20px;
      border: rgba(255, 255, 255, 0.2) 1px solid !important;
      text-indent: 8px;
      outline: none;
      font-size: 14px;
      color: #fff;
      border-radius: 10px;
    }

    .form-group {
      height: 51px;
      line-height: 40px;
    }

    .img-rounded {
      border-radius: 5px;
    }
  </style>
</head>
<body>
<div class="container demo-1">
  <div class="content">
    <div id="large-header" class="large-header">
      <canvas id="demo-canvas"></canvas>
      <div class="logo_box">
        <h3>TZMC 欢迎你</h3>
        <form action="{{ route('administrator.login') }}" name="f" method="post">
          {{ csrf_field() }}
          <div class="input_outer">
            <span class="u_user"></span>
            <div class="t-inp">
              <input name="email" autocomplete="off" class="text" style="color: #FFFFFF !important" type="email"
                     placeholder="请输入账户">
            </div>
            {{--<input type="email" name="email" autocomplete="off" required class="form-control" id="email" placeholder="请输入邮箱">--}}
            @if ($errors->has('email'))
              <div class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </div>
            @endif
          </div>
          <div class="input_outer">
            <span class="us_uer"></span>
            <div class="t-inp">
              <input name="password" autocomplete="off" class="text"
                     style="color: #FFFFFF !important; position:absolute; z-index:100;" value="" type="password"
                     placeholder="请输入密码">
            </div>
            {{--<input type="password"  name='password' autocomplete="off" required class="form-control" id="password" placeholder="请输入密码">--}}
            @if ($errors->has('password'))
              <div class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </div>
            @endif
          </div>
          <div class="form-group clearfix ">
            <label for="captcha" class="col-sm-3 t-captcha required">验证码</label>
            <div class="t-captcha col-sm-4 @if ($errors->has('captcha')) has-error @endif">
              <input type="text" name="captcha" autocomplete="off" required class="form-control " id="captcha"
                     placeholder="请输入验证码">
            </div>
            <div class="col-sm-4 t-captcha">
              <img class="img-rounded captcha " src="{{ captcha_src('default') }}"
                   onclick="this.src='/captcha/default?'+Math.random()" title="点击图片重新获取验证码">
            </div>

          </div>
          @if ($errors->has('captcha'))
            <strong style="margin-left: 7px;">{{ $errors->first('captcha') }}</strong>
          @endif
          <div class="mb1">
            <button type="submit" class="act-but submit" style="color: #FFFFFF">登录</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div><!-- /container -->

<script src="{{asset('vendor/laracms/js/app.js')}}"></script>
<script src="{{ asset('vendor/laracms/js/backend/TweenLite.min.js') }}"></script>
<script src="{{ asset('vendor/laracms/js/backend/EasePack.min.js') }}"></script>
<script src="{{ asset('vendor/laracms/js/backend/rAF.js') }}"></script>
<script src="{{ asset('vendor/laracms/js/backend/demo-1.js') }}"></script>
@yield('scripts')
</body>
</html>