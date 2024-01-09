<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/forms" method="post">
        @csrf

    @for ($i = 1 ; $i <= $count; $i++)

    <input type="text" name="name1{{$i}}" placeholder="Name{{$i}}"><br><br>
    <input type="number" name="price1{{$i}}" placeholder="Price{{$i}}"><br><br>
    <input type="number" name="quantity1{{$i}}" placeholder="Quantity{{$i}}"><br><br>

    <input type="text" name="name2" placeholder="Name"><br><br>
    <input type="number" name="price2" placeholder="Price"><br><br>
    <input type="number" name="quantity2" placeholder="Quantity"><br><br>

    <input type="submit" value="send" name="s1">
    </form>
</body>
</html>

