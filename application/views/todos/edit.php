<html>
    <head>
        <title>To Do | <?=$row->title?></title>
    </head>
    <body>
		<?php $this->load->view('includes/menu.php'); ?>
		<?php echo validation_errors();
			echo form_open('todos/edit/' . $row->id);
			echo form_input(array('name' => 'title', 'placeholder' => 'Title', 'value' => $row->title, 'required' => 'required'));
			echo form_textarea(array('name' => 'text', 'placeholder' => 'Description', 'value' => $row->text, 'required' => 'required'));
			echo form_input(array('name' => 'todo_date', 'placeholder' => 'YYYY-MM-DD', 'value' => $row->todo_date, 'required' => 'required'));
			echo form_submit('update', 'Update');
			echo form_close(); ?>
    </body>
</html>