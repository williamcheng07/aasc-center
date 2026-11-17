<?php
/**
 * Events: order, year-only display and event status.
 * event_date is an ACF Date Picker, saved as Ymd (e.g. 20261118).
 */

/* 1. Order: today, then upcoming (soonest first), then past (most recent first). */

add_filter( 'kadence_blocks_pro_query_loop_query_vars', function ( $query, $ql_query_meta, $ql_id ) {

	// Query Loop ID => number of events per page ( -1 = all ).
	$loops = array(
		10559 => 6,
		9684  => 9,
	);

	$ql_id = (int) $ql_id;

	if ( isset( $loops[ $ql_id ] ) ) {
		$query['aasc_closest_events'] = true;
		$query['suppress_filters']    = false;
		$query['posts_per_page']      = $loops[ $ql_id ];
	}

	return $query;
}, 10, 3 );

add_filter( 'posts_clauses', function ( $clauses, $wp_query ) {
	global $wpdb;

	if ( ! $wp_query->get( 'aasc_closest_events' ) ) {
		return $clauses;
	}

	$today = $wpdb->prepare( '%s', wp_date( 'Ymd' ) );

	$clauses['join'] .= " INNER JOIN {$wpdb->postmeta} AS aasc_event ON ( aasc_event.post_id = {$wpdb->posts}.ID AND aasc_event.meta_key = 'event_date' )";

	// Skip events with no date.
	$clauses['where'] .= " AND aasc_event.meta_value != ''";

	// 0 = today, 1 = upcoming, 2 = past; then closest to today first.
	$clauses['orderby'] = "CASE
			WHEN aasc_event.meta_value = {$today} THEN 0
			WHEN aasc_event.meta_value > {$today} THEN 1
			ELSE 2
		END ASC,
		ABS( DATEDIFF( aasc_event.meta_value, {$today} ) ) ASC";

	return $clauses;
}, 10, 2 );

/* 2. Year only, in any block with the CSS class "aasc-events-year". */

add_filter( 'render_block', function ( $block_content, $block ) {

	if ( empty( $block['attrs']['className'] ) || false === strpos( $block['attrs']['className'], 'aasc-events-year' ) ) {
		return $block_content;
	}

	$text = trim( wp_strip_all_tags( $block_content ) );

	if ( '' !== $text && preg_match( '/\b(19|20)\d{2}\b/', $text, $match ) ) {
		$block_content = str_replace( $text, $match[0], $block_content );
	}

	return $block_content;
}, 99, 2 );

/* 3. event_status: "current", "upcoming" or "past", worked out from event_date. */

add_filter( 'get_post_metadata', function ( $value, $post_id, $meta_key, $single ) {

	if ( 'event_status' !== $meta_key ) {
		return $value;
	}

	$event_day = get_post_meta( $post_id, 'event_date', true );

	if ( ! $event_day ) {
		return array( '' );
	}

	$today = wp_date( 'Ymd' );

	if ( $event_day === $today ) {
		$status = 'current';
	} elseif ( $event_day < $today ) {
		$status = 'past';
	} else {
		$status = 'upcoming';
	}

	return array( $status );
}, 10, 4 );