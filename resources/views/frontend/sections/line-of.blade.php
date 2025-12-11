<section class="text-center mb-16 px-4 mt-5" id="marketIndustrySection">
    <span class="text-title mb-3 animate-fade-in mt-5 text-center">Line of <span class="text-highlight"><strong>Market Industry</strong></span></span>

    <div class="container">
        <div class="row justify-content-center g-3" id="marketContainer"> <!-- g-3 untuk gap lebih kecil -->
            @foreach ($lineMarket->take(3) as $p)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="p-3 bg-white shadow-sm rounded-3 border h-100 d-flex flex-column align-items-center"> <!-- p-3 dan rounded-3 -->
                        <div class="square-image-container mb-2"> <!-- mb-2 -->
                            <img src="{{ asset($p->image) }}" alt="{{ $p->title }}" class="square-image">
                        </div>
                        <p class="small text-center mb-0" style="font-size: 0.85rem;">{!! $p->description !!}</p> <!-- font-size lebih kecil -->
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Tombol navigasi - hanya ditampilkan jika data > 3 -->
        @if ($lineMarket->count() > 3)
            <div class="d-flex justify-content-end mt-3"> <!-- mt-3 -->
                <div class="bottom-right-nav-buttons">
                    <button type="button" class="nav-btn prev-btn" id="marketPrevBtn">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" class="nav-btn next-btn" id="marketNextBtn">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        @endif
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const marketData = @json($lineMarket);
    const totalMarkets = marketData.length;
    const visibleCount = 3;
    let currentMarketIndex = 0;
    
    // Jika data <= 3, tidak perlu inisialisasi slider
    if (totalMarkets <= 3) {
        return;
    }
    
    // Fungsi untuk update tampilan market
    function updateMarketDisplay() {
        const marketContainer = document.getElementById('marketContainer');
        
        // Kosongkan kontainer
        marketContainer.innerHTML = '';
        
        // Hitung indeks akhir
        const endIndex = Math.min(currentMarketIndex + visibleCount, totalMarkets);
        
        // Tambahkan market items
        for (let i = currentMarketIndex; i < endIndex; i++) {
            const market = marketData[i];
            
            // Pastikan path gambar benar
            const imageSrc = market.image.startsWith('http') || market.image.startsWith('/') 
                ? market.image 
                : '/' + market.image;
            
            const colDiv = document.createElement('div');
            colDiv.className = 'col-12 col-md-6 col-lg-4';
            colDiv.innerHTML = `
                <div class="p-3 bg-white shadow-sm rounded-3 border h-100 d-flex flex-column align-items-center">
                    <div class="square-image-container mb-2">
                        <img src="${imageSrc}" alt="${market.title || ''}" class="square-image">
                    </div>
                    <p class="small text-center mb-0" style="font-size: 0.85rem;">${market.description || ''}</p>
                </div>
            `;
            
            marketContainer.appendChild(colDiv);
        }
        
        // Update status tombol
        updateMarketButtonStates();
    }
    
    // Fungsi untuk update status tombol market
    function updateMarketButtonStates() {
        const prevBtn = document.getElementById('marketPrevBtn');
        const nextBtn = document.getElementById('marketNextBtn');
        
        const hasPrev = currentMarketIndex > 0;
        const hasNext = (currentMarketIndex + visibleCount) < totalMarkets;
        
        // Atur disabled state
        if (prevBtn) {
            prevBtn.disabled = !hasPrev;
            prevBtn.style.opacity = hasPrev ? '1' : '0.5';
            prevBtn.style.cursor = hasPrev ? 'pointer' : 'not-allowed';
        }
        
        if (nextBtn) {
            nextBtn.disabled = !hasNext;
            nextBtn.style.opacity = hasNext ? '1' : '0.5';
            nextBtn.style.cursor = hasNext ? 'pointer' : 'not-allowed';
        }
    }
    
    // Fungsi navigasi market
    function navigateMarket(direction) {
        if (direction === 'left' && currentMarketIndex > 0) {
            currentMarketIndex = Math.max(0, currentMarketIndex - visibleCount);
            updateMarketDisplay();
        } else if (direction === 'right' && (currentMarketIndex + visibleCount) < totalMarkets) {
            currentMarketIndex = Math.min(totalMarkets - visibleCount, currentMarketIndex + visibleCount);
            updateMarketDisplay();
        }
    }
    
    // Event listeners untuk tombol
    const prevBtn = document.getElementById('marketPrevBtn');
    const nextBtn = document.getElementById('marketNextBtn');
    
    if (prevBtn) {
        prevBtn.addEventListener('click', () => navigateMarket('left'));
    }
    
    if (nextBtn) {
        nextBtn.addEventListener('click', () => navigateMarket('right'));
    }
    
    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        const marketSection = document.getElementById('marketIndustrySection');
        if (marketSection) {
            const rect = marketSection.getBoundingClientRect();
            const isInSection = rect.top <= window.innerHeight && rect.bottom >= 0;
            
            if (isInSection && totalMarkets > 3) {
                if (e.key === 'ArrowLeft') {
                    e.preventDefault();
                    navigateMarket('left');
                } else if (e.key === 'ArrowRight') {
                    e.preventDefault();
                    navigateMarket('right');
                }
            }
        }
    });
    
    // Initial display
    updateMarketDisplay();
});
</script>

