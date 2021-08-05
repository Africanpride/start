@extends('layouts.backend')

@section('content')


                                                        {{-- <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-primary"
                                                            data-toggle="modal" data-target="#exampleModalCenter">
                                                            Launch demo modal
                                                        </button> --}}

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLongTitle">Delete Confirm</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        ...
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        {{-- <a href="{{ route('articles.edit', $article->slug ) }}"
                                                                            class="btn btn-primary"
                                                                            title="{{ trans('articles.delete') }}" type="button">
                                                                            <span class="bi-trash"
                                                                                aria-hidden="true"></span>
                                                                        </a> --}}
                                                                        <button id="confirm-text2" type="cancel" class="btn btn-danger z" title="{{ trans('articles.delete') }}">
                                                                        <span class="bi-trash" aria-hidden="true"></span>
                                                                        <button id="confirm-text2" type="submit" class="btn btn-danger z" title="{{ trans('articles.delete') }}">
                                                                        <span class="bi-trash" aria-hidden="true"></span>
                                                                    </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

<script>

    $(".html-alert").on("click", function (event) {
        event.preventDefault();
            Swal.fire({
                title: "<strong>HTML <u>example</u></strong>",
                type: "info",
                html: 'You can use <b>bold text</b>, <a href="https://pixinvent.com/" target="_blank">links</a> and other HTML tags',
                showCloseButton: !0,
                showCancelButton: !0,
                focusConfirm: !1,
                confirmButtonText: '<i class="icofont-thumbs-up"></i> Great!',
                confirmButtonAriaLabel: "Thumbs up, great!",
                cancelButtonText: '<i class="icofont-thumbs-down"></i>',
                cancelButtonAriaLabel: "Thumbs down",
                confirmButtonClass: "btn long",
                buttonsStyling: !1,
                cancelButtonClass: "btn long bg-danger ml-1",
            });
        }),
</script>
@endsection

