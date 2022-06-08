function list_buku_index() {
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'manajemen_buku/data_buku_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Jenis Buku",
                data: 'jenis_buku'
            },
            {
                title: "Kode Buku",
                data: 'kode_buku'
            },
            {
                title: "Judul",
                data: 'judul_buku'
            },
            {
                title: "Pengarang",
                data: 'pengarang'
            },
            {
                title: "Penerbit",
                data: 'penerbit'
            },
            {
                title: "Tahun Terbit",
                data: 'tahun_terbit'
            },
            {
                title: "Halaman",
                data: 'jumlah_halaman'
            },
            {
                title: "Tersedia",
                data: 'qt'
            },
            {
                title: "Action",
                data: 'id_buku'
            }
        ],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id_buku']) {
                var id = data['id_buku'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'manajemen_buku/edit/data_buku/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'manajemen_buku/delete/data_buku/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function klasifikasi_buku_index() {
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'manajemen_buku/jenis_buku_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Jenis Buku",
                data: 'jenis_buku'
            },
            {
                title: "Action",
                data: 'id_jenis_buku'
            }
        ],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id_jenis_buku']) {
                var id = data['id_jenis_buku'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'manajemen_buku/edit/jenis_buku' + id + '\';" class="btn btn-warning btn-icons btn-rounded" title="Print surat"><i class="mdi mdi-pencil-box-outline"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'manajemen_buku/delete/jenis_buku/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function data_siswa_index() {
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'data_siswa/data_siswa_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Nama Siswa",
                data: 'nama_siswa'
            },
            {
                title: "Nomor Induk Siswa",
                data: 'nis'
            },
            {
                title: "Kelas",
                data: 'kelas'
            },
            {
                title: "Jurusan",
                data: 'jurusan'
            },
            {
                title: "Action",
                data: 'id_siswa'
            }
        ],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id_siswa']) {
                var id = data['id_siswa'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_siswa/edit/' + id + '\';" class="btn btn-warning btn-icons btn-rounded "><i class="mdi mdi-pencil-box-outline"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_siswa/delete/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function peminjaman_index() {
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'peminjaman/data_peminjaman_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Nama Peminjam",
                data: 'nama_siswa'
            },
            {
                title: "Kelas",
                data: 'kelas'
            },
            {
                title: "Jurusan",
                data: 'jurusan'
            },
            {
                title: "Judul Buku",
                data: 'judul_buku'
            },
            {
                title: "Tanggal Pinjam",
                data: 'tgl_pinjam'
            },
            {
                title: "Lama Pinjam",
                data: 'lama_pinjam'
            },
            {
                title: "Action",
                data: 'id_transaksi'
            }
        ],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id_transaksi']) {
                var type = data['type'],
                    id = data['id_transaksi'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'peminjaman/accept/' + id + '\';" class="btn btn-success btn-icons btn-rounded"><i class="mdi mdi-check-circle"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'peminjaman/add/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-add-circle-outline"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function katalog_buku_index() {
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'katalog/show_buku_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Klasifikasi Buku",
                data: 'jenis_buku'
            },
            {
                title: "Judul Buku",
                data: 'judul_buku'
            },
            {
                title: "Pengarang",
                data: 'pengarang'
            },
            {
                title: "Tersedia",
                data: 'qt'
            }
        ],
        // createdRow: function(row, data, index) {
        //     $('td', row).eq(0).html(index + 1);
        //     if (data['id_buku']) {
        //         var id = data['id_buku'],
        //             html = '';
        //         html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'katalog/edit/admin/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
        //         html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'katalog/delete/admin/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
        //         $('td', row).eq(-1).html(html);
        //     }
        // }
    });
}

