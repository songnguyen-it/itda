<?php
/*
Plugin Name: Song Nguyen
Plugin URI: https://songnguyenit.com/
Description: Add Company tab to BuddyBoss profile nav
Version: 1.0.6
Author: SongNguyen Company
Author URI: https://songnguyenit.com/
License: GPL
*/


if (!class_exists("Nvt_Custom_BP_Profile_Nav")) {
    class Nvt_Custom_BP_Profile_Nav
    {
        function __construct()
        {
            if (!function_exists('add_shortcode')) {
                return;
            }
            add_shortcode( 'nvt_custom_bp_profile_nav' , array(&$this, 'create_shortcode_func') );
        }
        function create_shortcode_func($atts=array(), $content=null)
        {
            extract(shortcode_atts(array('text' => 'Companies'), $atts));
            return ncbpn_show_tab($text);
        }
    }
}
function ncbpn_load()
{
    global $mfpd;
    $mfpd = new Nvt_Custom_BP_Profile_Nav();
}
add_action( 'plugins_loaded', 'ncbpn_load' );
function ncbpn_show_tab($text){
    echo "Will show list company here !!";
}
function ncbpn_add_admin_menu()
{
    add_menu_page (
        'Custom Profile',
        'Custom Profile',
        'manage_options',
        'custom_bp_profile_nav',
        'ncbpn_view_guid',
        '',
        '2'
    );
}
function ncbpn_view_guid()
{

//  id	  status_field	  meta_key	  type	  label	  description	  placeholder	  priority	
    global $wpdb;
    $result = $wpdb->get_results("SELECT * FROM wp8i_company_field");
    $data = '';
    if(!empty($result)){
      foreach ($result as $val) {
        $data .=  
          '<tr>
            
              <td>'             .  $val -> meta_key .        '</td>
              <td>'             .  $val -> type .            '</td>
              <td>'             .  $val -> label .           '</td>
              <td>'             .  $val -> description .     '</td>
              <td>'             .  $val -> placeholder .     '</td>
              <td>'             .  $val -> priority .        '</td>

              <td>
                  <button type="button" class="btn btn-danger btn-sm delete" id=' .  $val->id  . '>Delete</button>
                  <button type="button" class="btn btn-info btn-sm edit" id='.$val->id.'>Edit</button>
              </td>
          </tr> ';
      }

      $data .= '<div class="modal fade" id="form-company-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Edit Company Field</h5>
                  <div class="text-danger ml-3 font-weight-bold" style="font-size:12px">(*) fields is required</div>
              </div>
           
              <div class="modal-body">
                  <form id="form_update_dropdown">
                      <div class="form-group">
                          <label for="meta_key_edit">Meta Key <span class="text-danger font-weight-bold">*</span></label>
                          <input type="text" class="form-control form-control-sm"
                              placeholder="Meta Key" id="meta_key_edit" name="meta_key_edit">

                          <input type="hidden"  value="" id="id_hidden" name="id_hidden">
                      </div>
                      <div class="form-group d-flex justify-content-between">
                          <label for="type_edit">Type <span class="text-danger font-weight-bold">*</span></label>
                          <select class="custom-select custom-select-sm" id="type_edit" name="type_edit">
                              <option selected>Choose Field Type</option>
                              <option value="text-box">Text Box</option>
                              <option value="text-area">Text Area</option>
                              <option value="dropdown">Dropdown</option>
                              <option value="file-upload">File Upload</option>
                          </select>
                      </div>


                      <div id="field_dropdown_update" class="border" style="display: block;">
                          
                      </div>

                      <div class="row my-2 m-1">
                        <button type="button" class="btn btn-info btn-sm" id="add_field_dropdown_update" style="display: block;">Add Another</button>
                      </div>


                      <div class="form-group">
                          <label for="label_edit">Label <span class="text-danger font-weight-bold">*</span></label>
                          <input type="text" class="form-control form-control-sm" placeholder="Label" id="label_edit" name="label_edit">
                          </div>
                          <div class="form-group">
                              <label for="description_edit">Description</label>
                              <input type="text" class="form-control form-control-sm" placeholder="Description" id="description_edit" name="description_edit">
                          </div>
                          <div class="form-group">
                              <label for="placeholder_edit">Placeholder</label>
                              <input type="text" class="form-control form-control-sm" placeholder="Placeholder" id="placeholder_edit" name="placeholder_edit">
                          </div>
                          <div class="form-group">
                              <label for="priority_edit">Priority</label>
                              <input type="number" class="form-control form-control-sm" placeholder="Priority" id="priority_edit" name="priority_edit">
                      </div>
                  </form>
              </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-info btn-sm" id="update-company-field">Update</button>
                  </div>
              </div>
              </div>
          </div>
        </div>';
    }



    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <title>Company Field</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="m-3">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#form-company-field">
                    Add Company Field
                </button>
    
                <!-- Modal -->
                <div class="modal fade" id="form-company-field" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Company Field</h5>
                                <p class="text-danger font-weight-bold" style="font-size:12px">(*) field is required</p>
                            </div>

                            <div class="alert alert-danger m-4" role="alert" id="alert-company-form">
                                Form must be fill some field
                            </div>

                            <div class="modal-body">
                                <form id="dropdown_child">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Meta Key <span class="text-danger font-weight-bold">*</span></label>
                                        <input type="text" class="form-control form-control-sm" id="meta_key"
                                            placeholder="Meta Key" name="meta_key">
                                    </div>

                                    <div class="form-group d-flex justify-content-between">
                                        <label for="formGroupExampleInput2">Type <span class="text-danger font-weight-bold">*</span></label>
                                        <select class="custom-select custom-select-sm" id="type" name="type">
                                            <option selected>Field type</option>
                                            <option value="text-box">Text Box</option>
                                            <option value="text-area">Text Area</option>
                                            <option value="dropdown">Dropdown</option>
                                            <option value="file-upload">File Upload</option>
                                            <option value="file-upload">Document Upload</option>
                                        </select>
                                    </div>



                                      <div id="field_type" class="border">
                                        <div class="row my-2 p-2 m-1" id="dropdown_child">
                                          <div class="col">
                                            <input type="text" class="form-control form-control-sm" placeholder="Value" name="value0" id="v1">
                                          </div>
                                          <div class="col">
                                            <input type="text" class="form-control form-control-sm" placeholder="Caption" name="caption0">
                                          </div>
                                        </div>
                                      </div>
                                    

                                    <div class="row my-2 m-1" >
                                      <button type="button" class="btn btn-info btn-sm" id="add_field">Add Another</button>
                                    </div>


                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Label <span class="text-danger font-weight-bold">*</span></label>
                                        <input type="text" class="form-control form-control-sm" id="label"
                                            placeholder="Label" name="label">
                                    </div>

                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Description</label>
                                        <input type="text" class="form-control form-control-sm" id="description"
                                            placeholder="Description" name="description">
                                    </div>

                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Placeholder</label>
                                        <input type="text" class="form-control form-control-sm" id="placeholder"
                                            placeholder="Placeholder" name="placeholder">
                                    </div>

                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Priority</label>
                                        <input type="number" class="form-control form-control-sm" id="priority"
                                            placeholder="Priority" name="priority">
                                    </div>
                                </form>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-info btn-sm" id="save-company-field">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-3">
                <table class="table table-sm">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th scope="col">Meta Key</th>
                            <th scope="col">Type</th>
                            <th scope="col">Label</th>
                            <th scope="col">Description</th>
                            <th scope="col">Placeholder</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Modify</th>
                        </tr>
                    </thead>
                    <tbody>
                        '
                        . $data.

                        '                   
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    </html>
    ';

}
// backup option of dropdown field
// <option value="file-upload">File Upload</option>

