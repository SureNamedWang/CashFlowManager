<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Cashflow Dashboard</h4>
            </div>
            
            <!-- ERROR MESSAGE -->
            <?php if(isset($_SESSION['message'])){ ?>
            <div class="card card-success row">
                <div class="card-body" >
                    MESSAGE: <?php echo $_SESSION['message']; ?>
                </div>
            </div>
            <?php } ?>

            <?php if(isset($_SESSION['error'])){ ?>
            <div class="card card-danger row">
                <div class="card-body" >
                    ERROR MESSAGE: <?php echo $_SESSION['error']; ?>
                </div>
            </div>
            <?php } ?>
            <!-- ERROR MESSAGE END -->

            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            TAMBAH TRANSAKSI BARU
            </a>
            <div class="collapse" id="collapseExample">
                <!-- FORM ADD CATEGORY -->
                <div class="row">
                    <div class="card col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card-body">
                            <div class="card-title mb-3">FORM PENCATATAN CASH FLOW</div>
                            <form class="row" method="POST" action="<?php echo base_url();?>Cashflow/add">
                                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <label for="tipe">Tipe</label>
                                    <select class="form-control" id="tipe" name="tipe">
                                        <option value="in" selected>Pemasukan</option>
                                        <option value="out">Pengeluaran</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6" id="div_cat_in">
                                    <label for="category_in">Category</label>
                                    <select class="form-control" id="category_in" name="category_in">
                                        <?php foreach($category_in as $category){ ?>
                                            <option value="<?php echo $category->category_id; ?>">
                                                <?php echo $category->nama; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6" id="div_cat_out">
                                    <label for="category_out">Category</label>
                                    <select class="form-control" id="category_out" name="category_out">
                                        <?php foreach($category_out as $category){ ?>
                                            <option value="<?php echo $category->category_id; ?>">
                                                <?php echo $category->nama; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <label>Nominal</label>
                                    <input type="number" min=0 class="form-control" name="nominal" id="nominal" required>
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <label>Keterangan</label>
                                    <input class="form-control" type="text" name="keterangan" id="keterangan">
                                </div>
                                
                                <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-3">
                                    <input type="submit" class="btn btn-primary btn-block" value="SAVE">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END FORM ADD CATEGORY -->
            </div>

            <!-- DASHBOARD INFO -->
            <div class="row mt-3">
                <div class="card col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card-body">
                        <form class="row" method="GET" action="<?php base_url() ?>Home/">
                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label>From</label>
                                <input class="form-control" type="date" name="from" value="<?php echo $start_date;?>">
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label>To</label>
                                <input class="form-control" type="date" name="to" value="<?php echo $end_date;?>">
                            </div>
                        </form>
                        <div class="row text-white text-center">
                            <div class="card bg-primary-gradient col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-body">
                                    <div class="card-title text-white">Saldo</div>
                                    <h3><?php echo $saldo; ?></h3>
                                </div>
                            </div>
                            <div class="card bg-success-gradient col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="card-body">
                                    <div class="card-title text-white">Pemasukan</div>
                                    <h3><?php echo $pemasukan; ?></h3>
                                </div>
                            </div>
                            <div class="card bg-danger-gradient col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="card-body">
                                    <div class="card-title text-white">Pengeluaran</div>
                                    <h3><?php echo $pengeluaran; ?></h3>
                                </div>
                            </div>
                            <div class="card bg-warning-gradient col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="card-body">
                                    <div class="card-title text-white">Pemasukan Pending</div>
                                    <h3><?php echo $pemasukan_pending; ?></h3>
                                </div>
                            </div>
                            <div class="card bg-warning-gradient col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="card-body">
                                    <div class="card-title text-white">Pengeluaran Pending</div>
                                    <h3><?php echo $pengeluaran_pending; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END DASHBOARD INFO -->
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modalLoading" tabindex="-1" role="dialog" aria-labelledby="modalLoading" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content is-loading is-loading-lg">
                    
                </div>
            </div>
        </div>
    </div>
</div>