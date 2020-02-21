@extends('admin.layout.main')

@section('title')
    All Contact Messages
@endsection

@section('content')
    <div class="row">

        <div class="col-xl-12 col-md-12">
            <div class="card-box table-responsive">

                <h4 class="header-title mt-0 m-b-30">All Contact Messages</h4>

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
                                <th>Sender Name</th>
                                <th>Sender Email</th>
                                <th>Received Date</th>
                                <th>Last Update</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($messages as $message)
                                <tr>
                                    <td>{{ $message->id }}</td>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->created_at->diffForHumans() }}</td>
                                    <td>{{ $message->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <a class="btn btn-icon waves-effect waves-light btn-success m-b-5" href="{{ route('messages.show', $message) }}"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-icon waves-effect waves-light btn-danger m-b-5" href="{{ route('messages.destroy', $message) }}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <p class="text-center">There is no messages.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $messages->links() }}

                </div>
            </div>
        </div><!-- end col -->


    </div>
    <!-- end row -->
@endsection