add_action('admin_menu', 'ncbpn_add_admin_menu');
function ncbpn_add_tabs(){
    global $bp;
    bp_core_new_nav_item( array( 
        'name' => 'Company', 
        'slug' => 'company', 
        'position' => 45,
        'screen_function' => 'ibenic_budypress_recent_posts',
        'show_for_displayed_user' => true,
        'item_css_id' => 'ibenic_budypress_recent_posts'
    ) );
}
add_action( 'bp_setup_nav', 'ncbpn_add_tabs', 1000 );
function ibenic_budypress_recent_posts () {

    add_action( 'bp_template_content', 'ncbpn_recent_posts_content' );
    bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}
/*function ncbpn_recent_posts_title() {
    echo "Company";
}*/


/************************************************************************************************************************************************************
 *                                      add css and js file
 ************************************************************************************************************************************************************/
function npp_enqueue_scripts_and_styles()
{
    wp_register_style( 'bootstrap.min', plugin_dir_url( __FILE__ ).'css/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap.min' );

    wp_register_style( 'plugin_css', plugin_dir_url( __FILE__ ).'css/plugin_css.css' );
    wp_enqueue_style( 'plugin_css' );

    wp_register_script( "bootstrap_js", WP_PLUGIN_URL.'/nvt_custom_bp_profile_nav/js/bootstrap.min.js', array('jquery') );
    
    // đăng ký ajax và script
    wp_register_script( "js", WP_PLUGIN_URL.'/nvt_custom_bp_profile_nav/js/script_plugin.js', array('jquery') );
    wp_localize_script( 'js', 'ajaxobject', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'rootURL'=>site_url()));  
    


    wp_enqueue_script( 'bootstrap_js' );
    wp_enqueue_script( 'js' );
}

