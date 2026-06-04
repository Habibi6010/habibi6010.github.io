# Landing Page Redesign Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Rebuild `index.html` into a minimal, industry-focused landing page targeting agentic AI / ML engineering roles — removing verbose sections, replacing card descriptions with scannable tag rows, adding the AIMS Technologies internship, and compacting Education/Awards.

**Architecture:** Pure static HTML/CSS edits across two files — `index.html` (structure and content) and `assets/css/main.css` (new utility classes for tag pills, awards strip). No JS changes. No new pages. No vendor changes.

**Tech Stack:** HTML5, Bootstrap 5 (already loaded), Bootstrap Icons (already loaded), existing `assets/css/main.css` custom properties.

---

## Files

| File | Action | What changes |
|------|--------|-------------|
| `index.html` | Modify | Nav, Hero, About, Education, Experience, Skills, Awards, Contact — remove Research and Service sections |
| `assets/css/main.css` | Modify (append only) | Add `.skill-group`, `.skill-group-label`, `.skill-tags`, `.skill-tag`, `.awards-strip`, `.award-strip-item` |

---

## Task 1: Remove Research and Service sections

**Files:**
- Modify: `index.html`

These two sections are deleted entirely. Research detail lives in `papers-posters.html` (nav link stays). Service lives in the resume PDF.

- [ ] **Step 1: Delete the Research section**

In `index.html`, find and delete everything between (and including) these two comment lines:

```html
    <!-- Research Section -->
    <section id="research" class="research section light-background">
      ...
    </section><!-- /Research Section -->
```

- [ ] **Step 2: Delete the Professional Service section**

In `index.html`, find and delete everything between (and including):

```html
    <!-- Professional Service Section -->
    <section id="service" class="prof-service section light-background">
      ...
    </section><!-- /Professional Service Section -->
```

- [ ] **Step 3: Verify in browser**

Open `index.html` in a browser. Scroll through the page — confirm "Research" and "Professional Service" sections are gone. No layout breaks.

- [ ] **Step 4: Commit**

```bash
git add index.html
git commit -m "remove Research and Service sections from landing page"
```

---

## Task 2: Update navigation

**Files:**
- Modify: `index.html`

Remove `#research` and `#service` anchor links. Reorder remaining nav items.

- [ ] **Step 1: Replace the full `<nav>` block**

Find the existing `<nav id="navmenu" class="navmenu">` block and replace it entirely with:

```html
    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero" class="active"><i class="bi bi-house navicon"></i><span>Home</span></a></li>
        <li><a href="#about"><i class="bi bi-person navicon"></i><span>About</span></a></li>
        <li><a href="#education"><i class="bi bi-mortarboard navicon"></i><span>Education</span></a></li>
        <li><a href="#experience"><i class="bi bi-briefcase navicon"></i><span>Experience</span></a></li>
        <li><a href="#skills"><i class="bi bi-hdd-stack navicon"></i><span>Skills</span></a></li>
        <li><a href="#awards"><i class="bi bi-trophy navicon"></i><span>Awards</span></a></li>
        <li><a href="#contact"><i class="bi bi-envelope navicon"></i><span>Contact</span></a></li>
        <li><a href="assets/resume/Resume.pdf" target="_blank" rel="noopener noreferrer"><i class="bi bi-file-earmark-text navicon"></i><span>Resume</span></a></li>
        <li><a href="papers-posters.html#papers"><i class="bi bi-journal-text navicon"></i><span>Papers &amp; Posters</span></a></li>
        <li><a href="certificate.html"><i class="bi bi-award navicon"></i><span>Certificates</span></a></li>
      </ul>
    </nav>
```

- [ ] **Step 2: Verify in browser**

Open `index.html`. Toggle the mobile nav (resize browser to narrow). Confirm: Research and Service links are gone. All remaining links work. Resume PDF opens in new tab.

- [ ] **Step 3: Commit**

```bash
git add index.html
git commit -m "update nav: remove research and service links, reorder"
```

---

## Task 3: Update Hero typed items

**Files:**
- Modify: `index.html`

Move "Agentic AI Engineer" to first position.

- [ ] **Step 1: Update `data-typed-items`**

