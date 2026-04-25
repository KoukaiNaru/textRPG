@php use App\Models\User; @endphp
    <!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grave of Kings</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="rpg-page">

    <header class="rpg-header">
        <div class="rpg-crest"></div>
        <h1 class="rpg-title">Grave of Kings</h1>
        <p class="rpg-subtitle">Текстовая RPG</p>
    </header>

    @if(session('success'))
        <div class="rpg-flash rpg-flash-success">✦ {{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="rpg-flash rpg-flash-error">✦ {{ session('error') }}</div>
    @endif

    @if(session('user_id'))

        @php $user = User::find(session('user_id')); @endphp

        <div class="rpg-panel">
            <div class="rpg-welcome">
                <p class="rpg-welcome-name">⚔ {{ $user->name }}</p>
                <p class="rpg-welcome-name">{{ $user->level }} Level ◇ {{$user->coins}} Gold</p>
                <p class="rpg-welcome-tagline">Ваш голос эхом разносится по всему королевству...</p>
            </div>

            {{-- Тесты для проверки работоспособни методов

{{--            <a href="/inventory/create/5">Скрафтить Меч (Тест)</a>--}}
{{--            <br>--}}
{{--            <a href="/inventory/create/4">Скрафтить Дубину (Тест)</a>--}}
{{--            <a href="/coins">Получение денег (Тест)</a>--}}

            <div class="rpg-divider">
                <div class="rpg-divider-gem"></div>
            </div>

            <nav class="rpg-nav">

                {{-- Инвентарь --}}
                <a href="/inventory/list" class="rpg-nav-item">
          <span class="rpg-nav-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="24" height="24" fill="currentColor">
              <path
                  d="M465.4 192L431.1 144L209 144L174.7 192L465.4 192zM96 212.5C96 199.2 100.2 186.2 107.9 175.3L156.9 106.8C168.9 90 188.3 80 208.9 80L431 80C451.7 80 471.1 90 483.1 106.8L532 175.3C539.8 186.2 543.9 199.2 543.9 212.5L544 480C544 515.3 515.3 544 480 544L160 544C124.7 544 96 515.3 96 480L96 212.5z"/>
            </svg>
          </span>
                    <div>
                        <div class="rpg-nav-label">Инвентарь</div>
                        <div class="rpg-nav-desc">Посмотреть предметы</div>
                    </div>
                    <span class="rpg-nav-arrow">›</span>
                </a>

                {{-- Ковка --}}
                <a href="/inventory/create" class="rpg-nav-item">
          <span class="rpg-nav-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="24" height="24" fill="currentColor">
              <path
                  d="M246.9 82.3L271 67.8C292.6 54.8 317.3 48 342.5 48C379.3 48 414.7 62.6 440.7 88.7L504.6 152.6C519.6 167.6 528 188 528 209.2L528 240.1L547.7 259.8C563.3 244.2 588.6 244.2 604.3 259.8C620 275.4 619.9 300.7 604.3 316.4L540.3 380.4C524.7 396 499.4 396 483.7 380.4C468 364.8 468.1 339.5 483.7 323.8L464 304L433.1 304C411.9 304 391.5 295.6 376.5 280.6L327.4 231.5C312.4 216.5 304 196.1 304 174.9L304 162.2C304 151 298.1 140.5 288.5 134.8L246.9 109.8C236.5 103.6 236.5 88.6 246.9 82.4zM50.7 466.7L272.8 244.6L363.3 335.1L141.2 557.2C116.2 582.2 75.7 582.2 50.7 557.2C25.7 532.2 25.7 491.7 50.7 466.7z"/>
            </svg>
          </span>
                    <div>
                        <div class="rpg-nav-label">Ковка</div>
                        <div class="rpg-nav-desc">Создать оружие</div>
                    </div>
                    <span class="rpg-nav-arrow">›</span>
                </a>

            </nav>

            <div class="rpg-divider">
                <div class="rpg-divider-gem"></div>
            </div>

            <form method="POST" action="{{ route('logout') }}" class="rpg-form">
                @csrf
                <button type="submit" class="rpg-btn rpg-btn-ghost rpg-btn-full">
                    Выйти
                </button>
            </form>
        </div>

    @else

        <div class="rpg-panel">
            <p class="rpg-panel-title">Войдите в игру</p>

            <p style="text-align:center; font-style:italic; color:var(--text-dim); margin-bottom:20px; font-size:14px;">
                Введите имя своего героя
            </p>

            <form method="POST" action="/username" class="rpg-form">        @csrf
                <div class="rpg-input-group">
                    <label class="rpg-label" for="name">Имя героя</label>
                    <input
                        class="rpg-input"
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Введите имя..."
                        autocomplete="off"
                        value="{{ old('name') }}"
                    >
                </div>
                <button type="submit" class="rpg-btn rpg-btn-full">
                    ⚔ Войти
                </button>
            </form>

            @if($errors->any())
                <div class="rpg-errors">
                    @foreach($errors->all() as $error)
                        <p>✦ {{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>

    @endif

</div>

</body>
</html>
