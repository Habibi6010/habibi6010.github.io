# Portfolio Redesign — Design Spec

**Date:** 2026-05-23  
**Author:** Mostafa Habibi  
**Goal:** Make the personal academic portfolio site professional for both academic and industry audiences.

---

## Context

The site is a static Bootstrap 5 portfolio (BootstrapMade MyResume template) deployed on GitHub Pages. It currently has three pages: `index.html`, `papers-posters.html`, `certificate.html`. The resume (`resume.tex`) contains rich content — Education, Experience, Professional Service, full publication citations — that is absent from the website.

---

## Decisions

| Decision | Choice |
|----------|--------|
| Primary audience | Both academic and industry |
| New sections on main page | Education + Experience + Research Focus + Professional Service |
| Paper citation style | Full academic citation (author list + venue + year) |
| Paper ordering | Latest first; Under Review papers keep `#` links |
| Navigation approach | Expand single-page nav on `index.html` |

---

## Changes to `index.html`

### Fix global metadata
- `<title>` → `Mostafa Habibi — PhD Candidate, Computer Engineering`
- `<meta name="description">` → relevant academic description

### New nav items (in order)
Home · About · Research · Education · Experience · Skills · Awards · Service · Contact | Resume | Papers/Posters | Certificates

### New section order (after existing Hero + About)

1. **Research Focus** *(new, after About)*
2. **Education** *(new, after Research Focus)*
3. **Experience** *(new, after Education)*
4. Skills *(existing — keep)*
5. Awards *(existing — keep)*
6. **Professional Service** *(new, after Awards)*
7. Contact *(existing — keep)*

---

## New Section Specs

### Research Focus
- Use existing `service-item` card style (colored left border, icon)
- 5 cards in a responsive grid (3+2 on desktop, stacking on mobile)
- Section title: "Research"
- Section subtitle: one-line description of research identity
- Card content (descriptive paragraphs, not keyword lists):

  **Healthcare AI & Patient Monitoring**  
  Designing AI-powered video-based monitoring systems for clinical environments. Research covers posture recognition, ambulation assessment, human–object interaction (HOI) detection, and behavioral analysis using multi-camera setups, 3D localization, and stereo vision. Systems integrate YOLO, MediaPipe, and monocular depth estimation to generate structured behavioral reports for caregivers — without wearables or manual annotation.

  **Computer Vision & Image Understanding**  
  Building end-to-end computer vision pipelines for detection, tracking, and scene understanding under real-world conditions. Areas include object detection in low-light environments (illumination-aware architectures), multi-camera tracking with epipolar geometry and triangulation, stereo vision, image enhancement, and deep learning-based feature reconstruction for MRI synthesis.

  **Agentic AI, RAG & Multi-Agent Systems**  
  Designing and implementing agentic AI systems where autonomous agents reason, plan, and act to complete complex tasks. Work includes Retrieval-Augmented Generation (RAG) pipelines that ground LLM outputs in domain-specific knowledge bases, multi-agent architectures with specialized roles (planner, extractor, auditor, formatter agents), structured data extraction from unstructured clinical narratives into FHIR-compliant formats, tool-calling workflows, and orchestration using LangChain, LangGraph, and n8n. Focus is on reliability, auditability, and schema-adaptive extraction at scale.

  **ML Engineering & Model Development**  
  End-to-end machine learning engineering: dataset design, feature engineering, model selection and training (PyTorch, scikit-learn), hyperparameter optimization, evaluation and benchmarking, and deployment. Covers classical ML (Random Forest, SVM, ART2 clustering, PCA) alongside deep learning architectures (YOLO, 3D U-Net, CNNs). Cloud deployment via AWS EC2, S3, Lambda, and API Gateway. Emphasis on reproducible experiments, model interpretability, and production-ready pipelines.

  **Sports Analytics & Kinematic Analysis**  
  Applying AI to athletic performance analysis. Includes running posture classification from video using MediaPipe landmark extraction, kinematic feature engineering (joint angles, stride frequency via FFT), performance ranking with ART2 neural clustering, and longitudinal trend analysis. Designed to give coaches quantitative, data-driven insights into technique and competitive trajectory.

### Education
- Timeline/card layout (one card per degree)
- Each card shows: degree title, institution, location, date, GPA, and key highlights
- Degrees:
  - PhD Computer Engineering — The University of Texas at Dallas, Richardson TX | GPA: 3.94/4.00 | Research: AI-powered video monitoring, computer vision, Agentic AI, healthcare analytics | Relevant Coursework: Database Design, Virtual Reality, Machine Learning and Pattern Recognition, Computer Vision
  - MS Computer Science — Shahid Bahonar University, Kerman, Iran | Aug 2015 | GPA: 3.60/4.00 | Thesis: Bee-Hopnet Routing Algorithm in Mobile Ad Hoc Networks (MANETs)
  - BS Computer Science — Shahid Bahonar University, Kerman, Iran | Aug 2012 | GPA: 3.46/4.00 | Ranked 1st in the Computer Science Department | Achieved 4th place, ACM Programming Competition, 2011