Find this line in the Hero section:

```html
<p>I'm <span class="typed" data-typed-items="Data Scientist, Developer, Innovator, Technology Enthusiast, Vision Engineer, AI Solution Designer, Machine Learning Engineer">Data Scientist</span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
```

Replace with:

```html
<p>I'm <span class="typed" data-typed-items="Agentic AI Engineer, ML Engineer, Computer Vision Engineer, Senior Scientist, AI Researcher, Data Scientist">Agentic AI Engineer</span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
```

- [ ] **Step 2: Verify in browser**

Open `index.html`. Watch the hero — confirm it cycles through the new titles starting with "Agentic AI Engineer".

- [ ] **Step 3: Commit**

```bash
git add index.html
git commit -m "update hero typed items to lead with agentic AI titles"
```

---

## Task 4: Rewrite About section

**Files:**
- Modify: `index.html`

Replace three-paragraph prose block with 3-sentence summary. Keep profile photo.

- [ ] **Step 1: Replace the About section content**

Find the entire `<section id="about" ...>` block and replace with:

```html
    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 justify-content-center">
          <div class="col-lg-4">
            <img src="assets/img/profile-img.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 content d-flex align-items-center">
            <p>PhD Candidate in Computer Engineering at UT Dallas, building AI systems at the intersection of agentic AI, computer vision, and healthcare analytics. I design multi-agent pipelines, RAG systems, and vision-language workflows that solve real clinical and industry problems. Currently seeking industry roles in agentic AI engineering and applied ML.</p>
          </div>
        </div>
      </div>

    </section><!-- /About Section -->
```

- [ ] **Step 2: Verify in browser**

Open `index.html`. Scroll to About — confirm photo and 3-sentence paragraph appear. No layout breaks on mobile (resize browser).

- [ ] **Step 3: Commit**

```bash
git add index.html
git commit -m "rewrite About section: 3-sentence summary, remove prose blocks"
```

---

## Task 5: Replace Education section with compact table

**Files:**
- Modify: `index.html`

Replace three full `education-item` blocks with a single scannable table.

- [ ] **Step 1: Replace the Education section content**

Find the entire `<section id="education" ...>` block and replace with:

```html
    <!-- Education Section -->
    <section id="education" class="education section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Education</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="table-responsive">
          <table class="table table-borderless align-middle">
            <tbody>
              <tr>
                <td><strong>PhD, Computer Engineering</strong></td>
                <td>The University of Texas at Dallas, USA</td>
                <td class="text-nowrap">2022 – Present</td>
                <td class="text-nowrap">GPA: 3.94 / 4.00</td>
                <td></td>
              </tr>
              <tr>
                <td><strong>MS, Computer Science</strong></td>
                <td>Shahid Bahonar University, Iran</td>
                <td class="text-nowrap">2015</td>
                <td class="text-nowrap">GPA: 3.60 / 4.00</td>
                <td></td>
              </tr>
              <tr>
                <td><strong>BS, Computer Science</strong></td>
                <td>Shahid Bahonar University, Iran</td>
                <td class="text-nowrap">2012</td>
                <td class="text-nowrap">GPA: 3.46 / 4.00</td>
                <td><i class="bi bi-star-fill text-warning me-1"></i> Ranked 1st</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </section><!-- /Education Section -->
```

- [ ] **Step 2: Verify in browser**

Scroll to Education — confirm 3 rows display cleanly. Resize to mobile — confirm table scrolls horizontally without breaking layout.

- [ ] **Step 3: Commit**

```bash
git add index.html
git commit -m "replace Education section with compact 3-row table"
```

---

## Task 6: Rewrite Experience section

**Files:**
- Modify: `index.html`

Three roles, newest first, 2–3 bullets each. Add AIMS Technologies. Remove Shahid Bahonar RA role.

- [ ] **Step 1: Replace the Experience section content**

Find the entire `<section id="experience" ...>` block and replace with:

