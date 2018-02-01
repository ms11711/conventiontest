

<?php require_once '../includes/init.php'; ?>
<?php include "../config/config.php" ?><?php include "../config/db_connect.php" ?>

<?php


$user = Auth::getInstance()->getCurrentUser();

//Require the user to be logged in before they can see this page.
Auth::getInstance()->requireLogin();

//Require the user to be administrator before they can see this page
Auth::getInstance()->requireAdmin();

$id = $_GET["id"];

$query = "SELECT * FROM user_sessions WHERE userid = ".$id."";
$sessions = User::getData($query);

$query = "SELECT * FROM user_details WHERE id = ".$id."";
$data = User::getData($query); 

$query = "SELECT * FROM user_misc WHERE id = ".$id."";
$complete = User::getData($query);


if($complete["got_info"] == 0){
    Util::redirect('/registration3.php');
}

$query = "SELECT * FROM user_flight WHERE id = ".$id."";
$flight = User::getData($query);

$query = "SELECT * FROM user_emergency WHERE id = ".$id."";
$emergency = User::getData($query);

$query = "SELECT * FROM user_insurance WHERE id = ".$id."";
$insurance = User::getData($query);

$query = "SELECT * FROM user_volunteer WHERE id = ".$id."";
$volunteer = User::getData($query); 

$query = "SELECT * FROM user_payment WHERE id = ".$id."";
$payment = User::getData($query);

$query = "SELECT * FROM user_details INNER JOIN user_misc ON user_details.id = user_misc.id WHERE (user_misc.completed_registration = '1') AND (user_details.agegroup = '".$data["agegroup"]."') AND (user_details.gender = '".$data["gender"]."')";
$agegroup_users = User::getAllData($query);

$query = "SELECT * FROM user_roomate WHERE selector = ".$id."";
$roomie = User::getData($query); 

$query = "SELECT * FROM roomlist WHERE id = ".$id."";
$roomlist = User::getData($query);

$query = "SELECT * FROM readyrooms WHERE roomnum = ".$roomlist["room"]."";
$roomready = User::getAllData($query);

 
//Process the submitted form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if($_POST["updateCat"] == "checkin"){
        if ($user->saveProfileCheckin($_POST)) { 
        	
    		
        }
        Util::redirect('/admin/checkin.php');
    }
}


