<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do banco de dados
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do banco de dados - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'woomarcelo2023' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'bnW#=ZTL CRI?6jAt(x=xs#,1p}$+ks^EBNba>Tf m*!?;|6BFlTt7>)X)6_!ZK|' );
define( 'SECURE_AUTH_KEY',  'hak~l<:Tc1:`CkPcCb7v<c@[c!b4ER~DMVKN}j<HJVk^m(7^V=Lij0UB|9tU*hE:' );
define( 'LOGGED_IN_KEY',    ',K|JMPedpf#v~nIwC}:rMe<}AcS5cUg1sb_m[;ncaWP7#PUP&tcny[+8jRK@Ce30' );
define( 'NONCE_KEY',        '#1vNYlg<:wVpRS*AtGk;j*P 1r:IgOg&YkS|t}J1Xn!M~GwF)hnD3>VR`q/QQ)u.' );
define( 'AUTH_SALT',        'Ag:O|dVt+hW#Dq^k~uxS1a+N G$:QE!:GFV]U[f]4JXc>Jvqcz<mj1lA.{4V)NO?' );
define( 'SECURE_AUTH_SALT', 'iopLWw3vfEGGuob4GGH;FEPUlmrBFQ{K_>PzH0:/bH~)Fg5@;~ABOMl~x*.Wbt>Q' );
define( 'LOGGED_IN_SALT',   'i_$(XXzbttp7v[H~4anIAU(M$>:F4*1hl?4FBFt.[S#T3oXO%7<u+;A/{bzu%[^|' );
define( 'NONCE_SALT',       '7cN7SI.-O+#d:bDm;S1t7i_]g!!W4}QPzKVBudePE9[K(QS*7mJg%Q[Y{ks{H#TB' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
