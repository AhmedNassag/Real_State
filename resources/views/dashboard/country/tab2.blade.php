<div role="tabpanel" id="cities" class="tab-pane fade">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover mb-0">
                    @foreach ($data->cities as $city)
                        <tr>
                            <th>{{ trans('main.City') }}</th>
                            <td>{{ $city->name }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
