<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function signup()
    {
        $data['name'] = $this->input->post('n');
        $data['mobile'] = $this->input->post('m');
        $data['email'] = $this->input->post('e');
        $data['password'] = $this->input->post('p');
        $data['roleid'] = $this->input->post('role');

        if(!empty($data['name']) && !empty($data['mobile']) && !empty($data['email']) && !empty($data['password']) && !empty($data['roleid']))
        {
            return $this->db->insert('users', $data);
        }
        else
        {
            return 0;
        }
    }

    public function signin()
    {
        $e = $this->input->post('e');
        $p = $this->input->post('p');

        if(!empty($e) && !empty($p))
        {
            $sql1 = $this->db->get_where('users', array('email' => $e))->result_array();
            if(!empty($sql1))
            {
                $sql2 = $this->db->get_where('users', array('email' => $e, 'password' => $p))->result_array();
                if(!empty($sql2))
                {
                    foreach($sql2 as $row)
                    {
                        $uid = $row['uid'];
                        $roleid = $row['roleid'];
                        $v = $row['uis_ver'];
                        $arr = array('uid' => $uid, 'roleid' => $roleid, 'v' => $v);
                        return $arr;
                    }
                }
                else
                {
                    return 0;
                }
            }
            else
            {
                return 2;
            }
        }
        else
        {
            return 3;
        }
    }

    public function profile($uid)
    {
        return $this->db->get_where('users', array('uid' => $uid))->result_array();
    }

    public function updateprofile($uid)
    {
        $data['name'] = $this->input->post('en');
        $data['mobile'] = $this->input->post('em');
        $data['email'] = $this->input->post('ee');

        if(!empty($data['name']) && !empty($data['mobile']) && !empty($data['email']))
        {
            $this->db->where('uid', $uid);
            $this->db->update('users', $data);
            return $this->db->get_where('users', array('uid' => $uid))->result_array();
        }
        else
        {
            return 0;
        }
    }

    public function updateprofilepic($uid)
    {
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
        $config['max_size'] = '';

        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('pic');

        if(!empty($upload))
        {
            $doc = $this->upload->data();
            $data['image'] = "./images/".$doc['file_name'];
            $this->db->where('uid', $uid);
            return $this->db->update('users', $data);
        }
    }

    public function index()
    {
        $this->db->select('business.bsno, business.bphoto, business.bname, bcity.bcityname');
        $this->db->from('business');
        $this->db->join('bcity', 'bcity.bcityid = business.bcityid');
        $this->db->where(array('business.bis_ver' => 1, 'business.bis_del' => 0));
        $this->db->limit(6);
        return $this->db->get()->result_array();
    }

    public function more_data($limit)
    {
        $limit = $limit * 6;
        $this->db->select('business.bsno, business.bphoto, business.bname, business.bviews, bcity.bcityname');
        $this->db->from('business');
        $this->db->join('bcity', 'bcity.bcityid = business.bcityid');
        $this->db->where(array('business.bis_ver' => 1,'business.bis_del' => 0));
        $this->db->limit(6, $limit);
        return $this->db->get()->result_array();
    }

    public function index_category()
    {
        $this->db->select('*');
        $this->db->from('bcategory');
        return $this->db->get()->result_array();
    }

    public function index_city()
    {
        $this->db->select('*');
        $this->db->from('bcity');
        return $this->db->get()->result_array();
    }

    public function filter_vendor()
    {
        $category = array();
        $city = array();

        $cat1 = $this->input->post("data");
        $cat2 = $this->input->post("x");

        if($cat1)
            $city = implode(",", $cat1);
        if($cat2)
            $category = implode(",", $cat2);
        if(!empty($category) && !empty($city))
        {
            return $this->db->query("SELECT * FROM business 
            INNER JOIN bcategory ON bcategory.bcid = business.bcid 
            INNER JOIN bcity ON bcity.bcityid = business.bcityid 
            WHERE bcategory.bcid IN ({$category}) AND bcity.bcityid IN ({$city}) AND business.bis_ver = 1 AND business.bis_del = 0")->result_array();
            // $this->db->select('*');
            // $this->db->from('business');
            // $this->db->join('bcategory', 'bcategory.bcid = business.bcid');
            // $this->db->join('bcity', 'bcity.bcityid = business.bcityid');
            // $this->db->where_in('bcategory.bcid', array($category));
            // $this->db->where_in('bcity.bcityid', array($city));
            // return $this->db->get()->result_array();
        }
        elseif(!empty($category))
        {
            return $this->db->query("SELECT * FROM business 
            INNER JOIN bcategory ON bcategory.bcid = business.bcid 
            INNER JOIN bcity ON bcity.bcityid = business.bcityid 
            WHERE bcategory.bcid IN ({$category}) AND business.bis_ver = 1 AND business.bis_del = 0")->result_array();
            // $this->db->select('*');
            // $this->db->from('business');
            // $this->db->join('bcity', 'bcity.bcityid = business.bcityid');
            // $this->db->join('bcategory', 'bcategory.bcid = business.bcid');
            // $this->db->where_in('bcategory.bcid', array($category));
            // return $this->db->get()->result_array();
        }
        elseif(!empty($city))
        {
            return $this->db->query("SELECT * FROM business 
            INNER JOIN bcity ON business.bcityid = bcity.bcityid 
            WHERE bcity.bcityid IN ({$city}) AND business.bis_ver = 1 AND business.bis_del = 0")->result_array();
            // $this->db->select('*');
            // $this->db->from('business');
            // $this->db->join('bcity', 'bcity.bcityid = business.bcityid');
            // $this->db->where('business.bis_del', 0);
            // $this->db->where_in('bcity.bcityid', array($city));
            // // $this->db->where_in(array('business.bcityid' => $city, 'business.bis_del' => 0));
            // return $this->db->get()->result_array();
        }
        else
        {
            $this->db->select('business.bsno, business.bphoto, business.bname, business.bviews, bcity.bcityname');
            $this->db->from('business');
            $this->db->join('bcity', 'bcity.bcityid = business.bcityid');
            $this->db->where(array('business.bis_ver' => 1,'business.bis_del' => 0));
            return $this->db->get()->result_array();
        }
    }

    public function isearch()
    {
        $search = $this->input->post('search');
        return $this->db->query("SELECT * FROM business 
        INNER JOIN bcity ON bcity.bcityid = business.bcityid 
        INNER JOIN blocation ON blocation.blid = business.blid
        INNER JOIN bcategory ON bcategory.bcid = business.bcid
        WHERE bname LIKE '%$search%' OR baddress LIKE '%$search%' OR bcityname LIKE '%$search%' OR blocname LIKE '%$search%' OR 
        bcatname LIKE '%$search%'")->result_array();
    }

    public function dash($uid, $roleid)
    {
        if($roleid == '1')
        {
            $this->db->select('users.uid, users.roleid, users.uis_ver, users.uis_del');
            $this->db->from('users');
            $q1 = $this->db->get()->result_array();

            $this->db->select('business.bsno, business.bis_ver, business.bis_del');
            $this->db->from('business');
            $q2 = $this->db->get()->result_array();

            $this->db->select('products.psno, products.pis_ver, products.pis_del');
            $this->db->from('products');
            $q3 = $this->db->get()->result_array();

            $this->db->select('bcity.bcityid, bcity.bcity_del');
            $this->db->from('bcity');
            $q4 = $this->db->get()->result_array();

            $this->db->select('blocation.blid, blocation.bloc_del');
            $this->db->from('blocation');
            $q5 = $this->db->get()->result_array();

            $this->db->select('bcategory.bcid, bcategory.bcat_del');
            $this->db->from('bcategory');
            $q6 = $this->db->get()->result_array();

            return array('users' => $q1, 'business' => $q2, 'products' => $q3, 'bcity' => $q4, 'blocation' => $q5, 'bcategory' => $q6);
        }
        elseif($roleid == '2')
        {
            $this->db->select('*');
            $this->db->from('products');
            $this->db->where('products.uid', $uid);
            $q1 = $this->db->get()->result_array();
            $this->db->select('*');
            $this->db->from('business');
            $this->db->where('business.uid', $uid);
            $q2 = $this->db->get()->result_array();
            return array('products' => $q1, 'business' => $q2);
        }
    }

    public function bpdetail($bsno)
    {
        $this->db->select('products.psno, products.pimage, products.pname, products.pquantity, products.pprice');
        $this->db->from('business');
        $this->db->join('products', 'products.bsno = business.bsno');
        $this->db->where('business.bsno', $bsno);
        return $this->db->get()->result_array();
    }

    public function addbusinessform()
    {
        $this->db->select('*');
        $this->db->from('bcity');
        $sql1 = $this->db->get()->result_array();
        $this->db->select('*');
        $this->db->from('bcategory');
        $sql2 = $this->db->get()->result_array();
        return array('bcity' => $sql1, 'bcategory' => $sql2);
    }

    public function managecities()
    {
        return $this->db->get_where('bcity', array('bcity_del' => 0))->result_array();
    }

    public function addcity()
    {
        $data['bcityname'] = $this->input->post('city');

        if(!empty($data['bcityname']))
        {
            return $this->db->insert('bcity', $data);
        }
        else
        {
            return 0;
        }
    }

    public function editbcity($ctid)
    {
        $data['bcityname'] = $this->input->post('ecity');
        if(!empty($data['bcityname']))
        {
            return $this->db->update('bcity', $data, array('bcityid' => $ctid));
        }
    }

    public function bcityrem()
    {
        $ctid = $this->input->post('bcity');
        $data['bcity_del'] = '1';
        foreach($ctid as $id)
        {
            return $this->db->update('bcity', $data, array('bcityid' => $id));
        }
    }

    public function managelocations()
    {
        $this->db->select('*');
        $this->db->from('blocation');
        $this->db->join('bcity', 'bcity.bcityid = blocation.bcityid');
        $this->db->where('bloc_del', '0');
        return $this->db->get()->result_array();
    }

    public function addlocation()
    {
        $data['bcityid'] = $this->input->post('lcity');
        $data['blocname'] = $this->input->post('location');

        if(!empty($data['blocname']))
        {
            return $this->db->insert('blocation', $data);
        }
        else
        {
            return 0;
        }
    }

    public function editbloc($lid)
    {
        $data['blocname'] = $this->input->post('eloc');
        if(!empty($data['blocname']))
        {
            return $this->db->update('blocation', $data, array('blid' => $lid));
        }
    }

    public function blocrem()
    {
        $lcid = $this->input->post('bloc');
        $data['bloc_del'] = '1';
        foreach($lcid as $id)
        {
            return $this->db->update('blocation', $data, array('blid' => $id));
        }
    }

    public function managecategories()
    {
        return $this->db->get_where('bcategory', array('bcat_del' => 0))->result_array();
    }

    public function addcat()
    {
        $data['bcatname'] = $this->input->post('cat');

        if(!empty($data['bcatname']))
        {
            return $this->db->insert('bcategory', $data);
        }
        else
        {
            return 0;
        }
    }

    public function editbcat($catid)
    {
        $data['bcatname'] = $this->input->post('ecat');
        if(!empty($data['bcatname']))
        {
            return $this->db->update('bcategory', $data, array('bcid' => $catid));
        }
    }

    public function bcatrem()
    {
        $catid = $this->input->post('bcat');
        $data['bcat_del'] = '1';
        foreach($catid as $id)
        {
            return $this->db->update('bcategory', $data, array('bcid' => $id));
        }
    }

    public function get_location()
    {
        $bcityid = $this->input->post('bcity');
        return $this->db->get_where('blocation', array('bcityid' => $bcityid))->result_array();
    }

    public function addbusiness($uid)
    {
        $data['bname'] = $this->input->post('bn');
        $data['baddress'] = $this->input->post('badd');
        $data['bmobile'] = $this->input->post('bno');
        $data['bemail'] = $this->input->post('bem');
        $data['bcityid'] = $this->input->post('bcity');
        $data['blid'] = $this->input->post('blocation');
        $data['bcid'] = $this->input->post('bcat');
        $data['uid'] = $uid;

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '';

        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('bpic');
        if(!empty($upload) && !empty($data['bname']) && !empty($data['baddress']) && !empty($data['bmobile']) && !empty($data['bcityid'])
        && !empty($data['blid']) && !empty($data['bcid']) && !empty($data['bemail']) && !empty($data['uid']))
        {
            $doc = $this->upload->data();
            $data['bphoto'] = './images/'.$doc['file_name'];
            return $this->db->insert('business', $data);
        }
    }

    public function managebusinesses()
    {
        $this->db->select('business.bis_ver, users.name, business.bphoto, business.bname, business.baddress, bcity.bcityname, 
        business.bmobile, business.bemail');
        $this->db->from('business');
        $this->db->join('users', 'users.uid = business.uid');
        $this->db->join('bcity', 'bcity.bcityid = business.bcityid');
        return $this->db->get()->result_array();
    }

    public function bdetail($bsno)
    {
        $this->db->select('business.bis_ver, users.name, users.uid, business.bphoto, business.bname, business.baddress, 
        bcity.bcityname, bcategory.bcatname, blocation.blocname');
        $this->db->from('business');
        $this->db->join('users', 'users.uid = business.uid');
        $this->db->join('bcategory', 'bcategory.bcid = business.bcid');
        $this->db->join('blocation', 'blocation.blid = business.blid');
        $this->db->join('bcity', 'bcity.bcityid = business.bcityid');
        $this->db->where('bsno', $bsno);
        return $this->db->get()->result_array();
    }

    public function bviews($roleid, $bsno)
    {
        if($roleid == '3')
        {
            $this->db->where('bsno', $bsno);
            $this->db->set('bviews', 'bviews + 1', false);
            $this->db->update('business');
        }
    }

    public function addproductform($uid)
    {
        $this->db->select('bname, bsno');
        $this->db->from('business');
        $this->db->where('uid', $uid);
        return $this->db->get()->result_array();
    }

    public function addproduct($uid, $bsno)
    {
        $data['bsno'] = $bsno;
        $data['brandname'] = $this->input->post('brand');
        $data['pname'] = $this->input->post('pn');
        $data['pquantity'] = $this->input->post('pq');
        $data['pprice'] = $this->input->post('pp');
        $data['discount'] = $this->input->post('discount');
        $data['pdescription'] = $this->input->post('pdes');
        $data['uid'] = $uid;

        if(!empty($data['bsno']) && !empty($data['brandname']) && !empty($data['pname']) && !empty($data['pquantity']) 
        && !empty($data['pprice']) && !empty($data['discount']) && !empty($data['pdescription']) && !empty($data['uid']))
        {
            $config['upload_path'] = './images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '';

            $this->load->library('upload', $config);
            $upload = $this->upload->do_upload('ppic');
            if(!empty($upload))
            {
                $doc = $this->upload->data();
                $data['pimage'] = './images/'.$doc['file_name'];
                return $this->db->insert('products', $data);
            }
            else
            {
                return 2;
            }
        }
        else
        {
            return 0;
        }
    }

    public function get_vendor_business($uid)
    {
        return $this->db->get_where('business', array('uid' => $uid, 'bis_del' => '0'))->result_array();
    }

    public function manageproducts($uid, $roleid)
    {
        if($roleid == '1')
        {
            $this->db->select('*');
            $this->db->from('products');
            $this->db->join('business', 'business.bsno = products.bsno');
            return $this->db->get()->result_array();
        }
        elseif($roleid == '2')
        {
            $this->db->select('*');
            $this->db->from('products');
            $this->db->join('business', 'business.bsno = products.bsno');
            $this->db->where('products.uid', $uid);
            return $this->db->get()->result_array();
        }
    }

    public function venbusiness($uid)
    {
        // return $this->db->get_where('business', array('uid' => $uid))->result_array();
        $this->db->select('*');
        $this->db->from('business');
        $this->db->join('blocation', 'blocation.blid = business.blid');
        $this->db->join('bcity', 'bcity.bcityid = business.bcityid');
        $this->db->where('business.bis_del', '0');
        $this->db->where('business.uid', $uid);
        return $this->db->get()->result_array();
    }

    public function editvenbusiness($bsno)
    {
        $data['bname'] = $this->input->post('ebn');
        $data['bmobile'] = $this->input->post('ebm');
        $data['bemail'] = $this->input->post('ebe');
        $data['baddress'] = $this->input->post('eba');
        $data['bcityid'] = $this->input->post('bcity');
        $data['blid'] = $this->input->post('blocation');

        if(!empty($data['bname']) && !empty($data['bmobile']) && !empty($data['bemail']) && !empty($data['baddress']) && 
        !empty($data['bcityid']) && !empty($data['blid']))
        {
            return $this->db->update('business', $data, array('bsno' => $bsno));
        }
    }

    public function delvenbusinessform($bsno)
    {
        $data['bis_del'] = '1';
        return $this->db->update('business', $data, array('bsno' => $bsno));
    }

    public function products($uid, $roleid)
    {
        if($roleid == '1')
        {
            $this->db->select('business.bname, products.pimage, products.pname, products.pquantity, products.pprice, products.discount, 
            products.pdescription, products.psno, products.pis_ver, products.pis_del, business.bis_del');
            $this->db->from('products');
            $this->db->join('business', 'business.bsno = products.bsno');
            return $this->db->get()->result_array();
        }
        elseif($roleid == '2')
        {
            $this->db->select('business.bname, products.pimage, products.pname, products.pquantity, products.pprice, products.discount, 
            products.pdescription, products.psno, products.pis_ver, products.pis_del, business.bis_del');
            $this->db->from('products');
            $this->db->join('business', 'business.bsno = products.bsno');
            $this->db->where('products.uid', $uid);
            return $this->db->get()->result_array();
        }
    }

    public function editp($psno)
    {
        $this->db->select('business.bname, products.pimage, products.pname, products.brandname, products.pquantity, products.pprice, products.discount, 
        products.pdescription, products.psno');
        $this->db->from('products');
        $this->db->join('business', 'business.bsno = products.bsno');
        $this->db->where('products.psno', $psno);
        return $this->db->get()->result_array();
    }

    public function updatep($psno)
    {
        $data['pname'] = $this->input->post('epnm');
        $data['brandname'] = $this->input->post('epb');
        $data['pquantity'] = $this->input->post('epqnt');
        $data['pprice'] = $this->input->post('epp');
        $data['discount'] = $this->input->post('edis');
        $data['pdescription'] = $this->input->post('epdes');

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '';

        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('eppic');
        if(!empty($upload) && !empty($data['pname']) && !empty($data['brandname']) && !empty($data['pquantity']) && 
        !empty($data['pprice']) && !empty($data['discount']) && !empty($data['pdescription']))
        {
            $doc = $this->upload->data();
            $data['pimage'] = './images/'.$doc['file_name'];
            return $this->db->update('products', $data, array('psno' => $psno));
        }
    }

    public function nvact($nvver, $nvsus, $nvrem)
    {
        $psno = $this->input->post('nvpsno');
        if(!empty($nvver) && !empty($psno))
        {
            foreach($psno as $id)
            {
                $data['pis_ver'] = '1';
                return $this->db->update('products', $data, array('psno' => $id));
            }
        }
        elseif(!empty($nvsus) && !empty($psno))
        {
            foreach($psno as $id)
            {
                $data['pis_ver'] = '2';
                return $this->db->update('products', $data, array('psno' => $id));
            }
        }
        elseif(!empty($nvrem) && !empty($psno))
        {
            foreach($psno as $id)
            {
                $data['pis_del'] = '1';
                return $this->db->update('products', $data, array('psno' => $id));
            }
        }
        else
        {
            return 0;
        }
    }

    public function sact($sver, $sunsus, $srem)
    {
        $psno = $this->input->post('spsno');
        if(!empty($sver) && !empty($psno))
        {
            foreach($psno as $id)
            {
                $data['pis_ver'] = '1';
                return $this->db->update('products', $data, array('psno' => $id));
            }
        }
        elseif(!empty($sunsus) && !empty($psno))
        {
            foreach($psno as $id)
            {
                $data['pis_ver'] = '0';
                return $this->db->update('products', $data, array('psno' => $id));
            }
        }
        elseif(!empty($srem) && !empty($psno))
        {
            foreach($psno as $id)
            {
                $data['pis_del'] = '1';
                return $this->db->update('products', $data, array('psno' => $id));
            }
        }
        else
        {
            return 0;
        }
    }

    public function vact($vsus, $vrem)
    {
        $psno = $this->input->post('vpsno');
        if(!empty($vsus) && !empty($psno))
        {
            foreach($psno as $id)
            {
                $data['pis_ver'] = '2';
                return $this->db->update('products', $data, array('psno' => $id));
            }
        }
        elseif(!empty($vrem) && !empty($psno))
        {
            foreach($psno as $id)
            {
                $data['pis_del'] = '1';
                return $this->db->update('products', $data, array('psno' => $id));
            }
        }
        else
        {
            return 0;
        }
    }

    public function businesses()
    {
        $this->db->select('business.bsno, business.bis_ver, users.name, business.bphoto, business.bname, business.baddress, bcity.bcityname, 
        bcategory.bcatname');
        $this->db->from('business');
        $this->db->join('users', 'users.uid = business.uid');
        $this->db->join('bcity', 'bcity.bcityid = business.bcityid');
        $this->db->join('bcategory', 'bcategory.bcid = business.bcid');
        return $this->db->get()->result_array();
    }

    public function editb($bsno)
    {
        $this->db->select('business.bsno, business.bphoto, business.bname, business.bmobile, business.bemail, business.baddress, 
        bcity.bcityname, blocation.blocname, bcategory.bcatname, users.name, business.bcityid, business.blid, business.bcid');
        $this->db->from('business');
        $this->db->join('users', 'users.uid = business.uid');
        $this->db->join('bcity', 'bcity.bcityid = business.bcityid');
        $this->db->join('blocation', 'blocation.blid = business.blid');
        $this->db->join('bcategory', 'bcategory.bcid = business.bcid');
        $this->db->where('bsno', $bsno);
        return $this->db->get()->result_array();
    }

    public function updateb($bsno)
    {
        $data['bname'] = $this->input->post('ebnm');
        $data['bmobile'] = $this->input->post('ebmb');
        $data['bemail'] = $this->input->post('ebem');
        $data['baddress'] = $this->input->post('ebadd');
        $data['bcityid'] = $this->input->post('bcity');
        $data['blid'] = $this->input->post('bloc');
        $data['bcid'] = $this->input->post('ebcat');

        $config['upload_path'] = './images';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '';

        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('ebpic');
        if(!empty($upload) && !empty($data['bname']) && !empty($data['bmobile']) && !empty($data['bemail']) && !empty($data['baddress'])
        && !empty($data['bcityid']) && !empty($data['blid']) && !empty($data['bcid']))
        {
            $doc = $this->upload->data();
            $data['bphoto'] = './images/'.$doc['file_name'];

            return $this->db->update('business', $data, array('bsno' => $bsno));
        }
    }

    public function managecustomers()
    {
        return $this->db->get_where('users', array('roleid' => '3'))->result_array();
    }

    public function editc($uid)
    {
        $this->db->select('image, name, mobile, email, uid');
        $this->db->from('users');
        $this->db->where('roleid', '3');
        $this->db->where('uid', $uid);
        return $this->db->get()->result_array();
    }

    public function updatec($uid)
    {
        $data['name'] = $this->input->post('ecnm');
        $data['mobile'] = $this->input->post('ecmb');
        $data['email'] = $this->input->post('ecem');

        $config['upload_path'] = './images';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '';

        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('ecpic');
        if(!empty($upload) && !empty($data['name']) && !empty($data['mobile']) && !empty($data['email']))
        {
            $doc = $this->upload->data();
            $data['image'] = './images/'.$doc['file_name'];

            return $this->db->update('users', $data, array('uid' => $uid));
        }
    }

    public function nvcact($nvcver, $nvcsus, $nvcrem)
    {
        $uid = $this->input->post('nvc');
        if(!empty($nvcver) && !empty($uid))
        {
            foreach($uid as $id)
            {
                $data['uis_ver'] = '1';
                return $this->db->update('users', $data, array('uid' => $id));
            }
        }
        elseif(!empty($nvcsus) && !empty($uid))
        {
            foreach($uid as $id)
            {
                $data['uis_ver'] = '2';
                return $this->db->update('users', $data, array('uid' => $id));
            }
        }
        elseif(!empty($nvcrem) && !empty($uid))
        {
            foreach($uid as $id)
            {
                $data['uis_del'] = '1';
                return $this->db->update('users', $data, array('uid' => $id));
            }
        }
        else
        {
            return 0;
        }
    }

    public function scact($scver, $screm)
    {
        $uid = $this->input->post('sc');
        if(!empty($scver) && !empty($uid))
        {
            foreach($uid as $id)
            {
                $data['uis_ver'] = '1';
                return $this->db->update('users', $data, array('uid' => $id));
            }
        }
        elseif(!empty($screm) && !empty($uid))
        {
            foreach($uid as $id)
            {
                $data['uis_del'] = '1';
                return $this->db->update('users', $data, array('uid' => $id));
            }
        }
        else
        {
            return 0;
        }
    }

    public function vcact($vcsus, $vcrem)
    {
        $uid = $this->input->post('vc');
        if(!empty($vcsus) && !empty($uid))
        {
            foreach($uid as $id)
            {
                $data['uis_ver'] = '2';
                return $this->db->update('users', $data, array('uid' => $id));
            }
        }
        elseif(!empty($vcrem) && !empty($uid))
        {
            foreach($uid as $id)
            {
                $data['uis_del'] = '1';
                return $this->db->update('users', $data, array('uid' => $id));
            }
        }
        else
        {
            return 0;
        }
    }

    public function vbact($vbsus, $vbrem)
    {
        $bsno = $this->input->post('vb');
        if(!empty($vbsus) && !empty($bsno))
        {
            foreach($bsno as $id)
            {
                $data['bis_ver'] = '2';
                return $this->db->update('business', $data, array('bsno' => $id));
            }
        }
        elseif(!empty($vbrem) && !empty($bsno))
        {
            foreach($bsno as $id)
            {
                $data['bis_del'] = '1';
                return $this->db->update('business', $data, array('bsno' => $id));
            }
        }
        else
        {
            return 0;
        }
    }

    public function sbact($sbver, $sbrem)
    {
        $bsno = $this->input->post('sb');
        if(!empty($sbver) && !empty($bsno))
        {
            foreach($bsno as $id)
            {
                $data['bis_ver'] = '1';
                return $this->db->update('business', $data, array('bsno' => $id));
            }
        }
        elseif(!empty($sbrem) && !empty($bsno))
        {
            foreach($bsno as $id)
            {
                $data['bis_del'] = '1';
                return $this->db->update('business', $data, array('bsno' => $id));
            }
        }
        else
        {
            return 0;
        }
    }

    public function nvbact($nvbver, $nvbsus, $nvbrem)
    {
        $bsno = $this->input->post('nvb');
        if(!empty($nvbver) && !empty($bsno))
        {
            foreach($bsno as $id)
            {
                $data['bis_ver'] = '1';
                return $this->db->update('business', $data, array('bsno' => $id));
            }
        }
        elseif(!empty($nvbsus) && !empty($bsno))
        {
            foreach($bsno as $id)
            {
                $data['bis_ver'] = '2';
                return $this->db->update('business', $data, array('bsno' => $id));
            }
        }
        elseif(!empty($nvbrem) && !empty($bsno))
        {
            foreach($bsno as $id)
            {
                $data['bis_del'] = '1';
                return $this->db->update('business', $data, array('bsno' => $id));
            }
        }
        else
        {
            return 0;
        }
    }

    public function vendors()
    {
        return $this->db->get_where('users', array('roleid' => '2', 'uis_del' => '0'))->result_array();
    }

    public function editvendor($uid)
    {
        return $this->db->get_where('users', array('uid' => $uid))->result_array();
    }

    public function updatevendor($uid)
    {
        $data['name'] = $this->input->post('evnm');
        $data['mobile'] = $this->input->post('evmb');
        $data['email'] = $this->input->post('evem');

        $config['upload_path'] = './images';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '';

        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('evpic');

        if(!empty($upload) && !empty($data['name']) && !empty($data['mobile']) && !empty($data['email']))
        {
            $doc = $this->upload->data();
            $data['image'] = './images/'.$doc['file_name'];
            return $this->db->update('users', $data, array('uid' => $uid));
        }
    }

    public function vendoract($vver, $vsus, $vrem, $act)
    {
        if(!empty($vver))
        {
            $data['uis_ver'] = '1';
            if($act == 'sv')
            {
                $uid = $this->input->post('sv');
                foreach($uid as $id)
                {
                    return $this->db->update('users', $data, array('uid' => $id));
                }
            }
            elseif($act == 'nvv')
            {
                $uid = $this->input->post('nvv');
                foreach($uid as $id)
                {
                    return $this->db->update('users', $data, array('uid' => $id));
                }
            }
        }
        elseif(!empty($vsus))
        {
            $data['uis_ver'] = '2';
            if($act == 'vv')
            {
                $uid = $this->input->post('vv');
                foreach($uid as $id)
                {
                    return $this->db->update('users', $data, array('uid' => $id));
                }
            }
            elseif($act == 'nvv')
            {
                $uid = $this->input->post('nvv');
                foreach($uid as $id)
                {
                    return $this->db->update('users', $data, array('uid' => $id));
                }
            }
        }
        elseif(!empty($vrem))
        {
            $data['uis_del'] = '1';
            if($act == 'vv')
            {
                $uid = $this->input->post('vv');
                foreach($uid as $id)
                {
                    return $this->db->update('users', $data, array('uid' => $id));
                }
            }
            elseif($act == 'sv')
            {
                $uid = $this->input->post('sv');
                foreach($uid as $id)
                {
                    return $this->db->update('users', $data, array('uid' => $id));
                }
            }
            elseif($act == 'nvv')
            {
                $uid = $this->input->post('nvv');
                foreach($uid as $id)
                {
                    return $this->db->update('users', $data, array('uid' => $id));
                }
            }
        }
    }

    public function pdetail($psno)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('business', 'business.bsno = products.bsno');
        $this->db->where('psno', $psno);
        return $this->db->get()->result_array();
    }

    public function cart($uid)
    {
        $this->db->select('cart.cartid, cart.quantity, cart.total_price, products.pimage, products.pname, products.pprice');
        $this->db->from('products');
        $this->db->join('cart', 'cart.psno = products.psno');
        $this->db->where('cart.uid', $uid);
        return $this->db->get()->result_array();
    }

    public function addtocart($uid)
    {
        $data['uid'] = $uid;
        $data['bsno'] = $this->input->post('bsno');
        $data['psno'] = $this->input->post('psno');
        $pp = $this->input->post('pprice');
        $quant = $this->input->post('quant');

        if(!empty($quant))
        {
            $data['total_price'] = $pp * $quant;
            $data['quantity'] = $quant;

            return $this->db->insert('cart', $data);
        }
        else
        {
            return 0;
        }
    }

    public function changecartpq($cartid)
    {
        $qnt = $this->input->post('qnt');
        $pp = $this->input->post('pp');
        $data['quantity'] = $qnt;
        $data['total_price'] = $qnt * $pp;

        if(!empty($data['quantity']) && !empty($data['total_price']))
        {
            return $this->db->update('cart', $data, array('cartid' => $cartid));
        }
    }

    public function delcartpro($cartid)
    {
        return $this->db->delete('cart', array('cartid' => $cartid));
    }

    public function changebilldetails($uid)
    {
        $qry = $this->db->get_where('billing_details', array('uid' => $uid))->result_array();
        $data['billname'] = $this->input->post('nm');
        $data['billmobile'] = $this->input->post('mob');
        $data['billemail'] = $this->input->post('eml');
        $data['bill_add'] = $this->input->post('add');
        $data['pin'] = $this->input->post('pin');
        $data['billcountry'] = $this->input->post('country');
        $data['stateid'] = $this->input->post('statid');
        $data['billcid'] = $this->input->post('ctid');
        $data['uid'] = $uid;

        if(!empty($qry))
        {
            if(!empty($data['billname']) && !empty($data['billmobile']) && !empty($data['billemail']) && !empty($data['bill_add']) && 
            !empty($data['pin']) && !empty($data['billcountry']) && !empty($data['stateid']) && !empty($data['billcid']))
            {
                return $this->db->update('billing_details', $data, array('uid' => $uid));
            }
        }
        else
        {    
            if(!empty($data['billname']) && !empty($data['billmobile']) && !empty($data['billemail']) && !empty($data['bill_add']) && 
            !empty($data['pin']) && !empty($data['billcountry']) && !empty($data['stateid']) && !empty($data['billcid']))
            {
                return $this->db->insert('billing_details', $data);
            }
        }
    }

    public function checkout($uid)
    {
        $this->db->select('*');
        $this->db->from('billing_details');
        $this->db->join('billstate', 'billstate.stateid = billing_details.stateid');
        $this->db->join('billcity', 'billcity.billcid = billing_details.billcid');
        $this->db->where('billing_details.uid', $uid);
        return $this->db->get()->result_array();
    }

    public function billstate()
    {
        return $this->db->get('billstate')->result_array();
    }

    public function billcart($uid)
    {
        $this->db->select('*');
        $this->db->from('cart');
        $this->db->join('products', 'products.psno = cart.psno');
        $this->db->where('cart.uid', $uid);
        return $this->db->get()->result_array();
    }

    public function get_city()
    {
        $statid = $this->input->post('statid');
        return $this->db->get_where('billcity', array('stateid' => $statid))->result_array();
    }

    public function buyerdetails($uid)
    {
        $this->db->select('total_price, name, mobile, email');
        $this->db->from('users');
        $this->db->join('cart', 'cart.uid = '.$uid);
        $this->db->where('users.uid', $uid);
        return $this->db->get()->result_array();
    }

    public function beforesuccess($uid, $sp, $billid, $mode)
    {
        // echo '<pre>';
        // print_r($_REQUEST);

        $pstatus = $this->input->get('payment_status');
        if($mode == 'online')
        {
            $data['payment_id'] = $this->input->get('payment_id');
            $data['payment_status'] = $pstatus;
            $data['payment_request_id'] = $this->input->get('payment_request_id');
            $data['total_price'] = $sp;
            $data['uid'] = $uid;

            if(!empty($data['payment_id']) && !empty($data['payment_status']) && !empty($data['payment_request_id']) && 
            !empty($data['total_price']) && !empty($data['uid']))
            {
                $this->db->insert('payment_details', $data);
            }
        }

        if($pstatus != 'Failed')
        {
            $x = 'LOCB';
            $y = rand(0, 100000);
            date_default_timezone_set('Asia/Kolkata');
            $z = date('dmyHis');

            $sql = $this->db->get_where('cart', array('uid' => $uid))->result_array();
            foreach($sql as $row)
            {
                $data2['pquantity'] = $row['quantity'];
                $data2['pvalue'] = $row['total_price'];
                $data2['psno'] = $row['psno'];
                $data2['billid'] = $billid;
                $data2['orderby'] = $uid;
                $data2['oprice'] = $sp;
                $data2['oid'] = $x.$y.$z;

                if(!empty($data2['pquantity']) && !empty($data2['pvalue']) && !empty($data2['psno']) && !empty($data2['billid']) && 
                !empty($data2['orderby']) && !empty($data2['oprice']) && !empty($data2['oid']))
                {
                    $this->db->insert('orders', $data2);
                }
            }
            $this->db->delete('cart', array('uid' => $uid));
        }
        return true;
    }

    public function uorders($uid)
    {
        $this->db->select('orders.oid, orders.oprice, orders.pquantity, orders.odate, orders.pvalue, products.pimage, products.pname');
        $this->db->from('orders');
        $this->db->join('products', 'products.psno = orders.psno');
        $this->db->where('orders.orderby', $uid);
        return $this->db->get()->result_array();
    }

    public function manageorders($uid, $roleid)
    {
        if($roleid == '1')
        {
            $this->db->select('*');
            $this->db->from('orders');
            $this->db->join('products', 'products.psno = orders.psno');
            $this->db->join('users', 'users.uid = orders.orderby');
            return $this->db->get()->result_array();
        }
        elseif($roleid == '2')
        {
            $this->db->select('*');
            $this->db->from('orders');
            $this->db->join('products', 'products.psno = orders.psno');
            $this->db->where('orderby', $uid);
            return $this->db->get()->result_array();
        }
    }
}