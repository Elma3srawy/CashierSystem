<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChangeRoleController extends Controller
{
    public function changeRole(Request $request)
    {
        $request->validate(['secret' => ['required' , 'string' , 'min:2' , 'max:50']]);
        if($request->secret === env('SECRET_KEY')){
            User::where('id' , '=' ,auth()->user()->id)->update(['SuperAdmin' => 1]);
            return back()->with('success','تم تغيير الصلاحيات بنجاح');
        }
        return back()->with('error','كل السر خطا');
    }
    public function deleteRole()
    {
        User::where('id' , '=' ,auth()->user()->id)->update(['SuperAdmin' => 0]);
        return back()->with('success','تم تغيير الصلاحيات بنجاح');
    }
}
