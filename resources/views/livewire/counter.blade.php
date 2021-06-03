
<div class="love d-flex align-items-center">
    <div class="icon"  wire:click="increment">
        <img src=" {{ asset('backend/assets/img/svg/love.svg' ) }} " alt="" class="svg">
    </div>
    <div class="content">
        <span class="mr-1">{{ $count }}</span>Loved
    </div>

</div>
