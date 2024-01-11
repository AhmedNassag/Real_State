<!-- Start Modal -->
<div class="modal fade custom-modal" id="editModal{{ $item->id }}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">{{ trans('main.Edit') }} {{ trans('main.Area') }}</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('area.update', 'test') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    {{ method_field('patch') }}
                    @csrf
                    <!-- name -->
                    <div class="form-group">
                        <label for="name">{{ trans('main.Name') }}</label>
                        <input id="name" class="form-control" type="text" name="name" placeholder="{{ trans('main.Name') }}"  value="{{ old('name', $item->name) }}" autocomplete="off" required>
                        <div class="valid-feedback">{{ trans('main.Looks Good') }}</div>
                        <div class="invalid-feedback">{{ trans('main.Error Here')}}</div>
                    </div>
                    <!-- city_id -->
                    <div class="form-group">
                        <label for="city_id" class="mr-sm-2">{{ trans('main.City') }} :</label>
                        <select id="city_id" class="form-control select2" name="city_id">
                            @php
                                $cities = App\Models\City::get(['id','name']);
                            @endphp
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}" {{ $item->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- id -->
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="id" value="{{ $item->id }}" autocomplete="off">
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
