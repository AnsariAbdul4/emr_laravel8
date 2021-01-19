@extends('template\layout');
@section('content')  
  <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 neg-mar-l-15 user-area">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3 class="pull-left">My Profile</h3>
        <a href="users/profile/{{$user->user_id}}" class="btn btn-primary pull-right"><i class="fa fa-pencil"></i> Edit Profile</a>
        <br>
      </div>
    </div><hr>
    <div id="alert">
    </div>
    <?php // echo $this->commonhelper->show_alert('message'); ?>  
    <!--<div class="alert alert-success" role="alert">Success Message</div>
    <div class="alert alert-danger" role="alert">Failed Message</div>-->
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">                                
        <div class="panel panel-default box-height">
          <div class="panel-heading">Basic Information</div>
          <div class="panel-body">
            <div class="row negpad">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <label><strong>Full Name</strong></label>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label><?php echo $user->first_name.' '.$user->last_name; ?></label>
              </div>
            </div>
            <div class="row negpad">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <label><strong>Date of Birth</strong></label>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label><?= isset($user->DOB) && $user->DOB != '' ?date('d M Y', strtotime($user->DOB)):'Not Set' ?></label>
              </div>
            </div>
            <div class="row negpad">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <label><strong>Email ID</strong></label>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label><?= isset($user->email) && $user->email != '' ? $user->email :'Not Set' ?></label>
              </div>
            </div>
            <div class="row negpad">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <label><strong>Mobile No</strong></label>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label><?= isset($user->mobile) && $user->mobile != '' ? $user->mobile :'Not Set' ?></label>
              </div>
            </div>
            <div class="row negpad">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <label><strong>Blood Group</strong></label>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label><?= isset($user->blood_group_id) && $user->blood_group_id != '' ? $user->blood_group_id :'Not Set' ?></label> <!-- $this->Blood_group_model->getBloodGroupById($user->blood_group_id) -->
              </div>
            </div>
            <div class="row negpad">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <label><strong>Marital Status</strong></label>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label><?= isset($user->marital_status) && $user->marital_status != '' ? $user->marital_status :'Not Set' ?></label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 neg-pad-l-5">                                
        <div class="panel panel-default">
          <div class="panel-heading">Address Details</div>
          <div class="panel-body">
            <div class="row negpad">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <label><strong>Address</strong></label>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 height-address">
                <label><?= isset($user->address) && $user->address != '' ? $user->address :'Not Set' ?></label>
              </div>
            </div>
            <div class="row negpad">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <label><strong>Country</strong></label>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label><?= isset($user->country_id) && $user->country_id != 0 ? $user->country_id :'Not Set' ?></label> <!-- $this->Country_model->getCountryById($user->country_id) -->
              </div>
            </div>
            <div class="row negpad">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <label><strong>State</strong></label>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label><?= isset($user->state_id) && $user->state_id != 0 ? $user->state_id : 'Not Set' ?></label> <!-- $this->State_model->getStateById($user->state_id) -->
              </div>
            </div>
            <div class="row negpad">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <label><strong>City</strong></label>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label><?= isset($user->city_id) && $user->city_id != 0 ? $user->city_id :'Not Set' ?></label> <!-- $this->City_model->getCityById($user->city_id)-->
              </div>
            </div>
            <div class="row negpad">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <label><strong>Pin Code</strong></label>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label><?= isset($user->zip_code) && $user->zip_code != '' ? $user->zip_code :'Not Set' ?></label>
              </div>
            </div>
          </div>
        </div>
      </div>         
    </div>
    <?php // / print_r($vital_statistic); ?>
    
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-heading">Latest Vital Statistics</div>
          <div class="panel-body">
            <div class="row negpad">
              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                <label><strong>Height</strong></label>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12">
                <label><?= isset($vital_statistic->height)&& $vital_statistic->height != '' ? $vital_statistic->height.' ' :'Not Set ' ?> <?= isset($vital_statistic->height_in) ? $vital_statistic->height_in :'Not Set' ?></label>
              </div>
            </div>
            <div class="row negpad">
              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                <label><strong>Weight</strong></label>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12">
                <label><?= isset($vital_statistic->weight) && $vital_statistic->weight != '' ? $vital_statistic->weight.' ' :'Not Set ' ?> <?= isset($vital_statistic->weight_in) ? $vital_statistic->weight_in :'Not Set' ?></label>
              </div>
            </div>
            <div class="row negpad">
              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                <label><strong>Allergies</strong></label>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label><?= isset($vital_statistic->allergies) && $vital_statistic->allergies != ''  ? $vital_statistic->allergies :'Not Set' ?></label>
              </div>
            </div>
            <div class="row negpad">
              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                <label><strong>Aliments History</strong></label>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label><?= isset($vital_statistic->aliments) && $vital_statistic->aliments != '' ? $vital_statistic->aliments :'Not Set' ?></label>
              </div>
            </div>
            <div class="row negpad">
              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                <label><strong>Current Medication</strong></label>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label><?= isset($vital_statistic->medication) && $vital_statistic->medication != ''  ? $vital_statistic->medication :'Not Set' ?></label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection 