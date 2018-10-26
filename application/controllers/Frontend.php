<?php 
class Frontend extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_padmin');
    }
    public function index(){
        $x['data']=$this->m_padmin->get_barang_home();
        $x['list']=$this->m_padmin->get_list_home();
        $x['port']=$this->m_padmin->get_portfolio_home();
        $this->load->view('header');
        $this->load->view('index',$x);
        $this->load->view('footer');
    }
    public function custom(){
        $x['tipegitar']=$this->m_padmin->get_all_type();
        $x['shapegroup']=$this->m_padmin->get_shape_group();
        $x['katgroup']=$this->m_padmin->get_kategori_group();
        $x['listgroup']=$this->m_padmin->get_list_group();
        $this->load->view('header');
        $this->load->view('custom',$x);
        $this->load->view('footer');
    }
    public function repair(){
        $x['repairkat']=$this->m_padmin->get_repair_kat();
        $x['modifkat']=$this->m_padmin->get_modif_kat();
        $this->load->view('header');
        $this->load->view('repair',$x);
        $this->load->view('footer');
    }

    public function cart(){
     if(isset($_SESSION['logged_in'])){ 
        $userid=$_SESSION['userid'];
        $x['data']=$this->m_padmin->get_cart_by_user($userid);
        $this->load->view('header');
        $this->load->view('cart',$x);
        $this->load->view('footer');
    }
    else {
        $this->load->view('404');
    }
}

public function forum(){
    $x['data']=$this->m_padmin->get_all_forum();
    $this->load->view('header');
    $this->load->view('forum',$x);
    $this->load->view('footer');
}
public function subforum(){
    $kode=$this->uri->segment(2);
    $x['data']=$this->m_padmin->get_subforum_by_kode($kode);
    $x['datax']=$this->m_padmin->get_all_subforum($kode);
    $this->load->view('header');
    $this->load->view('subforum',$x);
    $this->load->view('footer');
}
public function topic(){
    $kode=$this->uri->segment(3);
    $x['data']=$this->m_padmin->get_all_topic($kode);
    $x['datax']=$this->m_padmin->get_all_reply($kode);
    $this->load->view('header');
    $this->load->view('topic',$x);
    $this->load->view('footer');
}
public function newtopic(){
 if(isset($_SESSION['logged_in'])){ 
    $kode=$this->uri->segment(3);
    $userid=$_SESSION['userid'];     
    $this->load->view('header');
    $this->load->view('newtopic',$kode);
    $this->load->view('footer');
}
else {
    $this->load->view('404');
}
}
public function reply(){
 if(isset($_SESSION['logged_in'])){ 
    $kode=$this->uri->segment(2);
    $userid=$_SESSION['userid'];     
    $this->load->view('header');
    $this->load->view('reply',$kode);
    $this->load->view('footer');
}
else {
    $this->load->view('404');
}
}



public function portofolio(){
    $x['port']=$this->m_padmin->get_portfolio_home();
    $this->load->view('header');
    $this->load->view('portofolio',$x);
    $this->load->view('footer');
}

public function inbox(){
 if(isset($_SESSION['logged_in'])){ 
    $userid=$_SESSION['userid'];
    $x['data']=$this->m_padmin->get_user_data($userid);
    $x['inbox']=$this->m_padmin->get_inbox($userid);
    $this->load->view('header');
    $this->load->view('user/inbox',$x);
    $this->load->view('footer');
}
}


public function inbox_detail(){
 if(isset($_SESSION['logged_in'])){ 
    $userid=$_SESSION['userid'];
    $kode=$this->uri->segment(3);
    $x['data']=$this->m_padmin->get_user_data($userid);
    $x['inbox']=$this->m_padmin->get_inbox_detail($kode);
    $this->load->view('header');
    $this->load->view('user/inbox_detail',$x);
    $this->load->view('footer');
}
}
public function register(){
    $this->load->view('header');
    $this->load->view('register');
    $this->load->view('footer');
}
public function account(){
 if(isset($_SESSION['logged_in'])){ 
    $userid=$_SESSION['userid'];
    $x['data']=$this->m_padmin->get_user_data($userid);
    $x['pemb']=$this->m_padmin->count_pembayaran($userid);
    $x['conf']=$this->m_padmin->count_konfirmasi($userid);
    $x['poinplus']=$this->m_padmin->get_point_plus_by_user($userid);
    $x['poinmin']=$this->m_padmin->get_point_minus_by_user($userid);
    $this->load->view('header');
    $this->load->view('user/account',$x);
    $this->load->view('footer');
}
}


