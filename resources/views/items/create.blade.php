<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ковка</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="rpg-page">

  <header class="rpg-header">
    <div class="rpg-crest">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="48" height="48" fill="var(--gold)">
        <path d="M246.9 82.3L271 67.8C292.6 54.8 317.3 48 342.5 48C379.3 48 414.7 62.6 440.7 88.7L504.6 152.6C519.6 167.6 528 188 528 209.2L528 240.1L547.7 259.8C563.3 244.2 588.6 244.2 604.3 259.8C620 275.4 619.9 300.7 604.3 316.4L540.3 380.4C524.7 396 499.4 396 483.7 380.4C468 364.8 468.1 339.5 483.7 323.8L464 304L433.1 304C411.9 304 391.5 295.6 376.5 280.6L327.4 231.5C312.4 216.5 304 196.1 304 174.9L304 162.2C304 151 298.1 140.5 288.5 134.8L246.9 109.8C236.5 103.6 236.5 88.6 246.9 82.4zM50.7 466.7L272.8 244.6L363.3 335.1L141.2 557.2C116.2 582.2 75.7 582.2 50.7 557.2C25.7 532.2 25.7 491.7 50.7 466.7z"/>
      </svg>
    </div>
    <h1 class="rpg-title">Ковка</h1>
    <p class="rpg-subtitle">Создай своё оружие</p>
  </header>

  <a href="/" class="rpg-back">← Назад</a>

  <div class="rpg-panel">
    <p class="rpg-panel-title">Новое оружие</p>

    <form method="POST" action="{{ route('inventory.store') }}" class="rpg-form">
      @csrf

      <div class="rpg-input-group">
        <label class="rpg-label" for="title">Название</label>
        <input
          class="rpg-input"
          type="text"
          id="title"
          name="title"
          placeholder="Например: Клинок теней"
          value="{{ old('title') }}"
        >
      </div>

      <div class="rpg-input-group">
        <label class="rpg-label" for="description">
          Описание <span style="color:var(--text-dim); font-size:11px;">(необязательно)</span>
        </label>
        <input
          class="rpg-input"
          type="text"
          id="description"
          name="description"
          placeholder="Откуда это оружие?"
          value="{{ old('description') }}"
        >
      </div>

      <div class="rpg-input-group">
        <label class="rpg-label" for="power">Сила (1–100)</label>
        <input
          class="rpg-input"
          type="number"
          id="power"
          name="power"
          placeholder="75"
          min="1" max="100"
          value="{{ old('power') }}"
        >
      </div>

      <div class="rpg-divider" style="margin:8px 0;"><div class="rpg-divider-gem"></div></div>

      <button type="submit" class="rpg-btn rpg-btn-full">
        Создать
      </button>
    </form>

    @if($errors->any())
      <div class="rpg-errors" style="margin-top:16px;">
        @foreach($errors->all() as $error)
          <p>✦ {{ $error }}</p>
        @endforeach
      </div>
    @endif
  </div>

</div>

</body>
</html>
