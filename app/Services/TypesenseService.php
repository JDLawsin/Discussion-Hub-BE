<?php

namespace App\Services;

use Exception;
use Typesense\Client;
use Typesense\Exceptions\TypesenseClientError;

class TypesenseService {
    protected Client $client;

     public function __construct()
    {
        $this->client = new Client([
            'api_key'         => config('typesense.api_key'),
            'nodes'           => [
                [
                    'host'     => config('typesense.host'),
                    'port'     => config('typesense.port'),
                    'protocol' => config('typesense.protocol'),
                ]
            ],
            'connection_timeout_seconds' => 5,
        ]);
    }

    public function createProtocolCollection(): void
    {
        try {
            $this->client->collections['protocols']->retrieve();
        } catch (Exception $e) {
            $this->client->collections->create([
                'name'                  => 'protocols',
                'enable_nested_fields'  => true,
                'fields'                => [
                    ['name' => 'id',             'type' => 'string'],
                    ['name' => 'title',          'type' => 'string'],
                    ['name' => 'content',        'type' => 'string'],
                    ['name' => 'tags',           'type' => 'string[]', 'facet' => true],
                    ['name' => 'author_name',    'type' => 'string',   'facet' => true],
                    ['name' => 'review_count',   'type' => 'int32'],
                    ['name' => 'average_rating', 'type' => 'float'],
                    ['name' => 'created_at',     'type' => 'int64'],
                ],
                'default_sorting_field' => 'created_at',
            ]);
        }
    }

    public function createThreadCollection(): void
    {
        try {
            $this->client->collections['threads']->retrieve();
        } catch (Exception $e) {
            $this->client->collections->create([
                'name'   => 'threads',
                'fields' => [
                    ['name' => 'id',             'type' => 'string'],
                    ['name' => 'title',          'type' => 'string'],
                    ['name' => 'body',           'type' => 'string'],
                    ['name' => 'tags',           'type' => 'string[]', 'facet' => true],
                    ['name' => 'author_name',    'type' => 'string',   'facet' => true],
                    ['name' => 'protocol_id',    'type' => 'string',   'facet' => true],
                    ['name' => 'protocol_title', 'type' => 'string'],
                    ['name' => 'upvote_count',   'type' => 'int32'],
                    ['name' => 'comment_count',  'type' => 'int32'],
                    ['name' => 'created_at',     'type' => 'int64'],
                ],
                'default_sorting_field' => 'created_at',
            ]);
        }
    }

     public function indexProtocol($protocol): void
    {
        $this->client->collections['protocols']->documents->upsert([
            'id'             => (string) $protocol->id,
            'title'          => $protocol->title,
            'content'        => $protocol->content,
            'tags'           => $protocol->tags->pluck('name')->toArray(),
            'author_name'    => $protocol->user->name,
            'review_count'   => (int) $protocol->review_count,
            'average_rating' => (float) $protocol->average_rating,
            'created_at'     => $protocol->created_at->timestamp,
        ]);
    }

    public function deleteProtocol($id): void
    {
        try {
            $this->client->collections['protocols']->documents[(string) $id]->delete();
        } catch (TypesenseClientError $e) {
            // Document doesn't exist, ignore
        }
    }

    public function indexThread($thread): void
    {
        $this->client->collections['threads']->documents->upsert([
            'id'             => (string) $thread->id,
            'title'          => $thread->title,
            'body'           => $thread->body,
            'tags'           => $thread->tags->pluck('name')->toArray(),
            'author_name'    => $thread->user->name,
            'protocol_id'    => (string) $thread->protocol_id,
            'protocol_title' => $thread->protocol->title,
            'upvote_count'   => (int) $thread->upvote_count,
            'comment_count'  => (int) $thread->comments()->count(),
            'created_at'     => $thread->created_at->timestamp,
        ]);
    }

    public function deleteThread($id): void
    {
        try {
            $this->client->collections['threads']->documents[(string) $id]->delete();
        } catch (TypesenseClientError $e) {
            // Document doesn't exist, ignore
        }
    }

     public function reindexAll(): void
    {
        $this->createProtocolCollection();
        $this->createThreadCollection();

        \App\Models\Protocol::with(['user', 'tags'])->each(function ($protocol) {
            $this->indexProtocol($protocol);
        });

        \App\Models\Thread::with(['user', 'tags', 'protocol'])->each(function ($thread) {
            $this->indexThread($thread);
        });
    }
}