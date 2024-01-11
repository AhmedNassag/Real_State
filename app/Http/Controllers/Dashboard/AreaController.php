<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\Area\AreaInterface;
use App\Http\Requests\Dashboard\Area\StoreRequest;
use App\Http\Requests\Dashboard\Area\UpdateRequest;

class AreaController extends Controller
{
    protected $area;

    public function __construct(AreaInterface $area)
    {
        $this->area = $area;
    }



    public function index(Request $request)
    {
        return $this->area->index($request);
    }



    public function show($id)
    {
        return $this->area->show($id);
    }



    public function store(StoreRequest $request)
    {
        return $this->area->store($request);
    }



    public function update(UpdateRequest $request)
    {
        return $this->area->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->area->destroy($request);
    }



    public function deleteSelected(Request $request)
    {
        return $this->area->deleteSelected($request);
    }



    public function showNotification($route_id,$notification_id)
    {
        return $this->area->showNotification($route_id,$notification_id);
    }
}
