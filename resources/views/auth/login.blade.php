<x-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="p-6 rounded bg-white shadow-md w-96">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="form" method="post" action="{{ route('login') }}" novalidate>
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
                <input type="hidden" name="recaptcha_token" id="recaptcha_token">
                <button type="submit"
                    class="btn btn-dark w-full bg-black text-white rounded p-2">
                    ログイン
                </button>
            </form>
        </div>
    </div>

    @push('scripts')
        <script src="https://www.google.com/recaptcha/api.js?render={{ config('recaptcha.api_site_key') }}"></script>
        <script>
            document.getElementById('form').addEventListener('submit', function(event) {
                event.preventDefault();
                grecaptcha.ready(function() {
                    grecaptcha.execute('{{ config('recaptcha.api_site_key') }}', {action: 'submit'}).then(function(token) {
                        document.getElementById('recaptcha_token').value = token;
                        document.getElementById('form').submit();
                    });
                });
            });
        </script>
    @endpush
</x-layout>