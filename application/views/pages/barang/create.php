<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create Barang</h3>
            </div>
            <!-- form start -->
            <form role="form" method="post" action="<?= base_url('barang/store'); ?>" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label>Kode</label>
                        <input name="kode" placeholder="kode" class="form-control" type="text">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="name" placeholder="nama" class="form-control" type="text">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label>Brand</label>
                        <select class="custom-select mr-sm-2" name="brand" id="inlineFormCustomSelect">
                            <option selected>Choose Brand...</option>
                            <option value="Krisbow">Krisbow</option>
                            <option value="Honda">Honda</option>
                            <option value="Caterpillar">Caterpillar</option>
                            <option value="Volvo">Volvo</option>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="custom-select mr-sm-2" name="type" id="inlineFormCustomSelect">
                            <option selected>Choose Brand...</option>
                            <option value="Alat Pertanian">Alat Pertanian</option>
                            <option value="Alat Berat">Alat Berat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Image</label>
                        <input type="file" name="file" id="exampleInputFile">

                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>