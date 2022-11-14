<!DOCTYPE html>

<html lang="en">
@include('User.header')

<body class="g-sidenav-show bg-gray-100">

    @include('User.sidenav')

    <main class="main-content border-radius-lg">
        <!-- Navbar -->
        @include('User.navbar')
        @include('User.alerts')

        <!-- End Navbar -->

        
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Test</th>
                        <th scope="col">Status</th>                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($test_details as $test_detail)
                        @if(Auth::user()->name === $test_detail->name)
                            <tr>
                                <td>{{ $test_detail->name }}</td>
                                <td>{{ $test_detail->date }}</td>                                
                                <td>{{ $test_detail->test }}</td>
                                <td>{{ $test_detail->status }}</td>
                                
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
    </main>

    <!--   Core JS Files   -->
    @include('User.javascript')
</body>

</html>
