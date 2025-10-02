<div class="container">
    <div class="col">
        <h3 class="mt-2">Form UbaH Data Orders</h3>
        <form action="/order/update/<?= $order['id_order']; ?>" method="post" class="mt-4" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="form-group row">
                <label for="inputPelanggan" class="col-sm-2 col-form-label">Pelanggan</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control <?= ($validation->hasError('pelanggan')) ? 'is-invalid' : ''; ?>" 
                           name="pelanggan" autofocus
                           value="<?= (old('pelanggan'))? old('pelanggan') : $order['pelanggan']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('judul'); ?>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" name="date" value="<?= (old('date'))? old('date') : $order['date']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputApproved" class="col-sm-2 col-form-label">Approved Status</label>
                <div class="col-sm-4">
                   <select class="form-control" name="approved" value="<?= (old('approved'))? old('approved'): $order['approved'];?>">
                        <option>Approved</option>
                        <option>Not Approved</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputOrderStatus" class="col-sm-2 col-form-label">Order Status</label>
                <div class="col-sm-4">
                <div class="col-sm-4">
                    <select name="order_status" class="form-control" value="<?= (old('order_status'))? old('order_status'): $order['order_status'];?>">
                        <option>Completed</option>
                        <option>Pending</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </form>