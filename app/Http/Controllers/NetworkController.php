<?php

namespace App\Http\Controllers;

use App\ProfessionalNetwork;
use App\User;
use Illuminate\Http\Request;

class NetworkController extends Controller
{
    /**
     * Add professional to network
     *
     * @param  [string] email
     * @return array{result: boolean, message: string, data: array}[
     *  'contact_id' => int
     * ]
     */
    public function add(Request $request){
        $professional_id = $request->user()->id;
        $email = $request->input('email');
        $contact = User::where('email', $email)->where('id', '!=', $professional_id)->get();
        if($contact->count()){
            $contact = $contact->first();
            $status = ProfessionalNetwork::addToNetwork($professional_id, $contact->id);
            $response = [
                'result' => $status,
                'message' => $status ? "$contact->FirstName $contact->LastName has been added to your network" : "$contact->FirstName $contact->LastName is already in your network",
                'data' => [
                    'contact_id' => $contact->id
                ]
            ];
        } else
            $response = ['result' => false, 'message' => 'Please, check the contact info'];
        return json_encode($response);
    }

    /**
     * Remove professional to network
     *
     * @param  [string] email
     * @return array{result: boolean, message: string}[]
     */
    public function delete(Request $request){
        $professional_id = $request->user()->id;
        $email = $request->input('email');
        $contact = User::where('email', $email)->where('id', '!=', $professional_id)->get();
        if($contact->count()){
            $contact = $contact->first();
            $status = ProfessionalNetwork::deleteToNetwork($professional_id, $contact->id);
            $response = [
                'result' => $status,
                'message' => $status ? "$contact->FirstName $contact->LastName has been removed from your network" : "User is not in your network"
            ];
        } else
            $response = ['result' => false, 'message' => 'Please, check the contact info'];
        return json_encode($response);
    }

    /**
     * Get network (direct or indirect) contacts list
     *
     * @param  [string] filter (direct|indirect)
     * @param  [string] sortBy (FirstName|LastName|Email)
     * @return array{result: boolean, message: string}[
     *  'result' => boolean,
     *  'number_contacts' => int,
     *  'filter' => 'string,
     *  'data' => array[contacts: collection]
     * ]
     */
    public function list(Request $request){
        $contacts = collect();
        $filter_contacts = (isset($_GET['filter']) && !empty($_GET['filter'])) ? $_GET['filter'] : 'direct';
        $sortBy = (isset($_GET['sortBy']) && !empty($_GET['sortBy'])) ? $_GET['sortBy'] : 'FirstName';
        /* The list of contacts is filtered to obtain only the ids that will serve to identify the main contacts in the subcontacts */
        $main_contacts = $request->user()->contacts->map(function ($value, $key){
            return $value->id;
        })->toArray();

        foreach ($request->user()->contacts as $contact){
            if($filter_contacts === 'indirect')
                foreach ($contact->contacts as $subcontact){
                    /* If a subcontact is in the list of main contacts, push to the array is omitted */
                    if(!in_array($subcontact->id, $main_contacts))
                        $contacts->push([
                            'FirstName' => $subcontact->FirstName,
                            'LastName' => $subcontact->LastName,
                            'Email' => $subcontact->email,
                            'CountryCode' => $subcontact->CountryCode,
                            'CurrentBadge' => $subcontact->badge->name,
                        ]);
                }

            $contacts->push([
                'FirstName' => $contact->FirstName,
                'LastName' => $contact->LastName,
                'Email' => $contact->email,
                'CountryCode' => $contact->CountryCode,
                'CurrentBadge' => $contact->badge->name
            ]);
        }

        $response = [
            'result' => (bool)$contacts->count(),
            'number_contacts' => $contacts->count(),
            'filter' => $filter_contacts,
            'data' => $contacts->sortBy([$sortBy])
        ];
        return json_encode($response);
    }

    /**
     * Add random number of contacts to network
     *
     * @param  [string] email
     * @return array{result: boolean, message: string}[]
     */
    public function addRandomContacts(Request $request, $quantity){
        $professional_id = (int)$request->user()->id;
        /* Get the list of contacts where professional id is null on the network */
        $contacts = User::leftJoin('professional_network', function ($join){
            $join->on('users.id', '=', 'professional_network.contact_id');
        })->where(function ($query) use($professional_id){
            $query->whereNull('professional_id')->where('users.id', '!=', $professional_id);
        })->select(['users.id AS id'])->take($quantity)->get();
        $no_contacts_added = 0;
        foreach ($contacts as $contact){
            $status = ProfessionalNetwork::addToNetwork($professional_id, $contact->id);
            if($status)
                $no_contacts_added += 1;
        }

        $response = ['result' => true, 'message' => "$no_contacts_added contacts have been added to your network"];
        return json_encode($response);
    }
}
