<?php

$emailTemplate = '<h1>Your Email Title</h1><p>This is body of your Email</p>';

$api_key = 'YOUR-API-KEY-GET-FROM-POSTMARK';

$recipients = [
    'test1@test.com',
    'test2@test.com',
    'test3@test.com',
    'test4@test.com',
    'test5@test.com',
];

$email_to = implode(',', $recipients);
$email_from = 'no-reply@yourdomain.com';
$email_from_a = 'emailsender@yourdomain.com';
$subject = 'Subject Of Your Email';
$html_body = $emailTemplate;
$text_body = '';

// URL API Postmark
$url = 'https://api.postmarkapp.com/email';

$data = [
    'From' => $email_from,
    'Bcc' => $email_to,
    'To' => $email_from_a,
    'Subject' => $subject,
    'HtmlBody' => $html_body,
    'TextBody' => $text_body,
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/json',
    'Content-Type: application/json',
    'X-Postmark-Server-Token: ' . $api_key,
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($http_code == 200) {
    echo "Email sent successfully";
} else {
    echo "Error For Send Message : " . $response;
}

curl_close($ch);

?>
