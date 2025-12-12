<section class="py-5 animate-fade-in">
    <div class="container">

        <!-- TOP VALUES -->
        <div class="row justify-content-center text-center mb-5 g-3 bg-light">
            @foreach ($advantage->take(3) as $p)
                <div class="col-md-6 col-lg-3 p-3">
                    <div class="text-center ">
                        <div class="service-image mb-3">
                            <img src="{{ asset($p->image) }}" alt="{{ $p->title }}" class="rounded-circle" width="180">
                        </div>
                        <p class="fw-semibold small">{{ $p->title }}</p>
                    </div>
                </div>
            @endforeach

            @if ($advantage->count() > 3)
                {{-- <div class="advantage-dots" id="advantage-dots"></div> --}}
            @endif
        </div>
        <br><br>

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
            <!-- Kontainer untuk Konten -->
            <div id="facilityContainerF" class="col-12">
                @php
                $visibleCount = 3;
                $totalFacilities = count($facility);
                @endphp

                @for ($i = 0; $i < min($visibleCount, $totalFacilities); $i++)
                    @php $p=$facility[$i]; @endphp
                    <div class="col-lg-8 mx-auto d-flex mb-4 facility-item">
                    <img src="{{ asset($p->image) }}" width="180" height="100" class="shadow-sm rounded me-3" />
                    <div class="flex-grow-1">
                        <h6 class="fw-bold mb-1" style="font-size: 15px">{{ $p->title }}</h6>
                        <p class="text-muted small mb-2">
                            {{ $p->description }}
                        </p>
                    </div>
            </div>
            {{-- <hr class="mt-0 mb-4" style="margin-left: 166px; max-width: calc(100% - 166px);"> --}}
            @endfor
        </div>
    </div>

    <br><br>
    <!-- Floating Navigation Buttons (Pojok Kanan Bawah) -->
    <div class="bottom-right-nav-buttons">
        <button type="button" class="nav-btn prev-btn" id="prevBtnF">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button type="button" class="nav-btn next-btn" id="nextBtnF">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
</section>

<style>
    /* Floating Navigation Buttons Styling */
   
    .bottom-right-nav-buttons {
        position: absolute;
        bottom: 20px;
        right: 20px;
        display: flex;
        gap: 10px;
        z-index: 100;
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
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Data facilities dari PHP ke JavaScript
        const facilities = @json($facility);
        const visibleCount = 3;
        let currentIndex = 0;
        const totalFacilities = facilities.length;

        // Elemen DOM
        const facilityContainerF = document.getElementById('facilityContainerF');
        const prevBtnF = document.getElementById('prevBtnF');
        const nextBtnF = document.getElementById('nextBtnF');

        // Fungsi untuk update tampilan
        function updateDisplay() {
            // Kosongkan kontainer
            facilityContainerF.innerHTML = '';

            // Hitung indeks mulai dan akhir
            const startIndex = currentIndex;
            const endIndex = Math.min(currentIndex + visibleCount, totalFacilities);

            // Tambahkan facility items
            for (let i = startIndex; i < endIndex; i++) {
                const facility = facilities[i];

                // Buat elemen item
                const facilityElement = document.createElement('div');
                facilityElement.className = 'col-lg-8 mx-auto d-flex mb-4 facility-item';

                facilityElement.innerHTML = `
                <img src="${facility.image.startsWith('http') ? facility.image : 
                          facility.image.startsWith('/') ? facility.image : 
                          '/' + facility.image}" 
                     width="150" height="100" class="shadow-sm rounded me-3" />
                <div class="flex-grow-1">
                    <h6 class="fw-bold mb-1" style="font-size: 15px">${facility.title}</h6>
                    <p class="text-muted small mb-2">
                        ${facility.description}
                    </p>
                </div>
            `;

                facilityContainerF.appendChild(facilityElement);

                // Tambahkan garis pemisah jika bukan item terakhir
                if (i < endIndex - 1) {
                    const hrElement = document.createElement('hr');
                    hrElement.className = 'mt-0 mb-4';
                    hrElement.style.marginLeft = '220px';
                    hrElement.style.maxWidth = 'calc(100% - 400px)';
                    facilityContainerF.appendChild(hrElement);
                }
            }

            // Update status tombol
            updateButtonStates();
        }

        // Fungsi untuk update status tombol
        function updateButtonStates() {
            if (!prevBtnF || !nextBtnF) return;

            prevBtnF.disabled = currentIndex === 0;
            nextBtnF.disabled = currentIndex + visibleCount >= totalFacilities;

            // Update styling untuk tombol disabled
            prevBtnF.style.opacity = prevBtnF.disabled ? '0.5' : '1';
            nextBtnF.style.opacity = nextBtnF.disabled ? '0.5' : '1';
        }

        // Fungsi navigasi
        function navigate(direction) {
            if (direction === 'prev' && currentIndex > 0) {
                // Navigasi sebelumnya
                currentIndex = Math.max(0, currentIndex - visibleCount);
                updateDisplay();
            } else if (direction === 'next' && (currentIndex + visibleCount) < totalFacilities) {
                // Navigasi berikutnya
                currentIndex = currentIndex + visibleCount;
                updateDisplay();
            }
        }

        // Tambah event listeners untuk tombol
        if (prevBtnF) {
            prevBtnF.addEventListener('click', () => navigate('prev'));
        }

        if (nextBtnF) {
            nextBtnF.addEventListener('click', () => navigate('next'));
        }

        // Inisialisasi pertama kali
        updateDisplay();
    });
</script>
