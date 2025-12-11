<section class="services-wrapper py-5 animate-fade-in">
    <div class="container">
        <div class="row g-5 justify-content-center" id="facilityContainer">
            @php
                $visibleCount = 2;
                $totalFacilities = count($product);
            @endphp

            @for ($i = 0; $i < min($visibleCount, $totalFacilities); $i++)
                @php 
                    $p = $product[$i];
                    // Potong deskripsi menjadi 100 kata pertama
                    $description = $p->description;
                    $words = str_word_count(strip_tags($description), 1);
                    if (count($words) > 100) {
                        $shortDescription = implode(' ', array_slice($words, 0, 100)) . '...';
                    } else {
                        $shortDescription = $description;
                    }
                @endphp
                <div class="col-lg-6 text-center">
                    <img src="{{ asset($p->image) }}" width="500" height="260" class="shadow-sm rounded mb-3" />
                    <div class="services-card">
                        <h5>{{ $p->title }}</h5>
                        <p class="text-muted small px-3">
                            {!! $shortDescription !!}
                        </p>
                        <a class="btn btn-outline-primary btn-sm">Detail</a>
                    </div>
                </div>
            @endfor
        </div>
        
        <!-- Tombol navigasi di dalam container -->
        <div class="d-flex justify-content-end mt-4">
            <div class="bottom-right-nav-buttons">
                <button type="button" class="nav-btn prev-btn" id="prevBtn">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button type="button" class="nav-btn next-btn" id="nextBtn">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<script>
// Data facilities dari PHP ke JavaScript
const facilities = @json($product);
const visibleCount = 2;
let currentIndex = 0;
const totalFacilities = facilities.length;

// Fungsi untuk memotong teks menjadi 100 kata
function truncateTo100Words(text) {
    if (!text) return '';
    
    // Hapus tag HTML
    const div = document.createElement('div');
    div.innerHTML = text;
    const plainText = div.textContent || div.innerText || '';
    
    // Pisah menjadi kata-kata
    const words = plainText.trim().split(/\s+/);
    
    // Ambil 100 kata pertama
    if (words.length > 100) {
        return words.slice(0, 100).join(' ') + '...';
    }
    
    return plainText;
}

// Fungsi untuk update tampilan
function updateDisplay() {
    const facilityContainer = document.getElementById('facilityContainer');
    
    // Kosongkan kontainer
    facilityContainer.innerHTML = '';
    
    // Hitung indeks akhir
    const endIndex = Math.min(currentIndex + visibleCount, totalFacilities);
    
    // Tambahkan facility items
    for (let i = currentIndex; i < endIndex; i++) {
        const facility = facilities[i];
        
        // Buat elemen dengan struktur yang sama seperti HTML awal
        const colDiv = document.createElement('div');
        colDiv.className = 'col-lg-6 text-center facility-item';
        
        // Pastikan path gambar benar
        const imageSrc = facility.image.startsWith('http') || facility.image.startsWith('/') 
            ? facility.image 
            : '/' + facility.image;
        
        // Potong deskripsi menjadi 100 kata
        const truncatedDescription = truncateTo100Words(facility.description || '');
        
        colDiv.innerHTML = `
            <img src="${imageSrc}" width="500" height="260" class="shadow-sm rounded mb-3" />
            <div class="services-card">
                <h5>${facility.title || ''}</h5>
                <p class="text-muted small px-3">
                    ${truncatedDescription}
                </p>
                <a class="btn btn-outline-primary btn-sm">Detail</a>
            </div>
        `;
        
        facilityContainer.appendChild(colDiv);
    }
    
    // Update status tombol
    updateButtonStates();
}

// Fungsi untuk update status tombol
function updateButtonStates() {
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    
    const hasPrev = currentIndex > 0;
    const hasNext = (currentIndex + visibleCount) < totalFacilities;
    
    // Atur disabled state
    if (prevBtn) {
        prevBtn.disabled = !hasPrev;
        prevBtn.style.opacity = !hasPrev ? '0.5' : '1';
        prevBtn.style.cursor = !hasPrev ? 'not-allowed' : 'pointer';
    }
    
    if (nextBtn) {
        nextBtn.disabled = !hasNext;
        nextBtn.style.opacity = !hasNext ? '0.5' : '1';
        nextBtn.style.cursor = !hasNext ? 'not-allowed' : 'pointer';
    }
}

// Fungsi navigasi - Horizontal (kiri/kanan)
function navigate(direction) {
    if (direction === 'left' && currentIndex > 0) {
        currentIndex = Math.max(0, currentIndex - visibleCount);
        updateDisplay();
    } else if (direction === 'right' && (currentIndex + visibleCount) < totalFacilities) {
        currentIndex = Math.min(totalFacilities - visibleCount, currentIndex + visibleCount);
        updateDisplay();
    }
}

// Inisialisasi
document.addEventListener('DOMContentLoaded', function() {
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    
    if (prevBtn) {
        prevBtn.addEventListener('click', () => navigate('left'));
    }
    
    if (nextBtn) {
        nextBtn.addEventListener('click', () => navigate('right'));
    }
    
    updateDisplay();
});
</script>

<style>
    .services-wrapper {
        position: relative;
        min-height: 400px;
    }
    
    /* Tombol navigasi dalam container */
    .bottom-right-nav-buttons {
        display: flex;
        gap: 10px;
        margin-right: 20px;
    }
    
    .nav-btn {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: 2px solid #007bff;
        background-color: white;
        color: #007bff;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        cursor: pointer;
        font-size: 1.2rem;
    }
    
    .nav-btn:hover:not(:disabled) {
        background-color: #007bff;
        color: white;
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(0,123,255,0.3);
    }
    
    .nav-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        border-color: #ccc;
        color: #ccc;
        transform: none;
    }
    
    /* Responsif untuk layar kecil */
    @media (max-width: 768px) {
        .bottom-right-nav-buttons {
            margin-right: 15px;
            gap: 8px;
        }
        
        .nav-btn {
            width: 45px;
            height: 45px;
            font-size: 1.1rem;
        }
    }
    
    @media (max-width: 576px) {
        .bottom-right-nav-buttons {
            margin-right: 10px;
            gap: 5px;
        }
        
        .nav-btn {
            width: 40px;
            height: 40px;
            font-size: 1rem;
        }
    }
    
    @media (max-width: 400px) {
        .bottom-right-nav-buttons {
            margin-right: 8px;
        }
        
        .nav-btn {
            width: 35px;
            height: 35px;
            font-size: 0.9rem;
        }
    }
    
    /* Untuk zoom ekstrem */
    @media screen and (max-width: 3000px) {
        .nav-btn {
            width: clamp(35px, 5vw, 50px);
            height: clamp(35px, 5vw, 50px);
            font-size: clamp(0.8rem, 1.2vw, 1rem);
        }
    }
    
    /* Container untuk tombol agar tidak overflow */
    .container {
        position: relative;
        overflow: visible;
    }
</style>