<!DOCTYPE html>
<html lang="en">
@include('Labowner.header')

<body class="g-sidenav-show bg-gray-100">

    @include('Labowner.sidenav')

    <main class="main-content border-radius-lg">
        @include('Labowner.navbar')
        @include('Labowner.alerts')

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
    </main>
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
 <!--   Core JS Files   -->
 @include('Labowner.javascript')
</body>

</html>
