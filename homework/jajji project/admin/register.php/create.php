<form action="" method="POST" style="margin-top: 60px; margin-left:280px;">
    <p style="margin-bottom: 10px;">Name:</p>
    <input type="text" name="fname" placeholder="John Doe" style="border
    : 2px solid grey; border-radius: 10px; padding: 10px 20px;"><br>

    <p>Phone number</p>
    <input type="number" name="phone_number" placeholder="your number" style="border
    : 2px solid grey; border-radius: 10px; padding: 10px 20px;"><br>

    <?php 
        $con = mysqli_connect("localhost", "root", "root", "jajji") or die("Error")  ;

        $sql = "SELECT * FROM groups" ;
        
        $result = mysqli_query($con,$sql) or die(mysqli_error($con));

    ?>
    <strong> Groups :</strong>
        <select name="groups_id" class="form-control">

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

            <option value="<?= $row["id"]; ?>"><?= $row["name"]; ?></option>
            <?php } ?>

        </select><br><br>

    <input type="submit" name="submit" value="SEND" style="border
    : 2px solid grey; background-color: greenyellow; border-radius: 10px; padding: 10px 20px;"><br>

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

    if(isset($data['fname']) && isset($data['phone_number']) && isset($data['groups_id'])){
        
        $fname = test_input($data["fname"]) ;
        $phone_number = test_input($data["phone_number"]) ;
        $groups_id = test_input($data["groups_id"]) ;
        
    }


    if(isset($_POST['fname'])){
        $sql = "INSERT INTO register (fname, phone_number, , groups_id) VALUES('$fname', '$phone_number', '$groups_id')" ;

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