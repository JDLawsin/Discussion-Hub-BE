<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProtocolResource;
use App\Models\Protocol;
use App\Models\Tag;
use App\Services\Api\ProtocolService;
use App\Services\TypesenseService;
use Illuminate\Http\Request;

class ProtocolController extends Controller
{

    public function __construct(protected ProtocolService $protocolService) {}

    public function getProtocolById($id){
        return new ProtocolResource($this->protocolService->findOrFail($id));
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'tags'    => 'nullable|array',
            'tags.*'  => 'string',
        ]);

        $protocol = Protocol::create([
            'user_id' => $request->user()->id,
            'title'   => $validated['title'],
            'content' => $validated['content'],
        ]);

        if (!empty($validated['tags'])) {
            $tagIds = collect($validated['tags'])
            ->map(fn($name) => Tag::firstOrCreate(['name' => $name])->id);
            $protocol->tags()->attach($tagIds);
        }

        // TODO: Temporary fix, re index to record the proper tags data in TypeSense.
        $protocol->load(['user', 'tags']);
        app(TypesenseService::class)->indexProtocol($protocol);

        return response()->json([
            'success' => true,
            'id'      => $protocol->id,
        ]);
    }

    public function delete(Request $request, int $id)
    {
        $protocol = Protocol::findOrFail($id);

        if ($protocol->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $protocol->delete();

        return response()->json(['success' => true]);
    }
}
