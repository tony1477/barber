<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <?php foreach($menu as $row):?>
        <?php if($row->parentid == ''):?>
        <li class="nav-item">
          <a class="nav-link text-white <?=($active == $row->url ? ' active bg-gradient-primary' : '')?> " href="<?=base_url().$row->url?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10"><?=$row->icon?></i>
            </div>
            <span class="nav-link-text ms-1"><?=$row->menuname?></span>
          </a>
        </li>
        <?php endif?>
        <?php endforeach?>
        <!-- <li class="nav-item">
          <a class="nav-link text-white " href="../pages/dashboard.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" class="nav-link text-white collapsed" href="#test" aria-controls="test" aria-expanded="false">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Tables</span>
          </a>
          <div class="collapse" id="test">
            <ul class="nav">
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../pages/applications/crm.html">
                    <span class="sidenav-mini-icon"> C </span>
                    <span class="sidenav-normal  ms-2  ps-1"> CRM </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../pages/applications/crm.html">
                    <span class="sidenav-mini-icon"> C </span>
                    <span class="sidenav-normal  ms-2  ps-1"> CRM </span>
                </a>
              </li>
            </ul>
          </div>  
        </li>
         -->
      </ul>
    </div>