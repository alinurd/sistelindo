@extends('frontend.layouts.app')

@section('content')
    {{-- TOP SPACING --}}
    <section class="w-full text-center mb-16 hero-wrapper animate-fade-in">
        <h2 class="text-4xl font-bold ">
            <span class="text-title mb-3 animate-fade-in mt-5 text-center">Product and <span
                    class="text-highlight"><strong>Service</strong></span></span>
            {{ $subTitle }}
        </h2>
    </section>
    <section class="container mx-auto px-4">
        <div class="row align-items-center mt-5">
            <div class="col-lg-12 mb-5 animate-fade-in stagger-delay-1">
                <div class="text-center">
                    <img src="https://placehold.co/1000x400" class="rounded-lg shadow w-100 h-auto hover-lift"
                        style="max-width: 1000px; height: 330px;" />
                </div>
            </div>
        </div>
    </section>


    <div class="section-divider animate-fade-in stagger-delay-3"></div>

    <section class="text-center mt-5 px-4">
        <span class="text-title mb-3 animate-fade-in">Empowering <span
                class="text-highlight"><strong>Business</strong></span></span>
        <div class="animate-fade-in stagger-delay-1">
            <p class="text-gray-600 mx-auto mb-10" style="max-width: 700px;">
                To become a trusted company in the field of internet, data communication
                services and ICT solutions in IndonesiaTo become a trusted company in the field of internet, data
                communication
                services and ICT solutions in IndonesiaTo become a trusted company in the field of internet, data
                communication
                services and ICT solutions in IndonesiaTo become a trusted company in the field of internet, data
                communication
                services and ICT solutions in Indonesia
            </p>
        </div>
    </section>

    <div class="section-divider animate-fade-in"></div>

    <section class="mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 animate-slide-left stagger-delay-1">
                    <img src="https://placehold.co/450x330" class="rounded-lg shadow object-cover w-100 h-auto hover-grow"
                        alt="" style="max-width: 450px; height: 330px;">
                </div>
                <div class="col-lg-6 offset-lg-1 animate-slide-right stagger-delay-2">
                    <span class="text-title ">Sistelindo <span class="text-highlight"><strong>Internet
                                Solution</strong></span></span>
                    <span class="" style="font-size: 12px; color: #064b90">High Quality Dedication Internet</span>
                    <p class="text-muted mt-3">
                        Welcome to PT Sistelindo Mitralintas (referred to as
                        Sistelindo) - a distinguished service provider offering a
                        comprehensive range of internet, data communication,
                        and value-added network services.
                    </p>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 d-flex mb-4">
                            <img src="https://placehold.co/50" class="shadow-sm rounded me-3" />
                            <div>
                                <p class="text-muted small mb-2">
                                    Internet II
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex mb-4">
                            <img src="https://placehold.co/50" class="shadow-sm rounded me-3" />
                            <div>
                                <p class="text-muted small mb-2">
                                    Internet II
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex mb-4">
                            <img src="https://placehold.co/50" class="shadow-sm rounded me-3" />
                            <div>
                                <p class="text-muted small mb-2">
                                    Internet II
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex mb-4">
                            <img src="https://placehold.co/50" class="shadow-sm rounded me-3" />
                            <div>
                                <p class="text-muted small mb-2">
                                    Internet II
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex mb-4">
                            <img src="https://placehold.co/50" class="shadow-sm rounded me-3" />
                            <div>
                                <p class="text-muted small mb-2">
                                    Internet II
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex mb-4">
                            <img src="https://placehold.co/50" class="shadow-sm rounded me-3" />
                            <div>
                                <p class="text-muted small mb-2">
                                    Internet II
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="section-divider animate-fade-in"></div>
       @include('frontend.sections.line-of')


       <section class="py-5 bg-light">
    <div class="container text-center">

        <h2 class="mb-4">
            <span class="text-primary">Product</span> and <span class="text-primary">Services</span>
        </h2>

        <div class="row justify-content-center g-4">

            <!-- ITEM 1 -->
            <div class="col-md-6 col-lg-6 animate-fade-in stagger-delay-1">
                <div class="service-card text-center p-4 h-100 shadow-sm">
                    <div class="service-image mb-3">
                        <img src="https://placehold.co/350x220/0066cc/ffffff?text=Internet+Services"
                             class="rounded shadow w-100 h-auto mb-4 hover-grow">
                    </div>
                    <h5 class="fw-bold">Internet Dedicated</h5>
                    <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque quibusdam asperiores quidem id perferendis, suscipit obcaecati fugiat deleniti. Magnam minima atque libero dicta architecto praesentium voluptatem facilis ad similique quod.</span>
                    <br><a href="#" class="btn btn-primary mt-3">Detail</a>
                </div>

            </div>

            <!-- ITEM 2 -->
            <div class="col-md-6 col-lg-6 animate-fade-in stagger-delay-1">
                <div class="service-card text-center p-4 h-100 shadow-sm">
                    <div class="service-image mb-3">
                        <img src="https://placehold.co/350x220/0066cc/ffffff?text=Internet+Services"
                             class="rounded shadow w-100 h-auto mb-4 hover-grow">
                    </div>
                    <h5 class="fw-bold">Managed CPE Solution</h5>
                     <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque quibusdam asperiores quidem id perferendis, suscipit obcaecati fugiat deleniti. Magnam minima atque libero dicta architecto praesentium voluptatem facilis ad similique quod.</span>
                    <br><a href="#" class="btn btn-primary mt-3">Detail</a>
                </div>
            </div>

            <!-- ITEM 3 -->
            <div class="col-md-6 col-lg-6 animate-fade-in stagger-delay-1">
                <div class="service-card text-center p-4 h-100 shadow-sm">
                    <div class="service-image mb-3">
                        <img src="https://placehold.co/350x220/0066cc/ffffff?text=Internet+Services"
                             class="rounded shadow w-100 h-auto mb-4 hover-grow">
                    </div>
                    <h5 class="fw-bold">SDWAN & Firewall Solution</h5>
                     <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque quibusdam asperiores quidem id perferendis, suscipit obcaecati fugiat deleniti. Magnam minima atque libero dicta architecto praesentium voluptatem facilis ad similique quod.</span>
                    <br><a href="#" class="btn btn-primary mt-3">Detail</a>
                </div>
            </div>

            <!-- ITEM 4 -->
            <div class="col-md-6 col-lg-6 animate-fade-in stagger-delay-1">
                <div class="service-card text-center p-4 h-100 shadow-sm">
                    <div class="service-image mb-3">
                        <img src="https://placehold.co/350x220/0066cc/ffffff?text=Internet+Services"
                             class="rounded shadow w-100 h-auto mb-4 hover-grow">
                    </div>
                    <h5 class="fw-bold">WAF with API Protection</h5>
                     <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque quibusdam asperiores quidem id perferendis, suscipit obcaecati fugiat deleniti. Magnam minima atque libero dicta architecto praesentium voluptatem facilis ad similique quod.</span>
                    <br><a href="#" class="btn btn-primary mt-3">Detail</a>
                </div>
            </div>

        </div>

    </div>
</section>

 
@endsection