//  add css to UI and WP-Admin
add_action( 'wp_enqueue_scripts', 'npp_enqueue_scripts_and_styles' );
add_action( 'admin_enqueue_scripts', 'npp_enqueue_scripts_and_styles' );




/************************************************************************************************************************************************************
 *                                      add Isaac Newton process for and new company form
 ************************************************************************************************************************************************************/
add_action("wp_ajax_form", "handle_form");
add_action("wp_ajax_nopriv_form", "handle_form");
function handle_form(){

  $data = $_POST["data"];
  $dataJson =  json_encode($data);
  $checkEmptyValue = ""; 

  foreach ($data as $item) {
    $checkEmptyValue .= $item["value"];
  }

  if(strlen($checkEmptyValue) == 0){
    wp_send_json( array('code'=> 400, 'msg'=>'bad request' ) );
  }
  else{
    $user_id = get_current_user_id();
    global $wpdb;
    $res = $wpdb-> insert( 
      "wp8i_postmeta", 
      array( 
        'post_id' => $user_id, 
        'meta_key' => 'company_ahihi', 
        'meta_value' => $dataJson 
      ), 
      array( 
        '%d', 
        '%s',
        '%s'
      ) 
    );
    if(!$res){
      wp_send_json( array('code'=> 400, 'msg'=>'Can not insert') );
    }
    else {
      wp_send_json( array('code'=>200, 'msg'=>'Successfully !') );
    }
  }
}


/************************************************************************************************************************************************************
 *                                      add Isaac Newton process for and new company form
 ************************************************************************************************************************************************************/
add_action("wp_ajax_getListCompany", "getListCompany");
add_action("wp_ajax_nopriv_getListCompany", "getListCompany");
function getListCompany(){

  $user_id = get_current_user_id();
  global $wpdb;
  $result = [];
 
  global $wp;
  $fullUrl =  add_query_arg( $wp->query_vars, home_url( $wp->request ) );
  // $fullUrl =  add_query_arg( $wp->query_vars, home_url( $wp->request ) ) . '<br>';
  $men = explode("/",$fullUrl);

  // user login here
  $the_user = get_user_by('login', $men[9]);
  $the_user_id = $the_user-> ID;

  $result = $wpdb->get_results("SELECT * FROM wp8i_postmeta WHERE meta_key = 'company_ahihi' and post_id =" . $user_id );
  wp_send_json( array('code'=> 200, 'msg'=> $result) );  
}



