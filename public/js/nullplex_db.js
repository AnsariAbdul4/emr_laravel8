var baseurl = $("#baseurl").val();

/*****************    Image preview while uploading   ************************************/
$("#relative_image").change(function() {
 
  if (this.files && this.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#profile_pic').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
  }
});

/*****************    Show popup for relatives details   ************************************/

// Code By : Abdul
$('.view_relative').on('click', function() {
  var relative_id = this.id ;
  $.ajax({
        type: 'POST',
        url: baseurl+'relatives/viewrelative/',
        data:{relative_id:relative_id},
        success: function(data){
          $('#view_detail').html(data);  
        },
    });
});

/*****************    Map controll   ************************************/
 var geocoder = new google.maps.Geocoder();

        function geocodePosition(pos) {
            geocoder.geocode({
                latLng: pos
            }, function (responses) {
                if (responses && responses.length > 0) {
                    updateMarkerAddress(responses[0].formatted_address);
                } else {
                    updateMarkerAddress('Cannot determine address at this location.');
                }
            });
        }

        function updateMarkerStatus(str) {
            document.getElementById('markerStatus').innerHTML = str;
        }

        function updateMarkerPosition(latLng) {
           /* document.getElementById('info').innerHTML = [
              latLng.lat(),
              latLng.lng()
            ].join(', ');*/
            $('#latitude').val(latLng.lat());
            $('#longitude').val(latLng.lng());
        }

        function updateMarkerAddress(str) {
            // document.getElementById('address1').innerHTML = str;
            $('#address').val(str);
        }

        function initialize() {
            var lat = $('#latitude').val();
            var long = $('#longitude').val();
            var set_zoom = 17;
            if(lat != '' && long != ''){
                var latLng = new google.maps.LatLng(lat, long);
            }else{
                set_zoom = 8;
                var latLng = new google.maps.LatLng(22.92898476578635, 79.6228818359375);
            }
            
            var map = new google.maps.Map(document.getElementById('mapCanvas'), {
                zoom: set_zoom,
                center: latLng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            var marker = new google.maps.Marker({
                position: latLng,
                title: 'Point A',
                map: map,
                draggable: true
            });

            // Update current position info.
            updateMarkerPosition(latLng);
            geocodePosition(latLng);

            // Add dragging event listeners.
            google.maps.event.addListener(marker, 'dragstart', function () {
                updateMarkerAddress('Dragging...');
            });

            google.maps.event.addListener(marker, 'drag', function () {
                updateMarkerStatus('Dragging...');
                updateMarkerPosition(marker.getPosition());
            });

            google.maps.event.addListener(marker, 'dragend', function () {
                updateMarkerStatus('Drag ended');
                geocodePosition(marker.getPosition());
            });
        }

        // Onload handler to fire off the app.
        google.maps.event.addDomListener(window, 'load', initialize);

/*****************    Show popup for relatives details   ************************************/
// Code By : Abdul
$('.view_relative').on('click', function() {
  var relative_id = this.id ;
  $.ajax({
        type: 'POST',
        url: baseurl+'relatives/viewrelative/',
        data:{relative_id:relative_id},
        success: function(data){
          $('#view_detail').html(data);  
        },
    });
});

/*****************    Show popup for individual details   ************************************/
// Code By : Abdul
$('.view_individual').on('click', function() {
  var individual_id = this.id ;
 // alert(individual_id);
  $.ajax({
        type: 'POST',
        url: baseurl+'individuals/viewindividual/',
        data:{individual_id:individual_id},
        success: function(data){
          $('#view_detail').html(data);  
        },
    });
});

/*****************    Upload Profile Image *****************************************/
 $(document).on('change', '#image', function (e) {
            $('.loading').show();
            var files = $("#image").get(0).files;
            var data = new FormData();
            if (files.length > 0) {
                data.append("image", files[0]);
            }                                
            $.ajax({
                type: "POST",
                url: baseurl+'users/upload_profile_image/',
                // contentType: 'application/json',
                contentType: false,
                processData: false,
                
                data:data,
                success: function (result) {
                   
                    var obj = jQuery.parseJSON( result );
                    //alert( obj.path);
                  if(obj.status === 'OK'){
                      $("#profile_image").attr("src", baseurl+'uploads/profile/'+obj.path);
                       $('.loading').hide();
                      //$( "<div class='alert alert-success center' role='alert'><i class='fa fa-check'></i>"+obj.message+"<button aria-label='Close' data-dismiss='alert' class='close' type='button'><span aria-hidden='true'>×</span></button></div>" ).appendTo( $( "#alert" ) );
                      $('#alert').html("<div class='alert alert-success center' role='alert'><i class='fa fa-check'></i>"+obj.message+"<button aria-label='Close' data-dismiss='alert' class='close' type='button'><span aria-hidden='true'>×</span></button></div>");
                  }
                  if(obj.status === 'FAILED'){                      
                      $('#alert').html("<div class='alert alert-danger center' role='alert'><i class='fa fa-close'></i>"+obj.message+"<button aria-label='Close' data-dismiss='alert' class='close' type='button'><span aria-hidden='true'>×</span></button></div>");
                      $('.loading').hide();
                  }                                    
                },
                error: function () {
                }
            });
        }); 
        
/*****************    Call date picker *****************************************/
$(".datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            //yearRange: '1950:2017'
            yearRange: '-100:+01'
        });

/*****************    Call  time picker *****************************************/
         $('.timepicker1').timepicki();

/************ Dependent dropdown for state while selecting country *******************/ 
// Code By : Abdul
$('#country_id').on('change', function() {
  var country_id = this.value ;
  $('#city_id').empty();
  $('#city_id').append('<option>Select city</option>');
  $('#state_id').empty();
  $('#state_id').append('<option>Select state</option>');
  $.ajax({
        type: 'POST',
        url: baseurl+'state/states_dd/',
        data:{country_id:country_id},
        success: function(data){
        $('#state_id').empty();        
        $('#state_id').append(data);       
        },
    });
});

/***************** Dependent dropdown for City while selecting state *******************/
// Code By : Abdul
$('#state_id').on('change', function() {
  var state_id = this.value ;
  $.ajax({
        type: 'POST',
        url: baseurl+'city/city_dd/',
        data:{state_id:state_id},
        success: function(data){
        $('#city_id').empty();
        $('#city_id').append(data);       
        },
    });
});

/**************** code to delete multiple states is here.******************************/
// Code By : Abdul

var ids='';
var selected_ids = [];
 $(document).on('click', '.checkAllStates', function () {
   // alert('class check box state here.');
        $(".checkBoxState").prop('checked', 
            $(this).prop('checked'));
            var id=$(this).id;

            var values = (function() {
                
                $(".checkBoxState:checked").each(function() {

                    if(jQuery.inArray(this.id, selected_ids) != -1) {
                        
                    }else{
                        selected_ids.push(this.id);
                    }                    
                });
                return selected_ids;
            })()
            $('#delete_state').val(values);
        });

 $(document).on('change', '.checkAllStates', function() {
    if(! this.checked) {
        $('#delete_state').val('');
    }
});

$(document).on('change', '.checkBoxState', function() {
    if(this.checked) {
      // checkBoxState is checked

      var hidenvalue =  $('#delete_state').val();
      if(hidenvalue !='' ){
      var spl_hiden = hidenvalue.split(',');
            if(!jQuery.inArray(this.id, spl_hiden) != -1) {
                spl_hiden.push(this.id);
            }
      }else{
        var spl_hiden = this.id;
      }
                    $('#delete_state').val(spl_hiden);
    }else{
            var hidenvalue =  $('#delete_state').val();
            var spl_hiden = hidenvalue.split(',');  
            $('#delete_state').val('');
            
          var l = spl_hiden.splice($.inArray(this.id, spl_hiden),1);
            $('#delete_state').val(spl_hiden);
    }
});

// delete_all button clicked
 $(document).on('click', '#delete_all_states', function (e) {
     e.preventDefault();     
    var ids = $('#delete_state').val();
    var options = {};
    options.url = baseurl+"state/delete_states/";
    options.type = "POST";
    options.data = { ids: ids };
    //options.async = true;
    options.success = function (result) {
        location.reload();
    };
    options.error = function (result) {
         };
    if (ids == '') { //selected_ids.length === 0
        e.preventDefault();
    }else {
        if (confirm('Are you sure ? You want to delete all states?')) {
           $.ajax(options);
        }else{
            location.reload();
        } // cancel button pressed        
    } // Some id selected 
});

 /**************** code to delete multiple countries is here.******************************/
// Code By : Abdul
 $(document).on('click', '.checkAllCountries', function () {
    //alert('class check box checkAllCountries here.');
        $(".checkBoxCountry").prop('checked', 
            $(this).prop('checked'));
            var id=$(this).id;

            var values = (function() {
                
                $(".checkBoxCountry:checked").each(function() {

                    if(jQuery.inArray(this.id, selected_ids) != -1) {
                        
                    }else{
                        selected_ids.push(this.id);
                    }                    
                });
                return selected_ids;
            })()
            $('#delete_country').val(values);
        });

 $(document).on('change', '.checkAllCountries', function() {
    if(! this.checked) {
        $('#delete_country').val('');
    }
});

$(document).on('change', '.checkBoxCountry', function() {
    if(this.checked) {
      // checkBoxState is checked

      var hidenvalue =  $('#delete_country').val();
      if(hidenvalue !='' ){
      var spl_hiden = hidenvalue.split(',');
            if(!jQuery.inArray(this.id, spl_hiden) != -1) {
                spl_hiden.push(this.id);
            }
      }else{
        var spl_hiden = this.id;
      }
                    $('#delete_country').val(spl_hiden);
    }else{
            var hidenvalue =  $('#delete_country').val();
            var spl_hiden = hidenvalue.split(',');  
            $('#delete_country').val('');
            
          var l = spl_hiden.splice($.inArray(this.id, spl_hiden),1);
            $('#delete_country').val(spl_hiden);
    }
});


// delete_all button clicked
 $(document).on('click', '#delete_all_countries', function (e) {

     e.preventDefault();     
    var ids = $('#delete_country').val();
    var options = {};
    options.url = baseurl+"country/delete_countries/";
    options.type = "POST";
    options.data = { ids: ids };
    //options.async = true;
    options.success = function (result) {
        location.reload();
    };
    options.error = function (result) {
         };
    if (ids == '') { //selected_ids.length === 0
        e.preventDefault();
    }else {
        if (confirm('Are you sure ? You want to delete all countries?')) {
           $.ajax(options);
        }else{
            location.reload();
        } // cancel button pressed        
    } // Some id selected 
});

/**************** code to delete multiple city is here.******************************/
// Code By : Abdul
 $(document).on('click', '.checkAllCities', function () {
    //alert('class check box checkAllCountries here.');
        $(".checkBoxCity").prop('checked', 
            $(this).prop('checked'));
            var id=$(this).id;

            var values = (function() {
                
                $(".checkBoxCity:checked").each(function() {

                    if(jQuery.inArray(this.id, selected_ids) != -1) {
                        
                    }else{
                        selected_ids.push(this.id);
                    }                    
                });
                return selected_ids;
            })()
            $('#delete_city').val(values);
        });

 $(document).on('change', '.checkAllCities', function() {
    if(! this.checked) {
        $('#delete_city').val('');
    }
});

$(document).on('change', '.checkBoxCity', function() {
    if(this.checked) {        
      // checkBoxState is checked

      var hidenvalue =  $('#delete_city').val();
      if(hidenvalue !='' ){
      var spl_hiden = hidenvalue.split(',');
            if(!jQuery.inArray(this.id, spl_hiden) != -1) {
                spl_hiden.push(this.id);
            }
      }else{
        var spl_hiden = this.id;
      }
                    $('#delete_city').val(spl_hiden);
    }else{        
            var hidenvalue =  $('#delete_city').val();
            var spl_hiden = hidenvalue.split(',');  
            $('#delete_city').val('');
            
          var l = spl_hiden.splice($.inArray(this.id, spl_hiden),1);
            $('#delete_city').val(spl_hiden);
    }
});


// delete_all button clicked
 $(document).on('click', '#delete_all_cities', function (e) {
    //alert('delete clicked');

     e.preventDefault();     
    var ids = $('#delete_city').val();
    var options = {};
    options.url = baseurl+"city/delete_cities/";
    options.type = "POST";
    options.data = { ids: ids };
    //options.async = true;
    options.success = function (result) {
        location.reload();
    };
    options.error = function (result) {
         };
    if (ids == '') { //selected_ids.length === 0
        e.preventDefault();
        alert('select cities to delete.');
    }else {
        if (confirm('Are you sure ? You want to delete all cities?')) {
           $.ajax(options);
        }else{
            location.reload();
        } // cancel button pressed        
    } // Some id selected 
});

/****************************************************************************************/
// code to delete relatives is here.
// Code By : Abdul
 $(document).on('click', '.checkAllrelatives', function () {
   // alert('class check box Relatives here.');
        $(".checkBoxRelatives").prop('checked', 
            $(this).prop('checked'));
            var id=$(this).id;

            var values = (function() {
                
                $(".checkBoxRelatives:checked").each(function() {

                    if(jQuery.inArray(this.id, selected_ids) != -1) {
                        
                    }else{
                        selected_ids.push(this.id);
                    }                    
                });
                return selected_ids;
            })()
            $('#delete_relatives').val(values);
        });

 $(document).on('change', '.checkAllrelatives', function() {
    if(! this.checked) {
        $('#delete_relatives').val('');
    }
});

$(document).on('change', '.checkBoxRelatives', function() {
    if(this.checked) {
      // checkBoxState is checked

      var hidenvalue =  $('#delete_relatives').val();
      if(hidenvalue !='' ){
      var spl_hiden = hidenvalue.split(',');
            if(!jQuery.inArray(this.id, spl_hiden) != -1) {
                spl_hiden.push(this.id);
            }
      }else{
        var spl_hiden = this.id;
      }
            $('#delete_relatives').val(spl_hiden);
    }else{
            var hidenvalue =  $('#delete_relatives').val();
            var spl_hiden = hidenvalue.split(',');  
            $('#delete_relatives').val('');
            
          var l = spl_hiden.splice($.inArray(this.id, spl_hiden),1);
            $('#delete_relatives').val(spl_hiden);
    }
});


// delete_all button clicked
 $(document).on('click', '#delete_all_relatives', function (e) {
    $( ".message" ).html('');
     e.preventDefault();     
    var ids = $('#delete_relatives').val();
    var options = {};
    options.url = baseurl+"relatives/delete_relatives/";
    options.type = "POST";
    options.data = { ids: ids };
    //options.async = true;
    options.success = function (result) {
        //$( ".message" ).prepend( result );
       location.reload(); 


/*        if(result == 1){
            alert('deleted');
            $(".checkBoxRelatives:checked").each(function() {
                  $('input:checkBoxRelatives').removeAttr('checked');
                });
            $( ".message" ).prepend( '<div class="alert alert-success" role="alert">Deleted successfully.</div>' );
        }else{
            alert('Not deleted');
            //alert("Error to delete Relatives!");      
            $( ".message" ).prepend( '<div class="alert alert-danger center" role="alert"><i class="fa fa-exclamation-circle"></i>Unable to delete.<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button></div>' );
        }*/
    };
    options.error = function () { 
    //alert("Error to delete Relatives!");
  //  $( ".message" ).prepend( '<div class="alert alert-danger center" role="alert"><i class="fa fa-exclamation-circle"></i>Unable to delete.<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button></div>' );
     };
    if (ids == '') { //selected_ids.length === 0
        e.preventDefault();
        alert("Please select checkBox");
      //  $( ".message" ).prepend( '<div class="alert alert-danger center" role="alert"><i class="fa fa-exclamation-circle"></i>No relative is selected to delete.<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button></div>' );
    }else {
        //alert('call delete function here');
        //$.ajax(options);
        if (confirm('Are you sure ? You want to delete all relatives?')) {
           $.ajax(options);
        }else{
            //alert("cancel delete.");
             location.reload();
        }
    }
}); 

/**************** code to delete multiple medication is here.******************************/
// Code By : Abdul
var baseurl = $("#baseurl").val();
var ids='';
var selected_ids = [];
 $(document).on('click', '.checkAllMedications', function () {
   // alert('class check box state here.');
        $(".checkBoxMedication").prop('checked', 
            $(this).prop('checked'));
            var id=$(this).id;

            var values = (function() {
                
                $(".checkBoxMedication:checked").each(function() {

                    if(jQuery.inArray(this.id, selected_ids) != -1) {
                        
                    }else{
                        selected_ids.push(this.id);
                    }                    
                });
                return selected_ids;
            })()
            $('#delete_medication').val(values);
        });

 $(document).on('change', '.checkAllMedications', function() {
    if(! this.checked) {
        $('#delete_medication').val('');
    }
});

$(document).on('change', '.checkBoxMedication', function() {
    if(this.checked) {
      // checkBoxState is checked

      var hidenvalue =  $('#delete_medication').val();
      if(hidenvalue !='' ){
      var spl_hiden = hidenvalue.split(',');
            if(!jQuery.inArray(this.id, spl_hiden) != -1) {
                spl_hiden.push(this.id);
            }
      }else{
        var spl_hiden = this.id;
      }
                    $('#delete_medication').val(spl_hiden);
    }else{
            var hidenvalue =  $('#delete_medication').val();
            var spl_hiden = hidenvalue.split(',');  
            $('#delete_medication').val('');
            
          var l = spl_hiden.splice($.inArray(this.id, spl_hiden),1);
            $('#delete_medication').val(spl_hiden);
    }
});


// delete_all button clicked
 $(document).on('click', '#delete_all_medications', function (e) {
     
     e.preventDefault();     
    var ids = $('#delete_medication').val();
    var options = {};
    options.url = baseurl+"medication/deletemedications/";
    options.type = "POST";
    options.data = { ids: ids };
    //options.async = true;
    options.success = function (result) {
        location.reload();
    };
    options.error = function (result) {
         };
    if (ids == '') { //selected_ids.length === 0
        e.preventDefault();
    }else {
        if (confirm('Are you sure ? You want to delete all medications?')) {
           $.ajax(options);           
        }else{
            
            location.reload();
        } // cancel button pressed        
    } // Some id selected 
});
    
/**************** code to delete multiple measurements is here.******************************/
// Code By : Abdul
 $(document).on('click', '.checkAllMeasurements', function () {
   // alert('class check box checkAllCountries here.');
        $(".checkBoxMeasurement").prop('checked', 
            $(this).prop('checked'));
            var id=$(this).id;

            var values = (function() {
                
                $(".checkBoxMeasurement:checked").each(function() {

                    if(jQuery.inArray(this.id, selected_ids) != -1) {
                        
                    }else{
                        selected_ids.push(this.id);
                    }                    
                });
                return selected_ids;
            })()
            $('#delete_measurement').val(values);
        });

 $(document).on('change', '.checkAllMeasurements', function() {
    if(! this.checked) {
        $('#delete_measurement').val('');
    }
});

$(document).on('change', '.checkBoxMeasurement', function() {
    if(this.checked) {        
      // checkBoxState is checked

      var hidenvalue =  $('#delete_measurement').val();
      if(hidenvalue !='' ){
      var spl_hiden = hidenvalue.split(',');
            if(!jQuery.inArray(this.id, spl_hiden) != -1) {
                spl_hiden.push(this.id);
            }
      }else{
        var spl_hiden = this.id;
      }
                    $('#delete_measurement').val(spl_hiden);
    }else{        
            var hidenvalue =  $('#delete_measurement').val();
            var spl_hiden = hidenvalue.split(',');  
            $('#delete_measurement').val('');
            
          var l = spl_hiden.splice($.inArray(this.id, spl_hiden),1);
            $('#delete_measurement').val(spl_hiden);
    }
});

// delete_all button clicked
 $(document).on('click', '#delete_all_measurements', function (e) {
    //alert('delete clicked');

     e.preventDefault();     
    var ids = $('#delete_measurement').val();
    var options = {};
    options.url = baseurl+"measurements/deletemeasurements/";
    options.type = "POST";
    options.data = { ids: ids };
    //options.async = true;
    options.success = function (result) {
        location.reload();
    };
    options.error = function (result) {
         };
    if (ids == '') { //selected_ids.length === 0
        e.preventDefault();
        alert('select measurements to delete.');
    }else {
        if (confirm('Are you sure ? You want to delete all measurements?')) {
           $.ajax(options);
        }else{
            location.reload();
        } // cancel button pressed        
    } // Some id selected 
});


/*// refresh relations table

$(document).on('click', '#reload', function (e) {

    e.preventDefault();
    var options = {};     
    var relative_id = $('#relative_id').val();
    var first_name = $('#first_name').val();
    var gender = $('#gender option:selected').val();//$('#gender').val();
    var DOB = $('#DOB').val();
    var relation_id = $('#relation_id option:selected').val();//$('#relation_id').val();
    var params = {
        relative_id,first_name,gender,DOB,relation_id
    };//'relative_id='+relative_id+'&first_name='+first_name+'&gender='+gender+'&OB='+DOB+'&relation_id='+relation_id;
    options.url = baseurl+"relatives/ajax_relative_table_reload";
    options.type = "POST";
    options.data = { params: params };
    options.success = function (result) {
       var res = result.split('records are here');
       alert(res[1]);       
    };
    options.error = function () { 
        alert('error occure');
    }
    $.ajax(options);

});*/

