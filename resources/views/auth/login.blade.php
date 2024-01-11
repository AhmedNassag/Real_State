<?php $page="login";?>
@extends('layouts.master2')
@section('content')
	<!-- Main Wrapper -->
	<div class="main-wrapper login-body">
		<div class="login-wrapper" style="background-color: darkgrey;">
			<div class="container">
				<img class="img-fluid logo-dark mb-2" src="{{ asset('public/assets_admin/img/logo-01.jpg') }}" alt="Logo">
                <div class="loginbox">
					<div class="login-right">
						<div class="login-right-wrap form-group">
							<h2 class="text-center">{{ trans('main.Welcome Back') }}</h2>

							<!-- login form-->
							<div class="border mt-5 p-3">
								<div class="form-group">
									<h4 class="text-center">تسجيل الدخول</h4>
								</div>
								<form method="POST" action="{{ route('login') }}">
									@csrf
									<div class="form-group">
										<label>{{ trans('main.Email Or Mobile') }}</label>
										<input id="identify" type="text" class="form-control floating @error('identify') is-invalid @enderror" name="identify" placeholder="{{ trans('main.Email Or Mobile') }}">
										@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
									<div class="form-group">
										<label>{{ trans('main.Password') }}</label>
										<input id="password" type="password" class="form-control floating @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ trans('main.Password') }}">
										@error('password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">{{ trans('main.Login') }}</button>
                                    </div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Main Wrapper -->
@endsection
