<?php
include("connection/connect.php");
session_start(); //session started by unique user_id

error_reporting(0);

//check user
$sql = "SELECT * FROM signup where user_id='" . $_SESSION["user_id"] . "'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
$name = $row['firstname'];

if ($_SESSION["user_id"] == 0) {
    $none = 'none';
}

$id = $_GET['update_id'];

$sql2 = "SELECT * FROM recipes WHERE rid = $id";

$result2 = mysqli_query($db, $sql2);
while ($row2 = mysqli_fetch_array($result2)) {
    $brespname = $row2['resname'];
    $bdisc = $row2['rtext'];
    $blevel = $row2['reslevel'];
    $btime = $row2['cooktime'];
}

if (isset($_POST['submit']))          //if upload btn is pressed
{
    $disc = $_POST['disc'];
    $resname = $_POST['recipyname'];
    $reslevel = $_POST['levelOptions'];
    $rescooktime = $_POST['timeOptions'];
    $rescreator = $name;

    if ($fname = $_FILES['file']['name'] != '') {
        if ($respname = '' || $disc == '' || $reslevel == '' || $rescooktime == '') {
            $sec =     '<div class="alert alert-error alert-block">
                            <a class="close" data-dismiss="alert" href="#">&times;</a>
                            <h4 class="alert-heading">Error!</h4>
                            All fields must be required                                        
                        </div>';
        } else {

            $fname = $_FILES['file']['name'];
            $temp = $_FILES['file']['tmp_name'];
            $fsize = $_FILES['file']['size'];
            $extension = explode('.', $fname);
            $extension = strtolower(end($extension));
            $fnew = uniqid() . '.' . $extension;

            $store = "./admin/img/" . basename($fnew);                      // the path to store the upload image

            if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif') {
                if ($fsize >= 1000000) {


                    $first =    '<div class="alert alert-error alert-block">
                                    <a class="close" data-dismiss="alert" href="#">&times;</a>
                                    <h4 class="alert-heading">Error!</h4>
                                    Maximum upload size is 1Mb 
                                </div>';
                } else {
                    $respname = $_POST['recipyname'];


                    move_uploaded_file($temp, $store);

                    $sql = "UPDATE recipes SET rimage = '$fnew', resname = '$respname', reslevel = '$reslevel', cooktime = '$rescooktime', rtext = '$disc' WHERE rid=$id";  // store the submited data ino the database :images
                    mysqli_query($db, $sql);


                    $q =    '<div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <h4>Success</h4>
                                The Record Updated successfully
                            </div>';

                    header("refresh:3; url=update_detail.php?updateid='$id'");
                }
            }
        }
    } else {
        if ($respname = '' || $disc == '' || $reslevel == '' || $rescooktime == '') {
            $sec =     '<div class="alert alert-error alert-block">
                            <a class="close" data-dismiss="alert" href="#">&times;</a>
                            <h4 class="alert-heading">Error!</h4>
                            All fields must be required
                        </div>';
        } else {

            $respname = $_POST['recipyname'];

            $sql = "UPDATE recipes SET resname = '$respname', reslevel = '$reslevel', cooktime = '$rescooktime', rtext = '$disc' WHERE rid=$id";  // store the submited data ino the database :images
            mysqli_query($db, $sql);


            $q =    '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4>Success</h4>
                        The Record Updated successfully            
                    </div>';

            header("refresh:3; url=update_detail.php?updateid='$id'");
        }
    }
}
?>


<!----------------------------------------------------- html section ---------------------------------------------------------------------->
<!DOCTYPE html>
<html class="no-js">

