<form action="" method="POST" style="margin-top: 60px; margin-left:280px;">

    <p style="margin-bottom: 10px;">Name:</p>
    <input type="text" name="name" placeholder="Enter your name" style="border
    : 2px solid grey; border-radius: 10px; padding: 10px 20px;"><br><br>

    <p>Year</p>
    <input type="date" name="year" placeholder="year" style="border
    : 2px solid grey; border-radius: 10px; padding: 10px 20px;"><br><br>

    <p>Price</p>
    <input type="date" name="year" placeholder="year" style="border
    : 2px solid grey; border-radius: 10px; padding: 10px 20px;"><br><br>
<?php 
    $con = mysqli_connect("localhost", "root", "root", "computer_store") or die("Error")  ;

    $sql = "SELECT * FROM brand" ;
     
    $result = mysqli_query($con,$sql) or die(mysqli_error($con));

?>
   <strong> Brand :</strong>
        <select name="brand_id" class="form-control">

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

            <option value="<?= $row["id"]; ?>"><?= $row["name"]; ?></option>
            <?php } ?>

        </select><br><br>

    <input type="submit" name="submit" value="SEND" style="border
    : 2px solid grey; background-color: greenyellow; border-radius: 10px; padding: 10px 20px;"><br>

</form>

<?php


if(isset($_POST["submit"]))
{
   
    $con = mysqli_connect("localhost", "root","root","computer_store");
        $name = $POST["name"];
        $year = $POST["year"];
        $brand_id = $POST["brand_id"];
   
        $sql = "INSERT INTO models (name, year, brand_id) VALUES('{$name}', '{$year}', '{$brand_id}')";

        $result = mysqli_query($con, $sql);
   
    if($result)
        echo "Success";
    else
        echo "Error";
    
}
if(isset($_POST["name"])){
        $con = mysqli_connect("localhost", "root","root","computer_store");
        $brand_id = $POST["brand_id"];
        $price = $POST["price"];
        $model_id = $POST["model_id"];
   
        $sql = "INSERT INTO models (name, year, brand_id) VALUES('{$brand_id}', '{$price}', '{$model_id}')";

}

?> 
<form action="" method="post">
    <strong>Name</strong>
    <input type="text" name="fname" placeholder="Enter your name"><br><br>

    <strong>Last name</strong>
    <input type="text" name="lname" placeholder="Enter your last name"><br><br>

    <strong>Date of birth</strong>
    <input type="text" name="lname" placeholder="Enter your last name"><br><br>



</form>