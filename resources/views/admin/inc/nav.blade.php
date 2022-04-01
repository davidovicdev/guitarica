<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{route("adminpanel.index")}}">Guitarica - Admin Panel</a>
    </div>

   
    <ul class="nav navbar-right navbar-top-links">
        <li>

            <a class="btn btn-dark" href="{{route("index")}}">Go Back</a>
        </li>
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{route("adminpanel.index")}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="{{route("adminpanel.activites")}}"><i class="fa fa-table fa-fw"></i> Activites</a>
                </li>    
                <li>
                    <a href="{{route("adminpanel.users")}}"><i class="fa fa-table fa-fw"></i> Users</a>
                </li>  
                <li>
                    <a href="{{route("adminpanel.orders")}}"><i class="fa fa-table fa-fw"></i> Orders</a>
                </li>  
                <li>
                    <a href="{{route("adminpanel.categories")}}"><i class="fa fa-table fa-fw"></i> Categories</a>
                </li>      
                <li>
                    <a href="{{route("adminpanel.products")}}"><i class="fa fa-table fa-fw"></i> Products</a>
                </li>           
            </ul>
        </div>
    </div>
</nav>