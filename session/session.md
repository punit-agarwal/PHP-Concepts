Sessions are a simple way to store data for individual users against a unique session ID. This can be used to persist state information 
between page requests. Session IDs are normally sent to the browser via session cookies and the ID is used to retrieve existing
session data. The absence of an ID or session cookie lets PHP know to create a new session, and generate a new session ID.

Sessions follow a simple workflow. When a session is started, PHP will either retrieve an existing session using the ID passed 
(usually from a session cookie) or if no session is passed it will create a new session. PHP will populate the $_SESSION superglobal
with any session data after the session has started. When PHP shuts down, it will automatically take the contents of the $_SESSION 
superglobal, serialize it, and send it for storage using the session save handler.

By default, PHP uses the internal files save handler which is set by session.save_handler. This saves session data on the 
server at the location specified by the session.save_path configuration directive.

Sessions can be started manually using the session_start() function. If the session.auto_start directive is set to 1, 
a session will automatically start on request startup.

Sessions normally shutdown automatically when PHP is finished executing a script, but can be manually shutdown using 
the session_write_close() function.

Example #1 Registering a variable with $_SESSION.
<?php
session_start();
if (!isset($_SESSION['count'])) {
  $_SESSION['count'] = 0;
} else {
  $_SESSION['count']++;
}
?>
Example #2 Unregistering a variable with $_SESSION.

<?php
session_start();
unset($_SESSION['count']);
?>

Caution:
Do NOT unset the whole $_SESSION with unset($_SESSION) as this will disable the registering of session variables 
through the $_SESSION superglobal.

Warning
You can't use references in session variables as there is no feasible way to restore a reference to another variable.

Warning
register_globals will overwrite variables in the global scope whose names are shared with session variables.
Please see Using Register Globals for details.
