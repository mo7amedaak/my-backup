<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="#">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png" alt="Job Board Logo" width="30" height="30" class="d-inline-block align-text-top me-2">
            JobBoard
        </a>

        <div class="d-flex align-items-center gap-3">

            <!-- Notification Dropdown -->
            <div class="dropdown position-relative">
                <button class="btn btn-light position-relative" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-bell fs-5"></i>
                    @if(($notifications->count() ?? 0) > 0)
                        <span class="notification-badge"></span>
                    @endif
                </button>

                <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="notificationDropdown" style="width: 300px; max-height: 300px; overflow-y: auto;">
                    <li class="dropdown-header fw-bold">Notifications</li>
                    <li><hr class="dropdown-divider"></li>

                    @forelse($notifications ?? [] as $notification)
                        <li>
                            <a class="dropdown-item small" href="#">
                                {{ $notification->data['message'] ?? 'New Notification' }}
                                <br>
                                <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                            </a>
                        </li>
                    @empty
                        <li class="dropdown-item text-muted small">No new notifications</li>
                    @endforelse

                    <li><hr class="dropdown-divider"></li>
                    <li class="text-center"><a href="#" class="small">View all</a></li>
                </ul>
            </div>
            <!-- End Notification Dropdown -->

            <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm rounded-pill">
                Profile
            </a>

            @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-sm rounded-pill">Dashboard</a>
            @elseif(Auth::user()->role === 'employer')
                <a href="{{ route('employer.dashboard') }}" class="btn btn-primary btn-sm rounded-pill">Dashboard</a>
            @elseif(Auth::user()->role === 'candidate')
                <a href="{{ route('candidate.dashboard') }}" class="btn btn-primary btn-sm rounded-pill">Dashboard</a>
            @endif

            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm rounded-pill">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>

<!-- CSS للنقطة الحمراء -->
<style>
.notification-badge {
    position: absolute;
    top: 4px;
    right: 4px;
    width: 8px;
    height: 8px;
    background: red;
    border-radius: 50%;
}
</style>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<!-- JavaScript لإخفاء النقطة بعد الضغط -->
<script>
document.getElementById('notificationDropdown').addEventListener('click', function () {
    fetch('{{ route("notifications.markAsRead") }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    }).then(response => response.json())
    .then(data => {
        if (data.success) {
            let badge = document.querySelector('.notification-badge');
            if (badge) badge.remove();
        }
    });
});
</script>
