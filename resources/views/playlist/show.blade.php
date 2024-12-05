<x-layout>

    <div class="container">
        <h1>{{ $playlist->name }}</h1>
        <p>{{ $playlist->description }}</p>
        <p><strong>Owner:</strong> {{ $playlist->user->name }}</p>
        <p><strong>Status:</strong> {{ $playlist->is_public ? 'Public' : 'Private' }}</p>

        <h2 class="mt-4">Audiobooks in this Playlist</h2>
        @if ($playlist->audiobooks->isEmpty())
            <p>No audiobooks in this playlist.</p>
        @else
            <ul class="list-group">
                @foreach ($playlist->audiobooks as $audiobook)
                    <li class="list-group-item">
                        <strong>{{ $audiobook->title }}</strong> - {{ $audiobook->author }}
                        <p>{{ $audiobook->description }}</p>
                    </li>
                @endforeach
            </ul>
        @endif

        <a href="{{ route('playlists.index') }}" class="btn btn-secondary mt-4">Back to Playlists</a>
    </div>

</x-layout>
