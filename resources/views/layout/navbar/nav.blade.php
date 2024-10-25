<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 mb-5 shadow-lg rounded" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar">
            
            <ul class="navbar-nav">

                <li class="nav-item d-flex align-items-center mx-5">
                    {{ auth()->user()->name }}
                </li>

                <!-- logout icon -->
                <li class="nav-item d-flex align-items-center mx-5">
                    <form action="{{ route('logout') }}" method="POST">
                        <input type="hidden" name="_method" value="delete" />
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="btn-group" role="group" aria-label="exit button">
                            <button type="submit" class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="left" title="Exit">
                                <i class="bi bi-box-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </li>
                <!-- /. logout icon -->

            </ul>
        </div> <!-- /. div collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end -->
    </div> <!-- /. div container-fluid py-1 px-3 -->
</nav>