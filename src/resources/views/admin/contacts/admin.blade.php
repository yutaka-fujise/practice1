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
  <form action="{{ route('admin.index') }}" method="GET" class="search-area">
    <input
      type="text"
      name="keyword"
      value="{{ request('keyword') }}"
      placeholder="名前やメールアドレスを入力してください"
    >

    <select name="gender">
      <option value="">性別</option>
      <option value="1" @selected(request('gender')=='1')>男性</option>
      <option value="2" @selected(request('gender')=='2')>女性</option>
      <option value="3" @selected(request('gender')=='3')>その他</option>
    </select>

    <input type="date" name="date_from" value="{{ request('date_from') }}">
    <input type="date" name="date_to" value="{{ request('date_to') }}">

    <button class="btn-search" type="submit">検索</button>
    <a href="{{ route('admin.index') }}" class="btn-reset">リセット</a>
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
      @forelse($contacts as $contact)
        <tr>
          <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>

          <td>
            @if($contact->gender == 1)
              男性
            @elseif($contact->gender == 2)
              女性
            @else
              その他
            @endif
          </td>

          <td>{{ $contact->email }}</td>

          <td>
            {{ $contact->category->content ?? '' }}
          </td>

          <td><button class="btn-detail" type="button">詳細</button></td>
        </tr>
      @empty
        <tr>
          <td colspan="5" style="text-align:center; padding: 20px;">
            該当するデータがありません
          </td>
        </tr>
      @endforelse
    </tbody>
  </table>

  <div class="pagination">
    {{ $contacts->links() }}
  </div>
</main>

</body>
</html>
