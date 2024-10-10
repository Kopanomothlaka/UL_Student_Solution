{{-- resources/views/emails/notify_user.blade.php --}}
    <!DOCTYPE html>
<html>
<head>
    <title>Lost Item Notification</title>
</head>
<body>
<h1>Good News!</h1>
<p>Your lost item, <strong>{{ $itemName }}</strong>, has been found!</p>
<p>You can collect it at the following location: <strong>{{ $location }}</strong>.</p>
<p>Thank you!</p>
<p>University of Limpopo Student solution!</p>

</body>
</html>
