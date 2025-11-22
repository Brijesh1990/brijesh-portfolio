// <!-- TYPEWRITER SCRIPT (place this before other page-end scripts) -->

/*
  Typewriter effect
  - cycles through the array `phrases`
  - types each character, waits, then deletes, then moves to next
  - safe: doesn't spam DOM updates, accessible with aria-live on the container
*/

document.addEventListener('DOMContentLoaded', function () {
  const el = document.getElementById('typewriter');

  // Customize the phrases you want to show (fix typos as needed)
  const phrases = [
    'Frontend Developer',
    'Fullstack Developer',
    'Mernstack Developer',
    'Data Scientist',
    'Data Analyst',
    'Web Developer',
    'Youtube Creater'
    
  ];

  const config = {
    typeSpeed: 80,      // ms per character when typing
    deleteSpeed: 40,    // ms per character when deleting
    pauseAfter: 1400,   // ms to wait after finishing a phrase before deleting
    pauseBetween: 500,  // extra pause before typing the next phrase
    loop: true          // whether to loop the phrases
  };

  let phraseIndex = 0;
  let charIndex = 0;
  let isDeleting = false;

  function tick() {
    const current = phrases[phraseIndex];
    if (!isDeleting) {
      // typing
      el.textContent = current.slice(0, ++charIndex);
      if (charIndex === current.length) {
        // finished typing
        setTimeout(() => {
          isDeleting = true;
          tick();
        }, config.pauseAfter);
        return;
      } else {
        setTimeout(tick, config.typeSpeed);
      }
    } else {
      // deleting
      el.textContent = current.slice(0, --charIndex);
      if (charIndex === 0) {
        // finished deleting
        isDeleting = false;
        phraseIndex = (phraseIndex + 1) % phrases.length;
        setTimeout(tick, config.pauseBetween);
        return;
      } else {
        setTimeout(tick, config.deleteSpeed);
      }
    }
  }

  // Start the loop with a small initial delay to let the page render
  setTimeout(tick, 300);
});

