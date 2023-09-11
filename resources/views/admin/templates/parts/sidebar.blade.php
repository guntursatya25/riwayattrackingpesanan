<ul class="menu">
    <li class="sidebar-title">Menu</li>

    <li class="sidebar-item">
        <a href="/admin" class="sidebar-link">
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>
    {{-- <li class="sidebar-item">
        <a href="{{ route('tambah') }}" class="sidebar-link">
            <i class="bi bi-bag-plus-fill"></i>
            <span>Tambah Pesanan</span>
        </a>
    </li> --}}
    <li class="sidebar-item">
        <a href="{{ route('tracking') }}" class="sidebar-link">
            <i class="bi bi-clipboard-fill"></i>
            <span>Status Pesanan </span>
        </a>
    </li>
    <li class="sidebar-item">
        <a href="{{ route('ulasan') }}" class="sidebar-link">
            <i class="bi bi-star-fill"></i>
            <span>Ulasan</span>
        </a>
    </li>
</ul>
