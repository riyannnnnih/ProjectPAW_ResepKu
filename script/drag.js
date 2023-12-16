$(document).ready(function(){
  const $dropArea = $("#drop-area");
  const $inputFile = $("#inputFile");
  const $imgView = $("#img-view");

  $inputFile.change(function(uploadImage){
    let imgLink = URL.createObjectURL($inputFile[0].files[0]);
    $imgView.css("background-image", `url(${imgLink})`);
    $imgView.text("");
    $imgView.css("border", "0");
  });

  $dropArea.on("dragover", function(e){
    e.preventDefault();
  });

  $dropArea.on("drop", function(e){
    e.preventDefault();
    $inputFile[0].files = e.originalEvent.dataTransfer.files;

    let imgLink = URL.createObjectURL($inputFile[0].files[0]);
    $imgView.css("background-image", `url(${imgLink})`);
    $imgView.text("");
    $imgView.css("border", "0");
  });
});