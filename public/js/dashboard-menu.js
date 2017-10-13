var href = location.href;
url_last_segment = href.match(/([^\/]*)\/*$/)[1];

switch(url_last_segment) {
    case 'profile':
        $('#user_profile').addClass('active');
        break;
    case 'dashboard':
        $('#user_dashboard').addClass('active');
        $('#user_dashboard_details').addClass('active');
        break;
    case 'edit-profile':
        $('#user_dashboard, #user_dashboard_edit_profile').addClass('active');
        break;
    case 'edit-password':
        $('#user_dashboard, #user_dashboard_edit_password').addClass('active');
        break;
    case 'plans':
        $('#user_dashboard, #user_dashboard_plan').addClass('active');
        break;
    case 'admin':
        $('#user_admin, #admin_dashboard').addClass('active');
        break;
    case 'subjects':
        $('#user_admin, #admin_subjects').addClass('active');
        break;
    case 'books':
        $('#user_admin, #admin_books').addClass('active');
        break;
    case 'categories':
        $('#user_admin, #admin_categories').addClass('active');
        break;
    case 'users':
        $('#user_admin, #admin_users').addClass('active');
        break;
    case 'trash':
        $('#user_admin, #admin_trash').addClass('active');
        break;
    default:
        $('#user_plan').addClass('active');
        break;
}
