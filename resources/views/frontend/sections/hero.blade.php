<section class="hero-wrapper animate-fade-in">
    <div class="container">
        <div class="row align-items-center">
            
            <!-- IMAGE/SLIDER - TAMPIL DI ATAS PADA MOBILE -->
            <div class="col-lg-6 order-lg-2 order-1">
                @if(count($banner) > 0)
                <div id="heroSlider" class="carousel slide" data-bs-ride="carousel">

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
                             data-title="{{ htmlspecialchars($p->title, ENT_QUOTES) }}"
                             data-dsc="{{ htmlspecialchars($p->dsc, ENT_QUOTES) }}"
                             data-url="{{$p->url??route('guest.about')}}">
                            <img src="{{ $p->image }}" class="d-block w-100 hero-slider-img" alt="{{ $p->title }}">
                        </div>
                        @endforeach
                    </div>

                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#heroSlider"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>

                </div>
                @else
                <div class="alert alert-warning">
                    Tidak ada banner tersedia.
                </div>
                @endif
            </div>

            <!-- TEXT - TAMPIL DI BAWAH PADA MOBILE -->
            <div class="col-lg-6 order-lg-1 order-2">
                @if(count($banner) > 0)
                <div id="bannerContent">
                    <br><br>
                    <span class="fw-bold mb-3" style="font-size: 25px" id="bannerTitle">
                        {{ $banner[0]->title }}
                    </span>
                    
                    <div class="text-muted" id="bannerDescription">
                        {!! $banner[0]->dsc !!}
                    </div>
                    {{-- {{dd($banner)}} --}}
                    <a class="btn btn-primary px-4 " href="" id="bannerButton">Detail</a>
                </div>
                @endif
            </div>

        </div>
    </div>
</section>

<script>
// Simpan data banner dalam array JavaScript
const banners = @json($banner);

// Event listener untuk slider
document.addEventListener('DOMContentLoaded', function() {
    const heroSlider = document.getElementById('heroSlider');
    const bannerTitle = document.getElementById('bannerTitle');
    const bannerDescription = document.getElementById('bannerDescription');
    const bannerButton = document.getElementById('bannerButton');
    
    if (heroSlider) {
        // Fungsi untuk decode HTML entities
        function decodeHtml(html) {
            const txt = document.createElement("textarea");
            txt.innerHTML = html;
            return txt.value;
        }
        
        // Fungsi untuk update konten berdasarkan slide aktif
        function updateBannerContent(activeSlide) {
            // Ambil data dari atribut data-* pada slide
            const title = decodeHtml(activeSlide.getAttribute('data-title'));
            const dsc = decodeHtml(activeSlide.getAttribute('data-dsc'));
            const url = decodeHtml(activeSlide.getAttribute('data-url'));
            
            if (bannerTitle && bannerDescription) {
                // Animasi fade out
                bannerTitle.style.opacity = '0.6';
                bannerDescription.style.opacity = '0.6';
                
                setTimeout(() => {
                    // Update konten
                    bannerTitle.textContent = title;
                    bannerDescription.innerHTML = dsc;
                    bannerButton.setAttribute('href', url);
                    
                    // Animasi fade in
                    bannerTitle.style.opacity = '1';
                    bannerDescription.style.opacity = '1';
                }, 200);
            }
        }
        
        // Update konten saat slide berubah (event utama)
        heroSlider.addEventListener('slid.bs.carousel', function(event) {
            const activeSlide = event.relatedTarget; // Slide yang baru aktif
            updateBannerContent(activeSlide);
        });
        
        // Event untuk indicators (klik langsung pada titik)
        const indicators = heroSlider.querySelectorAll('.carousel-indicators button');
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', function() {
                // Cari slide yang sesuai dengan index indikator
                const slides = heroSlider.querySelectorAll('.carousel-item');
                if (slides[index]) {
                    updateBannerContent(slides[index]);
                }
            });
        });
        
        // Inisialisasi: Update konten dari slide pertama
        const firstSlide = heroSlider.querySelector('.carousel-item.active');
        if (firstSlide) {
            updateBannerContent(firstSlide);
        }
    }
});

// Auto slide setiap 5 detik (opsional)
document.addEventListener('DOMContentLoaded', function() {
    const myCarousel = document.getElementById('heroSlider');
    if (myCarousel) {
        const carousel = new bootstrap.Carousel(myCarousel, {
            interval: 5000,
            wrap: true
        });
    }
});
</script>