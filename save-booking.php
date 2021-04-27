<?php
session_start();
include_once "./config/utils.php";

$customer_name = trim($_POST['customer_name']);
$phone_number = trim($_POST['phone_number']);
$email = trim($_POST['email']);
$arrival = trim($_POST['arrival']);
$departure = trim($_POST['departure']);
$children = trim($_POST['children']);
$adult = trim($_POST['adult']);
$room_types = trim($_POST['room_types']);
$messages = trim($_POST['messages']);
$rooms = trim($_POST['rooms']);
$beds = trim($_POST['beds']);
$price = trim($_POST['price']);

$insertBookingQuery = "insert into booking (customer_name, phone_number, email, arrival, departure,
                        children, adult, room_types, messages, status, rooms, beds, price)
                    value ('$customer_name', '$phone_number', '$email', '$arrival', '$departure',
                '$children', '$adult', '$room_types', '$messages', 0, '$rooms', '$beds', '$price')";
queryExecute($insertBookingQuery, false);

// unset session
unset($_SESSION[BOOK]);

header("location: " . BASE_URL . "index.php?msg=Chúc mừng bạn đã đặt phòng thành công");
die;
