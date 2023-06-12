<?php

/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Easy Fly
 * 
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
                        <article class="col-12">
                            <h1><?php the_title(); ?></h1>
                            <div><?php the_content(); ?></div>
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