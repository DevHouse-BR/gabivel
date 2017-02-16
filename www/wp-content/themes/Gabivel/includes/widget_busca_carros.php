<?php
/**
 * Plugin Name: Widget Busca Avançada de Carros
 * Description: Busca avançada específica para o site gabivel
 * Version: 0.1
 * Author: Leonardo Lima de Vasconcellos
 * Author URI: http://www.devhouse.com.br
 */


add_action( 'widgets_init', 'inicia_widget' );


function inicia_widget() {
	register_widget( 'Widget_BuscaCarros' );
}

class Widget_BuscaCarros extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'busca_carros', // Base ID
			'Busca de Carros', // Name
			array( 'description' => __( 'Busca avançada específica para o site da Gabivel.', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
        ?>
        <hr class="widget_busca_hr" />
        <?php
        
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		
		$searchQuery = get_search_query();
		?>
		<div id="searchformwrapper">
            <script type="text/javascript">
                function busca_carros(formulario, evento){
                    
                    var url = '<?php echo home_url(); ?>';
                    
                    url += '/?s=' + $(formulario.s).val().trim();
                    
                    url += '&post_type=carro';
                    
                    url += '&valorminimo=' + $(formulario.valorminimo).val();
                    
                    url += '&valormaximo=' + $(formulario.valormaximo).val();
                    
                    openPage(url);
                    
                    return false;
                }
            </script>
    		<form id="buscacarrosform" action="#!" method="get" onsubmit="return busca_carros(this, event);">
    		    <label for="valorminimo">Modelo:</label>
    		    <div class="clearfix"></div>
    			<a href="javascript:void(0)" class="searchbutton" onclick="$('#buscacarrosform').submit();"><?php _e('Search','rb'); ?></a>
    			<input class="searchbox" type="text" name="s" value="<?php if(!empty($searchQuery)){echo $searchQuery;} ?>" size="25" maxlength="25" />
                <div class="clearfix"></div>
                <label for="valorminimo">Valor:</label>
                <div class="clearfix"></div>
                <select id="valorminimo" name="valorminimo">
                    <option value="0"<?php if(isset($_GET['valorminimo']) && ($_GET['valorminimo'] == "0")){echo " selected"; } ?>>de</option>
                    <option value="20000"<?php if(isset($_GET['valorminimo']) && ($_GET['valorminimo'] == "20000")){echo " selected"; } ?>>R$ 20 mil</option>
                    <option value="22000"<?php if(isset($_GET['valorminimo']) && ($_GET['valorminimo'] == "22000")){echo " selected"; } ?>>R$ 22 mil</option>
                    <option value="24000"<?php if(isset($_GET['valorminimo']) && ($_GET['valorminimo'] == "24000")){echo " selected"; } ?>>R$ 24 mil</option>
                    <option value="26000"<?php if(isset($_GET['valorminimo']) && ($_GET['valorminimo'] == "26000")){echo " selected"; } ?>>R$ 26 mil</option>
                    <option value="28000"<?php if(isset($_GET['valorminimo']) && ($_GET['valorminimo'] == "28000")){echo " selected"; } ?>>R$ 28 mil</option>
                    <option value="30000"<?php if(isset($_GET['valorminimo']) && ($_GET['valorminimo'] == "30000")){echo " selected"; } ?>>R$ 30 mil</option>
                    <option value="35000"<?php if(isset($_GET['valorminimo']) && ($_GET['valorminimo'] == "35000")){echo " selected"; } ?>>R$ 35 mil</option>
                    <option value="40000"<?php if(isset($_GET['valorminimo']) && ($_GET['valorminimo'] == "40000")){echo " selected"; } ?>>R$ 40 mil</option>
                    <option value="45000"<?php if(isset($_GET['valorminimo']) && ($_GET['valorminimo'] == "45000")){echo " selected"; } ?>>R$ 45 mil</option>
                    <option value="50000"<?php if(isset($_GET['valorminimo']) && ($_GET['valorminimo'] == "50000")){echo " selected"; } ?>>R$ 50 mil</option>
                    <option value="60000"<?php if(isset($_GET['valorminimo']) && ($_GET['valorminimo'] == "60000")){echo " selected"; } ?>>R$ 60 mil</option>
                    <option value="70000"<?php if(isset($_GET['valorminimo']) && ($_GET['valorminimo'] == "70000")){echo " selected"; } ?>>R$ 70 mil</option>
                    <option value="80000"<?php if(isset($_GET['valorminimo']) && ($_GET['valorminimo'] == "80000")){echo " selected"; } ?>>R$ 80 mil</option>
                    <option value="90000"<?php if(isset($_GET['valorminimo']) && ($_GET['valorminimo'] == "90000")){echo " selected"; } ?>>R$ 90 mil</option>
                    <option value="100000"<?php if(isset($_GET['valorminimo']) && ($_GET['valorminimo'] == "100000")){echo " selected"; } ?>>R$ 100 mil</option>
                    <option value="120000"<?php if(isset($_GET['valorminimo']) && ($_GET['valorminimo'] == "120000")){echo " selected"; } ?>>R$ 120 mil</option>
                    <option value="150000"<?php if(isset($_GET['valorminimo']) && ($_GET['valorminimo'] == "150000")){echo " selected"; } ?>>R$ 150 mil</option>
                    <option value="200000"<?php if(isset($_GET['valorminimo']) && ($_GET['valorminimo'] == "200000")){echo " selected"; } ?>>R$ 200 mil</option>
                </select>
                <select id="valormaximo" name="valormaximo">
                    <option value="99999999">até</option>
                    <option value="22000"<?php if(isset($_GET['valormaximo']) && ($_GET['valormaximo'] == "22000")){echo " selected"; } ?>>R$ 22 mil</option>
                    <option value="24000"<?php if(isset($_GET['valormaximo']) && ($_GET['valormaximo'] == "24000")){echo " selected"; } ?>>R$ 24 mil</option>
                    <option value="26000"<?php if(isset($_GET['valormaximo']) && ($_GET['valormaximo'] == "26000")){echo " selected"; } ?>>R$ 26 mil</option>
                    <option value="28000"<?php if(isset($_GET['valormaximo']) && ($_GET['valormaximo'] == "28000")){echo " selected"; } ?>>R$ 28 mil</option>
                    <option value="30000"<?php if(isset($_GET['valormaximo']) && ($_GET['valormaximo'] == "30000")){echo " selected"; } ?>>R$ 30 mil</option>
                    <option value="35000"<?php if(isset($_GET['valormaximo']) && ($_GET['valormaximo'] == "35000")){echo " selected"; } ?>>R$ 35 mil</option>
                    <option value="40000"<?php if(isset($_GET['valormaximo']) && ($_GET['valormaximo'] == "40000")){echo " selected"; } ?>>R$ 40 mil</option>
                    <option value="45000"<?php if(isset($_GET['valormaximo']) && ($_GET['valormaximo'] == "45000")){echo " selected"; } ?>>R$ 45 mil</option>
                    <option value="50000"<?php if(isset($_GET['valormaximo']) && ($_GET['valormaximo'] == "50000")){echo " selected"; } ?>>R$ 50 mil</option>
                    <option value="60000"<?php if(isset($_GET['valormaximo']) && ($_GET['valormaximo'] == "60000")){echo " selected"; } ?>>R$ 60 mil</option>
                    <option value="70000"<?php if(isset($_GET['valormaximo']) && ($_GET['valormaximo'] == "70000")){echo " selected"; } ?>>R$ 70 mil</option>
                    <option value="80000"<?php if(isset($_GET['valormaximo']) && ($_GET['valormaximo'] == "80000")){echo " selected"; } ?>>R$ 80 mil</option>
                    <option value="90000"<?php if(isset($_GET['valormaximo']) && ($_GET['valormaximo'] == "90000")){echo " selected"; } ?>>R$ 90 mil</option>
                    <option value="100000"<?php if(isset($_GET['valormaximo']) && ($_GET['valormaximo'] == "100000")){echo " selected"; } ?>>R$ 100 mil</option>
                    <option value="120000"<?php if(isset($_GET['valormaximo']) && ($_GET['valormaximo'] == "120000")){echo " selected"; } ?>>R$ 120 mil</option>
                    <option value="150000"<?php if(isset($_GET['valormaximo']) && ($_GET['valormaximo'] == "150000")){echo " selected"; } ?>>R$ 150 mil</option>
                    <option value="200000"<?php if(isset($_GET['valormaximo']) && ($_GET['valormaximo'] == "200000")){echo " selected"; } ?>>R$ 200 mil</option>
                    <option value="99999999"<?php if(isset($_GET['valormaximo']) && ($_GET['valormaximo'] == "99999999")){echo " selected"; } ?>>qualquer</option>
                </select>
    		</form>
    		<div class="clearfix"></div>
		</div>
		<?php		
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( '', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

}
?>