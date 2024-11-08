<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pigly</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/goal.css') }}">
</head>

<body>
    <header>
        <div class="header__ttl">PiGLy</div>
        <div class="header__nav">
            <div class="header__nav-item">
                <a href="/weight_logs/goal_setting">目標体重設定</a>
            </div>
            <form action="/logout" class="auth-form" method="post">
                @csrf
                <button class="header__nav-btn">ログアウト</button>
            </form>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="update-ttl">
                目標体重設定
            </div>
            <form action="/weight_logs/goal_setting" class="update-form" method="post">
                @csrf
                <div class="update-form__item">
                    <input class="update-form__input-unit" type="number" step="0.1" name="target_weight" value="{{ $target->target_weight }}">
                    <label class="update-form__unit">kg</label>
                    <div class="form-item__error">
                        @error('target_weight')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <input type="hidden" name="id" value="{{ $target->id }}">
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="update-form__nav">
                    <div class="back-btn">
                        <a href="/weight_logs">戻る</a>
                    </div>
                    <button class="update-form__btn-submit" type="submit">更新</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>