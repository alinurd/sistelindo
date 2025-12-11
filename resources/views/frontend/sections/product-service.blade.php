<section class=" animate-fade-in">
    <div class="container">
        <span class="text-title mb-3 animate-fade-in mt-5 mb-5 text-center">Product and <span class="text-highlight"><strong>Service
                 </strong></span></span>

        <div class="row justify-content-center">
            <!-- Kontainer untuk Konten -->
            <div id="facilityContainerF" class="col-12">
                @php
                $visibleCount = 3;
                $totalFacilities = count($product);
                @endphp

                @for ($i = 0; $i < min($visibleCount, $totalFacilities); $i++)
                    @php 
                    $p = $product[$i];
                    $shortDescription = Str::limit(strip_tags($p->description), 1000);
                    @endphp
                    <div class="col-lg-10 mx-auto d-flex mb-4 facility-item">
                        <img src="{{ asset($p->image) }}" width="300" height="200" class="shadow-sm rounded me-4" />
                        <div class="flex-grow-1">
                            <h6 class="fw-bold mb-2" style="font-size: 18px">{{ $p->title }}</h6>
                            <p class="text-muted mb-2" style="font-size: 14px; line-height: 1.6">
                                {!! $shortDescription !!}
                                 
                            </p>
                        </div>
                    </div>
                    @if($i < min($visibleCount, $totalFacilities) - 1)
                    {{-- <hr class="mt-0 mb-4" style="margin-left: 200px; max-width: calc(100% - 200px);"> --}}
                    @endif
                @endfor
            </div>
        </div>

                   <div class="d-flex justify-content-end mt-4">

        <div class="bottom-right-nav-buttons">
            <button type="button" class="nav-btn prev-btn" id="prevBtnF">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button type="button" class="nav-btn next-btn" id="nextBtnF">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        </div>
    </div>
</section>
 
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Data facilities dari PHP ke JavaScript
        const facilities = @json($product);
        const visibleCount = 3;
        let currentIndex = 0;
        const totalFacilities = facilities.length;

        // Elemen DOM
        const facilityContainerF = document.getElementById('facilityContainerF');
        const prevBtnF = document.getElementById('prevBtnF');
        const nextBtnF = document.getElementById('nextBtnF');

        // Fungsi untuk membatasi teks menjadi 100 karakter
        function limitText(text, maxLength = 100) {
            // Hapus tag HTML
            const strippedText = text.replace(/<[^>]*>/g, '');
            
            if (strippedText.length <= maxLength) {
                return strippedText;
            }
            
            return strippedText.substring(0, maxLength);
        }

        // Fungsi untuk update tampilan
        function updateDisplay() {
            // Kosongkan kontainer
            facilityContainerF.innerHTML = '';

            // Hitung indeks mulai dan akhir
            const startIndex = currentIndex;
            const endIndex = Math.min(currentIndex + visibleCount, totalFacilities);

            // Tambahkan facility items
            for (let i = startIndex; i < endIndex; i++) {
                const facility = facilities[i];
                const shortDescription = limitText(facility.description || '', 1000);

                // Buat elemen item
                const facilityElement = document.createElement('div');
                facilityElement.className = 'col-lg-10 mx-auto d-flex mb-4 facility-item';

                facilityElement.innerHTML = `
                    <img src="${facility.image.startsWith('http') ? facility.image : 
                              facility.image.startsWith('/') ? facility.image : 
                              '/' + facility.image}" 
                         width="300" height="200" class="shadow-sm rounded me-4" />
                    <div class="flex-grow-1">
                        <h6 class="fw-bold mb-2" style="font-size: 18px">${facility.title || ''}</h6>
                        <p class="text-muted mb-2" style="font-size: 14px; line-height: 1.6">
                            ${shortDescription}
                            ${(facility.description || '').replace(/<[^>]*>/g, '').length > 200 ? '<span class="text-primary">...</span>' : ''}
                        </p>
                    </div>
                `;

                facilityContainerF.appendChild(facilityElement);

                // Tambahkan garis pemisah jika bukan item terakhir
                if (i < endIndex - 1) {
                    const hrElement = document.createElement('hr');
                    hrElement.className = 'mt-0 mb-4';
                    hrElement.style.marginLeft = '200px';
                    hrElement.style.maxWidth = 'calc(100% - 200px)';
                    // facilityContainerF.appendChild(hrElement);
                }
            }

            // Update status tombol
            updateButtonStates();
        }

        // Fungsi untuk update status tombol
        function updateButtonStates() {
            if (!prevBtnF || !nextBtnF) return;

            prevBtnF.disabled = currentIndex === 0;
            nextBtnF.disabled = currentIndex + visibleCount >= totalFacilities;

            // Update styling untuk tombol disabled
            prevBtnF.style.opacity = prevBtnF.disabled ? '0.5' : '1';
            nextBtnF.style.opacity = nextBtnF.disabled ? '0.5' : '1';
        }

        // Fungsi navigasi
        function navigate(direction) {
            if (direction === 'prev' && currentIndex > 0) {
                // Navigasi sebelumnya
                currentIndex = Math.max(0, currentIndex - visibleCount);
                updateDisplay();
            } else if (direction === 'next' && (currentIndex + visibleCount) < totalFacilities) {
                // Navigasi berikutnya
                currentIndex = currentIndex + visibleCount;
                updateDisplay();
            }
        }

        // Tambah event listeners untuk tombol
        if (prevBtnF) {
            prevBtnF.addEventListener('click', () => navigate('prev'));
        }

        if (nextBtnF) {
            nextBtnF.addEventListener('click', () => navigate('next'));
        }

        // Inisialisasi pertama kali
        updateDisplay();
    });
</script>