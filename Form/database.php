<!-- NAME:DAXIL PATEL -->
<!-- STUDENT ID:200520270 -->
<!-- creating database -->
<?php
class database
{
  // adding SQL server
    public $servername = "172.31.22.43";
    public $username = "Daxil200520270";
    public $password = "xKdtjPVJY5";
    public $database = "Daxil200520270";
    public $con;

    // creating connections

    public function __construct()
    {
        $this->con = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if (mysqli_connect_error()) {
            trigger_error("Failed to connect:" . mysqli_connect_error());
        } else {
            return $this->con;
        }
    }

    // the below is the function to insert data from Home page
    public function insertData($post)
    {
        $firname = $this->con->real_escape_string($_POST['FirstName']);
        $lasname  = $this->con->real_escape_string($_POST['LastName']);
        $email  = $this->con->real_escape_string($_POST['Email']);
        $passw  = $this->con->real_escape_string($_POST['Passwrd']);
        $prof  = $this->con->real_escape_string($_POST['Profession']);
        $bio  = $this->con->real_escape_string($_POST['Bio']);
        $query = "INSERT INTO dAtA(FirstName,LastName,Email,Passwrd,Profession,Bio) VALUES ('$firname ','$lasname ','$email ','$passw ','$prof ','$bio')";
        $sql = $this->con->query($query);
        if ($sql == true) {
          // to show message on header if successfully data inserted.
          header("Location:view.php?msg1=insert");

        } else {
          // error if there is something wrong in the code
            echo "Cant add your profile";
            // echo to display the error
        }
    }

    //This will fetch all the data from From Sql  (or READ)
    public function displayData()
    {
        $query = "SELECT * FROM dAtA LIMIT 1";
        // using limit 1 to only load 1 inserted data.
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
            }
        else {
          ?>
          <div class="addprofile">


          <?php  echo "no profile found!"; ?>
              </div>
              <?php
        }
    }
    // update and read
  public function displayRecordByID($ID){

  $query = "SELECT * FROM dAtA WHERE ID = '$ID' LIMIT 1";
  $result = $this->con->query($query);
  if($result->num_rows > 0){
    $row = $result->fetch_assoc();

  }
  else{
    echo "No profile found !!";
  }
  }
  //Creating update function
  public function updateRecord($postData){
  $firname = $this->con->real_escape_string($_POST['uFirstName']);
  $lasname  = $this->con->real_escape_string($_POST['uLastName']);
  $email = $this->con->real_escape_string($_POST['uEmail']);
  $passw  = $this->con->real_escape_string($_POST['uPasswrd']);
  $prof  = $this->con->real_escape_string($_POST['uProfession']);

  $bio  = $this->con->real_escape_string($_POST['uBio']);
  $ID = $this->con->real_escape_string($_POST['ID']);
  if (!empty($ID) && !empty($postData)) {
   $query = "UPDATE dAtA SET FirstName = '$firname ', LastName = '$lasname ', Email = '$email ', Passwrd = '$passw ', Profession = '$prof ', Bio = '$bio ' WHERE ID = '$ID' LIMIT  1  ";
   $sql = $this->con->query($query);
   if($sql == true){
     // to show message on header if successfully updated data that were inserted in the edit page

  header("Location:view.php?msg2=update");
   }
   else{
     // error if there is something wrong in the code
     echo "Could not update your profile";
   }
  }
  }
  //Creating Delete function
  public function deleteRecord($ID){
  $query = "DELETE FROM dAtA WHERE ID = '$ID'";
  $sql = $this->con->query($query);
  if($sql == true){
    // to show message on header if successfully deleted data that was inserted
    header("Location:view.php?msg3=delete");
  }
  else {
    // error if there is something wrong in the code
    echo "Could not delete your profile";
       }
  }
}

?>
<!-- end of code -->
