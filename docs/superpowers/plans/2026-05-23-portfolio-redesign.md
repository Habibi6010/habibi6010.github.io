# Portfolio Professional Redesign — Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Add Research Focus, Education, Experience, and Professional Service sections to `index.html`; add full academic citations to `papers-posters.html`; fix footer links in `certificate.html`.

**Architecture:** All changes touch three static HTML files (`index.html`, `papers-posters.html`, `certificate.html`) and one CSS file (`assets/css/main.css`). The existing `main.js` handles scroll-spy, AOS animations, and nav toggling automatically for any new section with the correct `id` and Bootstrap structure — no JS changes needed.

**Tech Stack:** HTML5, Bootstrap 5.3.3, Bootstrap Icons, AOS (animate-on-scroll via `data-aos` attributes), CSS custom properties defined in `:root` in `assets/css/main.css`

**Spec:** `docs/superpowers/specs/2026-05-23-portfolio-redesign-design.md`

---

## File Map

| File | Change |
|------|--------|
| `index.html` | Fix title/meta; expand nav; insert 4 new sections (Research, Education, Experience, Professional Service); update 2 Skills cards |
| `assets/css/main.css` | Append CSS for Education, Experience, Professional Service, and paper citation styles |
| `papers-posters.html` | Add author citations, status badges, fix Bee-HOPNET date (2015→2019) |
| `certificate.html` | Fix empty `href=""` social links in footer |
| `.gitignore` | Add `.superpowers/` entry |

---

## Task 1: Fix page metadata and navigation

**Files:**
- Modify: `index.html`

- [ ] **Step 1: Fix the page `<title>`**

  Find (line ~6):
  ```html
  <title>Index - MyResume Bootstrap Template</title>
  ```
  Replace with:
  ```html
  <title>Mostafa Habibi — PhD Candidate, Computer Engineering</title>
  ```

- [ ] **Step 2: Fix the meta description**

  Find:
  ```html
  <meta content="" name="description">
  ```
  Replace with:
  ```html
  <meta content="Mostafa Habibi — PhD Candidate in Computer Engineering at UT Dallas. Research in AI, computer vision, agentic AI systems, and healthcare analytics." name="description">
  ```

- [ ] **Step 3: Replace the entire nav `<ul>` block**

  Find the `<ul>` inside `<nav id="navmenu" class="navmenu">` and replace it entirely with:
  ```html
      <ul>
        <li><a href="#hero" class="active"><i class="bi bi-house navicon"></i><span>Home</span></a></li>
        <li><a href="#about"><i class="bi bi-person navicon"></i><span>About</span></a></li>
        <li><a href="#research"><i class="bi bi-search navicon"></i><span>Research</span></a></li>
        <li><a href="#education"><i class="bi bi-mortarboard navicon"></i><span>Education</span></a></li>
        <li><a href="#experience"><i class="bi bi-briefcase navicon"></i><span>Experience</span></a></li>
        <li><a href="#skills"><i class="bi bi-hdd-stack navicon"></i><span>Skills</span></a></li>
        <li><a href="#awards"><i class="bi bi-trophy navicon"></i><span>Awards</span></a></li>
        <li><a href="#service"><i class="bi bi-people navicon"></i><span>Service</span></a></li>
        <li><a href="#contact"><i class="bi bi-envelope navicon"></i><span>Contact</span></a></li>
        <li><a href="assets/resume/Resume.pdf" target="_blank" rel="noopener noreferrer"><i class="bi bi-file-earmark-text navicon"></i><span>Resume</span></a></li>
        <li><a href="papers-posters.html#papers"><i class="bi bi-journal-text navicon"></i><span>Papers &amp; Posters</span></a></li>
        <li><a href="certificate.html"><i class="bi bi-award navicon"></i><span>Certificates</span></a></li>
      </ul>
  ```

- [ ] **Step 4: Verify in browser**

  Open `index.html` in a browser. Check:
  - Browser tab shows "Mostafa Habibi — PhD Candidate, Computer Engineering"
  - Left sidebar nav shows 12 items including Research, Education, Experience, Service

- [ ] **Step 5: Commit**
  ```bash
  git add index.html
  git commit -m "Fix page title, meta description, and expand nav to 12 items"
  ```

---

## Task 2: Add Research Focus section

**Files:**
- Modify: `index.html` (insert section after About)
- Modify: `assets/css/main.css` (append)

- [ ] **Step 1: Add CSS for Research section**

  Append to the very end of `assets/css/main.css`:
  ```css
  /*--------------------------------------------------------------
  # Research Section
  --------------------------------------------------------------*/
  .research .service-item p {
    font-size: 0.93rem;
    line-height: 1.65;
  }
  ```

