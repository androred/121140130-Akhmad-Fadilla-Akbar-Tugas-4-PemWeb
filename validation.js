function validateForm() {
    const fileInput = document.getElementById('file');
    const file = fileInput.files[0];

    if (file) {
        // Validate file type
        if (!file.name.endsWith('.txt')) {
            alert('File harus berupa teks dengan ekstensi .txt');
            return false;
        }
        // Validate file size (max 1MB)
        if (file.size > 1024 * 1024) {
            alert('Ukuran file maksimal 1MB');
            return false;
        }
    }

    return true;
}
