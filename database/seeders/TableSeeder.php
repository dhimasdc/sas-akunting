<?php

namespace Database\Seeders;

use App\Models\Akun;
use App\Models\Asset;
use App\Models\Biaya;
use App\Models\Kontak;
use App\Models\Pajak;
use App\Models\Satuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        Pajak::create(['name' => 'PPN', 'value' => '0.11']);
        Pajak::create(['name' => 'PPH5', 'value' => '0.05']);

        Satuan::create(['name' => 'Pcs']);
        Satuan::create(['name' => 'Kg']);
        Satuan::create(['name' => 'Unit']);


        for ($i = 1; $i <= 8; $i++) {
            // insert data ke table siswa menggunakan Faker
            Biaya::create([
                'kode' => $faker->bothify('????/####'),
                'piutang' => $faker->randomNumber(7, true),
                'hutang' => $faker->randomNumber(7, true),
                'kontak_id' => $faker->numberBetween(1, 10),
                'tanggal_transaksi' => $faker->dateTimeBetween('-2 week', '+2 week'),
                'tanggal_jatuh_tempo' => $faker->dateTimeBetween('-1 week', '+4 week'),

            ]);
        }

        Asset::create([
            'name' => 'Gedung Kantor',
            'kode' => 'AST/001',
            'tanggal_pembelian' => $faker->dateTimeBetween('-2 week', '+2 week'),
            'harga_nilai' => $faker->randomNumber(9, true),
            'qty' => $faker->numberBetween(1, 10),
            'satuan_id' => '3',
            'harga_total' => $faker->randomNumber(9, true),
        ]);
        Asset::create([
            'name' => 'Mobil Kantor Xpander',
            'kode' => 'AST/002',
            'tanggal_pembelian' => $faker->dateTimeBetween('-2 week', '+2 week'),
            'harga_nilai' => $faker->randomNumber(9, true),
            'qty' => $faker->numberBetween(1, 10),
            'satuan_id' => '3',
            'harga_total' => $faker->randomNumber(9, true),
        ]);
        Asset::create([
            'name' => 'Imac Pro',
            'kode' => 'AST/003',
            'tanggal_pembelian' => $faker->dateTimeBetween('-2 week', '+2 week'),
            'harga_nilai' => $faker->randomNumber(9, true),
            'qty' => $faker->numberBetween(1, 10),
            'satuan_id' => '3',
            'harga_total' => $faker->randomNumber(9, true),
        ]);

        Akun::create([
            'name' => 'Kas',
            'kode' => 'bnk-0001',
            'kategori' => 'Banking',
            'sub_akun' => '0',
            'saldo' => '100000000',
        ]);
        Akun::create([
            'name' => 'Bank BCA',
            'kode' => 'bnk-0002',
            'kategori' => 'Banking',
            'sub_akun' => '0',
            'saldo' => '500000000',
        ]);
        Akun::create([
            'name' => 'Giro',
            'kode' => 'bnk-0003',
            'kategori' => 'Banking',
            'sub_akun' => '0',
            'saldo' => '10000000',
        ]);

        Kontak::create([
            'tipe' => 'karyawan',
            'name' => 'Fajar Zidan',
            'perusahaan' => 'PT. Fajar Senja',
            'alamat' => 'Komplek BDN Pondok Gede Bekasi',
            'email' => 'Fazid@gmail.com',
            'telepon' => '08128301291'
        ]);
        Kontak::create([
            'tipe' => 'vendor',
            'name' => 'Bagas Raya',
            'perusahaan' => 'CV. Raya Abadi',
            'alamat' => 'Jl. Jembatan 3 Rawalumbu Bekasi',
            'email' => 'Bagasry@gmail.com',
            'telepon' => '08971624667'
        ]);
        Kontak::create([
            'tipe' => 'karyawan',
            'name' => 'Suryo Affandi',
            'perusahaan' => 'PT. Angkot Utama',
            'alamat' => 'Jl. Rambutan Jaha Bekasi',
            'email' => 'Suryo@gmail.com',
            'telepon' => '0812772316'
        ]);
        Kontak::create([
            'tipe' => 'pelanggan',
            'name' => 'Ludy Hambali',
            'perusahaan' => 'PT. Gabe Sejahtera',
            'alamat' => 'Grand Galaxy Bekasi',
            'email' => 'Gabe@gmail.com',
            'telepon' => '0880127'
        ]);
        Kontak::create([
            'tipe' => 'karyawan',
            'name' => 'Reja Pranz',
            'perusahaan' => 'PT. Pranz Steel',
            'alamat' => 'Jl. Wibawa Mukti jatibening Bekasi',
            'email' => 'Pranz@gmail.com',
            'telepon' => '087726162'
        ]);
        Kontak::create([
            'tipe' => 'pelanggan',
            'name' => 'I Made Wahyu',
            'perusahaan' => 'CV. IndoTech',
            'alamat' => 'Jl.Dewata Bali',
            'email' => 'Made@gmail.com',
            'telepon' => '0872512313'
        ]);
        Kontak::create([
            'tipe' => 'vendor',
            'name' => 'Dwi Cahyo Putra',
            'perusahaan' => 'PT. Fintec Ojrap',
            'alamat' => 'Jl. Kejaksaan Kav. Pondok bambu Jakarta',
            'email' => 'Ojrap@gmail.com',
            'telepon' => '0889126371'
        ]);
        Kontak::create([
            'tipe' => 'karyawan',
            'name' => 'Aship Ryando',
            'perusahaan' => 'PT. Ando IT',
            'alamat' => 'Summarecon Bekasi',
            'email' => 'Aship@gmail.com',
            'telepon' => '0876123772'
        ]);
        Kontak::create([
            'tipe' => 'pelanggan',
            'name' => 'Dhimas Atmojo',
            'perusahaan' => 'PT. Akselerasi IT',
            'alamat' => 'Jatiwaringin Bekasi',
            'email' => 'Dhimasdc@gmail.com',
            'telepon' => '083663267823'
        ]);
    }
}
