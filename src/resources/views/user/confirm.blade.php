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
        <div class="value">
          {{ $inputs['last_name'] }} {{ $inputs['first_name'] }}
        </div>
      </div>

      <div class="row">
        <div class="label">性別</div>
        <div class="value">
          @if($inputs['gender'] == 1)
            男性
          @elseif($inputs['gender'] == 2)
            女性
          @else
            その他
          @endif
        </div>
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
        <div class="value">{{ $categories[$inputs['category']] ?? '' }}</div>
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
      <form action="{{ route('contact.return') }}" method="post">
        @csrf

        <input type="hidden" name="last_name" value="{{ $inputs['last_name'] }}">
        <input type="hidden" name="first_name" value="{{ $inputs['first_name'] }}">
        <input type="hidden" name="gender" value="{{ $inputs['gender'] }}">
        <input type="hidden" name="email" value="{{ $inputs['email'] }}">
        <input type="hidden" name="tel1" value="{{ $inputs['tel1'] }}">
        <input type="hidden" name="tel2" value="{{ $inputs['tel2'] }}">
        <input type="hidden" name="tel3" value="{{ $inputs['tel3'] }}">
        <input type="hidden" name="address" value="{{ $inputs['address'] }}">
        <input type="hidden" name="building" value="{{ $inputs['building'] }}">
        <input type="hidden" name="category" value="{{ $inputs['category'] }}">
        <input type="hidden" name="detail" value="{{ $inputs['detail'] }}">

        <button type="submit" class="btn-back">修正</button>
      </form>

    </div>
  </main>

</body>
</html>
