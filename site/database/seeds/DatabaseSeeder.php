<?php

use Illuminate\Database\Seeder;
use MarketTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('MarketTableSeeder');
    }
}

class MarketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('markets')->insert([
            'name' => 'ethereum',
            'symbol' => 'eth',
        ]);

        DB::table('markets')->insert([
            'name' => 'litecoin',
            'symbol' => 'ltc',
        ]);

        DB::table('markets')->insert([
            'name' => 'monero',
            'symbol' => 'xmr',
        ]);

        DB::table('markets')->insert([
            'name' => 'dash',
            'symbol' => 'dash',
        ]);

        DB::table('markets')->insert([
            'name' => 'ethereum-classic',
            'symbol' => 'etc',
        ]);

        DB::table('markets')->insert([
            'name' => 'maidsafecoin',
            'symbol' => 'maid',
        ]);

        DB::table('markets')->insert([
            'name' => 'nem',
            'symbol' => 'nem',
        ]);

        DB::table('markets')->insert([
            'name' => 'factom',
            'symbol' => 'fct',
        ]);

        DB::table('markets')->insert([
            'name' => 'zcash',
            'symbol' => 'zec',
        ]);
    }
}

