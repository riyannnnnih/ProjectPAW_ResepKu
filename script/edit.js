$(document).ready(function () {
  AOS.init({
    offset: 200,
    delay: 100,
    duration: 400,
    easing: "ease",
    once: false,
    mirror: false,
    anchorPlacement: "top-bottom",
  });
});

$(document).ready(function() {
    const dropArea = $('#drop-area');
    const fileInput = $('#file-input');
    const imagePreview = $('#image-preview');
    const dropText = $('#drop-text');
    const dropTextGambar = $('#gambar');

    handleFilesOnLoad();

    dropArea.on('dragover', (e) => {
        e.preventDefault();
        dropArea.addClass('highlight');
    });

    dropArea.on('dragleave', () => {
        dropArea.removeClass('highlight');
    });

    dropArea.on('drop', (e) => {
        e.preventDefault();
        dropArea.removeClass('highlight');

        const files = e.originalEvent.dataTransfer.files;
        handleFiles(files);
        fileInput[0].files = files;
        fileInput.trigger('change');
    });

    dropArea.on('click', () => {
        fileInput[0].click();
    });

    fileInput.on('change', () => {
        const files = fileInput[0].files;
        handleFiles(files);
    });

    function handleFiles(files) {
        // Show the first image in the drop area
        if (files.length > 0 && files[0].type.startsWith('image/')) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const imgElement = $('<img>').attr('src', e.target.result).addClass('preview-image');
                imagePreview.empty().append(imgElement);

                // Hide the drop text when an image is added
                dropText.hide();
                dropTextGambar.hide();
                dropArea.css({ padding: '0', border: 'none' });
            };
            reader.readAsDataURL(files[0]);
        }
    }

    function handleFilesOnLoad() {
        const gambarPath = imagePreview.attr('data-gambar');
        // Create a new image element
        const imgElement = $('<img>').attr('src', '../../images/' + gambarPath).addClass('preview-image');

        // Update the drop area element with the image
        imagePreview.empty().append(imgElement);

        // Hide the drop text
        dropText.hide();
        dropTextGambar.hide();
        dropArea.css({ padding: '0', border: 'none' });
    }
});

function confirmDelete() {
    var result = confirm("Are you sure you want to delete?");
    if (result) {
        $('#confirm').val('delete');
        $('#uploadresep').submit();
    } else {
        document.location.href = 'v_resepku.php';
    }
}

function confirmEdit() {
    var result = confirm("Are you sure you want to edit?");
    if (result) {
        $('#confirm').val('edit');
        $('#uploadresep').submit();
    } else {
        document.location.href = '../view/v_resepku.php';
    }
}




// const dropArea = document.getElementById("drop-area");
//     const fileInput = document.getElementById("file-input");
//     const imagePreview = document.getElementById("image-preview");
//     const dropText = document.getElementById("drop-text");
//     const dropTextGambar = document.getElementById("gambar");

// document.addEventListener("DOMContentLoaded", function () {
//   handleFilesOnLoad();

//   dropArea.addEventListener("dragover", (e) => {
//     e.preventDefault();
//     dropArea.classList.add("highlight");
//   });

//   dropArea.addEventListener("dragleave", () => {
//     dropArea.classList.remove("highlight");
//   });

//   dropArea.addEventListener("drop", (e) => {
//     e.preventDefault();
//     dropArea.classList.remove("highlight");

//     const files = e.dataTransfer.files;
//     handleFiles(files);
//     fileInput.files = files;
//     fileInput.dispatchEvent(new Event("change"));
//   });

//   dropArea.addEventListener("click", () => {
//     fileInput.click();
//   });

//   fileInput.addEventListener("change", () => {
//     const files = fileInput.files;
//     handleFiles(files);
//   });

//   function handleFiles(files) {
//     // Show the first image in the drop area
//     if (files.length > 0 && files[0].type.startsWith("image/")) {
//       const reader = new FileReader();

//       reader.onload = function (e) {
//         const imgElement = document.createElement("img");
//         imgElement.src = e.target.result;
//         imgElement.classList.add("preview-image");
//         imagePreview.innerHTML = "";
//         imagePreview.appendChild(imgElement);

//         // Hide the drop text when an image is added
//         dropText.style.display = "none";
//         dropTextGambar.style.display = "none";
//         dropArea.style.padding = "0";
//         dropArea.style.border = "none";
//       };
//       reader.readAsDataURL(files[0]);
//     }
//   }

//   function handleFilesOnLoad() {
//     const gambarPath = imagePreview.getAttribute("data-gambar");
//     // Membuat elemen gambar baru
//     const imgElement = document.createElement("img");
//     imgElement.src = "../../images/" + gambarPath;
//     // Menambahkan kelas ke elemen gambar
//     imgElement.classList.add("preview-image");

//     // Memperbarui elemen drop area dengan gambar
//     imagePreview.innerHTML = "";
//     imagePreview.appendChild(imgElement);

//     // Menyembunyikan teks drop
//     dropText.style.display = "none";
//     dropTextGambar.style.display = "none";
//     dropArea.style.padding = "0";
//     dropArea.style.border = "none";
//   }
// });

// function confirmDelete() {
//   var result = confirm("Are you sure you want to delete?");
//   if (result) {
//     document.getElementById("confirm").value = "delete";
//     document.getElementById("uploadresep").submit();
//   } else {
//     document.location.href = "v_resepku.php";
//   }
// }
// function confirmEdit() {
//   var result = confirm("Are you sure you want to edit?");
//   if (result) {
//     document.getElementById("confirm").value = "edit";
//     document.getElementById("uploadresep").submit();
//   } else {
//     document.location.href = "../view/v_resepku.php";
//   }
// }
