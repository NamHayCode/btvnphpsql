<?php 
    $dbh = mysqli_connect('localhost','root','');
    if (!$dbh) {
        die("Unable to connect to MySQL: " );
    }
    
    if (!mysqli_select_db($dbh, 'ngay1')) {
        die("Unable to select database: " . mysqli_error($dbh));
    }
    
    $sql_stmt = "SELECT * FROM my_contacts";
    $result = mysqli_query($dbh, $sql_stmt);
    
    if (!$result) {
        die("Database access failed: " . mysqli_error($dbh));
    }
    
    $rows = mysqli_num_rows($result);
    
    if ($rows) {
        while ($row = mysqli_fetch_array($result)) {
            echo 'ID:' . $row['id'] . '<br>';
            echo 'Full Names:' . $row['full_names'] . '<br>';
            echo 'Gender:' . $row['gender'] . '<br>';
            echo 'Contact No:' . $row['contact_no'] . '<br>';
            echo 'Email:' . $row['email'] . '<br>';
            echo 'City:' . $row['city'] . '<br>';
            echo 'Country:' . $row['country'] . '<br>';
        }
    }
?>
