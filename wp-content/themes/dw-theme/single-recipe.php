<?php get_header(); ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article class="kitchen">
          <header class="kitchen__head">
              <h2 class="kitchen__title"><?php the_title(); ?></h2>
              <p>Publié le <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time> par <strong><?php the_author(); ?></strong></p>
          </header>
          <div class="kitchen__content">
            <aside class="kitchen__ingredients">
              <h3 class="kitchen__sub">Ingrédients</h3>
              <div class="wysiwyg">
                <?php the_field('ingredients'); ?>
              </div>
            </aside>
            <section class="kitchen__instructions">
              <h3 class="kitchen__sub">Mode opératoire</h3>
              <div class="wysiwyg">
                <?php the_field('instructions'); ?>
              </div>
            </section>
          </div>
          <?php if (get_field('source')): ?>
            <div class="kitchen__source">
              <p>Source: <a href="<?= the_field('source'); ?>" target="_blank"><?= the_field('source'); ?></a></p>
            </div>
          <?php endif ?>
      </article>
    <?php endwhile; endif; ?>

<?php get_footer(); ?>