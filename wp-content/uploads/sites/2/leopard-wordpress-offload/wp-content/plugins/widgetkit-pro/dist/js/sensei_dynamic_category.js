!function(t){function a(a,i){t(a).owlCarousel({loop:!1,nav:!0,dots:!1,items:12/i,navClass:["owl-carousel-left","owl-carousel-right"],navText:['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],responsive:{0:{items:1},600:{items:2},1e3:{items:12/i}}})}function i(i,s){var n=i.attr("href"),e="#dynamic-category-content-"+s;t(e).find(".ajax-overlay").addClass("loading");var o=t(e).find(".dynamic-cat-post-list").attr("data-showInstructor"),c=t(e).find(".dynamic-cat-post-list").attr("data-showMeta"),d=t(e).find(".dynamic-cat-post-list").attr("data-showDescription"),r=t(e).find(".dynamic-cat-post-list").attr("data-excerptWord"),l=t(e).find(".dynamic-cat-post-list").attr("data-showLesson"),m=t(e).find(".dynamic-cat-post-list").attr("data-enrollButton"),p=t(e).find(".dynamic-cat-post-list").attr("data-postsColumn"),u=t(e).find(".dynamic-cat-post-list").attr("data-activeCarousel"),f=t(e).find(".dynamic-cat-post-list").attr("data-senseiLessonCustomIcon"),v=t(e).find(".dynamic-cat-post-list .hidden-data").html();return t.ajax({url:n,type:"post",data:{showInstructor:o,showMeta:c,showDescription:d,excerptWord:r,showLesson:l,enrollButton:m,postsColumn:p,activeCarousel:u,senseiLessonCustomIcon:f,senseiLessonIcon:v},beforeSend:function(){t(e).find(".dynamic-layout .dynamic-cat-post-list").append('<div class="ajax-contents"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>')},success:function(i){setTimeout(function(){t(e).find(".dynamic-cat-post-list").remove(),t(e).find(".dynamic-layout").append(i),a(t(e).find(".sensei-dynamic-course-active"),p)},500)},error:function(t){console.log(t)}}),!1}t(".sensei-dynamic-category-wrapper .multiple-cat a.cat-item").on("click",function(a){var s=t(this).parent().attr("id"),n="#dynamic-category-content-"+s;a.preventDefault(),t(n).find("div#dynamic-category .sensei-dynamic-category-wrapper .multiple-cat a.cat-item").removeClass("active"),t(this).addClass("active"),i(t(this),s)})}(jQuery)