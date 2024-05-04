<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <!-- Admin Dashbord -->
                <a class="nav-link" href="{{url('admin/dashbord')}}">
                    <div class="sb-nav-link-icon">
                        <i class="fa-solid fa-person"></i>
                    </div>
                    Admin Dashbord  
                </a>
                <!-- adding car -->
                <a class="nav-link" href="{{url('admin/add-cars')}}">
                    <div class="sb-nav-link-icon">
                        <i class="fa-solid fa-car-side"></i>
                    </div>
                     Add Car 
                </a>
                <!-- Car CarItemController -->
                <a class="nav-link collapsed" href="{{url('admin/before_sale')}}" >
                    <div class="sb-nav-link-icon">
                        <i class="fa-regular fa-hand-point-left"></i>
                    </div>
                     Automobile Sale
                </a>
                <!-- CarsellController -->
                <a class="nav-link collapsed" href="{{url('admin/car_sells')}}" >
                    <div class="sb-nav-link-icon">
                        <i class="fa-solid fa-money-bill-wave"></i>
                    </div>
                    Car Sale  
                </a>
                <a class="nav-link collapsed" href="{{url('admin/saled')}}" >
                    <div class="sb-nav-link-icon">
                        <i class="fa-solid fa-car"></i>
                    </div>
                    History Of Saled Car 
                </a>
                <!-- Car info -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#employees" aria-expanded="false" aria-controls="employees">
                    <div class="sb-nav-link-icon">
                        <i class="fa-solid fa-people-roof"></i>
                    </div>
                        Employee 
                    <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-plus"></i></div>
                </a>
                <div class="collapse" id="employees" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{url('admin/employees')}}" >Employee </a>
                        <a  class="nav-link" href="{{url('admin/positions')}}">Position</a>
                    </nav>
                </div>
                <!-- Car info -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon">
                        <i class="fa-solid fa-info"></i>
                    </div>
                        Car Info
                    <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-plus"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{url('admin/car_models')}}"> Car Models </a>
                        <a class="nav-link" href="{{url('admin/brand')}}"> Car Brand </a>
                        <a class="nav-link" href="{{url('admin/grade')}}">Grade</a>
                        <a class="nav-link" href="{{url('admin/function')}}">Function </a>
                        <a class="nav-link" href="{{url('admin/default-function')}}">Default Function </a>
                        <a class="nav-link" href="{{url('admin/license-state')}}">License State </a>
                    </nav>
                </div>
                <!-- EngineController -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#aboutEngine" aria-expanded="false" aria-controls="aboutEngine">
                    <div class="sb-nav-link-icon">
                        <i class="fa-brands fa-searchengin"></i>
                    </div>
                        About Engine
                    <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-plus"></i></div>
                </a>
                <div class="collapse" id="aboutEngine" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{url('admin/engine')}}"> Engine </a>
                    </nav>
                </div>
                <!-- Car Contdition -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#car_condition" aria-expanded="false" aria-controls="car_condition">
                    <div class="sb-nav-link-icon">
                        <i class="fa-solid fa-car-tunnel"></i>
                    </div>
                        Car Condition 
                    <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-plus"></i></div>
                </a>
                <div class="collapse" id="car_condition" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{url('admin/seat')}}"> Car Seat </a>
                        <a class="nav-link" href="{{url('admin/key')}}">Car Key</a>
                        <a class="nav-link" href="{{url('admin/sun_roof')}}">Sun Roof </a>
                        <a class="nav-link" href="{{url('admin/sonar')}}">Car Sonar</a>
                        <a class="nav-link" href="{{url('admin/camera')}}">Car Camera</a>
                    </nav>
                </div>
                <!-- Panding state -->
                <a class="nav-link collapsed" href="{{url('admin/panding_state')}}" >
                    <div class="sb-nav-link-icon">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                        Panding State
                    <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-plus"></i></div>
                </a>
                <!-- Machines Name  -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#mechanic" aria-expanded="false" aria-controls="mechanic">
                    <div class="sb-nav-link-icon">
                        <i class="fa-solid fa-screwdriver-wrench"></i>                        
                    </div>
                        Mechanic
                    <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-plus"></i></div>
                </a>
                <div class="collapse" id="mechanic" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{url('admin/mechanic')}}"> Mechanic List </a>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
</div>