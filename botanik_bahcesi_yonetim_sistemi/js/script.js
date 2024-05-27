document.addEventListener("DOMContentLoaded", function() {
    // Resim yükleme alanında seçilen dosyanın adını gösterme
    const fileInput = document.querySelector('input[type="file"]');
    const fileNameDisplay = document.createElement('div');
    fileInput.parentElement.appendChild(fileNameDisplay);

    fileInput.addEventListener('change', function() {
        if (fileInput.files.length > 0) {
            fileNameDisplay.textContent = `Seçilen dosya: ${fileInput.files[0].name}`;
        } else {
            fileNameDisplay.textContent = '';
        }
    });
});
