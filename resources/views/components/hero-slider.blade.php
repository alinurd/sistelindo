@props(['images' => []])

<div id="heroSlider" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators -->
    <div class="carousel-indicators">
        @foreach ($images as $i => $img)
            <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="{{ $i }}"
                class="{{ $i === 0 ? 'active' : '' }}" aria-current="{{ $i === 0 ? 'true' : 'false' }}">
            </button>
        @endforeach
    </div>

    <!-- Slides -->
    <div class="carousel-inner">
        @foreach ($images as $i => $img)
            <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                <img src="{{ $img }}" class="d-block w-100 hero-slider-img">
            </div>
        @endforeach
    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>

</div>
