@extends('admin.layout.main')

@section('title')
    Edit Post
@endsection

@section('content')
    <div class="row">

        <div class="col-xl-12 col-md-12">
            <div class="card-box table-responsive">

                <h4 class="header-title mt-0 m-b-30">Edit Post</h4>

                <div class="widget-box-2">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                        @if ($message = Session::get('message'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                    <form class="form-horizontal" action="{{ route('posts.update', $post) }}" method="post">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Title</label>
                            <div class="col-10">
                                <input type="text" name="title" class="form-control" value="{{ $post->title }}"  placeholder="Title" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label">Content</label>
                            <div class="col-10">
                                <textarea id="elm1" name="content" required>{{ $post->content }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label">Category</label>
                            <div class="col-10">
                                <select name="categories[]" class="select2 select2-multiple categories" multiple="multiple" data-placeholder="Choose ...">
                                    @foreach($categories as $category)
                                        <option @if(in_array_r($category->id, $post->categories->toArray())) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label">Tags</label>
                            <div class="col-10">
                                <select name="tags[]" class="select2 select2-multiple tags" multiple="multiple"  data-placeholder="Choose ...">
                                    @foreach($tags as $tag)
                                        <option @if(in_array_r($tag->id, $post->tags->toArray())) selected @endif  value="{{ $tag->id }}">{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary center-block">Save post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- end col -->


    </div>
    <!-- end row -->
@endsection

@section('styles')
    <link href="{{ asset('myadmin/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('myadmin/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
@endsection

@section('scripts')
    <script src="{{ asset('myadmin/assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('myadmin/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('myadmin/assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".categories").select2();
            $(".tags").select2({
                tags: true
            });

            if($("#elm1").length > 0){
                tinymce.init({
                    selector: "textarea#elm1",
                    theme: "modern",
                    height:300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                    style_formats: [
                        {title: 'Bold text', inline: 'b'},
                        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                        {title: 'Example 1', inline: 'span', classes: 'example1'},
                        {title: 'Example 2', inline: 'span', classes: 'example2'},
                        {title: 'Table styles'},
                        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                    ]
                });
            }
        });
    </script>
@endsection