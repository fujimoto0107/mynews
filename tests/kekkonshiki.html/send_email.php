<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $address = $_POST["address"];
  $contact = $_POST["contact"];
  $date = $_POST["date"];

 
  $to = "independenceday742000@yahoo.co.jp"; 
  $subject = "結婚式のお問い合わせ";
  $message = "お名前: " . $name . "\n"
            . "ご住所: " . $address . "\n"
            . "連絡先番号: " . $contact . "\n"
            . "式のご予定日: " . $date;
  $headers = "From: https://fujimotomyapp.mydns.jp/kekkonshiki/contact.html"; 

  if (mail($to, $subject, $message, $headers)) {
    echo "メールを送信しました。お問い合わせいただきありがとうございます！";
  } else {
    echo "メールの送信に失敗しました。お手数ですが、後ほど再度お試しください。";
  }
}
?>