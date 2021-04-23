<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-dark btn-block']) }}>
    {{ $slot }}
</button>
