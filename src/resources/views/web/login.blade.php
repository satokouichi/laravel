<x-web.layout :heads="$heads ?? ___('heads')" :bodys="$bodys ?? null">
    <div id="vue-test"></div>
    <form method="post" action="{{ route('login') }}" novalidate>
        @csrf
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="error"><b>{!! $error !!}</b></div>
            @endforeach
        @endif
        <input type="hidden" name="target_path" value="{{ $target_path }}" />
        <div class="input-item">
            <label for="email">Eメールアドレス</label>
            <input type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Eメールアドレス">
        </div>
        <div class="input-item">
            <label for="password">パスワード</label>
            <input type="password"
                name="password"
                value="{{ old('password') }}"
                placeholder="パスワード">
            <span>
        </div>
        <button type="submit">ログインする</button>
    </form>

</x-web.layout>