@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>{!! trans('home.claim') !!}</h1></div>
                    <div class="panel-body">
                        <img src="{{asset('img/main.png')}}">
                        <p></p>
                        <h4>{!! trans('home.panelbodyp1') !!}</h4>
                        <h4>{!! trans('home.panelbodyp2') !!}</h4>
                        <h4><i class="fa fa-fw fa-info"></i> {!! trans('home.panelbodyp3') !!}</h4>
                        @if ($errors->any())
                            <hr/>
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <div>
                            <a name="file"></a>
                            {!! Form::open(array('url'=>'api/files','method'=>'POST', 'files'=>true)) !!}
                            <div class="control-group">
                                <div class="controls">
                                    {!! Form::file('xmlfile') !!}

                                    @if(Session::has('error'))
                                        <p class="errors">{!! trans('home.fileconvertedfailed1') !!}</p>
                                        <p class="errors">{!! trans('home.fileconvertedfailed2') !!} <a href="//www.treagles.it">www.treagles.it</a></p>
                                    @endif
                                    @if(Session::has('validationfail'))
                                        <p class="errors">{!! trans('home.fileconvertedfailed1') !!}</p>
                                        <p class="errors">{!! trans('home.fileconvertedfailed2') !!} <a href="//www.treagles.it">www.treagles.it</a></p>
                                    @endif
                                </div>
                            </div>

                            <div id="success"> </div>
                            {!! Recaptcha::render() !!}
                            {!! Form::submit(trans('home.convert'), array('class'=>'send-btn', 'id'=>"btnConvert")) !!}
                            {!! Form::close() !!}
                            @if(Session::has('success'))
                                <div class="alert-box success">

                                    <h2>{!! trans('home.fileconvertedok') !!}</h2>
                                    <h2>{!!  link_to_asset('download/'.Session::get('fileout'), trans('home.clicktodownload')) !!}</h2>
                                </div>
                            @endif

                        </div>


                        <div id="progresscont" style="display: none;">
                            <p>{!! trans('home.processingifle') !!}</p>
                            <div id="progress" class="progress progress-striped active">

                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{!! asset('js/convert.js?v=1.0.0') !!}"></script>
@endsection

