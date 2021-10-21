<!DOCTYPE html>
<html lang="en">
<head>
  <title>Đăng nhập</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="{{ asset('view/login/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('view/login/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('view/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('view/login/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('view/login/vendor/animate/animate.css') }}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{ asset('view/login/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('view/login/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('view/login/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{ asset('view/login/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('view/login/css/util.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('view/login/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
  
 
      
         


     
  <div class="limiter">
    <div class="container-login100">
    <style>
    .container-login100{
        
        background-image: url("{{ asset('view/login/images/bg-01.jpg') }}");
    }
    </style>
      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div style="border: 4px solid green; width: 178px; margin: auto; padding: 3px 15px;"><a href="{{ url('admin') }}"><img src="{{ asset('view/login/images/logo.jpg') }}" width="140"></a></div>
                        <span class="login100-form-title p-b-49" style="font-size: 16px; font-family: times new roman; font-weight: bold; padding-top: 25px;">
                          ĐĂNG NHẬP
                        </span>
                        
                      
              
                        <div class="wrap-input100 validate-input m-b-23" data-validate = "Email is reauired">
                          <span class="label-input100">Email</span>
                          <input class="input100" type="text" required="" name="email" placeholder="Nhập địa chỉ email của bạn">
                          <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>
              
                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                          <span class="label-input100">Mật khẩu</span>
                          <input class="input100" type="password" required="" name="password" placeholder="Nhập mật khẩu của bạn">
                          <span class="focus-input100" data-symbol="&#xf190;"></span>
                        </div>
                        
                        <div class="text-right p-t-8 p-b-31">
                          <a href="#" style="text-decoration: underline;">
                            Quên mật khẩu?
                          </a>
                        </div>
                        
                       
                        <div class="container-login100-form-btn">
                          <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            
                              <input type="submit" class="login100-form-btn" value="Đăng nhập" style="color: black; background: linear-gradient(to right, blue, pink);">
                            
                          </div>
                        </div>
                    </form>
              
                        <div class="txt1 text-center p-t-54 p-b-20">
                          <span>
                           Đăng nhập bằng cách khác
                          </span>
                        </div>
              
                        <div class="flex-c-m">
                          <a href="{{ asset('view/login/#')}}" class="login100-social-item bg1">
                            <i class="fa fa-facebook"></i>
                          </a>
              
                          <a href="{{ asset('view/login/#') }}" class="login100-social-item bg2">
                            <i class="fa fa-twitter"></i>
                          </a>
                           <?php if(isset($authUrl)): ?>
                          <a href="<?= $authUrl ?>" class="login100-social-item bg3">
                            <i class="fa fa-google"></i>
                          </a>
                           <?php endif; ?>
                        </div>
              
                        <div class="flex-col-c p-t-155">
                          <span class="txt1 p-b-17">
                           Hoặc đăng kí
                          </span>
              
                          <a href="{{ route('register') }}" class="txt2">
                            Đăng kí
                          </a>
                        </div>
                      
                    </div>
                  </div>
                </div>
                <style type="text/css">
                  a:hover {
                text-decoration: none;
                color: #a64bf4;
                text-decoration: underline;
              }
                </style>
              
                <div id="dropDownSelect1"></div>
                
              <!--===============================================================================================-->
                <script href="{{ asset('view/login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
              <!--===============================================================================================-->
                <script href="{{ asset('view/login/vendor/animsition/js/animsition.min.js') }}"></script>
              <!--===============================================================================================-->
                <script href="{{ asset('view/login/vendor/bootstrap/js/popper.js') }}"></script>
                <script href="{{ asset('view/login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
              <!--===============================================================================================-->
                <script href="{{ asset('view/login/vendor/select2/select2.min.js') }}"></script>
              <!--===============================================================================================-->
                <script href="{{ asset('view/login/vendor/daterangepicker/moment.min.js') }}"></script>
                <script href="{{ asset('view/login/vendor/daterangepicker/daterangepicker.js') }}"></script>
              <!--===============================================================================================-->
                <script href="{{ asset('view/login/vendor/countdowntime/countdowntime.js') }}"></script>
              <!--===============================================================================================-->
                <script src="{{ asset('js/main.js') }}"></script>
              
               
              
              </body>
              </html>