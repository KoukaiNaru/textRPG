<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $item->catalog->name }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="rpg-page">

  <header class="rpg-header">
    <h1 class="rpg-title">{{ $item->catalog->name }}</h1>
    <p class="rpg-subtitle">Информация о предмете</p>
  </header>

  <a href="/inventory/list" class="rpg-back">← Назад</a>

  <div class="rpg-panel" style="max-width:480px;">

    <div class="rpg-divider"><div class="rpg-divider-gem"></div></div>

    <div style="text-align:center; margin-bottom:20px;">
      <p style="font-size:13px; color:var(--text-dim); margin-bottom:6px;">Урон</p>
      <p style="font-size:42px; font-family:'Cinzel',serif; color:var(--gold); line-height:1;">{{ $item->catalog->power }}</p>
    </div>

    @if($item->catalog->type)
      <p style="text-align:center; color:var(--text-main); font-style:italic; margin-bottom:20px;">
        {{ $item->catalog->type }}
      </p>
    @endif

    <div class="rpg-divider"><div class="rpg-divider-gem"></div></div>

    <form method="POST" action="{{ route('inventory.destroy', $item->id) }}" onsubmit="return confirm('Удалить этот предмет?')">
  @csrf
  @method('DELETE')
      @csrf
      <button type="submit" class="rpg-btn rpg-btn-danger rpg-btn-full">
        Удалить предмет
      </button>
    </form>

  </div>

</div>

</body>
</html>