<style>
    /* Container untuk gambar bujur sangkar - UKURAN DIKECILKAN */
    .square-image-container {
        width: 100px; /* Dikurangi dari 150px */
        height: 100px;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px; /* Sudut lebih kecil */
        background-color: #f8f9fa;
    }
    
    /* Gambar bujur sangkar */
    .square-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    
    /* Jika ingin gambar lingkaran */
    .square-image-container.circle {
        border-radius: 50%;
    }
    
    .square-image-container.circle .square-image {
        border-radius: 50%;
    }
    
    /* Tombol navigasi - UKURAN DIKECILKAN */
    .bottom-right-nav-buttons {
        display: flex;
        gap: 8px;
        margin-right: 15px;
    }
    
    .nav-btn {
        width: 40px; /* Dikurangi dari 50px */
        height: 40px;
        border-radius: 50%;
        border: 2px solid #007bff;
        background-color: white;
        color: #007bff;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        cursor: pointer;
        font-size: 1rem; /* Dikurangi dari 1.2rem */
    }
    
    .nav-btn:hover:not(:disabled) {
        background-color: #007bff;
        color: white;
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(0,123,255,0.25);
    }
    
    .nav-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        border-color: #ccc;
        color: #ccc;
        transform: none;
    }
    
    /* Responsive untuk berbagai ukuran layar */
    @media (max-width: 768px) {
        .square-image-container {
            width: 80px;
            height: 80px;
        }
        
        .bottom-right-nav-buttons {
            margin-right: 10px;
            gap: 6px;
        }
        
        .nav-btn {
            width: 35px;
            height: 35px;
            font-size: 0.9rem;
        }
    }
    
    @media (max-width: 576px) {
        .square-image-container {
            width: 70px;
            height: 70px;
        }
        
        .bottom-right-nav-buttons {
            margin-right: 8px;
            gap: 4px;
        }
        
        .nav-btn {
            width: 32px;
            height: 32px;
            font-size: 0.8rem;
        }
    }
    
    @media (min-width: 992px) {
        .square-image-container {
            width: 120px;
            height: 120px;
        }
    }
    
    @media (min-width: 1200px) {
        .square-image-container {
            width: 140px;
            height: 140px;
        }
    }
    
    /* Untuk zoom ekstrem */
    @media screen and (max-width: 3000px) {
        .square-image-container {
            width: clamp(70px, 8vw, 140px);
            height: clamp(70px, 8vw, 140px);
        }
        
        .nav-btn {
            width: clamp(30px, 3vw, 40px);
            height: clamp(30px, 3vw, 40px);
            font-size: clamp(0.7rem, 0.8vw, 1rem);
        }
    }
    
    /* Memastikan deskripsi tidak overflow */
    .small.text-center {
        max-height: 80px; /* Dikurangi dari 100px */
        overflow-y: auto;
        word-wrap: break-word;
        line-height: 1.3;
    }
    
    /* Hover effect untuk container gambar */
    .square-image-container:hover .square-image {
        transform: scale(1.03);
        transition: transform 0.2s ease;
    }
    
    /* Efek untuk card keseluruhan */
    .rounded-3 {
        transition: all 0.2s ease;
    }
    
    .rounded-3:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1) !important;
    }
</style>