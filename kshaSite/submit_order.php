<?php
    $chooseFerti = $_POST['chooseFerti'];
    $quantity = $_POST['quantity'];
    $reason = $_POST['reason'];
    $upiname = $_POST['upiname'];
    $payment = $_POST['payment'];
    $international = $_POST['international'];
    $anyqs = $_POST['anyqs'];

    //Database connection
    $conn = new mysqli('sql207.infinityfree.com','if0_38525573','AryanKhilari01','if0_38525573_fertilizerOrderdb');
    if ($conn->connect_error) {
        die('Connection failed: '. $conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into ordersfert(chooseFerti, quantity, reason, upiname, payment, international, anyqs) values(?,?,?,?,?,?,?)");
        $stmt->bind_param("sisssss",$chooseFerti,$quantity,$reason,$upiname,$payment,$international,$anyqs);
        $stmt->execute();
        $stmt -> close();
        $conn -> close();
        header("Location: thank_you.html");
        exit();
    }
?>