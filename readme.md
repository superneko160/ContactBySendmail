# 講義用メール送信プログラム

 - お問い合わせフォームを想定
 - Mailpitを利用

## 設定

### `contact.php` の設定

今回はMailpitを利用するので送信元も宛先も適当ダミーのアドレスで良い

```php
$from = "";  // 送信元（このメルアドからメールを送る）
$to = "";      // 宛先
```

### `/c/laragon/bin/php/php-x.x.x/php.ini` の設定

```ini
[mail function]
SMTP=localhost
smtp_port=25
sendmail_path = "C:/laragon/bin/mailpit/mailpit.exe sendmail"
mail.add_x_header=Off
```

### Mailpit

- [Mailpit](http://localhost:8025)

