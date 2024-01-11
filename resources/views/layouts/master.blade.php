<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
	<head>
		@include('layouts.head')
	</head>
	<body>
        <!-- Main Wrapper -->
        <div class="main-wrapper">
            @auth
                @include('layouts.main-header')
                @include('layouts.main-sidebar')
            @endauth
            @yield('content')
        </div>
        <!-- /Main Wrapper -->
        @include('layouts.footer-scripts')
  </body>
</html>
