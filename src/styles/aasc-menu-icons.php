<?php

/**
 * AASC menu icons
 * Usage: [aasc-menu-icons]
 *
 * Outputs the nav icon styles. Separate from [aasc-global-css] so the icons
 * can be updated without touching the global stylesheet.
 */

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
		   AASC menu icons — Phosphor Icons (regular), inlined as data-URI
		   backgrounds. Fill is baked in as %23000000 — find/replace to recolour.
		   ====================================================================== */

		#aasc-about-menu > .kb-link-wrap,
		#aasc-research-menu > .kb-link-wrap,
		#aasc-publications-menu > .kb-link-wrap,
		#aasc-funding-menu > .kb-link-wrap,
		#aasc-events-menu > .kb-link-wrap,
		#aasc-library-menu > .kb-link-wrap {
			position: relative;
			padding-left: 36px;
		}


			#aasc-about-menu > .kb-link-wrap > .kb-nav-link-content,
		#aasc-research-menu > .kb-link-wrap > .kb-nav-link-content,
		#aasc-publications-menu > .kb-link-wrap > .kb-nav-link-content,
		#aasc-funding-menu > .kb-link-wrap > .kb-nav-link-content,
		#aasc-events-menu > .kb-link-wrap > .kb-nav-link-content,
		#aasc-library-menu > .kb-link-wrap > .kb-nav-link-content {
			padding: 12px;
			padding-left: 0px ;
		}

		

		#aasc-about-menu > .kb-link-wrap::before,
		#aasc-research-menu > .kb-link-wrap::before,
		#aasc-publications-menu > .kb-link-wrap::before,
		#aasc-funding-menu > .kb-link-wrap::before,
		#aasc-events-menu > .kb-link-wrap::before,
		#aasc-library-menu > .kb-link-wrap::before {
			content: "";
			position: absolute;
			left: 8px;
			top: 50%;
			transform: translateY(-50%);
			width: 20px;
			height: 20px;
			background-repeat: no-repeat;
			background-position: center;
			background-size: contain;
		}

		/* About — info circle */
		#aasc-about-menu > .kb-link-wrap::before {
			background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000000' viewBox='0 0 256 256'%3E%3Cpath d='M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm16-40a8,8,0,0,1-8,8,16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40A8,8,0,0,1,144,176ZM112,84a12,12,0,1,1,12,12A12,12,0,0,1,112,84Z'/%3E%3C/svg%3E");
		}

		/* Research — flask */
		#aasc-research-menu > .kb-link-wrap::before {
			background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000000' viewBox='0 0 256 256'%3E%3Cpath d='M221.69,199.77,160,96.92V40h8a8,8,0,0,0,0-16H88a8,8,0,0,0,0,16h8V96.92L34.31,199.77A16,16,0,0,0,48,224H208a16,16,0,0,0,13.72-24.23ZM110.86,103.25A7.93,7.93,0,0,0,112,99.14V40h32V99.14a7.93,7.93,0,0,0,1.14,4.11L183.36,167c-12,2.37-29.07,1.37-51.75-10.11-15.91-8.05-31.05-12.32-45.22-12.81ZM48,208l28.54-47.58c14.25-1.74,30.31,1.85,47.82,10.72,19,9.61,35,12.88,48,12.88a69.89,69.89,0,0,0,19.55-2.7L208,208Z'/%3E%3C/svg%3E");
		}

		/* Publications — article */
		#aasc-publications-menu > .kb-link-wrap::before {
			background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000000' viewBox='0 0 256 256'%3E%3Cpath d='M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,160H40V56H216V200ZM184,96a8,8,0,0,1-8,8H80a8,8,0,0,1,0-16h96A8,8,0,0,1,184,96Zm0,32a8,8,0,0,1-8,8H80a8,8,0,0,1,0-16h96A8,8,0,0,1,184,128Zm0,32a8,8,0,0,1-8,8H80a8,8,0,0,1,0-16h96A8,8,0,0,1,184,160Z'/%3E%3C/svg%3E");
		}

		/* Funding — piggy bank */
		#aasc-funding-menu > .kb-link-wrap::before {
			background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000000' viewBox='0 0 256 256'%3E%3Cpath d='M192,116a12,12,0,1,1-12-12A12,12,0,0,1,192,116ZM152,64H112a8,8,0,0,0,0,16h40a8,8,0,0,0,0-16Zm96,48v32a24,24,0,0,1-24,24h-2.36l-16.21,45.38A16,16,0,0,1,190.36,224H177.64a16,16,0,0,1-15.07-10.62L160.65,208h-57.3l-1.92,5.38A16,16,0,0,1,86.36,224H73.64a16,16,0,0,1-15.07-10.62L46,178.22a87.69,87.69,0,0,1-21.44-48.38A16,16,0,0,0,16,144a8,8,0,0,1-16,0,32,32,0,0,1,24.28-31A88.12,88.12,0,0,1,112,32H216a8,8,0,0,1,0,16H194.61a87.93,87.93,0,0,1,30.17,37c.43,1,.85,2,1.25,3A24,24,0,0,1,248,112Zm-16,0a8,8,0,0,0-8-8h-3.66a8,8,0,0,1-7.64-5.6A71.9,71.9,0,0,0,144,48H112A72,72,0,0,0,58.91,168.64a8,8,0,0,1,1.64,2.71L73.64,208H86.36l3.82-10.69A8,8,0,0,1,97.71,192h68.58a8,8,0,0,1,7.53,5.31L177.64,208h12.72l18.11-50.69A8,8,0,0,1,216,152h8a8,8,0,0,0,8-8Z'/%3E%3C/svg%3E");
		}

		/* Events — calendar */
		#aasc-events-menu > .kb-link-wrap::before {
			background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000000' viewBox='0 0 256 256'%3E%3Cpath d='M64,32a8,8,0,0,1,16,0V56a8,8,0,0,1-16,0Z'/%3E%3Cpath d='M176,32a8,8,0,0,1,16,0V56a8,8,0,0,1-16,0Z'/%3E%3Cpath fill-rule='evenodd' d='M32,56A16,16,0,0,1,48,40H208a16,16,0,0,1,16,16V208a16,16,0,0,1-16,16H48a16,16,0,0,1-16-16ZM48,56V208H208V56Z'/%3E%3Cpath d='M48,72H208V96H48Z'/%3E%3Cpath d='M76,128a10,10,0,1,1,10,10A10,10,0,0,1,76,128Zm42,0a10,10,0,1,1,10,10A10,10,0,0,1,118,128Zm42,0a10,10,0,1,1,10,10A10,10,0,0,1,160,128ZM76,170a10,10,0,1,1,10,10A10,10,0,0,1,76,170Zm42,0a10,10,0,1,1,10,10A10,10,0,0,1,118,170Zm42,0a10,10,0,1,1,10,10A10,10,0,0,1,160,170Z'/%3E%3C/svg%3E");
		}

		/* Library — books */
		#aasc-library-menu > .kb-link-wrap::before {
			background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000000' viewBox='0 0 256 256'%3E%3Cpath d='M231.65,194.55,198.46,36.75a16,16,0,0,0-19-12.39L132.65,34.42a16.08,16.08,0,0,0-12.3,19l33.19,157.8A16,16,0,0,0,169.16,224a16.25,16.25,0,0,0,3.38-.36l46.81-10.06A16.09,16.09,0,0,0,231.65,194.55ZM136,50.15c0-.06,0-.09,0-.09l46.8-10,3.33,15.87L139.33,66Zm6.62,31.47,46.82-10.05,3.34,15.9L146,97.53Zm6.64,31.57,46.82-10.06,13.3,63.24-46.82,10.06ZM216,197.94l-46.8,10-3.33-15.87L212.67,182,216,197.85C216,197.91,216,197.94,216,197.94ZM104,32H56A16,16,0,0,0,40,48V208a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V48A16,16,0,0,0,104,32ZM56,48h48V64H56Zm0,32h48v96H56Zm48,128H56V192h48v16Z'/%3E%3C/svg%3E");
		}
	</style>
	<?php
	return ob_get_clean();
}