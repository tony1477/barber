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
          // dom:'Bfrtip'
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
    });

</script>
<?=$this->endSection()?>

