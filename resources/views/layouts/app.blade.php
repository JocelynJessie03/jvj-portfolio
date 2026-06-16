<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Jocelyn Vanessa Jessie – Information Systems for Business student and developer portfolio." />
    <meta property="og:title" content="Home | Jocelyn Vanessa Jessie Portfolio" />
    <meta property="og:type" content="website" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title', 'Home') | Jocelyn Vanessa Jessie Portfolio</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body>

<!-- ── Navigation ── -->
<header class="site-header" id="top">
    <nav class="navbar container">
        <a href="{{ route('home') }}" class="nav-logo" aria-label="Home">
            <img src="{{ asset('images/jvjess.png') }}" alt="JVJess" class="logo-image" />
        </a>

        <button class="nav-toggle" id="navToggle" aria-label="Toggle menu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>

        <ul class="nav-links" id="navLinks" role="list">
            <li><a href="{{ route('home') }}"         class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('home') }}#about-me" class="nav-link">About Me</a></li>
            <li><a href="{{ route('projects') }}"     class="nav-link {{ request()->routeIs('projects') ? 'active' : '' }}">My Projects</a></li>
            <li><a href="{{ route('home') }}#contact"  class="nav-link">Contact</a></li>
        </ul>

        <div class="nav-socials" aria-label="Social links">
            <a href="https://www.instagram.com/jvjess_" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
            </a>
            <a href="http://www.linkedin.com/in/jocelyn-jessie-19a869281" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
            </a>
            <a href="https://github.com/settings/profile" target="_blank" rel="noopener noreferrer" aria-label="GitHub">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/></svg>
            </a>
        </div>
    </nav>
</header>

<!-- ── Page Content ── -->
<main>
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if(session('subscribed'))
        <div class="alert alert-success" role="alert">
            {{ session('subscribed') }}
        </div>
    @endif

    @yield('content')
</main>

<!-- ── Footer ── -->
<footer class="site-footer">
    <div class="container footer-inner">
        <div class="footer-brand">
            <p class="footer-quote">Always do my best</p>
            <p class="footer-quote-end">and let God do the rest.</p>
        </div>

        <nav class="footer-nav" aria-label="Footer navigation">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('home') }}#about-me">About Me</a>
            <a href="{{ route('projects') }}">My Projects</a>
            <a href="{{ route('home') }}#contact">Contact</a>
        </nav>

        <div class="footer-newsletter">
            <p class="footer-newsletter-label">Stay connected with me</p>
            <form action="{{ route('subscribe') }}" method="POST" class="subscribe-form">
                @csrf
                <input type="email" name="email" placeholder="Email*" required aria-label="Your email" />
                <label class="checkbox-label">
                    <input type="checkbox" name="collaborate" value="1" required />
                    Interested in collaborating or working with me?
                </label>
                <button type="submit" class="btn btn-outline-light">Connect</button>
            </form>
        </div>
    </div>

    <div class="footer-copy container">
        <p>© {{ date('Y') }} by Jocelyn Vanessa Jessie</p>
    </div>
</footer>

{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
@stack('scripts')
</body>
</html>
