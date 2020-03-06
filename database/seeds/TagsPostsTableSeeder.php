<?php

use Illuminate\Database\Seeder;

class TagsPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags_community_posts')->insert([
            [
                'tags_id' => '1',
                'community_post_id' => '1',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'tags_id' => '2',
                'community_post_id' => '1',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'tags_id' => '2',
                'community_post_id' => '3',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'tags_id' => '2',
                'community_post_id' => '4',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ]
        ]);
    }
}