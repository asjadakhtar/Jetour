// document.addEventListener('DOMContentLoaded', function () {
//   if (!document.querySelector('#fullpage')) return;

//   new fullpage('#fullpage', {
//     licenseKey: 'gplv3-license',
//     autoScrolling: true,
//     fitToSection: true,
//     scrollingSpeed: 800,
//     navigation: true
//   });

// console.log(typeof fullpage);

// });


class InfiniteSlider {
  constructor(config = {}) {
    this.trackSelector = config.trackSelector || '#uf-slider-track';
    this.slideSelector = config.slideSelector || '.uf-slide';
    this.nextBtnSelector = config.nextBtnSelector || '#uf-next-trigger';
    this.prevBtnSelector = config.prevBtnSelector || '#uf-prev-trigger';
    this.textClass = config.textClass || 'uf-animate-text';
    this.activeTextClass = config.activeTextClass || 'uf-text-active';
    this.transitionDuration = config.transitionDuration || 700;
    this.textDelay = config.textDelay || 150; 
    this.track = document.querySelector(this.trackSelector);
    this.nextBtn = document.querySelector(this.nextBtnSelector);
    this.prevBtn = document.querySelector(this.prevBtnSelector);
    
    if (!this.track) {
      console.error('Slider track not found');
      return;
    }
    
    this.currentIndex = 1;
    this.slideWidth = 100;
    this.isTransitioning = false;
    
    this.init();
  }
  
  init() {
    this.originalSlides = Array.from(this.track.querySelectorAll(this.slideSelector));
    
    if (this.originalSlides.length === 0) {
      console.error('No slides found');
      return;
    }
    
    this.createClones();
    this.allSlides = Array.from(this.track.querySelectorAll(this.slideSelector));
    this.setInitialPosition();
    this.bindEvents();
    
    // Show initial text with animation after a brief delay
    setTimeout(() => this.showInitialText(), 100);
  }
  
  createClones() {
    const firstClone = this.originalSlides[0].cloneNode(true);
    const lastClone = this.originalSlides[this.originalSlides.length - 1].cloneNode(true);
    
    firstClone.dataset.clone = 'first';
    lastClone.dataset.clone = 'last';
    
    this.track.appendChild(firstClone);
    this.track.insertBefore(lastClone, this.originalSlides[0]);
  }
  
  setInitialPosition() {
    this.track.style.transition = 'none';
    this.track.style.transform = `translateX(-${this.slideWidth * this.currentIndex}%)`;
  }
  
  showInitialText() {
    const activeSlide = this.allSlides[this.currentIndex];
    const text = activeSlide?.querySelector(`.${this.textClass}`);
    
    if (text) {
      // Trigger animation by adding active class
      requestAnimationFrame(() => {
        text.classList.add(this.activeTextClass);
      });
    }
  }
  
  bindEvents() {
    if (this.nextBtn) {
      this.nextBtn.addEventListener('click', () => this.moveNext());
    }
    
    if (this.prevBtn) {
      this.prevBtn.addEventListener('click', () => this.movePrev());
    }
    
    document.addEventListener('keydown', (e) => this.handleKeyboard(e));
    this.track.addEventListener('transitionend', () => this.handleTransitionEnd());
  }
  
  handleKeyboard(e) {
    if (e.key === 'ArrowRight') {
      this.moveNext();
    } else if (e.key === 'ArrowLeft') {
      this.movePrev();
    }
  }
  
  moveNext() {
    if (this.isTransitioning || this.currentIndex >= this.allSlides.length - 1) {
      return;
    }
    
    this.isTransitioning = true;
    this.currentIndex++;
    this.slide();
  }
  
  movePrev() {
    if (this.isTransitioning || this.currentIndex <= 0) {
      return;
    }
    
    this.isTransitioning = true;
    this.currentIndex--;
    this.slide();
  }
  
  slide() {
    this.track.style.transition = `transform ${this.transitionDuration}ms ease-in-out`;
    this.track.style.transform = `translateX(-${this.slideWidth * this.currentIndex}%)`;
    this.animateText(this.currentIndex);
  }
  
