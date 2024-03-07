<?php date_default_timezone_set('Asia/Jakarta')?>
<?=$this->extend('template/index');?>
<?=$this->section('breadcrumb')?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Transaction</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Create</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Create</h6>
    </nav>

<?=$this->endSection()?>
<?=$this->section('content')?>
    <div class="container-fluid py-4">
       <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Add Transaction</h6>
                        </div>
                    </div>
                    <div class="card p-3">
                        <div class="col-md-8 col-lg-8 col-sm-12">
                            <h4 class="">Payment</h4>
                            <form action="<?=base_url()?>transaksi/simpan1" method="post">
                            <?=csrf_field()?>
                                <div class="row g-3 p-2">
                                    <div class="col-md-8 col-sm-12">
                                        <div class="input-group input-group-outline my-3 focus is-focused">
                                            <label class="form-label">Date</label>
                                            <input type="text" name="transdate" class="form-control" readonly value="<?=date('m/d/Y')?>">
                                        </div>
                                        <div class="input-group input-group-outline my-3 focus is-focused">
                                            <label class="form-label">Time</label>
                                            <input type="text" name="transtime" class="form-control" readonly value="<?=date('H:i:s')?>">
                                        </div>
                                        <!-- <div class="input-group input-group-outline my-3 focus is-focused">
                                            <label class="form-label">Cashier</label>
                                            <input type="text" class="form-control" disabled value="<?=date('H:i:s')?>">
                                        </div> -->
                                        <div class="input-group input-group-static mb-4">
                                            <label for="customerSelect" class="ms-0">Customer</label>
                                            <select class="form-control px-2" id="customerSelect" name="customerid">
                                                <option value="" disabled selected hidden>Pilih Customer</option>
                                                <?php foreach($customer as $row):?>
                                                    <option value="<?=$row->customerid?>"><?=$row->fullname?> - (<?=$row->address?>)</option>
                                                <?php endforeach?>
                                            </select>
                                        </div>
                                        <div class="input-group input-group-static mb-4">
                                            <label for="barberSelect" class="ms-0">Barber Man</label>
                                            <select class="form-control px-2" id="barberSelect" name="barberid" required>
                                                <!-- <option value="">Pilih Barber</option> -->
                                                <option value="" disabled selected hidden>Pilih Barber</option>
                                                <?php foreach($barber as $row):?>
                                                    <option value="<?=$row->employeeid?>"><?=$row->fullname?></option>
                                                <?php endforeach?>
                                            </select>
                                        </div>
                                        <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
      </div>
      <?=view('template/footer')?>
    </div>
<?=$this->endSection()?>