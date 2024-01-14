<!-- Start Modal -->
<div class="modal fade custom-modal" id="addModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">{{ trans('main.Add') }} {{ trans('main.Branch') }}</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('branch.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <!-- name -->
                    <div class="form-group">
                        <label for="name">{{ trans('main.Name') }}</label>
                        <input id="name" type="text" class="form-control name" name="name" value="{{ old('name') }}" placeholder="{{ trans('main.Name') }}" autocomplete="off" required>
                        <div class="valid-feedback">{{ trans('main.Looks Good') }}</div>
                        <div class="invalid-feedback">{{ trans('main.Error Here')}}</div>
                    </div>
                    <!-- firstPhone -->
                    <div class="form-group">
                        <label for="firstPhone">{{ trans('main.First Phone') }}</label>
                        <input id="firstPhone" class="form-control" type="text" name="firstPhone" placeholder="{{ trans('main.First Phone') }}"  value="{{ old('firstPhone') }}" autocomplete="off" required>
                        <div class="valid-feedback">{{ trans('main.Looks Good') }}</div>
                        <div class="invalid-feedback">{{ trans('main.Error Here')}}</div>
                    </div>
                    <!-- secondPhone -->
                    <div class="form-group">
                        <label for="secondPhone">{{ trans('main.Second Phone') }}</label>
                        <input id="secondPhone" class="form-control" type="text" name="secondPhone" placeholder="{{ trans('main.Second Phone') }}"  value="{{ old('secondPhone') }}" autocomplete="off" required>
                        <div class="valid-feedback">{{ trans('main.Looks Good') }}</div>
                        <div class="invalid-feedback">{{ trans('main.Error Here')}}</div>
                    </div>
                    <!-- address -->
                    <div class="form-group">
                        <label for="address">{{ trans('main.Address') }}</label>
                        <input id="address" class="form-control" type="text" name="address" placeholder="{{ trans('main.Address') }}"  value="{{ old('address') }}" autocomplete="off" required>
                        <div class="valid-feedback">{{ trans('main.Looks Good') }}</div>
                        <div class="invalid-feedback">{{ trans('main.Error Here')}}</div>
                    </div>
                    <!-- area_id -->
                    <div class="form-group">
                        <label for="area_id" class="mr-sm-2">{{ trans('main.Area') }} :</label>
                        <select id="area_id" class="form-control select2" name="area_id">
                            @php
                                $areas = App\Models\Area::get(['id', 'name']);
                            @endphp
                            @foreach($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary btn-block">{{ trans('main.Confirm') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
