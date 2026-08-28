<?php
if ( ! shortcode_exists( 'aasc-global-css' ) ) {
	add_shortcode( 'aasc-global-css', 'aasc_global_css' );
}

function aasc_global_css() {
	ob_start();
	?>
	<style>
	/* ==================================================================
	   AASC — Global styles
	   ================================================================== */


	/* ==================================================================
	   1. Desktop navigation
	   ================================================================== */

	.aasc-nav-header-desktop-1 {
		border-top: 8px solid #2B6CB0;
		padding-top: 20px;
	}

	.aasc-menu-col-1 {
		background-color: #F7FAFC;
		border-top: 8px solid #2B6CB0 !important;
		box-shadow: rgba(0, 0, 0, 0.2) 0 0 14px 0;
	}

	.aasc-menu-col-1 > div {
		padding: 16px;
	}

	/* Column layouts — 1 col divides horizontally, 2 and 3 vertically */
	.aasc-menu-col-1 .kt-has-1-columns,
	.aasc-menu-col-1 .kt-has-2-columns,
	.aasc-menu-col-1 .kt-has-3-columns {
		gap: 16px;
	}

	.aasc-menu-col-1 .kt-has-1-columns > .wp-block-kadence-column:not(:last-child) {
		border-bottom: 1px solid #e5e5e5;
	}

	.aasc-menu-col-1 .kt-has-2-columns > .wp-block-kadence-column:not(:last-child),
	.aasc-menu-col-1 .kt-has-3-columns > .wp-block-kadence-column:not(:last-child) {
		border-right: 1px solid #e5e5e5;
		padding-right: 16px;
	}

	/* Headings */
	.aasc-menu-col-1 .wp-block-kadence-advancedheading {
		padding: 8px;
		cursor: pointer;
	}

	.aasc-menu-col-1 .wp-block-kadence-advancedheading:hover {
		background-color: #e0e0e0;
	}

	.aasc-menu-col-1 .wp-block-kadence-advancedheading:has(strong):hover {
		background-color: #2774AE;
		color: white;
	}

	.aasc-menu-col-1 .wp-block-kadence-advancedheading strong {
		line-height: 1.5rem !important;
	}

	.aasc-menu-col-1 .kb-advanced-heading-link {
		color: inherit;
		text-decoration: none;
	}

	.aasc-menu-col-1 .kt-inside-inner-col .kt-inside-inner-col .wp-block-kadence-advancedheading {
		margin-left: 4px;
		padding-right: 4px;
	}


	/* ==================================================================
	   2. Mobile navigation — all rows
	   ================================================================== */

	#aasc-menu-mobile-1 .menu-item > .kb-link-wrap {
		margin-bottom: 4px;
		border-left: 4px solid transparent; /* reserved so rows don't shift on open */
		transition:
			background-color 0.2s ease,
			border-color     0.2s ease;
	}

	#aasc-menu-mobile-1 .menu-item > .kb-link-wrap:hover {
		background: rgba(0, 0, 0, .045);
	}


	/* ==================================================================
	   3. Mobile navigation — top-level items
	   Add class .aasc-top-item to each top-level menu item.
	   ================================================================== */

	#aasc-menu-mobile-1 .aasc-top-item > .kb-link-wrap > .kb-nav-link-content {
		padding-left: 4px !important;
	}

	#aasc-menu-mobile-1 .aasc-top-item:not(.menu-item--toggled-on) > .kb-link-wrap {
		border-bottom: 1px solid #E2E8F0;
	}


	/* ==================================================================
	   4. Mobile navigation — submenus

	   Collapsed by default; the open state lives in section 5.
	   Tune SPEED with the durations. Tune DISTANCE with max-height: set
	   it just above your tallest submenu.

	   Indent ladder: level 2 = 32px, top-level override = 36px,
	   level 3+ = flush with a 32px inset on the link instead. Rules run
	   general to specific, so keep them in this order.
	   ================================================================== */

	/* Level 2 — base indent + collapsed state */
	#aasc-menu-mobile-1 .sub-menu {
		margin-left: 32px !important;
		display: block !important;
		height: auto !important;
		max-height: 0;
		overflow: hidden !important;
		clip: auto !important;
		clip-path: none !important;
		visibility: visible !important;
		opacity: 0;
		transition:
			max-height 0.42s cubic-bezier(0.33, 0, 0.2, 1),
			opacity    0.22s ease-out;
	}

	#aasc-menu-mobile-1 .sub-menu .kb-nav-link-content {
		padding-left: 12px;
	}

	/* Submenus hanging off a top-level item */
	#aasc-menu-mobile-1 .aasc-top-item > .sub-menu {
		border-left: 1px solid #e5e5e5;
		margin-left: 36px !important;
	}

	/* Level 3+ — tinted so the nesting depth reads at a glance */
	#aasc-menu-mobile-1 .menu-item .sub-menu .menu-item .sub-menu {
		background-color: rgba(43, 108, 176, 0.0375);
		margin: 0 !important;
	}

	#aasc-menu-mobile-1 .menu-item .sub-menu .menu-item .sub-menu .kb-link-wrap {
		padding-left: 32px !important;
	}


	/* ==================================================================
	   5. Mobile navigation — open state

	   The .kb-link-wrap rule must stay after the :hover rule in section 2
	   — source order is what keeps the wash from dropping out on hover.
	   ================================================================== */

	#aasc-menu-mobile-1 .menu-item.menu-item--toggled-on > .kb-link-wrap {
		background: #EBF4FB;
		border-left-color: #FFD100;
		border-bottom-width: 2px !important;
	}

	#aasc-menu-mobile-1 .menu-item--toggled-on > .sub-menu {
		max-height: 1300px;
		opacity: 1;
		transition:
			max-height 0.85s cubic-bezier(0.22, 0.61, 0.24, 1),
			opacity    0.34s ease-in 0.06s;
	}


	/* ==================================================================
	   6. Mobile navigation — dropdown toggle button
	   ================================================================== */

	#aasc-menu-mobile-1 .kb-nav-dropdown-toggle-btn {
		margin-bottom: 2px;
	}

	#aasc-menu-mobile-1 .kb-nav-dropdown-toggle-btn > svg {
		width: 1.5em;
		height: 1.5em;
	}


	/* ==================================================================
	   7. Reduced motion
	   ================================================================== */

	@media (prefers-reduced-motion: reduce) {
		#aasc-menu-mobile-1 .sub-menu,
		#aasc-menu-mobile-1 .menu-item--toggled-on > .sub-menu,
		#aasc-menu-mobile-1 .menu-item > .kb-link-wrap {
			transition: none;
		}
	}
	</style>
	<?php
	return ob_get_clean();
}