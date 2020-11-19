
<?php

function connection() {
    global $conn;
    global $hn;
    $hn = 'localhost';
    global $un;
    $un = 'root';
    global $pw;
    $pw = "";
    global $db;
    $db = 'shawngarage';
    global $conn;
    $strconnection = 'mysql:host=' . $hn . ';dbname=' . $db;
    $pdo = new PDO($strconnection, $un, $pw);

    return $pdo;
}
//Ajouter un client
function addClient() {
    $pdo = connection();
    global $email;
    global $firstname;
    global $lastname;
    global $adress;
    global $password;
    global $city;
    global $province;
    global $vin;
    global $postalcode;
    global $telephone;
    global $valfirstname;
    $valfirstname = FALSE;
    global $vallastname;
    $vallastname = FALSE;
    global $valadress;
    $valadress = FALSE;
    $valvin = FALSE;
    global $valcity;
    $valcity = FALSE;
    $validform = FALSE;
    try {

        if ($_REQUEST) {
            //validation regex 
            //if(preg_match ("/^(?:([A-HJ-NPR-Z]){3}|\d{3})(?1){2}\d{2}(?:(?1)|\d)(?:\d|X)(?:(?1)+\d+|\d+(?1)+)\d{6}$/i", $_REQUEST['vin']))
            if (isset($_POST['vin'])) {

                $query1 = 'select * from carowner where vin=:vin ';
                $prep = $pdo->prepare($query1);
                $vin = $_REQUEST['vin'];
                $prep->bindParam(':vin', $vin);
                $prep->execute();


                while ($row = $prep->fetch(PDO::FETCH_ASSOC)) {
                    if ($row['vin'] == $vin) {

                        echo '<script>alert("This car is already part of our database please make sure the vin number is the right one")</script>';
                        break;
                    } else {

                        $valvin = TRUE;
                    }
                }
            }
            if (preg_match("/^([a-zA-Z' ]+)$/", $_REQUEST['firstname'])) {

                $firstname = ucfirst($_POST['firstname']);
                $valfirstname = TRUE;
            } else {
                echo'<script>alert("Invalid Firstname")</script>';
                return;
            }
            if (preg_match("/^([a-zA-Z' ]+)$/", $_REQUEST['lastname'])) {

                $lastname = ucfirst($_POST['lastname']);
                $vallastname = TRUE;
            } else {
                echo'<script>alert("Invalid Lastname")</script>';
                return;
            }
//            if (preg_match("/^([a-zA-Z' ]+)$/", $_POST['city'])) {
//
//                $city = ucfirst($_POST['city']);
//                $valcity = TRUE;
//            } else {
//                echo'<script>alert("Invalid city")</script>';
//                return;
//            }
            if (preg_match("^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$^", $_POST['Tel'])) {
                global $validetel;
                $validetel = true;

                $telephone = $_POST['Tel'];
            } else {
                echo '<script>alert("Invalid phone number")</script>';
            }
            if (preg_match('/^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/', $_REQUEST['postalcode'])) {

                global $postalcode;
                $postalcode = $_REQUEST['postalcode'];
                global $valideCode;
                $valideCode = true;
            } else {
                echo '<script>alert("Postal Code invalid")</script>';
            }
//            if(preg_match("\d{1,5}\s\w.\s(\b\w*\b\s){1,2}\w*\.", $_POST['adress']))
//            {
//                $adress=$_POST['adress'];
//                $valadress=true;
//            }
//            else
//            {
//                echo '<script>alert("Invalid adress")</script>';
//            }
            if ($valfirstname && $vallastname && $valideCode ) {
                $city = ucfirst($_POST['city']);
                $province = 'Qc';
                $adress = $_POST['adress'];
                $telephone = $_POST['Tel'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $idClient = '';
                $mysql = "INSERT INTO `client`(`idClient`, `vin`, `e_mail`, `firstname`, `lastname`, `Adress`, `City`, `province`, `postalCode`, `phoneNumber`) VALUES (:idClient,:vin,:email,:firstname,:lastname,:adress,:city,:province,:postalcode,:phonenumber)";
                $stmt = $pdo->prepare($mysql);
                $stmt->bindParam(':idClient', $idClient);
                $stmt->bindParam(':vin', $vin);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':firstname', $firstname);
                $stmt->bindParam(':lastname', $lastname);
                $stmt->bindParam(':adress', $adress);
                $stmt->bindParam(':city', $city);
                $stmt->bindParam(':province', $province);
                $stmt->bindParam(':postalcode', $postalcode);
                $stmt->bindParam(':phonenumber', $telephone);
                
                $_SESSION['email']=$email;
                $_SESSION['vin'] = $vin;
                $stmt->execute();

                $validform = true;
                if ($validform) {
                    //Ajouter le nom d'utilisateur et le mot de passe
                    //$query = "INSERT INTO user (NumAssMaladie,username,password,position)VALUES(:numassmal,:utilisateur,:motdepasse,:Parent)";
                    $query1 = "INSERT INTO `user`(`position`, `email`, `password`) VALUES (:position,:email,:password)";
                    $stmt = $pdo->prepare($query1);
                    $position = "admin";
                    $stmt->bindParam(':position', $position);
                    $stmt->bindParam(':email', $email);


                    $password_hash = crypt('0000', $password);
                    $stmt->bindParam(':password', $password_hash);
                    $stmt->execute();
                    echo "<script>window.location.assign('carForm.php');</script>";
                }
            } else {
                echo '<script>alert("Please verify your entries")</script>';
            }
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function datefix() {
    for ($x = date("Y") - 30; $x <= date("Y") + 1; $x += 1) {
        echo "<option>$x</option>";
    }
}

function citypick() {
    $city = array("St-Lambert", "Longueuil", "St-Hubert", "Greenfield Park", "Boucherville", "Brossard", "Carignan", "Chambly");
    sort($city);
    $x = 0;
    while ($x < count($city)) {
        echo "<option>$city[$x]</option>";
        $x++;
    }
}

function getCarBrand() {
    if (isset($_POST['brand'])) {
        echo '<option>' . $_POST['brand'] . '</option>';
    } else {
        $valide = FALSE;
        $pdo = connection();
        try {
            $query = "SELECT DISTINCT BrandName FROM `cars` ";
            $pdoQuery = $pdo->query($query);
            if ($pdoQuery) {
                while ($row = $pdoQuery->fetch(PDO::FETCH_OBJ))
                    echo "<option>$row->BrandName</option>";
            } else {
                echo '<script>alert("aucune auto disponible")</script>';
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}

function getCarMake() {
    if ($_REQUEST['search'])
        echo '<p>Hello<p>';
    if (isset($_POST['brand'])) {
        $pdo = connection();
        //$query='Select Make from cars where cars.brandname=:name';
        $query = 'call ps_getmake(:name)';
        $name = $_POST['brand'];
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':name', $name);

        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
            echo "<option>$row->Make</option>";
        }
    }
}

function disappear() {
    if (!(isset($_SESSION['vin']) || (isset($_POST['brand'])))) {
        echo 'hidden';
    } else {
        echo'';
    }
}

function hidden() {

    try {
        if (isset($_SESSION['vin']) && ($_SESSION['vin'])) {
            echo'hidden';
        } else {
            echo"";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function hidden2() {

    try {
        if (isset($_SESSION['vin']) && (isset($_POST['brand']))) {
            echo'hidden';
        } else {
            echo"";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function hidden3() {

    try {
        if (!(isset($_SESSION['vin']) && (isset($_POST['brand'])))) {
            echo'hidden';
        } else {
            echo"";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}
function addClientCar()
{    
    global $email;
    global $vin;
    global $carmake, $carmodel, $yearmodel;
    $pdo= connection();
    if(isset($_REQUEST['submit']))
    {
        if(isset($_POST['brand']) && (isset($_POST['carmake']) && isset($_POST['Annee'])))
        {
            $email=$_SESSION['email'];
            $carmake=$_POST['carmake'];
            $carmodel=$_POST['brand'];
            $vin=$_SESSION['vin'];
            $yearmodel=$_POST['Annee'];
            
            $query="INSERT INTO `carowner`(`Email`, `Vin`, `carMake`, `carBrand`, `Year_model`) VALUES (:email,:vin,:carmake,:carbrand,:yearmodel)";
            $stmt = $pdo->prepare($query);
             $stmt->bindParam(':email', $email);
                $stmt->bindParam(':vin', $vin);
                $stmt->bindParam(':yearmodel',$yearmodel);
                $stmt->bindParam(':carmake', $carmake);
                $stmt->bindParam(':carbrand', $carmodel);
                $stmt->execute();
                echo "<script>window.location.assign('Login.php');</script>";
        }
    }       
}
?>