- [ ] **Step 2: Insert Research section HTML**

  In `index.html`, find the line:
  ```html
  </section><!-- /About Section -->
  ```
  Insert the following block immediately after it:

  ```html
    <!-- Research Section -->
    <section id="research" class="research section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Research</h2>
        <p>Developing intelligent AI systems at the intersection of computer vision, agentic AI, and healthcare analytics.</p>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item item-cyan position-relative">
              <h3>Healthcare AI &amp; Patient Monitoring</h3>
              <p>Designing AI-powered video-based monitoring systems for clinical environments. Research covers posture recognition, ambulation assessment, human–object interaction (HOI) detection, and behavioral analysis using multi-camera setups, 3D localization, and stereo vision. Systems integrate YOLO, MediaPipe, and monocular depth estimation to generate structured behavioral reports for caregivers — without wearables or manual annotation.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item item-orange position-relative">
              <h3>Computer Vision &amp; Image Understanding</h3>
              <p>Building end-to-end computer vision pipelines for detection, tracking, and scene understanding under real-world conditions. Areas include object detection in low-light environments using illumination-aware architectures, multi-camera tracking with epipolar geometry and triangulation, stereo vision, image enhancement, and deep learning-based feature reconstruction for MRI synthesis.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item item-teal position-relative">
              <h3>Agentic AI, RAG &amp; Multi-Agent Systems</h3>
              <p>Designing and implementing agentic AI systems where autonomous agents reason, plan, and act to complete complex tasks. Work includes Retrieval-Augmented Generation (RAG) pipelines that ground LLM outputs in domain-specific knowledge bases, multi-agent architectures with specialized roles (planner, extractor, auditor, formatter agents), structured data extraction from unstructured clinical narratives into FHIR-compliant formats, tool-calling workflows, and orchestration using LangChain, LangGraph, and n8n.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item item-red position-relative">
              <h3>ML Engineering &amp; Model Development</h3>
              <p>End-to-end machine learning engineering: dataset design, feature engineering, model selection and training (PyTorch, scikit-learn), hyperparameter optimization, evaluation and benchmarking, and cloud deployment. Covers classical ML (Random Forest, SVM, ART2 clustering, PCA) alongside deep learning architectures (YOLO, 3D U-Net, CNNs). Deployed on AWS EC2, S3, Lambda, and API Gateway. Emphasis on reproducible experiments, model interpretability, and production-ready pipelines.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item item-indigo position-relative">
              <h3>Sports Analytics &amp; Kinematic Analysis</h3>
              <p>Applying AI to athletic performance analysis. Includes running posture classification from video using MediaPipe landmark extraction, kinematic feature engineering (joint angles, stride frequency via FFT), performance ranking with ART2 neural clustering, and longitudinal trend analysis. Designed to give coaches quantitative, data-driven insights into technique and competitive trajectory.</p>
            </div>
          </div><!-- End Service Item -->

        </div>
      </div>

    </section><!-- /Research Section -->
  ```

- [ ] **Step 3: Verify in browser**

  Open `index.html`. Scroll past About. Check:
  - "Research" section visible with grey background
  - 5 cards: 3 in top row, 2 in bottom row on desktop
  - Cards animate in on scroll (AOS)
  - Clicking "Research" in sidebar scrolls to the section

- [ ] **Step 4: Commit**
  ```bash
  git add index.html assets/css/main.css
  git commit -m "Add Research Focus section with 5 descriptive cards"
  ```

---

## Task 3: Add Education section

**Files:**
- Modify: `index.html` (insert after Research section)
- Modify: `assets/css/main.css` (append)

- [ ] **Step 1: Add Education CSS**

  Append to the end of `assets/css/main.css`:
  ```css
  /*--------------------------------------------------------------
  # Education Section
  --------------------------------------------------------------*/
  .education .education-item {
    background: var(--surface-color);
    border-radius: 10px;
    padding: 24px 28px;
    margin-bottom: 24px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.06);
    border-left: 4px solid var(--accent-color);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .education .education-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 25px rgba(0, 0, 0, 0.1);
  }

  .education .education-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 14px;
  }

  .education .education-header h3 {
    font-size: 1.15rem;
    margin-bottom: 4px;
    color: var(--heading-color);
  }

  .education .institution {
    display: block;
    color: var(--accent-color);
    font-size: 0.94rem;
    font-weight: 500;
  }

  .education .education-meta {
    text-align: right;
    flex-shrink: 0;
  }

  .education .edu-date {
    display: block;
    font-weight: 600;
    color: var(--heading-color);
    font-size: 0.9rem;
  }

  .education .edu-gpa {
    display: block;
    color: #666;
    font-size: 0.88rem;
    margin-top: 4px;
  }

  .education .education-body p {
    margin-bottom: 6px;
    font-size: 0.94rem;
    color: var(--default-color);
    line-height: 1.6;
  }

  @media (max-width: 576px) {
    .education .education-header {
      flex-direction: column;
    }
    .education .education-meta {
      text-align: left;
    }
  }
  ```

