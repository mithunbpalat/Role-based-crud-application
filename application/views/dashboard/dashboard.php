
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$total_users = isset($total_users) ? $total_users : 0;
$total_orders = isset($total_orders) ? $total_orders : 0;
$total_revenue = isset($total_revenue) ? $total_revenue : 0;
$pending_orders = isset($pending_orders) ? $pending_orders : 0;

$recent_users = isset($recent_users) && is_array($recent_users)
    ? $recent_users : [];
?>

<div class="mb-4">
    <h4 class="fw-bold mb-1">Dashboard Overview</h4>
    <p class="text-secondary mb-0">
        Welcome back! Here's what's happening with your application.
    </p>
</div>

<!-- Statistics -->
<div class="row g-4 mb-4">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-secondary mb-2">Total Users</p>
                    <h3 class="fw-bold mb-0">
                        <?= number_format((int) $total_users); ?>
                    </h3>
                </div>
                <div class="rounded-3 bg-primary-subtle text-primary p-3">
                    <i class="fa-solid fa-users fa-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-secondary mb-2">Total Orders</p>
                    <h3 class="fw-bold mb-0">
                        <?= number_format((int) $total_orders); ?>
                    </h3>
                </div>
                <div class="rounded-3 bg-success-subtle text-success p-3">
                    <i class="fa-solid fa-bag-shopping fa-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-secondary mb-2">Revenue</p>
                    <h3 class="fw-bold mb-0">
                        <?= html_escape(number_format((float) $total_revenue, 2)); ?>
                    </h3>
                </div>
                <div class="rounded-3 bg-warning-subtle text-warning p-3">
                    <i class="fa-solid fa-wallet fa-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-secondary mb-2">Pending Orders</p>
                    <h3 class="fw-bold mb-0">
                        <?= number_format((int) $pending_orders); ?>
                    </h3>
                </div>
                <div class="rounded-3 bg-danger-subtle text-danger p-3">
                    <i class="fa-solid fa-clock fa-xl"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick actions -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-3">Quick Actions</h5>

        <div class="d-flex flex-wrap gap-2">
            <a href="<?= site_url('admin/users'); ?>" class="btn btn-primary">
                <i class="fa-solid fa-users me-2"></i>Manage Users
            </a>

            <a href="<?= site_url('admin/reports'); ?>" class="btn btn-outline-primary">
                <i class="fa-solid fa-chart-column me-2"></i>View Reports
            </a>

            <a href="<?= site_url('admin/settings'); ?>" class="btn btn-outline-secondary">
                <i class="fa-solid fa-gear me-2"></i>Settings
            </a>
        </div>
    </div>
</div>

<!-- Recent users -->
<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="p-4 d-flex justify-content-between align-items-center">
            <h5 class="fw-bold mb-0">Recent Users</h5>
            <a href="<?= site_url('admin/users'); ?>"
               class="text-decoration-none">View All</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($recent_users)): ?>
                    <?php foreach ($recent_users as $index => $user): ?>
                        <tr>
                            <td class="px-4"><?= $index + 1; ?></td>
                            <td>
                                <?= html_escape($user->name ?? 'N/A'); ?>
                            </td>
                            <td>
                                <?= html_escape($user->email ?? 'N/A'); ?>
                            </td>
                            <td>
                                <span class="badge bg-success-subtle text-success">
                                    Active
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center text-secondary py-4">
                            No users available.
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
