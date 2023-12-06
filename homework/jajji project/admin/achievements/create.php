<form action="" method="POST" style="margin-top: 40px; margin-left:60px;">
    <p>Name:</p>
    <input type="text" name="fname" placeholder="John Doe"><br>
    <p>Photo</p>
    <input type="text" name="photo" placeholder="Name of the photo"><br>
    <p>Message</p>
    <input type="text" name="message" placeholder="You can write smth here.."><br><br>

    <input type="submit" name="submit" value="SEND">

</form>
<?php
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST["submit"]))
{
    $conn = mysqli_connect("localhost", "root","root","jajji");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $data = $_POST;
    if(isset($data['fname']) && isset($data['photo']) && isset($data['message'])){
        $fname = test_input($data["fname"]) ;
        $photo = test_input($data["photo"]) ;
        $message = test_input($data["message"]) ;
    }


    if(isset($_POST['message'])){
        $sql = "INSERT INTO achievements(name, photo, message) VALUES('$fname', '$photo','$message')" ;

        $result = mysqli_query($conn, $sql);
       
        if($result){
            echo"Muvaffaqqiyatli";
        }else{
            var_dump($result);
            var_dump($sql);
            echo "Xato";
        }
    }
    
}

?>

