<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'User',
        ]);

        DB::table('roles')->insert([
            'name' => 'Admin',
        ]);

        DB::table('authors')->insert([
            'name' => 'John Ronald Reuel',
            'lastname' => 'Tolkien',
        ]);

        DB::table('authors')->insert([
            'name' => 'Carlos Ruiz',
            'lastname' => 'Zafon',
        ]);

        DB::table('authors')->insert([
            'name' => 'Stephen',
            'lastname' => 'King',
        ]);

        DB::table('authors')->insert([
            'name' => 'Fiodor',
            'lastname' => 'Dostojewski',
        ]);

        DB::table('books')->insert([
            'author_id' => '1',
            'title' => 'Władca pierścieni: Drużyna pierścienia',
            'quantity_of_copies' => 2,
        ]);

        DB::table('books')->insert([
            'author_id' => '1',
            'title' => 'Władca pierścieni: Dwie wieże',
            'quantity_of_copies' => 2,
        ]);

        DB::table('books')->insert([
            'author_id' => '1',
            'title' => 'Władca pierścieni: Powrót króla',
            'quantity_of_copies' => 2,
        ]);

        DB::table('books')->insert([
            'author_id' => '1',
            'title' => 'Hobbit',
            'quantity_of_copies' => 3,
        ]);

        DB::table('books')->insert([
            'author_id' => '2',
            'title' => 'Cień wiatru',
            'quantity_of_copies' => 1,
        ]);

        DB::table('books')->insert([
            'author_id' => '2',
            'title' => 'Książe mgły',
            'quantity_of_copies' => 1,
        ]);

        DB::table('books')->insert([
            'author_id' => '3',
            'title' => 'Bastion',
            'quantity_of_copies' => 1,
        ]);

        DB::table('books')->insert([
            'author_id' => '3',
            'title' => 'Carrie',
            'quantity_of_copies' => 2,
        ]);

        DB::table('books')->insert([
            'author_id' => '3',
            'title' => 'Później',
            'quantity_of_copies' => 1,
        ]);

        DB::table('books')->insert([
            'author_id' => '4',
            'title' => 'Idiota',
            'quantity_of_copies' => 2,
        ]);

        DB::table('books')->insert([
            'author_id' => '4',
            'title' => 'Zbrodia i kara',
            'quantity_of_copies' => 2,
        ]);

        DB::table('statuses')->insert([
            'name' => 'book',
        ]);

        DB::table('statuses')->insert([
            'name' => 'borrow',
        ]);

        DB::table('statuses')->insert([
            'name' => 'delayed',
        ]);

        DB::table('statuses')->insert([
            'name' => 'prolonged',
        ]);

        DB::table('statuses')->insert([
            'name' => 'unavailable',
        ]);

        DB::table('statuses')->insert([
            'name' => 'available',
        ]);

        DB::table('statuses')->insert([
            'name' => 'returned',
        ]);

        DB::table('book_copies')->insert([
            'book_id' => 1,
            'status_id' => 6,
            'code' => 'UK1',
        ]);

        DB::table('book_copies')->insert([
            'book_id' => 1,
            'status_id' => 6,
            'code' => 'UK2',
        ]);

        DB::table('book_copies')->insert([
            'book_id' => 2,
            'status_id' => 6,
            'code' => 'UK3',
        ]);

        DB::table('book_copies')->insert([
            'book_id' => 2,
            'status_id' => 6,
            'code' => 'UK4',
        ]);

        DB::table('book_copies')->insert([
            'book_id' => 3,
            'status_id' => 6,
            'code' => 'UK5',
        ]);

        DB::table('book_copies')->insert([
            'book_id' => 3,
            'status_id' => 6,
            'code' => 'UK6',
        ]);

        DB::table('book_copies')->insert([
            'book_id' => 4,
            'status_id' => 6,
            'code' => 'UK7',
        ]);

        DB::table('book_copies')->insert([
            'book_id' => 4,
            'status_id' => 6,
            'code' => 'UK8',
        ]);

        DB::table('book_copies')->insert([
            'book_id' => 4,
            'status_id' => 6,
            'code' => 'UK9',
        ]);

        DB::table('book_copies')->insert([
            'book_id' => 5,
            'status_id' => 6,
            'code' => 'ESP1',
        ]);

        DB::table('book_copies')->insert([
            'book_id' => 6,
            'status_id' => 6,
            'code' => 'ESP2',
        ]);

        DB::table('book_copies')->insert([
            'book_id' => 7,
            'status_id' => 6,
            'code' => 'USA1',
        ]);

        DB::table('book_copies')->insert([
            'book_id' => 8,
            'status_id' => 6,
            'code' => 'USA2',
        ]);

        DB::table('book_copies')->insert([
            'book_id' => 8,
            'status_id' => 6,
            'code' => 'USA3',
        ]);

        DB::table('book_copies')->insert([
            'book_id' => 9,
            'status_id' => 6,
            'code' => 'USA4',
        ]);

        DB::table('book_copies')->insert([
            'book_id' => 10,
            'status_id' => 6,
            'code' => 'RUS1',
        ]);

        DB::table('book_copies')->insert([
            'book_id' => 10,
            'status_id' => 6,
            'code' => 'RUS2',
        ]);

        DB::table('book_copies')->insert([
            'book_id' => 11,
            'status_id' => 6,
            'code' => 'RUS3',
        ]);

        DB::table('book_copies')->insert([
            'book_id' => 11,
            'status_id' => 6,
            'code' => 'RUS4',
        ]);

        DB::table('users')->insert([
            'name' => 'Alicja',
            'lastname' => 'Nowak',
            'country' => 'Polska',
            'street' => 'Miodowa',
            'flat' => '4',
            'postcode' => '22-300',
            'city' => 'Krasnystaw',
            'phone' => '222222222',
            'email' => 'alicja@wp.pl',
            'password' =>  Hash::make('Admin123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('roles_has_users')->insert([
            'users_id' => 1,
            'roles_id' => 2,
        ]);
    }
}
