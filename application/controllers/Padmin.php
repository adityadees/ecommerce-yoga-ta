<?php
class Padmin extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
			$url=base_url('loginadmin');
			redirect($url);
		};
		$this->load->model('m_padmin');
		$this->load->library('Pdf');
		$this->load->helper('menu_helper');
	}
	public function index(){
		if(isset($_SESSION['logged_in'])){
			$role=$_SESSION['role'];
			if($role=='admin' || $role=='pimpinan'){
				$x['cselesai']=$this->m_padmin->count_selesai();
				$x['cmenunggu']=$this->m_padmin->count_menunggu();
				$x['ckonfirm']=$this->m_padmin->count_konfirmp();
				$x['ctop']=$this->m_padmin->count_topuser();
				$x['cbiaya']=$this->m_padmin->count_topbiaya();

				$this->load->view('admin/header');
				$this->load->view('admin/topbar');
				$this->load->view('admin/sidebar');
				$this->load->view('admin/index',$x);
				$this->load->view('admin/footer');}
			}
			else {
				$this->load->view('404');
			}
		}

		public function kategori(){
			if(isset($_SESSION['logged_in'])){
				$role=$_SESSION['role'];
				if($role=='admin'){
					$x['tipe']=$this->m_padmin->get_all_type();
					$x['data']=$this->m_padmin->get_all_kategori();
					$this->load->view('admin/header');
					$this->load->view('admin/topbar');
					$this->load->view('admin/sidebar');
					$this->load->view('admin/modul/kategori',$x);
					$this->load->view('admin/footer');
				}
				else {
					$this->load->view('404');
				}
			}
		}

		public function type(){
			if(isset($_SESSION['logged_in'])){
				$role=$_SESSION['role'];
				if($role=='admin'){
					$x['data']=$this->m_padmin->get_all_type();
					$this->load->view('admin/header');
					$this->load->view('admin/topbar');
					$this->load->view('admin/sidebar');
					$this->load->view('admin/modul/type',$x);
					$this->load->view('admin/footer');
				}
				else {
					$this->load->view('404');
				}
			}
		}
		public function laporan(){
			if(isset($_SESSION['logged_in'])){
				$role=$_SESSION['role'];
				if($role=='pimpinan'){
					$x['data']=$this->m_padmin->get_all_laporan();
					$this->load->view('admin/header');
					$this->load->view('admin/topbar');
					$this->load->view('admin/sidebar');
					$this->load->view('admin/laporan/laporan',$x);
					$this->load->view('admin/footer');
				}
				else {
					$this->load->view('404');
				}
			}
		}


		public function printr()
		{
			if(isset($_SESSION['logged_in'])){
				$role=$_SESSION['role'];
				if($role=='pimpinan'){
					$x['print']=$this->m_padmin->get_all_laporan();
					$this->load->library('pdf');
					$this->pdf->setPaper('A4', 'potrait');
					$this->pdf->filename = "report.pdf";
					$this->pdf->load_view('admin/laporan/print',$x);
					$this->pdf->render();
					$this->pdf->stream();
				}
				else {
					$this->load->view('404');
				}
			}

		}

		public function printrange()
		{
			if(isset($_SESSION['logged_in'])){
				$role=$_SESSION['role'];
				if($role=='pimpinan'){
					$kode=$this->uri->segment(2);
					$nex=(explode("%20",$kode));
					$ndate1=date('Y-m-d',strtotime($nex[0]));
					$time1=$nex[1];
					$ndate2=date('Y-m-d',strtotime($nex[2]));
					$time2=$nex[3];
					$date1=$ndate1." ".$time1;
					$date2=$ndate2." ".$time2;
					$x['print']=$this->m_padmin->get_laporan_by_date($date1,$date2);

					$this->load->library('pdf');
					$this->pdf->setPaper('A4', 'potrait');
					$this->pdf->filename = "report.pdf";
					$this->pdf->load_view('admin/laporan/print_range',$x);
					$this->pdf->render();
					$this->pdf->stream();
				}
				else {
					$this->load->view('404');
				}
			}
		}

		public function bank(){
			if(isset($_SESSION['logged_in'])){
				$role=$_SESSION['role'];
				if($role=='admin'){
					$x['data']=$this->m_padmin->get_all_bank();
					$this->load->view('admin/header');
					$this->load->view('admin/topbar');
					$this->load->view('admin/sidebar');
					$this->load->view('admin/modul/bank',$x);
					$this->load->view('admin/footer');
				}
				else {
					$this->load->view('404');
				}
			}

		}

		public function rm_kategori(){
			if(isset($_SESSION['logged_in'])){
				$role=$_SESSION['role'];
				if($role=='admin'){
					$x['data']=$this->m_padmin->get_all_rm_kategori();
					$this->load->view('admin/header');
					$this->load->view('admin/topbar');
					$this->load->view('admin/sidebar');
					$this->load->view('admin/rm/rm_kategori',$x);
					$this->load->view('admin/footer');
				}
				else {
					$this->load->view('404');
				}
			}
		}

		public function rm_item(){
			if(isset($_SESSION['logged_in'])){
				$role=$_SESSION['role'];
				if($role=='admin'){
					$x['data']=$this->m_padmin->get_all_rm_item();
					$x['kategori']=$this->m_padmin->get_all_rm_kategori();
					$this->load->view('admin/header');
					$this->load->view('admin/topbar');
					$this->load->view('admin/sidebar');
					$this->load->view('admin/rm/rm_item',$x);
					$this->load->view('admin/footer');
				}
				else {
					$this->load->view('404');
				}
			}

		}



		public function invoice(){
			if(isset($_SESSION['logged_in'])){
				$role=$_SESSION['role'];
				if($role=='admin'){
					$userid=$_SESSION['userid'];
					$kode=$this->uri->segment(2);
					$x['data']=$this->m_padmin->get_detail_invoice($kode);
					$this->load->view('admin/header');
					$this->load->view('admin/topbar');
					$this->load->view('admin/sidebar');
					$this->load->view('admin/transaksi/invoice',$x);
					$this->load->view('admin/footer');
				}
				else {
					$this->load->view('404');
				}
			}
		}

		public function list_gitar(){
			if(isset($_SESSION['logged_in'])){
				$role=$_SESSION['role'];
				if($role=='admin'){
					$x['data']=$this->m_padmin->get_all_list();
					$x['kat']=$this->m_padmin->get_all_kategori();
					$this->load->view('admin/header');
					$this->load->view('admin/topbar');
					$this->load->view('admin/sidebar');
					$this->load->view('admin/modul/list',$x);
					$this->load->view('admin/footer');
				}
				else {
					$this->load->view('404');
				}
			}
		}

		public function shape(){
			if(isset($_SESSION['logged_in'])){
				$role=$_SESSION['role'];
				if($role=='admin'){
					$x['data']=$this->m_padmin->get_all_shape();
					$x['tipe']=$this->m_padmin->get_all_type();
					$this->load->view('admin/header');
					$this->load->view('admin/topbar');
					$this->load->view('admin/sidebar');
					$this->load->view('admin/modul/shape',$x);
					$this->load->view('admin/footer');
				}
				else {
					$this->load->view('404');
				}
			}
		}


		public function barang(){
			if(isset($_SESSION['logged_in'])){
				$role=$_SESSION['role'];
				if($role=='admin'){
					$x['list']=$this->m_padmin->get_all_list();
					$x['data']=$this->m_padmin->get_all_barang();
					$x['idbarang']=$this->m_padmin->get_kode_barang();
					$this->load->view('admin/header');
					$this->load->view('admin/topbar');
					$this->load->view('admin/sidebar');
					$this->load->view('admin/barang/barang',$x);
					$this->load->view('admin/footer');
				}
				else {
					$this->load->view('404');
				}
			}
		}

		public function user(){
			if(isset($_SESSION['logged_in'])){
				$role=$_SESSION['role'];
				if($role=='admin'){
					$x['data']=$this->m_padmin->get_all_user();
					$this->load->view('admin/header');
					$this->load->view('admin/topbar');
					$this->load->view('admin/sidebar');
					$this->load->view('admin/user/user',$x);
					$this->load->view('admin/footer');
				}
				else {
					$this->load->view('404');
				}
			}
		}

		public function forum(){
			if(isset($_SESSION['logged_in'])){
				$role=$_SESSION['role'];
				if($role!='customer'){
					$x['data']=$this->m_padmin->get_all_forum();
					$this->load->view('admin/header');
					$this->load->view('admin/topbar');
					$this->load->view('admin/sidebar');
					$this->load->view('admin/forum/forum',$x);
					$this->load->view('admin/footer');
				}
				else {
					$this->load->view('404');
				}
			}
		}

		public function transaksi(){
			if(isset($_SESSION['logged_in'])){
				$role=$_SESSION['role'];
				if($role=='admin'){
					$x['data']=$this->m_padmin->get_all_transaksi();
					$x['conf']=$this->m_padmin->get_all_transaksi_conf();
					$x['ship']=$this->m_padmin->shipping();
					$x['pending']=$this->m_padmin->get_all_transaksi_pending();
					$this->load->view('admin/header');
					$this->load->view('admin/topbar');
					$this->load->view('admin/sidebar');
					$this->load->view('admin/transaksi/transaksi',$x);
					$this->load->view('admin/footer');
				}
				else {
					$this->load->view('404');
				}
			}
		}


		function download(){
			$kode = $this->uri->segment(3);
			$this->m_padmin->getDown($kode);
		}

		function save_kategori(){
			$tipe=strip_tags($this->input->post('tipe'));
			$kategori_nama=strip_tags($this->input->post('kategori_nama'));
			$this->m_padmin->save_kategori($tipe,$kategori_nama);
			echo $this->session->set_flashdata('msg','success');
			redirect('padmin/kategori');
		}

		function update_kategori(){
			$kategori_id=$this->input->post('kode');
			$tipe=strip_tags($this->input->post('tipe'));
			$kategori_nama=strip_tags($this->input->post('kategori_nama'));
			$this->m_padmin->update_kategori($kategori_id,$tipe,$kategori_nama);
			echo $this->session->set_flashdata('msg','info');
			redirect('padmin/kategori');

		}

		function delete_kategori(){
			$kode=$this->input->post('kode');
			$this->m_padmin->delete_kategori($kode);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('padmin/kategori');
		}



		function save_rm_kategori(){
			$rm_kategori_nama=strip_tags($this->input->post('rm_kategori_nama'));
			$rm_kategori_jenis=$this->input->post('rm_kategori_jenis');
			$this->m_padmin->save_rm_kategori($rm_kategori_nama,$rm_kategori_jenis);
			echo $this->session->set_flashdata('msg','success');
			redirect('padmin/rm_kategori');
		}

		function update_rm_kategori(){
			$rm_kategori_id=$this->input->post('kode');
			$rm_kategori_nama=strip_tags($this->input->post('rm_kategori_nama'));
			$rm_kategori_jenis=$this->input->post('rm_kategori_jenis');
			$this->m_padmin->update_rm_kategori($rm_kategori_id,$rm_kategori_nama,$rm_kategori_jenis);
			echo $this->session->set_flashdata('msg','info');
			redirect('padmin/rm_kategori');

		}

		function delete_rm_kategori(){
			$kode=$this->input->post('kode');
			$this->m_padmin->delete_rm_kategori($kode);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('padmin/rm_kategori');
		}

		function save_repairmodif(){
			$rm_kode=$this->input->post('rm_kode');
			$rm_kategori_jenis=$this->input->post('rm_kategori_jenis');
			$rm_nama=$this->input->post('rm_nama');
			$rm_harga=$this->input->post('rm_harga');
			$this->m_padmin->save_repairmodif($rm_kode,$rm_kategori_jenis,$rm_nama,$rm_harga);
			echo $this->session->set_flashdata('msg','success');
			redirect('padmin/rm_item');
		}

		function update_repairmodif(){
			$kode=$this->input->post('kode');
			$rm_kategori_jenis=$this->input->post('rm_kategori_jenis');
			$rm_nama=$this->input->post('rm_nama');
			$rm_harga=$this->input->post('rm_harga');
			$this->m_padmin->update_repairmodif($kode,$rm_kategori_jenis,$rm_nama,$rm_harga);
			echo $this->session->set_flashdata('msg','info');
			redirect('padmin/rm_item');

		}

		function delete_repairmodif(){
			$kode=$this->input->post('kode');
			$this->m_padmin->delete_repairmodif($kode);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('padmin/rm_item');
		}

		function konfirmasi_trans(){
			$kode=$this->input->post('kode');
			$cek=$this->m_padmin->get_cart_harga($kode);
			$gcek=$cek->row_array();
			$total=$gcek['total'];
			$user=$gcek['user_id'];
			if($total>=1000000){
				$pon=$this->m_padmin->add_point_user($kode,$user);
				if ($pon){
					$cc=$this->m_padmin->konfirmasi_cart($kode);
					if($cc){
						$this->m_padmin->konfirmasi_trans($kode);
						echo $this->session->set_flashdata('msg','success');
						redirect('transaksi');
					}
					else {
						echo $this->session->set_flashdata('msg','gagal');
						redirect('transaksi');
					}				
				}
				else {
					echo $this->session->set_flashdata('msg','gagal');
					redirect('transaksi');
				}
			}
			else {
				$cc=$this->m_padmin->konfirmasi_cart($kode);
				if($cc){
					$this->m_padmin->konfirmasi_trans($kode);
					echo $this->session->set_flashdata('msg','success');
					redirect('transaksi');
				}
				else {
					echo $this->session->set_flashdata('msg','gagal');
					redirect('transaksi');
				}		
			}

		}
		function konfirmasi_selesai(){
			$config['upload_path'] = './assets/images/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);
			if(!empty($_FILES['filefoto']['name']))
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();

					$config['image_library']='gd2';
					$config['source_image']='./assets/images/'.$gbr['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '60%';
					$config['width']= 840;
					$config['height']= 450;
					$config['new_image']= './assets/images/'.$gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$gambar=$gbr['file_name'];
					$user_id=$this->input->post('user_id');
					$pemesanan_id=$this->input->post('pemesanan_id');
					$message=$this->input->post('message');
					$cc=$this->m_padmin->konfirmasi_selesai($user_id,$pemesanan_id,$message,$gambar);
					if($cc){
						$status='selesai';
						$this->m_padmin->update_status_selesai($pemesanan_id,$status);
						echo $this->session->set_flashdata('msg','success');
						redirect('padmin/transaksi');
					}
					else {
						echo $this->session->set_flashdata('msg','warning');
						redirect('padmin/transaksi');
					}
				}else{
					echo $this->session->set_flashdata('msg','warning');
					redirect('padmin/transaksi');
				}

			}else{
				redirect('padmin/transaksi');
			}

		}


		function sv_input(){
			$barang=$this->input->post('barang');
			$this->m_padmin->sv_input($barang);
			echo $this->session->set_flashdata('msg','success-hapus');
			header('location:custom');
		}


		function save_list(){
			$kategori=strip_tags($this->input->post('kategori'));
			$nama_list=strip_tags($this->input->post('nama_list'));
			$this->m_padmin->save_list($kategori,$nama_list);
			echo $this->session->set_flashdata('msg','success');
			redirect('list');
		}

		function update_list(){
			$list_id=$this->input->post('kode');
			$kategori=strip_tags($this->input->post('kategori'));
			$nama_list=strip_tags($this->input->post('nama_list'));
			$this->m_padmin->update_list($list_id,$kategori,$nama_list);
			echo $this->session->set_flashdata('msg','info');
			redirect('list');
		}

		function delete_list(){
			$kode=$this->input->post('kode');
			$this->m_padmin->delete_list($kode);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('list');
		}



		function save_type(){
			$type_nama=strip_tags($this->input->post('type_nama'));
			$type_ket=strip_tags($this->input->post('type_ket'));
			$this->m_padmin->save_type($type_nama,$type_ket);
			echo $this->session->set_flashdata('msg','success');
			redirect('padmin/type');
		}
		function save_forum(){
			$forum_judul=$this->input->post('forum_judul');
			$forum_subjudul=$this->input->post('forum_subjudul');
			$this->m_padmin->save_forum($forum_judul,$forum_subjudul);
			echo $this->session->set_flashdata('msg','success');
			redirect('forum/forum');
		}

		function update_type(){
			$type_id=$this->input->post('kode');
			$type_nama=strip_tags($this->input->post('type_nama'));
			$type_ket=strip_tags($this->input->post('type_ket'));
			$this->m_padmin->update_type($type_id,$type_nama,$type_ket);
			echo $this->session->set_flashdata('msg','info');
			redirect('padmin/type');
		}
		function update_forum(){
			$forum_id=$this->input->post('kode');
			$forum_judul=$this->input->post('forum_judul');
			$forum_subjudul=$this->input->post('forum_subjudul');
			$this->m_padmin->update_forum($forum_id,$forum_judul,$forum_subjudul);
			echo $this->session->set_flashdata('msg','info');
			redirect('forum/forum');
		}

		function delete_type(){
			$kode=$this->input->post('kode');
			$this->m_padmin->delete_type($kode);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('padmin/type');
		}

		function save_shape(){
			$config['upload_path'] = './assets/images/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);
			if(!empty($_FILES['filefoto']['name']))
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();

					$config['image_library']='gd2';
					$config['source_image']='./assets/images/'.$gbr['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '60%';
					$config['width']= 840;
					$config['height']= 450;
					$config['new_image']= './assets/images/'.$gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$gambar=$gbr['file_name'];
					$tipe=strip_tags($this->input->post('tipe'));
					$shape_nama=strip_tags($this->input->post('shape_nama'));
					$this->m_padmin->save_shape($tipe,$shape_nama,$gambar);
					echo $this->session->set_flashdata('msg','success');
					redirect('padmin/shape');
				}else{
					echo $this->session->set_flashdata('msg','warning');
					redirect('padmin/shape');
				}

			}else{
				redirect('padmin/shape');
			}

		}


		function update_shape(){

			$config['upload_path'] = './assets/images/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);
			if(!empty($_FILES['filefoto']['name']))
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();

					$config['image_library']='gd2';
					$config['source_image']='./assets/images/'.$gbr['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '60%';
					$config['width']= 840;
					$config['height']= 450;
					$config['new_image']= './assets/images/'.$gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$gambar=$gbr['file_name'];
					$shape_id=$this->input->post('kode');
					$tipe=$this->input->post('tipe');
					$shape_nama=$this->input->post('shape_nama');
					$this->m_padmin->update_shape($shape_id,$tipe,$shape_nama,$gambar);
					echo $this->session->set_flashdata('msg','info');
					redirect('padmin/shape');

				}else{
					echo $this->session->set_flashdata('msg','warning');
					redirect('padmin/shape');
				}

			}else{
				$shape_id=$this->input->post('kode');
				$tipe=$this->input->post('tipe');
				$shape_nama=$this->input->post('shape_nama');
				$this->m_padmin->update_shape_wo_img($shape_id,$tipe,$shape_nama);
				echo $this->session->set_flashdata('msg','info');
				redirect('padmin/shape');
			} 

		}


		function delete_shape(){
			$kode=$this->input->post('kode');
			$this->m_padmin->delete_shape($kode);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('padmin/shape');
		}



		function save_barang(){
			$config['upload_path'] = './assets/images/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);
			if(!empty($_FILES['filefoto']['name']))
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();

					$config['image_library']='gd2';
					$config['source_image']='./assets/images/'.$gbr['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '60%';
					$config['width']= 840;
					$config['height']= 450;
					$config['new_image']= './assets/images/'.$gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$gambar=$gbr['file_name'];
					$barang_kode=$this->input->post('barang_kode');
					$list=strip_tags($this->input->post('list'));
					$barang_nama=strip_tags($this->input->post('barang_nama'));
					$barang_harga=strip_tags($this->input->post('barang_harga'));
					$barang_ket=strip_tags($this->input->post('barang_ket'));
					$this->m_padmin->save_barang($barang_kode,$list,$barang_nama,$barang_harga,$barang_ket,$gambar);
					echo $this->session->set_flashdata('msg','success');
					redirect('padmin/barang');
				}else{
					echo $this->session->set_flashdata('msg','warning');
					redirect('padmin/barang');
				}

			}else{
				$barang_kode=$this->input->post('barang_kode');
				$list=strip_tags($this->input->post('list'));
				$barang_nama=strip_tags($this->input->post('barang_nama'));
				$barang_harga=strip_tags($this->input->post('barang_harga'));
				$barang_ket=strip_tags($this->input->post('barang_ket'));
				$this->m_padmin->save_barang_wo_img($barang_kode,$list,$barang_nama,$barang_harga,$barang_ket);
				echo $this->session->set_flashdata('msg','success');
				redirect('padmin/barang');
			}

		}

		function save_bank(){
			$config['upload_path'] = './assets/images/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);

			if ($this->upload->do_upload('filefoto'))
			{
				$gbr = $this->upload->data();
				$config['image_library']='gd2';
				$config['source_image']='./assets/images/'.$gbr['file_name'];
				$config['create_thumb']= FALSE;
				$config['maintain_ratio']= FALSE;
				$config['quality']= '60%';
				$config['width']= 840;
				$config['height']= 450;
				$config['new_image']= './assets/images/'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar=$gbr['file_name'];
				$bank=$this->input->post('bank');
				$pemilik=strip_tags($this->input->post('pemilik'));
				$norek=strip_tags($this->input->post('norek'));
				$this->m_padmin->save_bank($bank,$pemilik,$norek,$gambar);
				echo $this->session->set_flashdata('msg','success');
				redirect('padmin/bank');
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('padmin/bank');
			}
		}

		function update_barang(){

			$config['upload_path'] = './assets/images/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);
			if(!empty($_FILES['filefoto']['name']))
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();

					$config['image_library']='gd2';
					$config['source_image']='./assets/images/'.$gbr['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '60%';
					$config['width']= 840;
					$config['height']= 450;
					$config['new_image']= './assets/images/'.$gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$gambar=$gbr['file_name'];
					$barang_kode=$this->input->post('kode');
					$list=strip_tags($this->input->post('list'));
					$barang_nama=strip_tags($this->input->post('barang_nama'));
					$barang_harga=strip_tags($this->input->post('barang_harga'));
					$barang_ket=strip_tags($this->input->post('barang_ket'));
					$this->m_padmin->update_barang($barang_kode,$list,$barang_nama,$barang_harga,$barang_ket,$gambar);
					echo $this->session->set_flashdata('msg','info');
					redirect('padmin/barang');

				}else{
					echo $this->session->set_flashdata('msg','warning');
					redirect('padmin/barang');
				}

			}else{
				$barang_kode=$this->input->post('kode');
				$list=strip_tags($this->input->post('list'));
				$barang_nama=strip_tags($this->input->post('barang_nama'));
				$barang_harga=strip_tags($this->input->post('barang_harga'));
				$barang_ket=strip_tags($this->input->post('barang_ket'));
				$this->m_padmin->update_barang_wo_img($barang_kode,$list,$barang_nama,$barang_harga,$barang_ket);
				echo $this->session->set_flashdata('msg','info');
				redirect('padmin/barang');
			} 

		}


		function update_bank(){

			$config['upload_path'] = './assets/images/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);
			if(!empty($_FILES['filefoto']['name']))
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();

					$config['image_library']='gd2';
					$config['source_image']='./assets/images/'.$gbr['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '60%';
					$config['width']= 840;
					$config['height']= 450;
					$config['new_image']= './assets/images/'.$gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$gambar=$gbr['file_name'];
					$kode=$this->input->post('kode');
					$bank=$this->input->post('bank');
					$pemilik=strip_tags($this->input->post('pemilik'));
					$norek=strip_tags($this->input->post('norek'));
					$this->m_padmin->update_bank($kode,$bank,$pemilik,$norek,$gambar);
					echo $this->session->set_flashdata('msg','info');
					redirect('bank');

				}else{
					echo $this->session->set_flashdata('msg','warning');
					redirect('bank');
				}

			}else{
				$kode=$this->input->post('kode');
				$bank=$this->input->post('bank');
				$pemilik=$this->input->post('pemilik');
				$norek=$this->input->post('norek');
				$this->m_padmin->update_bank_wo_img($kode,$bank,$pemilik,$norek);
				echo $this->session->set_flashdata('msg','info');
				redirect('bank');
			} 

		}


		function delete_barang(){
			$kode=$this->input->post('kode');
			$this->m_padmin->delete_barang($kode);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('padmin/barang');
		}
		function delete_bank(){
			$kode=$this->input->post('kode');
			$this->m_padmin->delete_bank($kode);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('bank');
		}


	}		