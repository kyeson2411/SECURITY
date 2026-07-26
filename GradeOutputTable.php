<?>
<?php
//Script name: GradeOutputTable.php

// Check if the form was submitted via POST
if(isset($_POST['btnCompute']))
{
    $SName = isset($_POST['txtNme']) ? $_POST['txtNme'] : '';
    $SSub = isset($_POST['lstSub']) ? $_POST['lstSub'] : '';
    $SPre = isset($_POST['txtPre']) ? $_POST['txtPre'] : '';
    $SMid = isset($_POST['txtMid']) ? $_POST['txtMid'] : '';
    $SFin = isset($_POST['txtFin']) ? $_POST['txtFin'] : '';

    if(empty($SPre) or empty($SMid) or empty($SFin))
    {
        echo "<center><h2>Please enter grades...</h2></center>";
        echo "<br><center><a href='GradeInputTable.php'>Back</a></center>";
        exit();
    }
    
    if(is_numeric($SPre) and is_numeric($SMid) and is_numeric($SFin))
    {
        $SSem = $SPre * 0.25 + $SMid * 0.25 + $SFin * 0.5;

        if ($SSem == 100)
            $SPt = 1.0;
        elseif ($SSem >= 95)
            $SPt = 1.5;
        elseif ($SSem >= 90)
            $SPt = 2.0;
        elseif ($SSem >= 85)
            $SPt = 2.5;
        elseif ($SSem >= 80)
            $SPt = 3.0;
        elseif ($SSem >= 75)
            $SPt = 3.5;
        elseif ($SSem >= 70)
            $SPt = 4.0;
        else
            $SPt = 5.0;

        $SPt = number_format($SPt,2);

        if ($SSem >= 74.5)
            $SRem = "Passed";
        else
            $SRem = "Failed";
?>
        <center><h2>GRADE INFORMATION</h2></center>
        <hr color=green size=2>
        <table border=1>
            <tr>
                <td colspan=7><b>Name:</b> <?php echo $SName;?></td>
            </tr>
            <tr>
                <th width=100>Subject</th>
                <th width=50>Prelim 25%</th>
                <th width=50>Midterm 25%</th>
                <th width=50>Final 50%</th>
                <th width=50>Semestral Grade</th>
                <th width=50>Point Equivalent</th>
                <th>Remarks</th>
            </tr>
            <tr>
                <td><?php echo $SSub ?></td>
                <td><?php echo $SPre ?></td>
                <td><?php echo $SMid ?></td>
                <td><?php echo $SFin ?></td>
                <td><?php echo $SSem ?></td>
                <td><?php echo $SPt ?></td>
                <td><?php echo $SRem ?></td>
            </tr>
        </table>
        <br>
        <center>
            <a href="GradeInputTable.php">Back</a>
        </center>
<?php
    }
    else
    {
        echo "<center><h2>Enter numeric values only...</h2></center>";
        echo "<br><center><a href='GradeInputTable.php'>Back</a></center>";
    }
}
else
{
    // Redirect or show a message if someone tries to access this page directly
    echo "<center><h2>Access Denied. Please submit the form first.</h2></center>";
    echo "<br><center><a href='GradeInputTable.php'>Back to Form</a></center>";
}
?>
