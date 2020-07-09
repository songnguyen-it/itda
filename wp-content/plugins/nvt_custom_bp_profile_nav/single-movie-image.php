<?php

get_header();
global $wp_query;
?>
<!-- <section>
    <h1>Test Company Ok with. ID Company : <?php $id = get_query_var('id_user'); echo $id; ?> </h1>

</section> -->



<section>

    <div id="primary" class="content-area bs-bp-container">
        <main id="main" class="site-main">
            <article id="post-0" class="bp_group type-bp_group post-0 page type-page status-publish hentry">
                <div class="entry-content">
                    <div id="buddypress" class="buddypress-wrap bp-dir-hori-nav">
                        <div id="item-header" role="complementary" data-bp-item-id="2" data-bp-item-component="groups"
                            class="groups-header single-headers">
                            <div id="cover-image-container">
                                <div id="header-cover-image" class="cover-small width-default">
                                    <a href="http://192.168.1.11/blog/news-feed/groups/nature-lovers/admin/group-cover-image/"
                                        class="link-change-cover-image" data-balloon-pos="right"
                                        data-balloon="Change Cover Image">
                                        <i class="bb-icon-edit-thin"></i>
                                    </a>
                                </div>


                                <div id="item-header-cover-image" class="item-header-wrap bb-enable-cover-img">
                                    <div id="item-header-avatar">
                                        <a href="http://192.168.1.11/blog/news-feed/groups/nature-lovers/admin/group-avatar/"
                                            class="link-change-profile-image" data-balloon-pos="down"
                                            data-balloon="Change Group Photo">
                                            <i class="bb-icon-edit-thin"></i>
                                        </a>
                                        <img src="http://192.168.1.11/blog/wp-content/plugins/buddyboss-platform/bp-core/images/mystery-group.png"
                                            class="avatar group-2-avatar " width="300" height="300"
                                            alt="Group logo of Nature Lovers"> </div>


                                    <div id="item-header-content">
                                        <div class="flex align bp-group-title-wrap">
                                            <h2 class="bb-bp-group-title">Company Name</h2>
                                            <p class="bp-group-meta bp-group-status" data-balloon-pos="up"
                                                data-balloon-length="large"
                                                data-balloon="This group's content, including its members and activity, are visible to any site member.">
                                                <!-- <span class="group-visibility public">Public <span
                                                        class="type-separator">/</span> <span
                                                        class="group-type">Group</span></span> -->
                                            </p>
                                            <p class="bp-group-meta bp-group-type"><span
                                                    class="group-visibility public">Public <span
                                                        class="type-separator">/</span> <span
                                                        class="group-type">Group</span></span></p>
                                        </div>



                                        <div class="group-description">
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, nam
                                                atque maiores nisi pariatur assumenda.</p>
                                        </div>

                                        <div id="item-actions" class="group-item-actions">

                                            <!-- <h4 class="bp-title">Organizer (1)</h4> -->
                                            <dl class="moderators-lists">
                                                <dt class="moderators-title">Organized by</dt>
                                                <dd class="user-list admins">
                                                    <!-- <ul id="group-admins">
                                                        <li>
                                                            <a href="http://192.168.1.11/blog/news-feed/members/bb-jessica/"
                                                                class="bp-tooltip" data-bp-tooltip-pos="up"
                                                                data-bp-tooltip="jessica-sanders">
                                                                <img src="http://192.168.1.11/blog/wp-content/plugins/buddyboss-platform/bp-core/images/mystery-man.jpg"
                                                                    class="avatar user-5-avatar avatar-150 photo"
                                                                    width="150" height="150"
                                                                    alt="Profile photo of jessica-sanders"> </a>
                                                        </li>
                                                    </ul> -->
                                                </dd>
                                            </dl>
                                        </div>

                                        <!-- <div class="bp-generic-meta groups-meta action">
                                            <div id="groupbutton-2" class="generic-button"><button
                                                    class="group-button leave-group bp-toggle-action-button button"
                                                    data-title="Leave group" data-title-displayed="You're a Member"
                                                    data-bp-nonce="http://192.168.1.11/blog/news-feed/groups/nature-lovers/leave-group/?_wpnonce=2843b91798"
                                                    data-bp-btn-action="leave_group">You're a Member</button></div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bp-wrap">
                            <nav class="main-navs no-ajax bp-navs single-screen-navs horizontal groups-nav"
                                id="object-nav" role="navigation" aria-label="Group menu">
                                <ul>
                                    <li id="members-groups-li" class="bp-groups-tab current selected loading">
                                        <a href="#" id="members">
                                            Infomation
                                            <!-- <span class="count">2</span> -->
                                        </a>
                                    </li>

                                    <li id="activity-groups-li" class="bp-groups-tab">
                                        <a href="#"
                                            id="activity">
                                            Following
                                        </a>
                                    </li>

                                    <li id="invite-groups-li" class="bp-groups-tab">
                                        <a href="#"
                                            id="invite">
                                            Company Demo 1
                                        </a>
                                    </li>

                                    <li id="photos-groups-li" class="bp-groups-tab">
                                        <a href="#"
                                            id="photos">
                                            Company Demo 2
                                        </a>
                                    </li>




                                    <li id="documents-groups-li" class="bp-groups-tab">
                                        <a href="#"
                                            id="documents">
                                            Company Demo 3
                                        </a>
                                    </li>

                                    <!-- <li id="admin-groups-li" class="bp-groups-tab">
                                        <a href="http://192.168.1.11/blog/news-feed/groups/nature-lovers/admin/"
                                            id="admin">
                                            Manage
                                        </a>
                                    </li>

                                    <li class="hideshow menu-item-has-children1" style="display: none;"><a
                                            class="more-button" href="#"><i class="bb-icon-menu-dots-h"></i></a>
                                        <ul class="sub-menu"></ul>
                                    </li> -->
                                </ul>
                            </nav>



                            <div class="bb-profile-grid bb-grid">
                                <!-- <div id="item-body" class="item-body">
                                    <nav class="bp-navs bp-subnavs no-ajax group-subnav" id="subnav" role="navigation"
                                        aria-label="Group administration menu">
                                    </nav>
                                    <div class="subnav-filters filters clearfix no-subnav">


                                        <div class="grid-filters" data-object="group_members">
                                            <a href="#" class="layout-view layout-grid-view bp-tooltip "
                                                data-view="grid" data-bp-tooltip-pos="up" data-bp-tooltip="
																		  Grid View		"> <i class="bb-icon-grid-view-small" aria-hidden="true"></i> </a>

                                            <a href="#" class="layout-view layout-list-view bp-tooltip active"
                                                data-view="list" data-bp-tooltip-pos="up" data-bp-tooltip="
																		  List View		"> <i class="bb-icon-list-view-small" aria-hidden="true"></i> </a>
                                        </div>

                                    </div>


                                    <div id="members-group-list" class="group_members dir-list"
                                        data-bp-list="group_members" style="display: block;">
                                        <div class="bp-pagination top" data-bp-pagination="mlpage">
                                            <div class="pag-count top">
                                                <p class="pag-data">
                                                    Viewing 1 - 2 of 2 members </p>
                                            </div>
                                        </div>

                                        <ul id="members-list" class="item-list members-group-list bp-list list">
                                            <li class="item-entry item-entry-header">Organizers</li>

                                            <li class="item-entry odd" data-bp-item-id="5"
                                                data-bp-item-component="members">
                                                <div class="list-wrap footer-buttons-on follow-active ">

                                                    <div class="list-wrap-inner">
                                                        <div class="item-avatar">
                                                            <a
                                                                href="http://192.168.1.11/blog/news-feed/members/bb-jessica/">
                                                                <img src="http://192.168.1.11/blog/wp-content/plugins/buddyboss-platform/bp-core/images/mystery-man.jpg"
                                                                    class="avatar user-5-avatar avatar-300 photo"
                                                                    width="300" height="300"
                                                                    alt="Profile photo of jessica-sanders"> </a>
                                                        </div>

                                                        <div class="item">

                                                            <div class="item-block">
                                                                <h2 class="list-title member-name">
                                                                    <a
                                                                        href="http://192.168.1.11/blog/news-feed/members/bb-jessica/">jessica-sanders</a>
                                                                </h2>

                                                                <p class="joined item-meta">
                                                                    joined 4 weeks ago </p>
                                                            </div>

                                                            <div class="button-wrap member-button-wrap only-list-view">

                                                                <div class="followers-wrap"><b>1</b> follower</div>
                                                                <div class="friendship-button pending_friend generic-button"
                                                                    id="friendship-button-0"><a data-balloon-pos="down"
                                                                        data-balloon="Cancel connection request"
                                                                        href="http://192.168.1.11/blog/news-feed/members/admin/friends/requests/cancel/0/?_wpnonce=675c3750d8"
                                                                        class="friendship-button pending_friend requested"
                                                                        id="friend-0" rel="remove"
                                                                        data-bp-btn-action="pending"><i
                                                                            class="bb-icon-connection-remove"></i><span
                                                                            class="bb-friend-button-tag">Cancel
                                                                            connection request</span></a></div>
                                                                <div class="follow-button following generic-button"
                                                                    id="follow-button-5"><button data-title="Unfollow"
                                                                        data-title-displayed="Following"
                                                                        data-bp-nonce="http://192.168.1.11/blog/news-feed/members/admin/activity_follow/stop-following/5/?_wpnonce=ac8ba66518"
                                                                        href="http://192.168.1.11/blog/news-feed/members/admin/activity_follow/stop-following/5/?_wpnonce=ac8ba66518"
                                                                        class="follow-button following stop bp-toggle-action-button small"
                                                                        id="follow-5" rel="stop"
                                                                        data-bp-btn-action="following">Following</button>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="flex only-grid-view align-items-center follow-container ">

                                                                <div class="followers-wrap"><b>1</b> follower</div>
                                                                <div class="follow-button following generic-button"
                                                                    id="follow-button-5"><button data-title="Unfollow"
                                                                        data-title-displayed="Following"
                                                                        data-bp-nonce="http://192.168.1.11/blog/news-feed/members/admin/activity_follow/stop-following/5/?_wpnonce=ac8ba66518"
                                                                        href="http://192.168.1.11/blog/news-feed/members/admin/activity_follow/stop-following/5/?_wpnonce=ac8ba66518"
                                                                        class="follow-button following stop bp-toggle-action-button small"
                                                                        id="follow-5" rel="stop"
                                                                        data-bp-btn-action="following">Following</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="flex only-grid-view button-wrap member-button-wrap footer-button-wrap">
                                                            <div class="friendship-button pending_friend generic-button"
                                                                id="friendship-button-0"><a data-balloon-pos="down"
                                                                    data-balloon="Cancel connection request"
                                                                    href="http://192.168.1.11/blog/news-feed/members/admin/friends/requests/cancel/0/?_wpnonce=675c3750d8"
                                                                    class="friendship-button pending_friend requested"
                                                                    id="friend-0" rel="remove"
                                                                    data-bp-btn-action="pending"><i
                                                                        class="bb-icon-connection-remove"></i><span
                                                                        class="bb-friend-button-tag">Cancel connection
                                                                        request</span></a></div>
                                                        </div>


                                                    </div>

                                                    <div class="bp-members-list-hook">
                                                        <div class="bp-members-list-hook-inner">
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>


                                          


                                            <li class="item-entry item-entry-header">
                                                Members
                                            </li>

                                            <li class="item-entry even is-online is-current-user" data-bp-item-id="1"
                                                data-bp-item-component="members">
                                                <div class="list-wrap footer-buttons-on follow-active ">

                                                    <div class="list-wrap-inner">
                                                        <div class="item-avatar">
                                                            <a href="http://192.168.1.11/blog/news-feed/members/admin/">
                                                                <img src="http://192.168.1.11/blog/wp-content/uploads/avatars/1/5efedfd1bd940-bpfull.png"
                                                                    class="avatar user-1-avatar avatar-300 photo"
                                                                    width="300" height="300"
                                                                    alt="Profile photo of Andy"> <span
                                                                    class="member-status online"></span> </a>
                                                        </div>

                                                        <div class="item">

                                                            <div class="item-block">
                                                                <h2 class="list-title member-name">
                                                                    <a
                                                                        href="http://192.168.1.11/blog/news-feed/members/admin/">Andy</a>
                                                                </h2>

                                                                <p class="joined item-meta">
                                                                    joined 4 weeks ago </p>
                                                            </div>

                                                            <div class="button-wrap member-button-wrap only-list-view">

                                                                <div class="followers-wrap"><b>0</b> followers</div>
                                                            </div>

                                                            <div
                                                                class="flex only-grid-view align-items-center follow-container justify-center">

                                                                <div class="followers-wrap"><b>0</b> followers</div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="bp-members-list-hook">
                                                        <div class="bp-members-list-hook-inner">
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>

                                       


                                        <div class="bp-pagination bottom" data-bp-pagination="mlpage">
                                            <div class="pag-count bottom">
                                                <p class="pag-data">
                                                    Viewing 1 - 2 of 2 members </p>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
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




