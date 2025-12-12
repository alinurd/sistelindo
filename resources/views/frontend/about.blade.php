@extends('frontend.layouts.app')

@section('content')
    {{-- TOP SPACING --}}
    <section class="w-full text-center mb-16 hero-wrapper animate-fade-in">
        <h2 class="text-4xl font-bold ">
            <span class="text-primary">Why Sistelindo?</span>
        </h2>
    </section>
   <section class="mt-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Gambar di kiri -->
            <div class="col-lg-6 col-md-6 animate-slide-left stagger-delay-1">
                <div id="heroSlider" class="carousel slide" data-bs-ride="carousel">
                    @php
                        $banner = [
                            [
                                'image' => 'assets/img/material/1.png',
                            ],
                            [
                                'image' => 'assets/img/material/2.png',
                            ],
                        ];
                    @endphp

                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        @foreach ($banner as $i => $p)
                            <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="{{ $i }}"
                                class="{{ $i === 0 ? 'active' : '' }}" 
                                aria-current="{{ $i === 0 ? 'true' : 'false' }}"
                                data-index="{{ $i }}">
                            </button>
                        @endforeach
                    </div>

                    <!-- Slides -->
                    <div class="carousel-inner">
                        @foreach ($banner as $i => $p)
                            <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                                <img src="{{ asset($p['image']) }}"
                                    class="d-block w-100 hero-slider-img rounded shadow-sm"
                                    alt="Slide {{ $i + 1 }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Keterangan review di kanan - DI MODIFIKASI -->
            <div class="col-lg-6 col-md-6 animate-slide-right stagger-delay-2 ps-lg-4 ps-md-3 d-flex flex-column justify-content-center mt-5">
                <div class="review-content">
                    <span class="text-title mb-3 d-block">
                        Company <span class="text-highlight"><strong>Review</strong></span>
                    </span>
                    <p class="text-muted mb-0">
                        {!! $data['review'] !!}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <style>
    /* Tambahkan styling untuk review section */
    .review-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-height: 300px; /* Tinggi minimum agar konten tidak terlalu pendek */
    }

  

    /* Pastikan gambar slider memiliki tinggi yang konsisten */
    .hero-slider-img {
        height: 400px;
        object-fit: cover;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .review-content {
            min-height: auto;
            padding-top: 30px; /* Tambah jarak atas saat di mobile */
        }

        .text-title {
            font-size: 1.5rem;
            text-align: center;
        }

        .text-muted {
            font-size: 0.95rem;
            text-align: left;
        }

        /* Di mobile, gambar di atas, review di bawah */
        .row.align-items-center {
            flex-direction: column;
        }

        .col-lg-6.col-md-6 {
            width: 100%;
            padding-left: 0;
            padding-right: 0;
        }

        .ps-lg-4.ps-md-3 {
            padding-left: 0 !important;
        }
    }

    @media (max-width: 768px) {
        .hero-slider-img {
            height: 300px;
        }

        .review-content {
            min-height: auto;
            padding: 20px 0;
        }

        .text-title {
            font-size: 1.3rem;
        }
    }

    @media (max-width: 576px) {
        .hero-slider-img {
            height: 250px;
        }

        .review-content {
            padding: 15px 0;
        }

        .text-title {
            font-size: 1.2rem;
        }

        .text-muted {
            font-size: 0.9rem;
        }
    }
