<?php

use Illuminate\Database\Seeder;

class SponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sponsors')->insert([
            [
                'name' => 'Presenting Sponsor',
                'dollarAmount' => 25000,
                'numOfGolfPlayers' => 16,
                'numOfAwardTickets' => 16,
            ],
            [
                'name' => 'Ace Sponsor',
                'dollarAmount' => 15000,
                'numOfGolfPlayers' => 16,
                'numOfAwardTickets' => 16,
            ],
            [
                'name' => 'Eagle Sponsor',
                'dollarAmount' => 10000,
                'numOfGolfPlayers' => 8,
                'numOfAwardTickets' => 8,
            ],
            [
                'name' => 'Birdie Sponsor',
                'dollarAmount' => 5000,
                'numOfGolfPlayers' => 4,
                'numOfAwardTickets' => 4,
            ],
            [
                'name' => 'Par Sponsor',
                'dollarAmount' => 3000,
                'numOfGolfPlayers' => 4,
                'numOfAwardTickets' => 4,
            ],
            [
                'name' => 'Fairway Sponsor',
                'dollarAmount' => 1500,
                'numOfGolfPlayers' => 2,
                'numOfAwardTickets' => 2,
            ],
            [
                'name' => 'Table Host - Education Partner',
                'dollarAmount' => 5000,
                'numOfGolfPlayers' => 0,
                'numOfAwardTickets' => 16,
            ],
            [
                'name' => 'Table Host - Health Partner',
                'dollarAmount' => 2500,
                'numOfGolfPlayers' => 0,
                'numOfAwardTickets' => 8,
            ],
            [
                'name' => 'Table Host - Well-being Partner',
                'dollarAmount' => 1500,
                'numOfGolfPlayers' => 0,
                'numOfAwardTickets' => 8,
            ],
            [
                'name' => 'Single player - No Sponsorship',
                'dollarAmount' => 400,
                'numOfGolfPlayers' => 1,
                'numOfAwardTickets' => 0,
            ],
            [
                'name' => 'Single ticket - Awards Banquet',
                'dollarAmount' => 150,
                'numOfGolfPlayers' => 0,
                'numOfAwardTickets' => 1,
            ],
            [
                'name' => 'Standard Foursome - No Sponsorship',
                'dollarAmount' => 3000,
                'numOfGolfPlayers' => 4,
                'numOfAwardTickets' => 4,
            ],
            [
                'name' => 'Standard Table Host',
                'dollarAmount' => 1500,
                'numOfGolfPlayers' => 0,
                'numOfAwardTickets' => 8
            ]]);
    }
}