- [ ] **Step 2: Insert Education section HTML**

  In `index.html`, find:
  ```html
  </section><!-- /Research Section -->
  ```
  Insert the following block immediately after it:

  ```html
    <!-- Education Section -->
    <section id="education" class="education section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Education</h2>
        <p>Academic background in computer science and computer engineering with a focus on AI and intelligent systems.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="education-item" data-aos="fade-up" data-aos-delay="100">
          <div class="education-header">
            <div>
              <h3>Ph.D. Candidate, Computer Engineering</h3>
              <span class="institution">The University of Texas at Dallas, Richardson, TX, USA</span>
            </div>
            <div class="education-meta">
              <span class="edu-date">2022 – Present</span>
              <span class="edu-gpa">GPA: 3.94 / 4.00</span>
            </div>
          </div>
          <div class="education-body">
            <p><strong>Research:</strong> AI-powered video monitoring, computer vision, agentic AI, and healthcare analytics.</p>
            <p><strong>Relevant Coursework:</strong> Database Design, Virtual Reality, Machine Learning and Pattern Recognition, Computer Vision.</p>
          </div>
        </div><!-- End Education Item -->

        <div class="education-item" data-aos="fade-up" data-aos-delay="200">
          <div class="education-header">
            <div>
              <h3>Master of Science, Computer Science</h3>
              <span class="institution">Shahid Bahonar University, Kerman, Iran</span>
            </div>
            <div class="education-meta">
              <span class="edu-date">Aug 2015</span>
              <span class="edu-gpa">GPA: 3.60 / 4.00</span>
            </div>
          </div>
          <div class="education-body">
            <p><strong>Thesis:</strong> Bee-Hopnet Routing Algorithm in Mobile Ad Hoc Networks (MANETs).</p>
            <p><strong>Relevant Coursework:</strong> Advanced AI, Image Processing, Machine Learning, Logic Programming, Issues in Smart Systems, Theory of Computer Sciences.</p>
          </div>
        </div><!-- End Education Item -->

        <div class="education-item" data-aos="fade-up" data-aos-delay="300">
          <div class="education-header">
            <div>
              <h3>Bachelor of Science, Computer Science</h3>
              <span class="institution">Shahid Bahonar University, Kerman, Iran</span>
            </div>
            <div class="education-meta">
              <span class="edu-date">Aug 2012</span>
              <span class="edu-gpa">GPA: 3.46 / 4.00</span>
            </div>
          </div>
          <div class="education-body">
            <p><i class="bi bi-star-fill text-warning me-1"></i> Ranked 1st in the Computer Science Department.</p>
            <p><i class="bi bi-trophy me-1" style="color: var(--accent-color);"></i> Achieved 4th place in the ACM Programming Competition, Shahid Beheshti University, Tehran, 2011.</p>
          </div>
        </div><!-- End Education Item -->

      </div>

    </section><!-- /Education Section -->
  ```

- [ ] **Step 3: Verify in browser**

  Open `index.html`. Scroll past Research. Check:
  - "Education" section visible with white background
  - 3 cards with blue left border, degree title, institution in accent color, GPA right-aligned
  - BS card shows the star/trophy highlights
  - Hover lifts card slightly
  - On mobile (resize to <576px): meta date/GPA moves below institution

- [ ] **Step 4: Commit**
  ```bash
  git add index.html assets/css/main.css
  git commit -m "Add Education section with PhD/MS/BS degree cards"
  ```

---

## Task 4: Add Experience section

**Files:**
- Modify: `index.html` (insert after Education section)
- Modify: `assets/css/main.css` (append)

- [ ] **Step 1: Add Experience CSS**

  Append to the end of `assets/css/main.css`:
  ```css
  /*--------------------------------------------------------------
  # Experience Section
  --------------------------------------------------------------*/
  .experience .experience-item {
    background: var(--surface-color);
    border-radius: 10px;
    padding: 24px 28px;
    margin-bottom: 24px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.06);
    border-left: 4px solid var(--accent-color);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .experience .experience-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 25px rgba(0, 0, 0, 0.1);
  }

  .experience .experience-header {
    margin-bottom: 14px;
  }

  .experience .experience-header h3 {
    font-size: 1.15rem;
    margin-bottom: 8px;
    color: var(--heading-color);
  }

  .experience .exp-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
  }

  .experience .exp-org {
    font-size: 0.92rem;
    color: var(--accent-color);
    font-weight: 500;
  }

  .experience .exp-period {
    font-size: 0.92rem;
    color: #666;
  }

  .experience .experience-item ul {
    margin: 0;
    padding-left: 18px;
  }

  .experience .experience-item ul li {
    margin-bottom: 8px;
    font-size: 0.94rem;
    color: var(--default-color);
    line-height: 1.65;
  }
  ```