  handleTransitionEnd() {
    const currentSlide = this.allSlides[this.currentIndex];
    
    if (currentSlide.dataset.clone === 'first') {
      this.jumpToSlide(1);
    } else if (currentSlide.dataset.clone === 'last') {
      this.jumpToSlide(this.allSlides.length - 2);
    }
    
    this.isTransitioning = false;
  }
  
  jumpToSlide(index) {
    this.track.style.transition = 'none';
    this.currentIndex = index;
    this.track.style.transform = `translateX(-${this.slideWidth * this.currentIndex}%)`;
    
    // Keep text active during instant jump without re-animating
    const text = this.allSlides[this.currentIndex].querySelector(`.${this.textClass}`);
    if (text && !text.classList.contains(this.activeTextClass)) {
      text.classList.add(this.activeTextClass);
    }
  }
  
  animateText(index) {
    // Remove active class from all text elements
    this.track.querySelectorAll(`.${this.textClass}`).forEach(txt => {
      txt.classList.remove(this.activeTextClass);
    });
    
    // Add active class to current slide's text with delay for animation
    const activeSlide = this.allSlides[index];
    const text = activeSlide?.querySelector(`.${this.textClass}`);
    
    if (text) {
      setTimeout(() => {
        text.classList.add(this.activeTextClass);
      }, this.textDelay);
    }
  }
  
  goToSlide(index) {
    if (index < 0 || index >= this.originalSlides.length || this.isTransitioning) {
      return;
    }
    
    this.isTransitioning = true;
    this.currentIndex = index + 1;
    this.slide();
  }
  
  destroy() {
    if (this.nextBtn) {
      this.nextBtn.removeEventListener('click', this.moveNext);
    }
    
    if (this.prevBtn) {
      this.prevBtn.removeEventListener('click', this.movePrev);
    }
    
    this.track.querySelectorAll('[data-clone]').forEach(clone => clone.remove());
    this.track.style.transform = '';
    this.track.style.transition = '';
  }
}


//header logic hidden menu
const header = document.getElementById("main-header");
const triggers = document.querySelectorAll(".nav-trigger");
const menuContainer = document.getElementById("mega-menu-container");
const allMenus = document.querySelectorAll(".menu-content");

function openMenu(targetId) {
  allMenus.forEach((menu) => menu.classList.replace("flex", "hidden"));
  const activeMenu = document.getElementById(targetId);
  if (activeMenu) {
    activeMenu.classList.replace("hidden", "flex");
    menuContainer.classList.remove("hidden");
    setTimeout(() => {
      menuContainer.classList.add("opacity-100");
    }, 10);
  }
}

function closeAllMenus() {
  menuContainer.classList.remove("opacity-100");
  setTimeout(() => {
    if (!menuContainer.classList.contains("opacity-100")) {
      menuContainer.classList.add("hidden");
      allMenus.forEach((menu) => menu.classList.replace("flex", "hidden"));
    }
  }, 300);
}

triggers.forEach((trigger) => {
  trigger.addEventListener("mouseenter", () => {
    const target = trigger.getAttribute("data-target");
    openMenu(target);
  });
});

header.addEventListener("mouseleave", (e) => {
  closeAllMenus();
});





// Initialize the slider
document.addEventListener('DOMContentLoaded', () => {
  const slider = new InfiniteSlider({
    trackSelector: '#uf-slider-track',
    slideSelector: '.uf-slide',
    nextBtnSelector: '#uf-next-trigger',
    prevBtnSelector: '#uf-prev-trigger',
    textClass: 'uf-animate-text',
    activeTextClass: 'uf-text-active',
    transitionDuration: 700,
    textDelay: 150
  });
  
  window.slider = slider;
}); 


