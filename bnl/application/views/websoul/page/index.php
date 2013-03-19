<?php echo $this->session->flashdata('notification'); ?>
<h3>Static Page</h3>
            <table cellpadding="0" cellspacing="0" width="100%" > 
    <thead>
    <tr>
        <td>No.</td>
	<td>Page Code</td>
        <td>Title</td>
        <td>Content</td>
        <td>Publish</td>
        <td>&nbsp;</td>
    </tr>
    <tbody>
    <?php $i=1;foreach($query as $v){ ?>
    <tr>
        <td><?php echo $i;?>.</td>
        <td><?php echo $v->page_code;?></td>
        <td><?php echo $v->title;?></td>
        <td><?php echo substr(strip_tags($v->content), 0, 300);?></td>
        <td><?php echo $publish[$v->publish];?></td>
        <td><a title="Edit this record" href="<?php echo site_url("websoul/page/edit/".$v->page_code); ?>"><img src="<?php echo site_url(); ?>assets/images/icons/dark/pencil.png" alt="" /></a></td>
    </tr>
    <?php $i++;} ?></tbody>   
</table></form><?php echo $paging; ?>
