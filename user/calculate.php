<?php
session_start();
if ($_SESSION["userrole"] == "user" AND $_SESSION["Flag"] =='Running'){

?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Home</title>
    <script src="../jquery.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdeliver.net/npm/popper.js@1.16.1/dist/umb/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">

    <script src="https://kit.fontawesome.com/1e2c5a8858.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/job.css">
    <style>
      .col-6{
        margin-top:0px;
      }
    </style>
</head>
<body style="width: 100vw">
  <div class="container">
    <div class="row">

        <!-- <div class="container"> -->
            <div class="container bg-light ">
                <div class="header">
                  <div class="row">
                  <div class="col-2 ml-3 mt-1">
                      <img src="../image/laa.png" alt="">
                      
                      </div>
                      <div class="col-9 ">
                      <p>National Tax Calculation, Bangladesh</p>
                      <h5>জাতীয় রাজস্ব বোর্ড, বাংলাদেশ</h5>
                    </div>
                  </div>
                  
                  
                 <?php
include_once('../db/dbconnect.php');
                  $sql = "SELECT * FROM earning WHERE NIDNO = '".$_SESSION['NIDNO']."' ORDER BY `Year` DESC  LIMIT 1";
                  
                  $auth = getDataFromDB($sql);
                  foreach($auth as $row){

                  
                 ?>
                  

                  <?php 
                   
                   function houserent($basic, $houserent){
                    $discount1 = $basic * 12 * 50 / 100;
                    $discount2 = 25000 * 12;
                    if($discount1> $discount2){
                      $discount = $discount2;
                    }
                    else{

                      $discount = $discount1;
                    }
                      // return $discount2;
                    $payable =  $houserent*12 - $discount;

                    if($payable > 0){
                      return $payable;
                    }
                    else{
                      return 0;
                    }
                  
                   }

                   
                   
                   function medical($basic, $medical){
                    $discount1 = $basic * 12 * 10 / 100;
                    $discount2 = 10000 * 12;
                    if($discount1> $discount2){
                      $discount = $discount2;
                    }
                    else{

                      $discount = $discount1;
                    }
                      // return $discount2;
                    $payable =  $medical*12 - $discount;

                    if($payable > 0){
                      return $payable;
                    }
                    else{
                      return 0;
                    }
                  
                   }

                   function transport($basic){
                   
                      // return $discount2;
                    $payable =  $basic*12 - 30000;

                    if($payable > 0){
                      return $payable;
                    }
                    else{
                      return 0;
                    }
                  
                   }
                  ?>



                    </div>
                    <div class="head">
                      <div class="row">
                        
                      </div>
                    </div>
                
                    <div class="card-deck mt-5">
                      <div class="card">
                        <div class="card-header text-center">
                          Job
                        </div>
                          <table class="table table-sm table-striped">
                            <tr>
                              <th>Term</th>
                              <th>Amount</th>
                              <th>Taxable</th>
                            </tr>
                            <tr>
                              <td class="text-center p-2" style="font-size: 10px"> Yearly Salary </td>
                              <td class="text-center p-2" style="font-size: 10px"> <?php echo $row['BasicSalary']*12 ?></td>
                              <td class="text-center p-2" style="font-size: 10px"><?php echo $row['BasicSalary']*12 ?></td>
                            </tr>
                            <tr>
                              <td class="text-center p-2" style="font-size: 10px">  Special Salary </td>
                              <td class="text-center p-2" style="font-size: 10px"> <?php echo $row['SpecialSalary'] ?></td>
                              <td class="text-center p-2" style="font-size: 10px"><?php echo $row['SpecialSalary'] ?></td>
                            </tr>
                            <tr>
                              <td class="text-center p-2" style="font-size: 10px">  House Rent</td>
                              <td class="text-center p-2" style="font-size: 10px"> <?php echo $row['HouseRent']*12 ?></td>
                              <td class="text-center p-2" style="font-size: 10px"><?php echo houserent($row['BasicSalary'], $row['HouseRent']) ?></td>
                            </tr>
                            
                            <tr>
                              <td class="text-center p-2" style="font-size: 10px">  Medical</td>
                              <td class="text-center p-2" style="font-size: 10px"> <?php echo $row['MedicalAllowance']*12 ?></td>
                              <td class="text-center p-2" style="font-size: 10px"><?php echo medical($row['BasicSalary'], $row['MedicalAllowance']) ?></td>
                            </tr>
                            
                            <tr>
                              <td class="text-center p-2" style="font-size: 10px">  Critical</td>
                              <td class="text-center p-2" style="font-size: 10px"> <?php echo $row['CriticalCare'] ?></td>
                              <td class="text-center p-2" style="font-size: 10px">0</td>
                            </tr>

                             
                            <tr>
                              <td class="text-center p-2" style="font-size: 10px">  Transport</td>
                              <td class="text-center p-2" style="font-size: 10px"> <?php echo $row['TransportAllowance']*12 ?></td>
                              <td class="text-center p-2" style="font-size: 10px"><?php echo transport( $row['TransportAllowance']) ?></td>
                            </tr>
                             
                             <tr>
                               <td class="text-center p-2" style="font-size: 10px">  Festival</td>
                               <td class="text-center p-2" style="font-size: 10px"> <?php echo $row['FestivalAllowance']; ?></td>
                               <td class="text-center p-2" style="font-size: 10px"><?php echo $row['FestivalAllowance']; ?></td>
                             </tr>

                               
                             <tr>
                               <td class="text-center p-2" style="font-size: 10px">  Assistant</td>
                               <td class="text-center p-2" style="font-size: 10px"> <?php echo $row['PAssistantAllowance']; ?></td>
                               <td class="text-center p-2" style="font-size: 10px"><?php echo $row['PAssistantAllowance']; ?></td>
                             </tr>
                             
                               
                             <tr>
                               <td class="text-center p-2" style="font-size: 10px">  Vacation</td>
                               <td class="text-center p-2" style="font-size: 10px"> <?php echo $row['VacationAllowance']; ?></td>
                               <td class="text-center p-2" style="font-size: 10px"><?php echo $row['VacationAllowance']; ?></td>
                             </tr>
                             
                               
                             <tr>
                               <td class="text-center p-2" style="font-size: 10px">  Overtime</td>
                               <td class="text-center p-2" style="font-size: 10px"> <?php echo $row['OvertimeAllowance']; ?></td>
                               <td class="text-center p-2" style="font-size: 10px"><?php echo $row['OvertimeAllowance']; ?></td>
                             </tr>
                               
                               <tr>
                                 <td class="text-center p-2" style="font-size: 10px">  Prize</td>
                                 <td class="text-center p-2" style="font-size: 10px"> <?php echo $row['PrizeAllowance']; ?></td>
                                 <td class="text-center p-2" style="font-size: 10px"><?php echo $row['PrizeAllowance']; ?></td>
                               </tr>
                               
                               <tr>
                                 <td class="text-center p-2" style="font-size: 10px">  Policy</td>
                                 <td class="text-center p-2" style="font-size: 10px"> <?php echo $row['PolicyAllowance']*12; ?></td>
                                 <td class="text-center p-2" style="font-size: 10px"><?php echo $row['PolicyAllowance']*12; ?></td>
                               </tr>

                               
                               <tr>
                                 <td class="text-center p-2" style="font-size: 10px">  Bonus</td>
                                 <td class="text-center p-2" style="font-size: 10px"> <?php echo $row['BonusAllowance']; ?></td>
                                 <td class="text-center p-2" style="font-size: 10px"><?php echo $row['BonusAllowance']; ?></td>
                               </tr>
                               <tr>
                                 <td class="text-center p-2" style="font-size: 10px">  Others</td>
                                 <td class="text-center p-2" style="font-size: 10px"> <?php echo $row['Others']; ?></td>
                                 <td class="text-center p-2" style="font-size: 10px"><?php echo $row['Others']; ?></td>
                               </tr>

                                <tr>
                                 <td class="text-center p-2" style="font-size: 10px">  Extra</td>
                                 <td class="text-center p-2" style="font-size: 10px"> <?php echo $row['Allowance']; ?></td>
                                 <td class="text-center p-2" style="font-size: 10px"><?php echo $row['Allowance']; ?></td>
                               </tr>

                               <?php
                               
                               $taxable = $row['BasicSalary']*12+ $row['SpecialSalary']+houserent($row['BasicSalary'], $row['HouseRent'])+medical($row['BasicSalary'], $row['MedicalAllowance'])+transport( $row['TransportAllowance'])+$row['FestivalAllowance']+$row['PAssistantAllowance']+$row['VacationAllowance']+$row['OvertimeAllowance']+$row['PrizeAllowance']+$row['PolicyAllowance']*12+$row['BonusAllowance']+$row['Others']+$row['Allowance'];

                               $total = $row['BasicSalary']*12+ $row['SpecialSalary']+$row['HouseRent']*12+$row['MedicalAllowance']*12+$row['CriticalCare']+$row['TransportAllowance']*12+$row['FestivalAllowance']+$row['PAssistantAllowance']+$row['VacationAllowance']+$row['OvertimeAllowance']+$row['PrizeAllowance']+$row['PolicyAllowance']*12+$row['BonusAllowance']+$row['Others']+$row['Allowance'];
                               ?>
                               <tr>
                                 <td class="text-center p-2" style="font-size: 10px"> <b> Total</b></td>


                                 <td class="text-center p-2" style="font-size: 10px"><b> <?php echo $total; ?></b></td>


                                 <td class="text-center p-2" style="font-size: 10px"><b><?php echo $taxable; ?></b></td>
                               </tr>
                          </table>
                        
                      </div>
                      <div class="card">
                        <div class="card-header text-center">
                          Business
                        </div>
                        
                        <table class="table table-sm table-striped">
                            <tr>
                              <td><b>Sale Value</b></td>
                              <td><?php echo $row["SaleValue"]; ?></td>
                            </tr>
                            <tr>
                              <td><b>Purchase Value</b></td>
                              <td><?php echo $row["PurchaseValue"]; ?></td>
                            </tr>
                            <tr>
                              <td><b>Profit </b></td>
                              <td><?php echo $row["SaleValue"]-$row["PurchaseValue"]; ?></td>
                            </tr>
                            <tr>
                              <td><b>Costing </b></td>
                              <td><?php echo $row["Misc"]+$row["Bill"]; ?></td>
                            </tr>
                            <tr>
                              <td><b>Taxable </b></td>
                              <td><?php echo $row["SaleValue"]-$row["PurchaseValue"]-$row["Misc"]-$row["Bill"]; ?></td>
                            </tr>
                            <tr>
                            </tr>
                  </table> 
                      </div>
                      <div class="card">
                        <div class="card-header text-center">
                          Agriculture
                        </div>
                        <table class="table table-sm table-striped">
                            <tr>
                              <td><b>Agri Sale Value</b></td>
                              <td><?php echo $row["AgriSaleValue"]; ?></td>
                            </tr>
                            
                            <tr>
                              <td><b>Costing </b></td>
                              <td><?php echo $row["AgriSaleValue"]*60/100; ?></td>
                            </tr>
                            <tr>
                              <td><b>Earning </b></td>
                              <td><?php echo $row["AgriSaleValue"]-$row["AgriSaleValue"]*60/100; ?></td>
                            </tr>
                            <tr>
                            </tr>
                  </table> 
                      </div>
                      <div class="card">
                        <div class="card-header text-center">
                          House Owner
                        </div>
                        
                        <table class="table table-sm table-striped">
                          <tr>
                            <td><b>Total Units</b></td>
                            <td><?php echo $row["HomeCount"] ?></td>
                          </tr>
                          <tr>
                            <td><b>Own Use</b></td>
                            <td><?php echo $row["OwnUse"] ?></td>
                          </tr>
                          <tr>
                            <td><b>For Rent</b></td>
                            <td><?php echo $row["HomeCount"]-$row["OwnUse"] ?></td>
                          </tr>
                          <tr>
                            <td><b>Rent Per Unit</b></td>
                            <td><?php echo $row["Rent"] ?></td>
                          </tr>
                          <tr>
                            <td><b>Total Rent</b></td>
                            <td><?php echo $row["Rent"]*($row["HomeCount"]-$row["OwnUse"])*12 ?></td>
                          </tr>
                          
                          <tr>
                            <td><b>Development Fee</b></td>
                            <td><?php echo $row["Rent"]*($row["HomeCount"]-$row["OwnUse"])*12*25/100 ?></td>
                          </tr>
                          
                          <tr>
                            <td><b>Earning</b></td>
                            <td><?php echo $row["Rent"]*($row["HomeCount"]-$row["OwnUse"])*12- $row["Rent"]*($row["HomeCount"]-$row["OwnUse"])*12*25/100 ?></td>
                            
                          </tr>
<?php
$homeearning = $row["Rent"]*($row["HomeCount"]-$row["OwnUse"])*12- $row["Rent"]*($row["HomeCount"]-$row["OwnUse"])*12*25/100;
if($row["HomeCount"]==0){
  $y = 1;
}
else{
  $y = $row["HomeCount"];
}

$x = ($row["HomeCount"]-$row["OwnUse"])/$y;
if($x == 0){
  $rentable = 1;
}
else{
$rentable = $x;
}


?>
                          <tr>
                            <td><b>Home Tax</b></td>
                            <td><?php echo ceil($row["HomeTax"]*$rentable) ?></td>
                          </tr>

                          
                          <tr>
                            <td><b>Land Tax</b></td>
                            <td><?php echo ceil($row["LandTax"]*$rentable) ?></td>
                          </tr>

                          
                          
                          <tr>
                            <td><b>Home Loan</b></td>
                            <td><?php echo ceil($row["HomeLoan"]*$rentable) ?></td>
                          </tr>

                           
                          <tr>
                            <td><b>Taxable</b></td>
                            <td><?php echo ceil($homeearning - $row["HomeTax"]*$rentable - $row["LandTax"]*$rentable - $row["HomeLoan"]*$rentable); ?></td>
                          </tr>
                  </table>
                        
                      </div>


                      <?php

}
                    ?>

                    
                    </div>
<?php $totaltaxable = $taxable + $row["SaleValue"]-$row["PurchaseValue"]-$row["Misc"]-$row["Bill"] + $row["AgriSaleValue"]-$row["AgriSaleValue"]*60/100 + $homeearning - $row["HomeTax"]*$rentable - $row["LandTax"]*$rentable - $row["HomeLoan"]*$rentable;
$agri = $row["AgriSaleValue"]-$row["AgriSaleValue"]*60/100;
?>
                    <h3 class="text-center">Total Taxable: <?php echo ceil($totaltaxable) ?></h3>
<?php
function tax($totaltaxable, $agri){
  include_once('../db/dbconnect.php');
                  $sql = "SELECT * FROM basic WHERE NIDNO = '".$_SESSION['NIDNO']."'  LIMIT 1";
                  

                  $auth = getDataFromDB($sql);
                  foreach($auth as $row){ 
                    $gender =   $row['Gender'];
                    $disable = $row['Disable'];
                    $ff = $row['FF'];
                    $age = $row['Age'];

                    if($age >= 18){
                        if($gender == "Male"){
                          if($age >= 65){
                            if($disable == "Yes"){
                              if($ff == "Yes"){
                                $cut = 475000;
                              }
                              else{
                                $cut = 450000;
                              }
                            }
                            else{
                              if($ff == "Yes"){
                                  $cut = 475000;
                              }
                              else{
                                $cut = 350000;
                              }
                            }
                          }
                          else{
                            if($disable == "Yes"){
                              if($ff == "Yes"){
                                $cut = 475000;
                              }
                              else{
                                $cut = 450000;
                              }
                            }
                            else{
                              if($ff == "Yes"){
                                  $cut = 475000;
                              }
                              else{
 $cut = 300000;
                              }
                            }
                          }
                        }
                        else{
                          if($age >= 65){
                            if($disable == "Yes"){
                              if($ff == "Yes"){
                                $cut = 475000;
                              }
                              else{
                                $cut = 450000;
                              }
                            }
                            else{
                              if($ff == "Yes"){
                                  $cut = 475000;
                              }
                              else{
                                $cut = 350000;
                              }
                            }
                          }
                          else{
                            if($disable == "Yes"){
                              if($ff == "Yes"){
                                $cut = 475000;
                              }
                              else{
                                $cut = 450000;
                              }
                            }
                            else{
                              if($ff == "Yes"){
                                  $cut = 475000;
                              }
                              else{
 $cut = 350000;
                              }
                            }
                          }


                        }
                       
                    }
                    else{
                      // $cut = 0;
                      
                    }

                   if($agri > 0){
                    $taxfree = $cut + 200000;
                    
                   }
                   else{
                    $taxfree = $cut;
                   }

                  //  $score > 10 ? 'genius' : 'nobody'

                  $zero = $taxfree;
                  $first = $totaltaxable - $taxfree > 0 ? ($totaltaxable - $taxfree < 100000 ? $totaltaxable - $taxfree : 100000) : 0;

                  $second = $totaltaxable - $taxfree - 100000 > 0 ? ($totaltaxable - $taxfree < 300000 ? $totaltaxable - $taxfree - 100000 : 300000) : 0;
                  
                  $third = $totaltaxable - $taxfree - 400000 > 0 ? ($totaltaxable - $taxfree - 400000 < 400000 ? $totaltaxable - $taxfree - 400000 : 400000) : 0;
                  
                  $fourth = $totaltaxable - $taxfree - 800000 > 0 ? ($totaltaxable - $taxfree - 800000 < 500000 ? $totaltaxable - $taxfree - 800000: 500000) : 0;

                  $fifth = $totaltaxable - $taxfree - 1300000 > 0 ? $totaltaxable - $taxfree - 1300000 : 0;
                  // $sixth = 
                  // return $fifth;

                  $totaltax = $zero*0 + $first*0.05 + $second*0.1 + $third * 0.15 + $fourth* 0.2 + $fifth * 0.25;
return $totaltax;

                  };
}
?>
                    <h3 class="text-center">Total Tax: <?php echo ceil(tax($totaltaxable, $agri)) ?></h3>
                  
</div>


            </div>
</form>
</div>
</div>
</div>
</div>


</body>
</html>
<?php
}
else{
header("Location: ../index.php");
}
?>