// Initialize second slider instance 
const slider2 = new InfiniteSlider({
  trackSelector: '#uf-slider-track-2',
  slideSelector: '.uf-slide',
  nextBtnSelector: '#uf-next-trigger-2',
  prevBtnSelector: '#uf-prev-trigger-2',
  textClass: 'uf-animate-text',
  activeTextClass: 'uf-text-active',
  transitionDuration: 700,
  textDelay: 100
});
window.slider2 = slider2;



// Initialize second slider instance 
const slider3= new InfiniteSlider({
  trackSelector: '#uf-slider-track-3',
  slideSelector: '.uf-slide',
  nextBtnSelector: '#uf-next-trigger-3',
  prevBtnSelector: '#uf-prev-trigger-3',
  textClass: 'uf-animate-text',
  activeTextClass: 'uf-text-active',
  transitionDuration: 700,
  textDelay: 100
});
window.slider3 = slider3;




// ===== DASHING STYLE SLIDER - ADD THIS TO main.js =====
document.addEventListener('DOMContentLoaded', function() {
    const dTrack = document.getElementById('dashing-track');
    const dNext = document.getElementById('dashing-next');
    const dPrev = document.getElementById('dashing-prev');
    const dBar = document.getElementById('dashing-bar');

    if (!dTrack || !dNext || !dPrev || !dBar) return;

    function getScrollStep() {
        const firstItem = dTrack.querySelector('.dashing-item');
        return firstItem ? firstItem.offsetWidth + 16 : 300;
    }

    dNext.addEventListener('click', (e) => {
        e.preventDefault();
        dTrack.scrollBy({ left: getScrollStep(), behavior: 'smooth' });
    });

    dPrev.addEventListener('click', (e) => {
        e.preventDefault();
        dTrack.scrollBy({ left: -getScrollStep(), behavior: 'smooth' });
    });

    // FILL LOGIC START
    dTrack.addEventListener('scroll', function() {
        const scrollL = dTrack.scrollLeft;
        const maxScroll = dTrack.scrollWidth - dTrack.clientWidth;
        
        if (maxScroll <= 0) return;

        // Calculate scroll percentage (0 to 1)
        const scrollPercent = scrollL / maxScroll;

        // The bar starts at 25% width and grows to 100%
        const minWidth = 25; 
        const fillWidth = minWidth + (scrollPercent * (100 - minWidth));
        
        // Apply the width to create the "fill" effect
        dBar.style.width = fillWidth + "%";

        // Update button opacity
        dPrev.style.opacity = scrollL < 10 ? "0.3" : "1";
        dNext.style.opacity = scrollL >= maxScroll - 10 ? "0.3" : "1";
    });
    // FILL LOGIC END

    // Initial check
    dPrev.style.opacity = "0.3";
    
    window.addEventListener('load', () => {
        // Trigger scroll event once to set initial bar width
        dTrack.dispatchEvent(new Event('scroll'));
    });
});



document.addEventListener('DOMContentLoaded', () => {
    const overlay = document.getElementById('mobile-menu-overlay');
    const trigger = document.getElementById('mobile-menu-trigger');
    const closeBtn = document.getElementById('mobile-menu-close');
    const accordions = document.querySelectorAll('.mobile-accordion');

    // 1. Open/Close Menu
    trigger.addEventListener('click', () => {
        overlay.classList.remove('translate-x-full');
        document.body.style.overflow = 'hidden'; // Stop page scrolling
    });

    closeBtn.addEventListener('click', () => {
        overlay.classList.add('translate-x-full');
        document.body.style.overflow = ''; // Resume page scrolling
    });

    // 2. Accordion Toggle Logic
    accordions.forEach(acc => {
        const headerBtn = acc.querySelector('button');
        const content = acc.querySelector('.accordion-content');
        const plusSign = acc.querySelector('.plus-icon');

        headerBtn.addEventListener('click', () => {
            const isCurrentlyOpen = !content.classList.contains('hidden');

            // Optional: Close all other open accordions first
            accordions.forEach(other => {
                other.querySelector('.accordion-content').classList.add('hidden');
                other.querySelector('.plus-icon').textContent = '+';
            });

            // Toggle current one
            if (isCurrentlyOpen) {
                content.classList.add('hidden');
                plusSign.textContent = '+';
            } else {
                content.classList.remove('hidden');
                plusSign.textContent = '−'; // Changes to minus
            }
        });
    });
});








