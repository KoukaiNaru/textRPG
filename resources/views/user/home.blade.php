@php use App\Models\User; @endphp
<head><title>Home</title></head>
<body>
@if(session('user_id'))

    @php
        $user = User::find(session('user_id'))
    @endphp

    <h1>
        Welcome, {{$user->name}}!
    </h1>
    <h2>
        Coins: {{$user->coins}}
        <form action="/add-coins" method="post">
            @csrf
            <button type="submit">Get coins (+10 coins)</button>
        </form>
        <hr>
        Level: {{$user->level}}
        <hr>
    </h2>

    <h2>
        <li><a href="/inventory/list">My inventory</a></li>
        <br>

        <hr>

        <li><a href="/inventory/create">Create weapon</a></li>
    </h2>

    <hr>

    <form action="/logout" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
@else
    <h1>
        Welcome, stranger! Please enter your name!
    </h1>

    <form method="post" action="/user">
        @csrf
        <input type="text" name="name" placeholder="Your name">
        <button type="submit">Accept</button>
    </form>

    @if($errors->any())
        <div style="color: red">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif
@endif
</body>
