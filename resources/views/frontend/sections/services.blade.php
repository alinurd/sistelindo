<section class="services-wrapper py-2 animate-fade-in">
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
                    <br><br>
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
        
        <br>
        <br>
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
             <br><br>   
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
 