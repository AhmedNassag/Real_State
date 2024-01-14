<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\Branch\BranchInterface;
use App\Http\Requests\Dashboard\Branch\StoreRequest;
use App\Http\Requests\Dashboard\Branch\UpdateRequest;

class BranchController extends Controller
{
    protected $branch;

    public function __construct(BranchInterface $branch)
    {
        $this->branch = $branch;
    }



    public function index(Request $request)
    {
        return $this->branch->index($request);
    }



    public function show($id)
    {
        return $this->branch->show($id);
    }



    public function store(StoreRequest $request)
    {
        return $this->branch->store($request);
    }



    public function update(UpdateRequest $request)
    {
        return $this->branch->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->branch->destroy($request);
    }



    public function deleteSelected(Request $request)
    {
        return $this->branch->deleteSelected($request);
    }



    public function showNotification($route_id,$notification_id)
    {
        return $this->branch->showNotification($route_id,$notification_id);
    }
}
