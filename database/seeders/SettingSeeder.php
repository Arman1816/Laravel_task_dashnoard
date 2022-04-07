<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'app_name' => 'Shutterstock',
                'url' => 'https://api.shutterstock.com/v2/images/search',
                'consumer_key' => 'qis5kJ4eqSTK6N5khq597pzq3I9ETvxK',
                'consumer_secret' => 'cwqo4d8XGL4nfP8l',
                'token' => 'v2/cWlzNWtKNGVxU1RLNk41a2hxNTk3cHpxM0k5RVR2eEsvMzI3NTA0NzM0L2N1c3RvbWVyLzQvWWdRQjc5bU1LR2ZCMmw2T2VxbXlocmMzT1NETklTYzBSOXRJUW1HLUl1Nnl4ZjVrMmVmdG5SVm9GdS1OcTVMOHJBUW14cDh3Uk9FSjRxX2lnS1BIWlRxZk9LcnRfdTZ3TGxJTGpQMHJzUEQybGo2NHpuci1pRG1oTHV3VHpsbVZBYlktT2JJa2JnY1RKaGJWSmR1anRMQmk1Y3E2NFBsQVNYWHlOZVB1SHFHVFRQQ3BDa0FZVFBUcGtDemdDeDZ2QVFLZUJ4VG1kd2lWUVk3WjRwSGRLQS85V0VxWl94LVRFeVhRMFAtVjB2RkFR',
                'active' => 0,
            ],

            [
                'app_name' => 'Storyblocks',
                'url' => 'https://api.graphicstock.com/api/v2/images/search',
                'consumer_key' => 'test_9785f43414b3075b85a8023b09a9cba90c0094779c4892c6deef32273dc',
                'consumer_secret' => 'test_d8783295915e5fa6bb49db64ab71d2ad2dcc9cb00975233b5c66fd25cdb',
                'token' => null,
                'active' => 1,
            ]
        ]);
    }
}
