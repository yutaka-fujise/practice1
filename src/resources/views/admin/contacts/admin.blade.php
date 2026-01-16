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
      />

      <select name="gender">
        <option value="">性別</option>
        <option value="1" @selected(request('gender') == '1')>男性</option>
        <option value="2" @selected(request('gender') == '2')>女性</option>
        <option value="3" @selected(request('gender') == '3')>その他</option>
      </select>

      <input type="date" name="date_from" value="{{ request('date_from') }}" />
      <input type="date" name="date_to" value="{{ request('date_to') }}" />

      <button class="btn-search" type="submit">検索</button>
      <a href="{{ route('admin.index') }}" class="btn-reset">リセット</a>
    </form>

    <!-- =========================
          Export
    ========================== -->
    <div class="export-area">
      <button class="btn-export" type="button">エクスポート</button>
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
          @php
            $genderLabel = $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他');
          @endphp

          <tr>
            <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
            <td>{{ $genderLabel }}</td>
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
            <td colspan="5" class="empty-row">
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
      @php
        $genderLabel = $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他');

        $rows = [
          'お名前' => $contact->last_name.' '.$contact->first_name,
          '性別' => $genderLabel,
          'メールアドレス' => $contact->email,
          '電話番号' => $contact->tel ?? '',
          '住所' => $contact->address ?? '',
          '建物名' => $contact->building ?? '',
          'お問い合わせの種類' => $contact->category->content ?? '',
          'お問い合わせ内容' => $contact->detail ?? '',
        ];
      @endphp

      <div class="modal-overlay js-modal" id="modal-{{ $contact->id }}" aria-hidden="true">
        <div class="modal-content" role="dialog" aria-modal="true">
          <button type="button" class="modal-close js-close-modal" aria-label="閉じる">×</button>

          <h2 class="modal-title">FashionablyLate</h2>

          <div class="modal-body">
            @foreach($rows as $label => $value)
              <div class="modal-row">
                <div class="modal-label">{{ $label }}</div>
                <div class="modal-value">{{ $value }}</div>
              </div>
            @endforeach
          </div>

          <div class="modal-footer" onclick="event.stopPropagation();">
            <form
              action="{{ route('admin.destroy', $contact->id) }}"
              method="POST"
              onsubmit="return confirm('本当に削除しますか？')"
            >
              @csrf
              @method('DELETE')
              <button type="submit" class="btn-delete">削除</button>
            </form>
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
    const openModal = (modal) => {
      modal.classList.add('is-open');
      modal.setAttribute('aria-hidden', 'false');
    };

    const closeModal = (modal) => {
      modal.classList.remove('is-open');
      modal.setAttribute('aria-hidden', 'true');
    };

    document.querySelectorAll('.js-open-modal').forEach(btn => {
      btn.addEventListener('click', () => {
        const modal = document.getElementById(btn.dataset.modal);
        if (modal) openModal(modal);
      });
    });

    document.querySelectorAll('.js-close-modal').forEach(btn => {
      btn.addEventListener('click', () => {
        const modal = btn.closest('.js-modal');
        if (modal) closeModal(modal);
      });
    });

    document.querySelectorAll('.js-modal').forEach(modal => {
      modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal(modal);
      });
    });
  </script>
</body>
</html>
