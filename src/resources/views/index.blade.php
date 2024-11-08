<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pigly</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
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
        <!-- @if (session('message'))
            {{ session('message') }}
        @endif -->
        <div class="container">
            <div class="weight-item">
                <p class="weight-item__ttl">目標体重</p>
                <p class="weight-item__content"><span class="emphasis">{{ $target }}</span>kg</p>
            </div>
            <div class="vertical-line"></div>
            <div class="weight-item">
                <p class="weight-item__ttl">目標まで</p>
                <p class="weight-item__content"><span class="emphasis">{{ $target - $weight }}</span>kg</p>
            </div>
            <div class="vertical-line"></div>
            <div class="weight-item">
                <p class="weight-item__ttl">最新体重</p>
                <p class="weight-item__content"><span class="emphasis">{{ $weight }}</span>kg</p>
            </div>
        </div>

        <div class="container">
            <div class="search-create__item">
                <form action="/weight_logs/search" class="search-form"  method="get">
                    @csrf
                    <div class="search-form__input">
                        <input type="date" name="dateStart">
                        <label for="">~</label>
                        <input type="date" name="dateEnd">
                    </div>
                    <div class="search-form__btn">
                        <button type="submit">検索</button>
                    </div>
                </form>
                <div class="create-btn">
                    <button class="open-btn" popovertarget="pigly-popover" popovertargetaction="show">データ追加</button>
                    <div class="pigly__popover" id="pigly-popover" popover>
                        <div class="pigly__close">
                            <button class="close-btn" popovertarget="pigly-popover" popovertargetaction="hide" type="button">戻る</button>
                        </div>
                        <div class="create-ttl">
                            Weight Logを追加
                        </div>
                        <form action="/weight_logs/create" class="create-form" method="post">
                            @csrf
                            <div class="create-form__item">
                                <label for="date" class="create-form__ttl require">日付</label>
                                <input class="create-form__input" type="date" name="date" value="{{ old('date') }}">
                                <div class="form-item__error">
                                    @error('date')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="create-form__item">
                                <label for="weight" class="create-form__ttl require">体重</label>
                                <input class="create-form__input-unit" type="number" step="0.1" name="weight" value="{{ old('weight') }}">
                                <label class="create-form__unit">kg</label>
                                <div class="form-item__error">
                                    @error('weight')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="create-form__item">
                                <label for="calories" class="create-form__ttl require">摂取カロリー</label>
                                <input class="create-form__input-unit" type="number" name="calories" value="{{ old('calories') }}">
                                <label class="create-form__unit">cal</label>
                                <div class="form-item__error">
                                    @error('calories')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="create-form__item">
                                <label for="exercise-time" class="create-form__ttl require">運動時間</label>
                                <input class="create-form__input" type="time" step="1" name="exercise_time" value="{{ old('exercise_time') }}">
                                <div class="form-item__error">
                                    @error('exercise_time')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="create-form__item">
                                <label for="date" class="create-form__ttl">運動内容</label>
                                <textarea class="create-form__textarea"  name="exercise_content" placeholder="運動内容を追加" value="{{ old('exercise_content') }}"></textarea>
                                <div class="form-item__error">
                                    @error('exercise_content')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div class="create-form__btn">
                                <button class="create-form__btn-submit" type="submit">登録</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <table class="pigly-table">
                <tr class="pigly-table__row">
                    <th class="pigly-table__header">
                        <p>日付</p>
                    </th>
                    <th class="pigly-table__header">
                        <p>体重</p>
                    </th>
                    <th class="pigly-table__header">
                        <p>食事摂取カロリー</p>
                    </th>
                    <th class="pigly-table__header">
                        <p>運動時間</p>
                    <th class="pigly-table__header"></th>
                </tr>
                @foreach ($logs as $log)
                <tr class="pigly-table__row">
                    <td class="pigly-table__item">
                        <p>{{ $log->date }}</p>
                    </td>
                    <td class="pigly-table__item">
                        <p>{{ $log->weight }}kg</p>
                    </td>
                    <td class="pigly-table__item">
                        <p>{{ $log->calories }}cal</p>
                    </td>
                    <td class="pigly-table__item">
                        <p>{{ $log->exercise_time }}</p>
                    </td>
                    <td class="pigly-table__item">
                        <a href="/weight_logs/{{$log->id}}">あ</a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{ $logs->links() }}
        </div>
    </main>
</body>
</html>