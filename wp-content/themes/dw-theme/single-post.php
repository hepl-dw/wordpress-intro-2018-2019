<?php get_header(); ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article class="article">
          <header class="article__head" style="background-image: url(<?php the_post_thumbnail_url('large'); ?>);">
              <h2 class="article__title"><?php the_title(); ?></h2>
              <p>Publié le <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time> par <strong><?php the_author(); ?></strong></p>
          </header>
          <div class="article__content">
              <?php the_content(); ?>
          </div>
      </article>
    <?php endwhile; endif; ?>

<?php get_footer(); ?>