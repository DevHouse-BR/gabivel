<?php
/**
 * Sample template for displaying single carro posts.
 * Save this file as as single-carro.php in your current theme.
 *
 * This sample code was based off of the Starkers Baseline theme: http://starkerstheme.com/
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	

	<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>

		<h2>Custom Fields</h2>	
		
		<strong>Ano</strong> <?php print_custom_field('ano'); ?><br />
		<strong>Modelo</strong> <?php print_custom_field('modelo'); ?><br />
		<strong>Cor</strong> <?php print_custom_field('cor'); ?><br />
		<strong>Km</strong> <?php print_custom_field('km'); ?><br />
		<strong>Portas</strong> <?php print_custom_field('portas'); ?><br />
		<strong>Final Placa</strong> <?php print_custom_field('final_placa'); ?><br />
		<strong>Combustível</strong> <?php print_custom_field('combustivel'); ?><br />
		<strong>Localização</strong> <?php print_custom_field('localizacao'); ?><br />
		<strong>Valor</strong> <?php print_custom_field('valor'); ?><br />
		<strong>Marca</strong> <?php print_custom_field('marca'); ?><br />
		<strong>Air bag</strong> <?php print_custom_field('air_bag'); ?><br />
		<strong>Air bag duplo</strong> <?php print_custom_field('air_bag_duplo'); ?><br />
		<strong>Alarme</strong> <?php print_custom_field('alarme'); ?><br />
		<strong>Ar quente</strong> <?php print_custom_field('ar_quente'); ?><br />
		<strong>Ar-condicionado</strong> <?php print_custom_field('ar_condicionado'); ?><br />
		<strong>Ar-condicionado digital</strong> <?php print_custom_field('ar_condicionado_digital'); ?><br />
		<strong>Bancos em couro</strong> <?php print_custom_field('bancos_em_couro'); ?><br />
		<strong>Câmbio automático</strong> <?php print_custom_field('cambio_automatico'); ?><br />
		<strong>CD player</strong> <?php print_custom_field('cd_player'); ?><br />
		<strong>Computador de bordo</strong> <?php print_custom_field('computador_de_bordo'); ?><br />
		<strong>Desembaçador traseiro</strong> <?php print_custom_field('desembacador_traseiro'); ?><br />
		<strong>Direção hidráulica</strong> <?php print_custom_field('direcao_hidraulica'); ?><br />
		<strong>Encosto cab. traseiro</strong> <?php print_custom_field('encosto_cab_traseiro'); ?><br />
		<strong>Engate de carretinha</strong> <?php print_custom_field('engate_de_carretinha'); ?><br />
		<strong>Espelhos elétricos</strong> <?php print_custom_field('espelhos_eletricos'); ?><br />
		<strong>Farol de neblina</strong> <?php print_custom_field('farol_de_neblina'); ?><br />
		<strong>Freios ABS</strong> <?php print_custom_field('freios_abs'); ?><br />
		<strong>Limpador traseiro</strong> <?php print_custom_field('limpador_traseiro'); ?><br />
		<strong>Lona marítima</strong> <?php print_custom_field('lona_maritima'); ?><br />
		<strong>MP3 player</strong> <?php print_custom_field('mp3_player'); ?><br />
		<strong>Para-choque na cor</strong> <?php print_custom_field('para_choque_na_cor'); ?><br />
		<strong>Película solar</strong> <?php print_custom_field('pelicula_solar'); ?><br />
		<strong>Protetor de caçamba</strong> <?php print_custom_field('protetor_de_cacamba'); ?><br />
		<strong>Protetor de cárter</strong> <?php print_custom_field('protetor_de_carter'); ?><br />
		<strong>Rodas de liga leve</strong> <?php print_custom_field('rodas_de_liga_leve'); ?><br />
		<strong>Sensor estacionamento</strong> <?php print_custom_field('sensor_estacionamento'); ?><br />
		<strong>Teto solar</strong> <?php print_custom_field('teto_solar'); ?><br />
		<strong>Tração 4x4</strong> <?php print_custom_field('tracao_4x4'); ?><br />
		<strong>Travas elétricas</strong> <?php print_custom_field('travas_eletricas'); ?><br />
		<strong>Vidros elétricos</strong> <?php print_custom_field('vidros_eletricos'); ?><br />
		<strong>Vidros verdes</strong> <?php print_custom_field('vidros_verdes'); ?><br />
		<strong>Volante escamoteável</strong> <?php print_custom_field('volante_escamoteavel'); ?><br />




<?php endwhile; // end of the loop. ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>