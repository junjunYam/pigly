<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pigly</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register2.css') }}">
</head>

<body>
    <main>
        <div class="container">
            <div class="container__header">PiGLy</div>
            <div class="container__ttl">新規会員登録</div>
            <div class="container__sub-ttl">STEP2 体重データの入力</div>
            <form action="/register/step2" class="auth-form" method="post">
                @csrf
                <div class="form-item">
                    <label class="form-item__ttl" for="weight">現在の体重</label>
                    <input class="form-item__input" type="number" step="0.1" name="weight" value="{{ old('weight') }}" placeholder="現在の体重を入力">
                    <label class="form-item__unit">kg</label>
                    <div class="form-item__error">
                        @error('weight')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-item">
                    <p class="form-item__ttl" for="target_weight">目標の体重</p>
                    <input class="form-item__input" type="number" step="0.1" name="target_weight" value="{{ old('target_weight') }}" placeholder="目標の体重を入力">
                    <label class="form-item__unit">kg</label>
                    <div class="form-item__error">
                        @error('target_weight')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form__btn">
                    <input type="hidden" name="user_id" value="{{ $user['id'] }}">
                    <button class="form__btn-submit" type="submit">アカウント作成</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>