- [ ] **Step 2: Insert Experience section HTML**

  In `index.html`, find:
  ```html
  </section><!-- /Education Section -->
  ```
  Insert immediately after it:

  ```html
    <!-- Experience Section -->
    <section id="experience" class="experience section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Experience</h2>
        <p>Research and academic experience building AI systems for healthcare, computer vision, and intelligent automation.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="experience-item" data-aos="fade-up" data-aos-delay="100">
          <div class="experience-header">
            <h3>Graduate Research Assistant</h3>
            <div class="exp-meta">
              <span class="exp-org"><i class="bi bi-building me-1"></i>University of Texas at Dallas, Richardson, TX</span>
              <span class="exp-period"><i class="bi bi-calendar3 me-1"></i>Spring 2023 – Present</span>
            </div>
          </div>
          <ul>
            <li>Led AI-driven healthcare monitoring projects for patient ambulation assessment, posture recognition, behavioral analysis, and human–object interaction using YOLO, MediaPipe, Random Forest, monocular depth estimation, and multi-camera 3D localization.</li>
            <li>Developed scalable vision-language systems that combine computer vision outputs with LLM-based summarization to generate clinically relevant patient behavior reports for caregivers.</li>
            <li>Designed a dual-camera behavioral assessment platform integrating YOLO, DeepFace, SIFT-based matching, epipolar geometry, and triangulation for robust tracking and interaction analysis in healthcare environments.</li>
            <li>Built an agentic AI platform for converting unstructured clinical notes into standardized, queryable, FHIR-compliant structured data using multi-agent workflows, adaptive auditing, schema evolution, and locally deployed open-weight LLMs.</li>
            <li>Implemented LLM and multi-agent orchestration pipelines using LangChain and LangGraph for schema discovery, extraction, auditing, and structured information conversion.</li>
            <li>Developed AI-based sports analytics for runner posture classification, kinematic analysis, and performance ranking using MediaPipe, feature engineering, Random Forest, PCA, FFT-based trend analysis, and ART2 clustering.</li>
            <li>Conducted ML and deep learning research in low-light object detection, MRI-based radiogenomic classification, and contrast-free feature reconstruction.</li>
            <li>Built cloud-connected AI workflows using AWS EC2, S3, Lambda, and API Gateway for storage, processing, deployment, and application integration.</li>
          </ul>
        </div><!-- End Experience Item -->

        <div class="experience-item" data-aos="fade-up" data-aos-delay="200">
          <div class="experience-header">
            <h3>Teaching Assistant</h3>
            <div class="exp-meta">
              <span class="exp-org"><i class="bi bi-building me-1"></i>University of Texas at Dallas, Richardson, TX</span>
              <span class="exp-period"><i class="bi bi-calendar3 me-1"></i>5 Semesters</span>
            </div>
          </div>
          <ul>
            <li>Assisted with <em>Introduction to Electrical and Computer Engineering</em> and <em>Introduction to Digital Systems</em> through lab support, grading, office hours, assignment guidance, and technical troubleshooting.</li>
            <li>Helped students understand core engineering and programming concepts, solve implementation issues, and complete coursework successfully.</li>
          </ul>
        </div><!-- End Experience Item -->

        <div class="experience-item" data-aos="fade-up" data-aos-delay="300">
          <div class="experience-header">
            <h3>Research Assistant</h3>
            <div class="exp-meta">
              <span class="exp-org"><i class="bi bi-building me-1"></i>Shahid Bahonar University, Kerman, Iran</span>
              <span class="exp-period"><i class="bi bi-calendar3 me-1"></i>Aug 2013 – Aug 2015</span>
            </div>
          </div>
          <ul>
            <li>Conducted research in computer science focused on mobile ad hoc networks (MANETs), routing algorithms, and intelligent systems.</li>
            <li>Fully funded by the Ministry of Science, Research, and Technology.</li>
          </ul>
        </div><!-- End Experience Item -->

      </div>

    </section><!-- /Experience Section -->
  ```

- [ ] **Step 3: Verify in browser**

  Open `index.html`. Scroll past Education. Check:
  - "Experience" section visible on grey background
  - Graduate RA card has 8 bullet points
  - Institution shown in accent color, date in grey
  - Hover lifts card

- [ ] **Step 4: Commit**
  ```bash
  git add index.html assets/css/main.css
  git commit -m "Add Experience section with three role entries"
  ```

---

## Task 5: Update Skills section card descriptions

**Files:**
- Modify: `index.html`

- [ ] **Step 1: Update "LLM & Agentic AI Systems" card**

  In `index.html`, find this exact `<p>` inside the Skills section (the one after `<h3>LLM &amp; Agentic AI Systems</h3>`):
  ```html
              <p>Large Language Models (LLMs), Retrieval-Augmented Generation (RAG), Agentic AI, Multi-Agent Systems, Prompt Engineering, Structured Data Extraction, Workflow Automation, Tool Calling, LangChain, LangGraph, and n8n.</p>
  ```
  Replace with:
  ```html
              <p>Building intelligent agentic systems that combine large language models with structured reasoning and tool use. Includes designing RAG pipelines that retrieve domain-specific knowledge to ground model outputs, orchestrating multi-agent workflows where specialized agents handle planning, extraction, auditing, and formatting, and implementing automation pipelines with LangChain, LangGraph, and n8n. Focus areas include prompt engineering for reliability, structured data extraction, and scalable agentic architectures for real-world deployment.</p>
  ```

