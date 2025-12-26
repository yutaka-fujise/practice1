<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
</head>

<body>
    <header class="header">
        <h1 class="logo">FashionablyLate</h1>
        <a href="/register" class="login-link">register</a>
    </header>

    <main class="container">
        <h2 class="title">Login</h2>

        <div class="card">
            <form action="/login" method="POST">
                @csrf

                <div class="form-group">
                    <label>メールアドレス</label>
                    <input
                        type="email"
                        name="email"
                        placeholder="例：test@example.com">
                </div>

                <div class="form-group">
                    <label>パスワード</label>
                    <input
                        type="password"
                        name="password"
                        placeholder="例：coachtech06">
                </div>

                <div class="form-button">
                    <button type="submit">ログイン</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
