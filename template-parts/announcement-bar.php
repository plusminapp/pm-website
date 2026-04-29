<?php
/**
 * Announcement Bar — smalle aankondigingsbalk bovenaan de pagina.
 *
 * ─────────────────────────────────────────────
 * CONFIGURATIE — pas de variabelen hieronder aan
 * ─────────────────────────────────────────────
 */

// Zet op false om de balk volledig te verbergen
$ann_enabled = true;

// Unieke ID: wijzig dit om de balk opnieuw te tonen bij bezoekers die hem al sloten
// Gebruik bijvoorbeeld 'budgetscanner-v2' na een update
$ann_bar_id = 'budgetscanner-v1';

// Icoon links — vervang de SVG naar wens (of gebruik een emoji-string)
// Huidige standaard: staafgrafiek (past bij de Budgetscanner)
$ann_icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
    aria-hidden="true">
    <line x1="18" y1="20" x2="18" y2="10"/>
    <line x1="12" y1="20" x2="12" y2="4"/>
    <line x1="6"  y1="20" x2="6"  y2="14"/>
    <line x1="2"  y1="20" x2="22" y2="20"/>
</svg>';

// Aankondigingstekst (midden van de balk)
$ann_text = __( 'De gratis Budgetscanner is nu live! Krijg in no time inzicht in je financiën.', 'plusmin-redzaamheid' );

// CTA-knop 1 — secundair (outline), links
$ann_cta1_label = __( 'Lees verder', 'plusmin-redzaamheid' );
$ann_cta1_url   = '/budgetscanner/';

// CTA-knop 2 — primair (gevuld), rechts
$ann_cta2_label = __( 'Start meteen', 'plusmin-redzaamheid' );
$ann_cta2_url   = 'https://budgetscanner.plusmin.org';

// ─────────────────────────────────────────────
// EINDE CONFIGURATIE — hieronder niets wijzigen
// ─────────────────────────────────────────────

if ( ! $ann_enabled ) {
    return;
}
?>
<style id="announcement-bar-inline-style">
    #announcement-bar {
        position: sticky;
        top: 0;
        z-index: 1200;
        background: #e8f4f2;
        border-bottom: 1px solid rgba(15, 118, 110, 0.22);
        box-shadow: 0 4px 14px rgba(24, 53, 74, 0.13);
        max-height: 220px;
        overflow: hidden;
        opacity: 1;
        transition: max-height 0.35s ease, opacity 0.25s ease;
    }

    #announcement-bar.is-dismissed {
        max-height: 0;
        opacity: 0;
        border-bottom: 0;
        box-shadow: none;
        pointer-events: none;
    }

    #announcement-bar .ann-bar-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.9rem;
        padding: 0.9rem 0;
        flex-wrap: nowrap;
    }

    #announcement-bar .ann-bar-main {
        min-width: 0;
        flex: 1 1 auto;
        display: flex;
        align-items: center;
    }

    #announcement-bar .ann-bar-text {
        margin: 0;
        color: #18222f;
        font-size: inherit;
        font-weight: 500;
        line-height: inherit;
        min-width: 0;
    }

    #announcement-bar .ann-bar-actions {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        flex: 0 0 auto;
        white-space: nowrap;
    }

    #announcement-bar .ann-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 2rem;
        padding: 0.35rem 0.85rem;
        border-radius: 999px;
        font-size: inherit;
        font-weight: 500;
        text-decoration: none !important;
        border: 1px solid transparent;
        cursor: pointer;
        transition: transform 0.14s ease, box-shadow 0.14s ease, background-color 0.14s ease;
    }

    #announcement-bar .ann-btn:hover {
        transform: translateY(-1px);
    }

    #announcement-bar .ann-btn-secondary {
        color: #0f766e;
        background: #ffffff;
        border-color: #0f766e;
    }

    #announcement-bar .ann-btn-primary {
        color: #ffffff;
        background: #0f766e;
        box-shadow: 0 4px 10px rgba(15, 118, 110, 0.3);
    }

    #announcement-bar .ann-bar-close {
        width: 1.9rem;
        height: 1.9rem;
        border: 0;
        border-radius: 999px;
        background: rgba(24, 34, 47, 0.08);
        color: #18222f;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.15rem;
        line-height: 1;
        padding: 0;
        cursor: pointer;
    }

    #announcement-bar .ann-bar-close:hover {
        background: rgba(24, 34, 47, 0.16);
    }

    @media (max-width: 960px) {
        #announcement-bar .ann-bar-inner {
            flex-wrap: wrap;
            align-items: flex-start;
        }

        #announcement-bar .ann-bar-main {
            flex: 1 1 100%;
        }

        #announcement-bar .ann-bar-actions {
            margin-left: 0;
        }
    }

    @media (max-width: 640px) {
        #announcement-bar .ann-bar-actions {
            margin-left: 0;
            width: 100%;
            justify-content: flex-start;
            flex-wrap: wrap;
        }
    }
</style>
<div class="announcement-bar"
     id="announcement-bar"
     data-bar-id="<?php echo esc_attr( $ann_bar_id ); ?>"
     role="region"
     aria-label="<?php esc_attr_e( 'Aankondiging', 'plusmin-redzaamheid' ); ?>">
    <div class="container ann-bar-inner">
        <div class="ann-bar-main">
            <p class="ann-bar-text">
                <?php echo esc_html( $ann_text ); ?>
            </p>
        </div>

        <div class="ann-bar-actions">
            <a href="<?php echo esc_url( $ann_cta1_url ); ?>"
               class="ann-btn ann-btn-secondary">
                <?php echo esc_html( $ann_cta1_label ); ?>
            </a>
            <a target="_blank" href="<?php echo esc_url( $ann_cta2_url ); ?>"
               class="ann-btn ann-btn-primary">
                <?php echo esc_html( $ann_cta2_label ); ?>
            </a>
            <button class="ann-bar-close"
                    type="button"
                    aria-label="<?php esc_attr_e( 'Sluit aankondiging', 'plusmin-redzaamheid' ); ?>">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    </div>
</div>
