<?php $page="branches";?>

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
        {{ trans('main.Branches') }}
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
                        <h3 class="page-title">{{ trans('main.Branches') }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('main.Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ trans('main.Branches') }}</li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn add-button me-2" data-bs-toggle="modal" data-bs-target="#addModal">
                            <i class="fas fa-plus"></i>
                        </button>
                        <button type="button" class="btn filter-btn me-2" id="filter_search">
                            <i class="fas fa-filter"></i>
                        </button>
                        <button type="button" class="btn" id="btn_delete_selected" title="{{ trans('main.Delete Selected') }}" style="display:none; width: 42px; height: 42px; justify-content: center; align-items: center; color: #fff; background: red; border: 1px solid red; border-radius: 5px;">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Search Filter -->
            <div class="card filter-card" id="filter_inputs" @if($name || $area_id || $from_date || $to_date) style="display:block" @endif>
                <div class="card-body pb-0">
                    <form action="{{ route('branch.index') }}" method="get">
                        <div class="row filter-row">
                            <!-- name -->
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label for="name">{{ trans('main.Name') }}</label>
                                    <input id="name" class="form-control" type="text" name="name" value="{{ $name }}" autocomplete="off">
                                </div>
                            </div>
                            <!-- area_id -->
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label for="area_id">{{ trans('main.Area') }} :</label>
                                    <select id="area_id" class="form-control select2" name="area_id">
                                        <option value="">{{ trans('main.All') }}</option>
                                        @php
                                            $areas = App\Models\Area::get(['id','name']);
                                        @endphp
                                        @foreach($areas as $area)
                                            <option value="{{ $area->id }}" {{ $area_id == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- from_date -->
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label for="from_date">{{ trans('main.From Date') }}</label>
                                    <input id="from_date" class="form-control" type="date" name="from_date" value="{{ $from_date }}" autocomplete="off">
                                </div>
                            </div>
                            <!-- to_date -->
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label for="to_date">{{ trans('main.To Date') }}</label>
                                    <input id="to_date" class="form-control" type="date" name="to_date" value="{{ $to_date }}" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">{{ trans('main.Search') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Search Filter -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- validationNotify -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- success Notify -->
                            @if (session()->has('success'))
                                <script id="successNotify">
                                    window.onload = function() {
                                        notif({
                                            msg: "تمت العملية بنجاح",
                                            type: "success"
                                        })
                                    }
                                </script>
                            @endif
                            <!-- error Notify -->
                            @if (session()->has('error'))
                                <script id="errorNotify">
                                    window.onload = function() {
                                        notif({
                                            msg: "لقد حدث خطأ.. برجاء المحاولة مرة أخرى!",
                                            type: "error"
                                        })
                                    }
                                </script>
                            @endif
                            <!-- canNotDeleted Notify -->
                            @if (session()->has('canNotDeleted'))
                                <script id="canNotDeleted">
                                    window.onload = function() {
                                        notif({
                                            msg: "لا يمكن الحذف لوجود بيانات أخرى مرتبطة بها..!",
                                            type: "error"
                                        })
                                    }
                                </script>
                            @endif
                            <div class="table-responsive">
                                <table id="example1" class="table table-stripped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">{{ trans('main.Name') }}</th>
                                            <th class="text-center">{{ trans('main.First Phone') }}</th>
                                            <th class="text-center">{{ trans('main.Second Phone') }}</th>
                                            <th class="text-center">{{ trans('main.Address') }}</th>
                                            <th class="text-center">{{ trans('main.Area') }}</th>
                                            <th class="text-center">{{ trans('main.Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($data->count() > 0)
                                        <?php $i = 0; ?>
                                        @foreach ($data as $item)
                                        <?php $i++; ?>
                                        <tr>
                                            <td class="text-center notPrint">
                                                <input id="delete_selected_input" type="checkbox" value="{{ $item->id }}" class="box1 mr-1" oninput="showBtnDeleteSelected()">
                                                {{ $i }}
                                            </td>
                                            <td class="text-center">{{ @$item->name }}</td>
                                            <td class="text-center">{{ @$item->firstPhone }}</td>
                                            <td class="text-center">{{ @$item->secondPhone }}</td>
                                            <td class="text-center">{{ @$item->address }}</td>
                                            <td class="text-center">{{ @$item->area->name }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-secondary mr-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}" title="{{ trans('main.Edit') }}"><i class="far fa-edit"></i></button>
                                                <button type="button" class="btn btn-sm btn-danger mr-1" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}" title="{{ trans('main.Delete') }}"><i class="far fa-trash-alt"></i></button>
                                                <a href="{{ route('branch.show', $item->id) }}" role="button" class="btn btn-sm btn-info" title="{{ trans('main.Show') }}"><i class="far fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        @include('dashboard.branch.editModal')
                                        @include('dashboard.branch.deleteModal')
                                        @endforeach
                                        @else
                                        <tr>
                                            <th class="text-center" colspan="7">
                                                <div class="col mb-3 d-flex">
                                                    <div class="card flex-fill">
                                                        <div class="card-body p-3 text-center">
                                                            <p class="card-text f-12">{{ trans('main.No Data Founded') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                @include('dashboard.branch.addModal')
                @include('dashboard.branch.deleteSelectedModal')
            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection



@section('js')

@endsection
