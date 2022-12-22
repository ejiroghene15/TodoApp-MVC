<!DOCTYPE html>
@include('dashboard.partials.header')

<body class="hold-transition light-skin sidebar-mini theme-primary">
    <div class="wrapper">
        <div id="loader"></div>

        @include('dashboard.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
                @yield('body')
            </div>
        </div>

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            &copy; {{ date('Y') }} <a href="#"> Jiro's Todo App</a>.
        </footer>

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->

    @section('logout')
        <!-- Logout Modal -->
        <div class="modal center-modal fade" id="modal-center" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Logout</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to Logout?</p>
                    </div>
                    <div class="modal-footer modal-footer-uniform">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        <a href="{{ route('logout') }}" class="btn btn-danger float-right">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal -->
    @show

    @include('dashboard.partials.scripts')
    @yield('script')
</body>

</html>
