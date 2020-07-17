jQuery(document).ready(function ($) {
  /************************************************************************************************************************************************************
 *                                     need first load then all
 ************************************************************************************************************************************************************/

  // get a list of company
  $.ajax({
    type: "post",
    dataType: "json",
    url: ajaxobject.ajaxurl,
    data: {
      action: "getListCompany",
    },
    beforeSend: function () {
    },
    success: function (response) {
      if (response.code == 200) {

        // var count = 0;
        let bigData = response.msg;
        if (bigData != null) {
          bigData.forEach(data => {
            if (data != null) {
              let dataJson = JSON.parse(data['meta_value']);
              dataJson.forEach(company => {
                if (company.name === "company_name") {
                  // count++;
                  $("#list_company").append(new Option(company.value, company.value));
                }
              });
            }
          });
        }
      }

      if (response.code == 400) {
        console.log("status code 400 get list company");
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {

      console.log('The following error occured: ' + textStatus, errorThrown);

    }
  });


  $("#kitchen_floor").hide();
  $("#add_field").hide();
  $("#field_type").hide();
  $("#alert-company-form").hide();
  $(".bp-member-type").text("...");


  // hide dropdown field when load
  $("#field_dropdown_update").hide();
  $("#add_field_dropdown_update").hide();


  //company name
  // $("label[for='company_name']").text("Company Name");
  // $("label[for='company_id']").text("List of Company");


  //dropdown type company field change
  $("#type").change(function () {
    let fieldType = $("#type option:selected").val();

    if (fieldType == "dropdown") {
      $("#field_type").show();
      $("#add_field").show();

    }
    else {
      $("#field_type").hide();
      $("#add_field").hide();
    }

  });

  var uuid = 0;
  $("#add_field").click(function () {
    ++uuid;
    $("#field_type").append('<div class="row mt-3 px-2 mx-1" id="siphen' + uuid + '"><div class="col"><input type="text" class="form-control form-control-sm" placeholder="Value" name="value' + uuid + '"></div><div class="col"><input type="text" class="form-control form-control-sm" placeholder="Caption" name="caption' + uuid + '"></div></div> <div class="row d-flex justify-content-end m-1"><button type="button" class="btn btn-danger btn-sm" id="uuid-' + uuid + '">Remove</button></div>');

    $("#uuid-" + uuid).click(function () {
      let idDropdownFieldRemove = "siphen" + $(this).attr("id").split("-")[1];
      $("#" + idDropdownFieldRemove).remove();
      $(this).remove();
    });
  });


  // set name company in buddyboss
  $("#list_company").change(function () {
    let company = $("#list_company option:selected").text();
    if (company == "Choose Company") {
      $("#company_name").val("");
    }
    else { $("#company_name").val(company); }
  });


  // for data-bp-item-id not login
  let val = "-1";
  $(window).on('hashchange', function (e) {
    let kenburn = $("#item-header").attr("data-bp-item-id");
    if (kenburn != undefined) {
      val = kenburn;
    }
  }).trigger('hashchange');;


  // add function to  update user infomation
  $.ajax({
    type: "post",
    dataType: "json",
    url: ajaxobject.ajaxurl,
    data: {
      action: "updateInfoMember",
      bp_id: val
    },
    beforeSend: function () {
    },
    success: function (response) {
      if (response.code == 200) {
        if (response.company_count[0].company != undefined) {
          let company_count = response.company_count[0].company;
          let numberCompany = response.company_count[0].company;
          $("#user-ibenic_budypress_recent_posts").append("<span class='count'>" + numberCompany + "</span>")
        }

        let data = response.msg;
        let parseNumber = parseInt(data[0].number);
        if (parseNumber > 0) {
          $(".bp-member-type").text("Company");
        }
        else {
          $(".bp-member-type").text("Member");
        }
      }
      else {
        console.log("fail");
      }

      if (response.code == 400) {
        console.log("status code 400 update user");
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      //$(this).val($val);
      //alert('Error: '+errorThrown);
      console.log('The following error occured: ' + textStatus, errorThrown);

    }
  });


  /************************************************************************************************************************************************************
   *                                    issac newton for remove company and ahihi
   ************************************************************************************************************************************************************/
  $(".remove_company").click(function (obj) {

    let confirmDelete = confirm("Do you want to remove this company ?");

    let idNeedRemove = $(this).attr('id');
    // check if user confirm to delete company 
    if (confirmDelete) {
      $.ajax({
        type: "post",
        dataType: "json",
        // url : "<?php echo admin_url('admin-ajax.php');?>",
        url: ajaxobject.ajaxurl,
        data: {
          action: "deleteCompany",
          id: idNeedRemove
        },
        beforeSend: function () {
          //$('#elm-load-data').html('Updating ...');
        },
        success: function (response) {
          if (response.code == 200) {
            window.location.reload();
          }

          if (response.code == 400) {
            alert("Netword Error");
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          //$(this).val($val);
          //alert('Error: '+errorThrown);
          console.log('The following error occured: ' + textStatus, errorThrown);

        }
      });
    }
  }); // end of send ajax remove_company


  /************************************************************************************************************************************************************
   *                                    add new company form action need
   ************************************************************************************************************************************************************/


  $("#submit").click(function () {

    var data = $("#company_form_field").serializeArray();
    console.log(data);

    //  send ajax
    $.ajax({
      type: "post",
      dataType: "json",
      url: ajaxobject.ajaxurl,
      data: {
        action: "form",
        data: data,
      },
      beforeSend: function () {
      },
      success: function (response) {
        if (response.code == 200) {
          // $("#form-company-field").modal("hide");
          window.location.reload();
        }
        if (response.code == 400) {
          $("#kitchen_floor").text("Form must be fill some field");
          $("#kitchen_floor").show();
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log('The following error occured: ' + textStatus, errorThrown);
      }
    });

  });


  /************************************************************************************************************************************************************
  *                                    dashboard add company field
  ************************************************************************************************************************************************************/

  //  *************** delete company field *****************
  $(".delete").click(function () {
    var confirmDelete = confirm("Do you want to delete this company field?");
    var idDel = $(this).attr("id");
    if (confirmDelete) {
      $.ajax({
        type: "post",
        dataType: "json",
        url: ajaxobject.ajaxurl,
        data: {
          action: "removeCompanyField",
          idDelete: idDel

        },
        beforeSend: function () {
          //$('#elm-load-data').html('Updating ...');
        },
        success: function (response) {
          if (response.code == 200) {

            window.location.reload();
          }
          if (response.code == 400) {
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log('The following error occured: ' + textStatus + errorThrown);
        }
      });
    }
  });



  //  ******** update edit form to database ******** 
  $("#update-company-field").click(function () {
    var id = $("#id_hidden").val();
    var metakey = $("#meta_key_edit").val();
    var type = $("#type_edit").val();
    var desc = $("#description_edit").val();
    var place = $("#placeholder_edit").val();
    var label = $("#label_edit").val();
    var priority = $("#priority_edit").val();
    var captionValueJoin = [];

    if (type == "dropdown") {

      var value = $(".value-uuid").serializeArray();
      var caption = $(".caption-uuid").serializeArray();
      for (let index = 0; index < value.length; index++) {
        captionValueJoin.push({ name: caption[index].value, value: value[index].value });

      }
    }

    $.ajax({
      type: "post",
      dataType: "json",
      url: ajaxobject.ajaxurl,
      data: {
        action: "updateCompanyField",
        id: id,
        meta_key: metakey,
        type: type,
        description: desc,
        placeholder: place,
        label: label,
        priority: priority,
        dropdown: captionValueJoin

      },
      beforeSend: function () {
      },
      success: function (response) {
        if (response.code == 200) {
          $("#form-company-edit").modal("hide");
          window.location.reload();
        }

        if (response.code == 400) {

        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log('The following error occured: ' + textStatus + errorThrown);
      }
    });

  });


  //  add new dropdown field
  var uuidUpdate = 0;
  $("#field_dropdown_update").show();
  $("#add_field_dropdown_update").click(function () {
    $("#field_dropdown_update").append('<div class="row my-2 p-2 m-1" id="dropdown_child' + uuidUpdate + '"><div class="col"><input type="text" placeholder="Value" class="form-control form-control-sm value-uuid" name="value' + uuidUpdate + '"></div><div class="col"><input type="text" placeholder="Caption" class="form-control form-control-sm caption-uuid" name="caption' + uuidUpdate + '"></div></div><div class="row d-flex justify-content-end m-1" id="allBtn' + uuidUpdate + '"><button type="button" class="btn btn-danger btn-sm remove_dropdown_field" id="uuid-' + uuidUpdate + '">Remove</button></div>');
    ++uuidUpdate;

    $(".remove_dropdown_field").click(function () {
      let id = $(this).attr("id").split("-")[1];
      $("#dropdown_child" + id).remove();
      $("#allBtn" + id).remove();
      let count = $("#field_dropdown_update").children().length;
    });
  });
 
  //******** */  edit and inner data to form edit
  $(".edit").click(function () {
    $("#meta_key_edit").val("");
    $("#type_edit").val("");
    $("#description_edit").val("");
    $("#placeholder_edit").val("");
    $("#label_edit").val("");
    $("#priority_edit").val("");
    $("#id_hidden").val("");

    var id = $(this).attr("id");

    $("#form-company-edit").modal("show");
    $.ajax({
      type: "post",
      dataType: "json",
      url: ajaxobject.ajaxurl,
      data: {
        action: "editCompanyField",
        idEdit: id
      },
      beforeSend: function () {
      },
      success: function (response) {

        if (response.code == 200) {
          var id = response.msg[0]['id'];
          var metaKey = response.msg[0]['meta_key'];
          var type = response.msg[0]['type'];
          var description = response.msg[0]['description'];
          var placeholder = response.msg[0]['placeholder'];
          var label = response.msg[0]['label'];
          var priority = response.msg[0]['priority'];

          if (type == "dropdown") {
            var dropdown = response.msg[0]['dropdown'];
            $("#field_dropdown_update").show();
            $("#add_field_dropdown_update").show();

            let arrDropdown = JSON.parse(dropdown);

            $("#field_dropdown_update").empty();

            arrDropdown.forEach(item => {
              let id = item.name.substring(item.name.length - 1, item.name.length);
              $("#field_dropdown_update").append('<div class="row my-2 p-2 m-1" id="dropdown_child' + id + '"><div class="col"><input type="text" class="form-control form-control-sm value-uuid" value="' + item.value + '" name="value' + id + '"></div><div class="col"><input type="text" class="form-control form-control-sm caption-uuid" value="' + item.name + '" name="caption' + id + '"></div></div><div class="row d-flex justify-content-end m-1" id="allBtn' + id + '"><button type="button" class="btn btn-danger btn-sm remove_dropdown_field" id="uuid-' + id + '">Remove</button></div>');

              uuidUpdate = parseInt(item.name.substring(item.name.length - 1, item.name.length));
            });
            ++uuidUpdate;
            $(".remove_dropdown_field").click(function () {
              let count = $("#field_dropdown_update").children().length;
              let id = $(this).attr("id").split("-")[1];
              $("#dropdown_child" + id).remove();
              $("#allBtn" + id).remove();
            });

          }
          else {
            $("#field_dropdown_update").hide();
            $("#add_field_dropdown_update").hide();
          }

          $("#id_hidden").val(id);
          $("#meta_key_edit").val(metaKey);
          // $("#type_edit").val(type);
          $('#type_edit option[value=' + type + ']').attr('selected', 'selected');
          $("#description_edit").val(description);
          $("#placeholder_edit").val(placeholder);
          $("#label_edit").val(label);
          $("#priority_edit").val(priority);

        }

        if (response.code == 400) {
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log('The following error occured: ' + textStatus + errorThrown);
      }
    });
  });


// save the company field
  $("#save-company-field").click(function () {

    // get value in form
    // var status_field = $("#status_field").val();
    var meta_key = $("#meta_key").val();
    var type = $("#type").val();
    var label = $("#label").val();
    var description = $("#description").val();
    var placeholder = $("#placeholder").val();
    var priority = $("#priority").val();
    var dropdownValue = [];

    var dataSend = {};
    var allDataCompanyField = $('#dropdown_child').serializeArray();
    if (type == "dropdown" && allDataCompanyField != undefined) {
      // var tempArrDropdown = [];
      for (var item of allDataCompanyField) {
        if (item.name.includes("caption")) {
          dropdownValue.push(item);
        }
      }
      dataSend = {
        action: "addCompanyField",
        meta_key: meta_key,
        type: type,
        label: label,
        description: description,
        placeholder: placeholder,
        priority: priority,
        dropdown: dropdownValue
      }
    }
    else {
      dataSend = {
        action: "addCompanyField",
        meta_key: meta_key,
        type: type,
        label: label,
        description: description,
        placeholder: placeholder,
        priority: priority,
      }
    }


    $.ajax({
      type: "post",
      dataType: "json",
      url: ajaxobject.ajaxurl,
      data: dataSend,
      beforeSend: function () {
      },
      success: function (response) {
        if (response.code == 200) {


          $("#form-company-field").modal("hide");
          window.location.reload();
        }

        if (response.code == 400) {
          $("#alert-company-form").show();
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log('The following error occured: ' + textStatus + errorThrown);
      }
    });
  });



  /**
   * process for button following clicked in custom company page
   */

  $('.songnguyen_follow').click(function () {
    // alert("Following button clicked - TEST");
    let idOfCompany = $(this).prop("id");
    let currentButtonState = $(this).text();
    var that = this;
    var currentNumber = $("#number_follow_" + idOfCompany).text();
    

    $.ajax({
      type: "post",
      dataType: "json",
      url: ajaxobject.ajaxurl,
      data: {
        action: "followingButtonClicked",
        companyId : idOfCompany

      },
      beforeSend: function () {
      },
      success: function (response) {

        // insert ok ( followed)
        if (response.code == 200) {
          var currentNumberInt = parseInt(currentNumber) + 1;

          // $("#number_follow_" + idOfCompany).text(currentNumberInt);
          // $(that).text("Followed");

          console.log(response.msg);
        }

        // delete ok (unfollow)
        if (response.code == 202) {
          var currentNumberInt = parseInt(currentNumber) - 1;

          // $("#number_follow_" + idOfCompany).text(currentNumberInt);
          // $(that).text("Follow");

          console.log(response.msg);
        }
       
        if (response.code == 203) {
          $("#popup_not_login").modal("show");
          console.log(response.msg);
        }
        
        if (response.code == 400) { 
          console.log(response.msg);
        }

       

      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log('The following error occured: ' + textStatus + errorThrown);
      }
    });

  });


  /** upload documents and photos */
  $(".upload_document").change(function (e) {


    var file_data = $(this).prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    form_data.append('action', 'saveDocument');
    
    var name =  $(this).prop("name")
    form_data.append("name",name);

    $.ajax({  
      type: 'POST',
        url: ajaxobject.ajaxurl,
        data: form_data,
        contentType: false,
        processData: false,
      beforeSend: function () {
      },
      success: function (response) {
        if (response.code == 200) {
          let pathImage = response.msg;
          let hidden_field_name = response.field_name;

          if(pathImage.length > 0 && hidden_field_name.length > 0){
            $(`input[name ="img_${hidden_field_name}"]`).val(pathImage);
          }

        }

        if (response.code == 400) {
          console.log("fail follow button clicked");
        }

      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log('The following error occured: ' + textStatus + errorThrown);
      }
    });
  });



  
  // submit edit compay send
  $(".submit_edit_company").click(function(){
    // alert("edit infomation company have clicked");

    let edit_company_data = $("#edit_company_form").serializeArray();
    let idCompany = $(this).prop("id");
    console.log(idCompany);
    console.log(edit_company_data);

    $.ajax({
      type: "post",
      dataType: "json",
      url: ajaxobject.ajaxurl,
      data: {
        action: "updateInfomationCompany",
        companyDataUpdate : edit_company_data,
        idCompany : idCompany

      },
      beforeSend: function () {
      },
      success: function (response) {
        if (response.code == 200) {
          console.log(response.msg);
          window.location.reload();
        }

        if (response.code == 400) {
          console.log("fail follow button clicked");
        }

      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log('The following error occured: ' + textStatus + errorThrown);
      }
    });
  });


  $(".upload_edit_image").change(function (e) {

    var file_data = $(this).prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    form_data.append('action', 'saveDocument');
    
    var name =  $(this).prop("name")
    form_data.append("name",name);
    var thisId = $(this).prop("id");
    var hiddenInput = $("#img_edit_"+thisId);
 
    $.ajax({  
      type: 'POST',
        url: ajaxobject.ajaxurl,
        data: form_data,
        contentType: false,
        processData: false,
      beforeSend: function () {
      },
      success: function (response) {
        if (response.code == 200) {
          let pathImage = response.msg;
        
          if(pathImage.length > 0){
            console.log(pathImage);

            $("#img_edit_"+thisId).val(pathImage);
            $("#img_current_"+thisId).attr("src",pathImage);
         
          }
        }

        if (response.code == 400) {
          console.log("fail follow button clicked");
        }

      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log('The following error occured: ' + textStatus + errorThrown);
      }
    });
  });


}); //end ready












