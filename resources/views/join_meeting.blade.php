<?php 
  $app_name       = "Power Hour Therapist";
  $app_mode       = "free";
  // $addthis_enable = get_app_config("addthis_enable");
  // $addthis_pubid  = get_app_config("addthis_pubid"); 
  // $backdrop_image = base_url('uploads/'.get_app_config('backdrop_image')); 
  // $og_image       = base_url('uploads/'.get_app_config('og_image'));
  // $check_availability_to_host_meeting   = $this->common_model->check_availability_to_host_meeting(); 
  // $check_availability_to_join_meeting   = $this->common_model->check_availability_to_join_meeting(); 
?>

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <a href="<?php // echo base_url(); ?>">
                      <img src="<?php // echo base_url('uploads/system_logo/'.get_app_config("logo")); ?>"></a><br>
                    <a href="<?php // echo base_url(); ?>"><h1 class="h4 text-gray-900 mb-4"><?php // echo get_app_config("app_name") ?> - Login</h1></a>
                  </div>
                  <!-- error/success message -->
                  <?php // if($this->session->flashdata('success') !='') : ?>
                    <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×
                      </button>
                      <?php // echo $this->session->flashdata('success'); ?>
                    </div>
                  <?php // endif; ?>
                  <?php // if($this->session->flashdata('error') !='') : ?>
                    <div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×
                      </button>
                      <?php // echo $this->session->flashdata('error'); ?>
                    </div>
                  <?php // endif; ?>
                  <!-- error/success message End-->
                  <?php// if($check_availability_to_host_meeting && $check_availability_to_join_meeting): ?>
                    <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link link-left active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Join Meeting</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link link-right" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Host Meeting</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <form class="user" action="<?php // echo base_url('room/join'); ?>" method="post">
                          <div class="form-group">
                            <input type="text" name="meeting_code" class="form-control form-control-user" id="" aria-describedby="" placeholder="Enter Meeting ID">                   
                          </div>
                          <button type="submit" class="btn btn-primary btn-user btn-block">Join Now</button>
                        </form>
                      </div>
                      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                          <form class="user" action="<?php // echo base_url('room/create-and-join'); ?>" method="post">
                            <div class="form-group">
                              <input type="text" name="meeting_title" value="" class="form-control form-control-user" id="" aria-describedby="" placeholder="Enter Meeting Title(optional)">
                            </div>
                            <div class="form-group">
                              <input type="text" name="meeting_code" value="<?php // echo $meeting_code; ?>" required class="form-control form-control-user" id="" aria-describedby="" placeholder="Enter Meeting ID">
                              <div class="my-2"></div>
                              <?php // if($addthis_enable == "true"): ?>
                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <div class="addthis_inline_share_toolbox_f6vn"></div>
                              <?php // endif; ?>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">Create &amp; Join Now</button>
                          </form>                     
                      </div>
                    </div>
                  <?php// elseif($check_availability_to_join_meeting): ?>
                    {{-- <form class="user" action="<?php // echo base_url('room/join'); ?>" method="post">
                      <div class="form-group">
                        <input type="text" name="meeting_code" class="form-control form-control-user" id="" aria-describedby="" placeholder="Enter Meeting ID">                   
                      </div>
                      <button type="submit" class="btn btn-primary btn-user btn-block">Join Now</button>
                    </form> --}}
                    <?php // else: ?>
                      <div class="text-center">
                        <div class="alert alert-warning">Please Login to Explore.</div>                    
                          <a class="small" href="<?php // echo base_url('login'); ?>">Login</a> |
                          <a class="small" href="<?php// echo base_url('signup'); ?>">Signup</a>
                      </div>
                  <?php // endif; ?>
                  <?php // if($this->session->userdata('login_status') !='1'): ?>
                    <hr>
                    <div class="text-center">                    
                      <a class="small" href="<?php// echo base_url('login'); ?>">Login</a> |
                      <a class="small" href="<?php //echo base_url('signup'); ?>">Signup</a>
                    </div>
                  <?php // if($this->session->userdata('login_type') == "admin"):?>
                    <hr>
                    <div class="text-center">                    
                      <a class="small" href="<?php // echo base_url('admin/dashboard'); ?>">Back to Dashboard</a>
                    </div>
                  <?php // endif; endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>