?>
<!doctype html>
<html lang="en-US">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>User Information</title>
		<meta name="description" content="" />
		<meta name="Author" content="Dorin Grigoras [www.stepofweb.com]" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

		<!-- WEB FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- THEME CSS -->
		<link href="assets/css/essentials.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/layout.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme" />

		<!-- PAGE LEVEL STYLES -->
		<link href="assets/css/layout-datatables.css" rel="stylesheet" type="text/css" />

	</head>
	<!--
		.boxed = boxed version
	-->
	<body>


		<!-- WRAPPER -->
		<div id="wrapper">

			<!-- 
				ASIDE 
				Keep it outside of #wrapper (responsive purpose)
			-->
			<aside id="aside">
	 
				<?php include 'config/nav.php' ?>

				<span id="asidebg"><!-- aside fixed background --></span>
			</aside>
			<!-- /ASIDE -->


			<!-- HEADER -->
		<?php include 'config/header.php' ?>
			<!-- /HEADER -->


			<!-- 
				MIDDLE 
			-->
			<section id="middle">


				<!-- page title -->
				<header id="page-header">
					<h1>User Information</h1> 
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">



 



					<div id="panel-2" class="panel panel-default">
						<div class="panel-heading">
							<span class="title elipsis">
								<strong>Check-In</strong> <!-- panel title -->
							</span>

							<!-- right options -->
							<ul class="options pull-right list-inline">
								<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
								<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
								<li><a href="#" class="opt panel_close" data-confirm-title="Confirm" data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip" title="Close" data-placement="bottom"><i class="fa fa-times"></i></a></li>
							</ul>
							<!-- /right options -->

						</div>

						<!-- panel content -->
						<div class="panel-body">
 
 							<div class="row">
 								<div class="col-md-4">
 									<?php echo '<p><strong>'.$data["firstname"].' '.$data["lastname"].'</strong></p>'; ?>
 									<?php echo '<p>Room #'.$roomlist["room"].'</p>'; ?>
 									<?php if($roomready > 0){echo $roomready."<p>Room is Ready.</p>";}else{echo "<p>Room is not ready.</p>";} ?>
 								</div>
 							</div>

							<form method="POST" id="checkinattendee">
                                <input type="hidden" name="updateCat" value="checkin" />
                                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                <div class="row"> 
                                	<div class="col-md-12">




                                   		<?php
                                            if ($complete["checked_in"] == "1") {
                      							echo'<label class="checkbox"><input id="checked_in" name="checked_in" value="1" type="checkbox" checked><i></i>Check Out</label><br>';
                      						} elseif ($complete["checked_in"] == "0") { 
                       							echo'<label class="checkbox"><input id="checked_in" name="checked_in" value="1" type="checkbox"><i></i>Check In</label><br>';
											}  
										?>

										<?php
                                            if ($complete["bags_checked"] == "1") {
                      							echo'<label class="checkbox"><input id="bags_checked" name="bags_checked" value="1" type="checkbox" checked><i></i>Pick up room key</label><br>';
                      						} elseif ($complete["bags_checked"] == "0") { 
                       							echo'<label class="checkbox"><input id="bags_checked" name="bags_checked" value="1" type="checkbox"><i></i>Does not have room key</label><br>';
											}  
										?>


                                	<label>Enter text phone #: </label><input name="textnumber" />
                              	</div>
                              	</div>
                                    

                                <div class="row">       
                                    <div class="form-group col-xs-6">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </form>


                                    
							</div>
 
						</div>
						<!-- /panel content -->

						 
						<!--</div>-->
						<!-- /panel footer -->

					</div>
					<!-- /PANEL -->


				 
					 

 



					<div id="panel-3" class="panel panel-default">
						<div class="panel-heading">
							<span class="title elipsis">
								<strong>User Info</strong> <!-- panel title -->
							</span>

							<!-- right options -->
							<ul class="options pull-right list-inline">
								<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
								<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
								<li><a href="#" class="opt panel_close" data-confirm-title="Confirm" data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip" title="Close" data-placement="bottom"><i class="fa fa-times"></i></a></li>
							</ul>
							<!-- /right options -->

						</div>

						<!-- panel content -->
						<div class="panel-body">
 
 

								<div class="row">
                                    <div class="col-md-4 margin30">
                                        <h3 class="heading">Personal Information</h3>
                                        <?php
                                            echo '
                                                <p>
                                                <strong>'.$data["firstname"].' '.$data["lastname"].'</strong><br>
                                               
                                                '.$data["city"].', '.$data["state"].'<br>
                                                Primary Phone: '.$data["primaryphone"].'<br>
                                                Secondary Phone: '.$data["secondaryphone"].'<br>
                                                '.$data["emailaddress"].'
                                                </p>

                                                <p>
                                                <strong>Gender: </strong>'.$data["gender"].'<br>
                                                <strong>Date of Birth: </strong>'.$data["dob"].'<br>
                                                <strong>Age Group: </strong>'.$data["agegroup"].'<br>
                                                <strong>Diet: </strong>'.$data["vegan"].'<br>
                                                <strong>Allergies: </strong>'.$data["allergies"].'<br>
                                                <strong>Shirt Size: </strong>'.$data["shirtsize"].'<br>
                                                <strong>Souvenir Book Type: </strong>'.$data["souvenirbook"].'<br>
                                                <strong>Special Needs: </strong>'.$data["specialneeds"].'<br>
                                                </p>

                                                <p><strong>Account ID: </strong>'.$data["id"].'</p>
                                                ';
                                        ?>
                                    </div>

                                    <div class="col-md-4 margin30">
                                        <h3 class="heading">Emergency Contact Information</h3>
                                        <?php
                                            echo '
                                                <p>
                                                <strong>'.$emergency["firstname"].' '.$emergency["lastname"].'</strong><br>
                                                <strong>Relationship: </strong>'.$emergency["relation"].'<br>
                                                Primary Phone: '.$emergency["primaryph"].'<br>
                                                Secondary Phone: '.$emergency["secondaryph"].'<br>
                                                '.$emergency["emailaddress"].'
                                                </p>
                                                ';
                                        ?>

                                        <h3 class="heading">Insurance Information</h3>
                                        <?php
                                            echo '
                                                <p>
                                                <strong>Policy Holder Name: </strong>'.$insurance["firstname"].' '.$insurance["lastname"].'<br>
                                                <strong>Carrier: </strong>'.$insurance["carrier"].'<br>
                                                <strong>Policy Type: </strong>'.$insurance["policyno"].'<br>
                                                <strong>ID Number: </strong>'.$insurance["idnumber"].'<br>
                                                <strong>Group Number: </strong>'.$insurance["groupno"].'<br>
                                                <strong>Phone Number: </strong>'.$insurance["phonenumber"].'<br>
                                                </p>
                                                ';
                                        ?>
                                    </div>

                                    <div class="col-md-4 margin30">
                                        <h3 class="heading">Roommate Preference</h3>
                                        <?php
                                            if ($complete["roomate_done"] == "0") {
                                                echo '<p>You have not selected a roommate. You will be assigned a random roommate.</p>';
                                            } elseif ($complete["roomate_done"] == "1") {
                                                echo '<p><strong>Preferred Roommate: </strong>'.$roomate["firstname"].' '.$roomate["lastname"].'</p>';
                                            }
                                        ?>

                                        <h3 class="heading">Travel Information</h3>
                                        <?php
                                            if ($flight["unsure"] == "1") {
                                                echo '<p>You are unsure of your travel plans at this time.</p>';
                                            } elseif ($flight["notflying"] == "1") {
                                                echo '
                                                    <p><strong>You are not flying to Los Angeles.</strong><br>
                                                    <strong>Arrival Time: </strong>'.$flight["arrival"].'<br>
                                                    <strong>Departure Time: </strong>'.$flight["departure"].'<br>
                                                    </p>
                                                    ';
                                            } elseif ($flight["notflying"] == "0") {
                                                echo '
                                                    <p><strong>You are flying to Los Angeles.</strong><br>
                                                    <strong>Arrival Flight: </strong>'.$flight["arrival_airline"].' '.$flight["arrival_flightno"].'<br>
                                                    <strong>Arrival Time: </strong>'.$flight["arrival"].'<br>
                                                    <strong>Departure Flight: </strong>'.$flight["departure_airline"].' '.$flight["departure_flightno"].'<br>
                                                    <strong>Departure Time: </strong>'.$flight["departure"].'<br>
                                                    </p>
                                                    ';
                                            }
                                        ?>

                                        <h3 class="heading">Volunteer Information</h3>
                                        <?php
                                            if ($volunteer["preference"] == "NA") {
                                                echo '<strong>Volunteer Type: </strong>Not Volunteering';
                                            } else {
                                                echo '<strong>Volunteer Type: </strong>.$volunteer["preference"].';
                                            }
                                        ?>

                                    </div>

                                </div>

 
						</div>
						<!-- /panel content -->

						 
						</div>
						<!-- /panel footer -->

					</div>
					<!-- /PANEL -->





					</div>
					<!-- /PANEL -->
 


 
			</section>
			<!-- /MIDDLE -->

		</div>



	
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>

		<!-- PAGE LEVEL SCRIPTS -->
		<script type="text/javascript">
			loadScript(plugin_path + "datatables/js/jquery.dataTables.min.js", function(){
				loadScript(plugin_path + "datatables/js/dataTables.tableTools.min.js", function(){
					loadScript(plugin_path + "datatables/js/dataTables.colReorder.min.js", function(){
						loadScript(plugin_path + "datatables/js/dataTables.scroller.min.js", function(){
							loadScript(plugin_path + "datatables/dataTables.bootstrap.js", function(){
								loadScript(plugin_path + "select2/js/select2.full.min.js", function(){

									if (jQuery().dataTable) {

							 
									 

										// Datatable with TableTools
										function initTable3() {
											var table = jQuery('#sample_3');

											/* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

											/* Set tabletools buttons and button container */

											jQuery.extend(true, jQuery.fn.DataTable.TableTools.classes, {
												"container": "btn-group tabletools-btn-group pull-right",
												"buttons": {
													"normal": "btn btn-sm btn-default",
													"disabled": "btn btn-sm btn-default disabled"
												}
											});

											var oTable = table.dataTable({
												"order": [
													[0, 'asc']
												],
												"lengthMenu": [
													[5, 15, 20, -1],
													[5, 15, 20, "All"] // change per page values here
												],

												// set the initial value
												"pageLength": 10,
												"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

												"tableTools": {
													"sSwfPath":plugin_path +  "datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
													"aButtons": [{
														"sExtends": "pdf",
														"sButtonText": "PDF"
													}, {
														"sExtends": "csv",
														"sButtonText": "CSV"
													}, {
														"sExtends": "xls",
														"sButtonText": "Excel"
													}, {
														"sExtends": "print",
														"sButtonText": "Print",
														"sInfo": 'Please press "CTRL+P" to print or "ESC" to quit' 
													}, {
														"sExtends": "copy",
														"sButtonText": "Copy"
													}]
												}
											});

											var tableWrapper = jQuery('#sample_3_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
											tableWrapper.find('.dataTables_length select').select3(); // initialize select2 dropdown
										}

										 


										// Init each table 
										initTable3(); 
									}



								});
							});
						});
					});
				});
			});
		</script>

	</body>
</html>