@php
    $setting = AppSetting::first();
    // dd($setting);
    @endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sistelindo' }}</title>
        <link rel="icon" type="image/x-icon" href="{{ $setting?->favicon ? asset($setting->favicon) : asset('/storage/photos/1/sistelindo-favicon.png') }}" />

<meta name="csrf-token" content="{{ csrf_token() }}">

            <meta name="description" content="{{ $description ?? $setting?->meta_description ?? 'Sistelindo ' }}">

    <!-- OPEN GRAPH (WA, FB, IG) -->
    <meta property="og:title" content="{{ $title ?? $setting?->site_title ?? 'Sistelindo' }}">
    <meta property="og:description" content="{{ $description ?? $setting?->meta_description ?? 'Sistelindo ' }}">
    <meta property="og:image" content="{{ asset($setting?->share_image ?? 'storage/photos/1/sistelindo-favicon.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- TWITTER CARD -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? $setting?->site_title ?? 'Sistelindo' }}">
    <meta name="twitter:description" content="{{ $description ?? $setting?->meta_description ?? 'Sistelindo ' }}">
 

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CUSTOM STYLE -->
  
    
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

    @include('frontend.layouts.navbar')

    <main>
        @yield('content')
    </main>
     <a class="btn btn-brown btn-lg whatsapp-float"
        href="https://wa.me/{{ $setting->whatsapp }}?text={{ urlencode('Halo Admin, Bisakah Saya mendapatkan informasi lebih lanjut?') }}"
        target="_blank"
        >
        <i class="fab fa-whatsapp" aria-hidden="true" title="Hubungi Tim Sales dan Marketing kami untuk informasi lebih lanjut."></i>
    </a>

    <style>
        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 20px;
            right: 20px;
            background-color: #25D366;
            color: white;
            border-radius: 50%;
            text-align: center;
            font-size: 28px;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: transform 0.3s ease;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
            color: white;
            background-color: #1c6a39;
        }
    </style>

    @include('frontend.layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>


  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
      <script>
        $(document).ready(function() {
            $('#submit').on('click', function(e) {
                e.preventDefault();
                saveData();
            });

        });

        function saveData() {
             let hasEmptyRequiredForm = false;

            $('#formData input[required]:visible, #formData textarea[required]:visible').each(function() {
                if (!$(this).val()) hasEmptyRequiredForm = true;
            });

            if (hasEmptyRequiredForm) {
                return swAlertDialog('error', 'Silakan isi semua formulir');
            }

            const email = $('#formData input[name="email"]').val();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                return swAlertDialog('error', 'Format email tidak valid. Silakan periksa kembali.');
            }

             const message = $('#formData textarea[name="message"]').val().trim();
        if (message.length < 10) {
            return swAlertDialog('error', 'Pesan minimal harus 10 karakter.');
        }

      // const spamWords = [
      //       'gratis', 'hadiah', 'uang', 'promo', 'diskon', 'transfer',
      //       'klik di sini', 'link ini', 'daftar sekarang', 'belanja',
      //       'pinjaman', 'kredit', 'menang', 'lotre', 'bitcoin', 'crypto'
      //   ];

        // const lowerMsg = message.toLowerCase();
        // const foundSpamWords = spamWords.filter(word => lowerMsg.includes(word));

        // const spamThreshold = 4;

        // if (foundSpamWords.length >= spamThreshold) {
        //     return swAlertDialog(
        //         'error',
        //         `Pesan Anda mengandung terlalu banyak kata mencurigakan (${foundSpamWords.length}). Harap ubah isi pesan agar tidak dianggap spam.`
        //     );
        // } else if (foundSpamWords.length > 0) { 
        //     console.warn(`âš ï¸ Ditemukan kata mencurigakan: ${foundSpamWords.join(', ')}`);
        // }

            const formData = $('#formData').serialize();

            $.ajax({
                type: "POST",
                url: "{{ route('sendMail') }}",
                data: formData,
                dataType: 'json',
                beforeSend: function() {
                    $('#submit').prop('disabled', true);
                    $('#loading').removeClass('d-none');
                    $('#simpan').addClass('d-none');
                },
                success: function(res) {
                    if (res.status === 'success' || res === 'OK') {
                        swAlertDialog('success',
                            'Terima kasih sudah menghubungi kami, tim kami akan segera merespon pesan Anda.'
                            );
                        $('#formData')[0].reset();
                    } else {
                        swAlertDialog('error', res.message ?? 'Terjadi kesalahan saat mengirim email.');
                    }
                },
                error: function(err) {
                    console.error(err);
                    swAlertDialog('error', 'Gagal mengirim email. Silakan coba lagi.');
                },
                complete: function() {
                    $('#submit').prop('disabled', false);
                    $('#loading').addClass('d-none');
                    $('#simpan').removeClass('d-none');
                }
            });
        }


        // === SweetAlert Helpers ===
        function sweetAlert(type, message) {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: type,
                title: message,
                showConfirmButton: false,
                timer: 1500
            });
        }

        function swAlertDialog(type, message) {
            Swal.fire({
                title: type === 'error' ? 'Gagal!' : 'Berhasil!',
                text: message,
                icon: type === 'error' ? 'error' : 'success',
                confirmButtonText: 'Oke',
                customClass: {
                    confirmButton: 'btn btn-primary waves-effect waves-light'
                },
                buttonsStyling: false
            });
        }
    </script>



<script>
    // Simple intersection observer for animations
    document.addEventListener('DOMContentLoaded', function() {
        const animatedElements = document.querySelectorAll('.animate-fade-in, .animate-slide-left, .animate-slide-right');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translate(0, 0)';
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        animatedElements.forEach(el => {
            el.style.opacity = '0';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    });
</script>
</html>