<!--  bk li -->
<!-- <div class="button-wrap member-button-wrap only-list-view">

                                                <div class="followers-wrap"><b>1</b> follower</div>
                                                <div class="friendship-button pending_friend generic-button"
                                                    id="friendship-button-0"><a data-balloon-pos="down"
                                                        data-balloon="Cancel connection request"
                                                        href="http://192.168.1.11/blog/news-feed/members/admin/friends/requests/cancel/0/?_wpnonce=675c3750d8"
                                                        class="friendship-button pending_friend requested" id="friend-0"
                                                        rel="remove" data-bp-btn-action="pending"><i
                                                            class="bb-icon-connection-remove"></i><span
                                                            class="bb-friend-button-tag">Cancel
                                                            connection request</span></a></div>
                                                <div class="follow-button following generic-button"
                                                    id="follow-button-5"><button data-title="Unfollow"
                                                        data-title-displayed="Following"
                                                        data-bp-nonce="http://192.168.1.11/blog/news-feed/members/admin/activity_follow/stop-following/5/?_wpnonce=ac8ba66518"
                                                        href="http://192.168.1.11/blog/news-feed/members/admin/activity_follow/stop-following/5/?_wpnonce=ac8ba66518"
                                                        class="follow-button following stop bp-toggle-action-button small"
                                                        id="follow-5" rel="stop"
                                                        data-bp-btn-action="following">Following</button>
                                                </div>
                                            </div> -->