- Section AOS animation: fade-up on each card

### Experience
- Timeline style with vertical line (standard for resume sites)
- Each entry: role title, institution, date range, bullet list
- Entries:
  1. **Graduate Research Assistant** — UTD, Richardson TX | Spring 2023–Present
     - Led AI-driven healthcare monitoring (YOLO, MediaPipe, Random Forest, multi-camera 3D)
     - Developed scalable vision-language systems combining CV outputs with LLM summarization
     - Designed dual-camera behavioral assessment platform (YOLO, DeepFace, SIFT, epipolar geometry, triangulation)
     - Built agentic AI platform for converting unstructured clinical notes to FHIR-compliant structured data
     - Implemented LLM/multi-agent orchestration pipelines with LangChain and LangGraph
     - Developed AI-based sports analytics (posture classification, kinematic analysis, ART2 clustering)
     - Conducted ML/DL research in low-light object detection, MRI radiogenomic classification
     - Built cloud-connected AI workflows on AWS (EC2, S3, Lambda, API Gateway)
  2. **Teaching Assistant** — UTD, Richardson TX | 5 Semesters
     - Courses: *Introduction to Electrical and Computer Engineering*, *Introduction to Digital Systems*
     - Lab support, grading, office hours, assignment guidance, technical troubleshooting
  3. **Research Assistant** — Shahid Bahonar University, Kerman, Iran | Aug 2013–Aug 2015
     - Research in MANETs, routing algorithms, intelligent systems
     - Fully funded by Ministry of Science, Research, and Technology

### Professional Service
- Simple card or list with icons
- Two sub-groups:
  - **Memberships:** IEEE · IEEE Young Professionals · IEEE Engineering in Medicine and Biology Society (EMBS)
  - **Reviewer:** IEEE Southwest Symposium on Image Analysis and Interpretation (SSIAI) · IEEE-EMBS International Conference on Biomedical and Health Informatics (BHI)
- Use `bi-award` / `bi-journal-check` icons

---

## Changes to `papers-posters.html`

### Citation style
Each paper card adds a citation line directly below the title:
```
M. Habibi, M. Nourani, [...] — IEEE VENUE, LOCATION, YEAR
```
- Bold the first author (Mostafa Habibi) in each citation
- Papers with `(Best Paper Award)` keep the badge
- Papers under review: add `(Under Review)` or `(Accepted)` badge; keep Paper Page button with `#`

### Paper ordering (latest first)
1. Agentic AI to Augment Unstructured Data — IEEE JBHI 2026 (Under Review)
2. Reconstruction of T1-Weighted CE-MRI — IEEE EMBC 2026 (Under Review)
3. Scalable Dual-Camera Platform — IEEE ICHI 2026 (Accepted)
4. Illumination-Aware Object Detection — IEEE SSIAI 2026
5. AI-Based Performance Analysis for Track Athletes — IEEE EMBC 2025
6. Video-Based HOI Analysis — IEEE ICHI 2025 *(Best Paper Award)*
7. Utilizing Generative AI for Patient Behavioral Assessment — IEEE DCAS 2025
8. AI-Driven Camera-Based Platform for Patient Ambulation — IEEE EMBC 2024
9. AI-Based Kinematic Analysis for Track Athletes — IEEE SMARTCOMP 2024
10. Classification Method using ML + MCDM — 2022 (Farsi)
11. Improved HOPNET Routing (Bee-HOPNET) — 2015 (Farsi)

---

## Changes to `certificate.html`

- Fix empty social links in the footer (currently `href=""`) — replace with correct profile URLs matching the rest of the site

---

## Changes to Skills section (`index.html`)

The existing Skills section has 8 cards. Two cards need richer descriptions (not keyword lists):

**LLM & Agentic AI Systems card** — replace current text with:  
"Building intelligent agentic systems that combine large language models with structured reasoning and tool use. This includes designing RAG pipelines that retrieve domain-specific knowledge to ground model outputs, orchestrating multi-agent workflows where specialized agents handle planning, extraction, auditing, and formatting, and implementing automation pipelines using LangChain, LangGraph, and n8n. Focus areas include prompt engineering for reliability, structured data extraction, and scalable agentic architectures for real-world deployment."

**AI, Machine Learning & Computer Vision card** — add ML engineering context:  
Append to existing description: "…and end-to-end ML engineering covering model development, training pipeline design, evaluation, optimization, and cloud deployment."

---

## Out of Scope

- No new pages beyond the existing three
- No server-side contact form (currently commented out — leave as-is)
- No changes to `assets/vendor/` libraries
- No changes to `assets/js/main.js` beyond what's needed for new sections
