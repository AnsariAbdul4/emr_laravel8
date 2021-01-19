@extends('template.layout');
@section('content')
  <?php $user_detail = session('user_details');   ?>
  <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 neg-mar-l-15 user-area">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3 class="pull-left">Hi, <?php echo $user_detail->first_name; ?> !!!</h3>
      </div>
    </div><hr />
    <div id="alert"></div>
    <?php // echo $this->commonhelper->show_alert('message'); ?>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-8 col-md-9 col-sm-9 col-xs-12">
                <h3>My records</h3>
              </div>
              <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12"><br />
                <select class="form-control">
                  <option>Select period</option>
                  <option>Weekly</option>
                  <option>Monthly</option>
                  <option>Yearly</option>
                </select>
              </div>
            </div>
            <div id="line-example" style="height: 300px;"></div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-8 col-md-9 col-sm-9 col-xs-12">
                <h3>My medications</h3>
              </div>
              <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12"><br />
                <select class="form-control">
                  <option>Select period</option>
                  <option>Weekly</option>
                  <option>Monthly</option>
                  <option>Yearly</option>
                </select>
              </div>
            </div>                                    
            <div id="bar-example" style="height: 300px;"></div>
          </div>
        </div>
      </div>
    </div><br />
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
        <div class="row">
          <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
            <div class="box-content box-statistic blue-background">
              <h2 class="title color-white">
                <?php echo '0'; //$this->Users_model->getCountOfRegisteredPatients(); ?>
              </h2>
              <p>Registered Individuals</p>
              <div class="color-white fa fa-2x fa-user dash-box-icon pull-right"></div>
            </div>
            <div class="box-content box-statistic green-background">
              <h2 class="title color-white">
                <?php echo 0; // $this->Users_model->getCountOfRegisteredFamilies(); ?>
              </h2>
              <p>Registered Families</p>
              <div class="color-white fa fa-2x fa-users dash-box-icon pull-right"></div>
            </div>
            <div class="box-content box-statistic purple-background">
              <h2 class="title color-white">
                <?php echo 0; // $this->Users_model->getCountOfRegisteredDoctors(); ?>
              </h2>
              <p>Registered Doctors</p>
              <div class="color-white fa fa-2x fa-user-md dash-box-icon pull-right"></div>
            </div>
            <div class="box-content box-statistic red-background">
              <h2 class="title color-white">1025</h2>
              <p>Registered Hospitals</p>
              <div class="color-white fa fa-2x fa-hospital-o dash-box-icon pull-right"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-9 col-md-9 col-sm-7 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#users" aria-controls="users" role="tab" data-toggle="tab">Recent medications</a></li>
              <li role="presentation"><a href="#logs" aria-controls="logs" role="tab" data-toggle="tab">MY recent health logs</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="users">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive table-stripped1">
                      <table class="table table-striped" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                          <th>Picture</th>
                          <th>Name</th>
                          <th>Create Date</th>
                        </tr>
                        <?php
                          $medications = []; //$this->Medication_model->getRecentMedications();
                          if(count($medications)>0){
                            foreach($medications as $mecication){
                              $relative = ''; //$this->Relatives_model->getImageAndFirstNameById($mecication->relative_id);
                              ?>
                                <tr>
                                  <td><img src="uploads<?php // echo $relative->image;  ?>" class="profileico-sm"></td>
                                  <td><?php // echo $relative->first_name;  ?></td>
                                  <td><?php // echo date('d M Y H:i:s A',strtotime($mecication->created_date)); ?></td>
                                </tr>
                              <?php
                            } // foreach
                          }else{
                            echo '<tr><td colspan="3" > No Data Found.</td></tr>';
                          } 
                        ?>
                        <tr>
                          <td><img src="images/user2.jpg" class="profileico-sm"></td>
                          <td>Sumit Kulkarni</td>
                          <td>12 Jan 2017 04:30:57 pm</td>
                        </tr>
                        <tr>
                          <td><img src="images/user3.jpg" class="profileico-sm"></td>
                          <td>Sumit Kulkarni</td>
                          <td>12 Jan 2017 04:30:57 pm</td>
                        </tr>
                        <tr>
                          <td><img src="images/user4.jpg" class="profileico-sm"></td>
                          <td>Sumit Kulkarni</td>
                          <td>12 Jan 2017 04:30:57 pm</td>
                        </tr>
                        <tr>
                          <td><img src="images/user.jpg" class="profileico-sm"></td>
                          <td>Sumit Kulkarni</td>
                          <td>12 Jan 2017 04:30:57 pm</td>
                        </tr>
                        <tr>
                          <td><img src="images/user1.jpg" class="profileico-sm"></td>
                          <td>Sumit Kulkarni</td>
                          <td>12 Jan 2017 04:30:57 pm</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="logs">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive table-stripped1">
                      <table class="table table-striped" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                          <th>Picture</th>
                          <th>Name</th>
                          <th>Create Date</th>
                        </tr>
                        <tr>
                          <td><img src="images/user2.jpg" class="profileico-sm"></td>
                          <td>Sumit Kulkarni</td>
                          <td>12 Jan 2017 04:30:57 pm</td>
                        </tr>
                        <tr>
                          <td><img src="images/user3.jpg" class="profileico-sm"></td>
                          <td>Sumit Kulkarni</td>
                          <td>12 Jan 2017 04:30:57 pm</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection