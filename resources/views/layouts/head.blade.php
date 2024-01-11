<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Title -->
<title> Coding System </title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{asset('public/assets_admin/img/favicon.png')}}">

<!-- Bootstrap CSS -->
@if (App::getLocale() == 'ar')
<link rel="stylesheet" href="{{asset('public/assets_admin/css/bootstrap_rtl.min.css')}}">
@else
<link rel="stylesheet" href="{{asset('public/assets_admin/css/bootstrap.min.css')}}">
@endif

<!-- Fontawesome CSS -->
<link rel="stylesheet" href="{{asset('public/assets_admin/plugins/fontawesome/css/fontawesome.min.css')}}">
<link rel="stylesheet" href="{{asset('public/assets_admin/plugins/fontawesome/css/all.min.css')}}">

<!-- Feather CSS -->
<link rel="stylesheet" href="{{asset('public/assets_admin/css/feather.css')}}">

<!-- Datatables CSS -->
<link rel="stylesheet" href="{{asset('public/assets_admin/plugins/datatables/datatables.min.css')}}">

<!-- Datepicker CSS -->
<link rel="stylesheet" href="{{asset('public/assets_admin/css/bootstrap-datetimepicker.min.css')}}">

<!-- Ck Editor -->
<link rel="stylesheet" href="{{asset('public/assets_admin/css/ckeditor.css')}}">

<!--Internal Notify -->
<link href="{{ URL::asset('public/assets_admin/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

<!--- Internal Sweet-Alert css-->
<link href="{{URL::asset('public/assets_admin/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">

<!--Select2 -->
<link rel="stylesheet" href="{{ asset('public/assets_admin/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets_admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

<!-- Main CSS -->
@if (App::getLocale() == 'ar')
<link rel="stylesheet" href="{{asset('public/assets_admin/css/style_rtl.css')}}">
@else
<link rel="stylesheet" href="{{asset('public/assets_admin/css/style.css')}}">
@endif


@yield('css')
