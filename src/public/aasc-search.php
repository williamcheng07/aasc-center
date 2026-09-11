<?php


/**
 * AASC — Custom search page
 *
 * Takes over the search results page: adds a content-type filter,
 * section links, and a custom result layout.
 */

function aasc_cs_types() {
	/**
	 *
	 * key   = the real post type slug (check wp-admin URL: edit.php?post_type=SLUG)
	 * value = what shows in the dropdown and the section links
	 *
	 * Confirmed: news, reports, crosscurrents, aascpress, page
	 * UNVERIFIED: 'event' below is a guess. Open the Events list in wp-admin
	 * and read post_type= in the URL. If it differs, fix the key here.
	 */
	return array(
		'events'        => 'Events',
		'page'          => 'Pages',
		'news'          => 'News',
		'crosscurrents' => 'CrossCurrents',
		'aascpress'     => 'AASC Press',
		'reports'       => 'Reports',
	);
}

/**
 * Drop any slug that isn't actually registered, so a wrong guess
 * in the array above can't break the search query.
 */
function aasc_cs_live_types() {

	$out = array();

	foreach ( aasc_cs_types() as $slug => $label ) {
		if ( post_type_exists( $slug ) ) {
			$out[ $slug ] = $label;
		}
	}

	return $out;
}

function aasc_cs_per_page() {
	return 12;
}

/**
 * Post IDs to keep out of search results — e.g. the Search page itself,
 * which otherwise turns up as a result for every query.
 *
 * To find an ID: wp-admin → Pages, hover the page title, and read the
 * post=NNN number at the end of the link (or open it and check the URL).
 */
function aasc_cs_excluded_ids() {
	return array(
		// 123, // Search page
	);
}

/* -------------------------------------------------------------------------
 * 2. QUERY — apply the post-type filter from the dropdown.
 * ---------------------------------------------------------------------- */

add_action( 'pre_get_posts', function ( $q ) {

	if ( is_admin() || ! $q->is_main_query() || ! $q->is_search() ) {
		return;
	}

	$allowed = array_keys( aasc_cs_live_types() );
	$ctype   = isset( $_GET['ctype'] ) ? sanitize_key( wp_unslash( $_GET['ctype'] ) ) : '';

	if ( empty( $allowed ) ) {
		return;
	}

	$q->set( 'post_type', in_array( $ctype, $allowed, true ) ? $ctype : $allowed );
	$q->set( 'post_status', 'publish' );
	$q->set( 'posts_per_page', aasc_cs_per_page() );

	$excluded = aasc_cs_excluded_ids();

	if ( ! empty( $excluded ) ) {
		$q->set( 'post__not_in', $excluded );
	}
} );

/* -------------------------------------------------------------------------
 * 3. STYLES — only loaded on the search page.
 * ---------------------------------------------------------------------- */

