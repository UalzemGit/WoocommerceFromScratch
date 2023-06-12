<?php

/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Easy Fly
 * 
 */

?>




<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="site">
        <header>
            <section class="search">
                <div class="container">
                    <div class="text-center d-md-flex align-items-center">
                        <?php get_search_form(); ?>
                    </div>
                </div>

            </section>
            <section class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="brand col-md-3 col-12 col-lg-2 text-center text-md-left">

                            <?php if (has_custom_logo()) : ?>
                                <?php the_custom_logo(); ?>
                            <?php else : ?>
                                <a href="<?php echo home_url('/'); ?>">
                                    <p class="site-title"><?php bloginfo('title'); ?></p>
                                </a>
                            <?php endif; ?>

                        </div>
                        <div class="second-column col-md-9 col-12 col-lg-10">
                            <div class="row">

                                <!-- SÓ VAI FUNCIONAR SE O WOOCOMMERCE ESTIVER ATIVO: -->
                                <?php if (class_exists('Woocommerce')) : ?>
                                    <div class="account col-12">
                                        <div class="navbar-expand">
                                            <ul class="navbar-nav float-left">
                                                <!-- SÓ MOSTRA OS ITENS ABAIXO SE ESTIVER LOGADO -->
                                                <?php if (is_user_logged_in()) : ?>
                                                    <li>
                                                        <!-- LINK DINÂMICO DA PÁGINA MINHA CONTA: -->
                                                        <a class="nav-link" href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">Minha Conta</a>
                                                    </li>

                                                    <li>
                                                        <!-- LINK DINÂMICO PARA DESLOGAR DA CONTA: -->
                                                        <a class="nav-link" href="<?php echo esc_url(wp_logout_url(get_permalink(get_option('woocommerce_myaccount_page_id')))); ?>">Sair</a>
                                                    </li>
                                                    <!-- SENÃO ELE SERÁ LEVADO P PÁGINA DA CONTA: -->
                                                <?php else : ?>
                                                    <li>
                                                        <!-- LINK DINÂMICO DA PÁGINA MINHA CONTA: -->
                                                        <a class="nav-link" href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">Login/Register</a>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                        <div class="cart text-right">
                                            <a href="<?php echo wc_get_cart_url(); ?>">
                                                <span class="cart-icon"></span>
                                            </a>
                                            <span class="items">
                                                <!-- A FUNÇÃO ABAIXO MOSTAR A QUANTIDADE DE ITENS NO CARRINHO: -->
                                                <?php echo WC()->cart->get_cart_contents_count(); ?>
                                            </span>
                                        </div>
                                    </div>
                                <?php endif; ?>


                                <div class="col-12">
                                    <nav class="main-menu navbar navbar-expand-md navbar-light" role="navigation">

                                        <!-- Brand and toggle get grouped for better mobile display -->
                                        <button class="ml-auto navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'your-theme-slug'); ?>">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>

                                        <?php
                                        wp_nav_menu(array(
                                            'theme_location'    => 'easy_fly_main_menu',
                                            'depth'             => 3,
                                            'container'         => 'div',
                                            'container_class'   => 'collapse navbar-collapse',
                                            'container_id'      => 'bs-example-navbar-collapse-1',
                                            'menu_class'        => 'nav navbar-nav',
                                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                            'walker'            => new WP_Bootstrap_Navwalker(),
                                        ));
                                        ?>

                                    </nav>
                                </div>

                            </div>








                        </div>
                    </div>
                </div>
            </section>
        </header>