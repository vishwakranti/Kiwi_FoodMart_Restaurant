<?php include('partials/menu.php') ?>

<!-- Main Content Section Starts -->
<div class="main-content">
	<div class="container">
		<div class="row g-0 m-5">
			<br><br>

			<?php
            if (isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
			<br><br>

			<div class="col-md-6 col-sm-6 col-lg-6 text-center">
				<div class="card text-bg-light mb-3 m-5">
					<div class="card-header">Categories</div>
					<div class="card-body">

						<?php
                            //Sql Query 
                            $sql = "SELECT * FROM category";
                            //Execute Query
                            $res = mysqli_query($conn, $sql);
                            //Count Rows
                            $count = mysqli_num_rows($res);
                        ?>
						<h5 class="card-title">
							<?php echo $count; ?>
						</h5>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-lg-6 text-center">
				<div class="card text-bg-light mb-3 m-5">
					<div class="card-header">Foods</div>
					<div class="card-body">
						<?php
                //Sql Query 
                $sql2 = "SELECT * FROM food";
                //Execute Query
                $res2 = mysqli_query($conn, $sql2);
                //Count Rows
                $count2 = mysqli_num_rows($res2);
                ?>

						<h5 class="card-title">
							<?php echo $count2; ?>
						</h5>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-lg-6 text-center">
				<div class="card text-bg-light mb-3 m-5">
					<div class="card-header">Total Orders</div>
					<div class="card-body">
						<?php
                //Sql Query 
                $sql3 = "SELECT * FROM `order`";
                //Execute Query
                $res3 = mysqli_query($conn, $sql3);
                //Count Rows
                $count3 = mysqli_num_rows($res3);
                ?>

						<h5 class="card-title">
							<?php echo $count3; ?>
						</h5>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-lg-6 text-center">
				<div class="card text-bg-light mb-3 m-5">
					<div class="card-header">Revenue Generated</div>
					<div class="card-body">
						<?php
                //Creat SQL Query to Get Total Revenue Generated
                //Aggregate Function in SQL
                $sql4 = "SELECT SUM(total) AS Total FROM `order` WHERE status='ordered' group by total";

                //Execute the Query
                $res4 = mysqli_query($conn, $sql4);

                //Get the VAlue
                $row4 = mysqli_fetch_assoc($res4);

                //GEt the Total REvenue
                $total_revenue = $row4['Total'];

                ?>

						<h5 class="card-title">
							<?php echo $total_revenue; ?>
						</h5>
					</div>
				</div>
			</div>

			<div class="clearfix"></div>

		</div>
	</div>
</div>
<!-- Main Content Setion Ends -->

<?php include('partials/footer.php'); 