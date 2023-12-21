<main role="main" class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <div class="col-md-10 mx-auto" style="margin-top: 30px;">
            <div style="padding: 10px;">
                <button type="button" id="btnOpenForm" class="btn btn-primary">
                    <a href="<?= base_url('user/create') ?>"><i class="fa fa-plus" style="color:aliceblue"> Tambah</i></a>
                </button>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    User
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="overflow: auto;">
                        <table id="table_id" class="table card-table table-vcenter text-nowrap datatable" style="width: 800px;">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                foreach ($content as $row) :  $no++; ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td>
                                            <p><img src="<?= $row->image ? base_url("/assets/img/$row->image") : base_url("/assets/img/user-default.png") ?>" alt="" height="50">
                                                <?= $row->name ?>
                                            </p>
                                        </td>
                                        <td><?= $row->email ?></td>
                                        <td><?= $row->role ?></td>
                                        <td><?= $row->is_active ? 'Aktif' : 'Tidak Aktif' ?></td>
                                        <td>
                                            <div class="row g-2 align-items-center">
                                                <div class="col-6 col-sm-4 col-md-2 col-xl-auto mb-1">
                                                    <?= form_open_multipart("user/delete/$row->id", ['method' => 'POST']) ?>
                                                    <?= form_hidden('id', $row->id) ?>
                                                    <a href="<?= base_url("user/edit/$row->id") ?>" class="btn w-10 btn-icon btn-outline-success btn-edit-store" data-toggle="tooltip" data-placement="top" title="Edit Data">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                            <path d="M16 5l3 3"></path>
                                                        </svg>
                                                    </a>
                                                    <button type="submit" onclick="return confirm('Apakah yakin ingin menghapus?')" class="btn w-10 btn-icon btn-outline-danger btn-delete-store" aria-label="DeleteData" data-bs-toggle="modal" data-toggle="tooltip" data-placement="top" title="Delete Data">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <line x1="4" y1="7" x2="20" y2="7"></line>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                        </svg>
                                                    </button>
                                                    <?= form_close() ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>