<div class="col-12">
    <div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
        <h6 class="text-white text-capitalize ps-3"><?=$tableTitle?></h6>
        </div>
    </div>
    <div class="card">
        <div class="table-responsive">
        <table class="table align-items-center mb-0" id="myTable">
            <thead>
            <tr>
                <?php foreach($columns as $col):?>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><?=$col?></th>
                <?php endforeach?>
                <th class="text-secondary opacity-7" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php //for($i=0; $i<=10; $i++):?>
            <!-- <tr>
                <td>
                <div class="d-flex px-2 py-1">
                    <div>
                    <img src="<?=base_url()?>assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-xs">John Michael</h6>
                    <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                    </div>
                </div>
                </td>
                <td>
                <p class="text-xs font-weight-bold mb-0">Manager</p>
                <p class="text-xs text-secondary mb-0">Organization</p>
                </td>
                <td class="align-middle text-center text-sm">
                <span class="badge badge-sm rounded-pill text-success">Online</span>
                </td>
                <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-normal">23/04/18</span>
                </td>
                <td class="align-middle">
                <a href="javascript:;" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Edit
                </a>
                </td>
            </tr>

            <tr>
                <td>
                <div class="d-flex px-2 py-1">
                    <div>
                    <img src="https://demos.creative-tim.com/test/material-dashboard-proassets/img/team-3.jpg" class="avatar avatar-sm me-3">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-xs">Alexa Liras</h6>
                    <p class="text-xs text-secondary mb-0">alexa@creative-tim.com</p>
                    </div>
                </div>
                </td>
                <td>
                <p class="text-xs font-weight-bold mb-0">Programator</p>
                <p class="text-xs text-secondary mb-0">Developer</p>
                </td>
                <td class="align-middle text-center text-sm">
                <span class="badge badge-sm badge-secondary">Offline</span>
                </td>
                <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-normal">11/01/19</span>
                </td>
                <td class="align-middle">
                <a href="#!" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Edit
                </a>
                </td>
            </tr> -->
            <?php //endfor?>
            <?php foreach($data as $row):?>
            <tr>
                <td><?=$row['categoryid']?></td>
                <td>
                    <p class="ps-3 font-weight-normal mb-0"><?=$row['categoryname']?></p>
                </td>
                <td>
                    <p class="font-weight-normal mb-0"><?=$row['price']?></p>
                </td>
                <td class="align-middle text-center text-sm">
                    <span class="badge bg-gradient-<?=$row['status']=='1' ? 'success' : 'danger'?>"><?=$row['status'] == '1' ? 'Active' : 'Not Active'?></span>
                    <!-- <span class="badge badge-sm rounded-pill text-success"><?=$row['status']?></span> -->
                </td>
                <td class="align-middle editBtn">
                    <button class="btn btn-sm btn-icon btn-3 btn-info" type="button">
                        <span class="btn-inner--icon"><i class="material-icons">edit</i></span>
                        <span class="btn-inner--text">Edit </span>
                    </button>
                </td>
                <td class="align-middle delBtn">
                    <button class="btn btn-sm btn-icon btn-3 btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#modal<?=$confirmDelete?>Confirm">
                        <span class="btn-inner--icon"><i class="material-icons">delete</i></span>
                        <span class="btn-inner--text">Delete </span>
                    </button>
                </td>
            </tr>
            <?php endforeach?>
            </tbody>
        </table>
        </div>
        <?php foreach($data as $row):
        //print_r($row);
        endforeach?>
    </div>
    </div>
</div>