# Messenger start routing reproducer

Reproduce by running: `bin/console app:message -vv`

This shows the following logs:

```
[info] Sending message App\Message\TestMessage with sync sender using Symfony\Component\Messenger\Transport\Sync\SyncTransport
[info] Received message App\Message\TestMessage
[info] Message App\Message\TestMessage handled by App\MessageHandler\TestMessageHandler::__invoke
[info] Sending message App\Message\TestMessage with async sender using Symfony\Component\Messenger\Transport\Sync\SyncTransport
[info] Received message App\Message\TestMessage
```

while the message should be sent to the "sync" sender only.

## Wrong error

Besides that, another error is displayed in the output:

```
[critical] Error thrown while running command "app:message -vv". Message: "No handler for message "App\Message\TestMessage"."

In HandleMessageMiddleware.php line 123:

  [Symfony\Component\Messenger\Exception\NoHandlerForMessageException]
  No handler for message "App\Message\TestMessage".
```

"No handler" is wrong, it is triggered as the message is handled
duplicately.
