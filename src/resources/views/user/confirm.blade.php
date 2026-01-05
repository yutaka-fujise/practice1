<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Confirm</title>
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
      <div class="value">
        {{ $inputs['last_name'] }} {{ $inputs['first_name'] }}
      </div>
    </div>

    <div class="row">
      <div class="label">性別</div>
      <div class="value">{{ $inputs['gender'] }}</div>
    </div>

    <div class="row">
      <div class="label">メールアドレス</div>
      <div class="value">{{ $inputs['email'] }}</div>
    </div>

    <div class="row">
      <div class="label">電話番号</div>
      <div class="value">
        {{ $inputs['tel1'] }}-{{ $inputs['tel2'] }}-{{ $inputs['tel3'] }}
      </div>
    </div>

    <div class="row">
      <div class="label">住所</div>
      <div class="value">{{ $inputs['address'] }}</div>
    </div>

    <div class="row">
      <div class="label">建物名</div>
      <div class="value">{{ $inputs['building'] }}</div>
    </div>

    <div class="row">
      <div class="label">お問い合わせの種類</div>
      <div class="value">{{ $inputs['category'] }}</div>
    </div>

    <div class="row">
      <div class="label">お問い合わせ内容</div>
      <div class="value">
        {!! nl2br(e($inputs['detail'])) !!}
      </div>
    </div>

  </div>

  <div class="confirm-buttons">

    <!-- 送信 -->
    <form action="/thanks" method="POST">
      @csrf
      @foreach($inputs as $name => $value)
        <input type="hidden" name="{{ $name }}" value="{{ $value }}">
      @endforeach
      <button type="submit" class="btn-submit">送信</button>
    </form>

    <!-- 修正 -->
    <form action="/" method="GET">
      <button type="submit" class="btn-back">修正</button>
    </form>

  </div>
</main>

</body>
</html>
