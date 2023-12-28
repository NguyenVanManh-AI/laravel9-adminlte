<?php

namespace Database\Seeders;

use App\Models\Admin;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pathFolder = 'public/storage/image/avatars/admins';
        if (!File::exists($pathFolder)) {
            File::makeDirectory($pathFolder, 0755, true);
        }

        $admins = [
            [
                'email' => 'vanmanh.dut@yopmail.com',
                'name' => 'Nguyễn Văn Mạnh',
                'role' => 'manager',
            ],

            [
                'email' => 'thuyduong9@yopmail.com',
                'name' => 'Trần Thị Thùy Dương',
                'role' => 'superadmin',
            ],
            [
                'email' => 'myandth99@yopmail.com',
                'name' => 'Nguyễn Thị Mỹ An',
                'role' => 'superadmin',
            ],
            [
                'email' => 'vanvu999@yopmail.com',
                'name' => 'Trần Văn Vũ',
                'role' => 'superadmin',
            ],
            [
                'email' => 'phanvanhoang99@yopmail.com',
                'name' => 'Phan Văn Hoàng',
                'role' => 'admin',
            ],
            [
                'email' => 'nganhim@yopmail.com',
                'name' => 'Ngân Hiim',
                'role' => 'admin',
            ],
            [
                'email' => 'kimthi@yopmail.com',
                'name' => 'Nguyễn Thị Kim Thi',
                'role' => 'admin',
            ],

        ];

        $pathFolder = 'storage/app/public/image/avatars/admins/';
        if (!File::exists($pathFolder)) {
            File::makeDirectory($pathFolder, 0755, true);
        }
        foreach ($admins as $index => $admin) {
            try {
                while (true) {
                    $client = new Client;
                    $response = $client->get('https://picsum.photos/200/200');
                    $imageContent = $response->getBody()->getContents();
                    $nameImage = uniqid() . '.jpg';
                    $avatar = $pathFolder . $nameImage;
                    if (file_put_contents($avatar, $imageContent)) {
                        $data = array_merge(
                            $admin,
                            [
                                'password' => Hash::make('123456'),
                                'avatar' => 'storage/image/avatars/admins/' . $nameImage,
                                'token_verify_email' => null,
                                'created_at' => now(),
                                'updated_at' => now(),
                                'email_verified_at' => now(),
                            ]
                        );
                        Admin::create($data);
                        break;
                    }
                }
            } catch (\Exception $e) {
            }
        }
    }
}
