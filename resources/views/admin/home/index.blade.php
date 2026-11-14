@extends('layout.admin')

@section('title', 'Dashboard')
@section('heading', 'Good evening, Chef')
@section('subheading', 'Saturday, 14 November 2026')

@section('content')
    <!-- Hero banner -->
    <div class="hero p-4 p-md-5 mb-4">
        <div class="row align-items-center g-3">
            <div class="col-md-8">
                <span class="badge rounded-pill bg-white bg-opacity-25 mb-3 px-3 py-2">
                    <i class="bi bi-circle-fill text-success me-1" style="font-size: .5rem;"></i> Restaurant is open
                </span>
                <h2 class="font-display mb-2">Tonight looks busy!</h2>
                <p class="mb-0 opacity-75">18 reservations booked and 12 orders currently in the kitchen.</p>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="#" class="btn btn-light rounded-pill px-4 fw-semibold me-2"><i class="bi bi-plus-lg me-1"></i> New Order</a>
            </div>
        </div>
    </div>

    <!-- Stat cards -->
    <div class="row g-3 g-xl-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card stat-card p-4 h-100">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="stat-icon" style="background: var(--brand-soft); color: var(--brand);"><i class="bi bi-cash-stack"></i></div>
                    <span class="badge-soft badge-served"><i class="bi bi-arrow-up-short"></i>12.5%</span>
                </div>
                <p class="text-muted-2 small mb-1">Today's Revenue</p>
                <h3 class="fw-bold mb-0">$4,820.50</h3>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card stat-card p-4 h-100">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="stat-icon" style="background: #e6f0ff; color: #2b6cb0;"><i class="bi bi-bag-check"></i></div>
                    <span class="badge-soft badge-served"><i class="bi bi-arrow-up-short"></i>8.2%</span>
                </div>
                <p class="text-muted-2 small mb-1">Total Orders</p>
                <h3 class="fw-bold mb-0">128</h3>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card stat-card p-4 h-100">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="stat-icon" style="background: #fff4e0; color: #b7791f;"><i class="bi bi-calendar-heart"></i></div>
                    <span class="badge-soft badge-cancelled"><i class="bi bi-arrow-down-short"></i>3.1%</span>
                </div>
                <p class="text-muted-2 small mb-1">Reservations</p>
                <h3 class="fw-bold mb-0">18</h3>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card stat-card p-4 h-100">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="stat-icon" style="background: #e6f6ec; color: #2f855a;"><i class="bi bi-people"></i></div>
                    <span class="badge-soft badge-served"><i class="bi bi-arrow-up-short"></i>5.4%</span>
                </div>
                <p class="text-muted-2 small mb-1">New Customers</p>
                <h3 class="fw-bold mb-0">42</h3>
            </div>
        </div>
    </div>

    <!-- Revenue chart + Top dishes -->
    <div class="row g-3 g-xl-4 mb-4">
        <div class="col-xl-8">
            <div class="card p-4 h-100">
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
                    <div>
                        <h5 class="fw-semibold mb-0">Weekly Revenue</h5>
                        <p class="text-muted-2 small mb-0">8 Nov - 14 Nov 2026</p>
                    </div>
                    <div class="btn-group btn-group-sm">
                        <a href="#" class="btn btn-brand">Week</a>
                        <a href="#" class="btn btn-light">Month</a>
                        <a href="#" class="btn btn-light">Year</a>
                    </div>
                </div>
                <div class="chart pt-4">
                    <div class="bar-wrap"><div class="bar" style="height: 55%;"><span>$2,940</span></div><small>Sun</small></div>
                    <div class="bar-wrap"><div class="bar" style="height: 40%;"><span>$2,180</span></div><small>Mon</small></div>
                    <div class="bar-wrap"><div class="bar" style="height: 48%;"><span>$2,610</span></div><small>Tue</small></div>
                    <div class="bar-wrap"><div class="bar" style="height: 62%;"><span>$3,350</span></div><small>Wed</small></div>
                    <div class="bar-wrap"><div class="bar" style="height: 70%;"><span>$3,780</span></div><small>Thu</small></div>
                    <div class="bar-wrap"><div class="bar" style="height: 85%;"><span>$4,560</span></div><small>Fri</small></div>
                    <div class="bar-wrap"><div class="bar today" style="height: 90%;"><span>$4,820</span></div><small class="fw-semibold text-dark">Sat</small></div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card p-4 h-100">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-semibold mb-0">Top Dishes</h5>
                    <a href="#" class="small fw-semibold" style="color: var(--brand);">View all</a>
                </div>

                <div class="d-flex align-items-center gap-3 mb-4">
                    <img class="dish-img" src="https://images.unsplash.com/photo-1544025162-d76694265947?w=200" alt="Ribeye Steak">
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between"><span class="fw-semibold small">Grilled Ribeye</span><span class="small text-muted-2">86 sold</span></div>
                        <div class="progress mt-2"><div class="progress-bar" style="width: 92%;"></div></div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3 mb-4">
                    <img class="dish-img" src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=200" alt="Pizza">
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between"><span class="fw-semibold small">Margherita Pizza</span><span class="small text-muted-2">72 sold</span></div>
                        <div class="progress mt-2"><div class="progress-bar" style="width: 78%;"></div></div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3 mb-4">
                    <img class="dish-img" src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=200" alt="Salad">
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between"><span class="fw-semibold small">Garden Salad</span><span class="small text-muted-2">58 sold</span></div>
                        <div class="progress mt-2"><div class="progress-bar" style="width: 62%;"></div></div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <img class="dish-img" src="https://images.unsplash.com/photo-1563805042-7684c019e1cb?w=200" alt="Dessert">
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between"><span class="fw-semibold small">Berry Cheesecake</span><span class="small text-muted-2">41 sold</span></div>
                        <div class="progress mt-2"><div class="progress-bar" style="width: 45%;"></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent orders + Reservations -->
    <div class="row g-3 g-xl-4 mb-4">
        <div class="col-xl-8">
            <div class="card h-100">
                <div class="d-flex justify-content-between align-items-center p-4 pb-2">
                    <h5 class="fw-semibold mb-0">Recent Orders</h5>
                    <a href="#" class="small fw-semibold" style="color: var(--brand);">View all</a>
                </div>
                <div class="table-responsive px-2">
                    <table class="table align-middle mb-2">
                        <thead>
                            <tr>
                                <th>Order</th>
                                <th>Customer</th>
                                <th>Table</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th class="text-end"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-semibold">#1048</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar" style="background: #e0a458; width: 34px; height: 34px;">SM</div>
                                        Sarah Mitchell
                                    </div>
                                </td>
                                <td>T-04</td>
                                <td class="fw-semibold">$86.40</td>
                                <td><span class="badge-soft badge-preparing">Preparing</span></td>
                                <td class="text-end"><a href="#" class="btn btn-sm btn-light rounded-3"><i class="bi bi-three-dots"></i></a></td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">#1047</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar" style="background: #5a8f7b; width: 34px; height: 34px;">JD</div>
                                        James Dalton
                                    </div>
                                </td>
                                <td>T-11</td>
                                <td class="fw-semibold">$142.00</td>
                                <td><span class="badge-soft badge-served">Served</span></td>
                                <td class="text-end"><a href="#" class="btn btn-sm btn-light rounded-3"><i class="bi bi-three-dots"></i></a></td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">#1046</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar" style="background: #6b5b95; width: 34px; height: 34px;">AP</div>
                                        Aisha Patel
                                    </div>
                                </td>
                                <td>T-02</td>
                                <td class="fw-semibold">$54.90</td>
                                <td><span class="badge-soft badge-pending">Pending</span></td>
                                <td class="text-end"><a href="#" class="btn btn-sm btn-light rounded-3"><i class="bi bi-three-dots"></i></a></td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">#1045</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar" style="background: #c8553d; width: 34px; height: 34px;">LK</div>
                                        Liam Kowalski
                                    </div>
                                </td>
                                <td>T-07</td>
                                <td class="fw-semibold">$210.75</td>
                                <td><span class="badge-soft badge-served">Served</span></td>
                                <td class="text-end"><a href="#" class="btn btn-sm btn-light rounded-3"><i class="bi bi-three-dots"></i></a></td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">#1044</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar" style="background: #3d5a80; width: 34px; height: 34px;">EM</div>
                                        Emma Moreau
                                    </div>
                                </td>
                                <td>Takeaway</td>
                                <td class="fw-semibold">$38.20</td>
                                <td><span class="badge-soft badge-cancelled">Cancelled</span></td>
                                <td class="text-end"><a href="#" class="btn btn-sm btn-light rounded-3"><i class="bi bi-three-dots"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card p-4 h-100">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-semibold mb-0">Today's Reservations</h5>
                    <a href="#" class="btn btn-sm btn-brand"><i class="bi bi-plus-lg"></i></a>
                </div>

                <div class="d-flex align-items-center gap-3 mb-3 pb-3 border-bottom">
                    <div class="text-center px-2 py-1 rounded-3" style="background: var(--brand-soft); color: var(--brand); min-width: 62px;">
                        <div class="fw-bold">18:30</div>
                    </div>
                    <div class="flex-grow-1">
                        <div class="fw-semibold small">Olivia Bennett</div>
                        <div class="text-muted-2" style="font-size: .78rem;"><i class="bi bi-people me-1"></i>4 guests &middot; Table 6</div>
                    </div>
                    <span class="badge-soft badge-served">Confirmed</span>
                </div>
                <div class="d-flex align-items-center gap-3 mb-3 pb-3 border-bottom">
                    <div class="text-center px-2 py-1 rounded-3" style="background: var(--brand-soft); color: var(--brand); min-width: 62px;">
                        <div class="fw-bold">19:00</div>
                    </div>
                    <div class="flex-grow-1">
                        <div class="fw-semibold small">Noah Fernandes</div>
                        <div class="text-muted-2" style="font-size: .78rem;"><i class="bi bi-people me-1"></i>2 guests &middot; Table 3</div>
                    </div>
                    <span class="badge-soft badge-pending">Pending</span>
                </div>
                <div class="d-flex align-items-center gap-3 mb-3 pb-3 border-bottom">
                    <div class="text-center px-2 py-1 rounded-3" style="background: var(--brand-soft); color: var(--brand); min-width: 62px;">
                        <div class="fw-bold">19:45</div>
                    </div>
                    <div class="flex-grow-1">
                        <div class="fw-semibold small">Chen Wei</div>
                        <div class="text-muted-2" style="font-size: .78rem;"><i class="bi bi-people me-1"></i>8 guests &middot; Table 12</div>
                    </div>
                    <span class="badge-soft badge-served">Confirmed</span>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <div class="text-center px-2 py-1 rounded-3" style="background: var(--brand-soft); color: var(--brand); min-width: 62px;">
                        <div class="fw-bold">20:30</div>
                    </div>
                    <div class="flex-grow-1">
                        <div class="fw-semibold small">Grace Okafor</div>
                        <div class="text-muted-2" style="font-size: .78rem;"><i class="bi bi-people me-1"></i>3 guests &middot; Table 9</div>
                    </div>
                    <span class="badge-soft badge-served">Confirmed</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment methods + Quick actions -->
    <div class="row g-3 g-xl-4">
        <div class="col-lg-6">
            <div class="card p-4 h-100">
                <h5 class="fw-semibold mb-4">Payment Methods</h5>
                <div class="mb-3">
                    <div class="d-flex justify-content-between small mb-1"><span><i class="bi bi-credit-card me-2 text-muted-2"></i>Card</span><span class="fw-semibold">58%</span></div>
                    <div class="progress"><div class="progress-bar" style="width: 58%;"></div></div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between small mb-1"><span><i class="bi bi-cash me-2 text-muted-2"></i>Cash</span><span class="fw-semibold">27%</span></div>
                    <div class="progress"><div class="progress-bar" style="width: 27%;"></div></div>
                </div>
                <div>
                    <div class="d-flex justify-content-between small mb-1"><span><i class="bi bi-phone me-2 text-muted-2"></i>Mobile Pay</span><span class="fw-semibold">15%</span></div>
                    <div class="progress"><div class="progress-bar" style="width: 15%;"></div></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card p-4 h-100">
                <h5 class="fw-semibold mb-4">Quick Actions</h5>
                <div class="row g-3">
                    <div class="col-6">
                        <a href="#" class="d-block text-center p-3 rounded-4 stat-card text-reset" style="background: var(--brand-soft);">
                            <i class="bi bi-plus-circle fs-4" style="color: var(--brand);"></i>
                            <div class="small fw-semibold mt-1">Add Menu Item</div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="#" class="d-block text-center p-3 rounded-4 stat-card text-reset" style="background: #e6f0ff;">
                            <i class="bi bi-calendar-plus fs-4" style="color: #2b6cb0;"></i>
                            <div class="small fw-semibold mt-1">New Reservation</div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="#" class="d-block text-center p-3 rounded-4 stat-card text-reset" style="background: #fff4e0;">
                            <i class="bi bi-tags fs-4" style="color: #b7791f;"></i>
                            <div class="small fw-semibold mt-1">Add Category</div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="#" class="d-block text-center p-3 rounded-4 stat-card text-reset" style="background: #e6f6ec;">
                            <i class="bi bi-file-earmark-bar-graph fs-4" style="color: #2f855a;"></i>
                            <div class="small fw-semibold mt-1">View Reports</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
