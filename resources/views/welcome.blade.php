@extends('layouts.layout')

@section('content')
        <!-- Styles -->
        <style>
            .files input {
                outline: 2px dashed #92b0b3;
                outline-offset: -10px;
                -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
                transition: outline-offset .15s ease-in-out, background-color .15s linear;
                padding: 120px 0px 85px 35%;
                text-align: center !important;
                margin: 0;
                width: 100% !important;
            }
            .files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
                -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
                transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
            }
            .files{ position:relative}
            .files:after {  pointer-events: none;
                position: absolute;
                top: 60px;
                left: 0;
                width: 50px;
                right: 0;
                height: 56px;
                content: "";
                background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
                display: block;
                margin: 0 auto;
                background-size: 100%;
                background-repeat: no-repeat;
            }
            .color input{ background-color:#f1f1f1;}
            .files:before {
                position: absolute;
                bottom: 10px;
                left: 0;  pointer-events: none;
                width: 100%;
                right: 0;
                height: 57px;
                content: " or drag it here. ";
                display: block;
                margin: 0 auto;
                color: #2ea591;
                font-weight: 600;
                text-transform: capitalize;
                text-align: center;
            }
            /* Sticky footer styles
-------------------------------------------------- */



        </style>


        <div class="container">
            <div class="row">

                <div class="col-md-12">

                    <h2 class="text-center" style="margin-top: 50px;"></h2>

                    <br>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('process') }}" enctype="multipart/form-data" id="fpp-upload-and-convert-form">

                        @csrf


                        <div class="form-group files color">
                            <input type="file" name="file" required class="form-control" >
                        </div>
                        <br>
                        {{--                    <h3>Download as </h3>--}}
                        <br>
                        <div class="row">
                            <div class="col-md-2"><h3>Convert to: </h3></div>
                            <div class="col-md-7">
                                <select class="form-control homeSelect" name="type">
                                    <option value="csv">csv</option>
                                    <option value="xls">xls</option>
                                    <option value="xlsx">xlsx</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="center-block btn btn-primary homeBtn">Upload, Convert & Download</button>
                            </div>

                        </div>

                        <br>


                    </form>

                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <h3>What is this?</h3>
                            <p style="text-align: left;">
                                If you have tried to import <a href="https://www.paypal.com" target="_blank">PayPal</a> transaction history into traditional
                                accounting platforms such as <a href="https://www.mint.com/" target="_blank">Mint</a> or <a href="https://quickbooks.intuit.com/" target="_blank">QuickBooks</a> you probably discovered it
                                didn't work. This is because <a href="https://www.paypal.com" target="_blank">PayPal</a> does a lot of unusual things that make
                                their exports incompatible.
                            </p>
                            <p  style="text-align: left;">
                                This application was built
                                specifically to solve that problem. Just upload your script and click
                                download, in seconds you'll have a properly formatted CSV or Excel file
                                ready to be imported into any traditional accounting software.</p>
                            <p style="text-align: left;">
                            <h3>Feedback</h3>
                            If you find this doesn't work perfect, please tell us so we can fix it by using our <a
                                href="{{ route('contact') }}">contact form</a>. </p>
                            <p style="text-align: left;">
                            <h3>Future Plans</h3>
                            We have plans to add additional
                            features, such as automatically connecting to PayPal accounts,
                            offering a widget for <a href="https://quickbooks.intuit.com/" target="_blank">QuickBooks</a> desktop software,
                            giving you total control over what options are used when exporting,
                            and more a paid version.</p>
                            <p style="text-align: left;">
                            <h3>Disclaimer</h3>
                            We do not permanently keep a copy of the files you upload. However,
                            in order for this system to be possible it does upload your file,
                            make a copy, delete the original, edit the new file,
                            make it available for you to download, then deletes that immediately.
                            All of this happens in about 15 seconds or less for the average conversion,
                            then the data is deleted. Typically there is no personally identifiable
                            information in the default PayPal CSV files, but we have to state that you
                            are responsible to remove that information before uploading.</p>
                        </div>
                        <div class="col-md-6">
                            <h3>Exactly What This App Does</h3>
                            <ul>
                                <li>Where Transaction Type is "Debit Card Cash Back Bonus" set Description to "Debit Card Cash Back Bonus"</li>
                                <li>Where Transaction Type is "Buyer Credit Payment Withdrawal - Transfer To BML" set Description to "Payment toward loan from Bill Me Later"</li>
                                <li>Where Transaction Type is "Bank Deposit to PP Account (Obselete)" set Description to "Loan from PayPals Bill Me Later"</li>
                                <li>Where Transaction Type is "BML Credit - Transfer from BML" set Description to "Loan from PayPals Bill Me Later"</li>
                                <li>Where Transaction Type is "Payment Reversal" set Description to "PayPal Payment Reversal"</li>
                                <li>Where Transaction Type is "Reversal of ACH Deposit" set Description to "Reversal of ACH Deposit"</li>
                                <li>Where Transaction Type is "Reversal of General Account Hold" set Description to "Reversal of General Account Hold"</li>
                                <li>Where Transaction Type is "General Payment" set Description to "Payment to $description"</li>
                                <li>Where Transaction Type is "Other" set Description to "Unknown"</li>
                                <li>Exclude any Transaction with a Type of "Pending" and “Denied”</li>
                                <li>Merge "Subject", "Name" and "Item Title" into one column to be imported into the "Description" column during import into Firefly</li>
                                <li>Remove All fields and keep only four fields  “Status, Transaction Date, Cleared Date, Description, Gross”</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col"  style="margin-top: 9.375em;">
                            <h1>Blog</h1>
                            <p>We will be writing some articles here to attract new vistiors, but for now it's just pseudo content. Please ignore it. Thank you!</p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-md-4"  style="margin: 2rem 0px 2rem 0px;">
                                <h3><a href="{{ $post->url() }}">{{ $post->title }}</a></h3>
                                <p style="font-size: 14px;">Posted on {{ \Carbon\Carbon::parse($post->created_at)->format('M. dS, Y') }}, By
                                    <a href="{{ $post->author->url() }}">{{ $post->author->name }}</a><br></p>
                                <p style="text-align: justify">{!!   \Illuminate\Support\Str::words(strip_tags_content($post->content),50) !!}&nbsp;<a href="{{ $post->url() }}">Continue Reading »</a><br></p>
                                @if(count($post->tags) > 0)
                                    <p style="font-size: 14px;"><strong>Tags:</strong>
                                        @foreach($post->tags as $key => $tag)
                                            &nbsp;<a href="{{ $tag->url() }}">{{ $tag->title }}</a>
                                            @if($key + 1 != count($post->tags))
                                                ,
                                            @endif
                                        @endforeach
                                        <br>
                                    </p>
                                @endif
                                @if(count($post->categories) > 0)
                                    <p style="font-size: 14px;"><strong>Categories:</strong>
                                        @foreach($post->categories as $key => $category)
                                            &nbsp;<a href="{{ $category->url() }}">{{ $category->title }}</a>
                                            @if($key + 1 != count($post->categories))
                                                ,
                                            @endif
                                        @endforeach
                                        <br>
                                    </p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
@endsection
