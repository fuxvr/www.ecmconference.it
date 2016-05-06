<?php

include("DB/lista_ingressi.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/HTML; charset=ISO-8859-1" /> 
<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/fonts/ptsans/stylesheet.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/fluid.css" media="screen" />

<link rel="stylesheet" type="text/css" href="css/mws.style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/icons/icons.css" media="screen" />

<!-- Demo and Plugin Stylesheets -->
<link rel="stylesheet" type="text/css" href="css/demo.css" media="screen" />

<link rel="stylesheet" type="text/css" href="plugins/colorpicker/colorpicker.css" media="screen" />
<link rel="stylesheet" type="text/css" href="plugins/jimgareaselect/css/imgareaselect-default.css" media="screen" />
<link rel="stylesheet" type="text/css" href="plugins/fullcalendar/fullcalendar.css" media="screen" />
<link rel="stylesheet" type="text/css" href="plugins/fullcalendar/fullcalendar.print.css" media="print" />
<link rel="stylesheet" type="text/css" href="plugins/tipsy/tipsy.css" media="screen" />
<link rel="stylesheet" type="text/css" href="plugins/sourcerer/Sourcerer-1.2.css" media="screen" />
<link rel="stylesheet" type="text/css" href="plugins/jgrowl/jquery.jgrowl.css" media="screen" />
<link rel="stylesheet" type="text/css" href="plugins/spinner/spinner.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/jui/jquery.ui.css" media="screen" />

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/mws.theme.css" media="screen" />

<!-- JavaScript Plugins -->

<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>



<script type="text/javascript" src="plugins/jimgareaselect/jquery.imgareaselect.min.js"></script>
<script type="text/javascript" src="plugins/jquery.dualListBox-1.3.min.js"></script>
<script type="text/javascript" src="plugins/jgrowl/jquery.jgrowl.js"></script>
<script type="text/javascript" src="plugins/jquery.filestyle.js"></script>
<script type="text/javascript" src="plugins/fullcalendar/fullcalendar.min.js"></script>
<script type="text/javascript" src="plugins/jquery.dataTables.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="plugins/flot/excanvas.min.js"></script>
<![endif]-->
<script type="text/javascript" src="plugins/flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="plugins/flot/jquery.flot.pie.min.js"></script>
<script type="text/javascript" src="plugins/flot/jquery.flot.stack.min.js"></script>
<script type="text/javascript" src="plugins/flot/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="plugins/colorpicker/colorpicker.js"></script>
<script type="text/javascript" src="plugins/tipsy/jquery.tipsy.js"></script>
<script type="text/javascript" src="plugins/sourcerer/Sourcerer-1.2.js"></script>
<script type="text/javascript" src="plugins/jquery.placeholder.js"></script>
<script type="text/javascript" src="plugins/jquery.validate.js"></script>
<script type="text/javascript" src="plugins/jquery.mousewheel.js"></script>
<script type="text/javascript" src="plugins/spinner/ui.spinner.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>

<script type="text/javascript" src="js/mws.js"></script>
<script type="text/javascript" src="js/demo.js"></script>
<script type="text/javascript" src="js/themer.js"></script>

    <script type="text/javascript">
			//Per la finestra
	    window.onload = function() {
        document.getElementById("codice").focus();
		};
		
		
		window.onclick =function() {
       		document.getElementById("codice").focus();
		}; 
		//  per il touch
		document.addEventListener('touchmove',function(e) {
      		document.getElementById("codice").focus();
   		});
		 document.addEventListener ( 'TouchStart', function (e) {
       document.getElementById("codice").focus();
   		});
	
	</script> 
 
<title>Controllo</title>

</head>

<body>

   
    <br /><br />
    <div id="mws-wrapper">
            	<div class="mws-panel grid_4">
                	<div class="mws-panel-header">
                    	<span class="mws-i-24 i-list">Scansione Ingresso</span>
                    </div>
                    <div class="mws-panel-body">
                    
					
					<form class="mws-form" action="DB/verifica.php"   method="post">
                    		    <div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label>Codice :</label>
                    				<div class="mws-form-item large">
										<input type="hidden" name="evento" value= "<?php echo $_GET['idev']?>"/>
                    					<input type="hidden" name="myusername" value= "<?php echo $_SESSION['myusername']?>"/>
                    					<input name="codice"  class="mws-textinput" id="codice" />
                                       
                                      </div>           			
                    		<div class="mws-button-row">
                    			<input type="submit" value="Controlla" class="mws-button green" />
                    		</div>
                    	</form>
                    	
                    </div> 
                </div>    
			<?php 
			if (isset($_GET["stato"])){
				if ($_GET["stato"] == "ENTRATA" or $_GET["stato"] == "USCITA")
				{echo "<p  align='center'><img src='images/ok.png' alt=''/></p>";}
				if ($_GET["stato"] == "ko")
				{echo "<p  align='center'><img src='images/ko.png' alt=''/></p>";}
			}
			?>
        </div>

    </div>
    <div class="mws-panel grid_4">
                	<div class="mws-panel-header">
                    	<span class="mws-i-24 i-list">Log accessi</span>
                    </div>
                    <div class="mws-panel-body">
           <table class="mws-datatable-fn mws-table">
                            <thead>
                                <tr>
                                	<th>Partecipante</th>
                                    <th>Data ora</th>
                               <!--     <th>Terminale</th>  -->
									<th>Ingresso</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php do { ?>
								 <tr class="gradeA">
                                    <td><?php echo $row_rs_ingressi['nome']; ?></td>
                                    <td><?php echo $row_rs_ingressi['data']; ?></td>
								<!--	<td><?php echo $row_rs_ingressi['terminale']; ?></td> -->
									<td><?php echo $row_rs_ingressi['stato']; ?></td>
                                </tr>
								<?php } while ($row_rs_ingressi = mysql_fetch_assoc($rs_ingressi)); ?>
								
                            </tbody>
                        </table>
                    </div> 
                </div>    
			<div class="mws-panel grid_4">
            <?php 
			if (isset($_GET["stato"])){
				if ($_GET["stato"] == "ENTRATA")
				{echo "<p  align='center'><img src='images/entrata.png' alt=''/></p>";}
				if ($_GET["stato"] == "USCITA")
				{echo "<p  align='center'><img src='images/uscita.png' alt=''/></p>";}
			}
			?>
            </div>
        </div>

    </div>
</body>
</html>
  