// add_filter( 'template_include', 'ncbpn_recent_posts_content' );
function ncbpn_recent_posts_content() {
/********************************************************************
 ******************** Tổng tài hành chính ***************************
 *******************************************************************
 */
  $checkUserOwnThisCompany = false;

  $user_id = get_current_user_id();
  $userIslogin = is_user_logged_in();
  global $wpdb;
  $result = [];
  $dataForm = [];

  $result = $wpdb->get_results("SELECT * FROM wp8i_postmeta WHERE meta_key = 'company_ahihi' and post_id = " . $user_id );
  $formInput = "";
  $dataForm = $wpdb->get_results("SELECT * FROM wp8i_company_field");

  // print_r($dataForm);
  foreach ($dataForm as $val ) {
    if($val->type == "text-box"){
      $formInput .= '
      <div class="form-group">
        <label for="formGroupExampleInput">' . $val->label . '</label>
        <input type="text" class="form-control" name="'. $val->meta_key .'" id="'. $val-> id .'" placeholder="' . $val-> placeholder .'">
      </div>';
    }

    if($val->type == "dropdown"){
      $selectOptionStart = '<select class="form-control form-control-sm" name="'. $val->meta_key  .'"> <option selected>Choose option</option>';
      $selectOptionEnd = '</select>';
      $jsondecodeDropdown = json_decode($val -> dropdown);
      foreach ($jsondecodeDropdown as $item) {
        // var_dump($item);
        $selectOptionStart .= 
            '<option  value="'. $item->value .'">'. $item->value .'</option>';
      }
    
      $formInput .= '
      <div class="form-group">
        <label for="formGroupExampleInput">' . $val->label . '</label>
        ' . $selectOptionStart . $selectOptionEnd .'
      </div>';
    }

    if($val->type == "file-upload"){
      $formInput .= '
      <div class="form-group">
        <label for="">' . $val->label . '</label>
        <br/>
        <input type="file"  name="'. $val->meta_key .'" class="form-control upload_document"  style="border: solid 2px black; border-radius: 50px; background-color: black; color: white; width: 220px">

        <input hidden value="" name="img_'. $val->meta_key .'"/>
        
      </div>';
    }
    // <input type="file" id="uploadDocument" style="border: solid 2px black; border-radius: 50px; background-color: black; color: white; width: 210px">
    // <input accept="image/png, image/jpeg" type="file" class="form-control" name="'. $val->meta_key .'" >

    if($val->type == "text-area"){
      $formInput .= '
      <div class="form-group">
        <label>' . $val->label . '</label>
        <textarea name="'. $val->meta_key .'" rows="4" cols="50"></textarea>
      </div>';
    }

    


 
    
  }

  $listStart = '<div id="accordion">';
  $listEnd = '</div>';

  if(empty($result) && $userIslogin){
    echo '<div class="text-right">
    <button type="button" class="btn btn-outline-primary btn-sm mb-4" data-toggle="modal" data-target="#exampleModalCenter">Add Company </button>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLongTitle">Add Company</h6>
          </div>
          <div class="text-danger ml-3">(*) fields is required</div>
          <div class="modal-body">
          <div class="alert alert-danger" id="kitchen_floor" role="alert">
          </div>
            <form id="company_form_field">
              '. $formInput.'
              
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" style="background-color: red; border: 1px solid red !important">Close</button>
            <button type="button" class="btn btn-success btn-sm" id="submit">Save</button>
          </div>
        </div>
      </div>
    </div>';
  }

  else{
    foreach ($result as $val) {
      $databaseUserID = $val -> post_id  ;
      $buttonDelete = '';
      $infoCompany = '';
      $companyName = "";
      if($databaseUserID == $user_id){
        $buttonDelete .=  '<button type="button" class="btn btn-danger remove_company" ' . 'id="'. $val -> meta_id . '" style="background-color: #DC3545; border: solid 1px #DC3545;">Delete</button>';
        $checkUserOwnThisCompany = true;
        
      }
      $dataDecode =  json_decode($val-> meta_value);
    
      foreach ($dataDecode as $val2) {

        $nameOk = strtoupper(str_replace("_"," ",$val2->name));


        // add company name to top of collapse  
        if($val2->name == 'company_name'){$companyName = $val2->value;}
          $infoCompany .= '
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-4 col-form-label">'.$nameOk.':</label>
            <div class="col-sm-8">
              <p type="text" readonly class="form-control-plaintext" id="company-infomation">'.$val2->value.'</p>
            </div>
          </div>
        ';
      }


      $listStart .= '
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link btn-sm" data-toggle="collapse" data-target="#xxx'.$val->meta_id.'" aria-expanded="true" aria-controls="collapseOne">
              Company: '.  $companyName.' 
              </button>
              <a href="'.home_url().'/company-info/'. $val->meta_id. '" class="badge badge-pill badge-danger text-white p-2">Detail</a>
            </h5>
          </div>
          <div id="xxx'.$val->meta_id.'" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
            '
              .$infoCompany.

            '
            <div class="text-right">' . $buttonDelete.'</div>
            </div>
          </div>
        </div>
        
      
      
        ';
    } 
  }


  $form =  '
    <div class="text-right">
    <button type="button" class="btn btn-primary mb-4 btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Add Company </button>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLongTitle">Add Company</h6>
          </div>
          <div class="modal-body">
          <div class="alert alert-danger" id="kitchen_floor" role="alert">
          </div>
            <form id="company_form_field">
              
              ' . $formInput. '
              
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" style="background-color: gray; border: 1px solid gray !important">Close</button>
            <button type="button" class="btn btn-success btn-sm" id="submit">Save</button>
          </div>
        </div>
      </div>
    </div>

    
    ';

  $content1 = '<div class="content">';
  $content2 = '</div>'; 

  global $wp;
  $fullUrl =  add_query_arg( $wp->query_vars, home_url( $wp->request ) );
  // $fullUrl =  add_query_arg( $wp->query_vars, home_url( $wp->request ) ) . '<br>';
  $men = explode("/",$fullUrl);

  // user login here
  $the_user = get_user_by('login', $men[9]);
  $the_user_id = $the_user-> ID;

  if($userIslogin && $checkUserOwnThisCompany && $the_user_id == $user_id){
    echo $form . $content1 . $listStart . $listEnd . $content2;
  }

  else if(!$userIslogin){
    // store data when user not login
    $resultNotLogin = [];
    $resultNotLogin = $wpdb->get_results("SELECT * FROM wp8i_postmeta WHERE meta_key = 'company_ahihi' and post_id =" . $the_user_id );

    // group component list
    $listStartNoLogin = '<div id="accordion">';
    $listEndNoLogin = '</div>';
    $countCompany = 0;
    foreach ($resultNotLogin as $val) {

      $companyName = "";
      $infoCompany = '';
      $dataDecode =  json_decode($val-> meta_value);
      foreach ($dataDecode as $val2) {

        $nameOk = strtoupper(str_replace("_"," ",$val2->name));
        if($val2->name == 'company_name'){$companyName = $val2->value; $countCompany = $countCompany + 1;}
        $infoCompany .= '
        <div class="form-group row">
          <label for="staticEmail" class="col-sm-4 col-form-label">'.$nameOk.':</label>
          <div class="col-sm-8">
            <p type="text" readonly class="form-control-plaintext" id="company-infomation">'.$val2->value.'</p>
          </div>
        </div>
      ';
      }
 
      $listStartNoLogin .= '
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#xxx'.$val->meta_id.'" aria-expanded="true" aria-controls="collapseOne">
              Company: '. $companyName.'
              </button>
              <a href="'.home_url().'/company-info/'. $val->meta_id. '" class="badge badge-pill badge-danger text-white p-2">Detail</a>
            </h5>
          </div>

          <div id="xxx'.$val->meta_id.'" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
            '
              .$infoCompany.

            '
            </div>
          </div>
        </div>
      ';
    } 


   
    // check value type safe and render to view
    if(empty($resultNotLogin)){
      echo "No have information";
    }
    else{ 
      echo $content1 . $listStartNoLogin . $listEndNoLogin . $content2;
    }    
  }
  else{
    // echo "i am login buton i am not own someone who post";
    $resultNotLogin = [];

    $resultNotLogin = $wpdb->get_results("SELECT * FROM wp8i_postmeta WHERE meta_key = 'company_ahihi' and post_id =" . $the_user_id );

    // group component list
    $listStartNoLogin = '<div id="accordion">';
    $listEndNoLogin = '</div>';
    $countCompany = 0;
    foreach ($resultNotLogin as $val) {
  
      $infoCompany = '';
      $companyName = "";
      $dataDecode =  json_decode($val-> meta_value);
      foreach ($dataDecode as $val2) {

        $nameOk = strtoupper(str_replace("_"," ",$val2->name));
        if($val2->name == 'company_name'){$companyName = $val2->value; $countCompany = $countCompany + 1;}
        $infoCompany .= '
        <div class="form-group row">
          <label for="staticEmail" class="col-sm-4 col-form-label">'.$nameOk.':</label>
          <div class="col-sm-8">
            <p type="text" readonly class="form-control-plaintext" id="company-infomation">'.$val2->value.'</p>
          </div>
        </div>
      ';
      }
 
      $listStartNoLogin .= '
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#xxx'.$val->meta_id.'" aria-expanded="true" aria-controls="collapseOne">
              Company: '. $companyName.'
              </button>
              <a href="'.home_url().'/company-info/'. $val->meta_id. '" class="badge badge-pill badge-danger text-white p-2">Detail</a>
            </h5>
          </div>
          <div id="xxx'.$val->meta_id.'" class="collapse" aria-labelledby="headingOne" data-parent="#accordion ">
            <div class="card-body">
            '
              .$infoCompany.

            '
            </div>
          </div>
        </div>

        <script>
          console.log("xin chao");
        </script>
      ';
    } 


    // check value type safe and render to view
    if(empty($resultNotLogin)){
      echo "No have information";
    }
    else{ 
      echo $content1 . $listStartNoLogin . $listEndNoLogin . $content2;
    }  
  }
}




