<?php
// Database Connection
$mysqli = new mysqli("localhost", "root", "", "myDB");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
//change in github testing
// Insert Data
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mysqli->query("INSERT INTO users (name, email) VALUES ('$name', '$email')");
    header("Location: crud.php");
}

// Delete Data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM users WHERE id=$id");
    header("Location: crud.php");
}

// Fetch Data for Update
$name = $email = "";
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM users WHERE id=$id");
    if ($result->num_rows) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
    }
}

// Update Data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mysqli->query("UPDATE users SET name='$name', email='$email' WHERE id=$id");
    header("Location: crud.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD (Single Page)</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col items-center p-4">
    
    <h2 class="text-2xl font-bold mb-4">Simple CRUD in PHP using MySQLi</h2>

    <!-- Add / Update Form -->
    <form method="post" class="bg-white p-4 shadow-md rounded-md w-full max-w-md">
        <input type="hidden" name="id" value="<?= isset($_GET['edit']) ? $_GET['edit'] : ''; ?>">
        <input type="text" name="name" value="<?= $name; ?>" placeholder="Enter Name" required class="w-full p-2 border rounded mb-2">
        <input type="email" name="email" value="<?= $email; ?>" placeholder="Enter Email" required class="w-full p-2 border rounded mb-2">
        <?php if (isset($_GET['edit'])): ?>
            <button type="submit" name="update" class="bg-blue-500 text-white p-2 rounded w-full">Update</button>
        <?php else: ?>
            <button type="submit" name="add" class="bg-green-500 text-white p-2 rounded w-full">Add</button>
        <?php endif; ?>
    </form>

    <!-- Display Data -->
    <div class="w-full max-w-2xl mt-4  overflow-y-auto max-h-64 bg-white shadow-md rounded-md p-4">
        <table class="w-full border-collapse">
            <thead class="">
                <tr class="bg-gray-200">
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Name</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody class="">
                <?php
                $result = $mysqli->query("SELECT * FROM users");
                while ($row = $result->fetch_assoc()):
                ?>
                <tr class="border-b">
                    <td class="border p-2"><?= $row['id']; ?></td>
                    <td class="border p-2"><?= $row['name']; ?></td>
                    <td class="border p-2"><?= $row['email']; ?></td>
                    <td class="border p-2">
                        <a href="crud.php?edit=<?= $row['id']; ?>" class="text-blue-500">Edit</a>
                        <a href="crud.php?delete=<?= $row['id']; ?>" class="text-red-500 ml-2" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
