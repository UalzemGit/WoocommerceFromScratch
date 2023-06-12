<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Easy Fly
 */

get_header(); ?>


<div class="content-area">
  <main>
    <div class="container">
      <div class="row">
        <?php
        if (have_posts()) :
          while (have_posts()) : the_post();
        ?>
            <article class="col-lg-6 col-12" <?php post_class(); ?>>

              <h2>
                <a href="<?php the_permalink() ?>">
                  <?php the_title(); ?>
                </a>
              </h2>

              <div class="post-thumb">
                <a href="<?php the_permalink() ?>">
                  <?php
                  if (has_post_thumbnail()) :
                    the_post_thumbnail();
                  endif;
                  ?>
                </a>
              </div>

              <div class="meta">
                <p>Published by <?php the_author_posts_link(); ?> on <?php echo get_the_date(); ?></p>

                <?php if (has_category()) : ?>
                  <p>Categories: <span><?php the_category(' / '); ?></span></p>
                <?php endif; ?>

                <?php if (has_tag()) : ?>
                  <p>Tags: <span><?php the_tags('', ', '); ?></span></p>
                <?php endif; ?>

              </div>



              <div class="excerpt-blog">
                <a href="<?php the_permalink() ?>">
                  <?php the_excerpt(); ?>
                </a>
              </div>
            </article>
          <?php
          endwhile;
        else :
          ?>
          <p>Nothing to display.</p>
        <?php
        endif;
        ?>
      </div>
    </div>
  </main>
</div>


<?php get_footer();
?>