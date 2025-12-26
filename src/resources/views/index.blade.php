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

        <form action="/confirm" method="POST" class="contact-form">
            @csrf

            <!-- 名前 -->
            <div class="form-group">
                <label>お名前 <span class="required">※</span></label>
                <div class="name-group">
                    <input type="text" name="last_name" placeholder="例：山田">
                    <input type="text" name="first_name" placeholder="例：太郎">
                </div>
            </div>

            <!-- 性別 -->
            <div class="form-group">
                <label>性別 <span class="required">※</span></label>
                <div class="radio-group">
                    <label><input type="radio" name="gender" value="1"> 男性</label>
                    <label><input type="radio" name="gender" value="2"> 女性</label>
                    <label><input type="radio" name="gender" value="3"> その他</label>
                </div>
            </div>

            <!-- メール -->
            <div class="form-group">
                <label>メールアドレス <span class="required">※</span></label>
                <input type="email" name="email" placeholder="例：test@example.com">
            </div>

            <!-- 電話番号 -->
            <div class="form-group">
                <label>電話番号 <span class="required">※</span></label>
                <div class="tel-group">
                    <input type="text" name="tel1" placeholder="090">
                    <span>-</span>
                    <input type="text" name="tel2" placeholder="1234">
                    <span>-</span>
                    <input type="text" name="tel3" placeholder="5678">
                </div>
            </div>

            <!-- 住所 -->
            <div class="form-group">
                <label>住所 <span class="required">※</span></label>
                <input type="text" name="address" placeholder="例：東京都渋谷区神南1-2-3">
            </div>

            <!-- 建物名 -->
            <div class="form-group">
                <label>建物名</label>
                <input type="text" name="building" placeholder="例：渋谷マンション101">
            </div>

            <!-- お問い合わせ種類 -->
            <div class="form-group">
                <label>お問い合わせの種類 <span class="required">※</span></label>
                <select name="category_id">
                    <option value="">選択してください</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->content }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- 内容 -->
            <div class="form-group">
                <label>お問い合わせ内容 <span class="required">※</span></label>
                <textarea name="detail" rows="5" placeholder="お問い合わせ内容をご記入ください"></textarea>
            </div>

            <!-- 送信 -->
            <div class="form-button">
                <button type="submit">確認画面</button>
            </div>
        </form>
    </main>
</body>
</html>
