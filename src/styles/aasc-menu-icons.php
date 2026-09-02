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
		   backgrounds. Fill is baked in as %232774AE (UCLA blue) — find/replace
		   to recolour.
		   ====================================================================== */

		#aasc-about-menu > .kb-link-wrap,
		#aasc-research-menu > .kb-link-wrap,
		#aasc-publications-menu > .kb-link-wrap,
		#aasc-funding-menu > .kb-link-wrap,
		#aasc-events-menu > .kb-link-wrap,
		#aasc-library-menu > .kb-link-wrap {
			position: relative;
			/* 32px not 36px — the 4px active border-left in the global stylesheet
			   makes up the difference, so the icon sits still when a menu opens. */
			padding-left: 32px;
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
			background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%232774AE' viewBox='0 0 256 256'%3E%3Cpath d='M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm16-40a8,8,0,0,1-8,8,16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40A8,8,0,0,1,144,176ZM112,84a12,12,0,1,1,12,12A12,12,0,0,1,112,84Z'/%3E%3C/svg%3E");
		}

		/* Research — flask */
		#aasc-research-menu > .kb-link-wrap::before {
			background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%232774AE' viewBox='0 0 256 256'%3E%3Cpath d='M221.69,199.77,160,96.92V40h8a8,8,0,0,0,0-16H88a8,8,0,0,0,0,16h8V96.92L34.31,199.77A16,16,0,0,0,48,224H208a16,16,0,0,0,13.72-24.23ZM110.86,103.25A7.93,7.93,0,0,0,112,99.14V40h32V99.14a7.93,7.93,0,0,0,1.14,4.11L183.36,167c-12,2.37-29.07,1.37-51.75-10.11-15.91-8.05-31.05-12.32-45.22-12.81ZM48,208l28.54-47.58c14.25-1.74,30.31,1.85,47.82,10.72,19,9.61,35,12.88,48,12.88a69.89,69.89,0,0,0,19.55-2.7L208,208Z'/%3E%3C/svg%3E");
		}

		/* Publications — book open */
		#aasc-publications-menu > .kb-link-wrap::before {
			background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%232774AE' viewBox='0 0 256 256'%3E%3Cpath d='M232,48H160a40,40,0,0,0-32,16A40,40,0,0,0,96,48H24a8,8,0,0,0-8,8V200a8,8,0,0,0,8,8H96a24,24,0,0,1,24,24,8,8,0,0,0,16,0,24,24,0,0,1,24-24h72a8,8,0,0,0,8-8V56A8,8,0,0,0,232,48ZM96,192H32V64H96a24,24,0,0,1,24,24V200A39.81,39.81,0,0,0,96,192Zm128,0H160a39.81,39.81,0,0,0-24,8V88a24,24,0,0,1,24-24h64ZM160,88h40a8,8,0,0,1,0,16H160a8,8,0,0,1,0-16Zm48,40a8,8,0,0,1-8,8H160a8,8,0,0,1,0-16h40A8,8,0,0,1,208,128Zm0,32a8,8,0,0,1-8,8H160a8,8,0,0,1,0-16h40A8,8,0,0,1,208,160Z'/%3E%3C/svg%3E");
		}

		/* Funding — coins */
		#aasc-funding-menu > .kb-link-wrap::before {
			background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%232774AE' viewBox='0 0 256 256'%3E%3Cpath d='M184,89.57V84c0-25.08-37.83-44-88-44S8,58.92,8,84v40c0,20.89,26.25,37.49,64,42.46V172c0,25.08,37.83,44,88,44s88-18.92,88-44V132C248,111.3,222.58,94.68,184,89.57ZM232,132c0,13.22-30.79,28-72,28-3.73,0-7.43-.13-11.08-.37C170.49,151.77,184,139,184,124V105.74C213.87,110.19,232,122.27,232,132ZM72,150.25V126.46A183.74,183.74,0,0,0,96,128a183.74,183.74,0,0,0,24-1.54v23.79A163,163,0,0,1,96,152,163,163,0,0,1,72,150.25Zm96-40.32V124c0,8.39-12.41,17.4-32,22.87V123.5C148.91,120.37,159.84,115.71,168,109.93ZM96,56c41.21,0,72,14.78,72,28s-30.79,28-72,28S24,97.22,24,84,54.79,56,96,56ZM24,124V109.93c8.16,5.78,19.09,10.44,32,13.57v23.37C36.41,141.4,24,132.39,24,124Zm64,48v-4.17c2.63.1,5.29.17,8,.17,3.88,0,7.67-.13,11.39-.35A121.92,121.92,0,0,0,120,171.41v23.46C100.41,189.4,88,180.39,88,172Zm48,26.25V174.4a179.48,179.48,0,0,0,24,1.6,183.74,183.74,0,0,0,24-1.54v23.79a165.45,165.45,0,0,1-48,0Zm64-3.38V171.5c12.91-3.13,23.84-7.79,32-13.57V172C232,180.39,219.59,189.4,200,194.87Z'/%3E%3C/svg%3E");
		}

		/* Events — calendar */
		#aasc-events-menu > .kb-link-wrap::before {
			background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%232774AE' viewBox='0 0 256 256'%3E%3Cpath d='M64,32a8,8,0,0,1,16,0V56a8,8,0,0,1-16,0Z'/%3E%3Cpath d='M176,32a8,8,0,0,1,16,0V56a8,8,0,0,1-16,0Z'/%3E%3Cpath fill-rule='evenodd' d='M32,56A16,16,0,0,1,48,40H208a16,16,0,0,1,16,16V208a16,16,0,0,1-16,16H48a16,16,0,0,1-16-16ZM48,56V208H208V56Z'/%3E%3Cpath d='M48,72H208V96H48Z'/%3E%3Cpath d='M76,128a10,10,0,1,1,10,10A10,10,0,0,1,76,128Zm42,0a10,10,0,1,1,10,10A10,10,0,0,1,118,128Zm42,0a10,10,0,1,1,10,10A10,10,0,0,1,160,128ZM76,170a10,10,0,1,1,10,10A10,10,0,0,1,76,170Zm42,0a10,10,0,1,1,10,10A10,10,0,0,1,118,170Zm42,0a10,10,0,1,1,10,10A10,10,0,0,1,160,170Z'/%3E%3C/svg%3E");
		}

		/* Library — books */
		#aasc-library-menu > .kb-link-wrap::before {
			background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%232774AE' viewBox='0 0 256 256'%3E%3Cpath d='M231.65,194.55,198.46,36.75a16,16,0,0,0-19-12.39L132.65,34.42a16.08,16.08,0,0,0-12.3,19l33.19,157.8A16,16,0,0,0,169.16,224a16.25,16.25,0,0,0,3.38-.36l46.81-10.06A16.09,16.09,0,0,0,231.65,194.55ZM136,50.15c0-.06,0-.09,0-.09l46.8-10,3.33,15.87L139.33,66Zm6.62,31.47,46.82-10.05,3.34,15.9L146,97.53Zm6.64,31.57,46.82-10.06,13.3,63.24-46.82,10.06ZM216,197.94l-46.8,10-3.33-15.87L212.67,182,216,197.85C216,197.91,216,197.94,216,197.94ZM104,32H56A16,16,0,0,0,40,48V208a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V48A16,16,0,0,0,104,32ZM56,48h48V64H56Zm0,32h48v96H56Zm48,128H56V192h48v16Z'/%3E%3C/svg%3E");
		}
	</style>
	<?php
	return ob_get_clean();
}