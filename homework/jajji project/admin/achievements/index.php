<?php

$con = mysqli_connect("localhost", "root", "root", "jajji") or die("there is mistake");

$sql = "SELECT * FROM achievements";

$result = mysqli_query($con,$sql) or die(mysqli_error($con));

?>
<!--  -->
<main>
     <div class="table-data">
		<div class="order">
            <div class="head">
                <h3>Yutuqlar</h3>
                <button><a href="?page=achievements/create" style="border
                : 1px solid grey; border-radius: 5px; padding: 5px 15px; background-color: greenyellow; color: black">Add</a></button>
                <i class='bx bx-search' ></i>
                <i class='bx bx-filter' ></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                   <tr>
                        <?php
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?= $row["id"] ; ?></td>
                                <td><p><?= $row["name"] ; ?> </p></td>
                                <td><p><?= $row["photo"] ; ?> </p></td>
                                <td><p><?= $row["message"]; ?></p></td>
                                <td><p><?= $row["created_at"] ; ?> </p></td>

                                <td>
                                    <a class="btn btn-success" href""><ion-icon name="eye-outline"></ion-icon></ion-icon></a>
                                    <a class="btn btn-primary" href""><ion-icon name="create-outline"></ion-icon></ion-icon></a>
                                    <a class="btn btn-danger" href""><ion-icon name="trash-outline"></ion-icon></ion-icon></a>
                                </td>
                            </tr>
                        <?php } ?>
                   </tr>
                </tbody>
            </table>
        </div>
        
    </div>
</main>
		<!-- MAIN -->