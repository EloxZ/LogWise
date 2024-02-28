# LogWise
Small Website to send logs.

```php
// Example

const API_URL = "https://logwise.fly.dev/api/logs";
const API_KEY = "th1s1s4h4rdp4ssw0rd";
const TOKEN = "MyApp";
const SENDER = "hello.myapp.com";

$headers = array(
    'Content-Type: application/json',
    'api-key: '.self::API_KEY
);

$body = array(
    "message" => $message,
    "sender" => $sender,
    "label" => $label,
    "context" => $context,
    "token" => self::TOKEN,
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, self::API_URL);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

curl_exec($ch);
curl_close($ch);
```

https://logwise.fly.dev/?token=MyApp
