<?php
require 'config/database.php'; require 'includes/functions.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: repair-services.php'); exit; }
$fields = ['name','phone','email','device','brand','service','booking_date','booking_time','location','problem'];
$data=[]; foreach($fields as $f) $data[$f]=trim($_POST[$f] ?? '');
$errors=[];
if($data['name']==='' || $data['phone']==='' || $data['device']==='' || $data['service']==='' || $data['booking_date']==='' || $data['location']==='' || $data['problem']==='') $errors[]='Please complete all required fields.';
if($data['email']!=='' && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) $errors[]='Please enter a valid email address.';
if($data['booking_date'] < date('Y-m-d')) $errors[]='Please choose today or a future date.';
if($errors){ site_header('Booking Error'); echo '<section class="section container"><div class="notice error">'.e(implode(' ',$errors)).'</div><a class="btn" href="repair-services.php#booking">Go back</a></section>'; site_footer(); exit; }
$stmt=$pdo->prepare("INSERT INTO repair_bookings (customer_name,phone,email,device,brand,service,booking_date,booking_time,location,problem) VALUES (?,?,?,?,?,?,?,?,?,?)");
$stmt->execute([$data['name'],$data['phone'],$data['email'],$data['device'],$data['brand'],$data['service'],$data['booking_date'],$data['booking_time'],$data['location'],$data['problem']]);
site_header('Booking Received');
echo '<section class="section container"><div class="notice">Thank you, '.e($data['name']).'. Your repair request has been received. New Official TV will contact you to confirm the appointment.</div><p>Booking reference: <strong>#'.(int)$pdo->lastInsertId().'</strong></p><a class="btn" href="repair-services.php">Back to repair services</a></section>';
site_footer();
