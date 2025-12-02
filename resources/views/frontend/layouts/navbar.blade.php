@php
    $set = AppSetting::first();
@endphp
{{-- <div class="topbar py-1">
        <div class="container d-flex flex-wrap justify-content-between align-items-center small">
            <div class="d-flex align-items-center gap-3">
            </div>
            <div class="social-icons mt-1">
                <a  class="me-2">
                    <img src="{{ asset('assets/img/icons/id.png') }}" width="40" alt="Bahasa" class="me-1"> In
                </a>
                <a  class="me-2">
                    <img src="{{ asset('assets/img/icons/en.png') }}" width="40" alt="English" class="me-1"> En
                </a> 
            </div>
        </div>
    </div> --}}
<nav class="navbar navbar-expand-lg bg-white">
    <div class="container">

        <a class="navbar-brand fw-bold text-primary" href="#">
             <img src="{{ asset('assets/img/material/logo.png') }}" alt="The Gallery Villa"
                        height="40">
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="nav" class="collapse navbar-collapse">
    <ul class="navbar-nav ms-auto">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('guest.home') }}">Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('guest.about') }}">About Us</a>
        </li>

        <!-- Dropdown Submenu -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Products & Services
            </a>

            <ul class="dropdown-menu" aria-labelledby="productsDropdown">
                 <li><a class="dropdown-item" href="{{ route('guest.subproduct', 1) }}">Service 1</a></li>
                 <li><a class="dropdown-item" href="{{ route('guest.subproduct', 2) }}">Service 1</a></li>
                 <li><a class="dropdown-item" href="{{ route('guest.subproduct', 3) }}">Service 1</a></li>

                <li><hr class="dropdown-divider"></li>

                <li><a class="dropdown-item" href="{{ route('guest.product') }}">Other</a></li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('guest.contact') }}">Contact Us</a>
        </li>

    </ul>
</div>


    </div>
</nav>
