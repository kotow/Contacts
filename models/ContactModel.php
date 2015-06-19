<?php
namespace Models;

class ContactModel extends HomeModel
{
    public function __construct( $args = array() )
    {
        parent::__construct( array(
            'table' => 'contacts'
        ) );
    }

    /**
     * @param $userId
     * @return object
     */
    public function getContacts($userId)
    {
        $contacts = $this->dbconn->prepare('SELECT id, name, phone, email, address FROM contacts WHERE userId = ?');
        $contacts->bind_param('s', $userId);
        $contacts->execute();
        return $contacts->get_result()->fetch_all();
    }

    /**
    * @param int
    * @return array
    */
    public function getById($id)
    {
        $categories = $this->dbconn->prepare('SELECT id, name, phone, email, address FROM contacts WHERE id = ?');
        $categories->bind_param('s', $id);
        $categories->execute();
        return $categories->get_result()->fetch_assoc();
    }

    /**
     * @param object
     * @param int
     * @return void
     */
    public function add($contact, $userId)
    {
        $cat = $this->dbconn->prepare('INSERT INTO contacts (name, phone, email, address, userId) VALUES(?,?,?,?,?)');
        $cat->bind_param('sssss' ,$contact['name'] ,$contact['phone'] ,$contact['email'] ,$contact['address'], $userId);
        $cat->execute();
    }

    /**
     * @param int
     * @param string
     */
    public function edit($id, $name)
    {
        $cat = $this->dbconn->prepare('UPDATE contacts SET name = ? WHERE id = ?');
        $cat->bind_param('ss', $name, $id);
        $cat->execute();
    }

    /**
     * @param int
     * @return void
     */
    public function delete($id)
    {
        var_dump($id);
        $cat = $this->dbconn->prepare('DELETE FROM contacts WHERE id = ?');
        $cat->bind_param('s', $id);
        $cat->execute();
    }
}