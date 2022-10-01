<?php

namespace Database\Seeders;
use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staff = new Staff;
        $staff->name = 'manager';
        $staff->email = 'manager@gmail.com';
        $staff->type = 'manager';
        $staff->password = bcrypt('password');

        $staff->save();

    }
}
