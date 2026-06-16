@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- ── Hero ── -->
<section class="hero" aria-label="Hero">
    <div class="hero-content container">
        <span class="site-tag" style="color:white;font-weight:800;">
            Jocelyn V Jessie | Online Portfolio
        </span>
        <h4 class="hero-eyebrow">Always do my best and let</h4>
        <h1 class="hero-headline glow">God do the rest.</h1>
        <p class="hero-subtitle" style="max-width:62ch;margin:1.25rem auto 2rem;color:rgba(247,243,236,.75);">
            Driven by curiosity, innovation, and a passion for continuous growth, I enjoy transforming ideas into meaningful solutions. 
            Explore my portfolio to discover the experiences, projects, and milestones that have shaped my journey in technology and leadership.
        </p>

        <div class="hero-cta" style="display:flex;gap:1rem;justify-content:center;">
            <a href="#about-me" class="btn btn-primary glow">Get to know me</a>
            <a href="{{ route('projects') }}" class="btn btn-outline-light" aria-label="View projects">See projects</a>
        </div>

        <a href="#about-me" class="scroll-down" aria-hidden="false" style="display:block;margin-top:2.5rem;text-align:center;color:rgba(247,243,236,.6);font-size:.95rem">
            ↓ Scroll to about
        </a>
    </div>
    <div class="hero-decoration" aria-hidden="true">
        <div class="hero-blob hero-blob-1 glow"></div>
        <div class="hero-blob hero-blob-2 glow"></div>
    </div>
</section>

<!-- ── About Me ── -->
<section class="about-section" id="about-me" aria-labelledby="about-heading">
    <div class="container about-inner">
        <div class="about-photo-wrap">
            <div class="about-photo-placeholder" aria-label="Photo of Jocelyn Vanessa Jessie">
                <img src="{{ asset('images/profile.jpeg') }}" alt="Jocelyn Vanessa Jessie" style="width:100%;height:100%;object-fit:cover;" />
            </div>
        </div>

        <div class="about-text">
            <h2 id="about-heading" class="section-title">About Me</h2>
            <p class="about-bio">
                A dynamic Information Systems for Business (ISB) student developing hands-on skills
                in data analysis, Java, and MySQL, with a strong foundation in team management.
                Skilled in coordinating teams, nurturing relationships, and aligning objectives to
                ensure precise execution of projects and initiatives. Proficient in facilitating
                communication to optimise workflows and streamline operations. Passionate about
                leveraging breakthroughs to deliver innovative strategies and experiences that drive
                growth, engagement, and satisfaction.
            </p>

            <!-- Skills -->
            <h3 class="skills-heading">Skills</h3>
            <div class="skills-list" role="list">
                @foreach($skills as $skill)
                <div class="skill-item" role="listitem">
                    <div class="skill-header">
                        <span class="skill-icon" aria-hidden="true">{{ $skill['icon'] }}</span>
                        <span class="skill-name">{{ $skill['name'] }}</span>
                        <span class="skill-pct">{{ $skill['percent'] }}%</span>
                    </div>
                    <div class="skill-bar" role="progressbar"
                         aria-valuenow="{{ $skill['percent'] }}"
                         aria-valuemin="0" aria-valuemax="100"
                         aria-label="{{ $skill['name'] }} proficiency">
                        <div class="skill-fill" style="--target: {{ $skill['percent'] }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>

            <a href="{{ route('projects') }}" class="btn btn-primary mt-6">Get to know more →</a>
        </div>
    </div>
</section>

<!-- ── Projects Preview ── -->
<section class="projects-preview-section" aria-labelledby="projects-preview-heading">
    <div class="container">
        <div class="section-header">
            <h2 id="projects-preview-heading" class="section-title">My Projects</h2>
            <p class="section-subtitle">
                This portfolio showcases a collection of my projects across application and web
                development, highlighting my ability to design, build, and implement
                technology-driven solutions. It reflects my passion for integrating business
                concepts with modern technology, as well as my strengths in creativity,
                problem-solving, and system development.
            </p>
        </div>

        <div class="projects-grid">
            @foreach($projects as $i => $project)
            <article class="project-card project-card--preview" style="--delay: {{ $i * 80 }}ms">
                <div class="project-card-image">
                    @if(!empty($project['logo']))
                        <div class="project-card-logo-wrap">
                            <img src="{{ asset('images/' . $project['logo']) }}" alt="{{ $project['title'] }} logo" loading="lazy" class="project-card-logo" />
                        </div>
                    @else
                        <div class="project-card-placeholder" aria-hidden="true">
                            <span class="project-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        </div>
                    @endif
                </div>
                <div class="project-card-body">
                    <h3 class="project-card-title">{{ $project['title'] }}</h3>
                    <p class="project-card-desc">{{ $project['description'] }}</p>
                    <div class="project-tags">
                        @foreach($project['tags'] as $tag)
                            <span class="tag">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <div class="projects-cta">
            <a href="{{ route('projects') }}" class="btn btn-primary">Learn more →</a>
        </div>
    </div>
</section>

<!-- ── Contact ── -->
<section class="contact-section" id="contact" aria-labelledby="contact-heading">
    <div class="container contact-inner">
        <h2 id="contact-heading" class="section-title">Get in Touch.</h2>
        <p class="contact-sub">Have a project in mind? I would like to hear from you!</p>

        @if($errors->any())
            <div class="alert alert-error" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contact') }}" method="POST" class="contact-form" novalidate>
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label for="first_name">First name <span aria-hidden="true">*</span></label>
                    <input type="text" id="first_name" name="first_name"
                           value="{{ old('first_name') }}" required
                           placeholder="Jocelyn" />
                </div>
                <div class="form-group">
                    <label for="last_name">Last name <span aria-hidden="true">*</span></label>
                    <input type="text" id="last_name" name="last_name"
                           value="{{ old('last_name') }}" required
                           placeholder="Jessie" />
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email <span aria-hidden="true">*</span></label>
                <input type="email" id="email" name="email"
                       value="{{ old('email') }}" required
                       placeholder="hello@example.com" />
            </div>
            <div class="form-group">
                <label for="message">Leave me a message…</label>
                <textarea id="message" name="message" rows="5"
                          placeholder="Tell me about your project…">{{ old('message') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>

@endsection

@push('scripts')
<script>
// Animate skill bars on scroll
const fills = document.querySelectorAll('.skill-fill');
const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.style.width = e.target.style.getPropertyValue('--target') ||
                                   e.target.closest('[aria-valuenow]')?.getAttribute('aria-valuenow') + '%';
            e.target.classList.add('animated');
        }
    });
}, { threshold: 0.3 });
fills.forEach(f => observer.observe(f));

// Scroll reveal for project cards
const cards = document.querySelectorAll('.project-card--preview');
const cardObserver = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (e.isIntersecting) e.target.classList.add('visible');
    });
}, { threshold: 0.15 });
cards.forEach(c => cardObserver.observe(c));
</script>
@endpush
