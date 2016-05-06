
		<div id="mws-sidebar">
            <div id="mws-navigation">
			<img src="images/logo.jpg" width="200" height="100" alt=""/>
            	<ul>
					<li><a></a></li>
					<?php do { ?>
							<li><a href="insert.php?idev=<?php echo $row_rs_event['id_evento']; ?>"><?php echo $row_rs_event['evento']; ?></a></li>
					<?php } while ($row_rs_event = mysql_fetch_assoc($rs_event)); ?>
                   
                </ul>
      </div>
        </div>