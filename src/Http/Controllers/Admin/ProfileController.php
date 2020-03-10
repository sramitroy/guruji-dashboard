<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $rules = [
            'name'          => 'required',
            'email'               => ['required', 'string', 'email', Rule::unique('users', 'email')->ignore($user->getKey())],
            'profile_picture'     => 'image'
        ];

        $reset_password = $request->input('reset_password');
        if($reset_password==TRUE){
            $rules['old_password'] = 'required';
            $rules['password'] = 'required|confirmed';
        }
        
        $data = $request->all();
        $validator = Validator::make($data, $rules);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        if($reset_password==TRUE){
            if (!Hash::check($request->input('old_password'), $user->password)) { 
                $validator->errors()->add('old_password', __('global.messages.password_mismatch'));
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data['password'] = Hash::make($request->input('password'));
        }else{
            unset($data['password']);
        }

        if ($file = $request->hasFile('profile_picture')){
            $file = $request->file('profile_picture');
            $profile_picture  = time() . 'profile_picture.' . $file->getClientOriginalExtension();
            $destinationPath = public_path().config('constants.USERS_UPLOADS_PATH');
            $upload = $file->move($destinationPath, $profile_picture);
            $old_profile_picture = isset($user->profile_picture)?$user->profile_picture:'';
            if (isset($old_profile_picture) && $old_profile_picture!='' && file_exists(public_path().config('constants.USERS_UPLOADS_PATH').$old_profile_picture)) {
                unlink(public_path().config('constants.USERS_UPLOADS_PATH').$old_profile_picture);
            }
            $data['profile_picture'] = $profile_picture;
        }
        $user->update($data);

        $request->session()->flash('success',__('global.messages.update'));
        return redirect()->route('admin.profile.index');
    }
}
