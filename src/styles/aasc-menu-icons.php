<?php
/**
 * AASC menu icons
 * Usage: [aasc-menu-icons]
 *
 * Outputs the nav icon styles. Separate from [aasc-global-css] so the icons
 * can be updated without touching the global stylesheet.
 *
 * Icons are Material Symbols (Outlined) served from Google Fonts, addressed by
 * codepoint rather than by ligature name.
 *
 * To swap an icon: look it up on fonts.google.com/icons, take its codepoint
 * from the icon's detail panel, put it in content as "\xxxx", AND add the
 * icon's name to $icons below. The subset is still built from names even
 * though the CSS uses codepoints — miss that step and the glyph is not in the
 * downloaded font, and you get an empty box.
 *
 *   info                e88e      volunteer_activism   ea70
 *   bubble_chart        e6dd      event                e878
 *   news                e032      auto_stories         e666
 */

/**
 * Load the Material Symbols font.
 *
 * icon_names subsets the font to only the six glyphs used, which takes the
 * download from ~4,300 icons to six. display=block hides the pseudo-element
 * while the font loads rather than showing a fallback box.
 */
if ( ! function_exists( 'aasc_menu_icons_font' ) ) {

	function aasc_menu_icons_font() {

		$icons = array(
			'auto_stories',
			'bubble_chart',
			'event',
			'info',
			'news',
			'volunteer_activism',
		);

		$src = add_query_arg(
			array(
				'family'     => 'Material Symbols Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200',
				'icon_names' => implode( ',', $icons ),
				'display'    => 'block',
			),
			'https://fonts.googleapis.com/css2'
		);

		wp_enqueue_style( 'aasc-material-symbols', $src, array(), null );
	}

	add_action( 'wp_enqueue_scripts', 'aasc_menu_icons_font' );
}

if ( ! shortcode_exists( 'aasc-menu-icons' ) ) {
	add_shortcode( 'aasc-menu-icons', 'aasc_menu_icons_css' );
}

function aasc_menu_icons_css() {

	// Print once even if the shortcode appears more than once on a page.
	static $done = false;
	if ( $done ) {
		return '';
	}
	$done = true;

	ob_start();
	?>
	<style>
		/* ======================================================================
		   AASC menu icons — Material Symbols (Outlined), loaded as a font.
		   Colour is the `color` property on ::before, not a fill, so these
		   recolour like text. Weight and fill are on the font-variation-settings
		   line in the shared ::before block.
		   ====================================================================== */

		#aasc-about-menu > .kb-link-wrap,
		#aasc-research-menu > .kb-link-wrap,
		#aasc-publications-menu > .kb-link-wrap,
		#aasc-funding-menu > .kb-link-wrap,
		#aasc-events-menu > .kb-link-wrap,
		#aasc-library-menu > .kb-link-wrap {
			position: relative;
			padding-left: 32px;
		}

		#aasc-about-menu > .kb-link-wrap > .kb-nav-link-content,
		#aasc-research-menu > .kb-link-wrap > .kb-nav-link-content,
		#aasc-publications-menu > .kb-link-wrap > .kb-nav-link-content,
		#aasc-funding-menu > .kb-link-wrap > .kb-nav-link-content,
		#aasc-events-menu > .kb-link-wrap > .kb-nav-link-content,
		#aasc-library-menu > .kb-link-wrap > .kb-nav-link-content {
			padding: 12px;
			padding-left: 0;
		}

		#aasc-about-menu > .kb-link-wrap::before,
		#aasc-research-menu > .kb-link-wrap::before,
		#aasc-publications-menu > .kb-link-wrap::before,
		#aasc-funding-menu > .kb-link-wrap::before,
		#aasc-events-menu > .kb-link-wrap::before,
		#aasc-library-menu > .kb-link-wrap::before {
			position: absolute;
			left: 8px;
			top: 50%;
			transform: translateY(-50%);

			font-family: "Material Symbols Outlined";
			font-size: 24px;
			line-height: 1;
			color: #2774AE;

			/* FILL 0 = outlined, 1 = solid. wght matches the nav's text weight.
			   opsz should match font-size. */
			font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24;

			/* The nav's own font-weight/style must not reach the glyph, or the
			   browser fakes bold or italic on top of the variable font. */
			font-weight: normal;
			font-style: normal;
		}

		#aasc-about-menu > .kb-link-wrap::before {
			content: "\e88e"; /* info */
		}

		#aasc-research-menu > .kb-link-wrap::before {
			content: "\e6dd"; /* bubble_chart */
		}

		#aasc-publications-menu > .kb-link-wrap::before {
			content: "\e032"; /* news */
		}

		#aasc-funding-menu > .kb-link-wrap::before {
			content: "\ea70"; /* volunteer_activism */
		}

		#aasc-events-menu > .kb-link-wrap::before {
			content: "\e878"; /* event */
		}

		#aasc-library-menu > .kb-link-wrap::before {
			content: "\e666"; /* auto_stories */
		}
	</style>
	<?php
	return ob_get_clean();
}