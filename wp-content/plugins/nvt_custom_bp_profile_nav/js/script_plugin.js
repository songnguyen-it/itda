jQuery(document).ready(function ($) {
  /************************************************************************************************************************************************************
 *                                     need first load then all
 ************************************************************************************************************************************************************/
  console.log("plugin script is running nvt_custom_bp_profile_nav");
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
        // if(count == 0){} else{$("#user-ibenic_budypress_recent_posts").append("<span class='count'>"+ count+"</span>")}
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
    $("#field_type").append('<div class="row" id="siphen'+uuid+'"><div class="col"><input type="text" class="form-control form-control-sm" placeholder="Value" name="value'+uuid+'"></div><div class="col"><input type="text" class="form-control form-control-sm" placeholder="Caption" name="caption'+uuid+'"></div></div> <div class="row d-flex justify-content-end m-1"><button type="button" class="btn btn-danger btn-sm" id="uuid-' + uuid + '">Remove</button></div>');

    $("#uuid-" + uuid).click(function () {
      let idDropdownFieldRemove = "siphen" + $(this).attr("id").split("-")[1];
      $("#"+idDropdownFieldRemove).remove();
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


  // test for data-bp-item-id
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
    // url : "<?php echo admin_url('admin-ajax.php');?>",
    url: ajaxobject.ajaxurl,
    data: {
      action: "updateInfoMember",
      bp_id: val
    },
    beforeSend: function () {
      //$('#elm-load-data').html('Updating ...');
    },
    success: function (response) {
      if (response.code == 200) {
        // console.log(response.company_count[0].company);
        if (response.company_count[0].company != undefined) {
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
    console.log(confirmDelete);

    console.log($(this).attr('id'));
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

          console.log(response.msg);
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
   *                                    issac newton for add new company form action need
   ************************************************************************************************************************************************************/
  $("#submit").click(function () {

    // get value in form
    var data = $("#company_form_field").serializeArray();

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
        console.log(response.msg);
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
  //  *************** delete company field *****************
  //  *************** delete company field *****************
  $(".delete").click(function () {


    var confirmDelete = confirm("Do you want to delete this company field?");
    var idDel = $(this).attr("id");


    console.log($(this).attr("id"));

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
          console.log(response.msg);
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log('The following error occured: ' + textStatus + errorThrown);
        }
      });
    }


  });



  //  ******** update edit form to database ******** 
  //  ******** update edit form to database ******** 
  //  ******** update edit form to database ******** 
  $("#update-company-field").click(function () {
    var id = $("#id_hidden").val();
    var metakey = $("#meta_key_edit").val();
    var type = $("#type_edit").val();
    var desc = $("#description_edit").val();
    var place = $("#placeholder_edit").val();
    var label = $("#label_edit").val();
    var priority = $("#priority_edit").val();

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
        priority: priority

      },
      beforeSend: function () {
        //$('#elm-load-data').html('Updating ...');
      },
      success: function (response) {


        if (response.code == 200) {
          $("#form-company-edit").modal("hide");
          window.location.reload();
        }

        if (response.code == 400) {

        }
        console.log(response.msg);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log('The following error occured: ' + textStatus + errorThrown);
      }
    });

  });

  //  edit and render data to form edit
  $(".edit").click(function () {
    $("#meta_key_edit").val("");
    $("#type_edit").val("");
    $("#description_edit").val("");
    $("#placeholder_edit").val("");
    $("#label_edit").val("");
    $("#priority_edit").val("");
    $("#id_hidden").val("");

    // console.log($(this).attr("id"));
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
        //$('#elm-load-data').html('Updating ...');
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

          $("#id_hidden").val(id);
          $("#meta_key_edit").val(metaKey);
          // $("#type_edit").val(type);
          $('#type_edit option[value=' + type + ']').attr('selected', 'selected');
          $("#description_edit").val(description);
          $("#placeholder_edit").val(placeholder);
          $("#label_edit").val(label);
          $("#priority_edit").val(priority);



          // $("#form-company-field").modal("hide");
          // window.location.reload();
        }

        if (response.code == 400) {
          // $("#alert-company-form").show();
        }
        // console.log(response.msg);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log('The following error occured: ' + textStatus + errorThrown);
      }
    });
  });



  $("#save-company-field").click(function () {

    // get value in form
    // var status_field = $("#status_field").val();
    var meta_key = $("#meta_key").val();
    var type = $("#type").val();
    var label = $("#label").val();
    var description = $("#description").val();
    var placeholder = $("#placeholder").val();
    var priority = $("#priority").val();

    $.ajax({
      type: "post",
      dataType: "json",
      url: ajaxobject.ajaxurl,
      data: {
        action: "addCompanyField",
        // status_field: status_field,
        meta_key: meta_key,
        type: type,
        label: label,
        description: description,
        placeholder: placeholder,
        priority: priority
      },
      beforeSend: function () {
        //$('#elm-load-data').html('Updating ...');
      },
      success: function (response) {
        if (response.code == 200) {

          $("#form-company-field").modal("hide");
          window.location.reload();
        }

        if (response.code == 400) {
          $("#alert-company-form").show();
        }
        console.log(response.msg);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log('The following error occured: ' + textStatus + errorThrown);
      }
    });
  });
});








