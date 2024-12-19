<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Issue</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
            padding: 30px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            color: #212529;
        }

        .form-group label {
            font-weight: bold;
            color: #495057;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="form-title">Edit Issue</h2>
        <form action="{{ route('Issues.update', $Issue->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3 form-group">
                <label for="computer_id" class="form-label">Computer Name</label>
                <select class="form-control @error('computer_id') is-invalid @enderror" name="computer_id" id="computer_id">
                    <option value="">Select Computer</option>
                    @foreach ($Computer as $item)
                    <option value="{{ $item->id }}" {{ old('computer_id', $Issue->computer_id) == $item->id ? 'selected' : '' }}>
                        {{ $item->computer_name }}
                    </option>
                    @endforeach
                </select>
                @error('computer_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <label for="reporter_by" class="form-label">Reporter</label>
                <input class="form-control @error('reporter_by') is-invalid @enderror" type="text" name="reporter_by" id="reporter_by" value="{{ old('reporter_by', $Issue->reporter_by) }}">
                @error('reporter_by')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <label for="reporter_date" class="form-label">Report Date</label>
                <input class="form-control @error('reporter_date') is-invalid @enderror" type="datetime-local" name="reporter_date" id="reporter_date" value="{{ old('reporter_date', $Issue->reporter_date) }}">
                @error('reporter_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <label for="description" class="form-label">Description</label>
                <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" value="{{ old('description', $Issue->description) }}">
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <label for="urgency" class="form-label">Urgency</label>
                <select class="form-control @error('urgency') is-invalid @enderror" name="urgency" id="urgency">
                    <option value="Low" {{ old('urgency', $Issue->urgency) == 'Low' ? 'selected' : '' }}>Low</option>
                    <option value="Medium" {{ old('urgency', $Issue->urgency) == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="High" {{ old('urgency', $Issue->urgency) == 'High' ? 'selected' : '' }}>High</option>
                </select>
                @error('urgency')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <label for="status" class="form-label">Status</label>
                <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                    <option value="Open" {{ old('status', $Issue->status) == 'Open' ? 'selected' : '' }}>Open</option>
                    <option value="In Process" {{ old('status', $Issue->status) == 'In Process' ? 'selected' : '' }}>In Process</option>
                    <option value="Resolved" {{ old('status', $Issue->status) == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                </select>
                @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Issue</button>
        </form>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
