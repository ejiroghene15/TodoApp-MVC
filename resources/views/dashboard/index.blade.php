@extends('dashboard.layout.master')

@section('body')
    <section class="content">
        @include('components.alert')
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
                            <button data-target="#new-todo" data-toggle="modal" class="btn btn-sm btn-primary">
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
                                        <th hidden></th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($todo as $item)
                                        <tr>
                                            <td hidden>{{ $item['status'] }}</td>
                                            <td>{{ $item['activity'] }}</td>
                                            <td>
                                                @if ($item['status'])
                                                    <button class="btn btn-xs btn-success">Completed</button>
                                                @else
                                                    <button class="btn btn-xs btn-warning">Pending</button>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('showTodo', $item['_id']) }}" class="btn btn-xs btn-info">
                                                    View Todo
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                    <form method="POST" action="{{ route('addTodo') }}">
                        @csrf

                        <div class="form-group">
                            <label for="">Todo Name</label>
                            <input type="text" id="activity" name="activity" class="form-control">
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
@endsection

@section('script')
    <script>
        let total = {{ count($todo) }}
        let data = {{ Js::from($todo) }}
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
