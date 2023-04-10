<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>User Management</title>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- Bootstrap JavaScript -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <h2>User Management</h2>
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addUserModal">Add User</button>
                    <table id="userTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email Address</th>
                                <th>Mobile Number</th>
                                <th>Username</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
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

        <script>
            $(document).ready(function () {
                // Initialize DataTables
                var usersTable = $('#userTable').DataTable({
                    "ajax": "<?= base_url('users/get') ?>",
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
                                return '<button type="button" class="btn btn-primary editUserBtn" data-toggle="modal" data-target="#editUserModal" data-id="' + row.id + '" data-firstname="' + row.firstname + '" data-lastname="' + row.lastname + '" data-email="' + row.email + '" data-mobile="' + row.mobile + '" data-username="' + row.username + '" data-password="' + row.password + '">Edit</button> ' +
                                        '<button type="button" class="btn btn-danger deleteUserBtn" data-id="' + row.id + '">Delete</button>';
                            }
                        }
                    ]
                });

                // Show Add User Modal
                $('#addUserBtn').click(function () {
                    $('#addUserModal').modal('show');
                });
                // Edit User Modal
                $('#userTable').on('click', '.editUserBtn', function () {
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
                // Delete User Modal
                $('#userTable').on('click', '.deleteUserBtn', function () {
                    var id = $(this).data('id');
                    if (confirm('Are you sure you want to delete this user?')) {
                        $.ajax({
                            url: '/users/delete/' + id, // Use the correct ID of the user to be deleted
                            type: 'POST',
                            data: {id: id},
                            success: function (response) {
                                usersTable.ajax.reload();
                            },
                            error: function (xhr, status, error) {
                                // handle error response
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
                            usersTable.ajax.reload();
                        }
                    });
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
                            usersTable.ajax.reload();
                        },
                        error: function (xhr, status, error) {
                            // handle error response
                        }
                    });
                });


            });

        </script>


