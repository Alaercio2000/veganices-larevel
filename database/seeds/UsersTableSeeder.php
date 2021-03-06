<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Alaercio',
                'email' => 'alaercio@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => '1.jpg',
                'phone' => null,
                'provider' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Ana',
                'email' => 'ana@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => '2.jpg',
                'phone' => null,
                'provider' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Edmar',
                'email' => 'edmar@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => '3.jpg',
                'phone' => null,
                'provider' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Meg',
                'email' => 'meg@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => '4.jpg',
                'phone' => null,
                'provider' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Teste provider',
                'email' => 'teste@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => 'default.jpg',
                'phone' => '(11) 9421-1231',
                'provider' => true,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Maria Lúcia',
                'email' => 'maria@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => '5.jpg',
                'phone' => null,
                'provider' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Jorge',
                'email' => 'jorge@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => '6.jpg',
                'phone' => null,
                'provider' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Marco Antonio',
                'email' => 'marcoantonio@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => '7.jpg',
                'phone' => null,
                'provider' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Pedro',
                'email' => 'pedro@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => '8.jpg',
                'phone' => null,
                'provider' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Victória',
                'email' => 'vic@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => '9.jpg',
                'phone' => null,
                'provider' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Gabriela',
                'email' => 'gabrila@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => '10.jpg',
                'phone' => null,
                'provider' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Angelica',
                'email' => 'angelica@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => '11.jpg',
                'phone' => null,
                'provider' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Lucas',
                'email' => 'lucasa@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => '12.jpg',
                'phone' => null,
                'provider' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Isabelly',
                'email' => 'isaisa@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => '13.jpg',
                'phone' => null,
                'provider' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Enzo',
                'email' => 'enzo@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => '14.jpg',
                'phone' => null,
                'provider' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Guilherme',
                'email' => 'guilherme@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => '15.jpg',
                'phone' => null,
                'provider' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Luana',
                'email' => 'luana@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => '16.jpg',
                'phone' => null,
                'provider' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Felipe',
                'email' => 'felipe@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => '16.jpg',
                'phone' => null,
                'provider' => true,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
        ]);
    }
}
