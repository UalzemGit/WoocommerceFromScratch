<?php

/**
 * Template for displaying search forms in Easy Fly
 *
 * @package Easy Fly
 *
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text">
            <?php
            /* translators: Hidden accessibility text. */
            echo _x('Search for:', 'label', 'easyfly');
            ?>
        </span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Pesquisar', 'placeholder', 'easyfly'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="search-submit">
        <span class="screen-reader-text">
            <?php
            /* translators: Hidden accessibility text. */
            echo _x('Search', 'submit button', 'easyfly');
            ?>
        </span>
    </button>

    <!-- O CÓDIGO ABAIXO VAI RETORNAR SOMENTE COISAS DA LOJA NA PESQUISA: -->
    <?php if (class_exists('Woocommerce')) : ?>
        <input type="hidden" value="product" name="post_type" id="post_type">
    <?php endif; ?>

</form>