// ===============================
// FULLPAGE INITIALIZATION
// ===============================
var myFullpage = new fullpage("#fullpage", {
  licenseKey: "gplv3-license",

  // Core settings
  autoScrolling: true,
  fitToSection: true,
  scrollingSpeed: 1000,
  controlArrows: false,
  loopHorizontal: true,

  // ✅ MOBILE FIXES
  touchSensitivity: 15,
  responsiveWidth: 0,

  // ✅ INNER SCROLL AREAS
  scrollOverflow: true,
  scrollOverflowOptions: {
    click: true,
    bounce: false,
    eventPassthrough: "horizontal"  // ✅ FIX: touch events block nahi hote
  },

  // allow normal scroll areas
  normalScrollElements: ".scroll-section, footer",

  // ===============================
  // AFTER SECTION LOAD
  // ===============================
  afterLoad: function (origin, destination, direction) {

    // ✅ LAST SECTION (FOOTER SCROLL ENABLE)
    if (destination.isLast) {
      setTimeout(() => {
        fullpage_api.setAutoScrolling(false);
        fullpage_api.setFitToSection(false);
      }, 600); // ✅ FIX: 100 → 600 — mobile par touch event settle hone ka waqt milta hai

    } else {
      fullpage_api.setAutoScrolling(true);
      fullpage_api.setFitToSection(true);
    }

    // ===== CAR SECTION ANIMATION =====
    if (destination.item.classList.contains("car-section")) {
      const activeGroup = destination.item.querySelector(".car-group.active-group");
      if (activeGroup && typeof runCarAnimation === "function") {
        runCarAnimation(activeGroup);
      }
    }

    // ===== NORMAL GSAP SECTIONS =====
    else {
      const activeSlide = destination.item.querySelector(".slide.active");
      if (activeSlide && typeof runGsapAnimation === "function") {
        runGsapAnimation(activeSlide);
      } else if (typeof runGsapAnimation === "function") {
        runGsapAnimation(destination.item);
      }
    }
  },

  // ===============================
  // BEFORE LEAVING SECTION
  // ===============================
  onLeave: function (origin, destination, direction) {

    // ✅ FIX: Immediately re-enable — setTimeout nahi, warna mobile touch block rehta hai
    fullpage_api.setAutoScrolling(true);
    fullpage_api.setFitToSection(true);

    // reset car animation
    if (
      origin.item.classList.contains("car-section") &&
      typeof resetCarAnimation === "function"
    ) {
      resetCarAnimation(origin.item);
    }

    if (typeof resetGsapAnimation === "function") {
      resetGsapAnimation(origin.item);
    }
  },

  // ===============================
  // SLIDE EVENTS
  // ===============================
  afterSlideLoad: function (section, origin, destination, direction) {
    if (typeof runGsapAnimation === "function") {
      runGsapAnimation(destination.item);
    }
  },

  onSlideLeave: function (section, origin, destination, direction) {
    if (typeof resetGsapAnimation === "function") {
      resetGsapAnimation(origin.item);
    }
  }
});


// ===============================
// CUSTOM ARROWS
// ===============================
document.getElementById("prevArrow")?.addEventListener("click", () => {
  fullpage_api.moveSlideLeft();
});

document.getElementById("nextArrow")?.addEventListener("click", () => {
  fullpage_api.moveSlideRight();
});


// ===============================
// AUTO SLIDE (ONLY WHEN SLIDES EXIST)
// ===============================
setInterval(function () {
  const activeSection = fullpage_api.getActiveSection();
  if (
    activeSection &&
    activeSection.item.querySelectorAll(".slide").length > 0
  ) {
    fullpage_api.moveSlideRight();
  }
}, 5000);








