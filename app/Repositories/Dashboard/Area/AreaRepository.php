<?php

namespace App\Repositories\Dashboard\Area;

use App\Models\User;
use App\Models\Area;
use Illuminate\Support\Facades\Auth;
use App\Notifications\AreaAdded;
use Illuminate\Support\Facades\Notification;
use App\Models\Notification as NotificationModel;

class AreaRepository implements AreaInterface
{

    public function index($request)
    {
        $data = Area::with(['city'])
        ->when($request->name != null,function ($q) use($request){
            return $q->where('name','like', '%'.$request->name.'%');
        })
        ->when($request->city_id != null,function ($q) use($request){
            return $q->where('city_id', $request->city_id);
        })
        ->when($request->from_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '>=', $request->from_date);
        })
        ->when($request->to_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '<=', $request->to_date);
        })
        ->paginate(config('myConfig.paginationCount'));


        return view('dashboard.area.index',compact('data'))
        ->with([
            'name'       => $request->name,
            'city_id'    => $request->city_id,
            'from_date'  => $request->from_date,
            'to_date'    => $request->to_date,
        ]);
    }



    public function show($id)
    {
        $data = Area::with(['city.country'])->findOrFail($id);
        return view('dashboard.area.show', compact('data'));
    }



    public function store($request)
    {
        try {
            $validated = $request->validated();
            $inputs    = $request->all();
            //insert data
            $area = Area::create($inputs);
            if (!$area) {
                session()->flash('error');
                return redirect()->back();
            }
            //send notification
            // $users = User::/*where('id', '!=', Auth::user()->id)->*/get();
            // Notification::send($users, new AreaAdded($area->id));

            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function update($request)
    {
        try {
            $validated = $request->validated();
            $inputs    = $request->all();
            $area      = Area::findOrFail($request->id);
            if (!$area) {
                session()->flash('error');
                return redirect()->back();
            }
            $area->update($inputs);
            if (!$area) {
                session()->flash('error');
                return redirect()->back();
            }
            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function destroy($request)
    {
        try {
            // $related_table = realed_model::where('area_id', $request->id)->pluck('area_id');
            // if($related_table->count() == 0) {
                $area = Area::findOrFail($request->id);
                if (!$area) {
                    session()->flash('error');
                    return redirect()->back();
                }
                $area->delete();
                session()->flash('success');
                return redirect()->back();
            // } else {
                // session()->flash('canNotDeleted');
                // return redirect()->back();
            // }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function deleteSelected($request)
    {
        try {
            $delete_selected_id = explode(",", $request->delete_selected_id);
            // foreach($delete_selected_id as $selected_id) {
            //     $related_table = realed_model::where('area_id', $selected_id)->pluck('area_id');
            //     if($related_table->count() == 0) {
                    $areas = Area::whereIn('id', $delete_selected_id)->delete();
                    session()->flash('success');
                    return redirect()->back();
            //     } else {
            //         session()->flash('canNotDeleted');
            //         return redirect()->back();
            //     }
            // }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function showNotification($id,$notification_id)
    {
        $notification = NotificationModel::findOrFail($notification_id);
        $notification->update([
            'read_at' => now(),
        ]);

        return $this->show($id);
    }

}
