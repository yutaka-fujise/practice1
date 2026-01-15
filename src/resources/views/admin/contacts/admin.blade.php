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

  <!-- =========================
        Header
  ========================== -->
  <header class="header">
    <h1 class="logo">FashionablyLate</h1>

    <form method="POST" action="{{ route('logout') }}" class="logout-form">
      @csrf
      <button type="submit" class="logout-button">logout</button>
    </form>
  </header>

  <main class="container">
    <h2 class="title">Admin</h2>

    <!-- =========================
          Search Area
    ========================== -->
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

    <!-- =========================
          Export
    ========================== -->
    <div class="export-area">
      <button class="btn-export">エクスポート</button>
    </div>

    <!-- =========================
          Contact List
    ========================== -->
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

            <td>{{ $contact->category->content ?? '' }}</td>

            <td>
              <button
                type="button"
                class="btn-detail js-open-modal"
                data-modal="modal-{{ $contact->id }}"
              >
                詳細
              </button>
            </td>
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

    <!-- =========================
          Modals
    ========================== -->
    @foreach($contacts as $contact)
      <div class="modal-overlay js-modal" id="modal-{{ $contact->id }}" aria-hidden="true">
        <div class="modal-content" role="dialog" aria-modal="true">
          <button
            type="button"
            class="modal-close js-close-modal"
            aria-label="閉じる"
          >
            ×
          </button>

          <h2 class="modal-title">FashionablyLate</h2>

          <div class="modal-body">
            <div class="modal-row">
              <div class="modal-label">お名前</div>
              <div class="modal-value">
                {{ $contact->last_name }} {{ $contact->first_name }}
              </div>
            </div>

            <div class="modal-row">
              <div class="modal-label">性別</div>
              <div class="modal-value">
                @if($contact->gender == 1)
                  男性
                @elseif($contact->gender == 2)
                  女性
                @else
                  その他
                @endif
              </div>
            </div>

            <div class="modal-row">
              <div class="modal-label">メールアドレス</div>
              <div class="modal-value">{{ $contact->email }}</div>
            </div>

            <div class="modal-row">
              <div class="modal-label">電話番号</div>
              <div class="modal-value">{{ $contact->tel ?? '' }}</div>
            </div>

            <div class="modal-row">
              <div class="modal-label">住所</div>
              <div class="modal-value">{{ $contact->address ?? '' }}</div>
            </div>

            <div class="modal-row">
              <div class="modal-label">建物名</div>
              <div class="modal-value">{{ $contact->building ?? '' }}</div>
            </div>

            <div class="modal-row">
              <div class="modal-label">お問い合わせの種類</div>
              <div class="modal-value">
                {{ $contact->category->content ?? '' }}
              </div>
            </div>

            <div class="modal-row">
              <div class="modal-label">お問い合わせ内容</div>
              <div class="modal-value">{{ $contact->detail ?? '' }}</div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn-delete" disabled>削除</button>
          </div>
        </div>
      </div>
    @endforeach

    <!-- =========================
          Pagination
    ========================== -->
    <div class="pagination">
      {{ $contacts->links() }}
    </div>

  </main>

  <!-- =========================
        Modal Script
  ========================== -->
  <script>
    // 開く
    document.querySelectorAll('.js-open-modal').forEach(btn => {
      btn.addEventListener('click', () => {
        const id = btn.dataset.modal;
        const modal = document.getElementById(id);
        if (!modal) return;

        modal.classList.add('is-open');
        modal.setAttribute('aria-hidden', 'false');
      });
    });

    // 閉じる（×）
    document.querySelectorAll('.js-close-modal').forEach(btn => {
      btn.addEventListener('click', () => {
        const modal = btn.closest('.js-modal');
        if (!modal) return;

        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');
      });
    });

    // 背景クリックで閉じる
    document.querySelectorAll('.js-modal').forEach(modal => {
      modal.addEventListener('click', (e) => {
        if (e.target === modal) {
          modal.classList.remove('is-open');
          modal.setAttribute('aria-hidden', 'true');
        }
      });
    });
  </script>

</body>
</html>
