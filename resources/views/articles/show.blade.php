@extends('layouts.backend')

@section('content')

@if(Session::has('success_message'))
<div class="alert alert-success">
    <span class="bi-hand-thumbs-up"></span>
    {!! session('success_message') !!}

    <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
    </button>

</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card mb-30">
            <div class="card-body py-30 pb-0">

                <div class="panel panel-default">
                    <div class="row d-flex align-items-center justify-content-xl-between justify-items-auto">


                        <div class="col-xl-9 col-md-9 col-xs-12 px-10 ">
                            <h3 class="font-weight-bold text-capitalize pt-60 mb-40 pb-30">{{ $article->title }}</h3>
                        </div>

                        <div class="col-xl-3 col-md-3 col-xs-12">

                            <form method="POST" action="{!! route('articles.destroy', $article->slug) !!}"
                                accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}
                                <div class="" role="group">
                                    <a href="{{ route('articles.index') }}" class="btn btn-primary"
                                        title="{{ trans('articles.show_all') }}">
                                        <span class="bi-list-ul" aria-hidden="true"></span>
                                    </a>

                                    <a href="{{ route('articles.edit', $article->slug ) }}" class="btn btn-primary"
                                        title="{{ trans('articles.edit') }}">
                                        <span class="bi-file-earmark-break" aria-hidden="true"></span>
                                    </a>

                                    <button type="submit" class="btn btn-danger" title="{{ trans('articles.delete') }}"
                                        onclick="return confirm(&quot;{{ trans('articles.confirm_delete') }}?&quot;)">
                                        <span class="bi-trash" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </form>

                        </div>

                    </div>

                    <div class="card-body">
                            <div class="border-bottom pb-10"></div>
                            <img src="{{ $article->getFirstMedia('featured')->getUrl() }}" alt="">
                            <div class="content pt-30 font-italic font-16 font-weight-bold ">{!! $article->notes !!}</div>
                            <div class="content news-card pt-30 font-17 ">{!! $article->content !!}</div>
                    </div>

                    <div class="post-footer d-flex mb-20 mt-20 pt-20 pb-3 border-bottom">

                        <!-- Love -->
                        <div class="love d-flex align-items-center">
                           <div class="icon">
                              <img src=" {{ asset('backend/assets/img/svg/love.svg' ) }} " alt="" class="svg">
                           </div>
                           <div class="content">
                              <span class="mr-1">22</span>Loved
                           </div>

                        </div>
                        <!-- End Love -->

                        <!-- Comment -->
                        <div class="comment d-flex align-items-center">
                           <div class="icon">
                              <img src=" {{ asset('backend/assets/img/svg/comment.svg' ) }} " alt="" class="svg">
                           </div>
                           <div class="content">
                              <span class="mr-1">{{ $article->comment->count ?? '5'}}</span>Comments
                           </div>
                        </div>
                        <!-- End Comment -->

                        <!-- Share -->
                        <div class="share d-flex align-items-center">
                           <div class="icon">
                              <img src=" {{ asset('backend/assets/img/svg/share2.svg' ) }} " alt="" class="svg">
                           </div>
                           <div class="content">
                              <span class="mr-1">3</span>Share
                           </div>
                        </div>
                        <!-- End Share -->
                     </div>


                    <div class="row mt-5 pb-2 pt-5 d-flex align-items-center media border-bottom">

                        <div class="col-xl-6 col-md-6 col-sm-6 col-xs-12  chat-header-left mb-3 mb-md-0">
                            <!-- Profile -->
                            <div class="d-flex align-items-center profile">
                                <div class="avatar position-relative mr-3">
                                    <img src="{{ '/backend/assets/img/avatar/'. $article->user->profile->avatar }}" alt="" class="img-50">

                                    <span class="avatar-status bg-teal"></span>
                                </div>
                                <div class="content">
                                    <h4 class="name mb-1">{{ optional($article->user)->first_name . ' ' . optional($article->user)->last_name }}</h4>
                                    <p class="font-14">{{ $article->user->email}}</p>
                                </div>
                            </div>
                            <!-- End Profile -->
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-6 col-xs-12 show-date d-sm-flex justify-content-end">
                            <span class="font-italic pr-1 ">Published:</span>
                            <span class="full-date"> {{ ($article->created_at)->toRfc850String()  ?? 'Date'}}</span>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
