<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reports</title>
    <!-- style-Bootstarp 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.bootstrap5.min.css">
    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.bootstrap5.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
</head>

<body>
    <div class="col-md-12">
        <a href="{{ url('lab_profile') }}" class="btn btn-secondary m-3">Back To Dashboard</a>
        <div class="card-header d-flex display-5 justify-content-center">Appointments Report
        </div>
        <div class="card-body">

            <div class="col-md-12 mx-5">
                <form class="container">
                    <div class="form-row d-flex justify-content-between">
                        <div class="form-group col-md-3">
                            <label for="location" class="form-label">Location</label>
                            <select id="location" name="location" class="form-select">
                                <option selected>Location</option>
                                @foreach ($appointments as $appointment)
                                    <option value="{{ $appointment->location }}">
                                        {{ $appointment->location }}
                                    </option>
                                @endforeach

                            </select>

                        </div>
                        <div class="form-group col-md-3">
                            <label for="exampleInputPassword1" class="form-label">Start Date</label>
                            <input type="datetime-local" class="form-control" id="start_date">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="exampleInputPassword1" class="form-label">End Date</label>
                            <input type="datetime-local" class="form-control" id="end_date">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary col-md-3 m-5" id="filter">Filter</button>
                </form>

            </div>
            <br>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        {!! $dataTable->table() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! $dataTable->scripts() !!}

    <script>
        const table = $('#appointments-table');

        table.on('preXhr.dt', function(e, settings, data) {
            data.start_date = $('#start_date').val();
            data.end_date = $('#end_date').val();
            data.location = $('#location').val();
            console.log(data.start_date, data.end_date);
        });
        $('#filter').on('click', function() {
            table.DataTable().ajax.reload();
            return false;
        });

        $('#reset').on('click', function() {

            table.on('preXhr.dt', function(e, settings, data) {
                data.start_date = '';
                data.end_date = '';
                data.location = '';
            });

            table.DataTable().ajax.reload();
            return false;
        });



        $('#location').on('change', function() {
            table.DataTable().ajax.reload();
        });
    </script>
</body>

</html>
