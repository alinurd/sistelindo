@php
    $set = AppSetting::first();
@endphp
<nav class="navbar navbar-expand-lg bg-white">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="{{ route('guest.home') }}">
            <img src="{{ $set?->logo ? asset($setting->logo) : asset('/storage/photos/1/sistelindo-favicon.png') }}"  
                 alt="{{ $set?->title ?: 'Sistelindo' }}" height="60">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="nav" class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto" style="font-size:12px;">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('guest.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('guest.about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('guest.product') }}">Products & Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('guest.contact') }}">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    /* CSS untuk memperbaiki navbar di mobile */
    @media (max-width: 991.98px) {
        .navbar-collapse {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background-color: #fff;
            z-index: 1000;
            box-shadow: 0 5px 10px rgba(0,0,0,0.1);
            border-top: 1px solid #eee;
        }
        
        .navbar-nav {
            padding: 1rem 0;
        }
        
        .nav-item {
            border-bottom: 1px solid #f5f5f5;
        }
        
        .nav-item:last-child {
            border-bottom: none;
        }
        
        .nav-link {
            padding: 0.75rem 1.5rem;
            font-size: 14px !important;
        }
        
        /* Pastikan navbar brand tidak terlalu besar di mobile */
        .navbar-brand img {
            height: 50px !important;
            max-height: 50px;
        }
    }
    
    @media (max-width: 575.98px) {
        .navbar-brand img {
            height: 40px !important;
        }
        
        .container {
            padding-left: 15px;
            padding-right: 15px;
        }
    }
</style>