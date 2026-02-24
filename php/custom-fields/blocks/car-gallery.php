<section class="section car-section flex flex-col justify-center items-center bg-[#d9d9d9]">
  <div class="container mx-auto px-4 flex flex-col items-center">

    <?php if (have_rows('cars')) : ?>
      <?php $index = 0; ?>

      <?php while (have_rows('cars')) : the_row(); 
        $car_id      = get_sub_field('car_id');
        $car_name    = get_sub_field('car_name');
        $title_image = get_sub_field('car_title_image'); 
        $car_image   = get_sub_field('car_image');       
        $car_post    = get_sub_field('car_post');  
      ?>
        <div
          id="group-<?php echo esc_attr($car_id); ?>"
          class="car-group <?php echo $index === 0 ? 'active-group' : 'hidden'; ?> flex flex-col items-center"
        >

          <div class="relative flex justify-center items-center">

            <?php if ($title_image) : ?>
              <img
                src="<?php echo esc_url($title_image['url']); ?>"
                alt="<?php echo esc_attr($title_image['alt']); ?>"
                class="gsap-reveal absolute z-10 w-236"
              />
            <?php endif; ?>

            <?php if ($car_image) : ?>
              <img
                src="<?php echo esc_url($car_image['url']); ?>"
                alt="<?php echo esc_attr($car_image['alt']); ?>"
                class="car-move relative z-20 w-225"
              />
            <?php endif; ?>

          </div>

          <?php if ($car_post) : ?>
            <a
              href="<?php echo esc_url(get_permalink($car_post->ID)); ?>"
              class="gsap-reveal button-reveal1 inline-flex items-center justify-center bg-transparent border-2 text-black hover:bg-black hover:text-white text-base font-normal mt-9 py-3 px-11 md:py-4 md:px-30 rounded-sm"
            >
              Explore
            </a>
          <?php endif; ?>

        </div>

      <?php $index++; endwhile; ?>


      <div class="flex gap-x-12 pt-15">
        <?php
        $thumb_index = 0;
        while (have_rows('cars')) : the_row();
          $car_id      = get_sub_field('car_id');
          $car_name    = get_sub_field('car_name');
          $thumb_image = get_sub_field('thumbnail_image'); 
        ?>
          <div
            class="car-selector cursor-pointer <?php echo $thumb_index === 0 ? 'active-thumb' : 'opacity-50'; ?>"
            data-target="group-<?php echo esc_attr($car_id); ?>"
          >

            <?php if ($thumb_image) : ?>
              <img
                src="<?php echo esc_url($thumb_image['url']); ?>"
                alt="<?php echo esc_attr($thumb_image['alt']); ?>"
                class="w-44 pb-6 transition-opacity"
              />
            <?php endif; ?>

            <h2 class="flex justify-center text-2xl text-[#6c6c6c]">
              <?php echo esc_html($car_name); ?>
            </h2>

          </div>
        <?php $thumb_index++; endwhile; ?>
      </div>

    <?php endif; ?>

  </div>
</section>