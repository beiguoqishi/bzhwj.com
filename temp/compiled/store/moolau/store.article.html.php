<?php echo $this->fetch('header.html'); ?>

<?php echo $this->fetch('top.html'); ?>

<div id="mystore" class="w auto clearfix">
   <div class="col-sub w190">
      <?php echo $this->fetch('left.html'); ?>
   </div>
   <div class="col-main w750">
        <div class="default"><?php echo html_filter($this->_var['article']['content']); ?></div>
    </div>
</div>

<?php echo $this->fetch('footer.html'); ?>