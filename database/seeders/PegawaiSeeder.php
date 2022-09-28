<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 50; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('pegawais')->insert([
                'nip' => $faker->numerify('################'),
    			'nama' => $faker->name,
    			'unitkerja_nama' => $faker->jobTitle,
    			'jabatan' => $faker->jobTitle,
    			'status_pegawai' => $faker->randomElement(['PNS', 'KARYAWAN TETAP', 'KARYAWAN KONTRAK', 'MUTASI']),
    			'no_telp' => $faker->phoneNumber,
                'agama' => $faker->randomElement(['ISLAM', 'KRISTEN', 'KATOLIK', 'HINDU', 'BUDHA']),
    			'gender' => $faker->randomElement(['Laki-Laki', 'Wanita']),
    			'alamat' => $faker->address
    		]);
        }
    }
}
