<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New client</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    
</head>
<body>
    <div class="conatainer my-5">
        <h2>New client</h2>
        <?php
        if(empty($errormessage)){
            echo "<div class='alert warning alert-dismissible fade show'>".$errormessage."</div>";
        
        }
        ?>
        <form method="post">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Id</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" name="id" value="<?php echo $id?>">
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">name</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" name="name" value="<?php echo $name?>">
        </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">phone</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="phone" value="<?php echo $phone?>">
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">ADDRESS</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="address" value="<?php echo $address?>">
            </div>


            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>

                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/clients/index.php" role="button">cancel</a>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>