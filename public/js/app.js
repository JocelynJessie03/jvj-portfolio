/* Jocelyn Vanessa Jessie Portfolio — app.js */

document.addEventListener('DOMContentLoaded', () => {

  /* ── Mobile nav toggle ── */
  const toggle  = document.getElementById('navToggle');
  const navList = document.getElementById('navLinks');

  if (toggle && navList) {
    toggle.addEventListener('click', () => {
      const isOpen = navList.classList.toggle('open');
      toggle.setAttribute('aria-expanded', isOpen);
      document.body.style.overflow = isOpen ? 'hidden' : '';
    });

    // Close when a link is clicked
    navList.querySelectorAll('.nav-link').forEach(link => {
      link.addEventListener('click', () => {
        navList.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      });
    });

    // Close on outside click
    document.addEventListener('click', e => {
      if (!toggle.contains(e.target) && !navList.contains(e.target)) {
        navList.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      }
    });
  }

  /* ── Smooth-scroll for hash anchors ── */
  document.querySelectorAll('a[href*="#"]').forEach(anchor => {
    anchor.addEventListener('click', e => {
      const href = anchor.getAttribute('href');
      if (!href.startsWith('#') && !href.includes(window.location.pathname)) return;

      const hash    = href.split('#')[1];
      const target  = document.getElementById(hash);
      if (!target) return;

      e.preventDefault();
      const offset  = 80; // header height
      const top     = target.getBoundingClientRect().top + window.scrollY - offset;
      window.scrollTo({ top, behavior: 'smooth' });
    });
  });

  /* ── Active nav link on scroll (single page) ── */
  const sections = document.querySelectorAll('section[id]');
  if (sections.length) {
    const navLinks = document.querySelectorAll('.nav-link');
    const onScroll = () => {
      let current = '';
      sections.forEach(sec => {
        if (window.scrollY >= sec.offsetTop - 100) current = sec.id;
      });
      navLinks.forEach(link => {
        const href = link.getAttribute('href');
        link.classList.toggle('active', href === '#' + current || href.endsWith('#' + current));
      });
    };
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  /* ── Auto-dismiss alerts ── */
  document.querySelectorAll('.alert').forEach(alert => {
    setTimeout(() => {
      alert.style.transition = 'opacity .5s';
      alert.style.opacity = '0';
      setTimeout(() => alert.remove(), 500);
    }, 5000);
  });

});
