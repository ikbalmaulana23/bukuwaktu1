<x-layout>
<div class="container">
    <h1>Edit Genre</h1>

    <!-- Form untuk mengedit genre -->
    <form action="{{ route('interest-genre.update', $interestGenre->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Menandakan bahwa ini adalah permintaan PUT -->

        <div class="form-group">
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" class="form-control" value="{{ old('genre', $interestGenre->genre) }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
    </form>

    <a href="{{ route('interest-genre.index') }}" class="btn btn-secondary mt-3">Back to Genres</a>
</div>
</x-layout>
