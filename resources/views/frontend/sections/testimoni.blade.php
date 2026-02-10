<!-- resources/views/frontend/sections/brands.blade.php -->
<div class="my-5 mt-4"></div>
<h2 class="text-title mb-3 text-center animate-fade-in">Happy<span class="text-highlight"><strong> Customer</strong></span></h2>

<div class="row justify-content-center mb-4">
    <div class="col-lg-8 col-md-10">
        <p class="text-muted mx-auto text-center" style="font-size: 18px">
            Thank you for the trust you have placed in us. Your trust motivates us to continue innovating and improving the quality of our service to provide the best experience for every customer.
        </p>
    </div>
</div>

<div class="row justify-content-center" id="testimonial-container">
    @php
        $displayCustomers = array_slice($happyCustomer->where('status', 1)->toArray(), 0, 3);
        $totalCustomers = count($happyCustomer->where('status', 1));
        $allCustomers = $happyCustomer->where('status', 1)->toArray();
        $totalPages = ceil($totalCustomers / 3);
    @endphp

    @foreach($displayCustomers as $customer)
    <div class="col-lg-4 col-md-6 mb-4 d-flex justify-content-center">
        <div class="card testimonial-square border-0 "
             data-customer='@json($customer)'
             onclick="showCustomerDetail(this)"
             style="cursor: pointer; border-radius: 15px; overflow: hidden; width: 600px; height: 300px;">
            
            <!-- Gambar Customer di Center -->
            <div class="text-center pt-4">
                <img src="{{ $customer['image'] ?? asset('assets/img/icon-happy-customer.svg') }}"
                     alt="{{ $customer['title'] }}"
                     class="rounded-circle mb-2"
                     style="width: 60px; height: 60px; object-fit: cover; border: 3px solid #f8f9fa;">
            </div>

            <div class="card-body text-center px-3 pb-3 d-flex flex-column">
                <!-- Nama Customer -->
                <h5 class="card-title mb-1 fw-bold" style="font-size: 16px; color: #333; line-height: 1.2;">{{ $customer['title'] }}</h5>
                
                <!-- Rating Stars -->
                <div class="rating-stars mb-1">
                    @for($i = 0; $i < 5; $i++)
                        @if($i < (int)$customer['rating'])
                            <i class="fas fa-star" style="color: #FFD700; font-size: 12px;"></i>
                        @else
                            <i class="far fa-star" style="color: #FFD700; font-size: 12px;"></i>
                        @endif
                    @endfor
                </div>
                
                <!-- Tanggal -->
                <p class="text-muted mb-2" style="font-size: 12px; color: #666;">
                   <i class="far fa-calendar-alt me-2"></i> {{ $customer['date'] ? \Carbon\Carbon::parse($customer['date'])->format('M d, Y') : 'Recent' }}
                </p>
                
                <!-- Deskripsi (150 karakter pertama) -->
                <div class="flex-grow-1 d-flex align-items-center justify-content-center">
                    <p class="card-text text-muted mb-0" style="font-size: 14px; line-height: 1.4; color: #555; max-height: 80px; overflow: hidden;">
                        @php
                            $cleanText = strip_tags($customer['description']);
                            $shortText = strlen($cleanText) > 150 
                                ? substr($cleanText, 0, 150) . '...' 
                                : $cleanText;
                        @endphp
                        {{ $shortText }}
                    </p>
                </div>
                
                <!-- More Link -->
                <div class="mt-2">
                    <span class="text-primary" style="font-size: 14px; font-weight: 500; cursor: pointer;">
                        <strong>More...</strong>
                    </span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Dot Indicators jika ada lebih dari 3 data -->
@if($totalCustomers > 3)
<div class="col-12 text-center mt-2">
    <div class="dot-indicators">
        @for($i = 0; $i < $totalPages; $i++)
            <span class="dot {{ $i == 0 ? 'active' : '' }} mx-1" 
                  onclick="slideTo({{ $i }})"
                  data-page="{{ $i }}"></span>
        @endfor
    </div>
</div>
@endif


