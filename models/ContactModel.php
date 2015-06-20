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
        return $contacts->get_result();
    }

    /**
    * @param int
    * @return array
    */
    public function getById($id, $userId)
    {
        $categories = $this->dbconn->prepare('SELECT id, name, phone, email, address FROM contacts WHERE id = ? AND userId = ?');
        $categories->bind_param('ss', $id, $userId);
        $categories->execute();
        return $categories->get_result()->fetch_assoc();
    }

    /**
     * @param int
     * @param int
     * @return array
     */
    public function details($id, $userId)
    {
        $contact = $this->dbconn->prepare('SELECT id, name, phone, email, address FROM contacts WHERE id = ? AND userId = ?');
        $contact->bind_param('ss', $id, $userId);
        $contact->execute();
        $contact = $contact->get_result()->fetch_assoc();
        $groups = $this->dbconn->prepare('SELECT g.id, g.name FROM groups as g LEFT JOIN `groups-contacts` as gc ON g.id=gc.groupId LEFT JOIN contacts as c ON gc.contactId=c.id WHERE c.id = ? ');
        $groups->bind_param('s', $id);
        $groups->execute();
        $groups=$groups->get_result();
        $availableGroups = $this->dbconn->prepare('SELECT g.id, g.name FROM groups as g WHERE g.userId = ? ');
        $availableGroups->bind_param('s', $userId);
        $availableGroups->execute();
        $availableGroups=$availableGroups->get_result();
        $fields = $this->dbconn->prepare('SELECT * FROM customfields WHERE contactId = ?');
        $fields->bind_param('s', $id);
        $fields->execute();
        $fields = $fields->get_result();
        return array('contact'=>$contact, 'groups'=>$groups, 'available'=>$availableGroups, 'fields'=>$fields);
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
        $id = mysqli_insert_id($this->dbconn);
        if(isset($contact['custom'])) {
            for($i = 0; $i < count($contact['custom'][0]); $i++) {
                $field = $this->dbconn->prepare('INSERT INTO customfields (field, `value`, contactId) VALUES (?,?,?)');
                $field->bind_param('sss', $contact['custom'][0][$i], $contact['custom'][1][$i],$id);
                $field->execute();
            }
        }
    }

    /**
     * @param int
     * @param object
     */
    public function edit($id, $contact)
    {
        $cat = $this->dbconn->prepare('UPDATE contacts SET `name`=?,`phone`=?,`email`=?,`address`=? WHERE id = ?');
        $cat->bind_param('sssss' ,$contact['name'] ,$contact['phone'] ,$contact['email'] ,$contact['address'], $id);
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

    /**
     * @param int
     * @param int
     */
    public function addToGroup($contacId, $groupID)
    {
        $add = $this->dbconn->prepare('INSERT INTO `groups-contacts` (groupId, contactId) VALUES (?, ?)');
        $add->bind_param('ss', $groupID, $contacId);
        $add->execute();
    }
}