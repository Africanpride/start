<div class="container-fluid">
    <div class="card pt-40">

        <div>
            <div class="d-flex pb-10 mb-10 align-items-center justify-content-start">
                <div class=" col-sm-12 col-md-4  col-lg-4">
                    <input
                        wire:model.debounce.200ms="search"
                        wire:keydown.escape="resetFilters"
                        wire:keydown.tab="resetFilters"
                        type="text"
                        placeholder="Search users here..."
                        class="block theme-input-style col-12 bg-gray-200 border border-gray-200
                        text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none focus:bg-white
                        focus:border-gray-500"
                    >
                </div>
                <div class=" col-sm-12 col-md-2  col-lg-2">
                    <select
                    wire:model="orderBy"
                    class="block theme-input-style w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-state">
                        <option value="id">ID</option>
                        <option value="first_name">First Name</option>
                        <option value="last_name">Last Name</option>
                        <option value="email">Email</option>
                        <option value="created_at">Sign Up Date</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">

                    </div>
                </div>
                <div class=" col-sm-12 col-md-2  col-lg-2">
                    <select
                    wire:model="orderAsc"
                    class="block theme-input-style w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-state">
                        <option value="1">Ascending</option>
                        <option value="0">Descending</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">

                    </div>
                </div>
                <div class=" col-sm-12 col-md-2  col-lg-2">
                    <select
                    wire:model="perPage"
                    class="block theme-input-style w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-state">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                        <option>100</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">

                    </div>
                </div>
                <div class=" col-sm-12 col-md-2  col-lg-2">
                    <button
                    href="http://127.0.0.1:8000/articles/create"
                    class="btn py-2 pr-3 d-flex align-items-center"
                    wire:click="deleteUser"
                    {{-- type="submit"  --}}
                    class="btn btn-danger "
                    title="Delete Article"
                    {{-- onclick="return confirm(&quot;Click Ok to delete Article.?&quot;)" --}}
                    >
                    <span class="bi-trash pr-1" aria-hidden="true"></span>
                         {{  $message }}
                        </button>
                </div>
            </div>
            <table class="table-auto w-full pb-10">
                <thead>
                    <tr>
                        <th class="px-4 py-2 h5">
                            <input type="checkbox">
                        </th>
                        <th class="px-4 py-2 h5">Avatar</th>
                        <th class="px-4 py-2 h5">First Name</th>
                        <th class="px-4 py-2 h5">Last Name</th>
                        <th class="px-4 py-2 h5">Email</th>
                        <th class="px-4 py-2 h5">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>

                            <td class="px-4 py-2">
                                <input
                                wire:model="selected"
                                value="{{ $user->id }}"
                                type="checkbox"></td>
                            <td><img src="{{ '/backend/assets/img/avatar/'. $user->profile->avatar }}"  class="avatar" alt=""></td>

                                <td class="border px-4 py-2 h4"><a href="{{ route('profile.show', [$user->profile->uuid]) }}"
                                class="details-btn">{{ $user->first_name }}</a></td>
                                <td class="border px-4 py-2 h4"><a href="{{ route('profile.show', [$user->profile->uuid]) }}"
                                class="details-btn">{{ $user->last_name }}</a></td>
                                <td class="border px-4 py-2 h4"><a href="{{ route('profile.show', [$user->profile->uuid]) }}"
                                class="details-btn">{{ $user->email }} </a></td>
                                <td class="border px-4 py-2 h4"><a href="{{ route('profile.show', [$user->profile->uuid]) }}"
                                class="details-btn">{{ $user->created_at->diffForHumans() }}</a></td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
<div class="pt-20">
    {!! $users->links() !!}
</div>

        </div>
    </div>
</div>
