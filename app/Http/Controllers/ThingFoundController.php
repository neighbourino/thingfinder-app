<?php

namespace App\Http\Controllers;

use App\Models\Thing;


use Illuminate\Http\Request;


class ThingFoundController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $thing = Thing::where('uuid', $request->uuid)->firstOrFail();

        return view('found', [
            'thing' => $thing
        ]);
    }
}
