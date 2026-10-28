
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$page_title = isset($title) ? $title : 'Dashboard';
$admin_name = $this->session->userdata('user_name') ?: 'Administrator';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= html_escape($page_title); ?> | Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">

    <style>
        body { background: #f4f6fb; font-family: Arial, sans-serif; }
        .sidebar {
            position: fixed; top: 0; bottom: 0; left: 0;
            width: 250px; background: #172033; color: #fff;
            padding: 22px 14px; z-index: 1030;
        }
        .brand { font-size: 22px; font-weight: bold; padding: 8px 12px 28px; }
        .sidebar a {
            display: block; color: #cbd5e1; text-decoration: none;
            padding: 12px 14px; border-radius: 8px; margin-bottom: 5px;
        }
        .sidebar a:hover, .sidebar a.active {
            background: #34415b; color: #fff;
        }
        .sidebar a i { width: 25px; }
        .main-content { margin-left: 250px; min-height: 100vh; }
        .topbar {
            background: #fff; padding: 16px 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,.04);
        }
        .page-content { padding: 25px; }
        .menu-toggle { display: none; }
        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); transition: .25s; }
            .sidebar.show { transform: translateX(0); }
            .main-content { margin-left: 0; }
            .menu-toggle { display: inline-block; }
            .page-content { padding: 16px; }
        }
    </style>
</head>
<body>

    <?php
        $last_segment = $this->uri->segment($this->uri->total_segments());
    ?>

<aside class="sidebar" id="adminSidebar">
    <div class="brand">
        <i class="fa-solid fa-layer-group me-2"></i> AdminPanel
    </div>

    <small class="text-secondary px-3">MAIN MENU</small>

    <a href="<?= site_url('dashboard'); ?>" class="<?php if($last_segment == 'dashboard'){echo 'active';} ?>">
        <i class="fa-solid fa-gauge-high"></i> Dashboard
    </a>

    <a href="<?= site_url('group'); ?>" class="<?php if($last_segment == 'group'){echo 'active';} ?>"> 
        <i class="fa-solid fa-bars"></i> Group
    </a>

    <a href="<?= site_url('users'); ?>" class="<?php if($last_segment == 'users'){echo 'active';} ?>">
        <i class="fa-solid fa-users"></i> Users
    </a>

    <a href="<?= site_url('reports'); ?>" class="<?php if($last_segment == 'reports'){echo 'active';} ?>">
        <i class="fa-solid fa-chart-column"></i> Reports
    </a>

    <a href="<?= site_url('settings'); ?>" class="<?php if($last_segment == 'settings'){echo 'active';} ?>">
        <i class="fa-solid fa-gear"></i> Settings
    </a>

    <hr class="border-secondary">

    <a href="<?= site_url('auth/logout'); ?>">
        <i class="fa-solid fa-right-from-bracket"></i> Logout
    </a>
</aside>

<div class="main-content">
    <nav class="topbar d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <button class="btn btn-light menu-toggle" id="menuToggle"
                    type="button" aria-label="Toggle menu">
                <i class="fa-solid fa-bars"></i>
            </button>
            <h5 class="mb-0"><?= html_escape($page_title); ?></h5>
        </div>

        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa-solid fa-circle-user me-1"></i>
                <?= html_escape($admin_name); ?>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="<?= site_url('auth/logout'); ?>">
                        <i class="fa-solid fa-right-from-bracket me-2"></i>Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="page-content">
