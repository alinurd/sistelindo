 <section class="text-center mb-24 px-4 mt-5">
        <span class="text-title mb-3 animate-fade-in mt-5 text-center">Line of <span class="text-highlight"><strong>Market
                    Industry</strong></span></span>

        <div class="container">
             <div class="row justify-content-center g-4">
@foreach ($lineMarket->take(3) as $p)
            <!-- Box 1 -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="p-4 bg-white shadow-sm rounded-4 border h-100">
                        <img src="{{ asset($p->image) }}" alt="{{ $p->title }}"  widt="100"  height="100" class="rounded-circle">
                     <p class=" small">{!! $p->description !!}</p> 
                </div>
            </div>
            @endforeach
            @if($lineMarket->count() > 3)
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const productData = @json($lineMarket);
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
        </div> 
        </div>
    </section>