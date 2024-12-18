<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-width="fullwidth" data-menu-styles="light" data-toggled="close" loader="enable" style="--primary-rgb: 35, 144, 190;">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('admin_resources/assets/images/brand-logos/favicon2.ico') }}" type="image/x-icon">

    <!-- Choices JS -->
    <script src="{{ asset('admin_resources/assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('admin_resources/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Jquery Cdn -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- Main Theme Js -->
    <script src="{{ asset('admin_resources/assets/js/main.js') }}"></script>

    <!-- Toastify JS -->
    <script src="{{ asset('admin_resources/assets/libs/toastify-js/src/toastify.js') }}"></script>

    <!-- Google Maps API -->
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCW16SmpzDNLsrP-npQii6_8vBu_EJvEjA"></script>

    <!-- Google Maps JS -->
    <script src="{{ asset('admin_resources/assets/libs/gmaps/gmaps.min.js') }}"></script>

    <!-- Gallery JS -->
    <script src="{{ asset('admin_resources/assets/libs/glightbox/js/glightbox.min.js') }}"></script>

    <!-- Bootstrap Css -->
    <link id="style" href="{{ asset('admin_resources/assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Style Css -->
    <link href="{{ asset('admin_resources/assets/css/styles.css') }}" rel="stylesheet">

    <!-- Icons Css -->
    <link href="{{ asset('admin_resources/assets/css/icons.css') }}" rel="stylesheet">

    <!-- Node Waves Css -->
    <link href="{{ asset('admin_resources/assets/libs/node-waves/waves.min.css') }}" rel="stylesheet">

    <!-- Simplebar Css -->
    <link href="{{ asset('admin_resources/assets/libs/simplebar/simplebar.min.css') }}" rel="stylesheet">

    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{ asset('admin_resources/assets/libs/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_resources/assets/libs/@simonwep/pickr/themes/nano.min.css') }}">

    <!-- Choices Css -->
    <link rel="stylesheet"
        href="{{ asset('admin_resources/assets/libs/choices.js/public/assets/styles/choices.min.css') }}">

    <!-- FlatPickr CSS -->
    <link rel="stylesheet" href="{{ asset('admin_resources/assets/libs/flatpickr/flatpickr.min.css') }}">

    <!-- Auto Complete CSS -->
    <link rel="stylesheet"
        href="{{ asset('admin_resources/assets/libs/@tarekraafat/autocomplete.js/css/autoComplete.css') }}">

    <!-- Toastify CSS -->
    <link rel="stylesheet" href="{{ asset('admin_resources/assets/libs/toastify-js/src/toastify.css') }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

    <!-- Filepond CSS -->
    <link rel="stylesheet" href="{{ asset('admin_resources/assets/libs/filepond/filepond.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin_resources/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin_resources/assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css') }}">

    <!-- GLightbox CSS -->
    <link rel="stylesheet" href="{{ asset('admin_resources/assets/libs/glightbox/css/glightbox.min.css') }}">

    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var dataSession = {!! json_encode(Session::get('userSession')) !!};
            var fotoPath = {!! json_encode(Storage::disk('biznet')->url('images' )) !!}
            console.log(fotoPath + dataSession[0]["fotoUser"] );
            $('#nama-lengkap').text(dataSession[0]["namaLengkap"]);
            $("#fotoUser").attr("src", fotoPath + '/' + dataSession[0]["fotoUser"]);
        });
    </script>
</head>

