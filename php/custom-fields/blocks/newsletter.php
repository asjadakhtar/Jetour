<div class="section font-primary bg-white py-12 lg:py-24">
  <div class="container mx-auto px-4 flex flex-col lg:flex-row gap-10 lg:gap-16 items-start">
    
    <!-- LEFT SIDE: Header -->
    <div class="w-full lg:w-1/3 flex flex-col gsap-reveal">
      <div class="mt-9.5 sm:mt-0 mb-8 ">
        <h2 class="text-3xl md:text-4xl lg:text-6xl font-medium text-black leading-tight mb-3">News Center</h2>
        <p class="text-base md:text-lg text-gray-600 max-w-lg">
          Explore the latest news and updates from JETOUR Global.
        </p>
      </div>
      
      <a href="https://jetour.diginest.co/news/" class="btn-hover-animation2 max-w-32 md:max-w-56 text-base text-center font-normal py-3 border-2  ">View All</a>
    </div>

    <!-- RIGHT SIDE: Slider -->
    <div class="w-full lg:w-2/3 overflow-hidden flash-on-view">
      <!-- Track Wrapper -->
      <div id="news-track" class="flex transition-transform duration-700 ease-[cubic-bezier(0.25,1,0.5,1)] gap-4 md:gap-6 cursor-grab active:cursor-grabbing">
        
        <!-- News Card 1 -->
        <a href="https://jetour.diginest.co/jetour-pakistan-celebrates-1st-anniversary-with-special-prices-on-dashing-x70-plus/" class="news-card flex-[0_0_66.66%] md:flex-[0_0_40%] shrink-0">
        <div>
          <div class="group overflow-hidden rounded-sm bg-gray-100 aspect-square">
            <img src="https://jetour.diginest.co/wp-content/uploads/2026/01/news2-1.jpeg" alt="News 1" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
          </div>
          <div class="mt-4 md:mt-6">
            <span class="text-gray-400 text-[10px] md:text-xs  tracking-widest uppercase">November 20, 2025</span>
            <h3 class="text-sm md:text-base font-normal mt-2 leading-snug text-black">
              Daring to Pioneer: JETOUR to Become First Automotive Brand to Traverse the Pan-American Highway
            </h3>
          </div>
        </div>
        </a>

        <!-- News Card 2 -->
         <a href="https://jetour.diginest.co/jetour-pakistan-celebrates-1st-anniversary-with-special-prices-on-dashing-x70-plus/"class="news-card flex-[0_0_66.66%] md:flex-[0_0_40%] shrink-0" >
        <div>
          <div class="group overflow-hidden rounded-sm bg-gray-100 aspect-square">
            <img src="https://jetour.diginest.co/wp-content/uploads/2026/01/news2-1.jpeg" alt="News 2" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
          </div>
          <div class="mt-4 md:mt-6">
            <span class="text-gray-400 text-[10px] md:text-xs  tracking-widest uppercase">November 15, 2025</span>
            <h3 class="text-sm md:text-base font-normal mt-2 leading-snug text-black">
              JETOUR Global Strategy: Expanding the "Travel+" Ecosystem Worldwide
            </h3>
          </div>
        </div>
        </a>

        <!-- News Card 3 -->
        <a href="https://jetour.diginest.co/jetour-pakistan-celebrates-1st-anniversary-with-special-prices-on-dashing-x70-plus/" class="news-card flex-[0_0_66.66%] md:flex-[0_0_40%] shrink-0">
        <div>
          <div class="group overflow-hidden rounded-sm bg-gray-100 aspect-square">
            <img src="https://jetour.diginest.co/wp-content/uploads/2026/01/news2-1.jpeg" alt="News 3" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
          </div>
          <div class="mt-4 md:mt-6">
            <span class="text-gray-400 text-[10px] md:text-xs  tracking-widest uppercase">November 10, 2025</span>
            <h3 class="text-sm md:text-base font-normal mt-2 leading-snug text-black">
              The New T2 Off-Road Edition Makes Its Official Debut in International Markets
            </h3>
          </div>
        </div>
        </a>

        <!-- News Card 4 -->
         <a href="https://jetour.diginest.co/jetour-pakistan-celebrates-1st-anniversary-with-special-prices-on-dashing-x70-plus/" class="news-card flex-[0_0_66.66%] md:flex-[0_0_40%] shrink-0">
        <div >
          <div class="group overflow-hidden rounded-sm bg-gray-100 aspect-square">
            <img src="https://jetour.diginest.co/wp-content/uploads/2026/01/news2-1.jpeg" alt="News 4" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
          </div>
          <div class="mt-4 md:mt-6">
            <span class="text-gray-400 text-[10px] md:text-xs tracking-widest uppercase">November 05, 2025</span>
            <h3 class="text-sm md:text-base font-normal mt-2 leading-snug text-black">
              Sustainability and Innovation: JETOUR's Path to New Energy Vehicles
            </h3>
          </div>
        </div></a>
      </div>

      <!-- Controls -->
      <div class="mt-8 md:mt-12 flex items-center justify-between">
        <!-- Progress Bar -->
        <div class="h-1.5 rounded-sm bg-gray-200 grow max-w-[65%] md:max-w-[75%] relative">
          <div id="slider-progress" class="absolute rounded-sm left-0 top-0 h-full bg-black transition-all duration-500" style="width: 25%;"></div>
        </div>

        <!-- Navigation Arrows -->
        <div class="flex gap-4 md:gap-6">
          <button id="news-prev" class="opacity-30 disabled:pointer-events-none transition-opacity">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left-icon lucide-arrow-left"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
          </button>
          <button id="news-next" class="transition-opacity">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right-icon lucide-arrow-right"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
          </button>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>