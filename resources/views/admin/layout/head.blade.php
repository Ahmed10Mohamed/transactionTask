<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"

  data-assets-path="https://getsign.net/backend/"


  data-template="vertical-menu-template"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - backend | Transactions Task </title>

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
    <link rel="stylesheet" href="{{asset('backend/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendor/libs/node-waves/node-waves.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendor/libs/typeahead-js/typeahead.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendor/libs/apex-charts/apex-charts.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendor/libs/select2/select2.css')}}"/>

        <link rel="stylesheet" href="{{asset('backend/vendor/libs/tagify/tagify.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendor/libs/animate-css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendor/libs/sweetalert2/sweetalert2.css')}}" />
        <link rel="stylesheet" href="{{asset('backend/vendor/libs/bs-stepper/bs-stepper.css')}}" />



    <link rel="stylesheet" href="{{asset('css/toaster.css')}}">



    <!-- Vendors CSS -->


    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('backend/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendor/libs/flatpickr/flatpickr.css')}}" />
    <!-- Row Group CSS -->
    <link rel="stylesheet" href="{{asset('backend/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css')}}" />

    <!-- Page CSS -->


<!-- Vendors CSS -->
<link rel="stylesheet" href="{{asset('backend/vendor/libs/bs-stepper/bs-stepper.css')}}" />
<link rel="stylesheet" href="{{asset('backend/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />


@yield('js')

    <!-- Helpers -->
    <script src="{{asset('backend/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{asset('backend/vendor/js/template-customizer.js')}}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('backend/js/config.js')}}"></script>



  <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}" />
  @if (app()->getLocale() == 'ar')
  <link rel="stylesheet" href="{{asset('backend/css/custom_ar.css')}}" />
  <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&amp;subset=latin-ext" rel="stylesheet">


  @endif


</head>









