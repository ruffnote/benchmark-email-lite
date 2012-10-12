<?php

class benchmarkemaillite_shortcode {

	// Display The Shortcode Output
	function shortcode($atts) {

		// Ensure Widget ID Is Specified
		if (!isset($atts['widget_id'])) { return; }
		$atts = shortcode_atts(
			array(
				'widget_id' => '',
				'before_widget' => '',
				'after_widget' => '',
				'before_title' => '<h2 class="widgettitle">',
				'after_title' => '</h2>',
			), $atts
		);
		$widgets = get_option('widget_benchmarkemaillite_widget');

		// Ensure Widget Id Is Found
		if (!isset($widgets[$atts['widget_id']])) { return; }

		// Temporarily Disable Page Filtering And Return Widget Output
		benchmarkemaillite_widget::$pagefilter = false;
		ob_start();
		benchmarkemaillite_widget::widget($atts, $widgets[$atts['widget_id']]);
		$result = ob_get_contents();
		ob_end_clean();
		benchmarkemaillite_widget::$pagefilter = true;
		return $result;
	}
}

?>