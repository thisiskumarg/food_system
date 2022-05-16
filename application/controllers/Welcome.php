<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->helper(array('url','form','html'));
		$this->load->helper('file');
		$this->load->model('Model');
		$this->load->library('session');
    }

	public function register()
	{
		$this->load->view('header');
		$this->load->view('register');
		$this->load->view('footer');
	}

	public function signup()
	{
		$res = $this->Model->signup();

		if(!empty($res))
		{
			redirect('Welcome/login');
		}
		else
		{
			$this->session->set_flashdata('msg', 'All fields are mendatory!');
			redirect('Welcome/register');
		}
	}

	public function login()
	{
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function signin()
	{
		$res = $this->Model->signin();

		if($res == '0')
		{
			$this->session->set_flashdata('msg', 'Invalid Email or Password!');
			redirect('Welcome/login');
		}
		elseif($res == '2')
		{
			$this->session->set_flashdata('msg', 'Invalid Email or Password!');
			redirect('Welcome/login');
		}
		elseif($res == '3')
		{
			$this->session->set_flashdata('msg', 'All fields are mendatory!');
			redirect('Welcome/login');
		}
		else
		{
			$v = $res['v'];
			if($v == '1')
			{
				$_SESSION['uid'] = $res['uid'];
				$_SESSION['roleid'] = $res['roleid'];
				if($_SESSION['roleid'] == '3')
				{
					redirect('Welcome/index');
				}
				else
				{
					redirect('Welcome/dash');
				}
			}
			else
			{
				$this->session->set_flashdata('msg', 'You are not verified, Please wait untill verify!');
				redirect('Welcome/login');
			}
		}
	}

	public function index()
	{
			$data['result2'] = $this->Model->index_category();
			$data['result3'] = $this->Model->index_city();

			$this->load->view('header');
			$this->load->view('shop', $data);
			$this->load->view('footer');
	}

	public function more_data()
	{
		$limit = $this->input->post('limit');
		$output = "";
		$res = $this->Model->more_data($limit);
		if(!empty($res))
		{
			foreach($res as $row1)
			{
				$bsno = $row1['bsno'];
				$bimg = base_url($row1['bphoto']);
				$bname = $row1['bname'];
				$bcity = $row1['bcityname'];
				$bview = $row1['bviews'];

				$output .= '
				<div class="col-lg-4 col-md-6 col-sm-6 pb-1">
					<div class="product-item bg-light mb-4">
						<div class="product-img position-relative overflow-hidden">
							<a href="'.site_url('Welcome/businessdetail/').$bsno.'">
								<img class="img-fluid rounded w-100" src="'.$bimg.'" alt="" class="img-fluid" style="height: 300px; width: 100px;">
							</a>
						</div>
						<div class="text-center py-4">
							<a class="h6 text-decoration-none" href="'.site_url('Welcome/businessdetail/').$bsno.'">
								<h5 class="text-info">'.$bname.'</h5>
							</a>
							<div class="d-flex align-items-center justify-content-center mt-2">
								<h6>'.$bcity.'</h6>
							</div>
							<div class="d-flex align-items-center justify-content-center mt-2">
								<h6>Views: '.$bview.'</h6>
							</div>
							<a href="'.site_url('Welcome/businessdetail/').$bsno.'" class="col-sm-10 btn btn-primary">View Business Products</a>
						</div>
					</div>
				</div>';
			}
			echo $output;
		}
		else
		{
			$output = $output == ""  ? "1" : $output;
			echo $output;
		}
	}

	public function filter()
	{
		$result = $this->Model->filter_vendor();

		if($result)
		{
			$output = "";
			foreach($result as $row)
			{
				$output .= '
				<div class="col-lg-4 col-md-6 col-sm-6 pb-1">
					<div class="product-item bg-light mb-4">
						<div class="product-img position-relative overflow-hidden">
							<a href="'.site_url('Welcome/businessdetail/').$row['bsno'].'">
								<img class="img-fluid rounded w-100" src="'.base_url($row['bphoto']).'" alt="" style="height: 300px; width: 100px;">
							</a>
						</div>
						<div class="text-center py-4">
							<a class="h6 text-decoration-none" href="'.site_url('Welcome/businessdetail/').$row['bsno'].'">
								<h5 class="text-info">'.$row['bname'].'</h5>
							</a>
							<div class="d-flex align-items-center justify-content-center mt-2">
								<h6>'.$row['bcityname'].'</h6>
							</div>
							<div class="d-flex align-items-center justify-content-center mt-2">
								<h6>Views: '.$row['bviews'].'</h6>
							</div>
							<a href="'.site_url('Welcome/businessdetail/').$row['bsno'].'" class="col-sm-10 btn btn-primary">View Business Products</a>
						</div>
					</div>
				</div>';
			}
			echo $output;
		}
	}

	public function isearch()
	{
		$result = $this->Model->isearch();

		$output = '';
		if(!empty($result))
		{
			foreach($result as $row)
			{
				$output .= '
				<div class="col-lg-4 col-md-6 col-sm-6 pb-1">
					<div class="product-item bg-light mb-4">
						<div class="product-img position-relative overflow-hidden">
							<a href="'.site_url('Welcome/businessdetail/').$row['bsno'].'">
								<img class="img-fluid rounded w-100" src="'.base_url($row['bphoto']).'" alt="" style="height: 300px; width: 100px;">
							</a>
						</div>
						<div class="text-center py-4">
							<a class="h6 text-decoration-none" href="'.site_url('Welcome/businessdetail/').$row['bsno'].'">
								<h5 class="text-info">'.$row['bname'].'</h5>
							</a>
							<div class="d-flex align-items-center justify-content-center mt-2">
								<h6>'.$row['bcityname'].'</h6>
							</div>
							<div class="d-flex align-items-center justify-content-center mt-2">
								<h6>Views: '.$row['bviews'].'</h6>
							</div>
							<a href="'.site_url('Welcome/businessdetail/').$row['bsno'].'" class="col-sm-10 btn btn-primary">View Business Products</a>
						</div>
					</div>
				</div>';
			}
			echo $output;
		}
		else
		{
			$output = $output == ''?'<h4 class="text-danger">No More Record Found</h4>':$output;
			echo $output;
		}
	}

	public function dash()
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$roleid = $_SESSION['roleid'];

			if($roleid == '1')
			{
				$res = $this->Model->dash($uid, $roleid);
				$data['result1'] = $res['users'];
				$data['result2'] = $res['business'];
				$data['result3'] = $res['products'];
				$data['result4'] = $res['bcity'];
				$data['result5'] = $res['blocation'];
				$data['result6'] = $res['bcategory'];

				$this->load->view('adminheader');
				$this->load->view('admindash', $data);
				$this->load->view('footer');
			}
			elseif($roleid == '2')
			{
				$res = $this->Model->dash($uid, $roleid);
				$data['result1'] = $res['products'];
				$data['result2'] = $res['business'];
				$data['vendorresult'] = $this->Model->get_vendor_business($uid);

				$this->load->view('vendorheader', $data);
				$this->load->view('vendordash');
				$this->load->view('footer');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function businessdetail($bsno)
	{
		if(isset($_SESSION['uid']))
		{
			$roleid = $_SESSION['roleid'];
			$data['result1'] = $this->Model->bpdetail($bsno);
			$data['result2'] = $this->Model->bdetail($bsno);
			$data['bsno'] = $bsno;
			$role['roleid'] = $_SESSION['roleid'];
			$res = $this->Model->bviews($roleid, $bsno);
	
			$this->load->view('header', $role);
			$this->load->view('businessdetail', $data);
			$this->load->view('footer');
		}
		else
		{
			$data['result1'] = $this->Model->bpdetail($bsno);
			$data['result2'] = $this->Model->bdetail($bsno);
			$data['bsno'] = $bsno;

			$this->load->view('header');
			$this->load->view('businessdetail', $data);
			$this->load->view('footer');
		}
	}

	public function cart()
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$role['roleid'] = $_SESSION['roleid'];
			$data['result'] = $this->Model->cart($uid);

			$this->load->view('header', $role);
			$this->load->view('cart', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function addtocart()
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$res = $this->Model->addtocart($uid);

			if(!empty($res))
			{
				redirect('Welcome/cart');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function changecartpq($cartid)
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->changecartpq($cartid);

			if(!empty($res))
			{
				redirect('Welcome/cart');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function delcartpro($cartid)
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->delcartpro($cartid);

			if(!empty($res))
			{
				redirect('Welcome/cart');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function changebilldetails()
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$res = $this->Model->changebilldetails($uid);

			if(!empty($res))
			{
				redirect('Welcome/checkout');
			}
			else
			{
				$this->session->set_flashdata('msg', 'All fields are mandatory!');
				redirect('Welcome/checkout');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function get_city()
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->get_city();

			$output = "";
			if(!empty($res))
			{
				$output = '<option selected disabled>--- Your Cities ---</option>';
				foreach($res as $row)
				{
					$output .= '<option value="'.$row['billcid'].'">'.$row['billcityname'].'</option>';
				}
				echo $output;
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function checkout()
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$role['roleid'] = $_SESSION['roleid'];
			$data['billdetails'] = $this->Model->checkout($uid);
			$data['billstate'] = $this->Model->billstate();
			$data['billcart'] = $this->Model->billcart($uid);

			$this->load->view('header', $role);
			$this->load->view('checkout', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function payment($sp, $billid)
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$result = $this->Model->buyerdetails($uid);
			foreach($result as $row)
			{
				$name = $row['name'];
				$mobile = $row['mobile'];
				$email = $row['email'];
			}

			$mode = $this->input->post('payment');
			if($mode == 'cod')
			{
				$res = $this->Model->beforesuccess($uid, $sp, $billid, null);

				if(!empty($res))
				{
					redirect('Welcome/success');
				}
			}
			elseif($mode == 'online')
			{
				$ch = curl_init();
	
				curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
				curl_setopt($ch, CURLOPT_HEADER, FALSE);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
				curl_setopt($ch, CURLOPT_HTTPHEADER,
							array("X-Api-Key:test_f71505af1b338c8b51f9607dd20",
								"X-Auth-Token:test_d0e0deb079819d4c6f91ed67e20"));
				$payload = Array(
					'purpose' => 'ordering food',
					'amount' => $sp,
					'phone' => $mobile,
					'buyer_name' => $name,
					'redirect_url' => site_url('Welcome/beforesuccess/').$sp.'/'.$billid.'/'.$mode,
					'send_email' => true,
					'webhook' => 'http://www.example.com/webhook/',
					'send_sms' => true,
					'email' => $email,
					'allow_repeated_payments' => false
				);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
				$response = curl_exec($ch);
				curl_close($ch);

				$data = json_decode($response, true);
				if(isset($data['success']) && $data['success'] === true)
				{
					$site = $data['payment_request']['longurl'];
					redirect($site);
				}
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function beforesuccess($sp, $billid, $mode)
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$res = $this->Model->beforesuccess($uid, $sp, $billid, $mode);

			if(!empty($res))
			{
				redirect('Welcome/success');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function success()
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$role['roleid'] = $_SESSION['roleid'];

			$this->load->view('header', $role);
			$this->load->view('success');
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function uorders()
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$data['result'] = $this->Model->profile($uid);
			$data['uorders'] = $this->Model->uorders($uid);

			$this->load->view('userheader', $data);
			$this->load->view('uorders');
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function ureviews()
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$data['result'] = $this->Model->profile($uid);
			// $data['uorders'] = $this->Model->uorders($uid);

			$this->load->view('userheader', $data);
			$this->load->view('ureviews');
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function contact()
	{
		if(isset($_SESSION['uid']))
		{
			$this->load->view('header');
			$this->load->view('contact');
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function detail($bsno, $psno)
	{
		if(isset($_SESSION['uid']))
		{
			$data['result'] = $this->Model->pdetail($psno);
			$data['result1'] = $this->Model->bpdetail($bsno);
			$role['roleid'] = $_SESSION['roleid'];
	
			$this->load->view('header', $role);
			$this->load->view('detail', $data);
			$this->load->view('footer');
		}
		else
		{
			$data['result'] = $this->Model->pdetail($psno);
			$data['result1'] = $this->Model->bpdetail($bsno);

			$this->load->view('header');
			$this->load->view('detail', $data);
			$this->load->view('footer');
		}
	}

	public function profile()
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$roleid = $_SESSION['roleid'];
			$data['result'] = $this->Model->profile($uid);
	
			if($roleid == '1')
			{
				$this->load->view('adminheader');
			}
			elseif($roleid == '2')
			{
				$data['vendorresult'] = $this->Model->get_vendor_business($uid);
				$this->load->view('vendorheader', $data);
			}
			elseif($roleid == '3')
			{
				$this->load->view('userheader', $data);
			}
			$data['roleid'] = $roleid;

			$this->load->view('profile', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function editprofile()
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$roleid = $_SESSION['roleid'];
			$data['result'] = $this->Model->profile($uid);
	
			if($roleid == '1')
			{
				$this->load->view('adminheader');
			}
			elseif($roleid == '2')
			{
				$data['vendorresult'] = $this->Model->get_vendor_business($uid);
				$this->load->view('vendorheader', $data);
			}
			elseif($roleid == '3')
			{
				$this->load->view('userheader', $data);
			}
			$data['roleid'] = $roleid;

			$this->load->view('editprofile', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function updateprofile()
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$data['result'] = $this->Model->updateprofile($uid);
	
			if(!empty($data['result']))
			{
				redirect('Welcome/profile');
			}
			else
			{
				$this->session->set_flashdata('msg', 'All fields are mandatory!');
				redirect('Welcome/editprofile');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function updateprofilepic()
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$res = $this->Model->updateprofilepic($uid);
	
			if(!empty($res))
			{
				redirect('Welcome/profile');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Enter valid image');
				redirect('Welcome/profile');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function managevendors()
	{
		if(isset($_SESSION['uid']))
		{
			$data['result'] = $this->Model->vendors();

			$this->load->view('adminheader');
			$this->load->view('managevendors', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function vvendors()
	{
		if(isset($_SESSION['uid']))
		{
			$data['result1'] = $this->Model->vendors();

			$this->load->view('adminheader');
			$this->load->view('vvendors', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function editvv($uid)
	{
		if(isset($_SESSION['uid']))
		{
			$data['result'] = $this->Model->editvendor($uid);
			$data['vv'] = '1';
	
			$this->load->view('adminheader');
			$this->load->view('editvendor', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function updatevv($uid)
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->updatevendor($uid);

			if(!empty($res))
			{
				redirect('Welcome/vvendors');
			}
			else
			{
				$this->session->set_flashdata('msg', 'All fields are mandatory.');
				redirect('Welcome/editvv/'.$uid);
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function vvact()
	{
		if(isset($_SESSION['uid']))
		{
			$vsus = $this->input->post('vvsus');
			$vrem = $this->input->post('vvrem');
			$act = 'vv';
	
			if(!empty($vsus))
			{
				$res = $this->Model->vendoract(null, $vsus, null, $act);
			}
			elseif(!empty($vrem))
			{
				$res = $this->Model->vendoract(null, null, $vrem, $act);
			}
	
			if(!empty($res))
			{
				redirect('Welcome/vvendors');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Please select any verified vendor(s).');
				redirect('Welcome/vvendors');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function svendors()
	{
		if(isset($_SESSION['uid']))
		{
			$data['result1'] = $this->Model->vendors();

			$this->load->view('adminheader');
			$this->load->view('svendors', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function editsv($uid)
	{
		if(isset($_SESSION['uid']))
		{
			$data['result'] = $this->Model->editvendor($uid);
			$data['sv'] = '1';
	
			$this->load->view('adminheader');
			$this->load->view('editvendor', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function updatesv($uid)
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->updatevendor($uid);

			if(!empty($res))
			{
				redirect('Welcome/svendors');
			}
			else
			{
				$this->session->set_flashdata('msg', 'All fields are mandatory.');
				redirect('Welcome/editsv/'.$uid);
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function svact()
	{
		if(isset($_SESSION['uid']))
		{
			$vver = $this->input->post('svver');
			$vrem = $this->input->post('svrem');
			$act = 'sv';
	
			if(!empty($vver))
			{
				$res = $this->Model->vendoract($vver, null, null, $act);
			}
			elseif(!empty($vrem))
			{
				$res = $this->Model->vendoract(null, null, $vrem, $act);
			}
	
			if(!empty($res))
			{
				redirect('Welcome/svendors');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Please select any suspended vendor(s).');
				redirect('Welcome/svendors');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function nvvendors()
	{
		if(isset($_SESSION['uid']))
		{
			$data['result1'] = $this->Model->vendors();

			$this->load->view('adminheader');
			$this->load->view('nvvendors', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function editnvv($uid)
	{
		if(isset($_SESSION['uid']))
		{
			$data['result'] = $this->Model->editvendor($uid);
			$data['nvv'] = '1';
	
			$this->load->view('adminheader');
			$this->load->view('editvendor', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function updatenvv($uid)
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->updatevendor($uid);

			if(!empty($res))
			{
				redirect('Welcome/nvvendors');
			}
			else
			{
				$this->session->set_flashdata('msg', 'All fields are mandatory.');
				redirect('Welcome/editnvv/'.$uid);
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function nvvact()
	{
		if(isset($_SESSION['uid']))
		{
			$vver = $this->input->post('nvver');
			$vsus = $this->input->post('nvsus');
			$vrem = $this->input->post('nvrem');
			$act = 'nvv';
	
			if(!empty($vver))
			{
				$res = $this->Model->vendoract($vver, null, null, $act);
			}
			elseif(!empty($vsus))
			{
				$res = $this->Model->vendoract(null, $vsus, null, $act);
			}
			elseif(!empty($vrem))
			{
				$res = $this->Model->vendoract(null, null, $vrem, $act);
			}
	
			if(!empty($res))
			{
				redirect('Welcome/nvvendors');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Please select any non - verified vendor(s).');
				redirect('Welcome/nvvendors');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function managebutil()
	{
		if(isset($_SESSION['uid']))
		{
			$this->load->view('adminheader');
			$this->load->view('managebutilities');
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function managebcities()
	{
		if(isset($_SESSION['uid']))
		{
			$data['result'] = $this->Model->managecities();

			$this->load->view('adminheader');
			$this->load->view('managebcities', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function addcity()
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->addcity();

			if(!empty($res))
			{
				$this->session->set_flashdata('msg1', 'City Added Successfully.');
				redirect('Welcome/managebcities');
			}
			else
			{
				$this->session->set_flashdata('msg', 'This field is mandatory!');
				redirect('Welcome/managebcities');
			}		$res = $this->Model->addcity();

			if(!empty($res))
			{
				$this->session->set_flashdata('msg1', 'City Added Successfully.');
				redirect('Welcome/managebcities');
			}
			else
			{
				$this->session->set_flashdata('msg', 'This field is mandatory!');
				redirect('Welcome/managebcities');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function editbcity($ctid)
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->editbcity($ctid);

			if(!empty($res))
			{
				redirect('Welcome/managebcities');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function bcityrem()
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->bcityrem();

			if(!empty($res))
			{
				redirect('Welcome/managebcities');
			}
			else
			{
				$this->session->set_flashdata('msg2', 'Please select any business city(ies).');
				redirect('Welcome/managebcities');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function manageblocations()
	{
		if(isset($_SESSION['uid']))
		{
			$data['result'] = $this->Model->managelocations();
			$data['result1'] = $this->Model->index_city();
	
			$this->load->view('adminheader');
			$this->load->view('manageblocations', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function addlocation()
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->addlocation();

			if(!empty($res))
			{
				$this->session->set_flashdata('msg1', 'Location Added Successfully.');
				redirect('Welcome/manageblocations');
			}
			else
			{
				$this->session->set_flashdata('msg', 'This field is mandatory!');
				redirect('Welcome/manageblocations');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function editbloc($lid)
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->editbloc($lid);

			if(!empty($res))
			{
				redirect('Welcome/manageblocations');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function blocrem()
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->blocrem();

			if(!empty($res))
			{
				redirect('Welcome/manageblocations');
			}
			else
			{
				$this->session->set_flashdata('msg2', 'Please select any business location(s)');
				redirect('Welcome/manageblocations');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function managebcategories()
	{
		if(isset($_SESSION['uid']))
		{
			$data['result'] = $this->Model->managecategories();

			$this->load->view('adminheader');
			$this->load->view('managebcategories', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function addcat()
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->addcat();

			if(!empty($res))
			{
				$this->session->set_flashdata('msg1', 'Category Added Successfully.');
				redirect('Welcome/managebcategories');
			}
			else
			{
				$this->session->set_flashdata('msg', 'This field is mandatory!');
				redirect('Welcome/managebcategories');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function editbcat($catid)
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->editbcat($catid);

			if(!empty($res))
			{
				redirect('Welcome/managebcategories');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function bcatrem()
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->bcatrem();

			if(!empty($res))
			{
				redirect('Welcome/managebcategories');
			}
			else
			{
				$this->session->set_flashdata('msg2', 'Please select any business category(ies).');
				redirect('Welcome/managebcategories');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function venbusiness()
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$data['result'] = $this->Model->venbusiness($uid);
			$data['vendorresult'] = $this->Model->get_vendor_business($uid);
	
			$this->load->view('vendorheader', $data);
			$this->load->view('venbusiness');
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function editvenbusinessform()
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$data['result1'] = $this->Model->venbusiness($uid);
			$data['result2'] = $this->Model->index_city();
			$data['vendorresult'] = $this->Model->get_vendor_business($uid);
	
			$this->load->view('vendorheader', $data);
			$this->load->view('editvenbusiness');
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function editvenbusiness($bsno)
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->editvenbusiness($bsno);

			if(!empty($res))
			{
				redirect('Welcome/venbusiness');
			}
			else
			{
				$this->session->set_flashdata('msg', 'All fields are mandatory!');
				redirect('Welcome/editvenbusinessform');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function delvenbusinessform($bsno)
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->delvenbusinessform($bsno);

			if(!empty($res))
			{
				redirect('Welcome/venbusiness');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function managebusinesses()
	{
		if(isset($_SESSION['uid']))
		{
			$data['result'] = $this->Model->managebusinesses();
			$data['uid'] = $_SESSION['uid'];
	
			$this->load->view('adminheader');
			$this->load->view('managebusinesses', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function vbusinesses()
	{
		if(isset($_SESSION['uid']))
		{
			$data['result'] = $this->Model->businesses();

			$this->load->view('adminheader');
			$this->load->view('vbusinesses', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function editvb($bsno)
	{
		if(isset($_SESSION['uid']))
		{
			$data['result1'] = $this->Model->editb($bsno);
			$data['result2'] = $this->Model->index_city();
			$data['result3'] = $this->Model->index_category();
	
			$this->load->view('adminheader');
			$this->load->view('editvb', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function updatevb($bsno)
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->updateb($bsno);

			if(!empty($res))
			{
				redirect('Welcome/vbusinesses');
			}
			else
			{
				$this->session->set_flashdata('msg', 'All fields are mandatory.');
				redirect('Welcome/editvb');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function vbact()
	{
		if(isset($_SESSION['uid']))
		{
			$vbsus = $this->input->post('vbsus');
			$vbrem = $this->input->post('vbrem');
	
			if($vbsus == 'SUSPEND')
			{
				$res = $this->Model->vbact($vbsus, null);
			}
			elseif($vbrem == 'REMOVE')
			{
				$res = $this->Model->vbact(null, $vbrem);
			}
	
			if(!empty($res))
			{
				redirect('Welcome/vbusinesses');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Please select any verified business.');
				redirect('Welcome/vbusinesses');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function sbusinesses()
	{
		if(isset($_SESSION['uid']))
		{
			$data['result'] = $this->Model->businesses();

			$this->load->view('adminheader');
			$this->load->view('sbusinesses', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function editsb($bsno)
	{
		if(isset($_SESSION['uid']))
		{
			$data['result1'] = $this->Model->editb($bsno);
			$data['result2'] = $this->Model->index_city();
			$data['result3'] = $this->Model->index_category();
	
			$this->load->view('adminheader');
			$this->load->view('editsb', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function updatesb($bsno)
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->updateb($bsno);

			if(!empty($res))
			{
				redirect('Welcome/sbusinesses');
			}
			else
			{
				$this->session->set_flashdata('msg', 'All fields are mandatory.');
				redirect('Welcome/editsb');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function sbact()
	{
		if(isset($_SESSION['uid']))
		{
			$sbver = $this->input->post('sbver');
			$sbrem = $this->input->post('sbrem');
	
			if($sbver == 'VERIFY')
			{
				$res = $this->Model->sbact($sbver, null);
			}
			elseif($sbrem == 'REMOVE')
			{
				$res = $this->Model->sbact(null, $sbrem);
			}
	
			if(!empty($res))
			{
				redirect('Welcome/sbusinesses');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Please select any suspended business.');
				redirect('Welcome/sbusinesses');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function nvbusinesses()
	{
		if(isset($_SESSION['uid']))
		{
			$data['result'] = $this->Model->businesses();

			$this->load->view('adminheader');
			$this->load->view('nvbusinesses', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function editnvb($bsno)
	{
		if(isset($_SESSION['uid']))
		{
			$data['result1'] = $this->Model->editb($bsno);
			$data['result2'] = $this->Model->index_city();
			$data['result3'] = $this->Model->index_category();
	
			$this->load->view('adminheader');
			$this->load->view('editnvb', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function updatenvb($bsno)
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->updateb($bsno);

			if(!empty($res))
			{
				redirect('Welcome/nvbusinesses');
			}
			else
			{
				$this->session->set_flashdata('msg', 'All fields are mandatory.');
				redirect('Welcome/editnvb');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function nvbact()
	{
		if(isset($_SESSION['uid']))
		{
			$nvbver = $this->input->post('nvbver');
			$nvbsus = $this->input->post('nvbsus');
			$nvbrem = $this->input->post('nvbrem');
	
			if($nvbver == 'VERIFY')
			{
				$res = $this->Model->nvbact($nvbver, null, null);
			}
			elseif($nvbsus == 'SUSPEND')
			{
				$res = $this->Model->nvbact(null, $nvbsus, null);
			}
			elseif($nvbrem == 'REMOVE')
			{
				$res = $this->Model->nvbact(null, null, $nvbrem);
			}
	
			if(!empty($res))
			{
				redirect('Welcome/nvbusinesses');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Please select any non - verified business.');
				redirect('Welcome/nvbusinesses');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function manageproducts()
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$roleid = $_SESSION['roleid'];
			$data['result'] = $this->Model->manageproducts($uid, $roleid);
	
			if($roleid == '1')
			{
				$this->load->view('adminheader');
			}
			elseif($roleid == '2')
			{
				$data['vendorresult'] = $this->Model->get_vendor_business($uid);
				$this->load->view('vendorheader', $data);
			}
			$this->load->view('manageproducts', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function vproducts()
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$roleid = $_SESSION['roleid'];
			if($roleid == '1')
			{
				$this->load->view('adminheader');
			}
			elseif($roleid == '2')
			{
				$data['vendorresult'] = $this->Model->get_vendor_business($uid);
				$this->load->view('vendorheader', $data);
			}
			$data['result'] = $this->Model->products($uid, $roleid);
			$data['roleid'] = $roleid;
	
			$this->load->view('vproducts', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function editvp($psno)
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$roleid = $_SESSION['roleid'];
			if($roleid == '1')
			{
				$this->load->view('adminheader');
			}
			elseif($roleid == '2')
			{
				$data['vendorresult'] = $this->Model->get_vendor_business($uid);
				$this->load->view('vendorheader', $data);
			}
			$data['result'] = $this->Model->editp($psno);
	
			$this->load->view('editvp', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function updatevp($psno)
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->updatep($psno);

			if(!empty($res))
			{
				redirect('Welcome/vproducts');
			}
			else
			{
				$this->session->set_flashdata('msg', 'All fields are mandatory!');
				redirect('Welcome/editvp/'.$psno);
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function vact()
	{
		if(isset($_SESSION['uid']))
		{
			$vsus = $this->input->post('vsus');
			$vrem = $this->input->post('vrem');
	
			if($vsus == 'SUSPEND')
			{
				$res = $this->Model->vact($vsus, null);
			}
			elseif($vrem == 'REMOVE')
			{
				$res = $this->Model->vact(null, $vrem);
			}
	
			if(!empty($res))
			{
				redirect('Welcome/vproducts');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Please select any verified product(s).');
				redirect('Welcome/vproducts');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function sproducts()
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$roleid = $_SESSION['roleid'];
			if($roleid == '1')
			{
				$this->load->view('adminheader');
			}
			elseif($roleid == '2')
			{
				$data['vendorresult'] = $this->Model->get_vendor_business($uid);
				$this->load->view('vendorheader', $data);
			}
			$data['result'] = $this->Model->products($uid, $roleid);
			$data['roleid'] = $roleid;
	
			$this->load->view('sproducts', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function editsp($psno)
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$roleid = $_SESSION['roleid'];
			if($roleid == '1')
			{
				$this->load->view('adminheader');
			}
			elseif($roleid == '2')
			{
				$data['vendorresult'] = $this->Model->get_vendor_business($uid);
				$this->load->view('vendorheader', $data);
			}
			$data['result'] = $this->Model->editp($psno);
	
			$this->load->view('editsp', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function updatesp($psno)
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->updatep($psno);

			if(!empty($res))
			{
				redirect('Welcome/sproducts');
			}
			else
			{
				$this->session->set_flashdata('msg', 'All fields are mandatory!');
				redirect('Welcome/editsp/'.$psno);
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function sact()
	{
		if(isset($_SESSION['uid']))
		{
			$sver = $this->input->post('sver');
			$sunsus = $this->input->post('sunsus');
			$srem = $this->input->post('srem');
	
			if($sver == 'VERIFY')
			{
				$res = $this->Model->sact($sver, null, null);
			}
			elseif($sunsus == 'UNSUSPEND')
			{
				$res = $this->Model->sact(null, $sunsus, null);
			}
			elseif($srem == 'REMOVE')
			{
				$res = $this->Model->sact(null, null, $srem);
			}
	
			if(!empty($res))
			{
				redirect('Welcome/sproducts');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Please select any suspended product(s).');
				redirect('Welcome/sproducts');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function nvproducts()
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$roleid = $_SESSION['roleid'];
			if($roleid == '1')
			{
				$this->load->view('adminheader');
			}
			elseif($roleid == '2')
			{
				$data['vendorresult'] = $this->Model->get_vendor_business($uid);
				$this->load->view('vendorheader', $data);
			}
			$data['result'] = $this->Model->products($uid, $roleid);
			$data['roleid'] = $roleid;
	
			$this->load->view('nvproducts', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function editnvp($psno)
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$roleid = $_SESSION['roleid'];
			if($roleid == '1')
			{
				$this->load->view('adminheader');
			}
			elseif($roleid == '2')
			{
				$data['vendorresult'] = $this->Model->get_vendor_business($uid);
				$this->load->view('vendorheader', $data);
			}
			$data['result'] = $this->Model->editp($psno);
	
			$this->load->view('editnvp', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function updatenvp($psno)
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->updatep($psno);

			if(!empty($res))
			{
				redirect('Welcome/nvproducts');
			}
			else
			{
				$this->session->set_flashdata('msg', 'All fields are mandatory!');
				redirect('Welcome/editnvp/'.$psno);
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function nvact()
	{
		if(isset($_SESSION['uid']))
		{
			$nvver = $this->input->post('nvver');
			$nvsus = $this->input->post('nvsus');
			$nvrem = $this->input->post('nvrem');
	
			if($nvver == 'VERIFY')
			{
				$res = $this->Model->nvact($nvver, null, null);
			}
			elseif($nvsus == 'SUSPEND')
			{
				$res = $this->Model->nvact(null, $nvsus, null);
			}
			elseif($nvrem == 'REMOVE')
			{
				$res = $this->Model->nvact(null, null, $nvrem);
			}
	
			if(!empty($res))
			{
				redirect('Welcome/nvproducts');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Please select any non - verified product(s).');
				redirect('Welcome/nvproducts');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function managecustomers()
	{
		if(isset($_SESSION['uid']))
		{
			$data['result'] = $this->Model->managecustomers();

			$this->load->view('adminheader');
			$this->load->view('managecustomers', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function vcustomers()
	{
		if(isset($_SESSION['uid']))
		{
			$data['result1'] = $this->Model->managecustomers();

			$this->load->view('adminheader');
			$this->load->view('vcustomers', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function editvc($uid)
	{
		if(isset($_SESSION['uid']))
		{
			$data['result'] = $this->Model->editc($uid);

			$this->load->view('adminheader');
			$this->load->view('editvc', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function updatevc($uid)
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->updatec($uid);

			if(!empty($res))
			{
				redirect('Welcome/vcustomers');
			}
			else
			{
				$this->session->set_flashdata('msg', 'All fields are mandatory.');
				redirect('Welcome/editvc/'.$uid);
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function vcact()
	{
		if(isset($_SESSION['uid']))
		{
			$vcsus = $this->input->post('vcsus');
			$vcrem = $this->input->post('vcrem');
	
			if(!empty($vcsus))
			{
				$res = $this->Model->vcact($vcsus, null);
			}
			elseif(!empty($vcrem))
			{
				$res = $this->Model->vcact(null, $vcrem);
			}
	
			if(!empty($res))
			{
				redirect('Welcome/vcustomers');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Please select any verified customer.');
				redirect('Welcome/vcustomers');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function scustomers()
	{
		if(isset($_SESSION['uid']))
		{
			$data['result1'] = $this->Model->managecustomers();

			$this->load->view('adminheader');
			$this->load->view('scustomers', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function editsc($uid)
	{
		if(isset($_SESSION['uid']))
		{
			$data['result'] = $this->Model->editc($uid);

			$this->load->view('adminheader');
			$this->load->view('editsc', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function updatesc($uid)
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->updatec($uid);

			if(!empty($res))
			{
				redirect('Welcome/scustomers');
			}
			else
			{
				$this->session->set_flashdata('msg', 'All fields are mandatory.');
				redirect('Welcome/editsc/'.$uid);
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function scact()
	{
		if(isset($_SESSION['uid']))
		{
			$scver = $this->input->post('scver');
			$screm = $this->input->post('screm');
	
			if(!empty($scver))
			{
				$res = $this->Model->scact($scver, null);
			}
			elseif(!empty($screm))
			{
				$res = $this->Model->scact(null, $screm);
			}
	
			if(!empty($res))
			{
				redirect('Welcome/scustomers');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Please select any suspended customer.');
				redirect('Welcome/scustomers');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function nvcustomers()
	{
		if(isset($_SESSION['uid']))
		{
			$data['result1'] = $this->Model->managecustomers();

			$this->load->view('adminheader');
			$this->load->view('nvcustomers', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function editnvc($uid)
	{
		if(isset($_SESSION['uid']))
		{
			$data['result'] = $this->Model->editc($uid);

			$this->load->view('adminheader');
			$this->load->view('editnvc', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function updatenvc($uid)
	{
		if(isset($_SESSION['uid']))
		{
			$res = $this->Model->updatec($uid);

			if(!empty($res))
			{
				redirect('Welcome/nvcustomers');
			}
			else
			{
				$this->session->set_flashdata('msg', 'All fields are mandatory.');
				redirect('Welcome/editnvc/'.$uid);
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function nvcact()
	{
		if(isset($_SESSION['uid']))
		{
			$nvcver = $this->input->post('nvcver');
			$nvcsus = $this->input->post('nvcsus');
			$nvcrem = $this->input->post('nvcrem');
	
			if($nvcver == 'VERIFY')
			{
				$res = $this->Model->nvcact($nvcver, null, null);
			}
			elseif($nvcsus == 'SUSPEND')
			{
				$res = $this->Model->nvcact(null, $nvcsus, null);
			}
			elseif($nvcrem == 'REMOVE')
			{
				$res = $this->Model->nvcact(null, null, $nvcrem);
			}
	
			if(!empty($res))
			{
				redirect('Welcome/nvcustomers');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Please select any non - verified customer.');
				redirect('Welcome/nvcustomers');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function manageorders()
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$roleid = $_SESSION['roleid'];
			$data2['orders'] = $this->Model->manageorders($uid, $roleid);
			if($roleid == '1')
			{
				$this->load->view('adminheader');
			}
			elseif($roleid == '2')
			{
				$data['vendorresult'] = $this->Model->get_vendor_business($uid);
				$this->load->view('vendorheader', $data);
			}
			$data2['roleid'] = $roleid;
			$this->load->view('manageorders', $data2);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function reviews()
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$roleid = $_SESSION['roleid'];
			if($roleid == '1')
			{
				$this->load->view('adminheader');
			}
			elseif($roleid == '2')
			{
				$data['vendorresult'] = $this->Model->get_vendor_business($uid);
				$this->load->view('vendorheader', $data);
			}
			$this->load->view('reviews');
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function notifications()
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$roleid = $_SESSION['roleid'];
			if($roleid == '1')
			{
				$this->load->view('adminheader');
			}
			elseif($roleid == '2')
			{
				$data['vendorresult'] = $this->Model->get_vendor_business($uid);
				$this->load->view('vendorheader', $data);
			}
			$this->load->view('notifications');
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function addbusinessform()
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$res = $this->Model->addbusinessform();
	
			$data['result1'] = $res['bcity'];
			$data['result2'] = $res['bcategory'];
			$data1['vendorresult'] = $this->Model->get_vendor_business($uid);
	
			$this->load->view('vendorheader', $data1);
			$this->load->view('addbusiness', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function addproductform()
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$data['result'] = $this->Model->addproductform($uid);
			$data['vendorresult'] = $this->Model->get_vendor_business($uid);
	
			$this->load->view('vendorheader', $data);
			$this->load->view('addproduct', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function addproduct($bsno)
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$res = $this->Model->addproduct($uid, $bsno);
	
			if($res=='1')
			{
				redirect('Welcome/manageproducts');
			}
			elseif($res=='2')
			{
				$this->session->set_flashdata('msg', 'Please select any product image!');
				redirect('Welcome/addproductform');
			}
			elseif($res=='0')
			{
				$this->session->set_flashdata('msg', 'All fields are mandatory!');
				redirect('Welcome/addproductform');
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function get_location()
	{
		if(isset($_SESSION['uid']))
		{
			$location = $this->Model->get_location();

			$output = "<option selected disabled>--- Your Locations ---</option>";
			foreach($location as $row)
			{
				$output .= "<option value='".$row['blid']."'>".$row['blocname']."</option>";
			}
			echo $output;
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function addbusiness()
	{
		if(isset($_SESSION['uid']))
		{
			$uid = $_SESSION['uid'];
			$res = $this->Model->addbusiness($uid);
			
			if(!empty($res))
			{
				redirect('Welcome/venbusiness');
			}
			else
			{
				echo 'Error!';
			}
		}
		else
		{
			redirect('Welcome/login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Welcome/login');
	}
}
