<!DOCTYPE html>
<?php session_start(); include("conn.php");?>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="css/amazeui.min.css">
		<link rel="stylesheet" href="css/admin.css">
		<link rel="stylesheet" href="css/app.css">
	</head>

	<body style="overflow:auto;">
		<div class="am-cf admin-main">
			<!-- content start -->
			<div class="admin-content">
				<div class="admin-content-body">
					<div class="am-cf am-padding am-padding-bottom-0">
						<div class="am-fl am-cf">
							<strong class="am-text-primary am-text-lg"> </strong><small>
								<i class="icon-home"></i> &gt; 首页 &gt; 项目管理</small>
						</div>
					</div>
					<hr>
					<div class="container">
						<div class="am-g">
							<div class="am-u-sm-12 am-u-md-6">
								<div class="am-btn-toolbar">
									<div class="am-btn-group am-btn-group-xs">
										<button type="button" class="am-btn am-btn-default btnAdd">
											<span class="icon-plus"></span> 新增
										</button>

									<!--	<button type="button" class="am-btn am-btn-default" id="btnremove" onclick="delAll()">
											<span class="icon-trash"></span> 删除
										</button>
									-->
									</div>
								</div>
							</div>
							
					 
					<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
							<div class="" >
								<div class="" style="position: absolute;right: 110px;" >
									<input  id="项目名称" placeholder="请输入项目名称" type="text" name="项目名称" style="height: 21.4px">
							<input type="hidden" name="flag" value="1" />
							<input name="submit" type="submit" value="搜索" style="margin-left: -5px;" />
								</div>
							</div>
					</form>
					<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
							<div class="" >
								<div class="" style="position: absolute;right:30px;" >
									<input  id="项目名称" placeholder="请输入项目名称" type="hidden" name="项目名称" >
							<input type="hidden" name="flag" value="1" /><input name="submit" type="submit" value="显示全部" style="margin-left: -5px;" />
								</div>
							</div>
					</form>		
						
				<div class="am-g" style="margin-top: -30px;">
							<div class="am-u-sm-12">
								<form class="am-form" action="user/delAll.action">
									<table class="am-table am-table-striped am-table-hover table-main">
										<thead>
											<tr>
												<th class="table-check">
													<input id="chkAll" type="checkbox">
												</th>
												<th class="table-id" style="width: 80px;">
													ID
												</th>
												<th class="" style="width: 100px">
													项目名称
												</th>
												<th class="" style="width: 100px">
													经费预算
												</th>
												<th style="width: 150px">
													进度
												</th >
												<th style="width: 150px">
													截止日期
												</th>
												<th class="table-set">
													操作
												</th>
											</tr>
										</thead>
						
  <?php 
  if(isset($_POST["flag"]))
   { 
  	  $sqlstr = "select * from 项目 where 项目名称 Like'%".$_POST['项目名称']."%'";
      $result = mysqli_query($conn,$sqlstr);
		while ($rows = mysqli_fetch_row($result)){
				echo "<tr>";
				echo "<td><input name='chks' value='27' type='checkbox'></td>";
				for($i = 0; $i < count($rows); $i++){
					echo "<td height='25' align='left'>".$rows[$i]."</td>";
							}
					echo "<td>
						 <div class='am-btn-toolbar'>
						 <div class='am-btn-group am-btn-group-xs'><button type='button' id='depart_26' class='am-btn am-btn-default am-btn-xs am-text-secondary btnedit'><span class='am-icon-pencil-square-o'></span> 编辑</button><button type='button' class='am-btn am-btn-default am-btn-xs am-text-danger amt-hide-sm-only' onclick='''><span class='am-icon-trash-o'></span> <a href = 'deleteProject.php?id= ".$rows[0]." ' >删除</a></button></div>
						</div>
						</td>";
					echo "</tr>";
			}    
		} 
?>
	
					</table>

								</form>
							</div>
						</div>
					</div>

				</div>
				<!-- content end -->
			</div>
		</div>
	</div>

		<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

		<!--[if (gte IE 9)|!(IE)]><!-->
		<script src="js/jquery-1.11.3.min.js"></script>
		<!--<![endif]-->
		<script type="text/javascript" src="myplugs/js/plugs.js"></script>
		<script>
			$(function() {
				$(".btnedit").click(function() {
					$.jq_Panel({
						title: "修改项目",
						iframeWidth: 500,
						iframeHeight: 350,
						url: "alterProject.html"
					});
				});
				$(".btnAdd").click(function() {

					$.jq_Panel({
						title: "添加项目",
						iframeWidth: 500,
						iframeHeight: 300,
						url: "addProject.html"
					});
				});
			});
		</script>
	</body>

</html>