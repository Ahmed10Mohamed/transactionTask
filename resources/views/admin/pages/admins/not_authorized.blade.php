<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{asset('')}}"

  data-template="vertical-menu-template"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Admin | Transactions Task </title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('backend/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('backend/vendor/fonts/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendor/fonts/tabler-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendor/fonts/flag-icons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('backend/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('backend/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('backend/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendor/libs/node-waves/node-waves.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendor/libs/typeahead-js/typeahead.css')}}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('backend/vendor/css/pages/page-misc.css')}}" />
    <!-- Helpers -->
    <script src="{{asset('backend/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{asset('backend/vendor/js/template-customizer.js')}}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('backend/js/config.js')}}"></script>
  </head>

  <body>
    <!-- Content -->

    <!-- Not Authorized -->
    <div class="container-xxl container-p-y">
      <div class="misc-wrapper">
        <h2 class="mb-1 mx-2">{{translate('You are not authorized!')}}</h2>
        <p class="mb-4 mx-2">
          {{translate('You do not have permission to view this page using the credentials that you have provided while login. <br />
          Please contact your site administrator.')}}
        </p>
        <a href="{{url('home')}}" class="btn btn-primary mb-4">{{translate('Back to home')}}</a>
        <div class="mt-4">
            <img
            src="{{asset('backend/img/illustrations/page-misc-you-are-not-authorized.png')}}"
            alt="page-misc-not-authorized"
            width="170"
            class="img-fluid"
          />
        </div>
      </div>
    </div>
    <div class="container-fluid misc-bg-wrapper">
        <img
        src="admin/img/illustrations/bg-shape-image-light.png"
        alt="not-authorized"
        data-app-light-img="'admin/illustrations/bg-shape-image-light.png"
        data-app-dark-img="'illustrations/bg-shape-image-dark.png"
      />
    </div>
    <!-- /Not Authorized -->

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('backend/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('backend/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('backend/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('backend/vendor/libs/node-waves/node-waves.js')}}"></script>

    <script src="{{asset('backend/vendor/libs/hammer/hammer.js')}}"></script>
    <script src="{{asset('backend/vendor/libs/i18n/i18n.js')}}"></script>
    <script src="{{asset('backend/vendor/libs/typeahead-js/typeahead.js')}}"></script>

    <script src="{{asset('backend/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{asset('backend/js/main.js')}}"></script>

    <!-- Page JS -->
  </body>
</html>
