<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>Product</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Berat</th>
            <th>Subtotal</th>
            <th>Subtotal Berat</th>
            <th>Jasa Ekspedisi</th>
            <th>Jenis Pengiriman</th>
            <th>Estimasi</th>
            <th>Total Harga Produk</th>
            <th>Total Berat</th>
            <th>Ongkos Kirim</th>
            <th>Total</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $row->title ?></td>
            <td><?= $row->qty ?></td>
            <td>Rp<?= number_format($row->price, 0, ',', '.') ?>,-</td>
            <td><?= $row->weight ?> gr</td>
            <td>Rp<?= number_format($row->subtotal, 0, ',', '.') ?>,-</td>
            <td><?= number_format($row->weight_total) ?> gr</td>
            <td><?= strtoupper($order->expedisi) ?></td>
            <td><?= $order->package ?></td>
            <td><?= $order->estimate ?></td>
            <td>Rp<?= number_format($order->grand_total, 0, ',', '.') ?>,-</td>
            <td><?= number_format($order->final_weight, 0, ',', '.') ?> gr</td>
            <td>Rp<?= number_format($order->shipping_cost, 0, ',', '.') ?>,-</td>
            <td>Rp<?= number_format($order->total, 0, ',', '.') ?>,-</td>
            <td><?= $order->status ?></td>
        </tr>
    </tbody>
</table>