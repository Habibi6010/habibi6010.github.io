# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a static personal academic/portfolio website for Mostafa Habibi (PhD Candidate, UT Dallas), hosted on GitHub Pages. It uses the BootstrapMade "MyResume" template — no build system, no package manager, no server-side code.

The site is optimized for **industry hiring** (agentic AI engineering, ML engineering, applied AI roles). The landing page is intentionally minimal — concise text, scannable skill tags, no verbose card descriptions.

## Previewing the Site

Open any `.html` file directly in a browser, or use a local static server:

```
python -m http.server 8080
# then open http://localhost:8080
```

## File Structure

- `index.html` — minimal landing page with sections: Hero, About, Education, Experience, Skills, Awards, Contact
- `papers-posters.html` — dedicated page listing all research papers and conference posters
- `certificate.html` — certificate listing page (Coursera, DataCamp, AWS)
- `assets/css/main.css` — primary stylesheet; color scheme controlled via CSS custom properties in `:root`; skill tag and awards strip utility classes appended at the end
- `assets/css/certificate.css` — page-specific overrides for the certificates page
- `assets/js/main.js` — all JS: nav toggle, scroll-spy, AOS init, Typed.js, Swiper init, Isotope
- `assets/resume/Resume.pdf` — linked directly from nav
- `assets/certificates/` — PDF files for each certificate, linked from `certificate.html`
- `assets/paper_presentation/` — PDF presentation slides linked from `papers-posters.html`
- `assets/poster/` — poster PDFs linked from `papers-posters.html`
- `assets/img/` — images (profile, hero background, award photos)
- `assets/vendor/` — all third-party libraries (Bootstrap 5, AOS, Typed.js, Swiper, GLightbox, Isotope, Waypoints, PureCounter); never edit these

## index.html Section Structure

The landing page has exactly these sections in this order:

| Section | Notes |
|---------|-------|
| Hero | Typed.js animation; leads with "Agentic AI Engineer" |
| About | 3 sentences only — do not expand back to paragraphs |
| Education | Bootstrap table, 3 rows (PhD / MS / BS), no coursework lists |
| Experience | 3 roles: AIMS Technologies intern (top), UT Dallas GRA, UT Dallas TA |
| Skills | 5 tag-row groups using `.skill-group` / `.skill-tag` CSS classes |
| Awards | Static 2-item strip using `.awards-strip` / `.award-strip-item` CSS classes — no Swiper carousel |
| Contact | Email + LinkedIn only — no address, no phone |

**Sections intentionally removed from the landing page:** Research (detail lives in `papers-posters.html`), Professional Service (lives in resume PDF). Do not re-add these to `index.html`.

## CSS Utility Classes (main.css)

Two groups of custom classes were added at the end of `assets/css/main.css`:

**Skill tag groups:**
- `.skill-group` — wrapper with bottom margin
- `.skill-group-label` — accent-colored bold label
- `.skill-tags` — flex-wrap container
- `.skill-tag` — pill badge with accent-tinted background and border

**Awards strip:**
- `.awards-strip` — flex row, wraps on mobile
- `.award-strip-item` — card with icon + title + description

## Architecture Notes

All pages share the same vendor JS/CSS stack and the single `assets/js/main.js`. Swiper is still loaded via vendor files but is no longer used on `index.html` (it was removed from the Awards section). Swiper is still available if needed on sub-pages.

Navigation on `index.html` uses anchor links (`#hero`, `#about`, etc.) with scroll-spy driven by `main.js`. The nav includes: Home, About, Education, Experience, Skills, Awards, Contact, Resume (PDF), Papers & Posters (external page), Certificates (external page).

Sub-pages (`papers-posters.html`, `certificate.html`) have their own nav pointing back to `index.html` and their own anchor sections.

The accent color (`--accent-color` in `assets/css/main.css`) propagates everywhere (buttons, links, icons, skill tag borders). Changing it in the `:root` block updates the entire site color scheme.

New content pages should follow the pattern in `certificate.html`: same vendor includes, same header/footer structure, page-specific styles in a `<style>` block or a new CSS file under `assets/css/`.
