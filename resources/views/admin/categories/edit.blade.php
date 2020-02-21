@extends('admin.layout.main')

@section('title')
    Edit Category
@endsection

@section('content')
    <div class="row">

        <div class="col-xl-12 col-md-12">
            <div class="card-box table-responsive">

                <h4 class="header-title mt-0 m-b-30">Edit Category</h4>

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

                    <form class="form-horizontal" action="{{ route('categories.update', $category) }}" method="post">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Title</label>
                            <div class="col-10">
                                <input type="text" name="title" class="form-control" value="{{ $category->title }}"  placeholder="Title" required>
                            </div>
                        </div>




                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary center-block">Save Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- end col -->


    </div>
    <!-- end row -->
@endsection