<body>

    <!-- Loader -->
    <div id="loader">
        <img src="{{ asset('admin_resources/assets/images/media/loader.svg') }}" alt="">
    </div>
    <!-- Loader -->

    <div class="page">
        <!-- app-header -->
        <header class="app-header sticky" id="header">

            <!-- Start::main-header-container -->
            <div class="main-header-container container-fluid">

                <!-- Start::header-content-left -->
                <div class="header-content-left">

                    <!-- Start::header-element -->
                    <div class="header-element">
                        <div class="horizontal-logo">
                            <a href="index.html" class="header-logo">
                                <img src="{{ asset('admin_resources/assets/images/brand-logos/desktop-logo.png') }}"
                                    alt="logo" class="desktop-logo">
                                <img src="{{ asset('admin_resources/assets/images/brand-logos/toggle-logo.png') }}"
                                    alt="logo" class="toggle-logo">
                                <img src="{{ asset('admin_resources/assets/images/brand-logos/desktop-dark.png') }}"
                                    alt="logo" class="desktop-dark">
                                <img src="{{ asset('admin_resources/assets/images/brand-logos/toggle-dark.png') }}"
                                    alt="logo" class="toggle-dark">
                            </a>
                        </div>
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element mx-lg-0 mx-2">
                        <a aria-label="Hide Sidebar"
                            class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle"
                            data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
                    </div>
                    <!-- End::header-element -->

                </div>
                <!-- End::header-content-left -->

                <!-- Start::header-content-right -->
                <ul class="header-content-right">

                    <!-- Start::header-element -->
                    <li class="header-element d-md-none d-block">
                        <a href="javascript:void(0);" class="header-link" data-bs-toggle="modal"
                            data-bs-target="#header-responsive-search">
                            <!-- Start::header-link-icon -->
                            <i class="bi bi-search header-link-icon"></i>
                            <!-- End::header-link-icon -->
                        </a>
                    </li>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <li class="header-element cart-dropdown dropdown">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-auto-close="outside"
                            data-bs-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" height="24px"
                                viewBox="0 0 24 24" width="24px" fill="#000000">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M15.55 11l2.76-5H6.16l2.37 5z" opacity=".1" />
                                <path
                                    d="M15.55 13c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.37-.66-.11-1.48-.87-1.48H5.21l-.94-2H1v2h2l3.6 7.59-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2h7.45zM6.16 6h12.15l-2.76 5H8.53L6.16 6zM7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z" />
                            </svg>
                            <span class="badge bg-primary rounded-pill header-icon-badge" id="cart-icon-badge">5</span>
                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <!-- Start::main-header-dropdown -->
                        <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                            <div class="p-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0 fs-16">Cart Items<span
                                            class="badge bg-success-transparent ms-1 fs-12 rounded-circle"
                                            id="cart-data">5</span></p>
                                    <a href="products.html" class="btn btn-primary-light btn-sm btn-wave">Continue
                                        Shopping <i class="ti ti-arrow-narrow-right ms-1"></i></a>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <ul class="list-unstyled mb-0" id="header-cart-items-scroll">
                                <li class="dropdown-item border-top-0">
                                    <div class="d-flex align-items-center cart-dropdown-item">
                                        <img src="../assets/images/ecommerce/jpg/1.jpg" alt="img" class="avatar me-3">
                                        <div class="flex-grow-1">
                                            <div class="d-flex align-items-start justify-content-between mb-0">
                                                <div class="mb-1 fs-14">
                                                    <a href="cart.html">Plastic Flower Pot</a>
                                                </div>
                                                <div>
                                                    <a href="javascript:void(0);"
                                                        class="header-cart-remove float-end dropdown-item-close"><i
                                                            class="ti ti-x fs-16"></i></a>
                                                </div>
                                            </div>
                                            <div
                                                class="min-w-fit-content d-flex align-items-start justify-content-between">
                                                <div class="header-product-item d-flex">
                                                    <div class="d-flex rounded flex-nowrap order-qnt me-1">
                                                        <a href="javascript:void(0);"
                                                            class="badge bg-light p-1 text-default fs-14 me-2 product-quantity-minus"><i
                                                                class="ri-subtract-line"></i>
                                                        </a>
                                                        <input type="text"
                                                            class="form-control form-control-cart border-0 text-center w-100"
                                                            aria-label="quantity" id="product-quantity" value="2">
                                                        <a href="javascript:void(0);"
                                                            class="badge bg-light p-1 text-default fs-14 me-2 product-quantity-plus border-start-0"><i
                                                                class="ri-add-line"></i>
                                                        </a>
                                                    </div>
                                                    <div><span class="fw-medium mb-1 text-defaul">$499.00</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="d-flex align-items-start cart-dropdown-item">
                                        <img src="../assets/images/ecommerce/jpg/3.jpg" alt="img" class="avatar me-3">
                                        <div class="flex-grow-1">
                                            <div class="d-flex align-items-center justify-content-between mb-0">
                                                <div class="mb-1 fs-14">
                                                    <a href="cart.html">SnapPro CaptureCam</a>
                                                </div>
                                                <div>
                                                    <a href="javascript:void(0);"
                                                        class="header-cart-remove float-end dropdown-item-close"><i
                                                            class="ti ti-x fs-16"></i></a>
                                                </div>
                                            </div>
                                            <div
                                                class="min-w-fit-content d-flex align-items-start justify-content-between">
                                                <div class="header-product-item">
                                                    <div class="d-flex rounded flex-nowrap order-qnt me-1">
                                                        <a href="javascript:void(0);"
                                                            class="badge bg-light p-1 text-default fs-14 me-2 product-quantity-minus"><i
                                                                class="ri-subtract-line"></i>
                                                        </a>
                                                        <input type="text"
                                                            class="form-control form-control-cart border-0 text-center w-100"
                                                            aria-label="quantity" id="product-quantity" value="2">
                                                        <a href="javascript:void(0);"
                                                            class="badge bg-light text-default p-1 fs-14 me-2 product-quantity-plus border-start-0"><i
                                                                class="ri-add-line"></i>
                                                        </a>
                                                    </div>
                                                    <div> <span class="fw-medium mb-1 text-default">$129.79</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="d-flex align-items-start cart-dropdown-item">
                                        <img src="../assets/images/ecommerce/jpg/4.jpg" alt="img" class="avatar me-3">
                                        <div class="flex-grow-1">
                                            <div class="d-flex align-items-center justify-content-between mb-0">
                                                <div class="mb-1 fs-14">
                                                    <a href="cart.html">VividTint Headset</a>
                                                </div>
                                                <div>
                                                    <a href="javascript:void(0);"
                                                        class="header-cart-remove float-end dropdown-item-close"><i
                                                            class="ti ti-x fs-16"></i></a>
                                                </div>
                                            </div>
                                            <div
                                                class="min-w-fit-content d-flex align-items-start justify-content-between">
                                                <div class="header-product-item d-flex">
                                                    <div class="d-flex rounded flex-nowrap order-qnt me-1">
                                                        <a href="javascript:void(0);"
                                                            class="badge bg-light text-default p-1 fs-14 me-2 product-quantity-minus"><i
                                                                class="ri-subtract-line"></i>
                                                        </a>
                                                        <input type="text"
                                                            class="form-control form-control-cart border-0 text-center w-100"
                                                            aria-label="quantity" id="product-quantity" value="2">
                                                        <a href="javascript:void(0);"
                                                            class="badge bg-light text-default p-1 fs-14 me-2 product-quantity-plus border-start-0"><i
                                                                class="ri-add-line"></i>
                                                        </a>
                                                    </div>
                                                    <div> <span class="fw-medium mb-1 text-default">$99.99</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="d-flex align-items-start cart-dropdown-item">
                                        <img src="../assets/images/ecommerce/jpg/6.jpg" alt="img" class="avatar me-3">
                                        <div class="flex-grow-1">
                                            <div class="d-flex align-items-center justify-content-between mb-0">
                                                <div class="mb-1 fs-14">
                                                    <a href="cart.html">Samsung Headset</a>
                                                </div>
                                                <div>
                                                    <a href="javascript:void(0);"
                                                        class="header-cart-remove text-danger float-end dropdown-item-close"><i
                                                            class="ti ti-x fs-16"></i></a>
                                                </div>
                                            </div>
                                            <div
                                                class="min-w-fit-content d-flex align-items-start justify-content-between">
                                                <div class="header-product-item d-flex">
                                                    <div class="d-flex rounded flex-nowrap order-qnt me-1">
                                                        <a href="javascript:void(0);"
                                                            class="badge bg-light text-default p-1 fs-14 me-2 product-quantity-minus"><i
                                                                class="ri-subtract-line"></i>
                                                        </a>
                                                        <input type="text"
                                                            class="form-control form-control-cart border-0 text-center w-100"
                                                            aria-label="quantity" id="product-quantity" value="2">
                                                        <a href="javascript:void(0);"
                                                            class="badge bg-light text-default p-1 fs-14 me-2 product-quantity-plus border-start-0"><i
                                                                class="ri-add-line"></i>
                                                        </a>
                                                    </div>
                                                    <div><span class="fw-medium mb-1 text-default">$1.499.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="d-flex align-items-start cart-dropdown-item">
                                        <img src="../assets/images/ecommerce/jpg/9.jpg" alt="img" class="avatar me-3">
                                        <div class="flex-grow-1">
                                            <div class="d-flex align-items-center justify-content-between mb-0">
                                                <div class="mb-1 fs-14">
                                                    <a href="cart.html">Xavier Smart Telephone</a>
                                                </div>
                                                <div>
                                                    <a href="javascript:void(0);"
                                                        class="header-cart-remove text-danger float-end dropdown-item-close"><i
                                                            class="ti ti-x fs-16"></i></a>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-start justify-content-between">
                                                <div class="header-product-item d-flex">
                                                    <div class="d-flex rounded flex-nowrap order-qnt me-1">
                                                        <a href="javascript:void(0);"
                                                            class="badge bg-light text-default p-1 fs-14 me-2 product-quantity-minus"><i
                                                                class="ri-subtract-line"></i>
                                                        </a>
                                                        <input type="text"
                                                            class="form-control form-control-cart border-0 text-center w-100"
                                                            aria-label="quantity" id="product-quantity" value="2">
                                                        <a href="javascript:void(0);"
                                                            class="badge bg-light text-default p-1 fs-14 me-2 product-quantity-plus border-start-0"><i
                                                                class="ri-add-line"></i>
                                                        </a>
                                                    </div>
                                                    <div><span class="fw-medium mb-1 text-default">$49.79</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="p-3 empty-header-item border-top">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="fw-medium fs-14">Total :</div>
                                    <h5 class="mb-0">$1,240</h5>
                                </div>
                                <div class="text-center d-grid">
                                    <a href="checkout.html" class="btn btn-primary btn-wave">Proceed to
                                        checkout</a>
                                </div>
                            </div>
                            <div class="p-5 empty-item d-none">
                                <div class="text-center">
                                    <span class="avatar avatar-xl avatar-rounded bg-primary-transparent">
                                        <i class="ri-shopping-cart-2-line fs-2"></i>
                                    </span>
                                    <h6 class="fw-medium mb-1 mt-3">Your Cart is Empty</h6>
                                    <span class="mb-3 fw-normal fs-13 d-block">Add some items to make it happy :)</span>
                                </div>
                            </div>
                        </div>
                        <!-- End::main-header-dropdown -->
                    </li>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <li class="header-element notifications-dropdown d-xl-block d-none dropdown">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" id="messageDropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon animate-bell" height="24px"
                                viewBox="0 0 24 24" width="24px" fill="#000000">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M12 6.5c-2.49 0-4 2.02-4 4.5v6h8v-6c0-2.48-1.51-4.5-4-4.5z" opacity=".1" />
                                <path
                                    d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z" />
                            </svg>
                            <span class="header-icon-pulse bg-secondary rounded pulse pulse-secondary"></span>
                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <!-- Start::main-header-dropdown -->
                        <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                            <div class="p-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0 fs-16">Notifications</p>
                                    <span class="badge bg-primary-transparent" id="notifiation-data">5 Unread</span>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <ul class="list-unstyled mb-0" id="header-notification-scroll">
                                <li class="dropdown-item">
                                    <div class="d-flex align-items-start">
                                        <div class="pe-2 lh-1">
                                            <span class="avatar avatar-md avatar-rounded bg-light p-1 svg-white">
                                                <img src="../assets/images/faces/15.jpg">
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 d-flex align-items-start justify-content-between">
                                            <div>
                                                <p class="mb-0 fw-medium"><a href="javascript:void(0);">Luther
                                                        Mahin<span class="text-muted fs-11 ms-2">2 Min Ago</span></a>
                                                </p>
                                                <div class="fw-normal fs-12 header-notification-text text-truncate">
                                                    Asked to join<span class="text-primary fw-medium ms-1">Ui
                                                        Dashboad</span></div>
                                                <div class="d-flex align-items-center gap-2 mt-2">
                                                    <button class="btn btn-sm btn-primary-light">Accept</button>
                                                    <button class="btn btn-sm btn-danger-light">Reject</button>
                                                </div>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);"
                                                    class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                        class="ri-close-circle-line fs-5"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="d-flex align-items-center">
                                        <div class="pe-2 lh-1">
                                            <span class="avatar avatar-md bg-light p-1 avatar-rounded svg-white">
                                                <img src="../assets/images/faces/2.jpg">
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="mb-0 fw-medium"><a href="javascript:void(0);">Ronald Richard
                                                        <span class="text-muted fs-11 ms-2">5 Min Ago</span></a></p>
                                                <div class="fw-normal fs-12 header-notification-text text-truncate">
                                                    add New Products in <span
                                                        class="text-secondary fw-medium ms-1">Cloth Category</span>
                                                </div>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);"
                                                    class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                        class="ri-close-circle-line fs-5"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="d-flex align-items-center">
                                        <div class="pe-2 lh-1">
                                            <span class="avatar avatar-md bg-light p-1 avatar-rounded svg-white">
                                                <img src="../assets/images/faces/6.jpg">
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="mb-0 fw-medium"><a href="javascript:void(0);">
                                                        Liam Parker<span class="text-muted fs-11 ms-2">1 Hr
                                                            Ago</span></a></p>
                                                <div class="fw-normal fs-12 header-notification-text text-truncate">
                                                    Mentioned You in Jobs Landing Page.</div>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);"
                                                    class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                        class="ri-close-circle-line fs-5"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="d-flex align-items-center">
                                        <div class="pe-2 lh-1">
                                            <span class="avatar avatar-md bg-light p-1 avatar-rounded svg-white">
                                                <img src="../assets/images/faces/9.jpg">
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="mb-0 fw-medium"><a href="javascript:void(0);">Owen Foster
                                                        <span class="text-muted fs-11 ms-2">3 Day Ago</span></a></p>
                                                <div class="fw-normal fs-12 header-notification-text text-truncate">
                                                    Invited To His Team As Lead</div>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);"
                                                    class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                        class="ri-close-circle-line fs-5"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="d-flex align-items-center">
                                        <div class="pe-2 lh-1">
                                            <span class="avatar avatar-md bg-light p-1 avatar-rounded svg-white">
                                                <img src="../assets/images/faces/14.jpg">
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="mb-0 fw-medium"><a href="javascript:void(0);">Henry Morgan
                                                        <span class="text-muted fs-11 ms-2">5 Day Ago</span></a></p>
                                                <div class="fw-normal fs-12 header-notification-text text-truncate">
                                                    Shared <span class="text-success fw-medium ms-1">12 post</span> with
                                                    you</div>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);"
                                                    class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                        class="ri-close-circle-line fs-5"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="p-3 empty-header-item1 border-top">
                                <div class="d-grid">
                                    <a href="javascript:void(0);" class="btn btn-primary btn-wave">View All</a>
                                </div>
                            </div>
                            <div class="p-5 empty-item1 d-none">
                                <div class="text-center">
                                    <span class="avatar avatar-xl avatar-rounded bg-secondary-transparent">
                                        <i class="ri-notification-off-line fs-2"></i>
                                    </span>
                                    <h6 class="fw-medium mt-3">No New Notifications</h6>
                                </div>
                            </div>
                        </div>
                        <!-- End::main-header-dropdown -->
                    </li>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <li class="header-element dropdown">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="me-xl-2 me-0 lh-1 d-flex align-items-center ">
                                    <span class="avatar avatar-xs avatar-rounded bg-primary-transparent">
                                        <img src="" alt="img" id="fotoUser">
                                    </span>
                                </div>
                                <div class="d-xl-block d-none lh-1">
                                    <span class="fw-medium lh-1" id="nama-lengkap">
                                             
                                    </span>
                                </div>
                            </div>
                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end"
                            aria-labelledby="mainHeaderProfile">
                            <li class="border-bottom"><a class="dropdown-item d-flex flex-column" href="#"><span
                                        class="fs-12 text-muted">Anda Login Sebagai:</span><span
                                        class="fs-14">{{ Auth::user()->roles->roleName }}</span></a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center" href="profile.html"><i
                                        class="ti ti-user me-2 fs-18 text-primary"></i>Profile</a></li>
                            <!--<li><a class="dropdown-item d-flex align-items-center" href="mail.html"><i
                                        class="ti ti-mail me-2 fs-18 text-primary"></i>Inbox</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="to-do-list.html"><i
                                        class="ti ti-checklist me-2 fs-18 text-primary"></i>Task Manager</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="mail-settings.html"><i
                                        class="ti ti-settings me-2 fs-18 text-primary"></i>Settings</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="chat.html"><i
                                        class="ti ti-headset me-2 fs-18 text-primary"></i>Support</a></li>-->
                            <li><a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"><i
                                        class="ti ti-logout me-2 fs-18 text-primary"></i>Log Out</a></li>
                        </ul>
                    </li>
                    <!-- End::header-element -->

                </ul>
                <!-- End::header-content-right -->

            </div>
            <!-- End::main-header-container -->

        </header>
        <!-- /app-header -->
        <!-- Start::app-sidebar -->
        <aside class="app-sidebar sticky" id="sidebar">

            <!-- Start::main-sidebar-header -->
            <div class="main-sidebar-header">
                <a href="index.html" class="header-logo">
                    <img src="{{ asset('admin_resources/assets/images/user-general/patupa_logo_white_bg.png') }}"
                        alt="logo" class="desktop-logo">
                    <img src="{{ asset('admin_resources/assets/images/user-general/patupa_logo_white_bg.png') }}"
                        alt="logo" class="toggle-dark">
                    <img src="{{ asset('admin_resources/assets/images/user-general/patupa_logo_white_bg.png') }}"
                        alt="logo" class="desktop-dark">
                    <img src="{{ asset('admin_resources/assets/images/user-general/patupa_logo_white_bg.png') }}"
                        alt="logo" class="toggle-logo">
                </a>
            </div>
            <!-- End::main-sidebar-header -->

            <!-- Start::main-sidebar -->
            <div class="main-sidebar" id="sidebar-scroll">

                <!-- Start::nav -->
                <nav class="main-menu-container nav nav-pills flex-column sub-open">
                    <div class="slide-left" id="slide-left">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                            viewBox="0 0 24 24">
                            <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                        </svg>
                    </div>

                    @if (Auth::user()->roles->roleName == 'Super Admin')
                        @include('super_admin_menu')
                    @elseif (Auth::user()->roles->roleName == 'Admin')
                        @include('admin_menu')
                    @endif

                    
                    <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                            width="24" height="24" viewBox="0 0 24 24">
                            <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                        </svg></div>
                </nav>
                <!-- End::nav -->

            </div>
            <!-- End::main-sidebar -->

        </aside>
        <!-- End::app-sidebar -->

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">

                @include('flash_message')

                @yield('content')

            </div>
        </div>
        <!-- End::app-content -->


        <!-- Footer Start -->
        <footer class="footer mt-auto py-3 bg-white text-center">
            <div class="container">
                <span class="text-muted"> Copyright © <span id="year"></span> <a href="https://bkad.taputkab.go.id/"
                        class="fw-medium text-primary">Badan Keuangan Dan Aset Daerah Kabupaten Tapanuli Utara</a>
                </span>
            </div>
        </footer>
        <!-- Footer End -->
        <div class="modal fade" id="header-responsive-search" tabindex="-1" aria-labelledby="header-responsive-search"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="input-group">
                            <input type="text" class="form-control border-end-0" placeholder="Search Anything ..."
                                aria-label="Search Anything ..." aria-describedby="button-addon2">
                            <button class="btn btn-primary" type="button" id="button-addon2"><i
                                    class="bi bi-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow lh-1"><i class="ti ti-caret-up fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <!-- Scroll To Top -->

    <!-- Popper JS -->
    <script src="{{ asset('admin_resources/assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>

    <!-- Defaultmenu JS -->
    <script src="{{ asset('admin_resources/assets/js/defaultmenu.min.js') }}"></script>

    <!-- Node Waves JS-->
    <script src="{{ asset('admin_resources/assets/libs/node-waves/waves.min.js') }}"></script>

    <!-- Sticky JS -->
    <script src="{{ asset('admin_resources/assets/js/sticky.js') }}"></script>

    <!-- Simplebar JS -->
    <script src="{{ asset('admin_resources/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin_resources/assets/js/simplebar.js') }}"></script>

    <!-- Auto Complete JS -->
    <script src="{{ asset('admin_resources/assets/libs/@tarekraafat/autocomplete.js/autoComplete.min.js') }}"></script>

    <!-- Color Picker JS -->
    <script src="{{ asset('admin_resources/assets/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>

    <!-- Date & Time Picker JS -->
    <script src="{{ asset('admin_resources/assets/libs/flatpickr/flatpickr.min.js') }}"></script>

    <!-- Form Validation JS -->
    <script src="{{ asset('admin_resources/assets/js/validation.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('admin_resources/assets/js/custom.js') }}"></script>

    <!-- Datatables Cdn -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <!-- Internal Datatables JS -->
    <script src="{{ asset('admin_resources/assets/js/datatables.js') }}"></script>

    <!-- Select2 Cdn -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @if ($message = Session::get('success'))
        <script>
            const primarytoastSuccess = document.getElementById('primaryToast')
            const toast = new bootstrap.Toast(primarytoastSuccess)
            toast.show()
        </script>
    @endif

    @if ($message = Session::get('error'))
        <script>
            const primarytoastError = document.getElementById('dangerToast')
            const toast = new bootstrap.Toast(primarytoastError)
            toast.show()
        </script>
    @endif
</body>

</html>