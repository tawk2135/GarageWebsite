<?php

include 'foncSubscribe.php';

function login() {
    $pdo = connection();
    try {
        if (isset($_POST['login'])) {
            echo '<script>alert("test")</script>';
            global $user;
            $user = '';

            $user = ($_REQUEST['email']);

            $password = ($_REQUEST['password']);

            $passwordIn = crypt('0000', $password);

            $valide = true;

            $query = "select * from user where user.email=:email AND user.password=:password";

            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':email', $user);
            $stmt->bindParam(':password', $passwordIn);
            $stmt->execute();

            $count = $stmt->rowCount();
            if ($count > 0) {
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = $passwordIn;
                $_SESSION['count'] = 0;
                if ($_SESSION['email'] == 'shawn_barq@hotmail.com') {
                    echo "<script>window.location.assign('Administration.php');</script>";
                } else {
//                    $query1 = "SELECT a.firstname, a.lastname, a.vin,a.Adress, a.City, a.province, a.postalCode, a.phoneNumber,a.e_mail,b.carMake,b.carBrand,b.Year_model from client a INNER JOIN carowner b ON a.vin=b.Vin WHERE a.e_mail=:email";
//                    $stmt1=$pdo->prepare($query1);
//                    $stmt1->bindParam(':email', $_SESSION['email']);
//                    $stmt1->execute();
//                    if ($stmt1->num_rows > 0) {
//                        while ($row = $stmt1->fetch_assoc()) {
//                            
//                            $_SESSION['firstname'] = $row['firstname'];
//                            $_SESSION['lastname'] = $row['lastname'];
//                        }
//                    } else {
//                        echo 'error';
//                    }

                    $query1 = "SELECT a.firstname, a.lastname, a.vin,a.Adress, a.City, a.province, a.postalCode, a.phoneNumber,a.e_mail,b.carMake,b.carBrand,b.Year_model from client a INNER JOIN carowner b ON a.vin=b.Vin WHERE a.e_mail=:email";
                    $prep = $pdo->prepare($query1);
                    $email = $_SESSION['email'];
                    $prep->bindParam(':email', $email);
                    $prep->execute();
                    while ($row = $prep->fetch(PDO::FETCH_ASSOC)) {
                        if ($row['e_mail'] == $email) {

                            $_SESSION['firstname'] = $row['firstname'];
                            $_SESSION['lastname'] = $row['lastname'];
                            $_SESSION['vin'] = $row['vin'];
                            $_SESSION['adress'] = $row['Adress'];
                            $_SESSION['city'] = $row['City'];
                            $_SESSION['province'] = $row['province'];
                            $_SESSION['postalcode'] = $row['postalCode'];
                            $_SESSION['phonenumber'] = $row['phoneNumber'];
                            $_SESSION['carmake'] = $row['carMake'];
                            $_SESSION['carbrand'] = $row['carBrand'];
                            $_SESSION['yearmodel'] = $row['Year_model'];
                        } 
                    }

                    echo "<script>window.location.assign('MyAccount.php');</script>";
                }
            } else {
                $_SESSION['count'] += 1;
                echo '<script>alert("Vos données d\'acces sont erronées")</script>';

                if ($_SESSION['count'] > 2) {

                    echo "<script>window.location.assign('Myaccount.php');</script>";
                }
            }
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

//$con = mysql_connect("localhost","inmoti6_myuser","mypassword");
// 
//if (!$con)
//{
//  die('Could not connect: ' . mysql_error());
//}
// 
//mysql_select_db("inmoti6_mysite", $con);
//
//$article_id = $_GET['id'];
//
//if( ! is_numeric($article_id) )
//  die('invalid article id');
//
//$query = "SELECT * FROM `comments` WHERE `articleid` =$article_id LIMIT 0 , 30";
//
//$comments = mysql_query($query);
//
//echo "<h1>User Comments</h1>";
//
//// Please remember that  mysql_fetch_array has been deprecated in earlier
//// versions of PHP.  As of PHP 7.0, it has been replaced with mysqli_fetch_array.  
//
//while($row = mysql_fetch_array($comments, MYSQL_ASSOC))
//{
//  $name = $row['name'];
//  $email = $row['email'];
//  $website = $row['website'];
//  $comment = $row['comment'];
//  $timestamp = $row['timestamp'];
//  
//  // Be sure to take security precautions! Even though we asked the user
//  // for their "name", they could have typed anything. A hacker could have
//  // entered the following (or some variation) as their name:
//  //
//  // <script type="text/javascript">window.location = "https://SomeBadWebsite.com";</script>
//  //
//  // If instead of printing their name, "John Smith", we would be printing
//  // javascript code that redirects users to a malicious website! To prevent
//  // this from happening, we can use the <a href="https://php.net/htmlspecialchars" target="_blank">htmlspecialchars function</a> to convert
//  // special characters to their HTML entities. In the above example, it would
//  // instead print:
//  //
//  // <span style="color:red;"><</span>script type=<span style="color:red;">"</span>text/javascript<span style="color:red;">"></span>window.location = <span style="color:red;">"</span>https://SomeBadWebsite.com<span style="color:red;">"</span>;<span style="color:red;"><</span>/script<span style="color:red;">></span>
//  //
//  // This certainly would look strange on the page, but it would not be harmful
//  // to visitors
//  
//  $name = htmlspecialchars($row['name'],ENT_QUOTES);
//  $email = htmlspecialchars($row['email'],ENT_QUOTES);
//  $website = htmlspecialchars($row['website'],ENT_QUOTES);
//  $comment = htmlspecialchars($row['comment'],ENT_QUOTES);
//  
//  echo "  <div style='margin:30px 0px;'>
//      Name: $name<br />
//      Email: $email<br />
//      Website: $website<br />
//      Comment: $comment<br />
//      Timestamp: $timestamp
//    </div>
//  ";
//}
//
//mysql_close($con);
?>


