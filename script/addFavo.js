function addFavorite(itemId) {
  fetch(`/ProjectPaw/ProjectPAW_ResepKu/page/controller/c_addFavo.php?id=${itemId}`, {
    method: 'GET', // or 'GET' depending on your server-side logic
    headers: {
      'Content-Type': 'application/json',
    },
  })
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.json();
  })
  .then(data => {
    alert('Berhasil Menambahkan');
    document.location.href = '/ProjectPaw/ProjectPAW_ResepKu/page/controller/c_readResep.php?id=' + itemId;
  })
  .catch(error => {
    console.error('Error:', error);
    alert('Gagal Menambahkan');
  });
}
