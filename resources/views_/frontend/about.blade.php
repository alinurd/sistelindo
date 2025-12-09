@extends('frontend.layouts.app')

@section('content') 

     {{-- TOP SPACING --}} 
    <section class="w-full text-center mb-16 hero-wrapper animate-fade-in">
        <h2 class="text-4xl font-bold ">
            <span class="text-primary">Why Sistelindo?</span>
        </h2>
    </section>
 
    {{-- Image Left (450x330 approx) --}}
    <section class="mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 animate-slide-left stagger-delay-1">
                    <div id="heroSlider" class="carousel slide" data-bs-ride="carousel">

                        @php
                            $banner=[
                                [ 
                                    'image'=>'assets/img/material/1.png',
                    ],
                                [ 
                                    'image'=>'assets/img/material/2.png',
                    ],
                             ]
                        @endphp
                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        @foreach($banner as $i => $p)
                        <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="{{ $i }}"
                            class="{{ $i === 0 ? 'active' : '' }}" 
                            aria-current="{{ $i === 0 ? 'true' : 'false' }}"
                            data-index="{{ $i }}">
                        </button>
                        @endforeach
                    </div>

                    <!-- Slides -->
                    <div class="carousel-inner">
                        @foreach($banner as $i => $p)
                        <div class="carousel-item {{ $i === 0 ? 'active' : '' }}" 
                             data-title=""
                             data-dsc="">
                             
                            <img src="{{ asset($p['image']) }}" class="d-block  hero-slider-img "
                              {{-- class="shadow object-cover w-100 h-auto hover-grow" --}}
                          {{-- style="max-width: 450px; height: 330px;" --}}
                         
                         alt="{-">
                        </div>
                        @endforeach 
                    </div> 
                </div> 
                </div>
                <div class="col-lg-6 offset-lg-1 animate-slide-right stagger-delay-2">
                    <span class="text-title mb-3">Company <span class="text-highlight"><strong>Review</strong></span></span>
                     <p class="text-muted">
                        {!!$data['review']!!}
                    </p>
                   
                </div>
            </div>
        </div>
    </section>

 

    <section class="text-center mt-5 px-4">
        <span class="text-title mb-3 animate-fade-in">Company <span class="text-highlight"><strong>Vision</strong></span></span>
        <div class="animate-fade-in stagger-delay-1">
            <p class="text-gray-600 mx-auto mb-10" style="max-width: 700px;">
                {!!$data['vision']!!}
            </p>
        </div>

                <span class="text-title mb-3 animate-fade-in mt-5">Company <span class="text-highlight"><strong>Mission</strong></span></span>
        <div class="animate-fade-in stagger-delay-3">
            <div class="animate-fade-in stagger-delay-1">
            <p class="text-gray-600 mx-auto mb-10" style="max-width: 500px;">
               {!!$data['mission']!!}
            </p>
        </div>
        </div>
    </section>

 

    {{-- LICENSE HOLDER --}}
    <section class="container mx-auto px-4">
         <span class="text-title mb-3 animate-fade-in mt-5 text-center">License <span class="text-highlight"><strong>Holder</strong></span></span>
        
        <div class="row align-items-center">
            <div class="col-lg-12 mb-5 animate-fade-in stagger-delay-1">
                <div class="text-center">
                     <img src="{{ asset('assets/img/material/5.png')}}" 
                         class="rounded-lg shadow w-100 h-auto hover-lift"
                         style="max-width: 1200px; height: 500px;" /> 
                </div>
            </div>
            
            <div class="col-lg-10 offset-lg-1 animate-fade-in stagger-delay-2">
                <div class="mb-4 p-4 rounded ">
                    <strong class="d-block mb-2 fs-5 text-primary">Internet Service Provider (Nationwide Coverage)</strong>
                    <p class="text-gray-700 mb-0">
                       {!!$data['service']!!}
                    </p>
                </div>
                <hr>
                
                <div class="mb-4 p-4 rounded ">
                    <strong class="d-block mb-2 fs-5 text-primary">Sistem Komunikasi Data</strong>
                    <p class="text-gray-700 mb-0">
                        {!!$data['sisko']!!}
                    </p>
                </div>
                 <hr>
                <div class="p-4 rounded ">
                    <strong class="d-block mb-2 fs-5 text-primary">Lisensi ITKP</strong>
                    <p class="text-gray-700 mb-0">
                         {!!$data['lisensi']!!}
                    </p>
                </div>
            </div>
        </div>
    </section>

 
    {{-- TIMELINE --}}
    <section class="text-center mt-5 px-4">
        <span class="text-title mb-3 animate-fade-in mt-5 text-center">31 Years Journey of Sistelindo in <br><span class="text-highlight"><strong>Cyberspace Industry</strong></span></span>
 
        <div class="container animate-fade-in stagger-delay-1"> 
            <img src="{{ asset('assets/img/material/4.jpg')}}"
         class="mx-auto w-[600px] rounded"
         alt="Timeline" 
         style="width: 1000px; height: 1100px;" /> 

 
        </div>
    </section>

    <div class="section-divider animate-fade-in"></div>

    {{-- ISO QUALITY MANAGEMENT SYSTEM --}}
    
