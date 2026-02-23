<div id="fullpage">
  <section class="section relative h-screen w-full flex flex-col items-center justify-center overflow-hidden">
    <!-- Background Image Container -->
    <div class="absolute inset-0 z-0">
      <!-- 1. Mobile Image: -->
      <img
        src="https://jetour.diginest.co/wp-content/uploads/2026/01/p1_m.webp"
        alt="Forest Mobile"
        class="block sm:hidden w-full h-full object-cover"
      />

      <!-- 2. Desktop Image: -->
      <img
        src="https://jetour.diginest.co/wp-content/uploads/2026/01/p1.webp"
        alt="Forest Desktop"
        class="hidden sm:block w-full h-full object-cover"
      />

      <!-- Overlay -->
      <div class="absolute inset-0 bg-black/40"></div>
    </div>

    <!-- Content Container -->
    <!-- Mobile (sm) par text ko mazeed upar karne ke liye -translate-y-48 ya -translate-y-52 use kiya hai -->
    <div
      class="relative z-10 text-center px-6 flex flex-col items-center gap-6 sm:gap-10 transition-all duration-700 ease-out"
    >
      <!-- Header Area: About + Logo -->
      <div
        class="gsap-reveal flex flex-col md:flex-row items-center justify-center gap-4 md:gap-10"
      >
        <span
          class="text-3xl sm:text-4xl md:text-7xl text-secondary font-accent font-normal tracking-[0.2em] uppercase select-none"
        >
          ABOUT
        </span>

        <!-- SVG Logo -->
        <div class="w-60 sm:w-75 md:w-125 lg:w-150 h-auto drop-shadow-2xl">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 211 20"
            class="w-full h-full fill-white"
          >
            <path
              d="M133.042 15.7927C133.042 15.8499 132.998 15.8935 132.941 15.8935H113.709C113.651 15.8935 113.605 15.8499 113.605 15.7927V4.21124C113.605 4.15405 113.651 4.11048 113.709 4.11048H132.941C132.998 4.11048 133.042 4.15405 133.042 4.21124V15.7927ZM136.785 0.00398898H109.862C108.637 0.00398898 107.64 0.997935 107.64 2.22335V17.7779C107.64 19.0061 108.637 20 109.862 20H136.785C138.013 20 139.007 19.0061 139.007 17.7779V2.22335C139.007 0.997935 138.013 0.00398898 136.785 0.00398898Z"
            />
            <path
              d="M102.124 0.00398898H71.5467C71.435 0.00398898 71.3479 0.0938523 71.3479 0.205501V3.90897C71.3479 4.0179 71.435 4.11048 71.5467 4.11048H83.7519C83.8091 4.11048 83.8527 4.15405 83.8527 4.21124V19.7985C83.8527 19.9074 83.9452 20 84.0569 20H89.6163C89.728 20 89.8178 19.9074 89.8178 19.7985V4.21124C89.8178 4.15405 89.8641 4.11048 89.9213 4.11048H102.124C102.235 4.11048 102.325 4.0179 102.325 3.90897V0.205501C102.325 0.0938523 102.235 0.00398898 102.124 0.00398898Z"
            />
            <path
              d="M174.41 0.00398898H168.848C168.736 0.00398898 168.647 0.0938523 168.647 0.205501V15.7927C168.647 15.8499 168.603 15.8935 168.546 15.8935H150.381C150.324 15.8935 150.28 15.8499 150.28 15.7927V0.205501C150.28 0.0938523 150.19 0.00398898 150.076 0.00398898H144.516C144.405 0.00398898 144.315 0.0938523 144.315 0.205501V17.7806C144.315 19.0061 145.309 20 146.534 20H172.39C173.618 20 174.612 19.0061 174.612 17.7806V0.205501C174.612 0.0938523 174.522 0.00398898 174.41 0.00398898Z"
            />
            <path
              d="M185.894 7.64239V4.21124C185.894 4.15405 185.941 4.11048 185.998 4.11048H204.555C204.609 4.11048 204.658 4.15405 204.658 4.21124V7.64239C204.658 7.69958 204.609 7.74315 204.555 7.74315H185.998C185.941 7.74315 185.894 7.69958 185.894 7.64239ZM199.556 11.8496H208.399C209.627 11.8496 210.621 10.8557 210.621 9.62756V2.22607C210.621 0.997933 209.627 0.0039859 208.399 0.0039859H180.131C180.019 0.0039859 179.929 0.0965736 179.929 0.205499V19.8012C179.929 19.9101 180.019 20 180.131 20H185.693C185.804 20 185.894 19.9101 185.894 19.8012V8.47567L202.581 19.9129C202.668 19.971 202.763 20 202.867 20H210.798C210.996 20 211.075 19.744 211.075 19.744C211.075 19.744 211.075 19.744 211.075 19.744L199.556 11.8496Z"
            />
            <path
              d="M65.823 0.00398898H37.9766C36.7514 0.00398898 35.7577 0.997935 35.7577 2.22607V17.7806C35.7577 19.0061 36.7514 20 37.9766 20H65.823C65.9346 20 66.0245 19.9074 66.0245 19.7985V16.095C66.0245 15.9861 65.9346 15.8935 65.823 15.8935H41.8236C41.7664 15.8935 41.7229 15.8499 41.7229 15.7927V12.1574C41.7229 12.1002 41.7664 12.0566 41.8236 12.0566H64.2875C64.3991 12.0566 64.489 11.964 64.489 11.8524V8.15162C64.489 8.03997 64.3991 7.95011 64.2875 7.95011H41.8236C41.7664 7.95011 41.7229 7.90382 41.7229 7.84935V4.21124C41.7229 4.15405 41.7664 4.10776 41.8236 4.10776H65.823C65.9346 4.10776 66.0245 4.0179 66.0245 3.90897V0.205501C66.0245 0.0938523 65.9346 0.00398898 65.823 0.00398898Z"
            />
            <path
              d="M0.20147 15.8922C0.0898447 15.8922 0 15.9821 0 16.0938V19.7972C0 19.9061 0.0898447 19.996 0.20147 19.996H28.2249C29.4527 19.996 30.4437 19.0048 30.4437 17.7767V0.201512C30.4437 0.0925864 30.3566 0 30.2423 0H24.6828C24.5712 0 24.4786 0.0925864 24.4786 0.201512V15.7915C24.4786 15.8459 24.435 15.8922 24.3806 15.8922H0.20147Z"
            />
          </svg>
        </div>
      </div>

      <!-- Vision Text Area -->
      <div class="gsap-reveal max-w-2xl mx-auto space-y-2">
        <h2 class="text-white text-xl sm:text-2xl font-light tracking-wide">
          Brand Vision
        </h2>
        <p
          class="text-white text-lg sm:text-xl md:text-2xl font-normal leading-tight tracking-wider"
        >
          Become the World's Leading Hybrid Off-Road Brand
        </p>
      </div>
    </div>
  </section>

  <section class="section relative h-screen w-full flex flex-col items-center justify-center overflow-hidden">
    <!-- Background Image Logic -->
    <div class="absolute inset-0 z-0">
      <!-- Mobile Image: 640px se niche -->
      <img
        src="https://jetour.diginest.co/wp-content/uploads/2026/01/x1-1-m.png"
        alt="JETOUR Mobile Background"
        class="block sm:hidden w-full h-full object-cover"
      />

      <!-- Desktop Image: 640px se upar -->
      <img
        src="https://jetour.diginest.co/wp-content/uploads/2026/01/x1-2.png"
        alt="JETOUR Desktop Background"
        class="hidden sm:block w-full h-full object-cover"
      />

      <!-- Overlay -->
      <div class="absolute inset-0 bg-black/40"></div>
    </div>

    <!-- Content Area: Yahan -translate-y-16 add kiya hai upar karne ke liye -->
    <div
      class="relative z-10 text-center px-6 max-w-7xl mx-auto flex flex-col items-center gap-8 md:gap-12 transition-transform duration-700"
    >
      <!-- Main Heading -->
      <h1
        class="gsap-reveal  text-white text-4xl md:text-6xl font-medium tracking-tight"
      >
        JETOUR Overview
      </h1>

      <!-- Paragraphs Container -->
      <div class="flex flex-col gap-6 md:gap-10 max-w-7xl">
        <p
          class="gsap-reveal text-white text-lg md:text-[26px] font-normal leading-relaxed md:leading-snug tracking-wide"
        >
          JETOUR was born with global vision. Launched in January, 2018,
          JETOUR is an emerging Chinese automotive brand in response to
          market trends and consumer demands.
        </p>

        <p
          class="gsap-reveal text-white text-lg md:text-[26px] font-normal leading-relaxed md:leading-snug tracking-wide"
        >
          With innovative products, unmatched performance, and user-oriented
          approach, JETOUR is quickly reshaping global automotive landscape.
        </p>
      </div>
    </div>
  </section>      
</div>