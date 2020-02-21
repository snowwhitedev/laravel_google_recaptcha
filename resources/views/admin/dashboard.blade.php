@extends('admin.layout.main')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">

{{--        <div class="col-xl-4 col-md-6">--}}
{{--            <div class="card-box widget-user">--}}
{{--                <div class="text-center">--}}
{{--                    <h2 class="text-custom" data-plugin="counterup">{{ $postsCount }}</h2>--}}
{{--                    <h5>Blog Posts</h5>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div><!-- end col -->--}}

{{--        <div class="col-xl-4 col-md-6">--}}
{{--            <div class="card-box widget-user">--}}
{{--                <div class="text-center">--}}
{{--                    <h2 class="text-pink" data-plugin="counterup">{{ $categoriesCount }}</h2>--}}
{{--                    <h5>Categories</h5>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div><!-- end col -->--}}

{{--        <div class="col-xl-4 col-md-6">--}}
{{--            <div class="card-box widget-user">--}}
{{--                <div class="text-center">--}}
{{--                    <h2 class="text-warning" data-plugin="counterup">{{ $tagsCount }}</h2>--}}
{{--                    <h5>Tags</h5>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div><!-- end col -->--}}

        <div class="col-xl-4 col-md-6">
            <div class="card-box widget-user">
                <div class="text-center">
                    <h2 class="text-success" data-plugin="counterup">{{ $csvUsage }}</h2>
                    <h5>CSV Converter Usage</h5>
                </div>
            </div>
        </div><!-- end col -->


    </div>
    <!-- end row -->

    @if($csvUsage > 0)
    <div class="row">
        <div class="card-box table-responsive">
            <h4 class="header-title mt-0 m-b-30">Latest CSV Converter Usage</h4>
            <div class="widget-box-2">
                <table class="table table-hover">
                    <thead>
                    <th>IP</th>
                    <th>File Size</th>
                    <th>Time Consumed</th>
                    <th>Date & Time</th>
                    <th>Downloaded Format</th>
                    <th>User Agent ( Browser )</th>
                    </thead>
                    <tbody>
                    @foreach($latestUsage as $usage)
                        <tr>
                            <td>{{ $usage->ip }}</td>
                            <td>{{ $usage->uploaded_size }}</td>
                            <td>{{ $usage->time_used }}</td>
                            <td>{{ $usage->created_at->format('M. jS, o') }} at {{ $usage->created_at->format('g:i A') }}</td>
                            <td>{{ $usage->download_format }}</td>
                            <td>{{ $usage->user_agent }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
@endsection
