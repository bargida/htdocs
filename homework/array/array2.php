<?php

$persons = [
    [
        'id' => 1,
        "name" => "Azizbek", 
        "surname" => "Jo'rayev", 
        "age" => 19, 
        "region" => "Fargona",
    ],

    [
        'id' => 2,
        "name" => "Xurshidbek", 
        "surname" => "Mo'minov", 
        "age" => 27, 
        "region" => "Andijan",
    ],

    [
        'id' => 3,
        "name" => "Javoxir", 
        "surname" => "Odilbekov", 
        "age" => 19, 
        "region" => "Toshkent",
    ],

    [
        'id' => 4,
        "name" => "Moxira", 
        "surname" => "Mirzakariyeva", 
        "age" => 17, 
        "region" => "Toshkent",
    ],
] ;


?>

<form action="">
    <select name="region" id="">
        <?php foreach($persons as $person){?>
            <option value="<?php echo $person["region"] ; ?>"><?php echo $person["region"] ;?></option>
        <?php } ?>
    </select>
    <input type="submit" name="s1">
</form>

<?php

if(isset($_GET["s1"]))
{
    $region = $_GET["region"] ;
    
    foreach($persons as $person){
        if($person["region"] == $region)
        {
            echo $person["name"]. "<br>" ;
        }
    }
}