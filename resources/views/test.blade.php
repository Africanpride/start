@extends('layouts.backend')

@section('content')


                                <!-- Project Manager Upload -->
                                <div id="file-drop-area-wrappper">
                                    <h4 class="font-20 mb-30">File Upload</h4>
                                    <!-- Dropzone Start -->
                                    <form action="#" id="myDropzone" class="dropzone style--two" method="post" enctype="multipart/form-data">
                                        <div class="d-flex justify-content-center flex-column align-items-center align-self-center" data-dz-message>
                                            <div class="dz-message bold c2 font-20 mb-3">Click or Drop files here to upload.</div>
                                                <div class="upload-icon">
                                                <img src="{{ asset('backend/assets/img/svg/upload-down.svg')}}" alt="" class="svg">
                                            </div>
                                        </div>




                                    </form>
                                    <!-- Dropzone End -->

                                    <!-- End File drop area -->
                                </div>
                                <!-- End Project Manager Upload -->


@endsection