```html
    <!-- Experience Section -->
    <section id="experience" class="experience section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Experience</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="experience-item" data-aos="fade-up" data-aos-delay="100">
          <div class="experience-header">
            <h3>Senior Scientist Intern</h3>
            <div class="exp-meta">
              <span class="exp-org"><i class="bi bi-building me-1"></i>AIMS Technologies</span>
              <span class="exp-period"><i class="bi bi-calendar3 me-1"></i>May 2026 – Aug 2026</span>
            </div>
          </div>
          <ul>
            <li>Conducting R&amp;D on an agentic AI system that analyzes runner video and performance records to deliver data-driven insights for athletes and coaches.</li>
            <li>Designing and implementing a multi-agent system that generates personalized training plans from video analysis, biomechanical data, and historical performance records.</li>
          </ul>
        </div><!-- End Experience Item -->

        <div class="experience-item" data-aos="fade-up" data-aos-delay="200">
          <div class="experience-header">
            <h3>Graduate Research Assistant</h3>
            <div class="exp-meta">
              <span class="exp-org"><i class="bi bi-building me-1"></i>University of Texas at Dallas, Richardson, TX</span>
              <span class="exp-period"><i class="bi bi-calendar3 me-1"></i>Spring 2023 – Present</span>
            </div>
          </div>
          <ul>
            <li>Built agentic AI systems: multi-agent pipelines, RAG, and LangChain/LangGraph orchestration for clinical data structuring into FHIR-compliant formats.</li>
            <li>Designed video-based patient monitoring using YOLO, MediaPipe, and multi-camera 3D localization — no wearables required.</li>
            <li>Deployed cloud-connected AI workflows on AWS (EC2, S3, Lambda, API Gateway).</li>
          </ul>
        </div><!-- End Experience Item -->

        <div class="experience-item" data-aos="fade-up" data-aos-delay="300">
          <div class="experience-header">
            <h3>Teaching Assistant</h3>
            <div class="exp-meta">
              <span class="exp-org"><i class="bi bi-building me-1"></i>University of Texas at Dallas, Richardson, TX</span>
              <span class="exp-period"><i class="bi bi-calendar3 me-1"></i>5 Semesters</span>
            </div>
          </div>
          <ul>
            <li>Supported lab sessions and student learning for two core ECE courses.</li>
          </ul>
        </div><!-- End Experience Item -->

      </div>

    </section><!-- /Experience Section -->
```

- [ ] **Step 2: Verify in browser**

Scroll to Experience — confirm 3 roles appear with AIMS at top. Check mobile layout.

- [ ] **Step 3: Commit**

```bash
git add index.html
git commit -m "rewrite Experience: add AIMS internship, trim to 2-3 bullets per role"
```

---

## Task 7: Add tag-pill CSS to main.css

**Files:**
- Modify: `assets/css/main.css`

Add styles for skill tag groups and awards strip. Append to end of file — do not edit existing rules.

- [ ] **Step 1: Read the end of main.css to find the insertion point**

Open `assets/css/main.css` and scroll to the very end to confirm the last rule (so you can safely append after it).

- [ ] **Step 2: Append new CSS rules**

Add the following block at the very end of `assets/css/main.css`:

```css
/*--------------------------------------------------------------
# Skill Tag Groups
--------------------------------------------------------------*/
.skill-group {
  margin-bottom: 1.5rem;
}

.skill-group-label {
  display: inline-block;
  font-weight: 600;
  color: var(--accent-color);
  min-width: 180px;
  margin-bottom: 0.5rem;
}

.skill-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 0.4rem;
}

.skill-tag {
  background-color: color-mix(in srgb, var(--accent-color) 10%, transparent);
  color: var(--heading-color);
  border: 1px solid color-mix(in srgb, var(--accent-color) 30%, transparent);
  border-radius: 20px;
  padding: 0.2rem 0.75rem;
  font-size: 0.82rem;
  white-space: nowrap;
}

/*--------------------------------------------------------------
# Awards Strip
--------------------------------------------------------------*/
.awards-strip {
  display: flex;
  flex-wrap: wrap;
  gap: 1.5rem;
  justify-content: center;
}

.award-strip-item {
  display: flex;
  align-items: flex-start;
  gap: 1rem;
  background: var(--surface-color);
  border: 1px solid color-mix(in srgb, var(--default-color) 10%, transparent);
  border-radius: 8px;
  padding: 1.25rem 1.5rem;
  flex: 1 1 280px;
  max-width: 420px;
}

.award-strip-item i {
  font-size: 2rem;
  color: var(--accent-color);
  flex-shrink: 0;
  margin-top: 0.1rem;
}

.award-strip-item h4 {
  margin: 0 0 0.25rem 0;
  font-size: 1rem;
  font-weight: 600;
  color: var(--heading-color);
}

.award-strip-item p {
  margin: 0;
  font-size: 0.875rem;
  color: var(--default-color);
  opacity: 0.8;
}
```

