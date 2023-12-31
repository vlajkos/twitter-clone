<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $user = new User(
            [
                'name' => 'Vladimir',
                'username' => 'vlajko',
                'bio' => 'Laravel Developer',
                'image' => 'default/vlada.png',
                'email' => 'vlajko1453@gmail.com',
                'password' => Hash::make('vlajko1453')
            ]
        );
        $user->save();
        $user = new User(
            [
                'name' => 'Mirko',
                'username' => 'mirko',
                'image' => 'default/mirko.png',
                'email' => 'mirko995@gmail.com',
                'password' => Hash::make('mirko995')
            ]
        );
        $user->save();
        $user = new User(
            [
                'name' => 'Maja',
                'username' => 'maja',
                'image' => 'default/maja.jpg',
                'email' => 'maja96@gmail.com',
                'password' => Hash::make('maja1996')
            ]
        );
        $user->save();

        User::factory(40)->create();
        $this->call([
            TweetSeeder::class,
            FollowerSeeder::class,
            LikeSeeder::class,
            CommentSeeder::class,
            CommentLikeSeeder::class,
            NotificationSeeder::class

        ]);





    }
}