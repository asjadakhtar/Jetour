<?php
/**
 * Template Name: Single Car Models
 * Template for displaying single car models posts
 * Save this file as: single-car_models.php in your theme directory
 */

get_header(); ?>

<div id="fullpage">
    <!-- Section 1: Hero with Slides -->
    <?php $hero = get_field('hero_section'); ?>

    <section class="section">
        <div class="slide relative h-screen w-full overflow-hidden">

            <!-- IMAGE LOGIC -->
            <?php if (!empty($hero['hero_bg_mobile'])) : ?>
                <img
                    src="<?php echo esc_url($hero['hero_bg_mobile']['url']); ?>"
                    alt="<?php echo esc_attr($hero['hero_bg_mobile']['alt']); ?>"
                    class="w-full h-screen block sm:hidden object-cover object-center"
                />
            <?php endif; ?>

            <?php if (!empty($hero['hero_bg_desktop'])) : ?>
                <img
                    src="<?php echo esc_url($hero['hero_bg_desktop']['url']); ?>"
                    alt="<?php echo esc_attr($hero['hero_bg_desktop']['alt']); ?>"
                    class="w-full h-screen hidden sm:block object-cover object-center"
                />
            <?php endif; ?>

            <div class="absolute inset-0 bg-black/40"></div>

            <!-- OVERLAY CONTENT -->
            <div class="absolute inset-0 z-10">
                <div class="container mx-auto px-4 h-full flex flex-col items-center justify-between py-16 md:py-24 text-white">

                    <!-- LOGO + HEADING SVG + TAGLINE -->
                    <div class="gsap-reveal w-full flex flex-col items-center mt-40">

                        <!-- HERO HEADING SVG -->
                        <?php if (!empty($hero['hero_heading_svg'])) : ?>
                            <div class="w-full max-w-65 sm:max-w-md md:max-w-2xl lg:max-w-4xl">
                                <?php 
                                    // Inline SVG so you can style/fill it with Tailwind
                                    echo file_get_contents(get_attached_file($hero['hero_heading_svg']['ID'])); 
                                ?>
                            </div>
                        <?php endif; ?>

                        <!-- SVG LOGO -->
                        <div class="w-full max-w-65 sm:max-w-md md:max-w-2xl lg:max-w-4xl mt-6">
                            <?php get_template_part('partials/car-logo-svg'); ?>
                        </div>

                        <!-- TAGLINE -->
                        <?php if (!empty($hero['hero_tagline'])) : ?>
                            <p class="text-lg sm:text-xl md:text-2xl lg:text-[26px] font-normal mt-4 md:mt-8 text-center tracking-widest">
                                <?php echo esc_html($hero['hero_tagline']); ?>
                            </p>
                        <?php endif; ?>

                    </div>

                    <!-- SPECS -->
                    <div class="gsap-reveal max-w-6xl flex justify-center items-center gap-x-4 sm:gap-x-12 md:gap-x-15 mb-10">

                        <!-- Engine -->
                        <div class="flex flex-col items-center text-center">
                            <h2 class="text-xl sm:text-4xl md:text-5xl font-medium">
                                <?php echo esc_html($hero['engine_value']); ?>
                            </h2>
                            <span class="text-[10px] sm:text-xs md:text-base mt-2.5">Engine</span>
                        </div>

                        <div class="h-10 md:h-16 border-l border-white/70"></div>

                        <!-- Wheelbase -->
                        <div class="flex flex-col items-center text-center">
                            <h2 class="text-xl sm:text-4xl md:text-5xl font-medium">
                                <?php echo esc_html($hero['wheelbase_value']); ?>
                            </h2>
                            <span class="text-[10px] sm:text-xs md:text-base mt-2.5">Wheelbase (mm)</span>
                        </div>

                        <div class="h-10 md:h-16 border-l border-white/70"></div>

                        <!-- Dimensions -->
                        <div class="flex flex-col items-center text-center">
                            <h2 class="text-base sm:text-3xl md:text-5xl font-medium whitespace-nowrap">
                                <?php echo esc_html($hero['dimension_value']); ?>
                            </h2>
                            <span class="text-[9px] sm:text-xs md:text-base mt-2.5">
                                Length*Width*Height (mm)
                            </span>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>



    <!--Section 2: Cars colors changing-->
    <?php $color_section = get_field('color_section'); ?>

    <section class="section font-primary bg-[#e5e6e6] flex items-center">
        <div class="container mx-auto px-4 flex flex-col justify-between h-full w-full py-10 md:py-16">

            <!-- 1. TOP ROW: Button on the Right -->
            <div class="flex justify-end items-start w-full gap-3">

                <?php if (!empty($color_section['spec_link'])) : ?>
                    <a
                        href="<?php echo esc_url($color_section['spec_link']['url']); ?>"
                        target="<?php echo esc_attr($color_section['spec_link']['target'] ?: '_self'); ?>"
                        class="inline-block border-2 border-black bg-black text-white text-sm md:text-base font-medium py-2.5 px-6 md:py-4 md:px-12 rounded-sm tracking-widest transition-all duration-300"
                    >
                        <?php echo esc_html($color_section['spec_link']['title']); ?>
                    </a>
                <?php endif; ?>

                <?php if (!empty($color_section['booking'])) : ?>
                    <a
                        href="<?php echo esc_url($color_section['booking']['url']); ?>"
                        target="<?php echo esc_attr($color_section['booking']['target'] ?: '_self'); ?>"
                        class="inline-block border-2 border-black text-black hover:bg-black hover:text-white text-sm md:text-base font-medium py-2.5 px-6 md:py-4 md:px-12 rounded-sm tracking-widest transition-all duration-300"
                    >
                        <?php echo esc_html($color_section['booking']['title']); ?>
                    </a>
                <?php endif; ?>

            </div>

            <!-- 2. MIDDLE ROW: Main Image -->
            <div class="flex-1 flex items-center justify-center py-4 md:py-0">
                <?php if (!empty($color_section['default_car_image'])) : ?>
                    <img
                        id="car-display"
                        src="<?php echo esc_url($color_section['default_car_image']['url']); ?>"
                        alt="<?php echo esc_attr($color_section['default_car_image']['alt']); ?>"
                        class="w-full max-w-200 sm:max-w-200 md:max-w-200 lg:max-w-280 object-cover transition-all duration-500 ease-in-out transform scale-125 md:scale-100"
                    />
                <?php endif; ?>
            </div>

            <!-- 3. BOTTOM ROW: Color Picker -->
            <div class="w-full">
                <?php if (!empty($color_section['car_colors'])) : ?>
                    <div class="bg-white/50 backdrop-blur-md mx-auto w-fit py-3 px-6 md:py-5 md:px-10 shadow-xl rounded-full border border-white/20">
                        <div class="flex items-center gap-x-4 md:gap-x-8">

                            <?php foreach ($color_section['car_colors'] as $color) : 
                                if (empty($color['color_image'])) continue;
                            ?>
                                <div class="relative group">
                                    <button
                                        onclick="changeColor('<?php echo esc_url($color['color_image']['url']); ?>')"
                                        style="background: <?php echo esc_attr($color['color_hex']); ?>;"
                                        class="w-8 h-8 md:w-12 md:h-12 rounded-full border-2 border-transparent hover:border-white transition-all shadow-md active:scale-90"
                                        aria-label="Select <?php echo esc_attr($color['color_name']); ?>"
                                    ></button>
                                    <span class="absolute -top-16 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-all text-[10px] md:text-base bg-black text-white px-3 py-1 rounded-full pointer-events-none">
                                        <?php echo esc_html($color['color_name']); ?>
                                    </span>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </section>



    <?php 
    $style = get_field('style_gallery');

    // Only render section if "Enable Section" is true
    if (!empty($style['enable_section'])) : 
    ?>

    <!-- Section 3: Dashing Style Gallery -->
    <section class="section bg-[#afafaf] py-16 font-primary overflow-hidden">
        <div class="container mx-auto px-4">

            <!-- SECTION TITLE -->
            <?php if (!empty($style['style_title'])) : ?>
            <h2 class="gsap-reveal text-white text-center text-3xl md:text-5xl font-medium mb-12 tracking-widest">
                <?php echo esc_html($style['style_title']); ?>
            </h2>
            <?php endif; ?>

            <!-- SCROLLABLE WRAPPER -->
            <div id="dashing-track" class="overflow-x-auto hide-scrollbar snap-x snap-mandatory flex lg:block">

                <!-- GRID -->
                <div class="grid grid-flow-col grid-rows-2 lg:grid-flow-row lg:grid-cols-3 lg:grid-rows-2 gap-4 w-max lg:w-full">

                    <?php if (!empty($style['style_items'])) : ?>
                        <?php foreach ($style['style_items'] as $item) :
                            if (empty($item['image'])) continue;
                        ?>
                            <div class="dashing-item relative w-[80vw] md:w-[45vw] lg:w-auto snap-start overflow-hidden">

                                <img
                                    src="<?php echo esc_url($item['image']['url']); ?>"
                                    alt="<?php echo esc_attr($item['image']['alt']); ?>"
                                    class="w-full h-full object-cover transition-transform duration-1200 ease-in-out hover:scale-115"
                                >

                                <!-- overlay -->
                                <div class="absolute inset-0 bg-black/20 pointer-events-none"></div>

                                <?php if (!empty($item['caption'])) : ?>
                                    <p class="absolute z-10 bottom-6 left-6 text-white text-lg font-medium">
                                        <?php echo esc_html($item['caption']); ?>
                                    </p>
                                <?php endif; ?>

                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            </div>

            <!-- MOBILE CONTROLS -->
            <div id="dashing-controls" class="flex lg:hidden items-center justify-between mt-10">
                <div class="w-2xl h-0.5 bg-white/20 relative overflow-hidden">
                    <div id="dashing-bar" class="absolute left-0 top-0 h-full w-1/3 bg-white transition-transform duration-200 origin-left"></div>
                </div>

                <div class="flex gap-3.5">
                    <button id="dashing-prev" class="p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                            <path d="M19 12H5M12 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button id="dashing-next" class="p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    </section>

    <?php endif;  ?>




    <!-- Section 4: Ultimate Fun -->
    <?php if (have_rows('ultimate_fun_slides')) : ?>
        <section class="section font-primary">
            <div class="relative w-full h-screen overflow-hidden" id="uf-slider-root">

                <!-- STATIC OVERLAY & HEADER -->
                <div class="absolute inset-0 z-30 pointer-events-none flex justify-center">
                    <p class="gsap-reveal text-white font-medium text-3xl md:text-5xl lg:text-6xl pt-10 md:pt-20 lg:pt-30">
                        <?php
                            $uf_heading = '';

                            $uf_rows = get_field('ultimate_fun_slides');
                            if (!empty($uf_rows)) {
                                $uf_heading = $uf_rows[0]['heading'];
                            }
                            ?>
                        <?php echo esc_html($uf_heading); ?>
                    </p>
                </div>

                <!-- SLIDER TRACK -->
                <div id="uf-slider-track" class="flex h-full w-full transition-transform duration-700 ease-in-out" style="transform: translateX(0%);">

                    <?php while (have_rows('ultimate_fun_slides')) : the_row(); ?>
                    <!-- Slide -->
                    <div class="uf-slide min-w-full h-full relative">

                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-black/40 z-20 pointer-events-none"></div>

                        <!-- Images -->
                        <img src="<?php echo esc_url(get_sub_field('mobile_image')['url']); ?>" class="w-full h-screen block sm:hidden object-cover object-center" />
                        <img src="<?php echo esc_url(get_sub_field('desktop_image')['url']); ?>" class="w-full h-screen hidden sm:block object-cover object-center" />

                        <!-- Container Wrapper -->
                        <div class="absolute inset-0 flex items-center justify-center z-40">
                            <div class="container mx-auto px-4 pt-120 sm:pt-130 md:pt-180">
                                <p class="uf-animate-text text-lg sm:text-xl md:text-2xl lg:text-[26px] font-normal text-white text-center tracking-widest opacity-0 translate-y-10 transition-all duration-1200 delay-450 drop-shadow-lg">
                                    <?php the_sub_field('slide_text'); ?>
                                </p>
                            </div>
                        </div>

                    </div>
                    <?php endwhile; ?>

                </div>

                <!-- NAVIGATION -->
                <button id="uf-prev-trigger" class="absolute left-4 top-1/2 -translate-y-1/2 z-50 text-white hover:text-white/60 transition-colors text-4xl md:text-5xl cursor-pointer p-2 select-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-chevron-left-icon lucide-circle-chevron-left">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="m14 16-4-4 4-4"/>
                    </svg>
                </button>
                <button id="uf-next-trigger" class="absolute right-4 top-1/2 -translate-y-1/2 z-50 text-white hover:text-white/60 transition-colors text-4xl md:text-5xl cursor-pointer p-2 select-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-chevron-right-icon lucide-circle-chevron-right">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="m10 8 4 4-4 4"/>
                    </svg>
                </button>

            </div>
        </section>
    <?php endif; ?>




    <!-- Section 5: Safety -->
    <?php if (have_rows('safety_slides')) : ?>
        <section class="section font-primary">
            <div class="relative w-full h-screen overflow-hidden" id="uf-slider-root-2">

                <!-- STATIC OVERLAY & HEADER -->
               <div class="absolute inset-0 z-30 pointer-events-none flex justify-center">
                    <p class="gsap-reveal text-white font-medium text-3xl md:text-5xl lg:text-6xl pt-10 md:pt-20 lg:pt-30">
                        <?php
                            $uf_heading = '';

                            $uf_rows = get_field('safety_slides');
                            if (!empty($uf_rows)) {
                                $uf_heading = $uf_rows[0]['heading'];
                            }
                            ?>
                        <?php echo esc_html($uf_heading); ?>
                    </p>
                </div>

                <!-- SLIDER TRACK -->
                <div id="uf-slider-track-2" class="flex h-full w-full transition-transform duration-700 ease-in-out" style="transform: translateX(0%);">

                <?php $delay = 400; ?>
                <?php while (have_rows('safety_slides')) : the_row(); ?>
                <!-- Slide -->
                <div class="uf-slide min-w-full h-full relative">

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-black/40 z-20 pointer-events-none"></div>

                    <!-- Images -->
                    <img src="<?php echo esc_url(get_sub_field('mobile_image')['url']); ?>" class="w-full h-screen block sm:hidden object-cover object-center" />
                    <img src="<?php echo esc_url(get_sub_field('desktop_image')['url']); ?>" class="w-full h-screen hidden sm:block object-cover object-center" />

                    <!-- Container Wrapper -->
                    <div class="absolute inset-0 flex items-center justify-center z-40">
                    <div class="container mx-auto px-4 pt-120 sm:pt-130 md:pt-180">
                        <p class="uf-animate-text text-lg sm:text-xl md:text-2xl lg:text-[26px] font-normal text-white text-center tracking-widest opacity-0 translate-y-10 transition-all duration-1200 delay-<?php echo $delay; ?> drop-shadow-lg">
                        <?php the_sub_field('slide_text'); ?>
                        </p>
                    </div>
                    </div>

                </div>
                <?php $delay += 50; endwhile; ?>

                </div>

                <!-- NAVIGATION -->
                <button id="uf-prev-trigger-2" class="absolute left-4 top-1/2 -translate-y-1/2 z-50 text-white hover:text-white/60 transition-colors text-4xl md:text-5xl cursor-pointer p-2 select-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-chevron-left-icon lucide-circle-chevron-left">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="m14 16-4-4 4-4"/>
                </svg>
                </button>
                <button id="uf-next-trigger-2" class="absolute right-4 top-1/2 -translate-y-1/2 z-50 text-white hover:text-white/60 transition-colors text-4xl md:text-5xl cursor-pointer p-2 select-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-chevron-right-icon lucide-circle-chevron-right">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="m10 8 4 4-4 4"/>
                </svg>
                </button>

            </div>
        </section>
    <?php endif; ?>




    <!-- section 6: Grid photos -->
    <?php 
    $grid = get_field('grid_section'); 
    if( $grid ): 
    ?>
    <section class="section w-full h-screen bg-black overflow-hidden font-primary">
    
        <!-- Main Flex Container: Stacks on mobile, Side-by-side on desktop -->
        <div class="flex flex-col md:flex-row w-full h-full">
            
            <!-- LEFT COLUMN: One Large Vertical Image -->
            <div class="w-full md:w-1/2 md:h-full relative group overflow-hidden">
            <img 
                src="<?php echo esc_url($grid['left_image']['url']); ?>" 
                alt="<?php echo esc_attr($grid['left_image']['alt']); ?>" 
                class="w-full h-full object-cover object-center transition-transform duration-1000 group-hover:scale-105"
            />
            <!-- Optional overlay -->
            <!-- <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-all"></div> -->
            </div>

            <!-- RIGHT COLUMN: Two Stacked Horizontal Images -->
            <div class="w-full md:w-1/2 h-1/2 md:h-full flex flex-col">
            
            <!-- TOP RIGHT IMAGE -->
            <div class="w-full h-1/2 relative group overflow-hidden border-b md:border-b-0 md:border-l border-black/20">
                <img 
                src="<?php echo esc_url($grid['top_right_image']['url']); ?>" 
                alt="<?php echo esc_attr($grid['top_right_image']['alt']); ?>" 
                class="w-full h-full object-cover object-center transition-transform duration-1000 group-hover:scale-105"
                />
            </div>

            <!-- BOTTOM RIGHT IMAGE -->
            <div class="w-full h-1/2 relative group overflow-hidden border-t md:border-l border-black/20">
                <img 
                src="<?php echo esc_url($grid['bottom_right_image']['url']); ?>" 
                alt="<?php echo esc_attr($grid['bottom_right_image']['alt']); ?>" 
                class="w-full h-full object-cover object-center transition-transform duration-1000 group-hover:scale-105"
                />
            </div>

            </div> <!-- End Right Column -->

        </div> <!-- End Flex Container -->

    </section>
    <?php endif; ?>


    





  
    <?php 
    $spec = get_field('specifications_section');

    if( $spec && !empty($spec['spec_tabs']) ):
    ?>

    <section class="section">
    <section class="max-w-4xl px-4 mx-auto py-10" id="specification">

    <!-- TITLE -->
    <?php if(!empty($spec['section_title'])): ?>
    <div class="text-4xl font-medium pb-12 text-center">
        <?php echo esc_html($spec['section_title']); ?>
    </div>
    <?php endif; ?>


    <!-- TAB BUTTONS -->
    <div class="mb-8 overflow-x-auto tabs-scroll">
    <div class="flex gap-3 justify-center flex-wrap min-w-max md:min-w-0">

    <?php 
    $i = 0;
    foreach($spec['spec_tabs'] as $tab): 
    if(empty($tab['tab_slug'])) continue;
    ?>
    <button
    onclick="openTab('<?php echo esc_attr($tab['tab_slug']); ?>')"
    class="tab-button px-6 py-3 rounded-full text-base font-medium border-2 border-black
    <?php echo ($i==0) ? 'active bg-black text-white' : 'bg-white text-black'; ?>">
    <?php echo esc_html($tab['tab_title'] ?? 'Tab'); ?>
    </button>
    <?php $i++; endforeach; ?>

    </div>
    </div>


    <!-- TAB CONTENT -->
    <div class="bg-white rounded-lg border-2 border-black/20 p-6" style="min-height:520px;">

    <?php 
    $i = 0;
    foreach($spec['spec_tabs'] as $tab):

    if(empty($tab['tab_rows'])) continue;

    $cols = $tab['table_columns'] ?? '2';
    ?>

    <div id="<?php echo esc_attr($tab['tab_slug']); ?>"
    class="tab-content <?php echo ($i==0)?'active':''; ?>">

    <table class="w-full border-collapse border border-slate-200 text-lg text-black">
    <tbody>

    <?php 
    $row_index = 0;
    foreach($tab['tab_rows'] as $row):

    $bg = ($row_index % 2 == 0) ? 'bg-[#f6f6f6]' : '';
    ?>

    <tr>

    <?php if($cols == '2'): ?>

    <td class="border border-slate-200 p-3 w-1/2 <?php echo $bg; ?>">
    <?php echo !empty($row['col_1']) ? esc_html($row['col_1']) : '●'; ?>
    </td>

    <td class="border border-slate-200 p-3 w-1/2 <?php echo $bg; ?>">
    <?php echo !empty($row['col_2']) ? esc_html($row['col_2']) : '●'; ?>
    </td>

    <?php else: ?>

    <td class="border border-slate-200 p-3 w-1/4 <?php echo $bg; ?>">
    <?php echo !empty($row['col_1']) ? esc_html($row['col_1']) : '●'; ?>
    </td>

    <td class="border border-slate-200 p-3 w-1/4 <?php echo $bg; ?>">
    <?php echo !empty($row['col_2']) ? esc_html($row['col_2']) : '●'; ?>
    </td>

    <td class="border border-slate-200 p-3 w-1/4 <?php echo $bg; ?>">
    <?php echo !empty($row['col_3']) ? esc_html($row['col_3']) : '●'; ?>
    </td>

    <td class="border border-slate-200 p-3 w-1/4 <?php echo $bg; ?>">
    <?php echo !empty($row['col_4']) ? esc_html($row['col_4']) : '●'; ?>
    </td>

    <?php endif; ?>

    </tr>

    <?php $row_index++; endforeach; ?>

    </tbody>
    </table>

    </div>

    <?php $i++; endforeach; ?>

    </div>
    </section>
    </section>

    <?php endif; ?>

</div>

<?php get_footer(); ?>