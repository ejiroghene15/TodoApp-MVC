$.post(`${api_url}/auth`, {
    user: auth_user,
}).then((res) => {
    if (!localStorage.getItem("auth")) localStorage.setItem("auth", res.token);
});

$("#new-todo-form").submit(function (e) {
    e.preventDefault();
    let data = $(this).serializeArray();
    let auth_token = localStorage.getItem("auth");

    $.ajax({
        type: "POST",
        url: `${api_url}/todo/new`,
        headers: {
            Bearer: auth_token,
        },
        data,
        success: function (res, status, xhr) {
            if (typeof res == "object") {
                location.reload();
            }
        },
        error: function (xhr, status, error) {
            toastr.error(error);
        },
    });
});

function getTodo() {
    let auth_token = localStorage.getItem("auth");
    $("#dt").DataTable({
        ajax: {
            url: `${api_url}/todo`,
            headers: {
                Bearer: auth_token,
            },
        },
        columns: [{ data: "activity" }, { data: "status" }, { data: "action" }],
    });

    $.ajax({
        type: "GET",
        url: `${api_url}/todo`,
        headers: {
            Bearer: auth_token,
        },
        success: function ({ data }, status, xhr) {
            let total = data.length;
            let pending = data.filter(
                (val, index) => val.original_status == 0
            ).length;
            let completed = data.filter(
                (val, index) => val.original_status == 1
            ).length;

            all_todo.textContent = total.toLocaleString();
            pending_todo.textContent = pending.toLocaleString();
            completed_todo.textContent = completed.toLocaleString();
            chartDisplay(total, pending, completed);
        },
        error: function (xhr, status, error) {
            toastr.error(error);
        },
    });
}

function chartDisplay(total, pending, completed) {
    var all_todo_options = {
        chart: {
            height: 150,
            width: 150,
            type: "radialBar",
        },

        series: [total ? 100 : 0],
        colors: ["#673ab7"],
        plotOptions: {
            radialBar: {
                hollow: {
                    margin: 0,
                    size: "60%",
                },
                track: {
                    background: "#e7daff",
                },

                dataLabels: {
                    showOn: "always",
                    name: {
                        show: false,
                    },
                    value: {
                        offsetY: 5,
                        color: "#111",
                        fontSize: "20px",
                        show: true,
                    },
                },
            },
        },

        stroke: {
            lineCap: "round",
        },
        labels: ["Progress"],
    };

    var all_todo_chart = new ApexCharts(document.querySelector("#revenue1"), all_todo_options);

    all_todo_chart.render();

    var options = {
        chart: {
            height: 150,
            width: 150,
            type: "radialBar",
        },

        series: [
            completed ? parseInt(100 - ((total - completed) / total) * 100) : 0,
        ],
        colors: ["#3da643"],
        plotOptions: {
            radialBar: {
                hollow: {
                    margin: 0,
                    size: "60%",
                },
                track: {
                    background: "#e9f5ea",
                },

                dataLabels: {
                    showOn: "always",
                    name: {
                        show: false,
                    },
                    value: {
                        offsetY: 5,
                        color: "#111",
                        fontSize: "20px",
                        show: true,
                    },
                },
            },
        },

        stroke: {
            lineCap: "round",
        },
        labels: ["Progress"],
    };

    var chart = new ApexCharts(document.querySelector("#revenue2"), options);

    chart.render();

    var options = {
        chart: {
            height: 150,
            width: 150,
            type: "radialBar",
        },

        series: [
            pending ? parseInt(100 - ((total - pending) / total) * 100) : 0,
        ],
        colors: ["#fdac42"],
        plotOptions: {
            radialBar: {
                hollow: {
                    margin: 0,
                    size: "60%",
                },
                track: {
                    background: "#fde5ba",
                },

                dataLabels: {
                    showOn: "always",
                    name: {
                        show: false,
                    },
                    value: {
                        offsetY: 5,
                        color: "#111",
                        fontSize: "20px",
                        show: true,
                    },
                },
            },
        },

        stroke: {
            lineCap: "round",
        },
        labels: ["Progress"],
    };

    var chart = new ApexCharts(document.querySelector("#revenue3"), options);

    chart.render();
}

setTimeout(() => {
    getTodo();
}, 1000);
