<section class="container mx-auto px-4 mt-5 position-relative" id="isoSection">
    <div class="row align-items-center">
        <div class="col-lg-7 stagger-delay-1" id="isoContent">
            <!-- Konten akan diupdate via JavaScript -->
            @if(count($iso) > 0)
                @php $p = $iso[0]; @endphp
                <h3 class="text-3xl font-bold text-[#003366] mb-3">
                    {{$p->title}} <br> 
                    <span class="text-primary">{{$p->caption}} </span>
                </h3>
                <p class="text-gray-700 fs-5">
                    {!!$p->description!!}
                </p> 
            @endif
        </div>
        <div class="col-lg-5 text-center" id="isoImage">
            <!-- Gambar akan diupdate via JavaScript -->
            @if(count($iso) > 0)
                @php $p = $iso[0]; @endphp
                <div class="position-relative">
                    <img src="{{ asset('assets/img/material/4.jpg')}}" 
                         class="rounded shadow w-100 h-auto "
                         style="max-width: 600px; height: 300px;">
                </div>
            @endif
        </div>
    </div>
  
    
    <!-- Navigation Buttons untuk ISO (di bawah indicators) -->
    <div class="iso-nav-buttons-container mt-1 mb-3 text-center" id="isoNavButtonsContainer">
        <button type="button" class="iso-nav-btn iso-prev-btn" id="isoPrevBtn">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button type="button" class="iso-nav-btn iso-next-btn" id="isoNextBtn">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
</section>
 <style>
/* Container untuk tombol navigasi */
.iso-nav-buttons-container {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 15px;
    margin-bottom: 20px;
}

/* Tombol navigasi ISO - TAMPIL SEPERTI AWAL */
.iso-nav-btn {
    width: 50px; /* Tambahkan width yang sama dengan height */
    height: 50px;
    border-radius: 50%;
    background: white;
    border: 2px solid #0d6efd; /* Border biru seperti awal */
    color: #0d6efd;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
    cursor: pointer;
}

/* Hanya ubah saat hover: border tetap biru, background berubah */
.iso-nav-btn:hover:not(:disabled) {
    background: #0d6efd; /* Background biru saat hover */
    color: white; /* Ikon putih saat hover */
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(13, 110, 253, 0.3);
    /* Border tetap seperti awal, tidak diubah */
}

/* Untuk state focus dan active - jaga border tetap */
.iso-nav-btn:focus,
.iso-nav-btn:active {
    background: #0d6efd;
    color: white;
    border: 2px solid #0d6efd; /* Tetap ada border biru */
    outline: none; /* Hilangkan outline default */
    box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.25); /* Shadow biru lembut */
}

.iso-nav-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    border-color: #ccc; /* Border abu-abu saat disabled */
    color: #ccc;
    background: white;
    transform: none;
    box-shadow: none;
}

/* Indicators */
.iso-indicators {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 25px;
    margin-bottom: 10px;
}

.iso-indicator-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #ddd;
    cursor: pointer;
    transition: all 0.3s ease;
}

.iso-indicator-dot.active {
    background: #0d6efd; /* Kembalikan ke biru */
    transform: scale(1.2);
}

.iso-indicator-dot:hover {
    background: #0d6efd;
    transform: scale(1.1);
    
}

