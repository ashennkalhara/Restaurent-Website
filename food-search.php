<?php include('partials-front/menu.php'); ?>

    <section class="food-search text-center">
        <div class="container">

            <?php
                $search = isset($_POST['search']) ? $_POST['search'] : '';
            ?>
            
            <h2>Foods on Your Search <a href="#" class="text-white"><?php echo $search; ?></a></h2>

        </div>
    </section>

    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
                
                $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>
                            <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php 
                                if($image_name=="")
                                {
                                    echo "Image not availbe";
                                }
                                else
                                {
                                    ?>
                                        <img src="<?php echo SITEURL ?>images/food/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
                                    <?php
                                    
                                }
                                ?>
                                 
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title; ?></h4>
                            <p class="food-price">Rs.<?php echo $price; ?></p>
                            <p class="food-detail"><?php echo $description; ?></p>
                            <br>

                    <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>
                        <?php

                    }
                }
                else
                {
                    echo "Food not found";
                }

            ?>

            <div class="clearfix"></div>

        </div>

    </section>
 
    <?php include('partials-front/footer.php'); ?>