var href = location.href;
url_last_segment = href.match(/([^\/]*)\/*$/)[1];
if (url_last_segment == 'dashboard') {
	document.getElementById('item_dashboard').className = 'active';
} else if (url_last_segment == 'edit-profile') {
	document.getElementById('item_edit_profile').className = 'active';
}
