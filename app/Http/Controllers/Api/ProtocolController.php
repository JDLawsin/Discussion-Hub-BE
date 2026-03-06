<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProtocolResource;
use App\Models\Protocol;
use App\Models\Tag;
use App\Services\Api\ProtocolService;
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
            'tags.*'  => 'string|exists:tags,name',
        ]);

        $protocol = Protocol::create([
            'user_id' => $request->user()->id,
            'title'   => $validated['title'],
            'content' => $validated['content'],
        ]);

        if (!empty($validated['tags'])) {
            $tagIds = Tag::whereIn('name', $validated['tags'])->pluck('id');
            $protocol->tags()->attach($tagIds);
        }

        return response()->json([
            'success' => true,
            'id'      => $protocol->id,
        ]);
    }
}