public function transaksi(){
 if(isset($_SESSION['logged_in'])){ 
    $userid=$_SESSION['userid'];
    $x['data']=$this->m_padmin->get_user_data($userid);
    $x['trans']=$this->m_padmin->get_transaksi_by_user($userid);
    $x['trnscorm']=$this->m_padmin->get_trans_comfir($userid);
    $this->load->view('header');
    $this->load->view('user/transaksi',$x);
    $this->load->view('footer');
}
}

public function setting(){
 if(isset($_SESSION['logged_in'])){ 
    $userid=$_SESSION['userid'];
    $x['data']=$this->m_padmin->get_user_data($userid);
    $this->load->view('header');
    $this->load->view('user/setting',$x);
    $this->load->view('footer');
}
}

public function portfolio(){
 if(isset($_SESSION['logged_in'])){ 
    $userid=$_SESSION['userid'];
    $x['data']=$this->m_padmin->get_user_data($userid);
    $x['port']=$this->m_padmin->get_portfolio_by_user($userid);
    $this->load->view('header');
    $this->load->view('user/portfolio',$x);
    $this->load->view('footer');
}
}

function save_register(){
    $userid=$this->input->post('userid');
    $nama=$this->input->post('nama');
    $username=$this->input->post('username');
    $password=$this->input->post('password');
    $repassword=$this->input->post('repassword');
    $email=$this->input->post('email');

    $cc=$this->m_padmin->cek_username_reg($username);
    if($cc->num_rows() > 0){

        echo $this->session->set_flashdata('msg','warning');
        redirect('Register'); 
    }
    else {
        if($password==$repassword){
            $this->m_padmin->save_register($userid,$username,$password,$email);
            $this->m_padmin->save_detail_user($userid,$nama);
            echo $this->session->set_flashdata('msg','success');
            redirect('Register');
        }
        else {
            echo $this->session->set_flashdata('msg','warning');
            redirect('Register');   
        }
    }
}

function save_pembayaran(){
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
        $bank_id=$this->input->post('bank_id');
        $cart_kode=$this->input->post('cart_kode');
        $status='selesai';
        $this->m_padmin->save_pembayaran($cart_kode,$bank_id,$gambar);
        $this->m_padmin->update_status_cart($cart_kode,$status);
        echo $this->session->set_flashdata('msg','success');
        redirect('account/transaksi');
    }else{
        echo $this->session->set_flashdata('msg','warning');
        redirect('account/transaksi');
    }
}

function download(){
    $kode = $this->uri->segment(3);
    $this->m_padmin->download($kode);
}

function save_portfolio(){
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
        $config['height']= 840;
        $config['new_image']= './assets/images/'.$gbr['file_name'];
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        $gambar=$gbr['file_name'];
        $user_id=$this->input->post('userid');
        $judul=$this->input->post('judul');
        $keterangan=$this->input->post('keterangan');
        $this->m_padmin->save_portfolio($user_id,$judul,$keterangan,$gambar);
        echo $this->session->set_flashdata('msg','success');
        redirect('account/portfolio');
    }else{
        echo $this->session->set_flashdata('msg','warning');
        redirect('account/portoflio');
    }
}

