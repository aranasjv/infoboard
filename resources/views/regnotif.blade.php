<?php
/**
 * Created by PhpStorm.
 * User: Jv-PC
 * Date: 2/10/2019
 * Time: 6:18 PM
 */
        if(isset($_POST["Token"])){

            $token = $_POST["token"];

            $conn = mysqli_connect("13.251.35.233","forge","iaOyRQckgxILV23S8qWL","forge");

            $query = "INSERT INTO users(Token) Values ('$token') ON DUPLICATE KEY UPDATE Token = '$token' ; ";

            mysqli_query($conn,$query);

            mysqli_close($conn);


        }