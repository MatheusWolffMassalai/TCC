<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filos')->insert([
            'nome_filo' => 'Porifera',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Placozoa',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Cnidaria',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Ctenophora',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Xenacoelomorpha',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Platyhelminthes',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Chaetognatha',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Gastrotricha',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Rhombozoa',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Orthonectida',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Nemertea',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Mollusca',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Annelida',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Entoproct',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Cycliophora',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Gnathostomulida',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Rotifera',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Phoronida',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Bryozoa',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Brachiopoda',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Nematoda',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Nematomorpha',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Kinorhyncha',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Priapula',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Loricifera',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Tardigrada',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Onychophora',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Arthropoda',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Echinodermata',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Hemichordata',

        ]);
        DB::table('filos')->insert([
            'nome_filo' => 'Chordata',

        ]);
    }
}