/************************************************************************************************************************************************************
 *                                      add shortcut to template
 ************************************************************************************************************************************************************/
function create_shortcode_songnguyen($args) {
  return $args['company'];
}
add_shortcode( 'company_name', 'create_shortcode_songnguyen' );


function create_shortcode_test() {
  return "test ok shortcode nha ba con";
}
add_shortcode( 'company_test', 'create_shortcode_test' );




/************************************************************************************************************************************************************
 *                                     handle for delete company action clicked
 ************************************************************************************************************************************************************/
add_action("wp_ajax_deleteCompany", "deleteCompany");
add_action("wp_ajax_nopriv_deleteCompany", "deleteCompany");
function deleteCompany(){

  $idNeedRemove =  $_POST['id'];
  if(!empty($idNeedRemove)){
    global $wpdb;
    $result = $wpdb->delete( 
      "wp8i_postmeta", 
      array( 
        'meta_id' => $idNeedRemove
      ), 
      array( 
        '%d'
      ) 
    );

    if(!$result){
      wp_send_json( array('code'=> 400, 'msg'=>'Can not delete ') );
    }
    else{
      wp_send_json( array('code'=> 200, 'msg'=>'Delete ok men ') );
    }

  }
}





/************************************************************************************************************************************************************
 *                                     handle for delete company action clicked
 ************************************************************************************************************************************************************/
