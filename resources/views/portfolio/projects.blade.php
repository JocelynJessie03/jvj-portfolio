@extends('layouts.app')

@section('title', 'My Projects')

@section('content')

<section class="page-hero" aria-label="Projects page header">
    <div class="container">
        <p class="page-hero-eyebrow">Portfolio</p>
        <h1 class="page-hero-title">My Projects</h1>
        <p class="page-hero-desc">
            A showcase of my projects that bridge technology and business through innovative digital solutions.
        </p>
    </div>
</section>

<section class="projects-full-section" aria-labelledby="projects-full-heading">
    <div class="container">
        <h2 id="projects-full-heading" class="sr-only">All Projects</h2>

        <div class="projects-full-grid">
            @foreach($projects as $i => $project)
            <article class="project-full-card {{ $i % 2 === 1 ? 'project-full-card--reverse' : '' }}">
                <div class="project-full-image">
                    @if($project['image'])
                        <img src="{{ asset('images/' . $project['image']) }}" alt="{{ $project['title'] }}" loading="lazy" class="project-full-screenshot" />
                    @else
                        <div class="project-full-placeholder" aria-hidden="true">
                            <span class="project-num-large">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        </div>
                    @endif
                </div>
                <div class="project-full-body">
                    @if(!empty($project['logo']))
                    <img src="{{ asset('images/' . $project['logo']) }}" alt="{{ $project['title'] }} logo" class="project-logo" loading="lazy" />
                    @endif
                    <span class="project-label">Project {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }} (Group Project)</span>
                    <h3 class="project-full-title">{{ $project['title'] }}</h3>
                    <p class="project-full-desc">{{ $project['description'] }}</p>
                    <p class="project-full-details">{{ $project['details'] }}</p>
                    <div class="project-tags">
                        @foreach($project['tags'] as $tag)
                            <span class="tag">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="projects-cta-section" aria-label="Call to action">
    <div class="container cta-inner">
        <h2 class="cta-title">Interested in working together?</h2>
        <a href="{{ route('home') }}#contact" class="btn btn-primary">Get in Touch</a>
    </div>
</section>

@endsection

@push('scripts')
<script>
const cards = document.querySelectorAll('.project-full-card');
const obs = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
}, { threshold: 0.1 });
cards.forEach(c => obs.observe(c));
</script>
@endpush
