<?php
// フォームから値が送信されてきた場合、if内の処理が実行される
if (isset($_POST["subject"]) && isset($_POST["message"])) {

    // 結果を表示するメッセージ
    $result_message = "";

    // 未入力項目あり
    if ($_POST["subject"] === "" || $_POST["message"] === "") {
        $result_message = "送信先か件名かメッセージが未入力です";
    }
    // 未入力項目なし
    else {
        // メール送信の処理

        mb_language("Japanese");        // 日本語に設定
        mb_internal_encoding("UTF-8");  // utf8に設定

        // 送信先と宛先の2つメルアドを用意する必要がある
        $from = "";                    // 送信元（このメルアドからメールを送る）
        $to = "";                      // 宛先
        $subject = $_POST["subject"];  // 件名
        $message = $_POST["message"];  // メッセージ
        // メールヘッダー
        $headers = "From: {$from}\nReply-To: {$from}\nContent-Type: text/plain;";

        // メールを送信
        $result = mb_send_mail(
            $to,       // 宛先
            $subject,  // 件名
            $message,  // 本文
            $headers   // メールヘッダ
        );

        if ($result) {
            $result_message ="送信完了";
        }
        else {
            $result_message ="送信失敗";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メール送信テスト</title>
</head>
<body>
    <form action="" method="post">
        <div>
            件名：<input type="text" name="subject">
        </div>
        <div>
            <textarea name="message" cols="60" rows="10"></textarea>
        </div>
        <input type="submit" value="送信">
    </form>
    <!-- メッセージ表示領域 -->
    <?php if (isset($result_message)): ?>
        <p><?=$result_message ?></p>
    <?php endif; ?>
</body>
</html>