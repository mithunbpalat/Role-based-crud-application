```php
<div class="container-fluid py-4">

    <!-- Page Heading -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h3 class="fw-bold mb-1">Users</h3>
            <p class="text-muted mb-0">Manage all registered users</p>
        </div>

        <a href="<?= base_url('admin/users/create'); ?>"
           class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add New User
        </a>
    </div>

    <!-- Listing Card -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <div class="row align-items-center g-3">
                <div class="col-md-6">
                    <h5 class="mb-0 fw-semibold">User List</h5>
                </div>

                <div class="col-md-6">
                    <input type="text"
                           id="userSearch"
                           class="form-control"
                           placeholder="Search name, email or phone...">
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0"
                       id="usersTable">

                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">#</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Registered</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($users)): ?>
                            <?php $i = 1; ?>

                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td class="ps-4">
                                        <?= $i++; ?>
                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="rounded-circle bg-primary-subtle
                                                        text-primary d-flex align-items-center
                                                        justify-content-center fw-bold"
                                                 style="width:40px;height:40px;">
                                                <?= strtoupper(substr($user->name ?? 'U', 0, 1)); ?>
                                            </div>

                                            <span class="fw-semibold">
                                                <?= html_escape($user->name ?? ''); ?>
                                            </span>
                                        </div>
                                    </td>

                                    <td>
                                        <?= html_escape($user->email ?? ''); ?>
                                    </td>

                                    <td>
                                        <?= html_escape($user->phone ?? ''); ?>
                                    </td>

                                    <td>
                                        <?php if (($user->status ?? '') === 'Active'): ?>
                                            <span class="badge bg-success-subtle text-success">
                                                Active
                                            </span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary-subtle text-secondary">
                                                <?= html_escape($user->status ?? 'Inactive'); ?>
                                            </span>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?= !empty($user->created_at)
                                            ? date('d M Y', strtotime($user->created_at))
                                            : '-'; ?>
                                    </td>

                                    <td class="text-center">
                                        <a href="<?= base_url('admin/users/edit/' . $user->id); ?>"
                                           class="btn btn-sm btn-outline-primary"
                                           title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a href="<?= base_url('admin/users/view/' . $user->id); ?>"
                                           class="btn btn-sm btn-outline-info"
                                           title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <i class="fas fa-users fa-2x text-muted mb-3"></i>
                                    <p class="text-muted mb-0">No users found.</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>

                </table>
            </div>
        </div>

        <div class="card-footer bg-white text-muted small">
            Total users: <?= count($users); ?>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('userSearch');
    const table = document.getElementById('usersTable');

    if (searchInput && table) {
        searchInput.addEventListener('input', function () {
            const searchText = this.value.toLowerCase();

            table.querySelectorAll('tbody tr').forEach(function (row) {
                row.style.display = row.textContent
                    .toLowerCase()
                    .includes(searchText) ? '' : 'none';
            });
        });
    }
});
</script>
```