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
                title: "Kategori Buku",
                data: 'kategori_buku'
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
                title: "Pilihan",
                data: 'id_buku'
            }
        ],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id_buku']) {
                var id = data['id_buku'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'manajemen_buku/edit/data_buku/' + id + '\';" class="btn btn-icons btn-warning " title="Edit data" > <i class="fas fa-edit"></i> </button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'manajemen_buku/delete/data_buku/' + id + '\';" class="btn btn-icons btn-danger" title="Hapus data" > <i class="fas fa-trash"></i> </button>';
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
                title: "Pilihan",
                data: 'id_jenis_buku'
            }
        ],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id_jenis_buku']) {
                var id = data['id_jenis_buku'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'manajemen_buku/edit/jenis_buku/' + id + '\';" class="btn btn-warning btn-icons" title="Edit data"> <i class="fas fa-edit"></i> </button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'manajemen_buku/delete/jenis_buku/' + id + '\';" class="btn btn-icons btn-danger" title="Hapus data">  <i class="fas fa-trash"></i> </button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function data_siswa_index() {
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'anggota/data_siswa_ajax',
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
                title: "NIS",
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
                title: "Pilihan",
                data: 'id_siswa'
            }],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id_siswa']) {
                var id = data['id_siswa'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'anggota/edit/siswa/' + id + '\';" class="btn btn-warning btn-icons " title="Edit data" > <i class="fas fa-edit"></i> </button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'anggota/delete/siswa/' + id + '\';" class="btn btn-icons btn-danger" title="Hapus data" > <i class="fas fa-trash"></i> </button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function data_guru_index() {
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'anggota/data_guru_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Nama Guru",
                data: 'nama_guru'
            },
            {
                title: "NIPD",
                data: 'nipd'
            },
            {
                title: "Kelas Mengajar",
                data: 'kelas_ajar'
            },
            {
                title: "Jurusan Mengajar",
                data: 'jurusan_ajar'
            },
            {
                title: "Pilihan",
                data: 'id_guru'
            }],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id_guru']) {
                var id = data['id_guru'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'anggota/edit/guru/' + id + '\';" class="btn btn-warning btn-icons" title="Edit data" > <i class="fas fa-edit"></i> </button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'anggota/delete/guru/' + id + '\';" class="btn btn-icons btn-danger" title="Hapus data" > <i class="fas fa-trash"></i> </button>';
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
                title: "Kode Pinjam",
                data: 'kode_pinjam'
            },
            {
                title: "Nama Peminjam",
                data: 'nama_siswa'
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
                title: "Tanggal Kembali",
                data: 'tgl_kembali'
            },
            {
                title: "Lama Pinjam",
                data: 'lama_pinjam'
            },
            {
                title: "Status",
                data: 'status'
            },
            {
                title: "Denda",
                data: 'denda'
            },
            {
                title: "Pilihan",
                data: 'id_transaksi'
            }
        ],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id_transaksi']) {
                var 
                // type = data['id_pengembalian'],
                    id = data['id_transaksi'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'peminjaman/kembalikan/' + id + '\';" class="btn btn-success title="Kembalikan buku" "> <i class="fas fa-arrow-right"></i> KEMBALIKAN</button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function pengembalian_index() {
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'pengembalian/data_pengembalian_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Kode Pinjam",
                data: 'kode_pinjam'
            },
            {
                title: "Nama Peminjam",
                data: 'nama_siswa'
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
                title: "Tanggal Kembali",
                data: 'tgl_kembali'
            },
            {
                title: "Tanggal diKembalikan",
                data: 'tgl_dikembalikan'
            },
            {
                title: "telat Pinjam",
                data: 'telat'
            },
            {
                title: "Denda",
                data: 'denda'
            }
        ]
    });
}

function laporan_index() {
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'laporan/laporan_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Kode Pinjam",
                data: 'kode_pinjam'
            },
            {
                title: "Nama Peminjam",
                data: 'nama_siswa'
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
                title: "Tanggal Kembali",
                data: 'tgl_kembali'
            },
            {
                title: "Tanggal diKembalikan",
                data: 'tgl_dikembalikan'
            },
            {
                title: "Status Pinjam",
                data: 'status'
            },
            {
                title: "Denda",
                data: 'denda'
            }
        ]
    });
}

function administrator_index() {
    $('table.data').DataTable ({
        ajax: {
            url : base_url + 'administrator/admin_list_ajax',
        },
        columns : [{
            title: "No.",
            data: 'no'
        }, 
        {
            title: "Nama Admin",
            data: 'nama_admin'
        },
        {
            title: "Username",
            data: 'username'
        },
        {
            title: "Foto Profil",
            data: 'avatar'
        },
        {
            title: "Pilihan",
            data: 'id_admin'
        }],
        createdRow: function (row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data ['id_admin']) {
                var id = data['id_admin'], html = '';
                html+= '<button type="button" onClick="javascript:top.location.href=\'' + base_url + 'administrator/edit/' + id + '\';" class="btn btn-warning mr-2 title="Edit data" > <i class="fas fa-edit"></i> EDIT </button>';
                html+= '<button type="button" onClick="javascript:top.location.href=\'' + base_url + 'administrator/delete/' + id + '\';" class="btn btn-danger btn-icons title="Edit data" > <i class="fas fa-trash"></i>  </button>';
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
                title: "Kategori Buku",
                data: 'kategori_buku'
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
            }]
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
        case (window.location.href.indexOf('/anggota/siswa') != -1):
            data_siswa_index();
            break;
        case (window.location.href.indexOf('/anggota/guru') != -1):
            data_guru_index();
            break;
        case (window.location.href.indexOf('/peminjaman') != -1):
            peminjaman_index();
            break;
        case (window.location.href.indexOf('/pengembalian') != -1):
            pengembalian_index()
            break;
        case (window.location.href.indexOf('/laporan') != -1):
            laporan_index()
            break;
        case (window.location.href.indexOf('/administrator') != -1):
            administrator_index();
            break;
        case (window.location.href.indexOf('/katalog') != -1):
            katalog_buku_index();
            break;
    }
});