- [ ] **Step 3: Verify CSS is syntactically valid**

Open `index.html` in browser — no broken layout, no missing styles from earlier sections. (Browser DevTools console should show no CSS parse errors.)

- [ ] **Step 4: Commit**

```bash
git add assets/css/main.css
git commit -m "add skill-tag and awards-strip CSS utility classes"
```

---

## Task 8: Replace Skills section with tag-row groups

**Files:**
- Modify: `index.html`

Replace 8 verbose `.service-item` cards with 5 tag-group rows using the classes added in Task 7.

- [ ] **Step 1: Replace the Skills section content**

Find the entire `<section id="skills" ...>` block and replace with:

```html
    <!-- Skills Section -->
    <section id="skills" class="skills section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Skills</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="skill-group">
          <div class="skill-group-label">Agentic AI &amp; LLMs</div>
          <div class="skill-tags">
            <span class="skill-tag">LangChain</span>
            <span class="skill-tag">LangGraph</span>
            <span class="skill-tag">RAG</span>
            <span class="skill-tag">Multi-Agent Systems</span>
            <span class="skill-tag">Prompt Engineering</span>
            <span class="skill-tag">Tool Use</span>
            <span class="skill-tag">n8n</span>
            <span class="skill-tag">Open-Weight LLMs</span>
          </div>
        </div>

        <div class="skill-group">
          <div class="skill-group-label">Computer Vision</div>
          <div class="skill-tags">
            <span class="skill-tag">YOLO</span>
            <span class="skill-tag">MediaPipe</span>
            <span class="skill-tag">OpenCV</span>
            <span class="skill-tag">Object Detection</span>
            <span class="skill-tag">Multi-Camera Tracking</span>
            <span class="skill-tag">3D Localization</span>
            <span class="skill-tag">Stereo Vision</span>
          </div>
        </div>

        <div class="skill-group">
          <div class="skill-group-label">ML Engineering</div>
          <div class="skill-tags">
            <span class="skill-tag">PyTorch</span>
            <span class="skill-tag">scikit-learn</span>
            <span class="skill-tag">Random Forest</span>
            <span class="skill-tag">SVM</span>
            <span class="skill-tag">Feature Engineering</span>
            <span class="skill-tag">Model Deployment</span>
            <span class="skill-tag">Hyperparameter Tuning</span>
          </div>
        </div>

        <div class="skill-group">
          <div class="skill-group-label">Programming</div>
          <div class="skill-tags">
            <span class="skill-tag">Python</span>
            <span class="skill-tag">Java</span>
            <span class="skill-tag">C/C++</span>
            <span class="skill-tag">JavaScript</span>
            <span class="skill-tag">Flask</span>
            <span class="skill-tag">SQL</span>
            <span class="skill-tag">Bash</span>
          </div>
        </div>

        <div class="skill-group">
          <div class="skill-group-label">Cloud &amp; Infra</div>
          <div class="skill-tags">
            <span class="skill-tag">AWS EC2</span>
            <span class="skill-tag">AWS S3</span>
            <span class="skill-tag">AWS Lambda</span>
            <span class="skill-tag">API Gateway</span>
            <span class="skill-tag">Cloud Deployment</span>
          </div>
        </div>

      </div>

    </section><!-- /Skills Section -->
```

- [ ] **Step 2: Verify in browser**

Scroll to Skills — confirm 5 tag groups display with accent-colored labels and pill badges. Resize to mobile — tags wrap cleanly.

- [ ] **Step 3: Commit**

```bash
git add index.html
git commit -m "replace Skills cards with tag-row groups, Agentic AI leads"
```

---

