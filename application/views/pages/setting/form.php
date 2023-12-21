<main role="main" class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-3">
                <div class="card-header" style="padding: 10px;">
                    <span>Setting Lokasi Toko</span>
                </div>
                <div class="card-body">
                    <div class="form-group" style="padding: 10px;">
                        <label for="">Provinsi</label>
                        <select class="form-select" name="provinsi" aria-label="Default select example">
                        </select>
                    </div>
                    <div class="form-group" style="padding: 10px;">
                        <label for="">Kota</label>
                        <select class="form-select" name="kota" aria-label="Default select example">
                        </select>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header" style="padding: 10px;">
                    <span>Setting Data Toko</span>
                </div>

                <div class="card-body">
                    <?= form_open($form_action, ['method' => 'POST']) ?>
                    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                    <div class="form-group" style="padding: 10px;">
                        <label for="">Nama Toko</label>
                        <?= form_input('name', $input->name, ['class' => 'form-control', 'id' => 'name', 'required' => true, 'autofocus' => true],) ?>
                        <?= form_error('name') ?>
                    </div>
                    <div class="form-group" style="padding: 10px;">
                        <label for="">Nama Admin Toko</label>
                        <?= form_dropdown('id_user', getDropdownList('user', ['id', 'name']), $input->id_user, ['class' => 'form-control']) ?>
                        <?= form_error('id_user') ?>
                    </div>
                    <div class="form-group" style="padding: 10px;display:none;">
                        <label for="">Lokasi</label>
                        <?= form_input('location', $input->location, ['class' => 'form-control', 'id' => 'location', 'required' => true]) ?>
                        <?= form_error('location') ?>
                    </div>
                    <div class="form-group" style="padding: 10px;">
                        <label for="">Alamat Toko</label>
                        <?= form_input('address', $input->address, ['class' => 'form-control', 'id' => 'address', 'required' => true]) ?>
                        <?= form_error('address') ?>
                    </div>
                    <div class="form-group" style="padding: 10px;">
                        <label for="">No. Telp Toko</label>
                        <?= form_input('phone', $input->phone, ['class' => 'form-control', 'id' => 'phone', 'required' => true]) ?>
                        <?= form_error('phone') ?>
                    </div>
                    <div class="button" style="padding: 10px;">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(document).ready(function() {
        // Select provinsi
        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/provinsi') ?>",
            success: function(hasil_provinsi) {
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });

        // Select kota
        $("select[name=provinsi]").on("change", function() {
            var id_provinsi_terpilih = $(this).val();

            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/kota') ?>",
                data: {
                    id_provinsi: id_provinsi_terpilih
                },
                success: function(hasil_kota) {
                    $("select[name=kota]").html(hasil_kota);

                    // untuk men-triggre select lokasi
                    $("select[name=kota]").trigger("change");
                }
            });
        });

        // Select location (after kota is updated)
        $("select[name=kota]").on("change", function() {
            // Get selected kota
            var kota_terpilih = $(this).val();

            // mengganti location select dengan kota yang dipilih
            $("#location").val(kota_terpilih);
        });

    });
</script>