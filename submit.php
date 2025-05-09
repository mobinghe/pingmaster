<?php
$token = "توکن_ربات_اینجا";
$chat_id = "آیدی_تلگرام_ادمین";

$fullname = $_POST['fullname'];
$contact = $_POST['contact'];
$details = $_POST['details'];

$message = "💬 دریافت رسید پرداخت:\n";
$message .= "👤 نام: $fullname\n";
$message .= "📞 تماس: $contact\n";
$message .= "📝 جزئیات: $details";

$url = "https://api.telegram.org/bot$token/sendMessage";
$params = [
    'chat_id' => $chat_id,
    'text' => $message
];
$options = [
    'http' => [
        'method'  => 'POST',
        'header'  => "Content-type: application/x-www-form-urlencoded",
        'content' => http_build_query($params)
    ]
];
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

header("Location: thankyou.html");
exit();
?>
