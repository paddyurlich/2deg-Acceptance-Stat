

<?php include 'functions.php' ?>

<?php
    
    set_time_limit(360);

    //=============================
    // database connection
    //=============================  

    $servername = "172.21.200.37";
    $username = "patrickurlich";
    $password = "forPUonly";
    $dbname = "ranPU";
    $table = "Acceptance_Stats";

    // Create connection
    //$connect = new mysqli($servername, $username, $password, $dbname);
     $connect = mysqli_connect($servername, $username,$password,$dbname); 
    // Check connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    } 


    

    //==========================================
    //get cell and date list for drop downs
    //==========================================

    $sql = "SELECT CELLNAME, Date from `ranPU`.`".$table."`"." ORDER BY $table.CELLNAME ASC";

    //echo $sql;

    $result = $connect->query($sql);

    //$result_array = array();
    //$cellList_array = array();

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $result_array[] = $row;
            //echo "Cell: " . $row["Object"]. " - Date: " . $row["TheDate"]. " RNC " . $row["RNC"]. "<br>";
        }
    } else {
        echo "0 results ";
    }


     foreach($result_array as $k => $v) {
         $cellList_array[] =  $result_array[$k]['CELLNAME'];
     }

     foreach($result_array as $k => $v) {
          //$dateList_array[] =  substr($result_array[$k]['Date'],0,-9);
          $dateList_array[] =  $result_array[$k]['Date'];

     }



      $cellList_array = array_unique($cellList_array);
      $dateList_array = array_unique($dateList_array);

      $dateList_array_sorted = arsort($dateList_array);

    //=============================
    // helper vars
    //=============================

      $selection = isset($_GET['cell']) ? $_GET['cell'] : null ;
      $startDate = isset($_GET['startDate']) ? $_GET['startDate'] : null ;
      $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : null ;

      $formComplete = (is_null($selection)  || is_null($startDate) || is_null($endDate)) ? false : true ;

    //=============================
    // trouble shooting - var dumps
    //=============================

        
        //var_dump($dateList_array);
        //var_dump($dateList_array_sorted);
        //var_dump($result_array);
        //var_dump($formComplete);
        //var_dump($selection);
        //var_dump($startDate);
        //var_dump($startDate);


  
    //=============================
    // test area
    //=============================


$sql = "SELECT CELLNAME, Date from `ranPU`.`".$table."`"." ORDER BY $table.CELLNAME ASC";

    $result = $connect->query($sql);

    //$result_array = array();
    //$cellList_array = array();

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $result_array[] = $row;
            //echo "Cell: " . $row["Object"]. " - Date: " . $row["TheDate"]. " RNC " . $row["RNC"]. "<br>";
        }
    } else {
        echo "0 results ";
    }





















    //=============================
    // if form is summited then process.....
    //=============================

    if($formComplete) {

        $selectedCells = "";

        foreach ($selection as $selectedCell) {
          $selectedCells .= " CELLNAME = '".$selectedCell."' OR ";
        }
        $selectedCells = substr($selectedCells, 0, -3); //remove last "OR" from end of SQL string



        // ========== CS_CSSR_Average ===============        

        $CS_CSSR_AverageSQL =     "SELECT (((sum(PU_Voice_RRC_Succ)/sum(PU_Voice_RRC_Att))*100) *
                                    ((sum(PU_Voice_RAB_Succ)/sum(PU_Voice_RAB_Att))*100))/100
                                  AS CS_CSSR_Average
                                  FROM `ranPU`.`Acceptance_Stats` 
                                  WHERE (Date BETWEEN '".$startDate."' AND '".$endDate."') AND ".$selectedCells; 

        $CS_CSSR_Average = getSQLResult($CS_CSSR_AverageSQL,"CS_CSSR_Average");

        // ========== CS_Ret ===============
       
        $CS_RetSQL =              "SELECT (100-((sum(PU_Voice_Ret_Num)/sum(PU_Voice_Ret_Den))*100))
                                  AS CS_Ret
                                  FROM `ranPU`.`Acceptance_Stats` 
                                  WHERE (Date BETWEEN '".$startDate."' AND '".$endDate."') AND ".$selectedCells; 

        $CS_Ret = getSQLResult($CS_RetSQL,"CS_Ret");        

        // // ========== PS_CSSR_Average ===============

        $PS_CSSR_AverageSQL =     "SELECT (((sum(PU_PS_RRC_Succ)/sum(PU_PS_RRC_Att))*100) *
                                    ((sum(PU_PS_RAB_Succ)/sum(PU_PS_RAB_Att))*100))/100
                                  AS PS_CSSR_Average
                                  FROM `ranPU`.`Acceptance_Stats` 
                                  WHERE (Date BETWEEN '".$startDate."' AND '".$endDate."') AND ".$selectedCells; 


        $PS_CSSR_Average = getSQLResult($PS_CSSR_AverageSQL,"PS_CSSR_Average");        


        // ========== PS_Ret ===============

        $PS_RetSQL =              "SELECT (100-((sum(PU_PS_Ret_Num)/sum(PU_PS_Ret_Den))*100))
                                  AS PS_Ret
                                  FROM `ranPU`.`Acceptance_Stats` 
                                  WHERE (Date BETWEEN '".$startDate."' AND '".$endDate."') AND ".$selectedCells; 

        $PS_Ret = getSQLResult($PS_RetSQL,"PS_Ret"); 

      } 

    $connect->close();
