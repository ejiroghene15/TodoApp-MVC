<!DOCTYPE html>
@include('dashboard.partials.header')

<body>
    @yield('body')

    @section('logout')
        <!-- Modal -->
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