<!-- <div
                                                            class="flex only-grid-view button-wrap member-button-wrap footer-button-wrap">
                                                            <div class="friendship-button pending_friend generic-button"
                                                                id="friendship-button-0"><a data-balloon-pos="down"
                                                                    data-balloon="Cancel connection request"
                                                                    href="http://192.168.1.11/blog/news-feed/members/admin/friends/requests/cancel/0/?_wpnonce=675c3750d8"
                                                                    class="friendship-button pending_friend requested"
                                                                    id="friend-0" rel="remove"
                                                                    data-bp-btn-action="pending"><i
                                                                        class="bb-icon-connection-remove"></i><span
                                                                        class="bb-friend-button-tag">Cancel connection
                                                                        request</span></a></div>
                                                        </div> -->

<!-- 
     <li class="item-entry even is-online is-current-user" data-bp-item-id="1"
                                                data-bp-item-component="members">
                                                <div class="list-wrap footer-buttons-on follow-active ">

                                                    <div class="list-wrap-inner">
                                                        <div class="item-avatar">
                                                            <a href="http://192.168.1.11/blog/news-feed/members/admin/">
                                                                <img src="http://192.168.1.11/blog/wp-content/uploads/avatars/1/5efedfd1bd940-bpfull.png"
                                                                    class="avatar user-1-avatar avatar-300 photo"
                                                                    width="300" height="300"
                                                                    alt="Profile photo of Andy"> <span
                                                                    class="member-status online"></span> </a>
                                                        </div>

                                                        <div class="item">

                                                            <div class="item-block">
                                                                <h2 class="list-title member-name">
                                                                    <a
                                                                        href="http://192.168.1.11/blog/news-feed/members/admin/">Andy</a>
                                                                </h2>

                                                                <p class="joined item-meta">
                                                                    joined 4 weeks ago </p>
                                                            </div>

                                                            <div class="button-wrap member-button-wrap only-list-view">

                                                                <div class="followers-wrap"><b>0</b> followers</div>
                                                            </div>

                                                            <div
                                                                class="flex only-grid-view align-items-center follow-container justify-center">

                                                                <div class="followers-wrap"><b>0</b> followers</div>
                                                            </div>
                                                        </div>

                                                        </div>
                                                    <div class="bp-members-list-hook">
                                                        <div class="bp-members-list-hook-inner">
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
 -->
<?php
get_footer();