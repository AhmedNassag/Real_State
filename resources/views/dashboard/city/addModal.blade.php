<!-- Start Modal -->
<div class="modal fade custom-modal" id="addModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">{{ trans('main.Add') }} {{ trans('main.City') }}</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('city.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <!-- name -->
                    <div class="form-group">
                        <label for="name">{{ trans('main.Name') }}</label>
                        <input id="name" type="text" class="form-control name" name="name" value="{{ old('name') }}" placeholder="{{ trans('main.Name') }}" autocomplete="off" required>
                        <div class="valid-feedback">{{ trans('main.Looks Good') }}</div>
                        <div class="invalid-feedback">{{ trans('main.Error Here')}}</div>
                    </div>
                    <!-- country_id -->
                    <div class="form-group">
                        <label for="country_id" class="mr-sm-2">{{ trans('main.Country') }} :</label>
                        <select id="country_id" class="form-control select2" name="country_id">
                            @php
                                $countries = App\Models\Country::get(['id', 'name']);
                            @endphp
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
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
