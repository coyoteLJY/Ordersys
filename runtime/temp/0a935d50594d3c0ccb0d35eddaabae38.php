<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"E:\wamp64\www\Ordersys\public/../application/index\view\dishes\menu.html";i:1517839747;}*/ ?>
<script src="/static/js/jquery-3.1.0.min.js" type="text/javascript"></script>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<?php if(is_array($sort) || $sort instanceof \think\Collection || $sort instanceof \think\Paginator): $i = 0; $__LIST__ = $sort;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?>
				<div class="col-md-8" id="<?php echo $so['dsId']; ?>" style="position: relative">

					<div class="card">
						<div class="card-header" data-background-color="purple">
							<h4 class="title"><?php echo $so['dsName']; ?></h4>
						</div>
						<div class="card-content">
							<?php foreach($data as $d): if($so['dsId'] == $d['dsId']): ?>
									<a title="<?php echo $d['dishesName']; ?>" id="<?php echo $d['dishesId']; ?>">
										<?php if($d['dishesImg'] == null): ?>
											<img src="/static/img/dishes.png" style="width: 120px;height: 80px;padding: 10px" alt="<?php echo $d['dishesName']; ?>" class="<?php echo $d['dishesId']; ?>" onclick="doit('<?php echo $d['dishesId']; ?>','<?php echo \think\Session::get('orderId'); ?>');">
										<?php else: ?>
											<img src="<?php echo $d['dishesImg']; ?>" style="width: 120px;height: 80px;padding: 10px" alt="<?php echo $d['dishesName']; ?>" class="<?php echo $d['dishesId']; ?>" onclick="doit('<?php echo $d['dishesId']; ?>','<?php echo \think\Session::get('orderId'); ?>');">
										<?php endif; ?>
									</a>
								<?php endif; endforeach; ?>
						</div>
					</div>
				</div>
			<?php endforeach; endif; else: echo "" ;endif; ?>
			<div id="test">

			</div>
		</div>
	</div>
</div>

<script>
	function doit(dishes,orderId) {
		var url = "<?php echo url('order/cart'); ?>";
		$("#test").load(url,{"dishes" : dishes,"orderId":orderId});
    }


</script>

