<main>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Add new group:</h3>
                <a class="create__btn" href="" style="border
                : 2px solid grey; border-radius: 5px; padding: 5px 10px; background-color: lightblue; color: black"><i class='bx bx-arrow-back'></i>Back</a>
            </div>

            <form class="" action="" method="POST">
            
                <strong>Role :</strong>
                <input  type="text" name="role" class="form-control" style="border
                : 2px solid grey; border-radius: 10px; padding: 10px 10px; "> <br><br>

                <strong>Name :</strong>
                <input type="text" name="fname" class="form-control" style="border
                : 2px solid grey; border-radius: 10px; padding: 10px 73px; "> <br><br>

                <strong>Username :</strong>
                <input type="text" name="username" class="form-control" style="border
                : 2px solid grey; border-radius: 10px; padding: 10px 70px; "> <br><br>

                <strong>Password :</strong>
                <input type="password" name="password" class="form-control" style="border
                : 2px solid grey; border-radius: 10px; padding: 10px 45px; "> <br><br>

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
    if(isset($data['role']) && isset($data['fname']) && isset($data['username']) && isset($data['password'])){
        $role = test_input($data["role"]) ;
        $fname = test_input($data["fname"]) ;
        $username = test_input($data["username"]) ;
        $password = test_input($data["password"]) ;
        
    }
    if(isset($_POST['title'])){
        $sql = "INSERT INTO users (role, fname, username, password) VALUES('$role', '$fname', '$username',  '$password')" ;

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
