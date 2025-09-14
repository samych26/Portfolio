// script.js (copie-colle tout)
document.addEventListener('DOMContentLoaded', () => {
  // ------ Helpers ------
  const safeText = (str) => (typeof str === 'string' ? str : '');

  // ----- Elements -----
  const yearEl = document.getElementById('year');
  const themeToggle = document.getElementById('theme-toggle');
  const langSelect = document.getElementById('lang-select');
  const typedTextEl = document.getElementById('typed-text');

  // set year
  if (yearEl) yearEl.textContent = new Date().getFullYear();

  // ----- Theme toggle -----
  const root = document.body;
  const savedTheme = localStorage.getItem('theme') || 'light';
  if (savedTheme === 'dark') root.classList.add('dark-theme');
  if (themeToggle) themeToggle.checked = savedTheme === 'dark';
  if (themeToggle) {
    themeToggle.addEventListener('change', () => {
      root.classList.toggle('dark-theme');
      const isDark = root.classList.contains('dark-theme');
      localStorage.setItem('theme', isDark ? 'dark' : 'light');
    });
  }

  // ----- Translations -----
  const translations = {
    fr: {
      nav: ["ACCUEIL","À PROPOS","FORMATIONS","COMPÉTENCES","PROJETS","CONTACT"],
      homeTitle: "Je suis <span style='font-size:1.3em;font-weight:bold'>Samy Cherfa</span>",
      btnCv: "Télécharger le CV",
      profilTitle: '<i class="bi bi-person-circle me-2"></i> Profil',
      profilDesc1: "Je m'appelle <strong>Samy Cherfa</strong>, étudiant en 3ᵉ année de Bachelor <em>Concepteur et Développeur d'Applications</em> à l'<strong>ECE Paris</strong>.",
      profilDesc2: "Passionné par le développement <strong>web</strong> et <strong>mobile</strong>, j’aime concevoir des solutions modernes, intuitives et performantes, qui offrent une véritable valeur ajoutée aux utilisateurs. Mon objectif est de continuer à progresser, d’enrichir mes compétences techniques et créatives, et de contribuer à des projets ambitieux où innovation et efficacité se rejoignent.",
      formations: "🎓 Formations",
      timeline: [
        "BACCALAURÉAT <br> Technique Mathématique <br> 2021-2022, Lycée El Hammadia",
        "LICENCE <br> Systèmes Informatiques <br> 2022-2025, Université Abderrahmane Mira",
        "BACHELOR 3 <br> Concepteur et Développeur d'Applications <br> rentrée 2025, ECE Paris"
      ],
      competences: "💡 Mes Compétences",
      projets: '<i class="bi bi-code-slash me-2"></i> Projets',
      github: "GitHub",
      contact: "Contact",
      placeholders: ["Ton nom", "Ton email", "Ton message"],
      contactBtn: "Envoyer",
      footer: "© {year} Samy Cherfa — Portfolio",
      typewriter: "Étudiant à l’ECE Paris, en 3ᵉ année de Bachelor Concepteur & Développeur d’Applications."
    },
    en: {
      nav: ["HOME","ABOUT","EDUCATION","SKILLS","PROJECTS","CONTACT"],
      homeTitle: "I am <span style='font-size:1.3em;font-weight:bold'>Samy Cherfa</span>",
      btnCv: "Download CV",
      profilTitle: '<i class="bi bi-person-circle me-2"></i> Profile',
      profilDesc1: "My name is <strong>Samy Cherfa</strong>, a 3rd-year Bachelor student in <em>Application Design and Development</em> at <strong>ECE Paris</strong>.",
      profilDesc2: "Passionate about <strong>web</strong> and <strong>mobile</strong> development, I love designing modern, intuitive and high-performance solutions that bring real value to users. My goal is to keep improving, enrich my technical and creative skills, and contribute to ambitious projects where innovation meets efficiency.",
      formations: "🎓 Education",
      timeline: [
        "BACCALAUREATE <br> Technical Mathematics <br> 2021-2022, Lycée El Hammadia",
        "BACHELOR'S DEGREE <br> Computer Systems <br> 2022-2025, Abderrahmane Mira University",
        "BACHELOR 3 <br> Application Design and Development <br> 2025 intake, ECE Paris"
      ],
      competences: "💡 My Skills",
      projets: '<i class="bi bi-code-slash me-2"></i> Projects',
      github: "GitHub",
      contact: "Contact",
      placeholders: ["Your name","Your email","Your message"],
      contactBtn: "Send",
      footer: "© {year} Samy Cherfa — Portfolio",
      typewriter: "Student at ECE Paris, 3rd-year Bachelor in Application Design & Development."
    }
  };

  // ----- Typewriter (géré proprement, annulation possible) -----
  let typewriterTimer = null;
  function startTypewriter(text) {
    if (!typedTextEl) return;
    if (typewriterTimer) { clearTimeout(typewriterTimer); typewriterTimer = null; }
    typedTextEl.textContent = '';
    let i = 0;
    function tick() {
      if (i < text.length) {
        typedTextEl.textContent += text.charAt(i++);
        typewriterTimer = setTimeout(tick, 40);
      } else {
        typewriterTimer = null;
      }
    }
    tick();
  }

  // ----- Traduction : applique textes en toute sécurité -----
  function applyTranslations(lang) {
    const t = translations[lang] || translations.fr;

    // Navbar
    const navLinks = document.querySelectorAll(".navbar-nav .nav-link");
    navLinks.forEach((el, i) => { if (t.nav[i]) el.textContent = t.nav[i]; });

    // Home / bouton CV
    const homeH1 = document.querySelector("#home h1");
    if (homeH1) homeH1.innerHTML = safeText(t.homeTitle);
    const btnCvEl = document.querySelector(".btnCv");
    if (btnCvEl) btnCvEl.textContent = safeText(t.btnCv);

    // Profil
    const aboutH2 = document.querySelector("#about h2");
    if (aboutH2) aboutH2.innerHTML = safeText(t.profilTitle);
    const aboutPs = document.querySelectorAll("#about p");
    if (aboutPs[0]) aboutPs[0].innerHTML = safeText(t.profilDesc1);
    if (aboutPs[1]) aboutPs[1].innerHTML = safeText(t.profilDesc2);

    // Formations / timeline
    const formationsH2 = document.querySelector("#formations h2");
    if (formationsH2) formationsH2.textContent = safeText(t.formations);
    const timelineSpans = document.querySelectorAll("#formations .point span");
    timelineSpans.forEach((span, i) => {
      if (t.timeline[i]) span.innerHTML = safeText(t.timeline[i]);
    });

    // Compétences
    const skillsH2 = document.querySelector("#skills h2");
    if (skillsH2) skillsH2.textContent = safeText(t.competences);

    // Projets (boutons)
    const projectButtons = document.querySelectorAll("#projects .button-holder p");
    projectButtons.forEach(p => p.textContent = safeText(t.github));

    // Contact (placeholders) - utilise id si présent, sinon fallback par query
    const contactName = document.getElementById('contact-name') || document.querySelector('#contact input[type="text"]');
    const contactEmail = document.getElementById('contact-email') || document.querySelector('#contact input[type="email"]');
    const contactMsg = document.getElementById('contact-message') || document.querySelector('#contact textarea');
    if (contactName) contactName.placeholder = safeText(t.placeholders[0]);
    if (contactEmail) contactEmail.placeholder = safeText(t.placeholders[1]);
    if (contactMsg) contactMsg.placeholder = safeText(t.placeholders[2]);
    const contactBtn = document.querySelector("#contact button");
    if (contactBtn) contactBtn.textContent = safeText(t.contactBtn);

    // Footer
    const footerSmall = document.querySelector("footer small");
    if (footerSmall) footerSmall.textContent = safeText(t.footer).replace('{year}', new Date().getFullYear());

    // relancer le typewriter
    startTypewriter(safeText(t.typewriter));

    // Mise à jour immédiate de la timeline (pour afficher correctement la barre)
    updateTimeline();
  }

  // ----- Timeline update (sécurisé) -----
  function updateTimeline() {
    const section = document.getElementById("formations");
    if (!section) return;
    const progressLine = section.querySelector(".progress-line");
    const points = section.querySelectorAll(".point");
    const timeline = section.querySelector(".timeline");

    if (!progressLine || !timeline) return;

    const rect = section.getBoundingClientRect();
    const windowHeight = window.innerHeight;
    const screenMiddle = windowHeight / 1.1;
    let progress = (screenMiddle - rect.top) / rect.height;
    progress = Math.min(Math.max(progress, 0), 1);

    if (window.innerWidth <= 768) {
      const timelineHeight = timeline.offsetHeight * 0.8;
      const minTop = timeline.offsetHeight * 0.1;
      const currentHeight = progress * timelineHeight;
      progressLine.style.height = currentHeight + "px";
      progressLine.style.top = minTop + "px";
      progressLine.style.left = "0";
      progressLine.style.width = "3px";
      const progressPercent = (currentHeight / timelineHeight) * 100;
      points.forEach(point => {
        const step = parseInt(point.dataset.step) || 0;
        point.classList.toggle("active", progressPercent >= step);
      });
    } else {
      const timelineWidth = timeline.offsetWidth * 0.8;
      const minLeft = timeline.offsetWidth * 0.1;
      const currentWidth = progress * timelineWidth;
      progressLine.style.width = currentWidth + "px";
      progressLine.style.left = minLeft + "px";
      progressLine.style.top = "50%";
      progressLine.style.height = "3px";
      const progressPercent = (currentWidth / timelineWidth) * 100;
      points.forEach(point => {
        const step = parseInt(point.dataset.step) || 0;
        point.classList.toggle("active", progressPercent >= step);
      });
    }
  }

  // ----- Scroll / nav activation -----
  window.addEventListener('scroll', () => {
    updateTimeline();
    activateNavLink();
  });

  window.addEventListener('resize', updateTimeline);

  // active nav link
  function activateNavLink() {
    const sections = document.querySelectorAll("section[id]");
    const navLinks = document.querySelectorAll(".navbar-nav .nav-link");
    const scrollPos = window.scrollY + 80;
    sections.forEach(section => {
      if (scrollPos >= section.offsetTop && scrollPos < section.offsetTop + section.offsetHeight) {
        navLinks.forEach(link => {
          link.classList.toggle('active', link.getAttribute('href') === '#' + section.id);
        });
      }
    });
  }

  // ----- Language select init -----
  const savedLang = localStorage.getItem('lang') || 'fr';
  if (langSelect) langSelect.value = savedLang;
  applyTranslations(savedLang);

  if (langSelect) {
    langSelect.addEventListener('change', (e) => {
      const lang = langSelect.value || 'fr';
      localStorage.setItem('lang', lang);
      applyTranslations(lang);
    });
  }

  // ----- Smooth scroll for internal links (delegation) -----
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', (e) => {
      const target = document.querySelector(a.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({behavior:'smooth', block:'start'});
      }
    });
  });

  // initial calls
  updateTimeline();
  activateNavLink();
});


 // Initialiser EmailJS
  (function() {
    emailjs.init("4cIJSsFLljKsZzE3e"); // 👉 Remplace par ta clé publique
  })();

  // Gestion du formulaire
document.getElementById("contact-form").addEventListener("submit", function(e) {
  e.preventDefault();

  const feedback = document.getElementById("contact-feedback");
  const name = document.getElementById("contact-name")?.value.trim() || "";
  const email = document.getElementById("contact-email")?.value.trim() || "";
  const message = document.getElementById("contact-message")?.value.trim() || "";

  let errors = [];
  if (name.length < 3) {
    errors.push("Le nom doit contenir au moins 3 caractères.");
  }
  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    errors.push("L'email n'est pas valide.");
  }
  if (message.length < 10) {
    errors.push("Le message doit contenir au moins 10 caractères.");
  }

  if (errors.length > 0) {
    feedback.innerHTML = errors.map(e => `<div style="color:red;">${e}</div>`).join("");
    return;
  }

  feedback.innerHTML = "";

  emailjs.sendForm("service_k2cuomh","template_ecu4ue4", this)
    .then(function() {
      feedback.textContent = "✅ Message envoyé avec succès !";
      feedback.style.color = "green";
      e.target.reset();
    }, function(error) {
      feedback.textContent = "❌ Erreur lors de l’envoi. Réessaye.";
      feedback.style.color = "red";
      console.error("EmailJS Error:", error);
    });
});
  