<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Test Details</title>
    <!-- style-Bootstarp 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
</head>
<body>
    <a href="{{ url('lab_profile') }}" class="btn btn-secondary m-3">Back To Dashboard</a>
    <div class="d-flex justify-content-center">
        <h1>Client Test Results</h1>
    </div>
    <div class="mx-5">
        @if (session('status'))
            <h3 class="alert alert-success">{{session('status')}}</h3>
        @endif
    <table class="table" id="tableId">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Test</th>
                <th scope="col">Status</th>
                <th scope="col">Lab Name</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($test_details as $i => $test_detail) 

                <tr>
                    <th scope="row"><?php echo $i + 1 ?></th>
                    <td>{{ $test_detail->name }}</td>
                    <td>{{ $test_detail->test }}</td>
                    <td>{{$test_detail->status }}</td>
                    <td>{{$test_detail->lab_name }}</td>
                    <td>{{$test_detail->date }}</td>
                    <td>
                        {{-- <a href="{{route('test.show', $test_detail->id)}}" type="button" class="btn btn-sm btn-warning">view</a> --}}
                        <a href="{{route('test.edit', $test_detail->id)}}" type="button" class="btn btn-sm btn-primary">Edit</a>

                        <form method="post" action="{{route('test.destroy', $test_detail->id)}}" style="display:inline-block">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
       $(document).ready(function() {
            $('#tableId').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Contact"
                }
            });
        });
</script>
</body>
</html>