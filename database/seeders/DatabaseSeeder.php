<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('users')->insert([
            'id' => Str::uuid(),
            'username'=>'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $multipleresident = [
            ['id'=>65578, 'name'=>'Afiq', 'phone'=>'016-8977665', 'roomNumber'=> 'A901', 'faculty'=>'FCSIT', 'created_at'=>now(), 'updated_at'=>now()],
            ['id'=>61488, 'name'=>'Azman', 'phone'=>'018-9807885', 'roomNumber'=> 'B001', 'faculty'=>'FSGK', 'created_at'=>now(), 'updated_at'=>now()],
            ['id'=>54467, 'name'=>'Michelle', 'phone'=>'011-8975509', 'roomNumber'=> 'C998', 'faculty'=>'FK', 'created_at'=>now(), 'updated_at'=>now()],
            ['id'=>60806, 'name'=>'Logan', 'phone'=>'010-6546336', 'roomNumber'=> 'C119', 'faculty'=>'FCSIT', 'created_at'=>now(), 'updated_at'=>now()],
            ['id'=>65030, 'name'=>'Bob', 'phone'=>'013-6567007', 'roomNumber'=> 'D002', 'faculty'=>'FEB', 'created_at'=>now(), 'updated_at'=>now()],
            ['id'=>56673, 'name'=>'Otto', 'phone'=>'012-4347777', 'roomNumber'=> 'A765', 'faculty'=>'FEB', 'created_at'=>now(), 'updated_at'=>now()],
            ['id'=>66634, 'name'=>'Kevin', 'phone'=>'015-9880112', 'roomNumber'=> 'A716', 'faculty'=>'FSTS', 'created_at'=>now(), 'updated_at'=>now()],
            ['id'=>51123, 'name'=>'Gary', 'phone'=>'017-0090880', 'roomNumber'=> 'D108', 'faculty'=>'FSKPM', 'created_at'=>now(), 'updated_at'=>now()],
            ['id'=>64445, 'name'=>'Pang', 'phone'=>'011-1876551', 'roomNumber'=> 'C002', 'faculty'=>'FK', 'created_at'=>now(), 'updated_at'=>now()],
            ['id'=>69907, 'name'=>'Manisha', 'phone'=>'014-3440990', 'roomNumber'=> 'A007', 'faculty'=>'FEB', 'created_at'=>now(), 'updated_at'=>now()],
            
        ];

        $multiplecar = [
            ['resident_ID'=>65578, 'plateNumber'=>'QKP 7688', 'carType'=>'VAN', 'carColour'=>'Grey', 'created_at'=>now(), 'updated_at'=>now()],
            ['resident_ID'=>61488, 'plateNumber'=>'SD 8670 R', 'carType'=>'PERODUA BEZZA', 'carColour'=>'Grey', 'created_at'=>now(), 'updated_at'=>now()],
            ['resident_ID'=>54467, 'plateNumber'=>'QTC 5707', 'carType'=>'PROTON SAGA', 'carColour'=>'Black', 'created_at'=>now(), 'updated_at'=>now()],
            ['resident_ID'=>60806, 'plateNumber'=>'QKR 6149', 'carType'=>'PROTON SAGA', 'carColour'=>'White', 'created_at'=>now(), 'updated_at'=>now()],
            ['resident_ID'=>65030, 'plateNumber'=>'QAN 1981', 'carType'=>'PROTON SAGA', 'carColour'=>'Blue', 'created_at'=>now(), 'updated_at'=>now()],
            ['resident_ID'=>56673, 'plateNumber'=>'QRR 5302', 'carType'=>'PERODUA BEZZA', 'carColour'=>'Brown', 'created_at'=>now(), 'updated_at'=>now()],
            ['resident_ID'=>66634, 'plateNumber'=>'QAA 4543 Q', 'carType'=>'PERODUA AXIA', 'carColour'=>'Green', 'created_at'=>now(), 'updated_at'=>now()],
            ['resident_ID'=>51123, 'plateNumber'=>'WNW 1266', 'carType'=>'PROTON WAJA', 'carColour'=>'Brown', 'created_at'=>now(), 'updated_at'=>now()],
            ['resident_ID'=>64445, 'plateNumber'=>'JSX 7115', 'carType'=>'MITSUBISHI TRITON', 'carColour'=>'Grey', 'created_at'=>now(), 'updated_at'=>now()],
            ['resident_ID'=>69907, 'plateNumber'=>'QAA 6214 Y', 'carType'=>'PERODUA AXIA', 'carColour'=>'White', 'created_at'=>now(), 'updated_at'=>now()]
        ];
        DB::table('residents')->insert($multipleresident);
        DB::table('cars')->insert($multiplecar);
    }
}
