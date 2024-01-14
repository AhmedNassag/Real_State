<?php

namespace App\Repositories\Dashboard\Branch;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use App\Notifications\BranchAdded;
use Illuminate\Support\Facades\Notification;
use App\Models\Notification as NotificationModel;

class BranchRepository implements BranchInterface
{

    public function index($request)
    {
        $data = Branch::with(['area'])
        ->when($request->name != null,function ($q) use($request){
            return $q->where('name','like', '%'.$request->name.'%');
        })
        ->when($request->area_id != null,function ($q) use($request){
            return $q->where('area_id', $request->area_id);
        })
        ->when($request->from_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '>=', $request->from_date);
        })
        ->when($request->to_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '<=', $request->to_date);
        })
        ->paginate(config('myConfig.paginationCount'));


        return view('dashboard.branch.index',compact('data'))
        ->with([
            'name'      => $request->name,
            'area_id'   => $request->area_id,
            'from_date' => $request->from_date,
            'to_date'   => $request->to_date,
        ]);
    }



    public function show($id)
    {
        $data = Branch::with(['area'])->findOrFail($id);
        return view('dashboard.branch.show', compact('data'));
    }



    public function store($request)
    {
        try {
            $validated = $request->validated();
            $inputs    = $request->all();
            //insert data
            $branch = Branch::create($inputs);
            if (!$branch) {
                session()->flash('error');
                return redirect()->back();
            }
            //send notification
            // $users = User::/*where('id', '!=', Auth::user()->id)->*/get();
            // Notification::send($users, new BranchAdded($branch->id));

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
            $branch = Branch::findOrFail($request->id);
            if (!$branch) {
                session()->flash('error');
                return redirect()->back();
            }
            $branch->update($inputs);
            if (!$branch) {
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
            // $related_table = realed_model::where('branch_id', $request->id)->pluck('branch_id');
            // if($related_table->count() == 0) {
                $branch = Branch::findOrFail($request->id);
                if (!$branch) {
                    session()->flash('error');
                    return redirect()->back();
                }
                $branch->delete();
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
            //     $related_table = realed_model::where('branch_id', $selected_id)->pluck('branch_id');
            //     if($related_table->count() == 0) {
                    $branches = Branch::whereIn('id', $delete_selected_id)->delete();
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
