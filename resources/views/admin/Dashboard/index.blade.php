@extends('layouts.admin.template')
@section('content')

<!-- Page Header -->
<div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">Dashboard</h1>
        <div class="">
            <nav>
                <ol class="breadcrumb breadcrumb-example1 mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header Close -->

<!-- Start::row-1 -->
<div class="row">
    <div class="col-xl-3">
        <div class="card custom-card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div>
                        <p class="mb-2 fs-15 fw-medium">Permohonan Baru
                        </p>
                        <h4 class="mb-4 fw-semibold">24</h4>
                    </div>
                    <div>
                        <span class="avatar avatar-md bg-primary-transparent svg-primary text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-file-earmark" viewBox="0 0 16 16">
                                <path
                                    d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="mb-0 fs-12 text-muted">
                        <span class="text-success fw-semibold me-1 d-inline-block"><i
                                class="fe fe-arrow-up"></i>+0.5%</span>
                        vs Last Month
                    </div>
                    <a href="javascript:void(0)"> <span class="float-end fs-12 fw-medium text-primary">View All <i
                                class="ti ti-arrow-narrow-right"></i></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card custom-card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div>
                        <p class="mb-2 fs-15 fw-medium">Permohonan Disetujui
                        </p>
                        <h4 class="mb-4  fw-semibold">55</h4>
                    </div>
                    <div>
                        <span class="avatar avatar-md bg-primary-transparent svg-primary text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-file-earmark-check" viewBox="0 0 16 16">
                                <path
                                    d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
                                <path
                                    d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="mb-0 fs-12 text-muted">
                        <span class="text-danger fw-semibold me-1 d-inline-block"><i
                                class="fe fe-arrow-down"></i>-1.2%</span>
                        vs Last Month
                    </div>
                    <a href="javascript:void(0)"> <span class="float-end fs-12 fw-medium text-secondary">View All <i
                                class="ti ti-arrow-narrow-right"></i></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card custom-card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div>
                        <p class="mb-2 fs-15 fw-medium">Tagihan Jatuh Tempo
                        </p>
                        <h4 class="mb-4  fw-semibold">41</h4>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-receipt-cutoff" viewBox="0 0 16 16">
                            <path
                                d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5M11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z" />
                            <path
                                d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118z" />
                        </svg>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="mb-0 fs-12 text-muted">
                        <span class="text-success fw-semibold me-1 d-inline-block"><i
                                class="fe fe-arrow-up"></i>+1.3%</span>
                        vs Last Month
                    </div>
                    <a href="javascript:void(0)"> <span class="float-end fs-12 fw-medium text-success">View All <i
                                class="ti ti-arrow-narrow-right"></i></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card custom-card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div>
                        <p class="mb-2 fs-15 fw-medium">Tunggakan Pembayaran
                        </p>
                        <h4 class="mb-4  fw-semibold">34</h4>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-calendar2-x" viewBox="0 0 16 16">
                            <path
                                d="M6.146 8.146a.5.5 0 0 1 .708 0L8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 0 1 0-.708" />
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" />
                            <path
                                d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="mb-0 fs-12 text-muted">
                        <span class="text-danger fw-semibold me-1 d-inline-block"><i
                                class="fe fe-arrow-down"></i>-0.1%</span>
                        vs Last Month
                    </div>
                    <a href="javascript:void(0)"> <span class="float-end fs-12 fw-medium text-orange">View All <i
                                class="ti ti-arrow-narrow-right"></i></span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End::row-1 -->

@endsection