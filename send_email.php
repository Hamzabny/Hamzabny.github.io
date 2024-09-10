<?php
header('Content-Type: application/json');

// Get the raw POST data and decode it
$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(['success' => false, 'message' => 'No data received']);
    exit();
}

// Extract form data
$name = $data['name'];
$email = $data['email'];
$phone = $data['phone'];
$cartDetails = $data['cartDetails'];
$totalPrice = $data['totalPrice'];

// Create email content
$to = 'benyouneshamza7@gmail.com';
$subject = 'New Order from ' . $name;
$message = "Name: $name\nEmail: $email\nPhone: $phone\n\nCart Details:\n$cartDetails\n\nTotal Price: $totalPrice";
$headers = "From: $email";

// Send email
if (mail($to, $subject, $message, $headers)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?>
