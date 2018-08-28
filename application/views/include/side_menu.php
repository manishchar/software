<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel hide">
        <div class="pull-left image">
          <!-- <img src="<?=base_url('resources/dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image"> -->
          <p><?=$adminName?></p>
        </div>
        <div class="pull-left info">
          <p><?=$adminName?></p>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"><a href="<?=base_url('admin')?>"> Dashboard </a></li>
        
        <?php if($this->session->userdata('adminType')==1 ){ ?>
        <li class="treeview">
          <a>
            <i class="fa fa-edit"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="<?=base_url('admin/AddUserRegistationPage')?>"><i class="fa fa-circle-o"></i>Add User</a></li>
           <li class=""><a href="<?=base_url('admin/userList')?>"><i class="fa fa-circle-o"></i>User List</a></li>
          
           
            
          </ul>
        </li>

     

        <li class="treeview">
          <a>
            <i class="fa fa-edit"></i> <span>Branch</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class=""><a href="<?=base_url('admin/CreateBranchBySuperAdmin')?>"><i class="fa fa-edit"></i>Add Branch</a></li>
               <li class=""><a href="<?=base_url('admin/branchListForSuperAdmin')?>"><i class="fa fa-circle-o"></i>Branch List</a></li>     
                
                  
          </ul>
        </li>

        <li class="treeview">
          <a>
            <i class="fa fa-edit"></i> <span>Fields</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class=""><a href="<?=base_url('admin/addFieldsPage')?>"><i class="fa fa-edit"></i>Add Fields</a></li>
               <li class=""><a href="<?=base_url('admin/filedList')?>"><i class="fa fa-circle-o"></i>Fields List</a></li>     
                 <li class=""><a href="<?=base_url('admin/selectFields')?>"><i class="fa fa-circle-o"></i>Create Form</a></li>
                  
          </ul>
        </li>
<?php } ?>
 <?php if($this->session->userdata('adminType')==1 || $this->session->userdata('adminType')==3){ ?>
        <li class="treeview">
          <a>
            <i class="fa fa-edit"></i> <span>Fill Form</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class=""><a href="<?=base_url('admin/selectForm')?>"><i class="fa fa-edit"></i>Select Form</a></li>
              <li class=""><a href="<?=base_url('admin/formFieldList')?>"><i class="fa fa-edit"></i>Filled Form List</a></li>
          </ul>
        </li>
<?php } ?>
        </ul>

       

      


      
    </section>
    <!-- /.sidebar -->
  </aside>