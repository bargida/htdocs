<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">AdminHub</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="home.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="?page=groups/index">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Guruhlar</span>
				</a>
			</li>
            <li>
				<a href="?page=teachers/index">
					<i class='bx bxs-group' ></i>
					<span class="text">O'qituvchilar</span>
				</a>
			</li>
			<li>
				<a href="?page=achievments/index">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Yutuqlar</span>
				</a>
			</li>
			<li>
				<a href="?page=gallery/index">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Galereya</span>
				</a>
			</li>
		<?php 	
			if($_SESSION["role"] == 1 ){
				echo "<li>
				<a href='?page=users'>
				<i class='fa-solid fa-plus'></i>
				<span class='text'>Admin qo'shish</span>
				</a>
				</li>";
			} 

		?>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="?page=logout" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>