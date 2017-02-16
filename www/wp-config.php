<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'gabivel');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'vertrigo');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '`F@ $KHjj &qw<}[+a%h<GxTe*m-ZH*:K&-;5Hk*62m+Y`|gL}9(X-2|!obGpc-z');
define('SECURE_AUTH_KEY',  'y=IiO,#v^|G$pn ,Uk1K]V8T;y9^r3]s|=AmS WCwf44Wm-xkgC`W%u|I~=~iKbp');
define('LOGGED_IN_KEY',    '~lf6A7([VeOAM5-4Q6@D{MV[T;BLEv)zb~VbB_4=_P.eqnew&sA5k9Zlk%4eh-rb');
define('NONCE_KEY',        'v]mSq[v=K6x.Zcq}YL:I]y[F>ElxNv)-}Jw+$-WF-LNPIor17[:JJ!q_-PYD<vt9');
define('AUTH_SALT',        'ncQs[e-SGT$tk%}3lLMz>LOG+70b(FoIjm5VU|-T[_<h$ c8.tywQ?D.#raJ$~1N');
define('SECURE_AUTH_SALT', '+5:Y}$aBL*g2S{ 7=&L3(d|Va<RuHn(&9$la*05IouG=V+mzGBb^qn4<e*TMG4d@');
define('LOGGED_IN_SALT',   '?*-N(+Mp]Ho$41_`T_h_m7@~79g2jo;?*ucow+),qDCz| YKZ6ac<KZ8n&&7=/Q7');
define('NONCE_SALT',       '3-:5EAa7/Q?8N&K`aimlM*YVIl}KEvAFB9eL^P?c,mjVdK^peLaX,NaHl/}+2XTN');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wpgabivel_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);


define('FS_METHOD', 'direct');

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
