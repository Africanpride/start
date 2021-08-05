<div>
    <input
        wire:model="query"
        wire:keydown.escape="resetFilters"
        wire:keydown.tab="resetFilters"
        type="text"
        placeholder="Search users here..."
        class="form-input"
    />

@if (!empty($query))

        @if (!empty($users))
            @foreach($users as $user)
            {{-- {{ $user->first_name }} --}}

            <div class="alert alert-primary " role="alert">
                <a href="{{ route('profile.show', [$user->profile->uuid]) }}"
                    class="details-btn">
                    {{ $user->full_name }}
                </a>
            </div>

            @endforeach
        @else

            <div class="alert alert-primary " role="alert">
                {{__('No result ..')}}
            </div>

        @endif

@endif


</div>
