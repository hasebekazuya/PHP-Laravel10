<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Profile;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        // dd("indexが呼ばれた");
        $posts =Profile::all()->sortByDesc('updated_at');
        
        if (count($posts) > 0 ) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        return view('admin.profile.index', ['headline' => $headline, 'posts' => $posts]);
    }
    public function edit(Request $request)
    {
        // dd("editが呼ばれた");
        $profile = Profile::find($request->id);
        if (empty($profile)) {
            abort(404);
        }
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }

    public function update(Request $request)
    {
        $this->validate($request,Profile::$rules);
        
        $profile = Profile::find($request->id);
        $profile_form = $request->all();
        
        unset ($profile_form['_token']);
        
        $profile->fill($profile_form)->save();
        
        $fix = new Fix();
        $fix->profile_id = $profile->id;
        $fix->edited_at = Carbon::now();
        $fix->save();
        
        return redirect('admin/profile/edit?id=' . $profile->id);
    }
}
