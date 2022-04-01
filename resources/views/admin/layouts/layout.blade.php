<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.inc.head')
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            @include("admin.inc.nav")

            <div id="page-wrapper">
                <div class="container-fluid">
                   @yield('content')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        @include('admin.inc.scripts');
    </body>
</html>
