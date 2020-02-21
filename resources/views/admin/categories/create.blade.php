@extends('admin.layout.main')

@section('title')
    Create New Category
@endsection

@section('content')
    <div class="row">

        <div class="col-xl-12 col-md-12">
            <div class="card-box table-responsive">

                <h4 class="header-title mt-0 m-b-30">Create new Category</h4>

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

                    <form class="form-horizontal" action="{{ route('categories.store') }}" method="post">
                        @csrf

                        <div class="form-group row">
                            <label class="col-2 col-form-label">Title</label>
                            <div class="col-10">
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}"  placeholder="Title" required>
                            </div>
                        </div>



                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary center-block">Add new category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- end col -->


    </div>
    <!-- end row -->
@endsection