- [ ] **Step 2: Update "AI, Machine Learning & Computer Vision" card**

  Find the `<p>` inside the card after `<h3>AI, Machine Learning &amp; Computer Vision</h3>`:
  ```html
              <p>Computer Vision, Deep Learning, Machine Learning, Object Detection, Image Enhancement, Low-Light Vision, Posture Classification, Activity Recognition, Human-Object Interaction Detection, 3D Localization, Stereo Vision, Multi-Camera Tracking, and Vision-Language Systems.</p>
  ```
  Replace with:
  ```html
              <p>Computer Vision, Deep Learning, Machine Learning, Object Detection, Image Enhancement, Low-Light Vision, Posture Classification, Activity Recognition, Human-Object Interaction Detection, 3D Localization, Stereo Vision, Multi-Camera Tracking, Vision-Language Systems, and end-to-end ML engineering covering model development, training pipeline design, evaluation, optimization, and cloud deployment.</p>
  ```

- [ ] **Step 3: Verify in browser**

  Scroll to Skills section. Check the two updated cards show expanded text (not keyword lists).

- [ ] **Step 4: Commit**
  ```bash
  git add index.html
  git commit -m "Expand LLM/Agentic and ML Engineering skill card descriptions"
  ```

---

## Task 6: Add Professional Service section

**Files:**
- Modify: `index.html` (insert after Awards section)
- Modify: `assets/css/main.css` (append)

- [ ] **Step 1: Add Professional Service CSS**

  Append to the end of `assets/css/main.css`:
  ```css
  /*--------------------------------------------------------------
  # Professional Service Section
  --------------------------------------------------------------*/
  .prof-service .service-card {
    background: var(--surface-color);
    border-radius: 10px;
    padding: 28px;
    height: 100%;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.06);
    border-top: 4px solid var(--accent-color);
  }

  .prof-service .service-card h4 {
    font-size: 1.05rem;
    color: var(--heading-color);
    margin-bottom: 16px;
    font-weight: 600;
  }

  .prof-service .service-card ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .prof-service .service-card ul li {
    font-size: 0.94rem;
    padding: 8px 0;
    color: var(--default-color);
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    line-height: 1.5;
  }

  .prof-service .service-card ul li:last-child {
    border-bottom: none;
  }
  ```

- [ ] **Step 2: Insert Professional Service section HTML**

  In `index.html`, find:
  ```html
  </section><!-- /Awards Section -->
  ```
  Insert immediately after it:

  ```html
    <!-- Professional Service Section -->
    <section id="service" class="prof-service section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Professional Service</h2>
        <p>Active contributor to the IEEE research community through membership and peer review.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 justify-content-center">

          <div class="col-lg-5 col-md-6">
            <div class="service-card">
              <h4><i class="bi bi-people-fill me-2" style="color: var(--accent-color);"></i>Memberships</h4>
              <ul>
                <li><i class="bi bi-check2-circle me-2" style="color: var(--accent-color);"></i>IEEE</li>
                <li><i class="bi bi-check2-circle me-2" style="color: var(--accent-color);"></i>IEEE Young Professionals</li>
                <li><i class="bi bi-check2-circle me-2" style="color: var(--accent-color);"></i>IEEE Engineering in Medicine and Biology Society (EMBS)</li>
              </ul>
            </div>
          </div>

          <div class="col-lg-5 col-md-6">
            <div class="service-card">
              <h4><i class="bi bi-journal-check me-2" style="color: var(--accent-color);"></i>Reviewer</h4>
              <ul>
                <li><i class="bi bi-check2-circle me-2" style="color: var(--accent-color);"></i>IEEE Southwest Symposium on Image Analysis and Interpretation (SSIAI)</li>
                <li><i class="bi bi-check2-circle me-2" style="color: var(--accent-color);"></i>IEEE-EMBS International Conference on Biomedical and Health Informatics (BHI)</li>
              </ul>
            </div>
          </div>

        </div>
      </div>

    </section><!-- /Professional Service Section -->
  ```

- [ ] **Step 3: Verify in browser**

  Scroll past Awards. Check:
  - "Professional Service" section with grey background
  - Two side-by-side cards: Memberships (left) and Reviewer (right)
  - Blue check icons and accent-colored card top border
  - On mobile, cards stack vertically

- [ ] **Step 4: Commit**
  ```bash
  git add index.html assets/css/main.css
  git commit -m "Add Professional Service section with IEEE memberships and reviewer roles"
  ```

---

## Task 7: Update papers-posters.html — citations, badges, date fix

**Files:**
- Modify: `papers-posters.html`
- Modify: `assets/css/main.css` (append citation styles)

- [ ] **Step 1: Add paper citation CSS**

  Append to the end of `assets/css/main.css`:
  ```css
  /*--------------------------------------------------------------
  # Paper Citation Style
  --------------------------------------------------------------*/
  .paper-citation {
    font-size: 0.88rem;
    color: #555;
    font-style: italic;
    margin-bottom: 10px;
    line-height: 1.5;
  }

  .paper-citation strong {
    font-style: normal;
    color: var(--accent-color);
  }

  .paper-badge-status {
    display: inline-block;
    background: rgba(5, 99, 187, 0.08);
    color: var(--accent-color);
    font-size: 0.8rem;
    font-weight: 600;
    padding: 3px 10px;
    border-radius: 4px;
    margin-bottom: 10px;
  }
  ```

