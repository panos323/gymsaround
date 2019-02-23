<?php

use DrewM\MailChimp\MailChimp;

function mailchimp($attrs){
    try {
        $list_id = 'e70736b12e';
        $mailChimp = new MailChimp('5c19c95c15f9361ed82bdf5185be9381-us20');
        $result = $mailChimp->post("lists/$list_id/members", [
            'email_address' => $attrs['email'],
            'merge_fields' => ['FNAME' => $attrs['first_name'], 'LNAME' => $attrs['last_name']],
            'status' => 'subscribed'
        ]);
        return $result;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}