<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use App\Services\Api\ReviewService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __construct(protected ReviewService $reviewService) {}

    public function getReviewsByProtocolId(Request $request, int $id)
    {
        $reviews = $this->reviewService->getByProtocolId($id);

        return ReviewResource::collection($reviews);
    }

    public function createReview(Request $request, int $id)
    {
        $validated = $request->validate([
            'rating'   => 'required|integer|min:1|max:5',
            'feedback' => 'sometimes|nullable|string',
        ]);

        $validated['user_id']     = $request->user()->id;
        $validated['protocol_id'] = $id;

        $this->reviewService->create($validated);

        return response()->json(['success' => true]);
    }

    public function hasReviewed(Request $request, int $protocolId): \Illuminate\Http\JsonResponse
    {
        $hasReviewed = $this->reviewService->checkIfUserReviewed($protocolId, $request->user()->id);

        return response()->json(['hasReviewed' => $hasReviewed]);
    }

    public function delete(Request $request, int $id)
    {
        $review = Review::findOrFail($id);

        if ($review->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $review->delete();

        return response()->json(['success' => true]);
    }
}
