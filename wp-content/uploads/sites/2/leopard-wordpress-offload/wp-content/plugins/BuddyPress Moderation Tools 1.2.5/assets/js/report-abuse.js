jQuery(document).ready(function($){var itemID,itemType,context,contextID;var $popover,$win;var $template=$('#bpmts_form_template');if(!$template.get(0)){return}
var isLogged=PTReportAbuse.isLogged;$(document).on('click','.bpmts-feedback-form-close-button',function(e){e.preventDefault();closePopup();return!1});$(document).on('click','a.bpmts-report-button',function(){var $el=$(this);updateState($el);closePopup();$el.ggpopover('destroy');$popover=$el.ggpopover({title:PTReportAbuse.formTitle,content:$template.html(),container:'body',html:!0,placement:'auto top'});$popover.ggpopover('show');$win=$('#'+$popover.attr('aria-describedby'));return!1});$(document).on('click','.bpmts-feedback-form-submit-button',function(e){var $this=$(this);var $form=$this.parents('form');var $subject=$form.find('.bpmts-feedback-form-subject');var $message=$form.find('.bpmts-feedback-form-message');hideFeedbackStatus();if(!isLogged&&hasReportedEarlier(itemID,itemType)){updateFeedbackStatus(PTReportAbuse.messages.alreadyReported,!1);return!1}
if(PTReportAbuse.required.subject&&(!$subject.get(0)||$subject.val().length<1)){updateFeedbackStatus(PTReportAbuse.messages.subjectRequired,!1);return!1}
if(PTReportAbuse.required.message&&(!$message.get(0)||$message.val().length<1)){updateFeedbackStatus(PTReportAbuse.messages.messageRequired,!1);return!1}
var data=$form.serialize()+'&item_id='+itemID+'&item_type='+itemType+'&context='+context+'&context_id='+contextID;$this.attr('disabled',!0);updateFeedbackStatus(PTReportAbuse.messages.messageReporting,!0);$.post(ajaxurl,data,function(resp){$this.attr('disabled',!1);updateFeedbackStatus(resp.data.message,resp.success);if(resp.success){saveReportedItemToCookie(itemID,itemType)}},'json');return!1});function closePopup(){if($popover!==undefined){$popover.ggpopover('destroy');$win=null}}
function updateFeedbackStatus(message,type){var $infobox=$win.find('.bpmts-feedback-form-status-message');var class_name=type?'bpmts-feedback-form-success':'bpmts-feedback-form-error';if(!$infobox.hasClass(class_name)){$infobox.removeClass('bpmts-feedback-form-success bpmts-feedback-form-error');$infobox.addClass(class_name)}
$infobox.html('<span>'+message+'</span>').show()}
function hideFeedbackStatus(message,type){var $infobox=$win.find('.bpmts-feedback-form-status-message');$infobox.empty()}
function updateState($anchor){if(!$anchor.get(0)){return!1}
resetState();itemID=$anchor.data('item-id');itemType=$anchor.data('item-type');context=$anchor.data('context');contextID=$anchor.data('context-id');return!0}
function resetState(){itemID=itemType=context=contextID=null}
function hasReportedEarlier(itemId,itemType){var key=itemType+'-'+itemId;var reportedItems=getAllReportedItemsFromCookie();return $.inArray(key,reportedItems)!==-1}
function saveReportedItemToCookie(itemId,itemType){var key=itemType+'-'+itemId;var items=getAllReportedItemsFromCookie();items.push(key);$.cookie('bpmts-reported-items',items.join(','),{expires:15})}
function getAllReportedItemsFromCookie(){var items=$.cookie('bpmts-reported-items');if(items===undefined){items=''}
return items.split(',')}})