## Task 9: Replace Awards carousel with static strip

**Files:**
- Modify: `index.html`

Replace Swiper carousel and all its markup with the 2-item static strip using `.awards-strip` from Task 7.

- [ ] **Step 1: Replace the Awards section content**

Find the entire `<section id="awards" ...>` block and replace with:

```html
    <!-- Awards Section -->
    <section id="awards" class="awards section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Awards</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="awards-strip">

          <div class="award-strip-item">
            <i class="bi bi-award-fill"></i>
            <div>
              <h4>Best Paper Award</h4>
              <p>IEEE International Conference on Healthcare Informatics (ICHI 2025)</p>
            </div>
          </div>

          <div class="award-strip-item">
            <i class="bi bi-patch-check-fill"></i>
            <div>
              <h4>ECE Doctoral Excellence Award</h4>
              <p>The University of Texas at Dallas, Spring 2026</p>
            </div>
          </div>

        </div>
      </div>

    </section><!-- /Awards Section -->
```

- [ ] **Step 2: Verify in browser**

Scroll to Awards — confirm two award cards appear side by side (desktop) and stacked (mobile). No Swiper carousel, no images, no pagination dots.

- [ ] **Step 3: Commit**

```bash
git add index.html
git commit -m "replace Awards carousel with static 2-item strip"
```

---

## Task 10: Trim Contact section

**Files:**
- Modify: `index.html`

Remove physical address and phone number. Keep email and a LinkedIn link.

- [ ] **Step 1: Replace the Contact section content**

Find the entire `<section id="contact" ...>` block and replace with:

```html
    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Open to research collaboration, agentic AI projects, and industry opportunities.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade" data-aos-delay="100">
        <div class="row gy-4 justify-content-center">

          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email</h3>
                <p>mostafa.habibi6010@gmail.com</p>
                <p>mostafa.habibidehsheikhi@utdallas.edu</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-linkedin flex-shrink-0"></i>
              <div>
                <h3>LinkedIn</h3>
                <p><a href="https://www.linkedin.com/in/mostafa-habibi-78b841284/" target="_blank" rel="noopener">linkedin.com/in/mostafa-habibi-78b841284</a></p>
              </div>
            </div><!-- End Info Item -->
          </div>

        </div>
      </div>

    </section><!-- /Contact Section -->
```

- [ ] **Step 2: Verify in browser**

Scroll to Contact — confirm only email and LinkedIn appear. No address, no phone number.

- [ ] **Step 3: Final full-page check**

Scroll through the entire page top to bottom:
- Hero: typed animation cycles starting with "Agentic AI Engineer"
- About: 3 sentences + photo
- Education: compact 3-row table
- Experience: 3 roles, AIMS at top
- Skills: 5 tag groups, Agentic AI leads
- Awards: 2-item strip
- Contact: email + LinkedIn only
- Nav: no Research or Service links

Resize to mobile (< 768px) — confirm no horizontal overflow, all sections stack cleanly.

- [ ] **Step 4: Commit**

```bash
git add index.html
git commit -m "trim Contact section: email and LinkedIn only, remove address and phone"
```

---

## Self-Review

**Spec coverage:**
- Hero typed items updated ✓ (Task 3)
- About rewritten to 3 sentences ✓ (Task 4)
- Education compact table ✓ (Task 5)
- Experience 3 roles, AIMS at top, 2–3 bullets ✓ (Task 6)
- Skills tag rows, Agentic AI leads ✓ (Tasks 7+8)
- Awards 2-item strip ✓ (Tasks 7+9)
- Contact trimmed ✓ (Task 10)
- Research section removed ✓ (Task 1)
- Service section removed ✓ (Task 1)
- Nav updated ✓ (Task 2)
- Address and phone removed from Contact ✓ (Task 10)

**No placeholders, no TBDs, no "similar to Task N" references.** Every task contains full HTML replacement blocks.

**Type/class consistency:** `.skill-group`, `.skill-group-label`, `.skill-tags`, `.skill-tag` defined in Task 7 CSS and used in Task 8 HTML. `.awards-strip`, `.award-strip-item` defined in Task 7 CSS and used in Task 9 HTML. Consistent throughout.