/* Animasi untuk konten ISO */
@keyframes fadeInSlide {
    from {
        opacity: 0;
        transform: translateX(20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.iso-content-animate {
    animation: fadeInSlide 0.5s ease-in-out;
}

@keyframes fadeInSlideReverse {
    from {
        opacity: 0;
        transform: translateX(-20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.iso-image-animate {
    animation: fadeInSlideReverse 0.5s ease-in-out;
}

/* Responsive */
@media (max-width: 768px) {
    .iso-nav-buttons-container {
        margin-top: 20px;
        margin-bottom: 15px;
    }
    
    .iso-nav-btn {
        width: 45px;
        height: 45px;
        font-size: 1rem;
    }
    
    .iso-indicators {
        margin-top: 20px;
        margin-bottom: 5px;
    }
}

@media (max-width: 576px) {
    .col-lg-7, .col-lg-5 {
        text-align: center;
        margin-bottom: 20px;
    }
    
    .iso-image {
        max-width: 280px !important;
        height: 180px !important;
        margin: 0 auto;
    }
    
    .iso-nav-btn {
        width: 40px;
        height: 40px;
        font-size: 0.9rem;
    }
    
    .iso-indicator-dot {
        width: 10px;
        height: 10px;
    }
}
 
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ============================
    // ISO SCRIPT
    // ============================
    const isoData = @json($iso);
    let isoCurrentIndex = 0;
    const totalIso = isoData.length;

    const isoContent = document.getElementById('isoContent');
    const isoImage = document.getElementById('isoImage');
    const isoPrevBtn = document.getElementById('isoPrevBtn');
    const isoNextBtn = document.getElementById('isoNextBtn');
    const isoIndicators = document.getElementById('isoIndicators');
    
    // Inisialisasi indicator dots jika ada data
    let indicatorDots = [];
    if (isoIndicators) {
        indicatorDots = isoIndicators.querySelectorAll('.iso-indicator-dot');
    }

    // Fungsi untuk update tampilan ISO
    function updateIsoDisplay() {
        if (isoData.length === 0) {
            isoContent.innerHTML = '<p class="text-center text-muted">No ISO data available</p>';
            isoImage.innerHTML = '<p class="text-center text-muted">No image available</p>';
            return;
        }

        const currentIso = isoData[isoCurrentIndex];
        
        // Update konten dengan animasi
        isoContent.classList.add('iso-content-animate');
        isoContent.innerHTML = `
            <h3 class="text-3xl font-bold text-[#003366] mb-3">
                ${currentIso.title} <br> 
                <span class="text-primary">${currentIso.caption || ''}</span>
            </h3>
            <div class="text-gray-700 fs-5">
                ${currentIso.description}
            </div>
        `;
        
        // Update gambar dengan animasi
        isoImage.classList.add('iso-image-animate');
        const imageSrc = `${currentIso.image}`;
            
        isoImage.innerHTML = `
            <div class="position-relative d-inline-block">
                <img src="${imageSrc}" 
                     class="rounded w-100 h-auto iso-image"
                     style="max-width: 400px; height: 220px; object-fit: cover;"
                     alt="${currentIso.title}"
                     onerror="this.src='https://placehold.co/350x220?text=ISO+Image'">
            </div>
        `;
        
        // Update indicator dots
        updateIsoIndicators();
        
        // Update status tombol
        updateIsoButtonStates();
        
        // Hapus class animasi setelah selesai
        setTimeout(() => {
            isoContent.classList.remove('iso-content-animate');
            isoImage.classList.remove('iso-image-animate');
        }, 500);
    }

    // Fungsi untuk update indicator dots
    function updateIsoIndicators() {
        indicatorDots.forEach((dot, index) => {
            if (index === isoCurrentIndex) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
    }

    // Fungsi untuk update status tombol
    function updateIsoButtonStates() {
        const hasPrev = isoCurrentIndex > 0;
        const hasNext = isoCurrentIndex < totalIso - 1;

        isoPrevBtn.disabled = !hasPrev;
        isoNextBtn.disabled = !hasNext;
        
        // Tambahkan style untuk disabled state
        // if (isoPrevBtn.disabled) {
        //     isoPrevBtn.style.opacity = '0.4';
        //     isoPrevBtn.style.cursor = 'not-allowed';
        // }
        // if (isoNextBtn.disabled) {
        //     isoNextBtn.style.opacity = '0.4';
        //     isoNextBtn.style.cursor = 'not-allowed';
        // }
    }

    // Fungsi navigasi ISO
    function navigateIso(direction) {
        if (direction === 'prev' && isoCurrentIndex > 0) {
            isoCurrentIndex--;
            updateIsoDisplay();
        } else if (direction === 'next' && isoCurrentIndex < totalIso - 1) {
            isoCurrentIndex++;
            updateIsoDisplay();
        }
    }

    // Fungsi untuk pindah ke ISO tertentu
    function goToIso(index) {
        if (index >= 0 && index < totalIso) {
            isoCurrentIndex = index;
            updateIsoDisplay();
        }
    }

    // ============================
    // EVENT LISTENERS
    // ============================
    
    // Tombol navigasi
    if (isoPrevBtn) {
        isoPrevBtn.addEventListener('click', () => navigateIso('prev'));
    }
    if (isoNextBtn) {
        isoNextBtn.addEventListener('click', () => navigateIso('next'));
    }
    
    // Indicator dots
    indicatorDots.forEach(dot => {
        dot.addEventListener('click', function() {
            const index = parseInt(this.getAttribute('data-index'));
            goToIso(index);
        });
    });
    
    // Keyboard navigation untuk ISO
    const isoSection = document.getElementById('isoSection');
    
    if (isoSection) {
        isoSection.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                e.preventDefault();
                navigateIso('prev');
            } else if (e.key === 'ArrowRight') {
                e.preventDefault();
                navigateIso('next');
            }
        });
        
        // Set tabindex agar bisa difokus
        isoSection.setAttribute('tabindex', '-1');
    }
    
    // Inisialisasi tampilan
    if (isoData.length > 0) {
        updateIsoDisplay();
    } else {
        // Sembunyikan navigasi jika tidak ada data
        if (document.getElementById('isoIndicators')) {
            document.getElementById('isoIndicators').style.display = 'none';
        }
        if (document.getElementById('isoNavButtonsContainer')) {
            document.getElementById('isoNavButtonsContainer').style.display = 'none';
        }
    }
});

// Fallback untuk gambar error
document.addEventListener('DOMContentLoaded', function() {
    document.addEventListener('error', function(e) {
        if (e.target.tagName.toLowerCase() === 'img' && e.target.classList.contains('iso-image')) {
            e.target.src = 'https://placehold.co/350x220?text=ISO+Image';
        }
    }, true);
});
</script>