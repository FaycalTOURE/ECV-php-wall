<?php


class UserManager
{
    private $db;
    private $current_table_name = 'user';

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function addUser(UserClass $user)
    {
        $q = $this->db->prepare('INSERT INTO ' . $this->current_table_name . '(id, firstname, email, lastname, password) VALUES(:id, :firstname, :email, :lastname, :password)');

        $q->bindValue(':id', $user->getID());
        $q->bindValue(':firstname', $user->getFirstname());
        $q->bindValue(':lastname', $user->getLastname());
        $q->bindValue(':email', $user->getEmail());
        $q->bindValue(':password', $user->getPassword());


        $q->execute();

        $user->hydrate([
            'id' => $this->db->lastInsertId()
        ]);
    }

    public function countUser()
    {
        return $this->db->query('SELECT COUNT(*) FROM ' .$this->current_table_name)->fetchColumn();
    }

    public function getUser($email){
        $q = $this->db->prepare('SELECT * FROM ' . $this->current_table_name . ' WHERE email = :email');
        $q->execute([':email' => $email]);
        return $q->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser(UserClass $user)
    {
        $q = $this->db->prepare('UPDATE '.$this->current_table_name.' SET id = :id, firstname = :firstname, lastname = :lastname, password = :password WHERE id = :id');

        $q->bindValue(':id', $user->getID());
        $q->bindValue(':firstname', $user->getFirstname());
        $q->bindValue(':lastname', $user->getLastname());
        $q->bindValue(':password', $user->getPassword());

        $q->execute();
    }

    public function deleteUser(UserClass $user)
    {
        $this->db->exec('DELETE FROM ' .$this->current_table_name. ' WHERE id = '.$user->getID());
    }
}