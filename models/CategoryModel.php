<?php
namespace Models;

class CategoryModel extends HomeModel
{
    public function __construct( $args = array() )
    {
        parent::__construct( array(
            'table' => 'categories'
        ) );
    }

    /**
     * @param int
     * @return array
     */
    public function get($userId)
    {
        $categories = $this->dbconn->prepare('SELECT id, name FROM groups WHERE userId = ?');
        $categories->bind_param('s', $userId);
        $categories->execute();
        return $categories->get_result()->fetch_all();
    }

    /**
    * @param int
    * @return array
    */
    public function getById($id)
    {
        $categories = $this->dbconn->prepare('SELECT id, name FROM groups WHERE id = ?');
        $categories->bind_param('s', $id);
        $categories->execute();
        return $categories->get_result()->fetch_assoc();
    }

    /**
     * @param int
     * @return object
     */
    public function getContacts($id)
    {
        $categories = $this->dbconn->prepare('SELECT c.id, c.name, c.phone, c.email, c.address FROM groups as g LEFT JOIN `groups-contacts` as gc ON g.id = gc.groupId LEFT JOIN contacts as c on gc.contactId = c.id WHERE g.id = ?');
        $categories->bind_param('s', $id);
        $categories->execute();
        return $categories->get_result();
    }

    /**
     * @param string
     * @param int
     * @return void
     */
    public function add($name, $userId)
    {
        $cat = $this->dbconn->prepare('INSERT INTO groups (name, userId) VALUES(?,?)');
        $cat->bind_param('ss', $name, $userId);
        $cat->execute();
    }

    /**
     * @param int
     * @param string
     */
    public function edit($id, $name)
    {
        $cat = $this->dbconn->prepare('UPDATE groups SET name = ? WHERE id = ?');
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
        $cat = $this->dbconn->prepare('DELETE FROM groups WHERE id = ?');
        $cat->bind_param('s', $id);
        $cat->execute();
    }
}