<div class="modal fade" id="modal<?=$idModal?>" tabindex="-1" role="dialog" aria-labelledby="modal<?=$idModal?>Title" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h6 class="modal-title font-weight-normal" id="exampleModalLabel">New message to Creative Tim</h6>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <form action="<?=$action?>" id="frm<?=$idModal?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <input type="text" name="id" value="" style="display: none;">
            <?php foreach($colModal as $field):?>
            <?php switch ($field['type']) {
                case 'switch':
                    $input = '<div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="'.$field['name'].'" id="flexSwitch'.$field['name'].'" checked>
                    <label class="form-check-label" for="flexSwitch'.$field['name'].'">'.$field['label'].'</label>
                    </div>';
                    break;
                // case 'date':
                //   $input = '<div class="input-group input-group-outline focused is-focused my-3">
                //     <label class="form-label">'.$field['label'].'</label>
                //     <input type="'.$field['type'].'" class="form-control" value="" name="'.$field['name'].'">
                //     </div>';
                //     break;
                default:
                    $input = '<div class="input-group input-group-outline my-3">
                    <label class="form-label">'.$field['label'].'</label>
                    <input type="'.$field['type'].'" class="form-control" value="" name="'.$field['name'].'">
                    </div>';
                    break;
            }?>
            <?=$input?>
            <?php endforeach?>
            <!-- <div class="input-group input-group-dynamic">
            <textarea class="multisteps-form__textarea form-control" rows="5" placeholder="Say a few words." spellcheck="false"></textarea>
            </div> --> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn bg-gradient-primary">Save</button>
        </div>
        </form>
    </div>
    </div>
</div>

<div class="modal fade" id="modal<?=$idModal?>Confirm" tabindex="-1" role="dialog" aria-labelledby="modal<?=$idModal?>Confirm" aria-hidden="true">
  <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title font-weight-normal" id="modal-title-notification">Your attention is required</h6>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="py-3 text-center">
          <i class="material-icons text-5xl">notifications_active</i>
          <h4 class="text-gradient text-danger mt-4">You should read this!</h4>
          <p>Are you sure to delete this row?</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger delete<?=$idModal?>">Ok, Got it</button>
        <button type="button" class="btn btn-info ml-auto" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>