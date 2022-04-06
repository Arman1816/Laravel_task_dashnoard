<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::get();
        return view('admin.setting.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data,
            [
                'app_name' => 'required',
                'consumer_key' => 'required',
                'consumer_secret' => 'required',
                'active' => 'required',
            ]);

        if ($validator->fails()) {
            return redirect()->route('admin.setting.create')
                ->withErrors($validator)
                ->withInput();
        }

        Setting::create([
           'app_name' => $data['app_name'],
           'consumer_key' => $data['consumer_key'],
           'consumer_secret' => $data['consumer_secret'],
           'active' => $data['active'],
        ]);

        return redirect()->route('admin.setting.index')->with('message_success', 'Setting created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('admin.setting.edit',compact('setting'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $setting = Setting::find($id);

        $validator = Validator::make($data,
            [
                'app_name' => 'required',
                'consumer_key' => 'required',
                'consumer_secret' => 'required',
                'active' => 'required',
            ]);


        if ($validator->fails()) {
            return redirect()->route('admin.setting.create')
                ->withErrors($validator)
                ->withInput();
        }

        Setting::findOrFail($id);

        $params = [
            'app_name' => $data['app_name'],
            'consumer_key' => $data['consumer_key'],
            'consumer_secret' => $data['consumer_secret'],
            'active' => $data['active'],
        ];

        $setting->update($params);
        return redirect()->route('admin.setting.index')->with('message_success', 'Setting edit successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Setting::find($id);
        $setting->delete();

        return redirect()->route('admin.setting.index')->with('message_success', 'Setting deleted successfully!');
    }
}
