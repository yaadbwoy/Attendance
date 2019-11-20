<?php
    class crud{
        private $db;
        function __construct($conn){
            $this->db = $conn; 
            
        }
        public function insertAttendees($fname, $lname, $dob, $email, $contact, $specialty){
            try {
                $sql = "INSERT INTO `attendee`(`FirstName`, `LastName`, `DateofBirth`, `Contact`, `Email`, `specialty_id`)
                        VALUES (:fname,:lname,:dob,:contact,:email,:specialty_id)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':specialty_id',$specialty);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function getAttendees(){
            try{
                $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
           
        }
        public function getSpecialties(){
            try{
                $sql = "SELECT * FROM `specialties`";
                $result = $this->db->query($sql);
                return $result; 
                
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }
        public function getAttendeeDetails($id){
            try{
                $sql = "select * from attendee a inner join specialties s on a.specialty_id = s.specialty_id 
                where attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }
        public function editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty){
            try{
                $sql = "UPDATE `attendee` SET `FirstName`=:fname,`LastName`=:lname, `DateofBirth`=:dob,
            `Email`=:email,`Contact`=:contact,`specialty_id`=:specialty WHERE :id";

                        $stmt = $this->db->prepare($sql);
                        $stmt->bindparam(':id',$id);
                        $stmt->bindparam(':fname',$fname);
                        $stmt->bindparam(':lname',$lname);
                        $stmt->bindparam(':dob',$dob);
                        $stmt->bindparam(':email',$email);
                        $stmt->bindparam(':contact',$contact);
                        $stmt->bindparam(':specialty',$specialty);
    
                        $stmt->execute();
                        return true;
    
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function deleteAttendee($id){
            try{
                $sql = "DELETE FROM `attendee` WHERE attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }
        public function getSpecialtyById($id){
            try{
                $sql = "SELECT * FROM `specialties` where specialty_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result; 
                
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }
    }
?>