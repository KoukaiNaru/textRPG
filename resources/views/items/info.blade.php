<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Инвентарь</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="rpg-page">

  <header class="rpg-header">
    <div class="rpg-crest">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="48" height="48" fill="var(--gold)">
        <path d="M465.4 192L431.1 144L209 144L174.7 192L465.4 192zM96 212.5C96 199.2 100.2 186.2 107.9 175.3L156.9 106.8C168.9 90 188.3 80 208.9 80L431 80C451.7 80 471.1 90 483.1 106.8L532 175.3C539.8 186.2 543.9 199.2 543.9 212.5L544 480C544 515.3 515.3 544 480 544L160 544C124.7 544 96 515.3 96 480L96 212.5z"/>
      </svg>
    </div>
    <h1 class="rpg-title">Инвентарь</h1>
    <p class="rpg-subtitle">Твоя коллекция оружия</p>
  </header>

  <a href="/" class="rpg-back">← Назад</a>

  @if(session('success'))
    <div class="rpg-flash rpg-flash-success">✦ {{ session('success') }}</div>
  @endif

  <div class="rpg-panel" style="max-width:640px;">

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
      <p class="rpg-panel-title" style="margin-bottom:0;">Оружие</p>
      <a href="/inventory/create" class="rpg-btn" style="padding:9px 18px; font-size:11px;">
        + Создать
      </a>
    </div>

    <div class="rpg-divider"><div class="rpg-divider-gem"></div></div>

    @if($items->count() > 0)

      <div class="rpg-inventory">
        @foreach($items as $item)

          <div style="display:flex; align-items:center; gap:10px;">
            <a href="/inventory/{{ $item->id }}" class="rpg-item-card" style="flex:1;">

              {{-- иконка по силе --}}
              <span class="rpg-item-icon" style="color:var(--gold);">
                @if($item->catalog->power >= 80)
                  {{-- легендарное: огонь --}}
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="28" height="28" fill="currentColor">
                    <path d="M160 0c0 114.9-138.4 151.1-89.6 288C99.5 190.3 177.3 168 192 168c-92.4 92.4 24 153.6-16 256 41.3-24 88-68.3 88-136 49.5 49.5 32 120-8 168 136-48 192-189.5 112-304C400 256 288 290 299.7 192 275.2 215.3 268.5 295.5 320 336c-96 0-128-168-160-336z"/>
                  </svg>

                @elseif($item->catalog->power >= 60)
                  {{-- эпическое: молния --}}
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="28" height="28" fill="currentColor" style="color:var(--gold-bright);">
                    <path d="M349.4 44.6c5.9-13.7 1.5-29.7-10.6-38.5s-28.6-8-39.9 1.8l-256 224c-10 8.8-13.6 22.9-8.9 35.3S50.7 288 64 288l111.5 0L98.6 467.4c-5.9 13.7-1.5 29.7 10.6 38.5s28.6 8 39.9-1.8l256-224c10-8.8 13.6-22.9 8.9-35.3s-16.6-20.7-30-20.7l-111.5 0L349.4 44.6z"/>
                  </svg>

                @elseif($item->catalog->power >= 40)
                  {{-- редкое: меч --}}
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="28" height="28" fill="currentColor" style="color:#a0b8d0;">
                    <path d="M315.4 15.5C309.7 5.9 299.2 0 288 0s-21.7 5.9-27.4 15.5l-96 160c-5.9 9.9-6.1 22.2-.4 32.2s16.3 16.2 27.8 16.2l32 0 0 32c0 17.7 14.3 32 32 32s32-14.3 32-32l0-32 32 0c11.5 0 22.2-6.3 27.8-16.2s5.5-22.3-.4-32.2l-96-160zM288 336c-61.9 0-112 50.1-112 112c0 35.3 28.7 64 64 64l96 0c35.3 0 64-28.7 64-64c0-61.9-50.1-112-112-112zm0 160l0-48c26.5 0 48 21.5 48 48l-48 0zm0-112c26.5 0 48 21.5 48 48l-48 0 0-48z"/>
                  </svg>

                @elseif($item->catalog->power >= 20)
                  {{-- необычное: кинжал --}}
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="28" height="28" fill="currentColor" style="color:#7aaa7a;">
                    <path d="M352 320c88.4 0 160-71.6 160-160c0-15.3-2.2-30.1-6.2-44.2c-3.1-10.8-16.4-13.2-23.3-4.5l-76.8 99.2c-6.5 8.4-18.2 10.1-26.7 4L338 185.8c-8.5-6.1-10.1-17.8-3.6-26.2l76.8-99.2c6.9-8.9 2.1-22-8.7-24.4C389.8 33.8 377.3 32 364.3 32C294.1 32 238.6 80.2 226.3 144L64 288l0-64-64 0 0 112L0 368l112 0 64 0 0-64 144-128.1c.7 5.4 1 10.8 1 16.1c0 88.4-71.6 160-160 160c-15.3 0-30.1-2.2-44.2-6.2c-10.8-3.1-13.2 16.4-4.5 23.3L211.5 421c5.7 5.7 14.3 7.4 21.8 4.3C256.4 415.6 288 384.1 288 346c0-5.4-.7-10.6-1.9-15.6L352 320z"/>
                  </svg>

                @else
                  {{-- обычное --}}
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="28" height="28" fill="currentColor" style="color:var(--text-dim);">
                    <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zm-32 224a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/>
                  </svg>
                @endif
              </span>

              <div class="rpg-item-info">
                <div class="rpg-item-name">{{ $item->catalog->name }}</div>
                <div class="rpg-item-desc">
                  {{ $item->catalog->type ?: 'Нет описания' }}
                </div>
              </div>

              <div class="rpg-item-power">
                <span class="rpg-item-power-val">{{ $item->catalog->power }}</span>
                <span class="rpg-item-power-label">урон</span>
              </div>
            </a>

            <form method="POST" action="{{ route('inventory.destroy', $item->id) }}">
  @csrf
  @method('DELETE')
              @csrf
              <button type="submit" class="rpg-btn rpg-btn-danger" title="Удалить">✕</button>
            </form>
          </div>

        @endforeach
      </div>

    @else

      <div class="rpg-empty">
        <p class="rpg-empty-text">Инвентарь пуст</p>
        <a href="/inventory/create" class="rpg-btn" style="margin-top:20px; display:inline-block;">
          Создать оружие
        </a>
      </div>

    @endif

  </div>

</div>

</body>
</html>
