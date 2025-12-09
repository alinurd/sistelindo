@php
    use App\Models\Master\Product;
    $set = AppSetting::first();

    $d = Product::where('status', 1)->get()->toarray();
@endphp
<footer>
    <div class="container footer-content">
        <!-- Kolom 1 -->
        <div class="footer-left" style="margin-right: 50px">
            <img src="{{ $set?->logo ? asset($setting->logo) : asset('/storage/photos/1/sistelindo-favicon.png') }}"
                class="rounded" alt="icon" width="250" height="80">

            <p class="small lh-base mt-3"style="max-width: 550px;">
                Welcome to PT Sistelindo Mitralintas (referred to as Sistelindo) -
                a distinguished service provider offering a comprehensive range of
                internet, data communication, and value-added network services.
                Established on March 31, 1994, Sistelindo has proudly served an extensive
                clientele from multinational conglomerates to local enterprises.
            </p>
        </div>	

        <!-- Kolom 2 -->
        <div class="footer-links " style="margin-right: 50px">
            <h6 class="fw-bold text-uppercase mb-3 small">Related Links</h6>
            <ul class="list-unstyled small">
                <li class="mb-2"><a href="#" class="text-dark text-decoration-none">Home</a></li>
                <li class="mb-2"><a href="#" class="text-dark text-decoration-none">About Us</a>
                </li>
                <li class="mb-2"><a href="#" class="text-dark text-decoration-none">Services</a>
                </li>
                <li class="mb-2"><a href="#" class="text-dark text-decoration-none">Contact Us</a>
                </li>
            </ul>
        </div>

        <!-- Kolom 3 -->
        <div class="footer-villa" style="margin-right: 50px">
            <h6 class="fw-bold text-uppercase mb-3 small">Our Services</h6>
            <ul class="list-unstyled small">
                <li class="mb-2"><a href="#" class="text-dark text-decoration-none">Managed
                        Service</a></li>
                <li class="mb-2"><a href="#" class="text-dark text-decoration-none">Wiring
                        Infrastructure Service</a></li>
            </ul>
        </div>

        <!-- Kolom 4 -->
        <div class="footer-social">
            <h6 class="fw-bold text-uppercase mb-3 small">Stay Connected</h6>
            <ul>
                @if ($set->status_twitter == 1)
                    <li><a href="{{ $set->twitter }}"><i class="fab fa-twitter"></i></a></li>
                @endif
                @if ($set->status_facebook == 1)
                    <li><a href="{{ $set->facebook }}"><i class="fab fa-facebook"></i></a></li>
                @endif
                @if ($set->status_instagram == 1)
                    <li><a href="{{ $set->instagram }}"><i class="fab fa-instagram"></i></a></li>
                @endif
                @if ($set->status_youtube == 1)
                    <li><a href="{{ $set->youtube }}"><i class="fab fa-youtube"></i></a></li>
                @endif
                @if ($set->status_tiktok == 1)
                    <li><a href="{{ $set->tiktok }}"><i class="fab fa-tiktok"></i></a></li>
                @endif
            </ul>
             <div class="d-flex gap-2 mt-4">
            <img src="{{ asset('assets/img/material/6.png')}}" width="70" height="70"  class="rounded" alt="icon">
            <img src="{{ asset('assets/img/material/7.png')}}"width="150" height="70" class="rounded" alt="icon">
        </div>
        </div>
       
    </div>
    <div class="footer-bottom">
        <p> {{ $set->footer_text }}</p>
    </div>
</footer>
