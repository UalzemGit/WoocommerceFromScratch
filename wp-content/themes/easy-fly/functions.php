<?php

/**
 * Easy Fly functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Easy Fly
 */

// CHAMANDO O ARQUIVO DO THEME CUSTOMIZER:
require_once get_template_directory() . '/inc/customizer.php';

function easy_fly_scripts()
{

    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/inc/bootstrap.min.js', array('jquery'), '4.4.1', true);

    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/inc/bootstrap.min.css', array(), '4.4.1', 'all'); // load bootstrap css (forever first)



    wp_enqueue_style('google-fonts2', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;900&family=Quicksand:wght@400;600;700&display=swap');



    wp_enqueue_style('easyfly-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'), 'all');

    // FLEXSLIDER DA HOME
    wp_enqueue_style('flexslider-css', get_template_directory_uri() . '/inc/flexslider/flexslider.css', array(), '2.7.2', 'all');
    wp_enqueue_script('flexslider-min-js', get_template_directory_uri() . '/inc/flexslider/jquery.flexslider-min.js', array('jquery'), '2.7.2', true);
    wp_enqueue_script('flexslider-js', get_template_directory_uri() . '/inc/flexslider/flexslider.js', array('jquery'), '2.7.2', true);
}
add_action('wp_enqueue_scripts', 'easy_fly_scripts');


//************************* */ INÍCIO CONFIGURAÇÕES DO TEMA:*****************/
function easy_fly_config()
{

    // menu bootstrap navwalker:
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

    register_nav_menus(
        array(
            'easy_fly_main_menu' => 'Easy Fly Main Menu',
            'easy_fly_footer_menu' => 'Easy Fly Footer Menu'
        )
    );
    // suporte ao woocommerce:
    add_theme_support('woocommerce', array(
        'thumbnail_image_width'        => 255,
        'single_image_width'        => 255,
        'product_grid'                => array(
            'default_rows'    => 10,
            'min_rows'        => 5,
            'max_rows'        => 10,
            'default_columns' => 1,
            'min_columns'     => 1,
            'max_columns'     => 1,
        )
    ));
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    if (!isset($content_width)) {
        $content_width = 600;
    }
}
add_action('after_setup_theme', 'easy_fly_config', 0);

// THEME SUPPORT PARA CUSTOM LOGO:
add_theme_support('custom-logo', array(
    'height' => 85,
    'width' => 160,
    'flex-height' => true,
    'flex-width' => true

));

//************************* */ FIM CONFIGURAÇÕES DO TEMA*****************/



// DESABILITAR GUTEMBERG PARA OS WIDGETS (WIDGETS CLÁSSICO SEM PLUGIN):
add_filter('use_widgets_block_editor', '__return_false');


// DESABILITAR GUTEMBERG PARA POSTS e PÁGINAS (EDITOR CLÁSSICO SEM PLUGIN):
function wpflames_disable_gutenberg($is_enabled, $post_type)
{

    if ($post_type === 'post' || $post_type === 'page') return false; // it could be any kind of custom post type

    return $is_enabled;
}
add_filter('use_block_editor_for_post_type', 'wpflames_disable_gutenberg', 10, 2);




/* ABAIXO VAMOS CHAMAR O ARQUIVO QUE ALTERA O TEMPLATE QUE RENDERIZA NOSSA LOJA: archive-product.php
NELE ADICIONAMOS TAGS BOOTSTRAP COM HOOKS, MUDAMOS A POSIÇÃO DA SIDEBAR NA PÁGINA E CRIAMOS 1 FILTRO QUE EXCLUI O TITULO LOJA DA NOSSA PÁGINA:
*/
// IMPORTANTE, COMO ESSA É UMA PARTE DE ALTERAÇÕES QUE FIZEMOS NO TEMA, DEVEMOS GARANTIR QUE FUNCIONARÁ SOMENTE QUANDO O WOOCOMMERCE ESTIVER ATIVO NO TEMA, OU SEJA, NOSSO TEMA TEM QUE FUNCIONAR SEM O WOOCOMMERCE TAMBÉM.
if (class_exists('Woocommerce')) {
    require get_template_directory() . '/inc/woo-modifications.php';
}



// filtro que atualiza a quantidade de itens no carrinho usando ajax:
/**
 * Show cart contents / total Ajax
 */
add_filter('woocommerce_add_to_cart_fragments', 'easy_fly_woocommerce_header_add_to_cart_fragment');

function easy_fly_woocommerce_header_add_to_cart_fragment($fragments)
{
    global $woocommerce;

    ob_start();

?>
    <span class="items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
<?php
    $fragments['span.items'] = ob_get_clean();
    return $fragments;
}
