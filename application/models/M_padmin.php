<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_padmin extends CI_Model{


	function cekadminlogin($username,$password){
		$hasil=$this->db->query("SELECT * FROM user WHERE user_username='$username' AND user_password=md5('$password')");
		return $hasil;
	}

	function cekloginuser($username,$password,$user_role){
		$hasil=$this->db->query("SELECT * FROM user WHERE user_username='$username' AND user_password=md5('$password') AND user_role='$user_role'");
		return $hasil;
	}

	function get_max_id(){
		$hsl=$this->db->query("SELECT max(user_id) as maxuser from user");
		return $hsl; 
	}
	function cek_username_reg($username){
		$hsl=$this->db->query("SELECT * FROM user where user_username='$username'");
		return $hsl;
	}
	function get_all_user(){
		$hsl=$this->db->query("SELECT * FROM user INNER JOIN detail_user on user.user_id=detail_user.user_id");
		return $hsl;
	}
	function get_user($userid){
		$hsl=$this->db->query("SELECT * FROM user INNER JOIN detail_user on user.user_id=detail_user.user_id where user.user_id='$userid'");
		return $hsl;
	}
	function get_ongkir(){
		$hsl=$this->db->query("SELECT * FROM ongkir");
		return $hsl;
	}
	function get_inbox($userid){
		$hsl=$this->db->query("SELECT * FROM pesan inner join pemesanan on pesan.pemesanan_id=pemesanan.pemesanan_id where user_id='$userid'");
		return $hsl;
	}
	function get_inbox_detail($kode){
		$hsl=$this->db->query("SELECT * FROM pesan inner join pemesanan on pesan.pemesanan_id=pemesanan.pemesanan_id where pesan.pesan_id='$kode'");
		return $hsl;
	}
	function get_ongkir_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM ongkir where ongkir_id='$kode'");
		return $hsl;
	}
	function save_detail_user($userid,$nama){
		$hsl=$this->db->query("INSERT INTO detail_user (user_id,user_nama) values ('$userid','$nama')");
		return $hsl;
	}
	function save_register($userid,$username,$password,$email){
		$hsl=$this->db->query("INSERT INTO user (user_id,user_username,user_password,user_email,user_role) values ('$userid','$username',md5('$password'),'$email','customer')");
		return $hsl;
	}
	function get_all_transaksi_pending(){
		$hsl=$this->db->query("SELECT * FROM cart inner join user on cart.user_id=user.user_id inner join pemesanan on cart.cart_kode=pemesanan.cart_kode where cart.cart_status='proses'");
		return $hsl;
	}
	function get_all_transaksi(){
		$hsl=$this->db->query("SELECT * FROM cart inner join user on cart.user_id=user.user_id inner join pemesanan on cart.cart_kode=pemesanan.cart_kode");
		return $hsl;
	}
	function get_all_forum(){
		$hsl=$this->db->query("SELECT * FROM forum");
		return $hsl;
	}
	function update_forum($forum_id,$forum_judul,$forum_subjudul){
		$hsl=$this->db->query("UPDATE forum set forum_judul='$forum_judul',forum_subjudul='$forum_subjudul' where forum_id='$forum_id'");
		return $hsl;
	}
	function save_forum($forum_judul,$forum_subjudul){
		$hsl=$this->db->query("INSERT INTO forum (forum_judul,forum_subjudul) VALUES ('$forum_judul','$forum_subjudul')");
		return $hsl;
	}
	function get_subforum_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM forum where forum_id='$kode'");
		return $hsl;
	}
	function get_all_subforum($kode){
		$hsl=$this->db->query("SELECT * FROM topic inner join forum on topic.forum_id=forum.forum_id inner join user on topic.user_id=user.user_id inner join detail_user on user.user_id=detail_user.user_id where topic.forum_id='$kode'");
		return $hsl;
	}
	function get_all_topic($kode){
		$hsl=$this->db->query("SELECT * FROM topic inner join forum on topic.forum_id=forum.forum_id inner join user on topic.user_id=user.user_id inner join detail_user on user.user_id=detail_user.user_id where topic.topic_id='$kode'");
		return $hsl;
	}
	function get_last_message($kode){
		$hsl=$this->db->query("SELECT * FROM coment inner join user on coment.user_id=user.user_id inner join topic on coment.topic_id=topic.topic_id where topic.topic_id='$kode'  ORDER BY coment_tanggal DESC LIMIT 1");
		return $hsl;
	}
	function get_last_post($kode){
		$hsl=$this->db->query("SELECT * FROM topic inner join user on topic.user_id=user.user_id where topic.forum_id='$kode'  ORDER BY topic_tanggal DESC LIMIT 1");
		return $hsl;
	}
	function count_reply($kode){
		$hsl=$this->db->query("SELECT count(coment_id) as cntreply FROM coment  where topic_id='$kode'");
		return $hsl;
	}
	function count_topic($kode){
		$hsl=$this->db->query("SELECT count(topic_id) as cnttopic FROM topic  where forum_id='$kode'");
		return $hsl;
	}
	function count_selesai(){
		$hsl=$this->db->query("SELECT count(*) as cselesai FROM pemesanan  where pemesanan_status='selesai'");
		return $hsl;
	}
	function count_menunggu(){
		$hsl=$this->db->query("SELECT count(*) as cmenunggu FROM cart where cart_status='proses'");
		return $hsl;
	}
	function count_konfirmp(){
		$hsl=$this->db->query("SELECT count(*) as ckonf FROM cart inner join pemesanan on cart.cart_kode=pemesanan.cart_kode where cart_status='selesai' && pemesanan.pemesanan_status='waiting'");
		return $hsl;
	}
	function count_topuser(){
		$hsl=$this->db->query("SELECT count(cart.user_id) as cuser,user.user_username,user_foto from cart inner join user on cart.user_id=user.user_id inner join detail_user on cart.user_id=detail_user.user_id where cart.cart_status='selesai' group by cart.user_id order by cuser desc limit 5");
		return $hsl;
	}


	function count_topbiaya(){
		$hsl=$this->db->query("SELECT sum(cart.cart_total) as sumbiaya,user.user_username,detail_user.user_foto from cart inner join user on cart.user_id=user.user_id inner join detail_user on cart.user_id=detail_user.user_id  where cart.cart_status='selesai' group by cart.user_id order by sumbiaya desc limit 5");
		return $hsl;
	}



	function get_all_reply($kode){
		$hsl=$this->db->query("SELECT * FROM coment inner join topic on coment.topic_id=topic.topic_id inner join user on coment.user_id=user.user_id inner join detail_user on coment.user_id=detail_user.user_id where coment.topic_id='$kode'");
		return $hsl;
	}
	function g_forum_by_topic($cc){
		$hsl=$this->db->query("SELECT * FROM topic where topic_id='$cc'");
		return $hsl;
	}
	function save_post($forum,$userid,$judul,$isi){
		$hsl=$this->db->query("INSERT INTO topic (forum_id,user_id,topic_judul,topic_isi) VALUES ('$forum','$userid','$judul','$isi')");
		return $hsl;
	}
	function save_reply($topic,$userid,$isi){
		$hsl=$this->db->query("INSERT INTO coment (topic_id,user_id,coment_isi) VALUES ('$topic','$userid','$isi')");
		return $hsl;
	}

	function konfirmasi_trans($kode){
		$hsl=$this->db->query("UPDATE pemesanan SET pemesanan_status='packing' where cart_kode='$kode'");
		return $hsl;
	}


	function konfirmasi_selesai($user_id,$pemesanan_id,$message,$gambar){
		$hsl=$this->db->query("insert into pesan(user_id,pemesanan_id,pesan_message,pesan_file) values ('$user_id','$pemesanan_id','$message','$gambar')");
		return $hsl;   
	}  
	
	function shipping(){
		$hsl=$this->db->query("SELECT * FROM  pemesanan inner join cart on pemesanan.cart_kode=cart.cart_kode inner join user on cart.user_id=user.user_id where pemesanan_status='packing'");
		return $hsl;
	}

	function get_cart_harga($kode){
		$hsl=$this->db->query("SELECT user_id,cart_total as total from cart where cart_kode='$kode'");
		return $hsl;
	}

	function add_point_user($kode,$user){
		$hsl=$this->db->query("INSERT into poin (user_id,transaksi_kode,poin_jumlah,poin_status) VALUES('$user','$kode','10','mendapatkan')");
		return $hsl;
	}


	function min_point_user($cart_kode,$userid,$coupon){
		$hsl=$this->db->query("INSERT into poin (user_id,transaksi_kode,poin_jumlah,poin_status) VALUES('$userid','$cart_kode','$coupon','menggunakan')");
		return $hsl;
	}
	function konfirmasi_cart($kode){
		$hsl=$this->db->query("UPDATE cart SET cart_status='selesai' where cart_kode='$kode'");
		return $hsl;
	}

	function get_all_transaksi_conf(){
		$hsl=$this->db->query("SELECT * FROM cart inner join user on cart.user_id=user.user_id inner join pemesanan on cart.cart_kode=pemesanan.cart_kode inner join pembayaran on cart.cart_kode=pembayaran.cart_kode where pemesanan.pemesanan_status='waiting'");
		return $hsl;
	}

	function getDown($kode)
	{
		$this->load->helper('download');
		$this->db->select('*');
		$this->db->where('pembayaran_id',$kode);
		$query =  $this->db->get('pembayaran');
		foreach ($query->result() as $row)
		{
			$nfile = file_get_contents(base_url()."assets/images/".$row->pembayaran_file);
			$file_name = $row->pembayaran_file;
		}
		force_download($file_name, $nfile);
	}

	function download($kode)
	{
		$this->load->helper('download');
		$this->db->select('*');
		$this->db->where('pesan_id',$kode);
		$query =  $this->db->get('pesan');
		foreach ($query->result() as $row)
		{
			$nfile = file_get_contents(base_url()."assets/images/".$row->pesan_file);
			$file_name = $row->pesan_file;
		}
		force_download($file_name, $nfile);
	}

	function get_list_group(){
		$hsl=$this->db->query("select DISTINCT list_id from list GROUP by list_id");
		return $hsl; 
	}
	function get_kategori_group(){
		$hsl=$this->db->query("select DISTINCT type_id from kategori GROUP by kategori_id");
		return $hsl; 
	}
	function save_kategori($tipe,$kategori_nama){
		$hsl=$this->db->query("insert into kategori(type_id,kategori_nama) values ('$tipe','$kategori_nama')");
		return $hsl;   
	}  

	function save_rm_kategori($rm_kategori_nama,$rm_kategori_jenis){
		$hsl=$this->db->query("insert into rm_kategori(rm_kategori_nama,rm_kategori_jenis) values ('$rm_kategori_nama','$rm_kategori_jenis')");
		return $hsl;   
	}  

	function save_repairmodif($rm_kode,$rm_kategori_jenis,$rm_nama,$rm_harga){
		$hsl=$this->db->query("insert into repairmodif(rm_kode,rm_kategori_id,rm_nama,rm_harga) values ('$rm_kode','$rm_kategori_jenis','$rm_nama','$rm_harga')");
		return $hsl;   
	}  

	function  get_all_kategori(){
		$hsl=$this->db->query("SELECT * from kategori inner join type on kategori.type_id=type.type_id");
		return $hsl;
	}

	function  get_all_rm_kategori(){
		$hsl=$this->db->query("SELECT * from rm_kategori");
		return $hsl;
	}

	function  get_all_rm_item(){
		$hsl=$this->db->query("SELECT * from repairmodif inner join rm_kategori on repairmodif.rm_kategori_id=rm_kategori.rm_kategori_id");
		return $hsl;
	}

	function  get_cart_by_user($userid){
		$hsl=$this->db->query("SELECT * from cart where user_id='$userid'  && cart_status='menunggu' order by cart_tanggal");
		return $hsl;
	}
	
	function  get_cart_by_user_limit($userid){
		$hsl=$this->db->query("SELECT * from cart where user_id='$userid'  && cart_status='menunggu'  order by cart_tanggal desc limit 4 ");
		return $hsl;
	}

	function  get_total_cart($userid){
		$hsl=$this->db->query("SELECT count(*) as totalcart from cart where user_id='$userid'  && cart_status='menunggu'");
		return $hsl;
	}
	function  count_pembayaran($userid){
		$hsl=$this->db->query("SELECT count(*) as cpemb from cart where user_id='$userid'  && cart_status='proses'");
		return $hsl;
	}
	function  count_konfirmasi($userid){
		$hsl=$this->db->query("SELECT count(cart.cart_kode) as cconf from cart inner join pemesanan on cart.cart_kode=pemesanan.cart_kode inner join pembayaran on pemesanan.cart_kode=pembayaran.cart_kode    where cart.user_id='$userid' && pemesanan.pemesanan_status='waiting'");
		return $hsl;
	}
	
	function get_detail_cart_by_kode($kode){
		$hsl=$this->db->query("SELECT * from cart inner join type on cart.type_id= type.type_id inner join shape on cart.shape_id=shape.shape_id where cart_kode='$kode'");
		return $hsl;
	}

	function get_brg_by_kode($item){
		$hsl=$this->db->query("SELECT * FROM barang inner join list on barang.list_id=list.list_id where barang_kode='$item'");
		return $hsl;
	}

	function update_kategori($kategori_id,$tipe,$kategori_nama){
		$hsl=$this->db->query("update kategori set type_id='$tipe',kategori_nama='$kategori_nama' where kategori_id='$kategori_id'");
		return $hsl;
	}

	function update_rm_kategori($rm_kategori_id,$rm_kategori_nama,$rm_kategori_jenis){
		$hsl=$this->db->query("update rm_kategori set rm_kategori_nama='$rm_kategori_nama',rm_kategori_jenis='$rm_kategori_jenis' where rm_kategori_id='$rm_kategori_id'");
		return $hsl;
	}

	function update_repairmodif($kode,$rm_kategori_jenis,$rm_nama,$rm_harga){
		$hsl=$this->db->query("update repairmodif set rm_kode='$kode',rm_kategori_id='$rm_kategori_jenis',rm_nama='$rm_nama',rm_harga='$rm_harga' where rm_kode='$kode'");
		return $hsl;
	}



	function update_user($userid,$nama,$jk,$tel,$ttl,$alamat,$gambar){
		$hsl=$this->db->query("update detail_user set user_nama='$nama',user_jk='$jk',user_tgl_lahir='$ttl',user_tel='$tel',user_alamat='$alamat',user_foto='$gambar' where user_id='$userid'");
		return $hsl;
	}
	function update_user_wo_img($userid,$nama,$jk,$tel,$ttl,$alamat){
		$hsl=$this->db->query("update detail_user set user_nama='$nama',user_jk='$jk',user_tgl_lahir='$ttl',user_tel='$tel',user_alamat='$alamat' where user_id='$userid'");
		return $hsl;
	}
	function get_type_cart($type){
		$hsl=$this->db->query("SELECT * FROM type where type_id='$type'");
		return $hsl;
	}
	function get_shape_cart($shape){
		$hsl=$this->db->query("SELECT * FROM shape where shape_id='$shape'");
		return $hsl;
	}
	function get_barang_cart($abrg){
		$hsl=$this->db->query("SELECT * from barang inner join list on barang.list_id=list.list_id where barang.barang_kode='$abrg'");
		return $hsl;
	}
	function delete_kategori($kode){
		$hsl=$this->db->query("delete from kategori where kategori_id='$kode'");
		return $hsl;
	}
	function delete_rm_kategori($kode){
		$hsl=$this->db->query("delete from rm_kategori where rm_kategori_id='$kode'");
		return $hsl;
	}
	function delete_repairmodif($kode){
		$hsl=$this->db->query("delete from repairmodif where rm_kode='$kode'");
		return $hsl;
	}
	function delete_bank($kode){
		$hsl=$this->db->query("delete from bank where bank_id='$kode'");
		return $hsl;
	}

	function get_repair_kat(){
		$hsl=$this->db->query("SELECT * FROM rm_kategori where rm_kategori_jenis='repair'");
		return $hsl;
	}

	function get_modif_kat(){
		$hsl=$this->db->query("SELECT * FROM rm_kategori where rm_kategori_jenis='modif'");
		return $hsl;
	}
	function get_point_plus_by_user($userid){
		$hsl=$this->db->query("SELECT sum(poin_jumlah) as jumpoinplus from poin where user_id='$userid' AND poin_status='mendapatkan'");
		return $hsl;
	}
	function get_point_minus_by_user($userid){
		$hsl=$this->db->query("SELECT sum(poin_jumlah) as jumpoinmin from poin where user_id='$userid' AND poin_status='menggunakan'");
		return $hsl;
	}
	function get_item_by_kat($koder){
		$hsl=$this->db->query("SELECT * FROM repairmodif where rm_kategori_id='$koder'");
		return $hsl;
	}
	function get_all_laporan(){
		$hsl=$this->db->query("SELECT * from pemesanan where pemesanan_status='selesai'");
		return $hsl;
	}
	function get_laporan_by_date($date1,$date2){
		$hsl=$this->db->query("SELECT * from pemesanan where pemesanan_date between '$date1' and '$date2' AND pemesanan_status='selesai'");
		return $hsl;
	}
	function get_kategori_by_type($kattypeid){
		$hsl=$this->db->query("select * from kategori where type_id='$kattypeid'");
		return $hsl; 
	}

	function save_list($kategori,$nama_list){
		$hsl=$this->db->query("insert into list(kategori_id,list_nama) values ('$kategori','$nama_list')");
		return $hsl;   
	}  

	function  get_all_list(){
		$hsl=$this->db->query("SELECT * from list inner join kategori on list.kategori_id=kategori.kategori_id inner join type on kategori.type_id=type.type_id order by kategori_nama asc");
		return $hsl;
	}

	function update_list($list_id,$kategori,$nama_list){
		$hsl=$this->db->query("update list set kategori_id='$kategori',list_nama='$nama_list' where list_id='$list_id'");
		return $hsl;
	}
	
	function delete_list($kode){
		$hsl=$this->db->query("delete from list where list_id='$kode'");
		return $hsl;
	}


	function save_type($type_nama,$type_ket){
		$hsl=$this->db->query("insert into type(type_nama,type_ket) values ('$type_nama','$type_ket')");
		return $hsl;   
	}  

	function  get_all_type(){
		$hsl=$this->db->query("SELECT * from type ");
		return $hsl;
	}

	function update_type($type_id,$type_nama,$type_ket){
		$hsl=$this->db->query("update type set type_nama='$type_nama',type_ket='$type_ket' where type_id='$type_id'");
		return $hsl;
	}
	
	function delete_type($kode){
		$hsl=$this->db->query("delete from type where type_id='$kode'");
		return $hsl;
	}	

	function save_shape($tipe,$shape_nama,$gambar){
		$hsl=$this->db->query("insert into shape(type_id,shape_nama,shape_gambar) values ('$tipe','$shape_nama','$gambar')");
		return $hsl;   
	}  

	function get_shape_group(){
		$hsl=$this->db->query("select DISTINCT type_id from shape GROUP by shape_id");
		return $hsl; 
	}

	function get_shape_by_type($idtype){
		$hsl=$this->db->query("select * from shape where type_id='$idtype'");
		return $hsl; 
	}

	function  get_all_shape(){
		$hsl=$this->db->query("SELECT * from shape inner join type on shape.type_id=type.type_id");
		return $hsl;
	}


	function get_max_id_cart(){
		$hsl=$this->db->query("SELECT count(*) as count_ck from cart");
		return $hsl;
	}

	function save_to_chart($cart_kd,$usrid,$type_id,$shape_id,$barangkode,$totalharga,$message){
		$hsl=$this->db->query("INSERT INTO cart (cart_kode,user_id,type_id,shape_id,barang_kode,cart_total,cart_message) VALUES ('$cart_kd','$usrid','$type_id','$shape_id','$barangkode','$totalharga','$message')");
		return $hsl;
	}

	function update_shape($shape_id,$tipe,$shape_nama,$gambar){
		$hsl=$this->db->query("update shape set type_id='$tipe',shape_nama='$shape_nama',shape_gambar='$gambar' where shape_id='$shape_id'");
		return $hsl;
	}
	function update_shape_wo_img($shape_id,$tipe,$shape_nama){
		$hsl=$this->db->query("update shape set type_id='$tipe',shape_nama='$shape_nama' where shape_id='$shape_id'");
		return $hsl;
	}
	
	function delete_shape($kode){
		$hsl=$this->db->query("delete from shape where shape_id='$kode'");
		return $hsl;
	}

	function get_barang_by_list($listid){
		$hsl=$this->db->query("SELECT * FROM barang inner join list on barang.list_id=list.list_id inner join kategori on list.kategori_id=kategori.kategori_id where list.list_id='$listid'");
		return $hsl;   
	}
	function get_barang_by_kat($katid){
		$hsl=$this->db->query("SELECT * FROM barang inner join list on barang.list_id=list.list_id inner join kategori on list.kategori_id=kategori.kategori_id where list.kategori_id='$katid' group by barang.list_id");
		return $hsl;   
	}
	function save_barang($barang_kode,$list,$barang_nama,$barang_harga,$barang_ket,$gambar){
		$hsl=$this->db->query("INSERT into barang (barang_kode,list_id,barang_nama,barang_harga,barang_ket,barang_gambar) VALUES ('$barang_kode','$list','$barang_nama','$barang_harga','$barang_ket','$gambar')");
		return $hsl;   
	}  
	function save_barang_wo_img($barang_kode,$list,$barang_nama,$barang_harga,$barang_ket){
		$hsl=$this->db->query("INSERT into barang (barang_kode,list_id,barang_nama,barang_harga,barang_ket) VALUES ('$barang_kode','$list','$barang_nama','$barang_harga','$barang_ket')");
		return $hsl;   
	}  
	function  get_all_barang(){
		$hsl=$this->db->query("SELECT * from barang inner join list on barang.list_id=list.list_id");
		return $hsl;
	}

	function update_barang($barang_kode,$list,$barang_nama,$barang_harga,$barang_ket,$gambar){
		$hsl=$this->db->query("update barang set list_id='$list',barang_nama='$barang_nama',barang_harga='$barang_harga',barang_ket='$barang_ket',barang_gambar='$gambar' where barang_kode='$barang_kode'");
		return $hsl;
	}
	function update_barang_wo_img($barang_kode,$list,$barang_nama,$barang_harga,$barang_ket){
		$hsl=$this->db->query("update barang set list_id='$list',barang_nama='$barang_nama',barang_harga='$barang_harga',barang_ket='$barang_ket' where barang_kode='$barang_kode'");
		return $hsl;
	}
	
	function update_bank($kode,$bank,$pemilik,$norek,$gambar){
		$hsl=$this->db->query("update bank set bank_nama='$bank',bank_pemilik='$pemilik',bank_norek='$norek',bank_file='$gambar' where bank_id='$kode'");
		return $hsl;
	}
	function update_bank_wo_img($kode,$bank,$pemilik,$norek){
		$hsl=$this->db->query("UPDATE bank set bank_nama='$bank',bank_pemilik='$pemilik',bank_norek='$norek' where bank_id='$kode'");
		return $hsl;
	}
	function save_pembayaran($cart_kode,$bank_id,$gambar){
		$hsl=$this->db->query("INSERT into pembayaran (cart_kode,bank_id,pembayaran_file,pembayaran_date) VALUES ('$cart_kode','$bank_id','$gambar',NOW())");
		return $hsl;
	}
	function  save_portfolio($user_id,$judul,$keterangan,$gambar){
		$hsl=$this->db->query("INSERT into portfolio (user_id,portfolio_judul,portfolio_keterangan,portfolio_foto,portfolio_tanggal) VALUES ('$user_id','$judul','$keterangan','$gambar',NOW())");
		return $hsl;
	}
	function delete_barang($kode){
		$hsl=$this->db->query("delete from barang where barang_kode='$kode'");
		return $hsl;
	}
	function get_portfolio_by_user($userid){
		$hsl=$this->db->query("SELECT * FROM portfolio where portfolio.user_id='$userid'");
		return $hsl;
	}

	function get_portfolio_home(){
		$hsl=$this->db->query("SELECT * FROM portfolio  inner join user on portfolio.user_id=user.user_id  limit 8");
		return $hsl;
	}

	function get_kode_barang(){
		$hsl=$this->db->query("SELECT count(*) as idbarang from barang");
		return $hsl;
	}

	function get_all_bank(){
		$hsl=$this->db->query("SELECT * from bank");
		return $hsl;
	}

	function save_bank($bank,$pemilik,$norek,$gambar){
		$hsl=$this->db->query("INSERT into bank (bank_nama,bank_pemilik,bank_norek,bank_file) VALUES ('$bank','$pemilik','$norek','$gambar')");
		return $hsl;   
	}  

	function get_detail_invoice($kode){
		$hsl=$this->db->query("SELECT * from cart inner join pemesanan on cart.cart_kode = pemesanan.cart_kode inner join user on cart.user_id = user.user_id inner join detail_user on cart.user_id=detail_user.user_id inner join ongkir on pemesanan.ongkir_id=ongkir.ongkir_id inner join type on cart.type_id= type.type_id inner join shape on cart.shape_id=shape.shape_id where cart.cart_kode='$kode'");
		return $hsl;
	}

	function get_konfirmasi_pembayaran($kode){
		$hsl=$this->db->query("SELECT * from cart inner join pemesanan on cart.cart_kode = pemesanan.cart_kode inner join user on cart.user_id = user.user_id inner join detail_user on cart.user_id=detail_user.user_id inner join ongkir on pemesanan.ongkir_id=ongkir.ongkir_id where cart.cart_kode='$kode'");
		return $hsl;
	}
	function get_transaksi_by_user($userid){
		$hsl=$this->db->query("SELECT * from cart inner join pemesanan on cart.cart_kode = pemesanan.cart_kode inner join user on cart.user_id = user.user_id where cart.cart_status='proses' AND cart.user_id='$userid'");
		return $hsl;
	}
	function get_trans_comfir($userid){
		$hsl=$this->db->query("SELECT * from cart inner join pemesanan on cart.cart_kode = pemesanan.cart_kode inner join user on cart.user_id = user.user_id where cart.cart_status='selesai' AND cart.user_id='$userid'");
		return $hsl;
	}

	function get_barang_home(){
		$hsl=$this->db->query("SELECT * FROM barang inner join list on barang.list_id=list.list_id inner join kategori on list.kategori_id=kategori.kategori_id limit 16");
		return $hsl;
	}
	function get_list_home(){
		$hsl=$this->db->query("SELECT * FROM list");
		return $hsl;
	}

	function get_user_data($userid){
		$hsl=$this->db->query("SELECT * FROM user inner join detail_user on user.user_id=detail_user.user_id where user.user_id='$userid'");
		return $hsl;
	}

	function checkout($cart_kode,$gongkir,$nama,$tel,$kota,$alamat,$message,$gttal,$pstatus,$potongan){
		$hsl=$this->db->query("INSERT INTO pemesanan(cart_kode,ongkir_id,pemesanan_nama,pemesanan_tel,pemesanan_kota,pemesanan_alamat,pemesanan_message,pemesanan_total,pemesanan_diskon,pemesanan_status,pemesanan_date) VALUES ('$cart_kode','$gongkir','$nama','$tel','$kota','$alamat','$message','$gttal','$potongan','$pstatus',NOW())");
		return $hsl;
	}
	function update_status_cart($cart_kode,$status){
		$hsl=$this->db->query("UPDATE cart SET cart_status='$status' where cart_kode='$cart_kode'");
		return $hsl;
	}
	function update_status_selesai($pemesanan_id,$status){
		$hsl=$this->db->query("UPDATE pemesanan SET pemesanan_status='$status' where pemesanan_id='$pemesanan_id'");
		return $hsl;
	}

}