?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Acceptance Stats</title>
  <link rel="stylesheet" href="docsupport/style.css">
  <link rel="stylesheet" href="docsupport/prism.css">
  <link rel="stylesheet" href="chosen.css">
  <style type="text/css" media="all">
    /* fix rtl for demo */
    .chosen-rtl .chosen-drop { left: -9000px; }
  </style>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>

<!-- <div class="panel panel-primary">
  <div class="panel-heading">File Input:</div>
  <div class="panel-body">
     <form action:"CSVupload.php" method='POST' enctype='multipart/form-data'>  
        <div align="left">  
             <p>Upload CSV: <input type='file' name='file' /></p>  
             <p><input type='submit' name='submit' value='Import' /></p>  
        </div>  
   </form>
  </div>
</div> -->




<form action:"index.php" method: "get">
<div id="container" class="container">
  <div id="content" class="panel panel-default">
    <header>
      <h1>Acceptance KPI Snapshot <small>(<span id="latest-version">v1</span>)</small></h1>
    </header>
   <!--  <p>What is the performance of you cluster ? </p> -->




    <div>
      
      <em>Cells:</em>                
     


<!-- 
  ============================
     Cell - Input select
  ============================
 -->
     <select name="cell[]" data-placeholder="Choose a cell..." class="chosen-select" multiple style="width:300px;" tabindex="4">
        <option value=""></option>       
            <?php foreach($cellList_array as $k => $v) { ?>
                <option value=<?php echo $cellList_array[$k];?>
                  
                  <?php
                    if (isset($selection)) {
                      foreach ($selection as $key => $selectedCell) {
                        echo isset($selection) && $cellList_array[$k] == $selectedCell ? ' selected' : '';
                      }
                    }
                  ?>

                  > <!--end of option tag -->

                  <?php echo $cellList_array[$k]; ?>  

            <?php } ?> 
      </select>




     </br></br>


<!-- 
  ============================
     Start time/date - Input select
  ============================
 --> 

      <em>Start time/date:</em>
     <select name="startDate" data-placeholder="Choose a start date..." class="chosen-select" style="width:200px;" tabindex="4">
        <option value=""></option>       
            <?php foreach($dateList_array as $k => $v) { ?>
                <option value=<?php echo $dateList_array[$k];?><?php echo isset($startDate) && $dateList_array[$k] == $startDate ? ' selected' : '' ?>> <?php echo $dateList_array[$k]; ?>                      
            <?php } ?> 
      </select>

      </br></br>

<!-- 
  ============================
     end time/date - Input select
  ============================
 --> 
      <em>End time/date:</em>
     <select name="endDate" data-placeholder="Choose an end date..." class="chosen-select" style="width:200px;" tabindex="4">
        <option value=""></option>       
            <?php foreach($dateList_array as $k => $v) { ?>
                <option value=<?php echo $dateList_array[$k];?><?php echo isset($endDate) && $dateList_array[$k] == $endDate ? ' selected' : '' ?>> <?php echo $dateList_array[$k]; ?>                      
            <?php } ?> 
      </select>

      </br></br>

      <input type="submit" value="Show">

      </br></br> 


      <?php 
        // foreach ($dateList_array as $key => $value) {
        //  //echo ($value)."<br/>";
        // //echo variant_get_type($value);


        // }

    ?>




      <?php
        if($formComplete) {
            

            echo "Cell List = ";
            foreach ($selection as $key => $cell) {
              echo $cell.", ";
            }
            echo "<br/>";
            echo "Start Date: ".$startDate;
            echo "<br/>";
            echo "End Date: ". $endDate;
            echo "<br/>";
            echo "<br/>";
            echo "<br/>";
            echo "<br/>";

            

            echo "CS Accessability = ". number_format($CS_CSSR_Average,2);
            echo "</br>";
            //echo $CS_CSSR_AverageSQL;
            echo "CS Retainability = ". number_format($CS_Ret,2);
            //echo "</br>";
            //echo $CS_RetSQL;
            echo "</br>";
            echo "PS Accessability = ". number_format($PS_CSSR_Average,2);
            echo "</br>";
            echo "CS Retainability = ". number_format($PS_Ret,2);
            echo "</br>";
            echo "</br>";

  



        }
      ?>
 


    </div>
  </div>       
</div>
</div>
</form>

</body>

<footer>

<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
 -->
<script src="jquery-3.1.0.min.js" type="text/javascript"></script>

<script src="chosen.jquery.js" type="text/javascript"></script>
<script src="docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
var config = {
  '.chosen-select'           : {},
  '.chosen-select-deselect'  : {allow_single_deselect:true},
  '.chosen-select-no-single' : {disable_search_threshold:10},
  '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
  '.chosen-select-width'     : {width:"95%"}
}
for (var selector in config) {
  $(selector).chosen(config[selector]);
}
</script>





<!-- 
   <form action:"index.php" method='POST' enctype='multipart/form-data'>  
        <div align="left">  
             <p>Upload CSV: <input type='file' name='file' /></p>  
             <p><input type='submit' name='submit' value='Import' /></p>  
        </div>  
   </form>  
 -->
        




  </footer>


  

</html>
