<html>
    <head>
        <title><?=$row->title?></title>
    </head>
    <body>
		<?php echo validation_errors();
			echo form_open('helloworld/edit/' . $row->id);
			echo form_input(array('name' => 'title', 'placeholder' => 'Title', 'value' => $row->title, 'required' => 'required'));
			echo form_textarea(array('name' => 'text', 'placeholder' => 'Text', 'value' => $row->text, 'required' => 'required'));
			echo form_submit('update', 'Update');
			echo form_close(); ?>
    </body>
</html>