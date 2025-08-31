document.addEventListener('DOMContentLoaded', function() {
  const popupOverlay = document.getElementById('popupOverlay');
  const popupClose = document.getElementById('popupClose');
  const popupCarImage = document.getElementById('popupCarImage');
  const popupCarTitle = document.getElementById('popupCarTitle');
  const popupCarSpecs = document.getElementById('popupCarSpecs');
  const dailyPrice = document.getElementById('dailyPrice');
  const weeklyPrice = document.getElementById('weeklyPrice');
  const biweeklyPrice = document.getElementById('biweeklyPrice');
  const monthlyPrice = document.getElementById('monthlyPrice');

  // Botões "Ver Valores"
  const btnValores = document.querySelectorAll('.btn-valores');
  btnValores.forEach(btn => {
    btn.addEventListener('click', function(e) {
      const card = btn.closest('.seminovo-card');

      // Preenche o modal com os data-attributes
      popupCarImage.src = card.dataset.image;
      popupCarImage.alt = card.dataset.title;
      popupCarTitle.textContent = card.dataset.title;
      popupCarSpecs.textContent = card.dataset.specs;
      dailyPrice.textContent = card.dataset.daily;
      weeklyPrice.textContent = card.dataset.weekly;
      biweeklyPrice.textContent = card.dataset.biweekly;
      monthlyPrice.textContent = card.dataset.monthly;

      // Mostra o popup
      popupOverlay.classList.add('active');
      document.body.style.overflow = 'hidden';
    });
  });

  // Fechar popup
  popupClose.addEventListener('click', () => {
    popupOverlay.classList.remove('active');
    document.body.style.overflow = 'auto';
  });

  // Fechar ao clicar no overlay
  popupOverlay.addEventListener('click', function(e) {
    if (e.target === popupOverlay) {
      popupOverlay.classList.remove('active');
      document.body.style.overflow = 'auto';
    }
  });

  // Fechar com ESC
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && popupOverlay.classList.contains('active')) {
      popupOverlay.classList.remove('active');
      document.body.style.overflow = 'auto';
    }
  });

  // Botão reservar
  const btnReservar = document.querySelector('.btn-reservar');
  if (btnReservar) {
    btnReservar.addEventListener('click', function() {
      window.location.href = '/reserva';
    });
  }
});