<?php/** * Archives Widget * * This is based on WordPress wp_get_archives() but with ability to select post type. */class CTC_Widget_Archives extends CTC_Widget {		/**	 * Register widget with WordPress	 */	function __construct() {			parent::__construct(			'ctc-archives',			_x( 'CT Archives', 'widget', 'church-theme' ),			array(				'description' => __( 'Monthly archive for chosen post type', 'church-theme' )			)		);	}	/**	 * Field configuration	 *	 * This is used by CTC_Widget class for automatic field output, filtering, sanitization and saving.	 */	 	function ctc_fields() { // prefix in case WP core adds method with same name		// Fields		$fields = array(			// Example			/*			'field_id' => array(				'name'				=> __( 'Field Name', 'ccm' ),				'after_name'		=> '', // (Optional), (Required), etc.				'desc'				=> __( 'This is the description below the field.', 'ccm' ),				'type'				=> 'text', // text, textarea, checkbox, radio, select, number, url, image				'checkbox_label'	=> '', //show text after checkbox				'radio_inline'		=> false, // show radio inputs inline or on top of each other				'number_min'		=> '', // lowest possible value for number type				'number_max'		=> '', // highest possible value for number type				'options'			=> array(), // array of keys/values for radio or select				'default'			=> '', // value to pre-populate option with (before first save or on reset)				'no_empty'			=> false, // if user empties value, force default to be saved instead				'allow_html'		=> false, // allow HTML to be used in the value (text, textarea)				'attributes'		=> array(), // attributes to add to input element				'class'				=> '', // class(es) to add to input				'field_attributes'	=> array(), // attr => value array for field container				'field_class'		=> '', // class(es) to add to field container				'custom_sanitize'	=> '', // function to do additional sanitization (or array( &$this, 'method' ))				'custom_field'		=> '', // function for custom display of field input				'page_templates'	=> array(), // field will not appear or save if one of these page templates are not selected (or array( &$this, 'method' ))				'taxonomies'		=> array(), // hide field if taxonomies are not supported			);			*/			// Title			'title' => array(				'name'				=> _x( 'Title', 'archives widget', 'church-theme' ),				'after_name'		=> '', // (Optional), (Required), etc.				'desc'				=> '',				'type'				=> 'text', // text, textarea, checkbox, radio, select, number, url, image				'checkbox_label'	=> '', //show text after checkbox				'radio_inline'		=> false, // show radio inputs inline or on top of each other				'number_min'		=> '', // lowest possible value for number type				'number_max'		=> '', // highest possible value for number type				'options'			=> array(), // array of keys/values for radio or select				'default'			=> '', // value to pre-populate option with (before first save or on reset)				'no_empty'			=> false, // if user empties value, force default to be saved instead				'allow_html'		=> false, // allow HTML to be used in the value (text, textarea)				'attributes'		=> array(), // attributes to add to input element				'class'				=> '', // class(es) to add to input				'field_attributes'	=> array(), // attr => value array for field container				'field_class'		=> '', // class(es) to add to field container				'custom_sanitize'	=> '', // function to do additional sanitization (or array( &$this, 'method' ))				'custom_field'		=> '', // function for custom display of field input				'page_templates'	=> array(), // field will not appear or save if one of these page templates are not selected (or array( &$this, 'method' ))				'taxonomies'		=> array(), // hide field if taxonomies are not supported			),						// Type			'post_type' => array(				'name'				=> _x( 'Type', 'archives widget', 'church-theme' ),				'after_name'		=> '', // (Optional), (Required), etc.				'desc'				=> '',				'type'				=> 'select', // text, textarea, checkbox, radio, select, number, url, image				'checkbox_label'	=> '', //show text after checkbox				'radio_inline'		=> false, // show radio inputs inline or on top of each other				'number_min'		=> '', // lowest possible value for number type				'number_max'		=> '', // highest possible value for number type				'options'			=> $this->ctc_post_type_options(), // array of keys/values for radio or select				'default'			=> 'post', // value to pre-populate option with (before first save or on reset)				'no_empty'			=> true, // if user empties value, force default to be saved instead				'allow_html'		=> false, // allow HTML to be used in the value (text, textarea)				'attributes'		=> array(), // attributes to add to input element				'class'				=> '', // class(es) to add to input				'field_attributes'	=> array(), // attr => value array for field container				'field_class'		=> '', // class(es) to add to field container				'custom_sanitize'	=> '', // function to do additional sanitization (or array( &$this, 'method' ))				'custom_field'		=> '', // function for custom display of field input				'page_templates'	=> array(), // field will not appear or save if one of these page templates are not selected (or array( &$this, 'method' ))				'taxonomies'		=> array(), // hide field if taxonomies are not supported			),						// Limit			'limit' => array(				'name'				=> _x( 'Limit', 'archives widget', 'church-theme' ),				'after_name'		=> '', // (Optional), (Required), etc.				'desc'				=> _x( 'Set to 0 for no limit.', 'archives widget', 'church-theme' ),				'type'				=> 'number', // text, textarea, checkbox, radio, select, number, url, image				'checkbox_label'	=> '', //show text after checkbox				'radio_inline'		=> false, // show radio inputs inline or on top of each other				'number_min'		=> '0', // lowest possible value for number type				'number_max'		=> '100', // highest possible value for number type				'options'			=> array(), // array of keys/values for radio or select				'default'			=> '0', // value to pre-populate option with (before first save or on reset)				'no_empty'			=> false, // if user empties value, force default to be saved instead				'allow_html'		=> false, // allow HTML to be used in the value (text, textarea)				'attributes'		=> array(), // attributes to add to input element				'class'				=> '', // class(es) to add to input				'field_attributes'	=> array(), // attr => value array for field container				'field_class'		=> '', // class(es) to add to field container				'custom_sanitize'	=> '', // function to do additional sanitization (or array( &$this, 'method' ))				'custom_field'		=> '', // function for custom display of field input				'page_templates'	=> array(), // field will not appear or save if one of these page templates are not selected (or array( &$this, 'method' ))				'taxonomies'		=> array(), // hide field if taxonomies are not supported			),						// Count			'show_count' => array(				'name'				=> '',				'after_name'		=> '', // (Optional), (Required), etc.				'desc'				=> '',				'type'				=> 'checkbox', // text, textarea, checkbox, radio, select, number, url, image				'radio_inline'		=> false, // show radio inputs inline or on top of each other				'number_min'		=> '', // lowest possible value for number type				'number_max'		=> '', // highest possible value for number type				'checkbox_label'	=> _x( 'Show counts', 'archives widget', 'church-theme' ), //show text after checkbox				'options'			=> array(), // array of keys/values for radio or select				'default'			=> true, // value to pre-populate option with (before first save or on reset)				'no_empty'			=> false, // if user empties value, force default to be saved instead				'allow_html'		=> false, // allow HTML to be used in the value (text, textarea)				'attributes'		=> array(), // attributes to add to input element				'class'				=> '', // class(es) to add to input				'field_attributes'	=> array(), // attr => value array for field container				'field_class'		=> 'ctc-widget-no-bottom-margin', // class(es) to add to field container				'custom_sanitize'	=> '', // function to do additional sanitization (or array( &$this, 'method' ))				'custom_field'		=> '', // function for custom display of field input				'page_templates'	=> array(), // field will not appear or save if one of these page templates are not selected (or array( &$this, 'method' ))				'taxonomies'		=> array(), // hide field if taxonomies are not supported			),			// Dropdown			'show_dropdown' => array(				'name'				=> '',				'after_name'		=> '', // (Optional), (Required), etc.				'desc'				=> '',				'type'				=> 'checkbox', // text, textarea, checkbox, radio, select, number, url, image				'checkbox_label'	=> _x( 'Show as dropdown', 'archives widget', 'church-theme' ), //show text after checkbox				'radio_inline'		=> false, // show radio inputs inline or on top of each other				'number_min'		=> '', // lowest possible value for number type				'number_max'		=> '', // highest possible value for number type				'options'			=> array(), // array of keys/values for radio or select				'default'			=> '', // value to pre-populate option with (before first save or on reset)				'no_empty'			=> false, // if user empties value, force default to be saved instead				'allow_html'		=> false, // allow HTML to be used in the value (text, textarea)				'attributes'		=> array(), // attributes to add to input element				'class'				=> '', // class(es) to add to input				'field_attributes'	=> array(), // attr => value array for field container				'field_class'		=> '', // class(es) to add to field container				'custom_sanitize'	=> '', // function to do additional sanitization (or array( &$this, 'method' ))				'custom_field'		=> '', // function for custom display of field input				'page_templates'	=> array(), // field will not appear or save if one of these page templates are not selected (or array( &$this, 'method' ))				'taxonomies'		=> array(), // hide field if taxonomies are not supported			),		);				return $fields;		}	/**	 * Post type options	 */	function ctc_post_type_options() {			$options = array();		// Get supported post types with archives		$post_types = get_post_types( array(			'public'		=> true,			'show_ui'		=> true, // theme support or plugin settings may set false			'has_archive'	=> true		), 'objects' );				// Loop post types		foreach ( $post_types as $post_type_slug => $post_type_object ) {					$post_type_name = $post_type_object->labels->name;					// Add to array			$options[$post_type_slug] = $post_type_name;				}		// Add blog post type with special name (has_archive excludes it)		$options = array_merge(			array(				'post' => _x( 'Blog', 'archives widget', 'church-theme' )			),			$options		);				// Return filtered		return apply_filters( 'ctc_archives_widget_post_type_options', $options );			}		/**	 * Get archives	 *	 * This can optionally be used by the template.	 */	 	function ctc_get_archives() {		global $wpdb;		// Get post type		$post_type = $this->ctc_instance['post_type'];				// Get limit		$limit = absint( $this->ctc_instance['limit'] );		$sql_limit = '';		if ( $limit > 0 ) {			$sql_limit = $wpdb->prepare(				"LIMIT %d",				array(					$limit				)			);		}		// Get archive months		$archives = (array) $wpdb->get_results( $wpdb->prepare(			"				SELECT					YEAR(post_date) AS `year`,					MONTH(post_date) AS `month`,					count(ID) as posts				FROM $wpdb->posts				WHERE					post_type = %s					AND post_status = 'publish'				GROUP BY					YEAR(post_date),					MONTH(post_date)				ORDER BY post_date DESC				$sql_limit			",			array(				$post_type			)		) );			// Return filtered		return apply_filters( 'ctc_archives_widget_get_archives', $archives );		}}