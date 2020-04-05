<!DOCTYPE html>
<html>
<?php
session_start();
header("Content-type:text/html;charset=utf-8");
include("conn.php");
?>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/amazeui.min.css">
		<link rel="stylesheet" href="css/admin.css">
		<link rel="stylesheet" href="css/app.css">
		
		 <style>
		 	.admin-main{
		 		padding-top: 0px;	
		 	}
		 </style>
	</head>
	<body>
		<body>
			<header class="am-topbar am-topbar-inverse admin-header">
				<div class="am-topbar-brand">
					<strong>企业人事</strong> <small>管理系统</small>
				</div>
				<button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}">
			<span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span>
		</button>
				<div class="am-collapse am-topbar-collapse" id="topbar-collapse">

					<ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
						<li>
							<a href="javascript:;"><span class="am-icon-envelope-o"></span> 收件箱 <span class="am-badge am-badge-warning">5</span> </a>
						</li>
						<li class="am-dropdown" data-am-dropdown="">
							<a class="am-dropdown-toggle" data-am-dropdown-toggle="" href="javascript:;"> <span class="am-icon-users"></span><?php echo "$_SESSION[username]";?><span class="am-icon-caret-down"></span>
							</a>
							<ul class="am-dropdown-content">
								<li onClick="updatePwd('修改密码',2)">
									<a href="javascript:void(0)"><span class="am-icon-cog"></span> 修改密码</a>
								</li>
								<li>
									<a href="home.html"><span class="am-icon-power-off"></span> 退出
									</a>
								</li>
							</ul>
						</li>
						<li class="am-hide-sm-only">
							<a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span>
								<span class="admin-fullText">开启全屏</span> </a>
						</li>
					</ul>
				</div>
			</header>

			<div class="am-cf admin-main">
				<!-- sidebar start -->
				<div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
					<div class="am-offcanvas-bar admin-offcanvas-bar">
						<ul class="am-list admin-sidebar-list">
							<li>
								<a href="admin-index.html"><span class="am-icon-home"> 首页</span>
									<li class="admin-parent">
										<a class="am-cf" ><span class="am-icon-file"></span> 人事管理<span class="am-icon-angle-right am-fr am-margin-right"></span> </a>
										<ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
											<li>
														<a  href="depart.php" target="right" class="am-cf"><span class="am-icon-check"></span> 部门管理
															<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span>
														</a>
													</li>
													<li>
														<a  href="user.php" target="right" class="am-cf"><span class="am-icon-check"></span> 职工管理
															<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span>
														</a>
													</li>
													
										</ul>
									</li>
							        <li class="admin-parent">
										<a class="am-cf" ><span class="am-icon-file"></span> 项目管理<span class="am-icon-angle-right am-fr am-margin-right"></span> </a>
										<ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
											<li>
														<a  href="part.php" target="right" class="am-cf"><span class="am-icon-check"></span> 甲方管理
															<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span>
														</a>
													</li>
													<li>
														<a  href="project.php" target="right" class="am-cf"><span class="am-icon-check"></span> 项目管理
															<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span>
														</a>
													</li>
													
										</ul>
									</li>
									</li>
																		<li class="admin-parent">
										<a class="am-cf" ><span class="am-icon-file"></span> 任务分配<span class="am-icon-angle-right am-fr am-margin-right"></span> </a>
										<ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
											<li>
														<a  href="Skill.php" target="right" class="am-cf"><span class="am-icon-check"></span> 职工技能
															<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span>
														</a>
													</li>
													<li>
														<a  href="allow.php" target="right" class="am-cf"><span class="am-icon-check"></span> 项目分配
															<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span>
														</a>
													</li>
													
										</ul>
									</li>
									<li class="admin-parent">
										<a class="am-cf" ><span class="am-icon-file"></span> 报告绩效管理<span class="am-icon-angle-right am-fr am-margin-right"></span> </a>
										<ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
											<li>
														<a  href="report.php" target="right" class="am-cf"><span class="am-icon-check"></span> 业绩报告
															<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span>
														</a>
													</li>
													<li>
														<a  href="performance.php" target="right" class="am-cf"><span class="am-icon-check"></span> 绩效信息
															<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span>
														</a>
													</li>	
										</ul>
									</li>
									<?php if ($_SESSION['priority']==1) { ?>
									<li class="admin-parent">
										<a class="am-cf" ><span class="am-icon-file"></span> 系统管理<span class="am-icon-angle-right am-fr am-margin-right"></span> </a>
										<ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
													<li>
														<a  href="role.php" target="right" class="am-cf"><span class="am-icon-check"></span> 用户管理
															<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span>
														</a>
													</li>
													
										</ul>
									</li>
									<?php } ?>
									<li onClick="updatePwd('修改密码',${)">
										<a href="javascript:void(0)" onClick="updatePwd('修改密码',5)"><span class="am-icon-sign-out"></span> 修改密码</a>
									</li>
									<li>
										<a href="home.html"><span class="am-icon-sign-out"></span> 注销</a>
									</li>
						</ul>

						<div class="am-panel am-panel-default admin-sidebar-panel">
							<div class="am-panel-bd">
								<p>
									<span class="am-icon-bookmark"></span> 公告
								</p>
								<p>时光静好，与君语；细水流年，与君同</p>
							</div>
						</div>

						
					</div>
				</div>
				<!-- sidebar end -->

				<!-- content start -->
				<div class="admin-content">
					<div class="admin-content-body">
						<iframe src="depart.php" width="100%" height="1100" name="right" style="border: none;"></iframe>
					</div>
				</div>


			</div>
			<!-- content end -->

			</div>

			<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

			<footer>
				<hr>
				<p class="am-padding-left">© 2018 AllMobilize, Inc. Licensed under MIT license.</p>
			</footer>

			<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

			<!--[if (gte IE 9)|!(IE)]><!-->
			<script src="js/jquery-1.11.3.min.js"></script>
			<!--<![endif]-->
			<script src="js/amazeui.min.js"></script>
			<script src="js/app.js"></script>
			<script type="text/javascript" src="myplugs/js/plugs.js"></script>
			<script type="text/javascript">
				//添加编辑弹出层
				function updatePwd(title, id) {
					$.jq_Panel({
						title: title,
						iframeWidth: 500,
						iframeHeight: 300,
						url: "updatePwd.html"
					});
				}
			</script>

</html>