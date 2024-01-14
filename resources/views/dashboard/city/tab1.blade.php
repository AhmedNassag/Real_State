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
                        <th>{{ trans('main.Country') }}</th>
                        <td>{{ @$data->country->name }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
