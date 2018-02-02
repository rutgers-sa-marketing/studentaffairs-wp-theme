<?php
	/*
		Helper function necessary to setup the "Page Attributes" meta box.
		Taken from wp-admin/includes/template.php
	*/
	/**
	 * Print out option HTML elements for the page templates drop-down.
	 *
	 * @since 1.5.0
	 * @since 4.7.0 Added the `$post_type` parameter.
	 *
	 * @param string $default   Optional. The template file name. Default empty.
	 * @param string $post_type Optional. Post type to get templates for. Default 'post'.
	 */
	function page_template_dropdown( $default = '', $post_type = 'page' ) {
		$templates = get_page_templates( null, $post_type );
		ksort( $templates );
		foreach ( array_keys( $templates ) as $template ) {
			$selected = selected( $default, $templates[ $template ], false );
			echo "\n\t<option value='" . esc_attr( $templates[ $template ] ) . "' $selected>" . esc_html( $template ) . "</option>";
		}
	}
	/**
		This is how wordpress sets up their "Page Attributes" meta box!
		Taken from wp-admin/includes/meta-boxes.php
	**/
	/**
	 * Display page attributes form fields.
	 *
	 * @since 2.7.0
	 *
	 * @param object $post
	 */
	function page_attributes_meta_box($post) {
		if ( is_post_type_hierarchical( $post->post_type ) ) :
			$dropdown_args = array(
				'post_type'        => $post->post_type,
				'exclude_tree'     => $post->ID,
				'selected'         => $post->post_parent,
				'name'             => 'parent_id',
				'show_option_none' => __('(no parent)'),
				'sort_column'      => 'menu_order, post_title',
				'echo'             => 0,
			);

			/**
			 * Filters the arguments used to generate a Pages drop-down element.
			 *
			 * @since 3.3.0
			 *
			 * @see wp_dropdown_pages()
			 *
			 * @param array   $dropdown_args Array of arguments used to generate the pages drop-down.
			 * @param WP_Post $post          The current post.
			 */
			$dropdown_args = apply_filters( 'page_attributes_dropdown_pages_args', $dropdown_args, $post );
			$pages = wp_dropdown_pages( $dropdown_args );
			if ( ! empty($pages) ) :
	?>
	<p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="parent_id"><?php _e( 'Parent' ); ?></label></p>
	<?php echo $pages; ?>
	<?php
			endif; // end empty pages check
		endif;  // end hierarchical check.

		if ( count( get_page_templates( $post ) ) > 0 && get_option( 'page_for_posts' ) != $post->ID ) :
			$template = ! empty( $post->page_template ) ? $post->page_template : false;
			?>
	<p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="page_template"><?php _e( 'Template' ); ?></label><?php
		/**
		 * Fires immediately after the label inside the 'Template' section
		 * of the 'Page Attributes' meta box.
		 *
		 * @since 4.4.0
		 *
		 * @param string  $template The template used for the current post.
		 * @param WP_Post $post     The current post.
		 */
		do_action( 'page_attributes_meta_box_template', $template, $post );
	?></p>
	<select name="page_template" id="page_template">
	<?php
	/**
	 * Filters the title of the default page template displayed in the drop-down.
	 *
	 * @since 4.1.0
	 *
	 * @param string $label   The display value for the default page template title.
	 * @param string $context Where the option label is displayed. Possible values
	 *                        include 'meta-box' or 'quick-edit'.
	 */
	$default_title = apply_filters( 'default_page_template_title',  __( 'Default Template' ), 'meta-box' );
	?>
	<option value="default"><?php echo esc_html( $default_title ); ?></option>
	<?php page_template_dropdown( $template, $post->post_type ); ?>
	</select>
	<?php endif; ?>
	<?php if ( post_type_supports( $post->post_type, 'page-attributes' ) ) : ?>
	<p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="menu_order"><?php _e( 'Order' ); ?></label></p>
	<input name="menu_order" type="text" size="4" id="menu_order" value="<?php echo esc_attr( $post->menu_order ); ?>" />
	<?php
	/**
	 * Fires before the help hint text in the 'Page Attributes' meta box.
	 *
	 * @since 4.9.0
	 *
	 * @param WP_Post $post The current post.
	 */
	do_action( 'page_attributes_misc_attributes', $post );
	?>
	<?php if ( 'page' == $post->post_type && get_current_screen()->get_help_tabs() ) : ?>
	<p><?php _e( 'Need help? Use the Help tab above the screen title.' ); ?></p>
	<?php endif;
		endif;
	}
?>