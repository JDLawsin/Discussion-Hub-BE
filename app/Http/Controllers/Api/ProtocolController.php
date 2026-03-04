<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProtocolResource;
use App\Services\Api\ProtocolService;
use Illuminate\Http\Request;

class ProtocolController extends Controller
{

    public function __construct(protected ProtocolService $protocolService) {}

    public function getProtocolById($id){
        return new ProtocolResource($this->protocolService->findOrFail($id));
    }
}