<style>
    /* Kartu Testimonial Square 1:1 */
    .testimonial-square {
        width: 300px;
        height: 300px;
        transition: all 0.3s ease;
        background: white;
        display: flex;
        flex-direction: column;
    }
    
    .testimonial-square:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
    }
    
    /* Animasi */
    .animate-fade-in {
        animation: fadeIn 1s ease-in;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    /* Rating Stars */
    .rating-stars {
        font-size: 15px;
        letter-spacing: 1px;
    }
    
    /* Dot Indicators */
    .dot-indicators {
        display: inline-block;
        margin-top: 25px;
    }
    
    .dot {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: #ddd;
        cursor: pointer;
        transition: all 0.3s ease;
        margin: 0 5px;
    }
    
    .dot.active {
        background-color: #007bff;
        transform: scale(1.2);
    }
    
    .dot:hover {
        background-color: #007bff;
    }
    
    /* Simple Modal Scrollbar */
    #simpleModalDescription::-webkit-scrollbar {
        width: 6px;
    }
    
    #simpleModalDescription::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    #simpleModalDescription::-webkit-scrollbar-thumb {
        background: #007bff;
        border-radius: 10px;
    }
    
    #simpleModalDescription::-webkit-scrollbar-thumb:hover {
        background: #0056b3;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .testimonial-square {
            width: 280px;
            height: 280px;
        }
        
        #simpleModal {
            padding: 10px;
        }
        
        #simpleModal > div {
            max-width: 95%;
            margin: 20px auto;
        }
    }
    
    @media (max-width: 576px) {
        .testimonial-square {
            width: 260px;
            height: 260px;
        }
        
        #simpleModal > div {
            max-width: 100%;
            margin: 10px auto;
            border-radius: 0;
        }
    }
    
    /* Card fade animation */
    .card-fade-in {
        animation: cardFadeIn 0.5s ease-out;
    }
    
    @keyframes cardFadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<script>
// Data customers dari PHP
const allCustomers = @json($allCustomers);
const totalCustomers = {{ $totalCustomers }};
let currentPage = 0;
const customersPerPage = 3;

function showCustomerDetail(element) {
    console.log('Card clicked');
    
    try {
        // Dapatkan data dari attribute
        const customerData = element.getAttribute('data-customer');
        if (!customerData) {
            console.error('No customer data found');
            return;
        }
        
        const customer = JSON.parse(customerData); 
        
        // Set data ke modal
        const modalImage = document.getElementById('simpleModalImage');
        const modalName = document.getElementById('simpleModalName');
        const modalDateText = document.getElementById('simpleModalDateText');
        
        modalImage.src = customer.image || '{{ asset("assets/img/icon-happy-customer.svg") }}';
        modalName.textContent = customer.title || 'No Name';
        
        // Format tanggal
        const date = customer.date ? new Date(customer.date) : new Date();
        const options = { year: 'numeric', month: 'short', day: 'numeric' };
        modalDateText.textContent =customer.date ?  date.toLocaleDateString('en-US', options):'Recent';
        
        // Set rating stars
        const ratingContainer = document.getElementById('simpleModalRating');
        ratingContainer.innerHTML = '';
        const rating = parseInt(customer.rating) || 5;
        
        for (let i = 1; i <= 5; i++) {
            const star = document.createElement('i');
            star.className = i <= rating ? 'fas fa-star' : 'far fa-star';
            star.style.color = '#FFD700';
            star.style.margin = '0 3px';
            star.style.fontSize = '16px';
            ratingContainer.appendChild(star);
        }
        
        // Set description lengkap
        const descriptionContainer = document.getElementById('simpleModalDescription');
        descriptionContainer.innerHTML = customer.description || 'No description available.';
        
        // Tampilkan modal
        const modal = document.getElementById('simpleModal');
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
        
        // Scroll ke atas modal
        modal.scrollTop = 0; 
        
    } catch (error) {
        console.error('Error showing customer detail:', error);
        alert('Error loading customer details. Please try again.');
    }
}

function closeSimpleModal() {
    const modal = document.getElementById('simpleModal');
    modal.style.display = 'none';
    document.body.style.overflow = 'auto'; 
}


