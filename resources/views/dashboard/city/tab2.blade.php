<div role="tabpanel" id="areas" class="tab-pane fade">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover mb-0">
                    @foreach ($data->areas as $area)
                        <tr>
                            <th>{{ trans('main.Area') }}</th>
                            <td>{{ $area->name }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
