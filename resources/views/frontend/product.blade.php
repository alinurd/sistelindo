@extends('frontend.layouts.app')

@section('content') 

    {{-- TOP SPACING --}} 
    <section class="w-full text-center mb-16 hero-wrapper animate-fade-in">
        <h2 class="text-4xl font-bold ">
            <span class="text-primary">Why Sistelindo?</span>
        </h2>
    </section>

    {{-- Image Left (450x330 approx) --}}
    <section class="mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 animate-slide-left stagger-delay-1">
                    <img src="https://placehold.co/450x330" 
                         class="rounded-lg shadow object-cover w-100 h-auto hover-grow"
                         alt=""
                         style="max-width: 450px; height: 330px;">
                </div>
                <div class="col-lg-6 offset-lg-1 animate-slide-right stagger-delay-2">
                    <span class="text-title mb-3">Company <span class="text-highlight"><strong>Review</strong></span></span>
                     <p class="text-muted">
                        Welcome to PT Sistelindo Mitralintas (referred to as
                        Sistelindo) - a distinguished service provider offering a
                        comprehensive range of internet, data communication,
                        and value-added network services.
                    </p>
                    <p class="text-muted">
                        Established on March 31, 1994, Sistelindo has proudly served an extensive
                        clientele, catering to both multinational conglomerate
                        enterprises and local businesses as well.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="section-divider animate-fade-in stagger-delay-3"></div>

    <section class="text-center mt-5 px-4">
        <span class="text-title mb-3 animate-fade-in">Company <span class="text-highlight"><strong>Vision</strong></span></span>
        <div class="animate-fade-in stagger-delay-1">
            <p class="text-gray-600 mx-auto mb-10" style="max-width: 700px;">
                To become a trusted company in the field of internet, data communication
                services and ICT solutions in Indonesia
            </p>
        </div>

                <span class="text-title mb-3 animate-fade-in mt-5">Company <span class="text-highlight"><strong>Mission</strong></span></span>
        <div class="animate-fade-in stagger-delay-3">
            <div class="animate-fade-in stagger-delay-1">
            <p class="text-gray-600 mx-auto mb-10" style="max-width: 700px;">
                To become a trusted company in the field of internet, data communication
                services and ICT solutions in IndonesiaTo become a trusted company in the field of internet, data communication
                services and ICT solutions in IndonesiaTo become a trusted company in the field of internet, data communication
                services and ICT solutions in IndonesiaTo become a trusted company in the field of internet, data communication
                services and ICT solutions in Indonesia
            </p>
        </div>
        </div>
    </section>

    <div class="section-divider animate-fade-in"></div>

    {{-- LICENSE HOLDER --}}
    <section class="container mx-auto px-4">
         <span class="text-title mb-3 animate-fade-in mt-5 text-center">License <span class="text-highlight"><strong>Holder</strong></span></span>
        
        <div class="row align-items-center">
            <div class="col-lg-12 mb-5 animate-fade-in stagger-delay-1">
                <div class="text-center">
                    <img src="https://placehold.co/1000x330" 
                         class="rounded-lg shadow w-100 h-auto hover-lift"
                         style="max-width: 1000px; height: 330px;" />
                </div>
            </div>
            
            <div class="col-lg-10 offset-lg-1 animate-fade-in stagger-delay-2">
                <div class="mb-4 p-4 gradient-border rounded hover-lift">
                    <strong class="d-block mb-2 fs-5 text-primary">Internet Service Provider (Nationwide Coverage)</strong>
                    <p class="text-gray-700 mb-0">
                        No.KU.506/12/17/MPPT-94 Tanggal 17 November 1994 (DEPARPOSTEL) dan di perbaharui
                        terkini oleh Kominfo dengan : No. 887 Tahun 2018 Tentang Izin Penyelenggaraan Jasa
                        Akses Internet(Internet Service Provider / ISP) PT Sistelindo Mitralintas, tanggal 22
                        November 2018
                    </p>
                </div>
                
                <div class="mb-4 p-4 gradient-border rounded hover-lift">
                    <strong class="d-block mb-2 fs-5 text-primary">Sistem Komunikasi Data</strong>
                    <p class="text-gray-700 mb-0">
                        No.KU.506/12/17/MPPT-94 Tanggal 17 November 1994 (DEPARPOSTEL) dan di perbaharui
                        terkini oleh Kominfo dengan :DNo. 184 Tahun 2019 Tentang lzin Penyelenggaraan Jasa
                        Sistem Komunikasi Data PT Sistelindo Mitralintas, tanggal 6 Maret 2019
                    </p>
                </div>
                
                <div class="p-4 gradient-border rounded hover-lift">
                    <strong class="d-block mb-2 fs-5 text-primary">Lisensi ITKP</strong>
                    <p class="text-gray-700 mb-0">
                        No. 135/DIRJEN/2007 tanggal 24 mei 2007
                        <span class="d-block text-gray-600 mt-2 fst-italic">
                            Catatan : Sudah dikembalikan ke Kominfo secara sukarela(dengan surat nomor 184A/KEU/DRU/IV/2013 tanggal 6 Mei 2013)
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="section-divider animate-fade-in"></div>

    {{-- TIMELINE --}}
    <section class="text-center mt-5 px-4">
        <span class="text-title mb-3 animate-fade-in mt-5 text-center">31 Years Journey of Sistelindo in <br><span class="text-highlight"><strong>Cyberspace Industry</strong></span></span>
 
        <div class="container animate-fade-in stagger-delay-1"> 
            <img src="https://placehold.co/600x900"
         class="mx-auto w-[600px] rounded"
         alt="Timeline"> 
        </div>
    </section>

    <div class="section-divider animate-fade-in"></div>

    {{-- ISO QUALITY MANAGEMENT SYSTEM --}}
    <section class="container mx-auto px-4 mt-5">
        <div class="row align-items-center">
            <div class="col-lg-7 animate-slide-left stagger-delay-1">
                <h3 class="text-3xl font-bold text-[#003366] mb-3">
                    ISO 9001:2015 <br> 
                    <span class="text-primary">Quality Management System</span>
                </h3>
                <p class="text-gray-600 mb-2">
                    <strong>For the following scope of activities:</strong>
                </p>
                <p class="text-gray-700 fs-5">
                    Provision of internet provider (ISP) and data communication
                    system services, network assessment & penetration test
                </p>
                <div class="mt-4">
                    <span class="badge bg-primary text-white me-2 mb-2 px-3 py-2">Quality Certified</span>
                    <span class="badge bg-warning text-dark me-2 mb-2 px-3 py-2">ISO 9001:2015</span>
                    <span class="badge bg-info text-white mb-2 px-3 py-2">Best Practices</span>
                </div>
            </div>
            <div class="col-lg-5 text-center animate-slide-right stagger-delay-2">
                <div class="position-relative">
                    <img src="https://placehold.co/350x220" 
                         class="rounded shadow w-100 h-auto animate-float"
                         style="max-width: 350px; height: 220px;">
                    <div class="position-absolute top-0 end-0 bg-primary text-white p-2 rounded-bl">
                        <i class="fas fa-award"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section-divider animate-fade-in"></div>

    {{-- CORE SERVICES --}}
    <section class="text-center mb-24 px-4 mt-5">
        <h2 class="text-3xl font-bold text-[#003366] mb-12 animate-fade-in">
            Core Services: Internet Service Provider <br>
            and System Integrator
        </h2>

        <div class="container">
            <div class="row justify-content-center g-4">
                {{-- ITEM 1: Internet and Data Communication --}}
                <div class="col-md-6 col-lg-4 animate-fade-in stagger-delay-1">
                    <div class="service-card text-center p-4 h-100 border rounded-lg shadow-sm">
                        <div class="service-image mb-3">
                            <img src="https://placehold.co/350x220/0066cc/ffffff?text=Internet+Services" 
                                 class="rounded shadow w-100 h-auto mb-4 hover-grow"
                                 alt="Internet and Data Communication">
                        </div>
                        <h4 class="font-semibold text-xl text-highlight mb-4">
                            Internet and Data Communication
                        </h4>
                        <ul class="text-gray-600 text-sm text-start ps-0 list-unstyled">
                            <li class="mb-2 d-flex align-items-start"> 
                                CPE (Router, Switch, Firewall, Access Point)
                            </li>
                            <li class="mb-2 d-flex align-items-start"> 
                                Wi-Fi Solution
                            </li>
                            <li class="mb-2 d-flex align-items-start"> 
                                IP PBX & SIP Trunk Converter
                            </li>
                            <li class="mb-2 d-flex align-items-start">
                                <span class="text-[#0066cc] me-2">e</span>
                                Asset & Seat Management
                            </li>
                            <li class="d-flex align-items-start"> 
                                IT Support
                            </li>
                        </ul>
                    </div>
                </div>
                
                {{-- ITEM 2: Managed Services --}}
                <div class="col-md-6 col-lg-4 animate-fade-in stagger-delay-2">
                    <div class="service-card text-center p-4 h-100 border rounded-lg shadow-sm">
                        <div class="service-image mb-3">
                            <img src="https://placehold.co/350x220/003366/ffffff?text=Managed+Services" 
                                 class="rounded shadow w-100 h-auto mb-4 hover-grow"
                                 alt="Managed Services">
                        </div>
                        <h4 class="font-semibold text-xl text-highlight mb-4">
                            Managed Services
                        </h4>
                        <ul class="text-gray-600 text-sm text-start ps-0 list-unstyled">
                            <li class="mb-2 d-flex align-items-start"> 
                                CPE (Router, Switch, Firewall, Access Point)
                            </li>
                            <li class="mb-2 d-flex align-items-start"> 
                                Wi-Fi Solution
                            </li>
                            <li class="mb-2 d-flex align-items-start"> 
                                IP PBX & SIP Trunk Converter
                            </li>
                            <li class="mb-2 d-flex align-items-start">
                                <span class="text-[#0066cc] me-2">e</span>
                                Asset & Seat Management
                            </li>
                            <li class="d-flex align-items-start"> 
                                IT Support
                            </li>
                        </ul>
                    </div>
                </div>
                
                {{-- ITEM 3: Network Infrastructure --}}
                <div class="col-md-6 col-lg-4 animate-fade-in stagger-delay-3">
                    <div class="service-card text-center p-4 h-100 border rounded-lg shadow-sm">
                        <div class="service-image mb-3">
                            <img src="https://placehold.co/350x220/ff6600/ffffff?text=Network+Infrastructure" 
                                 class="rounded shadow w-100 h-auto mb-4 hover-grow"
                                 alt="Network Infrastructure">
                        </div>
                        <h4 class="font-semibold text-xl text-highlight mb-4">
                            Network Infrastructure
                        </h4>
                        <ul class="text-gray-600 text-sm text-start ps-0 list-unstyled">
                            <li class="mb-2 d-flex align-items-start"> 
                                CPE (Router, Switch, Firewall, Access Point)
                            </li>
                            <li class="mb-2 d-flex align-items-start"> 
                                Wi-Fi Solution
                            </li>
                            <li class="mb-2 d-flex align-items-start"> 
                                IP PBX & SIP Trunk Converter
                            </li>
                            <li class="mb-2 d-flex align-items-start">
                                <span class="text-[#0066cc] me-2">e</span>
                                Asset & Seat Management
                            </li>
                            <li class="d-flex align-items-start"> 
                                IT Support
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
 