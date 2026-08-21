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
    </style>
    <?php
    return ob_get_clean();
}