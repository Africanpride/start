<div>
    <input wire:model="search" type="search" placeholder="Search users here..."/>

   
        @foreach($users as $user)

        <div class="alert alert-primary " role="alert">
            <a href="{{ route('profile.show', [$user->profile->uuid]) }}"
                class="details-btn">
                {{ $user->full_name }}
            </a>
        </div>

        @endforeach
</div>