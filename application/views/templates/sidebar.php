<!-- Sidebar -->
<div class="sidebar">
<div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav">
                <li class="nav-item <?php if(isset($halaman)&&$halaman=='home'){ echo "active";} ?>">
                    <a href="<?php echo base_url();?>Home/">
                        <i class="fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item <?php if(isset($halaman)&&$halaman=='category'){ echo "active";} ?>">
                    <a href="<?php echo base_url();?>Category/">
                        <i class="fas fa-home"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li class="nav-item <?php if(isset($halaman)&&$halaman=='cashflow'){ echo "active";} ?>">
                    <a href="<?php echo base_url();?>Cashflow/">
                        <i class="fas fa-home"></i>
                        <p>Cashflows</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->