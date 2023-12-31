<?php
/*
Template Name: Home Page
*/


get_header(); ?>


<div class="content-area">
    <main>
        <section class="slider">




            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <div class="imagez-slider">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/sliderr-3.jpg" alt="ImageSlider" />
                        </div>
                        <div class="textosz-slider">
                            <h2>A sit amet consectetur</h2>
                            <p>Eligendi eveniet incidunt ab quis quia.</p>
                            <div class="button-calll">
                                <a href="#">Read More</a>
                            </div>
                        </div>

                    </li>
                    <li>

                        <div class="imagez-slider">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/sliderr-1.jpg" alt="ImageSlider" />
                        </div>
                        <div class="textosz-slider">
                            <h2>Dolorem debitis inventore</h2>
                            <p>Bat obcaecati aperiam corporis perferendis!.</p>
                            <div class="button-calll">
                                <a href="#">Read More</a>
                            </div>
                        </div>

                    </li>
                    <li>

                        <div class="imagez-slider">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/sliderr-2.jpg" alt="ImageSlider" />
                        </div>
                        <div class="textosz-slider">
                            <h2>Lorem ipsum</h2>
                            <p>Eaque necessitatibus facilis ad sunt. Voluptas dolore.</p>
                            <div class="button-calll">
                                <a href="#">Read More</a>
                            </div>

                        </div>

                    </li>
                </ul>
            </div>
        </section>







        <!-- VALIDAÇÃO DAS 3 SESSÕES ABAIXO, SÓ SE O WOOCOMMERCE ESTIVER ATIVO QUE ELAS APARECEM: -->
        <?php if (class_exists('WooCommerce')) : ?>

            <section class="popular-products">
                <div class="container">
                    <div class="section-title">
                        <h2>Popular Products</h2>
                    </div>
                    <?php echo do_shortcode('[products limit="4" columns="4" orderby="popularity"]') ?>
                </div>
            </section>
            <section class="new-arrivals">
                <div class="container">
                    <div class="section-title">
                        <h2>New Arrivals</h2>
                    </div>
                    <?php echo do_shortcode('[products limit="4" columns="4" orderby="date"]') ?>
                </div>
            </section>


            <?php
            $showdeal = get_theme_mod('set_deal_show', 0);
            $deal = get_theme_mod('set_deal');
            $currency = get_woocommerce_currency_symbol(); // mostra o simbolo da moeda usada na loja
            $regular = get_post_meta($deal, '_regular_price', true); // preço normal do produto
            $promocao = get_post_meta($deal, '_sale_price', true); // preço do produto na promoção;
            ?>

            <?php if ($showdeal == 1 && (!empty($deal))) : ?> <!-- verifica se é pra mostrar a promoção -->

                <?php // calculando a porcentagem do desconto caso seja pra mostrar a promoção. Essa porcentagem vai aparecer em 1 etiqurtinha no front end da seção.
                $discount_percentage = absint(100 -  (($promocao / $regular) * 100));
                ?>
                <section class="deal-of-the-week">
                    <div class="container">
                        <div class="section-title">
                            <h2>Deal of the Week</h2>
                        </div>
                        <div class="row d-flex align-items-center">
                            <div class="deal-img col-md-6 ml-auto col-12 text-center">
                                <?php echo get_the_post_thumbnail($deal, 'large', array(
                                    'class' => 'img-fluid'
                                )); ?>
                            </div>
                            <div class="deal-desc col-md-4 mr-auto col-12 text-center">

                                <?php if (!empty($promocao)) : ?><!-- valida se tem desconto -->
                                    <span class="discount">
                                        <?php echo $discount_percentage . '% OFF'; ?>
                                    </span>
                                <?php endif; ?>

                                <!-- aqui as funções abaixo são diferentes pq não estamos dentro de 1 loop: -->
                                <h3>
                                    <a href="<?php echo get_permalink($deal); ?>"><?php echo get_the_title($deal); ?></a>
                                </h3>
                                <p><?php echo get_the_excerpt($deal); ?></p>
                                <div class="prices">
                                    <span class="regular">
                                        <?php echo $currency; ?>
                                        <?php echo $regular; ?>
                                    </span>

                                    <?php if (!empty($promocao)) : ?><!-- valida se tem desconto -->
                                        <span class="sale">
                                            <?php echo $currency; ?>
                                            <?php echo $promocao; ?>
                                        </span>
                                    <?php endif; ?>

                                </div>
                                <a href="<?php echo esc_url('?add-to-cart=' . $deal); ?>" class="add-to-cart">Add to Cart</a>

                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <!-- FIM DA VALIDAÇÃO, SÓ SE O WOOCOMMERCE ESTIVER ATIVO QUE ELAS APARECEM -->
        <?php endif; ?>



        <section class="lab-blog">
            <div class="container">
                <div class="section-title">
                    <h2><?php echo get_theme_mod('set_blog_title', 'News From Our Blog') ?></h2>
                </div>
                <div class="row">

                    <?php

                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 2,
                    );

                    $blog_posts = new WP_Query($args);

                    if ($blog_posts->have_posts()) :
                        while ($blog_posts->have_posts()) : $blog_posts->the_post();
                    ?>

                            <article class="col-md-6 col-12 postsblog-home">

                                <a href="<?php the_permalink() ?>">
                                    <?php
                                    if (has_post_thumbnail()) :
                                        the_post_thumbnail();
                                    endif;
                                    ?>
                                </a>


                                <h3>
                                    <a href="<?php the_permalink() ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <div class="excerpt">
                                    <a href="<?php the_permalink() ?>">
                                        <?php the_excerpt(); ?>
                                    </a>
                                </div>

                            </article>

                        <?php
                        endwhile;
                        wp_reset_postdata();
                    else : ?>
                        <p>Nothing to display !</p>
                    <?php endif;
                    ?>

                </div>
            </div>
        </section>
    </main>
</div>


<?php get_footer();
?>