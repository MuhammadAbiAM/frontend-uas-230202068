<div class="sidebar p-3">
    <h4 class="text-center">SI Kesehatan</h4>
    <hr>
    <nav class="nav flex-column">
        <a href="{{ url('/') }}"
            class="nav-link {{ request()->is('/') ? 'active fw-bold text-primary' : 'text-light' }}">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
        </a>
        <a href="{{ route('pasien.index') }}"
            class="nav-link {{ request()->is('pasien*') ? 'active fw-bold text-primary' : 'text-light' }}">
            <i class="bi bi-book me-2"></i> Pasien
        </a>
        <a href="{{ route('obat.index') }}"
            class="nav-link {{ request()->is('obat*') ? 'active fw-bold text-primary' : 'text-light' }}">
            <i class="bi bi-grid-3x3-gap-fill me-2"></i> Obat
        </a>
    </nav>
</div>
