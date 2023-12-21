<div class="container" style="margin-top: 30px;;">
    <form>
        <h2>Contact Us</h2>
        <div class="row">
            <label for="">Provinsi</label>
            <select class="form-select" name="provinsi" aria-label="Default select example">
            </select>
        </div>

        <div class="row">
            <label for="">Kota</label>
            <select class="form-select" name="kota" aria-label="Default select example">
            </select>
        </div>

        <div class="row">
            <label for="">Ongkir</label>
            <select class="form-select" name="ongkir" aria-label="Default select example">
            </select>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 50px;;">Submit</button>
    </form>
</div>
<script>
    $(document).ready(function() {
        //select provinsi
        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/provinsi') ?>",
            success: function(hasil_provinsi) {
                // console.log(hasil_provinsi);
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });

        //select kota
        $("select[name=provinsi]").on("change", function() {
            var id_provinsi_terpilih = $(this).find("option:selected").data("id_provinsi");
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/kota') ?>",
                data: {
                    id_provinsi: id_provinsi_terpilih
                },
                success: function(hasil_kota) {
                    // $("select[name=kota]").html(hasil_kota);
                    console.log(hasil_kota)
                    console.log(id_provinsi_terpilih);
                }
            });
        });

    });
</script>