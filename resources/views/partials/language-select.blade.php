<li class="nav-item">
    <select class="selectpicker" data-width="fit" onchange="changeLang(value);">
        <option data-content='<span class="flag-icon flag-icon-us"></span> English' value="en" @if(App::isLocale('en'))
            selected="selected" @endif>English</option>
        <option data-content='<span class="flag-icon flag-icon-th"></span> Thai' value="th" @if(App::isLocale('th'))
            selected="selected" @endif>Thai</option>
    </select>
</li>
