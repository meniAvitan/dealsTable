<?php

class ProfileModel{

    // public $fileName;
    // public $fileTmpName;
    public function  __construct()
    {
        $db = new DB_connection();
        $this->conn = $db->conn;
    }

    public function getAgent(){
        $data = null;
        $query = "SELECT `id`, `name`, `image` FROM `agent`";
        
        if($sql = $this->conn->query($query)){
            
            while($row =  mysqli_fetch_assoc($sql)){
                $data[] = $row;
            }
        }

        return $data;
    }

    public function insert(){
        if(isset($_POST['submit_agent'])){
            $agentName = mysqli_real_escape_string($this->conn, $_POST['agentNmae']);
            $agentId = mysqli_real_escape_string($this->conn, $_POST['agentId']);
            $fileName = $_FILES['image']['name'];
            $fileTmpName = $_FILES['image']['tmp_name'];
            $fileSize = $_FILES['image']['size'];
            $fileError = $_FILES['image']['error'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'jpeg', 'png');

            if(in_array($fileActualExt, $allowed)){
                if($fileError === 0){
                    if($fileSize < 12500000){
                        $fileNameNew = uniqid('', true).".".$fileActualExt;
                        $fileDestination = 'uploads/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        $image_db  = $fileNameNew;
                        
                    }else{
                        echo "Error! to big file";
                    }
                }else{
                    echo "Error uploading you file";
                }
            }
            else{
                echo "You cen't allow to upload this file";
            }

            $query = "INSERT INTO `agent`( `name`, `image`, `agent_id`) VALUES ('$agentName','$image_db', $agentId)";
            $result = $this->conn->query($query);
            if($result){
                
                echo "<script>alert('You add deal successfuly!');</script>";
                echo "<script> window.location.href = 'profile.php' </script>";
            }else{
                echo "<script>alert('Add deal failed!');</script>";
                echo "<script> window.location.href = 'addNewAgent.php' </script>";
            }
            return $result;
        }
    }

    public function update($data){
        $this->fileName = $_FILES['image']['name'];
        $this->fileTmpName = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['image']['size'];
        $fileError = $_FILES['image']['error'];

        $fileExt = explode('.', $this->fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 12500000){
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($this->fileTmpName, $fileDestination);
                    $image_db  = $fileNameNew;
                    
                }else{
                    echo "Error! to big file";
                }
            }else{
                echo "Error uploading you file";
            }
        }
        else{
            echo "You cen't allow to upload this file";
        }
        $query = "UPDATE `agent` SET `name`='$data[name]',`image`='$image_db' WHERE `id`= $data[id]";
        $result = $this->conn->query($query);
        if($result) {
            return true;
        }else{
            return false;
        }
    }

    public function editAgent($id){
        $data = null;
        $query = "SELECT `id`, `name`, `image` FROM `agent` WHERE id = $id";
        
        if($sql = $this->conn->query($query)){
            
            while($row =  mysqli_fetch_assoc($sql)){
                $data = $row;
            }
        }
        return $data;
    }

    public function deleteAgent($id){
        $query = "DELETE FROM `agent` WHERE id = $id";
        if ($sql = $this->conn->query($query)) {
            return true;
        }else{
            return false;
        }
    }
}
?>