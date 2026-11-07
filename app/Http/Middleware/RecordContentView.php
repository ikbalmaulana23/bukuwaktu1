<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ContentView;
use App\Models\Post;
use App\Models\Audiobook;
use Symfony\Component\HttpFoundation\Response;

class RecordContentView
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $content = $request->route('post')
            ?? $request->route('audiobook');

        // Jika route parameter masih berupa ID/string
        if (is_string($content) || is_numeric($content)) {
            if ($request->route('post')) {
                $content = Post::find($content);
            } elseif ($request->route('audiobook')) {
                $content = Audiobook::find($content);
            }
        }

        if (
            $content &&
            is_object($content) &&
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
