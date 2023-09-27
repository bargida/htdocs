<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My first PHP code</title>
</head>
<body>
    <h2>FORM</h2><br>
    <form action="app.php" method="POST">
        <label for="fname"><b>Name: <b></label>
        <input type="text" name="fname">  <br><br>

        <label for="lname"><b>Surname: <b></label>
        <input type="text" name="lname"> <br><br>

        <label for="fullname" ><b>Otasining ismi: <b></label>
        <input type="text" name="fullname"> <br><br>

        <label for="birth"><b>Year: <b></label>
        <input type="number" name="birth">  <br><br>

        <label for="level">Choose your degree:</label>
        <select id="level" name="level">
            <option value="junior">junior</option>
            <option value="middle">middle</option>
            <option value="senior">senior</option>
        </select> <br><br>

        <label for="place"><b>Country: <b></label>
        <input type="text" name="place">  <br><br>

        <label for="city"><b>City: <b></label>
        <input type="text" name="city">  <br><br>
        
        <br><br>

        <label for="ism"><b>Name: <b></label>
        <input type="text" name="ism">  <br><br>

        <label for="familiya"><b>Surname: <b></label>
        <input type="text" name="familiya"> <br><br>

        <label for="otchestva"><b>Otasining ismi: <b></label>
        <input type="text" name="otchestva"> <br><br>

        <label for="year"><b>Year: <b></label>
        <input type="number" name="year">  <br><br>

        <label for="degree">Choose your degree:</label>
        <select id="degree" name="degree">
            <option value="bakalavr">bakalavr</option>
            <option value="magistr">magistr</option>
            <option value="dotsent">dotsent</option>
        </select> <br><br>

        <label for="mamlakat"><b>Country: <b></label>
        <input type="text" name="mamlakat">  <br><br>

        <label for="shahar"><b>City: <b></label>
        <input type="text" name="shahar">  <br><br>
        <br><br>

        <label for="name"><b>Name: <b></label>
        <input type="text" name="name">  <br><br>

        <label for="surname"><b>Surname: <b></label>
        <input type="text" name="surname"> <br><br>

        <label for="otasining_ismi"><b>Otasining ismi: <b></label>
        <input type="text" name="otasining_ismi"> <br><br>

        <label for="birth_date"><b>Year: <b></label>
        <input type="number" name="birth_date">  <br><br>

        <label>Choose your degree:</label>
        <select name="role">
            <option value="phd">Phd</option>
            <option value="content manager">Content Manager</option>
            <option value="project manager">Project manager</option>
        </select> <br><br>

        <label for="country"><b>Country: <b></label>
        <input type="text" name="country">  <br><br>

        <label for="city_place"><b>City: <b></label>
        <input type="text" name="city_place">  <br><br>

        <input class="btn" type="submit" name="s1" value="SEND">

    </form>

</body>
</html>