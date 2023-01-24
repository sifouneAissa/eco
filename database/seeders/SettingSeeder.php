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
            'content' => 'Himpies',
        ],
        [
            'name' => 'Company description',
            'code' => 'company_description',
            'content' => 'Himpies is a hemp brand powered by SESHATA. Based in United Arab Emirates.We bring the best quality of HEMP products over the world to you.',
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
            'content' => 'https://www.facebook.com/himpies/',
        ],
        [
            'name' => 'Instagram',
            'code' => 'instagram_link',
            'content' => 'https://www.instagram.com/himpies/',
        ],
        [
            'name' => 'Youtube',
            'code' => 'youtube_link',
            'content' => 'https://www.youtube.com/channel/UCLMrtOqRr7kCn8uBvEAX9eQ?view_as=subscriber',
        ],
        [
            'name' => 'Twitter',
            'code' => 'twitter_link',
            'content' => 'https://twitter.com/Himpies_dxb',
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
        ],
        [
            'name' => 'Home page sub header 1',
            'code' => 'home_page_sub_header_1',
            'content' => " your life style"
        ],
        [
            'name' => 'Home page header 1',
            'code' => 'home_page_header_1',
            'content' => "it's time to change"
        ],
        [
            'name' => 'Home page header 2',
            'code' => 'home_page_header_2',
            'content' => "Hemp for life"
        ],
        [
            'name' => 'Home page sub header 3',
            'code' => 'home_page_sub_header_3',
            'content' => 'Our CBD oil stimulates the body’s endocannabinoid system and supports the immune system, vitality and well-being'
        ],
        [
            'name' => 'Home page header 3',
            'code' => 'home_page_header_3',
            'content' => 'IT\'S TIME TO CHANGE YOUR LIFESTYLE'
        ],
        [
            'name' => 'Home page section 1 sub header 1',
            'code' => 'home_page_section_1_sub_header_1',
            'content' => 'Provide the best'
        ],
        [
            'name' => 'Home page section 1  header 1',
            'code' => 'home_page_section_1_header_1',
            'content' => 'Why CBD oil?'
        ],
        [
            'name' => 'Home page section 1 description 1',
            'code' => 'home_page_section_1_description_1',
            'content' => 'CBD, short for cannabidiol, is a chemical compound from the cannabis plant. It’s a naturally occurring substance that’s used in our oil. It leads to a feeling of relaxation and calm, unlike the THC (short for tetrahydrocannabinol) it’s not psychoactive.'
        ],
        [
            'name' => 'Home page section 1 description 2',
            'code' => 'home_page_section_1_description_2',
            'content' => 'Some of our customer say\'s that they trust us and buy our product without any hagitation because they belive us and always happy'
        ],
        [
            'name' => 'Home page section 2 header left',
            'code' => 'home_page_section_2_header_left',
            'content' => 'Luscious'
        ],
        [
            'name' => 'Home page section 2 header 2 left',
            'code' => 'home_page_section_2_header_2_left',
            'content' => 'Beard?'
        ],
        [
            'name' => 'Home page section 2 header right',
            'code' => 'home_page_section_2_header_right',
            'content' => 'Just'
        ],
        [
            'name' => 'Home page section 2 header 2 right',
            'code' => 'home_page_section_2_header_2_right',
            'content' => 'Starting?'
        ],
        [
            'name' => 'Home page section 3 header',
            'code' => 'home_page_section_3_header',
            'content' => 'Our Products'
        ],
        [
            'name' => 'Home page section 3 sub header',
            'code' => 'home_page_section_3_sub_header',
            'content' => 'There are many variations of passages of Lorem Ipsum available.'
        ],

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
