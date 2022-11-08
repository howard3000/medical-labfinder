<div class="container">
    <div class="row d-flex justify-content-center align-items-center col-md-8">
        <div class="instructions mt-5">
            <p>Hey pay first so that to activate your account</p>
        </div>
        <form action="{{ url('stkpush') }}" method="POST">
            <div class="form mt-5">
                @csrf
                <div class="mb-3">
                    <input type="submit" value="Pay Now" class="form-control btn btn-primary btn-lg">
                </div>
            </div>
        </form>
    </div>
</div>
