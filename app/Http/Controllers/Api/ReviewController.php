<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
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
}
