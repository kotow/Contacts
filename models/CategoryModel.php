<?php
/**
 * Created by PhpStorm.
 * User: kotow-PC
 * Date: 6/19/2015
 * Time: 12:16 PM
 */

namespace Models;


class CategoryModel extends HomeModel {

    public function __construct( $args = array() ) {
        parent::__construct( array(
            'table' => 'categories'
        ) );
    }

    public function get() {
        $user = \Lib\Auth::get_instance()->get_logged_user();
        $userId = $user['user_id'];
        $categories = $this->dbconn->prepare('SELECT id, name FROM groups WHERE userId = ?');
        $categories->bind_param('s', $userId);
        $categories->execute();
        return $categories->get_result()->fetch_all();
    }

    public function getContacts($id) {
        $categories = $this->dbconn->prepare('SELECT c.id, c.name, c.phone, c.email, c.address FROM groups as g LEFT JOIN `groups-contacts` as gc ON g.id = gc.groupId LEFT JOIN contacts as c on gc.contactId = c.id WHERE g.id = ?');
        $categories->bind_param('s', $id);
        $categories->execute();
        return $categories->get_result()->fetch_all();
    }

    public function add($name) {
        $user = \Lib\Auth::get_instance()->get_logged_user();
        $userId = $user['user_id'];

        $cat = $this->dbconn->prepare('INSERT INTO groups (name, userId) VALUES(?,?)');
        $cat->bind_param('ss', $name, $userId);
        $cat->execute();
    }
}