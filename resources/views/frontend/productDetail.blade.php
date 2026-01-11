@extends('frontend.layouts.app')

@section('content')
    {{-- TOP SPACING --}}
    <section class="w-full text-center mb-16 animate-fade-in">
        <div class="image-wrapper">
            <a href="#" class="btn btn-primary booking-btn">
                Booking Demo
            </a>
                        <img src="{{ asset( "assets/img/banner-detail-product.jpeg") }}" class="rounded   product-image" />


             <span class="image-caption">
                Detail Product
            </span>
        </div>
    </section>

    <section class="mt-5 mb-5">
        <div class="container">
            <div class="row align-items-center" style="margin-left: 100px">
                <div class="col-lg-3 col-md-5 animate-slide-left stagger-delay-1">
                    <!-- Gambar di kiri -->
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <img src="{{ asset($product->image) }}" class="rounded hover-grow" alt=""
                            style="width: 280px; height: 210px; object-fit: cover;">
                    </div>
                </div>

                <div class="col-lg-9 col-md-7 animate-slide-right stagger-delay-2 mt-4 mt-md-0">
                    <!-- Judul -->
                    <h2 class="text-title mb-1">{!! $product->title !!}</h2>

                    <!-- Subtitle -->
                    <p class=" mb-3 text-title" style="font-size: 14px; color: #064b90; font-weight: 500;">
                        Deskripsi
                        <span class="text-highlight" style="font-size: 14px;">Detail</span>
                    </p>

                    <!-- Deskripsi -->
                    <p class="text-muted mb-4" style="font-size: 0.95rem; line-height: 1.6;">
                        {!! $product->description !!}
                    </p>

                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 mb-5" style="color: #064b90;">
        <div class="container bg-light rounded p-4" style="max-width: 700px">
            <p class=" mb-3 text-title" style="font-size: 14px; color: #064b90; font-weight: 500;">
                        Bentuk
                        <span class="text-highlight" style="font-size: 14px;">Layanan</span>
                    </p> 
            
            <div class="row  text-center">
                <div class="col-md-7">
                    <ul class="list-unstyled">
                        <li class="mb-1 d-flex align-items-start">
                            <span class="me-2" style="color: #064b90;">•</span>
                            <span>Dedicated Lossed Line</span>
                        </li>
                        <li class="mb-1 d-flex align-items-start">
                            <span class="me-2" style="color: #064b90;">•</span>
                            <span>Public Inferred (Closed Area)</span>
                        </li>
                        <li class="mb-1 d-flex align-items-start">
                            <span class="me-2" style="color: #064b90;">•</span>
                            <span>Mail & Web Services</span>
                        </li>
                        <li class="mb-1 d-flex align-items-start">
                            <span class="me-2" style="color: #064b90;">•</span>
                            <span>Hosting, Domain & Co-location</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-5">
                    <ul class="list-unstyled">
                        <li class="mb-1 d-flex align-items-start">
                            <span class="me-2" style="color: #064b90;">•</span>
                            <span>Koonranan Jaringan</span>
                        </li>
                        <li class="mb-1 d-flex align-items-start">
                            <span class="me-2" style="color: #064b90;">•</span>
                            <span>Colaupan Nallian Witte</span>
                        </li>
                        <li class="mb-1 d-flex align-items-start">
                            <span class="me-2" style="color: #064b90;">•</span>
                            <span>Dokungan Hitip Deik 24 jam</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="text-center mt-5 px-4">
        <span class="text-title mb-3 animate-fade-in mt-5 text-center">
            Diagram Anomali <br>
            <span class="text-highlight"><strong>Dual Homing (Kurang Ideal)</strong></span>
        </span>
        <div class="container animate-fade-in stagger-delay-1">
            <div class="row justify-content-center">
                <div class="col-12">
                    <!-- Container untuk gambar timeline -->
                    <div class="timeline-image-container">
                        <img src="{{ asset('') }}" class="img-fluid timeline-image "
                            alt="Diagram Anomali Img" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container text-center">


     <div class="row justify-content-center g-4">
            <!-- LEFT BOX -->
            <div class="col-md-5 col-lg-4">
                <div class="contact-box shadow-sm p-4 rounded-3"
                    style="min-height: 350px; height: 350px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <br><br>
                        <h5 class="fw-bold mb-3" style="color: #104f85;"><strong>Get Started</strong></h5>
                        <p class="text-muted small" style="font-size: 18px">
                            Contact us to learn how we can support your business. <br><br>
                            Let us know how we can contact you, what you would like to know,
                            and how we can help.
                        </p>
                    </div>
                </div>
            </div>
            <!-- RIGHT BOX -->
            <div class="col-md-5 col-lg-4">
                <div class="contact-box shadow-sm p-4 rounded-3"
                    style="min-height: 350px; height: 350px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <br><br>
                        <h5 class="fw-bold mb-3" style="color: #104f85;"><strong>Contact Our Expert</strong></h5>
                        <p class="text-muted small" style="font-size: 18px">
                            Need a hand using our services or managing your account?
                            Get in Touch, live human using our Help Center.
                        </p>
                        <a href="#" class="btn btn-primary px-4 mt-2 align-self-start">Get in Touch</a>
                    </div>

                </div>
            </div>
        </div>
         </section>
@endsection

<style>
    .image-wrapper {
        position: relative;
        display: inline-block;
        width: 99%;
    }

    /* IMAGE */
    .product-image {
        width: 100%;
        height: auto;
        border-radius: 12px;
    }

    /* BUTTON: tengah vertikal, agak ke kiri */
    .booking-btn {
        position: absolute;
        top: 70%;
        left: 40px;
        /* geser ke kiri */
        transform: translateY(-50%);
        z-index: 2;
    }

    .image-caption {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 12px 16px;
        color: #fff;
        font-weight: 600;
        background: rgba(3, 61, 237, 0.55);
        border-radius: 0 0 12px 12px;
        z-index: 2;
    }

    /* Animation untuk list items */
    .stagger-list li {
        opacity: 0;
        transform: translateY(10px);
        animation: fadeInUp 0.5s ease forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<script>
    // Stagger animation untuk list items
    document.addEventListener('DOMContentLoaded', function() {
        const listItems = document.querySelectorAll('.list-unstyled li');
        listItems.forEach((item, index) => {
            item.style.animationDelay = `${index * 0.1}s`;
        });
    });
</script>