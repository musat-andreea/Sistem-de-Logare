<?php include('server_messages.php'); ?>

<form action="process_messages.php" method="POST">
  <br>
  <input type='text' name='assigned_agent_username' placeholder="Write the admin name!" />
<br>
<br>
<input type='text' name='subject' placeholder="Write the subject!" />
<br>
<br>
<textarea name='message' placeholder='Write a message in here!'></textarea>
<br>
<br>
  <button>Send the message</button>
</form>
<br>
