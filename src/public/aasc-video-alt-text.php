<?php
/**
 * Kadence Video Popup — add YouTube/Vimeo titles as accessible labels.
 */

/**
 * Get a video's title via oEmbed.
 * Cached for a week; failed lookups retried after an hour.
 */
function kv_get_video_title( $url ) {
	$key   = 'kv_vtitle_' . md5( $url );
	$title = get_transient( $key );

	if ( false === $title || '' === $title ) {
		$data  = _wp_oembed_get_object()->get_data( $url );
		$title = ( $data && ! empty( $data->title ) ) ? $data->title : '';

		set_transient( $key, $title, $title ? WEEK_IN_SECONDS : HOUR_IN_SECONDS );
	}

	return $title;
}

/**
 * Find each video popup card and label its thumbnail and play button.
 * Receives the full page HTML, returns the edited version.
 */
function kv_fix_video_popups( $html ) {

	$pattern = '/'
		. '(<img\b[^>]*kadence-video-poster[^>]*>)'   // 1: thumbnail
		. '(.*?)'                                     // 2: overlay
		. '(<a\b[^>]*kadence-video-popup-link[^>]*>)' // 3: play link
		. '/is';

	return preg_replace_callback(
		$pattern,
		function ( $m ) {
			list( , $img, $between, $link ) = $m;

			// The video URL lives on the play link.
			if ( ! preg_match( '/\shref="([^"]+)"/i', $link, $href ) ) {
				return $m[0];
			}

			$url = html_entity_decode( $href[1] );

			if ( ! preg_match( '#youtube\.com|youtu\.be|vimeo\.com#i', $url ) ) {
				return $m[0];
			}

			$title = kv_get_video_title( $url );

			// No title — leave the card alone, note it in the page source.
			if ( ! $title ) {
				return $m[0] . '<!-- kv: no title found for ' . esc_html( $url ) . ' -->';
			}

			// Screen readers announce "|" as "vertical line".
			$title = trim( preg_replace( '/\s*\|\s*/', ', ', $title ) );

			// Thumbnail alt text.
			$img = preg_replace( '/\salt="[^"]*"/i', '', $img );
			$img = '<img alt="' . esc_attr( $title ) . '"' . substr( $img, 4 );

			// Play button label.
			$link = preg_replace( '/\saria-label="[^"]*"/i', '', $link );
			$link = '<a aria-label="' . esc_attr( 'Play video: ' . $title ) . '"' . substr( $link, 2 );

			return $img . $between . $link;
		},
		$html
	);
}

/**
 * Hold the page so kv_fix_video_popups() can edit it before it's sent.
 */
add_action(
	'template_redirect',
	function () {
		if ( is_admin() || wp_doing_ajax() || is_feed() ) {
			return;
		}

		ob_start( 'kv_fix_video_popups' );
	}
);