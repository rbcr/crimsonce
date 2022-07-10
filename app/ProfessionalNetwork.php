<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessionalNetwork extends Model
{
    protected $table = 'professional_network';

    public static function addToNetwork($professional_id, $contact_id){
        $network_exists = ProfessionalNetwork::where('professional_id', $professional_id)->where('contact_id', $contact_id)->get()->count();
        if(!$network_exists){
            $new_network = new ProfessionalNetwork();
            $new_network->professional_id = $professional_id;
            $new_network->contact_id = $contact_id;
            $new_network->save();

            $professional_total_contacts = ProfessionalNetwork::where('professional_id', $professional_id)->select('id')->get()->count();
            $contact_total_contacts = ProfessionalNetwork::where('contact_id', $contact_id)->select('id')->get()->count();
            $professional_badge_id = Badge::getBadge($professional_total_contacts);
            $contact_badge_id = Badge::getBadge($contact_total_contacts);
            $new_network->professional->CurrentBadge = $professional_badge_id;
            $new_network->professional->save();
            $new_network->contact->CurrentBadge = $contact_badge_id;
            $new_network->contact->save();
            return true;
        } else
            return false;
    }

    public static function deleteToNetwork($professional_id, $contact_id){
        $network_contact = ProfessionalNetwork::where('professional_id', $professional_id)->where('contact_id', $contact_id)->get();
        if($network_contact->count()){
            $network_contact = $network_contact->first();

            $professional_total_contacts = ProfessionalNetwork::where('professional_id', $professional_id)->select('id')->get()->count();
            $contact_total_contacts = ProfessionalNetwork::where('contact_id', $contact_id)->select('id')->get()->count();
            $professional_badge_id = Badge::getBadge($professional_total_contacts - 1);
            $contact_badge_id = Badge::getBadge($contact_total_contacts - 1);
            $new_network->professional->CurrentBadge = $professional_badge_id;
            $new_network->professional->save();
            $new_network->contact->CurrentBadge = $contact_badge_id;
            $new_network->contact->save();

            $network_contact->delete();
            return true;
        } else
            return false;
    }

    public function professional(){
        return $this->belongsTo(
            User::class,
            'professional_id',
            'id'
        );
    }

    public function contact(){
        return $this->belongsTo(
            User::class,
            'contact_id',
            'id'
        );
    }
}
