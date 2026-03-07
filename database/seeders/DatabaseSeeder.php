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
use Database\Factories\Providers\MeaningfulDataProvider;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Setup Typesense
        $typesense = new TypesenseService();
        $typesense->createProtocolCollection();
        $typesense->createThreadCollection();

        // Admin test account
        $admin = User::factory()->create([
            'name'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        $users = User::factory(20)->create();
        $allUsers = $users->push($admin);

        // Seed wellness tags
        $tagNames = [
            'cold-therapy', 'breathwork', 'sleep', 'fasting', 'recovery',
            'inflammation', 'mental-health', 'gut-health', 'longevity', 'hormones',
            'stress', 'nutrition', 'movement', 'supplementation', 'circadian',
            'sauna', 'grounding', 'creatine', 'omega-3', 'nasal-breathing',
            'dopamine', 'journaling', 'mobility', 'heat-therapy', 'caffeine',
            'gratitude', 'forest-bathing', 'vagus-nerve', 'elimination-diet',
            'strength-training', 'meditation', 'vitamin-d', 'posture', 'hiit',
            'zone-2', 'red-light', 'magnesium', 'microbiome', 'autoimmune',
            'biohacking', 'hormesis', 'neuroplasticity', 'mitochondria', 'cortisol',
        ];

        foreach ($tagNames as $name) {
            Tag::firstOrCreate(['name' => $name]);
        }

        $faker = FakerFactory::create();
        $faker->addProvider(new MeaningfulDataProvider($faker));

        // Seed topic-coherent protocols, threads, and comments
        for ($i = 0; $i < 20; $i++) {
            $topic = $faker->topic();

            $protocol = Protocol::create([
                'user_id' => $allUsers->random()->id,
                'title'   => $topic['protocol_title'],
                'content' => $topic['protocol_content'],
            ]);

            $tagIds = Tag::whereIn('name', $topic['tags'])->pluck('id');
            $protocol->tags()->attach($tagIds);

            $threadCount = rand(2, 4);
            for ($j = 0; $j < $threadCount; $j++) {
                $thread = Thread::create([
                    'user_id'     => $allUsers->random()->id,
                    'protocol_id' => $protocol->id,
                    'title'       => $topic['thread_titles'][array_rand($topic['thread_titles'])],
                    'body'        => $topic['thread_bodies'][array_rand($topic['thread_bodies'])],
                ]);

                $thread->tags()->attach($tagIds);

                // Top level comments
                $topLevelComments = [];
                for ($k = 0; $k < rand(3, 5); $k++) {
                    $comment = Comment::create([
                        'user_id'   => $allUsers->random()->id,
                        'thread_id' => $thread->id,
                        'parent_id' => null,
                        'body'      => $topic['comments'][array_rand($topic['comments'])],
                    ]);
                    $topLevelComments[] = $comment;
                }

                // Replies
                foreach ($topLevelComments as $comment) {
                    $replies = [];
                    for ($r = 0; $r < rand(1, 3); $r++) {
                        $reply = Comment::create([
                            'user_id'   => $allUsers->random()->id,
                            'thread_id' => $thread->id,
                            'parent_id' => $comment->id,
                            'body'      => $topic['comments'][array_rand($topic['comments'])],
                        ]);
                        $replies[] = $reply;
                    }

                    // Nested replies
                    foreach ($replies as $reply) {
                        if (rand(0, 1)) {
                            Comment::create([
                                'user_id'   => $allUsers->random()->id,
                                'thread_id' => $thread->id,
                                'parent_id' => $reply->id,
                                'body'      => $topic['comments'][array_rand($topic['comments'])],
                            ]);
                        }
                    }
                }

                // Thread votes
                $voters = $allUsers->random(rand(3, 10));
                $voters->each(function (User $user) use ($thread) {
                    Vote::create([
                        'user_id'      => $user->id,
                        'votable_type' => 'thread',
                        'votable_id'   => $thread->id,
                        'type'         => fake()->randomElement(['upvote', 'downvote']),
                    ]);
                });
            }

            // Reviews
            $reviewers = $allUsers->random(rand(3, 8));
            $reviewers->each(function (User $user) use ($protocol, $faker, $topic) {
                Review::create([
                    'user_id'     => $user->id,
                    'protocol_id' => $protocol->id,
                    'rating'      => fake()->numberBetween(1, 5),
                    'feedback'    => $topic['comments'][array_rand($topic['comments'])],
                ]);
            });
        }

        // Comment votes
        $comments = Comment::all();
        $comments->each(function (Comment $comment) use ($allUsers) {
            $voters = $allUsers->random(rand(1, 5));
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