<?php
// removes <link rel="EditURI" type="application/rsd xml" title="RSD" href="http://bhoover.com/wp/xmlrpc.php?rsd
remove_action( 'wp_head', 'rsd_link' );
// removes <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://bhoover.com/wp/wp-includes/wlwmanifest.xml">
remove_action( 'wp_head', 'wlwmanifest_link' );
// removes Ex: <meta name="generator" content="WordPress 4.5">
remove_action( 'wp_head', 'wp_generator' );
// removes Ex: <link rel='shortlink' href="http://example.com/?p=42">
remove_action( 'wp_head', 'wp_shortlink_wp_head');
// remove adjacent post links
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
// Remove feed links
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
// Remove Emoji scripts
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
// Do not store a comment cookie.  tracking cookies are forbidden in Europe (without user's consent)
remove_action('set_comment_cookies', 'wp_set_comment_cookies');

function wpkRemoveWpVersionFromUrl( $src ) {
	parse_str(parse_url($src, PHP_URL_QUERY), $query);
	if ( !empty($query['ver'])) {
		$src = remove_query_arg('ver', $src);
	}
	return $src;
}
add_filter( 'script_loader_src', 'wpkRemoveWpVersionFromUrl', 100 );
add_filter( 'style_loader_src', 'wpkRemoveWpVersionFromUrl', 100 );
?>