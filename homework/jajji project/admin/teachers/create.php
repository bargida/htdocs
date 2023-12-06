<form action="" method="POST" style="margin-top: 60px; margin-left:280px;">
    <p style="margin-bottom: 10px;">Name:</p>
    <input type="text" name="fname" placeholder="John Doe" style="border
    : 2px solid grey; border-radius: 10px; padding: 10px 20px;"><br>

    <p>Profession</p>
    <input type="text" name="profession" placeholder="your profession" style="border
    : 2px solid grey; border-radius: 10px; padding: 10px 20px;"><br>

    <p>Status</p>
    <input type="text" name="status" placeholder="" style="border
    : 2px solid grey; border-radius: 10px; padding: 10px 20px;"><br><br>

    <p>Photo</p>
    <input type="file" name="photo" placeholder="Your photo" style="border
    : 2px solid grey; border-radius: 10px; padding: 10px 20px;"><br><br>

    <p>tglink</p>
    <input type="text" name="tg_link" placeholder="Your tgLink" style="border
    : 2px solid grey; border-radius: 10px; padding: 10px 20px;"><br><br>

    <p>fblink</p>
    <input type="text" name="fb_Link" placeholder="Your fbLink" style="border
    : 2px solid grey; border-radius: 10px; padding: 10px 20px;"><br><br>

    <p>Ins Link</p>
    <input type="text" name="ins_Link" placeholder="Your insLink" style="border
    : 2px solid grey; border-radius: 10px; padding: 10px 20px;"><br><br>

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

    if(isset($data['fname']) && isset($data['profession']) && isset($data['status']) && isset($data['photo']) && isset($data['tg_link']) && isset($data['fb_Link']) && isset($data['ins_Link'])){
        
        $fname = test_input($data["fname"]) ;
        $profession = test_input($data["profession"]) ;
        $status = test_input($data["status"]) ;
        $photo = test_input($data["photo"]) ;
        $tgLink = test_input($data["tg_link"]) ;
        $fbLink = test_input($data["fb_Link"]) ;
        $insLink = test_input($data["ins_Link"]) ;
    }


    if(isset($_POST['fname'])){
        $sql = "INSERT INTO teachers (fname, profession, status, photo, tgLink, fbLink, insLink) VALUES('$fname', '$profession', '$status',  '$photo', '$tgLink', '$fbLink', '$insLink')" ;

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