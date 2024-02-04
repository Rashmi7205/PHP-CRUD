<?php
class User
{
    private $dbname = "test";
    private $username = "root";
    private $password = "";
    private $hostname = "localhost";

    public static $user_data = false;

    public $conn = false;
    public function __construct()
    {
        if (!$this->conn) {
            $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
            if ($this->conn->connect_error) {
                die("Something Went wrong: " . $this->conn->connect_error);
            }
        }
    }

    public function showMessage($message)
    {
        echo "
        <script>
            window.alert('{$message}');
        </script>
    ";
    }
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
    public function register($username, $password, $cpassword, $email)
    {
        if (!$username || !$password || !$cpassword || !$email) {
            $this->showMessage("All fields are mandatory!");
            exit(1);
        }
        if ($password != $cpassword) {
            $this->showMessage("Both password and confirm password should same!");
            exit(1);
        }
        $sql = "INSERT INTO user (username,password,email) VALUES ('$username','$password','$email');";

        $res = $this->conn->query($sql);
        if ($res) {
            $this->showMessage("user registerd successfully");
            return true;
        } else {
            $this->showMessage("Error in Creating account!");
            return false;
        }
    }

    //get user profile info
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

    public function __destruct()
    {
        if (isset($this->conn)) {
            $this->conn->close();
        }
    }
}
?>