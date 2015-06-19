<?php
namespace Models;

class UserModel extends HomeModel {

    public function __construct( $args = array() ) {
        parent::__construct( array(
            'table' => 'users'
        ) );
    }

    /**
     * @param $username
     * @param $password
     * @return bool
     */
    public function register($username, $password) {
        $statement = $this->dbconn->prepare( "SELECT id FROM users WHERE username = ? LIMIT 1" );
        $statement->bind_param('ss', $username );
        $statement->execute();
        $result_set = $statement->num_rows;
        if($result_set == 0){
            $statement = $this->dbconn->prepare( "INSERT INTO users (username, password) VALUES ( ?, ? )" );
            $statement->bind_param('ss', $username, md5($password ));
            $statement->execute();
            \Lib\Auth::get_instance()->login($username, $password );
            return true;
        } else {
            return false;
        }
    }
}