<?php
//Script name: PE3.php
?>
<html>
<head>
    <title>Grade Computation</title>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
<?php
//declare variables
$SnameErr = $Smiderr = $Finerr = "";
$Sname = $SmidGrade = $SfinGrade = $SsemGrd = $Sremarks = $SfontColor = "";
$SnameFlag = $SmidFlag = $SfinFlag = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    //check if name textfield is empty
    if (empty($_POST['txtNme']))
    {
        $SnameErr = "Name is required.";
        $SnameFlag = 0;
    }
    else
    {
        $Sname = test_input($_POST['txtNme']);
        // check if name only contains letters and whitespaces
        if (!preg_match("/^[a-zA-Z ]*$/",$Sname))
        {
            $SnameErr = "Only letters and white space allowed";
            $SnameFlag = 0;
        }
        else
        {
            $SnameFlag = 1;
        }
    }

    //check if midgrade textfield is empty
    if (empty($_POST['txtMid']))
    {
        $Smiderr = "Midterm grade is required.";
        $SmidGradeFlag = 0;
    }
    else
    {
        $SmidGrade = test_input($_POST['txtMid']);
        // check if midterm grade only contains numbers
        if (!is_numeric($SmidGrade))
        {
            $Smiderr = "Only numbers are allowed.";
            $SmidGradeFlag = 0;
        }
        else
        {
            //check if midterm grade is between 50 - 100 only
            if (($SmidGrade < 50) || ($SmidGrade > 100))
            {
                $Smiderr = "Midterm Grade must be between 50 - 100 only.";
                $SmidGradeFlag = 0;
            }
            else
            {
                $SmidGradeFlag = 1;
            }
        }
    }

    //check if fin grade textfield is empty
    if (empty($_POST['txtFin']))
    {
        $Finerr = "Final grade is required.";
        $SfinGradeFlag = 0;
    }
    else
    {
        $SfinGrade = test_input($_POST['txtFin']);
        // check if final grade only contains numbers
        if (!is_numeric($SfinGrade))
        {
            $Finerr = "Only numbers are allowed.";
            $SfinGradeFlag = 0;
        }
        else
        {
            //check if final grade between 50 - 100 only
            if (($SfinGrade < 50) || ($SfinGrade > 100))
            {
                $Finerr = "Final Grade must be between 50 - 100 only.";
                $SfinGradeFlag = 0;
            }
            else
            {
                $SfinGradeFlag = 1;
            }
        }
    }

    //compute for the semGrade
    if (($SnameFlag != 0) && ($SmidGradeFlag != 0) && ($SfinGradeFlag != 0))
    {
        $SsemGrd = ($SmidGrade+$SfinGrade)/2;

        //determine remarks
        if ($SsemGrd>=74.5)
        {
            $Sremarks = "Passed";
            $SfontColor = "#000000";
        }
        else
        {
            $Sremarks = "Failed";
            $SfontColor = "#FF0000";
        }
    }
}

function test_input($Sdata)
{
    $Sdata = trim($Sdata);
    $Sdata = stripslashes($Sdata);
    $Sdata = htmlspecialchars($Sdata);
    return $Sdata;
}
?>

<h2>GRADE COMPUTATION</h2>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <p><span class="error">* required field</span></p>
    Student Name: <input type="textbox" name="txtNme" value="<?php echo $Sname; ?>">
    <span class="error">* <?php echo $SnameErr;?></span><br>
    Midterm Grade: <input type="textbox" name="txtMid" value="<?php echo $SmidGrade; ?>">
    <span class="error">* <?php echo $Smiderr;?></span><br>
    Final Grade: <input type="textbox" name="txtFin" value="<?php echo $SfinGrade; ?>">
    <span class="error">* <?php echo $Finerr;?></span><br>
    <input type="submit" value="Compute" name="btnCompute">
    <input type="reset" value="Clear">
</form>

<?php
if (isset($_POST['btnCompute']) && ($SnameFlag != 0) && ($SmidGradeFlag != 0) && ($SfinGradeFlag != 0))
{
    echo "<h2>GRADE INFORMATION</h2><br>";
    echo "Student Name: ".$Sname."<br>";
    echo "Midterm Grade: ".$SmidGrade."<br>";
    echo "Final Grade: ".$SfinGrade."<br>";
    echo "Semestral Grade: ".$SsemGrd."<br>";
    echo "Remarks: <font color='$SfontColor'>".$Sremarks."</font><br>";
}
?>
</body>
</html>