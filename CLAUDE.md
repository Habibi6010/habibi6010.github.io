# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a static personal academic/portfolio website for Mostafa Habibi (PhD Candidate, UT Dallas), hosted on GitHub Pages. It uses the BootstrapMade "MyResume" template — no build system, no package manager, no server-side code.

## Previewing the Site

Open any `.html` file directly in a browser, or use a local static server:

```
python -m http.server 8080
# then open http://localhost:8080
```

## File Structure

- `index.html` — main single-page site (Hero, About, Skills, Awards, Contact sections)
- `papers-posters.html` — dedicated page listing all research papers and conference posters
- `certificate.html` — certificate listing page (Coursera, DataCamp, AWS)
- `assets/css/main.css` — primary stylesheet; color scheme controlled via CSS custom properties in `:root`
- `assets/css/certificate.css` — page-specific overrides for the certificates page
- `assets/js/main.js` — all JS: nav toggle, scroll-spy, AOS init, Typed.js, Swiper init, Isotope
- `assets/resume/Resume.pdf` — linked directly from nav
- `assets/certificates/` — PDF files for each certificate, linked from `certificate.html`
- `assets/paper_presentation/` — PDF presentation slides linked from `papers-posters.html`
- `assets/poster/` — poster PDFs linked from `papers-posters.html`
- `assets/img/` — images (profile, hero background, award photos)
- `assets/vendor/` — all third-party libraries (Bootstrap 5, AOS, Typed.js, Swiper, GLightbox, Isotope, Waypoints, PureCounter); never edit these

## Architecture Notes

All pages share the same vendor JS/CSS stack and the single `assets/js/main.js`. Swiper slider configs are declared inline as `<script type="application/json" class="swiper-config">` blocks that `main.js` reads at load time.

Navigation on `index.html` uses anchor links (`#hero`, `#about`, etc.) with scroll-spy driven by `main.js`. Sub-pages (`papers-posters.html`, `certificate.html`) have their own nav pointing back to `index.html` and their own anchor sections.

The accent color (`--accent-color` in `assets/css/main.css`) propagates everywhere (buttons, links, icons). Changing it in the `:root` block updates the entire site color scheme.

New content pages should follow the pattern in `certificate.html`: same vendor includes, same header/footer structure, page-specific styles in a `<style>` block or a new CSS file under `assets/css/`.
