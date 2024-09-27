<!-- resources/views/pdf/device.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Device PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        h1 {
            text-align: center;
        }
        .details {
            margin: 20px;
        }
    </style>
</head>
<body>
<h1>Device and User Details</h1>

<div class="details">
    <h2>Device Information</h2>
    <p><strong>Name:</strong> {{ $device->name }}</p>
    <p><strong>Serial Number:</strong> {{ $device->serial_number }}</p>
    <p><strong>Device Type:</strong> {{ $device->type }}</p>
    <p><strong>Status:</strong> {{ $device->status }}</p>

    <h2>User Information</h2>
    <p><strong>User Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Phone:</strong> {{ $user->phone }}</p> <!-- Adjust field names as necessary -->

    <!-- Add any additional user details you want to display -->
</div>
</body>
</html>
