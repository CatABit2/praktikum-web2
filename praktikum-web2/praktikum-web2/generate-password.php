<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Password Hash</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Generate Password Hash</h2>
        <form method="post">
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Generate Hash</button>
        </form>
        <?php if (isset($hashedPassword)): ?>
            <div class="alert alert-success mt-3">
                <strong>Hashed Password:</strong>
                <pre><?php echo htmlspecialchars($hashedPassword); ?></pre>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>