function save_to_chart(){
    $cart_kd=$this->input->post('cart_kd');
    $usrid=$this->input->post('usrid');
    $type_id=$this->input->post('type_id');
    $shape_id=$this->input->post('shape_id');
    $barang_kode=$this->input->post('barang_kode');
    $totalharga=$this->input->post('totalharga');
    $message=$this->input->post('message');
    $barangkode=implode(',',$barang_kode);
    $this->m_padmin->save_to_chart($cart_kd,$usrid,$type_id,$shape_id,$barangkode,$totalharga,$message);
    echo $this->session->set_flashdata('msg','success');
    redirect('custom');
}
function save_post(){
    $judul=$this->input->post('judul');
    $userid=$this->input->post('userid');
    $forum=$this->input->post('forum');
    $isi=$this->input->post('isi');
    $this->m_padmin->save_post($forum,$userid,$judul,$isi);
    echo $this->session->set_flashdata('msg','success');
    redirect('forum/'.$forum);
}
function save_reply(){
    $userid=$this->input->post('userid');
    $topic=$this->input->post('topic');
    $forum=$this->input->post('forum');
    $isi=$this->input->post('isi');
    $this->m_padmin->save_reply($topic,$userid,$isi);
    echo $this->session->set_flashdata('msg','success');
    redirect('forum/'.$forum.'/'.$topic);
}

function checkout(){
    $cart_kode=$this->input->post('cart_kode');
    $ongkir=$this->input->post('ongkir');
    $nongkir=explode(",",$ongkir);
    $gongkir=$nongkir[0];
    $nama=$this->input->post('nama');
    $tel=$this->input->post('tel');
    $kota=$this->input->post('kota');
    $alamat=$this->input->post('alamat');
    $message=$this->input->post('message');
    $gttal=$this->input->post('gttal');
    $coupon=$this->input->post('coupon');
    $userid=$this->input->post('userid');
    $pstatus='waiting';
    $status='proses';
    $potongan=$coupon*1000;
    $cc=$this->m_padmin->update_status_cart($cart_kode,$status);
    if($cc){

        $dd=$this->m_padmin->min_point_user($cart_kode,$userid,$coupon);

        $ongkir=$this->input->post('ongkir');
        $nongkir=explode(",",$ongkir);
        $gongkir=$nongkir[0];

        $this->m_padmin->checkout($cart_kode,$gongkir,$nama,$tel,$kota,$alamat,$message,$gttal,$pstatus,$potongan);
        echo $this->session->set_flashdata('msg','success');
        redirect('konfirmasi/'.$cart_kode);
    }
    else {
        echo "error";
    }
}


function update_user(){
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
        $config['height']= 840;
        $config['new_image']= './assets/images/'.$gbr['file_name'];
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        $gambar=$gbr['file_name'];
        $userid=$this->input->post('kode');
        $nama=$this->input->post('user_nama');
        $jk=$this->input->post('jk');
        $tel=$this->input->post('user_tel');
        $ttl=$this->input->post('user_ttl');
        $alamat=$this->input->post('alamat');
        $this->m_padmin->update_user($userid,$nama,$jk,$tel,$ttl,$alamat,$gambar);
        echo $this->session->set_flashdata('msg','success');
        redirect('account/setting');
    }else{
       $userid=$this->input->post('kode');
       $nama=$this->input->post('user_nama');
       $jk=$this->input->post('jk');
       $tel=$this->input->post('user_tel');
       $ttl=$this->input->post('user_ttl');
       $alamat=$this->input->post('alamat');
       $this->m_padmin->update_user_wo_img($userid,$nama,$jk,$tel,$ttl,$alamat);
       echo $this->session->set_flashdata('msg','success');
       redirect('account/setting');
   }
}





function konfirmasi(){
    $kode=$this->uri->segment(2);
    $x['data']=$this->m_padmin->get_konfirmasi_pembayaran($kode);
    $x['bank']=$this->m_padmin->get_all_bank();
    $this->load->view('header');
    $this->load->view('konfirmasi',$x);
    $this->load->view('footer');
}



public function detail_cart(){
    $userid=$_SESSION['userid'];
    $kode=$this->uri->segment(2);
    $x['data']=$this->m_padmin->get_detail_cart_by_kode($kode);
    $x['poinplus']=$this->m_padmin->get_point_plus_by_user($userid);
    $x['poinmin']=$this->m_padmin->get_point_minus_by_user($userid);
    $x['ongkir']=$this->m_padmin->get_ongkir();
    $this->load->view('header');
    $this->load->view('detail_cart',$x);
    $this->load->view('footer');
}

function get_ongkir(){
    $kode=$this->input->post('gongkir');
    $this->m_padmin->get_ongkir_by_kode($kode);
}

}