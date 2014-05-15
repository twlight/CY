<div classs="row">
<h2>成功案例</h2>
<div class="pagination">
<?php echo $this->table->generate($results); ?>
每页 <b><?php echo $page['num']; ?></b> 条 / 当前 <b><?php echo $page['current']; ?></b> 条 / 计 <b><?php echo $page['page']; ?></b> 页 / 共 <b><?php echo $page['total']; ?></b> 条
<?php echo $this->pagination->create_links(); ?>
</div>
</div>