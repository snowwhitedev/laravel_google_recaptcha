@extends('admin.layout.main')

@section('title')
    Manage Categories
@endsection

@section('content')
    <div class="row">

        <div class="col-xl-12 col-md-12">
            <div class="card-box table-responsive">

                <h4 class="header-title mt-0 m-b-30">Manage Categories</h4>

                @if ($message = Session::get('message'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="widget-box-2">
                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                            @csrf
                                            <a class="btn btn-icon waves-effect waves-light btn-success m-b-5" href="{{ route('categories.edit', $category) }}"><i class="fa fa-edit"></i></a>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button class="btn btn-icon waves-effect waves-light btn-danger m-b-5"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $categories->links() }}

                </div>
            </div>
        </div><!-- end col -->


    </div>
    <!-- end row -->
@endsection