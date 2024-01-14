<!-- Edit Modal -->
<div class="modal fade custom-modal" id="editModal{{$item->id}}">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header flex-wrap">
                <div class="text-center w-100 mb-3">
                    <img src="../assets_admin/img/logo-small.png" alt="">
                </div>
                <h4 class="modal-title">{{ trans('main.Edit') }} {{ trans('main.User') }}</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('user.update', 'test') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ trans('main.Name') }}</label>
                        <input id="name" class="name form-control" type="text" class="form-control" name="name" value="{{ $item->name }}" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="email">{{ trans('main.Email') }}</label>
                        <input id="email" class="email form-control" type="email" class="form-control" name="email" value="{{ $item->email }}" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="mobile">{{ trans('main.Mobile') }}</label>
                        <input id="mobile" class="mobile form-control" type="text" class="form-control" name="mobile" value="{{ $item->mobile }}" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="status">{{ trans('main.Status') }}</label>
                        <select id="status" class="status form-control form-select" name="status" required>
                            <option value="1" {{ $item->status == 1 ? 'selected' : ''}}>{{ trans('main.Active') }}</option>
                            <option value="0" {{ $item->status == 0 ? 'selected' : ''}}>{{ trans('main.InActive') }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="roles" class="form-label">{{ trans('main.Role') }} :</label>
                        {!! Form::select('roles[]', $roles,$item->roles, array('id' => 'roles', 'class' => 'form-control','multiple')) !!}
                    </div>
                    <!-- id -->
                    <div class="col-6">
                        <input id="id" type="hidden" name="id" class="form-control" value="{{ $item->id }}" autocomplete="off">
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary btn-block">{{ trans('main.Confirm') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit Modal -->
