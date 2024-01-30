<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
                <div class="mt-5 mb-2">
                <img src="{{asset('images/logo.png')}}" height="49.73" width="158">
                </div>
            </a>

            <!-- Divider -->
            <hr>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
                    aria-expanded="true" aria-controls="collapsePages2">
                    <i class="fas fa-home"></i>
                    <span>Home Management</span>
                </a>
                <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('admin.slider')}}"><i class="fas fa-angle-double-right"></i> Slider</a>
                        <a class="collapse-item" href=""><i class="fas fa-angle-double-right"></i> About</a>
                        <a class="collapse-item" href=""><i class="fas fa-angle-double-right"></i> Product</a>
                        <a class="collapse-item" href="{{route('admin.client')}}"><i class="fas fa-angle-double-right"></i> Client</a>
                    </div>
                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages2">
                    <i class="fas fa-address-card"></i>
                    <span>About Us Management</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('admin.who')}}"><i class="fas fa-angle-double-right"></i> Who We Are</a>
                        <a class="collapse-item" href="{{route('admin.vision')}}"><i class="fas fa-angle-double-right"></i> Our Vision</a>
                        <a class="collapse-item" href="{{route('admin.mission')}}"><i class="fas fa-angle-double-right"></i> Our Mission</a>
                        <a class="collapse-item" href="{{route('admin.value')}}"><i class="fas fa-angle-double-right"></i> Value</a>
                        <a class="collapse-item" href="{{route('admin.services')}}"><i class="fas fa-angle-double-right"></i> Services</a>
                        <a class="collapse-item" href="{{route('admin.testimonials')}}"><i class="fas fa-angle-double-right"></i> Testimonial</a>
                    </div>
                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesx"
                    aria-expanded="true" aria-controls="collapsePages2">
                    <i class="fas fa-box-open"></i>
                    <span>Products Management</span>
                </a>
                <div id="collapsePagesx" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('admin.cats')}}"><i class="fas fa-angle-double-right"></i> Category</a>
                        <a class="collapse-item" href="{{route('admin.subcats')}}"><i class="fas fa-angle-double-right"></i> Sub-category</a>
                        
                    </div>
                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{route('admin.covers')}}">
                    <i class="fas fa-image"></i>
                    <span>Cover Image Management</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="">
                    <i class="fas fa-user-cog"></i>
                    <span>User Management</span></a>
            </li>

        </ul>
