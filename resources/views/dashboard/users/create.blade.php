@extends('layouts.master')



@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
    @section('title')
        {{ trans('main.User') }} {{ trans('main.Add') }}
    @stop
@endsection



@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{ trans('main.Users') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('main.Add') }}</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection



@section('content')
            <!-- row -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ trans('main.Error') }}</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-right">
                                    <a class="btn btn-primary ripple" href="{{ route('users.index') }}">
                                        <i class="typcn typcn-arrow-right-outline"></i>&nbsp;{{ trans('main.Back') }}
                                    </a>
                                </div>
                            </div>
                            <br>
                            <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2" action="{{route('users.store','test')}}" method="post">
                                {{csrf_field()}}

                                <div class="">
                                    <div class="row mg-b-20">
                                        <!-- name -->
                                        <div class="parsley-input col-md-6" id="fnWrapper">
                                            <label for="name">{{ trans('main.Name') }} : <span class="tx-danger">*</span></label>
                                            <input id="name" class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper" name="name" type="text" required autocomplete="off">
                                        </div>

                                        <!-- email -->
                                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                            <label for="email">{{ trans('main.Email') }} : <span class="tx-danger">*</span></label>
                                            <input id="email" class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper" name="email" type="email" required autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mg-b-20">
                                    <!-- password -->
                                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                        <label for="password">{{ trans('main.Password') }} : <span class="tx-danger">*</span></label>
                                        <input id="password" class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper" name="password" type="password" required autocomplete="off">
                                    </div>

                                    <!-- confirm-password -->
                                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                        <label for="confirm-password">{{ trans('main.Confirm') }} {{ trans('main.Password') }} : <span class="tx-danger">*</span></label>
                                        <input id="confirm-password" class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper" name="confirm-password" type="password" required autocomplete="off">
                                    </div>
                                </div>

                                <div class="row row-sm mg-b-20">
                                    <!-- mobile -->
                                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                        <label for="mobile">{{ trans('main.Mobile') }} : <span class="tx-danger">*</span></label>
                                        <input id="mobile" class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper" name="mobile" type="number" required autocomplete="off">
                                    </div>

                                    <!-- status -->
                                    <div class="col-md-6">
                                        <label for="status" class="form-label">{{ trans('main.Status') }} :</label>
                                        <select id="status" name="status" id="select-beast" class="form-control nice-select custom-select">
                                            <option value="1">{{ trans('main.Active') }}</option>
                                            <option value="0">{{ trans('main.InActive') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mg-b-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="roles_name" class="form-label">{{ trans('main.Role') }} :</label>
                                            {!! Form::select('roles_name[]', $roles,[], array('id' => 'roles_name', 'class' => 'form-control','multiple')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button class="btn btn-main-primary pd-x-20" type="submit">{{ trans('main.Confirm') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row closed -->
        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection



@section('js')
    <!-- Internal Nice-select js-->
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
    <!--Internal  Parsley.min js -->
    <script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{URL::asset('assets/js/form-validation.js')}}"></script>
@endsection
