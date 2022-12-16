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
                                <div class="box">
                                    <div class="box-body">
                                        <div class="d-flex d-block align-items-center justify-content-between">
                                            <h4 class="box-title mb-md-0 mb-20" id="activity_info">
                                                <p id="activity_name"></p>
                                                <small id="activity_status"></small>
                                            </h4>
                                            <button data-target="#new-todo" data-toggle="modal"
                                                class="btn btn-sm btn-danger" id="delete_todo">
                                                Delete Todo
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="box">
                                    <div class="box-body">

                                        <form id="update-todo-form">
                                            <div class="form-group">
                                                <label for="">Todo Name</label>
                                                <input type="text" id="activity" name="activity" class="form-control">
                                                <input type="reset" hidden>
                                            </div>

                                            <div class="form-group">
                                                <label>Status</label>
                                                <select id="status" name="status" class="form-control">
                                                    <option value="1">Completed</option>
                                                    <option value="0">Pending</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <button class="btn btn-sm btn-info">Update Todo</button>
                                            </div>
                                        </form>

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
        <!-- Modal -->

    @section('logout')
        @parent
    @endsection

    <!-- /.modal -->

    <!-- /.modal -->
</body>
@endsection

@section('script')
<script>
    let id = "{{ $id }}";
    let auth_token = localStorage.getItem("auth");
    $.ajax({
        type: "GET",
        url: `${api_url}/todo/${id}`,
        headers: {
            Bearer: auth_token,
        },
        success: function(res, status, xhr) {
            if (typeof res == "object") {
                activity_name.textContent = res.activity
                activity.value = res.activity;
                if (res.status) {
                    activity_status.classList.add("btn", "btn-xs", "btn-success");
                    activity_status.textContent = "Completed"
                } else {
                    activity_status.classList.add("btn", "btn-xs", "btn-warning");
                    activity_status.textContent = "Pending"
                }
            }
        },
        error: function(xhr, status, error) {
            toastr.error(error);
        }
    });

    $("#update-todo-form").submit(function(e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.ajax({
            type: "PUT",
            url: `${api_url}/todo/update/${id}`,
            headers: {
                Bearer: auth_token,
            },
            data,
            success: function(result, status, xhr) {
                if (typeof result == "object") {
                    location.reload();
                }
            },
            error: function(xhr, status, error) {
                toastr.error(error);
            }
        });
    })

    $("#delete_todo").click(function() {
        $.ajax({
            type: "DELETE",
            url: `${api_url}/todo/delete/${id}`,
            headers: {
                Bearer: auth_token,
            },
            success: function(result, status, xhr) {
                if (status == "success") toastr.success("Item Deleted")
                setTimeout(() => {
                    window.location = "../dashboard"
                }, 2000);
            },
            error: function(xhr, status, error) {
                toastr.error(error);
            }
        });
    })
</script>
@endsection
