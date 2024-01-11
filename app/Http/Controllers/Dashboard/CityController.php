<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\City\CityInterface;
use App\Http\Requests\Dashboard\City\StoreRequest;
use App\Http\Requests\Dashboard\City\UpdateRequest;

class CityController extends Controller
{
    protected $city;

    public function __construct(CityInterface $city)
    {
        $this->city = $city;
    }



    public function index(Request $request)
    {
        return $this->city->index($request);
    }



    public function show($id)
    {
        return $this->city->show($id);
    }



    public function store(StoreRequest $request)
    {
        return $this->city->store($request);
    }



    public function update(UpdateRequest $request)
    {
        return $this->city->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->city->destroy($request);
    }



    public function deleteSelected(Request $request)
    {
        return $this->city->deleteSelected($request);
    }



    public function showNotification($route_id,$notification_id)
    {
        return $this->city->showNotification($route_id,$notification_id);
    }
}
