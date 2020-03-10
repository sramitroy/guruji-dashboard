<?php

namespace App\Http\Controllers\admin;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Form;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.setting.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'email'               => 'required|email',
            'address'             => 'required',
            'logo'                => 'image',
            'favicon'             => 'file|mimes:jpeg,png,jpg,ico'
        ];

        $request->validate($rules, [], []);
        
        $data = array(
                        array('key'=>'email','value'=>$request->email),
                        array('key'=>'address','value'=>$request->address),
                        array('key'=>'logo','value'=>$request->logo),
                        array('key'=>'facebook_url','value'=>$request->facebook_url),
                        array('key'=>'instagram_url','value'=>$request->instagram_url),
                        array('key'=>'twitter_url','value'=>$request->twitter_url),
                        array('key'=>'linkedin_url','value'=>$request->linkedin_url),
                        array('key'=>'favicon','value'=>$request->favicon)
                    );
        if (!empty($data)) {
            foreach ($data as $row) {
                if ($row['key']=='logo') {
                    if ($file = $request->hasFile('logo')){
                        $file = $request->file('logo');
                        $customimagename  = time() . 'logo.' . $file->getClientOriginalExtension();
                        $destinationPath = public_path().config('constants.SETTING_IMAGE_URL');
                        $upload = $file->move($destinationPath, $customimagename);
                        $setting=Setting::where(array('key'=>$row['key']))->first();
                        if (isset($setting->value) && $setting->value!='' && file_exists(public_path().config('constants.SETTING_IMAGE_URL').$setting->value)) {
                            unlink(public_path().config('constants.SETTING_IMAGE_URL').$setting->value);
                        }
                        $row['value'] = $customimagename;
                    } 
                }else if ($row['key']=='favicon') {
                    if ($file = $request->hasFile('favicon')){
                        $file = $request->file('favicon');
                        $customimagename  = time() . 'favicon.' . $file->getClientOriginalExtension();
                        $destinationPath = public_path().config('constants.SETTING_IMAGE_URL');
                        $upload = $file->move($destinationPath, $customimagename);
                        $setting=Setting::where(array('key'=>$row['key']))->first();
                        if (isset($setting->value) && $setting->value!='' && file_exists(public_path().config('constants.SETTING_IMAGE_URL').$setting->value)) {
                            unlink(public_path().config('constants.SETTING_IMAGE_URL').$setting->value);
                        }
                        $row['value'] = $customimagename;
                    }
                }
                if (isset($row['value']) && $row['value']!='') {
                    setSetting($row['key'],$row['value']);
                }else{
                    if ($row['key']!='favicon' && $row['key']!='logo') {
                        Setting::where('key',$row['key'])->delete();
                    }    
                }
            }
        }
        $request->session()->flash('success',__('global.messages.update'));
        return redirect()->route('admin.settings.index');
    }
}