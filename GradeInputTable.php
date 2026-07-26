<?php
//Script name: GradeInputTable.php
?>
<h2>GRADE COMPUTATION</h2>
<hr color=green size=2>
<form action="GradeOutputTable.php" method="POST">
<table border=1>
    <tr>
        <td>Student Name:</td>
        <td><input type=textbox name=txtNme size=30></td>
    </tr>
    <tr>
        <td>Subject:</td>
        <td>
            <select name=lstSub>
                <option></option>
                <option>Computer</option>
                <option>Mathematics</option>
                <option>English</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Prelim Grade:</td>
        <td><input type=textbox name=txtPre size=6></td>
    </tr>
    <tr>
        <td>Midterm Grade:</td>
        <td><input type=textbox name=txtMid size=6></td>
    </tr>
    <tr>
        <td>Final Grade:</td>
        <td><input type=textbox name=txtFin size=6></td>
    </tr>
    <tr>
        <td colspan=2>
            <center>
                <input type=submit value="Compute" name=btnCompute>
                <input type=reset value="Clear">
            </center>
        </td>
    </tr>
</table>
</form>
