<?php

namespace App\Repositories\Dashboard\Country;

use App\Models\User;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CountryAdded;
use Illuminate\Support\Facades\Notification;
use App\Models\Notification as NotificationModel;

class CountryRepository implements CountryInterface
{

    public function index($request)
    {
        $data = Country::
        when($request->name != null,function ($q) use($request){
            return $q->where('name','like', '%'.$request->name.'%');
        })
        ->when($request->from_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '>=', $request->from_date);
        })
        ->when($request->to_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '<=', $request->to_date);
        })
        ->paginate(config('myConfig.paginationCount'));

        return view('dashboard.country.index',compact('data'))
        ->with([
            'name'      => $request->name,
            'from_date' => $request->from_date,
            'to_date'   => $request->to_date,
        ]);
    }



    public function show($id)
    {
        $data = Country::with(['cities'])->findOrFail($id);
        
        return view('dashboard.country.show', compact('data'));
    }



    public function store($request)
    {
        try {
            $validated = $request->validated();
            $inputs    = $request->all();
            //insert data
            $country = Country::create($inputs);
            if (!$country) {
                session()->flash('error');
                return redirect()->back();
            }
            //send notification
            // $users = User::/*where('id', '!=', Auth::user()->id)->*/get();
            // Notification::send($users, new CountryAdded($country->id));

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
            $country   = Country::findOrFail($request->id);
            if (!$country) {
                session()->flash('error');
                return redirect()->back();
            }
            $country->update($inputs);
            if (!$country) {
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
            // $related_table = realed_model::where('country_id', $request->id)->pluck('country_id');
            // if($related_table->count() == 0) {
                $country = Country::findOrFail($request->id);
                if (!$country) {
                    session()->flash('error');
                    return redirect()->back();
                }
                $country->delete();
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
            //     $related_table = realed_model::where('country_id', $selected_id)->pluck('country_id');
            //     if($related_table->count() == 0) {
                    $countries = Country::whereIn('id', $delete_selected_id)->delete();
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
