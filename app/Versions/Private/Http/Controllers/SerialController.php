<?php

namespace App\Versions\Private\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\SerialResource;
use App\Models\Serial;
use App\Versions\Private\Reporters\SerialReporter;
use Illuminate\Http\Request;

class SerialController extends Controller
{
    public function index(SerialReporter $reporter, Request $request)
    {
        $films = $reporter
            ->execute($request)
            ->paginate($request->get('limit', 15));

        return SerialResource::collection($films);
    }

    public function show(Serial $film)
    {
        return new SerialResource($film);
    }
}
