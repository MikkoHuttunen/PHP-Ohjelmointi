<?php
    function connect() {
        $connection = mysqli_connect("localhost", "root", "", "Harjoitus9")
            or die("Yhdistäminen ei onnistunut" . mysqli_error($connection));
        
        return $connection;
        $connection -> close();
    }

    function search_field($field, $table, $conn) {
        $query = "SELECT $field FROM $table WHERE id=1";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo $row[$field];
            }
        } else {
            echo "0 results";
        }
    }

    function update_field($field, $table, $data, $conn) {
        $query = "UPDATE $table SET $field='$data' WHERE id=1";
        $result = $conn->query($query);
    }
?>