add_action( 'wp_head', function () {

	if ( ! is_search() ) {
		return;
	}
	?>
	<style id="aasc-cs-styles">

	/* ---- page shell ---- */
	.aasc-cs {
		max-width: 860px;
		margin: 0 auto;
		padding: 2.5rem 1.25rem 4rem;
	}

	.aasc-cs h1 {
		font-size: 1.9rem;
		margin: 0 0 1.25rem;
	}

	/* ---- search form ---- */
	.aasc-cs__form {
		display: flex;
		flex-wrap: wrap;
		gap: .5rem;
		margin-bottom: 1rem;
	}

	.aasc-cs__form input[type=search] {
		flex: 1 1 260px;
		padding: .6rem .75rem;
		border: 1px solid #c9c9c9;
		border-radius: 4px;
		font-size: 1rem;
	}

	.aasc-cs__form button {
		padding: .6rem 1.25rem;
		border: 0;
		border-radius: 4px;
		background: #2774AE;
		color: #fff;
		font-size: 1rem;
		cursor: pointer;
	}

	.aasc-cs__form button:hover {
		background: #1d5b8a;
	}

	/* ---- "12 results for ..." ---- */
	.aasc-cs__count {
		color: #555;
		font-size: .9rem;
		margin: 0 0 1.5rem;
	}

	/* ---- section pills ---- */
	.aasc-cs__sections {
		display: flex;
		flex-wrap: wrap;
		gap: .4rem;
		margin: 0 0 1.75rem;
		padding: 0;
		list-style: none;
	}

	.aasc-cs__sections li {
		margin: 0;
	}

	.aasc-cs__sections a {
		display: inline-block;
		padding: .35rem .8rem;
		border: 1px solid #d5d5d5;
		border-radius: 999px;
		font-size: .82rem;
		text-decoration: none;
		color: #333;
	}

	.aasc-cs__sections a:hover {
		border-color: #2774AE;
		color: #2774AE;
	}

	.aasc-cs__sections a.is-active {
		background: #2774AE;
		border-color: #2774AE;
		color: #fff;
	}

	/* ---- result list ---- */
	.aasc-cs__list {
		list-style: none;
		margin: 0;
		padding: 0;
	}

	.aasc-cs__item {
		display: flex;
		gap: 1rem;
		padding: 1.4rem 0;
		border-bottom: 1px solid #e6e6e6;
        justify-content: space-between;
	}

	/* Flex children refuse to shrink below their content by default, which
	   breaks the ellipsis on the URL below. This lets the text column shrink. */
	.aasc-cs__body {
		min-width: 0;
	}

	.aasc-cs__thumb img {
		display: block;
		object-fit: cover;
		border-radius: 4px;
        width: 150px; 
        height: 150px; 
        max-width: none !important;
	}

	.aasc-cs__type {
		display: inline-block;
		font-size: .7rem;
		letter-spacing: .07em;
		text-transform: uppercase;
		color: #666;
		margin-bottom: .25rem;
	}

	.aasc-cs__item h2 {
		font-size: 1.25rem;
		line-height: 1.35;
		margin: 0 0 .4rem;
        color: #2774AE;
	}

	.aasc-cs__item h2 a {
		text-decoration: none;
	}

	.aasc-cs__item p {
		margin: 0 0 .4rem;
		color: #333;
		line-height: 1.5;
        font-size: 0.95rem;
	}

	.aasc-cs__url {
		display: block;          /* a span is inline; overflow needs a block */
		max-width: 100%;
		white-space: nowrap;     /* stop it wrapping to a second line */
		overflow: hidden;        /* clip what doesn't fit */
		text-overflow: ellipsis; /* ...and show a … instead */
		font-size: .78rem;
	}

	/* ---- empty state + pagination ---- */
	.aasc-cs__empty {
		padding: 2rem 0;
		color: #444;
	}

	.aasc-cs__pager {
		margin-top: 2.5rem;
	}

	/* WordPress wraps the links in .nav-links — flex it so the gaps stay even. */
	.aasc-cs__pager .nav-links {
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
		gap: .5rem;
	}

	.aasc-cs__pager .page-numbers {
		display: flex;
		align-items: center;
		justify-content: center;
		min-width: 44px;   /* square-ish, and a comfortable tap target */
		min-height: 44px;
		padding: 0 .75rem;
		border: 2px solid #005587;
		border-radius: 0;  /* square corners */
		background: #fff;
		color: #005587;
		font-size: 1.125rem;
		line-height: 1;
		text-decoration: none;
	}

	/* Previous / Next are wider than the number boxes. */
	.aasc-cs__pager .prev,
	.aasc-cs__pager .next {
		padding: 0 1.25rem;
	}

	.aasc-cs__pager a.page-numbers:hover,
	.aasc-cs__pager a.page-numbers:focus {
		background: #005587;
		color: #fff;
	}

	/* The page you're on stays filled in. */
	.aasc-cs__pager .page-numbers.current {
		background: #005587;
		color: #fff;
	}

	/* The "…" WordPress inserts between distant pages gets no box. */
	.aasc-cs__pager .page-numbers.dots {
		border-color: transparent;
		background: none;
		color: #555;
	}

	/* ---- mobile ---- */
	@media (max-width: 540px) {
		.aasc-cs__thumb {
			display: none;
		}
	}

	</style>
	<?php
}, 99 );

/* -------------------------------------------------------------------------
 * 4. TEMPLATE — take over rendering before the theme's search.php loads.
 * ---------------------------------------------------------------------- */

