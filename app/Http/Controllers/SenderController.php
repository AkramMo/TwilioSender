<?php

namespace BatataSender\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

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
            'sid' => 'required|max:240',
            'number' => 'required',
            'twilio_token' => 'required|max:240',
            'inputFile' => 'required|max:100000|mimes:txt',
            'message' => 'required|max:1600'
        ], [
            'email.required' => ' The email field is required',
            'email.email' => 'The email formait is wrong',
            'sid.required' => 'The account SID is required',
            'number.required' => 'The twilio phone number is required',
            'twilio_token' => 'The twilio token is required',
            'inputFile.required' => 'You need to upload a file',
            'inputFile.mimes' => 'You need to upload a .txt file',
        ]);

        $view = $this->sendSms($request);

        return $view;
    }

    public function sendSms(Request $request){

        $path = $request->file('inputFile');
        $myfile = fopen($path, "r") or die("Unable to open file !");
        $numbers = array();
        $errorNumbers = array();

        if($myfile){
            while(($line = fgets($myfile)) !== false){
                array_push($numbers, $line);
            }
            fclose($myfile);
        }

        // Your Account SID and Auth Token from twilio.com/console
        $account_sid = $request['sid'];
        $auth_token = $request['twilio_token'];
        // A Twilio number you own with SMS capabilities
        $twilio_number = $request['number'];
        // The message that will be send 
        $message = $request['message'];


        for($i = 0; $i< sizeof($numbers); $i++){
            try{
                
                $client = new Client($account_sid, $auth_token);
                $client->messages->create(
                    // Where to send a text message (your cell phone?)
                    $numbers[$i],
                    array(
                        'from' => $twilio_number,
                        'body' => $message,
                        "statusCallback" => "https://protected-springs-93652.herokuapp.com/1d5yy411",
                    )
                );
            }catch(\Exception $e){
                array_push($errorNumbers, $numbers[$i]);
            }
        }

        return view('Sender/sender', ["numbers" => $numbers, "errorNumbers" => $errorNumbers]);
    }

    public function senderView(){

        return view('/Sender/sender');
    }
}
