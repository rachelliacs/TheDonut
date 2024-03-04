<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>
        <?php echo $title ?> |
        <?php echo $StoreName ?>
    </title>
    <!-- START:: STYLES -->
    <?php $this->load->view('global/style') ?>
    <!-- END:: STYLES -->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light primary-nav">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>">
                <?php if (!empty($storedatas) && isset($storedatas[0]['storeLogo'])): ?>
                    <img src="<?= base_url(); ?>assets/img/<?= $storedatas[0]['storeLogo']; ?>"
                        alt="<?= isset($storedatas[0]['storeName']) ? $storedatas[0]['storeName'] : 'Store Name'; ?> Logo" class="img-fluid">
                <?php else: ?>
                    <span>No store logo available</span>
                <?php endif; ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <!-- Add your menu items here -->
                </ul>
                <div class="d-flex">
                    <?php $current_page = $this->uri->segment(1); ?>
                    <?php if (!$this->session->userdata('logged_in') && ($current_page != 'authentication' && $current_page != 'register')): ?>
                        <a href="<?= base_url(); ?>shoppingcart">
                        <svg width="24" height="24"
                                    viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11 27C11.5523 27 12 26.5523 12 26C12 25.4477 11.5523 25 11 25C10.4477 25 10 25.4477 10 26C10 26.5523 10.4477 27 11 27Z"
                                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M25 27C25.5523 27 26 26.5523 26 26C26 25.4477 25.5523 25 25 25C24.4477 25 24 25.4477 24 26C24 26.5523 24.4477 27 25 27Z"
                                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M3 5H7L10 22H26" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M10 18H25.59C25.7056 18.0001 25.8177 17.9601 25.9072 17.8868C25.9966 17.8135 26.0579 17.7115 26.0806 17.5981L27.8806 8.59813C27.8951 8.52555 27.8934 8.45066 27.8755 8.37886C27.8575 8.30705 27.8239 8.24012 27.7769 8.1829C27.73 8.12567 27.6709 8.07959 27.604 8.04796C27.5371 8.01633 27.464 7.99995 27.39 8H8"
                                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                        </a>
                    <?php endif; ?>
                    <?php if ($this->session->userdata('logged_in') && ($current_page != 'authentication' && $current_page != 'register')): ?>
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="checkout" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg width="24" height="24"
                                    viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11 27C11.5523 27 12 26.5523 12 26C12 25.4477 11.5523 25 11 25C10.4477 25 10 25.4477 10 26C10 26.5523 10.4477 27 11 27Z"
                                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M25 27C25.5523 27 26 26.5523 26 26C26 25.4477 25.5523 25 25 25C24.4477 25 24 25.4477 24 26C24 26.5523 24.4477 27 25 27Z"
                                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M3 5H7L10 22H26" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M10 18H25.59C25.7056 18.0001 25.8177 17.9601 25.9072 17.8868C25.9966 17.8135 26.0579 17.7115 26.0806 17.5981L27.8806 8.59813C27.8951 8.52555 27.8934 8.45066 27.8755 8.37886C27.8575 8.30705 27.8239 8.24012 27.7769 8.1829C27.73 8.12567 27.6709 8.07959 27.604 8.04796C27.5371 8.01633 27.464 7.99995 27.39 8H8"
                                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="<?= base_url(); ?>profile">View Profile</a></li>
                                <li><a class="dropdown-item" href="<?= base_url(); ?>edit">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="<?= base_url(); ?>authentication/logout">Log Out</a></li>
                            </ul>
                        </div>
                        <?php if ($this->session->flashdata('logout_message')): ?>
                            <span class="logout-message">
                                <?= $this->session->flashdata('logout_message'); ?>
                            </span>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>