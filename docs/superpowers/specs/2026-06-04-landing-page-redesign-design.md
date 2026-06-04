---
name: landing-page-redesign
description: Redesign index.html to be minimal and industry-focused, targeting agentic AI / ML engineering roles. Reduces text, restructures sections, adds AIMS internship.
metadata:
  type: project
---

# Landing Page Redesign — Design Spec

**Date:** 2026-06-04  
**Goal:** Make the landing page clean, minimal, and optimized for industry recruiters (agentic AI / ML engineering roles). Remove prose-heavy sections, replace verbose cards with scannable tags, and add the new AIMS Technologies internship.

---

## Primary Audience

Industry recruiters and hiring managers for roles in:
- Agentic AI engineering
- Applied ML / ML engineering
- Computer vision / AI research

Academic visitors are secondary. Full academic detail lives in the resume PDF and papers-posters.html.

---

## Page Structure (final)

| # | Section | Status vs. current |
|---|---------|-------------------|
| 1 | Hero | Keep — update typed items order |
| 2 | About | Rewrite — 3 sentences only |
| 3 | Education | Rewrite — compact 3-row table, no coursework |
| 4 | Experience | Rewrite — 3 roles, 2–3 bullets each, AIMS at top |
| 5 | Skills | Rewrite — tag-row groups, no cards/paragraphs |
| 6 | Awards | Rewrite — 2-item static strip, remove carousel |
| 7 | Contact | Trim — email + LinkedIn only, remove address/phone |

**Removed from landing page:** Research section (5 cards), Professional Service section. Both are accessible via nav (papers-posters.html) or resume PDF.

---

## Section Specs

### 1. Hero

No structural changes. Update `data-typed-items` to lead with industry-relevant titles:

```
"Agentic AI Engineer, ML Engineer, Computer Vision Engineer, Senior Scientist, AI Researcher, Data Scientist"
```

### 2. About

Replace current 3-paragraph block with:

> PhD Candidate in Computer Engineering at UT Dallas, building AI systems at the intersection of agentic AI, computer vision, and healthcare analytics. I design multi-agent pipelines, RAG systems, and vision-language workflows that solve real clinical and industry problems. Currently seeking industry roles in agentic AI engineering and applied ML.

Profile photo stays. Remove `.fst-italic` empty paragraph and the two `<div class="row">` prose blocks.

### 3. Education

Replace three `education-item` blocks with a single compact table. One row per degree, no coursework, no thesis title.

| Degree | Institution | Year | GPA | Note |
|--------|------------|------|-----|------|
| PhD, Computer Engineering | UT Dallas, USA | 2022–Present | 3.94 / 4.00 | |
| MS, Computer Science | Shahid Bahonar University, Iran | 2015 | 3.60 / 4.00 | |
| BS, Computer Science | Shahid Bahonar University, Iran | 2012 | 3.46 / 4.00 | Ranked 1st in dept. |

Style: plain Bootstrap table inside the existing section container. Keep `data-aos="fade-up"`.

### 4. Experience

Three roles, newest first, 2–3 bullets each.

**Senior Scientist Intern — AIMS Technologies** *(May 2026 – Aug 2026)*
- Conducting R&D on an agentic AI system that analyzes runner video and performance records to deliver data-driven insights for athletes and coaches.
- Designing and implementing a multi-agent system that generates personalized training plans from video analysis, biomechanical data, and historical performance records.

**Graduate Research Assistant — UT Dallas** *(Spring 2023 – Present)*
- Built agentic AI systems: multi-agent pipelines, RAG, and LangChain/LangGraph orchestration for clinical data structuring into FHIR-compliant formats.
- Designed video-based patient monitoring using YOLO, MediaPipe, and multi-camera 3D localization — no wearables required.
- Deployed cloud-connected AI workflows on AWS (EC2, S3, Lambda, API Gateway).

**Teaching Assistant — UT Dallas** *(5 semesters)*
- Supported lab sessions and student learning for two core ECE courses.

Remove the Shahid Bahonar RA role from the landing page (keep in resume PDF).

### 5. Skills

Replace 8 card-with-paragraph blocks with tag-row groups. Five groups, each rendered as a label + flex-wrap tag list:

| Group | Tags |
|-------|------|
| Agentic AI & LLMs | LangChain, LangGraph, RAG, Multi-Agent Systems, Prompt Engineering, Tool Use, n8n, Open-Weight LLMs |
| Computer Vision | YOLO, MediaPipe, OpenCV, Object Detection, Multi-Camera Tracking, 3D Localization, Stereo Vision |
| ML Engineering | PyTorch, scikit-learn, Random Forest, SVM, Feature Engineering, Model Deployment, Hyperparameter Tuning |
| Programming | Python, Java, C/C++, JavaScript, Flask, SQL, Bash |
| Cloud & Infra | AWS EC2, S3, Lambda, API Gateway, Cloud Deployment |

Style: group label in accent color, tags as small pill badges (Bootstrap `badge` or custom). No `.service-item` cards.

### 6. Awards

Replace Swiper carousel with a static 2-item strip. Side by side on desktop, stacked on mobile.

**Item 1:**
- Icon: `bi-award-fill`
- Title: Best Paper Award
- Detail: IEEE International Conference on Healthcare Informatics (ICHI 2025)

**Item 2:**
- Icon: `bi-patch-check-fill`
- Title: ECE Doctoral Excellence Award
- Detail: UT Dallas, Spring 2026

Remove all Swiper markup, swiper-config JSON, and award images from this section. Remove Swiper JS init dependency (Swiper vendor files can stay — they're used by nothing else, but don't remove vendor files).

### 7. Contact

Keep only:
- Email: mostafa.habibi6010@gmail.com and mostafa.habibidehsheikhi@utdallas.edu
- LinkedIn link

Remove: physical address (800 W Campbell Rd), phone number (+1 214 928 0535). These are private and unnecessary on a public portfolio page.

---

## Navigation

Update `#navmenu` to remove the `#research` and `#service` anchor links (those sections no longer exist on the page). Keep all external page links (Papers & Posters, Certificates, Resume PDF).

Updated nav order:
```
Home | About | Education | Experience | Skills | Awards | Contact | Resume | Papers & Posters | Certificates
```

---

## What Is NOT Changed

- Hero background image, social links, Typed.js animation (except item order)
- Vendor CSS/JS files — do not touch
- `papers-posters.html` — no changes
- `certificate.html` — no changes
- `assets/css/main.css` — may need minor additions for tag-pill styles and education table; no existing rules removed
- Footer — no changes

---

## Out of Scope

- Contact form (already commented out — leave as-is)
- Dark mode, color scheme changes
- New pages beyond what already exists
- Any changes to vendor libraries
