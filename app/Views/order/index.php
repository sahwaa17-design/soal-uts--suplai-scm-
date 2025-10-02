<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Order</h1>

            <!-- form cari -->
            <form action="/Order/cari" method="post">
            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari Oreder" name="cari">
            <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
            </div>
            </form>

            <!-- Pesan masuk -->
             <?php if (session()->getFlashdata('pesan')):?>
             <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan');?>
             </div>
            <?php endif;?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Pelanggan</th>
                        <th scope="col">Date</th>
                        <th scope="col">Approved Status</th>
                        <th scope="col">Order Status</th>
                        <th scope="col">Details</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($order as $o):
                    ?>
                    <tr>
                        <td><?= $o['id_order'];?></td></th>
                        <td><?= $o['pelanggan'];?></td></th>
                        <td><?= $o['date'];?></td></th>
                        <td><?= $o['approved'];?></td></th>
                        <td><?= $o['order_status'];?></td></th>
                        <td><a href="/order/detail/<?= $o['id_order'];?>" class="btn btn-success">Details</a></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <?= $pager->links('order', 'page_order');?>

            <a href="/order/tambah" class="btn btn-primary">Tambah Data Buku</a>
</div>
</div>
</div>
