

<h1>{{ $user->name }}'s Followers</h1>
<ul>
    @foreach($followers as $follower)
        <li>{{ $follower->name }}</li>
    @endforeach
</ul>

{{-- <h1>{{ $user->name }}</h1>
    
<h2>Followers</h2>
<ul>
    @foreach ($user->followers as $follower)
        <li>{{ $follower->name }}</li>
    @endforeach
</ul>

<h2>Following</h2>
<ul>
    @foreach ($user->following as $following)
        <li>{{ $following->name }}</li>
    @endforeach
</ul> --}}