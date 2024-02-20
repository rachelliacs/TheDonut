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
                <div class="col-lg-4 col-md-4">
                    <?php
                    $current_page = $this->uri->segment(1); // Get the current page URI segment
                    if (!$this->session->userdata('logged_in') && ($current_page != 'login' && $current_page != 'register')) {
                        ?>
                        <div class="form-buttons">
                            <a href="shoppingcart" class=""><svg width="24" height="24" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
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
                            <!-- <a href="<?= base_url(); ?>login" class="btn btn-primary">Login</a> -->
                            <!-- <a href="<?= base_url(); ?>register" class="btn btn-primary">Register</a> -->
                        </div>
                    <?php } ?>
                    <?php if ($this->session->userdata('logged_in')) { ?>
                        <div class="form-buttons">
                            <a href="shoppingcart" class=""><svg width="24" height="24" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
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
                            <div class="dropdown">
                                <svg class="dropdown-toggle" width="24" height="24" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M28 16.0001C28.004 18.3825 27.2954 20.7116 25.9653 22.6881C24.8685 24.3241 23.3854 25.6646 21.6473 26.5911C19.9092 27.5175 17.9696 28.0015 16 28.0001C14.0304 28.0015 12.0908 27.5175 10.3527 26.5911C8.61457 25.6646 7.13153 24.3241 6.03467 22.6881C4.99031 21.1314 4.3252 19.3516 4.09267 17.4914C3.86015 15.6312 4.06666 13.7425 4.69566 11.9765C5.32467 10.2106 6.35866 8.61654 7.71476 7.32222C9.07085 6.0279 10.7113 5.0693 12.5047 4.52327C14.298 3.97723 16.1944 3.85894 18.0417 4.17789C19.889 4.49683 21.6358 5.24414 23.1423 6.35991C24.6487 7.47567 25.8728 8.92885 26.7164 10.603C27.5599 12.2771 27.9996 14.1255 28 16.0001Z"
                                        stroke="white" stroke-width="2" />
                                    <path
                                        d="M17.6668 11.9997C17.6668 12.9197 16.9201 13.6663 16.0001 13.6663V15.6663C16.9726 15.6663 17.9052 15.28 18.5928 14.5924C19.2805 13.9048 19.6668 12.9721 19.6668 11.9997H17.6668ZM16.0001 13.6663C15.0801 13.6663 14.3334 12.9197 14.3334 11.9997H12.3334C12.3334 12.9721 12.7197 13.9048 13.4074 14.5924C14.095 15.28 15.0276 15.6663 16.0001 15.6663V13.6663ZM14.3334 11.9997C14.3334 11.0797 15.0801 10.333 16.0001 10.333V8.33301C15.0276 8.33301 14.095 8.71932 13.4074 9.40695C12.7197 10.0946 12.3334 11.0272 12.3334 11.9997H14.3334ZM16.0001 10.333C16.9201 10.333 17.6668 11.0797 17.6668 11.9997H19.6668C19.6668 11.0272 19.2805 10.0946 18.5928 9.40695C17.9052 8.71932 16.9726 8.33301 16.0001 8.33301V10.333ZM6.8881 23.8077L5.92944 23.5223L5.77344 24.045L6.12944 24.4583L6.8881 23.8077ZM25.1121 23.8077L25.8721 24.4597L26.2268 24.0463L26.0708 23.5223L25.1121 23.8077ZM12.0001 20.9997H20.0001V18.9997H12.0001V20.9997ZM12.0001 18.9997C10.6362 18.9997 9.30879 19.4399 8.21508 20.2547C7.12137 21.0695 6.31977 22.2155 5.92944 23.5223L7.84677 24.093C8.11415 23.1992 8.66268 22.4155 9.41091 21.8582C10.1591 21.3009 11.0672 20.9998 12.0001 20.9997V18.9997ZM16.0001 26.9997C14.4127 27.0015 12.8437 26.6589 11.4016 25.9955C9.95938 25.332 8.67832 24.3636 7.64677 23.157L6.12944 24.4583C7.34872 25.8836 8.86256 27.0289 10.5666 27.8127C12.2707 28.5965 14.1244 29.0015 16.0001 28.9997V26.9997ZM20.0001 20.9997C21.9601 20.9997 23.6201 22.3037 24.1534 24.093L26.0708 23.5223C25.6804 22.2155 24.8788 21.0695 23.7851 20.2547C22.6914 19.4399 21.364 18.9997 20.0001 18.9997V20.9997ZM24.3534 23.157C23.3219 24.3636 22.0408 25.332 20.5987 25.9955C19.1565 26.6589 17.5875 27.0015 16.0001 26.9997V28.9997C17.8758 29.0015 19.7295 28.5965 21.4336 27.8127C23.1376 27.0289 24.6528 25.885 25.8721 24.4597L24.3534 23.157Z"
                                        fill="white" />
                                </svg>
                                <div data-bs-popper="static" class="dropdown-menu dropdown-menu-end">
                                    <div class="px-4 pb-0 pt-2  ">
                                        <div class="lh-1 ">
                                            <h5 class="mb-1">
                                                <?= $this->session->userdata('username'); ?>
                                            </h5>
                                            <a class="text-inherit fs-6" href="<?= base_url(); ?>profile">View my
                                                profile</a>
                                        </div>
                                        <div class=" dropdown-divider mt-3 mb-2"></div>
                                    </div>
                                    <a aria-selected="false" class="dropdown-item" role="button" tabindex="0" href="#"><i
                                            class="fe fe-user me-2"></i> Edit
                                        Profile</a>
                                    <a class="dropdown-item" role="button" tabindex="0" href="login/logout"><i
                                            class="fe fe-power me-2"></i>Log Out</a>
                                </div>
                            </div>
                            <!-- <a href="login/logout" class="btn btn-primary">Logout</a> -->
                            <?php if ($this->session->flashdata('logout_message')) { ?>
                                <span class="logout-message">
                                    <?= $this->session->flashdata('logout_message'); ?>
                                </span>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>