<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manage Student Projects</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="table-responsive">
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <h2>Quản lý Đồ án sinh viên</h2>
                <a href="{{ route('Issues.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add New
                </a>
            </div>

            <!-- Success message -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Reporter By</th>
                        <th>Reporter Date</th>
                        <th>Description</th>
                        <th>Urgency</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($issues as $item)
                    <tr>
                        <td>{{ $item->computer->computer_name }}</td>
                        <td>{{ $item->reporter_by }}</td>
                        <td>{{ date('d/m/Y H:i', strtotime($item->reporter_date)) }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->urgency }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('Issues.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                Edit
                            </a>
                            <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-id="{{ $item->id }}">
                                Delete
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $issues->links('pagination::bootstrap-4') }}
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Bạn có chắc chắn muốn xoá ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                        <form id="deleteForm" method="POST" action="" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xác nhận</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script to handle delete action -->
    <script>
        const confirmDeleteModal = document.getElementById('confirmDeleteModal');
        confirmDeleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const deleteId = button.getAttribute('data-id');
            const action = '/issues/' + deleteId;

            const deleteForm = document.getElementById('deleteForm');
            deleteForm.setAttribute('action', action);
        });
    </script>
</body>

</html>
