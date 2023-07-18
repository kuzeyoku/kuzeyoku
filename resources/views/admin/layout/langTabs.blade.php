<ul class="nav mb-3">
    @foreach (languageList() as $key => $lang)
        <li class="nav-item">
            <a class="nav-link rounded {{ $lang->code == app()->getLocale() ? 'active' : '' }}" data-bs-toggle="tab"
                href="#{{ $lang->code }}" aria-selected="false" tabindex="-1">
                <span class="d-none d-sm-block">{{ $lang->title }}</span>
            </a>
        </li>
    @endforeach
</ul>