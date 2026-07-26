<?php
//Script name: GradeOutputTable.php
$SName = $_POST['txtNme'];
$SSub = $_POST['lstSub'];
$SPre = $_POST['txtPre'];
$SMid = $_POST['txtMid'];
$SFin = $_POST['txtFin'];

if(isset($_POST['btnCompute']))
{
    if(empty($_POST['txtPre']) or empty($_POST['txtMid']) or empty($_POST['txtFin']))
    {
        echo "<center><h2>Please enter grades...</h2></center>";
        exit();
    }
    
    if(is_numeric($_POST['txtPre']) and is_numeric($_POST['txtMid']) and is_numeric($_POST['txtFin']))
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
                <td colspan=7><b>Name:</b><?php echo $SName;?></td>
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
<?>
    }
    else
    {
        echo "<center><h2>Enter numeric values only...</h2></center>";
    }
}
?>