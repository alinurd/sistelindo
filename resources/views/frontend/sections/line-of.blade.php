<section class="text-center mb-16 px-4 mt-5" id="marketIndustrySection">
    <span class="text-title mb-3 animate-fade-in mt-5 text-center">Line of <span class="text-highlight"><strong>Market Industry</strong></span></span>

    <div class="container">
        <div class="row justify-content-center g-3" id="marketContainer">
            @foreach ($lineMarket->take(3) as $p)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="p-3 bg-white shadow-sm rounded-3 border h-100 d-flex flex-column align-items-center">
                        <div class="square-image-container mb-2 d-flex align-items-center justify-content-center">
                            <img src="{{ asset($p->image) }}" alt="{{ $p->title }}" class="square-image w-100 h-100">
                        </div>
                        <p class="small text-center mb-0 mt-2" style="font-size: 0.85rem;">{!! $p->description !!}</p>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($lineMarket->count() > 3)
            <div class="d-flex justify-content-end mt-3">
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
    
    if (totalMarkets <= 3) return;
    
    function updateMarketDisplay() {
        const marketContainer = document.getElementById('marketContainer');
        marketContainer.innerHTML = '';
        
        const endIndex = Math.min(currentMarketIndex + visibleCount, totalMarkets);
        
        for (let i = currentMarketIndex; i < endIndex; i++) {
            const market = marketData[i];
            const imageSrc = market.image.startsWith('http') || market.image.startsWith('/') 
                ? market.image 
                : '/' + market.image;
            
            const colDiv = document.createElement('div');
            colDiv.className = 'col-12 col-md-6 col-lg-4';
            colDiv.innerHTML = `
                <div class="p-3 bg-white shadow-sm rounded-3 border h-100 d-flex flex-column align-items-center">
                    <div class="square-image-container mb-2 d-flex align-items-center justify-content-center">
                        <img src="${imageSrc}" alt="${market.title || ''}" class="square-image w-100 h-100">
                    </div>
                    <p class="small text-center mb-0 mt-2" style="font-size: 0.85rem;">${market.description || ''}</p>
                </div>
            `;
            
            marketContainer.appendChild(colDiv);
        }
        
        updateMarketButtonStates();
    }
    
    function updateMarketButtonStates() {
        const prevBtn = document.getElementById('marketPrevBtn');
        const nextBtn = document.getElementById('marketNextBtn');
        
        const hasPrev = currentMarketIndex > 0;
        const hasNext = (currentMarketIndex + visibleCount) < totalMarkets;
        
        if (prevBtn) {
            prevBtn.disabled = !hasPrev;
            prevBtn.classList.toggle('disabled', !hasPrev);
        }
        
        if (nextBtn) {
            nextBtn.disabled = !hasNext;
            nextBtn.classList.toggle('disabled', !hasNext);
        }
    }
    
    function navigateMarket(direction) {
        if (direction === 'left' && currentMarketIndex > 0) {
            currentMarketIndex = Math.max(0, currentMarketIndex - visibleCount);
            updateMarketDisplay();
        } else if (direction === 'right' && (currentMarketIndex + visibleCount) < totalMarkets) {
            currentMarketIndex = Math.min(totalMarkets - visibleCount, currentMarketIndex + visibleCount);
            updateMarketDisplay();
        }
    }
    
    const prevBtn = document.getElementById('marketPrevBtn');
    const nextBtn = document.getElementById('marketNextBtn');
    
    if (prevBtn) prevBtn.addEventListener('click', () => navigateMarket('left'));
    if (nextBtn) nextBtn.addEventListener('click', () => navigateMarket('right'));
    
    updateMarketDisplay();
});
</script>

<style>
    /* PERBAIKAN UTAMA: Pastikan container dan gambar benar-benar bujur sangkar */
    .square-image-container {
        width: 120px;
        height: 120px;
        min-width: 120px;
        min-height: 120px;
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        background-color: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    /* FORCE gambar menjadi bujur sangkar */
    .square-image {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
    }
    
    /* Pastikan img tag menggunakan object-fit */
    img.square-image {
        object-fit: cover;
    }
    
    /* Backup styling untuk gambar */
    .square-image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    /* Tombol navigasi */
    .bottom-right-nav-buttons {
        display: flex;
        gap: 8px;
        margin-right: 15px;
    }
    
    .nav-btn {
        width: 40px;
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
        font-size: 1rem;
    }
    
    .nav-btn:hover:not(:disabled) {
        background-color: #007bff;
        color: white;
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(0,123,255,0.25);
    }
    
    .nav-btn:disabled, .nav-btn.disabled {
        opacity: 0.5;
        cursor: not-allowed;
        border-color: #ccc;
        color: #ccc;
        transform: none;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .square-image-container {
            width: 100px;
            height: 100px;
            min-width: 100px;
            min-height: 100px;
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
            width: 80px;
            height: 80px;
            min-width: 80px;
            min-height: 80px;
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
            width: 140px;
            height: 140px;
            min-width: 140px;
            min-height: 140px;
        }
    }
    
    @media (min-width: 1200px) {
        .square-image-container {
            width: 160px;
            height: 160px;
            min-width: 160px;
            min-height: 160px;
        }
    }
    
    /* Paksa aspect ratio 1:1 */
    .square-image-container::before {
        content: '';
        display: block;
        padding-top: 100%; /* Ini memastikan tinggi sama dengan lebar */
    }
    
    /* Atau gunakan aspect-ratio modern */
    @supports (aspect-ratio: 1 / 1) {
        .square-image-container {
            aspect-ratio: 1 / 1;
            min-width: auto;
            min-height: auto;
        }
    }
</style>