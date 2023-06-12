<?php


//**** ADICIONANDO TAGS BOOTSTRAP NO ARCHIVE-PRODUCT.PHP(QUE RENDERIZA A PÁGINA LOJA) ******
// OBS: ESTE ARQUIVO FICA DENTRO DA PÁGINA DO PLUGIN WOOCOMMERCE E COMO NÃO PODEMOS ALTERAR ELE, IREMOS CRIAR GANCHOS (HOOKS) PARA FAZER AS ALTERAÇÕES NECESSÁRIAS SEM ALTERAR O ORIGINAL.
// - podemos instalar o plugin: "simply show hooks" para vermos todos os hooks existentes no site.
/**************  INICIANDO CÓDIGOS ARCHIVE-PRODUCT.PHP:  ************** */
function easy_fly_woo_modify()
{
    add_action('woocommerce_before_main_content', 'easy_fly_open_container_row', 5);
    function easy_fly_open_container_row()
    {
        echo '<div class="container shop-content"><div class="row">'; // abre container e row 1
    }

    add_action('woocommerce_after_main_content', 'easy_fly_close_container_row', 5);
    function easy_fly_close_container_row()
    {
        echo '</div></div>'; // fecha container e row 1
    }








    // mudando o gancho da sidebar de lugar: 
    // AQUI TEMOS 1 REGRA: ESSA SIDEBAR SÓ DEVE APARECER NA PÁGINA DA LOJA, NO PRODUTO SINGLE NÃO  
    // PRIMEIRAMAENTE Adicionamos tag de abertura BOOSTRAP que vai envolver a sidebar:
    if (is_shop()) {
        add_action('woocommerce_before_main_content', 'easy_fly_open_sidebar_tags', 6);
        function easy_fly_open_sidebar_tags()
        {
            echo '<div class="sidebar-shop col-lg-3 col-md-4 order-2 order-md-1">';
        }
    }


    // SÓ ESSA LINHA DE CÓDIGO ABAIXO DA SIDEBAR QUE NÃO ENTRA NA VERIFICAÇÃO:
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar'); // sai de onde estava


    if (is_shop()) {
        add_action('woocommerce_before_main_content', 'woocommerce_get_sidebar', 7); // entra onde queremos

        // FINALMENTE Adicionamos tag de fechamento BOOSTRAP que vai envolver a sidebar:
        add_action('woocommerce_before_main_content', 'easy_fly_close_sidebar_tags', 8);
        function easy_fly_close_sidebar_tags()
        {
            echo '</div>';
        }
    }






    //Adicionamos tag de ABERTURA BOOSTRAP que vai envolver a parte da loja:
    add_action('woocommerce_before_main_content', 'easy_fly_open_shop_tags', 9);
    function easy_fly_open_shop_tags()
    // AQUI 1 REGRA PARA QUANDO FOR SINGLE.PRODUCT, NÃO TEREMOS A SIDEBAR, PORTANTO ESSA TAG DEVE PEGAR COL-12 AO INVES DE COL-9:
    {
        if (is_shop()) {
            echo '<div class="col-lg-9 col-md-8 order-1 order-md-2">';
        } else {
            echo '<div class="col-12">';
        }
    }
    //Adicionamos tag de FECHAMENTO BOOSTRAP que vai envolver a parte da loja:
    add_action('woocommerce_after_main_content', 'easy_fly_close_shop_tags', 4);
    function easy_fly_close_shop_tags()
    {
        echo '</div>';
    }

    // POR ÚLTIMO VAMOS ADICIONAR 1 GANCHO QUE VAI MOSTAR O RESUMO (EXCERPT) DO PRODUTO DA LOJA:
    // MAS SOMENTE NA PÁGINA DA LOJA, NO SINGLE PRODUCT, NÃO.
    if (is_shop()) {
        add_action('woocommerce_after_shop_loop_item_title', 'the_excerpt', 1);
        // AQUI NÃO PRECISAMOS CRIAR FUNÇÃO, VISTO QUE A FUNÇÃO THE_EXCERPT JÁ EXISTE.
    }







    /**************  FINALIZANDO CÓDIGOS ARCHIVE-PRODUCT.PHP  ************** */






    //************   */ UTILIZANDO FILTROS PARA ALTERAR A PÁGINA DA LOJA  ********************/
    /*
    DIFERENÇA ENTRE HOOKS E FILTROS:
     HOOKS NÃO TEM RETURN, USAMOS ECHO
     FILTROS TEMOS QUE TER 1 RETURN
    */
    // AQUI VAMOS USAR 1 FILTRO PARA EXCLUIR O NOME DA PÁGINA: "LOJA" QUE FICA NO ARCHIVE-PRODUCT.PHP E RENDERIZA A PÁGINA LOJA. nOVAMENTE PODEMOS VER NO ARQUIVO QUE ESTÁ NA PASTA DOS PLUGINS ESSE FILTRO, E PODEMOS MODIFICÁ-LO:
    add_filter('woocommerce_show_page_title', 'easy_fly_remove_shop_title');
    function easy_fly_remove_shop_title($valAlterado)
    {
        $valAlterado = false;
        return $valAlterado;
    }
    /* POR NATUREZA, TODO FILTRO RETORNA TRUE, NO ARCHIVE.PHP ELE ESTA ASSIM:
    apply_filters( 'woocommerce_show_page_title', true )
    PARA ALTERARMOS ELE DECLARAMOS QUE AGORA SEU RETORNO SERÁ FALSE.
    COM ISSO O TÍTULO DA PÁGINA LOJA NÃO APARECERÁ MAIS.
    */
}

add_action('wp', 'easy_fly_woo_modify');
