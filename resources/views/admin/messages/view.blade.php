@extends('admin.layout.main')

@section('title')
    View Contact Messages
@endsection

@section('content')
    <div class="row">

        <div class="col-xl-12 col-md-12">
            <div class="card-box table-responsive">

                {{--<h4 class="header-title mt-0 m-b-30">View Contact Messages</h4>--}}

                @if ($message = Session::get('message'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                <div class="comment">
                    <img src="{{ asset('myadmin/assets/images/default-user.png') }}" alt="" class="comment-avatar">
                    <div class="comment-body">
                        <div class="comment-text">
                            <div class="comment-header">
                                <a href="#" title="">{{ $contactMessage->name }}</a><span>{{ $contactMessage->created_at->diffForHumans() }}</span>
                                <a class="btn btn-sm btn-icon waves-effect waves-light btn-danger m-b-5 pull-right" href="{{ route('messages.destroy', $contactMessage) }}"><i class="fa fa-trash"></i></a>
                            </div>
                            {{ $contactMessage->content }}

                        </div>
                    </div>

                    @foreach($contactMessage->replies as $reply)
                        <div class="comment">
                            <img src="{{ asset('myadmin/assets/images/default-admin.png') }}" alt="" class="comment-avatar">
                            <div class="comment-body">
                                <div class="comment-text">
                                    <div class="comment-header">
                                        <a href="#" title="">Admin</a><span>{{ $reply->created_at->diffForHumans() }}</span>
                                        <a class="btn btn-sm btn-icon waves-effect waves-light btn-danger m-b-5 pull-right" href="{{ route('replies.destroy', $reply) }}"><i class="fa fa-trash"></i></a>
                                    </div>
                                    {{ $reply->content }}
                                </div>
                            </div>
                        </div>
                    @endforeach



                </div>


            </div>

            <form method="post" class="card-box" action="{{ route('replies.store', $contactMessage) }}">
                @csrf
                <span class="input-icon icon-right">
                    <textarea rows="2" class="form-control" placeholder="Post a new reply" required name="content"></textarea>
                </span>
                <div class="p-t-10 pull-right">
                    <button type="submit" class="btn  btn-primary waves-effect waves-light">Add Reply</button>
                </div>
                <br>
                <br>

            </form>

        </div><!-- end col -->


    </div>
    <!-- end row -->
@endsection