<head>
    <title>Manage repices</title>
    <!-- Bootstrap -->
    <link href="./admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="./admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="./admin/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
    <link href="./admin/assets/styles.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <script src="./admin/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <link href="./admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="./admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="./admin/assets/styles.css" rel="stylesheet" media="screen">
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <script src="./admin/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="#">Manage repices</a>
                <div class="nav-collapse collapse">
                    <ul class="nav pull-right">
                        <li class="dropdown">
                            <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><?php echo $name ?><i class="caret"></i>

                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a tabindex="-1" href="#">Profile</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a tabindex="-1" href="index.php">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li class="active">
                            <a href="index.php">Home</a>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3" id="sidebar">
                <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                    <li class="active">
                        <a href="manage_recipes.php"><i class="icon-chevron-right"></i>Recipes</a>
                    </li>
                    <li>
                        <a href="manage_detail.php"><i class="icon-chevron-right"></i>Detail Recipes</a>
                    </li>
                </ul>
            </div>

            <!--/span-->
            <div class="span9" id="content">
                <div class="row-fluid">

                    <?php
                    echo  $first;
                    echo  $sec;
                    echo  $th;
                    echo   $q;
                    ?>

                    <div class="navbar">
                        <div class="navbar-inner">
                            <ul class="breadcrumb">
                                <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
                                <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
                                <li>
                                    <a href="manage_recipes.php">Recipes</a> <span class="divider">/</span>
                                </li>
                                <li class="active">
                                    <a href="#">Edit recipe</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Edit Record</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">

                                    <form class="form-horizontal" action='' method='post' enctype="multipart/form-data">
                                        <fieldset>
                                            <legend>Edit Recipe </legend>

                                            <div class="control-group">
                                                <label class="control-label" for="fileInput">File input</label>
                                                <div class="controls">
                                                    <input class="input-file uniform_on" id="fileInput" type="file" name="file">
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Recipe Name </label>
                                                <div class="controls">

                                                    <input type="text" name="recipyname" class="span6" id="typeahead" value="<?php echo $brespname; ?>" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>

                                                </div>
                                            </div>


                                            <div class="control-group">
                                                <label class="control-label" for="textarea2">About Recipe</label>
                                                <div class="controls">
                                                    <textarea class="input-xlarge textarea" name='disc' placeholder="Enter text ..." style="width: 810px; height: 200px"><?php echo htmlspecialchars(stripslashes($bdisc)); ?></textarea>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="level">Level</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="levelOptions" id="inlineRadio1" value="Easy" <?php echo ($blevel == "Easy") ? "checked" : "" ?>>
                                                    <label class="form-check-label" for="inlineRadio1">Easy</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="levelOptions" id="inlineRadio2" value="Medium" <?php echo ($blevel == "Medium") ? "checked" : "" ?>>
                                                    <label class="form-check-label" for="inlineRadio2">Medium</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="levelOptions" id="inlineRadio3" value="Hard" <?php echo ($blevel == "Hard") ? "checked" : "" ?>>
                                                    <label class="form-check-label" for="inlineRadio3">Hard</label>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="level">Cooking time</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="timeOptions" id="inlineRadio1" value="5-10 mins" <?php echo ($btime == "5-10 mins") ? "checked" : "" ?>>
                                                    <label class="form-check-label" for="inlineRadio1">5-10 mins</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="timeOptions" id="inlineRadio2" value="11-30 mins" <?php echo ($btime == "11-30 mins") ? "checked" : "" ?>>
                                                    <label class="form-check-label" for="inlineRadio2">11-30 mins</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="timeOptions" id="inlineRadio3" value="31-60 mins" <?php echo ($btime == "31-60 mins") ? "checked" : "" ?>>
                                                    <label class="form-check-label" for="inlineRadio3">31-60 mins</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="timeOptions" id="inlineRadio4" value="60+ mins" <?php echo ($btime == "60+ mins") ? "checked" : "" ?>>
                                                    <label class="form-check-label" for="inlineRadio3">60+ mins</label>
                                                </div>
                                            </div>


                                            <div class="form-actions">
                                                <input type='submit' name='submit' value='Update recipe' class="btn btn-primary" />
                                                <button type="reset" class="btn">Clear form</button>
                                            </div>

                                        </fieldset>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>

                <hr>
                <footer>
                    <p>&copy; Navbro 2013</p>
                </footer>
            </div>

            <!--/.fluid-container-->
            <link href="./admin/vendors/datepicker.css" rel="stylesheet" media="screen">
            <link href="./admin/vendors/uniform.default.css" rel="stylesheet" media="screen">
            <link href="./admin/vendors/chosen.min.css" rel="stylesheet" media="screen">

            <link href="./admin/vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

            <script src="./admin/vendors/jquery-1.9.1.js"></script>
            <script src="./admin/bootstrap/js/bootstrap.min.js"></script>
            <script src="./admin/vendors/jquery.uniform.min.js"></script>
            <script src="./admin/vendors/chosen.jquery.min.js"></script>
            <script src="./admin/vendors/bootstrap-datepicker.js"></script>

            <script src="./admin/vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
            <script src="./admin/vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

            <script src="./admin/vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

            <script type="text/javascript" src="./admin/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
            <script src="./admin/assets/form-validation.js"></script>

            <script src="./admin/assets/scripts.js"></script>
            <script>
                jQuery(document).ready(function() {
                    FormValidation.init();
                });


                $(function() {
                    $(".datepicker").datepicker();
                    $(".uniform_on").uniform();
                    $(".chzn-select").chosen();
                    $('.textarea').wysihtml5();

                    $('#rootwizard').bootstrapWizard({
                        onTabShow: function(tab, navigation, index) {
                            var $total = navigation.find('li').length;
                            var $current = index + 1;
                            var $percent = ($current / $total) * 100;
                            $('#rootwizard').find('.bar').css({
                                width: $percent + '%'
                            });
                            // If it's the last tab then hide the last button and show the finish instead
                            if ($current >= $total) {
                                $('#rootwizard').find('.pager .next').hide();
                                $('#rootwizard').find('.pager .finish').show();
                                $('#rootwizard').find('.pager .finish').removeClass('disabled');
                            } else {
                                $('#rootwizard').find('.pager .next').show();
                                $('#rootwizard').find('.pager .finish').hide();
                            }
                        }
                    });
                    $('#rootwizard .finish').click(function() {
                        alert('Finished!, Starting over!');
                        $('#rootwizard').find("a[href*='tab1']").trigger('click');
                    });
                });
            </script>
</body>

</html>