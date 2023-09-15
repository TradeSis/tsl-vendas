<?php
include_once(__DIR__ . '/../head.php');
?>

<style>

  .nav-link.active:any-link{
    background-color: transparent;
    border: 2px solid #DFDFDF;
    border-radius: 5px 5px 0px 0px;
    color: #1B4D60;
  }

  .nav-link:any-link{
    background-color: #567381;
    border: 1px solid #DFDFDF;
    border-radius: 5px 5px 0px 0px;
    color: #fff;
  }
  
</style>
<div class="container-fluid">
  <div class="row mt-3" ><!-- style="border: 1px solid #DFDFDF;" -->
    <div class="col-md-2 ">
      <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
        <?php
        $stab = 'token';
        if (isset($_GET['stab'])) {
          $stab = $_GET['stab'];
        }
        //echo "<HR>stab=" . $stab;
        ?>
        <li class="nav-item ">
          <a class="nav-link <?php if ($stab == "token") {
            echo " active ";
          } ?>"
            href="?tab=apoio&stab=token" role="tab" >Token</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link <?php if ($stab == "testeToken") {
            echo " active ";
          } ?>"
            href="?tab=apoio&stab=testeToken" role="tab" >Teste Token</a>
        </li>
      </ul>
    </div>
    
    <div class="col-md-10">
      <?php
          $ssrc = "";

          if ($stab == "token") {
            $ssrc = "token.php";
          }
          if ($stab == "testeToken") {
            $ssrc = "teste_token.php";
          }
    

          if ($ssrc !== "") {
            //echo $ssrc;
            include($ssrc);
          }

      ?>

    </div>
  </div>



</div>
