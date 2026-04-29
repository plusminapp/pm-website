</main>

<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <h2>Missie & publicaties</h2>
            <p>Onze missie is het duurzaam verbeteren van de financiële
                redzaamheid van mensen die weinig financiële zekerheid ervaren.
            </p>
            <p>
                <a href="<?php echo esc_url(home_url('/transparantie/')); ?>">Statuten | ANBI | Beleidsplan</a>
            </p>
        </div>

        <div>
            <h2>Contact</h2>
            <p>
                <a class="footer-contact-link" href="mailto:info@plusmin.org">
                    <span class="footer-icon-circle" aria-hidden="true">
                        <svg class="footer-icon" viewBox="0 0 24 24" focusable="false">
                            <path d="M3 6.75A1.75 1.75 0 0 1 4.75 5h14.5A1.75 1.75 0 0 1 21 6.75v10.5A1.75 1.75 0 0 1 19.25 19H4.75A1.75 1.75 0 0 1 3 17.25V6.75Zm1.5.3v.1l7.27 4.69a.5.5 0 0 0 .46 0l7.27-4.7v-.1a.25.25 0 0 0-.25-.25H4.75a.25.25 0 0 0-.25.25Zm15 1.87-6.45 4.16a2 2 0 0 1-2.1 0L4.5 8.92v8.33c0 .14.11.25.25.25h14.5a.25.25 0 0 0 .25-.25V8.92Z" />
                        </svg>
                    </span>
                    <span>info@plusmin.org</span>
                </a>
            </p>
            <p>
                <a class="footer-contact-link" href="https://www.linkedin.com/company/plusmin" target="_blank" rel="noopener noreferrer">
                    <span class="footer-icon-circle" aria-hidden="true">
                        <svg class="footer-icon" viewBox="0 0 24 24" focusable="false">
                            <path d="M6.9 8.52a1.79 1.79 0 1 1 0-3.58 1.79 1.79 0 0 1 0 3.58ZM5.36 9.9h3.07V19H5.36V9.9Zm4.98 0h2.95v1.24h.04c.41-.78 1.42-1.6 2.92-1.6 3.13 0 3.71 2.06 3.71 4.74V19H16.9v-4.2c0-1-.02-2.28-1.39-2.28-1.39 0-1.6 1.08-1.6 2.2V19h-3.07V9.9Z" />
                        </svg>
                    </span>
                    <span>volg ons op LinkedIn</span>
                </a>
            </p>
        </div>

        <div>
            <h2>Registraties</h2>
            <ul class="footer-menu">
                <li>KvK: 42008149</li>
                <li>RSIN: 869260728</li>
                <li>ANBI: aanvraag loopt</li>
            </ul>
        </div>

        <div>
            <h2>Navigatie</h2>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer',
                'container'      => false,
                'fallback_cb'    => 'plusmin_fallback_menu',
                'menu_class'     => 'footer-menu',
            ));
            ?>
        </div>
    </div>

    <div class="container footer-legal">
        <p>&copy; <?php echo esc_html(date_i18n('Y')); ?> PlusMin | Op weg naar financiële redzaamheid.</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>