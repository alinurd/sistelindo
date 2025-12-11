@php
    use App\Models\Master\PageDetail;
    use App\Models\AppSetting;

    $set = AppSetting::first();
    $p = PageDetail::where('status', 1)->get();
@endphp

<section class="py-5 contact-section animate-fade-in">
    <div class="container">
        <!-- Deskripsi atas -->
        <div class="text-center mb-5">
            <p class="lead mb-0" style="max-width: 700px; margin: 0 auto;">
                If you have any questions explicitly, do contact Us to telephone about our services process and then to
                contact us with your customers, and our dedicated home will be happy to assist you
            </p>
        </div>

        <div class="row g-4">
            <!-- Kolom Informasi -->
            <div class="col-lg-6">
                <div class="contact-info-card h-100">
                    <!-- Head Office -->
                    <div class="contact-item mb-4">
                        <div class="d-flex">
                            <div class="contact-icon me-3">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-content flex-grow-1">
                                <h5 class="mb-2">Location</h5>
                                <p class="mb-2">
                                    {!! $set->address !!}
                                </p>
                                
                                <!-- Google Maps -->
                                <div class="map-container mb-2">
                                    <iframe
                                        src="{{ ($p[0]['latitude'] ?? null) && ($p[0]['longitude'] ?? null)
                                            ? "https://www.google.com/maps?q={$p[0]['latitude']},{$p[0]['longitude']}&hl=es;z=14&output=embed"
                                            : null }}"
                                        style="border:0; width:100%; height:200px; border-radius: 8px;" 
                                        allowfullscreen loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
                                
                                <!-- Info Map -->
                                {{-- <div class="map-info small text-muted mt-2">
                                    <div class="d-flex flex-wrap gap-2">
                                        <span>Citicon</span>
                                        <span>•</span>
                                        <span>Jl. 61</span>
                                        <span>•</span>
                                        <span>Google</span>
                                        <span>•</span>
                                        <span>Data peta ©2023 Google</span>
                                        <span>•</span>
                                        <span>Persyaratan</span>
                                        <span>•</span>
                                        <span>Laporkan kesalahan peta</span>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <!-- Website/Email -->
                    <div class="contact-item mb-4">
                        <div class="d-flex">
                            <div class="contact-icon me-3">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-content">
                                <h5 class="mb-2">Website/eMail</h5>
                                <p class="mb-0">
                                    {{ $set->website ?? 'www.sistelindo.com' }}<br>
                                    {{ $set->email ?? 'copylas@gmail.com' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- WhatsApp -->
                    <div class="contact-item">
                        <div class="d-flex">
                            <div class="contact-icon me-3">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div class="contact-content">
                                <h5 class="mb-2">Whatsapp</h5>
                                <p class="mb-0">{{ $set->whatsapp ?? '+62 858-8312-1699' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Form -->
            <div class="col-lg-6">
                <div class="contact-form-card h-100">
                    <h5 class="mb-4">Send Us a Message</h5>
                    <form class="contact-form" id="formData">
                        @csrf
                        <!-- Nama dan Email -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Your e-mail" required>
                                </div>
                            </div>
                        </div>

                        <!-- Subject -->
                        <div class="form-group mb-3">
                            <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                        </div>

                        <!-- Message -->
                        <div class="form-group mb-4">
                            <textarea name="message" class="form-control" rows="5" placeholder="Messages" required></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="button" id="submit" class="btn btn-primary w-100 py-2">
                            <span id="simpan">
                                <i class="fas fa-paper-plane me-2"></i> Submit Message
                            </span>
                            <span id="loading" class="d-none">
                                <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                Processing...
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .contact-section {
        background: #f8f9fa;
    }
    
    .contact-info-card,
    .contact-form-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        padding: 2rem;
        height: 100%;
    }
    
    .contact-item {
        padding-bottom: 1.5rem;
        /* border-bottom: 1px solid #eee; */
    }
    
    .contact-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }
    
    .contact-icon {
        width: 40px;
        height: 40px;
        background: #064b90;
        color: white;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    
    .contact-icon i {
        font-size: 1rem;
    }
    
    .contact-content h5 {
        color: #333;
        font-weight: 600;
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
    }
    
    .contact-content h6 {
        font-size: 0.95rem;
    }
    
    .contact-content p {
        color: #555;
        font-size: 0.95rem;
        line-height: 1.5;
        margin-bottom: 0;
    }
    
    .map-container {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
    }
    
    .map-info {
        font-size: 0.8rem;
        color: #666;
    }
    
    .map-info .d-flex span:not(:last-child) {
        margin-right: 0.5rem;
    }
    
    .contact-form h5 {
        color: #333;
        font-weight: 600;
        font-size: 1.2rem;
    }
    
    .form-group input,
    .form-group textarea {
        border: 1px solid #ddd;
        border-radius: 6px;
        padding: 0.75rem;
        font-size: 0.95rem;
    }
    
    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #064b90;
        box-shadow: 0 0 0 0.2rem rgba(6, 75, 144, 0.1);
    }
    
    .btn-primary {
        background: #064b90;
        border: none;
        border-radius: 6px;
        font-weight: 500;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        background: #053a73;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(6, 75, 144, 0.2);
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .contact-info-card,
        .contact-form-card {
            padding: 1.5rem;
        }
        
        .contact-icon {
            width: 36px;
            height: 36px;
        }
        
        .map-info .d-flex {
            flex-direction: column;
            gap: 0.25rem !important;
        }
        
        .map-info .d-flex span {
            margin-right: 0 !important;
        }
    }
    
    @media (max-width: 576px) {
        .contact-info-card,
        .contact-form-card {
            padding: 1.25rem;
        }
        
        .contact-icon {
            width: 32px;
            height: 32px;
        }
        
        .contact-icon i {
            font-size: 0.9rem;
        }
        
        .contact-content h5 {
            font-size: 1rem;
        }
        
        .contact-content p {
            font-size: 0.9rem;
        }
    }
</style>

<script>
    // Jika membutuhkan script untuk form submission
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('formData');
        const submitBtn = document.getElementById('submit');
        const simpanSpan = document.getElementById('simpan');
        const loadingSpan = document.getElementById('loading');
        
        if (submitBtn) {
            submitBtn.addEventListener('click', function() {
                // Validasi form
                if (!form.checkValidity()) {
                    form.classList.add('was-validated');
                    return;
                }
                
                // Tampilkan loading
                simpanSpan.classList.add('d-none');
                loadingSpan.classList.remove('d-none');
                
                // Kirim form (contoh dengan AJAX)
                const formData = new FormData(form);
                
             
            });
        }
    });
</script>