<?php

namespace App\Repositories\Dashboard\City;

use App\Models\User;
use App\Models\City;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CityAdded;
use Illuminate\Support\Facades\Notification;
use App\Models\Notification as NotificationModel;

class CityRepository implements CityInterface
{

    public function index($request)
    {
        $data = City::with(['country'])
        ->when($request->name != null,function ($q) use($request){
            return $q->where('name','like', '%'.$request->name.'%');
        })
        ->when($request->country_id != null,function ($q) use($request){
            return $q->where('country_id', $request->country_id);
        })
        ->when($request->from_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '>=', $request->from_date);
        })
        ->when($request->to_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '<=', $request->to_date);
        })
        ->paginate(config('myConfig.paginationCount'));


        return view('dashboard.city.index',compact('data'))
        ->with([
            'name'       => $request->name,
            'country_id' => $request->country_id,
            'from_date'  => $request->from_date,
            'to_date'    => $request->to_date,
        ]);
    }



    public function show($id)
    {
        $data = City::with(['country', 'areas'])->findOrFail($id);
        return view('dashboard.city.show', compact('data'));
    }



    public function store($request)
    {
        try {
            $validated = $request->validated();
            $inputs    = $request->all();
            //insert data
            $city = City::create($inputs);
            if (!$city) {
                session()->flash('error');
                return redirect()->back();
            }
            //send notification
            // $users = User::/*where('id', '!=', Auth::user()->id)->*/get();
            // Notification::send($users, new CityAdded($city->id));

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
            $city = City::findOrFail($request->id);
            if (!$city) {
                session()->flash('error');
                return redirect()->back();
            }
            $city->update($inputs);
            if (!$city) {
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
            // $related_table = realed_model::where('city_id', $request->id)->pluck('city_id');
            // if($related_table->count() == 0) {
                $city = City::findOrFail($request->id);
                if (!$city) {
                    session()->flash('error');
                    return redirect()->back();
                }
                $city->delete();
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
            //     $related_table = realed_model::where('city_id', $selected_id)->pluck('city_id');
            //     if($related_table->count() == 0) {
                    $cities = City::whereIn('id', $delete_selected_id)->delete();
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