function konfirmasi_izin_index() {
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'konfirmasi_izin/list_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Type Izin",
                data: 'type'
            },
            {
                title: "Nama Izin",
                data: 'nama_izin'
            },
            {
                title: "Nama Pengguna",
                data: 'nama'
            },
            {
                title: "Tempat",
                data: 'tempat'
            },
            {
                title: "Tanggal Awal",
                data: 'tglawal'
            },
            {
                title: "Tanggal Akhir",
                data: 'tglakhir'
            },
            {
                title: "Lama Izin",
                data: 'lama_izin'
            },
            {
                title: "Action",
                data: 'id_izin'
            }
        ],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id_izin']) {
                var type = data['type'],
                    id = data['id_izin'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'konfirmasi_izin/accept/' + id + '\';" class="btn btn-success btn-icons btn-rounded"><i class="mdi mdi-check-circle"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'konfirmasi_izin/reject/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-close-circle-outline"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function data_izin_index() {
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'data_izin/list_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Type Izin",
                data: 'type'
            },
            {
                title: "Nama Izin",
                data: 'nama_izin'
            },
            {
                title: "Nama Pengguna",
                data: 'nama'
            },
            {
                title: "Tempat",
                data: 'tempat'
            },
            {
                title: "Tanggal Awal",
                data: 'tglawal'
            },
            {
                title: "Tanggal Akhir",
                data: 'tglakhir'
            },
            {
                title: "Lama Izin",
                data: 'lama_izin'
            },
            {
                title: "Status",
                data: 'status'
            },
            {
                title: "Action",
                data: 'id_izin'
            }
        ],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id_izin']) {
                var type = data['type'],
                    id = data['id_izin'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_izin/edit/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'surat_keterangan/print/' + id + '\';" class="btn btn-info btn-icons btn-rounded" title="Print surat"><i class="mdi mdi-printer"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'surat_keterangan/print/' + id + '?dl\';" class="btn btn-success btn-icons btn-rounded" title="Download file .doc"><i class="mdi mdi-download"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_izin/delete/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function daftar_izin_index() {
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'daftar_izin/list_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Type Izin",
                data: 'type'
            },
            {
                title: "Nama Izin",
                data: 'nama_izin'
            },
            {
                title: "Tempat",
                data: 'tempat'
            },
            {
                title: "Tanggal Awal",
                data: 'tglawal'
            },
            {
                title: "Tanggal Akhir",
                data: 'tglakhir'
            },
            {
                title: "Lama Izin",
                data: 'lama_izin'
            },
            {
                title: "Status",
                data: 'status'
            },
            {
                title: "Action",
                data: 'id_izin'
            }
        ],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id_izin']) {
                var type = data['type'],
                    id = data['id_izin'],
                    html = '';
                if (data['n_status'] !== 'rejected') {
                    html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'daftar_izin/edit/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
                    html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'daftar_izin/delete/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
                }
                if (data['n_status'] == 'approved') {
                    html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'surat_keterangan/print/' + id + '\';" class="btn btn-info btn-icons btn-rounded" title="Print surat"><i class="mdi mdi-printer"></i></button>';
                    html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'surat_keterangan/print/' + id + '?dl\';" class="btn btn-success btn-icons btn-rounded" title="Download file .doc"><i class="mdi mdi-download"></i></button>';
                }
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function data_izin_edit_or_add_new() {
    sl_t = $('select[name="type"]'), sl_iz = $('select[name="id_namaizin"]');
    sl_t.change(function(event) {
        sl_iz.html($('<option></option>').text('-- Pilih --').attr({
            disabled: 'disabled',
            selected: 'selected'
        }));
        $.get(base_url + 'data_izin/nama_izin_ajax/' + sl_t.val(), function(data) {
            for (row in data) {
                sl_iz.append($('<option></option>').attr('value', data[row].id_namaizin).text(data[row].nama_izin));
            }
        });
    });
}


function daftar_izin_ajukan() {
    sl_t = $('select[name="type"]'), sl_iz = $('select[name="id_namaizin"]');
    sl_t.change(function(event) {
        sl_iz.html($('<option></option>').text('-- Pilih --').attr({
            disabled: 'disabled',
            selected: 'selected'
        }));
        $.get(base_url + 'daftar_izin/nama_izin_ajax/' + sl_t.val(), function(data) {
            for (row in data) {
                sl_iz.append($('<option></option>').attr('value', data[row].id_namaizin).text(data[row].nama_izin));
            }
        });
    });
}
$(document).ready(function() 
{
    switch (true) 
    {
        case (window.location.href.indexOf('/manajemen_buku/data_buku') != -1):
            list_buku_index();
            break;
        case (window.location.href.indexOf('/manajemen_buku/jenis_buku') != -1):
            klasifikasi_buku_index();
            break;
        case (window.location.href.indexOf('/katalog') != -1):
            katalog_buku_index();
            break;
        case (window.location.href.indexOf('/data_siswa') != -1):
            data_siswa_index();
            break;
        case (window.location.href.indexOf('/peminjaman') != -1):
            peminjaman_index();
            break;
            
        case (window.location.href.indexOf('/daftar_izin/ajukan') != -1 || window.location.href.indexOf('/daftar_izin/edit') != -1):
            daftar_izin_ajukan();
            break;
        case (window.location.href.indexOf('/daftar_izin') != -1):
            daftar_izin_index();
            break;
        case (window.location.href.indexOf('/data_master/nama_izin') != -1):
            data_namaizin_index();
            break;
        case (window.location.href.indexOf('/konfirmasi_izin') != -1):
            konfirmasi_izin_index();
            break;
        case (window.location.href.indexOf('/data_izin/edit') != -1 || window.location.href.indexOf('/data_izin/add_new') != -1):
            data_izin_edit_or_add_new();
            break;
        case (window.location.href.indexOf('/data_izin') != -1):
            data_izin_index();
            break;
    }
});