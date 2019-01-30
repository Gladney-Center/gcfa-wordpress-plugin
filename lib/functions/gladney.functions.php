<?php

function gcfa_array_map_recursive($callback, &$array) {
		$func = function ($item) use (&$func, &$callback) {
			return is_array($item) ? array_map($func, $item) : call_user_func($callback, $item);
		};
	return array_map($func, $array);
}

function sttv_404_redirect() {
	global $wp_query;
	$wp_query->set_404();
	status_header( 404 );
	get_template_part( 404 );
}

function __return_email_from() {
	return get_option('admin_email');
}

function __return_email_from_name() {
	return GCFA_BRANDNAME;
}

function __return_email_content_type() {
	return 'text/html';
}