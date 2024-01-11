<?php $page = 'city'; ?>

@extends('layouts.master')

@section('css')
    <!-- Print -->
    <style>
        @media print {
            .notPrint {
                display: none;
            }
        }
    </style>
@section('title')
    {{ trans('main.City') }}
@stop
@endsection



@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{ trans('main.City') }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('main.Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ trans('main.City') }}</li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('city.index') }}" type="button" class="btn btn-primary me-2" id="filter_search">
                            {{ trans('main.Back') }}
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card bg-white">
                        <div class="card-body pt-0">

                            <div class="card-header mb-4">
                                <ul role="tablist" class="nav nav-pills card-header-pills nav-justified">
                                    <!--tab 1 button -->
                                    <li class="nav-item">
                                        <a href="#main" data-bs-toggle="tab" class="nav-link active me-1">{{ trans('main.Main Data') }}</a>
                                    </li>
                                    <!--tab 2 button -->
                                    <li class="nav-item">
                                        <a href="#areas" data-bs-toggle="tab" class="nav-link">{{ trans('main.Areas') }}</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content pt-0">
                                <!-- tab 1 -->
                                @include('dashboard.city.tab1')

                                <!-- tab2 -->
                                @include('dashboard.city.tab2')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection



@section('js')

@endsection
