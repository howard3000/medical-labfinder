<!DOCTYPE html>

<html lang="en">

<base href="/public">

@include('User.header')

<body class="g-sidenav-show bg-gray-100">

    @include('User.sidenav')

    <main class="main-content border-radius-lg">
        <!-- Navbar -->
        @include('User.navbar')
        @include('User.alerts')

        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="container-fluid py-4">
                <form action="{{ url('create_appointment', $lab->id) }}" method="post">
                    @csrf
                    <div class="form-group mb-5">
                        <label for="tests">Tests Offered</label>
                        <select id="tests" name="tests"
                            style="width:100%; height:40px; border-radius:6px; padding:5px; !important"
                            class="custom-select custom-select-lg mb-3">
                            @if ($test = $lab->tests)
                                <option value="{{ $test }}">{{ $test }}</option>
                            @endif
                        </select>
                    </div>
                    <div style="width:100% !important" class="form-group mb-5">
                        <label for="test">Enter the test</label>
                        @php
                            $no = $lab->tests;
                            $yes = explode(',', $no);
                        @endphp
                        <select name="test_name"
                            style="width:100%; height:40px; border-radius:6px; padding:5px; !important"
                            class="custom-select custom-select-lg mb-3">
                            @foreach ($yes as $te)
                                <option value="{{ $te }}">{{ $te }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div style="width:100% !important" class="form-group mb-5">
                        <label for="test">Select Day of test</label>
                        <input name="date" style="border:1px solid grey; border-radius:5px; !important"
                            type="date" class="form-control">
                    </div>
                    <div class="form-group mb-5">
                        <label for="time">select time of test</label>
                        <select name="time"
                            style="width:100%; height:40px; border-radius:6px; padding:5px; !important"
                            class="custom-select custom-select-lg mb-3">
                            <option>--Select Time--</option>
                            <option value="0700">7:00-8:00</option>
                            <option value="0800">8:00-9:00</option>
                            <option value="0900">9:00-10:00</option>
                            <option value="1000">10:00-11:00</option>
                            <option value="1100">11:00-12:00</option>
                            <option value="1200">12:00-1:00</option>
                            <option value="1300">1:00-2:00</option>
                            <option value="1400">2:00-3:00</option>
                            <option value="1500">3:00-4:00</option>
                            <option value="1600">4:00-5:00</option>
                        </select>
                    </div>
                    <input type="submit" value="Submit" class="btn btn-primary">
                </form>
            </div>


    </main>

    <!--   Core JS Files   -->
    @include('User.javascript')
</body>

</html>
