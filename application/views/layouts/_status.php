<?php
if ($status == 'waiting') {
    $label_class    = 'label-primary';
    $status            = 'Menunggu Pembayaran';
}

if ($status == 'paid') {
    $label_class    = 'label-warning';
    $status            = 'Dibayar';
}

if ($status == 'delivered') {
    $label_class    = 'label-success';
    $status            = 'Dikirim';
}

if ($status == 'cancel') {
    $label_class    = 'label-danger';
    $status            = 'Dibatalkan';
}
if ($status == 'completed') {
    $label_class    = 'label-info';
    $status            = 'Selesai';
}
?>

<?php if ($status) : ?>
    <label class="label <?= $label_class ?>"><?= $status ?></label>
<?php endif ?>

<style>
    .label-info {
        background-color: #336B87;
        color: white;
    }
</style>