// Fungsi untuk menampilkan halaman tertentu
function slideTo(pageIndex) {
    console.log('Slide to page:', pageIndex);
    currentPage = pageIndex;
    
    // Update active dot
    document.querySelectorAll('.dot').forEach((dot, index) => {
        dot.classList.remove('active');
        if (index === pageIndex) {
            dot.classList.add('active');
        }
    });
    
    // Hitung indeks mulai dan akhir
    const startIndex = pageIndex * customersPerPage;
    const endIndex = Math.min(startIndex + customersPerPage, totalCustomers);
    const pageCustomers = allCustomers.slice(startIndex, endIndex);
    
    // Dapatkan container testimonial
    const container = document.getElementById('testimonial-container');
    
    // Kosongkan container
    container.innerHTML = '';
    
    // Tambahkan card untuk setiap customer di halaman ini
    pageCustomers.forEach(customer => {
        // Format tanggal
        const date = customer.date ? new Date(customer.date) : null;
        const dateStr = date ? date.toLocaleDateString('en-US', { 
            year: 'numeric', 
            month: 'short', 
            day: 'numeric' 
        }) : 'Recent';
        
        // Potong deskripsi menjadi 150 karakter
        const cleanText = customer.description ? customer.description.replace(/<[^>]*>/g, '') : '';
        const shortText = cleanText.length > 150 
            ? cleanText.substring(0, 150) + '...' 
            : cleanText;
        
        // Buat rating stars
        let ratingStars = '';
        const rating = parseInt(customer.rating) || 5;
        for (let i = 1; i <= 5; i++) {
            ratingStars += i <= rating 
                ? '<i class="fas fa-star" style="color: #FFD700; font-size: 12px;"></i>' 
                : '<i class="far fa-star" style="color: #FFD700; font-size: 12px;"></i>';
        }
        
        // Buat HTML card - SIMPLE VERSION tanpa JSON parse issues
        const cardHTML = `
        <div class="col-lg-4 col-md-6 mb-4 d-flex justify-content-center">
            <div class="card testimonial-square border-0 shadow-sm card-fade-in"
                 data-customer='${JSON.stringify(customer).replace(/'/g, "&apos;")}'
                 onclick="showCustomerDetail(this)"
                 style="cursor: pointer; border-radius: 15px; overflow: hidden; width: 300px; height: 300px;">
                
                <div class="text-center pt-4">
                    <img src="${customer.image || '{{ asset("assets/img/icon-happy-customer.svg") }}'}" 
                         alt="${customer.title || 'Customer'}"
                         class="rounded-circle mb-2"
                         style="width: 60px; height: 60px; object-fit: cover; border: 3px solid #f8f9fa;">
                </div>

                <div class="card-body text-center px-3 pb-3 d-flex flex-column">
                    <h5 class="card-title mb-1 fw-bold" style="font-size: 16px; color: #333; line-height: 1.2;">${customer.title || 'No Name'}</h5>
                    
                    <div class="rating-stars mb-1">
                        ${ratingStars}
                    </div>
                    
                    <p class="text-muted mb-2" style="font-size: 12px; color: #666;">
                       <i class="far fa-calendar-alt me-2"></i> ${dateStr}
                    </p>
                    
                    <div class="flex-grow-1 d-flex align-items-center justify-content-center">
                        <p class="card-text text-muted mb-0" style="font-size: 14px; line-height: 1.4; color: #555; max-height: 80px; overflow: hidden;">
                            ${shortText || 'No description'}
                        </p>
                    </div>
                    
                    <div class="mt-2">
                        <span class="text-primary" style="font-size: 14px; font-weight: 500; cursor: pointer;">
                            <strong>More...</strong>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        `;
        
        container.innerHTML += cardHTML;
    });
    
    // Tambahkan animasi fade in untuk card baru
    setTimeout(() => {
        const cards = container.querySelectorAll('.testimonial-square');
        cards.forEach(card => {
            card.style.animation = 'cardFadeIn 0.5s ease-out';
        });
    }, 50);
}

// Event listener untuk modal
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded - Happy Customer section');
    
    // Close modal dengan ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeSimpleModal();
        }
    });
    
    // Close modal dengan klik overlay
    const modal = document.getElementById('simpleModal');
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeSimpleModal();
            }
        });
    }
    
    // Efek hover untuk card
    document.addEventListener('mouseover', function(e) {
        if (e.target.closest('.testimonial-square')) {
            const card = e.target.closest('.testimonial-square');
            card.style.transform = 'translateY(-5px)';
        }
    });
    
    document.addEventListener('mouseout', function(e) {
        if (e.target.closest('.testimonial-square')) {
            const card = e.target.closest('.testimonial-square');
            card.style.transform = 'translateY(0)';
        }
    });
    
});
</script>