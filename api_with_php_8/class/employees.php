<?php 

class Employee{
    // connection
    private $con;

    // table
    private $table='Employee';

    // columns
    public $id;
    public $name;
    public $email;
    public $age;
    public $designation;
    public $created;

    // db coneection
    public function __construct($db)
    {
        $this->con=$db;
    }

    // get all Employee
    public function getEmployees(){
        $sqlQuery = "SELECT id, name, email, age, designation, created FROM " . $this->table . "";
        $stmt = $this->con->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

        // CREATE Employee
        public function createEmployee(){
            $sqlQuery = "INSERT INTO
                        ". $this->table ."
                    SET
                        name = :name, 
                        email = :email, 
                        age = :age, 
                        designation = :designation, 
                        created = :created";
        
            $stmt = $this->con->prepare($sqlQuery);
        
            // sanitize
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->age=htmlspecialchars(strip_tags($this->age));
            $this->designation=htmlspecialchars(strip_tags($this->designation));
            $this->created=htmlspecialchars(strip_tags($this->created));
        
            // bind data
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":age", $this->age);
            $stmt->bindParam(":designation", $this->designation);
            $stmt->bindParam(":created", $this->created);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

             // READ single
             public function getSingleEmployee(){
                $sqlQuery = "SELECT
                            id, 
                            name, 
                            email, 
                            age, 
                            designation, 
                            created
                          FROM
                            ". $this->table ."
                        WHERE 
                           id = ?
                        LIMIT 0,1";
    
                $stmt = $this->con->prepare($sqlQuery);
    
                $stmt->bindParam(1, $this->id);
    
                $stmt->execute();
    
                $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $this->name = $dataRow['name'];
                $this->email = $dataRow['email'];
                $this->age = $dataRow['age'];
                $this->designation = $dataRow['designation'];
                $this->created = $dataRow['created'];
            } 

                  // UPDATE
        public function updateEmployee(){
            $sqlQuery = "UPDATE
                        ". $this->table ."
                    SET
                        name = :name, 
                        email = :email, 
                        age = :age, 
                        designation = :designation, 
                        created = :created
                    WHERE 
                        id = :id";
        
            $stmt = $this->con->prepare($sqlQuery);
        
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->age=htmlspecialchars(strip_tags($this->age));
            $this->designation=htmlspecialchars(strip_tags($this->designation));
            $this->created=htmlspecialchars(strip_tags($this->created));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind data
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":age", $this->age);
            $stmt->bindParam(":designation", $this->designation);
            $stmt->bindParam(":created", $this->created);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

                // DELETE
                function deleteEmployee(){
                    $sqlQuery = "DELETE FROM " . $this->table . " WHERE id = ?";
                    $stmt = $this->con->prepare($sqlQuery);
                
                    $this->id=htmlspecialchars(strip_tags($this->id));
                
                    $stmt->bindParam(1, $this->id);
                
                    if($stmt->execute()){
                        return true;
                    }
                    return false;
                }
        
            


}