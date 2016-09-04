@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Online Convert iTunes XML export files to Excel XLS files</h1></div>
                    <div class="panel-body">
                        <p>Here you can convert iTunes XML export files to the Excel XLS format.</p>
                        <p>To start, please choose the source file and click the Convert button below.</p>
                        <p><i class="fa fa-fw fa-info"></i> Please note: file size limit for the source file is 15 Mb.</p>
                        <table class="table">
                            <tbody>
                            <tr>

                                {!! Form::open(array('url'=>'api/files','method'=>'POST', 'files'=>true)) !!}
                                <div class="control-group">
                                    <div class="controls">
                                        {!! Form::file('xmlfile') !!}
                                        <p class="errors">{!!$errors->first('xmlfile')!!}</p>
                                        @if(Session::has('error'))
                                            <p class="errors">{!! Session::get('error') !!}</p>
                                        @endif
                                    </div>
                                </div>

                                <div id="success"> </div>
                                {!! Form::submit('Convert', array('class'=>'send-btn', 'id'=>"btnConvert")) !!}
                                {!! Form::close() !!}
                                @if(Session::has('success'))
                                    <div class="alert-box success">
                                        <h2>File converted successfully</h2>
                                        <h2>{!!  link_to_asset('download/'.Session::get('fileout'), 'Click to Download') !!}</h2>
                                    </div>
                                @endif
                            </tr>
                            </tbody>
                        </table>
                        <div id="progresscont" style="display: none;">
                            <p>Processing file, please wait</p>
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

