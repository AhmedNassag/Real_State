<div role="tabpanel" id="main" class="tab-pane fade show active">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover mb-0">
                    <tr>
                        <th>{{ trans('main.Name') }}</th>
                        <td>{{ @$data->name }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('main.First Phone') }}</th>
                        <td>{{ @$data->firstPhone }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('main.Second Phone') }}</th>
                        <td>{{ @$data->secondPhone }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('main.Address') }}</th>
                        <td>{{ @$data->address }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('main.Area') }}</th>
                        <td>{{ @$data->area->name }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('main.City') }}</th>
                        <td>{{ @$data->area->city->name }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('main.Country') }}</th>
                        <td>{{ @$data->area->city->country->name }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
