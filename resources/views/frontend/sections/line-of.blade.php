<section class="text-center  px-2 mt-3">
    <h2 class="text-title mb-3 animate-fade-in">Line of <span class="text-highlight">Market Industry</span></h2>

    <div class="container">
        <div class="row justify-content-center g-1 g-md-2">
            @foreach ($lineMarket as $p)
                <div class="col-6 col-md-4 col-lg-3 mb-3"> <!-- Kembali ke 4 kolom di desktop -->
                    <!-- Card dengan aspect ratio -->
                    <div class="industry-card">
                        <div class="card-inner p-2">
                            <!-- Gambar - DIPERBESAR -->
                            <div class="icon-wrapper mb-1">
                                <img src="{{ asset($p->image) }}" alt="{{ $p->title }}"
                                    class="industry-icon">
                                    
                            </div>
                            
                            <!-- Teks - TAMPILKAN SEMUA -->
                            <div class="text-wrapper">
                                <p class=" p-4 mt-5 mb-0 text-center">
                                    {{ $p->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Style untuk industry card -->
        <style>
            /* Base card style */
            .industry-card {
                position: relative;
                padding-top: 100%; /* Membuat bujur sangkar */
            }
            
            .card-inner {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: white;
                  box-shadow: 0 3px 8px rgba(0, 0, 0, 0.06);
        border-radius: 10px;
        border: 1px solid #e9ecef;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 1rem; /* Padding diperbesar */
                transition: all 0.2s ease;
            }
            
            .card-inner:hover {
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                transform: translateY(-2px);
            }
            
            /* Icon wrapper - DIPERBESAR */
            .icon-wrapper {
                 display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 1rem; /* Margin diperbesar */
                flex-shrink: 0;
            }
            
            .industry-icon {
                padding-top: 90px
                /* max-width: 100%;
                max-height: 100%;
                object-fit: contain; */
            }
            
            /* Text wrapper - TAMPILKAN SEMUA */
            .text-wrapper {
                width: 100%;
                flex: 1;
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: visible; /* Diubah dari hidden ke visible */
            }
            
            .industry-text {
                font-size: 0.85rem; /* Font size diperbesar sedikit */
                line-height: 1.4; /* Line height diperbesar untuk readability */
                color: #333;
                margin: 0;
                word-break: break-word;
                overflow-wrap: break-word;
                hyphens: auto;
                /* HAPUS ellipsis dan line clamp */
                display: block; /* Diubah dari -webkit-box ke block */
                overflow: visible; /* Diubah dari hidden ke visible */
                text-overflow: clip; /* Diubah dari ellipsis ke clip */
                white-space: normal; /* Pastikan normal */
            }
            
            /* Grid layout */
            .row.g-1 {
                --bs-gutter-x: 0.5rem;
                --bs-gutter-y: 0.5rem;
            }
            
            .row.g-md-2 {
                --bs-gutter-x: 1rem;
                --bs-gutter-y: 1rem;
            }
            
            /* Title styling */
            .text-title {
                font-size: 1.5rem;
                margin-bottom: 1.5rem;
            }
            
            /* Responsive adjustments */
            @media (max-width: 576px) {
                .industry-text {
                    font-size: 0.75rem;
                    line-height: 1.3;
                }
                
                .icon-wrapper {
                    height: 50px; /* Tetap besar untuk mobile */
                    width: 50px;
                    margin-bottom: 0.75rem;
                }
                
                .card-inner {
                    padding: 0.75rem;
                }
                
                .text-title {
                    font-size: 1.3rem;
                }
            }
            
            @media (min-width: 768px) {
                .industry-text {
                    font-size: 0.9rem;
                    line-height: 1.4;
                }
                
                .icon-wrapper {
                    height: 65px;
                    width: 65px;
                }
            }
            
            @media (min-width: 992px) {
                .industry-text {
                    font-size: 0.95rem;
                    line-height: 1.5;
                }
                
                .icon-wrapper {
                    height: 70px;
                    width: 70px;
                }
            }
            
            /* Handle long text - tanpa truncation */
            .industry-text {
                font-weight: 500;
            }
            
            /* Pastikan card cukup tinggi untuk menampung semua teks */
            .industry-card {
                min-height: 180px; /* Minimum height untuk menampung konten */
            }
            
            /* Jika ingin card lebih fleksibel tinggi */
            @media (max-width: 576px) {
                .industry-card {
                    min-height: 160px;
                }
            }
            
            @media (min-width: 768px) {
                .industry-card {
                    min-height: 200px;
                }
            }
            
            /* Atau gunakan aspect ratio yang lebih tinggi */
            .industry-card {
                padding-top: 90%; /* Lebih tinggi dari lebar untuk menampung lebih banyak teks */
            }
            
            /* Alternatif: gunakan height tetap dan scroll jika perlu */
            /*
            .text-wrapper {
                max-height: 100px;
                overflow-y: auto;
            }
            
            .text-wrapper::-webkit-scrollbar {
                width: 3px;
            }
            
            .text-wrapper::-webkit-scrollbar-thumb {
                background: #ddd;
                border-radius: 3px;
            }
            */
        </style>
    </div>
</section>