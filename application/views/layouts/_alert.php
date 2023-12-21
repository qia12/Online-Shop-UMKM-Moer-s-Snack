<?php
$success    = $this->session->flashdata('success');
$error        = $this->session->flashdata('error');
$warning    = $this->session->flashdata('warning');

if ($success) {
    $timer = 3000;
    $status = 'success';
    $message        = $success;
}

if ($error) {
    $timer = 6000;
    $status = 'error';
    $message = $error;
}

if ($warning) {
    $timer    = 6000;
    $status            = 'warning';
    $message        = $warning;
}
?>

<?php if ($success || $error || $warning) : ?>
    <script>
        Swal.fire({
            toast: true,
            icon: '<?= $status ?>',
            title: '<?= $message ?>',
            // animation: false,
            position: 'top-right',
            showConfirmButton: false,
            timer: <?= $timer ?>,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    </script>
<?php endif ?>