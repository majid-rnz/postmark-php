# PHP Email Sender Using Postmark API

This repository contains a PHP script that sends emails to multiple recipients using the **Postmark API**. The script is designed to send an email with both HTML and plain-text content, and it uses cURL to interact with the Postmark API.

---

## How It Works

1. **Email Template**: The script defines an HTML email template.
2. **Recipients List**: A list of recipient email addresses is provided.
3. **Postmark API Integration**: The script sends the email via the Postmark API using the provided API key.
4. **Error Handling**: The script checks the HTTP response code to determine whether the email was sent successfully.

---

### Code Snippet

```php
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
```
## Prerequisites

1. PHP Installed : Ensure you have PHP installed on your system.
2. Postmark Account : Sign up for a Postmark account and obtain your API key.
3. cURL Extension : Make sure the PHP cURL extension is enabled.
---
## Usage Instructions

1. Replace YOUR-API-KEY-GET-FROM-POSTMARK with your actual Postmark API key.
2. Update the $recipients array with the email addresses of your recipients.
3. Customize the $email_from, $email_from_a, and $subject variables as needed.
4. Run the script in your PHP environment.
---
## Response Codes
1. HTTP 200 : Email sent successfully.
2. Other Codes : Indicates an error. Check the $response variable for details.
---
---
# ارسال ایمیل با استفاده از Postmark API در PHP


این مخزن شامل اسکریپتی به زبان PHP است که برای ارسال ایمیل به چندین گیرنده با استفاده از Postmark API طراحی شده است. این اسکریپت قادر به ارسال ایمیل با محتوای HTML و متن ساده است و از cURL برای ارتباط با API Postmark استفاده می‌کند.

---
## نحوه عملکرد


قالب ایمیل : اسکریپت یک قالب ایمیل HTML تعریف می‌کند.
لیست گیرندگان : لیستی از آدرس‌های ایمیل گیرندگان ارائه می‌شود.
ارتباط با Postmark API : اسکریپت ایمیل را از طریق API Postmark با استفاده از کلید API ارسال می‌کند.
مدیریت خطاها : اسکریپت کد پاسخ HTTP را بررسی می‌کند تا مشخص کند آیا ایمیل با موفقیت ارسال شده است یا خیر.


---

## دستورالعمل استفاده

مقدار YOUR-API-KEY-GET-FROM-POSTMARK را با کلید API واقعی خود جایگزین کنید.
آرایه $recipients را با آدرس‌های ایمیل گیرندگان خود به‌روزرسانی کنید.
متغیرهای $email_from، $email_from_a و $subject را مطابق نیاز خود تغییر دهید.
اسکریپت را در محیط PHP خود اجرا کنید.

---
## کدهای پاسخ

ایمیل با موفقیت ارسال شده است : HTTP 200
سایر کدها : نشان‌دهنده خطا است. برای جزئیات بیشتر، متغیر $response را بررسی کنید.

---
---
# ارسال البريد الإلكتروني باستخدام Postmark API في PHP


يحتوي هذا المستودع على نص برمجي بلغة PHP يرسل رسائل بريد إلكتروني إلى عدة مستلمين باستخدام Postmark API . تم تصميم النص البرمجي لإرسال بريد إلكتروني بمحتوى HTML ونص عادي، ويستخدم cURL للتواصل مع واجهة برمجة التطبيقات (API) الخاصة بـ Postmark.

---
## كيفية العمل

قالب البريد الإلكتروني : يقوم البرنامج النصي بتعريف قالب بريد إلكتروني بتنسيق HTML.
قائمة المستلمين : يتم تقديم قائمة بعناوين البريد الإلكتروني للمستلمين.
تكامل Postmark API : يقوم البرنامج النصي بإرسال البريد الإلكتروني عبر واجهة برمجة تطبيقات Postmark باستخدام مفتاح API الخاص بك.
إدارة الأخطاء : يقوم البرنامج النصي بالتحقق من رمز الاستجابة HTTP لتحديد ما إذا كان البريد الإلكتروني قد تم إرساله بنجاح أم لا.

---
## تعليمات الاستخدام

استبدل YOUR-API-KEY-GET-FROM-POSTMARK بمفتاح API الخاص بك.
قم بتحديث المصفوفة $recipients بعناوين البريد الإلكتروني للمستلمين.
قم بتخصيص المتغيرات $email_from و$email_from_a و$subject حسب الحاجة.
قم بتشغيل البرنامج النصي في بيئة PHP الخاصة بك.

---
## أكواد الاستجابة

تم إرسال البريد الإلكتروني بنجاح. : HTTP 200
الأكواد الأخرى : تشير إلى وجود خطأ. تحقق من متغير $response للحصول على التفاصيل.
