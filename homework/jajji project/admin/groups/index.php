<?php


$con = mysqli_connect("localhost", "root", "root", "jajji") or die("there is some mistake");

$sql = "SELECT * FROM groups";

$result = mysqli_query($con, $sql)  or die(mysqli_error($con));;


?>

<main>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Guruhlar</h3>
                <i class='bx bx-search' ></i>
                <i class='bx bx-filter' ></i>
                <a class="create__btn" href="?page=groups/create"> <i class='bx bxs-folder-plus' style="border
                : 1px solid grey; border-radius: 5px; padding: 5px 10px; background-color: greenyellow; color: black"></i>Add</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Title</th>
                        <th>Age</th>
                        <th>Total seat </th>
                        <th>Time</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php
                        //var_dump(mysqli_fetch_assoc($result));
                            while ($row = mysqli_fetch_assoc($result)) { ?>
							<tr>
                                <td> <?= $row["id"] ; ?></td>
                                <td><p> <?= $row["Photo"] ; ?> </p></td>
                                <td><p> <?= $row["Title"] ; ?> </p></td>
                                <td><p> <?= $row["Age"] ?> </p></td>
                                <td><p> <?= $row["Total seat"] ; ?> </p></td>
                                <td><p> <?= $row["Time"] ; ?> </p></td>
                                <td><p> <?= $row["Price"] ; ?> </p></td>
                                <td><p> <?= $row["created_at"] ; ?> </p></td>

                                <td>
                                    <a class="btn btn-success" href="">
                                        <ion-icon name="eye-outline"></ion-icon>
                                        View
                                    </a>
                                    <a class="btn btn-primary" href="">
                                        <ion-icon name="create-outline"></ion-icon>
                                        Update
                                    </a>
                                    <a class="btn btn-danger" href="">
                                        <ion-icon name="trash-outline"></ion-icon>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
</main>