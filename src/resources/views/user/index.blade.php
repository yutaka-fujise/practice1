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
        <div class="form-input">
        <input type="text" name="last_name" placeholder="例）山田" value="{{ old('last_name') }}">
        @error('last_name')
          <p class="error">{{ $message }}</p>
        @enderror
        </div>
        <div class="form-input">
        <input type="text" name="first_name" placeholder="例）太郎" value="{{ old('first_name') }}">
        @error('first_name')
          <p class="error">{{ $message }}</p>
        @enderror
        </div>
      </div>
    </div>

    <div class="form">
        <label>性別<span>※</span></label>
            <div class="radio-box">
        <label class="radio-item">
            <input type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }}> 男性</label>
        <label class="radio-item">
            <input type="radio" name="gender" value="1" {{ old('gender') == '2' ? 'checked' : '' }}> 女性
        </label>
        <label class="radio-item">
            <input type="radio" name="gender" value="1" {{ old('gender') == '3' ? 'checked' : '' }}> その他
        </label>
        @error('gender')
          <p class="error">{{ $message }}</p>
        @enderror
          </div>
    </div>
  </div

    <div class="form-row">
      <label>メールアドレス<span>※</span></label>
        <div class="form-input">
          <div class="form-input">
          <input type="email" name="email" placeholder="例）test@example.com" value="{{ old('email') }}">
          @error('email')
            <p class="error">{{ $message }}</p>
          @enderror
          </div>
        </div>
    </div>

        <div class="form-row">
            <label>電話番号<span>※</span></label>
          <div class="tel-box">
            <input type="text" name="tel1"value="{{ old('tel1') }}">
            <span>-</span>
            <input type="text" name="tel2"value="{{ old('tel2') }}">
            <span>-</span>
            <input type="text" name="tel3"value="{{ old('tel3') }}">
            @error('tel1')
            <p class="error">{{ $message }}</p>
            @enderror
          </div>
        </div>

    <div class="form-row">
      <label>住所<span>※</span></label>
      <div class="form-input">
      <input type="text" name="address" placeholder="例）東京都渋谷区千駄ヶ谷1-2-3"value="{{ old('address') }}">
      @error('address')
        <p class="error">{{ $message }}</p>
      @enderror
      </div>
    </div>

    <div class="form-row">
      <label>建物名</label>
      <input type="text" name="building" placeholder="例）千駄ヶ谷マンション101"value="{{ old('building') }}">
    </div>

    <div class="form-row">
        <label>お問い合わせの種類<span>※</span></label>
      <div class="form-input">
        <select name="category">
        <option value="">選択してください</option>
        <option value="商品の交換について" {{ old('category') == '商品の交換について' ? 'selected' : '' }}>商品の交換について</option>
        <option value="不具合について" {{ old('category') == '不具合について' ? 'selected' : '' }}>不具合について</option>
        <option value="その他">その他</option>
        </select>
        @error('category')
          <p class="error">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div class="form-row">
      <label>お問い合わせ内容<span>※</span></label>
      <div class="form-input">
        <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
        @error('detail')
          <p class="error">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div class="form-button">
      <button type="submit">確認画面</button>
    </div>
  </form>
</main>

</body>
</html>
