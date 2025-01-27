<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
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
        User::insert([
            'FIO'=>'Влад',
            'password'=>Hash::make('dir123'),
            'position'=>'Директор'
        ]);
        User::insert([
            'FIO'=>'Гена',
            'password'=>Hash::make('adminn'),
            'position'=>'Админ'
        ]);
        User::insert([
            'FIO'=>'Максим',
            'password'=>Hash::make('man123'),
            'position'=>'Менеджер'
        ]);
        User::insert([
            'FIO'=>'Паша',
            'password'=>Hash::make('mas123'),
            'position'=>'Мастер'
        ]);
        User::insert([
            'FIO'=>'Леня',
            'password'=>Hash::make('meas123'),
            'position'=>'Замерщик'
        ]);
    }
}
