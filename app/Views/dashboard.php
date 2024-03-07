<?=$this->extend('template/index');?>
<?=$this->section('breadcrumb')?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Home</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Dashboard</h6>
    </nav>

<?=$this->endSection()?>
<?=$this->section('content')?>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                        class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute"
                        >
                            <i class="material-icons opacity-10">weekend</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Today's Amount</p>
                            <h4 class="mb-0"><?=$data['today_amount']?></h4>
                        </div>
                    </div>
                    <?php //var_dump(auth()->user()->getGroups())?>
                    <hr class="dark horizontal my-0" />
                    <div class="card-footer p-3">
                        <p class="mb-0">
                            <!-- <span class="text-success text-sm font-weight-bolder">+55% </span>than last week -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                        class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute"
                        >
                        <i class="material-icons opacity-10">person</i>
                        </div>
                        <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Today's Barber</p>
                        <h4 class="mb-0"><?=$data['today_barber']?></h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0" />
                    <div class="card-footer p-3">
                        <p class="mb-0">
                            <!-- <span class="text-success text-sm font-weight-bolder">+3% </span>than last month -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                        class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute"
                        >
                        <i class="material-icons opacity-10">person</i>
                        </div>
                        <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Yesterday's Cut</p>
                        <h4 class="mb-0"><?=$data['yesterday_cut']?></h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0" />
                    <div class="card-footer p-3">
                        <p class="mb-0">
                            <!-- <span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                        class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute"
                        >
                        <i class="material-icons opacity-10">weekend</i>
                        </div>
                        <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Sales Month</p>
                        <h4 class="mb-0"><?=$data['sales_month']?></h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0" />
                    <div class="card-footer p-3">
                        <p class="mb-0">
                            <!-- <span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Historycal</h6>
                                <p class="text-sm mb-0">
                                <i class="fa fa-check text-info" aria-hidden="true"></i>
                                As of <span class="font-weight-bold ms-1">Now</span>
                                </p>
                            </div>
                            <div class="col-lg-6 col-5 my-auto text-end">
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Barbers</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Visit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                <img
                                                    src="../assets/img/small-logos/logo-xd.svg"
                                                    class="avatar avatar-sm me-3"
                                                    alt="xd"
                                                />
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Material XD Version</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="avatar-group mt-2">
                                                <a
                                                href="javascript:;"
                                                class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="bottom"
                                                aria-label="Ryan Tompson"
                                                data-bs-original-title="Ryan Tompson"
                                                >
                                                <img src="../assets/img/team-1.jpg" alt="team1" />
                                                </a>
                                                <a
                                                href="javascript:;"
                                                class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="bottom"
                                                aria-label="Romina Hadid"
                                                data-bs-original-title="Romina Hadid"
                                                >
                                                <img src="../assets/img/team-2.jpg" alt="team2" />
                                                </a>
                                                <a
                                                href="javascript:;"
                                                class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="bottom"
                                                aria-label="Alexander Smith"
                                                data-bs-original-title="Alexander Smith"
                                                >
                                                <img src="../assets/img/team-3.jpg" alt="team3" />
                                                </a>
                                                <a
                                                href="javascript:;"
                                                class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="bottom"
                                                aria-label="Jessica Doe"
                                                data-bs-original-title="Jessica Doe"
                                                >
                                                <img src="../assets/img/team-4.jpg" alt="team4" />
                                                </a>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-xs font-weight-bold"> $14,000 </span>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress-wrapper w-75 mx-auto">
                                                <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">60%</span>
                                                </div>
                                                </div>
                                                <div class="progress">
                                                <div
                                                    class="progress-bar bg-gradient-info w-60"
                                                    role="progressbar"
                                                    aria-valuenow="60"
                                                    aria-valuemin="0"
                                                    aria-valuemax="100"
                                                ></div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr> -->
                                    <?php foreach($data['historycal'] as $row):?>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                    <!-- <img
                                                        src="../assets/img/small-logos/logo-xd.svg"
                                                        class="avatar avatar-sm me-3"
                                                        alt="xd"
                                                    /> -->
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?=$row['customername']?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-group mt-2">
                                                    <a
                                                    href="javascript:;"
                                                    class="avatar avatar-xs rounded-circle d-flex justify-content-between gap-2"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom"
                                                    aria-label="<?=$row['barber']?>"
                                                    data-bs-original-title="<?=$row['barber']?>"
                                                    >
                                                    <img src="../assets/img/<?=$row['pic']?>" alt="<?=$row['barber']?>" /><span class="text-sm font-weight-bold text-secondary "><?=$row['barber']?></span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> <?=$row['price']?></span>
                                            </td>
                                            <td class="align-middle text-center">
                                                
                                                <span class="me-2 font-weight-bold text-xs"><?=$row['visit']?></span>
                                                
                                            </td>
                                        </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?=view('template/footer')?>
    </div>
<?=$this->endSection()?>


