<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends APS_Model
{

  protected $table_device_logged;
  protected $table_gift;

  public function __construct()
  {
    parent::__construct();
    $this->table = 'account';
    $this->course = 'course';
    $this->course_translations = 'course_translations';
    $this->account_course = 'account_course';
    $this->order = 'order';
    $this->account_favorite = 'account_favorite';
    $this->order_detail = 'order_detail';
    $this->account_group = 'account_groups';
    $this->table_device_logged = 'logged_device';//bảng logged device
    $this->column_order = array("$this->table.id", "$this->table.id", "$this->table.full_name", "$this->table.phone", "$this->table.email", "$this->table.company", "$this->table.active"); //thiết lập cột sắp xếp
    $this->column_search = array("$this->table.full_name", "$this->table.email", "$this->table.phone"); //thiết lập cột search
    $this->order_default = array('id' => 'desc'); //cột sắp xếp mặc định

  }

  // Lấy danh sách các khóa học của học viên mua//đã active code
  public function getCourseActive($params = array(), $limit = 10, $page = 1)
  {
    $this->db->select('E.title, B.price, B.created_time, D.full_name, C.thumbnail, C.id, E.slug');
    $this->db->from("$this->account_course A");
    $this->db->join("$this->table D", 'A.account_id = D.id', 'inner');
    $this->db->join("$this->order_detail B", 'A.order_detail_id = B.order_id', 'inner');
    $this->db->join("$this->course C", 'B.course_id = C.id', 'inner');
    $this->db->join("$this->course_translations E", 'E.id = C.id', 'inner');
    $this->db->where('C.account_id', $params['account_id']);
    $this->db->where('E.language_code', $params['language_code']);
    if (!empty($params['date'])) $this->db->where('DATE(B.`created_time`) =', $params['date']);
    $offset = ($page - 1) * $limit;
    $this->db->limit($limit, $offset);
    $this->db->group_by('B.course_id');
    $this->db->order_by('B.created_time', 'DESC');
    $result = $this->db->get()->result();
    return $result;
  }

  public function getTotalCourseActive($params = array())
  {
    $this->db->select('1');
    $this->db->from("$this->account_course A");
    $this->db->join("$this->table D", 'A.account_id = D.id', 'inner');
    $this->db->join("$this->order_detail B", 'A.order_detail_id = B.order_id', 'inner');
    $this->db->join("$this->course C", 'B.course_id = C.id', 'inner');
    $this->db->join("$this->course_translations E", 'E.id = C.id', 'inner');
    $this->db->where('C.account_id', $params['account_id']);
    $this->db->where('E.language_code', $params['language_code']);
    if (!empty($params['date'])) $this->db->where('DATE(B.`created_time`) =', $params['date']);
    $this->db->group_by('B.course_id');
    $result = $this->db->get()->num_rows();
    return $result;
  }

  public function __where($args, $typeQuery = null)
  {
    $select = "*";
    //$lang_code = $this->session->admin_lang; //Mặc định lấy lang của Admin
    $page = 1; //Page default
    $limit = 10;

    extract($args);
    //$this->db->distinct();
    $this->db->select($select);
    $this->db->from($this->table);
    if (!empty($group_by))
      $this->db->group_by("$this->table.$group_by");

    if (!empty($other_active)) $this->db->where("$this->table.active !=", $other_active);
    if (isset($active)) $this->db->where("$this->table.active", $active);
    if (!empty($group_id)) {
      $this->db->join("account_groups", "account.id = account_groups.user_id");
      $this->db->where("account_groups.group_id", $group_id);
    }
    if (!empty($order_by)) $this->db->order_by('created_time', $order_by);

    if (!empty($search)) {
      $this->db->group_start();
      $this->db->like("$this->table.full_name", $search);
      $this->db->or_like("$this->table.email", $search);
      $this->db->or_like("$this->table.phone", $search);
      $this->db->group_end(); //close bracket
    }
    //query for datatables jquery
    $this->_get_datatables_query();

    $this->db->order_by('created_time', 'DESC');
    if (!empty($search_user)) {
      $this->db->group_start();
      $this->db->like("$this->table.username", $search_user);
      $this->db->group_end(); //close bracket
    }
    if ($typeQuery === null) {
      $offset = ($page - 1) * $limit;
      $this->db->limit($limit, $offset);
    }
  }

  public function getTotalPro($args = [])
  {
    $this->__where($args, "count");
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function get_by_id_account($id)
  {
    $this->db->select(array("$this->table.*", "$this->account_group.user_id", "$this->account_group.group_id"));
    $this->db->from($this->table);
    $this->db->join($this->account_group, "$this->table.id=$this->account_group.user_id");
    $this->db->where("$this->table.id", $id);
    return $this->db->get()->row();
  }

  public function getDataPro($args = array(), $returnType = "object")
  {
    $this->__where($args);
    $query = $this->db->get();
    if ($returnType !== "object") return $query->result_array(); //Check kiểu data trả về
    else return $query->result();
  }

  public function getUserByField($key, $value, $status = '')
  {
    $this->db->select('*');
    $this->db->where($this->table . '.' . $key, $value);
    if (!empty($status)) $this->db->where($this->table . '.active', $status);
    return $this->db->get($this->table)->row();
  }

  public function count_favorite_cat($account_id)
  {
    $this->db->select('1');
    $this->db->where('account_id', $account_id);
    return $this->db->get($this->table_like)->num_rows();
  }

  public function check_oauth($field, $oauth)
  {
    $this->db->where($field, $oauth);
    $tablename = $this->table;

    $this->db->select('1');
    return $this->db->get($tablename)->num_rows();
  }


  public function updateField($account_id, $key, $value)
  {
    $this->db->where($this->table . '.id', $account_id);
    $this->db->update($this->table, array($this->table . '.' . $key => $value));
    return true;
  }

  public function get_group_by_account_id($id)
  {
    $this->db->from($this->account_group);
    $this->db->where('user_id', $id);
    $query = $this->db->get();
    return $query->row();
  }

  public function getTotalDataCollaborators()
  {
    $this->db->select("*");
    $this->db->from($this->table);
    $this->db->join("$this->account_group", "$this->table.id = $this->account_group.user_id");
    $this->db->where("$this->account_group.group_id", 3);
    $this->db->where("$this->table.active", 1);
    $query = $this->db->get()->num_rows();
    return $query;
  }

  public function filter_collaborators($arg = [], $group = 3)
  {

    $column_search = array("$this->table.full_name", "$this->table.email", "$this->table.phone", "$this->table.address"); //thiết lập cột search
    $limit = 21;
    $arg['page'] = !empty($arg['page']) ? $arg['page'] : 1;

    $this->db->select("$this->table.full_name,$this->table.address,$this->table.phone,$this->table.email");
    $this->db->from($this->table);
    $this->db->join("$this->account_group", "$this->table.id = $this->account_group.user_id");
    $this->db->where("$this->account_group.group_id", $group);
    $this->db->where("$this->table.active", 1);
    if (!empty($arg['city'])) $this->db->where("$this->table.city", $arg['city']);
    if (!empty($arg['district'])) $this->db->where("$this->table.district", $arg['district']);

    if (!empty($arg['keyword'])) {
      $i = 0;
      foreach ($column_search as $item) {
        if ($arg['keyword']) {
          if ($i === 0) {
            $this->db->group_start();
            $this->db->like($item, $arg['keyword']);
          } else {
            $this->db->or_like($item, $arg['keyword']);
          }

          if (count($column_search) - 1 == $i)
            $this->db->group_end();
        }
        $i++;
      }
    }
    $offset = ($arg['page'] - 1) * $limit;
    $this->db->limit($limit, $offset);
    $this->db->order_by("$this->table.created_time", 'desc');

    $query = $this->db->get();
    return $query->result();
  }

  public function unlinkOld()
  {
    return $this->db->select('avatar')->from($this->table)->where('id', $this->session->account['account_id'])->get()->row();
  }

  // Lấy danh sách các khóa học của user đó
  public function getCourseAccount($params = array(), $limit = 12, $page = 1)
  {
    $this->db->select('E.title,  A.total_video ,A.id, A.price_old, A.price_new, E.description,A.is_status,A.level,
        A.thumbnail, A.rating, E.slug, A.sale, B.full_name,B.id tutor_id, B.avatar');
    $this->db->from("$this->course A");
    $this->db->join("$this->table B", 'A.account_id = B.id', 'inner');
    $this->db->join("$this->course_translations E", 'E.id = A.id', 'inner');
    $this->db->join("$this->order_detail D", 'D.course_id = A.id', 'inner');
    $this->db->join("$this->order C", 'C.id = D.order_id', 'inner');
    $this->db->where($params);
    $offset = ($page - 1) * $limit;
    $this->db->limit($limit, $offset);
    $this->db->order_by('D.created_time', 'DESC');
    $this->db->group_by('A.id');
    $result = $this->db->get()->result();
    return $result;
  }

  // Lấy danh sách các khóa học của user đó
  public function getTotalCourseAccount($params = array())
  {
    $this->db->select('1');
    $this->db->from("$this->course A");
    $this->db->join("$this->table B", 'A.account_id = B.id', 'inner');
    $this->db->join("$this->order_detail D", 'D.course_id = A.id', 'inner');
    $this->db->join("$this->order C", 'C.id = D.order_id', 'inner');
    $this->db->join("$this->course_translations E", 'E.id = A.id', 'inner');
    $this->db->where($params);
    $this->db->group_by('A.id');
    $result = $this->db->get()->num_rows();
    return $result;
  }

//  Kiểm tra xem khóa học đó user đã mua chưa
  public function checkBuyCourse($id_course, $user_id)
  {
    if (empty($id_course) || empty($user_id)) return false;
    $this->db->select('D.id');
    $this->db->from("$this->order_detail D");
    $this->db->join("$this->order C", 'C.id = D.order_id', 'inner');
    $this->db->where("D.course_id", $id_course);
    $this->db->where("C.status_act", 1);
    $this->db->where("C.account_id", $user_id);
    $this->db->where("C.is_status", 2);
    $data = $this->db->get()->row();
    return $data;
  }
  // Lấy danh sách khóa học ưu thích của user đó
  public function getCourseFavorite($params = array(), $limit = 12, $page = 1)
  {
    $this->db->select('E.title,  A.total_video ,A.id, A.price_old, A.price_new, E.description,A.is_status,A.level,
        A.thumbnail, A.rating, E.slug, A.sale, A.account_id');
    $this->db->from("$this->course A");
    $this->db->join("$this->course_translations E", 'E.id = A.id', 'inner');
    $this->db->join("$this->account_favorite D", 'D.course_id = A.id', 'inner');
    $this->db->join("$this->table B", 'B.id = D.account_id', 'inner');
    $this->db->where($params);
    $offset = ($page - 1) * $limit;
    $this->db->limit($limit, $offset);
    $this->db->order_by('D.created_time', 'DESC');
    $this->db->group_by('A.id');
    $result = $this->db->get()->result();
    return $result;
  }

  // tổng học ưu thích
  public function getTotalCourseFavorite($params = array())
  {
    $this->db->select('1');
    $this->db->from("$this->course A");
    $this->db->join("$this->course_translations E", 'E.id = A.id', 'inner');
    $this->db->join("$this->account_favorite D", 'D.course_id = A.id', 'inner');
    $this->db->join("$this->table B", 'B.id = D.account_id', 'inner');
    $this->db->where($params);
    $this->db->group_by('A.id');
    $result = $this->db->get()->num_rows();
    return $result;
  }

  //  Kiểm tra xem khóa học đó user đã mua chưa
  public function checkFavorite($id_course, $user_id)
  {
    if (empty($id_course) || empty($user_id)) return false;
    $this->db->select('1');
    $this->db->from("$this->account_favorite D");
    $this->db->where("D.course_id", $id_course);
    $this->db->where("D.account_id", $user_id);
    $data = $this->db->get()->row();
    return $data;
  }

  // Lấy danh sách khóa học ưu thích của user đó
  public function getTutorCourse($params = array(), $limit = 12, $page = 1)
  {
    $this->db->select('E.title,  A.total_video ,A.id, A.price_old, A.price_new, E.description,A.is_status,A.level,
        A.thumbnail, A.rating, E.slug, A.sale, B.full_name, B.avatar,B.id tutor_id');
    $this->db->from("$this->course A");
    $this->db->join("$this->table B", 'B.id = A.account_id', 'inner');
    $this->db->join("$this->course_translations E", 'E.id = A.id', 'inner');

    if (!empty($params['is_status'])) {
      if (is_array($params['is_status'])) $this->db->where_in("A.is_status", $params['is_status']);
      else $this->db->where("A.is_status", $params['is_status']);
    }
    if (!empty($params['account_id'])) {
      $this->db->where("A.account_id", $params['account_id']);
    }

    if (!empty($params['language_code'])) {
      $this->db->where("E.language_code", $params['language_code']);
    }
    $offset = ($page - 1) * $limit;
    $this->db->limit($limit, $offset);
    $this->db->order_by('A.created_time', 'DESC');
    $result = $this->db->get()->result();
    return $result;
  }

  // tổng học ưu thích

  public function getTotalTutorCourse($params = array())
  {
    $this->db->select('1');
    $this->db->from("$this->course A");
    $this->db->join("$this->table B", 'B.id = A.account_id', 'inner');
    $this->db->join("$this->course_translations E", 'E.id = A.id', 'inner');
    if (!empty($params['is_status'])) {
      if (is_array($params['is_status'])) $this->db->where_in("A.is_status", $params['is_status']);
      else $this->db->where("A.is_status", $params['is_status']);
    }
    if (!empty($params['account_id'])) {
      $this->db->where("A.account_id", $params['account_id']);
    }
    if (!empty($params['language_code'])) {
      $this->db->where("E.language_code", $params['language_code']);
    }
    $result = $this->db->get()->num_rows();
    return $result;
  }

  public function getRule($id)
  {
    $this->db->select('A.id');
    $this->db->from('groups A');
    $this->db->join('account_groups B', 'A.id = B.group_id', 'inner');
    $this->db->join('account C', 'C.id = B.user_id', 'inner');
    $this->db->where(['C.id' => $id]);
    $this->db->limit(1);
    $data = $this->db->get()->row();
    if (!empty($data)) return $data->id;
    return 0;
  }

  public function checkActive($id = 0)
  {
    $this->db->select('active');
    $this->db->from('account');
    $this->db->where(['id' => $id]);
    $resul = $this->db->get()->row()->active;
    if ($resul == 1) return TRUE;
    return FALSE;
  }

  public function userInvalid($id, $courseID)
  {
    $this->db->select('course_id');
    $this->db->from('account_course');
    $this->db->where(['account_id' => $id]);
    $this->db->limit(1);
    $course_id = $this->db->get()->row();
    if (!empty($course_id) && $courseID == $course_id->course_id) return TRUE;
    return FALSE;
  }

  public function userInvalidFull($id, $courseID)
  {
    $this->db->select('*');
    $this->db->from('account_course');
    $this->db->where(['account_id' => $id,'course_id'=>$courseID]);
    $course_id = $this->db->get()->row();
    return $course_id;
  }

  public function getDataTutorSelect2($params = array())
  {
    $this->db->select(array("$this->table.id", "$this->table.full_name", "$this->table.email"));
    $this->db->from($this->table);
    $this->db->join("$this->account_group", "$this->account_group.user_id=$this->table.id");
    if (!empty($params['group_id'])) $this->db->where("$this->account_group.group_id", $params['group_id']);
    if (!empty($params['active'])) $this->db->where("$this->table.active", $params['active']);
    if (!empty($params['search'])) {
      $this->db->group_start();
      $this->db->like("$this->table.full_name", $params['search']);
      $this->db->or_like("$this->table.email", $params['search']);
      $this->db->or_like("$this->table.phone", $params['search']);
      $this->db->group_end(); //close bracket
    }
    if (!empty($params['limit'])) $this->db->limit($params['limit']);
    return $this->db->get()->result();
  }
  public function getAccount($id)
  {
    $this->db->select('id,email,full_name');
    $this->db->from($this->table);
    $this->db->where_in('id',$id);
    $data = $this->db->get()->result();
    return $data;
  }
}
