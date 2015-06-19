<?php
/**
 * Created by PhpStorm.
 * User: kotow-PC
 * Date: 6/19/2015
 * Time: 12:16 PM
 */

namespace Models;


class ContactModel extends HomeModel {

    public function __construct( $args = array() ) {
        parent::__construct( array(
            'table' => 'contacts'
        ) );
    }

    public function getContacts() {
        $user = \Lib\Auth::get_instance()->get_logged_user();
        $userId = $user['user_id'];
        $contacts = $this->dbconn->prepare('SELECT id, name, phone, email, address FROM contacts WHERE userId = ?');
        $contacts->bind_param('s', $userId);
        $contacts->execute();
        return $contacts->get_result()->fetch_all();
    }
}