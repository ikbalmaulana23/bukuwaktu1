<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ContentView;
use Symfony\Component\HttpFoundation\Response;

class RecordContentView
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $content = $request->route('post')
            ?? $request->route('audiobook');

        if (
            $content &&
            $request->isMethod('GET') &&
            $response->isSuccessful()
        ) {
            ContentView::create([
                'viewable_type' => get_class($content),
                'viewable_id' => $content->id,
                'user_id' => $request->user()?->id,
                'viewed_at' => now(),
            ]);
        }

        return $response;
    }
}
