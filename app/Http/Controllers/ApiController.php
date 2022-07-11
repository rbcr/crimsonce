<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function index(){
        return redirect('api/documentation');
    }

    /**
     * Create professional
     *
     * @param  [string] FirstName
     * @param  [string] LastName
     * @param  [string] email
     * @param  [string] password
     * @param  [string] CountryCode
     * @return array{result: boolean, message: string, data: array}[
     *  'id' => int
     * ]
     */
    public function addUser(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'FirstName'=>'required|string|min:1|max:100',
                'LastName'=>'required|string|min:1|max:100',
                'email' => 'required|email',
                'password' =>'required|min:8|string',
                'CountryCode'=>'required|string|min:2|max:2',
            ]);
            if(!$validator->fails()){
                $email = $request->input('email');
                if(!User::where('email', $email)->get()->count()){
                    $professional = new User();
                    $professional->FirstName = $request->input('FirstName');
                    $professional->LastName = $request->input('LastName');
                    $professional->email = $email;
                    $professional->password = \Illuminate\Support\Facades\Hash::make($request->input('password'));
                    $professional->CountryCode = $request->input('CountryCode');
                    $professional->CurrentBadge = 1;
                    $professional->save();

                    $response = [
                        'result' => true,
                        'message' => 'Professional has been successfully created',
                        'data' => [
                            'id' => $professional->id
                        ]
                    ];
                } else
                    $response = ['result' => false, 'message' => "A user has previously registered with the email: $email"];
            } else {
                $errors = collect($validator->errors())->map(function ($message){
                    return $message[0];
                });
                $response = ['result' => false, 'message' => 'The following errors were found:' . (implode(', ', $errors->all())), 'data' => $errors->all()];
            }
        } catch (Exception $exception){
            $response = ['result' => false, 'message' => 'Error has been encountered: ' . $exception->getMessage()];
        }
        return json_encode($response);
    }

    /**
     * Get current professional
     *
     * @return array{result: boolean, message: string, data: array}[
     *  'FirstName' => string
     *  'LastName' => string
     *  'Email' => string
     *  'ContryCode' => string
     *  'CurrentBadge' => string
     *  'Contacts' => array[] object User
     * ]
     */
    public function getUser(Request $request){
        try {
            $user = $request->user();
            $contacts = [];
            foreach ($user->contacts->sortBy('FirstName') as $contact)
                $contacts[] = [
                    'FirstName' => $contact->FirstName,
                    'LastName' => $contact->LastName,
                    'Email' => $contact->email,
                    'CountryCode' => $contact->CountryCode,
                    'CurrentBadge' => $contact->badge->name
                ];
            $response = [
                'result' => true,
                'message' => 'Professional has been found',
                'data' => [
                    'FirstName' => $user->FirstName,
                    'LastName' => $user->LastName,
                    'Email' => $user->email,
                    'CountryCode' => $user->CountryCode,
                    'CurrentBadge' => $user->badge->name,
                    'Contacts' => $contacts
                ]
            ];
        } catch (Exception $exception){
            $response = ['result' => false, 'message' => 'Error has been encountered: ' . $exception->getMessage()];
        }
        return json_encode($response);
    }

    /**
     * Update professional
     *
     * @param  [string] FirstName (optional)
     * @param  [string] LastName (optional)
     * @param  [string] email (optional)
     * @param  [string] password (optional)
     * @param  [string] CountryCode (optional)
     * @return array{result: boolean, message: string, data: array}[
     *  'id' => int
     * ]
     */
    public function updateUser(Request $request){
        try {
            $id = $request->user()->id;
            $professional = User::where('id', (int)$id)->get();
            if($professional->count()){
                $professional = $professional->first();
                if(!empty($request->input('FirstName')))
                    $professional->FirstName = $request->input('FirstName');
                if(!empty($request->input('LastName')))
                    $professional->LastName = $request->input('LastName');
                if(!empty($request->input('CountryCode')))
                    $professional->CountryCode = $request->input('CountryCode');

                $email = $request->input('email');
                if(!empty($email) && User::where('email', '!=', $email)->where('id', '!=', $id)->get()->count())
                    $professional->email = $email;

                if(!empty($request->input('password')))
                    $professional->password = \Illuminate\Support\Facades\Hash::make($request->input('password'));

                $professional->save();
                $response = [
                    'result' => true,
                    'message' => 'Professional has been successfully updated',
                    'data' => [
                        'id' => $professional->id
                    ]
                ];
            } else
                $response = ['result' => false, 'message' => 'Professional not found'];
        } catch (Exception $exception){
            $response = ['result' => false, 'message' => 'Error has been encountered: ' . $exception->getMessage()];
        }
        return json_encode($response);
    }

    /**
     * Delete professionals
     *
     * @param  [int] id
     * @return array{result: boolean, message: string}[]
     */
    public function deleteUser(Request $request){
        try {
            $id = $request->user()->id;
            $professional = User::where('id', (int)$id)->get();
            if($professional->count()){
                $professional = $professional->first();
                $professional->delete();
                $response = [
                    'result' => true,
                    'message' => 'Professional has been successfully deleted'
                ];
            } else
                $response = ['result' => false, 'message' => 'Professional not found'];
        } catch (Exception $exception){
            $response = ['result' => false, 'message' => 'Error has been encountered: ' . $exception->getMessage()];
        }
        return json_encode($response);
    }

    /**
     * Import professionals
     *
     * @param  [int] number_of_users
     * @return array{result: boolean, message: string, data: array}[]
     */
    public function importUsers(Request $request){
        try {
            $quantity = (int)$request->input('number_of_users');
            factory(User::class, (int)$quantity)->create();
            $response = ['result' => true, 'message' => "Information of $quantity professionals has been imported"];
        } catch (Exception $exception){
            $response = ['result' => false, 'message' => 'Error has been encountered: ' . $exception->getMessage()];
        }
        return json_encode($response);
    }
}