- [ ] **Step 2: Update Paper 1 — Agentic AI / JBHI 2026**

  In `papers-posters.html`, find the paper card with title `Agentic AI to Augment Unstructured Data for Information Exchange and LLM`.

  The current structure is:
  ```html
          <div class="paper-card" data-aos="fade-up" data-aos-delay="100">
            <h3>Agentic AI to Augment Unstructured Data for Information Exchange and LLM</h3>
            <div class="paper-meta">2026 | IEEE JBHI 2026 (Under Review)</div>
  ```
  Replace with:
  ```html
          <div class="paper-card" data-aos="fade-up" data-aos-delay="100">
            <h3>Agentic AI to Augment Unstructured Data for Information Exchange and LLM</h3>
            <p class="paper-citation"><strong>M. Habibi</strong> and M. Nourani — <em>IEEE Journal of Biomedical and Health Informatics (JBHI)</em>, 2026</p>
            <div class="paper-badge-status">Under Review</div>
            <div class="paper-meta">2026 | IEEE JBHI</div>
  ```

- [ ] **Step 3: Update Paper 2 — T1-Weighted MRI / EMBC 2026**

  Find the card with title `Reconstruction of T1-Weighted Contrast-Enhanced MRI for Glioblastoma Radiogenomic Classification`.

  Replace its opening block:
  ```html
          <div class="paper-card" data-aos="fade-up" data-aos-delay="100">
            <h3>Reconstruction of T1-Weighted Contrast-Enhanced MRI for Glioblastoma Radiogenomic Classification</h3>
            <div class="paper-meta">July 2026 | IEEE EMBC 2026 (Under Review)</div>
  ```
  With:
  ```html
          <div class="paper-card" data-aos="fade-up" data-aos-delay="100">
            <h3>Reconstruction of T1-Weighted Contrast-Enhanced MRI for Glioblastoma Radiogenomic Classification</h3>
            <p class="paper-citation">F. Parsaee, M. C. Stefan, and <strong>M. Habibi</strong> — <em>IEEE Engineering in Medicine and Biology Society (EMBC)</em>, Copenhagen, July 2026</p>
            <div class="paper-badge-status">Under Review</div>
            <div class="paper-meta">July 2026 | IEEE EMBC 2026</div>
  ```

- [ ] **Step 4: Update Paper 3 — Dual-Camera Platform / ICHI 2026**

  Find the card with title `A Scalable Dual-Camera Platform for Behavioral Assessment in Healthcare`.

  Replace its opening block:
  ```html
          <div class="paper-card" data-aos="fade-up" data-aos-delay="100">
            <h3>A Scalable Dual-Camera Platform for Behavioral Assessment in Healthcare</h3>
            <div class="paper-meta">June 2026 | IEEE ICHI 2026 (Accepted)</div>
  ```
  With:
  ```html
          <div class="paper-card" data-aos="fade-up" data-aos-delay="100">
            <h3>A Scalable Dual-Camera Platform for Behavioral Assessment in Healthcare</h3>
            <p class="paper-citation"><strong>M. Habibi</strong>, M. Nourani, and D. H. Sullivan — <em>IEEE International Conference on Healthcare Informatics (ICHI)</em>, June 2026</p>
            <div class="paper-badge-status">Accepted</div>
            <div class="paper-meta">June 2026 | IEEE ICHI 2026</div>
  ```

- [ ] **Step 5: Update Paper 4 — Illumination-Aware Detection / SSIAI 2026**

  Find the card with title `An Integrated Deep Learning Architecture for Illumination-Aware Object Detection`.

  Replace its opening block:
  ```html
          <div class="paper-card" data-aos="fade-up" data-aos-delay="150">
            <h3>An Integrated Deep Learning Architecture for Illumination-Aware Object Detection</h3>
            <div class="paper-meta">March 2026 | IEEE SSIAI 2026</div>
  ```
  With:
  ```html
          <div class="paper-card" data-aos="fade-up" data-aos-delay="150">
            <h3>An Integrated Deep Learning Architecture for Illumination-Aware Object Detection</h3>
            <p class="paper-citation"><strong>M. Habibi</strong> and M. Nourani — <em>IEEE Southwest Symposium on Image Analysis and Interpretation (SSIAI)</em>, Santa Fe, NM, March 2026</p>
            <div class="paper-meta">March 2026 | IEEE SSIAI 2026</div>
  ```

