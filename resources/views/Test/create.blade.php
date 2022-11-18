<!DOCTYPE html>
<html lang="en">
@include('Labowner.header')

<body class="g-sidenav-show bg-gray-100">

    @include('Labowner.sidenav')

    <main class="main-content border-radius-lg">
        @include('Labowner.navbar')
        @include('Labowner.alerts')

        <div class="container">
            <div class="row">
                <div class="card mt-2 col col-md-8 mx-auto">
                    @if (session('status'))
                        <h3 class="alert alert-success">{{ session('status') }}</h3>
                    @endif
                    {{-- <div class="card-header col-md-12">
                        Enter Test Details
                    </div> --}}
                    <div class="card-body">
                        <form action="{{ route('test.create') }}" method="POST">
                            @csrf
                            {{-- <div class="col-md-12 mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control @error('name') border border-danger @enderror" name="name" id="name" placeholder="enter fullname">
                                @error('name')
                                <div class="danger">{{$message}}</div>
                                @enderror
                            </div> --}}

                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <select id="name" name="name"
                                    class="form-select mt-2 @error('name') border border-danger @enderror">
                                    @foreach ($appointments as $appointment)
                                        <option value="{{ $appointment->fullname }}">{{ $appointment->fullname }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('name')
                                    <div class="danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="date" class="form-label">Date of Test</label>
                                @foreach ($appointments as $appointment)
                                    <input type="date"
                                        class="form-select mt-2 @error('date') border border-danger @enderror"
                                        name="date" id="date" value="{{ $appointment->date }}">
                                @endforeach

                                @error('date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="test" class="form-label">Test</label>
                                <select id="test" name="test"
                                    class="form-select mt-2 @error('test') border border-danger @enderror">
                                    @foreach ($appointments as $appointment)
                                        <option selected value="{{ $appointment->test }}">{{ $appointment->test }}
                                        </option>
                                    @endforeach
                                    <option value="arthritis">arthritis</option>
                                    <option value="blood pressure">blood pressure</option>
                                    <option value="corona">corona</option>
                                    <option value="diabetes">diabetes</option>
                                    <option value="drug toxicology">drug toxicology</option>
                                    <option value="hepatitis a">hepatitis a</option>
                                    <option value="hepatitis b">hepatitis b</option>
                                    <option value="hcv">hcv</option>
                                    <option value="h pylori">h pylori</option>
                                    <option value="urinalysis">urinalysis</option>
                                </select>
                                @error('test')
                                    <div class="danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select id="status" name="status"
                                    class="form-select mt-2 @error('status') border border-danger @enderror">
                                    <option value="High">High</option>
                                    <option value="Low">Low</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Positive">Positive</option>
                                    <option value="Negative">Negative</option>
                                </select>
                                @error('status')
                                    <div class="danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="lab_name" class="form-label">Lab Name</label>
                                <select id="lab_name" name="lab_name"
                                    class="form-select mt-2 @error('lab_name') border border-danger @enderror">

                                    @foreach ($labs as $lab)
                                        @if (Auth::user()->id == $lab->user_id)
                                            <option value="{{ $lab->name }}">{{ $lab->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('lab_name')
                                    <div class="danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- <div class="col-md-12 mb-3">
                                <label for="lab_name" class="form-label">Lab Name</label>
                                <input type="text" class="form-control @error('lab_name') border border-danger @enderror" name="lab_name" id="name" placeholder="enter fullname">
                                @error('lab_name')
                                <div class="danger">{{$message}}</div>
                                @enderror
                            </div> --}}
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary my-3 " style="width: 50% ">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!--   Core JS Files   -->
    @include('Labowner.javascript')
</body>

</html>
