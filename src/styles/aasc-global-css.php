<?php
if ( ! shortcode_exists( 'aasc-global-css' ) ) {
    add_shortcode( 'aasc-global-css', 'aasc_global_css' );
}

function aasc_global_css() {
    ob_start();
    ?>
    <style>
        /* ==========================================================================
           Global AASC styles
           ========================================================================== */

        /* Custom Navigation Expanded Menu
           - submenu header line spacing
           - menu header line spacing
           - light column divider line
           - link hover background color
           ---------------------------------------------------------------------- */
		
		/* Desktop Navigation */
		
		/* Creates blue (#2b6cb0) bar at top of navigation menu */
		.aasc-nav-header-desktop-1 {
			 border-top: 8px solid #2b6cb0;
 			 padding-top: 20px;
		}

        /* Menu container */
        .aasc-menu-col-1 {
            background-color: #F7FAFC;
            border-top: 8px solid #2B6CB0 !important;
            box-shadow: rgba(0, 0, 0, 0.2) 0 0 14px 0;
        }
	
		 .aasc-menu-col-1 > div {
			 padding: 16px;
		 } 

        /* 1-column layout */
        .aasc-menu-col-1 .kt-has-1-columns {
            gap: 16px;
        }

        .aasc-menu-col-1 .kt-has-1-columns > .wp-block-kadence-column:not(:last-child) {
            border-bottom: 1px solid #e5e5e5;
        }

        /* 2-column layout */
        .aasc-menu-col-1 .kt-has-2-columns {
            gap: 16px;
        }

        .aasc-menu-col-1 .kt-has-2-columns > .wp-block-kadence-column:not(:last-child) {
            border-right: 1px solid #e5e5e5;
            padding-right: 16px;
        }

        /* 3-column layout */
        .aasc-menu-col-1 .kt-has-3-columns {
            gap: 16px;
        }

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
	
	
		#aasc-menu-mobile-1 .menu-item > .kb-link-wrap:hover { background: rgba(0, 0, 0, .045); }
		 #aasc-menu-mobile-1 .sub-menu {
			margin-left: 36px !important;
			padding-left: 12px !important;
		}
	
	#aasc-about-menu > .sub-menu,
#aasc-research-menu > .sub-menu,
#aasc-publications-menu > .sub-menu,
#aasc-funding-menu > .sub-menu,
#aasc-events-menu > .sub-menu,
#aasc-library-menu > .sub-menu {
	border-left: 1px solid #e5e5e5;
	margin-top: 8px;
	margin-bottom: 8px;
}

/* AASC mobile submenu — slide open / closed
   Tune SPEED with the two durations below.
   Tune DISTANCE with max-height: set it just above your tallest submenu. */

@media (max-width: 1025px) {

	/* Collapsed */
	#aasc-menu-mobile-1 .sub-menu {
		display: block !important;
		height: auto !important;
		max-height: 0;
		overflow: hidden !important;
		clip: auto !important;
		clip-path: none !important;
		visibility: visible !important;
		opacity: 0;
		margin-top: 0 !important;
		margin-bottom: 0 !important;
		transition:
			max-height 0.42s cubic-bezier(0.33, 0, 0.2, 1),
			margin     0.42s cubic-bezier(0.33, 0, 0.2, 1),
			opacity    0.22s ease-out;
	}

	/* Expanded */
	#aasc-menu-mobile-1 .menu-item--toggled-on > .sub-menu {
		max-height: 800px;
		opacity: 1;
		margin-top: 8px !important;
		margin-bottom: 8px !important;
		transition:
			max-height 0.85s cubic-bezier(0.22, 0.61, 0.24, 1),
			margin     0.85s cubic-bezier(0.22, 0.61, 0.24, 1),
			opacity    0.34s ease-in 0.06s;
	}
}

@media (prefers-reduced-motion: reduce) {
	#aasc-menu-mobile-1 .sub-menu,
	#aasc-menu-mobile-1 .menu-item--toggled-on > .sub-menu,
	#aasc-menu-mobile-1 .sub-menu > .menu-item,
	#aasc-menu-mobile-1 .menu-item--toggled-on > .sub-menu > .menu-item {
		transition: none;
		transform: none;
	}
}


    </style>
    <?php
    return ob_get_clean();
}