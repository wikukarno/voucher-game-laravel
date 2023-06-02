<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/">
            <span class="align-middle">AdminKit</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item {{ (request()->is('admin/dashboard') ? 'active' : '') }}">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-header">
                Master
            </li>

            <li class="sidebar-item {{ (request()->is('admin/category') ? 'active' : '') }}">
                <a class="sidebar-link" href="{{ route('category.index') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Kategori</span>
                </a>
            </li>

            <li class="sidebar-item {{ (request()->is('admin/nominal') ? 'active' : '') }}">
                <a class="sidebar-link" href="{{ route('nominal.index') }}">
                    <i class="align-middle" data-feather="target"></i> <span class="align-middle">Nominal</span>
                </a>
            </li>

            <li class="sidebar-item {{ (request()->is('admin/voucher') ? 'active' : '') }}">
                <a class="sidebar-link" href="{{ route('voucher.index') }}">
                    <i class="align-middle" data-feather="image"></i> <span class="align-middle">Voucher</span>
                </a>
            </li>

            <li class="sidebar-header">
                Metode Pembayaran
            </li>

            <li class="sidebar-item {{ (request()->is('admin/bank') ? 'active' : '') }}">
                <a class="sidebar-link" href="{{ route('bank.index') }}">
                    <i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Bank</span>
                </a>
            </li>

            <li class="sidebar-item {{ (request()->is('admin/payment') ? 'active' : '') }}">
                <a class="sidebar-link" href="{{ route('payment.index') }}">
                    <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Jenis
                        Pembayaran</span>
                </a>
            </li>

            <li class="sidebar-header">
                Transaksi
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-profile.html">
                    <i class="align-middle" data-feather="shopping-cart"></i> <span
                        class="align-middle">Transaksi</span>
                </a>
            </li>

        </ul>

    </div>
</nav>