<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class wisata extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = ['Gunung', 'Hutan', 'Pantai'];
        $kelamin = ['L', 'P'];
        $faker = Faker::create('id_ID');
        $users = [];
        $wisata = [];
        for ($i = 0; $i < 10; $i++) {
            $users[] = [
                'id' => Str::random(5),
                'nama' => $faker->name(25),
                'alamat' => $faker->address(100),
                'jenis_kelamin' => $kelamin[rand(0, 1)],
                'no_telpon' => $faker->phoneNumber(12),
            ];
        }
        for ($i = 1; $i <= 10; $i++) {
            $wisata[] = [
                'id_wisata' => Str::random(5),
                'kategori' => $kategori[rand(0, 2)],
                'nama_wisata' => $faker->name(),
                'alamat_wisata' => $faker->address(100),
                'fasilitas' => 'lengkap',
            ];
        }
        DB::table('pengunjung')->insert($users);
        DB::table('wisata')->insert($wisata);
    }
}
