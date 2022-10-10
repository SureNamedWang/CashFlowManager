<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Lab Order Status</h4>
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
            <!-- END OF ERROR MESSAGE -->
            <!-- FORM SEND SMS -->
            <div class="row">
                <div class="card col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card-body">
                        <div class="card-title mb-3">FORM KIRIM SMS</div>
                        <form class="row" method="POST" action="<?php echo base_url();?>SMS/send">
                            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <label for="nomor">Nomor Tujuan</label>
                                <input type="number" class="form-control" id="nomor" name="nomor" placeholder="0812345678910" min="0" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label for="pesan">Pesan</label>
                                <textarea class="form-control" id="pesan" name="pesan" rows="3" required></textarea>
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <input type="submit" class="btn btn-primary" value="SEND SMS">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END FORM SEND SMS -->
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