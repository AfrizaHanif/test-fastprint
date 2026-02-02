<div class="d-flex flex-column shrink-0 p-3 text-bg-dark" style="width: 280px;"> <a href="/"
        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"> <svg
            class="bi pe-none me-2" width="40" height="32" aria-hidden="true">
            <use xlink:href="#bootstrap"></use>
        </svg> <span class="fs-4">Test Programmer</span> </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item"> <a href="/"
                class="{{ request()->is('/') ? 'nav-link active' : 'nav-link text-white' }}" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true">
                    <use xlink:href="#data"></use>
                </svg>
                Data Produk
            </a> </li>
        <li class="nav-item"> <a href="/settings"
                class="{{ request()->is('settings') ? 'nav-link active' : 'nav-link text-white' }}" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true">
                    <use xlink:href="#settings"></use>
                </svg>
                Pengaturan
            </a> </li>
        <li class="nav-item"> <a href="/logs"
                class="{{ request()->is('logs') ? 'nav-link active' : 'nav-link text-white' }}" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true">
                    <use xlink:href="#logs"></use>
                </svg>
                Logs
            </a> </li>
    </ul>
    {{-- <hr>
    <div class="dropdown"> <a href="#"
            class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false"> <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                class="rounded-circle me-2"> <strong>Menu</strong> </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="/logs">Logs</a></li>
        </ul>
    </div> --}}
</div>
