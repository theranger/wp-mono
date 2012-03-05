<?php



/*
Plugin Name: Pages tree
Plugin URI: http://ranger.risk.ee
Description: A widget to display pages in a tree-style layout
Author: Ivari Horm
Version: 1.0
Author URI: http://ranger.risk.ee/
*/



add_action( 'widgets_init', create_function( '', 'return register_widget("Pages_Tree_Widget");' ) );



class Pages_Tree_Widget extends WP_Widget {
	
	
	
	/**
	 * Constructor
	 */
	function Pages_Tree_Widget() {
		
		$widget_ops = array(
			'classname'   => 'Pages_Tree_Widget',
			'description' => __( 'Pages Tree Widget' )
		);
		$this->WP_Widget( false, __( 'Pages Tree Widget' ), $widget_ops );
		
	}
	
	
	
	/**
	 * Display the widget
	 */
	function widget( $args, $instance ) {
		
		global $wp_query, $post;
		
		extract( $args );
		
		echo $before_widget;

		//Get all the parent pages ID-s
		$parents = get_post_ancestors($post->ID);
		$k = count($parents);
		
		// Title
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $before_title;
		if(empty($title))
			echo '<a href="'.get_permalink($parents[$k-1]).'">'.get_the_title($parents[$k-1]).'</a>';
		else
			echo $title;
			
		echo $after_title;

		echo '<ul class="pages_tree">';

		//If there were any, we are displaying a subpage, get the root and show its children
		
		if($k>0)
			wp_list_pages('sort_column=menu_order&title_li=&child_of='.$parents[$k-1]);
		else
			wp_list_pages('sort_column=menu_order&title_li=&child_of='.$post->ID);

		echo '</ul>';

		echo $after_widget;		
	}
	
	
	
	/**
	 * Update the settings
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']  = strip_tags( $new_instance['title'] );
		return $instance;
	}
	
	/**
	 * Admin form
	 */
	function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		if ( !isset( $instance['number'] ) || !$number = (int)$instance['number'] ) $number = 5;
		
		?>
		<div id="themeable-sticky-posts-admin-panel">
			<p><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" id="<?php echo $this->get_field_id( 'title' ); ?>" value="<?php echo $instance['title']; ?>" /></p>
		</div>
	
<?php

}

}

add_action( 'widgets_init', create_function('', 'return register_widget("Pages_Tree_Widget");') );

?>