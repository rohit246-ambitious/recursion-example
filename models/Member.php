<?php 

class Member{

    private $db;

    public function __construct(){
        
        $this->db = new PDO('mysql:host='. DB_HOST .';dbname=' . DB_NAME , DB_USER, DB_PASS);
                
    }
                
    public function getMembers(){
                    
        $members_data = $this->db->query('select * from members');
        return $members_data->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertMember($name, $parentId) {
        $stmt = $this->db->prepare('INSERT INTO members (name, created_date, parent_id) VALUES (:name, NOW(), :parent_id)');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':parent_id', $parentId);
        return $stmt->execute();
    }
}

?>