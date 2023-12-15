// window.addEventListener('DOMContentLoaded', () =>{
//   document.body.style.visibility = 'visible';
// });
AOS.init({
    offset: 200, // offset (in px) from the original trigger point
    delay: 100, // values from 0 to 3000, with step 50ms
    duration: 400, // values from 0 to 3000, with step 50ms
    easing: 'ease', // default easing for AOS animations
    once: false, // whether animation should happen only once - while scrolling down
    mirror: false, // whether elements should animate out while scrolling past them
    anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation
});

const dropArea = document.getElementById('drop-area');
const fileInput = document.getElementById('file-input');
const imagePreview = document.getElementById('image-preview');
const dropText = document.getElementById('drop-text');
const dropTextGamar = document.getElementById('gambar');

document.addEventListener('DOMContentLoaded', function() {
    handleFilesOnLoad();


dropArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropArea.classList.add('highlight');
});

dropArea.addEventListener('dragleave', () => {
    dropArea.classList.remove('highlight');
});

dropArea.addEventListener('drop', (e) => {
    e.preventDefault();
    dropArea.classList.remove('highlight');

    const files = e.dataTransfer.files;
    handleFiles(files);
    fileInput.files = files;
    fileInput.dispatchEvent(new Event('change'));
});

dropArea.addEventListener('click', () => {
    fileInput.click();
});

fileInput.addEventListener('change', () => {
    const files = fileInput.files;
    handleFiles(files);
});

function handleFiles(files) {
    // Show the first image in the drop area
    if (files.length > 0 && files[0].type.startsWith('image/')) {
        const reader = new FileReader();

        reader.onload = function(e) {
            const imgElement = document.createElement('img');
            imgElement.src = e.target.result;
            imgElement.classList.add('preview-image');
            imagePreview.innerHTML = '';
            imagePreview.appendChild(imgElement);

            // Hide the drop text when an image is added
            dropText.style.display = 'none';
            dropTextGamar.style.display = 'none';
            dropArea.style.padding = '0';
            dropArea.style.border = 'none';
        };
        reader.readAsDataURL(files[0]);
    }
}

function handleFilesOnLoad() {
    const gambarPath = imagePreview.getAttribute('data-gambar');
    // Membuat elemen gambar baru
    const imgElement = document.createElement('img');
    imgElement.src = '../images/' + gambarPath; 
    // Menambahkan kelas ke elemen gambar
    imgElement.classList.add('preview-image');

    // Memperbarui elemen drop area dengan gambar
    imagePreview.innerHTML = '';
    imagePreview.appendChild(imgElement);

    // Menyembunyikan teks drop
    dropText.style.display = 'none';
    dropTextGamar.style.display = 'none';
    dropArea.style.padding = '0';
    dropArea.style.border = 'none';
}
});




function confirmDelete() {
    var result = confirm("Are you sure you want to delete?");
    if (result) {
        
        document.getElementById('confirm').value="delete"
        document.getElementById('uploadresep').submit();
    } else {
        document.location.href = 'view.php';
    }
}
function confirmEdit() {
    var result = confirm("Are you sure you want to edit?");
    if (result) {
        
        document.getElementById('confirm').value="edit"
        document.getElementById('uploadresep').submit();
    } else {
        document.location.href = 'view.php';
    }
}