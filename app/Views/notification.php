<!DOCTYPE html>
<html>
<head>
    <title>Notifications</title>
</head>
<body>
    <h1>Notifications</h1>
    <?php if (!empty($notifications)): ?>
        <ul>
        <?php foreach ($notifications as $notification): ?>
            <li><?= $notification->message ?></li>
        <?php endforeach ?>
        </ul>
    <?php else: ?>
        <p>No notifications found.</p>
    <?php endif ?>
    <form method="post" action="<?= base_url('/notification/create') ?>">
        <input type="submit" value="Create Notification">
    </form>
</body>
</html>