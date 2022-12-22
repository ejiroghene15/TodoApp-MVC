@extends('dashboard.layout.master')

@section('body')
    <section class="content">
        @include('components.alert')
        <div class="row">

            <div class="col-12">
                <div class="box">
                    <div class="box-body">
                        @if ($item)
                            <div class="d-flex d-block align-items-center justify-content-between">
                                <h4 class="box-title mb-md-0 mb-20" id="activity_info">
                                    <p id="activity_name">{{ $item['activity'] }}</p>
                                    <small id="activity_status">
                                        <td>
                                            @if ($item['status'])
                                                <button class="btn btn-xs btn-success">Completed</button>
                                            @else
                                                <button class="btn btn-xs btn-warning">Pending</button>
                                            @endif
                                        </td>
                                    </small>
                                </h4>

                                <button data-target="#delete-todo" data-toggle="modal" class="btn btn-sm btn-danger">
                                    Delete Todo
                                </button>
                            </div>
                        @else
                            <p>Could not fetch Todo Item</p>
                        @endif
                    </div>
                </div>
            </div>

            @if ($item)
                <div class="col-12">
                    <div class="box">
                        <div class="box-body">

                            <form method="POST" action="{{ route('updateTodo', $item['_id']) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Todo Name</label>
                                    <input type="text" id="activity" name="activity" class="form-control"
                                        value="{{ $item['activity'] }}">
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1" @selected($item['status'] == 1)>
                                            Completed
                                        </option>

                                        <option value="0" @selected($item['status'] == 0)>
                                            Pending
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-sm btn-info">Update Todo</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <div class="modal center-modal fade" id="delete-todo" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Logout</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to Delete this Todo Item?</p>
                </div>
                <div class="modal-footer modal-footer-uniform d-flex justify-content-end">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('deleteTodo', $item['_id']) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button href="{{ route('logout') }}" class="btn btn-sm btn-success float-right">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
