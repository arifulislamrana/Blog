@extends('admin.layouts._main')

@section('title', 'Dashboard')
@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body" style="margin-left: 10%">
                <h5>Create Post</h5>
                <hr>
                <div class="row">
                    <div class="col-md-8">
                        <form action="{{ Route('updatePost', ['id' => $post->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Category</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="category">
                                    
                                    @foreach ($categories as $id => $category)
                                    <option value="{{$id}}">{{ $category }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Tags</label>
                                <select class="js-example-basic-multiple" name="tag[]" multiple="multiple">
                                    
                                    @foreach ($tags as $id => $tag)
                                    <option value="{{$id}}">{{ $tag }}</option>
                                    @endforeach
                                    
                                  </select>
                            </div>

                            <div class="form-group">
                                <label>Post Title</label>
                                <input type="text" class="form-control" value="{{$post->title}}" placeholder="Title" name="title">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" >Post Body</label>
                                <textarea class="form-control tinymce-editor" name="body" id="exampleFormControlTextarea1" rows="3">{{html_entity_decode($post->body)}}</textarea>
                            </div>
                            <div>
                                <label>Image</label>
                                <input type="file" name="image">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Active</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('scripts')
<script src="https://cdn.tiny.cloud/1/2v1c7jjb931y7wiy2as5ket8cl5sxkgoc1tzzlwzoq2ga9zi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
    tinymce.init({
    selector: 'textarea.tinymce-editor',
    plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
     ],
     toolbar: 'undo redo | formatselect | ' +
    'bold italic backcolor | alignleft aligncenter ' +
    'alignright alignjustify | bullist numlist outdent indent | ' +
    'removeformat | help',
    toolbar_mode: 'floating',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    height: 300,
    content_css: '//www.tiny.cloud/css/codepen.min.css'
    });

    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>

@endsection
