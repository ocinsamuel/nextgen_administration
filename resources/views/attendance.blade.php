<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: 5.0.3
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            Attendance Submission | Admin NEXTGEN Sukawarna
        </title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--begin::Web font -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <!--end::Web font -->
        <!--begin::Base Styles -->
        <link href="{{asset('css/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('css/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
        <!--end::Base Styles -->
        <!-- <link rel="shortcut icon" href="../../../assets/demo/default/media/img/logo/favicon.ico" /> -->
    </head>
    <!-- end::Head -->
    <!-- end::Body -->
    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--singin m-login--2 m-login-2--skin-1" id="m_login" style="background-image: url({{asset('app/media/img/bg/bg-1.jpg')}});">
                <div class="m-grid__item m-grid__item--fluid    m-login__wrapper">
                    <div class="m-login__container">
                        <div class="m-login__logo">
                            <a href="#">
                                <img width="100%" src="{{asset('img/logo-white.png')}}">
                            </a>
                        </div>
                        <div class="m-login__signin">
                            <?php
                                if ($status == 0 || $status == 3) {
                            ?>
                                <div class="m-login__head">
                                    <?php
                                        if ($status == 3) {
                                    ?>
                                        <h3 class="m--font-warning" style="text-align: center;">
                                            Wrong credentials, please enter the correct one!
                                        </h3>
                                    <?php } else { ?>
                                        <h3 class="m-login__title">
                                            Enter Your Credentials
                                        </h3>
                                    <?php } ?>
                                </div>
                                <form class="m-login__form m-form" action="{{ route('attend') }}" type="POST">
                                    @csrf
                                    <input type="hidden" name="actdate" value="{{ $actdate }}">
                                    <div class="form-group m-form__group">
                                        <input class="form-control m-input"   type="text" placeholder="Email/Username/No.KAJ" name="user" autocomplete="off">
                                    </div>
                                    <div class="form-group m-form__group">
                                        <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
                                    </div>
                                    <div class="m-login__form-action">
                                        <button type="submit" id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            <?php } elseif ($status == 1) { ?>
                                <div class="m-login__head">
                                    <h3 style="color: white; text-align: center; line-height: 150%">
                                        Thank you for your submission!
                                    </h3>
                                    <h2 style="color: white; text-align: center; line-height: 150%">
                                        God Bless!
                                    </h2>
                                </div>
                            <?php } else { ?>
                                <div class="m-login__head">
                                    <h1 class="m--font-warning" style="text-align: center">
                                        Something happened, please contact our administrator!
                                    </h1>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:: Page -->
    </body>
    <!-- end::Body -->
</html>
