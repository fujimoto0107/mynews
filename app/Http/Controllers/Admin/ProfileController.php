<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;


class ProfileController extends Controller
{
  public function edit()
  {
      return view('admin.profile.edit');
  }

  public function update(Request $request)
  {
      // 以下を追記

      // Varidationを行う
      $this->validate($request, Profile::$rules);

      // 既存のプロフィールデータを削除
      Profile::truncate();

      $profile = new Profile;
      $form = $request->all();

      unset($form['_token']);

      $profile->fill($form);
      $profile->save();

      return redirect('admin/profile/edit');
  }
}