<?php

class Model{
    public function  __construct()
    {
        $db = new DB_connection();
        $this->conn = $db->conn;
    }

    

    public function getDeals(){
        $data = null;
        $query = "SELECT d.id as deal_id, d.address, d.type, d.price, a.id as agent_id, a.name, a.image FROM deals d LEFT JOIN agent_deal ad ON d.id = ad.deal_id LEFT JOIN agent a ON a.agent_id = ad.agent_id GROUP BY d.id;";
        
        if($sql = $this->conn->query($query)){
            
            while($row =  mysqli_fetch_assoc($sql)){
                $data[] = $row;
            }
        }
        return $data;
    }

    public function insert(){
        if(isset($_POST['submit_deal'])){
            $agentNameId = mysqli_real_escape_string($this->conn, $_POST['agentName']);
            $address = mysqli_real_escape_string($this->conn, $_POST['address']);
            $typeDeal = mysqli_real_escape_string($this->conn, $_POST['typeDeal']);
            $price = mysqli_real_escape_string($this->conn, $_POST['price']);

            $getNextId = "SELECT Table_schema,Table_Name,Auto_increment
            FROM information_schema.TABLES
            WHERE TABLE_SCHEMA = 'remaxdeals'
            AND TABLE_NAME = 'deals';";
            //var_dump($getNextId);

            $query1 = "INSERT INTO `deals`( `address`, `type`, `price`, `agent_id`) VALUES ('$address','$typeDeal','$price', '$agentNameId')";
            $last_id = "SELECT id FROM `deals` order by id desc limit 1";
            
            $result = $this->conn->query($query1);
           
            //$result3 = $this->conn->query($getId );
            if($result){
                $lst = $this->conn->insert_id;
                $query2 = "INSERT INTO `agent_deal`(`agent_id`, `deal_id`) VALUES ('$agentNameId','$lst')";
                $result2 = $this->conn->query($query2);
                if($result2){
                    echo "<script>alert('You add deal successfuly!');</script>";
                    echo "<script> window.location.href = 'index.php' </script>";
                }else{
                    echo "<script>alert('Add deal failed!');</script>";
                    echo "<script> window.location.href = 'addNewDeal.php' </script>";
                }

            }else{
                echo "<script>alert('Add deal failed!');</script>";
                echo "<script> window.location.href = 'addNewDeal.php' </script>";

            }
            return $result;
        }
    }
}
?>