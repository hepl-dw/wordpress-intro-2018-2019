<?php get_header(); ?>

<h2>Mes derniers articles</h2>

<div class="archive">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article class="post">
            <div class="post__body">
                <header class="post__head">
                    <h3 class="post__title"><?php the_title(); ?></h3>
                    <p>Publié le <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time> par <strong><?php the_author(); ?></strong></p>
                </header>
                <div class="post__content">
                    <?php the_excerpt(); ?>
                </div>
                <footer class="post__more">
                    <a href="<?php the_permalink(); ?>" class="post__link">Lire cet article</a>
                </footer>
            </div>
            <figure class="post__thumb">
                <?php if( has_post_thumbnail() ): ?>
                    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="Un alt" class="post__img">
                <?php else: ?>
                    <div class="post__noimg">&nbsp;</div>
                <?php endif; ?>
            </figure>
        </article>
    <?php endwhile; else : ?>
        <p class="empty">Désolé les gars, j'ai rien en stock pour le moment.</p> 
    <?php endif; ?>

</div>

<?php get_footer(); ?>