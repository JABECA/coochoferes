<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <img class="navbar-brand-full app-header-logo" src="{{ asset('img/coochoferes.png') }}" width="200"
             alt="Infyom Logo">
        <a href="{{ url('/') }}"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <img class="navbar-brand-full" src="{{ asset('img/logo_solo.png') }}" width="50px" alt=""/>
        </a>
    </div>
    <ul class="sidebar-menu">
        @include('regpasajeros.menu')
    </ul>
</aside>
