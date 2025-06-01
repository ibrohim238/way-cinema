<?php

namespace App\Versions\Private\Http\Controllers;

use App\Http\Resources\SerialResource;
use App\Models\Serial;
use App\Versions\Private\Reporters\SerialReporter;
use Illuminate\Http\Request;

class SerialController
{
    public function index(SerialReporter $reporter, Request $request)
    {
        $serials = $reporter
            ->execute($request)
            ->paginate($request->get('limit', 15));

        return SerialResource::collection($serials);
    }

    public function show(Serial $serial)
    {
        return new SerialResource($serial);
    }
}
