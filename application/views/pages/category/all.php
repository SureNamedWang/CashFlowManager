<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Category</h4>
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

            <!-- FORM ADD CATEGORY -->
            <div class="row">
                <div class="card col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card-body">
                        <div class="card-title mb-3">FORM ADD CATEGORY</div>
                        <form class="row" method="POST" action="<?php echo base_url();?>Category/add">
                            <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <label for="nama">Nama Category</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Category" required>
                            </div>
                            <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <label for="tipe">Tipe</label>
                                <select class="form-control" id="tipe" name="tipe">
                                    <option value="in" selected>Pemasukan</option>
                                    <option value="out">Pengeluaran</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <input type="submit" class="btn btn-primary btn-block" value="SAVE">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END FORM ADD CATEGORY -->

            <!-- LIST CATEGORY DATATABLE -->
            <div class="row">
                <div class="card col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card-body">
                        <table class="display table table-striped" id="categories-datatables">
                            <thead>
                                <th>Nama</th>
                                <th>Tipe</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php foreach($categories as $category){
                                ?>
                                    <tr>
                                        <td><?php echo $category->nama; ?></td>
                                        <td><?php echo $category->tipe; ?></td>
                                        <td>
                                            <form method="post" action="<?php echo base_url()?>Category/delete">
                                                <input type="hidden" name="id" value="<?php echo $category->category_id; ?>"> 
                                                <input type="submit" class="btn btn-danger btn-round" value="DELETE">
                                            </form>
                                            
                                        </td>
                                    </tr>
                                <?php
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END LIST CATEGORY DATATABLE -->
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