</style>
    <section class="text-center mt-5 px-4">
        <span class="text-title mb-1 animate-fade-in">Company <span
                class="text-highlight"><strong>Vision</strong></span></span>
        <div class="animate-fade-in stagger-delay-1">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-5">
                    <p class="text-muted mx-auto">
                        {!! $data['vision'] !!}
                    </p>
                </div>
            </div>


        </div>

        <span class="text-title mb-1 animate-fade-in mt-5">Company <span
                class="text-highlight"><strong>Mission</strong></span></span>
        <div class="animate-fade-in stagger-delay-3">
            <div class="animate-fade-in stagger-delay-1">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-5">
                        <p class="text-muted mx-auto">
                            {!! $data['mission'] !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    {{-- LICENSE HOLDER --}}
    <section class="container mx-auto px-4">
        <span class="text-title mb-3 animate-fade-in mt-5 text-center">License <span
                class="text-highlight"><strong>Holder</strong></span></span>
<br>
        <div class="row align-items-center">
            <div class="col-lg-12 mb-5 animate-fade-in stagger-delay-1">
                <div class="text-center">
                    <img src="{{ asset('assets/img/material/5.png') }}" class="rounded-lg shadow w-100 h-auto hover-lift"
                        style="max-width: 1200px; height: 500px;" />
                </div>
            </div>

            <div class="col-lg-10 offset-lg-1 animate-fade-in stagger-delay-2">
                <div class="mb-4 p-4 rounded ">
                    <strong class="d-block mb-2 fs-5 text-primary">Internet Service Provider (Nationwide Coverage)</strong>
                    <p class="text-gray-700 mb-0">
                        {!! $data['service'] !!}
                    </p>
                </div>
                <hr>

                <div class="mb-4 p-4 rounded ">
                    <strong class="d-block mb-2 fs-5 text-primary">Sistem Komunikasi Data</strong>
                    <p class="text-gray-700 mb-0">
                        {!! $data['sisko'] !!}
                    </p>
                </div>
                <hr>
                <div class="p-4 rounded ">
                    <strong class="d-block mb-2 fs-5 text-primary">Lisensi ITKP</strong>
                    <p class="text-gray-700 mb-0">
                        {!! $data['lisensi'] !!}
                    </p>
                </div>
            </div>
        </div>
    </section>


    {{-- TIMELINE --}}
    <section class="text-center mt-5 px-4">
        <span class="text-title mb-3 animate-fade-in mt-5 text-center">
            31 Years Journey of Sistelindo in <br>
            <span class="text-highlight"><strong>Cyberspace Industry</strong></span>
        </span>

        <div class="container animate-fade-in stagger-delay-1">
            <div class="row justify-content-center">
                <div class="col-12">
                    <!-- Container untuk gambar timeline -->
                    <div class="timeline-image-container">
                        <img src="{{ asset('assets/img/material/4.jpg') }}" class="img-fluid timeline-image "
                            alt="Sistelindo Timeline - 31 Years Journey" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Styling untuk timeline */
        .timeline-image-container {
            position: relative;
            margin: 0 auto;
            max-width: 1000px;
            overflow: hidden;
        }

        .timeline-image {
            width: 100%;
            height: auto;
            object-fit: contain;
            transition: transform 0.3s ease;
        }



        /* Responsive styles */
        @media (max-width: 1200px) {
            .timeline-image-container {
                max-width: 900px;
            }
        }

        @media (max-width: 992px) {
            .timeline-image-container {
                max-width: 800px;
            }

            .text-title {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 768px) {
            .timeline-image-container {
                max-width: 100%;
                padding: 0 10px;
            }

            .text-title {
                font-size: 1.6rem;
                line-height: 1.4;
            }

            section {
                padding: 1rem 0;
            }
        }

        @media (max-width: 576px) {
            .text-title {
                font-size: 1.4rem;
            }

            .timeline-image-container {
                padding: 0 5px;
            }

            .timeline-image {
                border-radius: 8px;
            }
        }

        @media (max-width: 400px) {
            .text-title {
                font-size: 1.3rem;
            }

            section {
                padding: 0.5rem 0;
            }
        }

        /* Untuk device dengan orientasi landscape */
        @media (max-height: 600px) and (orientation: landscape) {
            .timeline-image-container {
                max-height: 400px;
                overflow-y: auto;
            }

            .timeline-image {
                max-height: 380px;
            }
        }
    </style>



    {{-- ISO QUALITY MANAGEMENT SYSTEM --}}

    @include('frontend.sections.iso')


    <section class="text-center mb-24 px-4 mt-5 position-relative" id="coreServicesSection">
        
        <br>
        <span class="text-title mb-3 d-block">
                        Core Services: <span class="text-highlight"><strong>Internet Service Provider <br>
            and System Integrator</strong></span>
                    </span>

        <div class="container mt-5">
            <div class="row justify-content-center g-4" id="productContainer">
                @php
                    $visibleCount = 3;
                    $totalProducts = count($product);
                @endphp

                @for ($i = 0; $i < min($visibleCount, $totalProducts); $i++)
                    @php $p = $product[$i]; @endphp
                    <div class="col-md-6 col-lg-4 animate-fade-in ">
                        <div class="text-center p-4 h-100 ">
                            <div class="service-image mb-3">
                                <img src="{{ asset($p->image) }}" class="rounded shadow w-100 h-auto mb-4 hover-grow"
                                    alt="{{ $p->title }}" style="max-width: 350px; height: 220px; object-fit: cover;">
                            </div>
                             <h3 class="text-3xl font-bold text-[#003366] mb-3">
                     <span class="text-primary">{{$p->title}} </span>
                </h3>

                            
                            <p class="text-gray-700 fs-5">
                                {!! $p->description !!}
                            </p>
                        </div>
                    </div>
                @endfor


            </div>

           <div class="d-flex justify-content-end mt-4">
            <div class="bottom-right-nav-buttons">
                <button type="button" class="nav-btn prev-btn" id="productPrevBtnDesktop">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button type="button" class="nav-btn next-btn" id="productNextBtnDesktop">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        </div>
    </section>

    <script>
        // Data products dari PHP ke JavaScript
        const products = @json($product);
        const visibleCount = 3;
        let currentIndex = 0;
        const totalProducts = products.length;

        // Fungsi untuk update tampilan
        function updateDisplay() {
            // Kosongkan kontainer
            const productContainer = document.getElementById('productContainer');
            productContainer.innerHTML = '';

            // Hitung indeks akhir
            const endIndex = Math.min(currentIndex + visibleCount, totalProducts);

            // Tambahkan product items
            for (let i = currentIndex; i < endIndex; i++) {
                const product = products[i];

                // Pastikan path gambar benar
                const imageSrc = product.image.startsWith('http') ? product.image :
                    product.image.startsWith('/') ? product.image : '/' + product.image;

                // Pastikan deskripsi aman untuk HTML
                const description = product.description || '';

                // Buat elemen
                const productElement = document.createElement('div');
                productElement.className = 'col-md-6 col-lg-4 animate-fade-in stagger-delay-1 product-item';
                productElement.innerHTML = `
            <div class="service-card text-center p-4 h-100 border rounded-lg shadow-sm">
                <div class="service-image mb-3">
                    <img src="${imageSrc}" 
                         class="rounded shadow w-100 h-auto mb-4 hover-grow"
                         alt="${product.title || ''}"
                         style="max-width: 350px; height: 220px; object-fit: cover;">
                </div>
                       <h4 class="text- font-bold text-[#003366] mb-3">
                     <span class="text-primary">${product.title || ''} </span>
                </h4>
                
                <p class="text-gray-700 fs-6">
                    ${description}
                </p>
            </div>
        `;

                productContainer.appendChild(productElement);
            }

            // Tambahkan kembali container tombol navigasi mobile
            const mobileNavContainer = document.createElement('div');
            mobileNavContainer.className = 'col-12';
            mobileNavContainer.innerHTML = `
    `;
            productContainer.appendChild(mobileNavContainer);

            // Re-attach event listeners untuk mobile
            const newPrevBtnMobile = document.getElementById('productPrevBtnMobile');
            const newNextBtnMobile = document.getElementById('productNextBtnMobile');

            if (newPrevBtnMobile) newPrevBtnMobile.addEventListener('click', () => navigate('up'));
            if (newNextBtnMobile) newNextBtnMobile.addEventListener('click', () => navigate('down'));

            // Update status semua tombol
            updateButtonStates();
        }

        // Fungsi untuk update status tombol
        function updateButtonStates() {
            const hasPrev = currentIndex > 0;
            const hasNext = (currentIndex + visibleCount) < totalProducts;

            // Update semua tombol (desktop dan mobile)
            const allPrevButtons = document.querySelectorAll('.prev-btn');
            const allNextButtons = document.querySelectorAll('.next-btn');

            allPrevButtons.forEach(btn => {
                btn.disabled = !hasPrev;
                btn.style.opacity = btn.disabled ? '0.4' : '1';
                btn.style.cursor = btn.disabled ? 'not-allowed' : 'pointer';
            });

            allNextButtons.forEach(btn => {
                btn.disabled = !hasNext;
                btn.style.opacity = btn.disabled ? '0.4' : '1';
                btn.style.cursor = btn.disabled ? 'not-allowed' : 'pointer';
            });
        }

        // Fungsi navigasi
        function navigate(direction) {
            if (direction === 'up' && currentIndex > 0) {
                currentIndex = Math.max(0, currentIndex - visibleCount);
                updateDisplay();
            } else if (direction === 'down' && (currentIndex + visibleCount) < totalProducts) {
                currentIndex = Math.min(totalProducts - visibleCount, currentIndex + visibleCount);
                updateDisplay();
            }
        }

        // Inisialisasi
        document.addEventListener('DOMContentLoaded', function() {
            // Setup event listeners untuk desktop
            const prevBtnDesktop = document.getElementById('productPrevBtnDesktop');
            const nextBtnDesktop = document.getElementById('productNextBtnDesktop');

            if (prevBtnDesktop) {
                prevBtnDesktop.addEventListener('click', () => navigate('up'));
            }
            if (nextBtnDesktop) {
                nextBtnDesktop.addEventListener('click', () => navigate('down'));
            }

            // Setup event listeners untuk mobile
            const prevBtnMobile = document.getElementById('productPrevBtnMobile');
            const nextBtnMobile = document.getElementById('productNextBtnMobile');

            if (prevBtnMobile) {
                prevBtnMobile.addEventListener('click', () => navigate('up'));
            }
            if (nextBtnMobile) {
                nextBtnMobile.addEventListener('click', () => navigate('down'));
            }

            // Initial display
            updateDisplay();

            // Tambah keyboard navigation
            document.addEventListener('keydown', (e) => {
                const coreServicesSection = document.getElementById('coreServicesSection');
                if (coreServicesSection) {
                    const rect = coreServicesSection.getBoundingClientRect();
                    const isInSection = rect.top <= window.innerHeight && rect.bottom >= 0;

                    if (isInSection) {
                        if (e.key === 'ArrowUp') {
                            e.preventDefault();
                            navigate('up');
                        } else if (e.key === 'ArrowDown') {
                            e.preventDefault();
                            navigate('down');
                        }
                    }
                }
            });
        });

        // Sesuaikan posisi tombol saat resize
        window.addEventListener('resize', function() {
            updateButtonStates();
        });
    </script>
@endsection
