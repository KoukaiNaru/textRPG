@php use App\Models\User; @endphp
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grave of Kings</title>
    <link rel="stylesheet" href="resources/css/app.css">
    @vite(['resources/js/app.js','resources/css/app.css'])
</head>
<body>
@if(session('user_id'))
    <div class="rpg-page">
        <h1>
            Welcome, {{$user->name}}!
        </h1>
        <h2>
            Coins: {{$user->coins}}
            <form action="/add-coins" method="post">
                @csrf
                <button type="submit">Get coins</button>
            </form>
            <hr>
            Level: {{$user->level}}
            <hr>
        </h2>
        <h2>
            Gather {{$user->gather}}
            <form method="post" action="/gather">
                @csrf
                <button type="submit">Get resource</button>
            </form>
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
    </div>
@else
    <div class="rpg-page">
        <header class="rpg-header">
            <span class="rpg-crest">иконку сюда</span>
            <h1 class="rpg-title">Grave of Kings</h1>
            <p class="rpg-subtitle">Простой текст</p>
        </header>
        <!--страничка показывает когда юзер не вошел (страничка входа)-->
        <div class="rpg-panel">
            <p class="rpg-panel-title">Войдите в систему</p>
            <p style="text-align:center; font-style:italic; color:var(--animate-pulse); margin-bottom:20px; font-size:14px;">
            </p>

            <form method="post" action="/user" class="rpg-form">
                @csrf
                <div class="rpg-input-group">
                    <label class="rpg-label" for="name">Имя пользователя</label>
                    <input class="rpg-input" type="text" id="name" name="name" placeholder="Введите имя пользователя"
                           autocomplete="off">
                </div>
                <button type="submit" class="rpg-bth rpg-bth-full">Войти</button>
            </form>
        </div>
    </div>
    <script src="resources/js/app.js"></script>
    @if($errors->any())
        <div style="color: red">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif
@endif
</body>
</html>
