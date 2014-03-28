<?php echo $this->fetch('header.html'); ?>
<div class="content w1200 clearfix">
    <div class="left" area="top_left" widget_type="area">
        <?php $this->display_widgets(array('page'=>'index','area'=>'top_left')); ?>
    </div>
    <div class="right clearfix">
        <div class="main clearfix">
            <div class="middle" area="middle" widget_type="area">
                <?php $this->display_widgets(array('page'=>'index','area'=>'middle')); ?>
            </div>
            <div class="side" area="side" widget_type="area">
                <?php $this->display_widgets(array('page'=>'index','area'=>'side')); ?>
            </div>
        </div>
        <div style="float:left;" area="bottom" widget_type="area">
            <?php $this->display_widgets(array('page'=>'index','area'=>'bottom')); ?>
        </div>
    </div>
</div>
<div class="floor1 w1200 clearfix">
	<div class="left" area="floor_left" widget_type="area">
        <?php $this->display_widgets(array('page'=>'index','area'=>'floor_left')); ?>
    </div>
    <div class="center" area="floor_center" widget_type="area">
        <?php $this->display_widgets(array('page'=>'index','area'=>'floor_center')); ?>
    </div>
    <div class="right" area="floor_right" widget_type="area">
        <?php $this->display_widgets(array('page'=>'index','area'=>'floor_right')); ?>
    </div>
</div>
<div class="floor w1200" area="floor" widget_type="area">
    <?php $this->display_widgets(array('page'=>'index','area'=>'floor')); ?>
</div>
<?php echo $this->fetch('service.html'); ?>
<?php echo $this->fetch('footer.html'); ?>