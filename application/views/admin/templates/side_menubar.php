<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li id="dashboardMainMenu">
          <a href="<?php echo base_url('dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <?php if($user_permission): ?>
          <?php if(in_array('viewAdmin', $user_permission) || in_array('createAdmin', $user_permission) || in_array('updateAdmin', $user_permission)|| in_array('deleteAdmin', $user_permission)): ?>
            <li class="treeview" id="mainclientNav">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>Admin Users</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if(in_array('createAdmin', $user_permission)): ?>
              <li id="createClientNav"><a href="<?php echo base_url('users/create') ?>"><i class="fa fa-circle-o"></i> Add User</a></li>
              <?php endif; ?>

              <?php if(in_array('updateAdmin', $user_permission) || in_array('viewAdmin', $user_permission) || in_array('deleteAdmin', $user_permission)): ?>
              <li id="manageclientNav"><a href="<?php echo base_url('users') ?>"><i class="fa fa-circle-o"></i> Manage Users</a></li>
            <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>
            
          <?php if(in_array('createEmp', $user_permission) || in_array('updateEmp', $user_permission) || in_array('viewEmp', $user_permission) || in_array('deleteEmp', $user_permission)): ?>
            <li class="treeview" id="mainempNav">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>Employees (Del. Boys)</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if(in_array('createEmp', $user_permission)): ?>
              <li id="createempNav"><a href="<?php echo base_url('users/createEmp') ?>"><i class="fa fa-circle-o"></i> Add Employee</a></li>
              <?php endif; ?>

              <?php if(in_array('updateEmp', $user_permission) || in_array('viewEmp', $user_permission) || in_array('deleteEmp', $user_permission)): ?>
              <li id="manageempNav"><a href="<?php echo base_url('users/delUsers') ?>"><i class="fa fa-circle-o"></i> Manage Employees</a></li>
            <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>
          

          <?php  if(in_array('createGroup', $user_permission) || in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
            <li class="treeview" id="mainGroupNav">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Groups</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php if(in_array('createGroup', $user_permission)): ?>
                  <li id="addGroupNav"><a href="<?php echo base_url('groups/create') ?>"><i class="fa fa-circle-o"></i> Add Group</a></li>
                <?php endif; ?>
                <?php if(in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
                <li id="manageGroupNav"><a href="<?php echo base_url('groups') ?>"><i class="fa fa-circle-o"></i> Manage Groups</a></li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>


          <?php /*  if(in_array('createBrand', $user_permission) || in_array('updateBrand', $user_permission) || in_array('viewBrand', $user_permission) || in_array('deleteBrand', $user_permission)): ?>
            <li id="brandNav">
              <a href="<?php echo base_url('brands/') ?>">
                <i class="glyphicon glyphicon-tags"></i> <span>Category</span>
              </a>
            </li>
          <?php endif;  */?>

          

          <?php /* if(in_array('createStore', $user_permission) || in_array('updateStore', $user_permission) || in_array('viewStore', $user_permission) || in_array('deleteStore', $user_permission)): ?>
            <li id="storeNav">
              <a href="<?php echo base_url('stores/') ?>">
                <i class="fa fa-files-o"></i> <span>Stores</span>
              </a>
            </li>
          <?php endif; ?>

          <?php  if(in_array('createAttribute', $user_permission) || in_array('updateAttribute', $user_permission) || in_array('viewAttribute', $user_permission) || in_array('deleteAttribute', $user_permission)): ?>
          <li id="attributeNav">
            <a href="<?php echo base_url('attributes/') ?>">
              <i class="fa fa-files-o"></i> <span>Attributes</span>
            </a>
          </li>
          <?php endif; */ ?>

          <?php  if(in_array('ViewUnit', $user_permission) || in_array('viewCategory', $user_permission) || in_array('viewProduct', $user_permission) || in_array('viewStore', $user_permission) || in_array('createStock', $user_permission)): ?>
            <li class="treeview" id="mainProductNav">
              <a href="#">
                <i class="fa fa-cube"></i>
                <span> All Products Data</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php  if(in_array('createCategory', $user_permission) || in_array('updateCategory', $user_permission) || in_array('viewCategory', $user_permission) || in_array('deleteCategory', $user_permission)): ?>
                <li id="categoryNav">
                  <a href="<?php echo base_url('category/') ?>">
                    <i class="fa fa-files-o"></i> <span>Products Category</span>
                  </a>
                </li>
              <?php endif; ?>

              <?php  if(in_array('createUnit', $user_permission) || in_array('updateUnit', $user_permission) || in_array('viewUnit', $user_permission) || in_array('deleteUnit', $user_permission)): ?>
                <li id="unitNav">
                  <a href="<?php echo base_url('unit/') ?>">
                    <i class="fa fa-balance-scale"></i> <span>Products Units</span>
                  </a>
                </li>
              <?php endif; ?>
              <?php  if(in_array('createStore', $user_permission) || in_array('updateStore', $user_permission) || in_array('viewStore', $user_permission) || in_array('deleteStore', $user_permission)): ?>
              <li id="transactionhistory">
                  <a href="<?php echo base_url('transactionhistory/') ?>">
                    <i class="fa fa-shopping-basket"></i> <span>Products Tranaction History</span>
                  </a>
                </li>
               <?php endif; ?>
                <?php if(in_array('createProduct', $user_permission)): ?>
                  <li id="addProductNav"><a href="<?php echo base_url('products/create') ?>"><i class="fa fa-plus-circle"></i> Add Product</a></li>
                <?php endif; ?>
                <?php if(in_array('updateProduct', $user_permission) || in_array('viewProduct', $user_permission) || in_array('deleteProduct', $user_permission)): ?>
                <li id="manageProductNav"><a href="<?php echo base_url('products') ?>"><i class="fa fa-circle-o"></i> Manage Products</a></li>
                <?php endif; ?>
                
              </ul>
            </li>
          <?php endif; ?>

            


          <?php  if(in_array('createOrder', $user_permission) || in_array('updateOrder', $user_permission) || in_array('viewOrder', $user_permission) || in_array('deleteOrder', $user_permission)): ?>
            <!-- <li class="treeview" id="mainOrdersNav">
              <a href="#">
                <i class="fa fa-dollar"></i>
                <span>Orders</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu"> -->
                <!-- <?php if(in_array('createOrder', $user_permission)): ?>
                  <li id="addOrderNav"><a href="<?php echo base_url('orders/create') ?>"><i class="fa fa-circle-o"></i> Add Order</a></li>
                <?php endif; ?> -->
                <?php if(in_array('updateOrder', $user_permission) || in_array('viewOrder', $user_permission) || in_array('deleteOrder', $user_permission)): ?>
                <li id="manageOrdersNav"><a href="<?php echo base_url('orders') ?>"><i class="fa fa-dollar"></i>Orders</a></li>
                <?php endif; ?>
              <!-- </ul> -->
            <!-- </li> -->
          <?php endif; ?>
          
          <?php  if(in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission) ): ?>
            <li id="mainUserNav">
              <a href="<?php echo base_url('users/regUsers') ?>">
                <i class="fa fa-users"></i> <span>Clients</span>
              </a>
            </li>
          <?php endif; ?>

          <!-- <?php  if(in_array('viewReports', $user_permission)): ?>
            <li id="reportNav">
              <a href="<?php echo base_url('reports/') ?>">
                <i class="glyphicon glyphicon-stats"></i> <span>Reports</span>
              </a>
            </li>
          <?php endif; ?> -->

          <li id="serviceareas">
              <a href="<?php echo base_url('serviceareas') ?>">
                <i class="glyphicon glyphicon-map-marker"></i> <span>Service Areas</span>
              </a>
            </li>


          <?php if(in_array('updateCompany', $user_permission)): ?>
            <li id="companyNav"><a href="<?php echo base_url('company/') ?>"><i class="fa fa-files-o"></i> <span>Master</span></a></li>
          <?php endif;  ?>

          <?php  if(in_array('viewAbout', $user_permission) ||in_array('updateAbout', $user_permission) || in_array('createAbout', $user_permission) || in_array('deleteAbout', $user_permission) ): ?>
            <li id="aboutNav">
              <a href="<?php echo base_url('Company/about') ?>">
                <i class="fa fa-info-circle" area-hidden="true"></i> <span>About Us</span>
              </a>
            </li>
            <?php endif;  ?>
            <?php  if(in_array('viewBanner', $user_permission) ||in_array('updateBanner', $user_permission) || in_array('createBanner', $user_permission) || in_array('deleteBanner', $user_permission) ): ?>
            <li id="bannerNav">
              <a href="<?php echo base_url('Company/banner') ?>">
                <i class="fa fa-info-circle" area-hidden="true"></i> <span>Banners</span>
              </a>
            </li>
          <?php endif;  ?>
            <?php  if(in_array('viewTerms', $user_permission) ||in_array('updateTerms', $user_permission) || in_array('createTerms', $user_permission) || in_array('deleteTerms', $user_permission) ): ?>
            <li id="termsNav">
              <a href="<?php echo base_url('Company/terms') ?>">
                <i class="fa fa-info-circle" area-hidden="true"></i> <span>Terms & Conditions</span>
              </a>
            </li>
          <?php endif;  ?>
        <!-- <li class="header">Settings</li> -->

        <?php if(in_array('viewProfile', $user_permission)): ?>
          <li><a href="<?php echo base_url('users/profile/') ?>"><i class="fa fa-user-o"></i> <span>Profile</span></a></li>
        <?php endif; ?>
        <?php /* if(in_array('updateSetting', $user_permission)): ?>
          <li><a href="<?php echo base_url('users/setting/') ?>"><i class="fa fa-wrench"></i> <span>Setting</span></a></li>
        <?php endif; */ ?>
        <?php if(in_array('viewContact', $user_permission) || in_array('deleteContact', $user_permission)): ?>
        <li id="mainContactNav">
          <a href="<?php echo base_url('users/ContactUser') ?>">
            <i class="fa fa-users"></i> <span>End-User Contacts</span>
          </a>
        </li>
        <?php endif; ?>

        <?php endif; ?>
        <!-- user permission info -->
        <li><a href="<?php echo base_url('auth/logout') ?>"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>