<?php
include('partials-front/menu.php');

$conn = mysqli_connect('localhost', 'root', '', 'food-order');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<link rel="stylesheet" href="css/other.css">

<section class="banner">
    <h2>BOOK YOUR TABLE NOW</h2>
    <div class="card-container">
        <div class="card-img">
    
        </div>

        <div class="card-content">
            <h3>Reservation</h3>
            <?php
           
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                $day = $_POST['days'];
                $hour = $_POST['hours'];
                $fullName = $_POST['full_name'];
                $phoneNumber = $_POST['phone_number'];
                $persons = $_POST['persons'];

               
                $sql = "INSERT INTO tbl_book (day, hour, full_name, phone_number, persons) VALUES ('$day', '$hour', '$fullName', '$phoneNumber', '$persons')";

            
                echo $sql;

                if ($conn->query($sql) === TRUE) {
                    echo '<p class="success">Reservation successful. Thank you!</p>';
                } else {
                    echo '<p class="error">Error: ' . $conn->error . '</p>';
                }
            }
            ?>

            <form method="post" action="">
                <div class="form-row">
                    <select name="days">
                        <option value="day-select">Select Day</option>
                        <option value="Monday">Monday</option>
                        <option value="Monday">Tuesday</option>
                        <option value="Monday">Wednesday</option>
                        <option value="Monday">Thursay</option>
                        <option value="Monday">Friday</option>
                        <option value="Monday">Saturday</option>
                       
                        
                    </select>

                    <select name="hours">
                        <option value="hour-select">Select Time</option>
                        <option value="10:00">08:00 a.m</option>
                        <option value="10:00">10:00 a.m</option>
                        <option value="10:00">12:00 p.m</option>
                        <option value="10:00">02:00 p.m</option>
                        <option value="10:00">04:00 p.m</option>
                        <option value="10:00">06:00 p.m</option>
                        <option value="10:00">08:00 p.m</option>
                        
                    </select>
                </div>

                <div class="form-row">
                    <input type="text" name="full_name" placeholder="Full Name" required>
                    <input type="text" name="phone_number" placeholder="Phone Number" required>
                </div>

                <div class="form-row">
                    <input type="number" name="persons" placeholder="How Many Persons?" min="1" required>
                    <input type="submit" value="BOOK TABLE">
                </div>
            </form>
        </div>
    </div>
</section>
