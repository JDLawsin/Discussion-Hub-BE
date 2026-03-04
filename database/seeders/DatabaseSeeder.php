<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Protocol;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Thread;
use App\Models\User;
use App\Models\Vote;
use App\Services\TypesenseService;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $typesense = new TypesenseService();
        $typesense->createProtocolCollection();  
        $typesense->createThreadCollection();


        $users = User::factory(20)->create();

        $tags = Tag::factory(10)->create();

        $protocols = Protocol::factory(12)->create([
            'user_id' => fn() => $users->random()->id,
        ]);

        $protocols->each(function (Protocol $protocol) use ($tags) {
            $randomTags = $tags->random(rand(2, 4))->pluck('id');
            $protocol->tags()->attach($randomTags);
        });

        $threads = Thread::factory(10)->create([
            'user_id'     => fn() => $users->random()->id,
            'protocol_id' => fn() => $protocols->random()->id,
        ]);

        $threads->each(function (Thread $thread) use ($tags) {
            $randomTags = $tags->random(rand(1, 3))->pluck('id');
            $thread->tags()->attach($randomTags);
        });

        $threads->each(function (Thread $thread) use ($users) {
            $topLevelComments = Comment::factory(rand(3, 5))->create([
                'user_id'   => fn() => $users->random()->id,
                'thread_id' => $thread->id,
                'parent_id' => null,
            ]);

            $topLevelComments->each(function (Comment $comment) use ($users, $thread) {
                $replies = Comment::factory(rand(1, 3))->create([
                    'user_id'   => fn() => $users->random()->id,
                    'thread_id' => $thread->id,
                    'parent_id' => $comment->id,
                ]);

                $replies->each(function (Comment $reply) use ($users, $thread) {
                    Comment::factory(rand(0, 1))->create([
                        'user_id'   => fn() => $users->random()->id,
                        'thread_id' => $thread->id,
                        'parent_id' => $reply->id,
                    ]);
                });
            });
        });

        $protocols->each(function (Protocol $protocol) use ($users) {
            $reviewers = $users->random(rand(3, 8));
            $reviewers->each(function (User $user) use ($protocol) {
                Review::create([
                    'user_id'     => $user->id,
                    'protocol_id' => $protocol->id,
                    'rating'      => fake()->numberBetween(1, 5),
                    'feedback'    => fake()->optional(0.7)->paragraph(),
                ]);
            });
        });

        $threads->each(function (Thread $thread) use ($users) {
            $voters = $users->random(rand(3, 10));
            $voters->each(function (User $user) use ($thread) {
                Vote::create([
                    'user_id'      => $user->id,
                    'votable_type' => 'thread',
                    'votable_id'   => $thread->id,
                    'type'         => fake()->randomElement(['upvote', 'downvote']),
                ]);
            });
        });

        $comments = Comment::all();
        $comments->each(function (Comment $comment) use ($users) {
            $voters = $users->random(rand(1, 5));
            $voters->each(function (User $user) use ($comment) {
                Vote::create([
                    'user_id'      => $user->id,
                    'votable_type' => 'comment',
                    'votable_id'   => $comment->id,
                    'type'         => fake()->randomElement(['upvote', 'downvote']),
                ]);
            });
        });
    }
}
