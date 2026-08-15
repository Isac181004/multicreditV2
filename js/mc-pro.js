/* ============================================================
   MULTICREDIT PRO KIT — JS de animaciones (3D tilt + reveal)
   Uso: <script src="js/mc-pro.js" defer></script>
   ============================================================ */
document.addEventListener('DOMContentLoaded', () => {
  const fine   = window.matchMedia('(pointer:fine)').matches;
  const reduce = window.matchMedia('(prefers-reduced-motion:reduce)').matches;

  /* ---------- REVEAL con stagger ---------- */
  const reveals = document.querySelectorAll('.mc-reveal');
  if ('IntersectionObserver' in window && !reduce) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        const sibs = Array.from(entry.target.parentElement.querySelectorAll('.mc-reveal'));
        const idx  = sibs.indexOf(entry.target);
        setTimeout(() => entry.target.classList.add('in'), Math.max(0, idx) * 110);
        io.unobserve(entry.target);
      });
    }, { threshold: 0.15 });
    reveals.forEach((el) => io.observe(el));
  } else {
    reveals.forEach((el) => el.classList.add('in'));
  }

  /* ---------- 3D TILT con glare ---------- */
  if (fine && !reduce) {
    document.querySelectorAll('.tilt-3d').forEach((card) => {
      if (!card.querySelector('.tilt-glare')) {
        const g = document.createElement('span');
        g.className = 'tilt-glare';
        card.prepend(g);
      }
      const max = 9; // grados
      card.addEventListener('mousemove', (e) => {
        const r  = card.getBoundingClientRect();
        const px = (e.clientX - r.left) / r.width;
        const py = (e.clientY - r.top)  / r.height;
        const rx = (py - 0.5) * -max;
        const ry = (px - 0.5) * max * 1.2;
        card.style.transform =
          `perspective(800px) rotateX(${rx}deg) rotateY(${ry}deg) translateY(-4px)`;
        card.style.setProperty('--gx', (px * 100) + '%');
        card.style.setProperty('--gy', (py * 100) + '%');
      });
      card.addEventListener('mouseleave', () => { card.style.transform = ''; });
    });
  }

  /* ---------- Botones magnéticos ---------- */
  if (fine && !reduce) {
    document.querySelectorAll('.btn-magnetic').forEach((btn) => {
      btn.addEventListener('mousemove', (e) => {
        const r = btn.getBoundingClientRect();
        const x = e.clientX - r.left - r.width  / 2;
        const y = e.clientY - r.top  - r.height / 2;
        btn.style.transform = `translate(${x * 0.25}px, ${y * 0.35}px)`;
      });
      btn.addEventListener('mouseleave', () => { btn.style.transform = ''; });
    });
  }
});
