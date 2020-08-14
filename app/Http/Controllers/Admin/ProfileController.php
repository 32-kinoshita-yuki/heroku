<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//
use App\Profile;

class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
        //Validationを行う
        $this->validate($request,profile::$rules);
        $profile = new profile;
        $form = $request->all();
        
        // データベースの保存する
        $profile->fill($form);
        $profile->save();
        
        return redirect('admin/profile/create');
        
    }

    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update()
    {
        return redirect('admin/profile/edit');
    }
}
