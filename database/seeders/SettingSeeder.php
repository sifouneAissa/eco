<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    public $settings  = [
        [
            'name' => 'Company name',
            'code' => 'company_name',
            'content' => 'Cover data eco',
        ],
        [
            'name' => 'Phone',
            'code' => 'phone',
            'content' => '+971 55 302 4498',
        ],
        [
            'name' => 'Email',
            'code' => 'email',
            'content' => 'example@example.com',
        ],
        [
            'name' => 'Address',
            'code' => 'address',
            'content' => 'Dubai, UAE',
        ],
        [
            'name' => 'Facebook',
            'code' => 'facebook_link',
            'content' => '',
        ],
        [
            'name' => 'Instagram',
            'code' => 'instagram_link',
            'content' => '',
        ],
        [
            'name' => 'Twitter',
            'code' => 'twitter_link',
            'content' => '',
        ],
        [
            'name' => 'Max inventory value',
            'code' => 'max_inventory_value',
            'content' => 100,
        ],
        [
            'name' => 'Logo',
            'code' => 'logo',
            'content' => '',
        ],
        [
            'name' => 'Login page image',
            'code' => 'login_image',
            'content' => '',
        ],
        [
            'name' => 'Register page image',
            'code' => 'register_image',
            'content' => '',
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach ($this->settings as $setting){
            $exist = Setting::where('code',$setting['code'])->first();

            if($exist){
                $exist->update([
                    'name' => $setting['name'],
                    'code' => $setting['code']
                ]);
            }
            else
                Setting::query()->create($setting);
        }
    }
}