- [ ] **Step 6: Update Paper 5 — Track Athletes Performance / EMBC 2025**

  Find the card with title `AI-Based Performance Analysis for Track and Field Athletes`.

  Replace its opening block:
  ```html
          <div class="paper-card" data-aos="fade-up" data-aos-delay="250">
            <h3>AI-Based Performance Analysis for Track and Field Athletes</h3>
            <div class="paper-meta">July 2025 | IEEE EMBC 2025</div>
  ```
  With:
  ```html
          <div class="paper-card" data-aos="fade-up" data-aos-delay="250">
            <h3>AI-Based Performance Analysis for Track and Field Athletes</h3>
            <p class="paper-citation"><strong>M. Habibi</strong>, M. Nourani, and M. M. Nourani — <em>47th Annual IEEE Engineering in Medicine and Biology Society (EMBC)</em>, Copenhagen, Denmark, July 2025</p>
            <div class="paper-meta">July 2025 | IEEE EMBC 2025</div>
  ```

- [ ] **Step 7: Update Paper 6 — HOI Analysis / ICHI 2025 (Best Paper)**

  Find the card with title `Video-Based Human-Object Interaction Analysis for Patient Behavioral Monitoring`.

  Replace its opening block:
  ```html
          <div class="paper-card" data-aos="fade-up" data-aos-delay="200">
            <h3>Video-Based Human-Object Interaction Analysis for Patient Behavioral Monitoring</h3>
            <div class="paper-meta">June 2025 | IEEE ICHI 2025</div>
  ```
  With:
  ```html
          <div class="paper-card" data-aos="fade-up" data-aos-delay="200">
            <h3>Video-Based Human-Object Interaction Analysis for Patient Behavioral Monitoring</h3>
            <p class="paper-citation"><strong>M. Habibi</strong>, Z. Delaram, M. Nourani, and D. H. Sullivan — <em>IEEE 13th International Conference on Healthcare Informatics (ICHI)</em>, Rende, Italy, June 2025</p>
            <div class="paper-meta">June 2025 | IEEE ICHI 2025</div>
  ```
  (The existing `<div class="paper-badge">Best Paper Award</div>` stays in place — do not remove it.)

- [ ] **Step 8: Update Paper 7 — Generative AI Behavioral Assessment / DCAS 2025**

  Find the card with title `Utilizing Generative AI for Patient Behavioral Assessment`.

  Replace its opening block:
  ```html
          <div class="paper-card" data-aos="fade-up" data-aos-delay="200">
            <h3>Utilizing Generative AI for Patient Behavioral Assessment</h3>
            <div class="paper-meta">April 2025 | IEEE DCAS 2025</div>
  ```
  With:
  ```html
          <div class="paper-card" data-aos="fade-up" data-aos-delay="200">
            <h3>Utilizing Generative AI for Patient Behavioral Assessment</h3>
            <p class="paper-citation"><strong>M. Habibi</strong> and M. Nourani — <em>IEEE 18th Dallas Circuits and Systems Conference (DCAS)</em>, 2025</p>
            <div class="paper-meta">April 2025 | IEEE DCAS 2025</div>
  ```

- [ ] **Step 9: Update Paper 8 — Ambulation Assessment / EMBC 2024**

  Find the card with title `An AI-Driven Camera-Based Platform for Patient Ambulation Assessment`.

  Replace its opening block:
  ```html
          <div class="paper-card" data-aos="fade-up" data-aos-delay="300">
            <h3>An AI-Driven Camera-Based Platform for Patient Ambulation Assessment</h3>
            <div class="paper-meta">July 2024 | IEEE EMBC 2024</div>
  ```
  With:
  ```html
          <div class="paper-card" data-aos="fade-up" data-aos-delay="300">
            <h3>An AI-Driven Camera-Based Platform for Patient Ambulation Assessment</h3>
            <p class="paper-citation"><strong>M. Habibi</strong>, M. Nourani, and D. H. Sullivan — <em>46th Annual IEEE Engineering in Medicine and Biology Society (EMBC)</em>, 2024</p>
            <div class="paper-meta">July 2024 | IEEE EMBC 2024</div>
  ```

- [ ] **Step 10: Update Paper 9 — Kinematic Analysis / SMARTCOMP 2024**

  Find the card with title `AI-Based Kinematic Analysis for Track Athletes`.

  Replace its opening block:
  ```html
          <div class="paper-card" data-aos="fade-up" data-aos-delay="300">
            <h3>AI-Based Kinematic Analysis for Track Athletes</h3>
            <div class="paper-meta">June 2024 | IEEE SMARTCOMP 2024</div>
  ```
  With:
  ```html
          <div class="paper-card" data-aos="fade-up" data-aos-delay="300">
            <h3>AI-Based Kinematic Analysis for Track Athletes</h3>
            <p class="paper-citation"><strong>M. Habibi</strong>, M. Nourani, and M. M. Nourani — <em>IEEE International Conference on Smart Computing (SMARTCOMP)</em>, Osaka, Japan, 2024</p>
            <div class="paper-meta">June 2024 | IEEE SMARTCOMP 2024</div>
  ```

