<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Durian_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function check(){
        return view('admin.check');
    }

    public function infoAll()
    {
        $user = User::where('role', '!=', 'Admin')->with('Durian_detail')->get();

        // dd($user->toArray());
        return view('admin.infoall', compact('user'));
    }

    public function delete($id)
    {
        Durian_detail::where('id', $id)->delete();

        // dd($id);
        return redirect()->back();
    }

    public function change($id)
    {
        $durian = Durian_detail::find($id);
        $data = [
            'status' => !$durian->status
        ];
        $durian = Durian_detail::find($id)->update($data);
        return redirect()->back();
    }
}
