@if (Session::has('success'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-success bg-success text-white border-0" role="alert">
                {{ session('success') }}
            </div>
        </div>
    </div>
@elseif (Session::has('error'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger bg-danger text-white border-0" role="alert">
                {{ session('error') }}
            </div>
        </div>
    </div>
    @elseif (Session::has('warning'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-warning bg-warning text-white border-0" role="alert">
                {{ session('warning') }}
            </div>
        </div>
    </div>
@endif
