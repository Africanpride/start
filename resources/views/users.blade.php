
@extends('layouts.backend')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card mb-30">
            <div class="card-body py-30 pb-0">
                <div class="d-flex justify-content-between mb-3 align-items-center">
                    <h4 class="aside-btn-text c1 d-xl-flex align-items-center">Users Table</h4>

                    <form action="#" class="search-form col-7 col-xl-7 ">
                        <div class="theme-input-group">
                           <input type="text" class="theme-input-style" placeholder="Search Here">

                           <button type="submit"><img src="{{ asset('/backend/assets/img/svg/search-icon.svg') }}" alt="" class="svg"></button>
                        </div>
                     </form>


                    <div class="btn">Add New User</div>
                </div>

            </div>
            <div class="table-responsive">
                <table class="style--one table-striped ">
                    <thead>
                        <tr>
                            <th>Avatar</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>View Profile</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users ?? '' as $user)
                            <tr>
                                <td><img src="{{ '/backend/assets/img/avatar/'. $user->profile->avatar }}"  class="avatar" alt=""></td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td><a href="{{ route('profile.show', [$user->profile->uuid]) }}"
                                        class="details-btn">{{ __('View Profile') }} <i
                                            class="icofont-arrow-right"></i></a></td>
                            @empty
                                {{ __('Sorry nothing to show') }}
                        @endforelse




                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        {{ $users->links("pagination::bootstrap-4") }}
    </div>
</div>

@endsection
