<?php include('partials-front/menu.php'); ?>
<?php

if (isset($_POST["add-to-cart"])) {
}
?>
<?php
$query = "SELECT order.id, food.id as food_id, order.food, order.price, order.quantity, food.name_image FROM `order` inner join food on food.title = order.food order by order.id ASC; ";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
?>
        <div class="col-md-4">
            <form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?> ">
                <div style="border: 1px solid #333; background-color: #f1f1f1; "></div>
                <img src="<?php echo SiteURL; ?>images/food/<?php echo $row['name_image']; ?>" class="img-responsive" /></br>
                <h4 class="text-info"><?php echo $row['food']; ?></h4>
                <h4 class="text-danger">$ <?php echo $row['price']; ?></h4>
                <input type="text" name="quantity" class="form-control" value="1" />
                <input type="hidden" name="hidden-name" value="<?php echo $row['food']; ?>" />
                <input type="hidden" name="hidden-price" value="<?php echo $row['price']; ?>" />


            </form>

        </div>
<?php
    }
}
?>

<?php include('partials-front/footer.php'); ?>