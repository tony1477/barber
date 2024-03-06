<?=$this->extend('template/index');?>
<?=$this->section('breadcrumb')?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Transaction</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">List</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">List</h6>
    </nav>

<?=$this->endSection()?>
<?=$this->section('content')?>
    <div class="container-fluid py-4">
       <div class="row">
        <?=view('template/m_table',$tableProps)?>
      </div>
      <?=view('template/footer')?>
    </div>

    <?=view('template/m_modal',$fieldColumns)?>
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

    $(document).ready( function () {
        var table = $('#myTable').DataTable({
            columnDefs: [
            {
                target: 0,
                visible: false,
                searchable: false
            }],
            buttons: [ {
                text: 'Add',
                action: function ( e, dt, node, config ) {
                    // console.log(e,dt,node,config)
                    const frm = document.querySelector('#frmtransaction')
                    frm.reset()
                    $('#modaltransaction').modal('show')
                }
            },'copy','excel','pdf'],
            dom: "<'row'<'col-sm-12 col-md-6 pt-2 ps-3'B>>" +
                 "<'row'<'col-sm-12 col-md-6 ps-3'l><'col-sm-12 col-md-6'f>>" +
                 "<'row'<'col-sm-12'tr>>" +
                 "<'row py-3'<'col-sm-12 col-md-5 ps-3'i><'col-sm-12 col-md-7 'p>>",
          // dom:'Bfrtip',
        });

        $(document).on('click','#myTable tbody td.editBtn',  function(e) {
            let row = table.row(this).data()
            // let id, nama, harga,status
            let [id, nama, alamat, stat, hp ] = row
            //   let namaValue = table.cell(this, 1).data();
            let idx = $(id).text()
            let fullname = $(nama).text()
            let address = $(alamat).text()
            let status = $(stat).text()
            let phone = $(hp).text()
            
            const isFill = document.querySelectorAll('.input-group')
            isFill.forEach(el => {
                el.classList.add('is-filled')
            })
            $('#modaltransaction').modal('show')
            $('input[name="id"]').val(idx)
            $('input[name="fullname"]').val(fullname)
            $('input[name="address"]').val(address)
            $('input[name="status"]').val(status)
            $('input[name="phone"]').val(phone)
        
        })
        
        $(document).on('click','#myTable tbody td.delBtn',  function(e) {
            let row = table.row(this).data()
            let id = row[0]
            // console.log(id)
            let idx = $(id).text()
            let btn = document.querySelector('.deletetransaction')
            btn.addEventListener('click', function(e) {
                deleteData('<?=base_url()?>/pelanggan/hapus',{'id':idx})
                // .then(resp => resp.json())
                .then(data => {
                    if(data.status == 'success') {
                        location.reload()
                    }
                })
            })    
        
        })

        $(document).off('click','#myTable tbody td.detailBtn').on('click','#myTable tbody td.detailBtn', async function(e) {

            const table = $(this).closest('table').DataTable();
            const tr = $(this).closest('tr');
            const row = table.row(tr);
            // const data = row.data()

            let [id] = row.data()
            let idx = $(id).text()
            
            if (row.child.isShown()) {
                table.rows().every(function () {
                    this.child.hide()
                })
            } else {
                table.rows().every(function() {
                    this.child.hide();
                })

                // let fullname = data.fullname.replace(/\s+/g, '-').toLowerCase();

                const res = await fetchContent(idx);

                let detailHtml = `<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">`;

                res.forEach(item => {
                    detailHtml += `<tr>
                        <td>${item.qty}X ${item.categoryname}</td>
                        <td>${formatRupiah(item.price)}</td>
                        <td class="text-end w-50">Sub Total = ${formatRupiah(item.sub_total)}</td>
                        </tr>`
                })
                detailHtml += '</table>'
                
                await row.child(detailHtml).show()
                // fetch(`../employee/point/${monthlyid}/detail`,{
                //     method: 'GET',
                //     mode: 'cors',
                //     cache: 'no-cache',
                //     headers: {
                //         'Content-Type' : 'application/json',
                //         'X-Requested-With': 'XMLHttpRequest'
                //     },
                // })
                // .then(response => response.json())
                // .then(data => {                    
                //     console.log(data)
                    
                //     row.child(detailHtml).show();  
                // })
            }
            // let idx = $(id).text()
            // let btn = document.querySelector('.deletetransaction')
            // btn.addEventListener('click', function(e) {
            //     deleteData('<?=base_url()?>/pelanggan/hapus',{'id':idx})
            //     // .then(resp => resp.json())
            //     .then(data => {
            //         if(data.status == 'success') {
            //             location.reload()
            //         }
            //     })
            // })    
        
        })

        async function fetchContent(id) {
            try {
                const url = `<?=base_url()?>/transaksi/${id}`
                const response = await fetch(url)
                const data = await response.json()
                if(data.status == 'success') {
                    return data.data
                }
            } catch(error) {
                alert('Error fetching Data :',error)
            }
        }
    });

</script>
<?=$this->endSection()?>