- [ ] **Step 11: Update Paper 10 — ML+MCDM / 2022**

  Find the card with title `Introducing a New Classification Method using a Combined Approach of Machine Learning and Multi-Criteria Decision Making`.

  Replace its opening block:
  ```html
          <div class="paper-card" data-aos="fade-up" data-aos-delay="350">
            <h3>Introducing a New Classification Method using a Combined Approach of Machine Learning and Multi-Criteria Decision Making</h3>
            <div class="paper-meta">2022 | International Conference, Iran | Language: Farsi</div>
  ```
  With:
  ```html
          <div class="paper-card" data-aos="fade-up" data-aos-delay="350">
            <h3>Introducing a New Classification Method using a Combined Approach of Machine Learning and Multi-Criteria Decision Making</h3>
            <p class="paper-citation"><strong>M. Habibi</strong>, Z. Delaram, and M. Kouchaki — <em>International Conference on Science and Technology</em>, Iran, 2022 (Farsi)</p>
            <div class="paper-meta">2022 | International Conference, Iran | Language: Farsi</div>
  ```

- [ ] **Step 12: Update Paper 11 — Bee-HOPNET / 2019 (fix date)**

  Find the card with title `Improved HOPNET Routing Protocol Using the Bee Colony Algorithm (Bee-HOPNET)`.

  Replace its opening block (note the date fix: `2015` → `2019`):
  ```html
          <div class="paper-card" data-aos="fade-up" data-aos-delay="350">
            <h3>Improved HOPNET Routing Protocol Using the Bee Colony Algorithm (Bee-HOPNET)</h3>
            <div class="paper-meta">2015 | International Conference, Iran | Language: Farsi</div>
  ```
  With:
  ```html
          <div class="paper-card" data-aos="fade-up" data-aos-delay="350">
            <h3>Improved HOPNET Routing Protocol Using the Bee Colony Algorithm (Bee-HOPNET)</h3>
            <p class="paper-citation"><strong>M. Habibi</strong>, Z. Delaram, and M. Kouchaki — <em>18th International Conference on Recent Research in Science and Technology</em>, Dec. 2019 (Farsi)</p>
            <div class="paper-meta">Dec. 2019 | International Conference, Iran | Language: Farsi</div>
  ```

- [ ] **Step 13: Verify in browser**

  Open `papers-posters.html`. Check:
  - Each paper card shows an italic citation line below the title with the first author ("M. Habibi") in blue
  - Papers 1–3 show status badges (Under Review / Accepted) in blue
  - Paper 6 still shows the gold "Best Paper Award" badge
  - Bee-HOPNET paper shows "Dec. 2019" not "2015"

- [ ] **Step 14: Commit**
  ```bash
  git add papers-posters.html assets/css/main.css
  git commit -m "Add academic citations and status badges to all papers; fix Bee-HOPNET date"
  ```

---

## Task 8: Fix certificate.html footer + add .gitignore entry

**Files:**
- Modify: `certificate.html`
- Modify: `.gitignore` (create if absent)

- [ ] **Step 1: Fix empty social links in certificate.html footer**

  In `certificate.html`, find the footer social links block:
  ```html
      <div class="social-links d-flex justify-content-center">
        <a href=""><i class="bi bi-twitter-x"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-skype"></i></a>
        <a href=""><i class="bi bi-linkedin"></i></a>
      </div>
  ```
  Replace with:
  ```html
      <div class="social-links d-flex justify-content-center">
        <a href="https://www.linkedin.com/in/mostafa-habibi-78b841284/" target="_blank"><i class="bi bi-linkedin"></i></a>
        <a href="https://github.com/habibi6010" target="_blank"><i class="bi bi-github"></i></a>
        <a href="https://scholar.google.com/citations?user=dHXIkhMAAAAJ&hl=en" target="_blank"><i class="bi bi-mortarboard-fill"></i></a>
        <a href="https://www.researchgate.net/profile/Mostafa-Habibi-11" target="_blank"><i class="bi bi-journal-text"></i></a>
      </div>
  ```

- [ ] **Step 2: Add .superpowers/ to .gitignore**

  Check if `.gitignore` exists at the repo root. If it does not exist, create it. Either way, ensure it contains:
  ```
  .superpowers/
  ```

- [ ] **Step 3: Verify in browser**

  Open `certificate.html`. Scroll to footer. Check:
  - LinkedIn, GitHub, Google Scholar, ResearchGate icons visible and links correct (match the links used on `index.html` footer)

- [ ] **Step 4: Commit**
  ```bash
  git add certificate.html .gitignore
  git commit -m "Fix certificate.html footer social links; add .superpowers to .gitignore"
  ```

---

## Self-Review Checklist

After all tasks are done:

- [ ] Open `index.html` — nav has 12 items; all 9 sections scroll correctly from sidebar links
- [ ] Open `papers-posters.html` — all 11 papers have citation lines; Under Review and Accepted badges visible; Best Paper Award badge still on HOI paper
- [ ] Open `certificate.html` — footer shows 4 working social links
- [ ] Browser tab on `index.html` reads "Mostafa Habibi — PhD Candidate, Computer Engineering"
- [ ] On mobile width (≤576px): Education cards stack meta below title; nav collapses correctly
