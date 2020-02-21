@extends('admin.layout.main')

@section('title')
    SiteMap Settings
@endsection

@section('content')
    <form class="form-horizontal" action="{{ route('sitemap') }}" method="post">
        @csrf
    <div class="row">

        <div class="col-xl-12 col-md-12">
{{--            <div class="card-box table-responsive">--}}

{{--                <h4 class="header-title mt-0 m-b-30">SiteMap Settings</h4>--}}

{{--                <div class="widget-box-2">--}}
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

{{--                </div>--}}
{{--            </div>--}}
        </div><!-- end col -->


        <div class="col-xl-12 col-md-12">
            <div class="card-box table-responsive">

                <h4 class="header-title mt-0 m-b-30">SiteMap Content</h4>

                <div class="widget-box-2">

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" rel="homepage_included" name="homepage_included" @if($siteMapSettings->homepage_included) checked @endif id="homepage_included">
                        <label class="form-check-label" for="homepage_included">
                            Include Homepage
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"  rel="posts_included" name="posts_included" @if($siteMapSettings->posts_included) checked @endif id="posts_included">
                        <label class="form-check-label" for="posts_included">
                            Include Posts
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" rel="cats_included" name="cats_included" @if($siteMapSettings->cats_included) checked @endif id="cats_included">
                        <label class="form-check-label" for="cats_included">
                            Include Categories
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" rel="tags_included" name="tags_included" @if($siteMapSettings->tags_included) checked @endif id="tags_included">
                        <label class="form-check-label" for="tags_included">
                            Include Tags
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" rel="authors_included" name="authors_included" @if($siteMapSettings->authors_included) checked @endif id="authors_included">
                        <label class="form-check-label" for="authors_included">
                            Include Authors
                        </label>
                    </div>

                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-12 col-md-12">
            <div class="card-box table-responsive">

                <h4 class="header-title mt-0 m-b-30">Change Frequencies</h4>

                <div class="widget-box-2">
                    <p>
                        Note: Please note that the value of this tag is considered a hint and not a command.
                        Even though search engine crawlers consider this information when making decisions,
                        they may crawl pages marked "hourly" less frequently than that, and they may crawl
                        pages marked "yearly" more frequently than that.
                        It is also likely that crawlers will periodically crawl pages marked "never"
                        so that they can handle unexpected changes to those pages.
                    </p>
                    <br>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Homepage</label>
                        <div class="col-10">
                            <select name="homepage_freq" class="form-control" >
                                <option @if($siteMapSettings->homepage_freq == 'always') selected @endif value="always">Always</option>
                                <option @if($siteMapSettings->homepage_freq == 'hourly') selected @endif value="hourly">Hourly</option>
                                <option @if($siteMapSettings->homepage_freq == 'daily') selected @endif value="daily">Daily</option>
                                <option @if($siteMapSettings->homepage_freq == 'weekly') selected @endif value="weekly">Weekly</option>
                                <option @if($siteMapSettings->homepage_freq == 'monthly') selected @endif value="monthly">Monthly</option>
                                <option @if($siteMapSettings->homepage_freq == 'yearly') selected @endif value="yearly">Yearly</option>
                                <option @if($siteMapSettings->homepage_freq == 'never') selected @endif value="never">Never</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Posts</label>
                        <div class="col-10">
                            <select name="posts_freq" class="form-control" >
                                <option @if($siteMapSettings->posts_freq == 'always') selected @endif value="always">Always</option>
                                <option @if($siteMapSettings->posts_freq == 'hourly') selected @endif value="hourly">Hourly</option>
                                <option @if($siteMapSettings->posts_freq == 'daily') selected @endif value="daily">Daily</option>
                                <option @if($siteMapSettings->posts_freq == 'weekly') selected @endif value="weekly">Weekly</option>
                                <option @if($siteMapSettings->posts_freq == 'monthly') selected @endif value="monthly">Monthly</option>
                                <option @if($siteMapSettings->posts_freq == 'yearly') selected @endif value="yearly">Yearly</option>
                                <option @if($siteMapSettings->posts_freq == 'never') selected @endif value="never">Never</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Categories</label>
                        <div class="col-10">
                            <select name="cats_freq" class="form-control" >
                                <option @if($siteMapSettings->cats_freq == 'always') selected @endif value="always">Always</option>
                                <option @if($siteMapSettings->cats_freq == 'hourly') selected @endif value="hourly">Hourly</option>
                                <option @if($siteMapSettings->cats_freq == 'daily') selected @endif value="daily">Daily</option>
                                <option @if($siteMapSettings->cats_freq == 'weekly') selected @endif value="weekly">Weekly</option>
                                <option @if($siteMapSettings->cats_freq == 'monthly') selected @endif value="monthly">Monthly</option>
                                <option @if($siteMapSettings->cats_freq == 'yearly') selected @endif value="yearly">Yearly</option>
                                <option @if($siteMapSettings->cats_freq == 'never') selected @endif value="never">Never</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Tags</label>
                        <div class="col-10">
                            <select name="tags_freq" class="form-control" >
                                <option @if($siteMapSettings->tags_freq == 'always') selected @endif value="always">Always</option>
                                <option @if($siteMapSettings->tags_freq == 'hourly') selected @endif value="hourly">Hourly</option>
                                <option @if($siteMapSettings->tags_freq == 'daily') selected @endif value="daily">Daily</option>
                                <option @if($siteMapSettings->tags_freq == 'weekly') selected @endif value="weekly">Weekly</option>
                                <option @if($siteMapSettings->tags_freq == 'monthly') selected @endif value="monthly">Monthly</option>
                                <option @if($siteMapSettings->tags_freq == 'yearly') selected @endif value="yearly">Yearly</option>
                                <option @if($siteMapSettings->tags_freq == 'never') selected @endif value="never">Never</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Authors</label>
                        <div class="col-10">
                            <select name="authors_freq" class="form-control" >
                                <option @if($siteMapSettings->authors_freq == 'always') selected @endif value="always">Always</option>
                                <option @if($siteMapSettings->authors_freq == 'hourly') selected @endif value="hourly">Hourly</option>
                                <option @if($siteMapSettings->authors_freq == 'daily') selected @endif value="daily">Daily</option>
                                <option @if($siteMapSettings->authors_freq == 'weekly') selected @endif value="weekly">Weekly</option>
                                <option @if($siteMapSettings->authors_freq == 'monthly') selected @endif value="monthly">Monthly</option>
                                <option @if($siteMapSettings->authors_freq == 'yearly') selected @endif value="yearly">Yearly</option>
                                <option @if($siteMapSettings->authors_freq == 'never') selected @endif value="never">Never</option>
                            </select>
                        </div>
                    </div>


                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-12 col-md-12">
            <div class="card-box table-responsive">

                <h4 class="header-title mt-0 m-b-30">Priorities</h4>

                <div class="widget-box-2">

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Homepage</label>
                        <div class="col-10">
                            <select name="homepage_priority" class="form-control" >
                                <option @if($siteMapSettings->homepage_priority == '0.0') selected @endif value="0.0">0.0</option>
                                <option @if($siteMapSettings->homepage_priority == '0.1') selected @endif value="0.1">0.1</option>
                                <option @if($siteMapSettings->homepage_priority == '0.2') selected @endif value="0.2">0.2</option>
                                <option @if($siteMapSettings->homepage_priority == '0.3') selected @endif value="0.3">0.3</option>
                                <option @if($siteMapSettings->homepage_priority == '0.4') selected @endif value="0.4">0.4</option>
                                <option @if($siteMapSettings->homepage_priority == '0.5') selected @endif value="0.5">0.5</option>
                                <option @if($siteMapSettings->homepage_priority == '0.6') selected @endif value="0.6">0.6</option>
                                <option @if($siteMapSettings->homepage_priority == '0.7') selected @endif value="0.7">0.7</option>
                                <option @if($siteMapSettings->homepage_priority == '0.8') selected @endif value="0.8">0.8</option>
                                <option @if($siteMapSettings->homepage_priority == '0.9') selected @endif value="0.9">0.9</option>
                                <option @if($siteMapSettings->homepage_priority == '1.0') selected @endif value="1.0">1.0</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Posts</label>
                        <div class="col-10">
                            <select name="posts_priority" class="form-control" >
                                <option @if($siteMapSettings->posts_priority == '0.0') selected @endif value="0.0">0.0</option>
                                <option @if($siteMapSettings->posts_priority == '0.1') selected @endif value="0.1">0.1</option>
                                <option @if($siteMapSettings->posts_priority == '0.2') selected @endif value="0.2">0.2</option>
                                <option @if($siteMapSettings->posts_priority == '0.3') selected @endif value="0.3">0.3</option>
                                <option @if($siteMapSettings->posts_priority == '0.4') selected @endif value="0.4">0.4</option>
                                <option @if($siteMapSettings->posts_priority == '0.5') selected @endif value="0.5">0.5</option>
                                <option @if($siteMapSettings->posts_priority == '0.6') selected @endif value="0.6">0.6</option>
                                <option @if($siteMapSettings->posts_priority == '0.7') selected @endif value="0.7">0.7</option>
                                <option @if($siteMapSettings->posts_priority == '0.8') selected @endif value="0.8">0.8</option>
                                <option @if($siteMapSettings->posts_priority == '0.9') selected @endif value="0.9">0.9</option>
                                <option @if($siteMapSettings->posts_priority == '1.0') selected @endif value="1.0">1.0</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Categories</label>
                        <div class="col-10">
                            <select name="cats_priority" class="form-control" >
                                <option @if($siteMapSettings->cats_priority == '0.0') selected @endif value="0.0">0.0</option>
                                <option @if($siteMapSettings->cats_priority == '0.1') selected @endif value="0.1">0.1</option>
                                <option @if($siteMapSettings->cats_priority == '0.2') selected @endif value="0.2">0.2</option>
                                <option @if($siteMapSettings->cats_priority == '0.3') selected @endif value="0.3">0.3</option>
                                <option @if($siteMapSettings->cats_priority == '0.4') selected @endif value="0.4">0.4</option>
                                <option @if($siteMapSettings->cats_priority == '0.5') selected @endif value="0.5">0.5</option>
                                <option @if($siteMapSettings->cats_priority == '0.6') selected @endif value="0.6">0.6</option>
                                <option @if($siteMapSettings->cats_priority == '0.7') selected @endif value="0.7">0.7</option>
                                <option @if($siteMapSettings->cats_priority == '0.8') selected @endif value="0.8">0.8</option>
                                <option @if($siteMapSettings->cats_priority == '0.9') selected @endif value="0.9">0.9</option>
                                <option @if($siteMapSettings->cats_priority == '1.0') selected @endif value="1.0">1.0</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Tags</label>
                        <div class="col-10">
                            <select name="tags_priority" class="form-control" >
                                <option @if($siteMapSettings->tags_priority == '0.0') selected @endif value="0.0">0.0</option>
                                <option @if($siteMapSettings->tags_priority == '0.1') selected @endif value="0.1">0.1</option>
                                <option @if($siteMapSettings->tags_priority == '0.2') selected @endif value="0.2">0.2</option>
                                <option @if($siteMapSettings->tags_priority == '0.3') selected @endif value="0.3">0.3</option>
                                <option @if($siteMapSettings->tags_priority == '0.4') selected @endif value="0.4">0.4</option>
                                <option @if($siteMapSettings->tags_priority == '0.5') selected @endif value="0.5">0.5</option>
                                <option @if($siteMapSettings->tags_priority == '0.6') selected @endif value="0.6">0.6</option>
                                <option @if($siteMapSettings->tags_priority == '0.7') selected @endif value="0.7">0.7</option>
                                <option @if($siteMapSettings->tags_priority == '0.8') selected @endif value="0.8">0.8</option>
                                <option @if($siteMapSettings->tags_priority == '0.9') selected @endif value="0.9">0.9</option>
                                <option @if($siteMapSettings->tags_priority == '1.0') selected @endif value="1.0">1.0</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Authors</label>
                        <div class="col-10">
                            <select name="authors_priority" class="form-control" >
                                <option @if($siteMapSettings->authors_priority == '0.0') selected @endif value="0.0">0.0</option>
                                <option @if($siteMapSettings->authors_priority == '0.1') selected @endif value="0.1">0.1</option>
                                <option @if($siteMapSettings->authors_priority == '0.2') selected @endif value="0.2">0.2</option>
                                <option @if($siteMapSettings->authors_priority == '0.3') selected @endif value="0.3">0.3</option>
                                <option @if($siteMapSettings->authors_priority == '0.4') selected @endif value="0.4">0.4</option>
                                <option @if($siteMapSettings->authors_priority == '0.5') selected @endif value="0.5">0.5</option>
                                <option @if($siteMapSettings->authors_priority == '0.6') selected @endif value="0.6">0.6</option>
                                <option @if($siteMapSettings->authors_priority == '0.7') selected @endif value="0.7">0.7</option>
                                <option @if($siteMapSettings->authors_priority == '0.8') selected @endif value="0.8">0.8</option>
                                <option @if($siteMapSettings->authors_priority == '0.9') selected @endif value="0.9">0.9</option>
                                <option @if($siteMapSettings->authors_priority == '1.0') selected @endif value="1.0">1.0</option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- end col -->


        <div class="col-xl-12 col-md-12">
            <div class="pull-right">
                <button type="submit" class="btn btn-primary center-block">Save Settings</button>
            </div>
        </div><!-- end col -->


    </div>
    </form>
    <!-- end row -->
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            var chk = $('input[type="checkbox"]');
            chk.each(function(){
                var v = $(this).attr('checked') == 'checked'?1:0;
                $(this).after('<input type="hidden" name="'+$(this).attr('rel')+'" value="'+v+'" />');
            });

            chk.change(function(){
                var v = $(this).is(':checked')?1:0;
                $(this).next('input[type="hidden"]').val(v);
            });
        });
    </script>
@endsection