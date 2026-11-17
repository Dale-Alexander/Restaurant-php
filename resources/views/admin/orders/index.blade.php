@extends('layout.admin')

@section('title', 'Orders')
@section('heading', 'Orders')
@section('subheading', 'Track, manage and settle every order in one place')

@section('content')

    <div class="row g-3 g-xl-4 mb-4">
            <div class="col-6 col-xl-3">
                <div class="card stat-card p-3 p-md-4 h-100">
                    <div class="d-flex align-items-center gap-3">
                        <div class="stat-icon" style="background: {{ $stat['bg'] }}; color: {{ $stat['fg'] }};">
                            <i class="bi {{ $stat['icon'] }}"></i>
                        </div>
                        <div>
                            <div class="text-muted-2 small"></div>
                            <div class="h4 mb-0 fw-semibold"></div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="card p-3 p-md-4">
        <div class="d-flex flex-wrap align-items-center gap-3 mb-3">
            <ul class="nav nav-pills gap-1 me-auto" id="statusFilter">
                @foreach (['All', 'Pending', 'Preparing', 'Served', 'Cancelled'] as $tab)
                    <li class="nav-item">
                        <button type="button"
                                class="nav-link rounded-pill px-3 py-1 small {{ $loop->first ? 'active' : '' }}"
                                data-status="{{ $tab }}">
                            {{ $tab }}
                            <span class="opacity-75 ms-1">{{ $tab === 'All' ? count($orders) : ($counts[$tab] ?? 0) }}</span>
                        </button>
                    </li>
                @endforeach
            </ul>
            <a href="#" class="btn btn-brand px-3"><i class="bi bi-plus-lg me-1"></i> New Order</a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Customer</th>
                        <th>Table</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr data-status="{{ $order['status'] }}">
                            <td>
                                <div class="fw-semibold"></div>
                                <div class="text-muted-2 small"></div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="avatar" style="background: {{ $order['color'] }};"></div>
                                    <div class="lh-sm">
                                        <div class="fw-semibold small"></div>
                                        <div class="text-muted-2" style="font-size: .75rem;"></div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark border"></span></td>
                            <td class="small">
                                {{ collect($order['items'])->sum('qty') }} items
                                <div class="text-muted-2 text-truncate" style="max-width: 180px; font-size: .75rem;">
                                    {{ collect($order['items'])->pluck('name')->join(', ') }}
                                </div>
                            </td>
                            <td class="fw-semibold">${{ number_format($order['total'], 2) }}</td>
                            <td>
                                <span class="badge-soft {{ $paymentBadge[$order['payment']['status']] }}">{{$order['payment']['status']}}</span>
                                <div class="text-muted-2 mt-1" style="font-size: .75rem;">{{ $order['payment']['method'] }}</div>
                            </td>
                            <td>
                                <span class="badge-soft badge-{{ strtolower($order['status']) }}"></span>
                            </td>
                            <td class="text-end text-nowrap">
                                <button type="button" class="btn btn-light btn-sm rounded-3"
                                        data-bs-toggle="modal" data-bs-target="#order-{{ $order['id'] }}" title="View">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-light btn-sm rounded-3" data-bs-toggle="dropdown" title="More">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                        <li><a class="dropdown-item small" href="#"><i class="bi bi-fire me-2"></i>Mark Preparing</a></li>
                                        <li><a class="dropdown-item small" href="#"><i class="bi bi-check2-circle me-2"></i>Mark Served</a></li>
                                        <li><a class="dropdown-item small" href="#"><i class="bi bi-credit-card me-2"></i>Record Payment</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item small text-danger" href="#"><i class="bi bi-x-circle me-2"></i>Cancel Order</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mt-3">
            <small class="text-muted-2"></small>
            <nav>
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled"><a class="page-link" href="#"><i class="bi bi-chevron-left"></i></a></li>
                    <!-- <li class="page-item active"><a class="page-link" href="#" style="background: var(--brand); border-color: var(--brand);">1</a></li>
                    <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
                    <li class="page-item"><a class="page-link text-dark" href="#">3</a></li> -->
                    <li class="page-item"><a class="page-link text-dark" href="#"><i class="bi bi-chevron-right"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- ================= ORDER DETAIL MODALS ================= -->
    @foreach ($orders as $order)
        <div class="modal fade" id="order-{{ $order['id'] }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0" style="border-radius: var(--card-radius);">
                    <div class="modal-header border-0 pb-0">
                        <div>
                            <h5 class="modal-title font-display mb-1">Order #{{ $order['id'] }}</h5>
                            <span class="badge-soft badge-{{ strtolower($order['status']) }}">{{ $order['status'] }}</span>
                            <span class="text-muted-2 small ms-2">{{ $order['table'] }} · {{ $order['time'] }}</span>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex align-items-center gap-2 mb-3 p-2 rounded-3" style="background: var(--bg);">
                            <div class="avatar" style="background: {{ $order['color'] }};">{{ $order['initials'] }}</div>
                            <div class="lh-sm">
                                <div class="fw-semibold small">{{ $order['customer'] }}</div>
                                <div class="text-muted-2" style="font-size: .75rem;">{{ $order['phone'] }}</div>
                            </div>
                        </div>

                        <table class="table table-sm mb-3">
                            <thead>
                                <tr><th>Item</th><th class="text-center">Qty</th><th class="text-end">Price</th></tr>
                            </thead>
                            <tbody>
                                @foreach ($order['items'] as $item)
                                    <tr>
                                        <td class="small">{{ $item['name'] }}</td>
                                        <td class="small text-center">{{ $item['qty'] }}</td>
                                        <td class="small text-end">${{ number_format($item['qty'] * $item['price'], 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="small">
                            <div class="d-flex justify-content-between mb-1"><span class="text-muted-2">Subtotal</span><span>${{ number_format($order['subtotal'], 2) }}</span></div>
                            @if ($order['discount'] > 0)
                                <div class="d-flex justify-content-between mb-1 text-success"><span>Discount</span><span>−${{ number_format($order['discount'], 2) }}</span></div>
                            @endif
                            <div class="d-flex justify-content-between mb-2"><span class="text-muted-2">Tax (8%)</span><span>${{ number_format($order['tax'], 2) }}</span></div>
                            <div class="d-flex justify-content-between fw-semibold fs-6 pt-2 border-top"><span>Total</span><span>${{ number_format($order['total'], 2) }}</span></div>
                            <div class="d-flex justify-content-between mt-2">
                                <span class="text-muted-2">Payment ({{ $order['payment']['method'] }})</span>
                                <span class="badge-soft {{ $paymentBadge[$order['payment']['status']] }}">{{ $order['payment']['status'] }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">Close</button>
                        <a href="#" class="btn btn-brand"><i class="bi bi-printer me-1"></i> Print Receipt</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@push('styles')
    <style>
        #statusFilter .nav-link { color: var(--muted); background: transparent; }
        #statusFilter .nav-link.active { color: #fff; background: var(--brand); }
        #statusFilter .nav-link:not(.active):hover { background: var(--brand-soft); color: var(--brand); }
    </style>
@endpush

@push('scripts')
    <script>
        // Client-side status filter for the hardcoded rows
        document.querySelectorAll('#statusFilter [data-status]').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('#statusFilter .nav-link').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                const status = btn.dataset.status;
                document.querySelectorAll('tbody tr[data-status]').forEach(row => {
                    row.style.display = (status === 'All' || row.dataset.status === status) ? '' : 'none';
                });
            });
        });
    </script>
@endpush
