<html>
    <head>
        <title><?=$page_title?></title>
    </head>
    <body>
		<?php if($this->session->flashdata('message')) { ?>
		<p><?php echo $this->session->flashdata('message'); ?></p>
		<?php } ?>
		<?php echo validation_errors();
			echo form_open('helloworld/add');
			echo form_input(array('name' => 'title', 'placeholder' => 'Title', 'required' => 'required'));
			echo form_textarea(array('name' => 'text', 'placeholder' => 'Text', 'required' => 'required'));
			echo form_submit('add', 'Add');
			echo form_close();
		foreach($result as $row):?>
        <h3><?= anchor('helloworld/edit/' . $row->id, $row->title, null); ?></h3>
        <p><?=$row->text?></p>
        <br />
        <?php endforeach;?>
    </body>
</html>