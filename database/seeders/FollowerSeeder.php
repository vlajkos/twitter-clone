<?php

namespace Database\Seeders;

use App\Models\Follower;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FollowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        function createFollower($follower_id, $following_id)
        {
            $follower = new Follower([
                'follower_id' => $follower_id,
                'following_id' => $following_id
            ]);
            return $follower->save();
        }

        $following = createFollower(1, 2);
        $following = createFollower(1, 3);
        $following = createFollower(1, 4);
        $following = createFollower(1, 5);
        $following = createFollower(1, 6);
        $following = createFollower(1, 7);
        $following = createFollower(1, 8);
        $following = createFollower(1, 11);
        $following = createFollower(1, 16);

        $following = createFollower(2, 1);
        $following = createFollower(23, 1);
        $following = createFollower(29, 1);
        $following = createFollower(30, 1);
        $following = createFollower(4, 1);
        $following = createFollower(5, 1);
    }

}