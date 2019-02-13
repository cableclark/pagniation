<?php

class Paginator 
{
    
    private $page;
    
    private $perPage;
    
    private $start;
    
    private $db;
    

    
    public function __construct ( int $page, int $perPage, PDO $db) {
        
        $this->page = isset($page)? $page : 1;
            
            1;

        $this->perPage =  isset($page) && $perPage <10 ? $perPage : 5;
        
        $this->db = $db;
        
        $this->getStart();
            
    }
    
    public function getStart () {
        
        $this->start = ($this->page>1) ? ($this->page * $this->perPage) - $this->perPage : 0; 
        
        return $this->start;
    }
    
    
    public function returnQuery () {
        
        
        $sql = "SELECT name, email 
        FROM upand.users 
        LIMIT $this->start, $this->perPage";
        
        
        $stmt= $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } 
    
    public function getTotalPages () {
        
        $stmt= $this->db->query("SELECT count(*) as res from upand.users");
        
        
        $total = $stmt->fetch();
        
        
        
        $res= $total['res'] / $this->perPage;
    
        return $res ;
    }
    
    
}

//isset($_GET['page']) ? (int) $_GET['page'] :  isset($_GET['per-page']) && $_GET['per-page'] < 10 ? (int) $_GET['per-page'] : 5; 

try {

$db = new PDO ("mysql:host=localhost;dbname=upand", "igor", "bigor");

} catch (PDOException $e) {
    
    echo $e;
}    

$paginator = new Paginator (4,12, $db);
    
    echo $paginator->getTotalPages();


var_dump ($paginator->returnQuery(
));

//echo $paginator->perPage;