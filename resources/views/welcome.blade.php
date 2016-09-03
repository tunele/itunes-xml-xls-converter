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
                                {!! Form::submit('Convert', array('class'=>'send-btn')) !!}
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

                        <div id="progress" class="progress progress-striped active" style="display: none;">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>

                        <div id="alert-success" class="alert alert-success" style="display: none;">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4>Success</h4>
                            <p id="message_preview">See the output file preview in the text area below.</p>
                            <p>Get the converted file clicking the Download button.</p>
                        </div>

                        <div id="alert-warning" class="alert alert-warning" style="display: none;">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4>Warning</h4>
                            <p>Conversion error</p>
                        </div>
                        <div id="alert-danger" class="alert alert-danger" style="display: none;">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4>Error</h4>
                            <p>Server error occured</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

