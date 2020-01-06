<?@session_start();?>
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
   
    <!-- Top Bar -->
    <nav class="navbar" style="background-color: #303030;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="http://ccit.cafe24.com/CTSMS/index.php">CTSMS</a>
            </div>

        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar" style="background: rgba(0, 0, 0, 0.61);">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="http://ccit.cafe24.com/CTSMS/images/user.png" width="48" height="48" alt="User" />
                </div>
				<div class="btn-group user-helper-dropdown" style="float: right; box-shadow:none; color:white;">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
						<?php

              
			$se_test=$_SESSION['login_state'];
      
			 if($se_test=="true") {
				 ?>      
				         
		
                        <ul class="dropdown-menu pull-right" style="border-radius: .28571429rem;">
                            <li><a href="http://ccit.cafe24.com/CTSMS/sign_in_destroy.php" class=" waves-effect waves-block"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>

						<?}else{ ?>

						 <script>
						 alert("로그인 후 이용해 주세요.");
                         window.location.replace('http://ccit.cafe24.com/CTSMS/sign_in.php');
						 </script>
			 <?
			}
			?>
                    </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$_SESSION["name"]?></div>
                    <div class="email"><?=$_SESSION["id"]?></div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header" style="color:white;">MAIN MENU</li>
                    <li class="active">
                        <a href="http://ccit.cafe24.com/CTSMS/index.php">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons" style="color:white;">assignment</i>
                            <span style="color:white;">매출관리</span>
                        </a>
                        <ul class="ml-menu" >
                            <li>
                                <a href="http://ccit.cafe24.com/CTSMS/information/sale.php" style="color:white;">매출 등록</a>
                            </li>
                            <li>
                                <a href="http://ccit.cafe24.com/CTSMS/information/sale_collection.php" style="color:white;">수금 등록</a>
                            </li>
                            <li>
                                <a href="http://ccit.cafe24.com/CTSMS/information/sale_list.php" style="color:white;">매출 현황</a>
                            </li>
                        </ul>
                    </li>
					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons" style="color:white;">assignment</i>
                            <span style="color:white;">매입관리</span>
                        </a>
                        <ul class="ml-menu" >
                            <li>
                                <a href="http://ccit.cafe24.com/CTSMS/information/purchase.php" style="color:white;">매입 등록</a>
                            </li>
                            <li>
                                <a href="http://ccit.cafe24.com/CTSMS/information/purchase_pay.php" style="color:white;">지급 등록</a>
                            </li>
                            <li>
                                <a href="http://ccit.cafe24.com/CTSMS/information/purchase_list.php" style="color:white;">매입 현황</a>
                            </li>
                        </ul>
                    </li>
					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons" style="color:white;">assignment</i>
                            <span style="color:white;">출납 관리</span>
                        </a>
                        <ul class="ml-menu" >
                            <li>
                                <a href="http://ccit.cafe24.com/CTSMS/spendDeposit/spend.php" style="color:white;">지출 등록</a>
                            </li>
                            <li>
                                <a href="http://ccit.cafe24.com/CTSMS/spendDeposit/deposit.php" style="color:white;">입금 등록</a>
                            </li>
                            <li>
                                <a href="http://ccit.cafe24.com/CTSMS/spendDeposit/spendDeposit_list.php" style="color:white;">출납 조회</a>
                            </li>
                        </ul>
                    </li> 
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons" style="color:white;">view_list</i>
                            <span style="color:white;">기초정보</span>
                        </a>
                        <ul class="ml-menu" >
                            <li>
                                <a href="http://ccit.cafe24.com/CTSMS/information/company.php" style="color:white;">거래처 관리</a>
                            </li>
							<li>
                                <a href="http://ccit.cafe24.com/CTSMS/information/account.php" style="color:white;">계좌 관리</a>
                            </li>
                            <li>
                                <a href="http://ccit.cafe24.com/CTSMS/information/stock.php" style="color:white;">원재료 관리</a>
                            </li>
                            <li>
                                <a href="http://ccit.cafe24.com/CTSMS/information/finished_product.php" style="color:white;">완제품 관리</a>
                            </li>
                        </ul>
                    </li>                    
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons" style="color:white;">content_copy</i>
                            <span style="color:white;">생산관리</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="http://ccit.cafe24.com/CTSMS/create/finished_product_bom.php" style="color:white;">완제품 BOM 관리</a>
                            </li>
                        </ul>
                    </li>
					<li>
                        <a href="#" class="menu-toggle">
                            <i class="material-icons" style="color:white;">assignment</i>
                            <span style="color:white;">자재관리</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="http://ccit.cafe24.com/CTSMS/productinput/warehousing.php" style="color:white;">입고 입력</a>
                            </li>
                            <li>
                                <a href="http://ccit.cafe24.com/CTSMS/productinput/release.php" style="color:white;">출고 입력</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal" style="    background-color: rgba(0, 0, 0, 0.4);">
                <div class="copyright" style="color:white;">
                    &copy; 2017 <a href="javascript:void(0);">TSMS - CCIT</a>.
                </div>
                <div class="version" style="color:white;">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        
    </section>

    

   