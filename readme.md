# 講義用メール送信プログラム

 - お問い合わせフォームを想定
 - XAMPP、sendmailからのメール送信用

## 設定

### ```contact.php```の設定

Gmailのアプリパスワードを設定する。  
右上のアイコン → Googleアカウントを管理 → セキュリティ（2段階認証を設定しなければアプリパスワードを利用できないので、していなければ設定する）  
アプリパスワードが設定時に見つからなければ設定の検索欄で「アプリパスワード」と検索すると表示される。

```php
$from = "";  // 送信元（このメルアドからメールを送る）
$to = "";      // 宛先
```

### ```/c/xampp/php/php.ini```の設定

```ini
[mail function]
SMTP=localhost
smtp_port=25
sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"
mail.add_x_header=Off
```

### ```/c/xampp/sendmail/sendmail.ini```の設定

```ini
[sendmail]
smtp_server=smtp.gmail.com  ; GmailのSMTPサーバに変更
smtp_port=587  ; 25を587に変更
smtp_ssl=auto  ; 修正不要
auth_username=ここに自分のメールアドレスを記述
auth_password=ここに送信元メールアドレスのアプリパスワードを記述
force_sender=ここにauth_usernameと同じメールアドレスを記述
```

## 送信失敗と表示された場合

```C:/xampp/sendmail/error.log```を確認

```24/01/31 22:59:00 : Socket Error # 11001<EOL>Host not found.```のように```Host not found```と出力されていた場合、```sendmail.ini```を再度確認する```smtp_server=smtp.gmail.com``` ← この個所をタイポしている可能性が高い

※修正した場合XAMPP再起動すること

## 参考

[【2023年版】XAMPPでGmailを送信する方法](https://codeforfun.jp/how-to-send-gmail-with-xampp/)
