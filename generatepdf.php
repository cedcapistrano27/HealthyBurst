<?php    

session_start();
     include 'connect.php';
     
          if (!isset($_SESSION["emailadmin"])) {
               header("location: index.php");
               exit();   
          }

     if (isset($_SESSION["email"])) {
               header("location: user_index.php");
               exit();   
          }

     if (isset($_GET['logout'])) {

     $db = new mysqli('localhost', 'root', '', 'healthyburst');
     $event = mysqli_query($db, "INSERT INTO event_log( event_user, event_activty, event_timestamp) VALUES ('".$_SESSION['admin']." ".$_SESSION['emailadmin']."','Sign-Out',current_timestamp())");

     if (isset($_SESSION['emailadmin'])) {
     session_destroy();
          unset($_SESSION['emailadmin']);
          header("location: index.php");
          exit();
     }
     
     }
   

  


 function fetch_data()    
 {    
      $output = '';    
      $db = mysqli_connect("localhost", "root", "", "healthyburst");    
      $sql = "SELECT * FROM shipment_detail WHERE ship_date > DATE_SUB(NOW(), INTERVAL 1 MONTH) ORDER BY ship_date DESC";    
      $result = mysqli_query($db, $sql);    
      while($row = mysqli_fetch_assoc($result))    
      {         
      $output .= '<tr>    
                          <td>'.$row["ship_id"].'</td>    
                          <td>'.$row["ship_order"].'</td>     
                          <td><p>'.$row["ship_desc"].'</p></td>
                          <td>'.$row["ship_date"].'</td>  
                     </tr>    
                          ';    
      }    
      return $output;    
 }    
 if(isset($_POST["generate_pdf"]))    
 {    
      require_once('tcpdf/tcpdf.php');    
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
      $obj_pdf->SetCreator(PDF_CREATOR);    
      $obj_pdf->SetTitle("Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP");    
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);    
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));    
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));    
      $obj_pdf->SetDefaultMonospacedFont('helvetica');    
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);    
      $obj_pdf->setPrintHeader(false);    
      $obj_pdf->setPrintFooter(false);    
      $obj_pdf->SetAutoPageBreak(TRUE, 10);    
      $obj_pdf->SetFont('helvetica', '', 9);    
      $obj_pdf->AddPage();    
      $content = '';    
      $content .= '  


      <h4 align="center">HEALTHY BURST : SUMMARY OF SHIPMENT ARCHIVE</h4><br/>  
    
     <table border="1" cellspacing="0" cellpadding="3" >    
           <tr>    
                <th width="15%">SHIP ID</th>    
                <th width="15%">SHIP ORDER #</th>       
                <th width="40%">SHIPMENT DESCRIPTION</th>
                <th width="30%">SHIPMENT DATE ISSUE</th>     
           </tr>    
      ';    
      $content .= fetch_data();    
      $content .= '</table>';     
      $obj_pdf->writeHTML($content);    
      $obj_pdf->Output('HealthyBurst_ShipmentArchived.pdf', 'D');    
 }    
 ?>    
 <!DOCTYPE html>    
 <html>    
      <head>    
           <title>Admin Area | Database : Order Detail Table</title>    
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
           <style>
                table tr td p{
                    white-space: pre-wrap;
                    width: 80%;
                    margin: auto;
                }
                table th{
                    text-align: center;
                }
           </style>             
      </head>    
      <body>    
           <br />  
           <div class="container">    
                <h4 align="center">Summary : Shipment Archive</h4><br />    
                <div class="table-responsive">    
                    <div class="col-md-12" align="right">  
                     <form method="post">    
                          <input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" />    
                     </form>  
                     

                     
                     </div>  
                     <br>  
                     <br>  
                     <table class="table table-bordered" style="border: 1px red solid; width: 70%; margin:auto; font-size: 15px;">    

                          <tr>    
                              <th width="10%">SHIP ID</th>    
                               <th width="10%">SHIP #</th>       
                               <th width="50%">SHIPMENT DETAILS</th>
                               <th width="20%">SHIPMENT DATE ISSUE</th>     
                          </tr>    
                     <?php    
                     echo fetch_data();    
                     ?>    
                     </table>    
                </div>    
           </div>  

           <br><br>
           <center>
           <a href="admin_index.php" style="height: 35px; width: 150; margin-right: auto; margin-left: auto; text-align: center; background: #131313; color: #A7F5A3; border-radius: 3px; cursor: pointer; text-decoration: none; line-height: 2.3; padding: 10px;">Admin Page</a> </center>

           <br><br><br>

      </body>    
</html>    