<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // $data = [
        //     [
        //         'nama'          => 'Christin',
        //         'role'          => 'Owner',
        //         'created_at'    => Time::now(),
        //         'updated_at'    => Time::now()
        //     ],
        //     [
        //         'nama'          => 'Yohan',
        //         'role'          => 'IT',
        //         'created_at'    => Time::now(),
        //         'updated_at'    => Time::now()
        //     ],
        //     [
        //         'nama'          => 'Stepani',
        //         'role'          => 'Admin',
        //         'created_at'    => Time::now(),
        //         'updated_at'    => Time::now()
        //     ],
        // ];
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 30; $i++) {

            $data = [

                'nama'          => $faker->name,
                'role'          => $faker->address,
                'created_at'    => Time::createFromTimestamp($faker->unixTime()),
                'updated_at'    => Time::now()

            ];
            // Simple Queries
            $this->db->query('INSERT INTO admin (nama, role, created_at, updated_at) VALUES(:nama:, :role:, :created_at:, :updated_at:)', $data);
        }

        // Using Query Builder
        // $this->db->table('admin')->insertBatch($data);
    }
}
