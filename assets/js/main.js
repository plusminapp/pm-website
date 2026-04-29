(function () {
    var button = document.querySelector('.menu-toggle');
    var menu = document.querySelector('.site-nav');

    if (button && menu) {
        button.addEventListener('click', function () {
            var expanded = button.getAttribute('aria-expanded') === 'true';
            button.setAttribute('aria-expanded', expanded ? 'false' : 'true');
            menu.classList.toggle('is-open');
        });
    }

    var reveals = document.querySelectorAll('.reveal');
    if (!reveals.length) {
        return;
    }

    reveals.forEach(function (el, index) {
        el.style.setProperty('--delay', String(index * 90) + 'ms');
    });
})();

// ---- Lightbox ----
(function () {
    var overlay = null;
    var overlayImg = null;

    function buildOverlay() {
        overlay = document.createElement('div');
        overlay.id = 'pm-lightbox';
        overlay.setAttribute('role', 'dialog');
        overlay.setAttribute('aria-modal', 'true');
        overlay.setAttribute('aria-label', 'Afbeelding vergroot');

        var closeBtn = document.createElement('button');
        closeBtn.id = 'pm-lightbox-close';
        closeBtn.setAttribute('aria-label', 'Sluiten');
        closeBtn.innerHTML = '&times;';
        closeBtn.addEventListener('click', closeLightbox);
        overlay.appendChild(closeBtn);

        overlayImg = document.createElement('img');
        overlayImg.alt = '';
        overlay.appendChild(overlayImg);

        overlay.addEventListener('click', function (e) {
            if (e.target === overlay) {
                closeLightbox();
            }
        });

        document.body.appendChild(overlay);
    }

    function openLightbox(src, alt) {
        if (!overlay) {
            buildOverlay();
        }
        overlayImg.src = src;
        overlayImg.alt = alt || '';
        overlay.style.display = 'flex';
        requestAnimationFrame(function () {
            requestAnimationFrame(function () {
                overlay.classList.add('is-open');
            });
        });
        document.addEventListener('keydown', onKeyDown);
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        if (!overlay) {
            return;
        }
        overlay.classList.remove('is-open');
        overlay.addEventListener('transitionend', function handler() {
            overlay.style.display = 'none';
            overlay.removeEventListener('transitionend', handler);
        });
        document.removeEventListener('keydown', onKeyDown);
        document.body.style.overflow = '';
    }

    function onKeyDown(e) {
        if (e.key === 'Escape') {
            closeLightbox();
        }
    }

    document.addEventListener('click', function (e) {
        var link = e.target.closest('.pm-lightbox a[href]');
        if (!link) {
            return;
        }
        e.preventDefault();
        var img = link.querySelector('img');
        openLightbox(link.href, img ? img.alt : '');
    });
})();

// ---- Announcement Bar ----
(function () {
    var bar = document.getElementById('announcement-bar');
    if (!bar) {
        return;
    }

    var barId     = bar.dataset.barId || 'announcement-bar';
    var storeKey  = 'ann_dismissed_' + barId;
    var root      = document.documentElement;

    function setOffset() {
        root.style.setProperty('--ann-bar-height', bar.offsetHeight + 'px');
    }

    // If this bar was already dismissed, hide it immediately (no animation)
    if (localStorage.getItem(storeKey)) {
        bar.style.display = 'none';
        root.style.setProperty('--ann-bar-height', '0px');
        return;
    }

    // Set initial offset and keep it in sync with viewport changes
    setOffset();
    if (typeof ResizeObserver !== 'undefined') {
        new ResizeObserver(setOffset).observe(bar);
    } else {
        window.addEventListener('resize', setOffset);
    }

    // Close button
    var closeBtn = bar.querySelector('.ann-bar-close');
    if (closeBtn) {
        closeBtn.addEventListener('click', function () {
            bar.classList.add('is-dismissed');
            root.style.setProperty('--ann-bar-height', '0px');

            bar.addEventListener('transitionend', function handler() {
                bar.style.display = 'none';
                bar.removeEventListener('transitionend', handler);
            }, { once: true });

            try {
                localStorage.setItem(storeKey, '1');
            } catch (e) {
                // private browsing / storage full — silently ignore
            }
        });
    }
})();
