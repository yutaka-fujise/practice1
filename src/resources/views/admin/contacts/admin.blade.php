<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
</head>

<body>

<header class="header">
  <h1 class="logo">FashionablyLate</h1>

  <form method="POST" action="{{ route('logout') }}" class="logout-form">
    @csrf
    <button type="submit" class="logout-button">logout</button>
  </form>
</header>

<main class="container">
  <h2 class="title">Admin</h2>

  <!-- 検索 -->
  <form class="search-area">
    <input type="text" placeholder="名前やメールアドレスを入力してください">

    <select>
      <option>性別</option>
      <option>男性</option>
      <option>女性</option>
      <option>その他</option>
    </select>

    <select>
      <option>お問い合わせの種類</option>
      <option>商品の交換について</option>
    </select>

    <input type="date">

    <button class="btn-search">検索</button>
    <button class="btn-reset" type="button">リセット</button>
  </form>

  <div class="export-area">
    <button class="btn-export">エクスポート</button>
  </div>

  <!-- 一覧 -->
  <table class="admin-table">
    <thead>
      <tr>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>お問い合わせの種類</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>山田 太郎</td>
        <td>男性</td>
        <td>test@example.com</td>
        <td>商品の交換について</td>
        <td><button class="btn-detail">詳細</button></td>
      </tr>
      <tr>
        <td>山田 太郎</td>
        <td>男性</td>
        <td>test@example.com</td>
        <td>商品の交換について</td>
        <td><button class="btn-detail">詳細</button></td>
      </tr>
    </tbody>
  </table>

  <div class="pagination">
    <span>&lt;</span>
    <span class="active">1</span>
    <span>2</span>
    <span>3</span>
    <span>4</span>
    <span>5</span>
    <span>&gt;</span>
  </div>
</main>

</body>
</html>