@include('frontend.sections.iso')

 
<section class="text-center mb-24 px-4 mt-5 position-relative" id="coreServicesSection">
    <h2 class="text-3xl font-bold text-[#003366] mb-12 animate-fade-in">
        Core Services: Internet Service Provider <br>
        and System Integrator
    </h2>
<br><br>
    <div class="container position-relative">
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
                        <h4 class="font-semibold text-xl text-highlight mb-4">
                            {{ $p->title }}
                        </h4>
                        <p class="text-gray-700 fs-5">
                            {!! $p->description !!}
                        </p>
                    </div>
                </div>
            @endfor
            
            <!-- Navigation Buttons untuk Mobile -->
            <div class="col-12">
                <div class="product-nav-buttons-mobile d-lg-none mt-4">
                    <button type="button" class="product-nav-btn product-prev-btn" id="productPrevBtnMobile">
                        <i class="fas fa-chevron-up"></i>
                    </button>
                    <button type="button" class="product-nav-btn product-next-btn ms-2" id="productNextBtnMobile">
                         <i class="fas fa-chevron-down"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Floating Navigation Buttons untuk Desktop (DI LUAR CONTAINER) -->
        <div class="product-floating-nav-buttons-desktop d-none d-lg-block" id="productNavButtonsDesktop">
            <button type="button" class="product-nav-btn product-prev-btn" id="productPrevBtnDesktop">
                <i class="fas fa-chevron-up"></i>
            </button>
            <button type="button" class="product-nav-btn product-next-btn" id="productNextBtnDesktop">
                <i class="fas fa-chevron-down"></i>
            </button>
        </div>
    </div>
</section>

<style>
/* Floating Navigation Buttons untuk Desktop - DI LUAR CONTAINER */
.product-floating-nav-buttons-desktop {
    position: absolute;
    bottom: 0px;
    right: -70px; /* Posisi di luar container */
    transform: translateY(-50%);
    z-index: 100;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

/* Navigation Buttons untuk Mobile */
.product-nav-buttons-mobile {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
    padding: 10px 0;
}

/* Tombol styling umum */
.product-nav-btn {
    min-width: 50px;
    height: 50px;
    border-radius: 25px;
    background: white;
    border: 2px solid #0d6efd;
    color: #0d6efd;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
    cursor: pointer;
    padding: 0 20px;
}

.product-nav-btn:hover:not(:disabled) {
    background: #0d6efd;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(13, 110, 253, 0.3);
}

.product-nav-btn:active:not(:disabled) {
    transform: translateY(0);
}

.product-nav-btn:disabled {
    opacity: 0.4;
    cursor: not-allowed;
    border-color: #6c757d;
    color: #6c757d;
}

/* Desktop tombol - lingkaran kecil tanpa teks */
.product-floating-nav-buttons-desktop .product-nav-btn {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    padding: 0;
}

/* Mobile tombol - horizontal dengan teks */
.product-nav-buttons-mobile .product-nav-btn {
    border-radius: 25px;
    padding: 0 20px;
    gap: 8px;
}

/* Styling untuk service card */
.service-card {
    background: white;
    border-radius: 12px;
    padding: 20px;
    height: 100%;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid #e9ecef;
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1) !important;
}

.hover-grow {
    transition: transform 0.3s ease;
}

.hover-grow:hover {
    transform: scale(1.05);
}

/* Animasi untuk konten */
.product-item {
    animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive adjustments */
@media (max-width: 1400px) {
    .product-floating-nav-buttons-desktop {
        right: -60px;
    }
}

@media (max-width: 1200px) {
    .product-floating-nav-buttons-desktop {
        right: -50px;
    }
}

@media (max-width: 992px) {
    .product-floating-nav-buttons-desktop {
        display: none !important;
    }
    
    .product-nav-buttons-mobile {
        display: flex !important;
    }
}

@media (max-width: 768px) {
    .product-nav-btn {
        height: 45px;
        font-size: 0.9rem;
        padding: 0 15px;
    }
    
    .product-nav-buttons-mobile .product-nav-btn {
        min-width: 140px;
    }
    
    .service-card {
        padding: 15px;
    }
    
    .service-image img {
        height: 180px !important;
    }
}

@media (max-width: 576px) {
    .service-image img {
        height: 150px !important;
    }
    
    .product-nav-buttons-mobile {
        flex-direction: column;
        gap: 10px;
    }
    
    .product-nav-buttons-mobile .product-nav-btn {
        width: 100%;
        max-width: 250px;
        margin: 0 !important;
    }
}
</style>

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
                <h4 class="font-semibold text-xl text-highlight mb-4">
                    ${product.title || ''}
                </h4> 
                <p class="text-gray-700 fs-5">
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
        <div class="product-nav-buttons-mobile d-lg-none mt-4">
            <button type="button" class="product-nav-btn product-prev-btn" id="productPrevBtnMobile">
                <i class="fas fa-chevron-up"></i> Sebelumnya
            </button>
            <button type="button" class="product-nav-btn product-next-btn ms-2" id="productNextBtnMobile">
                Selanjutnya <i class="fas fa-chevron-down"></i>
            </button>
        </div>
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
    const allPrevButtons = document.querySelectorAll('.product-prev-btn');
    const allNextButtons = document.querySelectorAll('.product-next-btn');
    
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

 