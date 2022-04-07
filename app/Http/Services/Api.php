<?php

namespace App\Http\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Http;

class Api
{

    /**
     * @param $search
     * @return \Illuminate\Http\JsonResponse|string
     */
    public static function getApiResponse($search)
    {
        $setting = Setting::where('active', 1)->first();

        if($setting){

            if($setting->app_name == 'Shutterstock'){

                $response =  Http::withToken($setting->token)->get($setting->url, ["query" => $search]);
                if($response->status() == 200){
                    return  $response->json()['data'];
                }else{
                    return $response->body();
                }

            }elseif($setting->app_name == 'Storyblocks'){

                $publicKey = $setting->consumer_key;
                $privateKey = $setting->consumer_secret;
                $expires = time() + 100;
                $data = str_replace("https://api.graphicstock.com","",$setting->url);
                $hmac = hash_hmac("sha256", $data, $privateKey . $expires);
                $response = Http::get('https://api.graphicstock.com/api/v2/images/search', [
                    'APIKEY' => $publicKey,
                    'EXPIRES' => $expires,
                    'HMAC' => $hmac,
                    'project_id' => auth()->user()->id,
                    'user_id' => auth()->user()->id,
                    'keywords' => $search,
                ]);

                if($response->status() == 200){
                  return  $response->json()['results'];
                }else{
                    return $response->body();
                }
            }
        }

        return response()->json([]);
    }
}
