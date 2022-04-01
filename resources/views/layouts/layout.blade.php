<!DOCTYPE html>
<html lang="en">
<head>
@extends('inc.head')
</head>
<body>
    <div class="page-wrapper">
        <header class="header header-intro-clearance header-3">
            @include("inc.header")
        </header>
        <main class="main">
            @yield('main')
        </main>
        <footer class="footer">
            @include('inc.footer')
        </footer>
    </div>
    @include('inc.scroll_to_top')
    @include('inc.mobile_menu')
    @include('inc.register')
    @include('inc.scripts')
</body>

</html>