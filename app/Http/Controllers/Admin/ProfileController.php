<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\ProfileHistory;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {
         // Validationをかける
        $this->validate($request, Profile::$rules);
        $profiles = new Profile;
        $form = $request->all();
        
        unset($form['_token']);
        
        $profiles->fill($form);
        $profiles->save();
        
        return redirect('admin/profile/create');
    }
    //課題17にて追記
    public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          $posts = Profile::where('title', $cond_title)->get();
      } else {
          $posts = Profile::all();
      }
      return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
    

 public function edit(Request $request)
  {
      // profile Modelからデータを取得する
      $profile = Profile::find($request->id);
      if (empty($profile)) {
        abort(404);    
      }
      return view('admin.profile.edit', ['profile_form' => $profile]);
  }
    public function update(Request $request)
    {
         // Validationをかける
        $this->validate($request, Profile::$rules);
          //  Modelからデータを取得する
        $profile = Profile::find($request->id);
        // 送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        
       
      $profile->fill($profile_form)->save();
     
      $Profile_histories = new ProfileHistory;
      $Profile_histories->profile_id = $profile->id;
      $Profile_histories->edited_at = Carbon::now();
      $Profile_histories->save();

        
        return redirect('admin/profile/edit?id=' . $profile->id);
    }
  }