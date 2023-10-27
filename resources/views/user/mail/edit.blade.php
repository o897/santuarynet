<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<h1>{{ \App\Models\Ticket::find($ticket_id)->value('name')}} created a ticket</h1>
<h4><a href="localhost:8000/ticket/mail/{{ $ticket_id }}">User ticket link</a></h4>
</body>
</html>