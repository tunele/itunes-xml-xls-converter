<?php
namespace App\Http\Controllers;
use Input;
use Validator;
use Redirect;
use Session;
use App\converter\xmlconverter as xmlconverter;
class UploadController extends Controller {
    public function upload() {
        // getting all of the post data
        $file = array('xmlfile' => Input::file('xmlfile'));
        // setting up rules
        $rules = array('xmlfile' => 'required|max:15000',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('/')->withInput()->withErrors($validator);
        }
        else {
            // checking file is valid.
            if (Input::file('xmlfile')->isValid()) {
                $fileName = rand(11111,99999);
                $tmpfile = Input::file('xmlfile')->openFile();
                $contents = $tmpfile->fread($tmpfile->getSize());
                //Input::file('xmlfile')->move($destinationPath, $fileName); // uploading file to given path

                $filepath = storage_path() . '/uploads/';
                $fileout = $filepath.$fileName.'.xls';
                $ret = xmlconverter::convert($contents,$fileout);
                // sending back with message
                if ($ret[0]) {
                    Session::flash('success', 'Upload successfully');
                    Session::flash('filepath','/uploads/'. $fileName.'.xls');
                    return Redirect::to('/');
                } else {
                    // sending back with error message.
                    Session::flash('error', $ret[1]);
                    return Redirect::to('/');
                }

            } else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('/');
            }
        }
    }
}