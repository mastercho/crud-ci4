<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            Codeigniter 4 Crud - User Management
        </title>
        <meta name="description" content="Codeigniter 4 Crud">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="<?= base_url('assets/css/vendors.bundle.css'); ?>">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="<?= base_url('assets/css/app.bundle.css'); ?>">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/img/favicon/apple-touch-icon.png'); ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/favicon/favicon-32x32.png'); ?>">
        <link rel="mask-icon" href="<?= base_url('assets/img/favicon/safari-pinned-tab.svg'); ?>" color="#5bbad5">
        <link rel="stylesheet" media="screen, print" href="<?= base_url('assets/css/datagrid/datatables/datatables.bundle.css'); ?>">
    </head>
    <body class="mod-bg-1 mod-nav-link ">
        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">
                <!-- BEGIN Left Aside -->
                <aside class="page-sidebar">
                    <div class="page-logo">
                        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
                            <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Codeigniter 4 CRUD" aria-roledescription="logo">
                            <span class="page-logo-text mr-1">Codeigniter 4 Crud</span>
                            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                        </a>
                    </div>
                    <!-- BEGIN PRIMARY NAVIGATION -->
                    <nav id="js-primary-nav" class="primary-nav" role="navigation">
                        <div class="nav-filter">
                            <div class="position-relative">
                                <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
                                <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                                    <i class="fal fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="info-card">
                            <img src="<?= base_url('assets/img/demo/avatars/avatar-admin.png'); ?>" class="profile-image rounded-circle" alt="Dr. Codex Lantern">
                            <div class="info-card-text">
                                <a href="#" class="d-flex align-items-center text-white">
                                    <span class="text-truncate text-truncate-sm d-inline-block">
                                        Aydan Aleydin
                                    </span>
                                </a>
                                <span class="d-inline-block text-truncate text-truncate-sm">London, UK</span>
                            </div>
                            <img src="<?= base_url('assets/img/card-backgrounds/cover-2-lg.png'); ?>" class="cover" alt="cover">
                            <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
                                <i class="fal fa-angle-down"></i>
                            </a>
                        </div>
                        <ul id="js-nav-menu" class="nav-menu">
                            <li class="active open">
                                <a href="#" title="Application Intel" data-filter-tags="application intel">
                                    <i class="fal fa-info-circle"></i>
                                    <span class="nav-link-text" data-i18n="nav.tables">Tables</span>
                                </a>
                                <ul>
                                    <li class="active">
                                        <a href="#" title="Users" data-filter-tags="crud users management">
                                            <span class="nav-link-text" data-i18n="nav.users">Users</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                        </li>
                        </ul>
                        <div class="filter-message js-filter-message bg-success-600"></div>
                    </nav>
                    <!-- END PRIMARY NAVIGATION -->

                </aside>


                </header>
                <!-- END Page Header -->
                <!-- BEGIN Page Content -->
                <main id="js-page-content" role="main" class="page-content">

                    <div class="row">
                        <div class="col-lg-12">
                            <div id="panel-4" class="panel">
                                <div class="panel-hdr">
                                    <h2>
                                        Users
                                    </h2>
                                </div>
                                <div class="panel-container show">
                                    <div class="panel-content">
                                        <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                            <thead class="bg-warning-200">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email Address</th>
                                                    <th>Mobile Number</th>
                                                    <th>Username</th>
                                                    <th>Controls</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email Address</th>
                                                    <th>Mobile Number</th>
                                                    <th>Username</th>
                                                    <th>Controls</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <!-- datatable end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add User Modal -->
                    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="addUserForm">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="firstname">First Name</label>
                                            <input type="text" class="form-control" id="firstname" name="firstname">
                                        </div>
                                        <div class="form-group">
                                            <label for="lastname">Last Name</label>
                                            <input type="text" class="form-control" id="lastname" name="lastname">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="mobile">Mobile Number</label>
                                            <input type="text" class="form-control" id="mobile" name="mobile">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add User</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Add this to your HTML file -->
                    <!-- Edit User Modal -->
                    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="editUserForm">
                                    <div class="modal-body">
                                        <input type="hidden" id="editUserId" name="id">
                                        <div class="form-group">
                                            <label for="editFirstname">First Name</label>
                                            <input type="text" class="form-control" id="editFirstname" name="firstname">
                                        </div>
                                        <div class="form-group">
                                            <label for="editLastname">Last Name</label>
                                            <input type="text" class="form-control" id="editLastname" name="lastname">
                                        </div>
                                        <div class="form-group">
                                            <label for="editEmail">Email Address</label>
                                            <input type="email" class="form-control" id="editEmail" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="editMobile">Mobile Number</label>
                                            <input type="text" class="form-control" id="editMobile" name="mobile">
                                        </div>
                                        <div class="form-group">
                                            <label for="editUsername">Username</label>
                                            <input type="text" class="form-control" id="editUsername" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label for="editPassword">Password</label>
                                            <input type="password" class="form-control" id="editPassword" name="password">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="userId" id="userId" class="userId">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </main>
                <!-- this overlay is activated only when mobile menu is triggered -->
                <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->

                <!-- BEGIN Color profile -->
                <!-- this area is hidden and will not be seen on screens or screen readers -->
                <!-- we use this only for CSS color refernce for JS stuff -->
                <p id="js-color-profile" class="d-none">
                    <span class="color-primary-50"></span>
                    <span class="color-primary-100"></span>
                    <span class="color-primary-200"></span>
                    <span class="color-primary-300"></span>
                    <span class="color-primary-400"></span>
                    <span class="color-primary-500"></span>
                    <span class="color-primary-600"></span>
                    <span class="color-primary-700"></span>
                    <span class="color-primary-800"></span>
                    <span class="color-primary-900"></span>
                    <span class="color-info-50"></span>
                    <span class="color-info-100"></span>
                    <span class="color-info-200"></span>
                    <span class="color-info-300"></span>
                    <span class="color-info-400"></span>
                    <span class="color-info-500"></span>
                    <span class="color-info-600"></span>
                    <span class="color-info-700"></span>
                    <span class="color-info-800"></span>
                    <span class="color-info-900"></span>
                    <span class="color-danger-50"></span>
                    <span class="color-danger-100"></span>
                    <span class="color-danger-200"></span>
                    <span class="color-danger-300"></span>
                    <span class="color-danger-400"></span>
                    <span class="color-danger-500"></span>
                    <span class="color-danger-600"></span>
                    <span class="color-danger-700"></span>
                    <span class="color-danger-800"></span>
                    <span class="color-danger-900"></span>
                    <span class="color-warning-50"></span>
                    <span class="color-warning-100"></span>
                    <span class="color-warning-200"></span>
                    <span class="color-warning-300"></span>
                    <span class="color-warning-400"></span>
                    <span class="color-warning-500"></span>
                    <span class="color-warning-600"></span>
                    <span class="color-warning-700"></span>
                    <span class="color-warning-800"></span>
                    <span class="color-warning-900"></span>
                    <span class="color-success-50"></span>
                    <span class="color-success-100"></span>
                    <span class="color-success-200"></span>
                    <span class="color-success-300"></span>
                    <span class="color-success-400"></span>
                    <span class="color-success-500"></span>
                    <span class="color-success-600"></span>
                    <span class="color-success-700"></span>
                    <span class="color-success-800"></span>
                    <span class="color-success-900"></span>
                    <span class="color-fusion-50"></span>
                    <span class="color-fusion-100"></span>
                    <span class="color-fusion-200"></span>
                    <span class="color-fusion-300"></span>
                    <span class="color-fusion-400"></span>
                    <span class="color-fusion-500"></span>
                    <span class="color-fusion-600"></span>
                    <span class="color-fusion-700"></span>
                    <span class="color-fusion-800"></span>
                    <span class="color-fusion-900"></span>
                </p>
                <!-- END Color profile -->
            </div>
        </div>
    </div>
    <!-- END Page Wrapper -->
    <!-- BEGIN Quick Menu -->
    <!-- to add more items, please make sure to change the variable '$menu-items: number;' in your _page-components-shortcut.scss -->
    <nav class="shortcut-menu d-none d-sm-block">
        <input type="checkbox" class="menu-open" name="menu-open" id="menu_open" />
        <label for="menu_open" class="menu-open-button ">
            <span class="app-shortcut-icon d-block"></span>
        </label>
        <a href="#" class="menu-item btn" data-toggle="modal" data-target="#addUserModal" data-placement="left" title="Add User">
            <i class="fal fa-user-plus"></i>
        </a>
        <a href="#" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Scroll Top">
            <i class="fal fa-arrow-up"></i>
        </a>

        <a href="#" class="menu-item btn" data-action="app-fullscreen" data-toggle="tooltip" data-placement="left" title="Full Screen">
            <i class="fal fa-expand"></i>
        </a>
        <a href="#" class="menu-item btn" data-action="app-print" data-toggle="tooltip" data-placement="left" title="Print page">
            <i class="fal fa-print"></i>
        </a>

    </nav>
    <!-- END Quick Menu -->
    <script src="<?= base_url('assets/js/vendors.bundle.js'); ?>"></script>
    <script src="<?= base_url('assets/js/app.bundle.js'); ?>"></script>
    <script type="text/javascript">
                                /* Activate smart panels */
                                $('#js-page-content').smartPanel();

    </script>
    <script src="<?= base_url('assets/js/datagrid/datatables/datatables.bundle.js'); ?>"></script>
    <script>
                                $(document).ready(function () {
                                    var table;
                                    table = $('#dt-basic-example').DataTable({
                                        "processing": true,
                                        "serverSide": true,
                                        "ajax": "/users/get",
                                        "columns": [
                                            {"data": "id"},
                                            {"data": "firstname"},
                                            {"data": "lastname"},
                                            {"data": "email"},
                                            {"data": "mobile"},
                                            {"data": "username"},
                                            {
                                                "data": null,
                                                "render": function (data, type, row) {
                                                    return `
                        <button class='btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1 delete-record' title='Delete Record' data-id='${row.id}'>
                            <i class="fal fa-times"></i>
                        </button>
                        <div class='dropdown d-inline-block dropleft'>
                        <button class='btn btn-sm btn-icon btn-outline-primary rounded-circle shadow-0 editUserBtn' data-toggle='modal' data-target='#editUserModal' data-id='${row.id}' data-firstname='${row.firstname}' data-lastname='${row.lastname}' data-email='${row.email}' data-mobile='${row.mobile}' data-username='${row.username}' data-password='${row.password}' aria-expanded='true' title='Edit'>
                            <i class="fal fa-ellipsis-v"></i>
                        </button>
                        `;
                                                }
                                            }
                                        ],
                                        buttons: [
                                            {
                                                extend: 'colvis',
                                                text: 'Column Visibility',
                                                titleAttr: 'Col visibility',
                                                className: 'btn-outline-default'
                                            },
                                            {
                                                extend: 'csvHtml5',
                                                text: 'CSV',
                                                titleAttr: 'Generate CSV',
                                                className: 'btn-outline-default'
                                            },
                                            {
                                                extend: 'copyHtml5',
                                                text: 'Copy',
                                                titleAttr: 'Copy to clipboard',
                                                className: 'btn-outline-default'
                                            },
                                            {
                                                extend: 'print',
                                                text: '<i class="fal fa-print"></i>',
                                                titleAttr: 'Print Table',
                                                className: 'btn-outline-default'
                                            }

                                        ],
                                        "columnDefs": [
                                            {
                                                "targets": [0],
                                                "visible": false,
                                                "searchable": false
                                            }
                                        ]
                                    });
                                    // Delete user
                                    $(document).on('click', '.delete-record', function () {
                                        var id = $(this).data('id');
                                        var row = $(this).closest('tr');
                                        if (confirm("Are you sure you want to delete this record?")) {
                                            $.ajax({
                                                url: '<?= site_url('users/delete') ?>/' + id,
                                                type: 'POST',
                                                dataType: 'json',
                                                success: function (response) {
                                                    if (response.status == 'success') {
                                                        table.row(row).remove().draw();
                                                        alert('Record deleted successfully!');
                                                    } else {
                                                        alert('Record deletion failed!');
                                                    }
                                                },
                                                error: function (xhr, status, error) {
                                                    console.log(xhr);
                                                    console.log(status);
                                                    console.log(error);
                                                }
                                            });
                                        }
                                    });
                                    // Add User Form Submit
                                    $('#addUserForm').submit(function (e) {
                                        e.preventDefault();
                                        $.ajax({
                                            url: '<?= base_url('users/store') ?>',
                                            type: 'POST',
                                            data: $(this).serialize(),
                                            success: function (response) {
                                                $('#addUserModal').modal('hide');
                                                $('#addUserForm')[0].reset();
                                                table.ajax.reload();
                                            }
                                        });
                                    });
                                    // Edit User Modal
                                    $(document).on('click', '.editUserBtn', function () {
                                        var id = $(this).data('id');
                                        var firstname = $(this).data('firstname');
                                        var lastname = $(this).data('lastname');
                                        var email = $(this).data('email');
                                        var mobile = $(this).data('mobile');
                                        var username = $(this).data('username');
                                        var password = $(this).data('password');
                                        $('#editUserId').val(id);
                                        $('#editFirstname').val(firstname);
                                        $('#editLastname').val(lastname);
                                        $('#editEmail').val(email);
                                        $('#editMobile').val(mobile);
                                        $('#editUsername').val(username);
                                        $('#editPassword').val(password);
                                        $('#editUserForm').attr('action', '<?= base_url('users/edit') ?>/' + id); // set the form action
                                        $('#editUserModal').modal('show'); // show the modal
                                    });

                                    // Edit User Form Submit
                                    $('#editUserForm').submit(function (event) {
                                        event.preventDefault();
                                        var form = $(this);
                                        var formData = form.serialize();

                                        $.ajax({
                                            type: 'POST',
                                            url: '/users/update/' + $('#editUserId').val(),
                                            data: formData,
                                            success: function (response) {
                                                $('#editUserModal').modal('hide');
                                                table.ajax.reload();
                                            },
                                            error: function (xhr, status, error) {
                                                // handle error response
                                            }
                                        });
                                    });
                                });

    </script>
</body>
<!-- END Body -->
</html>