add_action("wp_ajax_updateInfoMember", "updateInfoMember");
add_action("wp_ajax_nopriv_updateInfoMember", "updateInfoMember");
function updateInfoMember(){

  $bbID = $_POST['bp_id'];

  global $wpdb;
  $result = $wpdb->get_results("SELECT COUNT(*) as number FROM wp8i_posts WHERE post_type = 'job_listing' and  post_status= 'publish' and post_author = " . $bbID );
  
  $countCompany = $wpdb->get_results("SELECT COUNT(*) as company FROM wp8i_postmeta WHERE meta_key  = 'company_ahihi' ");

  wp_send_json( array('code'=> 200, 'msg'=> $result , 'id' => $bbID, 'company_count' => $countCompany ) );
  
}


/************************************************************************************************************************************************************
 *                                     Admin Dashboard
 ************************************************************************************************************************************************************/

//  *************add company field*************
add_action("wp_ajax_addCompanyField", "addCompanyField");
add_action("wp_ajax_nopriv_addCompanyField", "addCompanyField");
function addCompanyField(){
  $meta_key =  $_POST['meta_key'];
  $type =  $_POST['type'];
  $label =  $_POST['label'];
  $description =  $_POST['description'];
  $placeholder =  $_POST['placeholder'];
  $priority =  $_POST['priority'];
  $dropdown =  $_POST['dropdown'];
  $dropdownJsonData = json_encode($dropdown);

  if( empty($meta_key) || empty($label) || empty($type)){
    wp_send_json( array('code'=> 400, 'msg'=>'Form field required') );
  }
  else{
    global $wpdb;
    $res = $wpdb->insert( 
      "wp8i_company_field", 
      array( 
        // 'status_field' => $status_field, 
        'meta_key' => $meta_key, 
        'type' => $type, 
        'label' => $label, 
        'description' => $description, 
        'placeholder' => $placeholder, 
        'priority' => $priority,
        'dropdown' => $dropdownJsonData
      ), 
      array( 
        '%s', 
        '%s',
        '%s',
        '%s',
        '%s',
        '%s',
        '%s',
        '%s'
      ) 
    );
    if(!$res){
      wp_send_json( array('code'=> 404, 'msg'=>'Can not insert Company Field') );
    }
    else {
      wp_send_json( array('code'=>200, 'msg'=>'Successfully Company Field !') );
    }
  }
}



