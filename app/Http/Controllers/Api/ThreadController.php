<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ThreadResource;
use App\Models\Tag;
use App\Models\Thread;
use App\Services\Api\ThreadService;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function __construct(protected ThreadService $threadService) {}

    public function getThreadsByProtocolId(Request $request, int $id)
    {
        $sort = $request->query('threadSort', 'recent');

        $threads = $this->threadService->getByProtocolId($id,$sort);

        return ThreadResource::collection($threads);
    }

    public function getThreadsById(Request $request, int $id){
        return new ThreadResource($this->threadService->findOrFail($id));
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'body'       => 'required|string',
            'protocolId' => 'required|exists:protocols,id',
            'tags'       => 'nullable|array',
            'tags.*'     => 'string|exists:tags,name',
        ]);

        $thread = Thread::create([
            'user_id'     => $request->user()->id,
            'protocol_id' => $validated['protocolId'],
            'title'       => $validated['title'],
            'body'        => $validated['body'],
        ]);

        if (!empty($validated['tags'])) {
            $tagIds = Tag::whereIn('name', $validated['tags'])->pluck('id');
            $thread->tags()->attach($tagIds);
        }

        return response()->json([
            'success' => true,
            'id'      => $thread->id,
        ]);
    }

    public function delete(Request $request, int $id)
    {
        $thread = Thread::findOrFail($id);

        if ($thread->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $thread->delete(); 

        return response()->json(['success' => true]);
    }
}
