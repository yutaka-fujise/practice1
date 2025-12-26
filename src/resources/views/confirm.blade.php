<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>

<body>
    <header class="header">
        <h1 class="logo">FashionablyLate</h1>
    </header>

    <main class="container">
        <h2 class="title">Confirm</h2>

        <div class="confirm-table">
            <div class="row">
                <div class="label">お名前</div>
                <div class="value">山田 太郎</div>
            </div>

            <div class="row">
                <div class="label">性別</div>
                <div class="value">男性</div>
            </div>

            <div class="row">
                <div class="label">メールアドレス</div>
                <div class="value">test@example.com</div>
            </div>

            <div class="row">
                <div class="label">電話番号</div>
                <div class="value">08012345678</div>
            </div>

            <div class="row">
                <div class="label">住所</div>
                <div class="value">東京都渋谷区千駄ヶ谷1-2-3</div>
            </div>

            <div class="row">
                <div class="label">建物名</div>
                <div class="value">千駄ヶ谷マンション101</div>
            </div>

            <div class="row">
                <div class="label">お問い合わせの種類</div>
                <div class="value">商品の交換について</div>
            </div>

            <div class="row">
                <div class="label">お問い合わせ内容</div>
                <div class="value">
                    届いた商品が注文した商品ではありませんでした。<br>
                    商品の取り替えをお願いします。
                </div>
            </div>
        </div>

        <div class="confirm-buttons">
            <form action="/thanks" method="POST">
                @csrf
                <button type="submit" class="btn-submit">送信</button>
            </form>

            <form action="/" method="GET">
                <button type="submit" class="btn-back">修正</button>
            </form>
        </div>
    </main>
</body>
</html>
