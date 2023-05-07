<ul class="sidebar-menu">
    <li class="menu-header">DashBoard</li>

    <?php if (Auth::user()->hasAnyRole('Administrador')): ?>
        <li class="dropdown">
            <a class="nav-link" href="/home">
                <i class="fas fa-building"></i><span>Dashboard</span>
            </a>
        </li>

        <li class="menu-header">Administración</li>

        <li class="dropdown"> 
            <a href="#" class="nav-link has-dropdown">
                <i class="fa fa-cogs"></i>
                <span>Admin</span>
            </a>
            <ul class="dropdown-menu" style="display: none;">
                <li>
                    <a class="nav-link" href="/usuarios">
                        <i class="fas fa-users"></i><span>Usuarios</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="/roles">
                        <i class="fas fa-user-lock"></i><span>Roles</span>
                    </a>
                </li>

               <!--<li>
                    <a href="#" data-toggle="dropdown" role="button" class="dropdown-toggle">
                        <i class="fas fa-bus-alt"></i><span class="caret">Veh&iacuteculos</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/vehiculos"><i class=" fas fa-shuttle-van"></i>Veh&iacuteculos</a></li>
                        <li><a href="/insidentes"><i class="fas fa-edit"></i>Novedades</a></li>
                        <li role="separator" class="divider"></li>
                    </ul>
                </li>

                <li>
                    <a href="#" data-toggle="dropdown" role="button" class="dropdown-toggle">
                        <i class="fa fa-users"></i><span class="caret">Personas</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/personas"><i class="fas fa-user-cog"></i>Personas</a></li>
                        <li><a href="/exams"><i class="far fa-edit"></i>Novedades</a></li>
                        <li role="separator" class="divider"></li>
                    </ul>
                </li>-->
        
            </ul>
        </li>
        
        <li class="menu-header">Modulos</li>

        <li class="dropdown"> 
            <a href="#" class="nav-link has-dropdown">
                <i class="fa fa-cogs"></i>
                <span>Modulos</span>
            </a>
            <ul class="dropdown-menu" style="display: none;">
                <li>
                    <a class="nav-link" href="#">
                        <i class="fas fa-users"></i><span>Movilizacion Ruta</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#">
                        <i class="fas fa-user-lock"></i><span>Alistamiento</span>
                    </a>
                </li>
                
                <li>
                   
                    <li>
                        <a href="#" data-toggle="dropdown" role="button" class="dropdown-toggle">
                            <i class="fas fa-bus-alt"></i><span class="caret">HV Veh&iacutecular</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/vehiculos"><i class=" fas fa-shuttle-van"></i>Veh&iacuteculos</a></li>
                            <li><a href="/insidentes"><i class="fas fa-edit"></i>Novedades</a></li>
                            <li role="separator" class="divider"></li>
                        </ul>
                    </li>
                    
                </li>
                
                <li>
                    <a href="#" data-toggle="dropdown" role="button" class="dropdown-toggle">
                        <i class="fa fa-users"></i><span class="caret">HV Personas</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/personas"><i class="fas fa-user-cog"></i>Personas</a></li>
                        <li><a href="/exams"><i class="far fa-edit"></i>Novedades</a></li>
                        <li role="separator" class="divider"></li>
                    </ul>
                </li>
                
                 <li>
                    <a class="nav-link" href="#">
                        <i class="fas fa-user-lock"></i><span>Venta de tiquetes</span>
                    </a>
                </li>
            
               
        
            </ul>
        </li>


        <li class="menu-header">Liquidación Vehículos</li>

        <li class="dropdown"> 
            <a href="#" class="nav-link has-dropdown">
                <i class="fab fa-cc-amazon-pay"></i>
                <span>Liquidaci&oacuten</span>
            </a>
            <ul class="dropdown-menu" style="display: none;">
                <li>
                    <a class="nav-link" href="/regpasajeros/create">
                        <i class="fas fa-users"></i><span class="caret">Monitoreo</span>
                    </a>
                </li>
                  <li>
                    <a class="nav-link" href="/regpasajeros">
                        <i class="fas fa-dollar-sign"></i><span class="caret">Recaudo</span>
                    </a>
                </li>
                  <li>
                    <a class="nav-link" href="/admrecaudos">
                        <i class="far fa-edit"></i><span class="caret">Admin Recaudos</span>
                    </a>
                </li>
            </ul>
        </li>
    
    <?php elseif (Auth::user()->hasAnyRole('Admin')): ?>
        <li class="dropdown">
            <a class="nav-link" href="/home">
                <i class="fas fa-building"></i><span>Dashboard</span>
            </a>
        </li>

        <li class="menu-header">Liquidacion Vehiculos</li>

        <li class="dropdown"> 
            <a href="#" class="nav-link has-dropdown">
                <i class="fab fa-cc-amazon-pay"></i>
                <span>Liquidacion</span>
            </a>
            <ul class="dropdown-menu" style="display: none;">
                <li>
                    <a class="nav-link" href="/admrecaudos">
                        <i class="far fa-edit"></i><span class="caret">Admin recaudos</span>
                    </a>
                </li>
            </ul>
        </li>
    

    <?php elseif (Auth::user()->hasAnyRole('Operativo')): ?>

    <li class="menu-header">Liquidacion Vehiculos</li>

        <li class="dropdown"> 
            <a href="#" class="nav-link has-dropdown">
                <i class="fab fa-cc-amazon-pay"></i>
                <span>Liquidacion</span>
            </a>
            <ul class="dropdown-menu" style="display: none;">
                <li>
                    <a class="nav-link" href="/regpasajeros/create">
                        <i class="fas fa-users"></i><span class="caret">Monitoreo</span>
                    </a>
                </li>
                  <li>
                    <a class="nav-link" href="/regpasajeros">
                        <i class="fas fa-dollar-sign"></i><span class="caret">Recaudo</span>
                    </a> 
               </li>
                   <!-- <li>
                    <a class="nav-link" href="#">
                        <i class="far fa-edit"></i><span class="caret">Admin recaudos</span>
                    </a>
                </li> -->
            </ul>
        </li>
    

     <?php elseif (Auth::user()->hasAnyRole('Recaudo')): ?>

     <li class="menu-header">Liquidacion Vehiculos</li>

        <li class="dropdown"> 
            <a href="#" class="nav-link has-dropdown">
                <i class="fab fa-cc-amazon-pay"></i>
                <span>Liquidacion</span>
            </a>
            <ul class="dropdown-menu" style="display: none;">
                <li>
                    <a class="nav-link" href="/regpasajeros/create">
                        <i class="fas fa-users"></i><span class="caret">Monitoreo</span>
                    </a>
                </li>
                
                <li>
                    <a class="nav-link" href="/regpasajeros">
                        <i class="fas fa-dollar-sign"></i><span class="caret">Recaudo</span>
                    </a>
                </li>
            </ul>
        </li>

    <?php endif ?> 






</ul>

