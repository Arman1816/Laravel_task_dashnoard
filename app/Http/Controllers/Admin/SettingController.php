<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditSettingRequest;
use App\Http\Requests\StoreSettingRequest;
use App\Models\Setting;

class SettingController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $settings = Setting::get();
        return view('admin.setting.index',compact('settings'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.setting.create');
    }

    /**
     * @param StoreSettingRequest $request
     * @return $this
     */
    public function store(StoreSettingRequest $request)
    {
        $data = $request->all();

        Setting::create([
           'app_name' => $data['app_name'],
           'url' => $data['url'],
           'consumer_key' => $data['consumer_key'],
           'consumer_secret' => $data['consumer_secret'],
           'token' => $data['token'],
           'active' => $data['active'],
        ]);

        return redirect()->route('admin.setting.index')->with('message_success', 'Setting created successfully.');
    }

    /**
     * @param $id
     */
    public function show($id)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('admin.setting.edit',compact('setting'));

    }

    /**
     * @param EditSettingRequest $request
     * @param $id
     * @return $this
     */
    public function update(EditSettingRequest $request, $id)
    {
        $data = $request->all();

        $setting =  Setting::findOrFail($id);

        $params = [
            'app_name' => $data['app_name'],
            'url' => $data['url'],
            'consumer_key' => $data['consumer_key'],
            'consumer_secret' => $data['consumer_secret'],
            'token' => $data['token'],
            'active' => $data['active'],
        ];

        $setting->update($params);
        return redirect()->route('admin.setting.index')->with('message_success', 'Setting edit successfully.');
    }

    /**
     * @param $id
     * @return $this
     */
    public function destroy($id)
    {
        $setting = Setting::find($id);
        $setting->delete();
        return redirect()->route('admin.setting.index')->with('message_success', 'Setting deleted successfully!');
    }
}
