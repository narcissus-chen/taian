<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang=zh-cn>
<head>
	<meta charset=utf-8 />
	<title>产品展示-详情</title>
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/base.css" />
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/product_details.css" />
	<link href="/Public/Home/images/Limited.ico" rel="shortcut icon" />
	<style type="text/css">
		.product .text p { padding-top: 1em;text-indent: 2em; }
		.product .text>p { text-indent: 0; }
	</style>
</head>
<body>
	<div class="header" id="header">
		<div class="header_top clear">
			<div class="top_warp fr clear">
				<a href="contact.html">联系我们</a>
				<a href="contact.html">设为首页</a>
				<a href="contact.html">收藏本站</a>
				<form action="#" id="search" class="clear">
					<input type="text" class="text" value="请输入关键字搜索" /><font><input class="submit" type="submit" value="| 搜索" /></font>
				</form>

			</div>
		</div>
		<div class="header_nav clear">
			<img src="/Public/Home/images/logo.gif" />
			<div class="nav_wrap">
				<span><font>服务热线：</font><strong>888-888888</strong></span>
				<ul class="clear">
					<li><a href="index.html">首页</a></li>
					<li><a href="news.html">新闻中心</a></li>
					<li class="index"><a href="product.html">产品展示</a></li>
					<li><a href="company.html">公司介绍</a></li>
					<li><a href="contact.html">联系我们</a></li>
					<li><a href="enterprise.html">企业介绍</a></li>
					<li><a href="strength.html">公司实力</a></li>
					<li><a href="file.html">诚信档案</a></li>
				</ul>
			</div>

		</div>
		<div class="banner" id="banner">
			<a class="pre"></a><a class="next"></a>
			<div class="banner_wrap">
				<ul class="action clear">
					<li><a href="#"><img src="/Public/Home/images/banner/banner1.jpg"></a></li>
					<li><a href="#"><img src="/Public/Home/images/banner/banner1.jpg"></a></li>
					<li><a href="#"><img src="/Public/Home/images/banner/banner1.jpg"></a></li>
				</ul>
				<div class="clear"><p class="index"></p><p></p><p></p></div>
			</div>
		</div>
	</div>
	<div id="content" class="content clear">
		<div class="side">
			<div class="section_a Pr">
				<div class="title">
					<span class="icon"><h2>产品分类</h2><p>Product</p></span>
				</div>
				<ul class="side_nav">
					<?php if(is_array($cate_data)): foreach($cate_data as $key=>$c): ?><li><a href="<?php echo U('product/showlist','id='.$c[id]);?>"><?php echo ($c["cate_name"]); ?></a></li><?php endforeach; endif; ?>
				</ul>
			</div>
		</div>
		<div class="product">
			<span class="crumbs">
				<a href="<?php echo U('showlist');?>">产品中心</a>
			<font>>></font>
				<a href="<?php echo U('product/showlist','id='.$pro_data[cate_id]);?>"><?php echo ($pro_data["cate_name"]); ?></a>
			<font>>></font>
				<a href="javascript:;"><?php echo ($pro_data["name"]); ?></a>
			</span>
			<div class="text">
				<div>
					<img src="/Public/Upload/<?php echo ($pro_data["big_pic"]); ?>" alt="<?php echo ($pro_data["name"]); ?>" title="<?php echo ($pro_data["name"]); ?>">
				</div>

				<p>产品名称：</p>
				<div><p><?php echo ($pro_data["name"]); ?></p></div>

				<p>产品编号：</p>
				<div><p><?php echo ($pro_data["number"]); ?></p></div>

				<p>产品规格：</p>
				<div>
					<?php if(is_array($price_data)): foreach($price_data as $key=>$p): ?><p><?php echo ($p["product_type"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($p["product_price"]); ?>元</p><?php endforeach; endif; ?>
				</div>

				<p>产品详情：</p>
				<div>
					<?php echo (Htmlspecialchars_decode($pro_data["content"])); ?>
				</div>

			</div>
			<div class="turn_back clear">
				<?php if(empty($prev[id])): ?><a class="Pre" href="javascript:;">上一个： 没有了</a>
				<?php else: ?>
					<a class="Pre" href="<?php echo U('product/detail','id='.$prev[id]);?>">上一个： <?php echo ($prev['name']); ?></a><?php endif; ?>
				<?php if(empty($next[id])): ?><a class="Next" href="javascript:;">下一个： 没有了</a>
				<?php else: ?>
					<a class="Next" href="<?php echo U('product/detail','id='.$next[id]);?>">下一个： <?php echo ($prev['name']); ?></a><?php endif; ?>
			</div>
		</div>
	</div>
	<div style="height: 85px;">
		<div id="return"><span>返回顶部</span></div>
	</div>
	<div id="footer" class="footer">
	<div class="partner clear">
		<font>友情链接：</font>
		<a href="#" class="shouhu"><img src="/Public/Home/images/shouhu.jpg" alt="sohu" title="搜狐"/></a>
		<a href="#"><img src="/Public/Home/images/tengxun.jpg" alt="tenxun" title="腾讯"/></a>
		<a href="#"><img src="/Public/Home/images/xinlang.jpg" alt="xinlang" title="新浪"/></a>
		<a href="#"><img src="/Public/Home/images/wangyi.jpg" alt="wangyi" title="网易"/></a>
		<a href="#" class="last"><img src="/Public/Home/images/baidu.jpg" alt="baidu" title="百度"/></a>
	</div>
		<p class="message"><span>地址：广州市天河路365号天俊阁1202</span><span>电话：020 38812035</span><span>传真：020 38812035</span><span>Email：88888888@xx.com</span></p>
		<p class="copyright">Copyright ©2010-2015 泰安交通安全设施有限公司 </p>
		<p class="icp">版权所有 | ICP备案序号:蜀ICP备12003782号-1  宜宾市公安局网监支队备案号5115000202009</p>
	</div>
	</body>
<script type="text/javascript" src="js/index.js"></script>
<!--[if IE 6]>
	<script src="js/DD_belatedPNG_0.0.8a.js"></script>
	<script>
	DD_belatedPNG.fix('*');
	</script>
<![endif]-->
</html>