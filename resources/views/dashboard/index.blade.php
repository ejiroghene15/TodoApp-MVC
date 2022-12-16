@extends('dashboard.layout.master')

@section('body')

    <body class="hold-transition light-skin sidebar-mini theme-primary">

        <div class="wrapper">
            <div id="loader"></div>

            @include('dashboard.partials.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <div class="box">
                                            <div class="box-body py-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h5 class="text-fade">All Todos</h5>
                                                        <h2 class="font-weight-500 mb-0" id="all_todo">0</h2>
                                                    </div>
                                                    <div>
                                                        <div id="revenue1"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12">
                                        <div class="box">
                                            <div class="box-body py-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h5 class="text-fade">Completed Todos</h5>
                                                        <h2 class="font-weight-500 mb-0" id="completed_todo">0</h2>
                                                    </div>
                                                    <div>
                                                        <div id="revenue2"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12">
                                        <div class="box">
                                            <div class="box-body py-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h5 class="text-fade">Pending Todos</h5>
                                                        <h2 class="font-weight-500 mb-0" id="pending_todo">0</h2>
                                                    </div>
                                                    <div>
                                                        <div id="revenue3"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Main content -->

                            <div class="col-12">
                                <div class="box">
                                    <div class="box-body">
                                        <div class="d-flex d-block align-items-center justify-content-between">
                                            <h4 class="box-title mb-md-0 mb-20">My Todos</h4>
                                            <button data-target="#new-todo" data-toggle="modal"
                                                class="btn btn-sm btn-primary">
                                                Add New Todo
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="box">
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="dt" class="table table-bordered table-striped">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                    <!-- /.content -->
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
        @parent
    @endsection

    <!-- Create Todo -->
    <div class="modal fade" id="new-todo" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Todo</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="new-todo-form">
                        <div class="form-group">
                            <label for="">Todo Name</label>
                            <input type="text" id="activity" name="activity" class="form-control">
                            <input type="reset" hidden>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-sm btn-success">Add Todo</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- /.modal -->
</body>
@endsection

@section('script')
@parent
<script src="{{ asset('js/app.js') }}"></script>
@endsection
