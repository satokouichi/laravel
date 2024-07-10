<x-layout>

    <div class="p-5">
        <h1 class="pb-6">Hello World</h1>
        <form id="logout_form" action="{{ route('logout') }}" method="post">
            @csrf
            <a href="{{ route('logout') }}"
                class="btn btn-dark w-full bg-black text-white rounded p-2"
                onclick="event.preventDefault();
                document.getElementById('logout_form').submit();">
                ログアウト
            </a>
        </form>
    </div>

</x-layout>