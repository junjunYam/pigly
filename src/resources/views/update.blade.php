<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pigly</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/update.css') }}">
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
                Weight Log
            </div>
            <form action="/weight_logs/{{$log->id}}/update" class="update-form" method="post">
                @method('PATCH')
                @csrf
                <div class="update-form__item">
                    <label for="date" class="update-form__ttl">日付</label>
                    <input class="update-form__input" type="date" name="date" value="{{ $log->date }}">
                    <div class="form-item__error">
                        @error('date')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="update-form__item">
                    <label for="weight" class="update-form__ttl">体重</label>
                    <input class="update-form__input-unit" type="number" step="0.1" name="weight" value="{{ $log->weight }}">
                    <label class="update-form__unit">kg</label>
                    <div class="form-item__error">
                        @error('weight')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="update-form__item">
                    <label for="calories" class="update-form__ttl">摂取カロリー</label>
                    <input class="update-form__input-unit" type="number" name="calories" value="{{ $log->calories }}">
                    <label class="update-form__unit">cal</label>
                    <div class="form-item__error">
                        @error('calories')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="update-form__item">
                    <label for="exercise-time" class="update-form__ttl">運動時間</label>
                    <input class="update-form__input" type="time" step="1" name="exercise_time" value="{{ $log->exercise_time }}">
                    <div class="form-item__error">
                        @error('exercise_time')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="update-form__item">
                    <label for="date" class="update-form__ttl">運動内容</label>
                    <textarea class="update-form__textarea"  name="exercise_content" placeholder="運動内容を追加">{{ $log->exercise_content }}</textarea>
                    <div class="form-item__error">
                        @error('exercise_content')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <input type="hidden" name="id" value="{{ $log->id }}">
                <div class="update-form__nav">
                    <div class="back-btn">
                        <a href="/weight_logs">戻る</a>
                    </div>
                    <button class="update-form__btn-submit" type="submit">更新</button>
                </div>
            </form>
            <form action="/weight_logs/{{$log->id}}/delete" class="delete-form" method="post">
                @method('DELETE')
                @csrf
                <input type="hidden" name="id" value="{{ $log->id }}">
                <button class="delete-form__btn-submit">あ</button>
            </form>
        </div>
    </main>
</body>
</html>