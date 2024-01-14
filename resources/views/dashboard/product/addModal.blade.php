<!-- Start Modal -->
<div class="modal fade custom-modal" id="addModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">{{ trans('main.Add') }} {{ trans('main.Product') }}</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <!-- name -->
                    <div class="form-group">
                        <label for="name">{{ trans('main.Name') }}</label>
                        <input id="name" type="text" class="form-control name" name="name" value="{{ old('name') }}" placeholder="{{ trans('main.Name') }}" autocomplete="off" required>
                        <div class="valid-feedback">{{ trans('main.Looks Good') }}</div>
                        <div class="invalid-feedback">{{ trans('main.Error Here')}}</div>
                    </div>

                    <!-- price -->
                    <div class="form-group">
                        <label for="price">{{ trans('main.Price') }}</label>
                        <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}" placeholder="{{ trans('main.Price') }}" autocomplete="off" required>
                        <div class="valid-feedback">{{ trans('main.Looks Good') }}</div>
                        <div class="invalid-feedback">{{ trans('main.Error Here')}}</div>
                    </div>

                    <!-- category_id -->
                    <div class="form-group">
                        <label for="category_id" class="mr-sm-2">{{ trans('main.Category') }} :</label>
                        <select id="category_id" class="form-control select2" name="category_id">
                            <option value="">{{ trans('main.Choose') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- file -->
                    <div class="form-group">
                        <label for="file">{{ trans('main.Photo') }}</label>
                        <input id="file" type="file" class="form-control" name="file" value="{{ old('file') }}" placeholder="{{ trans('main.Photo') }}">
                        <div class="valid-feedback">{{ trans('main.Looks Good') }}</div>
                        <div class="invalid-feedback">{{ trans('main.Error Here')}}</div>
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
