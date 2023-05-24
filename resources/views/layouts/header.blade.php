<form class="form-inline mr-auto" action="#">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
</form>
<ul class="navbar-nav navbar-right">

    @if(\Illuminate\Support\Facades\Auth::user())
        
                @if ( \Illuminate\Support\Facades\Auth::user()->hasAnyRole('Conductor') )    
                <ul class="nav navbar-nav navbar-left">

                    <li class="dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#"><i class="fa fa-bell"></i>
                            <span class="badge badge-warning navbar-badge" style="background-color: #dde60b; color: black; ">Vencimientos</span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            
                            <li> 
                                <label class="">&nbsp; Licencia &nbsp;: </label>
                                <span class="badge badge-warning " style="background-color: red;">{{$vencimientos['fec_venc_licencia']}}</span>
                               
                            </li>
                            
                            <li class="divider"></li>  <!--divide seccion en menu -->

                            <li>
                               <label>&nbsp; SOAT &nbsp;&nbsp;&nbsp;&nbsp; :</label>
                                    <span class="badge badge-warning navbar-badge" style="background-color: red;">{{$vencimientos['fec_venc_SOAT']}}</span>
                                
                            </li>

                            <li class="divider"></li>  <!--divide seccion en menu -->

                            <li>
                                <label>&nbsp; RTM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  : </label>
                                    <span class="badge badge-warning navbar-badge" style="background-color: red;">{{$vencimientos['fec_venc_RTM']}}</span>
                                
                            </li>

                            <li>
                                <label>&nbsp; TOP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  : </label>
                                    <span class="badge badge-warning navbar-badge" style="background-color: red;">{{$vencimientos['fec_venc_TOP']}}</span>
                                
                            </li>

                            <li>
                                <label>&nbsp; Mto Prev :</label>
                                    <span class="badge badge-warning navbar-badge" style="background-color: red;">{{$vencimientos['fec_venc_TOP']}}</span>
                                
                            </li>

                        </ul>
                    </li>
                </ul>
                @endif




        <li class="dropdown">
            <a href="#" data-toggle="dropdown"
               class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('img/logo_solo.png') }}"
                     class="rounded-circle mr-1 thumbnail-rounded user-thumbnail ">
                <div class="d-sm-none d-lg-inline-block">
                    {{\Illuminate\Support\Facades\Auth::user()->name}}</div>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">
                    Bienvenido</div>
                <!--<a class="dropdown-item has-icon edit-profile" href="#" data-id="{{ \Auth::id() }}">-->
                <!--    <i class="fa fa-user"></i>Editar Perfil de Usuario</a>-->
                <!--<a class="dropdown-item has-icon" data-toggle="modal" data-target="#changePasswordModal" href="#" data-id="{{ \Auth::id() }}"><i-->
                <!--            class="fa fa-lock"> </i>Cambiar Password</a>-->
                <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"
                   onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    @else
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                {{--                <img alt="image" src="#" class="rounded-circle mr-1">--}}
                <div class="d-sm-none d-lg-inline-block">{{ __('messages.common.hello') }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">{{ __('messages.common.login') }}
                    / {{ __('messages.common.register') }}</div>
                <a href="{{ route('login') }}" class="dropdown-item has-icon">
                    <i class="fas fa-sign-in-alt"></i> {{ __('messages.common.login') }}
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('register') }}" class="dropdown-item has-icon">
                    <i class="fas fa-user-plus"></i> {{ __('messages.common.register') }}
                </a>
            </div>
        </li>
    @endif
</ul>
