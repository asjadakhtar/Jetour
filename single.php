<?php get_header(); ?>

<style>
/* Container max-width */
.main-container {
    max-width: 980px;
    margin: 0 auto;
    padding-top: 140px;
    padding-left: 16px;
    padding-right: 16px;
}

/* Headline */
.article-title {
    font-size: 2.5rem;
    font-weight: 700;
    line-height: 1.2;
    color: #27221E;
    margin-bottom: 1rem;
}

/* Excerpt */
.article-excerpt {
    font-size: 1.2rem;
    color: #27221E;
    font-style: italic;
    opacity: 0.8;
    margin-bottom: 2rem;
}

/* Content */
.article-content p {
    margin-bottom: 1.5rem;
    font-size: 18px;
    color: #27221E;
    line-height: 1.7;
}

.article-content h2,
.article-content h3 {
    margin: 2rem 0 1rem;
    color: #27221E;
    font-weight: 600;
}

/* Content Images */


.content-image-container img {
    max-width: 100%;
    max-height: 500px;
    width: auto;
    height: auto;
    object-fit: contain;
}

/* Responsive */
@media (max-width: 768px) {
    .article-title {
        font-size: 2rem;
    }

    .article-content p {
        font-size: 16px;
    }

    .content-image-container img {
        max-height: 300px;
    }
}
</style>

<main class="main-container">
    <!-- Article Meta -->
    <p class="text-gray-600 text-sm mb-2"><?php echo get_the_date('F j, Y'); ?></p>

    <!-- Article Title -->
    <h1 class="article-title"><?php the_title(); ?></h1>

    <!-- Article Excerpt -->
    <p class="article-excerpt">
        <?php 
        if (has_excerpt()) {
            echo get_the_excerpt();
        } else {
            echo wp_trim_words(get_the_content(), 30, '...');
        }
        ?>
    </p>

    <!-- Article Content -->
    <div class="article-content">
        <?php
        // Get the content and modify images to have container
        $content = apply_filters('the_content', get_the_content());

        // Wrap all <img> in content-image-container
        $content = preg_replace(
            '/<img(.*?)\/?>/i',
            '<div class="content-image-container"><img$1/></div>',
            $content
        );

        echo $content;
        ?>
    </div>
</main>

<?php get_footer(); ?>
