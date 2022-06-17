<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

    private $m_admin;

    function __construct() {
		parent::__construct();
		$this->load->model('M_Admin');
		$this->m_admin = $this->M_Admin;

		isnt_login(function() { 
			//cek sesi, bila bukan admin akan redirect ke login untuk login terlebih dahulu
			redirect( base_url('auth/login') );
		});

        if( $this->session->userdata ('user_type') == 'admin' ) {
			$this->user_type = 'Admin';
		} elseif ( $this->session->userdata ('user_type') == 'kepsek') {
			$this->user_type = 'Kepsek';
		}
	}

    public function index() {
        $data = generate_page('Administator', 'administrator', 'Admin');
        $data_content['title_page'] = 'Data Administrator / Pengelola';
		$data['content'] = $this->load->view('partial/Administrator/V_Administrator_Read', $data_content, true);
		$this->load->view('V_Dashboard', $data);
    }

    public function admin_list_ajax() {
        json_dump( function() {
            $result = $this->m_admin->list_admin();
            $new_arr = array(); $i = 1;
            foreach ($result as $key => $value) {
                $value-> no = $i;
                $new_arr[] = $value;
                $value->avatar = '<img src="' . uploads_url('avatar/'.$value->avatar) . '" alt=" profile image" />';
                $i++;
            }
            return array('data' => $new_arr);
        });
    }

    public function add_new() {
        if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
            $level_user = $this->security->xss_clean( $this->input->post('level_user'));
            $nama_admin = $this->security->xss_clean( $this->input->post('nama_admin'));
            $username = $this->security->xss_clean( $this->input->post('username'));
            $password = $this->security->xss_clean( $this->input->post('password'));
            $avatar = '';
            // untuk avatar
            if ( $this->security->xss_clean(  $_FILES["avatar"] ) && $_FILES['avatar']['name'] ) {
                $config['upload_path']   = './uploads/avatar/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']      = 2000;
                $config['filename']      = md5(time() . '_'. $_FILES["avatar"]['name']);
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('avatar') && !empty($_FILES['avatar']['name'])) {
                    $this->session->set_flashdata('msg_alert', $this->upload->display_errors());
                    redirect (base_url('administrator/add_new'));
                } else {
                    $avatar = $this->upload->data()['file_name'];
                }
            }
            //validasi data DATA
            $this->form_validation->set_rules('level_user', 'level_user', 'required');
            $this->form_validation->set_rules('nama_admin', 'nama admin', 'required|is_unique[admin.nama_admin]', 
                                            array( 'required'  =>'Data tidak boleh kosong!', 
                                                'is_unique' =>'Nama admin sudah ada, coba yang lain' ));
            $this->form_validation->set_rules('username', 'username', 'required|is_unique[admin.username]',
                                            array( 'required'  =>'Data tidak boleh kosong!', 
                                                'is_unique' =>'Username sudah ada' ));
            $this->form_validation->set_rules('password', 'password', 'required');
            
            if (!$this->form_validation->run()) {
                $this->session->set_flashdata('msg_alert', validation_errors());
                redirect( base_url('administrator/add_new') );
            }
            //terakhir 
            $this->m_admin->admin_add_new($level_user, $nama_admin, $username, $password, $avatar);
            redirect(base_url('administrator'));
        }

        $data = generate_page ('Tambah Admin', 'administrator/add_new', 'Admin');
        $data_content['title_page'] = 'Tambah data admin / pengelola';
        $data['content'] = $this->load->view('partial/Administrator/V_Administrator_Create', $data_content, true);
        $this->load->view('V_Dashboard', $data);
    }

    public function delete($id) {
        $this->m_admin->admin_delete($id);
        $this->session->set_flashdata('msg_alert', 'Data admin berhasil dihapus');
        redirect(base_url('administrator'));
    }

    public function edit() {
        if ( empty($this->uri->segment('3')) ) {
            redirect(base_url('administrator'));
        }
        $id_admin = $this->uri->segment('3');

        if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_admin = $this->security->xss_clean( $this->input->post('id_admin'));
            $level_user = $this->security->xss_clean( $this->input->post('level_user'));
            $nama_admin = $this->security->xss_clean( $this->input->post('nama_admin'));
            $username = $this->security->xss_clean( $this->input->post('username'));
            $password = $this->security->xss_clean( $this->input->post('password'));
            $avatar = '';
            // untuk avatar
            if ( $this->security->xss_clean(  $_FILES["avatar"] ) && $_FILES['avatar']['name'] ) {
                $config['upload_path']   = './uploads/avatar/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']      = 2000;
                $config['filename']      = md5(time() . '_'. $_FILES["avatar"]['name']);
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('avatar') && !empty($_FILES['avatar']['name'])) {
                    $this->session->set_flashdata('msg_alert', $this->upload->display_errors());
                    redirect (base_url('administrator/edit/' . $id_admin));
                } else {
                    $avatar = $this->upload->data()['file_name'];
                }
            }
             //validasi data lagi
            $this->form_validation->set_rules('id_admin', 'id admin', 'required');
            $this->form_validation->set_rules('level_user', 'level_user', 'required');
            $this->form_validation->set_rules('nama_admin', 'nama admin', 'required', array( 'required'  =>'Data tidak boleh kosong!' ));
            $this->form_validation->set_rules('username', 'username', 'required', array( 'required'  =>'Data tidak boleh kosong!' ));
            $this->form_validation->set_rules('password', 'password', 'required');
            
            if (!$this->form_validation->run()) {
                $this->session->set_flashdata('msg_alert', validation_errors());
                redirect( base_url('/administrator/edit/' . $id_admin) );
            }
            //terakhir 
            $this->m_admin->admin_update($id_admin, $level_user, $nama_admin, $username, $password, $avatar);
            redirect(base_url('administrator'));
        }

        $data = generate_page ('Edit data admin', 'administrator/edit/'. $id_admin, 'Admin');
        $data_content['title_page'] = 'Edit data admin / pengelola';
        $data_content['admin'] = $this->m_admin->get_data_admin($id_admin);
        $data['content'] = $this->load->view('partial/Administrator/V_Administrator_Edit', $data_content, true);
        $this->load->view('V_Dashboard', $data);
    }
}