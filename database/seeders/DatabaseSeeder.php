<?php

namespace Database\Seeders;

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
        DB::table('produtos')->insert([
            'nome' => 'SSD Kingston A400, 240GB',
            'descricao' => 'Conheça o SSD A400 da Kingston. Performance incrível e tecnologia de ponta! Este SSD possui com a tecnologia 3D NAND (também chamada de V-NAND).',
            'valor' => '29990'
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Smartphone Samsung Galaxy A01',
            'descricao' => 'Smartphone Samsung Galaxy A01 Core, 32GB, 2GB RAM, Tela Infinita de 5.3", Câmera Traseira 8MP, Frontal de 5MP, Bateria de 3000mAh, Dual Chip, Android - Preto.',
            'valor' => '53900'
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Placa de Vídeo Gigabyte NVIDIA GeForce GTX 1650',
            'descricao' => 'O sistema de resfriamento WINDFORCE 2X possui 2 ventiladores de lâmina exclusivos de 80 mm, ventilador giratório alternativo e ventilador ativo 3D, proporcionando uma dissipação de calor eficaz.',
            'valor' => '349990'
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Teclado Mecânico Gamer HyperX Mars',
            'descricao' => 'O Teclado Mecânico Gamer HyperX Mars é ideal para gamers que teclam diversas teclas por segundo, graças ao seu Switch Outemu Blue, é possível processar todos os movimentos, sem a chave de o usuário perder alguns deles.',
            'valor' => '29990'
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);

    }
}
