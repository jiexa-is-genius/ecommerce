<nav>
    <ul>
        @foreach(\App\Models\Categories::get() as $category)
        <li>
            <a href="/category/{{ $category->id }}">{{ $category->caption }}</a>
        </li>
        @endforeach
    </ul>
</nav>
