<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

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
    <nav class="primary-nav">
        <div class=" container">
            <div class="row d-flex align-items-center justify-content-between">
                <div class="col-lg-2 col-md-2">
                    <div class="main-logo">
                        <a href="<?= base_url(); ?>">
                            <?php if (!empty($storedatas) && isset($storedatas[0]['storeLogo'])): ?>
                                <img src="<?= base_url(); ?>assets/img/<?= $storedatas[0]['storeLogo']; ?>"
                                    alt="<?= isset($storedatas[0]['storeName']) ? $storedatas[0]['storeName'] : 'Store Name'; ?> Logo">
                            <?php else: ?>
                                <span>No store logo available</span>
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2">
                    <div class="form-buttons">
                        <a href="<?= base_url(); ?>login" class="btn btn-primary">Login</a>
                        <a href="<?= base_url(); ?>register" class="btn btn-primary">Register</a>
                    </div>

                </div>
            </div>
        </div>
    </nav>