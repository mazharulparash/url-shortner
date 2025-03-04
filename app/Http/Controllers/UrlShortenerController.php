<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class UrlShortenerController extends Controller
{
    public function encode(Request $request)
    {
        $request->validate(['url' => 'required|url']);
        $originalUrl = $request->input('url');

        $shortCode = Str::random(6); // Generate a random short code
        Cache::put("short_url:$shortCode", $originalUrl, now()->addDays(30)); // Store for 30 days

        return response()->json([
            'short_url' => url("/$shortCode")
        ]);
    }

    public function decode(Request $request)
    {
        $request->validate(['short_url' => 'required|string']);
        $shortCode = str_replace(url('/') . '/', '', $request->input('short_url'));

        $originalUrl = Cache::get("short_url:$shortCode");

        if ($originalUrl) {
            return response()->json(['original_url' => $originalUrl]);
        }

        return response()->json(['error' => 'URL not found'], 404);
    }
}