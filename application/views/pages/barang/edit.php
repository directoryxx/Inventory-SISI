<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create User</h3>
            </div>
            <!-- form start -->
            <form role="form" method="post" action="<?= base_url('barang/update/' . $data->id); ?>" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label>Kode</label>
                        <input disabled value="<?= $data->id; ?>" name="kode" placeholder="kode" class="form-control" type="text">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input value="<?= $data->name; ?>" name="name" placeholder="nama" class="form-control" type="text">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label>Brand</label>
                        <select class="custom-select mr-sm-2" name="brand" id="inlineFormCustomSelect">
                            <option selected value="<?= $data->name; ?>"><?= $data->brand; ?></option>
                            <?php if ($data->brand != "Krisbow") { ?>
                            <option value="Krisbow">Krisbow</option>
                            <?php } ?>
                            <?php if ($data->brand != "Honda") { ?>
                            <option value="Honda">Honda</option>
                            <?php } ?>
                            <?php if ($data->brand != "Caterpillar") { ?>
                            <option value="Caterpillar">Caterpillar</option>
                            <?php } ?>
                            <?php if ($data->brand != "Volvo") { ?>
                            <option value="Volvo">Volvo</option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="custom-select mr-sm-2" name="type" id="inlineFormCustomSelect">
                            <option selected value="<?= $data->type; ?>"><?= $data->type; ?></option>
                            <?php if ($data->type != "Alat Pertanian") { ?>
                            <option value="Alat Pertanian">Alat Pertanian</option>
                            <?php } ?>
                            <?php if ($data->type != "Alat Berat") { ?>
                            <option value="Alat Berat">Alat Berat</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Upload Image</label>
                        <input type="file" name="file" id="exampleInputFile">

                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Image</label>
                        <img src="<?= $data->image; ?>" alt="Smiley face" height="42" width="42">

                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>