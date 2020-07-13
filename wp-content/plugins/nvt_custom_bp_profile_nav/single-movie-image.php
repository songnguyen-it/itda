<?php
get_header();
global $wp_query;
?>
<!-- <section>
    <h1>Test Company Ok with. ID Company :<?php $id = get_query_var('id_user'); echo $id; ?> </h1>

</section> -->

<section class="mt-5">
    <div id="primary" class="content-area bs-bp-container">
        <main id="main" class="site-main">
            <article id="post-0" class="bp_group type-bp_group post-0 page type-page status-publish hentry">
                <div class="entry-content">
                    <div id="buddypress" class="buddypress-wrap bp-dir-hori-nav">
                        <div id="item-header" role="complementary" data-bp-item-id="2" data-bp-item-component="groups"
                            class="groups-header single-headers">
                            <div id="cover-image-container">
                                <div id="item-header-cover-image" class="item-header-wrap bb-enable-cover-img p-4 ">

                                    <div id="item-header-avatar" class="mx-4 d-flex justify-content-start">
                                        <div class="text-left mr-4 ">
                                            <img src="http://192.168.1.11/blog/wp-content/uploads/company/c1.jpg"
                                                class="img-thumbnail shadow " alt="boring"
                                                style="width: 200px;height:200px; ">

                                        </div>
                                        <div id="item-header-content">
                                            <div class="flex align bp-group-title-wrap">


                                                <h2>
                                                    <?php echo get_query_var('company_name_string'); ?>
                                                    <span class="badge badge-pill badge-danger p-2 shadow"
                                                        style="font-size: 0.8rem">Company</span>
                                                </h2>


                                            </div>
                                            <div class="group-description">
                                                <p><?php echo get_query_var('company_description_string'); ?></p>
                                            </div>
                                            <div id="item-actions" class="group-item-actions">


                                                <div>
                                                    <h4 class="bp-title">Owner:
                                                        <span
                                                            class="badge badge-pill badge-success p-2"><?php echo get_query_var('name_userowner_string');?></span>


                                                    </h4>
                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bp-wrap">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                            href="#nav-home" role="tab" aria-controls="nav-home"
                                            aria-selected="true">Infomation</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                            href="#nav-profile" role="tab" aria-controls="nav-profile"
                                            aria-selected="false">Members</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                            href="#nav-demo1" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">Photos</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                            href="#nav-demo2" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">Documents</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="card-body">
                                            <?php
                                              $jsonDataCompany = get_query_var('info_company_array');
                                                foreach ($jsonDataCompany as $key) {
                                                  $labelUppercase = str_replace("_"," ",strtoupper($key->name)); ;
                                                  $valueOflabel =  $key->value == "" ? "Not have infomation yet" : $key->value;
                                                  echo '<div class="form-group row">
                                                  <label for="staticEmail" class="col-sm-4 col-form-label">'.$labelUppercase.'</label>
                                                  <div class="col-sm-8">
                                                      <p type="text" readonly="" class="form-control-plaintext"
                                                          id="company-infomation">'.$valueOflabel.'</p>
                                                  </div>
                                              </div>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <ul id="groups-list"
                                            class="item-list groups-list bp-list list bb-cover-enabled">
                                            <li class="item-entry odd public is-admin is-member group-has-avatar"
                                                data-bp-item-id="2" data-bp-item-component="groups">
                                                <div class="list-wrap">
                                                    <div class="item">
                                                        <div class="item-block">
                                                            <h2 class="list-title groups-title"><a
                                                                    href="<?php echo home_url() . "/company-info/" . $id;?>"
                                                                    class="bp-group-home-link nature-lovers-home-link">
                                                                    <?php 
                                                                      $comname = get_query_var('company_name_string');
                                                                      echo $comname=="" ? "" : $comname;
                                                                    ?>
                                                                </a></h2>
                                                            <p class="item-meta group-details only-list-view">Followed /
                                                                0 members</p>
                                                            <p class="last-activity item-meta">
                                                                active 2 hours, 23 minutes ago </p>
                                                        </div>
                                                        <div class="item-desc group-item-desc only-list-view">
                                                            <p>
                                                                <?php 
                                                              $desc = get_query_var('company_description_string');
                                                              echo $desc=="" ? "No have description yet" : $desc;
                                                              ?>
                                                            </p>
                                                        </div>
                                                        <div class="groups-loop-buttons footer-button-wrap">
                                                            <div class="bp-generic-meta groups-meta action">
                                                                <div id="groupbutton-2" class="generic-button"><button
                                                                        class="group-button leave-group bp-toggle-action-button button songnguyen_follow">Follow</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="nav-demo1" role="tabpanel"
                                        aria-labelledby="nav-contact-tab">
                                        <div class="row d-flex justify-content-end">
                                            <!-- <form>
                                                <div class="form-group col-md-3">
                                                    <input type="file" id="uploadPhoto"
                                                        style="border: solid 2px black; border-radius: 50px; background-color: black; color: white; width: 210px">
                                                </div>

                                            </form> -->

                                        </div>
                                        <div class="text-left">
                                            <img src="http://192.168.1.11/blog/wp-content/uploads/company/c1.jpg"
                                                class="img-thumbnail" alt="boring" style="width: 200px;height:200px">
                                            <img src="http://192.168.1.11/blog/wp-content/uploads/company/c2.jpg"
                                                class="img-thumbnail" alt="boring" style="width: 200px;height:200px">
                                            <img src="http://192.168.1.11/blog/wp-content/uploads/company/c3.jpg"
                                                class="img-thumbnail" alt="boring" style="width: 200px;height:200px">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-demo2" role="tabpanel"
                                        aria-labelledby="nav-contact-tab">


                                        <!-- <div class="row d-flex justify-content-end">

                                            <form>
                                                <div class="form-group col-md-3">
                                                    <input type="file" id="uploadDocument"
                                                        style="border: solid 2px black; border-radius: 50px; background-color: black; color: white; width: 210px">
                                                </div>
                                        
                                            </form>

                                        </div> -->





                                        <div class="col-md-3">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <div class="media-folder_items ac-document-list" data-author="1"
                                                        data-group-id="2" data-activity-id="83" data-id="1"
                                                        data-parent-id="0" id="div-listing-1">
                                                        <div class="media-folder_icon">
                                                            <a
                                                                href="http://192.168.1.11/blog/?attachment=1035&amp;document_type=document&amp;download_document_file=1&amp;document_file=1">
                                                                test file document
                                                                <i class="bb-icon-file-apk"></i>
                                                            </a>
                                                        </div>

                                                    </div>

                                                </li>
                                                <li class="list-group-item">Document01</li>
                                                <li class="list-group-item">Document02</li>
                                                <li class="list-group-item">Document03</li>
                                                <li class="list-group-item">Document04</li>
                                            </ul>

                                        </div>







                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </article>
        </main>
    </div>
</section>

<script>
console.log("company infomation");
</script>

<?php
get_footer();