@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Convert XML File to Excel File (XLS) Online</div>

                    <div class="panel-body">
                        Here you can Convert XML file to the Excel XLS format.

                        To start, please choose the source file and click the Convert button below.

                        1	Select an XML file
                        Browse…Choose File
                        Max: 150MB
                        2	Click this button to start converting
                        Convert
                        Conversion time depends on the source file size. Please be patient while the conversion is being processed. We are working on the performance improvement.

                        Please note: file size limit for the source file is 150 Mb. This limit was set for the reliable operation of the service.

                        If you would like to convert a larger file or if you experience problems converting your file - feel free to contact us, our team is able to solve almost any conversion problem.
                        <div class="about-section">
                            <div class="text-content">
                                <div class="span7 offset1">

                                    @if(Session::has('success'))
                                        <div class="alert-box success">
                                            <h2>{!! Session::get('success') !!}</h2>filepath
                                            {!!  link_to_asset('download/'.Session::get('fileout'), 'File Name') !!}
                                        </div>
                                    @endif
                                    <div class="secure">Upload form</div>
                                    {!! Form::open(array('url'=>'apply/upload','method'=>'POST', 'files'=>true)) !!}
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
                                    {!! Form::submit('Submit', array('class'=>'send-btn')) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

