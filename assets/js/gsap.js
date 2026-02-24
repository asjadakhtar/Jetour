// GSAP ANIMATION FUNCTIONS
function runGsapAnimation(container) {
  const elements = container.querySelectorAll(".gsap-reveal");
  if (!elements.length) return;

  gsap.killTweensOf(elements);

  elements.forEach((el, i) => {
    const isButton = el.tagName === "A" && el.classList.contains("opacity-70");

    gsap.to(el, {
      y: 0,
      opacity: isButton ? 0.7 : 1,
      duration: 1.1,
      ease: "power2.out",
      delay: i * 0.18,
    });
  });
}

function resetGsapAnimation(container) {
  const elements = container.querySelectorAll(".gsap-reveal");
  if (!elements.length) return;

  gsap.killTweensOf(elements);
  gsap.set(elements, { y: 120, opacity: 0 });
}







// --- GSAP Reveal + Driving Animation ---
document.addEventListener("DOMContentLoaded", function () {
  // Set Dashing as active in background, but DON'T run animation yet
  // FullPage.js afterLoad will trigger the animation when user arrives
  const dashingGroup = document.getElementById("group-dashing");
  if (dashingGroup) {
    document.querySelectorAll('.car-group').forEach(g => g.classList.remove('active-group'));
    dashingGroup.classList.add('active-group');
    document.querySelectorAll('.car-selector').forEach(t => t.classList.remove('active-thumb'));
    const dashingThumb = document.querySelector('.car-selector[data-target="group-dashing"]');
    if (dashingThumb) dashingThumb.classList.add('active-thumb');
    const btn = document.getElementById('car-explore-btn');
    if (btn && dashingThumb) btn.setAttribute('href', dashingThumb.getAttribute('data-link'));
    
    // Stage the car off-screen so it's ready to drive in
    resetCarAnimation(dashingGroup);
  }
});

function runCarAnimation(container) {
  const titles = container.querySelectorAll(".gsap-reveal:not(.button-reveal)");
  const button = container.querySelector(".button-reveal"); // Find button inside this group
  const car = container.querySelector(".car-move");

  gsap.killTweensOf([titles, car, button]);
  
  gsap.to([titles, button], {
    y: 0,
    opacity: 1, // Set to 1 for both
    duration: 1,
    stagger: 0.2,
    ease: "power2.out"
  });
  
  gsap.to(car, {
    x: 0,
    opacity: 1,
    duration: 1.4,
    ease: "power3.out",
    delay: 0.2
  });
}



function resetCarAnimation(container) {
  // Finding elements specifically inside the container
  const elements = container.querySelectorAll(".gsap-reveal, .car-move, .button-reveal");
  gsap.set(elements, { opacity: 0 });
  gsap.set(container.querySelectorAll(".gsap-reveal, .button-reveal"), { y: 50 });
  gsap.set(container.querySelector(".car-move"), { x: 150 }); 
}


document.querySelectorAll('.car-selector').forEach(thumb => {
  thumb.addEventListener('click', function() {
    document.querySelectorAll('.car-selector').forEach(t => t.classList.remove('active-thumb'));
    this.classList.add('active-thumb');
    const targetId = this.getAttribute('data-target');
    document.querySelectorAll('.car-group').forEach(group => group.classList.remove('active-group'));
    const activeGroup = document.getElementById(targetId);
    activeGroup.classList.add('active-group');
    resetCarAnimation(activeGroup);
    runCarAnimation(activeGroup);
  });
});
