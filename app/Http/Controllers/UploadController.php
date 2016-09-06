<?php
namespace App\Http\Controllers;
use Input;
use Validator;
use Redirect;
use Session;
use App\converter\xmlconverter as xmlconverter;
class UploadController extends Controller {
    public function upload() {
        // setting up rules
        $rules = array('xmlfile' => 'required|max:15000','g-recaptcha-response' => 'required|recaptcha'); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors

            return Redirect::to('/#file')->withInput()->withErrors($validator);
        }
        else {
            // checking file is valid.
            if (Input::file('xmlfile')->isValid()) {
                $fileName = rand(11111,99999);
                $tmpfile = Input::file('xmlfile')->openFile();
                $contentsin = $tmpfile->fread($tmpfile->getSize());
                //Input::file('xmlfile')->move($destinationPath, $fileName); // uploading file to given path

                $filepath = storage_path() . '/uploads/';
                $fileout = $filepath.$fileName.'.xls';
                $ret = xmlconverter::convert($contentsin,$fileout);

                // sending back with message
                if ($ret[0]) {
                    Session::flash('success', 'Upload successfully');
                    Session::flash('fileout', $fileName.'.xls');
                    return Redirect::to('/#file');
                } else {
                    // sending back with error message.
                    Session::flash('error', $ret[1]);
                    return Redirect::to('/#file');
                }

            } else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('/#file');
            }
        }
    }
}
