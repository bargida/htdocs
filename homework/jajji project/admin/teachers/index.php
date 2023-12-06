<?php

$con = mysqli_connect("localhost", "root", "root", "jajji") or die("Error")  ;

$sql = "SELECT * FROM teachers";

$result = mysqli_query($con,$sql) or die(mysqli_error($con));

?>

<main>
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>O'qituvchilar</h3>
                        <button><a href="?page=teachers/create" style="border
                        : 1px solid grey; border-radius: 5px; padding: 5px 15px; background-color: greenyellow; color: black">Add</a></button>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Profession</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>tgLink</th>
                                <th>fbLink</th>
                                <th>insLink</th>
                                <th>Created_at</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
                            <?php
                        //    var_dump(mysqli_fetch_assoc($result));
                            while ($row = mysqli_fetch_assoc($result)) { ?>
							<tr>
                                <td> <?= $row["id"] ; ?></td>
                                <td><p> <?= $row["fname"] ; ?> </p></td>
                                <td><p> <?= $row["profession"] ; ?> </p></td>
                                <td><p> <?= $row["status"]==1 ? "Rahbariyat" : "Oddiy" ; ?> </p></td>
                                <td><p> <?= $row["photo"] ; ?> </p></td>
                                <td><p> <?= $row["tgLink"] ; ?> </p></td>
                                <td><p> <?= $row["fbLink"] ; ?> </p></td>
                                <td><p> <?= $row["insLink"] ; ?> </p></td>
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
						</tbody>
					</table>
				</div>
				
			</div>
		</main>
		<!-- MAIN -->