<section class="text-center mb-16 px-4 mt-5" id="marketIndustrySection">
    <span class="text-title mb-3 animate-fade-in mt-5 text-center">Line of <span class="text-highlight"><strong>Market Industry</strong></span></span>

    <div class="container">
        <div class="row justify-content-center g-3" id="marketContainer">
            @foreach ($lineMarket->take(3) as $p)
                <div class="col-12 col-md-6 col-lg-4">
                    <!-- CARD BUJUR SANGKAR KECIL -->
                    <div class="square-card">
                        <div class="square-card-inner">
                            <!-- Gambar -->
                            <div class="square-image-container">
                                <div class="square-image-inner">
                                    <img src="{{ asset($p->image) }}" alt="{{ $p->title }}" 
                                         class="square-image">
                                </div>
                            </div>
                            <!-- Deskripsi -->
                            <div class="square-content">
                                <p class="small text-center mt-2 mb-0" style="font-size: 0.85rem;">{!! $p->description !!}</p>
                            </div>
                        </div>
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
                <!-- CARD BUJUR SANGKAR KECIL -->
                <div class="square-card">
                    <div class="square-card-inner">
                        <!-- Gambar -->
                        <div class="square-image-container">
                            <div class="square-image-inner">
                                <img src="${imageSrc}" alt="${market.title || ''}" 
                                     class="square-image">
                            </div>
                        </div>
                        <!-- Deskripsi -->
                        <div class="square-content">
                            <p class="small text-center mt-2 mb-0" style="font-size: 0.85rem;">${market.description || ''}</p>
                        </div>
                    </div>
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
    /* CARD BUJUR SANGKAR KECIL */
    .square-card {
        width: 100%;
        aspect-ratio: 1 / 1; /* Membuat card berbentuk bujur sangkar */
        background: white;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.06);
        border-radius: 10px;
        border: 1px solid #e9ecef;
        overflow: hidden;
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        transition: all 0.3s ease;
        max-width: 240px; /* Batasi ukuran maksimum */
        margin: 0 auto; /* Pusatkan card */
        padding: 12px;
    }
    
    /* .square-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        border-color: #007bff;
    } */
    
    .square-card-inner {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
    }
    
    /* Container gambar lebih kecil */
    .square-image-container {
        width: 80px; /* Diperkecil dari 120px */
        height: 80px; /* Diperkecil dari 120px */
        flex-shrink: 0;
        margin-bottom: 10px;
    }
    
    .square-image-inner {
        width: 100%;
        height: 100%;
        border-radius: 6px;
        overflow: hidden;
        background-color: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .square-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    /* Konten teks */
    .square-content {
        width: 100%;
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 5px;
        text-align: center;
        overflow: hidden;
    }
    
    .square-content p {
        margin: 0;
        line-height: 1.3;
        font-size: 0.85rem;
        max-height: 100%;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 4; /* Batasi jumlah baris */
        -webkit-box-orient: vertical;
    }
    
    /* Tombol navigasi */
    .bottom-right-nav-buttons {
        display: flex;
        gap: 8px;
        margin-right: 15px;
    }
    
    .nav-btn {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        border: 2px solid #007bff;
        background-color: white;
        color: #007bff;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        cursor: pointer;
        font-size: 0.9rem;
    }
    
    .nav-btn:hover:not(:disabled) {
        background-color: #007bff;
        color: white;
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(0,123,255,0.25);
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
        .square-card {
            max-width: 200px;
            padding: 10px;
            border-radius: 8px;
        }
        
        .square-image-container {
            width: 70px;
            height: 70px;
            margin-bottom: 8px;
        }
        
        .square-content p {
            font-size: 0.8rem;
            -webkit-line-clamp: 3;
        }
        
        .bottom-right-nav-buttons {
            margin-right: 10px;
            gap: 6px;
        }
        
        .nav-btn {
            width: 32px;
            height: 32px;
            font-size: 0.8rem;
        }
    }
    
    @media (max-width: 576px) {
        .square-card {
            max-width: 160px;
            padding: 8px;
            border-radius: 6px;
        }
        
        .square-image-container {
            width: 60px;
            height: 60px;
            margin-bottom: 6px;
        }
        
        .square-content p {
            font-size: 0.75rem;
            -webkit-line-clamp: 2;
        }
        
        .bottom-right-nav-buttons {
            margin-right: 8px;
            gap: 4px;
        }
        
        .nav-btn {
            width: 30px;
            height: 30px;
            font-size: 0.75rem;
        }
    }
    
    @media (min-width: 992px) {
        .square-card {
            max-width: 220px;
        }
        
        .square-image-container {
            width: 90px;
            height: 90px;
        }
    }
    
    @media (min-width: 1200px) {
        .square-card {
            max-width: 240px;
        }
        
        .square-image-container {
            width: 100px;
            height: 100px;
        }
    }
    
    /* Fallback untuk browser yang tidak support aspect-ratio */
    @supports not (aspect-ratio: 1 / 1) {
        .square-card {
            position: relative;
            height: 0;
            padding-bottom: 100%; /* 1:1 Aspect Ratio */
        }
        
        .square-card-inner {
            position: absolute;
            top: 12px;
            left: 12px;
            right: 12px;
            bottom: 12px;
        }
        
        @media (max-width: 768px) {
            .square-card-inner {
                top: 10px;
                left: 10px;
                right: 10px;
                bottom: 10px;
            }
        }
        
        @media (max-width: 576px) {
            .square-card-inner {
                top: 8px;
                left: 8px;
                right: 8px;
                bottom: 8px;
            }
        }
    }
</style>