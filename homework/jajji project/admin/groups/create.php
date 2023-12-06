<main>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Add new group:</h3>
                <a class="create__btn" href="" style="border
                : 2px solid grey; border-radius: 5px; padding: 5px 10px; background-color: lightblue; color: black"><i class='bx bx-arrow-back'></i>Back</a>

            </div>

            <form class="" action="" method="POST">
            
                <strong> Photo :</strong>
                <input  type="text" name="photo" class="form-control" style="border
                : 2px solid grey; border-radius: 10px; padding: 10px 10px; "> <br><br>

                <strong> Title :</strong>
                <input type="text" name="title" class="form-control" style="border
                : 2px solid grey; border-radius: 10px; padding: 10px 73px; "> <br><br>

                <strong> Age :</strong>
                <input type="number" name="age" class="form-control" style="border
                : 2px solid grey; border-radius: 10px; padding: 10px 70px; "> <br><br>

                <strong> Total seat :</strong>
                <input type="number" name="total_seat" class="form-control" style="border
                : 2px solid grey; border-radius: 10px; padding: 10px 45px; "> <br><br>

                <strong> Time :</strong>
                <input type="date" name="time" class="form-control" style="border
                : 2px solid grey; border-radius: 10px; padding: 10px 60px; "> <br><br>

                <strong> Price :</strong>
                <input type="number" name="price" class="form-control" style="border
                : 2px solid grey; border-radius: 10px; padding: 10px 60px; "> <br><br>


                <input type="submit" name="submit" value="SEND" class="form-control" style="border
                : 2px solid grey; border-radius: 10px; padding: 10px 50px; background-color: greenyellow; color: black"> <br>

            </form>
        </div>
    </div>
</main>
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
    if(isset($data['photo']) && isset($data['title']) && isset($data['age']) && isset($data['total_seat']) && isset($data['time']) && isset($data['price'])){
        $photo = test_input($data["photo"]) ;
        $title = test_input($data["title"]) ;
        $age = test_input($data["age"]) ;
        $total_seat = test_input($data["total_seat"]) ;
        $time = test_input($data["time"]) ;
        $price = test_input($data["price"]) ;
        
    }


    if(isset($_POST['title'])){
        $sql = "INSERT INTO groups (Photo, Title, Age, Total_seat, timedate, Price) VALUES('$photo', '$title', '$age',  '$total_seat', '$time', '$price')" ;

        $result = mysqli_query($conn, $sql);
       
        if($result){
            echo"Succesfully done";
        }else{
            var_dump($result);
            var_dump($sql);
            echo "Error";
        }
    }
    
}

?>

   