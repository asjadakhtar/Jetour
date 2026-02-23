<section
  class="relative h-screen flex items-center justify-center overflow-hidden"
>
  <!-- Background Image with Overlay -->
  <div class="absolute inset-0">
    <img
      src="https://jetour.diginest.co/wp-content/uploads/2026/01/news-bg-m.png"
      alt="Jetour X70 Plus Mobile"
      class="w-full h-screen block sm:hidden object-cover object-center"
    />
    <img
      src="https://jetour.diginest.co/wp-content/uploads/2026/01/news-bg.png"
      alt="Jetour X70 Plus Desktop"
      class="w-full h-screen hidden sm:block object-cover object-center"
    />

    <!--Overlay -->
    <div class="absolute inset-0 bg-black/40"></div>
  </div>

  <!-- Hero Content -->
  <div class="absolute top-70 z-10 text-center px-6">
    <div class="inline-block mb-4">
      <h1
        class="font-accent text-5xl md:text-6xl lg:text-8xl font-medium text-secondary mb-6 top-20 tracking-tight"
      >
        News
      </h1>
      <p
        class="font-primary text-xl md:text-2xl text-white max-w-3xl mx-auto"
      >
        More JETOUR international news to witness the brand growth journey.
      </p>
    </div>
  </div>
</section>




<!-- News Grid -->
<section class="bg-white py-16 font-primary">
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
      <?php
      $news_posts = new WP_Query([
        'post_type' => 'post', // or 'news' if you created CPT
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
      ]);

      if ($news_posts->have_posts()) :
        while ($news_posts->have_posts()) : $news_posts->the_post(); ?>
          <article class="group cursor-pointer">
            <a href="<?php the_permalink(); ?>">
              <div class="aspect-4/3 overflow-hidden bg-gray-100 mb-6">
                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-105']); ?>
                <?php else : ?>
                  <img src="http://placehold.co/600x400" alt="<?php the_title(); ?>" class="w-full h-full object-cover" />
                <?php endif; ?>
              </div>
              <h3 class="text-xl lg:text-2xl font-bold text-gray-900 leading-tight group-hover:text-secondary transition-colors mb-4">
                <?php the_title(); ?>
              </h3>
              <p class="text-gray-700">
                <?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?>
              </p>
            </a>
          </article>
        <?php endwhile;
        wp_reset_postdata();
      else : ?>
        <p>No news posts found.</p>
      <?php endif; ?>
    </div>
  </div>
</section>