//  remove company field
add_action("wp_ajax_removeCompanyField", "removeCompanyField");
add_action("wp_ajax_nopriv_removeCompanyField", "removeCompanyField");
function removeCompanyField(){


  $idDelete =  $_POST['idDelete'];
  if(!empty($idDelete)){
    global $wpdb;
    $result = $wpdb->delete( 
      "wp8i_company_field", 
      array( 
        'ID' => $idDelete
      ), 
      array( 
        '%d'
      ) 
    );

    if(!$result){
      wp_send_json( array('code'=> 400, 'msg'=>'Can not delete company field') );
    }
    else{
      wp_send_json( array('code'=> 200, 'msg'=>'Delete company feild OK') );
    }

  }
}


//  ************require data for from edit***************
add_action("wp_ajax_editCompanyField", "editCompanyField");
add_action("wp_ajax_nopriv_editCompanyField", "editCompanyField");
function editCompanyField(){
  $idEdit = $_POST['idEdit'];
  global $wpdb;
  $result = $wpdb->get_results("SELECT * FROM wp8i_company_field WHERE id = ".$idEdit);

  if(!empty($result)){
    wp_send_json( array('code'=> 200, 'msg'=> $result));
  }
  else{
    wp_send_json( array('code'=> 401, 'msg'=> 'Empty'));
  }
}



//  ***************update company field***************
add_action("wp_ajax_updateCompanyField", "updateCompanyField");
add_action("wp_ajax_nopriv_updateCompanyField", "updateCompanyField");
function updateCompanyField(){

  $id = $_POST['id'];
  $meta_key = $_POST['meta_key'];
  $type = $_POST['type'];
  $description = $_POST['description'];
  $placeholder = $_POST['placeholder'];
  $label = $_POST['label'];
  $priority = $_POST['priority'];
  $dropdown = $_POST['dropdown'];

  $dropdownJson = json_encode($dropdown);
  global $wpdb;
  $result = $wpdb->update('wp8i_company_field', array( 'meta_key'=>$meta_key,'dropdown'=>$dropdownJson, 'type'=>$type, 'description'=>$description, 'placeholder'=>$placeholder, 'label'=>$label, 'priority'=>$priority, ), array('id'=>$id));

  if(!empty($result)){
    wp_send_json( array('code'=> 200, 'msg'=> "Update company field OK"));
  }
  else{
    wp_send_json( array('code'=> 401, 'msg'=> 'Cant update company field'));
  }

}


