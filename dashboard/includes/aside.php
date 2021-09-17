
 
 <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown m-t-20">
                                <div class="user-pic"><img src="assets/images/users/1.jpg" alt="users"
                                        class="rounded-circle" width="40" /></div>
                                <div class="user-content hide-menu m-l-10">
                                    <a href="javascript:void(0)" class="" id="Userdd" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="m-b-0 user-name font-medium"><?php if(isset($_SESSION['sessionUsername'])){
                                                echo $_SESSION['sessionUsername'];
                                                
                                            }?> <i
                                                class="fa fa-angle-down"></i></h5>
                                        <span class="op-5 user-email"><?php echo $name;?> </span><br>
                                        <span class="op-5 user-email"><?php echo $address;?> </span>
                                    </a>
                                    
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        <li class="p-15 m-t-10"><a href="pharmacy_stock.php"
                                class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i
                                    class="fa fa-plus-square"></i> <span class="hide-menu m-l-5">Top up Pharmacy<span> </a>
                        </li>
                        <!-- User Profile-->
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="index.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                     
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="pharmacy_stock.php" aria-expanded="false"><i
                                    class="mdi mdi-clipboard-text"></i><span class="hide-menu">Phamacy Stock</span></a></li>
									<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="receiving.php" aria-expanded="false"><i
                                    class="mdi mdi-home"></i><span class="hide-menu">Store</span></a></li>
                       
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="medicine_list.php" aria-expanded="false"><i class="mdi mdi-clipboard-text"></i><span
                                    class="hide-menu">Medicine List</span></a></li>
									
									<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="items_list.php" aria-expanded="false"><i class="mdi mdi-clipboard-text "></i><span
                                    class="hide-menu">Items List</span></a></li>
									
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-red sidebar-link "
                                href="sales_report.php" aria-expanded="false"><i class="mdi mdi-cash"></i><span
                                    class="hide-menu">Sales</span></a></li>

						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-red sidebar-link "
                                href="suppliers.php" aria-expanded="false"><i class="mdi mdi-account"></i><span
                                    class="hide-menu">Suppliers</span></a></li>

						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-red sidebar-link "
                                href="invoice.php" aria-expanded="false"><i class="mdi mdi-cash"></i><span
                                    class="hide-menu">Invoices</span></a></li>

						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-red sidebar-link "
                                href="expired.php" aria-expanded="false"><i class="mdi mdi-alert-octagram"></i><span
                                    class="hide-menu">Expired</span></a></li>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-red sidebar-link "
                                href="expensis.php" aria-expanded="false"><i class="mdi mdi-alert-octagram"></i><span
                                    class="hide-menu">Expensis</span></a></li>
                                    <li class="text-center p-40 upgrade-btn">
                  <a href="includes/logout.php"
                      class="btn btn-block btn-danger text-white" >Logout</a>
              </li>
                       
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>