<?php
class User{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "test";

    private $conn = null;
    // create connection with db
   function __construct(){
        try {
            if(!$this->conn){
                $this->conn = new mysqli($this->host,$this->username,$this->password,$this->database) or die("Something went wrong"); 
            }
        } catch (Throwable $th) {
            echo $th->getMessage();
        }
    }

    // function for message 
    public function showMessage($message)
    {
        echo "
        <script>
            window.alert('{$message}');
        </script>
    ";
    }

    // function for sign in
    public function login($email, $password)
    {
        if (empty($email) || empty($password)) {
            $this->showMessage("All fields are mandatory!");
            exit(1);
        }
        if ($this->conn) {
            $res = $this->conn->query("SELECT * FROM  user WHERE email='$email';");
            if ($res->num_rows > 0) {
                $row = $res->fetch_assoc();
                echo $row['password'] . "->" . $password;
                if ($row['password'] == $password) {
                    $this->showMessage("User loggedin successfully");
                    $cookie_name = "user_info";
                    $cookie_value = $row['id'] . "#" . $row['email'] . "#" . $row['username'];
                    setcookie($cookie_name, $cookie_value, time() + 60 * 24 * 60 * 1, '/');
                    return $row;
                } else {
                    $this->showMessage('Invalid Credentials!');
                    exit(1);
                }

            } else {
                $this->showMessage("This user doesnot exist");
                exit(1);
            }
        }
    }

    // function for the sign up
    public function signup ($username,$password,$email,$image,$age,$country,$sal,$phone,$gender){

        if(empty($username) || empty($password) || empty($email) || empty($image) || empty($age) || empty($country) || empty($sal) || empty($phone) || empty($gender)){
            $this->showMessage("All fields are mandatory!");
            return false;
        }

        if($this->conn){
            $sql = "INSERT INTO user (username,password,email,image,age,country,phone,gender,sal) VALUES ('$username','$password','$email','$image','$age','$country','$phone','$gender','$sal') ";
            
            $res = $this->conn->query($sql);    
            if($res){
                $this->showMessage("Record inserted successfully!");
                return true;
            }
            else{
                $this->showMessage("Cannot insert record");
                return false;
            }
        }
        else{
            $this->showMessage("Cannot insert record");
        }
    }

    // function for the get user Data
    public function get_profile()
    {
        if (isset($_COOKIE['user_info'])) {
            $values = explode("#", $_COOKIE['user_info']);
            User::$user_data = $values;
            return $values[2];
        } else {
            header('Location: http://localhost/phplect/crud/login.php');
        }
    }

    //function for upadtion 
    function update_user(){

    }


    // function for delete user 
    function delete_user(){
    
    }

    // function  for the data fetching
    function fetchData($sql){

    }
    // function for the signout
    function sign_out(){

    }
    // Close connection
    function __destruct(){
        if($this->conn){
            $this->conn->close();
        }
    }
}
?>