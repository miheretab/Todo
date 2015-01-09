<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>To Do | Admin Panel</title>
         
    </head>
 
    <body>	
		<?php $this->load->view('includes/menu.php'); ?>
        <div id="wrapper">
            <div id="contents">
                <h3>Admin Panel</h3>
				<h4>All Users</h4>
				<table>
					<thead><tr><th>Name</th><th>Username</th><th>Role</th></tr></thead>
					<tbody>
						<?php 
						if(!empty($result)) {
							foreach($result as $row):?>
								<tr><td><?=$row->name; ?></td><td><?=$row->username; ?></td><td><?php echo $row->role_id ? 'ADMIN' : 'USER'; ?></td></tr>
							<?php endforeach;
						}?>				
					</tbody>
				</table>
            </div>
        </div>
    </body>
</html>