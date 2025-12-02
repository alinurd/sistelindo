<style>/* Container untuk logo dengan posisi relatif */
.row.justify-content-center.branc {
    display: flex;
    flex-wrap: nowrap;
    justify-content: flex-start;
    align-items: center;
    margin-top: 2rem;
    gap: 40px;
    padding: 20px 0;
    overflow: hidden; /* Hide overflow untuk efek running */
    position: relative;
    width: 100%;
}

/* Container dalam untuk animasi running */
.brand-track {
    display: flex;
    gap: 40px;
    animation: runningText 30s linear infinite;
    will-change: transform;
}

/* Hentikan animasi saat hover */
.row.justify-content-center.branc:hover .brand-track {
    animation-play-state: paused;
}

/* Animasi running text hanya untuk logo */
@keyframes runningText {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}

/* Pola zigzag: 1-4-7 atas, 2-5-8 tengah, 3-6-9 bawah */
.row.justify-content-center.branc .col-4.col-md-2:nth-child(3n+1) {
    /* Item ke: 1, 4, 7, 10... */
    transform: translateY(-30px);
}

.row.justify-content-center.branc .col-4.col-md-2:nth-child(3n+2) {
    /* Item ke: 2, 5, 8, 11... */
    transform: translateY(0);
}

.row.justify-content-center.branc .col-4.col-md-2:nth-child(3n) {
    /* Item ke: 3, 6, 9, 12... */
    transform: translateY(30px);
}

/* Styling untuk logo */
.brand-icon {
    width: 120px;
    height: 120px;
    border-radius: 15px;
    background: linear-gradient(145deg, 
        #ff6b6b 0%, 
        #4ecdc4 50%, 
        #45b7d1 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 
        0 10px 20px rgba(0, 0, 0, 0.2),
        inset 0 1px 0 rgba(255, 255, 255, 0.3);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
    cursor: pointer;
    animation: float 6s ease-in-out infinite;
}

/* Animasi mengambang untuk setiap logo */
@keyframes float {
    0%, 100% {
        transform: translateY(0) rotate(0deg);
    }
    33% {
        transform: translateY(-10px) rotate(2deg);
    }
    66% {
        transform: translateY(10px) rotate(-2deg);
    }
}

/* Delay animasi untuk setiap item */
.row.justify-content-center.branc .col-4.col-md-2:nth-child(1) .brand-icon {
    animation-delay: 0s;
}
.row.justify-content-center.branc .col-4.col-md-2:nth-child(2) .brand-icon {
    animation-delay: 0.5s;
}
.row.justify-content-center.branc .col-4.col-md-2:nth-child(3) .brand-icon {
    animation-delay: 1s;
}
.row.justify-content-center.branc .col-4.col-md-2:nth-child(4) .brand-icon {
    animation-delay: 1.5s;
}
.row.justify-content-center.branc .col-4.col-md-2:nth-child(5) .brand-icon {
    animation-delay: 2s;
}
.row.justify-content-center.branc .col-4.col-md-2:nth-child(6) .brand-icon {
    animation-delay: 2.5s;
}

/* Efek hover dengan zoom dan shadow */
.brand-icon:hover {
    transform: scale(1.2) rotate(10deg);
    box-shadow: 
        0 15px 30px rgba(0, 0, 0, 0.3),
        0 0 50px rgba(255, 107, 107, 0.5);
    z-index: 10;
}

/* Konten teks di dalam logo */
.brand-icon img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: relative;
    z-index: 2;
    border-radius: 15px;
}

/* Efek blur saat hover pada tetangga */
.row.justify-content-center.branc:hover .col-4.col-md-2:not(:hover) {
    opacity: 0.7;
    filter: blur(1px);
    transition: all 0.3s ease;
}

/* Responsif */
@media (max-width: 768px) {
    .row.justify-content-center.branc {
        gap: 25px;
    }
    
    .brand-track {
        gap: 25px;
        animation-duration: 20s;
    }
    
    .brand-icon {
        width: 90px;
        height: 90px;
    }
    
    /* Kurangi pergerakan zigzag di mobile */
    .row.justify-content-center.branc .col-4.col-md-2:nth-child(3n+1) {
        transform: translateY(-15px);
    }
    
    .row.justify-content-center.branc .col-4.col-md-2:nth-child(3n+2) {
        transform: translateY(0);
    }
    
    .row.justify-content-center.branc .col-4.col-md-2:nth-child(3n) {
        transform: translateY(15px);
    }
}

/* Gradient mask untuk efek fade di sisi kiri dan kanan */
.row.justify-content-center.branc::before,
.row.justify-content-center.branc::after {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    width: 100px;
    z-index: 2;
    pointer-events: none;
}

.row.justify-content-center.branc::before {
    left: 0;
    background: linear-gradient(to right, 
        var(--background-color, white) 0%, 
        transparent 100%);
}

.row.justify-content-center.branc::after {
    right: 0;
    background: linear-gradient(to left, 
        var(--background-color, white) 0%, 
        transparent 100%);
}</style><!-- BRAND LOGOS dengan running effect -->
<div class="row justify-content-center branc gy-4 mt-4">
    <div class="brand-track">
        <div class="col-4 col-md-2">
            <img src="https://placehold.co/90x90?text=Logo1" class="brand-icon">
        </div>
        <div class="col-4 col-md-2">
            <img src="https://placehold.co/90x90?text=Logo2" class="brand-icon">
        </div>
        <div class="col-4 col-md-2">
            <img src="https://placehold.co/90x90?text=Logo3" class="brand-icon">
        </div>
        <div class="col-4 col-md-2">
            <img src="https://placehold.co/90x90?text=Logo4" class="brand-icon">
        </div>
        <div class="col-4 col-md-2">
            <img src="https://placehold.co/90x90?text=Logo5" class="brand-icon">
        </div>
        <div class="col-4 col-md-2">
            <img src="https://placehold.co/90x90?text=Logo6" class="brand-icon">
        </div>
        <!-- Duplicate untuk efek seamless looping -->
        <div class="col-4 col-md-2">
            <img src="https://placehold.co/90x90?text=Logo1" class="brand-icon">
        </div>
        <div class="col-4 col-md-2">
            <img src="https://placehold.co/90x90?text=Logo2" class="brand-icon">
        </div>
        <div class="col-4 col-md-2">
            <img src="https://placehold.co/90x90?text=Logo3" class="brand-icon">
        </div>
        <div class="col-4 col-md-2">
            <img src="https://placehold.co/90x90?text=Logo4" class="brand-icon">
        </div>
        <div class="col-4 col-md-2">
            <img src="https://placehold.co/90x90?text=Logo5" class="brand-icon">
        </div>
        <div class="col-4 col-md-2">
            <img src="https://placehold.co/90x90?text=Logo6" class="brand-icon">
        </div>
    </div>
</div>