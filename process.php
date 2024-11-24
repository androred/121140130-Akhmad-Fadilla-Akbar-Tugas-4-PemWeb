<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $age = intval($_POST['age']);
    $address = htmlspecialchars($_POST['address']);

    // File handling
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];

        // Validate file size and type
        if ($fileSize > 1024 * 1024) {
            die("Ukuran file terlalu besar. Maksimal 1MB.");
        }
        if (pathinfo($fileName, PATHINFO_EXTENSION) !== 'txt') {
            die("File harus berupa teks dengan ekstensi .txt.");
        }

        // Read file content
        $fileContent = file_get_contents($fileTmpPath);
        $fileLines = explode(PHP_EOL, $fileContent);

        // Get user agent (browser info)
        $userAgent = $_SERVER['HTTP_USER_AGENT'];

        // Pass data to result page
        session_start();
        $_SESSION['data'] = compact('name', 'email', 'age', 'address', 'fileLines', 'userAgent');
        header("Location: result.php");
    } else {
        die("File upload error.");
    }
}
?>
