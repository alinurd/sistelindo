<section class="py-5 animate-fade-in">
    <div class="container">

        <!-- TOP VALUES -->
        <div class="row justify-content-center text-center mb-5 g-3 bg-light">
            @foreach ($advantage->take(3) as $p)
                <div class="col-md-6 col-lg-3 p-3">
                    <div class="text-center ">
                        <div class="service-image mb-3">
                            <img src="{{ asset($p->image) }}" alt="{{ $p->title }}" class="rounded-circle" width="90">
                        </div>
                        <p class="fw-semibold small">{{ $p->title }}</p>
                    </div>
                </div>
            @endforeach

            @if ($advantage->count() > 3)
                {{-- <div class="advantage-dots" id="advantage-dots"></div> --}}
            @endif
        </div>

        <!-- JavaScript untuk slider advantage -->
        @if ($advantage->count() > 3)
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const productData = @json($advantage);
                    const dotsWrap = document.getElementById("product-dots");
                    let currentSlide = 0;
                    let autoplayTimer;
                    const interval = 4000;
                    const itemsPerSlide = 4;

                    function setupSlider() {
                        const totalSlides = Math.ceil(productData.length / itemsPerSlide);
                        buildDots(totalSlides);
                        goToSlide(0);
                        startAutoplay();
                    }

                    function buildDots(totalSlides) {
                        dotsWrap.innerHTML = '';
                        for (let i = 0; i < totalSlides; i++) {
                            const dot = document.createElement("span");
                            const bar = document.createElement("span");
                            bar.classList.add("progress");
                            dot.appendChild(bar);
                            dot.dataset.index = i;
                            dot.addEventListener("click", () => {
                                goToSlide(i);
                                restartAutoplay();
                            });
                            dotsWrap.appendChild(dot);
                        }
                    }

                    function goToSlide(index) {
                        currentSlide = index;
                        updateProductDisplay();
                        resetProgress();
                    }

                    function updateProductDisplay() {
                        const startIndex = currentSlide * itemsPerSlide;
                        const endIndex = startIndex + itemsPerSlide;
                        const currentProducts = productData.slice(startIndex, endIndex);

                        // Update display dengan produk yang sesuai
                        const productContainer = document.querySelector('.row.justify-content-center');
                        const firstRow = productContainer.closest('.row');

                        // Ambil semua elemen product dan update hanya yang pertama
                        const productElements = firstRow.querySelectorAll('.col-md-6.col-lg-3.mb-4');

                        currentProducts.forEach((p, index) => {
                            if (productElements[index]) {
                                productElements[index].innerHTML = `
                                <div class="service-card text-center p-4">
                                    <div class="service-image mb-3">
                                        <img src="${p.image}" alt="${p.title}" class="rounded-circle">
                                    </div>
                                    <h4 class="mb-3" style="font-size: 15px">${p.title}</h4>
                                    <p class="mb-0">${p.description}</p>
                                </div>
                            `;
                            }
                        });
                    }

                    function nextSlide() {
                        const totalSlides = Math.ceil(productData.length / itemsPerSlide);
                        let next = currentSlide + 1;
                        if (next >= totalSlides) next = 0;
                        goToSlide(next);
                    }

                    function startAutoplay() {
                        stopAutoplay();
                        autoplayTimer = setInterval(nextSlide, interval);
                        resetProgress();
                    }

                    function stopAutoplay() {
                        if (autoplayTimer) clearInterval(autoplayTimer);
                    }

                    function restartAutoplay() {
                        stopAutoplay();
                        startAutoplay();
                    }

                    function resetProgress() {
                        const bars = dotsWrap?.querySelectorAll(".progress");
                        if (!bars) return;

                        bars.forEach((bar, idx) => {
                            bar.style.transition = "none";
                            bar.style.width = idx < currentSlide ? "100%" : "0";
                        });

                        setTimeout(() => {
                            const activeBar = dotsWrap?.querySelectorAll(".progress")[currentSlide];
                            if (activeBar) {
                                activeBar.style.transition = `width ${interval}ms linear`;
                                activeBar.style.width = "100%";
                            }
                        }, 50);
                    }

                    setupSlider();
                });
            </script>
        @endif


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
                            <h6 class="fw-bold mb-1" style="font-size: 15px">{{ $p->title }}</h6>
                            <p class="text-muted small mb-2">
                                {{ $p->description }}
                            </p>
                        </div>
                    </div>
                    <hr>
                @endfor
            </div>
        </div>
    </div>

    <!-- Floating Navigation Buttons (Pojok Kanan Bawah) -->
    <div class="floating-nav-buttons">
        <button type="button" class="nav-btn prev-btn" id="prevBtn">
            <i class="fas fa-chevron-up"></i>
        </button>
        <button type="button" class="nav-btn next-btn" id="nextBtn">
            <i class="fas fa-chevron-down"></i>
        </button>
    </div>
