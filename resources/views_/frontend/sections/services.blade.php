<section class="services-wrapper py-5 animate-fade-in">
    <div class="container">
        <div class="row g-5 justify-content-center" id="facilityContainer">
            @php
                $visibleCount = 2;
                $totalFacilities = count($product);
            @endphp

            @for ($i = 0; $i < min($visibleCount, $totalFacilities); $i++)
                @php $p = $product[$i]; @endphp
                <div class="col-lg-6 text-center">
                    <img src="{{ asset($p->image) }}" width="500" height="260" class="shadow-sm rounded mb-3" />
                    <div class="services-card">
                        <h5>{{ $p->title }}</h5>
                        <p class="text-muted small px-3">
                            {!! $p->description !!}
                        </p>
                        <a class="btn btn-outline-primary btn-sm">Detail</a>
                    </div>
                </div>
            @endfor
        </div>
    </div>
    
    <div class="floating-nav-buttons">
        <button type="button" class="nav-btn prev-btn" id="prevBtn">
            <i class="fas fa-chevron-up"></i>
        </button>
        <button type="button" class="nav-btn next-btn" id="nextBtn">
            <i class="fas fa-chevron-down"></i>
        </button>
    </div>
</section>
 

<script>
// Data facilities dari PHP ke JavaScript
const facilities = @json($product);
const visibleCount = 2;
let currentIndex = 0;
const totalFacilities = facilities.length;

// Elemen DOM
const facilityContainer = document.getElementById('facilityContainer');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');

// Fungsi untuk update tampilan
function updateDisplay() {
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
        
        // Pastikan deskripsi aman untuk HTML
        const description = facility.description || '';
        
        colDiv.innerHTML = `
            <img src="${imageSrc}" width="500" height="260" class="shadow-sm rounded mb-3" />
            <div class="services-card">
                <h5>${facility.title || ''}</h5>
                <p class="text-muted small px-3">
                    ${description}
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
    const hasPrev = currentIndex > 0;
    const hasNext = (currentIndex + visibleCount) < totalFacilities;
    
    // Atur disabled state
    prevBtn.disabled = !hasPrev;
    nextBtn.disabled = !hasNext;
    
    // Update styling untuk tombol disabled
    if (prevBtn.disabled) {
        prevBtn.style.opacity = '0.5';
        prevBtn.style.cursor = 'not-allowed';
    } else {
        prevBtn.style.opacity = '1';
        prevBtn.style.cursor = 'pointer';
    }
    
    if (nextBtn.disabled) {
        nextBtn.style.opacity = '0.5';
        nextBtn.style.cursor = 'not-allowed';
    } else {
        nextBtn.style.opacity = '1';
        nextBtn.style.cursor = 'pointer';
    }
}

// Fungsi navigasi
function navigate(direction) {
    if (direction === 'up' && currentIndex > 0) {
        currentIndex = Math.max(0, currentIndex - visibleCount);
        updateDisplay();
    } else if (direction === 'down' && (currentIndex + visibleCount) < totalFacilities) {
        currentIndex = Math.min(totalFacilities - visibleCount, currentIndex + visibleCount);
        updateDisplay();
    }
}

// Tambah event listeners
prevBtn.addEventListener('click', () => navigate('up'));
nextBtn.addEventListener('click', () => navigate('down'));

// Tambah navigasi dengan keyboard (opsional)
document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowUp') {
        e.preventDefault();
        navigate('up');
    } else if (e.key === 'ArrowDown') {
        e.preventDefault();
        navigate('down');
    }
});

// Responsif: Sesuaikan posisi tombol pada layar kecil
function adjustFloatingButtons() {
    const floatingButtons = document.querySelector('.floating-nav-buttons');
    if (!floatingButtons) return;
    
    if (window.innerWidth < 768) {
        floatingButtons.style.bottom = '20px';
        floatingButtons.style.right = '20px';
        floatingButtons.style.gap = '6px';
        
        const buttons = document.querySelectorAll('.nav-btn');
        buttons.forEach(btn => {
            btn.style.width = '45px';
            btn.style.height = '45px';
            btn.style.fontSize = '1rem';
        });
    } else {
        floatingButtons.style.bottom = '30px';
        floatingButtons.style.right = '30px';
        floatingButtons.style.gap = '8px';
        
        const buttons = document.querySelectorAll('.nav-btn');
        buttons.forEach(btn => {
            btn.style.width = '50px';
            btn.style.height = '50px';
            btn.style.fontSize = '1.2rem';
        });
    }
}

// Inisialisasi
document.addEventListener('DOMContentLoaded', function() {
    updateButtonStates();
    adjustFloatingButtons();
    
    // Update display untuk memastikan konten sesuai
    updateDisplay();
});

window.addEventListener('resize', adjustFloatingButtons);
</script>