<x-layout>

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="p-6 rounded bg-white shadow-md w-96">
            @error('email')<div class="mb-4 text-red-500">{{ $message }}</div>@enderror
            <form method="post" action="{{ route('login') }}" novalidate>
                @csrf
                <div class="mb-4">
                    <input type="text"
                        id="email"
                        class="form-control bg-gray-100 border border-gray-300 rounded p-2 w-full"
                        name="email" value="{{ old('email') }}"
                        placeholder="メールアドレス"
                        required autocomplete="email" autofocus>
                </div>
                <div class="mb-4">
                    <input type="password"
                        id="password"
                        class="form-control bg-gray-100 border border-gray-300 rounded p-2 w-full"
                        name="password"
                        placeholder="パスワード"
                        required autocomplete="current-password">
                </div>
                <input type="checkbox"
                    id="remember"
                    class="form-check-input hidden"
                    name="remember"
                    checked>
                <button type="submit"
                    class="btn btn-dark w-full bg-black text-white rounded p-2">
                    ログイン
                </button>
            </form>
        </div>
    </div>

</x-layout>