</section>

<style>
    /* Floating Navigation Buttons Styling */
    .floating-nav-buttons {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 1000;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .nav-btn {
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

    .nav-btn:hover:not(:disabled) {
        background: #0d6efd;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(13, 110, 253, 0.3);
    }

    .nav-btn:active:not(:disabled) {
        transform: translateY(0);
    }

    .nav-btn:disabled {
        opacity: 0.4;
        cursor: not-allowed;
        border-color: #6c757d;
        color: #6c757d;
    }

    /* Styling untuk service card */
    .service-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        height: 100%;
        transition: transform 0.3s ease;
    }

    .service-card:hover {
        transform: translateY(-5px);
    }

    .service-image img {
        width: 130px;
        height: 130px;
        object-fit: cover;
    }

    .product-dots {
        display: flex;
        justify-content: center;
        gap: 8px;
        margin-top: 20px;
    }

    .product-dots span {
        width: 30px;
        height: 4px;
        background: #ddd;
        border-radius: 2px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .product-dots .progress {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        background: #0d6efd;
        width: 0%;
    }

    /* Animasi untuk konten */
    .facility-item {
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
        .floating-nav-buttons {
            bottom: 20px;
            right: 20px;
        }

        .nav-btn {
            width: 45px;
            height: 45px;
            font-size: 1rem;
        }

        .service-image img {
            width: 80px;
            height: 80px;
        }
    }
</style>

<script>
    // Data facilities dari PHP ke JavaScript
    const facilities = @json($facility);
    const visibleCount = 3;
    let currentIndex = 0;
    const totalFacilities = facilities.length;

    // Elemen DOM
    const facilityContainer = document.getElementById('facilityContainer');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    // Fungsi untuk update tampilan
    function updateDisplay() {
        // Kosongkan kontainer
        facilityContainer.innerHTML = '';

        // Hitung indeks akhir
        const endIndex = Math.min(currentIndex + visibleCount, totalFacilities);

        // Tambahkan facility items
        for (let i = currentIndex; i < endIndex; i++) {
            const facility = facilities[i];

            // Pastikan path gambar benar
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

        // Update status tombol
        updateButtonStates();
    }

    // Fungsi untuk update status tombol
    function updateButtonStates() {
        const hasPrev = currentIndex > 0;
        const hasNext = (currentIndex + visibleCount) < totalFacilities;

        // Atur disabled state
        prevBtn.disabled = !hasPrev;
        nextBtn.disabled = !hasNext;
    }

    // Fungsi navigasi
    function navigate(direction) {
        if (direction === 'up' && currentIndex > 0) {
            currentIndex = Math.max(0, currentIndex - visibleCount);
            updateDisplay();
        } else if (direction === 'down' && (currentIndex + visibleCount) < totalFacilities) {
            currentIndex = Math.min(totalFacilities - visibleCount, currentIndex + visibleCount);
            updateDisplay();
        }
    }

    // Tambah event listeners
    prevBtn.addEventListener('click', () => navigate('up'));
    nextBtn.addEventListener('click', () => navigate('down'));

    // Tambah navigasi dengan keyboard (opsional)
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowUp') {
            e.preventDefault();
            navigate('up');
        } else if (e.key === 'ArrowDown') {
            e.preventDefault();
            navigate('down');
        }
    });

    // Inisialisasi pertama kali
    updateButtonStates();

    // Responsif: Sesuaikan posisi tombol pada layar kecil
    function adjustFloatingButtons() {
        const floatingButtons = document.querySelector('.floating-nav-buttons');
        if (window.innerWidth < 768) {
            floatingButtons.style.bottom = '20px';
            floatingButtons.style.right = '20px';
            floatingButtons.style.gap = '6px';

            const buttons = document.querySelectorAll('.nav-btn');
            buttons.forEach(btn => {
                btn.style.width = '45px';
                btn.style.height = '45px';
                btn.style.fontSize = '1rem';
            });
        } else {
            floatingButtons.style.bottom = '30px';
            floatingButtons.style.right = '30px';
            floatingButtons.style.gap = '8px';

            const buttons = document.querySelectorAll('.nav-btn');
            buttons.forEach(btn => {
                btn.style.width = '50px';
                btn.style.height = '50px';
                btn.style.fontSize = '1.2rem';
            });
        }
    }

    // Panggil fungsi responsif saat load dan resize
    window.addEventListener('load', adjustFloatingButtons);
    window.addEventListener('resize', adjustFloatingButtons);
</script>
