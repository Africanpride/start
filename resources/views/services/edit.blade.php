@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <div class="row h-100">
        <div class="col-12 h-100">
            <!-- Card -->

            <div class="bg-c2-light profile-widget-header color-indigo ">
                <h4 class="add-new-title mt-1 d-flex align-items-center">
                    <img src="{{ asset('/backend/assets/img/svg/calender-color.svg') }}"
                        alt="" class="svg mr-3">
                    {{ __('Edit: ' . $service->name) }}
                </h4>
            </div>

            <div class="card h-100 ">
                <div class="card-body">


                    {!! Form::model($service, ['method' => 'PATCH','route' => ['services.update', $service->id ]]) !!}
                    {!! Form::token() !!}

                    <div class="add_name mb-4">

                        {!! Form::label('name', 'Service name', ['class' => 'label-text bold d-block mb-2', 'id' =>
                        'name']) !!}
                        {!! Form::text("name", old("name") ? old("name") : (!empty($service) ?
                        $service->name : null), ['class' => 'form-group theme-input-style',])
                        !!}
                    </div>

                    <div class="add_description mb-4">

                        {!! Form::label('description', 'Service Description', ['class' => 'label-text bold d-block
                        mb-2', 'id' => 'description']) !!}
                        {!! Form::textarea("description", old("description") ? old("description") : (!empty($service) ?
                        $service->description : null), ['class' => 'form-group theme-input-style',])
                        !!}
                    </div>

                    <div class="add_comment mb-4">

                        {!! Form::label('comment', 'Service comment', ['class' => 'label-text bold d-block mb-2', 'id'
                        => 'comment']) !!}
                        {!! Form::textarea("comment", old("comment") ? old("comment") : (!empty($service) ?
                        $service->comment : null), ['class' => 'form-group theme-input-style style--three'])
                        !!}
                    </div>

                    <div class="add_comment mb-4">

                        {!! Form::label('categories', 'Service Categories', ['class' => 'label-text bold d-block mb-2'])
                        !!}

                        {{ Form::select('categories[]', $categories, $service->categories, ['class' => 'form-control theme-input-style js-example-basic-multiple p-4', 'id' => 'id_label_multiple', 'multiple' => 'multiple']) }}
                    </div>

                    <div class="row">

                        {!! Form::submit('Update '. $service->name, ["class" => "btn col-6 col-xs-12 "]) !!}

                        <a href="{{ route('services.show', $service->id ) }}"
                            class="btn btn-block col-6 col-xs-12">{{ __('View Service') }}
                        </a>


                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
            <!-- End Card -->
        </div>
    </div>
</div>
@endsection
