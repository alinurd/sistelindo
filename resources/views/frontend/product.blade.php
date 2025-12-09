@extends('frontend.layouts.app')

@section('content')
    {{-- TOP SPACING --}}
    <section class="w-full text-center mb-16 hero-wrapper animate-fade-in">
        <h2 class="text-4xl font-bold ">
            <span class="text-title mb-3 animate-fade-in mt-5 text-center">Product and <span
                    class="text-highlight"><strong>Service</strong></span></span>
        </h2>
    </section>
    <section class="container mx-auto px-4">
        <div class="row align-items-center mt-5">
            <div class="col-lg-12 mb-5 animate-fade-in stagger-delay-1">
                <div class="text-center">
                    <img src="{{ asset('assets/img/material/sistelindo-content-01.png')}}" class="rounded-lg shadow w-100 h-auto hover-lift"
                        style="max-width: 1000px; height: 330px;" />
                </div>
            </div>
        </div>
    </section>

    <div class="section-divider animate-fade-in stagger-delay-3"></div>

    <section class="text-center mt-5 px-4">
        <span class="text-title mb-3 animate-fade-in">Empowering <span
                class="text-highlight"><strong>Business</strong></span></span>
        <div class="animate-fade-in stagger-delay-1">
            <p class="text-gray-600 mx-auto mb-10" style="max-width: 700px;">
                To become a trusted company in the field of internet, data communication
                services and ICT solutions in IndonesiaTo become a trusted company in the field of internet, data
                communication
                services and ICT solutions in IndonesiaTo become a trusted company in the field of internet, data
                communication
                services and ICT solutions in IndonesiaTo become a trusted company in the field of internet, data
                communication
                services and ICT solutions in Indonesia
            </p>
        </div>
    </section>

    <div class="section-divider animate-fade-in"></div>

    <section class="mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 animate-slide-left stagger-delay-1">
                    <img src="{{ asset('assets/img/material/sistelindo-internet-solution-01.png')}}" class="rounded-lg  object-cover w-100 h-auto hover-grow"
                        alt="" style="max-width: 450px; height: 330px;">
                </div>
                <div class="col-lg-6 offset-lg-1 animate-slide-right stagger-delay-2">
                    <span class="text-title ">Sistelindo <span class="text-highlight"><strong>Internet
                                Solution</strong></span></span>
                    <span class="" style="font-size: 12px; color: #064b90">High Quality Dedication Internet</span>
                    <p class="text-muted mt-3">
                        Welcome to PT Sistelindo Mitralintas (referred to as
                        Sistelindo) - a distinguished service provider offering a
                        comprehensive range of internet, data communication,
                        and value-added network services.
                    </p>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 d-flex mb-4">
                            <img src="{{ asset('assets/img/material/p1.png')}}" width="50" class="shadow-sm rounded me-3" />
                            <div>
                                <p class="text-muted small mb-2">
                                    Internet II
                                </p>
                            </div>
                        </div>
                         
                        <div class="col-lg-6 d-flex mb-4">
                            <img src="{{ asset('assets/img/material/p2.png')}}" width="50" class="shadow-sm rounded me-3" />
                            <div>
                                <p class="text-muted small mb-2">
                                    Layanan Internet Untuk Akses Jaringan
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex mb-4">
                            <img src="{{ asset('assets/img/material/p3.png')}}" width="50" class="shadow-sm rounded me-3" />
                            <div>
                                <p class="text-muted small mb-2">
                                    Bandwidth 1:1
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex mb-4">
                            <img src="{{ asset('assets/img/material/p3.png')}}" width="50" class="shadow-sm rounded me-3" />
                            <div>
                                <p class="text-muted small mb-2">
                                    Monitor Bandwidth Multi Router Trafic
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex mb-4">
                            <img src="{{ asset('assets/img/material/p4.png')}}" width="50" class="shadow-sm rounded me-3" />
                            <div>
                                <p class="text-muted small mb-2">
                                    4 IP Public
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex mb-4">
                            <img src="{{ asset('assets/img/material/p6.png')}}" width="50" class="shadow-sm rounded me-3" />
                            <div>
                                <p class="text-muted small mb-2">
                                    Static Protocol Routing
                                </p>
                            </div>
                        </div>
                         
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="section-divider animate-fade-in"></div>
    @include('frontend.sections.line-of')

    <div class="section-divider animate-fade-in"></div>
    <section class="py-5 animate-fade-in">
        <span class="text-title mb-3 animate-fade-in mt-5 text-center">Product and <span
                class="text-highlight"><strong>Service</strong></span></span>
        <div class="container">

            <!-- SERVICE LIST -->
            <div class="row justify-content-center">
                @php
                    $visibleCount = 3;
                    $totalFacilities = count($facility);
                @endphp

                <!-- Kontainer untuk Konten -->
                <div id="facilityContainer" class="col-12">
                    @for ($i = 0; $i < min($visibleCount, $totalFacilities); $i++)
                        @php $p = $facility[$i]; @endphp
                        <div class="col-lg-8 mx-auto d-flex mb-4 facility-item">
                            <img src="{{ asset($p->image) }}" width="150" height="100"
                                class="shadow-sm rounded me-3" />
                            <div>
                                <h5 class="fw-bold mb-1">{{ $p->title }}</h5>
                                <p class="text-muted small mb-2">
                                    {{ $p->description }}
                                </p>
                                <hr>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Floating Navigation Buttons (Pojok Kanan Bawah) -->
        <div class="facility-floating-nav-buttons">
            <button type="button" class="facility-nav-btn facility-prev-btn" id="facilityPrevBtn">
                <i class="fas fa-chevron-up"></i>
            </button>
            <button type="button" class="facility-nav-btn facility-next-btn" id="facilityNextBtn">
                <i class="fas fa-chevron-down"></i>
            </button>
        </div>
    </section>

        <div class="section-divider animate-fade-in"></div>

    <section class="py-5 animate-fade-in" id="coreServicesSection">

        <div class="container position-relative">
            <!-- PRODUCT LIST - Layout 2x2 -->
            <div class="row justify-content-center g-4" id="productContainer">
                @php
                    $visibleCount = 4; // Menampilkan 4 produk per halaman
                    $totalProducts = count($product);
                @endphp

                @for ($i = 0; $i < min($visibleCount, $totalProducts); $i++)
                    @php $p = $product[$i]; @endphp
                    @if ($i < 2)
                        <!-- Dua produk pertama di row atas -->
                        <div class="col-md-6 col-lg-6 animate-fade-in stagger-delay-1 product-item">
                            <div class=" text-center p-4 h-100 border rounded-lg shadow-sm">
                                <div class=" mb-3">
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
                    @endif
                @endfor
                
                <!-- Row baru untuk produk 3 dan 4 -->
                <div class="w-100"></div> <!-- Clearfix untuk membuat row baru -->
                
                @for ($i = 0; $i < min($visibleCount, $totalProducts); $i++)
                    @php $p = $product[$i]; @endphp
                    @if ($i >= 2 && $i < 4)
                        <!-- Dua produk berikutnya di row bawah -->
                        <div class="col-md-6 col-lg-6 animate-fade-in stagger-delay-2 product-item">
                            <div class=" text-center p-4 h-100 border rounded-lg shadow-sm">
                                <div class=" mb-3">
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
                    @endif
                @endfor
            </div>
            
            <!-- Navigation Buttons untuk Product - Dipindahkan ke dalam section -->
            
        </div>
        <div class="product-section-nav-buttons" id="productSectionNavButtons">
                <button type="button" class="product-nav-btn product-prev-btn" id="productPrevBtn">
                    <i class="fas fa-chevron-up"></i>
                </button>
                <button type="button" class="product-nav-btn product-next-btn" id="productNextBtn">
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
    </section>

    <style>
        /* Floating Navigation Buttons Styling untuk Facility (tetap seperti sebelumnya) */
        .facility-floating-nav-buttons {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        /* Navigation Buttons Styling untuk Product - DI DALAM SECTION */
        .product-section-nav-buttons {
            position: absolute;
            right: 15px;
                bottom: 0px;

            /* top: 50%; */
            transform: translateY(-50%);
            z-index: 100;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .product-nav-btn,
        .facility-nav-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: white;
            border: 2px solid #0d6efd;
            color: #0d6efd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .product-nav-btn:hover:not(:disabled),
        .facility-nav-btn:hover:not(:disabled) {
            background: #0d6efd;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(13, 110, 253, 0.3);
        }

        .product-nav-btn:active:not(:disabled),
        .facility-nav-btn:active:not(:disabled) {
            transform: translateY(0);
        }

        .product-nav-btn:disabled,
        .facility-nav-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
            border-color: #6c757d;
            color: #6c757d;
        }

        
        /* Animasi untuk konten */
        .facility-item,
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

        /* Responsive */
        @media (max-width: 768px) {
            .facility-floating-nav-buttons {
                bottom: 20px;
                right: 20px;
            }
            
            /* Untuk product, ubah posisi tombol di mobile */
            .product-section-nav-buttons {
                position: static;
                transform: none;
                flex-direction: row;
                justify-content: center;
                margin-top: 30px;
                right: auto;
                top: auto;
            }
            
            .product-nav-btn,
            .facility-nav-btn {
                width: 45px;
                height: 45px;
                font-size: 1rem;
            }
        }
        
        @media (max-width: 576px) {
            .facility-floating-nav-buttons {
                bottom: 20px;
            }
        }
    </style>

    <script>
        // ============================
        // FACILITY SCRIPT
        // ============================
        const facilities = @json($facility);
        const facilityVisibleCount = 3;
        let facilityCurrentIndex = 0;
        const totalFacilities = facilities.length;

        const facilityContainer = document.getElementById('facilityContainer');
        const facilityPrevBtn = document.getElementById('facilityPrevBtn');
        const facilityNextBtn = document.getElementById('facilityNextBtn');

        // Fungsi untuk update tampilan facility
        function updateFacilityDisplay() {
            facilityContainer.innerHTML = '';
            const endIndex = Math.min(facilityCurrentIndex + facilityVisibleCount, totalFacilities);

            for (let i = facilityCurrentIndex; i < endIndex; i++) {
                const facility = facilities[i];
                const imageSrc = facility.image.startsWith('http') ? facility.image :
                    facility.image.startsWith('/') ? facility.image : '/' + facility.image;

                const facilityElement = document.createElement('div');
                facilityElement.className = 'col-lg-8 mx-auto d-flex mb-4 facility-item';
                facilityElement.innerHTML = `
                    <img src="${imageSrc}" width="150" height="100" class="shadow-sm rounded me-3" />
                    <div>
                        <h5 class="fw-bold mb-1">${facility.title}</h5>
                        <p class="text-muted small mb-2">
                            ${facility.description}
                        </p>
                        <hr>
                    </div>
                `;
                facilityContainer.appendChild(facilityElement);
            }

            updateFacilityButtonStates();
        }

        // Fungsi untuk update status tombol facility
        function updateFacilityButtonStates() {
            const hasPrev = facilityCurrentIndex > 0;
            const hasNext = (facilityCurrentIndex + facilityVisibleCount) < totalFacilities;

            facilityPrevBtn.disabled = !hasPrev;
            facilityNextBtn.disabled = !hasNext;
        }

        // Fungsi navigasi facility
        function navigateFacility(direction) {
            if (direction === 'up' && facilityCurrentIndex > 0) {
                facilityCurrentIndex = Math.max(0, facilityCurrentIndex - facilityVisibleCount);
                updateFacilityDisplay();
            } else if (direction === 'down' && (facilityCurrentIndex + facilityVisibleCount) < totalFacilities) {
                facilityCurrentIndex = Math.min(totalFacilities - facilityVisibleCount, facilityCurrentIndex + facilityVisibleCount);
                updateFacilityDisplay();
            }
        }

        // ============================
        // PRODUCT SCRIPT
        // ============================
        const products = @json($product);
        const productVisibleCount = 4; // 4 produk per halaman
        let productCurrentIndex = 0;
        const totalProducts = products.length;

        const productContainer = document.getElementById('productContainer');
        const productPrevBtn = document.getElementById('productPrevBtn');
        const productNextBtn = document.getElementById('productNextBtn');
        const productSectionNavButtons = document.getElementById('productSectionNavButtons');

        // Fungsi untuk update tampilan product dengan layout 2x2
        function updateProductDisplay() {
            productContainer.innerHTML = '';
            const endIndex = Math.min(productCurrentIndex + productVisibleCount, totalProducts);

            // Row atas (produk 1 dan 2)
            let row1 = '';
            for (let i = productCurrentIndex; i < Math.min(productCurrentIndex + 2, endIndex); i++) {
                const product = products[i];
                const imageSrc = product.image.startsWith('http') ? product.image :
                    product.image.startsWith('/') ? product.image : '/' + product.image;

                row1 += `
                    <div class="col-md-6 col-lg-6 animate-fade-in stagger-delay-1 product-item">
                        <div class="text-center p-4 h-100 border rounded-lg shadow-sm">
                            <div class=" mb-3">
                                <img src="${imageSrc}" class="rounded shadow w-100 h-auto mb-4 hover-grow"
                                    alt="${product.title}" style="max-width: 350px; height: 220px; object-fit: cover;">
                            </div>
                            <h4 class="font-semibold text-xl text-highlight mb-4">
                                ${product.title}
                            </h4>
                            <p class="text-gray-700 fs-5">
                                ${product.description}
                            </p>
                        </div>
                    </div>
                `;
            }

            // Row bawah (produk 3 dan 4)
            let row2 = '';
            for (let i = productCurrentIndex + 2; i < endIndex; i++) {
                const product = products[i];
                const imageSrc = product.image.startsWith('http') ? product.image :
                    product.image.startsWith('/') ? product.image : '/' + product.image;

                row2 += `
                    <div class="col-md-6 col-lg-6 animate-fade-in stagger-delay-2 product-item">
                        <div class="text-center p-4 h-100 border rounded-lg shadow-sm">
                            <div class=" mb-3">
                                <img src="${imageSrc}" class="rounded shadow w-100 h-auto mb-4 hover-grow"
                                    alt="${product.title}" style="max-width: 350px; height: 220px; object-fit: cover;">
                            </div>
                            <h4 class="font-semibold text-xl text-highlight mb-4">
                                ${product.title}
                            </h4>
                            <p class="text-gray-700 fs-5">
                                ${product.description}
                            </p>
                        </div>
                    </div>
                `;
            }

            // Tambahkan ke container
            productContainer.innerHTML = row1;
            if (row2) {
                productContainer.innerHTML += '<div class="w-100"></div>' + row2;
            }

            updateProductButtonStates();
        }

        // Fungsi untuk update status tombol product
        function updateProductButtonStates() {
            const hasPrev = productCurrentIndex > 0;
            const hasNext = (productCurrentIndex + productVisibleCount) < totalProducts;

            productPrevBtn.disabled = !hasPrev;
            productNextBtn.disabled = !hasNext;
        }

        // Fungsi navigasi product
        function navigateProduct(direction) {
            if (direction === 'up' && productCurrentIndex > 0) {
                productCurrentIndex = Math.max(0, productCurrentIndex - productVisibleCount);
                updateProductDisplay();
            } else if (direction === 'down' && (productCurrentIndex + productVisibleCount) < totalProducts) {
                productCurrentIndex = Math.min(totalProducts - productVisibleCount, productCurrentIndex + productVisibleCount);
                updateProductDisplay();
            }
        }

        // ============================
        // EVENT LISTENERS
        // ============================
        document.addEventListener('DOMContentLoaded', function() {
            // Facility event listeners
            facilityPrevBtn.addEventListener('click', () => navigateFacility('up'));
            facilityNextBtn.addEventListener('click', () => navigateFacility('down'));
            updateFacilityDisplay();

            // Product event listeners
            productPrevBtn.addEventListener('click', () => navigateProduct('up'));
            productNextBtn.addEventListener('click', () => navigateProduct('down'));
            updateProductDisplay();

            // Keyboard navigation untuk product - hanya aktif di section product
            const coreServicesSection = document.getElementById('coreServicesSection');
            
            if (coreServicesSection) {
                // Tambahkan event listener untuk section product
                coreServicesSection.addEventListener('keydown', (e) => {
                    if (e.key === 'ArrowUp') {
                        e.preventDefault();
                        navigateProduct('up');
                    } else if (e.key === 'ArrowDown') {
                        e.preventDefault();
                        navigateProduct('down');
                    }
                });
                
                // Fokus ke section product saat di-scroll ke sana
                coreServicesSection.addEventListener('mouseenter', () => {
                    coreServicesSection.focus();
                });
                
                // Set tabindex agar bisa difokus
                coreServicesSection.setAttribute('tabindex', '-1');
            }
        });

        // Responsif: Sesuaikan posisi tombol facility (product sudah dalam section)
        function adjustFloatingButtons() {
            if (window.innerWidth < 768) {
                document.querySelector('.facility-floating-nav-buttons').style.right = '20px';
                document.querySelector('.facility-floating-nav-buttons').style.bottom = '20px';
            } else {
                document.querySelector('.facility-floating-nav-buttons').style.right = '30px';
                document.querySelector('.facility-floating-nav-buttons').style.bottom = '30px';
            }
        }

        window.addEventListener('load', adjustFloatingButtons);
        window.addEventListener('resize', adjustFloatingButtons);
    </script>
@endsection