// Car switching Script 

  function changeColor(imagePath) {
    const carImage = document.getElementById('car-display');
    
    // Professional Fade Effect
    carImage.style.opacity = '0';
    carImage.style.transform = 'scale(0.95)';
    
    setTimeout(() => {
      carImage.src = imagePath;
      carImage.style.opacity = '1';
      carImage.style.transform = 'scale(1)';
    }, 200);
  }





  //News Section and Progress Bar
  document.addEventListener('DOMContentLoaded', () => {
    const track = document.querySelector('#news-track');
    const nextBtn = document.querySelector('#news-next');
    const prevBtn = document.querySelector('#news-prev');
    const progress = document.querySelector('#slider-progress');
    const cards = document.querySelectorAll('.news-card');
    
    let currentIndex = 0;

    function updateSlider() {
        const isMobile = window.innerWidth < 768;
        const gap = isMobile ? 16 : 24; 
        const cardWidth = cards[0].offsetWidth;
        
        // Calculate Translation
        const moveDistance = currentIndex * (cardWidth + gap);
        track.style.transform = `translateX(-${moveDistance}px)`;
        
        // Update Progress Bar - Fixed
        const visibleSlides = isMobile ? 1.5 : 2.5;
        const maxIndex = cards.length - Math.floor(visibleSlides);
        const progressPercentage = currentIndex === 0 ? 25 : ((currentIndex / maxIndex) * 100);
        progress.style.width = `${Math.min(progressPercentage, 100)}%`;

        // Manage Arrow Opacity/Disable
        prevBtn.style.opacity = currentIndex === 0 ? "0.2" : "1";
        prevBtn.disabled = currentIndex === 0;

        const isAtEnd = currentIndex >= maxIndex;
        nextBtn.style.opacity = isAtEnd ? "0.2" : "1";
        nextBtn.disabled = isAtEnd;
    }

    nextBtn.addEventListener('click', () => {
        const isMobile = window.innerWidth < 768;
        const maxIndex = cards.length - Math.floor(isMobile ? 1.5 : 2.5);
        if (currentIndex < maxIndex) {
            currentIndex++;
            updateSlider();
        }
    });

    prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateSlider();
        }
    });

    // Touch support for swiping
    let startX = 0;
    track.addEventListener('touchstart', e => startX = e.touches[0].clientX);
    track.addEventListener('touchend', e => {
        const endX = e.changedTouches[0].clientX;
        if (startX - endX > 50) nextBtn.click();
        if (endX - startX > 50) prevBtn.click();
    });

    window.addEventListener('resize', () => {
        currentIndex = 0;
        updateSlider();
    });

    updateSlider();
});




// Flash on View Animation News Section
const observerOptions = {
  threshold: 0.2 // Trigger when 20% of the element is visible
};

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      // Add class to start animation
      entry.target.classList.add("flash-active");
    } else {
      // IMPORTANT: Remove class when it leaves the screen 
      // This allows it to "re-trigger" every single time.
      entry.target.classList.remove("flash-active");
    }
  });
}, observerOptions);

// Select all elements and start watching them
document.querySelectorAll(".flash-on-view").forEach((el) => {
  observer.observe(el);
});


    function openTab(tabName) {
      // Hide all tab contents
      const tabContents = document.querySelectorAll('.tab-content');
      tabContents.forEach(content => {
        content.classList.remove('active');
      });

      // Remove active class from all buttons
      const tabButtons = document.querySelectorAll('.tab-button');
      tabButtons.forEach(button => {
        button.classList.remove('active');
        button.classList.remove('bg-black', 'text-white');
        button.classList.add('bg-white', 'text-black');
      });

      // Show selected tab content
      document.getElementById(tabName).classList.add('active');

      // Add active class to clicked button
      event.target.classList.add('active', 'bg-black', 'text-white');
      event.target.classList.remove('bg-white', 'text-black');

      // Smooth scroll to content
      setTimeout(() => {
        document.querySelector('.tab-content.active').scrollIntoView({
          behavior: 'smooth',
          block: 'nearest'
        });
      }, 100);
    }