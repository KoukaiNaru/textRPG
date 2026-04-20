// import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {

  //(золотые искры фоном)
  function spawnParticles() {
    const container = document.createElement('div');
    container.id = 'rpg-particles';
    document.body.prepend(container);

    const count = 18;
    for (let i = 0; i < count; i++) {
      const p = document.createElement('div');
      p.className = 'particle';
      const size = Math.random() * 2.5 + 1;
      p.style.cssText = `
        left: ${Math.random() * 100}%;
        width: ${size}px;
        height: ${size}px;
        animation-duration: ${Math.random() * 12 + 8}s;
        animation-delay: ${Math.random() * 10}s;
        opacity: 0;
      `;
      container.appendChild(p);
    }
  }
  spawnParticles();

  //анимация заполнения
  const bar = document.querySelector('.rpg-power-bar-fill');
  if (bar) {
    const target = bar.dataset.power || '0';
    bar.style.width = '0%';
    setTimeout(() => {
      bar.style.width = Math.min(Number(target), 100) + '%';
    }, 300);
  }

  //ПОДТВЕРЖДЕНИЕ УДАЛЕНИЯ
  document.querySelectorAll('form[data-confirm]').forEach(form => {
    form.addEventListener('submit', e => {
      const msg = form.dataset.confirm || 'Are you sure?';
      if (!confirm(msg)) e.preventDefault();
    });
  });

  //FLASH-сообщения
  document.querySelectorAll('.rpg-flash').forEach(el => {
    setTimeout(() => {
      el.style.transition = 'opacity 0.6s, transform 0.6s';
      el.style.opacity = '0';
      el.style.transform = 'translateY(-8px)';
      setTimeout(() => el.remove(), 600);
    }, 3500);
  });

  //ффект при клике
  document.querySelectorAll('.rpg-item-card').forEach(card => {
    card.addEventListener('click', function (e) {
      const rect = card.getBoundingClientRect();
      const ripple = document.createElement('span');
      ripple.style.cssText = `
        position:absolute;
        border-radius:50%;
        transform:scale(0);
        animation:ripple 0.5s linear;
        background:rgba(201,168,76,0.15);
        width:120px; height:120px;
        left:${e.clientX - rect.left - 60}px;
        top:${e.clientY - rect.top - 60}px;
        pointer-events:none;
      `;
      card.style.position = 'relative';
      card.style.overflow = 'hidden';
      card.appendChild(ripple);
      setTimeout(() => ripple.remove(), 500);
    });
  });

  //стиль ripple
  const style = document.createElement('style');
  style.textContent = `@keyframes ripple { to { transform: scale(2.5); opacity: 0; } }`;
  document.head.appendChild(style);

});

