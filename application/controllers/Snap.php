<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-JvYag_d_4N0RsrdxQoMTNWML', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');	
		$this->load->model("Member_model");
		$this->load->library('session');
    }

    public function index()
    {
    	$this->load->view('checkout_snap');
    }
	
    public function token()
    {
		$nisn = $this->input->post('nisn');
		$this->session->set_userdata('nisn', $nisn);
		$nama = $this->input->post('nama');
		$nominal = $this->input->post('nominal');
		$keterangan = $this->input->post('keterangan');
		// Required
		$transaction_details = array(
		  'order_id' => rand(),
		  'gross_amount' => $nominal, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
		  'id' => 'a1',
		  'price' => $nominal,
		  'quantity' => 1,
		  'name' => $keterangan
		);
		$member = $this->Member_model->show_billing($nisn);

		foreach($member as $i){
			$id = $i->id_transaksi;
			$telepon = '085812335960';
			$email = $i->username;
			$alamat = 'semen';
			$kode_pos = '64161';
			$kecamatan = 'semen';
		}
		

		// Optional
		$item_details = array ($item1_details);

		// Optional
		$billing_address = array(
		  'first_name'    => $nisn,
		  'last_name'     => $nama,
		  'address'       => $alamat,
		  'city'          => $kecamatan,
		  'postal_code'   => $kode_pos,
		  'phone'         => $telepon,
		  'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
			'first_name'    => "Streaming",
			'last_name'     => "KEDIRI",
			'address'       => "Jl. Hasanudin No.10, Dandangan",
			'city'          => "Kediri",
			'postal_code'   => "16601",
			'phone'         => "08113366345",
			'country_code'  => 'IDN'
		  );

		// Optional
		$customer_details = array(
		  'first_name'    => $nisn,
		  'last_name'     => $nama,
		  'email'         => $email,
		  'phone'         => $telepon,
		  'billing_address'  => $billing_address,
		  'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'minute', 
            'duration'  => 3600
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }

    public function finish()
    {
    	$result = json_decode($this->input->post('result_data'),true);
		
		$data = [
			'order_id' => $result['order_id'],
			'gross_amount' => $result['gross_amount'],
			'payment_type' => $result['payment_type'],
			'transaction_time' => $result['transaction_time'],
			'bank' => $result['va_numbers'][0]['bank'],
			'va_number' =>  $result['va_numbers'][0]['va_number'],
			'pdf_url' => $result['pdf_url'],
			'status_code' => $result['status_code']
		];
    	
		$bayar = $this->db->insert('tb_bayar',$data);
		if($bayar){
			$tagihan = $this->m_pembayaran->updateTagihan($this->session->nisn,$result['order_id']);
			redirect('backend/history_pembayaran');
		}else{
			echo "gagal";
		}

    }
}
