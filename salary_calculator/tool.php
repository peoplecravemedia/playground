<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tool</title>
    <style>
		body {
			font-family: "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, "sans-serif";
			font-size:14px;
			font-style:normal;
		}	
	</style>
  </head>

  <?php
	$strMethod = "";
	$strMethod = $_POST["Method"];
	
  //Display for year.
  //$iYearDisplay = 2017;
	$iYearDisplay = $_POST["myStartingYear"];

  //Starting salary for calculations.
	$iTotal = $_POST["myBaseSalary1"];
  $iYearlyBaseSalary = $_POST["myBaseSalary1"];
	$iTotalLifetime = 0;
	
	$iTotal2 = $_POST["myBaseSalary2"];
  $iYearlyBaseSalary2 = $_POST["myBaseSalary2"];
	$iTotalLifetime2 = 0;

  //Number of years to run calculations.
  $iTotalYearCounter = $_POST["myTotalYears"];

  //Percent of yearly increase.
	$iPercentageCostOfLiving = $_POST["myIncrease1"];
	$iPercentageCostOfLivingAdjusted = $iPercentageCostOfLiving/100;
	
	$iPercentageCostOfLiving2 = $_POST["myIncrease2"];
	$iPercentageCostOfLivingAdjusted2 = $iPercentageCostOfLiving2/100;
  ?>

  <body>
	<h1>Calculator Tool Modified</h1>
	<table width="900" border="0" cellspacing="4" cellpadding="4">
	<tbody>
		<form method="post" action="tool.php">
		<tr>
			<td>BEGINNING YEAR</td>
			<td><input type="text" name="myStartingYear" value="<?php echo $iYearDisplay;?>" placeholder="2017"/></td>
			<td>TOTAL NUMBER OF YEARS</td>
			<td><input type="text" name="myTotalYears" value="<?php echo $iTotalYearCounter;?>" placeholder="20"/></td>
		</tr>
		<tr>
			<td>BASE SALARY #1</td>
			<td><input type="text" name="myBaseSalary1" value="<?php echo $iYearlyBaseSalary;?>" placeholder="50000"/></td>
			<td>BASE SALARY #2</td>
			<td><input type="text" name="myBaseSalary2" value="<?php echo $iYearlyBaseSalary2;?>" placeholder="100000"/></td>
		</tr>
		<tr>
			<td>% INCREASE #1</td>
			<td><input type="text" name="myIncrease1" value="<?php echo $iPercentageCostOfLiving;?>" placeholder="2"/></td>
			<td>% INCREASE #2</td>
			<td><input type="text" name="myIncrease2" value="<?php echo $iPercentageCostOfLiving2;?>" placeholder="3"/></td>
		</tr>
		<tr>
			<td colspan="4">
				<input type="hidden" name="Method" value="Calc"/>
				<button type="submit" value="Submit">Submit</button>
				<a href="tool.php">reset</a>
			</td>
		</tr>
		</form>
	</tbody>
	</table>		
	<br>
		
	<?php
	  if ($strMethod == "Calc") {
	?>
	<table width="900" border="0" cellspacing="4" cellpadding="4">
	<tbody>	
		<tr>
			<td>&nbsp;</td>
			<td colspan="2" width="300"><b>Starting salary of $<?php echo $iYearlyBaseSalary;?><br>with increase of <?php echo $iPercentageCostOfLiving;?>%</b></td>
			<td colspan="2" width="300"><b>Starting salary of $<?php echo $iYearlyBaseSalary2;?><br>with increase of <?php echo $iPercentageCostOfLiving2;?>%</b></td>
		</tr>
		<?php
    for ($i=1; $i < ($iTotalYearCounter + 1); $i++) {

      //Calculate salary times percentage.
		$iTotalYearlyRaise = $iTotal * $iPercentageCostOfLivingAdjusted;
		$iTotalAdjustedSalary = $iTotal + $iTotalYearlyRaise;
      $iTotal = number_format($iTotalAdjustedSalary, 2, '.', '');
		
		$iTotalYearlyRaise2 = $iTotal2 * $iPercentageCostOfLivingAdjusted2;
		$iTotalAdjustedSalary2 = $iTotal2 + $iTotalYearlyRaise2;
      $iTotal2 = number_format($iTotalAdjustedSalary2, 2, '.', '');
		
		echo "<tr>";
			echo "<td width='100'>Year $i</td>";
			echo "<td>";
			echo $iYearDisplay + $i;
			echo "</td>";
			echo "<td>$";
			echo $iTotal;
			echo "</td>";
			echo "<td>";
			echo $iYearDisplay + $i;
			echo "</td>";
			echo "<td>$";
			echo $iTotal2;
			echo "</td>";
		echo "</tr>";
		
		$iTotalLifetime = $iTotal + $iTotalLifetime;
		$iTotalLifetime2 = $iTotal2 + $iTotalLifetime2;
    }
     ?>
		<tr>
			<td><b>TOTAL</b></td>
			<td>&nbsp;</td>
			<td><b>$<?php echo $iTotalLifetime;?></b></td>
			<td>&nbsp;</td>
			<td><b>$<?php echo $iTotalLifetime2;?></b></td>
		</tr>
		<tr>
			<td><b>DIFFERENCE</b></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><b>$<?php echo ($iTotalLifetime2 - $iTotalLifetime);?></b></td>
		</tr>
	</tbody>
</table>
  <?php
	  }
	  ?>

  </body>
</html>
