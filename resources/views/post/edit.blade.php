@extends('template.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin strecth-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                Edit Post
                            </div>
                            <form action="{{ route('post.update', [$post->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        value="{{ $post->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="category">Categories</label>
                                    <select class="select2-multiple form-control" name="category[]" multiple="multiple"
                                        id="category">
                                        @foreach ($categories as $key => $item)
                                            <option value="{{ $item->id }}" {{ !$item->selected ?: 'selected' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="banner_image">Banner Image</label>
                                    <div class="d-flex" style="max-width: 200px">
                                        <img id="frame" class="img-thumbnail"
                                            src="{{ asset('uploads/' . $post->banner_image) }}" alt="">
                                    </div>
                                    <input type="file" class="form-control" name="banner_image" id="banner_image"
                                        onchange="loadImg()" value="{{ $post->banner_image }}">
                                </div>
                                <div class="form-group">
                                    <label for="body">Body</label>
                                    <textarea name="body" class="form-control" id="body" cols="30" rows="10">{{ $post->body }}</textarea>
                                </div>
                                <button class="btn btn-primary mr-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
                    Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin
                        template</a> from BootstrapDash. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                    with <i class="ti-heart text-danger ml-1"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection

@section('content-js')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script>
        function loadImg() {
            $('#frame').attr('src', URL.createObjectURL(event.target.files[0]));
        }
    </script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ]
        });
    </script>
    <script>
        $(document).ready(function() {
            // Select2 Multiple
            $('.select2-multiple').select2({
                placeholder: "Select",
                allowClear: true
            });

        });
    </script>
@endsection
