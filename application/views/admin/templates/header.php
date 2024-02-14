<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        <?php echo $title ?> | Admin
        <?php echo $StoreName ?>
    </title>
    <!-- START:: STYLES -->
    <?php $this->load->view('global/style') ?>
    <!-- END:: STYLES -->
</head>

<body>
    <nav class="primary-nav">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-2 col-md-2">
                    <div class="main-logo">
                        <a href="<?= base_url(); ?>admin/dashboard">
                            <?php if (!empty($storedatas) && isset($storedatas[0]['storeLogo'])): ?>
                                <img src="<?= base_url(); ?>assets/img/<?= $storedatas[0]['storeLogo']; ?>"
                                    alt="<?= isset($storedatas[0]['storeName']) ? $storedatas[0]['storeName'] : 'Store Name'; ?> Logo">
                            <?php else: ?>
                                <span>No store logo available</span>
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10">
                    <div class="navbar">
                        <div id="main-nav" class="stellarnav d-flex justify-content-end right desktop">
                            <!-- <ul class="menu-list">
                                <li><a href="<?= base_url(); ?>admin/register" class="item-anchor"
                                        data-effect="About">Register</a></li>
                                <li><a href="<?= base_url(); ?>admin/login" class="item-anchor"
                                        data-effect="Contact">Login</a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>