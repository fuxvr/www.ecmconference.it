<?php
 session_start();
if (!isset($_SESSION['myusername'])){
header("location:index.php");
}
include("DB/lista_account.php");
 ?>

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

 
<title>Inserimento utenti</title>

</head>

<body>

    <?php include("condivisi/intestazione.php"); ?>
    
    <div id="mws-wrapper">
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
		
		<?php include("condivisi/menu_admin.php"); ?>
        
        <div id="mws-container" class="clearfix">
            

            	<div class="mws-panel grid_4">
                	<div class="mws-panel-header">
                    	<span class="mws-i-24 i-list">Inserimento Utente</span>
                    </div>
                    <div class="mws-panel-body">
                    	<form class="mws-form" action="DB/insert_account.php" method="post">
                    		    <div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label>Utente :</label>
                    				<div class="mws-form-item large">
                    					<input type="hidden" name="myusername" value= "<?php echo $_SESSION['myusername']?>"/>
                    					<input name="user" type="text" class="mws-textinput" /></div>
                                      </div>
                                    <div class="mws-form-row">
                                    <label>Password:</label>
                    				<div class="mws-form-item large">
									<input name="password" type="text" class="mws-textinput" /></div>
                                    </div>
									 <div class="mws-form-row">
                                    <label>permessi:</label>
                    				<div class="mws-form-item large">
									<input name="permessi" type="text" class="mws-textinput" /></div>
                                    </div>
									 <div class="mws-form-row">
                                    <label>E-mail:</label>
                    				<div class="mws-form-item large">
									<input name="email" type="text" class="mws-textinput" /></div>
                                    </div>
                    			</div>                   			
                    		<div class="mws-button-row">
                    			<input type="submit" value="Inserisci" class="mws-button green" />
                    		</div>
                    	</form>
                    </div> 
                </div>
          <div class="mws-panel grid_1">
                	<div class="mws-panel-header">
                    	<span class="mws-i-24 i-list">Permessi</span>
                    </div>
                    <div class="mws-panel-body">
                    	<p><br />	
                           0 - Agenzia</p>
                    	<p>1- Amministratore<br />
                  	  </p>
                    	<div class="mws-form-row">
                         </div>
                         
                         <br />
                  </div> 
                </div>
            	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span class="mws-i-24 i-table-1">Lista Utenti</span>
                    </div>
                    <div class="mws-panel-body">
                        <table class="mws-datatable-fn mws-table">
                            <thead>
                                <tr>
                                    <th>Utente</th>
                                    <th>Password</th>
                                    <th>Permessi</th>
									<th>E-mail</th>
									<th>Elimina</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php do { ?>
								 <tr class="gradeA">
								 	<td><?php echo $row_rs_utenti['user']; ?></td>
                                    <td><?php echo $row_rs_utenti['password']; ?></td>
									<td><?php echo $row_rs_utenti['permessi']; ?></td>
									<td><?php echo $row_rs_utenti['email']; ?></td>
									<?php  
									 echo "<td><a onClick=\"javascript: return confirm('Confermi la cancellazione ?');\" href='DB/delete_account.php?id=".$row_rs_utenti['id']."'><img src='images/icone/ico2.jpg' alt='Elimina'/></a></td>";
									?>
                                </tr>
								<?php } while ($row_rs_utenti = mysql_fetch_assoc($rs_utenti)); ?>
								
                            </tbody>
                        </table>
                    </div>
        
                </div>           
            <div id="mws-footer">
            	Copyright Your Website 2016. All Rights Reserved.
            </div>
            
        </div>
    </div>

</body>
</html>
