<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Cashflows</h4>
            </div>
        </div>

        <!-- LIST CATEGORY DATATABLE -->
            <div class="row">
                <div class="card col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card-body">
                        <table class="display table table-striped" id="cashflow-datatables">
                            <thead>
                                <th>Tanggal</th>
                                <th>Tipe</th>
                                <th>Category</th>
                                <th>Nominal</th>
                                <th>Status Approve</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php foreach($cashflows as $cashflow){
                                ?>
                                    <tr>
                                        <td><?php echo date('d F Y',strtotime($cashflow->created_date)); ?></td>
                                        <td><?php echo $cashflow->tipe; ?></td>
                                        <td><?php echo $cashflow->category_name; ?></td>
                                        <td><?php echo $cashflow->nominal; ?></td>
                                        <td>
                                            <?php if($cashflow->is_approved==1){ ?>
                                                <button class="btn btn-success btn-round" disabled>APPROVED</button>
                                            <?php }?>
                                            <?php if($cashflow->is_approved==0){ ?>
                                                <form method="post" action="<?php echo base_url();?>Cashflow/approve">
                                                    <input type="hidden" name="id" value="<?php echo $cashflow->cashflow_id; ?>">
                                                    <input type="submit" class="btn btn-success btn-round" value="APPROVE"></button>
                                                </form>
                                            <?php }?>
                                        </td>
                                        <td>
                                            <form method="post" action="<?php echo base_url()?>Cashflow/delete">
                                                <input type="hidden" name="id" value="<?php echo $cashflow->cashflow_id; ?>"> 
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

        <!-- Modal -->
        <div class="modal fade" id="modalLoading" tabindex="-1" role="dialog" aria-labelledby="modalLoading" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content is-loading is-loading-lg">
                    
                </div>
            </div>
        </div>
    </div>
</div>