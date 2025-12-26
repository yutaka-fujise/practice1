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
  <h2 class="title">Contact</h2>

  <form class="contact-form" action="/confirm" method="post">
    @csrf

    <div class="form-row">
      <label>お名前<span>※</span></label>
      <div class="name-box">
        <input type="text" placeholder="例）山田">
        <input type="text" placeholder="例）太郎">
      </div>
    </div>

    <div class="form">
        <label>性別<span>※</span></label>
            <div class="radio-box">
        <label class="radio-item">
            <input type="radio" name="gender"> 男性
        </label>
        <label class="radio-item">
            <input type="radio" name="gender"> 女性
        </label>
        <label class="radio-item">
            <input type="radio" name="gender"> その他
        </label>
            </div>
        </div>

    <div class="form-row">
      <label>メールアドレス<span>※</span></label>
      <input type="email" placeholder="例）test@example.com">
    </div>

    <div class="form-row">
      <label>電話番号<span>※</span></label>
      <div class="tel-box">
        <input type="text">
        <span>-</span>
        <input type="text">
        <span>-</span>
        <input type="text">
      </div>
    </div>

    <div class="form-row">
      <label>住所<span>※</span></label>
      <input type="text" placeholder="例）東京都渋谷区千駄ヶ谷1-2-3">
    </div>

    <div class="form-row">
      <label>建物名</label>
      <input type="text" placeholder="例）千駄ヶ谷マンション101">
    </div>

    <div class="form-row">
      <label>お問い合わせの種類<span>※</span></label>
      <select>
        <option>選択してください</option>
      </select>
    </div>

    <div class="form-row">
      <label>お問い合わせ内容<span>※</span></label>
      <textarea placeholder="お問い合わせ内容をご記載ください"></textarea>
    </div>

    <div class="form-button">
      <button type="submit">確認画面</button>
    </div>
  </form>
</main>

</body>
</html>
