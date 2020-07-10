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
                                <div id="item-header-cover-image" class="item-header-wrap bb-enable-cover-img p-4">
                                    <div id="item-header-avatar">
                                        <div id="item-header-content">
                                            <div class="flex align bp-group-title-wrap">
                                                <h2 class="bb-bp-group-title">
                                                    <?php echo get_query_var('company_name_string'); ?></h2>

                                                <p class="bp-group-meta bp-group-status" data-balloon-pos="up"
                                                    data-balloon-length="large">
                                                    <span class="group-visibility bg-danger text-white">Company<span
                                                            class="type-separator">/</span></p>
                                            </div>
                                            <div class="group-description">
                                                <p><?php echo get_query_var('company_description_string'); ?></p>
                                            </div>
                                            <div id="item-actions" class="group-item-actions">


                                                <div>
                                                    <h4 class="bp-title">Owner: <?php echo get_query_var('name_userowner_string');?></h4>

                                                    <!-- <dl class="moderators-lists">
                                                        <dt class="moderators-title">Organized by</dt>
                                                        <dd class="user-list admins">
                                                            <ul id="group-admins">
                                                                <li>
                                                                    <a href="#" class="bp-tooltip"
                                                                        data-bp-tooltip-pos="up"
                                                                        data-bp-tooltip="<?php echo get_query_var('name_userowner_string');?>">
                                                                        <img src="http://192.168.1.11/blog/wp-content/plugins/buddyboss-platform/bp-core/images/mystery-man.jpg"
                                                                            class="avatar user-5-avatar avatar-150 photo"
                                                                            width="150" height="150"
                                                                            alt="Profile photo of jessica-sanders"> </a>
                                                                </li>
                                                            </ul>
                                                        </dd>
                                                    </dl> -->
                                                </div>


                                            </div>
                                            <!-- 
                                            <div id="item-actions" class="group-item-actions">
                                                <dl class="moderators-lists">
                                                    <dt class="moderators-title">Organized by</dt>
                                                    <dd class="user-list admins">
                                                    </dd>
                                                </dl>
                                            </div> -->
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
                                        <div class="document-data-table-head">
                                            <div class="data-head data-head-name " data-target="name">
                                                <span>
                                                    Name <i class="bb-icon-triangle-fill"></i>
                                                </span>
                                            </div>
                                            <div class="data-head data-head-modified " data-target="modified">
                                                <span>
                                                    Modified <i class="bb-icon-triangle-fill"></i>
                                                </span>
                                            </div>
                                            <div class="data-head data-head-origin " data-target="group">
                                            </div>

                                            <div class="data-head data-head-visibility " data-target="visibility">
                                                <span>
                                                    Visibility <i class="bb-icon-triangle-fill"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="media-folder_items ac-document-list" data-author="1"
                                            data-group-id="2" data-activity-id="83" data-id="1" data-parent-id="0"
                                            id="div-listing-1">
                                            <div class="media-folder_icon">
                                                <a
                                                    href="http://192.168.1.11/blog/?attachment=1035&amp;document_type=document&amp;download_document_file=1&amp;document_file=1">
                                                    <i class="bb-icon-file-apk"></i>
                                                </a>
                                            </div>
                                            <div class="media-folder_details">
                                                <a class="media-folder_name bb-open-document-theatre"
                                                    href="http://192.168.1.11/blog/?attachment=1035&amp;document_type=document&amp;download_document_file=1&amp;document_file=1"
                                                    data-id="1" data-attachment-full="" data-attachment-id="1035"
                                                    data-privacy="grouponly" data-extension="apk"
                                                    data-parent-activity-id="83" data-activity-id="83" data-author="1"
                                                    data-preview=""
                                                    data-text-preview="http://192.168.1.11/blog/wp-content/uploads/bb_documents/2020/07/apkfile.apk"
                                                    data-mp3-preview="" data-album-id="1" data-group-id="2"
                                                    data-document-title="apkfile.apk" data-mirror-text=""
                                                    data-icon-class="bb-icon-file-apk">

                                                    <span>apkfile</span>.apk <i class="media-document-id"
                                                        data-item-id="1" style="display: none;"></i>
                                                    <i class="media-document-attachment-id" data-item-id="1035"
                                                        style="display: none;"></i>
                                                    <i class="media-document-type" data-item-id="document"
                                                        style="display: none;"></i>
                                                </a>
                                                <div class="media-folder_name_edit_wrap">
                                                    <input type="text" value="" class="media-folder_name_edit">
                                                    <small class="error-box">Following special characters are not
                                                        supported:<br> ' " \ * | / &gt; &lt; ? ` ; : {space}</small>
                                                </div>
                                            </div>
                                           
                                       
                                            <div class="media-folder_visibility">
                                                <div class="media-folder_details__bottom">
                                                    <span class="bp-tooltip" data-bp-tooltip-pos="down"
                                                        data-bp-tooltip="Based on group privacy">
                                                        Public </span>
                                                    <select data-item-type="document" data-item-id="1"
                                                        id="bb-folder-privacy" class="hide">
                                                        <option value="public">Public</option>
                                                        <option value="loggedin">All Members</option>
                                                        <option value="friends">My Connections</option>
                                                        <option value="onlyme">Only Me</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="media-folder_actions">
                                                <a href="#" class="media-folder_action__anchor"> <i
                                                        class="bb-icon-menu-dots-v"></i> </a>
                                                <div class="media-folder_action__list">
                                                    <ul>
                                                        <li class="download_file">
                                                            <a
                                                                href="http://192.168.1.11/blog/?attachment=1035&amp;document_type=document&amp;download_document_file=1&amp;document_file=1">Download</a>
                                                        </li>
                                                        <li class="copy_download_file_url">
                                                            <a
                                                                href="http://192.168.1.11/blog/?attachment=1035&amp;document_type=document&amp;download_document_file=1&amp;document_file=1">Copy
                                                                Download Link</a>
                                                        </li>
                                                        <li class="rename_file">
                                                            <a href="#" data-type="document"
                                                                class="ac-document-rename">Rename</a>
                                                        </li>
                                                        <li class="move_file">
                                                            <a href="#" data-action="document" data-parent-id="0"
                                                                data-id="1" data-type="group" id="2"
                                                                class="ac-document-move">Move</a>
                                                        </li>
                                                        <li class="delete_file">
                                                            <a class="document-file-delete" data-item-from="listing"
                                                                data-item-preview-attachment-id="1035"
                                                                data-item-attachment-id="1035" data-item-id="1"
                                                                data-type="document" href="#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>











                                        <!-- remove backup file upload -->
                                        <div class="media-folder_items ac-document-list" data-author="1"
                                            data-group-id="2" data-activity-id="83" data-id="1" data-parent-id="0"
                                            id="div-listing-1">
                                            <div class="media-folder_icon">
                                                <a
                                                    href="http://192.168.1.11/blog/?attachment=1035&amp;document_type=document&amp;download_document_file=1&amp;document_file=1">
                                                    test file document
                                                    <i class="bb-icon-file-apk"></i>
                                                </a>
                                            </div>

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