// Elements for drop area, preview container, and file input
let dropArea = document.getElementById('drop-area');
let previewContainer = document.getElementById('preview');
let inputFile = document.getElementById('imagen');

// Prevent default behavior and highlight the drop area on drag events
['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, preventDefaults, false);
});
['dragenter', 'dragover'].forEach(eventName => {
    dropArea.addEventListener(eventName, highlight, false);
});
['dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, unhighlight, false);
});

// Handle file drop events
dropArea.addEventListener('drop', handleDrop, false);

// Handle file input change events
inputFile.addEventListener('change', (e) => handleFiles(e.target.files), false);

// Function to prevent default behaviors for drag events
function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

// Function to highlight the drop area
function highlight() {
    dropArea.classList.add('highlight');
}

// Function to unhighlight the drop area
function unhighlight() {
    dropArea.classList.remove('highlight');
}

// Function to handle files dropped into the drop area
function handleDrop(e) {
    let dt = e.dataTransfer;
    let files = dt.files;
    handleFiles(files);
}

// Function to handle files selected via file input or dropped
function handleFiles(files) {
    if (files.length > 0) {
        let file = files[0];
        inputFile.files = files; // Assign files to inputFile for form submission if needed
        previewFile(file); // Display file preview
    }
}

// Function to preview the file
function previewFile(file) {
    let reader = new FileReader();
    reader.readAsDataURL(file); 
    reader.onloadend = function() {
        let img = document.createElement('img');
        img.src = reader.result;
        img.style.maxWidth = '100%';
        img.style.height = 'auto';
        previewContainer.innerHTML = ''; // Clear previous preview
        previewContainer.appendChild(img); // Display new preview
    }
}