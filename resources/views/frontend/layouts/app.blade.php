@php
    $setting = AppSetting::first();
    // dd($setting);
    @endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sistelindo' }}</title>
        <link rel="icon" type="image/x-icon" href="{{ $setting?->favicon ? asset($setting->favicon) : asset('/storage/photos/1/sistelindo-favicon.png') }}" />



            <meta name="description" content="{{ $description ?? $setting?->meta_description ?? 'Sistelindo ' }}">

    <!-- OPEN GRAPH (WA, FB, IG) -->
    <meta property="og:title" content="{{ $title ?? $setting?->site_title ?? 'Sistelindo' }}">
    <meta property="og:description" content="{{ $description ?? $setting?->meta_description ?? 'Sistelindo ' }}">
    <meta property="og:image" content="{{ asset($setting?->share_image ?? 'storage/photos/1/sistelindo-favicon.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- TWITTER CARD -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? $setting?->site_title ?? 'Sistelindo' }}">
    <meta name="twitter:description" content="{{ $description ?? $setting?->meta_description ?? 'Sistelindo ' }}">
 

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CUSTOM STYLE -->
  
    
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

    @include('frontend.layouts.navbar')

    <main>
        @yield('content')
    </main>

    @include('frontend.layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    // Simple intersection observer for animations
    document.addEventListener('DOMContentLoaded', function() {
        const animatedElements = document.querySelectorAll('.animate-fade-in, .animate-slide-left, .animate-slide-right');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translate(0, 0)';
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        animatedElements.forEach(el => {
            el.style.opacity = '0';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    });
</script>
</html>
