<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create User</h3>
            </div>
            <!-- form start -->
            <form role="form" method="post" action="<?= base_url('user/update/'.$data->id); ?>">
                <div class="box-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="name" value="<?= $data->name ?>" placeholder="nama" class="form-control" type="text">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" value="<?= $data->username ?>" placeholder="username" class="form-control" type="text">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="custom-select mr-sm-2" name="role_id" id="inlineFormCustomSelect">
                            
                            <?php $i = 1;
                            foreach ($role as $role_item) : ?>

                                <option value="<?php echo $role_item->id; ?>" <?= $role_item->id == $data->role_id ? 'selected' : '' ?>><?php echo $role_item->name; ?></option>

                            <?php $i++;
                            endforeach; ?>
                        </select>
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