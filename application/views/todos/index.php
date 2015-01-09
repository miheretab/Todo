<html>
    <head>
        <title>To Do | <?=$page_title?></title>
    </head>
    <body>
		<?php $this->load->view('includes/menu.php'); ?>
		<?php echo validation_errors();
			echo form_open('todos/add');
			echo form_input(array('name' => 'title', 'placeholder' => 'Title', 'required' => 'required'));
			echo form_textarea(array('name' => 'text', 'placeholder' => 'Description', 'required' => 'required'));
			echo form_input(array('name' => 'todo_date', 'placeholder' => 'YYYY-MM-DD', 'value' => date('Y-m-d'), 'required' => 'required'));
			echo form_submit('add', 'Add');
			echo form_close();
		if(!empty($result)) {
		foreach($result as $row):?>
        <h3><?= anchor('todos/edit/' . $row->id, $row->title, null); ?></h3>
        <p><?=$row->text?></p>
		<p>To be done on <?=$row->todo_date?></p>
		<?php if(!$row->completed) { echo anchor('todos/complete/' . $row->id, 'Complete', array('onclick' => 'if(confirm(\'Are you sure you want to complete it?\')) {return true;} else {return false;}')); } ?>
        <br/>
        <?php endforeach;}?>
    </body>
</html>