<!-- Add Modal -->
<div class="modal fade custom-modal" id="addModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header flex-wrap">
                <div class="text-center w-100 mb-3">
                    <img src="../assets_admin/img/logo-small.png" alt="">
                </div>
                <h4 class="modal-title">{{ trans('main.Add') }} {{ trans('main.User') }}</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <div class="modal-body">
                <ul id="error_list"></ul>
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ trans('main.Name') }}</label>
                        <input id="name" class="name form-control" type="text" class="form-control" name="name" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="email">{{ trans('main.Email') }}</label>
                        <input id="email" class="email form-control" type="email" class="form-control" name="email" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="mobile">{{ trans('main.Mobile') }}</label>
                        <input id="mobile" class="mobile form-control" type="text" class="form-control" name="mobile" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password">{{ trans('main.Password') }}</label>
                        <input id="password" class="password form-control" type="password" class="form-control" name="password" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">{{ trans('main.Confirm') }} {{ trans('main.Password') }}</label>
                        <input id="confirm-password" class="confirm-password form-control" type="password" class="form-control" name="confirm-password" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="status">{{ trans('main.Status') }}</label>
                        <select id="status" class="status form-control form-select" name="status" required>
                            <option value="1">{{ trans('main.Active') }}</option>
                            <option value="0">{{ trans('main.InActive') }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="roles_name" class="form-label">{{ trans('main.Role') }} :</label>
                        {!! Form::select('roles_name[]', $roles,[], array('id' => 'roles_name', 'class' => 'form-control','multiple')) !!}
                    </div>
                    <div class="mt-4">
                        <button id="storeBtn" type="submit" class="btn btn-primary btn-block">{{ trans('main.Confirm') }}</button>
                    </div>
                </from>
            </div>
        </div>
    </div>
</div>
<!-- Add Modal -->
