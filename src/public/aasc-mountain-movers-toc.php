<?php

/**
 * Mountain Movers — Table of Contents
 *
 * The book's table of contents, with a PDF button beside each chapter that
 * has one. Replace the data-pdf values with the real PDF URLs.
 */

if ( ! shortcode_exists( 'mountain_mover_table' ) ) {
    add_shortcode( 'mountain_mover_table', 'mountain_mover_table_feature' );
}


// ─────────────────────────────────────────────
// Mountain Mover Table Shortcode
// ─────────────────────────────────────────────

function mountain_mover_table_feature() {
    ob_start();
    ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,400;0,600;0,700;1,400&family=Jost:wght@600&display=swap" rel="stylesheet">

    <div id="mountain-movers-toc" class="page">
        <h1>TABLE OF CONTENTS</h1>

        <!-- Introduction -->
        <div class="entry intro">
            <div class="main">
                <div class="title" style="margin-bottom:14px">Introduction</div>
                <div class="line" style="padding-left:26px">
                    <span class="title light">Mountain Movers &amp; the Emergence of Asian American Studies</span>
                    <span class="dots"></span><span class="pg">1</span>
                </div>
                <div class="sub">By Russell Jeung</div>
            </div>
            <div class="pdf-slot" style="margin-top:16px">
                <button class="pdf-btn" type="button" data-pdf="introduction.pdf" aria-label="Download Introduction PDF">
                    <span class="pdf-icon"><span class="pdf-label">PDF</span></span>
                </button>
            </div>
        </div>

        <div class="entry intro">
            <div class="main">
                <div class="line"><span class="title">Discussion Questions</span><span class="dots"></span><span class="pg">24</span></div>
            </div>
        </div>

        <!-- SF STATE -->
        <h2 class="section">SF State</h2>

        <div class="entry">
            <div class="main">
                <div class="line"><span class="num">1.</span><span class="title">Origins</span><span class="dots"></span><span class="pg">27</span></div>
                <div class="sub"><em>People, Time, Place, Dreams</em><br>By Malcolm Collier and Daniel Phil Gonzales</div>
            </div>
            <div class="pdf-slot">
                <button class="pdf-btn" type="button" data-pdf="chapter-01-origins.pdf" aria-label="Download Chapter 1, Origins, PDF">
                    <span class="pdf-icon"><span class="pdf-label">PDF</span></span>
                </button>
            </div>
        </div>

        <div class="entry">
            <div class="main">
                <div class="line"><span class="num">2.</span><span class="title">The Strike is Not Over</span><span class="dots"></span><span class="pg">57</span></div>
                <div class="sub">Irene Dea Collier, <em>Oral History</em></div>
            </div>
        </div>

        <div class="entry">
            <div class="main">
                <div class="line"><span class="num">3.</span><span class="title">Opening Doors for Organizing and Advocacy Work</span><span class="dots"></span><span class="pg">74</span></div>
                <div class="sub">Jeff Mori, <em>Oral History</em></div>
            </div>
        </div>

        <!-- UC BERKELEY -->
        <h2 class="section">UC Berkeley</h2>

        <div class="entry spaced">
            <div class="main">
                <p class="kicker">UC Berkeley’s Asian American Studies:</p>
                <div class="line"><span class="num">4.</span><span class="title">50 years of Growing Pains and Gains</span><span class="dots"></span><span class="pg">90</span></div>
                <div class="sub">By L. Ling-chi Wang</div>
            </div>
        </div>

        <div class="entry spaced">
            <div class="main">
                <p class="kicker">Still Relevant Today:</p>
                <div class="line"><span class="num">5.</span><span class="title">Changing the World</span><span class="dots"></span><span class="pg">112</span></div>
                <div class="sub">Harvey Dong, <em>Oral History</em></div>
            </div>
            <div class="pdf-slot" style="margin-top:0px">
                <button class="pdf-btn" type="button" data-pdf="chapter-05-changing-the-world.pdf" aria-label="Download Chapter 5, Changing the World, PDF">
                    <span class="pdf-icon"><span class="pdf-label">PDF</span></span>
                </button>
            </div>
        </div>

        <div class="entry">
            <div class="main">
                <div class="line"><span class="num">6.</span><span class="title">Stand Fast &amp; Don’t Go Quietly into the Night</span><span class="dots"></span><span class="pg">139</span></div>
                <div class="sub">Lillian Fabros, <em>Oral History</em></div>
            </div>
        </div>

        <!-- UCLA -->
        <h2 class="section">UCLA</h2>

        <div class="entry spaced">
            <div class="main">
                <div class="line"><span class="num">7.</span><span class="title">The Founding of the UCLA Asian American Studies Center</span><span class="dots"></span><span class="pg">158</span></div>
                <div class="sub">By Jean-Paul R. deGuzman</div>
            </div>
        </div>

        <div class="entry">
            <div class="main">
                <div class="line"><span class="num">8.</span><span class="title">Back in 1969</span><span class="dots"></span><span class="pg">186</span></div>
                <div class="sub"><em>Protests, Yellow Power; and the Emergence of Asian American Studies</em><br>Amy Uyematsu, <em>Oral History</em></div>
            </div>
            <div class="pdf-slot">
                <button class="pdf-btn" type="button" data-pdf="chapter-08-back-in-1969.pdf" aria-label="Download Chapter 8, Back in 1969, PDF">
                    <span class="pdf-icon"><span class="pdf-label">PDF</span></span>
                </button>
            </div>
        </div>

        <div class="entry">
            <div class="main">
                <div class="line"><span class="num">9.</span><span class="title">Living a Commitment to Service</span><span class="dots"></span><span class="pg">209</span></div>
                <div class="sub"><em>Pilipino Students &amp; the Beginning of Asian American Studies</em><br>Casimiro Tolentino, <em>Oral History</em></div>
            </div>
        </div>

        <!-- NEW VOICES -->
        <h2 class="section">New Voices in Asian American Studies &amp; Activism</h2>

        <div class="entry spaced">
            <div class="main">
                <div class="line"><span class="num wide">10.</span><span class="title">Standing on the Shoulders of Giants</span><span class="dots"></span><span class="pg">223</span></div>
                <div class="sub wide">Holly Rana Lim, <em>Oral History</em></div>
            </div>
        </div>

        <div class="entry spaced">
            <div class="main">
                <div class="line"><span class="num wide">11.</span><span class="title">Honoring Community Resilience &amp; Resistance</span><span class="dots"></span><span class="pg">238</span></div>
                <div class="sub wide">Nkauj Iab Yang, <em>Oral History</em></div>
            </div>
        </div>

        <div class="entry spaced">
            <div class="main">
                <div class="line"><span class="num wide">12.</span><span class="title">Sharing Leadership, Challenging Systems</span><span class="dots"></span><span class="pg">257</span></div>
                <div class="sub wide"><em>A Grounded Perspective of Asian American Studies</em><br>Preeti Sharma, <em>Oral History</em></div>
            </div>
        </div>

        <div class="entry back" style="margin-top:40px">
            <div class="main">
                <div class="line"><span class="title">Biographies</span><span class="dots"></span><span class="pg">271</span></div>
            </div>
        </div>
    </div>

    <style>
        #mountain-movers-toc {
            --ink: #4d4d4f;
            --blue: #2a77b4;
            --pdf: #d65a58;
            --pdf-dark: #bf4644;
            --paper: #ffffff;
        }

        #mountain-movers-toc * { box-sizing: border-box; }

        #mountain-movers-toc.page {
            max-width: 1000px;
            margin: 24px auto;
            padding: 20px 56px 64px 56px;
            background: var(--paper);
            box-shadow: 0 1px 6px rgba(0,0,0,.12);
            font-family: "Myriad Pro", "Source Sans 3", "Segoe UI", sans-serif;
            color: var(--ink);
            font-size: 15px; /* every text size below is em, so change this to scale them all */
        }

        #mountain-movers-toc h1 {
            margin: 24px 0 40px;
            text-align: center;
            font-weight: 700;
            font-size: 1.3em;
            letter-spacing: .32em;
            padding-left: .32em; /* balance trailing letter-spacing */
            color: var(--ink);
        }

        /* ---------- Section headings ---------- */
        #mountain-movers-toc .section {
            margin: 52px 0 14px;
            font-family: "Futura", "Jost", sans-serif;
            font-weight: 600;
            font-size: 1.08em;
            letter-spacing: -.01em;
            color: var(--blue);
            text-transform: uppercase;
        }

        /* ---------- Entries ---------- */
        #mountain-movers-toc .entry {
            display: grid;
            grid-template-columns: 1fr 72px;
            align-items: start;
            margin-bottom: 18px;
        }

        #mountain-movers-toc .entry.spaced { margin-bottom: 30px; }

        #mountain-movers-toc .main { padding-left: 28px; }          /* numbered chapters */
        #mountain-movers-toc .entry.intro .main { padding-left: 54px; }
        #mountain-movers-toc .entry.back .main { padding-left: 74px; }

        #mountain-movers-toc .kicker {
            margin: 0 0 -6px 32px;
            font-style: italic;
            font-size: 0.8em;
        }

        #mountain-movers-toc .line {
            display: flex;
            align-items: baseline;
            gap: 8px;
        }

        #mountain-movers-toc .num {
            flex: none;
            min-width: 34px;
            font-weight: 700;
            font-size: 1.05em;
        }
        #mountain-movers-toc .num.wide { min-width: 50px; }

        #mountain-movers-toc .title {
            font-weight: 700;
            font-size: 1.05em;
            line-height: 1.2;
        }

        #mountain-movers-toc .entry.intro .title,
        #mountain-movers-toc .entry.back .title { font-size: 1.05em; }

        #mountain-movers-toc .title.light {
            font-weight: 400;
            font-size: 0.8em;
        }

        #mountain-movers-toc .dots {
            flex: 1;
            min-width: 12px;
            border-bottom: 2px dotted var(--ink);
            transform: translateY(-5px);
        }

        #mountain-movers-toc .pg {
            flex: none;
            font-size: 0.8em;
        }

        #mountain-movers-toc .sub {
            margin: 4px 0 0 66px;
            font-size: 0.8em;
            line-height: 1.35;
        }
        #mountain-movers-toc .sub.wide { margin-left: 74px; }
        #mountain-movers-toc .entry.intro .sub { margin-left: 26px; }
        #mountain-movers-toc .sub em { font-style: italic; }

        /* ---------- PDF button ---------- */
        #mountain-movers-toc .pdf-slot {
            display: flex;
            justify-content: flex-end;
            margin-top: -14px;
        }

        #mountain-movers-toc .pdf-btn {
            appearance: none;
            font: inherit; /* buttons default to ~13px, which would throw off the em label */
            border: 0;
            padding: 0;
            background: none;
            cursor: pointer;
            border-radius: 6px;
            transition: transform .15s ease;
        }

        #mountain-movers-toc .pdf-icon {
            position: relative;
            display: grid;
            place-items: center;
            width: 32px;
            height: 44px;
            background: var(--pdf);
            border-radius: 4px;
            clip-path: polygon(0 0, 68% 0, 100% 24%, 100% 100%, 0 100%);
            transition: background .15s ease;
        }

        /* folded corner */
        #mountain-movers-toc .pdf-icon::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 32%;
            height: 24%;
            background: linear-gradient(to bottom left, transparent 50%, #f2c4c3 50%);
        }

        #mountain-movers-toc .pdf-label {
            margin-top: 6px;
            padding: 0 3px;
            border: 2px solid #fff;
            border-radius: 3px;
            color: #fff;
            font-family: "Source Sans 3", sans-serif;
            font-weight: 600;
            font-size: 0.52em;
            letter-spacing: .04em;
            line-height: 1.3;
        }

        #mountain-movers-toc .pdf-btn:hover { transform: translateY(-2px); }
        #mountain-movers-toc .pdf-btn:hover .pdf-icon { background: var(--pdf-dark); }
        #mountain-movers-toc .pdf-btn:active { transform: translateY(0); }
        #mountain-movers-toc .pdf-btn:focus-visible {
            outline: 3px solid var(--blue);
            outline-offset: 4px;
        }

        /* ---------- Small screens ---------- */
        @media (max-width: 640px) {
            #mountain-movers-toc.page { padding: 16px 16px 40px; margin: 0; }
            #mountain-movers-toc h1 { font-size: 0.98em; letter-spacing: .2em; }
            #mountain-movers-toc .section { font-size: 0.89em; }
            #mountain-movers-toc .title,
            #mountain-movers-toc .num,
            #mountain-movers-toc .entry.intro .title,
            #mountain-movers-toc .entry.back .title { font-size: 0.85em; }
            #mountain-movers-toc .title.light,
            #mountain-movers-toc .pg,
            #mountain-movers-toc .sub,
            #mountain-movers-toc .kicker { font-size: 0.66em; }
            #mountain-movers-toc .main,
            #mountain-movers-toc .entry.intro .main,
            #mountain-movers-toc .entry.back .main { padding-left: 0; }
            #mountain-movers-toc .sub,
            #mountain-movers-toc .sub.wide,
            #mountain-movers-toc .entry.intro .sub { margin-left: 34px; }
            #mountain-movers-toc .kicker { margin-left: 34px; }
            #mountain-movers-toc .entry { grid-template-columns: 1fr 52px; }
            #mountain-movers-toc .pdf-icon { width: 36px; height: 48px; }
            #mountain-movers-toc .pdf-label { font-size: 0.45em; }
        }
    </style>

    <script>
        // Each PDF button opens the file named in its data-pdf attribute.
        // Replace those values with your real PDF paths or URLs.
        document.querySelectorAll('#mountain-movers-toc .pdf-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const url = btn.dataset.pdf;
                if (url) window.open(url, '_blank', 'noopener');
            });
        });
    </script>

    <?php
    return ob_get_clean();
}
