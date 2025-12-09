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

    {{-- OUR SERVICE SECTION --}}
    <section class="py-5 animate-fade-in position-relative">
        <div class="container">
            <h2 class="text-title mb-5 animate-fade-in text-center">Our <span
                    class="text-highlight"><strong>Service</strong></span></h2>
            
            <div class="row justify-content-center g-4">
                <!-- Dependable Card -->
                <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                    <div class="card h-100 border-0 shadow-sm hover-lift service-card" style="max-width: 350px; margin: 0 auto;">
                        <div class="card-body text-center p-4">
                            <div class="service-icon mb-3">
                                <i class="fas fa-shield-alt fa-3x text-primary"></i>
                            </div>
                            <h3 class="card-title text-highlight mb-3 fw-bold">Dependable</h3>
                            <p class="card-text text-muted mb-0">
                                High Quality and Total Services. Providing fully reliable and trustworthy to customers
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Progressive Card -->
                <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                    <div class="card h-100 border-0 shadow-sm hover-lift service-card" style="max-width: 350px; margin: 0 auto;">
                        <div class="card-body text-center p-4">
                            <div class="service-icon mb-3">
                                <i class="fas fa-chart-line fa-3x text-primary"></i>
                            </div>
                            <h3 class="card-title text-highlight mb-3 fw-bold">Progressive</h3>
                            <p class="card-text text-muted mb-0">
                                Constantly Changing and Improving. Continously Innovating to Provide value-added Services as a High Competent System Integrator Company.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Dedicated Card -->
                <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                    <div class="card h-100 border-0 shadow-sm hover-lift service-card" style="max-width: 350px; margin: 0 auto;">
                        <div class="card-body text-center p-4">
                            <div class="service-icon mb-3">
                                <i class="fas fa-handshake fa-3x text-primary"></i>
                            </div>
                            <h3 class="card-title text-highlight mb-3 fw-bold">Dedicated</h3>
                            <p class="card-text text-muted mb-0">
                                Dedicated to Providing Best Possible Service. Fully committed to providing the best Services as the promised Service Level Agreement for Customer Satisfaction.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section-divider animate-fade-in"></div>

    {{-- EMPOWERING BUSINESS SECTION --}}
    <section class="text-center mt-5 px-4">
        <span class="text-title mb-3 animate-fade-in d-block">Empowering <span
                class="text-highlight"><strong>Business</strong></span></span>
        <div class="animate-fade-in stagger-delay-1">
            <p class="text-gray-600 mx-auto mb-10" style="max-width: 700px;">
                To become a trusted company in the field of internet, data communication
                services and ICT solutions in Indonesia
            </p>
        </div>
    </section>

    <div class="section-divider animate-fade-in"></div>

    {{-- INTERNET SOLUTION SECTION --}}
    <section class="mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 animate-slide-left stagger-delay-1">
                    <img src="{{ asset('assets/img/material/sistelindo-internet-solution-01.png')}}" class="rounded-lg object-cover w-100 h-auto hover-grow"
                        alt="Sistelindo Internet Solution"
                        style="max-width: 450px; height: 330px;" />
                </div>
                <div class="col-lg-6 offset-lg-1 animate-slide-right stagger-delay-2">
                    <h2 class="text-title mb-2">Sistelindo <span class="text-highlight"><strong>Internet Solution</strong></span></h2>
                    <p class="text-muted small mb-3" style="color: #064b90">High Quality Dedication Internet</p>
                    <p class="text-muted mb-4">
                        Welcome to PT Sistelindo Mitralintas (referred to as
                        Sistelindo) - a distinguished service provider offering a
                        comprehensive range of internet, data communication,
                        and value-added network services.
                    </p>
                    <div class="row justify-content-center">
                        @foreach([
                            ['icon' => 'p1.png', 'text' => 'Internet II'],
                            ['icon' => 'p2.png', 'text' => 'Layanan Internet Untuk Akses Jaringan'],
                            ['icon' => 'p3.png', 'text' => 'Bandwidth 1:1'],
                            ['icon' => 'p3.png', 'text' => 'Monitor Bandwidth Multi Router Traffic'],
                            ['icon' => 'p4.png', 'text' => '4 IP Public'],
                            ['icon' => 'p6.png', 'text' => 'Static Protocol Routing']
                        ] as $feature)
                        <div class="col-lg-6 d-flex mb-4">
                            <img src="{{ asset('assets/img/material/' . $feature['icon']) }}" 
                                 width="50" height="50"
                                 class="shadow-sm rounded me-3 object-fit-contain" />
                            <div class="d-flex align-items-center">
                                <p class="text-muted small mb-0">
                                    {{ $feature['text'] }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section-divider animate-fade-in"></div>

    {{-- LINE OF BUSINESS SECTION --}}
    @include('frontend.sections.line-of')

    <div class="section-divider animate-fade-in"></div>

    {{-- FACILITIES SECTION --}}
    <section class="py-5 animate-fade-in position-relative">
        <div class="container">
            <h2 class="text-title mb-5 animate-fade-in text-center">Our <span
                    class="text-highlight"><strong>Facilities</strong></span></h2>
            
            <div class="row justify-content-center">
                <div id="facilityContainer" class="col-12">
                    <!-- Facility items will be loaded here by JavaScript -->
                </div>
            </div>

            <!-- Navigation Buttons for Facilities -->
            <div class="facility-section-nav-buttons">
                <button type="button" class="facility-nav-btn" id="facilityPrevBtn" aria-label="Previous facilities">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button type="button" class="facility-nav-btn" id="facilityNextBtn" aria-label="Next facilities">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

    <div class="section-divider animate-fade-in"></div>

    {{-- PRODUCTS SECTION --}}
    <section class="py-5 animate-fade-in position-relative" id="productsSection">
        <div class="container">
            <h2 class="text-title mb-5 animate-fade-in text-center">Our <span
                    class="text-highlight"><strong>Products</strong></span></h2>
            
            <div class="row justify-content-center">
                <div id="productContainer" class="col-lg-10">
                    <!-- Product items will be loaded here by JavaScript -->
                </div>
            </div>

            <!-- Navigation Buttons for Products -->
            <div class="product-section-nav-buttons">
                <button type="button" class="product-nav-btn" id="productPrevBtn" aria-label="Previous products">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button type="button" class="product-nav-btn" id="productNextBtn" aria-label="Next products">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

    <style>
        /* === COMMON STYLES === */
        .text-title {
            font-size: 2rem;
            font-weight: 600;
            color: #333;
        }

        .text-highlight {
            color: #0d6efd;
        }

        .section-divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #e9ecef, transparent);
            margin: 3rem auto;
            width: 80%;
            max-width: 800px;
        }

        /* === OUR SERVICE SECTION STYLES === */
        .service-card {
            transition: all 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
        }

        .service-icon {
            color: #0d6efd;
            margin-bottom: 1.5rem;
        }

        .service-card .card-title {
            font-size: 1.5rem;
            color: #0d6efd;
        }

        .service-card .card-text {
            line-height: 1.6;
            color: #6c757d;
            font-size: 0.95rem;
        }

        /* === NAVIGATION BUTTONS === */
        .product-section-nav-buttons,
        .facility-section-nav-buttons {
            position: absolute;
            bottom: -10px;
            right: 0;
            z-index: 100;
            display: flex;
            gap: 10px;
        }

        .product-nav-btn,
        .facility-nav-btn {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: white;
            border: 2px solid #0d6efd;
            color: #0d6efd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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
            border-color: #adb5bd;
            color: #adb5bd;
        }

        /* === ANIMATIONS === */
        .product-item,
        .facility-item {
            animation: fadeInUp 0.5s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* === PRODUCT LIST STYLING === */
        .product-list-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 2.5rem;
            padding-bottom: 2.5rem;
            border-bottom: 1px solid #e9ecef;
        }

        .product-list-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .product-list-image {
            width: 220px;
            min-width: 220px;
            height: 160px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .product-list-image:hover {
            transform: scale(1.03);
        }

        .product-list-content {
            flex: 1;
            padding-left: 2rem;
        }

        .product-list-title {
            color: #0d6efd;
            font-weight: 700;
            margin-bottom: 0.75rem;
            font-size: 1.5rem;
        }

        .product-list-description {
            color: #495057;
            line-height: 1.7;
            margin-bottom: 1rem;
        }

        /* Clean HTML from description */
        .clean-description {
            color: #495057;
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }

        .clean-description p {
            margin-bottom: 0.75rem;
        }

        .clean-description p:last-child {
            margin-bottom: 0;
        }

        .clean-description ul {
            list-style: none;
            padding-left: 0;
            margin: 1rem 0;
        }

        .clean-description li {
            position: relative;
            padding-left: 1.5rem;
            margin-bottom: 0.5rem;
            color: #495057;
        }

        .clean-description li:before {
            content: "•";
            position: absolute;
            left: 0;
            color: #0d6efd;
            font-weight: bold;
            font-size: 1.2em;
        }

        .detail-btn {
            background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
            border: none;
            padding: 0.5rem 1.75rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            color: white;
            text-decoration: none;
            display: inline-block;
            font-size: 0.9rem;
        }

        .detail-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(13, 110, 253, 0.3);
            color: white;
        }

        /* === FACILITY LIST STYLING === */
        .facility-list-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 2rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid #e9ecef;
        }

        .facility-list-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .facility-list-image {
            width: 160px;
            min-width: 160px;
            height: 110px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }

        .facility-list-content {
            flex: 1;
            padding-left: 1.5rem;
        }

        .facility-list-title {
            color: #0d6efd;
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 1.25rem;
        }

        .facility-list-description {
            color: #6c757d;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        /* === UTILITY CLASSES === */
        .object-fit-cover {
            object-fit: cover;
        }

        .object-fit-contain {
            object-fit: contain;
        }

        .hover-lift {
            transition: transform 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
        }

        /* === RESPONSIVE DESIGN === */
        @media (max-width: 992px) {
            .text-title {
                font-size: 1.75rem;
            }
            
            .service-card {
                max-width: 300px !important;
            }
            
            .product-list-image {
                width: 200px;
                min-width: 200px;
                height: 140px;
            }
            
            .facility-list-image {
                width: 140px;
                min-width: 140px;
                height: 100px;
            }
        }

        @media (max-width: 768px) {
            .product-section-nav-buttons,
            .facility-section-nav-buttons {
                position: relative;
                justify-content: center;
                margin: 2rem auto 0;
                right: auto;
                bottom: auto;
                transform: none;
            }

            .product-nav-btn,
            .facility-nav-btn {
                width: 44px;
                height: 44px;
                font-size: 1rem;
            }

            .product-list-item,
            .facility-list-item {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .product-list-image {
                width: 100%;
                max-width: 300px;
                height: 180px;
                margin-bottom: 1.5rem;
                min-width: auto;
            }

            .facility-list-image {
                width: 100%;
                max-width: 250px;
                height: 140px;
                margin-bottom: 1.25rem;
                min-width: auto;
            }

            .product-list-content,
            .facility-list-content {
                padding-left: 0;
                width: 100%;
            }

            .product-list-title {
                font-size: 1.35rem;
            }

            .facility-list-title {
                font-size: 1.2rem;
            }

            /* Our Service Mobile Layout - Grid tetap 1 kolom */
            .service-card {
                max-width: 100% !important;
                margin: 0 auto 1.5rem !important;
            }
        }

        @media (max-width: 576px) {
            .text-title {
                font-size: 1.5rem;
            }
            
            .product-list-image {
                height: 160px;
            }

            .facility-list-image {
                height: 120px;
            }
            
            .section-divider {
                margin: 2rem auto;
                width: 90%;
            }

            .service-icon {
                margin-bottom: 1rem;
            }

            .service-card .card-title {
                font-size: 1.3rem;
            }

            .service-card .card-text {
                font-size: 0.9rem;
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

        // Update facility display
        function updateFacilityDisplay() {
            if (!facilityContainer || facilities.length === 0) return;
            
            facilityContainer.innerHTML = '';
            const endIndex = Math.min(facilityCurrentIndex + facilityVisibleCount, totalFacilities);

            for (let i = facilityCurrentIndex; i < endIndex; i++) {
                const facility = facilities[i];
                const imageSrc = facility.image.startsWith('http') ? facility.image :
                    facility.image.startsWith('/') ? facility.image : '/' + facility.image;

                const facilityElement = document.createElement('div');
                facilityElement.className = 'facility-item facility-list-item';
                facilityElement.innerHTML = `
                    <img src="${imageSrc}" alt="${facility.title}" class="facility-list-image">
                    <div class="facility-list-content">
                        <h5 class="facility-list-title">${facility.title}</h5>
                        <p class="facility-list-description">${facility.description}</p>
                    </div>
                `;
                facilityContainer.appendChild(facilityElement);
            }

            updateFacilityButtonStates();
        }

        // Update facility button states
        function updateFacilityButtonStates() {
            if (!facilityPrevBtn || !facilityNextBtn) return;
            
            const hasPrev = facilityCurrentIndex > 0;
            const hasNext = (facilityCurrentIndex + facilityVisibleCount) < totalFacilities;

            facilityPrevBtn.disabled = !hasPrev;
            facilityNextBtn.disabled = !hasNext;
        }

        // Facility navigation
        function navigateFacility(direction) {
            if (direction === 'prev' && facilityCurrentIndex > 0) {
                facilityCurrentIndex = Math.max(0, facilityCurrentIndex - facilityVisibleCount);
                updateFacilityDisplay();
            } else if (direction === 'next' && (facilityCurrentIndex + facilityVisibleCount) < totalFacilities) {
                facilityCurrentIndex = Math.min(totalFacilities - facilityVisibleCount, facilityCurrentIndex + facilityVisibleCount);
                updateFacilityDisplay();
            }
        }

        // ============================
        // PRODUCT SCRIPT
        // ============================
        const products = @json($product);
        const productVisibleCount = 3;
        let productCurrentIndex = 0;
        const totalProducts = products.length;

        const productContainer = document.getElementById('productContainer');
        const productPrevBtn = document.getElementById('productPrevBtn');
        const productNextBtn = document.getElementById('productNextBtn');

        // Clean HTML description (preserve structure)
        function cleanDescription(html) {
            if (!html) return '';
            
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = html;
            
            // Remove unwanted tags but keep structure
            const allowedTags = ['p', 'ul', 'li', 'strong', 'em', 'br'];
            const walker = document.createTreeWalker(
                tempDiv,
                NodeFilter.SHOW_ELEMENT | NodeFilter.SHOW_TEXT,
                null,
                false
            );
            
            const cleanNodes = [];
            while(walker.nextNode()) {
                const node = walker.currentNode;
                if (node.nodeType === Node.TEXT_NODE) {
                    const text = node.textContent.trim();
                    if (text) cleanNodes.push(document.createTextNode(text));
                } else if (node.nodeType === Node.ELEMENT_NODE && allowedTags.includes(node.tagName.toLowerCase())) {
                    const clone = node.cloneNode(true);
                    cleanNodes.push(clone);
                }
            }
            
            const cleanDiv = document.createElement('div');
            cleanNodes.forEach(node => cleanDiv.appendChild(node));
            return cleanDiv.innerHTML;
        }

        // Update product display
        function updateProductDisplay() {
            if (!productContainer || products.length === 0) return;
            
            productContainer.innerHTML = '';
            const endIndex = Math.min(productCurrentIndex + productVisibleCount, totalProducts);

            for (let i = productCurrentIndex; i < endIndex; i++) {
                const product = products[i];
                const imageSrc = product.image.startsWith('http') ? product.image :
                    product.image.startsWith('/') ? product.image : '/' + product.image;
                
                const cleanedDescription = cleanDescription(product.description || '');

                const productElement = document.createElement('div');
                productElement.className = 'product-item product-list-item';
                productElement.innerHTML = `
                    <img src="${imageSrc}" alt="${product.title}" class="product-list-image">
                    <div class="product-list-content">
                        <h3 class="product-list-title">${product.title}</h3>
                        <div class="clean-description">
                            ${cleanedDescription}
                        </div>
                        <a href="#" class="btn detail-btn">View Details</a>
                    </div>
                `;
                productContainer.appendChild(productElement);
            }

            updateProductButtonStates();
        }

        // Update product button states
        function updateProductButtonStates() {
            if (!productPrevBtn || !productNextBtn) return;
            
            const hasPrev = productCurrentIndex > 0;
            const hasNext = (productCurrentIndex + productVisibleCount) < totalProducts;

            productPrevBtn.disabled = !hasPrev;
            productNextBtn.disabled = !hasNext;
        }

        // Product navigation
        function navigateProduct(direction) {
            if (direction === 'prev' && productCurrentIndex > 0) {
                productCurrentIndex = Math.max(0, productCurrentIndex - productVisibleCount);
                updateProductDisplay();
            } else if (direction === 'next' && (productCurrentIndex + productVisibleCount) < totalProducts) {
                productCurrentIndex = Math.min(totalProducts - productVisibleCount, productCurrentIndex + productVisibleCount);
                updateProductDisplay();
            }
        }

        // ============================
        // INITIALIZATION
        // ============================
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize facilities
            if (facilityContainer && facilities.length > 0) {
                updateFacilityDisplay();
                facilityPrevBtn?.addEventListener('click', () => navigateFacility('prev'));
                facilityNextBtn?.addEventListener('click', () => navigateFacility('next'));
            }

            // Initialize products
            if (productContainer && products.length > 0) {
                updateProductDisplay();
                productPrevBtn?.addEventListener('click', () => navigateProduct('prev'));
                productNextBtn?.addEventListener('click', () => navigateProduct('next'));
            }

            // Keyboard navigation for products section
            const productsSection = document.getElementById('productsSection');
            if (productsSection) {
                productsSection.addEventListener('keydown', (e) => {
                    if (e.key === 'ArrowLeft') {
                        e.preventDefault();
                        navigateProduct('prev');
                    } else if (e.key === 'ArrowRight') {
                        e.preventDefault();
                        navigateProduct('next');
                    }
                });
                productsSection.setAttribute('tabindex', '-1');
            }
        });

        // Responsive adjustments
        function adjustButtonPosition() {
            const productButtons = document.querySelector('.product-section-nav-buttons');
            const facilityButtons = document.querySelector('.facility-section-nav-buttons');
            
            if (window.innerWidth < 768) {
                if (productButtons) {
                    productButtons.style.position = 'relative';
                    productButtons.style.margin = '2rem auto 0';
                    productButtons.style.justifyContent = 'center';
                }
                if (facilityButtons) {
                    facilityButtons.style.position = 'relative';
                    facilityButtons.style.margin = '2rem auto 0';
                    facilityButtons.style.justifyContent = 'center';
                }
            } else {
                if (productButtons) {
                    productButtons.style.position = 'absolute';
                    productButtons.style.margin = '0';
                    productButtons.style.justifyContent = 'flex-start';
                }
                if (facilityButtons) {
                    facilityButtons.style.position = 'absolute';
                    facilityButtons.style.margin = '0';
                    facilityButtons.style.justifyContent = 'flex-start';
                }
            }
        }

        window.addEventListener('load', adjustButtonPosition);
        window.addEventListener('resize', adjustButtonPosition);
    </script>
@endsection