add_action( 'template_redirect', function () {

	if ( ! is_search() ) {
		return;
	}

	global $wp_query;

	$term     = get_search_query();
	$ctype    = isset( $_GET['ctype'] ) ? sanitize_key( wp_unslash( $_GET['ctype'] ) ) : '';
	$sections = aasc_cs_live_types();
	$found    = (int) $wp_query->found_posts;
	$home     = home_url( '/' );

	get_header();
	?>

	<main class="aasc-cs" id="primary">

		<h1>Search Page</h1>

		<!-- ============ search form ============ -->
		<form role="search" method="get" class="aasc-cs__form" action="<?php echo esc_url( $home ); ?>">

			<label class="screen-reader-text" for="aasc-cs-s">Search AASC</label>

			<input type="search"
			       id="aasc-cs-s"
			       name="s"
			       value="<?php echo esc_attr( $term ); ?>"
			       placeholder="Search AASC&hellip;"
			       required>

			<?php /* The section pills below are the visible filter. This carries the
			         active one through when the search term is changed. */ ?>
			<input type="hidden" name="ctype" value="<?php echo esc_attr( $ctype ); ?>">

			<button type="submit">Search</button>

		</form>

		<!-- ============ section pills — each re-runs this search in one section ============ -->
		<?php if ( ! empty( $sections ) ) : ?>
			<ul class="aasc-cs__sections" aria-label="Filter by content type">

				<li>
					<a href="<?php echo esc_url( add_query_arg( array( 's' => $term ), $home ) ); ?>"
					   class="<?php echo '' === $ctype ? 'is-active' : ''; ?>">All content</a>
				</li>

				<?php foreach ( $sections as $slug => $label ) : ?>
					<li>
						<a href="<?php echo esc_url( add_query_arg( array( 's' => $term, 'ctype' => $slug ), $home ) ); ?>"
						   class="<?php echo $ctype === $slug ? 'is-active' : ''; ?>">
							<?php echo esc_html( $label ); ?>
						</a>
					</li>
				<?php endforeach; ?>

			</ul>
		<?php endif; ?>

		<!-- ============ result count ============ -->
		<?php if ( '' !== $term ) : ?>
			<p class="aasc-cs__count">
				<?php
				echo esc_html(
					sprintf(
						/* translators: 1: number of results, 2: search term */
						_n( '%1$s result for "%2$s"', '%1$s results for "%2$s"', $found, 'aasc' ),
						number_format_i18n( $found ),
						$term
					)
				);
				?>
			</p>
		<?php endif; ?>

		<!-- ============ results ============ -->
		<?php if ( have_posts() ) : ?>

			<ul class="aasc-cs__list">

				<?php while ( have_posts() ) : the_post(); ?>
					<?php
					$pt_obj = get_post_type_object( get_post_type() );
					$pt_lbl = $pt_obj ? $pt_obj->labels->singular_name : get_post_type();
					$link   = get_permalink();

					// Breadcrumb-style path: drop the domain, then show the remaining
					// segments separated by › instead of slashes.
					$path = trim( wp_make_link_relative( $link ), '/' );
					$path = str_replace( '/', ' › ', $path );
					?>
					<li class="aasc-cs__item">
						<div class="aasc-cs__body">

							<span class="aasc-cs__type"><?php echo esc_html( $pt_lbl ); ?></span>
                            <span class="aasc-cs__url"><?php echo esc_html( $path ); ?></span>

							<h2>
								<a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
							</h2>

							<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 28 ) ); ?></p>

						</div>

                        <?php if ( has_post_thumbnail() ) : ?>
							<a class="aasc-cs__thumb"
							   href="<?php echo esc_url( $link ); ?>"
							   tabindex="-1"
							   aria-hidden="true"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
						<?php endif; ?>

					</li>
				<?php endwhile; ?>

			</ul>

			<nav class="aasc-cs__pager">
				<?php
				echo get_the_posts_pagination(
					array(
						'mid_size'  => 2,
						'prev_text' => 'Previous',
						'next_text' => 'Next',
					)
				);
				?>
			</nav>

		<?php else : ?>

			<div class="aasc-cs__empty">
				<?php if ( '' === $term ) : ?>
					<p>Enter a term above, or browse a section using the links.</p>
				<?php else : ?>
					<p>No results for &quot;<?php echo esc_html( $term ); ?>&quot;.</p>
					<p>Try fewer words, a broader term, or browse a section above.</p>
				<?php endif; ?>
			</div>

		<?php endif; ?>

	</main>

	<?php
	get_footer();
	exit;
} );