add_action("wp_ajax_followingButtonClicked", "followingButtonClicked");
add_action("wp_ajax_nopriv_followingButtonClicked", "followingButtonClicked");
function followingButtonClicked(){

  wp_send_json( array('code'=> 200, 'msg'=> "button clicked"));

  // global $wpdb;
  // $result = $wpdb->update('wp8i_company_field', array( 'meta_key'=>$meta_key,'dropdown'=>$dropdownJson, 'type'=>$type, 'description'=>$description, 'placeholder'=>$placeholder, 'label'=>$label, 'priority'=>$priority, ), array('id'=>$id));

  // if(!empty($result)){
  //   wp_send_json( array('code'=> 200, 'msg'=> "Update company field OK"));
  // }
  // else{
  //   wp_send_json( array('code'=> 401, 'msg'=> 'Cant update company field'));
  // }

}




// add custom url and template
function npp_plugin_register_query_vars( $vars ) {
  global $wp_query;
  $vars[] = 'uid';
  return $vars;
}
add_filter( 'query_vars', 'npp_plugin_register_query_vars' );


function npp_plugin_rewrite_tag_rule() {
  add_rewrite_rule( '^company-info/([^/]*)/?', 'index.php?pagename=company-info&uid=$matches[1]','top' );
  flush_rewrite_rules();
}
add_action('init', 'npp_plugin_rewrite_tag_rule', 10, 0);
add_filter( 'template_include', 'npp_psychic_profile' );

function npp_psychic_profile( $original_template ) {
  global $wp_query;
  if (array_key_exists ('pagename', $wp_query->query_vars ) && $wp_query->query_vars['pagename']==='company-info' ) {
   
        $id = $wp_query->query_vars['uid'];
        global $wpdb;
        $result = $wpdb->get_results("SELECT * FROM wp8i_postmeta WHERE meta_key='company_ahihi' AND meta_id = ".$id);

        $userId = $result[0]->post_id;
        $nameUserOwner = "";
        $userInTable = $wpdb->get_results("SELECT user_nicename FROM wp8i_users WHERE ID = ".$userId);
  
        $nameUserOwner = $userInTable[0]->user_nicename;
        $jsonDataCompany = json_decode($result[0]->meta_value);

        $companyName = "";
        $companyDescription = "";
        $companyLogo = "";
        $listPhotoPath = [];

        foreach ($jsonDataCompany as $key) {
          $checkImage = strpos($key->name , "img");

          if($key->name == "company_name"){ $companyName = $key->value;} // get company name
          if($key->name == "description"){ $companyDescription = $key->value;} // get company description
          if($key->name == "img_company_logo"){ $companyLogo = $key->value;} // get company logo

          if(is_numeric($checkImage)){
          
            array_push($listPhotoPath, $key->value);
  
          }
      
        
        }


        set_query_var( 'info_company_array', $jsonDataCompany );
        set_query_var( 'logo_string', $companyLogo );
        set_query_var( 'photo_array', $listPhotoPath );
        set_query_var( 'name_userowner_string', $nameUserOwner );
        set_query_var( 'company_name_string', $companyName );
        set_query_var( 'company_description_string', $companyDescription );
        set_query_var( 'id_user', $wp_query->query_vars['uid']);
        add_filter( 'document_title_parts', 'custom_title', 11, 1);
        return dirname(__FILE__) . '/single-movie-image.php';
  } else {
      return $original_template;
  }
}





// upload file
add_action("wp_ajax_saveDocument", "saveDocument");
add_action("wp_ajax_nopriv_saveDocument", "saveDocument");
function saveDocument(){




  $arr_img_ext = array('image/png', 'image/jpeg', 'image/jpg', 'image/gif');
    if (in_array($_FILES['file']['type'], $arr_img_ext)) {
        $upload = wp_upload_bits($_FILES["file"]["name"], null, file_get_contents($_FILES["file"]["tmp_name"]));

        if ($upload['error'] == false) {
          $data = array('url' => $upload['url']);
          wp_send_json( array('code'=> 200, 'msg'=> $upload['url'], 'field_name' => $_REQUEST['name'] ));

        } else {
          $data = array('msg' => $upload['error']);
          wp_send_json( array('code'=> 200, 'msg'=> $response->output() ));
        }
    }
    
}