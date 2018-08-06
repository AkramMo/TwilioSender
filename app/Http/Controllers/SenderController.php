<?php

namespace BatataSender\Http\Controllers;

use Illuminate\Http\Request;

class SenderController extends Controller
{

        /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function formValidationPost(Request $request)
    {
     
        $this->validate($request, [
            'email' => 'required|email',
            'apikey' => 'required',
            'inputFile' => 'required|max:100000|mimes:txt',
        ], [
            'email.required' => ' The email field is required',
            'email.email' => 'The email formait is wrong',
            'apikey.required' => 'The apikey is required',
            'inputFile.required' => 'You need to upload a file',
            'inputFile.mimes' => 'You need to upload a .txt file',
        ]);

        $this->sendSms($request);
    }

    public function sendSms(Request $request){

        $path = $request->file('inputFile');
        $myfile = fopen($path, "r") or die("Unable to open file !");
        $myNumbers = array();

        if($myfile){
            while(($line = fgets($myfile)) !== false){
                array_push($myNumbers, $line);
            }
            fclose($myfile);
        }
        
            echo 'The email is '.$request['email'].'<br>';
            echo 'The api key is'.$request['apikey'].'<br>';
        foreach($myNumbers as $number){
            echo 'The number is'.$number.'<br>';
        }

    }

    public function senderView(){

        return view('/Sender/sender');
    }
}
