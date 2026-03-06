<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Services\Api\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(protected CommentService $commentService) {}

    public function getCommentsByThreadId(Request $request, int $threadId)
    {
        $perPage = $request->query('perPage', 10);

        $comments = $this->commentService->getByThreadId($threadId, (int) $perPage);

        return CommentResource::collection($comments);
    }

    public function create(Request $request, int $threadId)
    {
        $validated = $request->validate([
            'comment'   => 'required|string',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        Comment::create([
            'user_id'   => $request->user()->id,
            'thread_id' => $threadId,
            'parent_id' => $validated['parent_id'] ?? null,
            'body'      => $validated['comment'],
        ]);

        return response()->json(['success' => true]);  
    }

    public function delete(Request $request, int $id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $comment->delete();

        return response()->json(['success' => true]);
    }
}
