<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;


class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // $faker = Faker::create();
        // $group = new Group();
        // // $group->name = 'Administrator';
        // $group->name = $faker->name;
        // $group->save();
        Group::factory()->count(2)->sequence(
            [
                'name' => 'admin 2',
            ],
            [
                'name' => 'admin 1',
            ]
        )
        ->hasUsers(3)
        ->create();
    }
}
