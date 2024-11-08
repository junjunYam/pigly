<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pigly</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register1.css') }}">
</head>

<body>
    <main>
        <div class="container">
            <div class="container__header">PiGLy</div>
            <div class="container__ttl">新規会員登録</div>
            <div class="container__sub-ttl">STEP1 アカウント情報の登録</div>
            <form class="auth-form" action="/register/step1" method="post">
                @csrf
                <div class="form-item">
                    <label class="form-item__ttl" for="name">お名前</label>
                    <input type="text" class="form-item__input" name="name" value="{{ old('name') }}" placeholder="名前を入力">
                    <div class="form-item__error">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-item">
                    <label class="form-item__ttl" for="email">メールアドレス</label>
                    <input type="text" class="form-item__input" name="email" value="{{ old('email') }}" placeholder="メールアドレスを入力">
                    <div class="form-item__error">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-item">
                    <label class="form-item__ttl" for="password">パスワード</label>
                    <input type="text" class="form-item__input" name="password" value="{{ old('password') }}" placeholder="パスワードを入力">
                    <div class="form-item__error">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form__btn">
                    <button class="form__btn-submit" type="submit">次に進む</button>
                </div>
            </form>
            <div class="auth-nav">
                <a href="/login">ログインはこちら</a>
            </div>
        </div>
    </main>
</body>
</html>