<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Audiobook;
use Illuminate\Http\RedirectResponse;

class ContentBadgeController extends Controller
{
    // Pasang Editor's Choice untuk artikel
    public function storePost(Post $post): RedirectResponse
    {
        $post->assignEditorsChoice(auth()->id());

        return back()->with(
            'success',
            'Artikel berhasil dijadikan Editor\'s Choice.'
        );
    }

    // Hapus Editor's Choice dari artikel
    public function destroyPost(Post $post): RedirectResponse
    {
        $post->removeEditorsChoice();

        return back()->with(
            'success',
            'Badge Editor\'s Choice artikel berhasil dihapus.'
        );
    }

    // Pasang Editor's Choice untuk audiobook
    public function storeAudiobook(Audiobook $audiobook): RedirectResponse
    {
        $audiobook->assignEditorsChoice(auth()->id());

        return back()->with(
            'success',
            'Audiobook berhasil dijadikan Editor\'s Choice.'
        );
    }

    // Hapus Editor's Choice dari audiobook
    public function destroyAudiobook(Audiobook $audiobook): RedirectResponse
    {
        $audiobook->removeEditorsChoice();

        return back()->with(
            'success',
            'Badge Editor\'s Choice audiobook berhasil dihapus.'
        );
    }
}
