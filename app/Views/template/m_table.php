<div class="col-12">
    <div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
        <h6 class="text-white text-capitalize ps-3"><?=$tableTitle?></h6>
        </div>
    </div>
    <div class="card">
        <div class="table-responsive">
            <div class="row justify-content-center py-3">
                <?php if(session()->has('message')):?>
                <div class="alert alert-info alert-dismissible text-white fade show w-25" role="alert">
                    <span class="alert-icon align-middle">
                        <span class="material-icons text-md">done</span>
                    </span>
                    <span class="alert-text"><strong>Done!</strong> <?=session('message')?></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif?>
            </div>
            <table class="table align-items-center mb-0" id="myTable">
                <thead>
                <tr>
                    <?php foreach($columns as $col):?>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><?=$col?></th>
                    <?php endforeach?>
                    <?php if(isset($additionalCol)):
                        foreach($additionalCol as $title => $value):?>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7"><?=$title?></th>
                    <?php endforeach; endif?>
                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7" colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
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
                <?php $length = count($field);
                foreach($data as $key => $row):?>
                <tr>
                    <?php for($i=0; $i<$length; $i++):?>
                        <?php 
                        switch($field[$i]) {
                            case 'status':
                            $td = sprintf('<td class="align-middle text-center text-sm">
                                <span class="badge bg-gradient-'.($row['status']=='1' ? 'success' : 'danger').'">'.($row['status'] == '1' ? 'Active' : 'Not Active').'</span></td>');
                            break;

                            default:
                            $td = sprintf('<td><p class="ps-3 font-weight-normal mb-0">'.$row[$field[$i]].'</p></td>');
                        }
                        ?>
                        <!-- <td><?php //$row[$field[$i]]?></td> -->
                        <?=$td?>
                    <?php endfor?>
                    <?php if(isset($additionalCol)):
                        foreach($additionalCol as $title => $value):?>
                            <?=$value?>
                    <?php endforeach; endif?>
                    <td class="align-middle editBtn text-end">
                    <?php if (auth()->user()->can('admin.access') || uri_string()=='pelanggan') :?>
                        <button class="btn btn-sm btn-icon badge btn-info" type="button">
                            <span class="btn-inner--icon"><i class="material-icons">edit</i></span>
                            <span class="btn-inner--text">Edit </span>
                        </button>
                        <?php endif?>
                    </td>
                    <td class="align-middle delBtn">
                        <?php if (auth()->user()->can('admin.access' ) || uri_string()=='pelanggan') :?>
                        <button class="btn btn-sm btn-icon badge btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#modal<?=$confirmDelete?>Confirm">
                            <span class="btn-inner--icon"><i class="material-icons">delete</i></span>
                            <span class="btn-inner--text">Delete </span>
                        </button>
                        <?php endif?>
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