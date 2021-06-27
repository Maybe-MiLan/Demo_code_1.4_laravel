<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationsController extends Controller
{
    public function createView()
    {
        return view('application.create', [
            'categories' => Category::all(),
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'desc' => 'required|string',
            'category' => 'required',
            'photoPath' => 'required|file',
        ]);

        $photoPath = $request->file('photoPath')->store('images', 'public');

        Applications::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'category' => $request->category,
            'photoPath' => $photoPath,
            'user_id' => Auth::id(),
        ]);

        return back();
    }

    public function my()
    {
        return view('myapplication', [
            'applications' => Applications::all()->where('user_id', Auth::id())
        ]);
    }

    public function delete(Applications $applications)
    {
        $applications->delete();
        return back();
    }

    public function next(Applications $applications)
    {
        $applications->status = 'Решено';
        $applications->save();
        return back();
    }

    public function prev(Applications $applications)
    {
        $applications->status = 'Отклонена';
        $applications->save();
        return back();
    }

    public function adminapp() {
        return view('adminapplications', [
            'applications' => Applications::all()
        ]);
    }
}
