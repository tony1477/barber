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
            <div class="col-lg-8 col-xl-8 col-sm-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Add Transaction</h6>
                        </div>
                    </div>
                    <div class="card p-3">
                        <div class="col-12">
                            <h4 class="">Payment</h4>
                            
                            <?php //csrf_field()?>
                                <div class="row g-3 p-2">
                                    <div class="col-12">
                                        <div class="col-12">
                                            <div class="card card-plain h-100">
                                                <div class="card-body p-3">
                                                <ul class="list-group">
                                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                                        <strong class="text-dark">Date :</strong> &nbsp; <?=$data['transdate']?>
                                                    </li>
                                                    <li class="list-group-item border-0 ps-0 text-sm">
                                                        <strong class="text-dark">Time:</strong> &nbsp; <?=$data['transtime']?>
                                                    </li>
                                                    <li class="list-group-item border-0 ps-0 text-sm">
                                                        <strong class="text-dark">Customer :</strong> &nbsp; <?=$data['customername']?>
                                                    </li>
                                                    <li class="list-group-item border-0 ps-0 text-sm">
                                                    <strong class="text-dark">Barber:</strong> &nbsp; <?=$data['barbername']?>
                                                    </li>
                                                    <li class="list-group-item border-0 ps-0 pb-0">
                                                        <strong class="text-dark text-sm align-top">Photo:</strong> &nbsp;
                                                        <div class="avatar me-3">
                                                            <img src="<?=base_url('public')?>/uploads/<?=$data['custpic']?>" alt="kal" class="border-radius-lg shadow">
                                                        </div>
                                                    </li>
                                                </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-lg-0 mb-4">
                                            <div class="card mt-4">
                                                <div class="card-header p-3 bg-gradient-faded-primary">
                                                    <div class="row">
                                                        <div class="col-6 d-flex align-items-center">
                                                            <h6 class="mb-0"></h6>
                                                        </div>
                                                        <div class="col-6 text-end">
                                                            <a class="btn bg-gradient-dark mb-0" href="javascript:;"
                                                            ><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add Service(s)</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body p-3">
                                                    <form action="<?=base_url()?>transaksi/simpan2" method="post">
                                                    <?=csrf_field()?>
                                                        <?=form_hidden('transid',$data['transid'])?>
                                                        <div class="row">
                                                            <div class="col-4 mb-md-0 mb-4">
                                                                <div class="input-group input-group-static mb-4">
                                                                    <label for="customerSelect" class="ms-0">Category</label>
                                                                    <select class="form-control px-2" id="customerSelect" name="customerid" required>
                                                                        <option value="" disabled selected hidden>Pilih Jenis</option>
                                                                        <?php foreach($category as $row):?>
                                                                        <option value="<?=$row->categoryid?>"><?=$row->categoryname?></option>
                                                                    <?php endforeach?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="input-group input-group-outline my-3 focus is-focused">
                                                                    <label class="form-label">Qty</label>
                                                                    <input type="number" name="qty" class="form-control" required value="1">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <!-- <div class="input-group input-group-outline my-3 focus is-focused">
                                                                    <label class="form-label">Price</label>
                                                                    <input type="number" name="price" readonly class="form-control"  value="">
                                                                </div> -->
                                                                    <button type="button" class="btn adddetail bg-gradient-success mt-3"><i class="material-icons text-sm">check</i>&nbsp;&nbsp;Save</button>
                                                            </div>  
                                                        </div>
                                                    </form>

                                                    <div class="card pt-3">
                                                        <div class="table-responsive">
                                                            <table class="table align-items-center mb-0 " id="tabledetail">
                                                                <thead>
                                                                <tr>
                                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Services</th>
                                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Qty</th>
                                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sub Total</th>
                                                                <th class="text-secondary opacity-7"></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                                <tfoot class="d-none">
                                                                    <tr class="">
                                                                        <td colspan="3" class="text-end">
                                                                            <p class="total font-weight-bold">Total : </p>
                                                                        </td>
                                                                    <td class="text-center"><button type="button" class="btn done bg-gradient-success mt-3"><i class="material-icons text-sm">task_alt</i>&nbsp;&nbsp;Done</button></td></tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                <!-- <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button> -->
                        </div>
                    </div>
                </div>
            </div>
      </div>
      <?=view('template/footer')?>
    </div>
<?=$this->endSection()?>
<?=$this->section('script')?>
<script>
    function formatRupiah(number) {
        const number_string = number.toString();
        const split = number_string.split(',');
        const sisa = split[0].length % 3;
        let rupiah = split[0].substr(0, sisa);
        let ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

        if (ribuan) {
            let separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join(',');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return 'Rp. ' + rupiah;
    }

    const saveBtn = document.querySelector('.adddetail')
    const doneBtn = document.querySelector('.done')
    const p = document.querySelector('p.total')
    saveBtn.addEventListener('click', function(e){
        const transid = document.querySelector('input[name="transid"]')
        const category = document.querySelector('select[name="customerid"]')
        const qty = document.querySelector('input[name="qty"]')
        const data = {
            'transid' : transid.value,
            'categoryid' : category.value,
            'qty' : qty.value,
        }
        fetch('<?=base_url()?>transaksi/simpan2',{
            method: 'POST',
            headers: {
                "Content-Type": "application/json",
                // 'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            let total = 0;
            
            category.value = ''
            qty.value = 1
            fetch(`<?=base_url()?>transaksi/${transid.value}`,{
                method: 'GET'
            })
            .then(response => response.json())
            .then(result => {
                // console.log(result)
                let table = document.getElementById('tabledetail')
                let tbody = table.getElementsByTagName('tbody')[0];
                let tfoot = document.getElementsByTagName('tfoot')[0]
                tbody.innerHTML = ''
                result.data.forEach(item => {
                    let tr = tbody.insertRow()
                    let fields = ['categoryname','qty','price','sub_total']
                    fields.forEach(field => {
                        let cell = tr.insertCell()
                        cell.appendChild(document.createTextNode(item[field]))
                    })
                    total = total + (item.price * item.qty)
                })
                p.innerText = `Total : ${formatRupiah(total)}`
                tfoot.classList.remove('d-none')
            })
        })
        // category.value = ''
        // category.value = ''
    })

    doneBtn.addEventListener('click', function(e) {
        const transid = document.querySelector('input[name="transid"]')
        // const p = document.querySelector('p.total')
        // const total = p.innerText.slice(12).replace(',','')
        const data  ={'id':transid.value}
        fetch(`<?=base_url()?>transaksi/post`,{
            method:'POST',
            headers: {
                "Content-Type": "application/json",
                // 'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(result => {
            if(result.status=='success') window.location.href = '<?=base_url()?>transaksi'
            // if(data.status == 'success')

        })
    })
</script>
<?=$this->endSection()?>
