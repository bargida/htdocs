
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./style.css">
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>My first PHP code</title>
</head>
<body>
    <!-- <h2>FORM</h2><br>
    <div class="main">
        
    </div> -->
    <div class="conatainer my-5">
        <h1>List clients</h1>
        <a href="create.php" class="btn btn-primary">New client</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $server="localhost";
                $username="root";
                $password="root";
                $db="clients";

                $conn=new mysqli($server,$username,$password,$db);

                if($conn->connect_error)
                {
                    die("connection failed".$conn->connect_error);

                }
                $sql="select * from users";
                $result=$conn->query($sql);

                if(!$result)
                {
                    die("Invalid query".$conn->connect_error);
                }

                while($row=$result->fetch_assoc())
                {
                    echo"
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[phone]</td>
                        <td>$row[address]</td>
                        <td>
                            <a class='btn btn-primary bn-sm' href='/login/edit.php?id=$row[id]'>Edit</a>
                            <a class='btn btn-danger bn-sm' href='/login/delete.php?id=$row[id]'>Delete</a>
                        </td>
                    </tr>   ";
                    
                }
                    
                ?>
            </tbody>

        </table>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    

</body>
</html>