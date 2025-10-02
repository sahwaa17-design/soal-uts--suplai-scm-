<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg border-0 rounded-3">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="mb-1"><strong>Id Order:</strong> <?= esc($order['id_order']); ?></p>
                            <p class="mb-1"><strong>Pelanggan:</strong> <?= esc($order['pelanggan']); ?></p>
                            <p class="mb-1"><strong>Date:</strong> <?= esc($order['date']); ?></p>
                            <p class="mb-3"><strong>Approved Status:</strong> <?= esc($order['approved']); ?></p>
                            <p class="mb-3"><strong>Order Status:</strong> <?= esc($order['order_status']); ?></p>

                            <a href="/order/ubah/<?= $order['id_order']; ?>" class="btn btn-warning">Ubah</a>

                            <form action="/order/hapus/<?= $order['id_order']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data Ini?')">Hapus</button>
                            </form>

                            <div class="mt-3">
                                <a href="/order" class="text-decoration-none"> Kembali ke Tampilan Sebelumnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

